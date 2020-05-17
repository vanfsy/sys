<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 13:06:05
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/kamoku/form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6711646775c3fff2d398708-45537591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a73a55a897497230d7ae6e1f883368e98b810da' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/kamoku/form_input.tpl',
      1 => 1544079420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6711646775c3fff2d398708-45537591',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'params' => 0,
    '_caption' => 0,
    'company' => 0,
    'token' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3fff2d3affb9_85778402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3fff2d3affb9_85778402')) {function content_5c3fff2d3affb9_85778402($_smarty_tpl) {?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
　<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
<div class="btn-wrap-sub">
    <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo $_smarty_tpl->tpl_vars['company']->value->id;?>
');">企業情報に戻る</button>
</div>
<p>
    弥生会計で使用している部門を以下に張り付けて登録ボタンを押下してください。<br>
    科目詳細がある場合は、[科目名] [タブ文字もしくは空白] [科目詳細] と入力してください。
</p>
<div class="inner">
    <form id="sales" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
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
    <form id="deposit" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
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
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
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
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
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

            // 権限変更時の処理
            $('[name=auth]').on('change', function() {
                $('[name=tenpo_id]').attr('disabled', ($(this).val() == <?php echo @constant('USER_AUTH_COMPANY');?>
)).val('');
            });
        });
    /*]]>*/
</script>
<?php }} ?>
