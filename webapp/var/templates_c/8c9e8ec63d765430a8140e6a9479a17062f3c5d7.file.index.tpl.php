<?php /* Smarty version Smarty-3.1.19, created on 2019-04-19 12:42:29
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/kamoku/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6790534825c3fff2d370030-37552986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c9e8ec63d765430a8140e6a9479a17062f3c5d7' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/kamoku/index.tpl',
      1 => 1555644600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6790534825c3fff2d370030-37552986',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3fff2d393574_10264373',
  'variables' => 
  array (
    'this_label' => 0,
    'params' => 0,
    '_company' => 0,
    'token' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3fff2d393574_10264373')) {function content_5c3fff2d393574_10264373($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        .inner {
            display: flex;
            flex-wrap: wrap;
        }

        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        form {
            flex: 0 0 50%;
            padding:      15px;
            padding-left: 0;
        }
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
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
　<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
登録</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo $_smarty_tpl->tpl_vars['_company']->value->id;?>
');">企業情報に戻る</button>
    </div>
    <p>
        弥生会計で使用している部門を以下に張り付けて登録ボタンを押下してください。<br>
        補助科目がある場合は、[科目名] [タブ文字もしくは空白] [補助科目] と入力してください。
    </p>
    <div class="inner">
        <form id="sales" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales'])) {?> has-error<?php }?>">
                <label for="kamoku_sales">売上</label>
                <div>
                    <textarea class="form-control" name="kamoku_sales" rows="10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('sales');">登録</button>
            </div>
        </form>
        <form id="sales_debt" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_debt'])) {?> has-error<?php }?>">
                <label for="kamoku_sales_debt">売上債務</label>
                <div>
                    <textarea class="form-control" name="kamoku_sales_debt" rows="10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_debt'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_debt'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_debt'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('sales_debt');">登録</button>
            </div>
        </form>
        <form id="deposit" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit'])) {?> has-error<?php }?>">
                <label for="kamoku_deposit">預金</label>
                <div>
                    <textarea class="form-control" name="kamoku_deposit" rows="10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('deposit');">登録</button>
            </div>
        </form>
        <form id="purchase" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_purchase'])) {?> has-error<?php }?>">
                <label for="kamoku_purchase">仕入</label>
                <div>
                    <textarea class="form-control" name="kamoku_purchase" rows="10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_purchase'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_purchase'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_purchase'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('purchase');">登録</button>
            </div>
        </form>
        <form id="expense" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_expense'])) {?> has-error<?php }?>">
                <label for="kamoku_expense">経費</label>
                <div>
                    <textarea class="form-control" name="kamoku_expense" rows="10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_expense'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_expense'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_expense'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('expense');">登録</button>
            </div>
        </form>
    </div>
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
                alert('科目マスタを更新しました。');
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
