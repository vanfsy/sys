<?php

/**
 * タイムゾーン設定
 *
 */
date_default_timezone_set('Asia/Tokyo');

/**
 * 文字コード設定
 *
 */
mb_language('japanese');
mb_internal_encoding('UTF-8');

/**
 * 環境設定
 *
 */
switch (gethostname()) {
    // 開発環境
    case 'MyComputer':
        define('APPLICATION_ENV', 'development');
        break;

    // デモ環境（KAGOYAサーバー）
    case 'o3202-243.kagoya.net':
        define('APPLICATION_ENV', 'staging');
        break;

    // 運用環境（メイクスマイル様契約サーバー）
    default:
        define('APPLICATION_ENV', 'product');
}

require dirname(__FILE__) . '/env/' . APPLICATION_ENV . '.inc';

/**
 * エラー設定
 *
 */
if (DEBUG_MODE === true) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_STRICT);

} else {
    ini_set('display_errors', 0);
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_STRICT & ~ E_DEPRECATED & ~ E_USER_DEPRECATED & ~ E_WARNING);
}

/**
 * 定義値設定
 *
 */
require 'define.inc';

/**
 * 拡張
 *
 */
require_once PATH_WEBAPP . '/extensions/DateTime.php';
use Extensions\DateTime;

/**
 * ライブラリ
 *
 */
require_once 'Smarty-3.1.19/libs/Smarty.class.php';
require_once 'JPHPMailer/jphpmailer.php';

/**
 * モジュール
 *
 */
require_once PATH_MODULES . '/MySession.inc';
require_once PATH_MODULES . '/MySmarty.inc';

/**
 * データアクセスオブジェクト
 *
 */
require_once PATH_DAO . '/load.inc';

/**
 * 共通関数
 *
 */
require_once PATH_FUNCTIONS . '/common.inc';

//--------------------------------------------------
// 共通処理
//--------------------------------------------------

// Smarty
$smarty = new MySmarty();

// JPHPMailer
$mailer = new JPHPMailer();

// 日時
$now = new DateTime();

if (isset($_SERVER['HTTP_HOST'])) {
    // セッション開始
    MySession();

    // 強制SSL
    forwardHttps();

    // 定義値
    $smarty->assign('SET', $SET);

    // 日時とフォーマット
    $smarty->assign('now', $now);
    $smarty->assign('_date_',     '%Y-%m-%d');
    $smarty->assign('_time_',     '%H:%M');
    $smarty->assign('_datetime_', '%Y-%m-%d %H:%M');

    // ラベルと領域
    if (isset($this_dir) && isset($this_label)) {
        $smarty->assign('this_dir',   $this_dir);
        $smarty->assign('this_label', $this_label);
    }

    if (defined('__ACCOUNT__') && __ACCOUNT__ == 'admin') {
        // 管理側
        $AdminsMapper = new AdminsMapper;

        if (!$_admin = $AdminsMapper->isLogin()) {
            // ログインしていない場合はリダイレクト
            if ($_SERVER['SCRIPT_NAME'] != '/admin/login.php'
             && $_SERVER['SCRIPT_NAME'] != '/admin/logout.php'
             && !preg_match('#^/api/#', $_SERVER['SCRIPT_NAME'])
            ) {
                redirect('/admin/login.php');
            }
        }

        // アカウント情報
        $smarty->assign('_admin', isset($_SESSION['_admin']) ? $_SESSION['_admin'] : array());

        if (isset($_SESSION['_admin']['company_id']) && !isEmpty($_SESSION['_admin']['company_id'])) {
            $_company_id = $_SESSION['_admin']['company_id'];
        }

        if (isset($_SESSION['_admin']['tenpo_id']) && !isEmpty($_SESSION['_admin']['tenpo_id'])) {
            $_tenpo_id = $_SESSION['_admin']['tenpo_id'];
        }

    } else {
        // 公開側
        $UsersMapper = new UsersMapper;

        if (!$_user = $UsersMapper->isLogin()) {
            // ログインしていない場合はリダイレクト
            if ($_SERVER['SCRIPT_NAME'] != '/login.php'
             && $_SERVER['SCRIPT_NAME'] != '/logout.php'
             && !preg_match('#^/api/#', $_SERVER['SCRIPT_NAME'])
            ) {
                redirect('/login.php');
            }
        }

        // アカウント情報
        $smarty->assign('_user', isset($_SESSION['_user']) ? $_SESSION['_user'] : array());

        if (isset($_SESSION['_user']['company_id']) && !isEmpty($_SESSION['_user']['company_id'])) {
            $_company_id = $_SESSION['_user']['company_id'];
        }

        if (isset($_SESSION['_user']['tenpo_id']) && !isEmpty($_SESSION['_user']['tenpo_id'])) {
            $_tenpo_id = $_SESSION['_user']['tenpo_id'];
        }
    }

    $CompaniesMapper = new CompaniesMapper;

    if (isset($_company_id)) {
        // 企業情報
        $_company = $CompaniesMapper->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'id = ' => $_company_id)));
        $smarty->assign('_company', $_company);
    }

    $TenposMapper = new TenposMapper;

    if (isset($_tenpo_id)) {
        // 店舗情報
        $_tenpo = $TenposMapper->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'id = ' => $_tenpo_id)));
        $smarty->assign('_tenpo', $_tenpo);
    }
}
