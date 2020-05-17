<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 13:06:07
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/bumon/form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1922709435c3fff2fb201e3-24320700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dda3008d5663cb189db40fd26a784887f60f680d' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/bumon/form_input.tpl',
      1 => 1544079420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1922709435c3fff2fb201e3-24320700',
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
  'unifunc' => 'content_5c3fff2fb31aa4_92556785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3fff2fb31aa4_92556785')) {function content_5c3fff2fb31aa4_92556785($_smarty_tpl) {?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
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
