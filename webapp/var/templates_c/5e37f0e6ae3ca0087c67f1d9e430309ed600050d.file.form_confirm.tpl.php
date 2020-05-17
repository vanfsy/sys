<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 16:09:41
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\tenpo\form_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153985c246d340ba9b2-83791261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e37f0e6ae3ca0087c67f1d9e430309ed600050d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\tenpo\\form_confirm.tpl',
      1 => 1546931046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153985c246d340ba9b2-83791261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246d3413f194_38695588',
  'variables' => 
  array (
    '_company' => 0,
    '_caption' => 0,
    '_mode' => 0,
    'token' => 0,
    'params' => 0,
    'SET' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246d3413f194_38695588')) {function content_5c246d3413f194_38695588($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
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
        <label class="col-sm-3 control-label" for="name">店舗名</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="tel">電話番号</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="postal">郵便番号</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['postal'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="prefecture">都道府県</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['PREFECTURE'][$_smarty_tpl->tpl_vars['params']->value['prefecture']], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="address">所在地</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['address'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control-label" for="address">使用科目</label>
        <div class="col-sm-9">
            <div class="uneditable">
                <div>【売上】</div>
                <div>
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales'])&&count($_smarty_tpl->tpl_vars['params']->value['kamoku_sales'])>0) {?>
                        <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['kamoku_sales'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                    <?php }?>
                </div>
                <br>
                <div>【預金】</div>
                <div>
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit'])&&count($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit'])>0) {?>
                        <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                    <?php }?>
                </div>
                <br>
                <div>【仕入】</div>
                <div>
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_purchase'])&&count($_smarty_tpl->tpl_vars['params']->value['kamoku_purchase'])>0) {?>
                        <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['kamoku_purchase'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                    <?php }?>
                </div>
                <br>
                <div>【経費】</div>
                <div>
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_expense'])&&count($_smarty_tpl->tpl_vars['params']->value['kamoku_expense'])>0) {?>
                        <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['kamoku_expense'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                    <?php }?>
                </div>
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
    /*]]>*/
</style>
<?php }} ?>
