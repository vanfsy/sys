<?php /* Smarty version Smarty-3.1.19, created on 2018-12-27 15:19:25
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12135c246eed648254-63286495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2151e2b163f55915618180e4dfba7b0f37c081f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\login.tpl',
      1 => 1545009342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12135c246eed648254-63286495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246eed6e90b4_36632873',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246eed6e90b4_36632873')) {function content_5c246eed6e90b4_36632873($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
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
<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>'企業・店舗様ログイン','_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <div class="login">
        <div class="paragraph">企業・店舗様ログイン</div>
        <form id="login" method="post" autocomplete="off">
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login_id'])||isset($_smarty_tpl->tpl_vars['errors']->value['login'])) {?> has-error<?php }?>">
                <label for="gender">ログインID</label>
                <input type="text" class="form-control" name="login_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['login_id'], ENT_QUOTES, 'UTF-8', true);?>
">
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login_id'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['login_id'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])||isset($_smarty_tpl->tpl_vars['errors']->value['login'])) {?> has-error<?php }?>">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password" value="">
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['password'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['login'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
            <div class="btn-wrap">
                <button type="submit" class="btn btn-default btn-suitable">ログイン</button>
            </div>
        </form>
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
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
