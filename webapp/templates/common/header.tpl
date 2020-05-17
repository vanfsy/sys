{* 共通ヘッダ *}
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="{if $_description}{$_description|escape}{else}{$smarty.const.SYSTEM_DESCRIPTION|escape}{/if}">
<title>{if $_title}{$_title|escape}｜{/if}{$smarty.const.SYSTEM_NAME|escape}</title>
<link rel="shortcut icon" type="image/x-icon" href="/inc/img/favicon.ico">
<link rel="stylesheet" type="text/css" href="/inc/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/inc/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/inc/lity/2.3.1/lity.min.css">
<link rel="stylesheet" type="text/css" href="/inc/css/user.css?{$now->format('his')}">
<script type="text/javascript" src="/inc/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/inc/jquery/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/inc/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/inc/lity/2.3.1/lity.min.js"></script>
<script type="text/javascript" src="/inc/js/user.js?{$now->format('his')}"></script>
{$_css}
</head>
<body>
<div id="filter"></div>
<div id="wrapper">
    <div id="filter"><div class="spinner"></div></div>
    <div id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">{$smarty.const.SYSTEM_NAME|escape|nl2br}</a>
                    {if isset($_user.name)}
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="true">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    {/if}
                    <div class="navbar-text"><span id="who_is">{if isset($_user.name)}【{$_user.name|escape}】様{/if}</span></div>
                </div>
                {if $_nav !== false}
                    {if isset($_user.name)}
                        <div class="collapse navbar-collapse" id="navbar-items">
                            <ul class="nav navbar-nav navbar-right">
                                {if $_user.auth == $smarty.const.USER_AUTH_TENPO}<li class="text-right"><a href="/nippo/">日報一覧</a></li>{/if}
                                <li class="text-right"><a href="/sales/">店舗売上</a></li>
                                {if $_user.auth == $smarty.const.USER_AUTH_TENPO}<li class="text-right"><a href="/settings/">{*<small> <i class="glyphicon glyphicon-cog"></i> </small>*}設定</a></li>{/if}
                                <li class="text-right"><a href="javascript:void(0);" onclick="linkTo('/logout.php', 'logout');">ログアウト</a></li>
                            </ul>
                        </div>
                    {/if}
                {/if}
            </div>
        </nav>
    </div>
    <!-- /header -->
