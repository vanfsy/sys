<?php

/**
 * 日報-預金 モデル
 *
 * @group model
 *
 */

class NippoDepositsModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'nippo_id'         => parent::TYPE_INTEGER,     // 日報ID
        'kamoku'           => parent::TYPE_STRING,      // 科目
        'amount'           => parent::TYPE_INTEGER,     // 金額
        'num'              => parent::TYPE_INTEGER,     // 表示順
    );

    function isValid()
    {
        return true;
    }
}
