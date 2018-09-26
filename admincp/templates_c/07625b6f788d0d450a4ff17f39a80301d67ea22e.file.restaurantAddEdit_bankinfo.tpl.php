<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_bankinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18810926315807a26dbae600-77071675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07625b6f788d0d450a4ff17f39a80301d67ea22e' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_bankinfo.tpl',
      1 => 1466424134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18810926315807a26dbae600-77071675',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restaurantEditList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26dcb03b2_69868933',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26dcb03b2_69868933')) {function content_5807a26dcb03b2_69868933($_smarty_tpl) {?>	
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Bank Name </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_bank_name" id="res_bank_name" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['res_bank_name']);
}?>" />
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Bank A/C No <span class="color1"></span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_ac_no" id="res_ac_no" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['res_ac_no']);
}?>" />
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Routine No <span class="color1"></span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_routine_no" id="res_routine_no" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['res_routine_no']);
}?>" />
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Swift Code <span class="color1"></span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_swift_code" id="res_swift_code" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['res_swift_code']);
}?>" />
    		<span id="resCommErr"></span>
        </div>
	</div><?php }} ?>
