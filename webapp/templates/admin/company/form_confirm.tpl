<div class="paragraph">{$_caption|escape} {if $_mode != 'detail'}確認{/if}</div>
{if $_mode == 'detail'}
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/{$this_dir|escape}/');">一覧に戻る</button>
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/kamoku/');">科目マスタ登録</button>
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/bumon/');">部門マスタ登録</button>
        
        <!--店ごとにCSVデータで何回も出力できる-->
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/output/{$params.id|escape}');">CSV出力</button>
        <!--<button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/output/');">CSV出力</button>-->
        
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/backup/');">保存データのインポート/エクスポート</button>
    </div>
{/if}
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
        <label class="col-sm-3 control-label" for="name">企業名</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.name|escape}</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="settlement_month">決算月</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.settlement_month|escape} 月</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="note">備考</label>
        <div class="col-sm-9">
            <div class="uneditable">{$params.note|escape|nl2br}</div>
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
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/{$this_dir|escape}/');">一覧に戻る</button>
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

{if $_mode == 'detail'}
    <div class="paragraph">店舗一覧</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="{if !$kamoku_master_exists}alert('科目マスタを登録してください。');{else}linkTo('/admin/tenpo/add/');{/if}">新規登録</button>
    </div>
    {*include file='admin/common/pager_scope.tpl'*}
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="70"></col>
                <col width=""></col>
                <col width="150"></col>
                <col width="150"></col>
                <col width="164"></col>
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">店舗名</th>
                    <th class="text-center">稼働状況</th>
                    <th class="text-center">登録日時</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$tenpos item='tenpo'}
                    <tr>
                        <td class="text-center"><a href="/admin/tenpo/detail/{$tenpo->id|escape}">{$tenpo->id|string_format:'%05d'}</a></td>
                        <td class="text-left truncate"><div><a href="/admin/tenpo/detail/{$tenpo->id|escape}">{$tenpo->name|escape}</a></div></td>
                        <td class="text-center"><span class="status {$SET.TENPO_IS_OPERATED_CLASS[$tenpo->is_operated]|escape}">{$SET.TENPO_IS_OPERATED[$tenpo->is_operated]|escape}</span></td>
                        <td class="text-center">{$tenpo->created|date_format:'%Y-%m-%d %H:%M'}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/nippo/{$tenpo->id|escape}');"><i class="glyphicon glyphicon-calendar"></i>日報</button>
                            <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/tenpo/edit/{$tenpo->id|escape}');">編集</button>
                            <button type="button" class="btn btn-xs btn-danger" onclick="ajaxTo(null, '/admin/tenpo/remove/{$tenpo->id|escape}', 'get', 'remove');">削除</button>
                        </td>
                    </tr>
                {foreachelse}
                    <tr>
                        <td class="text-center" colspan="6">{if isset($params.search)}検索条件に該当する{/if}データがありません。</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    {*include file='admin/common/pager_links.tpl'*}

    <div class="paragraph">アカウント一覧</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="{if !$tenpos}alert('店舗を登録してください。');{else}linkTo('/admin/user/add/');{/if}">新規登録</button>
    </div>
    {*include file='admin/common/pager_scope.tpl'*}
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="70"></col>
                <col width=""></col>
                <col width="150"></col>
                <col width="150"></col>
                <col width="110"></col>
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">アカウント名</th>
                    <th class="text-center">権限</th>
                    <th class="text-center">登録日時</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item='user'}
                    <tr>
                        <td class="text-center"><a href="/admin/user/detail/{$user->id|escape}">{$user->id|string_format:'%05d'}</a></td>
                        <td class="text-left truncate"><div><a href="/admin/user/detail/{$user->id|escape}">{$user->name|escape}</a></div></td>
                        <td class="text-center">{$SET.USER_AUTH[$user->auth]|escape}</td>
                        <td class="text-center">{$user->created|date_format:'%Y-%m-%d %H:%M'}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/user/edit/{$user->id|escape}');">編集</button>
                            <button type="button" class="btn btn-xs btn-danger" onclick="ajaxTo(null, '/admin/user/remove/{$user->id|escape}', 'get', 'remove');">削除</button>
                        </td>
                    </tr>
                {foreachelse}
                    <tr>
                        <td class="text-center" colspan="5">{if isset($params.search)}検索条件に該当する{/if}データがありません。</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    {*include file='admin/common/pager_links.tpl'*}
    <div class="btn-wrap">
    </div>
{/if}

<style type="text/css">
    /*<![CDATA[*/{literal}
        .status {
            display: inline-block;
            padding: 1px 20px;
        }
    {/literal}/*]]>*/
</style>
