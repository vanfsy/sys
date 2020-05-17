<?php /* Smarty version Smarty-3.1.19, created on 2019-12-18 11:02:26
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/nippo/edit/row_payment_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15679396185ca1d9dddec4f8-94284136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3565f5d55b21e332aba6532abdd130402e7a54c' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/nippo/edit/row_payment_detail.tpl',
      1 => 1576634520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15679396185ca1d9dddec4f8-94284136',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ca1d9dddfef93_62033884',
  'variables' => 
  array (
    'payment_detail_kamoku' => 0,
    'error_payment_detail_kamoku' => 0,
    'num' => 0,
    'set_kamoku' => 0,
    'params' => 0,
    'error_payment_detail_amount' => 0,
    'payment_detail_amount' => 0,
    'error_payment_detail_tekiyo' => 0,
    'payment_detail_tekiyo' => 0,
    'error_payment_detail_bumon' => 0,
    'set_bumon' => 0,
    'payment_detail_bumon' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ca1d9dddfef93_62033884')) {function content_5ca1d9dddfef93_62033884($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_options.php';
?><div class="payment-detail-row">
    <div class="col-btn"><button type="button" class="btn btn-default btn-icon" name="payment-detail-remove">×</button></div>
    <div class="inner">
        
        <!--保存されている科目を表示-->
        <?php if (isset($_smarty_tpl->tpl_vars['payment_detail_kamoku']->value)) {?>
        
        <div class="<?php if (isset($_smarty_tpl->tpl_vars['error_payment_detail_kamoku']->value)) {?>has-error<?php }?>"><select class="form-control" name="payment_details[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
][kamoku][]"><?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['set_kamoku']->value['kamoku_payment_kari'],'output'=>$_smarty_tpl->tpl_vars['set_kamoku']->value['kamoku_payment_kari'],'selected'=>$_smarty_tpl->tpl_vars['payment_detail_kamoku']->value),$_smarty_tpl);?>
</select></div>
        
        <!--初期、プラス（+）ボタンを押した時のデフォルト表示-->
        <?php } else { ?>
        
        <div class="<?php if (isset($_smarty_tpl->tpl_vars['error_payment_detail_kamoku']->value)) {?>has-error<?php }?>">
                <select class="form-control" name="payment_details[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
][kamoku][]">
                    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['set_kamoku']->value['kamoku_payment_kari'],'output'=>$_smarty_tpl->tpl_vars['set_kamoku']->value['kamoku_payment_kari'],'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kari_defaultflg']),$_smarty_tpl);?>

                </select>
        </div>
        
        <?php }?>

    

<div class="<?php if (isset($_smarty_tpl->tpl_vars['error_payment_detail_amount']->value)) {?>has-error<?php }?>"><input class="form-control payment-detail-amount" type="number" name="payment_details[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
][amount][]" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['payment_detail_amount']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"></div>
        <div class="<?php if (isset($_smarty_tpl->tpl_vars['error_payment_detail_tekiyo']->value)) {?>has-error<?php }?>"><input class="form-control" type="text" name="payment_details[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
][tekiyo][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_detail_tekiyo']->value, ENT_QUOTES, 'UTF-8', true);?>
"></div>
        <div class="<?php if (isset($_smarty_tpl->tpl_vars['error_payment_detail_bumon']->value)) {?>has-error<?php }?>"><select class="form-control" name="payment_details[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
][bumon][]"><?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['set_bumon']->value,'output'=>$_smarty_tpl->tpl_vars['set_bumon']->value,'selected'=>$_smarty_tpl->tpl_vars['payment_detail_bumon']->value),$_smarty_tpl);?>
</select></div>
    </div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['error_payment_detail_kamoku']->value)||isset($_smarty_tpl->tpl_vars['error_payment_detail_amount']->value)||isset($_smarty_tpl->tpl_vars['error_payment_detail_tekiyo']->value)||isset($_smarty_tpl->tpl_vars['error_payment_detail_bumon']->value)) {?>
    <div class="has-error" style="padding-left:56px;">
        <?php if ($_smarty_tpl->tpl_vars['error_payment_detail_kamoku']->value) {?><p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_payment_detail_kamoku']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error_payment_detail_amount']->value) {?><p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_payment_detail_amount']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error_payment_detail_tekiyo']->value) {?><p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_payment_detail_tekiyo']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error_payment_detail_bumon']->value) {?><p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_payment_detail_bumon']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
    </div>
<?php }?>
<?php }} ?>
