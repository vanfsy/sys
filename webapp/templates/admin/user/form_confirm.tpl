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
        <label class="col-sm-3 control-label" for="auth">権限</label>
        <div class="col-sm-9">
            <div class="uneditable">{$SET.USER_AUTH[$params.auth]|escape}</div>
        </div>
    </div>
    {if $params.auth == $smarty.const.USER_AUTH_TENPO}
        <div class="form-group">
            <label class="col-sm-3 control-label" for="tenpo_id">店舗</label>
            <div class="col-sm-9">
                <div class="uneditable">{$set_tenpo_names[$params.tenpo_id]|escape}</div>
            </div>
        </div>
    {/if}
    <div class="form-group">
        <label class="col-sm-3 control-label" for="name">名前</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.name|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="login_id">ログインID</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.login_id|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">パスワード</label>
        <div class="col-sm-9">
            <div class="uneditable"><small>{if !$params.password}-- 変更なし --{else}{if $_mode != 'detail'}{$params.password|escape}{else}<span class="drowssap">{$params.drowssap|escape}</span><a href="javascript:void(0);" onclick="$('.drowssap').fadeIn('fast'); $(this).hide();">パスワードを表示</a>{/if}{/if}</small></div>
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
        .status {
            display: inline-block;
            padding: 1px 20px;
        }

        .drowssap {
            display: none;
        }
    {/literal}/*]]>*/
</style>
