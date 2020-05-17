<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 15:37:48
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\sales\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:274655c25a88f5637a5-62136265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325bece04d87d280957cc56b7ab1c0a37bc47e5b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\sales\\index.tpl',
      1 => 1546583866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274655c25a88f5637a5-62136265',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c25a88f70c084_66438363',
  'variables' => 
  array (
    'this_label' => 0,
    'params' => 0,
    'sales' => 0,
    'tenpo_id' => 0,
    'set_tenpo' => 0,
    'row' => 0,
    'days' => 0,
    'day' => 0,
    'SET' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c25a88f70c084_66438363')) {function content_5c25a88f70c084_66438363($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        #sales .inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 40px;
            padding:    8px 0;
        }

        #sales .inner {
            flex: 0 0 50%;
        }

        #sales .inner .tenpo-name,
        #sales .inner .total-amount {
            font-weight: bold;
        }

        #sales .inner .tenpo-name {
            font-size: 1.25rem;
        }

        #sales .transition {
            display: none;
        }

        #sales .transition-toggle {
            font-size:  90%;
            text-align: right;
        }
    /*]]>*/
</style>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_title'=>$_smarty_tpl->tpl_vars['this_label']->value,'_css'=>Smarty::$_smarty_vars['capture']['css']), 0);?>

<script type="text/javascript" src="/inc/jquery/plugins/jquery.moneyFormat.js"></script>
<div id="contents">
    <div class="paragraph"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
    <form id="sales" class="form-horizontal" method="get" autocomplete="off">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="form-group form-group-sm">
                <div class="input-group">
                    <input class="form-control" type="date" name="date_from" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['date_from'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <div class="input-group-addon" style="border-left:none; border-right:none;">～</div>
                    <input class="form-control" type="date" name="date_to" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['date_to'], ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            <div class="text-right">
                <a class="today" href="javascript:void(0);">今日</a>
              　<a class="week"  href="javascript:void(0);">今週</a>
              　<a class="month" href="javascript:void(0);">今月</a>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            <div class="btn-wrap">
                <button type="submit" class="btn btn-sm btn-default btn-suitable">売上を確認</button>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['tenpo_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['tenpo_id']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
                <div class="inner">
                    <div class="tenpo-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['set_tenpo']->value[$_smarty_tpl->tpl_vars['tenpo_id']->value], ENT_QUOTES, 'UTF-8', true);?>
</div>
                    <div class="total-amount"><span class="money"><?php echo array_sum($_smarty_tpl->tpl_vars['row']->value);?>
</span></div>
                </div>
                <div class="transition">
                    <?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
                        <div class="inner">
                            <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'Y年 m月 d日');?>
（<span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['WEEK_EN'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%w')], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['SET']->value['WEEK'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'w')];?>
</span>）</div>
                            <div class="amount"><span class="money"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['day']->value], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="transition-toggle"><a href="javascript:void(0);"><span>＋</span> 推移</a></div>
                <hr>
            <?php } ?>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_capture_stack[0][] = array('js', null, null); ob_start(); ?>
<script type="text/javascript">
    /*<![CDATA[*/
        $(document).ready(function() {
            $('span.money').moneyFormat();

            var dateFormat = function(date, format) {
                format = format ? format : 'Y-m-d';
                format = format.replace(/Y/g, date.getFullYear());
                format = format.replace(/m/g, ('0' + (date.getMonth() + 1)).slice(-2));
                format = format.replace(/d/g, ('0' + date.getDate()).slice(-2));
                return format;
            };

            $('.today').on('click', function() {
                now = new Date();

                // 今日
                $('[name="date_from"],[name="date_to"]').val(dateFormat(now));

                submitTo('sales');
            });

            $('.week').on('click', function() {
                now = new Date();

                // 週初め
                now.setDate(now.getDate() - now.getDay());
                $('[name="date_from"]').val(dateFormat(now));

                // 週末
                now.setDate(now.getDate() + 6);
                $('[name="date_to"]').val(dateFormat(now));

                submitTo('sales');
            });

            $('.month').on('click', function() {
                now = new Date();

                // 月初
                now.setDate(1);
                $('[name="date_from"]').val(dateFormat(now));

                // 月末
                now.setMonth(now.getMonth() + 1);
                now.setDate(0);
                $('[name="date_to"]').val(dateFormat(now));

                submitTo('sales');
            });

            $('.transition-toggle>a').on('click', function() {
                $(this).parent().prev('.transition').slideToggle('normal', function() {
                    var sign = $(this).is(':visible') ? '－' : '＋';
                    $(this).next('.transition-toggle').find('span').text(sign);
                });
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
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
