<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 11:40:56
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/adminAjaxAction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1733415550580e3999000b96-57795874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28a3dd0666be224357fd11341a3cae1d03c404e4' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/adminAjaxAction.tpl',
      1 => 1466424130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1733415550580e3999000b96-57795874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'selectCityList' => 0,
    'city' => 0,
    'zipcodeValue' => 0,
    'restaurantEditList' => 0,
    'customervalue' => 0,
    'showZiplist' => 0,
    'ziplist' => 0,
    'HOURS_LIST_TUE' => 0,
    'MINUTES_LIST_TUE' => 0,
    'tueopentimesess' => 0,
    'HOURS_LIST_WED' => 0,
    'MINUTES_LIST_WED' => 0,
    'wedopentimesess' => 0,
    'HOURS_LIST_THU' => 0,
    'MINUTES_LIST_THU' => 0,
    'thuopentimesess' => 0,
    'HOURS_LIST_FRI' => 0,
    'MINUTES_LIST_FRI' => 0,
    'friopentimesess' => 0,
    'HOURS_LIST_SAT' => 0,
    'MINUTES_LIST_SAT' => 0,
    'satopentimesess' => 0,
    'HOURS_LIST_SUN' => 0,
    'MINUTES_LIST_SUN' => 0,
    'sunopentimesess' => 0,
    'HOURS_LIST_CLOSE_TUE' => 0,
    'MINUTES_LIST_CLOSE_TUE' => 0,
    'tueclosetimesess' => 0,
    'HOURS_LIST_CLOSE_WED' => 0,
    'MINUTES_LIST_CLOSE_WED' => 0,
    'wedclosetimesess' => 0,
    'HOURS_LIST_CLOSE_THU' => 0,
    'MINUTES_LIST_CLOSE_THU' => 0,
    'thuclosetimesess' => 0,
    'HOURS_LIST_CLOSE_FRI' => 0,
    'MINUTES_LIST_CLOSE_FRI' => 0,
    'friclosetimesess' => 0,
    'HOURS_LIST_CLOSE_SAT' => 0,
    'MINUTES_LIST_CLOSE_SAT' => 0,
    'satclosetimesess' => 0,
    'HOURS_LIST_CLOSE_SUN' => 0,
    'MINUTES_LIST_CLOSE_SUN' => 0,
    'sunclosetimesess' => 0,
    'restaurant_address_map' => 0,
    'showcategorylist' => 0,
    'cat' => 0,
    'menudet' => 0,
    'addonsvalue' => 0,
    'cntSliceAddons' => 0,
    'showAddonslist' => 0,
    'objSite' => 0,
    'showSubAddonslist' => 0,
    'sliceaddonprice_arr' => 0,
    'menuid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e399aa42c59_97241453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e399aa42c59_97241453')) {function content_580e399aa42c59_97241453($_smarty_tpl) {?>




<?php if ($_smarty_tpl->tpl_vars['action']->value=="showcityList") {?>
	<!-- City List from state wise -->
		<select class="form-control selectpicker" name="cityname" id="cityname" >
			<option value="">Select</option>
			<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectCityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['zipcodeValue']->value[0]['cityid']==$_smarty_tpl->tpl_vars['city']->value['city_id']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['cityname'];?>
</option>
			<?php } ?>
		</select>
		
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="showResCityList") {?>
	<?php if ($_GET['frompage']=='rest') {?>
		<!-- City List from Restaurant -->
		<label class="control-label col-sm-4 font-normal">City <span class="color-red">*</span></label>
		<div class="col-sm-4">
			<select class="form-control selectpicker" name="restaurant_city" id="restaurant_city">
	    		<option value="">Select</option>
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
		
	<?php }?>
	<?php if ($_GET['frompage']=='cust') {?>
		<!-- City List from Customer -->
		<label class="control-label col-sm-4 font-normal">City <span class="color-red">*</span></label>
		<div class="col-sm-4">
			<select class="selectpicker form-control" name="cus_city" id="cus_city" >
			<option value="">Select</option>
			<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectCityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['customervalue']->value[0]['customer_city']==$_smarty_tpl->tpl_vars['city']->value['city_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['city']->value['cityname']);?>
</option>
			<?php } ?>
			</select>	
			<span id="resCitErr"></span>	
		</div>
		
		
	<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="showResZipList") {?>
	<?php if ($_GET['frompage']=='rest') {?>
		<!-- Zipcode List from Restaurant -->
		<span class="addPageRightFont">Zip <span class="color1">*</span></span>
		<span class="colon1">:</span>
		<select class="selectbx" name="restaurant_zip" id="restaurant_zip" >
			<option value="">Select</option>
			<?php  $_smarty_tpl->tpl_vars['ziplist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ziplist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showZiplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ziplist']->key => $_smarty_tpl->tpl_vars['ziplist']->value) {
$_smarty_tpl->tpl_vars['ziplist']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['ziplist']->value['zipcode_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip']==$_smarty_tpl->tpl_vars['ziplist']->value['zipcode_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['ziplist']->value['zipcode']);?>
 - <?php echo stripslashes($_smarty_tpl->tpl_vars['ziplist']->value['areaname']);?>
</option>
			<?php } ?>
		</select>
		<span class="errClass" id="resZipErr" style="color:red"></span>
	<?php }?>
	<?php if ($_GET['frompage']=='cust') {?>
		<!-- Zipcode List from Restaurant -->
		<span class="addPageRightFont">Zip <span class="color1">*</span></span>
		<span class="colon1">:</span>
		<select class="selectbx" name="cus_zip" id="cus_zip" >
			<option value="">Select</option>
			<?php  $_smarty_tpl->tpl_vars['ziplist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ziplist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showZiplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ziplist']->key => $_smarty_tpl->tpl_vars['ziplist']->value) {
$_smarty_tpl->tpl_vars['ziplist']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['ziplist']->value['zipcode_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['customervalue']->value[0]['customer_zip']==$_smarty_tpl->tpl_vars['ziplist']->value['zipcode_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['ziplist']->value['zipcode']);?>
 - <?php echo stripslashes($_smarty_tpl->tpl_vars['ziplist']->value['areaname']);?>
</option>
			<?php } ?>
		</select>
		<span class="errClass" id="resZipErr" style="color:red"></span>
	<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="checkSelectAllOpen") {?>

	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_tue_open_hr" id="restaurant_delivery_tue_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_TUE']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_tue_open_min" id="restaurant_delivery_tue_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_TUE']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_tue_open_sess" id="restaurant_delivery_tue_open_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['tueopentimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['tueopentimesess']->value=='PM') {?>selected="selected"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_wed_open_hr" id="restaurant_delivery_wed_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_WED']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_wed_open_min" id="restaurant_delivery_wed_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_WED']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_wed_open_sess" id="restaurant_delivery_wed_open_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['wedopentimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['wedopentimesess']->value=='PM') {?>selected="selected"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_thu_open_hr" id="restaurant_delivery_thu_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_THU']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_thu_open_min" id="restaurant_delivery_thu_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_THU']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_thu_open_sess" id="restaurant_delivery_thu_open_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['thuopentimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['thuopentimesess']->value=='PM') {?>selected="selected"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_fri_open_hr" id="restaurant_delivery_fri_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_FRI']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_fri_open_min" id="restaurant_delivery_fri_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_FRI']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_fri_open_sess" id="restaurant_delivery_fri_open_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['friopentimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['friopentimesess']->value=='PM') {?>selected="selected"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sat_open_hr" id="restaurant_delivery_sat_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_SAT']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sat_open_min" id="restaurant_delivery_sat_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_SAT']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sat_open_sess" id="restaurant_delivery_sat_open_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['satopentimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['satopentimesess']->value=='PM') {?>selected="selected"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sun_open_hr" id="restaurant_delivery_sun_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_SUN']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sun_open_min" id="restaurant_delivery_sun_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_SUN']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sun_open_sess" id="restaurant_delivery_sun_open_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['sunopentimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['sunopentimesess']->value=='PM') {?>selected="selected"<?php }?>>PM</option>
		</select>
	</span>	
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="checkSelectAllClose") {?>

	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_tue_close_hr" id="restaurant_delivery_tue_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
				<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_TUE']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_tue_close_min" id="restaurant_delivery_tue_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
				<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_TUE']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_tue_close_sess" id="restaurant_delivery_tue_close_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['tueclosetimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['tueclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>>PM</option>
		</select>			
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_wed_close_hr" id="restaurant_delivery_wed_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_WED']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_wed_close_min" id="restaurant_delivery_wed_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_WED']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_wed_close_sess" id="restaurant_delivery_wed_close_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['wedclosetimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['wedclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_thu_close_hr" id="restaurant_delivery_thu_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_THU']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_thu_close_min" id="restaurant_delivery_thu_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_THU']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_thu_close_sess" id="restaurant_delivery_thu_close_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['thuclosetimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['thuclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>>PM</option>
		</select>	
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_fri_close_hr" id="restaurant_delivery_fri_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_FRI']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_fri_close_min" id="restaurant_delivery_fri_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_FRI']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_fri_close_sess" id="restaurant_delivery_fri_close_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['friclosetimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['friclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sat_close_hr" id="restaurant_delivery_sat_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_SAT']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sat_close_min" id="restaurant_delivery_sat_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_SAT']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sat_close_sess" id="restaurant_delivery_sat_close_sess" style="width:60px">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['satclosetimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['satclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sun_close_hr" id="restaurant_delivery_sun_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_SUN']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sun_close_min" id="restaurant_delivery_sun_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_SUN']->value;?>

		</select>
		<select class="selectbx" name="restaurant_delivery_sun_close_sess" id="restaurant_delivery_sun_close_sess" style="width:60px;">
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['sunclosetimesess']->value=='AM') {?>selected="selected"<?php }?>>AM</option> <!--Testing Validation-->
			<option value="PM" <?php if ($_smarty_tpl->tpl_vars['sunclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>>PM</option>
		</select>
	</span>	
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCatPizzaAddonsList") {?>

<div class="addPageCont">
	<span class="addPageRightFont">Size Option</span>
	<span class="colon1">:</span>
	<span>
		<input type="radio" name="sizeoption" id="sizeoption_default" value="default" checked="checked" onclick="return defaultOption();"/>&nbsp;Size
		&nbsp;
		<input type="radio" name="sizeoption" id="sizeoption_other" value="other" onclick="return otherOption();"/>&nbsp;Slice
	</span>
	
	<span id="pizzaDefaultOption">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left" width="30%" height="30">
					<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();">&nbsp;Small &nbsp;
				
					<span id="smallpriceshow" style="display:none;">
					<input type="text" name="smallval" id="smallval" value="" class="addonbox" />&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td align="left" width="30%" height="30">
					<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();">&nbsp;Medium &nbsp;
				
					<span id="mediumpriceshow" style="display:none;">
					<input type="text" name="mediumval" id="mediumval" value="" class="addonbox" />&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td align="left" width="30%" height="30">	
					<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();">&nbsp;Large &nbsp;
				
					<span id="largepriceshow" style="display:none;">
					<input type="text" name="largeval" id="largeval" value="" class="addonbox" />&nbsp;</span>
				</td>
			</tr>
		</table>
	</span>
	
	<span id="pizzaOtherOption" style="display:none;">
		<table width="70%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left" width="16%" height="30">
					<input type="text" name="sizename" id="sizename" value="" /> &nbsp;&nbsp;
					<input type="txt" name="sizevalue" id="sizevalue" value="" /> 
				</td>
			</tr>
		</table>
		<label style="float:left; width:250px;">&nbsp;</label>
		<table id="specialPizzaSize" border="0" width="70%">
			
			<tfoot><tr>
			<td class="left" height="20">
				<a onclick="addMorePizzaSize();" style="color:#f34571;cursor:pointer;margin-left:100px;"><span>Add More Size</span></a>
			</td>
			</tr></tfoot>
		</table>
	</span>
	
</div>			
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="mapInfoUpdate") {?>
	<?php if ($_REQUEST['eid']!='') {?>
	<!--Google Map Delivery Area-->
	<div class="addPageCont" id="map_distance_show">
		<input type="hidden" name="restaurant_address" id="restaurant_address" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_address_map']->value;?>
" />
		<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="<?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_distance']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_distance']);
} else { ?>45<?php }?>" />
		<div id="map" style="width:500px;height:500px;"></div>
	</div>
	<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="resCategory") {?>
	<span class="col-sm-4 control-label">Menu Category <span class="color-red">*</span></span>
	<div class="col-sm-4">
		<select class="form-control selectpicker" name="menu_category" id="menu_category" onchange="otherSpecify('category'); getShowAddons(this.value);" >
			<option value="">Select</option>
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_category']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
			<?php } ?>
			<option value="other" id="categoryOther" onclick="otherSpecify('category');">Others</option>
			<!--<option value="other" id="categoryOther" onclick="otherSpecify('category');">Others</option>-->
		</select>
		<span id="caterrormsg"></span>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="resAddonCategory") {?>
    <label class="control-label font-normal col-sm-4">Category Name <span class="color-red">*</span></label>
	<div class="col-sm-4">
		<select class="form-control selectpicker" name="category_name" id="category_name" onchange="otherSpecifyAddon('category');">
		<option value="">Select</option>
		<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['addonsvalue']->value[0]['category_id']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
		<?php } ?> 
        <option value="other" id="categoryOther_addon">Others</option>
		</select>
	</div>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCatAddonsList") {?>
	
	<!--Addons List from menu mgmt-->
	<div class="contain">
			
	
	<input type="hidden" name="cntSliceAddons" id="cntSliceAddons1" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
	<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub1" value="" />
    
    <input type='hidden' class="selectoptionsFirst selectoptions" id="selectoptions" name='selectoptions' value='slice' />
    <span class="selectoptionVal"></span>
    <div class="col-sm-8 col-sm-offset-4">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>
			<?php $_smarty_tpl->tpl_vars['showSubAddonslist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option']), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value!='') {?>
                <b class="addPageRightFont" style="cursor:pointer;" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>

                    <img src="images/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/>
                    <img src="images/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/>
                </b>
            <?php }?>
						
					<div class="clr"></div>
					<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" />
					<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>>				
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['name'] = "subaddon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total']);
?>
						<div class="form-group">
						  <div class="col-sm-3">
								<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
                                <div class="checkbox-inline checkbox checkbox-primary">
									<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" class="inputCheck" />
									<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
