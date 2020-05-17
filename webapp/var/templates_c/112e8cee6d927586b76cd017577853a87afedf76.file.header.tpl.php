<?php /* Smarty version Smarty-3.1.19, created on 2019-07-08 16:58:39
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7828776515c3ffef4338145-82867556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '112e8cee6d927586b76cd017577853a87afedf76' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/common/header.tpl',
      1 => 1562572667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7828776515c3ffef4338145-82867556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3ffef4344f89_37116945',
  'variables' => 
  array (
    '_description' => 0,
    '_title' => 0,
    'now' => 0,
    '_css' => 0,
    '_hide' => 0,
    '_admin' => 0,
    '_nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3ffef4344f89_37116945')) {function content_5c3ffef4344f89_37116945($_smarty_tpl) {?>
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
<link rel="stylesheet" type="text/css" href="/inc/css/admin.css?<?php echo $_smarty_tpl->tpl_vars['now']->value->format('his');?>
">
<script type="text/javascript" src="/inc/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/inc/jquery/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/inc/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/inc/lity/2.3.1/lity.min.js"></script>
<script type="text/javascript" src="/inc/js/admin.js?<?php echo $_smarty_tpl->tpl_vars['now']->value->format('his');?>
"></script>
<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>

</head>
<body>
<div id="filter"></div>
<div id="wrapper">
    <div id="filter"><div class="spinner"></div></div>
    <div id="header"<?php if ($_smarty_tpl->tpl_vars['_hide']->value) {?> style="display:none;"<?php }?>>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/admin/"><?php echo nl2br(htmlspecialchars(@constant('SYSTEM_NAME'), ENT_QUOTES, 'UTF-8', true));?>
</a>
                    <?php if (isset($_smarty_tpl->tpl_vars['_admin']->value['name'])) {?>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="true">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <?php }?>
                    <div class="navbar-text"><span id="who_is"></span></div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['_nav']->value!==false) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['_admin']->value['name'])) {?>
                        <div class="collapse navbar-collapse" id="navbar-items">
                            <ul class="nav navbar-nav navbar-right">
                                <!--<?php echo $_smarty_tpl->getSubTemplate ('admin/common/nav_mobile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
-->
                                <li class="text-right"><a href="javascript:void(0);" onclick="linkTo('/admin/logout.php', 'logout');">ログアウト</a></li>
                            </ul>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
        </nav>
        <?php if (isset($_smarty_tpl->tpl_vars['_admin']->value['name'])) {?>
            <?php echo $_smarty_tpl->getSubTemplate ('admin/common/nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
    </div>
    <!-- /header -->
<?php }} ?>
