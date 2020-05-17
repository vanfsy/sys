<?php

/**
 * 日報 モデル
 *
 * @group model
 *
 */

class NipposModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'id'               => parent::TYPE_INTEGER,     // ID
        'company_id'       => parent::TYPE_INTEGER,     // 企業ID
        'tenpo_id'         => parent::TYPE_INTEGER,     // 店舗ID
        'date'             => parent::TYPE_DATE,        // 日付
        'weather'          => parent::TYPE_STRING,      // 天気
        'sales_cash'       => parent::TYPE_INTEGER,     // Ⅱ 本日売上額等 ①現金
        'sales_credit'     => parent::TYPE_INTEGER,     // Ⅱ 本日売上額等 ②クレジット
        'sales_kakeuri'    => parent::TYPE_INTEGER,     // Ⅱ 本日売上額等 ③掛売上
        'sales_others'     => parent::TYPE_INTEGER,     // Ⅱ 本日売上額等 ④その他
        'receipt_cnt'      => parent::TYPE_INTEGER,     // レシート枚数
        'register'         => parent::TYPE_INTEGER,     // Ⅵ 本日レジ現金残高
        'balance'          => parent::TYPE_INTEGER,     // Ⅶ 現金過不足（繰越金）
        'status'           => parent::TYPE_INTEGER,     // ステータス（処理中｜締め済み｜確認済み）
        'is_deleted'       => parent::TYPE_INTEGER,     // 削除フラグ
        'deleted'          => parent::TYPE_DATETIME,    // 削除日時
        'updated'          => parent::TYPE_DATETIME,    // 更新日時
        'created'          => parent::TYPE_DATETIME,    // 作成日時

        'cnt_finished'     => parent::TYPE_INTEGER,     // チェック済の日報の数
    );

    function isValid()
    {
        return true;
    }
}
