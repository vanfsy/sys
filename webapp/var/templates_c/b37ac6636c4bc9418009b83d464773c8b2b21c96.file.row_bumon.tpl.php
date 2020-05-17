<?php /* Smarty version Smarty-3.1.19, created on 2019-04-09 14:48:40
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/row_bumon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13782838135ca1bb6f6f5a13-03351417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b37ac6636c4bc9418009b83d464773c8b2b21c96' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/row_bumon.tpl',
      1 => 1554787200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13782838135ca1bb6f6f5a13-03351417',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ca1bb6f6fdb22_18040602',
  'variables' => 
  array (
    'error_bumons_bumon' => 0,
    'set_bumons' => 0,
    'bumons_bumon' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ca1bb6f6fdb22_18040602')) {function content_5ca1bb6f6fdb22_18040602($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_options.php';
?><div class="bumon-row">
    <div class="inner">
        <div class="remove">
            <button type="button" class="btn btn-default btn-icon" name="bumon_remove">×</button>
        </div>
        <div class="bumon<?php if (isset($_smarty_tpl->tpl_vars['error_bumons_bumon']->value)) {?> has-error<?php }?>">
            <select class="form-control" name="bumons[bumon][]">
                <option value=""></option>
                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['set_bumons']->value,'output'=>$_smarty_tpl->tpl_vars['set_bumons']->value,'selected'=>$_smarty_tpl->tpl_vars['bumons_bumon']->value),$_smarty_tpl);?>

            </select>
            <?php if ($_smarty_tpl->tpl_vars['error_bumons_bumon']->value) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error_bumons_bumon']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
        </div>
    </div>
</div>
<?php }} ?>
