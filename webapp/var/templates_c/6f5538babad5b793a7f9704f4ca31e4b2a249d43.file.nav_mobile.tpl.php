<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 13:05:10
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/common/nav_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11405030855c3ffef6079119-96922914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f5538babad5b793a7f9704f4ca31e4b2a249d43' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/common/nav_mobile.tpl',
      1 => 1536890100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11405030855c3ffef6079119-96922914',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3ffef607c1b2_93476686',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3ffef607c1b2_93476686')) {function content_5c3ffef607c1b2_93476686($_smarty_tpl) {?>

<li class="text-right hidden-md hidden-lg"><a href="/admin/user/">加盟店管理</a></li>

<?php if (strpos($_SERVER['REQUEST_URI'],'/group/')!==false||strpos($_SERVER['REQUEST_URI'],'/user/')!==false) {?>
    <li class="text-right hidden-md hidden-lg"><a href="/admin/user/">加盟店 - </a></li>
    <li class="text-right hidden-md hidden-lg"><a href="/admin/group/">グループ - </a></li>
<?php }?>
<li class="text-right hidden-md hidden-lg"><a href="/admin/ingredient/">材料マスタ</a></li>
<li class="text-right hidden-md hidden-lg"><a href="/admin/dish/">お料理管理</a></li>
<li class="text-right hidden-md hidden-lg"><a href="/admin/schedule/">お弁当管理</a></li>
<li class="text-right hidden-md hidden-lg"><a href="/admin/info/">お知らせ管理</a></li>
<?php }} ?>
