<?php

/**
 * 店舗 モデル
 *
 * @group model
 *
 */

class TenposModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'id'                 => parent::TYPE_INTEGER,    // ID
        'company_id'         => parent::TYPE_INTEGER,    // 企業ID
        'name'               => parent::TYPE_STRING,     // 店舗名
        'tel'                => parent::TYPE_STRING,     // 電話番号
        'postal'             => parent::TYPE_STRING,     // 郵便番号
        'prefecture'         => parent::TYPE_INTEGER,    // 都道府県
        'address'            => parent::TYPE_STRING,     // 所在地
        'note'               => parent::TYPE_STRING,     // 備考

        'kamoku_sales_cash_kari'     => parent::TYPE_STRING,    // 使用科目（現金売上／借方）',
        'kamoku_sales_credit_kari'   => parent::TYPE_STRING,    // 使用科目（クレジット／借方）',
        'kamoku_sales_kakeuri_kari'  => parent::TYPE_STRING,    // 使用科目（掛売上／借方）',
        'kamoku_sales_others_kari'   => parent::TYPE_STRING,    // 使用科目（掛売回収／借方）',
        'kamoku_deposit_kari'        => parent::TYPE_ARRAY,     // 使用科目（現金預入額等／借方）',
        'kamoku_payment_kari'        => parent::TYPE_ARRAY,     // 使用科目（現金支払額等／借方）',

        'kamoku_sales_cash_kashi'    => parent::TYPE_STRING,    // 使用科目（現金売上／貸方）',
        'kamoku_sales_credit_kashi'  => parent::TYPE_STRING,    // 使用科目（クレジット／貸方）',
        'kamoku_sales_kakeuri_kashi' => parent::TYPE_STRING,    // 使用科目（掛売上／貸方）',
        'kamoku_sales_others_kashi'  => parent::TYPE_STRING,    // 使用科目（掛売回収／貸方）',
        'kamoku_deposit_kashi'       => parent::TYPE_STRING,    // 使用科目（現金預入額等／貸方）',
        'kamoku_payment_kashi'       => parent::TYPE_STRING,    // 使用科目（現金支払額等／貸方）',

        'is_operated'        => parent::TYPE_INTEGER,    // 稼働フラグ
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
