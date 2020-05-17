{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        .radio label, .checkbox label {
            margin-left: 13px;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title=$this_label _css=$smarty.capture.css}
<div id="contents">
    <div class="paragraph">{$this_label|escape}</div>
    <form id="tenpo" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="token" value="{$token|escape}">
        <input type="hidden" name="id" value="{$params.id|escape}">
        <div class="form-group{if isset($errors.is_operated)} has-error{/if}">
            <label class="col-sm-3 control-label" for="is_operated">店舗名</label>
            <div class="col-sm-9">
                <div class="uneditable">{$_tenpo->name|escape}</div>
            </div>
        </div>
        <div class="form-group{if isset($errors.is_operated)} has-error{/if}">
            <label class="col-sm-3 control-label" for="is_operated">稼働状況</label>
            <div class="col-sm-9">
                <div class="radio">
                    {html_radios name='is_operated' options=$SET.TENPO_IS_OPERATED selected=$params.is_operated|default:$smarty.const.FLAG_ON}
                    {if isset($errors.is_operated)}<p class="help-block"><small class="color-red">{$errors.is_operated|escape}</small></p>{/if}
                </div>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('tenpo', './confirm.php', 'post', 'setting');">設定</button>
        </div>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        // ページ内でフォームの内容が変更されたかどうか
        var is_changed = false;

        $(document).ready(function() {
            // ページ内でフォームの内容が変更された時の処理
            $('form input, form select, form textarea').on('change', function() {
                is_changed = true;
            });

            // ページ離脱時の処理
            $(window).on('beforeunload', function() {
                if (is_changed) {
                    return true;
                }
            });

            if (location.hash == '#ok') {
                alert('設定を更新しました。');
                window.history.pushState('', document.title, window.location.pathname);
            }
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='common/footer.tpl' _js=$smarty.capture.js}
