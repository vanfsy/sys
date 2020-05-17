{* 本部側 共通ナビゲーション *
<div class="hidden-sm hidden-xs">
    <div class="btn-wrap">
        <div class="btn-group">
            <button type="button" class="btn btn-default{if strpos($smarty.server.REQUEST_URI, '/admin/user/')    !== false} active{/if}" onclick="linkTo('/admin/user/');">アカウント管理</button>
            <button type="button" class="btn btn-default{if strpos($smarty.server.REQUEST_URI, '/admin/company/') !== false} active{/if}" onclick="linkTo('/admin/company/');">企業管理</button>
        </div>
    </div>

    {if strpos($smarty.server.REQUEST_URI, '/company/') !== false}
        <div class="btn-wrap">
            <div class="btn-group">
                <button type="button" class="btn btn-default{if strpos($smarty.server.SCRIPT_NAME, '/admin/tenpo/')  !== false} active{/if}" onclick="linkTo('/admin/tenpo/');">店舗情報</button>
                <button type="button" class="btn btn-default{if strpos($smarty.server.SCRIPT_NAME, '/admin/group/') !== false} active{/if}" onclick="linkTo('/admin/group/');">グループ</button>
            </div>
        </div>
    {/if}
</div>
*}