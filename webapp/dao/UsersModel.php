<?php

/**
 * ユーザー モデル
 *
 * @group model
 *
 */

class UsersModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'id'                => parent::TYPE_INTEGER,    // ID
        'company_id'        => parent::TYPE_INTEGER,    // 企業ID
        'tenpo_id'          => parent::TYPE_INTEGER,    // 店舗ID
        'login_id'          => parent::TYPE_STRING,     // ログインID
        'password'          => parent::TYPE_STRING,     // パスワード
        'drowssap'          => parent::TYPE_STRING,     // ドローサップ
        'auth'              => parent::TYPE_INTEGER,    // 権限（店舗管理者｜企業管理者）
        'name'              => parent::TYPE_STRING,     // ユーザー名
        'last_logined'      => parent::TYPE_DATETIME,   // 最終ログイン日時
        'is_deleted'        => parent::TYPE_INTEGER,    // 削除フラグ
        'deleted'           => parent::TYPE_DATETIME,   // 削除日時
        'updated'           => parent::TYPE_DATETIME,   // 更新日時
        'created'           => parent::TYPE_DATETIME,   // 作成日時
    );

    function isValid()
    {
        return true;
    }
}
