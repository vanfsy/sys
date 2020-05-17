<div class="paragraph">{$_caption|escape} 入力</div>
<form id="confirm" class="form-horizontal" action="./confirm.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
        <label class="col-sm-3 control-label" for="name">企業名（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="{$params.name|escape}" placeholder="">
            {if isset($errors.name)}<p class="help-block"><small class="color-red">{$errors.name|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.settlement_month)} has-error{/if}">
        <label class="col-sm-3 control-label" for="settlement_month">決算月（必須）</label>
        <div class="col-sm-9">
            <div class="input-group">
                <select class="form-control" name="settlement_month">
                    <option value="">----</option>
                    {html_options options=$SET.DATETIME.MONTH selected=$params.settlement_month}
                </select>
                <div class="input-group-addon unit" style="width:70px;">月</div>
            </div>
            {if isset($errors.settlement_month)}<p class="help-block"><small class="color-red">{$errors.settlement_month|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.note)} has-error{/if}">
        <label class="col-sm-3 control-label" for="note">備考</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="note" rows="5" placeholder="">{$params.note|escape}</textarea>
            {if isset($errors.note)}<p class="help-block"><small class="color-red">{$errors.note|escape}</small></p>{/if}
        </div>
    </div>
    <div class="btn-wrap">
        {if $_mode == 'edit'}
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/detail/{$params.id|escape}');">キャンセル</button>
        {else}
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/');">キャンセル</button>
        {/if}
        <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('confirm');">確認</button>
    </div>

</form>
<style type="text/css">
    /*<![CDATA[*/{literal}
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
        });
    {/literal}/*]]>*/
</script>
