<?php /* Smarty version Smarty-3.1.19, created on 2019-01-17 10:31:25
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\company\form_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131605c246d2e5b0611-06990001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2e2bbc253d3f977b089d9ca8a72b75b25c69f2e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\company\\form_confirm.tpl',
      1 => 1547688407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131605c246d2e5b0611-06990001',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246d2e630a21_04120887',
  'variables' => 
  array (
    '_caption' => 0,
    '_mode' => 0,
    'this_dir' => 0,
    'token' => 0,
    'params' => 0,
    'tenpos' => 0,
    'tenpo' => 0,
    'users' => 0,
    'user' => 0,
    'SET' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246d2e630a21_04120887')) {function content_5c246d2e630a21_04120887($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>確認<?php }?></div>
<?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/');">一覧に戻る</button>
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/kamoku/');">科目マスタ登録</button>
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/bumon/');">部門マスタ登録</button>
        <button type="button" class="btn btn-default btn-sm" >CSV出力</button>
        <button type="button" class="btn btn-default btn-sm" >保存データのインポート/エクスポート</button>
    </div>
<?php }?>
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
        <label class="col-sm-3 control-label" for="name">企業名</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="settlement_month">決算月</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['settlement_month'], ENT_QUOTES, 'UTF-8', true);?>
 月</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="note">備考</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['note'], ENT_QUOTES, 'UTF-8', true));?>
</div>
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/');">一覧に戻る</button>
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

<?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
    <div class="paragraph">店舗一覧</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/tenpo/add/');">新規登録</button>
    </div>
    
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
                    <th class="text-center">店舗名</th>
                    <th class="text-center">登録日時</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['tenpo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tenpo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tenpos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tenpo']->key => $_smarty_tpl->tpl_vars['tenpo']->value) {
$_smarty_tpl->tpl_vars['tenpo']->_loop = true;
?>
                    <tr>
                        <td class="text-center"><a href="/admin/tenpo/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo sprintf('%05d',$_smarty_tpl->tpl_vars['tenpo']->value->id);?>
</a></td>
                        <td class="text-left truncate"><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</div></td>
                        <td class="text-center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['tenpo']->value->created,'%Y-%m-%d %H:%M');?>
</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/tenpo/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">編集</button>
                            <button type="button" class="btn btn-xs btn-danger" onclick="ajaxTo(null, '/admin/tenpo/remove/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->id, ENT_QUOTES, 'UTF-8', true);?>
', 'get', 'remove');">削除</button>
                        </td>
                    </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['tenpo']->_loop) {
?>
                    <tr>
                        <td class="text-center" colspan="4"><?php if (isset($_smarty_tpl->tpl_vars['params']->value['search'])) {?>検索条件に該当する<?php }?>データがありません。</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    

    <div class="paragraph">アカウント一覧</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/user/add/');">新規登録</button>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="70"></col>
                <col width=""></col>
                <col width="150"></col>
                <col width="150"></col>
                <col width="110"></col>
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">アカウント名</th>
                    <th class="text-center">権限</th>
                    <th class="text-center">登録日時</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                    <tr>
                        <td class="text-center"><a href="/admin/user/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo sprintf('%05d',$_smarty_tpl->tpl_vars['user']->value->id);?>
</a></td>
                        <td class="text-left truncate"><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</div></td>
                        <td class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['USER_AUTH'][$_smarty_tpl->tpl_vars['user']->value->auth], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td class="text-center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->created,'%Y-%m-%d %H:%M');?>
</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/user/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">編集</button>
                            <button type="button" class="btn btn-xs btn-danger" onclick="ajaxTo(null, '/admin/user/remove/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->id, ENT_QUOTES, 'UTF-8', true);?>
', 'get', 'remove');">削除</button>
                        </td>
                    </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['user']->_loop) {
?>
                    <tr>
                        <td class="text-center" colspan="5"><?php if (isset($_smarty_tpl->tpl_vars['params']->value['search'])) {?>検索条件に該当する<?php }?>データがありません。</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div class="btn-wrap">
    </div>
<?php }?>

<style type="text/css">
    /*<![CDATA[*/
        .status {
            display: inline-block;
            padding: 1px 20px;
        }
    /*]]>*/
</style>
<?php }} ?>
