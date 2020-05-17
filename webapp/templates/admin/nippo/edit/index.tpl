{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
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
            max-width: {/literal}{$smarty.const.RECEIPT_THMB_SIZE}{literal}px;
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
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$_company->name|cat:' '|cat:$_tenpo->name|cat:' '|cat:($params.date|date_format:'Y年m月d日 ')|cat:$this_label|cat:'編集' _css=$smarty.capture.css}
<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<script type="text/javascript" src="/nippo/input/deposit.js"></script>
<script type="text/javascript" src="/admin/nippo/edit/payment_detail.js"></script>
<div id="contents">
    <div class="paragraph">{$_company->name|escape} {$_tenpo->name|escape} <br class="hidden-lg hidden-md hidden-sm">{$params.date|date_format:'Y年m月d日'} {$this_label|escape}編集</div>
    <div class="deposit-new-row">{include file='nippo/input/row_deposit.tpl'}</div>
    <div class="payment-detail-new-row">{include file='admin/nippo/edit/row_payment_detail.tpl'}</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="token" value="{$token|escape}">
        <input type="hidden" name="mode" value="">
        <input type="hidden" name="id" value="{$params.id|escape}">
        <input type="hidden" name="date" value="{$params.date|escape}">
        <input type="hidden" name="path" value="/nippo/{$_admin.company_id|escape}/{$_admin.tenpo_id|escape}/{$params.date|date_format:'Y'}/{$params.date|date_format:'m'}/{$params.date|date_format:'d'}/">
        <div class="form-group">
            <label class="col-sm-4 control-label" for="weather">天気</label>
            <div class="col-sm-8{if isset($errors.weather)} has-error{/if}">
                <input class="form-control" type="text" name="weather" value="{$params.weather|escape}" placeholder="晴れ">
                {if isset($errors.weather)}<p class="help-block"><small class="color-red">{$errors.weather|escape}</small></p>{/if}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="kurikoshi">Ⅰ 前日より繰越した現金 (つり銭現金含)</label>
            <div class="col-sm-8">
                <input type="hidden" name="kurikoshi" value="{$params.kurikoshi|escape}">
                <div class="uneditable text-right"><span class="kurikoshi money">{$params.kurikoshi|escape}</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="sales">Ⅱ 本日売上額等</label>
            <div class="col-sm-8">
                <div class="{if isset($errors.sales_cash)}has-error{/if}">
                    <div>① 現金売上</div>
                    <input class="form-control money" type="number" name="sales_cash" value="{$params.sales_cash|default:0|escape}">
                    {if isset($errors.sales_cash)}<p class="help-block"><small class="color-red">{$errors.sales_cash|escape}</small></p>{/if}
                </div>
                <div class="{if isset($errors.sales_credit)}has-error{/if}">
                    <div>② クレジット</div>
                    <input class="form-control money" type="number" name="sales_credit" value="{$params.sales_credit|default:0|escape}">
                    {if isset($errors.sales_credit)}<p class="help-block"><small class="color-red">{$errors.sales_credit|escape}</small></p>{/if}
                </div>
                <div class="{if isset($errors.sales_credit)}has-error{/if}">
                    <div>③ 掛売上</div>
                    <input class="form-control money" type="number" name="sales_kakeuri" value="{$params.sales_kakeuri|default:0|escape}">
                    {if isset($errors.sales_kakeuri)}<p class="help-block"><small class="color-red">{$errors.sales_kakeuri|escape}</small></p>{/if}
                </div>
                <div class="uneditable text-right">合計(①＋②＋③)： <span class="total-sales-without-others money">{$total_sales_without_others|default:0|escape}</span></div>
                <div class="{if isset($errors.sales_others)}has-error{/if}">
                    <div>④ 掛売回収</div>
                    <input class="form-control money" type="number" name="sales_others" value="{$params.sales_others|default:0|escape}">
                    {if isset($errors.sales_others)}<p class="help-block"><small class="color-red">{$errors.sales_others|escape}</small></p>{/if}
                </div>
                {*<div class="uneditable text-right">合計： <span class="total-sales money">{$total_sales|default:0|escape}</span></div>*}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="deposits">Ⅲ 現金預金額等</label>
            <div class="col-sm-8 deposit-rows">
                {foreach from=$params.deposits.kamoku key='key' item='deposit'}
                    {assign var='deposit_kamoku' value=$params.deposits.kamoku.$key}
                    {assign var='deposit_amount' value=$params.deposits.amount.$key}
                    {assign var='error_deposit_kamoku' value=$errors.deposits.kamoku.$key}
                    {assign var='error_deposit_amount' value=$errors.deposits.amount.$key}
                    {include file='nippo/input/row_deposit.tpl'}
                {/foreach}
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-3">
                    <button type="button" class="btn btn-default btn-icon" name="deposit-add">＋</button>
                </div>
                <div class="col-xs-9">
                    <div class="uneditable text-right">合計： <span class="total-deposit money">{$total_deposit|default:0|escape}</span></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="payments">Ⅳ 本日現金支払額</label>
            <div class="col-sm-12 payment-rows">
                {foreach from=$params.payments.photo key='num' item='payment'}
                    <input type="hidden" name="payments[photo][{$num|escape}]" value="{$params.payments.photo.$num|escape}">
                    <div class="payment-row record">
                        <div class="photo">
                            <a href="{$smarty.const.URL_UPLOAD}/nippo/{$_admin.company_id|escape}/{$_admin.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/{$params.payments.photo.$num|escape}" target="blank">
                                <img src="{$smarty.const.URL_UPLOAD}/nippo/{$_admin.company_id|escape}/{$_admin.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/thmb.{$params.payments.photo.$num|escape}">
                            </a>
                        </div>
                        <div class="detail" rel="{$num|escape}">
                            <div class="payment-name uneditable">
                                <div>購入店名： </div>
                                <div class="{if isset($errors.payments.name.$num)}has-error{/if}">
                                    <input class="form-control" type="text" name="payments[name][{$num|escape}]" value="{$params.payments.name.$num|escape}">
                                    {if isset($errors.payments.name.$num)}<p class="help-block"><small>{$errors.payments.name.$num|escape}</small></p>{/if}
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
                                {foreach from=$params.payment_details[$num].kamoku key='key' item='payment_detail'}
                                    {assign var='payment_detail_kamoku'       value=$params.payment_details.$num.kamoku.$key}
                                    {assign var='payment_detail_amount'       value=$params.payment_details.$num.amount.$key}
                                    {assign var='payment_detail_tekiyo'       value=$params.payment_details.$num.tekiyo.$key}
                                    {assign var='payment_detail_bumon'        value=$params.payment_details.$num.bumon.$key}
                                    {assign var='error_payment_detail_kamoku' value=$errors.payment_details.$num.kamoku.$key}
                                    {assign var='error_payment_detail_amount' value=$errors.payment_details.$num.amount.$key}
                                    {assign var='error_payment_detail_tekiyo' value=$errors.payment_details.$num.tekiyo.$key}
                                    {assign var='error_payment_detail_bumon'  value=$errors.payment_details.$num.bumon.$key}
                                    {include file='admin/nippo/edit/row_payment_detail.tpl'}
                                {foreachelse}
                                    {include file='admin/nippo/edit/row_payment_detail.tpl'}
                                {/foreach}
                            </div>
                            <div class="payment-detail-amount">
                                <div class="col-btn"><button type="button" class="btn btn-default btn-icon" name="payment-detail-add">+</button></div>
                                <div class="inner">
                                    <div class="uneditable">合計：</div>
                                    <div class="uneditable text-right"><span class="total-payment-detail money">0</span></div>
                                </div>
                            </div>
                            <div class="payment-amount">
                                <input type="hidden" name="payments[amount][{$num|escape}]" value="{$params.payments.amount.$num|escape}">
                                <div class="has-error text-center"><p class="help-block"><small class="payment-amount-mismatch">{$errors.payments.amount.$num|escape}</small></p></div>
                                <div class="uneditable text-right">レシートの合計： <span class="money">{$params.payments.amount.$num|escape}</span></div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-12">
                    <div class="uneditable text-right">合計： <span class="total-payment money">{$total_payment|default:0|escape}</span></div>
                </div>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-12{if isset($errors.receipt_cnt)} has-error{/if}">
                    <input type="hidden" name="receipt_cnt" value="{$params.receipt_cnt|escape}">
                    <div class="uneditable text-right">レシートの枚数： {$params.receipt_cnt|escape} 枚</div>
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
            <div class="col-sm-8{if isset($errors.register)} has-error{/if}">
                <input class="form-control money" type="number" name="register" value="{$params.register|default:0|escape}" min=0>
                {if isset($errors.register)}<p class="help-block"><small class="color-red">{$errors.register|escape}</small></p>{/if}
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/nippo/detail/{$params.id|escape}');">戻る</button>
            {if !isset($params.status) || $params.status == $smarty.const.NIPPO_STATUS_CLOSED}
                <button type="button" class="btn btn-default btn-suitable" onclick="is_changed=false; $('[name=\'mode\']').val('save'); submitTo('nippo', './confirm.php', 'post', 'この内容を保存します。\nよろしいですか？');">保存</button>
            {/if}
        </div>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
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
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
