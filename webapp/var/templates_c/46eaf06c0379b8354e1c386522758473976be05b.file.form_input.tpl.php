<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 13:06:41
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/user/form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4141298425c3fff511fd776-36297846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46eaf06c0379b8354e1c386522758473976be05b' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/user/form_input.tpl',
      1 => 1546931040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4141298425c3fff511fd776-36297846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_company' => 0,
    '_caption' => 0,
    '_mode' => 0,
    'params' => 0,
    'errors' => 0,
    'SET' => 0,
    'set_tenpo_names' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3fff512265b5_24060027',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3fff512265b5_24060027')) {function content_5c3fff512265b5_24060027($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_radios.php';
if (!is_callable('smarty_function_html_options')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_options.php';
?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
 入力</div>
<form id="confirm" class="form-horizontal" action="./confirm.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='edit') {?><input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value!='add') {?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">ID</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo sprintf('%05d',$_smarty_tpl->tpl_vars['params']->value['id']);?>
</div>
            </div>
        </div>
    <?php }?>
    
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['auth'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="auth">権限</label>
        <div class="col-sm-9">
            <div class="radio"><?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['SET']->value['USER_AUTH'],'name'=>'auth','selected'=>(($tmp = @$_smarty_tpl->tpl_vars['params']->value['auth'])===null||$tmp==='' ? @constant('USER_AUTH_COMPANY') : $tmp),'separator'=>'　'),$_smarty_tpl);?>
</div>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['auth'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['auth'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['tenpo_id'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="tenpo_id">店舗</label>
        <div class="col-sm-9">
            <select class="form-control" name="tenpo_id"<?php if (empty($_smarty_tpl->tpl_vars['params']->value['auth'])||$_smarty_tpl->tpl_vars['params']->value['auth']==@constant('USER_AUTH_COMPANY')) {?> disabled="disabled"<?php }?>>
                <option value="">-- 以下から選択 --</option>
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['set_tenpo_names']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['tenpo_id']),$_smarty_tpl);?>

            </select>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['tenpo_id'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="name">名前（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login_id'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="login_id">ログインID（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="login_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['login_id'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login_id'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['login_id'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="password">パスワード（必須）</label>
        <div class="col-sm-9">
            <div class="hidden"><input class="form-control" type="password" name="password" value=""  ></div>
            <input class="form-control" type="password" name="password" value="<?php if (isset($_GET['back'])||isset($_GET['error'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['password'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" placeholder="<?php if ($_smarty_tpl->tpl_vars['_mode']->value=='edit') {?>パスワードを変更される場合のみ入力してください。<?php }?>">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['password'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="btn-wrap">
        <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='edit') {?>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">キャンセル</button>
        <?php } else { ?>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">キャンセル</button>
        <?php }?>
        <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('confirm');">確認</button>
    </div>
</form>
<style type="text/css">
    /*<![CDATA[*/
        .input-group.tsubo,
        .input-group.staff {
            width: 170px;
            margin-right:  20px;
            margin-bottom: 8px;
            float: left;
        }

        .input-group-addon.unit {
            width: 70px;
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
