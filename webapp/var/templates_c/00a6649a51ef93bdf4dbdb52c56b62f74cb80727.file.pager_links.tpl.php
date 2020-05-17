<?php /* Smarty version Smarty-3.1.19, created on 2018-12-27 15:11:56
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\common\pager_links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323955c246d2c2b1fe0-30270094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00a6649a51ef93bdf4dbdb52c56b62f74cb80727' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\common\\pager_links.tpl',
      1 => 1536890158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323955c246d2c2b1fe0-30270094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'links' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246d2c2bbac5_78817850',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246d2c2bbac5_78817850')) {function content_5c246d2c2bbac5_78817850($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['links']->value['pages']) {?><div class='pager-link'><?php echo $_smarty_tpl->tpl_vars['links']->value['first'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['back'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['pages'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['next'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['last'];?>
</div><?php }?>
<?php }} ?>
