<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:52:53
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\bumon\form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:272785c32a2e577d7a4-34554463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef7317431e0e0e4e8292e34057cd12205e0c94e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\bumon\\form_input.tpl',
      1 => 1544079434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272785c32a2e577d7a4-34554463',
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
  'unifunc' => 'content_5c32a2e57e75c1_49306651',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32a2e57e75c1_49306651')) {function content_5c32a2e57e75c1_49306651($_smarty_tpl) {?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
　<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
<div class="btn-wrap-sub">
    <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo $_smarty_tpl->tpl_vars['company']->value->id;?>
');">企業情報に戻る</button>
</div>
<p>弥生会計で使用している部門を以下に張り付けて登録ボタンを押下してください。</p>
<div class="inner">
    <form id="sales" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['bumon'])) {?> has-error<?php }?>">
            <div>
                <textarea class="form-control" name="bumon" rows="10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['bumon'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['bumon'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['bumon'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('sales');">登録</button>
        </div>
    </form>
</div>
<style type="text/css">
    /*<![CDATA[*/
        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        form {
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
