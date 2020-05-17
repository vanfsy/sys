<?php /* Smarty version Smarty-3.1.19, created on 2019-01-16 16:20:23
         compiled from "C:\xampp\htdocs\projects\tanakakaikei\sys\trunk\webapp\templates\nippo\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200025c244bcef2dce1-28298563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7392d8a1a09f35cdc3cb2e81884dfba6ff91b980' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\templates\\nippo\\index.tpl',
      1 => 1547623205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200025c244bcef2dce1-28298563',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c244bcf071492_02890595',
  'variables' => 
  array (
    'this_label' => 0,
    'days' => 0,
    'day' => 0,
    'SET' => 0,
    'nippos' => 0,
    'last_nippo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c244bcf071492_02890595')) {function content_5c244bcf071492_02890595($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\projects\\tanakakaikei\\sys\\trunk\\webapp\\libraries\\Smarty-3.1.19\\libs\\plugins\\modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('css', null, null); ob_start(); ?>
<style type="text/css">
    /*<![CDATA[*/
        #nippo .inner {
            display: flex;
            align-items: center;
            min-height:  50px;
            padding: 8px 0;
        }

        #nippo .inner .nippo-date {
            flex: 0 0 60%;
        }

        #nippo .inner .nippo-status {
            flex: 0 0 20%;
            font-size:  90%;
            text-align: center;
        }

        #nippo .inner .nippo-btn {
            flex: 0 0 20%;
            text-align: center;
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
            <?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
                <div class="inner">
                    <div class="nippo-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'Y年 m月 d日');?>
（<span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['WEEK_EN'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'%w')], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['SET']->value['WEEK'][smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'w')];?>
</span>）</div>
                    <div class="nippo-status"><?php if (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SET']->value['NIPPO_STATUS'][$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>--<?php }?></div>
                    <div class="nippo-btn">
                        <?php if (!isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&(!$_smarty_tpl->tpl_vars['last_nippo']->value||(strtotime($_smarty_tpl->tpl_vars['day']->value)>$_smarty_tpl->tpl_vars['last_nippo']->value->date->getTimestamp()))) {?>
                            <button class="btn btn-xs btn-default" type="button" onclick="$('[name=date]').val('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['day']->value, ENT_QUOTES, 'UTF-8', true);?>
'); submitTo('nippo', '/nippo/input/');">入力</button>

                        <?php } elseif (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status==@constant('NIPPO_STATUS_PROCESSING')) {?>
                            <button class="btn btn-xs btn-default" type="button" onclick="linkTo('/nippo/input/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
');">入力</button>

                        <?php } elseif (isset($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value])&&$_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->status>@constant('NIPPO_STATUS_PROCESSING')) {?>
                            <button class="btn btn-xs btn-default" type="button" onclick="linkTo('/nippo/show/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nippos']->value[$_smarty_tpl->tpl_vars['day']->value]->id, ENT_QUOTES, 'UTF-8', true);?>
');">参照</button>
                        <?php }?>
                    </div>
                </div>
            <?php } ?>
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
