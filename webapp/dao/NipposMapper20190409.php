<?php

/**
 * 日報 マッパー
 *
 * @group mapper
 *
 */

class NipposMapper extends DataMapper
{
    const TABLE_NAME  = 'Nippos';
    const SEQUENCE_ID = 'id';

    /**
     * 日報が登録されているかどうか
     *
     */
    function isExists($tenpo_id)
    {
        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
        );

        $cnt = $this->getCount(array('conditions' => $conditions));

        if ($cnt > 0) {
            return true;
        }

        return false;
    }

    /**
     * 前日より繰越した現金を取得
     *
     */
    function getKurikoshi($tenpo_id, $date)
    {
        $obj_date = new DateTime($date);
        $obj_date->modify('-1 day');

        // 直近の「日次締め済」および「チェック済」の日報がない場合は0
        if (!$row = $this->getLast($tenpo_id, array(NIPPO_STATUS_CLOSED, NIPPO_STATUS_FINISHED), $obj_date->format('Y-m-d'))) {
            return 0;
        }

        // 取得した日報が前日より前のものである場合は0
        //if ($row->date < $obj_date) {
        //    return 0;
        //}
        // ※店舗に稼働フラグを追加したことにより、対象の日報の日付が必ずしも前日ではなくなったのでコメントアウトします。

        return $row->register;
    }

    /**
     * 直近の日報を取得
     *
     */
    function getLast($tenpo_id, $status = null, $date = null)
    {
        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
        );

        if (!is_null($status)) {
            if (is_array($status)) {
                $conditions['status IN '] = $status;
            } else {
                $conditions['status = '] = $status;
            }
        }

        if (!is_null($date)) {
            $obj_date = new DateTime($date);

            $conditions['date <= '] = $obj_date->format('Y-m-d');
        }

        $row = $this->find(array(
            'conditions' => $conditions,
            'order'      => array('date' => 'desc'),
        ));

        return $row;
    }

    /**
     * 日次締めの可否チェック
     *
     */
    function isPossibleClose($tenpo_id, $date)
    {
        $obj_date = new DateTime($date);

        // 前提条件 ------------------------------------------------------------

        // 日報の日付が今日以前である
        if ($obj_date->date >= $this->_now) {
            return false;
        }

        // 日報のレコードが存在する
        if (!$row = $this->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'tenpo_id = ' => $tenpo_id, 'date = ' => $date)))) {
            return false;
        }

        // 日報のステータスが「店舗処理中」である
        if ($row->status != NIPPO_STATUS_PROCESSING) {
            return false;
        }

        // クリア条件 ----------------------------------------------------------

        // 過去に一つも「チェック済」および「日次締め済」の日報がない場合はOK
        if (!$row = $this->getLast($tenpo_id, array(NIPPO_STATUS_CLOSED, NIPPO_STATUS_FINISHED))) {
            return true;
        }

        // 直近の「チェック済」および「日次締め済」の日報が前日のものである場合はOK
        if ($row->date == $obj_date->modify('-1 day')) {
            return true;
        }

        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
            'status     = ' => NIPPO_STATUS_PROCESSING,
            'date BETWEEN ' => array($row->date->format('Y-m-d'), $obj_date->format('Y-m-d')),
        );

        $cnt = $this->getCount(array('conditions' => $conditions));

        // 直近の「チェック済」および「日次締め済」の日報までに「店舗処理中」の日報がない場合はOK
        if ($cnt == 0) {
            return true;
        }

        return false;
    }

    /**
     * 日次締めの可否チェック（休業日締め）
     *
     */
    function isPossibleCloseAtHoliday($tenpo_id, $date)
    {
        $obj_date = new DateTime($date);

        // 前提条件 ------------------------------------------------------------

        // 日報の日付が今日以前である
        if ($obj_date->date >= $this->_now) {
            return false;
        }

        if ($row = $this->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'tenpo_id = ' => $tenpo_id, 'date = ' => $date)))) {
            // ステータスが「店舗処理中」である
            if ($row->status != NIPPO_STATUS_PROCESSING) {
                return false;
            }
        }

        // クリア条件 ----------------------------------------------------------

        // 過去に一つも「チェック済」および「日次締め済」の日報がない場合はOK
        if (!$row = $this->getLast($tenpo_id, array(NIPPO_STATUS_CLOSED, NIPPO_STATUS_FINISHED))) {
            return true;
        }

        // 直近の「チェック済」および「日次締め済」の日報が前日のものである場合はOK
        if ($row->date == $obj_date->modify('-1 day')) {
            return true;
        }

        return false;
    }

    /**
     * 税理士事務所確認の可否チェック
     *
     */
    function isPossibleFinish($tenpo_id, $date)
    {
        // 日報のステータスが「日次締め済」である
        $row = $this->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'tenpo_id = ' => $tenpo_id, 'date = ' => $date)));

        if (!$row || $row->status != NIPPO_STATUS_CLOSED) {
            return false;
        }

        $obj_date = new DateTime($date);

        // 過去に一つも「チェック済」の日報がない場合はOK
        if (!$row = $this->getLast($tenpo_id, NIPPO_STATUS_FINISHED)) {
            return true;
        }

        // 直近の「チェック済」の日報が前日のものである場合はOK
        if ($row->date == $obj_date->modify('-1 day')
         && $row->status == NIPPO_STATUS_FINISHED
        ) {
            return true;
        }

        return false;
    }

    /**
     * 店舗IDから1か月分の日報を取得
     *
     */
    function getOneMonthByTenpoId($tenpo_id, $status = null, $obj_date = null)
    {
        if (is_null($obj_date)) {
            $obj_date = new DateTime;
        }

        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
            'date BETWEEN ' => array(
                $obj_date->modify('first day of this months')->format('Y-m-d'),
                $obj_date->modify('last day of this months')->format('Y-m-d'),
            ),
        );

        if (!is_null($status)) {
            if (is_array($status)) {
                $conditions['status IN '] = $status;
            } else {
                $conditions['status = '] = $status;
            }
        }

        $rows = $this->findAll(array(
            'conditions' => $conditions,
            'order'      => array('date' => 'asc'),
        ));

        return $this->toCalendar($rows);
    }

    /**
     * 企業IDから1か月分の日報を取得
     *
     */
    function getByCompanyId($company_id, $status = null, $date = null)
    {
        $binds = array(
            'flag_off'   => FLAG_OFF,
            'company_id' => $company_id,
        );

        $query = array();

        $query[] = "SELECT * FROM `nippos`";
        $query[] = "WHERE `is_deleted` = :flag_off";
        $query[] = "AND `company_id` = :company_id";

        if (!is_null($status)) {
            if (is_array($status)) {
                $n = 0;
                $buf = array();

                foreach ($status as $k => $v) {
                    $binds['status_' . $n] = $v;
                    $buf[] = "status = :status_" . $n;
                    $n++;
                }

                $query[] = "AND (" . implode(" OR ", $buf) . ")";

            } else {
                $binds['status'] = $status;
                $query[] = "AND status = :status";
            }
        }

        if (!is_null($date)) {
            if (is_array($date)) {
                $n = 0;
                $buf = array();

                foreach ($date as $k => $v) {
                    $binds['date_' . $n] = $v;
                    $buf[] = "date = :date_" . $n;
                    $n++;
                }

                $query[] = "AND (" . implode(" OR ", $buf) . ")";

            } else {
                $binds['date'] = $date;
                $query[] = "AND date = :date";
            }
        }

        $query[] = "ORDER BY `date` ASC";

        $query = implode(' ', $query);

        return $this->fetchAll($query, $binds);
    }

    /**
     * 企業IDから1か月分の日報ステータスチェックのためのデータを取得
     *
     */
    function getOneMonthByCompanyIdForStatusCheck($company_id, $obj_date = null)
    {
        if (is_null($obj_date)) {
            $obj_date = new DateTime;
        }

        $query = array();

        $query[] = "SELECT `date`";
        $query[] = ", COUNT(*) AS cnt";
        $query[] = ", SUM(CASE WHEN `status` = :status_finished THEN 1 ELSE 0 END) AS cnt_finished";    // ステータス「チェック済」のレコード数
        $query[] = "FROM `nippos`";
        $query[] = "WHERE `is_deleted` = :flag_off";
        $query[] = "AND `company_id` = :company_id";
        $query[] = "AND `date` BETWEEN :date_from AND :date_to";
        $query[] = "GROUP BY `date`";
        $query[] = "ORDER BY `date` ASC";

        $query = implode(' ', $query);

        $binds = array(
            'flag_off'        => FLAG_OFF,
            'company_id'      => $company_id,
            'date_from'       => $obj_date->modify('first day of this months')->format('Y-m-d'),
            'date_to'         => $obj_date->modify('last day of this months')->format('Y-m-d'),
            'status_finished' => NIPPO_STATUS_FINISHED,
        );

        $rows = $this->fetchAll($query, $binds);

        return $this->toCalendar($rows);
    }

    /**
     * 店舗の稼働フラグ変更時のステータス調整
     *
     */
    function adjustStatusAtTenpoOperateFlagChanging($tenpo_id, $is_operated)
    {
        $conditions = array(
            'tenpo_id = ' => $tenpo_id,
            'date     = ' => $this->_now->format('Y-m-d'),
            'status  IN ' => array(NIPPO_STATUS_NEUTRAL, NIPPO_STATUS_PROCESSING),
        );

        if ($row = $this->find(array('conditions' => $conditions))) {
            $row->updated = $this->_now->format('c');

            if ($is_operated) {
                // 稼働状況を「稼働」に更新された場合、日報のステータス →「店舗処理中」
                //$row->status = NIPPO_STATUS_PROCESSING;

            } else {
                // 稼働状況を「停止」に更新された場合、日報のステータス →「非稼働」
                $row->status = NIPPO_STATUS_NEUTRAL;
            }

            $this->update($row);
        }

        return;
    }

    /**
     * 日報をカレンダー表示用に成型
     *
     */
    function toCalendar($rows)
    {
        $ret = array();

        if (!$rows) return $ret;

        foreach ($rows as $row) {
            $ret[$row->date->format('Y-m-d')] = $row;
        }

        return $ret;
    }
}
