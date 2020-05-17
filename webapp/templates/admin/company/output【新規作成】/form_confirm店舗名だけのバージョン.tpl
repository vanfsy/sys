{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        .inner {
            display: flex;
            flex-wrap: wrap;
        }

        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        form {
            flex: 0 0 50%;
            padding:      15px;
            padding-left: 0;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$_company->name|cat:' CSVデータ出力の店舗一覧' _css=$smarty.capture.css}




    <div class="paragraph">{$_company->name|escape} CSVデータ出力の店舗一覧</div>
    <!--<form id="nippo" method="post" autocomplete="off" action="/admin/output/">-->
    <form name="nippo" id="nippo" method="post" action="/admin/output/">
        <div class="clearfix">
            <div class="btn-wrap-sub">
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/{$_company->id|escape}');">企業情報に戻る</button>
            </div>
        </div>
    
    

<!--店舗名だけ-->
<small><a href="javascript:void(0);" name="check_all">すべて選択</a><!--<a href="javascript:void(0);" name="check_registed">すべて選択</a>-->｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small>
        <!--<table class="company-csv table table-hover table-striped table-bordered">-->
        <table class="company-csv table table-hover table-striped table-bordered">
            <colgroup>
                <!--<col width="30"></col>-->
                <col width=""></col>
                <!--<col width="150"></col>-->
                <!--<col width="150"></col>-->
                <!--<col width="110"></col>-->
            </colgroup>
            <thead>
                <tr>
                    <!--<th class="text-center">&nbsp;</th>-->
                    <th class="text-center">店舗名</th>
                    <!--<th class="text-center">稼働状況</th>-->
                    <!--<th class="text-center">登録日時</th>-->
                    <!--<th class="text-center">CSV出力</th>-->
                </tr>
            </thead>
            <tbody>
         
    
                {foreach from=$tenpos item='tenpo'}
                    <tr>
                        <td class="text-center shop_name">

                                <div>
                                    <div class="pull-left">
                                    <input type="checkbox" name="nippos[]" value="{$tenpo->id}" class="registed" checked="checked" id="nippos[]"> {$tenpo->name|escape}
                                </div>
                            </div>
                            
                        </td>
                        
                        <!--店舗名-->
                        <!--<td class="text-left truncate"><div><a href="/admin/tenpo/detail/{$tenpo->id|escape}">{$tenpo->name|escape}</a></div></td>-->
                        <!--<td class="text-left truncate">{$tenpo->name|escape}</td>-->
                        <!--<td class="text-center"><span class="status {$SET.TENPO_IS_OPERATED_CLASS[$tenpo->is_operated]|escape}">{$SET.TENPO_IS_OPERATED[$tenpo->is_operated]|escape}</span></td>-->
                        <!--<td class="text-center">{$tenpo->created|date_format:'%Y-%m-%d %H:%M'}</td>-->

                    </tr>
                {foreachelse}
                {/foreach}
                
<!--
/*すべて選択を下に表示*/
                <tr>
                <td colspan="4"><small><a href="javascript:void(0);" name="check_all">すべて選択</a>｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small></td>
                </tr>
-->

                
            </tbody>
    </table>

    
    
</form>





<div class="btn-wrap">
    
    
<!--チェックした店舗のCSV作成-->
<button type="button" class="btn btn-primary btn-suitable" name="csv_output" onclick="return false;">チェックした店舗のCSV作成</button>

<!--
<button type="button" class="btn btn-primary btn-suitable" name="output" onclick="linkTo('/admin/output/');">チェックした店舗のCSV作成</button>
<input type="submit" class="btn btn-primary btn-suitable" name="output" onclick="return false;" value="チェックした店舗のCSV作成">
-->
    
</div>


<!--
<div class="btn-wrap">
<button type="button" class="btn btn-default btn-suitable" name="output" onclick="linkTo('/admin/output/');">全店舗一括CSV出力</button>
</div>

<div class="btn-wrap">
{if $_mode == 'detail'}
<button type="button" class="btn btn-default btn-suitable" name="output" onclick="linkTo('/admin/{$this_dir|escape}/');">一覧に戻る</button>
{else}
{/if}
</div>
-->
