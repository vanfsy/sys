<?php

/**
 * 管理者情報 モデル
 *
 * @group model
 *
 */

class AdminsModel extends DataModel
{
    protected static $_model  = __CLASS__;
    protected static $_schema = array(
        'id'                => parent::TYPE_INTEGER,    // ID
        'password'          => parent::TYPE_STRING,     // パスワード
        'email'             => parent::TYPE_STRING,     // メールアドレス
        'name'              => parent::TYPE_STRING,     // 管理者名
        'status'            => parent::TYPE_INTEGER,    // ステータス
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
