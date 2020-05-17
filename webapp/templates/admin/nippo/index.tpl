{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        .nippo-status {
            padding-top: 8px;
            font-size:   0.8rem;
            text-align:  center;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$this_label _css=$smarty.capture.css}
<div id="contents">
    <div class="paragraph">{$_company->name|escape} {$_tenpo->name|escape} {$this_label|escape}</div>
    <form id="nippo" method="post" autocomplete="off">
        <div class="clearfix">
            <div class="btn-wrap-sub">
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/{$_company->id|escape}');">企業情報に戻る</button>
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/tenpo/detail/{$_tenpo->id|escape}');">店舗情報に戻る</button>
                {if $curr->format('Ym') != $now->format('Ym')}<button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/{$this_dir|escape}/');">● 当月に戻る</button>{/if}
            </div>
        </div>
        <input type="hidden" name="month" value="{$curr->format('n')|escape}">
        <input type="hidden" name="action" value="">
        <table class="calendar-month">
            <tbody>
                <tr>
                    <td><div class="text-right"><a class="btn btn-default btn-sm" href="?y={$prev->format('Y')}&m={$prev->format('m')}">　<i class="glyphicon glyphicon-menu-left"></i>　</a></div></td>
                    <td><span class="year-month">{$curr->format('Y年 m月')|escape}</span></td>
                    <td><div class="text-left"><a class="btn btn-default btn-sm" href="?y={$next->format('Y')}&m={$next->format('m')}">　<i class="glyphicon glyphicon-menu-right"></i>　</a></div></td>
                </tr>
            </tbody>
        </table>
        <table class="calendar-day">
            <thead><tr><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th class="sat">土</th><th class="sun">日</th></tr></thead>
            <tbody>
                {foreach from=$calendar item='week'}
                    <tr>
                        {foreach from=$week item='day'}
                            {if $day|date_format:'%m' == $curr->format('m')}
                                <td>
                                    <div class="clearfix">
                                        <div class="day">
                                            <span class="{$SET.WEEK_EN[$day|date_format:'%w']|escape}">{$day|date_format:'%e'}</span>
                                            {if isset($holidays[$day|date_format:'%Y-%m-%d'])} <span class="holi">{$holidays[$day|date_format:'%Y-%m-%d']|escape}</span>{/if}
                                        </div>
                                    </div>
                                    <div>
                                        {if isset($nippos.$day)}
                                            <a href="/admin/{$this_dir|escape}/detail/{$nippos.$day->id|escape}" class="btn btn-default btn-xs">日報</a>
                                            {if $nippos.$day->status == $smarty.const.NIPPO_STATUS_FINISHED}<div class="nippo-status">{$SET.NIPPO_STATUS[$nippos.$day->status]|escape}</div>{/if}
                                        {/if}
                                    </div>
                                </td>
                            {else}
                                <td class="overflowed"><div class="day">{$day|date_format:'%e'}</div></td>
                            {/if}
                        {/foreach}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        $(document).ready(function() {
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
