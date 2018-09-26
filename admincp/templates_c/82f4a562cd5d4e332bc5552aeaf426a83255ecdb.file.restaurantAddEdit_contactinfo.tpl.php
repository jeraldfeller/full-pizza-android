<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:20
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_contactinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18038256015807a26ca034a2-97646892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82f4a562cd5d4e332bc5552aeaf426a83255ecdb' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_contactinfo.tpl',
      1 => 1466424110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18038256015807a26ca034a2-97646892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restaurantEditList' => 0,
    'showStatelist' => 0,
    'state' => 0,
    'selectCityList' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26cd5ffe4_68954728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26cd5ffe4_68954728')) {function content_5807a26cd5ffe4_68954728($_smarty_tpl) {?>
	<!--Restaurant Name-->
	<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Name <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_name" id="restaurant_name" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_name']);
}?>" />
    		<?php echo '<script'; ?>
>document.addNewRestaurant.restaurant_name.focus();<?php echo '</script'; ?>
>
    		<span id="resNameErr"></span>
        </div>
	</div>
	
	<!--Restaurant Phone-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Phone <span class="color-red">*</span></span>
		<div class="col-sm-4">
		<input class="form-control" type="text" name="restaurant_phone" id="restaurant_phone" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_phone']);
}?>" />
		<span id="resPhoneErr"></span>
        </div>
	</div>
	
	<!--Restaurant Website-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Website </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_website" id="restaurant_website" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_website']);
}?>" />
    		<span id="resWebErr"></span>
        </div>
	</div>
	
	<!--Restaurant Fax-->
	
	<!--Restaurant Street Address-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Street Address <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_streetaddress" id="restaurant_streetaddress" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_streetaddress']);
}?>" />
    		<span id="resStrErr"></span>
       </div>
	</div>
	
	<!--Restaurant State-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">State <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<select class="form-control selectpicker" name="restaurant_state" id="restaurant_state" onchange="getCityListRest(this.value,'rest');">
    			<option value="">Select</option>
    			<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showStatelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
    			<option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['statecode'];?>
" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_state']==$_smarty_tpl->tpl_vars['state']->value['statecode']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['state']->value['statename']);?>
</option>
    			<?php } ?>
    		</select>
    		<span id="resStaErr"></span>
        </div>
	</div>
	
	<!--Restaurant City-->
	<div class="form-group">
    	<div id="showResCityList">
    		<span class="control-label col-sm-4 font-normal">City <span class="color-red">*</span></span>
    		<div class="col-sm-4">
        		<select class="form-control selectpicker" name="restaurant_city" id="restaurant_city" >
        		<option value="">First Select State</option>
        		<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectCityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
        		<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_city']==$_smarty_tpl->tpl_vars['city']->value['city_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['city']->value['cityname']);?>
</option>
        		<?php } ?>
        		</select>
        		<span id="resCitErr"></span>
            </div>
    	</div>
        
	</div>
	
	<!--Restaurant Zip-->
	<div class="form-group">
    	<span id="showResZipList">
    		<span class="control-label col-sm-4 font-normal">PostCode <span class="color-red">*</span></span>
    		<div class="col-sm-4">
        		
        		<input type="text" class="form-control" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip']);
}?>"  name="restaurant_zip" id="restaurant_zip"  maxlength="8" autocomplete="off" onkeyup="Suggestzip()"/>
        		<span id="resZipErr"></span>
            </div>
    	</span>
	</div>
	
	<!--Restaurant Contact Name-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Contact Name <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_contact_name" id="restaurant_contact_name" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_contact_name']);
}?>" />
    		<span id="resCntNameErr"></span>
        </div>
	</div>
	
	<!--Restaurant Contact Phone-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Contact Phone <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_contact_phone" id="restaurant_contact_phone" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_contact_phone']);
}?>" maxlength="15"/>
    		<span id="resCntPhoneErr"></span>
        </div>
	</div>
	
	<!--Restaurant Contact Email-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Contact Email <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_contact_email" id="restaurant_contact_email" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_contact_email']);
}?>" />
    		<span id="resEmailErr"></span>
        </div>
	</div>
	<!--Restaurant Password-->
	<?php if ($_GET['eid']=='') {?>
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Password <span class="color-red">*</span></span>
			<div class="col-sm-4">
    			<input class="form-control" type="password" name="restaurant_password" id="restaurant_password" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_password']);
}?>" autocomplete="off"/>
    			<span id="resPswdErr"></span>
            </div>
		</div>
	<?php }?>

<?php }} ?>
