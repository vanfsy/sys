<?php /* Smarty version Smarty-3.1.19, created on 2019-12-17 20:17:51
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/nippo/input/row_deposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1537835195c403e4c301a01-59754941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e411c0bcf68eddf257f2bf7d06c713c4d24e57e2' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/nippo/input/row_deposit.tpl',
      1 => 1576579560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1537835195c403e4c301a01-59754941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c403e4c30a2c8_64113921',
  'variables' => 
  array (
    'error_deposit_kamoku' => 0,
    'set_kamoku' => 0,
    'deposit_kamoku' => 0,
    'error_deposit_amount' => 0,
    'deposit_amount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c403e4c30a2c8_64113921')) {function content_5c403e4c30a2c8_64113921($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_options.php';
?><div class="deposit-row">
    <div class="inner">
        <div class="remove">
            <button type="button" class="btn btn-default btn-icon" name="deposit-remove">×</button>
        </div>
        <div class="kamoku<?php if (isset($_smarty_tpl->tpl_vars['error_deposit_kamoku']->value)) {?> has-error<?php }?>">
            <select class="form-control" name="deposits[kamoku][]">
                <option value=""></option>
                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['set_kamoku']->value['kamoku_deposit_kari'],'output'=>$_smarty_tpl->tpl_vars['set_kamoku']->value['kamoku_deposit_kari'],'selected'=>$_smarty_tpl->tpl_vars['deposit_kamoku']->value),$_smarty_tpl);?>

            </select>
            <?php if ($_smarty_tpl->tpl_vars['error_deposit_kamoku']->value) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_deposit_kamoku']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['error_deposit_amount']->value) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_deposit_amount']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
        <div class="amount<?php if (isset($_smarty_tpl->tpl_vars['error_deposit_amount']->value)) {?> has-error<?php }?>">
            <input class="form-control money" type="number" name="deposits[amount][]" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['deposit_amount']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? 0 : $tmp);?>
" min=0>
        </div>
    </div>
</div>

<?php }} ?>
