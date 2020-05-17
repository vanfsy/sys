<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 16:27:34
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\nippo\input\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52085c244bb8413b97-08974635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49f08fe44ae6a18dd3729d0c2569c7dbc6f4a636' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\nippo\\input\\index.tpl',
      1 => 1546940354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52085c244bb8413b97-08974635',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c244bb8695219_25328388',
  'variables' => 
  array (
    'params' => 0,
    'this_label' => 0,
    'token' => 0,
    '_user' => 0,
    'errors' => 0,
    'total_sales_without_others' => 0,
    'total_sales' => 0,
    'key' => 0,
    'total_deposit' => 0,
    'total_payment' => 0,
    'is_possible_close' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c244bb8695219_25328388')) {function content_5c244bb8695219_25328388($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        .btn-icon {
            width:   34px;
            padding: 6px;
        }

        .money {
            text-align: right;
        }

        .kurikoshi,
        .total-deposit,
        .total-payment {
            text-align: right;
        }

        .deposit-new-row,
        .payment-new-row {
            display: none;
        }

        /* 預金 */
        .deposit-row {
            margin-left:   -4px;
            margin-right:  -4px;
            margin-bottom: 8px;
        }

        .deposit-row .inner {
            display: flex;
        }

        .deposit-row .inner>div {
            margin: 0 4px;
        }

        .deposit-row .inner>div.remove {
            flex: 0 0 auto;
        }

        .deposit-row .inner>div.kamoku {
            flex: 1 1 80%;
        }

        .deposit-row .inner>div.vlaue {
            flex: 0 1 auto;
        }

        /* 支払 */
        .payment-row {
            margin-left:   -4px;
            margin-right:  -4px;
            margin-bottom: 8px;
        }

        .payment-row .inner {
            display:          flex;
            padding:          4px 0;
            background-color: #FFE699;
        }

        .payment-row .inner>div {
            flex: 1 1 auto;
            margin: 0 4px;
        }

        .payment-row .inner>div.remove {
            flex: 0 0 auto;
        }

        .payment-row .inner .photo {
            margin-bottom: 4px;
            text-align:    center;
        }

        .select-file {
            position:      relative;
            margin-bottom: 0;
            cursor:        pointer;
        }

        .select-file .uploader {
            display: none;
        }

        .select-file .viewer {
            display:     inline-block;
            color:       #333333;
            font-weight: normal;
        }

        .select-file .viewer img.photo {
            width:     100%;
            max-width: <?php echo @constant('RECEIPT_THMB_SIZE');?>
px;
            border:    1px #CCCCCC dotted;
        }

        .select-file .viewer img.photo:hover {
            border: 1px #999999 solid;
        }

        .select-file .btn {
            height: 34px;
        }
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>(smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日 ')).($_smarty_tpl->tpl_vars['this_label']->value),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<script type="text/javascript" src="/nippo/input/deposit.js"></script>
<script type="text/javascript" src="/nippo/input/payment.js"></script>
<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars((smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日 ')).($_smarty_tpl->tpl_vars['this_label']->value), ENT_QUOTES, 'UTF-8', true);?>
</div>
    <div class="deposit-new-row"><?php echo $_smarty_tpl->getSubTemplate ('nippo/input/row_deposit.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
    <div class="payment-new-row"><?php echo $_smarty_tpl->getSubTemplate ('nippo/input/row_payment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="mode" value="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="path" value="/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y');?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'m');?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'d');?>
/">
        <div class="form-group">
            <label class="col-sm-4 control-label" for="weather">天気</label>
            <div class="col-sm-8<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['weather'])) {?> has-error<?php }?>">
                <input class="form-control" type="text" name="weather" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['weather'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="晴れ">
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['weather'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['weather'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="kurikoshi">Ⅰ 前日より繰越した現金 (つり銭現金含)</label>
            <div class="col-sm-8">
                <input type="hidden" name="kurikoshi" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kurikoshi'], ENT_QUOTES, 'UTF-8', true);?>
">
                <div class="uneditable text-right"><span class="kurikoshi money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kurikoshi'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="sales">Ⅱ 本日売上額等</label>
            <div class="col-sm-8">
                <div class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_cash'])) {?>has-error<?php }?>">
                    <div>① 現金売上</div>
                    <input class="form-control money" type="number" name="sales_cash" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['params']->value['sales_cash'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_cash'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['sales_cash'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
                <div class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_credit'])) {?>has-error<?php }?>">
                    <div>② クレジット</div>
                    <input class="form-control money" type="number" name="sales_credit" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['params']->value['sales_credit'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_credit'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['sales_credit'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
                <div class="uneditable text-right">合計(①＋②)： <span class="total-sales-without-others money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_sales_without_others']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                <div class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_others'])) {?>has-error<?php }?>">
                    <div>③ その他 (売掛回収等)</div>
                    <input class="form-control money" type="number" name="sales_others" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['params']->value['sales_others'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_others'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['sales_others'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
                <div class="uneditable text-right">合計： <span class="total-sales money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_sales']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="deposits">Ⅲ 現金預金額等</label>
            <div class="col-sm-8 deposit-rows">
                <?php  $_smarty_tpl->tpl_vars['deposit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['deposit']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value['deposits']['kamoku']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['deposit']->key => $_smarty_tpl->tpl_vars['deposit']->value) {
$_smarty_tpl->tpl_vars['deposit']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['deposit']->key;
?>
                    <?php $_smarty_tpl->tpl_vars['deposit_kamoku'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['deposits']['kamoku'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['deposit_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['deposits']['amount'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['error_deposit_kamoku'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['deposits']['kamoku'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['error_deposit_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['deposits']['amount'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ('nippo/input/row_deposit.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php } ?>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-3">
                    <button type="button" class="btn btn-default btn-icon" name="deposit-add">＋</button>
                </div>
                <div class="col-xs-9">
                    <div class="uneditable text-right">合計： <span class="total-deposit money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_deposit']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="payments">Ⅳ 本日現金支払額</label>
            <div class="col-sm-8 payment-rows">
                <?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value['payments']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['payment']->key;
?>
                    <?php $_smarty_tpl->tpl_vars['payment_photo'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['payment_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['payments']['amount'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['error_payment_photo'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['payments']['photo'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['error_payment_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['payments']['amount'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ('nippo/input/row_payment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php } ?>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-3">
                    <button type="button" class="btn btn-default btn-icon" name="payment-add">＋</button>
                </div>
                <div class="col-xs-9">
                    <div class="uneditable text-right">合計： <span class="total-payment money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_payment']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-12<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['receipt_cnt'])) {?> has-error<?php }?>">
                    <div style="margin-top:15px;">レシートの枚数</div>
                    <input class="form-control money" type="number" name="receipt_cnt" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['receipt_cnt'], ENT_QUOTES, 'UTF-8', true);?>
" min=0>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['receipt_cnt'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['receipt_cnt'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="cash">Ⅴ 本日現金残高 (Ⅰ＋Ⅱ①③－Ⅲ－Ⅳ)</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="cash money"></span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="register">Ⅵ 本日レジ現金残高</label>
            <div class="col-sm-8<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['register'])) {?> has-error<?php }?>">
                <input class="form-control money" type="number" name="register" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['params']->value['register'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" min=0>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['register'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['register'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="balance">Ⅶ 現金過不足 (Ⅵ－Ⅴ)</label>
            <div class="col-sm-8">
                <input type="hidden" name="balance" value="0">
                <div class="uneditable text-right"><span class="balance money"></span></div>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/nippo/');">戻る</button>
            <?php if (!isset($_smarty_tpl->tpl_vars['params']->value['status'])||$_smarty_tpl->tpl_vars['params']->value['status']==@constant('NIPPO_STATUS_PROCESSING')) {?>
                <button type="button" class="btn btn-default btn-suitable" onclick="is_changed=false; $('[name=\'mode\']').val('save'); submitTo('nippo', './confirm.php', 'post', 'この内容を保存します。\nよろしいですか？');">保存</button>
            <?php }?>
        </div>
        <div class="btn-wrap">
            <?php if ($_smarty_tpl->tpl_vars['params']->value['status']==@constant('NIPPO_STATUS_PROCESSING')) {?>
                <button type="button" class="btn btn-primary btn-suitable"<?php if (!$_smarty_tpl->tpl_vars['is_possible_close']->value) {?> disabled<?php } else { ?> onclick="is_changed=false; $('[name=\'mode\']').val('close'); submitTo('nippo', './confirm.php', 'post', 'この内容で日次締めを行います。\n日次締め後の修正はできなくなります。\nよろしいですか？');"<?php }?>>日次締め</button>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['status']>=@constant('NIPPO_STATUS_CLOSED')) {?>
                <button type="button" class="btn btn-default btn-suitable" disabled>日次締め済</button>
            <?php }?>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
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

            $('span.money').moneyFormat();

            recalculation();

            // Ⅱ 本日売上額等変更時の処理
            $('[name^="sales_"]').on('change', function() {
                recalculation();
            });

            // Ⅵ 本日レジ現金残高変更時の処理
            $('[name="register"]').on('change', function() {
                recalculation();
            });
        });

        // 再計算
        function recalculation()
        {
            // Ⅱ 本日売上額等 合計（①＋②）
            $('.total-sales-without-others').text($('[name^="sales_cash"], [name^="sales_credit"]').sum());

            // Ⅱ 本日売上額等 合計
            $('.total-sales').text($('[name^="sales_"]').sum());

            // Ⅲ 現金預金額等 合計
            $('.total-deposit').text($('[name="deposits[amount][]"]').sum());

            // Ⅳ 本日現金支払額 合計
            $('.total-payment').text($('[name="payments[amount][]"]').sum());

            // Ⅴ 本日現金残高
            n1 = $('.kurikoshi').sum({decorate:false});
            n2 = $('[name="sales_cash"], [name="sales_others"]').sum({decorate:false});
            n3 = $('[name="deposits[amount][]"]').sum({decorate:false});
            n4 = $('[name="payments[amount][]"]').sum({decorate:false});
            n5 = (n1 + n2 - n3 - n4);
            $('.cash').text(n5);
            $('.cash').text($('.cash').sum());

            // Ⅶ 現金過不足
            n6 = $('[name="register"]').sum({decorate:false});
            n7 = (n6 - n5);
            $('[name="balance"]').val(n7);
            $('.balance').text(n7);
            $('.balance').text($('.balance').sum());
        }
    /*]]>*/
</script>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
