<?php /* Smarty version Smarty-3.1.19, created on 2019-04-05 11:38:48
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/nippo/edit/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18868129715ca1d9ddd654e3-41190298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5dc529c4cb6aab8c6ef63c4224f6c95667931d9' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/nippo/edit/index.tpl',
      1 => 1554374160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18868129715ca1d9ddd654e3-41190298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ca1d9ddde2b03_15418040',
  'variables' => 
  array (
    '_company' => 0,
    '_tenpo' => 0,
    'params' => 0,
    'this_label' => 0,
    'token' => 0,
    '_admin' => 0,
    'errors' => 0,
    'total_sales_without_others' => 0,
    'key' => 0,
    'total_deposit' => 0,
    'num' => 0,
    'total_payment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ca1d9ddde2b03_15418040')) {function content_5ca1d9ddde2b03_15418040($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
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
        .payment-detail-new-row {
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
            display: flex;
            justify-content: space-between;
        }

        .payment-row.record {
            margin:  8px 0;
            padding: 8px;
            border:  1px #CCCCCC solid;
        }

        .payment-row>div.photo {
            flex: 1 1 30%;
        }

        .payment-row>div.detail {
            flex: 1 1 70%;
            margin-top:   15px;
            padding-left: 15px;
        }

        .payment-row>div.detail .payment-name {
            display: flex;
            align-items: center;
        }

        .payment-row>div.detail .payment-name>div {
            flex: 1 0 auto;
        }

        .payment-row>div.detail .payment-name>div:first-child {
            flex: 0 0 80px;
        }

        .payment-row>div.detail .payment-detail-rows {
        }

        .payment-row>div.detail .payment-detail-row {
            display: flex;
            align-items: center;
        }

        .payment-row>div.detail .payment-detail-row .col-btn {
            flex: 0 0 48px;
        }

        .payment-row>div.detail .payment-detail-row .inner {
            display: flex;
            flex-wrap: wrap;
        }

        .payment-row>div.detail .payment-detail-row:first-child .inner {
            flex: 1 0 auto;
            border-bottom: 1px #555555 solid;
            text-align: center;
        }

        .payment-row>div.detail .payment-detail-row .inner>div {
            flex: 0 0 25%;
            padding: 8px 4px;
        }

        .payment-row>div.detail .payment-detail-amount {
            display: flex;
        }

        .payment-row>div.detail .payment-detail-amount .col-btn {
            flex: 0 0 48px;
            padding-top: 8px;
        }

        .payment-row>div.detail .payment-detail-amount .inner {
            flex: 1 0 auto;
            display: flex;
            padding-top: 8px;
            border-top:  1px #555555 solid;
        }

        .payment-row>div.detail .payment-detail-amount .inner>div {
            flex: 0 0 25%;
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

        .payment-row .payment-amount-mismatch {
            /**
            display:          inline-block;
            padding:          4px 12px;
            border-radius:    12px;
            background-color: #FFDDDD;
            /**/
        }

        /* タブレット（横幅 ～767pxまで）*/
        @media screen and (max-width: 767px) {
        }

        /* スマートフォン-L（横幅 ～425pxまで） */
        @media screen and (max-width: 425px) {
            .payment-row.record {
                display: block;
            }

            .payment-row.record .detail {
                padding-left: 0;
            }
        }

        /* スマートフォン-M（横幅 ～375pxまで） */
        @media screen and (max-width: 375px) {
        }

        /* スマートフォン-S（横幅 320px以下） */
        @media screen and (max-width: 320px) {
        }
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>(((((($_smarty_tpl->tpl_vars['_company']->value->name).(' ')).($_smarty_tpl->tpl_vars['_tenpo']->value->name)).(' ')).((smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日 ')))).($_smarty_tpl->tpl_vars['this_label']->value)).('編集'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<script type="text/javascript" src="/nippo/input/deposit.js"></script>
<script type="text/javascript" src="/admin/nippo/edit/payment_detail.js"></script>
<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <br class="hidden-lg hidden-md hidden-sm"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
編集</div>
    <div class="deposit-new-row"><?php echo $_smarty_tpl->getSubTemplate ('nippo/input/row_deposit.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
    <div class="payment-detail-new-row"><?php echo $_smarty_tpl->getSubTemplate ('admin/nippo/edit/row_payment_detail.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="mode" value="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="path" value="/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
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
                <div class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_credit'])) {?>has-error<?php }?>">
                    <div>③ 掛売上</div>
                    <input class="form-control money" type="number" name="sales_kakeuri" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['params']->value['sales_kakeuri'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_kakeuri'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['sales_kakeuri'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                </div>
                <div class="uneditable text-right">合計(①＋②＋③)： <span class="total-sales-without-others money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_sales_without_others']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                <div class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_others'])) {?>has-error<?php }?>">
                    <div>④ 掛売回収</div>
                    <input class="form-control money" type="number" name="sales_others" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['params']->value['sales_others'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sales_others'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['sales_others'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
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
            <div class="col-sm-12 payment-rows">
                <?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value['payments']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['payment']->key;
?>
                    <input type="hidden" name="payments[photo][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8', true);?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
">
                    <div class="payment-row record">
                        <div class="photo">
                            <a href="<?php echo @constant('URL_UPLOAD');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
" target="blank">
                                <img src="<?php echo @constant('URL_UPLOAD');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/thmb.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
">
                            </a>
                        </div>
                        <div class="detail" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                            <div class="payment-name uneditable">
                                <div>購入店名： </div>
                                <div class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['payments']['name'][$_smarty_tpl->tpl_vars['num']->value])) {?>has-error<?php }?>">
                                    <input class="form-control" type="text" name="payments[name][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8', true);?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['name'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
">
                                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['payments']['name'][$_smarty_tpl->tpl_vars['num']->value])) {?><p class="help-block"><small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['payments']['name'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
                                </div>
                            </div>
                            <div class="payment-detail-rows">
                                <div class="payment-detail-row">
                                    <div class="col-btn"></div>
                                    <div class="inner">
                                        <div>科目</div>
                                        <div>金額</div>
                                        <div>摘要</div>
                                        <div>部門</div>
                                    </div>
                                </div>
                                <?php  $_smarty_tpl->tpl_vars['payment_detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_detail']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['kamoku']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment_detail']->key => $_smarty_tpl->tpl_vars['payment_detail']->value) {
$_smarty_tpl->tpl_vars['payment_detail']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['payment_detail']->key;
?>
                                    <?php $_smarty_tpl->tpl_vars['payment_detail_kamoku'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['kamoku'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['payment_detail_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['amount'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['payment_detail_tekiyo'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['tekiyo'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['payment_detail_bumon'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['bumon'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['error_payment_detail_kamoku'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['kamoku'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['error_payment_detail_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['amount'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['error_payment_detail_tekiyo'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['tekiyo'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['error_payment_detail_bumon'] = new Smarty_variable($_smarty_tpl->tpl_vars['errors']->value['payment_details'][$_smarty_tpl->tpl_vars['num']->value]['bumon'][$_smarty_tpl->tpl_vars['key']->value], null, 0);?>
                                    <?php echo $_smarty_tpl->getSubTemplate ('admin/nippo/edit/row_payment_detail.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                <?php }
if (!$_smarty_tpl->tpl_vars['payment_detail']->_loop) {
?>
                                    <?php echo $_smarty_tpl->getSubTemplate ('admin/nippo/edit/row_payment_detail.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                <?php } ?>
                            </div>
                            <div class="payment-detail-amount">
                                <div class="col-btn"><button type="button" class="btn btn-default btn-icon" name="payment-detail-add">+</button></div>
                                <div class="inner">
                                    <div class="uneditable">合計：</div>
                                    <div class="uneditable text-right"><span class="total-payment-detail money">0</span></div>
                                </div>
                            </div>
                            <div class="payment-amount">
                                <input type="hidden" name="payments[amount][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8', true);?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['amount'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
">
                                <div class="has-error text-center"><p class="help-block"><small class="payment-amount-mismatch"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['payments']['amount'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
</small></p></div>
                                <div class="uneditable text-right">レシートの合計： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['amount'][$_smarty_tpl->tpl_vars['num']->value], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-12">
                    <div class="uneditable text-right">合計： <span class="total-payment money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_payment']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-12<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['receipt_cnt'])) {?> has-error<?php }?>">
                    <input type="hidden" name="receipt_cnt" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['receipt_cnt'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <div class="uneditable text-right">レシートの枚数： <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['receipt_cnt'], ENT_QUOTES, 'UTF-8', true);?>
 枚</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="cash">Ⅴ 本日現金残高 (Ⅰ＋Ⅱ①④－Ⅲ－Ⅳ)</label>
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/nippo/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">戻る</button>
            <?php if (!isset($_smarty_tpl->tpl_vars['params']->value['status'])||$_smarty_tpl->tpl_vars['params']->value['status']==@constant('NIPPO_STATUS_CLOSED')) {?>
                <button type="button" class="btn btn-default btn-suitable" onclick="is_changed=false; $('[name=\'mode\']').val('save'); submitTo('nippo', './confirm.php', 'post', 'この内容を保存します。\nよろしいですか？');">保存</button>
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

            // 金額入力欄にフォーカス時
            $(document).on('focus', 'input[type="number"].money', function() {
                if ($(this).val() == '0') {
                    $(this).val('');
                }
            });

            // 金額入力欄にフォーカスアウト時
            $(document).on('blur', 'input[type="number"].money', function() {
                if ($(this).val() == '') {
                    $(this).val('0');
                }
            });

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
            // Ⅱ 本日売上額等 合計（①＋②＋③）
            $('.total-sales-without-others').text($('[name^="sales_cash"], [name^="sales_credit"], [name^="sales_kakeuri"]').sum());

            // Ⅱ 本日売上額等 合計
            $('.total-sales').text($('[name^="sales_"]').sum());

            // Ⅲ 現金預金額等 合計
            $('.total-deposit').text($('[name^="deposits[amount]["]').sum());

            // Ⅳ 本日現金支払額 合計
            $('.detail').each(function() {
                num = $(this).attr('rel');
                sum = $('[name="payment_details[' + num + '][amount][]"]').sum();
                $(this).find('.total-payment-detail').text(sum);

                if ($(this).find('[name^="payments[amount]["]').sum() != sum) {
                    $(this).find('.payment-amount-mismatch').text('店舗管理者が入力した金額と一致しません。').show();
                } else {
                    $(this).find('.payment-amount-mismatch').text('').hide();
                }
            });

            $('.total-payment').text($('[name^="payments[amount]["]').sum());

            // Ⅴ 本日現金残高
            n1 = $('.kurikoshi').sum({decorate:false});
            n2 = $('[name="sales_cash"], [name="sales_others"]').sum({decorate:false});
            n3 = $('[name^="deposits[amount]["]').sum({decorate:false});
            n4 = $('[name^="payments[amount]["]').sum({decorate:false});
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
