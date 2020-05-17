{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
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
            max-width: {/literal}{$smarty.const.RECEIPT_THMB_SIZE}{literal}px;
            border:    1px #CCCCCC dotted;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title=$params.date|date_format:'Y年m月d日 '|cat:$this_label _css=$smarty.capture.css}
<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<div id="contents">
    <div class="paragraph">{$params.date|date_format:'Y年m月d日 '|cat:$this_label|escape}</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label class="col-sm-4 control-label" for="weather">天気</label>
            <div class="col-sm-8">
                <div class="uneditable">{$params.weather|escape}</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="kurikoshi">Ⅰ 前日より繰越した現金 (つり銭現金含)</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="kurikoshi money">{$kurikoshi|escape}</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="sales">Ⅱ 本日売上額等</label>
            <div class="col-sm-8 sales-rows">
                <div class="sales-row">
                    <div class="uneditable">① 現金売上</div>
                    <div class="uneditable text-right"><span class="money">{$params.sales_cash|escape}</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">② クレジット</div>
                    <div class="uneditable text-right"><span class="money">{$params.sales_credit|escape}</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">③ 掛売上</div>
                    <div class="uneditable text-right"><span class="money">{$params.sales_kakeuri|escape}</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable text-right">合計(①＋②＋③)： <span class="money">{$total_sales_without_others|escape}</span></div>
                </div>
                <div class="sales-row">
                    <div class="uneditable">④ 掛売回収</div>
                    <div class="uneditable text-right"><span class="money">{$params.sales_others|escape}</span></div>
                </div>
                {*<div class="sales-row">
                    <div class="uneditable text-right">合計： <span class="money">{$total_sales|escape}</span></div>
                </div>*}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="deposits">Ⅲ 現金預金額等</label>
            <div class="col-sm-8 deposit-rows">
                {foreach from=$params.deposits.kamoku key='key' item='deposit'}
                    <div class="deposit-row">
                        <div class="uneditable">{$params.deposits.kamoku.$key|escape}</div>
                        <div class="uneditable text-right"><span class="money">{$params.deposits.amount.$key|escape}</span></div>
                    </div>
                {/foreach}
                <div class="deposit-row">
                    <div class="uneditable text-right">合計： <span class="money">{$total_deposit|escape}</span></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="payments">Ⅳ 本日現金支払額</label>
            <div class="col-sm-8 payment-rows">
                {foreach from=$params.payments.photo key='key' item='payment'}
                    <div class="payment-row record">
                        <div class="photo">
                            <a href="{$smarty.const.URL_UPLOAD}/nippo/{$_company->id|escape}/{$_user.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/{$params.payments.photo.$key|escape}" target="blank">
                                <img src="{$smarty.const.URL_UPLOAD}/nippo/{$_company->id|escape}/{$_user.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/thmb.{$params.payments.photo.$key|escape}">
                            </a>
                        </div>
                        <div class="amount">
                            <div class="uneditable text-right">レシートの合計： <span class="money">{$params.payments.amount.$key|escape}</span></div>
                        </div>
                    </div>
                {/foreach}
                <div class="payment-row">
                    <div class="uneditable text-right">合計： <span class="money">{$total_payment|escape}</span></div>
                </div>
                <div class="payment-row">
                    <div class="uneditable"></div>
                    <div class="uneditable text-right">レシートの枚数： {$params.receipt_cnt|escape} 枚</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="cash">Ⅴ 本日現金残高 (Ⅰ＋Ⅱ①③－Ⅲ－Ⅳ)</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="money">{$cash|escape}</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="register">Ⅵ 本日レジ現金残高</label>
            <div class="col-sm-8">
                <div class="uneditable text-right"><span class="money">{$params.register|escape}</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="balance">Ⅶ 現金過不足 (Ⅵ－Ⅴ)</label>
            <div class="col-sm-8">
                <input type="hidden" name="balance" value="0">
                <div class="uneditable text-right"><span class="money">{$balance|escape}</span></div>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/nippo/?y={$params.date|date_format:'Y'}&m={$params.date|date_format:'m'}');">戻る</button>
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
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='common/footer.tpl' _js=$smarty.capture.js}

