<?php

/**
 * データモデル
 *
 */

abstract class DataModel
{
    const TYPE_BOOLEAN  = 'boolean';
    const TYPE_INTEGER  = 'integer';
    const TYPE_DOUBLE   = 'double';
    const TYPE_FLOAT    = 'double';
    const TYPE_STRING   = 'string';
    const TYPE_ARRAY    = 'array';
    const TYPE_DATETIME = 'datetime';
    const TYPE_DATE     = 'date';
    const TYPE_MONTH    = 'month';

    protected static $_model;
    protected static $_schema;
    protected $_data = array();
    protected $_date = null;

    function __construct()
    {
        static::$_schema['cnt'] = self::TYPE_INTEGER;
        static::$_schema['flg'] = self::TYPE_BOOLEAN;

        $this->_date = new DateTime();
    }

    function __get($prop)
    {
        if (isset($this->_data[$prop])) {
            return $this->_data[$prop];

        } elseif (isset(static::$_schema[$prop])) {
            return null;

        } else {
            throw new InvalidArgumentException;
        }
    }

    function __set($prop, $val)
    {
        if (!isset(static::$_schema[$prop])) {
            throw new InvalidArgumentException('Cannot be inserted property [' . $prop . '] into [' . static::$_model . '].');
        }

        $schema = static::$_schema[$prop];

        if (is_null($val)) {
            $this->_data[$prop] = null;

            return;
        }

        switch ($schema) {
            case self::TYPE_BOOLEAN:
                $this->_data[$prop] = (bool)$val;
                break;

            case self::TYPE_INTEGER:
                $this->_data[$prop] = (int)$val;
                break;

            case self::TYPE_DOUBLE:
                $this->_data[$prop] = (double)$val;
                break;

            case self::TYPE_STRING:
            case self::TYPE_ARRAY:
                $this->_data[$prop] = (string)$val;
                break;

            case self::TYPE_DATETIME:
            case self::TYPE_DATE:
            case self::TYPE_MONTH:
                if ($val instanceof DateTime) {
                    $this->_data[$prop] = $val;
                } else {
                    $this->_data[$prop] = new DateTime($val);
                }
                break;

            default:
                $this->_data[$prop] = $val;
        }

        return;
    }

    function __isset($prop)
    {
        return isset($this->_data[$prop]);
    }

    public static function getSchema()
    {
        return static::$_schema;
    }

    public static function getProperties()
    {
        return array_keys(static::$_schema);
    }

    function toArray()
    {
        $buf = array();

        foreach ($this->_data as $prop => $val) {
            $schema = static::$_schema[$prop];

            if (is_null($val) && $schema != self::TYPE_ARRAY) {
                $buf[$prop] = null;

                continue;
            }

            switch ($schema) {
                case self::TYPE_ARRAY:
                    $buf[$prop] = is_array(unserialize($val)) ? unserialize($val) : array();
                    break;

                case self::TYPE_DATETIME:
                    $buf[$prop] = $val->format('Y-m-d H:i:s');
                    break;

                case self::TYPE_DATE:
                    $buf[$prop] = $val->format('Y-m-d');
                    break;

                case self::TYPE_MONTH:
                    $buf[$prop] = $val->format('Y-m');
                    break;

                default:
                    $buf[$prop] = $val;
            }
        }

        return $buf;
    }

    function fromArray(array $arr)
    {
        foreach ($arr as $key => $val) {
            $this->__set($key, $val);
        }
    }

    abstract function isValid();
}
