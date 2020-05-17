{capture name=css}
<style type="text/css">
/*<![CDATA[*/{literal}
{/literal}/*]]>*/
</style>
{/capture}
{capture name=js}
<script type="text/javascript">
/*<![CDATA[*/{literal}
    $(document).ready(function() {
    });
{/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/header.tpl' _title='トップ' _css=$smarty.capture.css _js=$smarty.capture.js}
<div id="contents">
    <div class="container">
        <div class="paragraph">企業一覧</div>
        <div class="btn-wrap-sub">
            <form id="sub" method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-default btn-sm btn-search-toggle">検索</button>
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/add/');">新規登録</button>
                <label class="select-file">
                    <input class="uploader" type="file" name="uploader" onchange="preview(this);" accept=".csv">
                    <span class="btn btn-default btn-sm">CSVインポート</span>
                </label>
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/?export&' + location.search.substring(1));">CSVエクスポート</button>
            </form>
        </div>
        {include file='admin/company/form_search.tpl'}
        {include file='admin/common/pager_scope.tpl'}
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <colgroup>
                    <col width="70"></col>
                    <col width=""></col>
                    <col width=""></col>
                    <col width="190"></col>
                    <col width="150"></col>
                    <col width="110"></col>
                </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">材料名</th>
                        <th class="text-center">詳細</th>
                        <th class="text-center">仕入先名</th>
                        <th class="text-center">登録日時</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$params.companies item='company'}
                        <tr>
                            <td class="text-center"><a href="/admin/company/detail/{$company->id|escape}">{$company->id|string_format:'%05d'}</a></td>
                            <td class="text-left truncate"><div><a href="/admin/company/detail/{$company->id|escape}">{$company->name|escape}</a></div></td>
                            <td class="text-left truncate"><div>{$company->note|escape}</div></td>
                            <td class="text-left truncate"><div>{$company->supplier|escape}</div></td>
                            <td class="text-center">{$company->created|date_format:'%Y-%m-%d %H:%M'}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-default" onclick="linkTo('/admin/company/edit/{$company->id|escape}');">編集</button>
                                <button type="button" class="btn btn-xs btn-danger" onclick="ajaxTo(null, '/admin/company/remove/{$company->id|escape}', 'get', 'remove');">削除</button>
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
        {include file='admin/common/pager_links.tpl'}
        <div class="btn-wrap">
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/company/add/');">新規登録</button>
        </div>
    </div>
</div>
{include file='admin/common/footer.tpl'}
