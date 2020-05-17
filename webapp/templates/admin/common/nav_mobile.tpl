{* 本部側 共通ナビゲーション *}

<li class="text-right hidden-md hidden-lg"><a href="/admin/user/">加盟店管理</a></li>
{* 加盟店管理サブメニュー *}
{if strpos($smarty.server.REQUEST_URI, '/group/') !== false
 || strpos($smarty.server.REQUEST_URI, '/user/')  !== false
}
    <li class="text-right hidden-md hidden-lg"><a href="/admin/user/">加盟店 - </a></li>
    <li class="text-right hidden-md hidden-lg"><a href="/admin/group/">グループ - </a></li>
{/if}
<li class="text-right hidden-md hidden-lg"><a href="/admin/ingredient/">材料マスタ</a></li>
<li class="text-right hidden-md hidden-lg"><a href="/admin/dish/">お料理管理</a></li>
<li class="text-right hidden-md hidden-lg"><a href="/admin/schedule/">お弁当管理</a></li>
<li class="text-right hidden-md hidden-lg"><a href="/admin/info/">お知らせ管理</a></li>
