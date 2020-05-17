{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$this_label|cat:'登録' _css=$smarty.capture.css}
<div id="contents">
    {include file='admin/'|cat:$this_dir|cat:'/form_confirm.tpl' _mode='add' _caption=$this_label|cat:'登録'}
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
