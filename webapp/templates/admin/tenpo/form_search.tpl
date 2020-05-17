<div class="search-form" style="{if !isset($params.search)}display:none;{/if}">
    <form id="search">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group form-group-sm">
                    <label class="control-label">メールアドレス</label>
                    <input class="form-control" type="text" name="search[email]" value="{$params.search.email|escape}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-sm">
                    <label class="control-label">加盟店名</label>
                    <input class="form-control" type="text" name="search[name]" value="{$params.search.name|escape}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-sm">
                    <label class="control-label">坪数</label>
                    <div class="input-group">
                        <input class="form-control" type="number" name="search[tsubo_from]" value="{$params.search.tsubo_from|escape}" min="1">
                        <div class="input-group-addon" style="border-left:none; border-right:none;">～</div>
                        <input class="form-control" type="number" name="search[tsubo_to]" value="{$params.search.tsubo_to|escape}" min="1">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-sm">
                    <label class="control-label">スタッフ数</label>
                    <div class="input-group">
                        <input class="form-control" type="number" name="search[staff_from]" value="{$params.search.staff_from|escape}" min="1">
                        <div class="input-group-addon" style="border-left:none; border-right:none;">～</div>
                        <input class="form-control" type="number" name="search[staff_to]" value="{$params.search.staff_to|escape}" min="1">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">業態</label>
                    <input class="form-control" type="text" name="search[gyotai]" value="{$params.search.gyotai|escape}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">電話番号</label>
                    <input class="form-control" type="text" name="search[tel]" value="{$params.search.tel|escape}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">郵便番号</label>
                    <input class="form-control" type="text" name="search[postal]" value="{$params.search.postal|escape}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">都道府県</label>
                    <select class="form-control" name="search[prefecture]">
                        <option value="">----</option>
                        {html_options options=$SET.PREFECTURE selected=$params.search.prefecture}
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">ランチ</label>
                    <select class="form-control" name="search[is_lunch]">
                        <option value="">----</option>
                        {html_options options=$SET.WITH_WITHOUT selected=$params.search.is_lunch}
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">チェック</label>
                    <select class="form-control" name="search[is_checked]">
                        <option value="">----</option>
                        {html_options options=$SET.WITH_WITHOUT selected=$params.search.is_checked}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-sm">
                    <label class="control-label">住所</label>
                    <input class="form-control" type="text" name="search[address]" value="{$params.search.address|escape}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">グループ</label>
                    <select class="form-control" name="search[group_id]">
                        <option value="">----</option>
                        {html_options options=$set_group_names selected=$params.search.group_id}
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-sm">
                    <label class="control-label">ステータス</label>
                    <select class="form-control" name="search[status]">
                        <option value="">----</option>
                        {html_options options=$SET.USER_STATUS selected=$params.search.status}
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group form-group-sm">
                    <label class="control-label">登録日時</label>
                    <div class="input-group">
                        <input class="form-control" type="date" name="search[created_from]" value="{$params.search.created_from|escape}">
                        <div class="input-group-addon" style="border-left:none; border-right:none;">～</div>
                        <input class="form-control" type="date" name="search[created_to]" value="{$params.search.created_to|escape}">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="submit" class="btn btn-info btn-sm btn-suitable"><i class="glyphicon glyphicon-search"></i> 検索　</button>
          　<button type="button" class="btn btn-default btn-sm" onclick="linkTo('{$smarty.server.SCRIPT_NAME}');">クリア</button>
        </div>
    </form>
</div>
<style type="text/css">
    /*<![CDATA[*/{literal}
    {/literal}/*]]>*/
</style>
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        $(document).ready(function() {
        });
    {/literal}/*]]>*/
</script>
