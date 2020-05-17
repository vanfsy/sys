<div class="bumon-row">
    <div class="inner">
        <div class="remove">
            <button type="button" class="btn btn-default btn-icon" name="bumon_remove">×</button>
        </div>
        <div class="bumon{if isset($error_bumons_bumon)} has-error{/if}">
            <select class="form-control" name="bumons[bumon][]">
                <option value=""></option>
                {html_options values=$set_bumons output=$set_bumons selected=$bumons_bumon}
            </select>
            {if $error_bumons_bumon}<p class="help-block"><small class="color-red">{$error_bumons_bumon|escape}</small></p>{/if}
        </div>
    </div>
</div>
