<?php /* Smarty version Smarty-3.1.19, created on 2018-12-27 15:11:56
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\company\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187665c246d2c1980f1-98100146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f0b15a28264fdeeb92bffefb0b0c552bcfb3839' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\company\\index.tpl',
      1 => 1540441005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187665c246d2c1980f1-98100146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this_label' => 0,
    'this_dir' => 0,
    'params' => 0,
    'company' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246d2c236a08_60675929',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246d2c236a08_60675929')) {function content_5c246d2c236a08_60675929($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>($_smarty_tpl->tpl_vars['this_label']->value).('一覧'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
一覧</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm btn-search-toggle">検索</button>
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/add/');">新規登録</button>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ((('admin/').($_smarty_tpl->tpl_vars['this_dir']->value)).('/form_search.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('admin/common/pager_scope.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="70"></col>
                <col width=""></col>
                <col width="150"></col>
                <col width="110"></col>
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">企業名</th>
                    <th class="text-center">登録日時</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['company']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['params']->value['companies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value) {
$_smarty_tpl->tpl_vars['company']->_loop = true;
?>
                    <tr>
                        <td class="text-center"><a href="/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo sprintf('%05d',$_smarty_tpl->tpl_vars['company']->value->id);?>
</a></td>
                        <td class="text-left truncate"><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</div></td>
                        <td class="text-center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['company']->value->created,'%Y-%m-%d %H:%M');?>
</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">編集</button>
                            <button type="button" class="btn btn-xs btn-danger" onclick="ajaxTo(null, '/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/remove/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
', 'get', 'remove');">削除</button>
                        </td>
                    </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['company']->_loop) {
?>
                    <tr>
                        <td class="text-center" colspan="4"><?php if (isset($_smarty_tpl->tpl_vars['params']->value['search'])) {?>検索条件に該当する<?php }?>データがありません。</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('admin/common/pager_links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="btn-wrap">
        <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/add/')">新規登録</button>
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
