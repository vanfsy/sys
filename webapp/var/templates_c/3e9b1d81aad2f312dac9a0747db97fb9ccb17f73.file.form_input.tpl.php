<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 16:09:50
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\tenpo\form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70415c246d36dd3621-69637731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e9b1d81aad2f312dac9a0747db97fb9ccb17f73' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\tenpo\\form_input.tpl',
      1 => 1546931046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70415c246d36dd3621-69637731',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c246d36ebcf16_76339642',
  'variables' => 
  array (
    '_company' => 0,
    '_caption' => 0,
    '_mode' => 0,
    'params' => 0,
    'errors' => 0,
    'SET' => 0,
    'set_kamokus' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c246d36ebcf16_76339642')) {function content_5c246d36ebcf16_76339642($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\function.html_options.php';
if (!is_callable('smarty_function_html_checkboxes')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\function.html_checkboxes.php';
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
    
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="name">店舗名（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['tel'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="tel">電話番号</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="tel" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['tel'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['postal'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="postal">郵便番号</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="postal" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['postal'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['postal'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['postal'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['prefecture'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="prefecture">都道府県</label>
        <div class="col-sm-9">
            <select class="form-control" name="prefecture">
                <option value="">-- 以下から選択 --</option>
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SET']->value['PREFECTURE'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['prefecture']),$_smarty_tpl);?>

            </select>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['prefecture'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['prefecture'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['address'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="address">所在地</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="address" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['address'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['address'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['address'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control-label" for="kamoku">使用科目</label>
        <div class="col-sm-9">
            <div class="checkbox<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales'])) {?> has-error<?php }?>">
                <div>【売上】</div>
                <?php echo smarty_function_html_checkboxes(array('name'=>'kamoku_sales','values'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_sales'],'output'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_sales'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales']),$_smarty_tpl);?>

                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
            <br>
            <div class="checkbox<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit'])) {?> has-error<?php }?>">
                <div>【預金】</div>
                <?php echo smarty_function_html_checkboxes(array('name'=>'kamoku_deposit','values'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_deposit'],'output'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_deposit'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_deposit']),$_smarty_tpl);?>

                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
            <br>
            <div class="checkbox<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_purchase'])) {?> has-error<?php }?>">
                <div>【仕入】</div>
                <?php echo smarty_function_html_checkboxes(array('name'=>'kamoku_purchase','values'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_purchase'],'output'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_purchase'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_purchase']),$_smarty_tpl);?>

                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_purchase'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_purchase'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
            <br>
            <div class="checkbox<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_expense'])) {?> has-error<?php }?>">
                <div>【経費】</div>
                <?php echo smarty_function_html_checkboxes(array('name'=>'kamoku_expense','values'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_expense'],'output'=>$_smarty_tpl->tpl_vars['set_kamokus']->value['kamoku_expense'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_expense']),$_smarty_tpl);?>

                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_expense'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_expense'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
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
        .checkbox>div {
            margin: 8px 0;
        }

        .checkbox label {
            min-width: 30%;
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
));
            });
        });
    /*]]>*/
</script>
<?php }} ?>
