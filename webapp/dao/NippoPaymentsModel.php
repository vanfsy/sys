<?php

/**
 * 日報-支払 モデル
 *
 * @group model
 *
 */

class NippoPaymentsModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'nippo_id'         => parent::TYPE_INTEGER,     // 日報ID
        'photo'            => parent::TYPE_STRING,      // 写真
        'amount'           => parent::TYPE_INTEGER,     // 金額
        'name'             => parent::TYPE_STRING,      // 購入店名
        'num'              => parent::TYPE_INTEGER,     // 表示順
    );

    function isValid()
    {
        return true;
    }
}
