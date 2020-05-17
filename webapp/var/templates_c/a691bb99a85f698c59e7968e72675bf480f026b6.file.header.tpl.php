<?php /* Smarty version Smarty-3.1.19, created on 2019-04-01 18:21:33
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1467643655c403e3b957dc4-18875204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a691bb99a85f698c59e7968e72675bf480f026b6' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/common/header.tpl',
      1 => 1548927720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1467643655c403e3b957dc4-18875204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c403e3b965967_91466864',
  'variables' => 
  array (
    '_description' => 0,
    '_title' => 0,
    'now' => 0,
    '_css' => 0,
    '_user' => 0,
    '_nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c403e3b965967_91466864')) {function content_5c403e3b965967_91466864($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['_description']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_description']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars(@constant('SYSTEM_DESCRIPTION'), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>">
<title><?php if ($_smarty_tpl->tpl_vars['_title']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_title']->value, ENT_QUOTES, 'UTF-8', true);?>
｜<?php }?><?php echo htmlspecialchars(@constant('SYSTEM_NAME'), ENT_QUOTES, 'UTF-8', true);?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="/inc/img/favicon.ico">
<link rel="stylesheet" type="text/css" href="/inc/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/inc/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/inc/lity/2.3.1/lity.min.css">
<link rel="stylesheet" type="text/css" href="/inc/css/user.css?<?php echo $_smarty_tpl->tpl_vars['now']->value->format('his');?>
">
<script type="text/javascript" src="/inc/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/inc/jquery/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/inc/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/inc/lity/2.3.1/lity.min.js"></script>
<script type="text/javascript" src="/inc/js/user.js?<?php echo $_smarty_tpl->tpl_vars['now']->value->format('his');?>
"></script>
<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>

</head>
<body>
<div id="filter"></div>
<div id="wrapper">
    <div id="filter"><div class="spinner"></div></div>
    <div id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><?php echo nl2br(htmlspecialchars(@constant('SYSTEM_NAME'), ENT_QUOTES, 'UTF-8', true));?>
</a>
                    <?php if (isset($_smarty_tpl->tpl_vars['_user']->value['name'])) {?>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="true">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <?php }?>
                    <div class="navbar-text"><span id="who_is"><?php if (isset($_smarty_tpl->tpl_vars['_user']->value['name'])) {?>【<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
】様<?php }?></span></div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['_nav']->value!==false) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['_user']->value['name'])) {?>
                        <div class="collapse navbar-collapse" id="navbar-items">
                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($_smarty_tpl->tpl_vars['_user']->value['auth']==@constant('USER_AUTH_TENPO')) {?><li class="text-right"><a href="/nippo/">日報一覧</a></li><?php }?>
                                <li class="text-right"><a href="/sales/">店舗売上</a></li>
                                <?php if ($_smarty_tpl->tpl_vars['_user']->value['auth']==@constant('USER_AUTH_TENPO')) {?><li class="text-right"><a href="/settings/">設定</a></li><?php }?>
                                <li class="text-right"><a href="javascript:void(0);" onclick="linkTo('/logout.php', 'logout');">ログアウト</a></li>
                            </ul>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
        </nav>
    </div>
    <!-- /header -->
<?php }} ?>
