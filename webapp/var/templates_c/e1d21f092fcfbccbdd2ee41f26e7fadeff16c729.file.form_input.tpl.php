<?php /* Smarty version Smarty-3.1.19, created on 2019-12-18 10:57:25
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15272091975c3ffefbda53a6-53588580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d21f092fcfbccbdd2ee41f26e7fadeff16c729' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/form_input.tpl',
      1 => 1576634220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15272091975c3ffefbda53a6-53588580',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3ffefbdd3742_63757964',
  'variables' => 
  array (
    '_company' => 0,
    '_caption' => 0,
    '_mode' => 0,
    'params' => 0,
    'errors' => 0,
    'SET' => 0,
    'set_kamoku_sales_cash_kari' => 0,
    'set_kamoku_sales_cash_kashi' => 0,
    'set_kamoku_sales_credit_kari' => 0,
    'set_kamoku_sales_credit_kashi' => 0,
    'set_kamoku_sales_kakeuri_kari' => 0,
    'set_kamoku_sales_kakeuri_kashi' => 0,
    'set_kamoku_sales_others_kari' => 0,
    'set_kamoku_sales_others_kashi' => 0,
    'set_kamoku_deposit_kari' => 0,
    'set_kamoku_deposit_kashi' => 0,
    'set_kamoku_payment_kari' => 0,
    'set_kamoku_payment_kashi' => 0,
    'key' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3ffefbdd3742_63757964')) {function content_5c3ffefbdd3742_63757964($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_options.php';
if (!is_callable('smarty_function_html_radios')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_radios.php';
if (!is_callable('smarty_function_html_checkboxes')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_checkboxes.php';
?><script type="text/javascript" src="/admin/tenpo/bumon.js"></script>
<div class="bumon-new-row"><?php echo $_smarty_tpl->getSubTemplate ('admin/tenpo/row_bumon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
<div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
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
        <div class="col-sm-9 kamokus">
            <div class="inner">
                <p>【現金売上】</p>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_cash_kari'])) {?> has-error<?php }?>">
                        <div>＜借方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_cash_kari','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_cash_kari']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_cash_kari']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_cash_kari']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_cash_kari'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_cash_kari'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_cash_kashi'])) {?> has-error<?php }?>">
                        <div>＜貸方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_cash_kashi','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_cash_kashi']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_cash_kashi']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_cash_kashi']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_cash_kashi'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_cash_kashi'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【クレジット】</p>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_credit_kari'])) {?> has-error<?php }?>">
                        <div>＜借方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_credit_kari','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_credit_kari']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_credit_kari']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_credit_kari']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_credit_kari'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_credit_kari'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_credit_kashi'])) {?> has-error<?php }?>">
                        <div>＜貸方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_credit_kashi','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_credit_kashi']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_credit_kashi']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_credit_kashi']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_credit_kashi'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_credit_kashi'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【掛売上】</p>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_kakeuri_kari'])) {?> has-error<?php }?>">
                        <div>＜借方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_kakeuri_kari','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_kakeuri_kari']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_kakeuri_kari']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_kakeuri_kari']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_kakeuri_kari'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_kakeuri_kari'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_kakeuri_kashi'])) {?> has-error<?php }?>">
                        <div>＜貸方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_kakeuri_kashi','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_kakeuri_kashi']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_kakeuri_kashi']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_kakeuri_kashi']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_kakeuri_kashi'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_kakeuri_kashi'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【掛売回収】</p>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_others_kari'])) {?> has-error<?php }?>">
                        <div>＜借方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_others_kari','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_others_kari']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_others_kari']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_others_kari']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_others_kari'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_others_kari'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_others_kashi'])) {?> has-error<?php }?>">
                        <div>＜貸方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_sales_others_kashi','values'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_others_kashi']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_sales_others_kashi']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_sales_others_kashi']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_others_kashi'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_sales_others_kashi'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【現金預入額等】</p>
                <div>
                    <div class="checkbox<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit_kari'])) {?> has-error<?php }?>">
                        <div>＜借方＞ <small><a href="javascript:void(0);" name="check_all">すべて選択</a>｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small></div>
                        <?php echo smarty_function_html_checkboxes(array('name'=>'kamoku_deposit_kari','values'=>$_smarty_tpl->tpl_vars['set_kamoku_deposit_kari']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_deposit_kari']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kari']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit_kari'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit_kari'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit_kashi'])) {?> has-error<?php }?>">
                        <div>＜貸方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_deposit_kashi','values'=>$_smarty_tpl->tpl_vars['set_kamoku_deposit_kashi']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_deposit_kashi']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kashi']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit_kashi'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_deposit_kashi'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
            </div>

            
<style>
.squea2 input[type='radio'] {
    outline-style: solid; outline-width: 2px; outline-color: #999999;

}
    
.squea2 input[type='radio']:checked {
    outline-style: solid; outline-width: 4px; outline-color: black;
}
</style>
            
            
            <div class="inner">
                <p>【現金支払額等】</p>
                <div>
                    <div class="checkbox<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kari'])) {?> has-error<?php }?>">
                        <div>＜借方＞ <small><a href="javascript:void(0);" name="check_all">すべて選択</a>｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small></div>
                        <!---->
                        <div><span style="color:blue;">科目右横の☐印にチェックを入れた場合は初期に表示されます。</span></div>
                        
                        <?php echo smarty_function_html_checkboxes(array('name'=>'kamoku_payment_kari','values'=>$_smarty_tpl->tpl_vars['set_kamoku_payment_kari']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_payment_kari']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kari']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kari'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kari'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kari_defaultflg'])) {?><p class="help-block"><small style="color:red;">エラー：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kari_defaultflg'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
                <div>
                    <div class="radio<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kashi'])) {?> has-error<?php }?>">
                        <div>＜貸方＞</div>
                        <?php echo smarty_function_html_radios(array('name'=>'kamoku_payment_kashi','values'=>$_smarty_tpl->tpl_vars['set_kamoku_payment_kashi']->value,'output'=>$_smarty_tpl->tpl_vars['set_kamoku_payment_kashi']->value,'selected'=>$_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kashi']),$_smarty_tpl);?>

                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kashi'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['kamoku_payment_kashi'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['bumon'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="bumon">この店舗で使用する部門</label>
        <div class="col-sm-9 bumon-rows">
            <p>基本</p>
            <?php  $_smarty_tpl->tpl_vars['bumon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bumon']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value['bumons']['bumon']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['bumon']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['bumon']->key => $_smarty_tpl->tpl_vars['bumon']->value) {
$_smarty_tpl->tpl_vars['bumon']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['bumon']->key;
 $_smarty_tpl->tpl_vars['bumon']->index++;
 $_smarty_tpl->tpl_vars['bumon']->first = $_smarty_tpl->tpl_vars['bumon']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bumons']['first'] = $_smarty_tpl->tpl_vars['bumon']->first;
?>
                <?php $_smarty_tpl->tpl_vars['bumons_bumon'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['bumons']['bumon'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                <?php $_smarty_tpl->tpl_vars['error_bumons_bumon'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['bumons']['bumon'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                <?php echo $_smarty_tpl->getSubTemplate ('admin/tenpo/row_bumon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bumons']['first']) {?><p>それ以外</p><?php }?>
            <?php }
if (!$_smarty_tpl->tpl_vars['bumon']->_loop) {
?>
                <?php echo $_smarty_tpl->getSubTemplate ('admin/tenpo/row_bumon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <p>それ以外</p>
            <?php } ?>
        </div>
        <div class="col-sm-offset-3">
            <div class="col-xs-3">
                <button type="button" class="btn btn-default btn-icon" name="bumon_add">＋</button>
            </div>
        </div>
    </div>
    <div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['is_operated'])) {?> has-error<?php }?>">
        <label class="col-sm-3 control-label" for="is_operated">稼働状況</label>
        <div class="col-sm-9">
            <div class="radio">
                <?php echo smarty_function_html_radios(array('name'=>'is_operated','options'=>$_smarty_tpl->tpl_vars['SET']->value['TENPO_IS_OPERATED'],'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['params']->value['is_operated'])===null||$tmp==='' ? @constant('FLAG_ON') : $tmp)),$_smarty_tpl);?>

                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['is_operated'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['is_operated'], ENT_QUOTES, 'UTF-8', true);?>
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
        .btn-icon {
            width:   34px;
            padding: 6px;
        }

        .bumon-new-row {
            display: none;
        }

        /* 使用科目 */
        .kamokus .inner {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .kamokus .inner>p {
            flex: 1 1 100%;
            margin:      8px 0 0;
            font-weight: bold;
        }

        .kamokus .inner>div {
            flex: 0 0 50%;
        }

        .kamokus .inner .radio>div,
        .kamokus .inner .checkbox>div {
            margin-bottom: 8px;
        }

        .kamokus .inner .radio label,
        .kamokus .inner .checkbox label {
            min-width: 45%;
        }

        /* 使用部門 */
        .bumon-col,
        .bumon-row {
            margin-left:   -4px;
            margin-right:  -4px;
            margin-bottom: 8px;
        }

        .bumon-col .inner,
        .bumon-row .inner {
            display: flex;
        }

        .bumon-col .inner>div,
        .bumon-row .inner>div {
            margin: 0 4px;
        }

        .bumon-col .inner>div.remove,
        .bumon-row .inner>div.remove {
            flex: 1 1 auto;
        }

        .bumon-col .inner>div.bumon,
        .bumon-row .inner>div.bumon {
            flex: 0 1 100%;
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

            adjustRadios();
            adjustCheckboxes();

            // 使用部門と科目のひもづけ1行目の削除ボタンを非活性化
            $('.bumon-rows .bumon-row:first .inner .remove button[name="bumon_remove"]').attr('disabled', true);

            $('input[type="radio"]').on('click', function() {
                adjustRadios();
                adjustCheckboxes();
            });

            $('input[type="checkbox"]').on('click', function() {
                adjustCheckboxes();
            });

            // すべて選択押下時
            $('a[name="check_all"]').on('click', function() {
                $(this).parent().parent().parent().find('input[type="checkbox"]').prop('checked', true);
                adjustCheckboxes();
            });

            // すべて解除押下時
            $('a[name="release_all"]').on('click', function() {
                $(this).parent().parent().parent().find('input[type="checkbox"]').prop('checked', false);
                adjustCheckboxes();
            });
        });

        // ラジオボタンの表示を調整する
        function adjustRadios()
        {
            $('input[type="radio"]').each(function() {
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('selected');
                } else {
                    $(this).parent().removeClass('selected');
                }
            });
        }

        // チェックボックスの表示を調整する
        function adjustCheckboxes()
        {
            $('input[type="checkbox"]').each(function() {
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('selected');
                } else {
                    $(this).parent().removeClass('selected');
                }
            });
        }
    /*]]>*/
</script>
<?php }} ?>
