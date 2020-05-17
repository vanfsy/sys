<?php /* Smarty version Smarty-3.1.19, created on 2018-12-27 15:11:56
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\common\nav_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108635c246d2c2447d1-91698564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeef5f6fce9789b9e8515f1d9ba2f798ff3718d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\common\\nav_mobile.tpl',
      1 => 1536890158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108635c246d2c2447d1-91698564',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246d2c24eea6_86545721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246d2c24eea6_86545721')) {function content_5c246d2c24eea6_86545721($_smarty_tpl) {?>

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
