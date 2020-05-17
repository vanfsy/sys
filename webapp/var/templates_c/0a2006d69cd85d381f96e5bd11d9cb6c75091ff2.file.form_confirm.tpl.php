<?php /* Smarty version Smarty-3.1.19, created on 2019-12-16 11:34:23
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/company/output/form_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19930407875df6ed2fd33311-24456576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a2006d69cd85d381f96e5bd11d9cb6c75091ff2' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/company/output/form_confirm.tpl',
      1 => 1576225440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19930407875df6ed2fd33311-24456576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_company' => 0,
    'tenpos' => 0,
    'tenpo' => 0,
    'SET' => 0,
    '_mode' => 0,
    'this_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5df6ed2fd49654_95861640',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5df6ed2fd49654_95861640')) {function content_5df6ed2fd49654_95861640($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        .inner .form-horizontal .form-group {
            margin-left:  0;
            margin-right: 0;
        }

        .end,
        .yet {
            display:       inline-block;
            width:         28px;
            height:        28px;
            border-radius: 50%;
            font-size:     1.25rem;
            font-weight:   bold;
            text-align:    center;
        }

        .end {
            border: 2px #FF3333 solid;
            color:  #FF3333;
        }

        .yet {
            color: #999999;
        }
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>





<style type="text/css">
.registed{
    vertical-align:top;
}
</style>


    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 CSVデータ出力の店舗一覧</div>
    <!--<form id="nippo" method="post" autocomplete="off" action="/admin/output/">-->
    <form name="nippo" id="nippo" method="post" action="/admin/output/?y=<?php echo htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8', true);?>
&m=<?php echo htmlspecialchars(date('m'), ENT_QUOTES, 'UTF-8', true);?>
">
        <div class="clearfix">
            <div class="btn-wrap-sub">
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">企業情報に戻る</button>
            </div>
        </div>
    
    

        <small><a href="javascript:void(0);" name="check_all">すべて選択</a><!--<a href="javascript:void(0);" name="check_registed">すべて選択</a>-->｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small>
        <!--<table class="company-csv table table-hover table-striped table-bordered">-->
        <table class="company-csv table table-hover table-striped table-bordered">
            <colgroup>
                <!--<col width="30"></col>-->
                <col width=""></col>
                <col width="150"></col>
                <col width="150"></col>
                <col width="110"></col>
            </colgroup>
            <thead>
                <tr>
                    <!--<th class="text-center">&nbsp;</th>-->
                    <th class="text-center">店舗名</th>
                    <th class="text-center">稼働状況</th>
                    <th class="text-center">登録日時</th>
                    <!--<th class="text-center">CSV出力</th>-->
                </tr>
            </thead>
            <tbody>
         
    
                <?php  $_smarty_tpl->tpl_vars['tenpo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tenpo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tenpos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tenpo']->key => $_smarty_tpl->tpl_vars['tenpo']->value) {
$_smarty_tpl->tpl_vars['tenpo']->_loop = true;
?>
                    <tr>
                        <td class="text-center shop_name">

                                <div>
                                    <div class="pull-left">
                                    <input type="checkbox" name="nippos[]" value="<?php echo $_smarty_tpl->tpl_vars['tenpo']->value->id;?>
" class="registed" checked="checked" id="nippos[]"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>

                                </div>
                            </div>
                            
                        </td>
                        
                        <!--店舗名-->
                        <!--<td class="text-left truncate"><div><a href="/admin/tenpo/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></div></td>-->
                        <!--<td class="text-left truncate"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</td>-->
                        <td class="text-center"><span class="status <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['TENPO_IS_OPERATED_CLASS'][$_smarty_tpl->tpl_vars['tenpo']->value->is_operated], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['TENPO_IS_OPERATED'][$_smarty_tpl->tpl_vars['tenpo']->value->is_operated], ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                        <td class="text-center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['tenpo']->value->created,'%Y-%m-%d %H:%M');?>
</td>

                    </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['tenpo']->_loop) {
?>
                <?php } ?>
                
<!--
/*すべて選択を下に表示*/
                <tr>
                <td colspan="4"><small><a href="javascript:void(0);" name="check_all">すべて選択</a>｜<a href="javascript:void(0);" name="release_all">すべて解除</a></small></td>
                </tr>
-->

                
            </tbody>
    </table>

    
    
</form>





<div class="btn-wrap">
    
    
<!--チェックした店舗のCSV作成-->
<button type="button" class="btn btn-primary btn-suitable" name="csv_output" onclick="return false;">チェックした店舗のCSV作成</button>

<!--
<button type="button" class="btn btn-primary btn-suitable" name="output" onclick="linkTo('/admin/output/');">チェックした店舗のCSV作成</button>
<input type="submit" class="btn btn-primary btn-suitable" name="output" onclick="return false;" value="チェックした店舗のCSV作成">
-->
    
</div>


<!--
<div class="btn-wrap">
<button type="button" class="btn btn-default btn-suitable" name="output" onclick="linkTo('/admin/output/');">全店舗一括CSV出力</button>
</div>

<div class="btn-wrap">
<?php if ($_smarty_tpl->tpl_vars['_mode']->value=='detail') {?>
<button type="button" class="btn btn-default btn-suitable" name="output" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/');">一覧に戻る</button>
<?php } else { ?>
<?php }?>
</div>
-->

































<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
    

        $(document).ready(function() {
            // 店舗チェックボックス押下時
            $('input[name^="nippos"]').on('change', function() {
                adjustCheckboxes();
            });

            // チェックされている日付のみ選択押下時
            $('a[name="check_registed"]').on('click', function() {
                $('input[name^="nippos"]').prop('checked', false);
                $('input[name^="nippos"].registed').prop('checked', true);
                adjustCheckboxes();
            });

            // すべて選択押下時
            $('a[name="check_all"]').on('click', function() {
                $('input[name^="nippos"]').prop('checked', true);
                adjustCheckboxes();
            });

            // すべて解除押下時
            $('a[name="release_all"]').on('click', function() {
                $('input[name^="nippos"]').prop('checked', false);
                adjustCheckboxes();
            });
            
            // チェックした店舗のCSV作成ボタン押下時
            $('button[name="csv_output"]').on('click', function() {
                if (!$('input[name^="nippos"]').is(':checked')) {
                    alert('店舗が選択されていません。');
                    return false;
                }
                 document.nippo.submit();
                
            });

            
            
            adjustCheckboxes();
        });
    
    

        // 日付チェックボックスの表示を調整する
        function adjustCheckboxes()
        {
            $('input[name^="nippos"]').each(function() {
                if ($(this).is(':checked')) {
                    $(this).parent().parent().parent('td').addClass('selected');
                } else {
                    $(this).parent().parent().parent('td').removeClass('selected');
                }
            });
        }
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
