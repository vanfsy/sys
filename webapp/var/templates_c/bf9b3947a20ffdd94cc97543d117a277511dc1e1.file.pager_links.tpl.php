<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 13:05:10
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/common/pager_links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13518197715c3ffef608c670-42015798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf9b3947a20ffdd94cc97543d117a277511dc1e1' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/common/pager_links.tpl',
      1 => 1536890100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13518197715c3ffef608c670-42015798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'links' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3ffef608f724_12635735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3ffef608f724_12635735')) {function content_5c3ffef608f724_12635735($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['links']->value['pages']) {?><div class='pager-link'><?php echo $_smarty_tpl->tpl_vars['links']->value['first'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['back'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['pages'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['next'];?>
<?php echo $_smarty_tpl->tpl_vars['links']->value['last'];?>
</div><?php }?>
<?php }} ?>
