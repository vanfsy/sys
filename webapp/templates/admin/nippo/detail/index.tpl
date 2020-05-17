{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
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
            max-width: {/literal}{$smarty.const.RECEIPT_THMB_SIZE}{literal}px;
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
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$_company->name|cat:' '|cat:$_tenpo->name|cat:' '|cat:($params.date|date_format:'Y年m月d日 ')|cat:$this_label _css=$smarty.capture.css}
<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<div id="contents">
    <div class="paragraph">{$_company->name|escape} {$_tenpo->name|escape} <br class="hidden-lg hidden-md hidden-sm">{$params.date|date_format:'Y年m月d日'} {$this_label|escape}</div>

    <form id="nippo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id" value="{$params.id|escape}">
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
                    <div class="uneditable text-right">合計： <span class="money">{$total_deposit|default:0|escape}</span></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="payments">Ⅳ 本日現金支払額</label>
            <div class="col-sm-12 payment-rows">
                {foreach from=$params.payments.photo key='key' item='payment'}
                    <div class="payment-row record">
                        <div class="photo">
                            <a href="{$smarty.const.URL_UPLOAD}/nippo/{$_admin.company_id|escape}/{$_admin.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/{$params.payments.photo.$key|escape}" target="blank">
                                <img src="{$smarty.const.URL_UPLOAD}/nippo/{$_admin.company_id|escape}/{$_admin.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/thmb.{$params.payments.photo.$key|escape}">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="payment-name uneditable">購入店名： {if $params.payments.name.$key}{$params.payments.name.$key|escape}{else}<span>入力されていません。</span>{/if}</div>
                            <div class="payment-detail-rows">
                                <div class="payment-detail-row">
                                    <div>科目</div>
                                    <div>金額</div>
                                    <div>摘要</div>
                                    <div>部門</div>
                                </div>
                                {foreach from=$params.payment_details[$params.payments.num.$key].kamoku key='key2' item='payment_detail'}
                                    <div class="payment-detail-row">
                                        <div class="">{$params.payment_details[$params.payments.num.$key].kamoku.$key2|escape}</div>
                                        <div class=" text-right"><span class="money">{$params.payment_details[$params.payments.num.$key].amount.$key2|escape}</span></div>
                                        <div class="">{$params.payment_details[$params.payments.num.$key].tekiyo.$key2|escape}</div>
                                        <div class="">{$params.payment_details[$params.payments.num.$key].bumon.$key2|escape}</div>
                                    </div>
                                {foreachelse}
                                    <div class="text-center">明細が入力されていません。</div>
                                {/foreach}
                            </div>
                            <div class="payment-amount">
                                {if $params.payment_details[$params.payments.num.$key]}
                                    <div class="uneditable">合計：</div>
                                    <div class="uneditable text-right"><span class="money">{$params.payments.amount.$key|escape}</span></div>
                                {/if}
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="col-sm-offset-4 col-sm-8 payment-rows">
                <div class="payment-row">
                    <div class="uneditable text-right">合計： <span class="money">{$total_payment|default:0|escape}</span></div>
                </div>
                <div class="payment-row">
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/nippo/{$params.tenpo_id|escape}?y={$params.date|date_format:'Y'}&m={$params.date|date_format:'m'}');">戻る</button>
            {if $params.status == $smarty.const.NIPPO_STATUS_CLOSED}
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/nippo/edit/{$params.id|escape}');">編集</button>
            {/if}
        </div>
        <div class="btn-wrap">
            {if $params.status == $smarty.const.NIPPO_STATUS_CLOSED}
                <button type="button" class="btn btn-primary btn-suitable"{if !$is_possible_finish || $has_error} disabled{else} onclick="submitTo('nippo', '/admin/nippo/detail/{$params.id|escape}', 'post', '日報のステータスを「チェック済」にします。\nこの処理は元に戻せません。\nよろしいですか？');"{/if}>チェック完了</button>
            {/if}
        </div>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        $(document).ready(function() {
            $('span.money').moneyFormat();
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
