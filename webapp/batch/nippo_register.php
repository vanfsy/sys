<?php

/**
 * バッチ処理
 *
 *  [実行時間]
 *    毎日 午前 0時
 *
 *  [実行条件]
 *    A：店舗の稼働フラグが「停止」である。
 *    B：過去に日報を登録されたことがある（一度でも稼働したことがある）。
 *
 *  [処理内容]
 *    上記ABに該当する店舗に対し、ステータス「非稼働」の日報を新規登録する。
 *
 */

require_once '../configs/config.inc';

$params = getRequestParams();
$errors = array();

// ログファイル作成
$log_file = PATH_LOG . '/nippo_register_' . $now->format('Ymd') . '.log';

if (!file_exists($log_file)) {
    touch($log_file);
    chmod($log_file, 0777);
}

$log = file_get_contents($log_file);

// 実行開始日時
$started = new DateTime();
$log .= $rec = $started->format('[Y-m-d H:i]') . ' started.. ';
echo $rec;

$cnt = 0;   // 処理数
$err = 0;   // エラー数

// 処理 -----------------------------------------------------------------------------

$TenposMapper = new TenposMapper;
$NipposMapper = new NipposMapper;

// 条件に該当する店舗情報を取得
$query = array();

$query[] = "SELECT * FROM `tenpos` AS t";
$query[] = "WHERE t.`is_deleted` = :flag_off";
$query[] = "AND t.`is_operated` = :flag_off";                                           // A
$query[] = "AND (SELECT COUNT(*) FROM `nippos` AS n WHERE n.`tenpo_id` = t.`id`) > 0";  // B

$query = implode(' ', $query);

$binds = array(
    'flag_off' => FLAG_OFF,
);

if ($tenpos = $TenposMapper->fetchAll($query, $binds)) {
    foreach ($tenpos as $tenpo) {
        $nippo = new NipposModel();

        $nippo->company_id = $tenpo->company_id;
        $nippo->tenpo_id   = $tenpo->id;
        $nippo->date       = $now->format('c');
        $nippo->status     = NIPPO_STATUS_NEUTRAL;
        $nippo->created    = $now->format('c');

        if (!$NipposMapper->insert($nippo)) {
            $err++;
        }

        $cnt++;
    }
}

// ----------------------------------------------------------------------------------

// 実行完了日時
$completed = new DateTime();
$log .= $rec = 'completed! ' . $started->diff($completed)->format('(%s sec)') . ' rows:' . $cnt . ' errors:' . $err . LINE_FEED;
echo $rec;

file_put_contents($log_file, $log);
exit;
