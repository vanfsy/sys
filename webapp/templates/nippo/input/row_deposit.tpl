<div class="deposit-row">
    <div class="inner">
        <div class="remove">
            <button type="button" class="btn btn-default btn-icon" name="deposit-remove">×</button>
        </div>
        <div class="kamoku{if isset($error_deposit_kamoku)} has-error{/if}">
            <select class="form-control" name="deposits[kamoku][]">
                <option value=""></option>
                {html_options values=$set_kamoku.kamoku_deposit_kari output=$set_kamoku.kamoku_deposit_kari selected=$deposit_kamoku}
            </select>
            {if $error_deposit_kamoku}<p class="help-block"><small class="color-red">{$error_deposit_kamoku|escape}</small></p>{/if}
            {if $error_deposit_amount}<p class="help-block"><small class="color-red">{$error_deposit_amount|escape}</small></p>{/if}
        </div>
        <div class="amount{if isset($error_deposit_amount)} has-error{/if}">
            <input class="form-control money" type="number" name="deposits[amount][]" value="{$deposit_amount|escape|default:0}" min=0>
        </div>
    </div>
</div>

