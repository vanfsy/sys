{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        #sales .inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 40px;
            padding:    8px 0;
        }

        #sales .inner {
            flex: 0 0 50%;
        }

        #sales .tenpo-name,
        #sales .total-amount {
            font-weight: bold;
        }

        #sales .tenpo-name {
            font-size: 1.25rem;
            float: left;
        }

        #sales .total-amount {
            float: right;
        }

        #sales .transition {
            display: none;
        }

        #sales .transition-toggle {
            font-size:  90%;
            text-align: right;
        }

        a.tel {
            width:            24px;
            height:           24px;
            padding:          4px;
            border-radius:    50%;
            background-color: #44DD66;
            color:            #FFFFFF;
            font-size:        0.9rem;
            text-align:       center;
        }

        /* スマートフォン-S（横幅 320px以下） */
        @media screen and (max-width: 320px) {
            .input-group .form-control {
                width: 131px;
            }
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title=$this_label _css=$smarty.capture.css}
<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<div id="contents">
    <div class="paragraph">{*$_company->name|escape*} {$this_label|escape}</div>
    <form id="sales" class="form-horizontal" method="get" autocomplete="off">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="form-group form-group-sm">
                <div class="input-group">
                    <input class="form-control" type="date" name="date_from" value="{$params.date_from|escape}">
                    <div class="input-group-addon" style="border-left:none; border-right:none;">～</div>
                    <input class="form-control" type="date" name="date_to" value="{$params.date_to|escape}">
                </div>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            <div class="text-right">
                <a class="today" href="javascript:void(0);">今日</a>
              　<a class="week"  href="javascript:void(0);">今週</a>
              　<a class="month" href="javascript:void(0);">今月</a>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            <div class="btn-wrap">
                <button type="submit" class="btn btn-sm btn-default btn-suitable">売上を確認</button>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {foreach from=$sales key='tenpo_id' item='row'}
                <div class="clearfix">
                    <div class="tenpo-name">{$set_tenpo[$tenpo_id]->name|escape}{*if $set_tenpo[$tenpo_id]->tel}　<a class="visible-xs-inline-block tel" href="tel:{$set_tenpo[$tenpo_id]->tel|escape}"><i class="glyphicon glyphicon-earphone"></i></a>{/if*}</div>
                    <div class="total-amount"><span class="money">{$row|array_sum}</span></div>
                </div>
                <div class="transition">
                    {foreach from=$days item='day'}
                        <div class="inner">
                            <div class="date">{$day|date_format:'Y年 m月 d日'}（<span class="{$SET.WEEK_EN[$day|date_format:'%w']|escape}">{$SET.WEEK[$day|date_format:'w']}</span>）</div>
                            <div class="amount"><span class="money">{$row[$day]|escape}</span></div>
                        </div>
                    {/foreach}
                </div>
                <div class="transition-toggle"><a href="javascript:void(0);"><span>＋</span> 推移</a></div>
                <hr>
            {/foreach}
        </div>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        $(document).ready(function() {
            $('span.money').moneyFormat();

            var dateFormat = function(date, format) {
                format = format ? format : 'Y-m-d';
                format = format.replace(/Y/g, date.getFullYear());
                format = format.replace(/m/g, ('0' + (date.getMonth() + 1)).slice(-2));
                format = format.replace(/d/g, ('0' + date.getDate()).slice(-2));
                return format;
            };

            $('.today').on('click', function() {
                now = new Date();

                // 今日
                $('[name="date_from"],[name="date_to"]').val(dateFormat(now));

                submitTo('sales');
            });

            $('.week').on('click', function() {
                now = new Date();

                // 週初め
                now.setDate(now.getDate() - now.getDay());
                $('[name="date_from"]').val(dateFormat(now));

                // 週末
                now.setDate(now.getDate() + 6);
                $('[name="date_to"]').val(dateFormat(now));

                submitTo('sales');
            });

            $('.month').on('click', function() {
                now = new Date();

                // 月初
                now.setDate(1);
                $('[name="date_from"]').val(dateFormat(now));

                // 月末
                now.setMonth(now.getMonth() + 1);
                now.setDate(0);
                $('[name="date_to"]').val(dateFormat(now));

                submitTo('sales');
            });

            $('.transition-toggle>a').on('click', function() {
                $(this).parent().prev('.transition').slideToggle('normal', function() {
                    var sign = $(this).is(':visible') ? '－' : '＋';
                    $(this).next('.transition-toggle').find('span').text(sign);
                });
            });
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='common/footer.tpl' _js=$smarty.capture.js}
