<?php

/**
 * 企業 マッパー
 *
 * @group mapper
 *
 */

class CompaniesMapper extends DataMapper
{
    const TABLE_NAME  = 'Companies';
    const SEQUENCE_ID = 'id';

    /**
     * 決算期のプルダウンリストを取得
     *
     */
    function getPulldownOfSettlementPeriod($company_id)
    {
        $set = array();

        if (!$row = $this->findById($company_id)) {
            return $set;
        }

        $from = $row->created->format('Y');
        $to   = $this->_now->format('Y');

        $suffix = '年度 ' . $row->settlement_month . '月期';

        for ($y = $from; $y <= $to; $y++) {
            $set[$y . '-' . $row->settlement_month . '-1'] = $y . $suffix;
        }

        return $set;
    }

    /**
     * プルダウンリストを取得
     *
     */
    function getPulldown()
    {
        $set = array();

        $options = array(
            'conditions' => array(
                'is_deleted = ' => FLAG_OFF,
            ),
        );

        $rows = $this->findAll($options);

        if (!$rows) {
            return $set;
        }

        foreach ($rows as $row) {
            $set[$row->id] = $row->name;
        }

        return $set;
    }

    /**
     * 科目マスタを取得
     *
     */
    function getKamoku($company_id)
    {
        $kamokus = array();

        $row = $this->findById($company_id);

        if (!$row) {
            return $kamokus;
        }

        $row = $row->toArray();

        $keys = array('kamoku_sales', 'kamoku_sales_debt', 'kamoku_deposit', 'kamoku_purchase', 'kamoku_expense');

        foreach ($keys as $key) {
            $kamokus[$key] = $row[$key];
        }

        return $kamokus;
    }

    /**
     * 部門マスタを取得
     *
     */
    function getBumon($company_id)
    {
        $bumons = array();

        $row = $this->findById($company_id);

        if (!$row) {
            return $bumons;
        }

        $bumons = unserialize($row->bumon);

        return $bumons;
    }
}
