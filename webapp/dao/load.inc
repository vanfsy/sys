<?php

/**
 * クラスファイルをロード
 *
 */

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);

spl_autoload_register(function($class) {
    include_once strtr($class, '\_', '//') . '.php';
});
