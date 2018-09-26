<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_commission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18017203405807a26da4d280-62363574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43d220e93a4ac83e19b235ff4d9fb6188652499' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_commission.tpl',
      1 => 1466424119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18017203405807a26da4d280-62363574',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restaurantEditList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26dba8603_54942711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26dba8603_54942711')) {function content_5807a26dba8603_54942711($_smarty_tpl) {?><div class="form-horizontal col-sm-12">
	<!--Restaurant Commission-->
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Commission</span>
		<div class="col-sm-4">
            <div class="input-group">
                <input class="form-control" type="text" name="restaurant_commission" id="restaurant_commission" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_commission']);
}?>" />
                <span class="input-group-addon">%</span>
            </div>
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	
	
</div><?php }} ?>
