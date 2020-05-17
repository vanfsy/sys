{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$this_label|cat:'情報' _css=$smarty.capture.css}
<div id="contents">
    
    <!--ここだけCSV出力用の読み込みに変更する-->
    {include file='admin/company/output/form_confirm.tpl' _mode='detail' _caption=$this_label|cat:'情報'}
    
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

