{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$this_label|cat:'詳細' _css=$smarty.capture.css}
<div id="contents">
    {include file='admin/'|cat:$this_dir|cat:'/form_confirm.tpl' _mode='detail' _caption=$this_label|cat:'詳細'}
    <div class="btn-wrap">
        <div class="btn-group">
            <button type="button" class="btn btn-default" onclick="submitTo('detail', '/admin/nippo/');"><i class="glyphicon glyphicon-calendar"></i> 日報 　</button>
        </div>
    </div>
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
