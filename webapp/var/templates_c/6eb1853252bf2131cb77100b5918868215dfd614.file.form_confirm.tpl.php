<?php /* Smarty version Smarty-3.1.19, created on 2019-12-17 20:16:22
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/form_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:256625095c40384c616113-18762208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eb1853252bf2131cb77100b5918868215dfd614' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/tenpo/form_confirm.tpl',
      1 => 1576579500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256625095c40384c616113-18762208',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c40384c637765_57431141',
  'variables' => 
  array (
    '_company' => 0,
    '_caption' => 0,
    '_mode' => 0,
    'token' => 0,
    'params' => 0,
    'SET' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c40384c637765_57431141')) {function content_5c40384c637765_57431141($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
?><div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_caption']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>確認<?php }?></div>
<form id="<?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>complete<?php } else { ?>detail<?php }?>" class="form-horizontal" method="post" action="<?php if ($_smarty_tpl->tpl_vars['_mode']->value!='detail') {?>./execute.php<?php }?>">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?><input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value!='add') {?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">ID</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo sprintf('%05d',$_smarty_tpl->tpl_vars['params']->value['id']);?>
</div>
            </div>
        </div>
    <?php }?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="name">店舗名</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="tel">電話番号</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="postal">郵便番号</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['postal'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="prefecture">都道府県</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['PREFECTURE'][$_smarty_tpl->tpl_vars['params']->value['prefecture']], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="address">所在地</label>
        <div class="col-sm-9">
            <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['address'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="address">使用科目</label>
        <div class="col-sm-9">
            <div class="uneditable kamokus">
                <div class="inner">
                    <p>【現金売上】</p>
                    <div>
                        <div>＜借方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_cash_kari'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_cash_kari'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_cash_kashi'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_cash_kashi'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                </div>
                <div class="inner">
                    <p>【クレジット】</p>
                    <div>
                        <div>＜借方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_credit_kari'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_credit_kari'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_credit_kashi'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_credit_kashi'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                </div>
                <div class="inner">
                    <p>【掛売上】</p>
                    <div>
                        <div>＜借方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_kakeuri_kari'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_kakeuri_kari'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_kakeuri_kashi'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_kakeuri_kashi'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                </div>
                <div class="inner">
                    <p>【掛売回収】</p>
                    <div>
                        <div>＜借方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_others_kari'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_others_kari'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_others_kashi'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_sales_others_kashi'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                </div>
                <div class="inner">
                    <p>【現金預入額等】</p>
                    <div>
                        <div>＜借方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kari'])&&count($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kari'])>0) {?>
                            <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kari'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                        <?php }?>
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kashi'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_deposit_kashi'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                </div>
                <div class="inner">
                    <p>【現金支払額等】</p>
                    <div>
                        <div>＜借方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kari'])&&count($_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kari'])>0) {?>
                            <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kari'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                        <?php }?>
                    </div>
                    <div>
                        <div>＜貸方＞</div>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kashi'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['kamoku_payment_kashi'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="bumon">この店舗で使用する部門</label>
        <div class="col-sm-9">
            <div class="uneditable">
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['bumons']['bumon'])&&count($_smarty_tpl->tpl_vars['params']->value['bumons']['bumon'])>0) {?>
                    <?php echo htmlspecialchars(implode($_smarty_tpl->tpl_vars['params']->value['bumons']['bumon'],' ／ '), ENT_QUOTES, 'UTF-8', true);?>

                <?php }?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="is_operated">稼働状況</label>
        <div class="col-sm-9">
            <div class="uneditable"><span class="status <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['TENPO_IS_OPERATED_CLASS'][$_smarty_tpl->tpl_vars['params']->value['is_operated']], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['TENPO_IS_OPERATED'][$_smarty_tpl->tpl_vars['params']->value['is_operated']], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="created">登録日時</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['params']->value['created'],'%Y-%m-%d %H:%M');?>
</div>
            </div>
        </div>
    <?php }?>
    <div class="btn-wrap">
        <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">一覧に戻る</button>
            <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/edit/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">編集</button>
            <button type="button" class="btn btn-danger btn-suitable" onclick="ajaxTo(null, '/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/remove/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
', 'get', 'remove');">削除</button>
        <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['_mode']->value=='edit') {?>
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/edit/<?php echo $_smarty_tpl->tpl_vars['params']->value['id'];?>
?back');">入力に戻る</button>
            <?php } else { ?>
                <button type="button" class="btn btn-default btn-suitable" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/add/?back');">入力に戻る</button>
            <?php }?>
            <button type="button" class="btn btn-primary btn-suitable" onclick="submitTo('complete');">決定</button>
        <?php }?>
    </div>
</form>
<style type="text/css">
    /*<![CDATA[*/
        .btn-icon {
            width:   34px;
            padding: 6px;
        }

        .bumon-new-row {
            display: none;
        }

        /* 使用科目 */
        .kamokus .inner {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .kamokus .inner>p {
            flex: 1 1 100%;
            margin:      8px 0;
            font-weight: bold;
        }

        .kamokus .inner>div {
            flex: 0 0 50%;
        }

        .kamokus .inner .radio>div,
        .kamokus .inner .checkbox>div {
            margin-bottom: 8px;
        }

        .kamokus .inner .radio label,
        .kamokus .inner .checkbox label {
            min-width: 45%;
        }

        /* この店舗で使用する部門 */
        .bumon-row {
            margin-left:   -4px;
            margin-right:  -4px;
            margin-bottom: 8px;
        }

        .bumon-row .inner {
            display: flex;
        }

        .bumon-row .inner>div {
            margin: 0 4px;
        }

        .bumon-row .inner>div.remove {
            flex: 1 1 auto;
        }

        .bumon-row .inner>div.bumon {
            flex: 0 1 45%;
        }

        .bumon-row .inner>div.kamoku {
            flex: 0 1 45%;
        }

        .status {
            display: inline-block;
            padding: 1px 20px;
        }
    /*]]>*/
</style>

<?php }} ?>
