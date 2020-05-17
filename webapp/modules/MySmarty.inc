<?php

/**
 * Smartyラッパクラス
 *
 */

// Smarty2.x用
/*
class MySmarty extends Smarty
{
    function __construct()
    {
        // テンプレートが呼び出される毎に強制的にコンパイルを行う（true:有効 false:無効）
        $this->force_compile = true;

        // テンプレートディレクトリ
        $this->template_dir = PATH_TEMPLATES;

        // テンプレートキャッシュディレクトリ
        $this->compile_dir = PATH_TEMPLATES_C;

        // 自作プラグインディレクトリ
        array_push($this->plugins_dir, 'plugins/mine');

        parent::__construct();
    }
}
*/

// Smarty3.x用
class MySmarty extends Smarty
{
    function __construct()
    {
        parent::__construct();

        $this->setTemplateDir(PATH_TEMPLATES);
        $this->setCompileDir(PATH_TEMPLATES_C);
        $this->setCacheDir(PATH_TEMPLATES_CACHE);
        $this->setConfigDir(PATH_TEMPLATES_CONFIG);

        //$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->caching = 0;
    }
}