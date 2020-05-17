<?php

/**
 * 企業 モデル
 *
 * @group model
 *
 */

class CompaniesModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'id'                 => parent::TYPE_INTEGER,    // ID
        'name'               => parent::TYPE_STRING,     // 企業名
        'settlement_month'   => parent::TYPE_INTEGER,    // 決算月
        'note'               => parent::TYPE_STRING,     // 備考

        'kamoku_sales'       => parent::TYPE_ARRAY,      // 科目マスタ（売上）
        'kamoku_sales_debt'  => parent::TYPE_ARRAY,      // 科目マスタ（売上債務）
        'kamoku_deposit'     => parent::TYPE_ARRAY,      // 科目マスタ（預金）
        'kamoku_purchase'    => parent::TYPE_ARRAY,      // 科目マスタ（仕入）
        'kamoku_expense'     => parent::TYPE_ARRAY,      // 科目マスタ（経費）

        'bumon'              => parent::TYPE_ARRAY,      // 部門マスタ
        'is_deleted'         => parent::TYPE_INTEGER,    // 削除フラグ
        'deleted'            => parent::TYPE_DATETIME,   // 削除日時
        'updated'            => parent::TYPE_DATETIME,   // 更新日時
        'created'            => parent::TYPE_DATETIME,   // 作成日時
    );

    function isValid()
    {
        return true;
    }
}
