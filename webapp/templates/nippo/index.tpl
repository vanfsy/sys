{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        #nippo .inner {
            display: flex;
            align-items: center;
            /*min-height:  50px;*/
            padding: 8px 0;
        }

        #nippo .inner.today {
            background-color: #FFFFBB;
        }

        #nippo .inner .nippo-date {
            flex: 0 0 50%;
        }

        #nippo .inner .nippo-status {
            flex: 0 0 20%;
            font-size:  90%;
            text-align: center;
        }

        #nippo .inner .nippo-btn {
            flex: 0 0 15%;
            text-align: center;
        }
        
        #nippo .inner .nippo-btn-2 {
            flex: 0 0 15%;
            text-align: center;
        }

        .calendar-nav {
            display: flex;
            align-items: center;
        }

        .calendar-nav>div {
            flex: 0 0 33%;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title=$this_label _css=$smarty.capture.css}
<div id="contents">
    <div class="paragraph">{*$_company->name|escape} {$_tenpo->name|escape*} {$this_label|escape}一覧</div>
    <form id="nippo" method="post" autocomplete="off">
        <input type="hidden" name="action" value="">
        <input type="hidden" name="date" value="">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="btn-wrap">
                <div class="calendar-nav">
                    <div class="text-right"><a class="btn btn-default btn-sm" href="?y={$prev->format('Y')}&m={$prev->format('m')}">　<i class="glyphicon glyphicon-menu-left"></i>　</a></div>
                    <div class="text-center">{$curr->format('Y年 m月')|escape}</div>
                    <div class="text-left"><a class="btn btn-default btn-sm" href="?y={$next->format('Y')}&m={$next->format('m')}">　<i class="glyphicon glyphicon-menu-right"></i>　</a></div>
                </div>
            </div>
            
            
            
            {foreach from=$calendar item='day'}
                <div class="inner{if $day == $now->format('Y-m-d')} today{/if}">
                    <div class="nippo-date">{$day|date_format:'Y年 m月 d日'}（<span class="{$SET.WEEK_EN[$day|date_format:'%w']|escape}">{$SET.WEEK[$day|date_format:'w']}</span>）</div>
                    <div class="nippo-status">{if isset($nippos.$day)}{$SET.NIPPO_STATUS[$nippos.$day->status]|escape}{else}--{/if}</div>
                    <div class="nippo-btn">
                        {if !isset($nippos.$day)
                         && (!$last_nippo || (strtotime($day) > $last_nippo->date->getTimestamp()))
                        }{* 新規登録：日報がない。かつ、(過去にステータスが「日次締め済」の日報がない。もしくは、ステータスが「日次締め済」の直近の日報の日付以降である。) *}
                            <button class="btn btn-xs btn-default" type="button" {if !$_tenpo->is_operated}disabled{else}onclick="$('[name=date]').val('{$day|escape}'); submitTo('nippo', '/nippo/input/');"{/if}>入力</button>

                        {elseif isset($nippos.$day)
                          && ($nippos.$day->status == $smarty.const.NIPPO_STATUS_PROCESSING || $nippos.$day->status == $smarty.const.NIPPO_STATUS_NEUTRAL)
                        }{* 編集：日報がある。かつ、ステータスが「店舗処理中」である。 *}
                            <button class="btn btn-xs btn-default" type="button" {if !$_tenpo->is_operated}disabled{else}onclick="linkTo('/nippo/input/{$nippos.$day->id|escape}');"{/if}>入力</button>

                        {elseif isset($nippos.$day)
                          && $nippos.$day->status > $smarty.const.NIPPO_STATUS_PROCESSING
                        }{* 編集：日報がある。かつ、ステータスが「店舗処理中」でない。 *}
                            <button class="btn btn-xs btn-default" type="button" onclick="linkTo('/nippo/show/{$nippos.$day->id|escape}');">参照</button>
                        {/if}
                    </div>
                    
                    
                    <!--締め解除ボタン-->
                    <div class="nippo-btn-2">
                    {if isset($nippos.$day)
                          && $nippos.$day->status == $smarty.const.NIPPO_STATUS_CLOSED
                        }{* 編集：日報がある。かつ、ステータスが「店舗処理中」でない。 *}
                        
<!--
<button class="btn btn-xs btn-default" type="button" onclick="linkTo('/nippo/input3/{$nippos.$day->id|escape}');">日次締め解除</button>
<button class="btn btn-xs btn-default" type="button" onclick="is_changed=false; $('[name=\'mode\']').val('cancel'); submitTo('nippo', '/nippo/input3/{$nippos.$day->id|escape}', 'get', '締め解除いたします。\nよろしいですか？');">日次締め解除2</button>
-->
                        <button class="btn btn-xs btn-default" type="button" onclick="is_changed=false; $('[name=\'mode\']').val('cancel'); submitTo('nippo', '/nippo/cancel/{$nippos.$day->id|escape}', 'get', '日次締めを解除いたします。\n解除した日付以降にも日次締めがあれば自動的に解除します。\nよろしいですか？');">締め解除</button>

                    {/if}
                    </div>
                    
                    
                </div>
            {/foreach}
            <div class="btn-wrap">
                <div class="calendar-nav">
                    <div class="text-right"><a class="btn btn-default btn-sm" href="?y={$prev->format('Y')}&m={$prev->format('m')}">　<i class="glyphicon glyphicon-menu-left"></i>　</a></div>
                    <div class="text-center">{$curr->format('Y年 m月')|escape}</div>
                    <div class="text-left"><a class="btn btn-default btn-sm" href="?y={$next->format('Y')}&m={$next->format('m')}">　<i class="glyphicon glyphicon-menu-right"></i>　</a></div>
                </div>
            </div>
        </div>
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
{include file='common/footer.tpl' _js=$smarty.capture.js}
