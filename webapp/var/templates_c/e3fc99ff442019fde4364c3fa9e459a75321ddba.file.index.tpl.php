<?php /* Smarty version Smarty-3.1.19, created on 2019-01-24 10:21:40
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/settings/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6844479505c491324921096-12227739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3fc99ff442019fde4364c3fa9e459a75321ddba' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/settings/index.tpl',
      1 => 1548217380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6844479505c491324921096-12227739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this_label' => 0,
    'token' => 0,
    'params' => 0,
    'errors' => 0,
    '_tenpo' => 0,
    'SET' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c491324a0a452_48182829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c491324a0a452_48182829')) {function content_5c491324a0a452_48182829($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_radios.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        .radio label, .checkbox label {
            margin-left: 13px;
        }
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>$_smarty_tpl->tpl_vars['this_label']->value,'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
    <form id="tenpo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
        <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['is_operated'])) {?> has-error<?php }?>">
            <label class="col-sm-3 control-label" for="is_operated">店舗名</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</div>
            </div>
        </div>
        <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['is_operated'])) {?> has-error<?php }?>">
            <label class="col-sm-3 control-label" for="is_operated">稼働状況</label>
            <div class="col-sm-9">
                <div class="radio">
                    <?php echo smarty_function_html_radios(array('name'=>'is_operated','options'=>$_smarty_tpl->tpl_vars['SET']->value['TENPO_IS_OPERATED'],'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['params']->value['is_operated'])===null||$tmp==='' ? @constant('FLAG_ON') : $tmp)),$_smarty_tpl);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['is_operated'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['is_operated'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('tenpo', './confirm.php', 'post', 'setting');">設定</button>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        // ページ内でフォームの内容が変更されたかどうか
        var is_changed = false;

        $(document).ready(function() {
            // ページ内でフォームの内容が変更された時の処理
            $('form input, form select, form textarea').on('change', function() {
                is_changed = true;
            });

            // ページ離脱時の処理
            $(window).on('beforeunload', function() {
                if (is_changed) {
                    return true;
                }
            });

            if (location.hash == '#ok') {
                alert('設定を更新しました。');
                window.history.pushState('', document.title, window.location.pathname);
            }
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
