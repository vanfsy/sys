<?php

/**
 * 環境別設定
 *
 */

//--------------------------------------------------
// システム設定
//--------------------------------------------------

    // 内部文字コード
    mb_internal_encoding('UTF-8');

    // GD用文字コード
    define('GD_ENCODING', 'UTF-8');

    // デバッグモード
    define('DEBUG_MODE', true);

    // 改行コード
    define('LINE_FEED', "\n");

    // ディレクトリセパレータ
    define('DS', DIRECTORY_SEPARATOR);

    // ドメイン
    define('DOMAIN', 'sys.t-cpta.jp');

    // システムルート
    define('SYSTEM_ROOT', DS . 'home' . DS . 'users' . DS . '0' . DS . 'sub.jp-t-cpta' . DS . 'web' . DS . 'sys');

    // 非公開領域
    define('PATH_WEBAPP', SYSTEM_ROOT . DS . 'webapp');

    // 公開領域
    define('PATH_PUBLIC', SYSTEM_ROOT . DS . 'public');

    // ドキュメントルート
    define('DOCUMENT_ROOT', PATH_PUBLIC . DS . 'htdocs');

    // SSL認証
    define('SSL_ENGINE', 'on');

    // ルートURL
    define('HTTP_ROOT',  'http' . (SSL_ENGINE == 'on' ? 's' : '') . '://' . DOMAIN);

    // パスワードソルト値
    define('PASSWORD_SALT_VALUE', 'StyleCreateStyle');

//--------------------------------------------------
// メール設定
//--------------------------------------------------

    // SMTP接続情報
    define('SMTP_HOST', '');
    define('SMTP_PORT', 25);
    define('SMTP_AUTH', '');
    define('SMTP_USER', '');
    define('SMTP_PASS', '');

    // 管理者メールアドレス
    define('EMAIL_INFO',  'info@t-cpta.jp');
    define('EMAIL_ADMIN', 'info@t-cpta.jp');

//--------------------------------------------------
// DB設定
//--------------------------------------------------

    // DB接続情報
    define('DB_DRIVER', 'mysql');   // version 5.6
    define('DB_ENCODE', 'utf8');
    define('DB_HOST',   'mysql134.phy.lolipop.lan');
    define('DB_PORT',   '3306');
    define('DB_NAME',   'LAA1006588-sys');
    define('DB_USER',   'LAA1006588');
    define('DB_PASS',   'zeirishijimusho');

    // DSN
    define('DB_DSN', DB_DRIVER . ':host=' . DB_HOST . '; port=' . DB_PORT . '; dbname=' . DB_NAME . '; charset=' . DB_ENCODE);
