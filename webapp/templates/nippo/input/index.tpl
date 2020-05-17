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
            max-width: {/literal}{$smarty.const.RECEIPT_THMB_SIZE}{literal}px;
            border:    1px #CCCCCC dotted;
        }

        .select-file .viewer img.photo:hover {
            border: 1px #999999 solid;
        }

        .select-file .btn {
            height: 34px;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title=$params.date|date_format:'Y年m月d日 '|cat:$this_label _css=$smarty.capture.css}
<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<script type="text/javascript" src="/nippo/input/deposit.js"></script>
<script type="text/javascript" src="/nippo/input/payment.js"></script>
<div id="contents">
    <div class="paragraph">{$params.date|date_format:'Y年m月d日 '|cat:$this_label|escape}</div>
    <div class="deposit-new-row">{include file='nippo/input/row_deposit.tpl'}</div>
    <div class="payment-new-row">{include file='nippo/input/row_payment.tpl'}</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="token" value="{$token|escape}">
        <input type="hidden" name="mode" value="">
        <input type="hidden" name="id" value="{$params.id|escape}">
        <input type="hidden" name="date" value="{$params.date|escape}">
        <input type="hidden" name="path" value="/nippo/{$_company->id|escape}/{$_user.tenpo_id|escape}/{$params.date|date_format:'Y'}/{$params.date|date_format:'m'}/{$params.date|date_format:'d'}/">
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
                <div class="{if isset($errors.sales_kakeuri)}has-error{/if}">
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
            <div class="col-sm-8 payment-rows">
                {foreach from=$params.payments.photo key='key' item='payment'}
                    {assign var='payment_photo' value=$params.payments.photo.$key}
                    {assign var='payment_amount' value=$params.payments.amount.$key}
                    {assign var='error_payment_photo' value=$errors.payments.photo.$key}
                    {assign var='error_payment_amount' value=$errors.payments.amount.$key}
                    {include file='nippo/input/row_payment.tpl'}
                {/foreach}
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-3">
                    <button type="button" class="btn btn-default btn-icon" name="payment-add">＋</button>
                </div>
                <div class="col-xs-9">
                    <div class="uneditable text-right">合計： <span class="total-payment money">{$total_payment|default:0|escape}</span></div>
                </div>
            </div>
            <div class="col-sm-offset-4">
                <div class="col-xs-12{if isset($errors.receipt_cnt)} has-error{/if}">
                    <div style="margin-top:15px;">レシートの枚数</div>
                    <input class="form-control money" type="number" name="receipt_cnt" value="{$params.receipt_cnt|escape}" min=0>
                    {if isset($errors.receipt_cnt)}<p class="help-block"><small class="color-red">{$errors.receipt_cnt|escape}</small></p>{/if}
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/nippo/?y={$params.date|date_format:'Y'}&m={$params.date|date_format:'m'}');">戻る</button>
            {if !isset($params.status) || $params.status == $smarty.const.NIPPO_STATUS_NEUTRAL || $params.status == $smarty.const.NIPPO_STATUS_PROCESSING}
                <button type="button" class="btn btn-default btn-suitable" onclick="is_changed=false; $('[name=\'mode\']').val('save'); submitTo('nippo', './confirm.php', 'post', 'この内容を保存します。\nよろしいですか？');">保存</button>
            {/if}
        </div>
        {if $params.status == $smarty.const.NIPPO_STATUS_NEUTRAL || $params.status == $smarty.const.NIPPO_STATUS_PROCESSING}
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable"{if !$is_possible_close} disabled{else} onclick="is_changed=false; $('[name=\'mode\']').val('close'); submitTo('nippo', './confirm.php', 'post', 'この内容で日次締めを行います。\n締め処理後の修正はできなくなります。\nよろしいですか？');"{/if}>日次締め</button>
            </div>
        {/if}
        {if !isset($params.status) || $params.status == $smarty.const.NIPPO_STATUS_NEUTRAL || $params.status == $smarty.const.NIPPO_STATUS_PROCESSING}
            <div class="btn-wrap">
                <button type="button" class="btn btn-danger btn-suitable"{if !$is_possible_close_holiday} disabled{else} onclick="is_changed=false; $('[name=\'mode\']').val('holiday'); submitTo('nippo', './confirm.php', 'post', 'この日を休業日として日次締めを行います。\n前日より繰越した現金をそのまま本日レジ現金残高として処理します。\n締め処理後の修正はできなくなります。\nよろしいですか？');"{/if}>休業日締め</button>
            </div>
        {/if}
        {if $params.status >= $smarty.const.NIPPO_STATUS_CLOSED}
            <div class="btn-wrap">
                <button type="button" class="btn btn-default btn-suitable" disabled>日次締め済</button>
            </div>
        {/if}
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
    {/literal}/*]]>*/
</script>
{/capture}
{include file='common/footer.tpl' _js=$smarty.capture.js}

