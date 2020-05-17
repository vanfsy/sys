{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
        .inner {
            display: flex;
            flex-wrap: wrap;
        }

        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        form {
            flex: 0 0 50%;
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
    <p>
        弥生会計で使用している部門を以下に張り付けて登録ボタンを押下してください。<br>
        補助科目がある場合は、[科目名] [タブ文字もしくは空白] [補助科目] と入力してください。
    </p>
    <div class="inner">
        <form id="sales" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="{$token|escape}">
            <div class="form-group{if isset($errors.kamoku_sales)} has-error{/if}">
                <label for="kamoku_sales">売上</label>
                <div>
                    <textarea class="form-control" name="kamoku_sales" rows="10">{$params.kamoku_sales|escape}</textarea>
                    {if isset($errors.kamoku_sales)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales|escape}</small></p>{/if}
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('sales');">登録</button>
            </div>
        </form>
        <form id="sales_debt" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="{$token|escape}">
            <div class="form-group{if isset($errors.kamoku_sales_debt)} has-error{/if}">
                <label for="kamoku_sales_debt">売上債務</label>
                <div>
                    <textarea class="form-control" name="kamoku_sales_debt" rows="10">{$params.kamoku_sales_debt|escape}</textarea>
                    {if isset($errors.kamoku_sales_debt)}<p class="help-block"><small class="color-red">{$errors.kamoku_sales_debt|escape}</small></p>{/if}
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('sales_debt');">登録</button>
            </div>
        </form>
        <form id="deposit" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="{$token|escape}">
            <div class="form-group{if isset($errors.kamoku_deposit)} has-error{/if}">
                <label for="kamoku_deposit">預金</label>
                <div>
                    <textarea class="form-control" name="kamoku_deposit" rows="10">{$params.kamoku_deposit|escape}</textarea>
                    {if isset($errors.kamoku_deposit)}<p class="help-block"><small class="color-red">{$errors.kamoku_deposit|escape}</small></p>{/if}
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('deposit');">登録</button>
            </div>
        </form>
        <form id="purchase" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="{$token|escape}">
            <div class="form-group{if isset($errors.kamoku_purchase)} has-error{/if}">
                <label for="kamoku_purchase">仕入</label>
                <div>
                    <textarea class="form-control" name="kamoku_purchase" rows="10">{$params.kamoku_purchase|escape}</textarea>
                    {if isset($errors.kamoku_purchase)}<p class="help-block"><small class="color-red">{$errors.kamoku_purchase|escape}</small></p>{/if}
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('purchase');">登録</button>
            </div>
        </form>
        <form id="expense" class="form-horizontal" action="./execute.php" method="post" autocomplete="off">
            <input type="hidden" name="token" value="{$token|escape}">
            <div class="form-group{if isset($errors.kamoku_expense)} has-error{/if}">
                <label for="kamoku_expense">経費</label>
                <div>
                    <textarea class="form-control" name="kamoku_expense" rows="10">{$params.kamoku_expense|escape}</textarea>
                    {if isset($errors.kamoku_expense)}<p class="help-block"><small class="color-red">{$errors.kamoku_expense|escape}</small></p>{/if}
                </div>
            </div>
            <div class="btn-wrap">
                <button type="button" class="btn btn-primary btn-suitable" onclick="is_changed=false; submitTo('expense');">登録</button>
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
                alert('科目マスタを更新しました。');
                window.history.pushState('', document.title, window.location.pathname);
            }
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
