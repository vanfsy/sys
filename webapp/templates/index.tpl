{capture name=css}
<style type="text/css">
/*<![CDATA[*/{literal}
{/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title='企業・店舗様トップ' _css=$smarty.capture.css}
<div id="contents">



</div>
{capture name=js}
<script type="text/javascript">
/*<![CDATA[*/{literal}
    $(document).ready(function() {
    });
{/literal}/*]]>*/
</script>
{/capture}
{include file='common/footer.tpl' _js=$smarty.capture.js}
