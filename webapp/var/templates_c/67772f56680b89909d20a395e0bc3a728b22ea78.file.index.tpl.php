<?php /* Smarty version Smarty-3.1.19, created on 2019-12-18 11:26:28
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/company/output/detail/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13852991895df6ed2fcedce0-85112881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67772f56680b89909d20a395e0bc3a728b22ea78' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/company/output/detail/index.tpl',
      1 => 1576579380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13852991895df6ed2fcedce0-85112881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5df6ed2fd2c728_50780473',
  'variables' => 
  array (
    'this_label' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5df6ed2fd2c728_50780473')) {function content_5df6ed2fd2c728_50780473($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>($_smarty_tpl->tpl_vars['this_label']->value).('情報'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    
    <!--ここだけCSV出力用の読み込みに変更する-->
    <?php echo $_smarty_tpl->getSubTemplate ('admin/company/output/form_confirm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_mode'=>'detail','_caption'=>($_smarty_tpl->tpl_vars['this_label']->value).('情報')), 0);?>

    
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