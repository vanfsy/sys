<div class="search-form" style="{if !isset($params.search)}display:none;{/if}">
    <form id="search">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group form-group-sm">
                    <label class="control-label">企業名</label>
                    <input class="form-control" type="text" name="search[name]" value="{$params.search.name|escape}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-sm">
                    <label class="control-label">備考</label>
                    <input class="form-control" type="text" name="search[note]" value="{$params.search.note|escape}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-sm">
                    <label class="control-label">決算月</label>
                    <select class="form-control" name="search[settlement_month]">
                        <option value="">----</option>
                        {html_options options=$SET.DATETIME.MONTH selected=$params.search.settlement_month}
                    </select>
                </div>
            </div>
            <div class="col-md-6">
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
