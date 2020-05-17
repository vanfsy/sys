<?php

/**
 * 店舗-部門 モデル
 *
 * @group model
 *
 */

class TenpoBumonsModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'tenpo_id'         => parent::TYPE_INTEGER,     // 店舗ID
        'bumon'            => parent::TYPE_STRING,      // 部門
        'num'              => parent::TYPE_INTEGER,     // 表示順
    );

    function isValid()
    {
        return true;
    }
}
