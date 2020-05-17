<?php /* Smarty version Smarty-3.1.19, created on 2019-01-24 12:06:32
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/nippo/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14277375475c40386259d376-39650816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '208dc7ff748195b54cbd7f61f365ca20448b3ab2' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/admin/nippo/index.tpl',
      1 => 1548036240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14277375475c40386259d376-39650816',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c4038625d8f12_15923161',
  'variables' => 
  array (
    'this_label' => 0,
    '_company' => 0,
    '_tenpo' => 0,
    'curr' => 0,
    'now' => 0,
    'this_dir' => 0,
    'prev' => 0,
    'next' => 0,
    'calendar' => 0,
    'week' => 0,
    'day' => 0,
    'SET' => 0,
    'holidays' => 0,
    'nippos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4038625d8f12_15923161')) {function content_5c4038625d8f12_15923161($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        .nippo-status {
            padding-top: 8px;
            font-size:   0.8rem;
            text-align:  center;
        }
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
    <div class="paragraph"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tenpo']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
    <form id="nippo" method="post" autocomplete="off">
        <div class="clearfix">
            <div class="btn-wrap-sub">
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_company']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">企業情報に戻る</button>
                <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/tenpo/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tenpo']->value->id, ENT_QUOTES, 'UTF-8', true);?>
');">店舗情報に戻る</button>
                <?php if ($_smarty_tpl->tpl_vars['curr']->value->format('Ym')!=$_smarty_tpl->tpl_vars['now']->value->format('Ym')) {?><button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/');">● 当月に戻る</button><?php }?>
            </div>
        </div>
        <input type="hidden" name="month" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['curr']->value->format('n'), ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="action" value="">
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
                                        <div class="day">
                                            <span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['WEEK_EN'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%w')], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%e');?>
</span>
                                            <?php if (isset($_smarty_tpl->tpl_vars['holidays']->value[smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%Y-%m-%d')])) {?> <span class="holi"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['holidays']->value[smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%Y-%m-%d')], ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php if (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])) {?>
                                            <a href="/admin/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/detail/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
" class="btn btn-default btn-xs">日報</a>
                                            <?php if ($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status==@constant('NIPPO_STATUS_FINISHED')) {?><div class="nippo-status"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['NIPPO_STATUS'][$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
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
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        $(document).ready(function() {
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
