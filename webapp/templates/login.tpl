{capture name=css}
<style type="text/css">
/*<![CDATA[*/{literal}
{/literal}/*]]>*/
</style>
{/capture}
{include file='common/header.tpl' _title='企業・店舗様ログイン' _css=$smarty.capture.css}
<div id="contents">
    <div class="login">
        <div class="paragraph">企業・店舗様ログイン</div>
        <form id="login" method="post" autocomplete="off">
            <div class="form-group{if isset($errors.login_id) || isset($errors.login)} has-error{/if}">
                <label for="gender">ログインID</label>
                <input type="text" class="form-control" name="login_id" value="{$params.login_id|escape}">
                {if isset($errors.login_id)}<p class="help-block"><small class="color-red">{$errors.login_id|escape}</small></p>{/if}
            </div>
            <div class="form-group{if isset($errors.password) || isset($errors.login)} has-error{/if}">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password" value="">
                {if isset($errors.password)}<p class="help-block"><small class="color-red">{$errors.password|escape}</small></p>{/if}
                {if isset($errors.login)}<p class="help-block"><small class="color-red">{$errors.login|escape}</small></p>{/if}
            </div>
            <div class="btn-wrap">
                <button type="submit" class="btn btn-default btn-suitable">ログイン</button>
            </div>
        </form>
    </div>
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
