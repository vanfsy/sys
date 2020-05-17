<div class="paragraph">{$_company->name|escape} {$_caption|escape} {if $_mode != 'detail'}確認{/if}</div>
<form id="{if $_mode != 'detail'}complete{else}detail{/if}" class="form-horizontal" method="post" action="{if $_mode != 'detail'}./execute.php{/if}">
    <input type="hidden" name="token" value="{$token|escape}">
    {if $_mode == 'detail'}<input type="hidden" name="id" value="{$params.id|escape}">{/if}
    {if $_mode != 'add'}
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">ID</label>
            <div class="col-sm-9">
                <div class="uneditable">{$params.id|string_format:'%05d'}</div>
            </div>
        </div>
    {/if}
    <div class="form-group">
        <label class="col-sm-3 control-label" for="name">店舗名</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.name|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="tel">電話番号</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.tel|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="postal">郵便番号</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.postal|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="prefecture">都道府県</label>
        <div class="col-sm-9">
            <div class="uneditable">{$SET.PREFECTURE[$params.prefecture]|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="address">所在地</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.address|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="address">使用科目</label>
        <div class="col-sm-9">
            <div class="uneditable kamokus">
                <div class="inner">
                    <p>【現金売上】</p>
                    <div>
                        <div>＜借方＞</div>
                        {if isset($params.kamoku_sales_cash_kari)}{$params.kamoku_sales_cash_kari|escape}{/if}
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        {if isset($params.kamoku_sales_cash_kashi)}{$params.kamoku_sales_cash_kashi|escape}{/if}
                    </div>
                </div>
                <div class="inner">
                    <p>【クレジット】</p>
                    <div>
                        <div>＜借方＞</div>
                        {if isset($params.kamoku_sales_credit_kari)}{$params.kamoku_sales_credit_kari|escape}{/if}
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        {if isset($params.kamoku_sales_credit_kashi)}{$params.kamoku_sales_credit_kashi|escape}{/if}
                    </div>
                </div>
                <div class="inner">
                    <p>【掛売上】</p>
                    <div>
                        <div>＜借方＞</div>
                        {if isset($params.kamoku_sales_kakeuri_kari)}{$params.kamoku_sales_kakeuri_kari|escape}{/if}
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        {if isset($params.kamoku_sales_kakeuri_kashi)}{$params.kamoku_sales_kakeuri_kashi|escape}{/if}
                    </div>
                </div>
                <div class="inner">
                    <p>【掛売回収】</p>
                    <div>
                        <div>＜借方＞</div>
                        {if isset($params.kamoku_sales_others_kari)}{$params.kamoku_sales_others_kari|escape}{/if}
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        {if isset($params.kamoku_sales_others_kashi)}{$params.kamoku_sales_others_kashi|escape}{/if}
                    </div>
                </div>
                <div class="inner">
                    <p>【現金預入額等】</p>
                    <div>
                        <div>＜借方＞</div>
                        {if isset($params.kamoku_deposit_kari) && count($params.kamoku_deposit_kari) > 0}
                            {$params.kamoku_deposit_kari|implode:' ／ '|escape}
                        {/if}
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        {if isset($params.kamoku_deposit_kashi)}{$params.kamoku_deposit_kashi|escape}{/if}
                    </div>
                </div>
                <div class="inner">
                    <p>【現金支払額等】</p>
                    <div>
                        <div>＜借方＞</div>
                        {if isset($params.kamoku_payment_kari) && count($params.kamoku_payment_kari) > 0}
                            {$params.kamoku_payment_kari|implode:' ／ '|escape}
                        {/if}
                        
                        <!--デフォルト設定ONの表示-->
                        {if isset($params.kamoku_payment_kari_defaultflg.0) }<div style="color:blue;">{$params.kamoku_payment_kari_defaultflg.0}が初期設定になっています。</div>{/if}
                        
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        {if isset($params.kamoku_payment_kashi)}{$params.kamoku_payment_kashi|escape}{/if}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="bumon">この店舗で使用する部門</label>
        <div class="col-sm-9">
            <div class="uneditable">
                {if isset($params.bumons.bumon) && count($params.bumons.bumon) > 0}
                    {$params.bumons.bumon|implode:' ／ '|escape}
                {/if}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="is_operated">稼働状況</label>
        <div class="col-sm-9">
            <div class="uneditable"><span class="status {$SET.TENPO_IS_OPERATED_CLASS[$params.is_operated]|escape}">{$SET.TENPO_IS_OPERATED[$params.is_operated]|escape}</span></div>
        </div>
    </div>
    {if $_mode == 'detail'}
        <div class="form-group">
            <label class="col-sm-3 control-label" for="created">登録日時</label>
            <div class="col-sm-9">
                <div class="uneditable">{$params.created|date_format:'%Y-%m-%d %H:%M'}</div>
            </div>
        </div>
    {/if}
    <div class="btn-wrap">
        {if $_mode == 'detail'}
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/company/detail/{$_company->id|escape}');">一覧に戻る</button>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/edit/{$params.id|escape}');">編集</button>
            <button type="button" class="btn btn-danger btn-suitable" onclick="ajaxTo(null, '/admin/{$this_dir|escape}/remove/{$params.id|escape}', 'get', 'remove');">削除</button>
        {else}
            {if $_mode == 'edit'}
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/edit/{$params.id}?back');">入力に戻る</button>
            {else}
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/add/?back');">入力に戻る</button>
            {/if}
            <button type="button" class="btn btn-primary btn-suitable" onclick="submitTo('complete');">決定</button>
        {/if}
    </div>
</form>
<style type="text/css">
    /*<![CDATA[*/{literal}
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
            margin:      8px 0;
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

        /* この店舗で使用する部門 */
        .bumon-row {
            margin-left:   -4px;
            margin-right:  -4px;
            margin-bottom: 8px;
        }

        .bumon-row .inner {
            display: flex;
        }

        .bumon-row .inner>div {
            margin: 0 4px;
        }

        .bumon-row .inner>div.remove {
            flex: 1 1 auto;
        }

        .bumon-row .inner>div.bumon {
            flex: 0 1 45%;
        }

        .bumon-row .inner>div.kamoku {
            flex: 0 1 45%;
        }

        .status {
            display: inline-block;
            padding: 1px 20px;
        }
    {/literal}/*]]>*/
</style>
