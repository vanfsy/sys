<?php /* Smarty version Smarty-3.1.19, created on 2019-04-10 16:27:15
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/backup/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20437514535ca2b93d883f88-54521933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9fa70f284c30a1990b37072c24b4aa2dbdd27e1' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/backup/index.tpl',
      1 => 1554881160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20437514535ca2b93d883f88-54521933',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ca2b93d8b0b24_77428378',
  'variables' => 
  array (
    'this_label' => 0,
    'params' => 0,
    '_company' => 0,
    'errors' => 0,
    'set_settlement_period' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ca2b93d8b0b24_77428378')) {function content_5ca2b93d8b0b24_77428378($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/function.html_checkboxes.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>$_smarty_tpl->tpl_vars['this_label']->value,'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
');">企業情報に戻る</button>
    </div>
    <form id="import" class="form-horizontal" method="post" action="">
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">ID</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo sprintf('%05d',$_smarty_tpl->tpl_vars['params']->value['id']);?>
</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">企業名</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="settlement_month">決算月</label>
            <div class="col-sm-9">
                <div class="uneditable"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['settlement_month'], ENT_QUOTES, 'UTF-8', true);?>
 月</div>
            </div>
        </div>
        <div class="btn-wrap">
            <label for="importBtn" class="btn btn-default btn-suitable">インポート<input type="file" id="importBtn" name="import_file" accept=".zip" style="display:none;"></label>
        </div>
    </form>
    <br>
    <br>
    <br>
    <form id="export" class="form-horizontal" method="post" action="./export.php">
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">エクスポートする会計年度</label>
            <div class="col-sm-9<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['nodata'])) {?> has-error<?php }?>">
                <div class="checkbox"><?php echo smarty_function_html_checkboxes(array('name'=>'settlement_period','options'=>$_smarty_tpl->tpl_vars['set_settlement_period']->value),$_smarty_tpl);?>
</div>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['nodata'])) {?><p class="help-block"><small class="color-red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['nodata'], ENT_QUOTES, 'UTF-8', true);?>
</small></p><?php }?>
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-default btn-suitable" name="export">エクスポート</button>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        $(document).ready(function() {
            var tag = '<input type="file" id="importBtn" name="import_file" accept=".zip" style="display:none;">';

            // インポートファイル選択時
            $('label').on('change', 'input[type="file"]', function() {
                if (!$(this).prop('files').length) {
                    return false;
                }

                lock();

                var $me    = $(this);
                var text   = $me.parent().text();
                var file   = $me.prop('files')[0];
                var reader = new FileReader();

                reader.onloadend = function(event) {
                    $.ajax({
                        timeout:  60000,
                        async:    false,
                        cache:    true,
                        type:     'post',
                        url:      '/api/nippo/import.php',
                        dataType: 'text',
                        data: {
                            data:       event.target.result,
                            name:       file.name,
                            type:       file.type,
                            company_id: $('[name="company_id"]').val(),
                        },
                        beforeSend: function() {
                            if (file.type !== 'application/x-compress'
                             && file.type !== 'application/x-lha'
                             && file.type !== 'application/x-lha-compressed'
                             && file.type !== 'application/x-lk-rlestream'
                             && file.type !== 'application/x-zip-compressed'
                             && file.type !== 'application/zip'
                             && file.type !== 'multipart/x-zip'
                            ) {
                                alert('サポートされていない形式のファイルです。\nzipファイル形式のファイルを選択してください。');
                                return false;
                            }

                            if (!confirmTo('データをインポートします。よろしいですか？')) {
                                return false;
                            }
                        },
                        success: function(response) {
                            if (response == '0') {
                                alert('インポート処理中にエラーが発生しました。');
                                return false;
                            }

                            if (response == '99') {
                                alert('不正なファイルを検出したため、処理を中断しました。');
                                return false;
                            }

                            alert('インポートが完了しました。');
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert('インポートに失敗しました。');
                        }
                    });

                    $me.replaceWith(tag);
                };

                reader.readAsDataURL(file);

                unlock();
            });

            // エクスポートボタン押下時
            $('button[name="export"]').on('click', function() {
                if (!$('input[name^="settlement_period"]').is(':checked')) {
                    alert('会計年度が選択されていません。');
                    return false;
                }

                if (!confirmTo('選択した会計年度の画像データをエクスポートします。\nよろしいですか？')) {
                    return false;
                }

                lock();

                $('form#export').submit();

                unlock();
            });
        });
    /*]]>*/
</script>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
