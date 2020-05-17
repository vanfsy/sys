<?php /* Smarty version Smarty-3.1.19, created on 2019-04-04 15:45:49
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/user/form_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:775572435c40394e0a9e06-19699290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5500b064bd188e854519b5e2785553a7f03a9742' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/user/form_confirm.tpl',
      1 => 1554360180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775572435c40394e0a9e06-19699290',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c40394e0c51e8_17707475',
  'variables' => 
  array (
    '_company' => 0,
    '_caption' => 0,
    '_mode' => 0,
    'token' => 0,
    'params' => 0,
    'SET' => 0,
    'set_tenpo_names' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c40394e0c51e8_17707475')) {function content_5c40394e0c51e8_17707475($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>確認<?php }?></div>
<form id="<?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>complete<?php } else { ?>detail<?php }?>" class="form-horizontal" method="post" action="<?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>./execute.php<?php }?>">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?><input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
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
    <div class="form-group">
        <label class="col-sm-3 control-label" for="auth">権限</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['USER_AUTH'][$_smarty_tpl->tpl_vars['params']->value['auth']], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['params']->value['auth']==@constant('USER_AUTH_TENPO')) {?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="tenpo_id">店舗</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['set_tenpo_names']->value[$_smarty_tpl->tpl_vars['params']->value['tenpo_id']], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </div>
        </div>
    <?php }?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="name">名前</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="login_id">ログインID</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['login_id'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">パスワード</label>
        <div class="col-sm-9">
            <div class="uneditable"><small><?php if (!$_smarty_tpl->tpl_vars['params']->value['password']) {?>-- 変更なし --<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['password'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><span class="drowssap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['drowssap'], ENT_QUOTES, 'UTF-8', true);?>
</span><a href="javascript:void(0);" onclick="$('.drowssap').fadeIn('fast'); $(this).hide();">パスワードを表示</a><?php }?><?php }?></small></div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="created">登録日時</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['created'],'%Y-%m-%d %H:%M');?>
</div>
            </div>
        </div>
    <?php }?>
    <div class="btn-wrap">
        <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">一覧に戻る</button>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">編集</button>
            <button type="button" class="btn btn-danger btn-suitable" onclick="ajaxTo(null, '/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/remove/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
', 'get', 'remove');">削除</button>
        <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='edit') {?>
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/edit/<?php echo $_smarty_tpl->tpl_vars['params']->value['id'];?>
?back');">入力に戻る</button>
            <?php } else { ?>
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/add/?back');">入力に戻る</button>
            <?php }?>
            <button type="button" class="btn btn-primary btn-suitable" onclick="submitTo('complete');">決定</button>
        <?php }?>
    </div>
</form>
<style type="text/css">
    /*<![CDATA[*/
        .status {
            display: inline-block;
            padding: 1px 20px;
        }

        .drowssap {
            display: none;
        }
    /*]]>*/
</style>
<?php }} ?>
