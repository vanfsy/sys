<?php

/**
 * 店舗-部門 マッパー
 *
 * @group mapper
 *
 */

class TenpoBumonsMapper extends DataMapper
{
    const TABLE_NAME  = 'Tenpo_Bumons';
    const SEQUENCE_ID = 'id';

    /**
     * 使用部門を取得する
     *
     */
    function getBumon($tenpo_id)
    {
        $bumons = array();

        $rows = $this->findAll(array('conditions' => array('tenpo_id = ' => $tenpo_id)));

        if (!$rows) {
            return $bumons;
        }

        foreach ($rows as $row) {
            $bumons[] = $row->bumon;
        }

        return $bumons;
    }
}
