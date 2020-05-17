<?php /* Smarty version Smarty-3.1.19, created on 2019-01-16 16:09:32
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\admin\nippo\detail\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211675c32a30ca9c098-74699030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c25bce61b0c795c456d8885ec2171cbc7099328' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\admin\\nippo\\detail\\index.tpl',
      1 => 1547622568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211675c32a30ca9c098-74699030',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32a30caf22a0_37087592',
  'variables' => 
  array (
    '_company' => 0,
    '_tenpo' => 0,
    'params' => 0,
    'this_label' => 0,
    'kurikoshi' => 0,
    'total_sales_without_others' => 0,
    'total_sales' => 0,
    'key' => 0,
    'total_deposit' => 0,
    '_admin' => 0,
    'key2' => 0,
    'total_payment' => 0,
    'cash' => 0,
    'balance' => 0,
    'is_possible_finish' => 0,
    'has_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32a30caf22a0_37087592')) {function content_5c32a30caf22a0_37087592($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
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

        .payment-row>div.detail .name {
        }

        .payment-row>div.detail .payment-detail-rows {
        }

        .payment-row>div.detail .payment-detail-row {
            display: flex;
            align-items: center;
            margin: 8px 0;
        }

        .payment-row>div.detail div.payment-detail-row:first-child {
            border-bottom: 1px #555555 solid;
            text-align: center;
        }

        .payment-row>div.detail .payment-detail-row>div {
            flex: 0 0 25%;
            padding-left:  13px;
            padding-right: 13px;
        }

        .payment-row>div.detail .payment-amount {
            display: flex;
            margin:     8px 0;
            border-top: 1px #555555 solid;
        }

        .payment-row>div.detail .payment-amount>div {
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

        /* タブレット（横幅 ～767pxまで）*/
        @media screen and (max-width: 767px) {
        }

        /* スマートフォン-L（横幅 ～425pxまで） */
        @media screen and (max-width: 425px) {
            .payment-row.record {
                display: block;
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>((((($_smarty_tpl->tpl_vars['_company']->value->name).(' ')).($_smarty_tpl->tpl_vars['_tenpo']->value->name)).(' ')).((smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日 ')))).($_smarty_tpl->tpl_vars['this_label']->value),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <br class="hidden-lg hidden-md hidden-sm"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y年m月d日');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
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
                    <div class="uneditable text-right">合計(①＋②)： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total_sales_without_others']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">③ その他 (売掛回収等)</div>
                    <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['sales_others'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable text-right">合計： <span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total_sales']->value, ENT_QUOTES, 'UTF-8', true);?>
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
                    <div class="uneditable text-right">合計： <span class="money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_deposit']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="payments">Ⅳ 本日現金支払額</label>
            <div class="col-sm-12 payment-rows">
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
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
" target="blank">
                                <img src="<?php echo @constant('URL_UPLOAD');?>
/nippo/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['company_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_admin']->value['tenpo_id'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['date'],'Y/m/d');?>
/thmb.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['photo'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="payment-name uneditable">購入店名： <?php if ($_smarty_tpl->tpl_vars['params']->value['payments']['name'][$_smarty_tpl->tpl_vars['key']->value]) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['name'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><span>入力されていません。</span><?php }?></div>
                            <div class="payment-detail-rows">
                                <div class="payment-detail-row">
                                    <div>科目</div>
                                    <div>金額</div>
                                    <div>摘要</div>
                                    <div>部門</div>
                                </div>
                                <?php  $_smarty_tpl->tpl_vars['payment_detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_detail']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['params']->value['payments']['num'][$_smarty_tpl->tpl_vars['key']->value]]['kamoku']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment_detail']->key => $_smarty_tpl->tpl_vars['payment_detail']->value) {
$_smarty_tpl->tpl_vars['payment_detail']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['payment_detail']->key;
?>
                                    <div class="payment-detail-row">
                                        <div class=""><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['params']->value['payments']['num'][$_smarty_tpl->tpl_vars['key']->value]]['kamoku'][$_smarty_tpl->tpl_vars['key2']->value], ENT_QUOTES, 'UTF-8', true);?>
</div>
                                        <div class=" text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['params']->value['payments']['num'][$_smarty_tpl->tpl_vars['key']->value]]['amount'][$_smarty_tpl->tpl_vars['key2']->value], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                                        <div class=""><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['params']->value['payments']['num'][$_smarty_tpl->tpl_vars['key']->value]]['tekiyo'][$_smarty_tpl->tpl_vars['key2']->value], ENT_QUOTES, 'UTF-8', true);?>
</div>
                                        <div class=""><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['params']->value['payments']['num'][$_smarty_tpl->tpl_vars['key']->value]]['bumon'][$_smarty_tpl->tpl_vars['key2']->value], ENT_QUOTES, 'UTF-8', true);?>
</div>
                                    </div>
                                <?php }
if (!$_smarty_tpl->tpl_vars['payment_detail']->_loop) {
?>
                                    <div class="text-center">明細が入力されていません。</div>
                                <?php } ?>
                            </div>
                            <div class="payment-amount">
                                <?php if ($_smarty_tpl->tpl_vars['params']->value['payment_details'][$_smarty_tpl->tpl_vars['params']->value['payments']['num'][$_smarty_tpl->tpl_vars['key']->value]]) {?>
                                    <div class="uneditable">合計：</div>
                                    <div class="uneditable text-right"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['payments']['amount'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 payment-rows">
                <div class="payment-row">
                    <div class="uneditable text-right">合計： <span class="money"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['total_payment']->value)===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                </div>
                <div class="payment-row">
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/nippo/');">戻る</button>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['status']==@constant('NIPPO_STATUS_CLOSED')) {?>
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/nippo/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">編集</button>
            <?php }?>
        </div>
        <div class="btn-wrap">
            <?php if ($_smarty_tpl->tpl_vars['params']->value['status']==@constant('NIPPO_STATUS_CLOSED')) {?>
                <button type="button" class="btn btn-primary btn-suitable"<?php if (!$_smarty_tpl->tpl_vars['is_possible_finish']->value||$_smarty_tpl->tpl_vars['has_error']->value) {?> disabled<?php } else { ?> onclick="submitTo('nippo', '/admin/nippo/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
', 'post', '日報のステータスを「チェック済」にします。\nこの処理は元に戻せません。\nよろしいですか？');"<?php }?>>チェック完了</button>
            <?php }?>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        $(document).ready(function() {
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
