<?php /* Smarty version Smarty-3.1.19, created on 2018-12-27 17:49:05
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\nippo\show\row_deposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77005c248ce5313743-33327769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85e8be0b07f28805de870a65c32727328e8e717f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\nippo\\show\\row_deposit.tpl',
      1 => 1545900543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77005c248ce5313743-33327769',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c248ce5330826_52975759',
  'variables' => 
  array (
    'deposit_kamoku' => 0,
    'deposit_amount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c248ce5330826_52975759')) {function content_5c248ce5330826_52975759($_smarty_tpl) {?><div class="deposit-row">
    <div class="inner">
        <div class="kamoku">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['deposit_kamoku']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
        <div class="amount">
            <div class="uneditable text-right"><span class="money"><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['deposit_amount']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? 0 : $tmp);?>
</span></div>
        </div>
    </div>
</div>
<?php }} ?>
