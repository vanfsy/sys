<div class="payment-row">
    <div class="inner">
        <div class="remove">
            <button type="button" class="btn btn-default btn-icon" name="payment-remove">×</button>
        </div>
        <div>
            <div class="photo{if isset($error_payment_photo)} has-error{/if}">
                <input class="holder" type="hidden" name="payments[photo][]" value="{$payment_photo|escape}">
                <label class="select-file">
                    <input class="uploader" type="file" name="uploader_payment_photo" accept="image/jpeg">
                    <span class="viewer" style="margin:auto;text-align:center;">
                        {if $payment_photo && file_exists($smarty.const.PATH_UPLOAD|cat:'/nippo/'|cat:$_user.company_id|cat:'/'|cat:$_user.tenpo_id|cat:'/'|cat:($params.date|date_format:'Y/m/d')|cat:'/'|cat:$payment_photo)}
                            <img class="photo" src="{$smarty.const.URL_UPLOAD}/nippo/{$_user.company_id|escape}/{$_user.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/thmb.{$payment_photo|escape}">
                        {elseif $payment_photo && file_exists($smarty.const.PATH_UPLOAD_TMP|cat:'/nippo/'|cat:$_user.company_id|cat:'/'|cat:$_user.tenpo_id|cat:'/'|cat:($params.date|date_format:'Y/m/d')|cat:'/'|cat:$payment_photo)}
                            <img class="photo" src="{$smarty.const.URL_UPLOAD_TMP}/nippo/{$_user.company_id|escape}/{$_user.tenpo_id|escape}/{$params.date|date_format:'Y/m/d'}/thmb.{$payment_photo|escape}">
                        {else}
                            <img class="photo" src="/inc/img/no_photo.png">
                        {/if}
                    </span>
                </label>
                <button type="button" class="btn btn-default rotate-photo" {if !$payment_photo} style="display:none;"{/if}><i class="glyphicon glyphicon-repeat"></i> 写真を回転</button>
                {if $error_payment_photo}<p class="help-block"><small class="color-red">{$error_payment_photo|escape}</small></p>{/if}
            </div>
            <div class="amount{if isset($error_payment_amount)} has-error{/if}">
                <div>レシートの合計</div>
                <input class="form-control money" type="number" name="payments[amount][]" value="{$payment_amount|escape|default:0}" min=0>
                {if $error_payment_amount}<p class="help-block"><small class="color-red">{$error_payment_amount|escape}</small></p>{/if}
            </div>
        </div>
    </div>
</div>