</label>
                                </div>
								<?php } else { ?>
								<div class="checkbox-inline checkbox checkbox-primary">
									<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" class="inputCheck" />
									<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
</label>
								</div>
								<?php }?>
							</div>
                            <div class="col-sm-3">
                                <div class="radio-inline radio">
									<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" class="free radiobotton" value="Free" checked="checked" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');" />
									<label for="free_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]">Free</label>
                                </div> 
								
								
						
								 <div class="radio-inline radio">
                                	 <input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid_mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" class="paid radiobotton" value="Paid" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']!='Free') {?>checked="checked"<?php }?> onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');" />
                                	 <label for="paid_mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]">Paid</label>
                                 </div>
								
								
						  </div>	
                          <div  class="col-sm-5">	
									<!--Fixed option's addons price-->												
									<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed priceSpan flt">
										<span class="col-sm-6">
										
											<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value=""  placeholder="Price"/>			
											
											
										</span>
									</span>						
													
									<!--Size option's addons price-->
									<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size">
										 <div class="col-sm-4">
										
										<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value=""   placeholder="Price"/>
                                        </div>
                                         <div class="col-sm-4">
										<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value=""  placeholder="Price"/>
                                         </div>
                                         <div class="col-sm-4">
										<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value=""  placeholder="Price" />
                                        </div>
									</span>
													
									<!--Slice options addons price-->
									<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="showprice_slice">
									
										<input type="hidden" name="subaddonindex" id="subaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" />
										<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
