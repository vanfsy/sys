<?php

/**
 * 店舗 マッパー
 *
 * @group mapper
 *
 */

class TenposMapper extends DataMapper
{
    const TABLE_NAME  = 'Tenpos';
    const SEQUENCE_ID = 'id';

    /**
     * プルダウンリストを取得
     *
     */
    function getPulldown($company_id = null)
    {
        $set = array();

        $options = array(
            'conditions' => array(
                'is_deleted = ' => FLAG_OFF,
            ),
        );

        if (!is_null($company_id)) {
            $options['conditions']['company_id = '] = $company_id;
        }

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
     * 使用科目を取得
     *
     */
    function getKamoku($tenpo_id)
    {
        $kamokus = array();

        $row = $this->findById($tenpo_id);

        if (!$row) {
            return $kamokus;
        }

        $row = $row->toArray();

        $keys = array('kamoku_sales_cash_kari', 'kamoku_sales_credit_kari', 'kamoku_sales_kakeuri_kari', 'kamoku_sales_others_kari', 'kamoku_deposit_kari', 'kamoku_payment_kari', 'kamoku_sales_cash_kashi', 'kamoku_sales_credit_kashi', 'kamoku_sales_kakeuri_kashi', 'kamoku_sales_others_kashi', 'kamoku_deposit_kashi', 'kamoku_payment_kashi');

        foreach ($keys as $key) {
            $kamokus[$key] = $row[$key];
        }

        return $kamokus;
    }
}
