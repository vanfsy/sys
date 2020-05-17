<?php /* Smarty version Smarty-3.1.19, created on 2019-01-24 12:50:43
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/edit/confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19863188845c4936130da864-77931417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdcd0e8ecd51f5479478689ae9aba37cc786147c' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/edit/confirm.tpl',
      1 => 1544147940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19863188845c4936130da864-77931417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this_label' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c49361316e592_72712294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c49361316e592_72712294')) {function content_5c49361316e592_72712294($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>($_smarty_tpl->tpl_vars['this_label']->value).('編集'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <?php echo $_smarty_tpl->getSubTemplate ((('admin/').($_smarty_tpl->tpl_vars['this_dir']->value)).('/form_confirm.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_mode'=>'edit','_caption'=>($_smarty_tpl->tpl_vars['this_label']->value).('編集')), 0);?>

</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        $(document).ready(function() {
        });
    /*]]>*/
</script>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
