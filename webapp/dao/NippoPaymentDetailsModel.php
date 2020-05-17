<?php

/**
 * 日報-支払-明細 モデル
 *
 * @group model
 *
 */

class NippoPaymentDetailsModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'nippo_id'          => parent::TYPE_INTEGER,    // 日報ID
        'nippo_payment_num' => parent::TYPE_STRING,     // 日報-支払 表示順
        'kamoku'            => parent::TYPE_STRING,     // 科目
        'amount'            => parent::TYPE_INTEGER,    // 金額
        'tekiyo'            => parent::TYPE_STRING,     // 摘要
        'bumon'             => parent::TYPE_STRING,     // 部門
        'num'               => parent::TYPE_INTEGER,    // 表示順
    );

    function isValid()
    {
        return true;
    }
}
