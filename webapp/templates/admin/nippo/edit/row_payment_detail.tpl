<div class="payment-detail-row">
    <div class="col-btn"><button type="button" class="btn btn-default btn-icon" name="payment-detail-remove">×</button></div>
    <div class="inner">
        
        <!--保存されている科目を表示-->
        {if isset($payment_detail_kamoku)}
        
        <div class="{if isset($error_payment_detail_kamoku)}has-error{/if}"><select class="form-control" name="payment_details[{$num}][kamoku][]">{html_options values=$set_kamoku.kamoku_payment_kari output=$set_kamoku.kamoku_payment_kari selected=$payment_detail_kamoku}</select></div>
        
        <!--初期、プラス（+）ボタンを押した時のデフォルト表示-->
        {else}
        
        <div class="{if isset($error_payment_detail_kamoku)}has-error{/if}">
                <select class="form-control" name="payment_details[{$num}][kamoku][]">
                    {html_options values=$set_kamoku.kamoku_payment_kari output=$set_kamoku.kamoku_payment_kari selected=$params.kamoku_payment_kari_defaultflg}
                </select>
        </div>
        
        {/if}

    

<div class="{if isset($error_payment_detail_amount)}has-error{/if}"><input class="form-control payment-detail-amount" type="number" name="payment_details[{$num}][amount][]" value="{$payment_detail_amount|default:0|escape}"></div>
        <div class="{if isset($error_payment_detail_tekiyo)}has-error{/if}"><input class="form-control" type="text" name="payment_details[{$num}][tekiyo][]" value="{$payment_detail_tekiyo|escape}"></div>
        <div class="{if isset($error_payment_detail_bumon) }has-error{/if}"><select class="form-control" name="payment_details[{$num}][bumon][]">{html_options values=$set_bumon output=$set_bumon selected=$payment_detail_bumon}</select></div>
    </div>
</div>
{if isset($error_payment_detail_kamoku)
 || isset($error_payment_detail_amount)
 || isset($error_payment_detail_tekiyo)
 || isset($error_payment_detail_bumon)
}
    <div class="has-error" style="padding-left:56px;">
        {if $error_payment_detail_kamoku}<p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red">{$error_payment_detail_kamoku|escape}</small></p>{/if}
        {if $error_payment_detail_amount}<p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red">{$error_payment_detail_amount|escape}</small></p>{/if}
        {if $error_payment_detail_tekiyo}<p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red">{$error_payment_detail_tekiyo|escape}</small></p>{/if}
        {if $error_payment_detail_bumon }<p class="help-block" style="margin-top:0; margin-bottom:5px;"><small class="color-red">{$error_payment_detail_bumon|escape}</small></p>{/if}
    </div>
{/if}
