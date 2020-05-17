<script type="text/javascript" src="/admin/tenpo/bumon.js"></script>
<div class="bumon-new-row">{include file='admin/tenpo/row_bumon.tpl'}</div>
<div class="paragraph">{$_company->name|escape} {$_caption|escape} 入力</div>
<form id="confirm" class="form-horizontal" action="./confirm.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="company_id" value="{$_company->id|escape}">
    {if $_mode == 'edit'}<input type="hidden" name="id" value="{$params.id|escape}">{/if}
    {if $_mode != 'add'}
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">ID</label>
            <div class="col-sm-9">
                <div class="uneditable">{$params.id|string_format:'%05d'}</div>
            </div>
        </div>
    {/if}
    <div class="form-group{if isset($errors.name)} has-error{/if}">
        <label class="col-sm-3 control-label" for="name">店舗名（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="{$params.name|escape}" placeholder="">
            {if isset($errors.name)}<p class="help-block"><small class="color-red">{$errors.name|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.tel)} has-error{/if}">
        <label class="col-sm-3 control-label" for="tel">電話番号</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="tel" value="{$params.tel|escape}" placeholder="">
            {if isset($errors.tel)}<p class="help-block"><small class="color-red">{$errors.tel|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.postal)} has-error{/if}">
        <label class="col-sm-3 control-label" for="postal">郵便番号</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="postal" value="{$params.postal|escape}" placeholder="">
            {if isset($errors.postal)}<p class="help-block"><small class="color-red">{$errors.postal|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.prefecture)} has-error{/if}">
        <label class="col-sm-3 control-label" for="prefecture">都道府県</label>
        <div class="col-sm-9">
            <select class="form-control" name="prefecture">
                <option value="">-- 以下から選択 --</option>
                {html_options options=$SET.PREFECTURE selected=$params.prefecture}
            </select>
            {if isset($errors.prefecture)}<p class="help-block"><small class="color-red">{$errors.prefecture|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.address)} has-error{/if}">
        <label class="col-sm-3 control-label" for="address">所在地</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="address" value="{$params.address|escape}" placeholder="">
            {if isset($errors.address)}<p class="help-block"><small class="color-red">{$errors.address|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="kamoku">使用科目</label>
        <div class="col-sm-9 kamokus">
            <div class="inner">
                <p>【現金売上】</p>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_cash_kari)} has-error{/if}">
                        <div>＜借方＞</div>
                        {html_radios name='kamoku_sales_cash_kari' values=$set_kamoku_sales_cash_kari output=$set_kamoku_sales_cash_kari selected=$params.kamoku_sales_cash_kari}
                        {if isset($errors.kamoku_sales_cash_kari)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_cash_kari|escape}</small></p>{/if}
                    </div>
                </div>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_cash_kashi)} has-error{/if}">
                        <div>＜貸方＞</div>
                        {html_radios name='kamoku_sales_cash_kashi' values=$set_kamoku_sales_cash_kashi output=$set_kamoku_sales_cash_kashi selected=$params.kamoku_sales_cash_kashi}
                        {if isset($errors.kamoku_sales_cash_kashi)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_cash_kashi|escape}</small></p>{/if}
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【クレジット】</p>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_credit_kari)} has-error{/if}">
                        <div>＜借方＞</div>
                        {html_radios name='kamoku_sales_credit_kari' values=$set_kamoku_sales_credit_kari output=$set_kamoku_sales_credit_kari selected=$params.kamoku_sales_credit_kari}
                        {if isset($errors.kamoku_sales_credit_kari)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_credit_kari|escape}</small></p>{/if}
                    </div>
                </div>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_credit_kashi)} has-error{/if}">
                        <div>＜貸方＞</div>
                        {html_radios name='kamoku_sales_credit_kashi' values=$set_kamoku_sales_credit_kashi output=$set_kamoku_sales_credit_kashi selected=$params.kamoku_sales_credit_kashi}
                        {if isset($errors.kamoku_sales_credit_kashi)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_credit_kashi|escape}</small></p>{/if}
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【掛売上】</p>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_kakeuri_kari)} has-error{/if}">
                        <div>＜借方＞</div>
                        {html_radios name='kamoku_sales_kakeuri_kari' values=$set_kamoku_sales_kakeuri_kari output=$set_kamoku_sales_kakeuri_kari selected=$params.kamoku_sales_kakeuri_kari}
                        {if isset($errors.kamoku_sales_kakeuri_kari)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_kakeuri_kari|escape}</small></p>{/if}
                    </div>
                </div>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_kakeuri_kashi)} has-error{/if}">
                        <div>＜貸方＞</div>
                        {html_radios name='kamoku_sales_kakeuri_kashi' values=$set_kamoku_sales_kakeuri_kashi output=$set_kamoku_sales_kakeuri_kashi selected=$params.kamoku_sales_kakeuri_kashi}
                        {if isset($errors.kamoku_sales_kakeuri_kashi)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_kakeuri_kashi|escape}</small></p>{/if}
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【掛売回収】</p>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_others_kari)} has-error{/if}">
                        <div>＜借方＞</div>
                        {html_radios name='kamoku_sales_others_kari' values=$set_kamoku_sales_others_kari output=$set_kamoku_sales_others_kari selected=$params.kamoku_sales_others_kari}
                        {if isset($errors.kamoku_sales_others_kari)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_others_kari|escape}</small></p>{/if}
                    </div>
                </div>
                <div>
                    <div class="radio{if isset($errors.kamoku_sales_others_kashi)} has-error{/if}">
                        <div>＜貸方＞</div>
                        {html_radios name='kamoku_sales_others_kashi' values=$set_kamoku_sales_others_kashi output=$set_kamoku_sales_others_kashi selected=$params.kamoku_sales_others_kashi}
                        {if isset($errors.kamoku_sales_others_kashi)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_others_kashi|escape}</small></p>{/if}
                    </div>
                </div>
            </div>
            <div class="inner">
                <p>【現金預入額等】</p>
                <div>
                    <div class="checkbox{if isset($errors.kamoku_deposit_kari)} has-error{/if}">
                        <div>＜借方＞ <small><a href="javascript:void(0);" name="check_all">すべて選択</a>｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small></div>
                        {html_checkboxes name='kamoku_deposit_kari' values=$set_kamoku_deposit_kari output=$set_kamoku_deposit_kari selected=$params.kamoku_deposit_kari}
                        {if isset($errors.kamoku_deposit_kari)}<p class="help-block"><small class="color-red">{$errors.kamoku_deposit_kari|escape}</small></p>{/if}
                    </div>
                </div>
                <div>
                    <div class="radio{if isset($errors.kamoku_deposit_kashi)} has-error{/if}">
                        <div>＜貸方＞</div>
                        {html_radios name='kamoku_deposit_kashi' values=$set_kamoku_deposit_kashi output=$set_kamoku_deposit_kashi selected=$params.kamoku_deposit_kashi}
                        {if isset($errors.kamoku_deposit_kashi)}<p class="help-block"><small class="color-red">{$errors.kamoku_deposit_kashi|escape}</small></p>{/if}
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
                    <div class="checkbox{if isset($errors.kamoku_payment_kari)} has-error{/if}">
                        <div>＜借方＞ <small><a href="javascript:void(0);" name="check_all">すべて選択</a>｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small></div>
                        <!---->
                        <div><span style="color:blue;">科目右横の☐印にチェックを入れた場合は初期に表示されます。</span></div>
                        
                        {html_checkboxes name='kamoku_payment_kari' values=$set_kamoku_payment_kari output=$set_kamoku_payment_kari selected=$params.kamoku_payment_kari}
                        {if isset($errors.kamoku_payment_kari)}<p class="help-block"><small class="color-red">{$errors.kamoku_payment_kari|escape}</small></p>{/if}
                        {if isset($errors.kamoku_payment_kari_defaultflg)}<p class="help-block"><small style="color:red;">エラー：{$errors.kamoku_payment_kari_defaultflg|escape}</small></p>{/if}
                    </div>
                </div>
                <div>
                    <div class="radio{if isset($errors.kamoku_payment_kashi)} has-error{/if}">
                        <div>＜貸方＞</div>
                        {html_radios name='kamoku_payment_kashi' values=$set_kamoku_payment_kashi output=$set_kamoku_payment_kashi selected=$params.kamoku_payment_kashi}
                        {if isset($errors.kamoku_payment_kashi)}<p class="help-block"><small class="color-red">{$errors.kamoku_payment_kashi|escape}</small></p>{/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group{if isset($errors.bumon)} has-error{/if}">
        <label class="col-sm-3 control-label" for="bumon">この店舗で使用する部門</label>
        <div class="col-sm-9 bumon-rows">
            <p>基本</p>
            {foreach name='bumons' from=$params.bumons.bumon key='key' item='bumon'}
                {assign var='bumons_bumon' value=$params.bumons.bumon.$key}
                {assign var='error_bumons_bumon' value=$errors.bumons.bumon.$key}
                {include file='admin/tenpo/row_bumon.tpl'}
                {if $smarty.foreach.bumons.first}<p>それ以外</p>{/if}
            {foreachelse}
                {include file='admin/tenpo/row_bumon.tpl'}
                <p>それ以外</p>
            {/foreach}
        </div>
        <div class="col-sm-offset-3">
            <div class="col-xs-3">
                <button type="button" class="btn btn-default btn-icon" name="bumon_add">＋</button>
            </div>
        </div>
    </div>
    <div class="form-group{if isset($errors.is_operated)} has-error{/if}">
        <label class="col-sm-3 control-label" for="is_operated">稼働状況</label>
        <div class="col-sm-9">
            <div class="radio">
                {html_radios name='is_operated' options=$SET.TENPO_IS_OPERATED selected=$params.is_operated|default:$smarty.const.FLAG_ON}
                {if isset($errors.is_operated)}<p class="help-block"><small class="color-red">{$errors.is_operated|escape}</small></p>{/if}
            </div>
        </div>
    </div>
    <div class="btn-wrap">
        {if $_mode == 'edit'}
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/detail/{$params.id|escape}');">キャンセル</button>
        {else}
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/company/detail/{$_company->id|escape}');">キャンセル</button>
        {/if}
        <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('confirm');">確認</button>
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
    {/literal}/*]]>*/
</style>
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
    {/literal}/*]]>*/
</script>
