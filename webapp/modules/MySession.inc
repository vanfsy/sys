<?php

/**
 * セッション関数
 *
 */
function MySession()
{
    ini_set('session.name',            'SID');      // セッション名
    ini_set('session.cache_expire',    180);        // セッションページの生存期間を分単位で指定
    ini_set('session.gc_probability',  1);          // リクエストに対して、セッションごみファイル削除処理が走る確率
    ini_set('session.gc_maxlifetime',  60 * 60);    // データが'ごみ'とみなされてから消去されるまでの秒数
    ini_set('session.cookie_lifetime', 0);          // ブラウザに送信するクッキーの有効期間を秒数で指定
    ini_set('session.use_cookies',     1);          // クッキーを使用:1 使用しない:0
    session_save_path(PATH_SESSION);                // 現在のセッションデータ保存パスを設定
    session_cache_limiter('none');                  // ブラウザのキャッシュを制御(none:残す)
    session_start();
}
