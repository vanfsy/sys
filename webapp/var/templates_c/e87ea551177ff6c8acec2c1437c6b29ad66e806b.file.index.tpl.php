<?php /* Smarty version Smarty-3.1.19, created on 2019-12-18 11:26:37
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/output/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18815073635ca1db88967c86-34797437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87ea551177ff6c8acec2c1437c6b29ad66e806b' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/output/index.tpl',
      1 => 1576635480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18815073635ca1db88967c86-34797437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ca1db889d31a1_38961916',
  'variables' => 
  array (
    '_company' => 0,
    'curr' => 0,
    'now' => 0,
    'this_dir' => 0,
    'prev' => 0,
    'next' => 0,
    'calendar' => 0,
    'week' => 0,
    'day' => 0,
    'nippos' => 0,
    'SET' => 0,
    'holidays' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ca1db889d31a1_38961916')) {function content_5ca1db889d31a1_38961916($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
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
<?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>($_smarty_tpl->tpl_vars['_company']->value->name).(' 締め状況'),'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<div id="contents">
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 締め状況</div>
    <form id="nippo" method="post" autocomplete="off">
        <div class="clearfix">
            <div class="btn-wrap-sub">
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">企業情報に戻る</button>
                
                <!--
                <?php if ($_smarty_tpl->tpl_vars['curr']->value->format('Ym')!=$_smarty_tpl->tpl_vars['now']->value->format('Ym')) {?><button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/');">● 当月に戻る</button><?php }?>
                -->
                
                <!--当月に戻るボタンのパラメータを今日の年月で取得-->
                <?php if ($_smarty_tpl->tpl_vars['curr']->value->format('Ym')!=$_smarty_tpl->tpl_vars['now']->value->format('Ym')) {?><button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/?y=<?php echo htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8', true);?>
&m=<?php echo htmlspecialchars(date('m'), ENT_QUOTES, 'UTF-8', true);?>
');">● 当月に戻る</button><?php }?>
            </div>
        </div>
        <input type="hidden" name="month" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['curr']->value->format('n'), ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="mode" value="">
        <table class="calendar-month">
            <tbody>
                <tr>
                    <td><div class="text-right"><a class="btn btn-default btn-sm" href="?y=<?php echo $_smarty_tpl->tpl_vars['prev']->value->format('Y');?>
&m=<?php echo $_smarty_tpl->tpl_vars['prev']->value->format('m');?>
">　<i class="glyphicon glyphicon-menu-left"></i>　</a></div></td>
                    <td><span class="year-month"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['curr']->value->format('Y年 m月'), ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                    <td><div class="text-left"><a class="btn btn-default btn-sm" href="?y=<?php echo $_smarty_tpl->tpl_vars['next']->value->format('Y');?>
&m=<?php echo $_smarty_tpl->tpl_vars['next']->value->format('m');?>
">　<i class="glyphicon glyphicon-menu-right"></i>　</a></div></td>
                </tr>
            </tbody>
        </table>
        <table class="calendar-day">
            <thead><tr><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th class="sat">土</th><th class="sun">日</th></tr></thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['week'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['week']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['calendar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['week']->key => $_smarty_tpl->tpl_vars['week']->value) {
$_smarty_tpl->tpl_vars['week']->_loop = true;
?>
                    <tr>
                        <?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['week']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
                            <?php if (smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%m')==$_smarty_tpl->tpl_vars['curr']->value->format('m')) {?>
                                <td>
                                    <div class="clearfix">
                                        <div class="pull-left"><input type="checkbox" name="nippos[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%Y-%m-%d');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['day']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!isEmpty($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->cnt==$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->cnt_finished) {?> class="registed" checked<?php } else { ?> disabled<?php }?>></div>
                                        <div class="day">
                                            <span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['WEEK_EN'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%w')], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%e');?>
</span>
                                            <?php if (isset($_smarty_tpl->tpl_vars['holidays']->value[smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%Y-%m-%d')])) {?> <span class="holi"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['holidays']->value[smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%Y-%m-%d')], ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php if (isEmpty($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])) {?>
                                            
                                        <?php } elseif ($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->cnt==$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->cnt_finished) {?>
                                            <span class="end">済</span>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->cnt>$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->cnt_finished) {?>
                                            <span class="yet">未</span>
                                        <?php }?>
                                    </div>
                                </td>
                            <?php } else { ?>
                                <td class="overflowed"><div class="day"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%e');?>
</div></td>
                            <?php }?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="btn-wrap">
            <a href="javascript:void(0);" name="check_registed">「済」表示の日付を選択</a>
          
          ｜<a href="javascript:void(0);" name="release_all">すべて解除</a>
        </div>
        <div class="btn-wrap">
            選択した日付の日報を<br>
            <button type="button" class="btn btn-primary btn-suitable" name="output">CSV出力</button>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        $(document).ready(function() {
            // 日付チェックボックス押下時
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

            // CSV出力ボタン押下時
            $('button[name="output"]').on('click', function() {
                if (!$('input[name^="nippos"]').is(':checked')) {
                    alert('日付けが選択されていません。');
                    return false;
                }

                if (!confirmTo('選択した日付の仕訳データをCSV出力します。\nよろしいですか？')) {
                    return false;
                }

                $('input[name="mode"]').val('output');
                $('form#nippo').submit();
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