" />																						
										<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']!='') {?>
											
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
											<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
                                            <div class="col-sm-4 marBtm5">
											<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value=""  placeholder="Price"/>
                                            </div>														
											<?php endfor; endif; ?>													
										<?php } else { ?>											
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
											<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
                                            <div class="col-sm-4">
											<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value=""  placeholder="Price"/>
                                            </div>														
											<?php endfor; endif; ?>
										<?php }?>
										<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />		
										<span class="slicemoreprice" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></span>	
									</span>
								</div>
								
								<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid']!=''&&$_smarty_tpl->tpl_vars['menuid']->value!='') {?>
								
								<?php }?>
							
						</div>
					<?php endfor; endif; ?>
					</div>
				
			
	<?php endfor; endif; ?>
    </div>
	<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['total'];?>
" />
	</div>
	
	<div id="subaddonslist" class="madSubAddonNew4"></div>
	<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
    <div class="col-sm-offset-4 col-sm-2 marTop10">
	<a onclick="addCreateMoreAddons_first();" class="btn btn-success" id="madAddons_firstajax">Create Addons</a>
    </div>
    
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='deleteAddons') {?>
    <div class="col-sm-8 col-sm-offset-4">
    	<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
    	<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
			<div id="showcataddonsList">
				<div class="contain">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>					
					
					<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" />
					<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['menu_addonid'];?>
" />
					<?php $_smarty_tpl->tpl_vars['showSubAddonslist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option']), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value!='') {?>

						<b style="cursor:pointer;" class="contain marBtm5" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']));?>

                            <img src="images/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/>
                            <img src="images/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/>
                        </b>	
										
						<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>>

							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['name'] = "subaddon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total']);
?>
							<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
" />
							<div class="form-group">
                                <div class="col-sm-3">				
        							<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
        								<div class="checkbox-inline checkbox checkbox-primary">
        									<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id']==$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']) {?>checked="checked"<?php }?> class=""/>
        									<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</label>
        								</div>
        							<?php } else { ?>
                                    	<label class="checkbox-inline">
        								    <input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" class="" /><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>

                                        </label>
        							<?php }?>
	                           </div>
                               <div class="col-sm-3">
                                  <div class="radio-inline radio">	
								    	<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" value="Free" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free') {?>checked="checked"<?php }?> class=""/>
								    	<label for="free_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]">Free</label>
                                	</div> 
								   <div class="radio-inline radio">				
								    	<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']!='Free') {?>checked="checked"<?php }?> class="inputCheck"/>
								    	<label for="paid_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]">Paid</label>
                                    </div>
                                </div>
                                												
								<div class="col-sm-5">	
                          			<!--Fixed option's addons price-->												
    												
                                    <div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed priceSpan flt">
                                        <input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Fixed<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Fixed<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Fixed<?php }?>';"/>			
    									
    								</div>						
    												
    								<!--Size option's addons price-->
    								<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size priceSpan flt">
    								    <div class="col-sm-4">
   									    	<input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Small<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Small<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Small<?php }?>';"/>
                                        </div>
                                        <div class="col-sm-4">
    										<input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Medium<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Medium<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']);
} else { ?>Medium<?php }?>';" />
                                        </div>
                                        <div class="col-sm-4">
    										<input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Large<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Large<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']);
} else { ?>Large<?php }?>';" />
    								    </div>
    								</div>
												
									<!--Slice options addons price-->
									<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="priceSpan showprice_slice flt">
									
										<input type="hidden" name="subaddonindex" id="subaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" />
										<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
