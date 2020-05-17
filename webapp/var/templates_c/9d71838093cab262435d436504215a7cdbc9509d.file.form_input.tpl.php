<?php /* Smarty version Smarty-3.1.19, created on 2019-01-18 11:13:58
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/company/form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20083128735c413666eeb717-52687824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d71838093cab262435d436504215a7cdbc9509d' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/company/form_input.tpl',
      1 => 1544683320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20083128735c413666eeb717-52687824',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_caption' => 0,
    '_mode' => 0,
    'params' => 0,
    'errors' => 0,
    'SET' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c413666f010d1_47130985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c413666f010d1_47130985')) {function content_5c413666f010d1_47130985($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_options.php';
?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
 入力</div>
<form id="confirm" class="form-horizontal" action="./confirm.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
        <label class="col-sm-3 control-label" for="name">企業名（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="">
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['settlement_month'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="settlement_month">決算月（必須）</label>
        <div class="col-sm-9">
            <div class="input-group">
                <select class="form-control" name="settlement_month">
                    <option value="">----</option>
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SET']->value['DATETIME']['MONTH'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['settlement_month']),$_smarty_tpl);?>

                </select>
                <div class="input-group-addon unit" style="width:70px;">月</div>
            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['settlement_month'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['settlement_month'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['note'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="note">備考</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="note" rows="5" placeholder=""><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['note'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['note'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['note'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
    <div class="btn-wrap">
        <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='edit') {?>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">キャンセル</button>
        <?php } else { ?>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/');">キャンセル</button>
        <?php }?>
        <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('confirm');">確認</button>
    </div>

</form>
<style type="text/css">
    /*<![CDATA[*/
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
        });
    /*]]>*/
</script>
<?php }} ?>
