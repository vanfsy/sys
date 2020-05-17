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
    {*
    <div class="form-group">
        <label class="col-sm-3 control-label">企業</label>
        <div class="col-sm-9">
            <div class="uneditable">{$_company->name|escape}</div>
        </div>
    </div>
    *}
    <div class="form-group{if isset($errors.auth)} has-error{/if}">
        <label class="col-sm-3 control-label" for="auth">権限</label>
        <div class="col-sm-9">
            <div class="radio">{html_radios options=$SET.USER_AUTH name='auth' selected=$params.auth|default:$smarty.const.USER_AUTH_COMPANY separator='　'}</div>
            {if isset($errors.auth)}<p class="help-block"><small class="color-red">{$errors.auth|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.tenpo_id)} has-error{/if}">
        <label class="col-sm-3 control-label" for="tenpo_id">店舗</label>
        <div class="col-sm-9">
            <select class="form-control" name="tenpo_id"{if empty($params.auth) || $params.auth == $smarty.const.USER_AUTH_COMPANY} disabled="disabled"{/if}>
                <option value="">-- 以下から選択 --</option>
                {html_options options=$set_tenpo_names selected=$params.tenpo_id}
            </select>
            {if isset($errors.tenpo_id)}<p class="help-block"><small class="color-red">{$errors.tenpo_id|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.name)} has-error{/if}">
        <label class="col-sm-3 control-label" for="name">名前（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="{$params.name|escape}" placeholder="">
            {if isset($errors.name)}<p class="help-block"><small class="color-red">{$errors.name|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.login_id)} has-error{/if}">
        <label class="col-sm-3 control-label" for="login_id">ログインID（必須）</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="login_id" value="{$params.login_id|escape}" placeholder="">
            {if isset($errors.login_id)}<p class="help-block"><small class="color-red">{$errors.login_id|escape}</small></p>{/if}
        </div>
    </div>
    <div class="form-group{if isset($errors.password)} has-error{/if}">
        <label class="col-sm-3 control-label" for="password">パスワード（必須）</label>
        <div class="col-sm-9">
            <div class="hidden"><input class="form-control" type="password" name="password" value="" {* オートコンプリート対策 *} ></div>
            <input class="form-control" type="password" name="password" value="{if isset($smarty.get.back) || isset($smarty.get.error)}{$params.password|escape}{/if}" placeholder="{if $_mode == 'edit'}パスワードを変更される場合のみ入力してください。{/if}">
            {if isset($errors.password)}<p class="help-block"><small class="color-red">{$errors.password|escape}</small></p>{/if}
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
        .input-group.tsubo,
        .input-group.staff {
            width: 170px;
            margin-right:  20px;
            margin-bottom: 8px;
            float: left;
        }

        .input-group-addon.unit {
            width: 70px;
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

            // 権限変更時の処理
            $('[name=auth]').on('change', function() {
                $('[name=tenpo_id]').attr('disabled', ($(this).val() == {/literal}{$smarty.const.USER_AUTH_COMPANY}{literal})).val('');
            });
        });
    {/literal}/*]]>*/
</script>