" />	
                                        
										<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']!='') {?>
											<?php $_smarty_tpl->tpl_vars['sliceaddonprice_arr'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']), null, 0);?>	
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
											<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
                                            
                                            <div class="col-sm-4 marBtm5">
											 <input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]!='') {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
                                            </div>			
											<?php endfor; endif; ?>										
										<?php } else { ?>											
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
											<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
                                            <div class="col-sm-4 marBtm5">
											 <input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['cntSliceAddons']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]!='') {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
                                            </div>
											<?php endfor; endif; ?>
										<?php }?>
										<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />
										
										<span class="slicemoreprice" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></span>																																		 
									</div>
								</div>
								
                                <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid']!=''&&$_smarty_tpl->tpl_vars['menuid']->value!='') {?>
                                <div class="col-sm-1">
								    <span onclick="return removeAddon(<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['category_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['restaurant_id'];?>
,'<?php echo addslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></span>
                                </div>
                                <?php }?>
										
                            </div>									
						<?php endfor; endif; ?>
							
						</div>
							
						<?php }?>
					<?php endfor; endif; ?>
					<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['total'];?>
" />
				
					</div>
					<div id="createbuttondiv" class="addtoCartInnerNew1"></div>					
					
					<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_addons']!='No'&&$_GET['eid']!='') {?>
    				    <div class="col-sm-4 col-sm-offset-4">	
                            <a onclick="addCreateMoreAddons_first();"  class="btn btn-success" id="madAddons_first">Create Addons</a>
                        </div>
                    <?php }?>
					
				</div>
        </div>
                
<?php }?>








    <?php echo '<script'; ?>
 type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            /* numeric inputs can come from the keypad or the numeric row at the top */
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    <?php echo '</script'; ?>
>




<?php }} ?>
