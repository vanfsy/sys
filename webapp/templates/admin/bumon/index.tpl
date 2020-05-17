{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        form {
            padding:      15px;
            padding-left: 0;
        }
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$this_label|cat:'登録' _css=$smarty.capture.css}
<div id="contents">
    <div class="paragraph">{$params.name|escape}　{$this_label|escape}登録</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/{$_company->id}');">企業情報に戻る</button>
    </div>
    <p>弥生会計で使用している部門を以下に張り付けて登録ボタンを押下してください。</p>
    <div class="inner">
        <form id="sales" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="{$token|escape}">
            <div class="form-group{if isset($errors.bumon)} has-error{/if}">
                <div>
                    <textarea class="form-control" name="bumon" rows="10">{$params.bumon|escape}</textarea>
                    {if isset($errors.bumon)}<p class="help-block"><small class="color-red">{$errors.bumon|escape}</small></p>{/if}
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('sales');">登録</button>
            </div>
        </form>
    </div>
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
                alert('部門マスタを更新しました。');
                window.history.pushState('', document.title, window.location.pathname);
            }
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
