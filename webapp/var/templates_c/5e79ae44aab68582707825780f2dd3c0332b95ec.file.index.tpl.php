<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 17:09:56
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/detail/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3343856515c4038543ba635-04269103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e79ae44aab68582707825780f2dd3c0332b95ec' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/detail/index.tpl',
      1 => 1546909080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3343856515c4038543ba635-04269103',
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
  'unifunc' => 'content_5c4038543dd241_57210565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4038543dd241_57210565')) {function content_5c4038543dd241_57210565($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>($_smarty_tpl->tpl_vars['this_label']->value).('詳細'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <?php echo $_smarty_tpl->getSubTemplate ((('admin/').($_smarty_tpl->tpl_vars['this_dir']->value)).('/form_confirm.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_mode'=>'detail','_caption'=>($_smarty_tpl->tpl_vars['this_label']->value).('詳細')), 0);?>

    <div class="btn-wrap">
        <div class="btn-group">
            <button type="button" class="btn btn-default" onclick="submitTo('detail', '/admin/nippo/');"><i class="glyphicon glyphicon-calendar"></i> 日報 　</button>
        </div>
    </div>
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
