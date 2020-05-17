<?php /* Smarty version Smarty-3.1.19, created on 2019-12-17 20:28:20
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/nippo/show/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20730133605c4912e6e559d9-32035735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23fd41dfd8158a29ca606ca9aeb194ac1c7895ba' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/nippo/show/index.tpl',
      1 => 1576579560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20730133605c4912e6e559d9-32035735',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c4912e6ed9bf0_92507728',
  'variables' => 
  array (
    'params' => 0,
    'this_label' => 0,
    'kurikoshi' => 0,
    'total_sales_without_others' => 0,
    'key' => 0,
    'total_deposit' => 0,
    '_company' => 0,
    '_user' => 0,
    'total_payment' => 0,
    'cash' => 0,
    'balance' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4912e6ed9bf0_92507728')) {function content_5c4912e6ed9bf0_92507728($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        .money {
            text-align: right;
        }

        .kurikoshi,
        .total-deposit,
        .total-payment {
            text-align: right;
        }

        /* 売上 */
        .sales-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sales-row>div:nth-child(odd) {
            flex: 1 1 60%;
        }

        .sales-row>div:nth-child(even) {
            flex: 1 1 40%;
        }

        /* 預金 */
        .deposit-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .deposit-row>div:nth-child(odd) {
            flex: 1 1 60%;
        }

        .deposit-row>div:nth-child(even) {
            flex: 1 1 40%;
        }

        /* 支払 */
        .payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .payment-row.record {
            flex-wrap: wrap;
            margin:           8px 0;
            padding:          8px;
            background-color: #FFE699;
        }

        .payment-row>div:nth-child(odd) {
            flex: 1 1 60%;
        }

        .payment-row>div:nth-child(even) {
            flex: 1 1 40%;
        }

        .payment-row>div.photo {
            flex: 1 1 100%;
        }

        .payment-row>div.amount {
            flex: 1 1 100%;
            display: flex;
            margin-top: 15px;
            border-top: 1px #555555 dashed;
        }

        .payment-row .photo {
            margin-bottom: 4px;
            text-align:    center;
        }

        .payment-row .photo img {
            width:     100%;
            max-width: <?php echo @constant('RECEIPT_THMB_SIZE');?>
px;
            border:    1px #CCCCCC dotted;
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
<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars((smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日 ')).($_smarty_tpl->tpl_vars['this_label']->value), ENT_QUOTES, 'UTF-8', true);?>
</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label class="col-sm-4 control-label" for="weather">天気</label>
            <div class="col-sm-8">
                <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['weather'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="kurikoshi">Ⅰ 前日より繰越した現金 (つり銭現金含)</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="kurikoshi money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kurikoshi']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="sales">Ⅱ 本日売上額等</label>
            <div class="col-sm-8 sales-rows">
                <div class="sales-row">
                    <div class="uneditable">① 現金売上</div>
                    <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['sales_cash'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">② クレジット</div>
                    <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['sales_credit'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">③ 掛売上</div>
                    <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['sales_kakeuri'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable text-right">合計(①＋②＋③)： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total_sales_without_others']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">④ 掛売回収</div>
                    <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['sales_others'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                
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
                    <div class="deposit-row">
                        <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['deposits']['kamoku'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
</div>
                        <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['deposits']['amount'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                    </div>
                <?php } ?>
                <div class="deposit-row">
                    <div class="uneditable text-right">合計： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total_deposit']->value, ENT_QUOTES, 'UTF-8', true);?>
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
                    <div class="payment-row record">
                        <div class="photo">
                            <a href="<?php echo @constant('URL_UPLOAD');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
" target="blank">
                                <img src="<?php echo @constant('URL_UPLOAD');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_user']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/thmb.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
">
                            </a>
                        </div>
                        <div class="amount">
                            <div class="uneditable text-right">レシートの合計： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['amount'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="payment-row">
                    <div class="uneditable text-right">合計： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total_payment']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="payment-row">
                    <div class="uneditable"></div>
                    <div class="uneditable text-right">レシートの枚数： <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['receipt_cnt'], ENT_QUOTES, 'UTF-8', true);?>
 枚</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="cash">Ⅴ 本日現金残高 (Ⅰ＋Ⅱ①③－Ⅲ－Ⅳ)</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cash']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="register">Ⅵ 本日レジ現金残高</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['register'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="balance">Ⅶ 現金過不足 (Ⅵ－Ⅴ)</label>
            <div class="col-sm-8">
                <input type="hidden" name="balance" value="0">
                <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['balance']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/nippo/?y=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y');?>
&m=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'m');?>
');">戻る</button>
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
        });
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
