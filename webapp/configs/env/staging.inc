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
    define('DOMAIN', 'tanakakaikei.9-navi.com');

    // システムルート
    define('SYSTEM_ROOT', DS . 'home' . DS . 'stylecreates' . DS . 'public_html' . DS . 'tanakakaikei.9-navi.com');

    // 非公開領域
    define('PATH_WEBAPP', SYSTEM_ROOT . DS . 'webapp');

    // 公開領域
    define('PATH_PUBLIC', SYSTEM_ROOT . DS . 'public');

    // ドキュメントルート
    define('DOCUMENT_ROOT', PATH_PUBLIC . DS . 'htdocs');

    // SSL認証
    define('SSL_ENGINE', 'off');

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
    define('EMAIL_INFO',  'k_shoji@s-creates.com');
    define('EMAIL_ADMIN', 'k_shoji@s-creates.com');

//--------------------------------------------------
// DB設定
//--------------------------------------------------

    // DB接続情報
    define('DB_DRIVER', 'mysql');
    define('DB_ENCODE', 'utf8');
    define('DB_HOST',   'o3202-243.kagoya.net');
    define('DB_PORT',   '3306');
    define('DB_NAME',   'tanakakaikei');
    define('DB_USER',   'stylecreates');
    define('DB_PASS',   'QTxTqfJulRt8c');

    // DSN
    define('DB_DSN', DB_DRIVER . ':host=' . DB_HOST . '; port=' . DB_PORT . '; dbname=' . DB_NAME . '; charset=' . DB_ENCODE);
