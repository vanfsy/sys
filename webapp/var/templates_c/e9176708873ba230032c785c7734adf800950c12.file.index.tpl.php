<?php /* Smarty version Smarty-3.1.19, created on 2019-12-18 11:08:33
         compiled from "/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/nippo/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10170454475c403e44c979c8-03513401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9176708873ba230032c785c7734adf800950c12' => 
    array (
      0 => '/home/users/0/sub.jp-t-cpta/web/sys/webapp/templates/nippo/index.tpl',
      1 => 1576634880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10170454475c403e44c979c8-03513401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c403e44cd2533_26650935',
  'variables' => 
  array (
    'this_label' => 0,
    'prev' => 0,
    'curr' => 0,
    'next' => 0,
    'calendar' => 0,
    'day' => 0,
    'now' => 0,
    'SET' => 0,
    'nippos' => 0,
    'last_nippo' => 0,
    '_tenpo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c403e44cd2533_26650935')) {function content_5c403e44cd2533_26650935($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/users/0/sub.jp-t-cpta/web/sys/webapp/libraries/Smarty-3.1.19/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        #nippo .inner {
            display: flex;
            align-items: center;
            /*min-height:  50px;*/
            padding: 8px 0;
        }

        #nippo .inner.today {
            background-color: #FFFFBB;
        }

        #nippo .inner .nippo-date {
            flex: 0 0 50%;
        }

        #nippo .inner .nippo-status {
            flex: 0 0 20%;
            font-size:  90%;
            text-align: center;
        }

        #nippo .inner .nippo-btn {
            flex: 0 0 15%;
            text-align: center;
        }
        
        #nippo .inner .nippo-btn-2 {
            flex: 0 0 15%;
            text-align: center;
        }

        .calendar-nav {
            display: flex;
            align-items: center;
        }

        .calendar-nav>div {
            flex: 0 0 33%;
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

<div id="contents">
    <div class="paragraph"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['this_label']->value, ENT_QUOTES, 'UTF-8', true);?>
一覧</div>
    <form id="nippo" method="post" autocomplete="off">
        <input type="hidden" name="action" value="">
        <input type="hidden" name="date" value="">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="btn-wrap">
                <div class="calendar-nav">
                    <div class="text-right"><a class="btn btn-default btn-sm" href="?y=<?php echo $_smarty_tpl->tpl_vars['prev']->value->format('Y');?>
&m=<?php echo $_smarty_tpl->tpl_vars['prev']->value->format('m');?>
">　<i class="glyphicon glyphicon-menu-left"></i>　</a></div>
                    <div class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['curr']->value->format('Y年 m月'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    <div class="text-left"><a class="btn btn-default btn-sm" href="?y=<?php echo $_smarty_tpl->tpl_vars['next']->value->format('Y');?>
&m=<?php echo $_smarty_tpl->tpl_vars['next']->value->format('m');?>
">　<i class="glyphicon glyphicon-menu-right"></i>　</a></div>
                </div>
            </div>
            
            
            
            <?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['calendar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
                <div class="inner<?php if ($_smarty_tpl->tpl_vars['day']->value==$_smarty_tpl->tpl_vars['now']->value->format('Y-m-d')) {?> today<?php }?>">
                    <div class="nippo-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'Y年 m月 d日');?>
（<span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['WEEK_EN'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%w')], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['SET']->value['WEEK'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'w')];?>
</span>）</div>
                    <div class="nippo-status"><?php if (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['NIPPO_STATUS'][$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>--<?php }?></div>
                    <div class="nippo-btn">
                        <?php if (!isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&(!$_smarty_tpl->tpl_vars['last_nippo']->value||(strtotime($_smarty_tpl->tpl_vars['day']->value)>$_smarty_tpl->tpl_vars['last_nippo']->value->date->getTimestamp()))) {?>
                            <button class="btn btn-xs btn-default" type="button" <?php if (!$_smarty_tpl->tpl_vars['_tenpo']->value->is_operated) {?>disabled<?php } else { ?>onclick="$('[name=date]').val('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['day']->value, ENT_QUOTES, 'UTF-8', true);?>
'); submitTo('nippo', '/nippo/input/');"<?php }?>>入力</button>

                        <?php } elseif (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status==@constant('NIPPO_STATUS_PROCESSING')||$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status==@constant('NIPPO_STATUS_NEUTRAL'))) {?>
                            <button class="btn btn-xs btn-default" type="button" <?php if (!$_smarty_tpl->tpl_vars['_tenpo']->value->is_operated) {?>disabled<?php } else { ?>onclick="linkTo('/nippo/input/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
');"<?php }?>>入力</button>

                        <?php } elseif (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status>@constant('NIPPO_STATUS_PROCESSING')) {?>
                            <button class="btn btn-xs btn-default" type="button" onclick="linkTo('/nippo/show/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
');">参照</button>
                        <?php }?>
                    </div>
                    
                    
                    <!--締め解除ボタン-->
                    <div class="nippo-btn-2">
                    <?php if (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status==@constant('NIPPO_STATUS_CLOSED')) {?>
                        
<!--
<button class="btn btn-xs btn-default" type="button" onclick="linkTo('/nippo/input3/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
');">日次締め解除</button>
<button class="btn btn-xs btn-default" type="button" onclick="is_changed=false; $('[name=\'mode\']').val('cancel'); submitTo('nippo', '/nippo/input3/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
', 'get', '締め解除いたします。\nよろしいですか？');">日次締め解除2</button>
-->
                        <button class="btn btn-xs btn-default" type="button" onclick="is_changed=false; $('[name=\'mode\']').val('cancel'); submitTo('nippo', '/nippo/cancel/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
', 'get', '日次締めを解除いたします。\n解除した日付以降にも日次締めがあれば自動的に解除します。\nよろしいですか？');">締め解除</button>

                    <?php }?>
                    </div>
                    
                    
                </div>
            <?php } ?>
            <div class="btn-wrap">
                <div class="calendar-nav">
                    <div class="text-right"><a class="btn btn-default btn-sm" href="?y=<?php echo $_smarty_tpl->tpl_vars['prev']->value->format('Y');?>
&m=<?php echo $_smarty_tpl->tpl_vars['prev']->value->format('m');?>
">　<i class="glyphicon glyphicon-menu-left"></i>　</a></div>
                    <div class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['curr']->value->format('Y年 m月'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    <div class="text-left"><a class="btn btn-default btn-sm" href="?y=<?php echo $_smarty_tpl->tpl_vars['next']->value->format('Y');?>
&m=<?php echo $_smarty_tpl->tpl_vars['next']->value->format('m');?>
">　<i class="glyphicon glyphicon-menu-right"></i>　</a></div>
                </div>
            </div>
        </div>
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
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_js'=>Smarty::$_smarty_vars['capture']['js']), 0);?>

<?php }} ?>
