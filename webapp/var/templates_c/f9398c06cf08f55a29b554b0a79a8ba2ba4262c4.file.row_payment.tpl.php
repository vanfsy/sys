<?php /* Smarty version Smarty-3.1.19, created on 2018-12-27 17:27:17
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\nippo\show\row_payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58215c248ce5342ee8-39726501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9398c06cf08f55a29b554b0a79a8ba2ba4262c4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\nippo\\show\\row_payment.tpl',
      1 => 1545889053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58215c248ce5342ee8-39726501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_payment_photo' => 0,
    'payment_photo' => 0,
    '_user' => 0,
    'params' => 0,
    'error_payment_amount' => 0,
    'payment_amount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c248ce538bab0_03222107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c248ce538bab0_03222107')) {function content_5c248ce538bab0_03222107($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><div class="payment-row">
    <div class="inner">
        <div class="remove">
            <button type="button" class="btn btn-default btn-icon" name="payment-remove">×</button>
        </div>
        <div>
            <div class="photo<?php if (isset($_smarty_tpl->tpl_vars['error_payment_photo']->value)) {?> has-error<?php }?>">
                <input class="holder" type="hidden" name="payments[photo][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_photo']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                <label class="select-file">
                    <input class="uploader" type="file" name="uploader_payment_photo" accept="image/jpeg">
                    <span class="viewer" style="margin:auto;text-align:center;">
                        <?php if ($_smarty_tpl->tpl_vars['payment_photo']->value&&file_exists(((((((((@constant('PATH_UPLOAD')).('/nippo/')).($_smarty_tpl->tpl_vars['_user']->value['company_id'])).('/')).($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'])).('/')).((smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d')))).('/')).($_smarty_tpl->tpl_vars['payment_photo']->value))) {?>
                            <img class="photo" src="<?php echo @constant('URL_UPLOAD');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/thmb.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_photo']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                        <?php } elseif ($_smarty_tpl->tpl_vars['payment_photo']->value&&file_exists(((((((((@constant('PATH_UPLOAD_TMP')).('/nippo/')).($_smarty_tpl->tpl_vars['_user']->value['company_id'])).('/')).($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'])).('/')).((smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d')))).('/')).($_smarty_tpl->tpl_vars['payment_photo']->value))) {?>
                            <img class="photo" src="<?php echo @constant('URL_UPLOAD_TMP');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/thmb.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_photo']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                        <?php } else { ?>
                            <img class="photo" src="/inc/img/no_photo.png">
                        <?php }?>
                    </span>
                </label>
                <button type="button" class="btn btn-default rotate-photo" <?php if (!$_smarty_tpl->tpl_vars['payment_photo']->value) {?> style="display:none;"<?php }?>><i class="glyphicon glyphicon-repeat"></i> 写真を回転</button>
                <?php if ($_smarty_tpl->tpl_vars['error_payment_photo']->value) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_payment_photo']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
            <div class="amount<?php if (isset($_smarty_tpl->tpl_vars['error_payment_amount']->value)) {?> has-error<?php }?>">
                <div>合計金額</div>
                <input class="form-control money" type="number" name="payments[amount][]" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['payment_amount']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? 0 : $tmp);?>
" min=0>
                <?php if ($_smarty_tpl->tpl_vars['error_payment_amount']->value) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_payment_amount']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
