<?php

/**
 * データマッパー
 *
 */

abstract class DataMapper
{
    protected $_pdo;
    protected $_now;

    function __construct()
    {
        try {
            if (!isset($this->_pdo)) {
                $this->_pdo = new PDO(DB_DSN, DB_USER, DB_PASS, array(
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                ));
            }

            $this->_now = new DateTime;

        } catch (PDOException $e) {
            header("HTTP/1.1 503 Service Unavailable");
            exit;
        }

        return $this->_pdo;
    }

    protected function _decorate(PDOStatement $stmt)
    {
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->getModelName());

        return $stmt;
    }

    function getModelName()
    {
        return ucfirst(str_replace('_', '', static::TABLE_NAME)) . 'Model';
    }

    function getTableName()
    {
        return strtolower(static::TABLE_NAME);
    }

    /**
     * トランザクションを開始する
     *
     */
    function begin()
    {
        return $this->_pdo->beginTransaction();
    }

    /**
     * ロールバックし、トランザクションを終了する
     *
     */
    function rollback()
    {
        return $this->_pdo->rollback();
    }

    /**
     * コミットし、トランザクションを終了する
     *
     */
    function commit()
    {
        return $this->_pdo->commit();
    }

    /**
     * クエリをプリペアド後、ステートメントを返す
     *
     */
    function prepare($query)
    {
        $stmt = $this->_pdo->prepare($query);

        return $stmt;
    }

    /**
     * クエリを実行し、ステートメントを返す
     *
     */
    function execute($query, $data = array())
    {
        $binds = array();

        if (!is_array($data)) {
            $data = array();
        }

        $stmt = $this->prepare($query);

        /**/
        foreach ($data as $prop => $val) {
            switch (strtolower(gettype($val))) {
                case 'null':
                    $type = PDO::PARAM_NULL;
                    break;

                case 'boolean':
                    $type = PDO::PARAM_BOOL;
                    break;

                case 'integer':
                case 'double':
                    $type = PDO::PARAM_INT;
                    break;

                case 'string':
                default:
                    $type = PDO::PARAM_STR;
            }

            $stmt->bindValue(':' . $prop, $val, $type);
        }

        $stmt->execute();
        /**
        foreach ($data as $prop => $val) {
            $val = !is_null($val) ? $val : 'null';

            if (is_string($prop)) {
                $binds[':' . $prop] = $val;
            } else {
                $binds[] = $val;
            }
        }

        $getNamaQuery = function ($query, $binds)
        {
            foreach ($binds as $key => $val) {
                if (is_string($val)) {
                    $val = "'" . $val . "'";
                }

                $query = str_replace($key, $val, $query);
            }

            return $query;
        };

        if (!headers_sent()) header('Content-type: text/html; charset=utf-8');
        print '<pre>';
        print_r($getNamaQuery($stmt->queryString, $binds));
        print '</pre>';

        $stmt->execute($binds);
        /**/

        $this->_decorate($stmt);

        return $stmt;
    }

    /**
     * 実行される生クエリを返す
     *
     */
    function getNamaQuery($query, $data = array())
    {
        $binds = array();

        $stmt = $this->prepare($query);

        foreach ($data as $prop => $val) {
            $val = !is_null($val) ? $val : 'null';

            if (is_string($prop)) {
                $binds[':' . $prop] = $val;
            } else {
                $binds[] = $val;
            }
        }

        $fnc = function ($query, $binds)
        {
            foreach ($binds as $key => $val) {
                if (is_string($val)) {
                    $val = "'" . $val . "'";
                }

                $query = str_replace($key, $val, $query);
            }

            return preg_replace('/[ ]+/', ' ', $query);
        };

        return $fnc($stmt->queryString, $binds);
    }

    /**
     * クエリを実行し、1行目を返す
     *
     */
    function fetch($query, $data = array())
    {
        $stmt = $this->execute($query, $data);

        return $stmt->fetch();
    }

    /**
     * クエリを実行し、すべての行を返す
     *
     */
    function fetchAll($query, $data = array())
    {
        $stmt = $this->execute($query, $data);

        return $stmt->fetchAll();
    }

    /**
     * クエリを実行し、すべての行をシーケンスIDをキーとした配列にして返す
     *
     */
    function fetchAllAsKey($query, $data = array())
    {
        $stmt = $this->execute($query, $data);

        $rows = array();

        $id = static::SEQUENCE_ID;

        foreach ($stmt as $row) {
            $rows[$row->$id] = $row;
        }

        return $rows;
    }

    /**
     * 参照オプションからバインドを返す
     *
     */
    function getBinds($options)
    {
        $binds = array();

        if (isset($options['conditions']) && is_array($options['conditions']) && count($options['conditions']) > 0) {
            foreach ($options['conditions'] as $formula => $val) {
                list($prop, $ope1, $ope2) = explode(' ', preg_replace('/[ ]+/', ' ', trim($formula)));

                $ope = trim(strtoupper(implode(' ', array($ope1, $ope2))));

                if ($ope == 'BETWEEN' || $ope == 'NOT BETWEEN') {
                    $binds[$prop . '_from'] = $val[0];
                    $binds[$prop . '_to']   = $val[1];

                } elseif ($ope == 'IN' || $ope == 'NOT IN') {
                    if (is_array($val)) {
                        foreach ($val as $k => $v) {
                            $binds[$prop . "_" . $k] = $v;
                        }

                    } else {
                        $binds[$prop . "_"] = $val;
                    }

                } else {
                    if (is_array($val)) {
                        foreach ($val as $k => $v) {
                            if (is_null($v)) continue;

                            $binds[$prop . "_" . $k] = $v;
                        }

                    } else {
                        if (is_null($val)) continue;

                        $binds[$prop] = $val;
                    }
                }
            }
        }

        return $binds;
    }

    /**
     * 参照オプションからWHERE句を返す
     *
     */
    function getWhere($options)
    {
        if (isset($options['conditions']) && is_array($options['conditions']) && count($options['conditions']) > 0) {
            $where = array();

            foreach ($options['conditions'] as $formula => $val) {
                list($prop, $ope1, $ope2) = explode(' ', preg_replace('/[ ]+/', ' ', trim($formula)));

                $ope = trim(strtoupper(implode(' ', array($ope1, $ope2))));

                if ($ope == 'BETWEEN' || $ope == 'NOT BETWEEN') {
                    $where[] = $prop . " " . $ope . " :" . $prop . "_from AND :" . $prop . "_to";

                } elseif ($ope == 'IN' || $ope == 'NOT IN') {
                    if (is_array($val)) {
                        $where[] = $prop . " " . $ope . "(:" . $prop . "_" . implode(", :" . $prop . "_", array_keys($val)) . ")";

                    } else {
                        $where[] = $prop . " " . $ope . "(:" . $prop . "_)";
                    }

                } else {
                    if (is_array($val)) {
                        $buf = array();

                        foreach ($val as $k => $v) {
                            $buf[] = $prop . " " . (!is_null($v) ? $ope . " :" . $prop . "_" . $k : ($ope == '!=' || $ope == '<>' ? "IS NOT NULL" : "IS NULL"));
                        }

                        $where[] = "(" . implode(' OR ', $buf) . ")";

                    } else {
                        $where[] = $prop . " " . (!is_null($val) ? $ope . " :" . $prop : ($ope == '!=' || $ope == '<>' ? "IS NOT NULL" : "IS NULL"));
                    }
                }
            }

            return "WHERE " . implode(" AND ", $where);
        }

        return '';
    }

    /**
     * 参照オプションからORDER句を返す
     *
     */
    function getOrder($options)
    {
        if (isset($options['order'])) {
            $order = array();

            if (!is_array($options['order'])) {
                $options['order'] = array($options['order']);
            }

            foreach ($options['order'] as $key => $val) {
                $order[] = is_string($key) ? ($key . " " . $val) : ($val);
            }

            return "ORDER BY " . implode(', ', $order);
        }

        return '';
    }

    /**
     * 参照オプションからLIMIT句を返す
     *
     */
    function getLimit($options)
    {
        if (isset($options['limit'])) {
            $limit = array();

            $limit[] = "LIMIT " . $options['limit'];

            if (isset($options['offset'])) {
                $limit[] = "OFFSET " . $options['offset'];
            }

            return implode(' ', $limit);
        }

        return '';
    }

    /**
     * 行数を返す
     *
     */
    function getCount($options = array())
    {
        $query = array();
        $query[] = "SELECT COUNT(*) AS cnt FROM " . $this->getTableName();
        $query[] = $this->getWhere($options);
        $query = implode(' ', $query);

        $binds = $this->getBinds($options);

        $row = $this->fetch($query, $binds);

        return $row->cnt;
    }

    /**
     * 1行目を返す
     *
     */
    function find($options = array())
    {
        $query = array();
        $query[] = "SELECT * FROM " . $this->getTableName();
        $query[] = $this->getWhere($options);
        $query[] = $this->getOrder($options);
        $query = implode(' ', $query);

        $binds = $this->getBinds($options);

        return $this->fetch($query, $binds);
    }

    /**
     * 全ての行を返す
     *
     */
    function findAll($options = array())
    {
        $query = array();
        $query[] = "SELECT * FROM " . $this->getTableName();
        $query[] = $this->getWhere($options);
        $query[] = $this->getOrder($options);
        $query[] = $this->getLimit($options);
        $query = implode(' ', $query);

        $binds = $this->getBinds($options);

        return $this->fetchAll($query, $binds);
    }

    /**
     * シーケンスIDから行を返す
     *
     */
    function findById($id)
    {
        $query = "SELECT * FROM " . $this->getTableName() . " WHERE " . static::SEQUENCE_ID . " = :id";
        $binds = array('id' => $id);

        return $this->fetch($query, $binds);
    }

    /**
     * 最後に挿入された行のIDを返す
     *
     */
    function lastInsertId()
    {
        return $this->_pdo->lastInsertId(static::SEQUENCE_ID);
    }

    /**
     * 行を挿入する
     *
     */
    function insert($data)
    {
        if (!is_array($data)) {
            $data = array($data);
        }

        if (!$props = array_keys($data[0]->toArray())) {
            return false;
        }

        $query = array();
        $query[] = "INSERT INTO `" . $this->getTableName() . "`";
        $query[] = "(`" . implode('`, `', $props) . "`)";
        $query[] = "VALUE";
        $query[] = "(:" . implode(', :', $props) . ")";
        $query = implode(' ', $query);

        $stmt = $this->prepare($query);

        $modelClass = $this->getModelName();

        foreach ($data as $row) {
            if (!$row instanceof $modelClass || !$row->isValid()) {
                throw new InvalidArgumentException;
            }

            $binds = array();

            foreach ($props as $prop) {
                $binds[':' . $prop] = ($row->$prop instanceof DateTime) ? $row->$prop->format('c') : $row->$prop;
            }

            $stmt->execute($binds);

            if ($id = static::SEQUENCE_ID) {
                $row->$id = $this->lastInsertId();
            }
        }

        return true;
    }

    /**
     * 行を更新する
     *
     */
    function update($data)
    {
        if (!is_array($data)) {
            $data = array($data);
        }

        if (!$props = array_keys($data[0]->toArray())) {
            return false;
        }

        if (!$id = static::SEQUENCE_ID) {
            return false;
        }

        $query = array();
        $query[] = "UPDATE `" . $this->getTableName() . "` SET";
        $buf = array();
        foreach ($props as $prop) {
            if ($prop == $id) continue;
            $buf[] = "`" . $prop . "` = :" . $prop;
        }
        $query[] = implode(', ', $buf);
        $query[] = "WHERE `" . $id . "` = :" . $id;
        $query = implode(' ', $query);

        $stmt = $this->prepare($query);

        $modelClass = $this->getModelName();

        foreach ($data as $row) {
            if (!$row instanceof $modelClass || !$row->isValid()) {
                throw new InvalidArgumentException;
            }

            $binds = array();

            foreach ($props as $prop) {
                $binds[':' . $prop] = ($row->$prop instanceof DateTime) ? $row->$prop->format('c') : $row->$prop;
            }

            $stmt->execute($binds);
        }
    }

    /**
     * 行を削除する
     *
     */
    function delete($data)
    {
        if (!is_array($data)) {
            $data = array($data);
        }

        if (!$id = static::SEQUENCE_ID) {
            return false;
        }

        $query = array();
        $query[] = "DELETE FROM " . $this->getTableName();
        $query[] = "WHERE " . $id . " = :" . $id;
        $query = implode(' ', $query);

        $stmt = $this->prepare($query);

        $modelClass = $this->getModelName();

        foreach ($data as $row) {
            if (!$row instanceof $modelClass || !$row->isValid()) {
                throw new InvalidArgumentException;
            }

            $binds[':' . $id] = $row->$id;

            $stmt->execute($binds);
        }
    }
}
