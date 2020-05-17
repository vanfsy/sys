<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:51:46
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\kamoku\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118215c32a2a2bb8953-28761565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3d210d754953be0deb0c8f84ae27d0f0c373579' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\kamoku\\index.tpl',
      1 => 1543993871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118215c32a2a2bb8953-28761565',
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
  'unifunc' => 'content_5c32a2a2c1cb35_18489939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32a2a2c1cb35_18489939')) {function content_5c32a2a2c1cb35_18489939($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>($_smarty_tpl->tpl_vars['this_label']->value).('登録'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <?php echo $_smarty_tpl->getSubTemplate ((('admin/').($_smarty_tpl->tpl_vars['this_dir']->value)).('/form_input.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_mode'=>'add','_caption'=>($_smarty_tpl->tpl_vars['this_label']->value).('登録')), 0);?>

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
