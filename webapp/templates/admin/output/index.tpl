{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        .end,
        .yet {
            display:       inline-block;
            width:         28px;
            height:        28px;
            border-radius: 50%;
            font-size:     1.25rem;
            font-weight:   bold;
            text-align:    center;
        }

        .end {
            border: 2px #FF3333 solid;
            color:  #FF3333;
        }

        .yet {
            color: #999999;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$_company->name|cat:' 締め状況' _css=$smarty.capture.css}
<div id="contents">
    <div class="paragraph">{$_company->name|escape} 締め状況</div>
    <form id="nippo" method="post" autocomplete="off">
        <div class="clearfix">
            <div class="btn-wrap-sub">
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/{$_company->id|escape}');">企業情報に戻る</button>
                
                <!--
                {if $curr->format('Ym') != $now->format('Ym')}<button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/{$this_dir|escape}/');">● 当月に戻る</button>{/if}
                -->
                
                <!--当月に戻るボタンのパラメータを今日の年月で取得-->
                {if $curr->format('Ym') != $now->format('Ym')}<button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/{$this_dir|escape}/?y={date('Y')|escape}&m={date('m')|escape}');">● 当月に戻る</button>{/if}
            </div>
        </div>
        <input type="hidden" name="month" value="{$curr->format('n')|escape}">
        <input type="hidden" name="mode" value="">
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
                                        <div class="pull-left"><input type="checkbox" name="nippos[{$day|date_format:'%Y-%m-%d'}]" value="{$day|escape}"{if !isEmpty($nippos.$day) && $nippos.$day->cnt == $nippos.$day->cnt_finished} class="registed" checked{else} disabled{/if}></div>
                                        <div class="day">
                                            <span class="{$SET.WEEK_EN[$day|date_format:'%w']|escape}">{$day|date_format:'%e'}</span>
                                            {if isset($holidays[$day|date_format:'%Y-%m-%d'])} <span class="holi">{$holidays[$day|date_format:'%Y-%m-%d']|escape}</span>{/if}
                                        </div>
                                    </div>
                                    <div>
                                        {if isEmpty($nippos.$day)}
                                            {*なし*}
                                        {elseif $nippos.$day->cnt == $nippos.$day->cnt_finished}
                                            <span class="end">済</span>
                                        {elseif $nippos.$day->cnt > $nippos.$day->cnt_finished}
                                            <span class="yet">未</span>
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
        <div class="btn-wrap">
            <a href="javascript:void(0);" name="check_registed">「済」表示の日付を選択</a>
          {*｜<a href="javascript:void(0);" name="check_all">すべて選択</a>*}
          ｜<a href="javascript:void(0);" name="release_all">すべて解除</a>
        </div>
        <div class="btn-wrap">
            選択した日付の日報を<br>
            <button type="button" class="btn btn-primary btn-suitable" name="output">CSV出力</button>
        </div>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        $(document).ready(function() {
            // 日付チェックボックス押下時
            $('input[name^="nippos"]').on('change', function() {
                adjustCheckboxes();
            });

            // チェックされている日付のみ選択押下時
            $('a[name="check_registed"]').on('click', function() {
                $('input[name^="nippos"]').prop('checked', false);
                $('input[name^="nippos"].registed').prop('checked', true);
                adjustCheckboxes();
            });

            // すべて選択押下時
            $('a[name="check_all"]').on('click', function() {
                $('input[name^="nippos"]').prop('checked', true);
                adjustCheckboxes();
            });

            // すべて解除押下時
            $('a[name="release_all"]').on('click', function() {
                $('input[name^="nippos"]').prop('checked', false);
                adjustCheckboxes();
            });

            // CSV出力ボタン押下時
            $('button[name="output"]').on('click', function() {
                if (!$('input[name^="nippos"]').is(':checked')) {
                    alert('日付けが選択されていません。');
                    return false;
                }

                if (!confirmTo('選択した日付の仕訳データをCSV出力します。\nよろしいですか？')) {
                    return false;
                }

                $('input[name="mode"]').val('output');
                $('form#nippo').submit();
            });

            adjustCheckboxes();
        });

        // 日付チェックボックスの表示を調整する
        function adjustCheckboxes()
        {
            $('input[name^="nippos"]').each(function() {
                if ($(this).is(':checked')) {
                    $(this).parent().parent().parent('td').addClass('selected');
                } else {
                    $(this).parent().parent().parent('td').removeClass('selected');
                }
            });
        }
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
