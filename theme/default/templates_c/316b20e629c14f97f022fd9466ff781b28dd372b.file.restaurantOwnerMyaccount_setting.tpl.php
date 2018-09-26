<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:55:54
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79968309557b4c8522a7265-17995036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '316b20e629c14f97f022fd9466ff781b28dd372b' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_setting.tpl',
      1 => 1466424434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79968309557b4c8522a7265-17995036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reslattitude' => 0,
    'reslongtitude' => 0,
    'LANG' => 0,
    'objRestaurant' => 0,
    'restaurantDetailsList' => 0,
    'restaurantstate' => 0,
    'restaurantcity' => 0,
    'restaurantzip' => 0,
    'showStatelist' => 0,
    'state' => 0,
    'selectCityList' => 0,
    'city' => 0,
    'servingcuisine' => 0,
    'showcuisinelist' => 0,
    'cuisine' => 0,
    'getcuisine' => 0,
    'cuisineid' => 0,
    'restaurant_address_map' => 0,
    'restaurantEditListTiming' => 0,
    'HOURS_LIST_MON' => 0,
    'MINUTES_LIST_MON' => 0,
    'monopentimesess' => 0,
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
    'HOURS_LIST_CLOSE_MON' => 0,
    'MINUTES_LIST_CLOSE_MON' => 0,
    'monclosetimesess' => 0,
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
    'HOURS_LIST_MON_SEC' => 0,
    'MINUTES_LIST_MON_SEC' => 0,
    'monsecondopentimesess' => 0,
    'HOURS_LIST_TUE_SEC' => 0,
    'MINUTES_LIST_TUE_SEC' => 0,
    'tuesecondopentimesess' => 0,
    'HOURS_LIST_WED_SEC' => 0,
    'MINUTES_LIST_WED_SEC' => 0,
    'wedsecondopentimesess' => 0,
    'HOURS_LIST_THU_SEC' => 0,
    'MINUTES_LIST_THU_SEC' => 0,
    'thusecondopentimesess' => 0,
    'HOURS_LIST_FRI_SEC' => 0,
    'MINUTES_LIST_FRI_SEC' => 0,
    'frisecondopentimesess' => 0,
    'HOURS_LIST_SAT_SEC' => 0,
    'MINUTES_LIST_SAT_SEC' => 0,
    'satsecondopentimesess' => 0,
    'HOURS_LIST_SUN_SEC' => 0,
    'MINUTES_LIST_SUN_SEC' => 0,
    'sunsecondopentimesess' => 0,
    'HOURS_LIST_CLOSE_MON_SEC' => 0,
    'MINUTES_LIST_CLOSE_MON_SEC' => 0,
    'monsecondclosetimesess' => 0,
    'HOURS_LIST_CLOSE_TUE_SEC' => 0,
    'MINUTES_LIST_CLOSE_TUE_SEC' => 0,
    'tuesecondclosetimesess' => 0,
    'HOURS_LIST_CLOSE_WED_SEC' => 0,
    'MINUTES_LIST_CLOSE_WED_SEC' => 0,
    'wedsecondclosetimesess' => 0,
    'HOURS_LIST_CLOSE_THU_SEC' => 0,
    'MINUTES_LIST_CLOSE_THU_SEC' => 0,
    'thusecondclosetimesess' => 0,
    'HOURS_LIST_CLOSE_FRI_SEC' => 0,
    'MINUTES_LIST_CLOSE_FRI_SEC' => 0,
    'frisecondclosetimesess' => 0,
    'HOURS_LIST_CLOSE_SAT_SEC' => 0,
    'MINUTES_LIST_CLOSE_SAT_SEC' => 0,
    'satsecondclosetimesess' => 0,
    'HOURS_LIST_CLOSE_SUN_SEC' => 0,
    'MINUTES_LIST_CLOSE_SUN_SEC' => 0,
    'sunsecondclosetimesess' => 0,
    'SITE_IMAGE_RESTAURANT_URL' => 0,
    'SITE_IMAGE_URL' => 0,
    'photoLimit' => 0,
    'indexval' => 0,
    'rownumval' => 0,
    'resid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c852ecd0f3_92754191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c852ecd0f3_92754191')) {function content_57b4c852ecd0f3_92754191($_smarty_tpl) {?>
<!-- Setting starts -->
<!--<form name="resOwnerPhotoUpdate" method="post" action="restaurantOwnerMyaccount.php" enctype="multipart/form-data">-->
<input type="hidden" name="reslattitude" id="reslattitude" value="<?php echo $_smarty_tpl->tpl_vars['reslattitude']->value;?>
" />
<input type="hidden" name="reslongtitude" id="reslongtitude" value="<?php echo $_smarty_tpl->tpl_vars['reslongtitude']->value;?>
" />

<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead">Settings</h1>
	<hr class="heading-hr">
	<div class="ionTabs" id="tabs_2" data-name="setting">	
	<ul class="settingTab1 settingTabs ionTabs__head">
		<li class="ionTabs__tab" data-target="details_contact"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactinfo'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_restinfo"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresinfo'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_deliveryinfo"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliveryinfo'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_openclose"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setopenclose'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_photo"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmultimedia'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_map"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmaps'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_bankinfo"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bankinfo'];?>
</a></li>
		<li class="ionTabs__tab" data-target="details_invoice"><a href="javascript:void(0);" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_invoiceinfo'];?>
</a></li>
        <li class="ionTabs__tab" data-target="details_commission"><a href="javascript:void(0);" >Commission</a></li>
	</ul>
	<div class="ionTabs__body">
	<?php echo $_smarty_tpl->tpl_vars['objRestaurant']->value->restaurantDetailsList();?>

    
	<div class="settingTabsContent ordersInnerWrap ionTabs__item"  data-name="details_contact">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="contactLocationDetails">
					<a class="addbtn pull-right" href="javascript:void(0);" onclick="return editLocationShow();"><i class="fa fa-pencil marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocedit'];?>
</a>
					<div class="contain">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<!-- Content start -->
						<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontact'];?>
</h1> 
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactname'];?>
</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_name']);?>
</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactphone'];?>
</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_phone']);?>
</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactemail'];?>
</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_email'];?>
</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactpassword'];?>
</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><a href="javascript:void(0);" onclick="showChangePassword();" class="addbtn"><i class="glyphicon glyphicon-edit marRight"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactchgpass'];?>
 </a></span>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocinfo'];?>
</h1>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocaddress'];?>
</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_streetaddress']);?>
</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocstate'];?>
 </span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantstate']->value);?>
</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloccity'];?>
 </span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantcity']->value;?>
</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloczip'];?>
 </span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantzip']->value;?>
</span>
						</div>
					</div>
				</div>
					<!-- Content end -->
				</div>
				
				<!-- Edit Contact Start -->
				<div id="editContactLocation" style="display:none;" class="col-sm-12">
					<a class="addbtn pull-right" onclick="return backContactInfo();"><i class="glyphicon glyphicon-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocconbackbut'];?>
</a>	
					
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloceditconloc'];?>
</h1>
					
					<div class="form-horizontal">
						<div class="form-group">
							<div class="mandatoryField">
								<span class="yellowStar">*</span>- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmandatory'];?>

							</div>
						</div>
						<div class="form-group">
                			<div class="col-sm-offset-4 col-sm-7">
                				<div id="contactErr"></div>
                			</div>
                		</div>
						<?php echo $_smarty_tpl->tpl_vars['objRestaurant']->value->restaurantDetailsList();?>

						<div class="restTabNewIn1 col-sm-6">
							<div class="form-group">
								<label for="restaurant_contact_name_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactname'];?>
</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_contact_name" id="restaurant_contact_name_con" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_name']);?>
" />
									<span class="errClass resCntNameErr" id="resCntNameErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_phone_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactphone'];?>
</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_contact_phone" id="restaurant_contact_phone_con" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_phone']);?>
" maxlength="15"/>
									<span class="errClass resCntPhoneErr" id="resCntPhoneErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_email_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactemail'];?>
</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_contact_email" id="restaurant_contact_email_con" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_email']);?>
" />
									<span class="errClass resCntEmailErr" id="resEmailErr"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="restaurant_streetaddress_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocaddress'];?>
</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_streetaddress" id="restaurant_streetaddress_con" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_streetaddress']);?>
" />
									<span class="errClass resCntStrErr" id="resStrErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_state_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocstate'];?>
</label>
								<div class="col-sm-6">
									<select class="form-control" name="restaurant_state" id="restaurant_state_con" onchange="getCityListRest(this.value);">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settingedit_select'];?>
</option>
										<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showStatelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['statecode'];?>
" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_state']==$_smarty_tpl->tpl_vars['state']->value['statecode']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['state']->value['statename']);?>
</option>
										<?php } ?>
									</select>
									<span class="errClass resCntStaErr" id="resStaErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_city_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloccity'];?>
</label>
								<div class="col-sm-6">
									<div id="showResCityList">
										<select class="form-control" name="restaurant_city" id="restaurant_city_con" >
											<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setselectstate'];?>
</option>
											<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectCityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_city']==$_smarty_tpl->tpl_vars['city']->value['city_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['city']->value['cityname']);?>
</option>
											<?php } ?>
										</select>
									</div>
									<span class="errClass resCntCitErr" id="resCitErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_zip_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloczip'];?>
</label>
								<div class="col-sm-6">
									<div id="showResZipList">
										<input type="text" class="form-control" name="restaurant_zip" id="restaurant_zip_con" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_zip'];?>
"    />
										
										
									</div>
									<span class="errClass resCntZipErr" id="resZipErr"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-4">
									<input type="submit" class="myaccsubmitbtn" onclick="return restaurantEditContactValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocconsubmitbut'];?>
" />	
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Contact End -->
				<!-- Change Password Restaurant -->
				<div id="changePasswordDetails" style="display:none;" class="col-sm-12">
					<div class="addbtn pull-right" onclick="return backContactInfo();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocconbackbut'];?>
</div>
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactchgpass'];?>
</h1>
					<form class="form-horizontal" method="post">
						<div class="form-group">	
							<div class="col-sm-offset-4 col-sm-4">
	                    		<div id="success"></div>
	                    	</div>
	                    </div>
						<div class="form-group">
							<label for="newpassword" class="col-sm-4 control-label font-normal"><span class="yellowStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactnewpass'];?>
</label>
							<div class="col-sm-3">
								<input class="form-control" type="pasword" name="newpassword" id="newpassword" value="" autocomplete="off"/>
								<span class="errClass resCntnewpassErr"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="confirmpassword" class="col-sm-4 control-label font-normal"><span class="yellowStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactconfpass'];?>
</label>
							<div class="col-sm-3">
								<input class="form-control" type="password" name="confirmpassword" id="confirmpassword" value="" autocomplete="off"/>
								<span class="errClass resCntconfirmpassErr"></span>
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-offset-4 col-sm-4">
								<input type="submit" class="myaccsubmitbtn" onclick="return restaurantChangePasswordValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocconsubmitbut'];?>
" />								
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
						 
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_restinfo">
		<div class="settingsInnerWrap">
			<div class="contain">
				<!-- Content start -->
			<div class="restaurantInfoDetails">
				<div class="contain">
					<a class="addbtn pull-right btn-sm" href="javascript:void(0);" onclick="editRestaurantInfoShow();"><i class="fa fa-pencil marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresedit'];?>
</a>
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresinfo'];?>
</h1>
				</div>
				<div class="restTabNewIn3">
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresname'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_name']);?>
</span>
					</div>	
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresphone'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_phone']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setreswebsite'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_website']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">Order Receive Email</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['order_receive_email']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresfax'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_fax']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresabout'];?>
</span>
						<span class="colon1">:</span>
						<span class="widthAboutRest"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_description']);?>
</span>
					</div>
				</div>
				<div class="restTabNewIn2">
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setrespickup'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_pickup']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresbooktab'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_booktable']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresminorder'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_minorder_price']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setrestax'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_salestax']);?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresservcuis'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['servingcuisine']->value;?>
</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">Order Pending Alert Tone</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['pending_order_alert']);?>
</span>
					</div>
				<!-- Content end -->
				</div>
				
			</div>
			
			<!-- Edit Restaurant Info Start-->
			<div id="editrestaurantinfo" style="display:none;">
				<div class="addbtn pull-right" onclick="return backRestaurantInfo();"><i class="glyphicon glyphicon-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresbackbut'];?>
</div>
               
				<div class="contain"><h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setreseditres'];?>
</h1></div>
				<div class="form-horizontal">
					<div id="resErr"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="restaurant_name_res" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresname'];?>
</label>
						 <div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_name" id="restaurant_name_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_name']);?>
" />
							<span class="errClass resNameErr" id="resNameErr"></span>
						</div>
					</div>	
					<div class="form-group">
						<label for="restaurant_phone_res" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresphone'];?>
</label>	
						 <div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_phone" id="restaurant_phone_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_phone']);?>
" />
							<span class="errClass resPhoneErr" id="resPhoneErr"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="restaurant_website_res" class="col-sm-4 control-label font-normal"><span class="redStar"></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setreswebsite'];?>
</label>	
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_website" id="restaurant_website_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_website']);?>
" />
							<span class="errClass resWebErr" id="resWebErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_ordermail" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>Order Receive Email</label>	
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_ordermail" id="restaurant_ordermail" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['order_receive_email']);?>
" />
							<span class="errClass resreceiveErr" id="resreceiveErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_fax_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresfax'];?>
</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_fax" id="restaurant_fax_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_fax']);?>
" />
							<span class="errClass resFaxErr" id="resFaxErr"></span>
						</div>
					</div>
					<div class="form-group">	
						<label for="restaurant_description_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresabout'];?>
</label>
						<div class="col-sm-6">
							<textarea rows="5" cols="" class="form-control" name="restaurant_description" id="restaurant_description_res"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_description']);?>
</textarea>
							<span class="errClass resAbtResErr" id="resAbtResErr"></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">	
						<label for="" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setrespickup'];?>
</label>
						<div class="col-sm-6">
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_pickup" id="restaurant_pickup_Yes_res" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_pickup']=='Yes') {?> checked="checked" <?php }?> />
								<label for="restaurant_pickup_Yes_res"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_info_pickup_yes'];?>
</label>
							</div> 
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_pickup" id="restaurant_pickup_No_res" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_pickup']=='No') {?> checked="checked" <?php }?> />
								<label for="restaurant_pickup_No_res"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_info_pickup_no'];?>
</label>
							</div>
							<span class="errClass resPickupErr" ></span>	
						</div>
					</div>
				
					<div class="form-group">
						<label for="" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresbooktab'];?>
</label>
						<div class="col-sm-6">
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_booktable" id="restaurant_booktable_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_booktable']=='Yes') {?> checked="checked" <?php }?> />
								<label for="restaurant_booktable_yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_info_book_a_tab_yes'];?>
</label>
							</div>
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_booktable" id="restaurant_booktable_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_booktable']=='No') {?> checked="checked" <?php }?> />
								<label for="restaurant_booktable_no"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_info_book_a_tab_no'];?>
</label>
							</div>
							<span class="errClass resBooktableErr" ></span>	
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_minorder_price_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresminorder'];?>
</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_minorder_price" id="restaurant_minorder_price_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_minorder_price']);?>
" />
							<span class="errClass resMinOrdErr" id="resMinOrdErr"></span>	
						</div>
					</div>
			
					<div class="form-group">
						<label for="restaurant_salestax_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setrestax'];?>
</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_salestax" id="restaurant_salestax_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_salestax']);?>
" />
							<span class="errClass resSalTaxErr" id="resSalTaxErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_serving_cuisines_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setresservcuis'];?>
</label>
						<div class="col-sm-6">
							<select class="form-control" name="restaurant_serving_cuisines[]" id="restaurant_serving_cuisines_res" multiple="multiple" size="5">
								<?php $_smarty_tpl->tpl_vars["getcuisine"] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_serving_cuisines']), null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['cuisine'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cuisine']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcuisinelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cuisine']->key => $_smarty_tpl->tpl_vars['cuisine']->value) {
$_smarty_tpl->tpl_vars['cuisine']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['cuisine']->value['cuisine_id'];?>
" <?php  $_smarty_tpl->tpl_vars['cuisineid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cuisineid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['getcuisine']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cuisineid']->key => $_smarty_tpl->tpl_vars['cuisineid']->value) {
$_smarty_tpl->tpl_vars['cuisineid']->_loop = true;
if ($_smarty_tpl->tpl_vars['cuisineid']->value==$_smarty_tpl->tpl_vars['cuisine']->value['cuisine_id']) {?>selected="selected"<?php }
} ?>><?php echo $_smarty_tpl->tpl_vars['cuisine']->value['cuisine_name'];?>
</option>
								<?php } ?>
							</select>
							<span class="errClass resSerCuiErr" id="resSerCuiErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label font-normal">Order Pending Alert Tone</label>
						<div class="col-sm-6">
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="pending_alert" id="pending_alert_Yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['pending_order_alert']=='Yes') {?> checked="checked" <?php }?> />
								<label for="pending_alert_Yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_info_pickup_yes'];?>
</label>
							</div>
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="pending_alert" id="pending_alert_No" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['pending_order_alert']=='No') {?> checked="checked" <?php }?> />
								<label for="pending_alert_No"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_info_pickup_no'];?>
</label>
							</div>
							<span class="errClass resalertErr" ></span>	
						</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit" class="myaccsubmitbtn" onclick="return editRestaurantInfoValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setressubmitbut'];?>
" />
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- Edit Restaurant Info End-->
			</div>
		</div>
	</div>
	
							
	
							
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_deliveryinfo">
		<div class="settingsInnerWrap">
				<div class="deliveryInfoDetails">
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliverinfo'];?>
</h1>
					<a class=" pull-right addbtn" href="javascript:void(0);" onclick="editDeliveryInfoShow();"><i class="fa fa-pencil marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliveredit'];?>
</a>
					<!-- Content start -->
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliver'];?>
</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']);?>
</span>
					</div>	
				
					
                    <div id="Deliveryinfo1" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']=='No') {?> style="display:none; <?php }?>">
    					<div class="addPageCont">
    						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelivertime'];?>
</span>
    						<span class="colon1">:</span>
    						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_estimated_time']);?>
</span>
    					</div>
    					<div class="addPageCont">
    						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelivercharge'];?>
</span>
    						<span class="colon1">:</span>
    						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_charge']);?>
</span>
    					</div>
    					<div class="addPageCont">
    						<span class="addPageRightFont">Delivery miles</span>
    						<span class="colon1">:</span>
    						<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']);?>
</span>
    					</div>
                    </div>
					<!-- Content end -->
				</div>
				
				<!-- Edit Delivery Info Start -->
				<div id="editDeliveryInfo" class="col-sm-12" style="display:none;">
                 	<div class="addbtn pull-right" onclick="return backDeliveryInfo();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliverbackbut'];?>
</div>
                 	
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelivereditdel'];?>
</h1>
					<div class="form-horizontal col-sm-12">
						<div id="DeliveryErr"></div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliver'];?>
</label>
							<div class="col-sm-2">
								<div class="radioln radio-inline radio-primary" >
									<input class="" type="radio" name="restaurant_delivery" id="restaurant_delivery_yes" onclick="restaurantDeliverYes()" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']=='Yes') {?> checked="checked" <?php }?> />
									<label for="restaurant_delivery_yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliveryes'];?>
</label>
								</div> 
								<div class="radioln radio-inline radio-primary" >
									<input class="" type="radio" name="restaurant_delivery" id="restaurant_delivery_no" onclick="restaurantDeliverNo()" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']=='No') {?> checked="checked" <?php }?> />
									<label for="restaurant_delivery_no"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliverno'];?>
</label>
								</div>
								<span class="errClass resDeliErr" id="resDeliErr"></span>
							</div>
						</div>
					
					
				<div id="Deliveryinfo" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']=='No') {?> style="display:none; <?php }?>">
    					<div class="form-group">
    						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelivertime'];?>
</label>
    						<div class="col-sm-2">
    							<input class="form-control numericfield" type="text" name="restaurant_estimated_time" id="restaurant_estimated_time_res" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_estimated_time']);?>
" />
    							<span class="errClass resEstTimeErr" id="resEstTimeErr"></span>
    						</div>
    					</div>
    					
    					<div class="form-group">
    						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelivercharge'];?>
</label>
    						<div class="col-sm-2">
    							<input class="form-control numericfield" type="text" name="restaurant_delivery_charge" id="restaurant_delivery_charge_res" value="<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_charge']=='0.00') {?>Free<?php } else {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_charge']);
}?>" />
    							<span class="errClass resDeliChgErr" id="resDeliChgErr"></span>
    						</div>	
    					</div>
    					
    					<div class="form-group">
    						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal">Delivery miles</label>
    						<div class="col-sm-4">
    							<input class="textbox numericfield" type="text" name="restaurant_delivery_distance" id="restaurant_delivery_distance" value="<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']);
} else { ?>45<?php }?>"/>	
    							<a href="javascript:void(0);" onclick="viewMap();" id="view_map" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-map-marker"></i>View map</a>					
    							<span class="errClass" id="restdelDistanceErr"></span>
    						</div>
    					</div>
    					<div  class="form-group" >		
    						<div  class="col-sm-12" id="map_distance_show">
    							<input type="hidden" name="restaurant_address" id="restaurant_address" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_address_map']->value;?>
" />
    							<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']);
} else { ?>5<?php }?>" />
    							<div id="map" style="width:100%;height:500px;"></div>
    						</div>
    					</div>
				</div>
                	
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<input type="submit" class="myaccsubmitbtn" onclick="return editDeliveryInfoValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliversubmitbut'];?>
" />
					</div>	
				</div>
					
				</div>
				<!-- Content end -->
			</div>
		</div>
	</div>
	
						
	
						
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_openclose">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="resOpenCloseDetails">
					<a class="addbtn pull-right" href="javascript:void(0);" onclick="editOpenAndCloseInfoShow();"><i class="fa fa-pencil marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settimingedit'];?>
</a>
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setopenclose'];?>
</h1>
					
					<!-- Content start -->
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<span class="width53">
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12 "><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setopentime'];?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setclosetime'];?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12">Second Opening Time</span>
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12">Second Closing Time</span>
						</span>
					</div>
					
					
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmonday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settuesday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setwednesday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setthursday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setfriday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setsaturday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setsunday'];?>
 </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					<!-- Content end -->
				</div>
				
				<!-- Edit Open ANd Close Time -->
				<div id="editOpenClose" style="display:none;">
                   	<div class="addbtn pull-right" onclick="return backOpenAndCloseInfo();" ><i class="glyphicon glyphicon-circle-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setclosebackbut'];?>
</div>
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settimingeditopen'];?>
</h1>
					 <div id="openCloseErr"></div>
					<div class="addPageCont">
						<div class="addPageRightFontNew1 width25">	
							<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelhour'];?>
</span>
							<span class="colon1">:</span>
						</div>
					<div class="width75">
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setopentime'];?>
</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectopen" onclick="return selectAllOpeningTime();" style="display:none"/>
								<label for="selectopen" class="DeliverHrs_Font btn btn-info btn-sm"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setselall'];?>
</span>
							</div >
							<span id="resSelectAllOpenErr" class="errClass"></span>
						</div>
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">	
							<b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setclosetime'];?>
</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectclose" onclick="return selectAllCloseingTime();" style="display:none"/>
								<label for="selectclose" class="DeliverHrs_Font btn btn-info btn-sm"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setselall'];?>
</span>
							</div>
							<span id="resSelectAllCloseErr" class="errClass"></span>
						</div>
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<b>Second Opening Time</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectsecondopen" onclick="selectAllSecondOpeningTime();" style="display:none"/>
								<label for="selectsecondopen" class="DeliverHrs_Font btn btn-info btn-sm"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setselall'];?>
</label>
							</div>
							<span id="resSelectAllSecondOpenErr"></span>
						</div>
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<b>Second Closing Time</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectsecondclose" onclick="selectAllSecondCloseingTime();" style="display:none;"/>
								<label for="selectsecondclose" class="DeliverHrs_Font btn btn-info btn-sm"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setselall'];?>
</label>
							</div>
							<span id="resSelectAllSecondCloseErr"></span>
						</div>
					</div>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<span class="DeliverHrs_Font DeliverHrs_FontFull"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_open_and_close_time'];?>
</b> : <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_your_restaurantclose'];?>
 <b> 00:00 </b></span>
					</div>
                    <div class="errClass resEstTimeMonErr1 errorTime" id="errorTime"></div>
					
					<div class="addPageCont">
						<div class="addPageRightFontNew1 width25">	
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmonday'];?>
 </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settuesday'];?>
 </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setwednesday'];?>
 </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setthursday'];?>
 </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setfriday'];?>
 </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setsaturday'];?>
 </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setsunday'];?>
 </span><span class="colon1">:</span></div>
						</div>
						
						<div class="width75">
							<!--Open Time start-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_open_hr" id="restaurant_delivery_mon_open_hr" onchange="changemonvalopen();">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_MON']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_open_min" id="restaurant_delivery_mon_open_min" onchange="changemonvalopen();">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_MON']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_open_sess" id="restaurant_delivery_mon_open_sess" onchange="changemonvalopen();" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['monopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['monopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_open_hr" id="restaurant_delivery_tue_open_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_TUE']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_open_min" id="restaurant_delivery_tue_open_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_TUE']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_open_sess" id="restaurant_delivery_tue_open_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['tueopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['tueopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_open_hr" id="restaurant_delivery_wed_open_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_WED']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_open_min" id="restaurant_delivery_wed_open_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_WED']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_open_sess" id="restaurant_delivery_wed_open_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['wedopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['wedopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_open_hr" id="restaurant_delivery_thu_open_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_THU']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_open_min" id="restaurant_delivery_thu_open_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_THU']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_open_sess" id="restaurant_delivery_thu_open_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['thuopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['thuopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_open_hr" id="restaurant_delivery_fri_open_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_FRI']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_open_min" id="restaurant_delivery_fri_open_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_FRI']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_open_sess" id="restaurant_delivery_fri_open_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['friopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['friopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_open_hr" id="restaurant_delivery_sat_open_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_SAT']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_open_min" id="restaurant_delivery_sat_open_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_SAT']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_open_sess" id="restaurant_delivery_sat_open_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['satopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['satopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_open_hr" id="restaurant_delivery_sun_open_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_SUN']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_open_min" id="restaurant_delivery_sun_open_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_SUN']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_open_sess" id="restaurant_delivery_sun_open_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['sunopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['sunopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
							</div>
							<!--Open Time End-->
							
							<!--Close Time start-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_close_hr" id="restaurant_delivery_mon_close_hr" onchange="changemonvalclose();">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_MON']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_close_min" id="restaurant_delivery_mon_close_min" onchange="changemonvalclose();">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_MON']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_close_sess" id="restaurant_delivery_mon_close_sess" onchange="changemonvalclose();" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['monclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['monclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_close_hr" id="restaurant_delivery_tue_close_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
											<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_TUE']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_close_min" id="restaurant_delivery_tue_close_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
											<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_TUE']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_close_sess" id="restaurant_delivery_tue_close_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['tueclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['tueclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
												
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_close_hr" id="restaurant_delivery_wed_close_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_WED']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_close_min" id="restaurant_delivery_wed_close_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_WED']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_close_sess" id="restaurant_delivery_wed_close_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['wedclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['wedclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_close_hr" id="restaurant_delivery_thu_close_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_THU']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_close_min" id="restaurant_delivery_thu_close_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_THU']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_close_sess" id="restaurant_delivery_thu_close_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['thuclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['thuclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
										
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_close_hr" id="restaurant_delivery_fri_close_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_FRI']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_close_min" id="restaurant_delivery_fri_close_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_FRI']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_close_sess" id="restaurant_delivery_fri_close_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['friclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['friclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_close_hr" id="restaurant_delivery_sat_close_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_SAT']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_close_min" id="restaurant_delivery_sat_close_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_SAT']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_close_sess" id="restaurant_delivery_sat_close_sess" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['satclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['satclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_close_hr" id="restaurant_delivery_sun_close_hr">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselecthrs'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_SUN']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_close_min" id="restaurant_delivery_sun_close_min">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectmns'];?>
</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_SUN']->value;?>

									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_close_sess" id="restaurant_delivery_sun_close_sess">
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['sunclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> 
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['sunclosetimesess']->value=='PM') {?>selected="selected"<?php } else { ?>selected="selecetd"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<!--Close Time end-->
							</div>
							
							<!--Second Open time-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_mon_open_hr_second" id="restaurant_delivery_mon_open_hr_second"  onchange="changemonvalsecopen();">
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_MON_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_mon_open_min_second" id="restaurant_delivery_mon_open_min_second"  onchange="changemonvalsecopen();">
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_MON_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_mon_open_sess_second" id="restaurant_delivery_mon_open_sess_second" onchange="changemonvalsecopen();" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['monsecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['monsecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
							<span id="selectallopentime">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_tue_open_hr_second" id="restaurant_delivery_tue_open_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_TUE_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_tue_open_min_second" id="restaurant_delivery_tue_open_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_TUE_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_tue_open_sess_second" id="restaurant_delivery_tue_open_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['tuesecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['tuesecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_wed_open_hr_second" id="restaurant_delivery_wed_open_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_WED_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_wed_open_min_second" id="restaurant_delivery_wed_open_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_WED_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_wed_open_sess_second" id="restaurant_delivery_wed_open_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['wedsecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['wedsecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_thu_open_hr_second" id="restaurant_delivery_thu_open_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_THU_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_thu_open_min_second" id="restaurant_delivery_thu_open_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_THU_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_thu_open_sess_second" id="restaurant_delivery_thu_open_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['thusecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['thusecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_fri_open_hr_second" id="restaurant_delivery_fri_open_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_FRI_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_fri_open_min_second" id="restaurant_delivery_fri_open_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_FRI_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_fri_open_sess_second" id="restaurant_delivery_fri_open_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['frisecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['frisecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sat_open_hr_second" id="restaurant_delivery_sat_open_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_SAT_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sat_open_min_second" id="restaurant_delivery_sat_open_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_SAT_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sat_open_sess_second" id="restaurant_delivery_sat_open_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['satsecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['satsecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sun_open_hr_second" id="restaurant_delivery_sun_open_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_SUN_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sun_open_min_second" id="restaurant_delivery_sun_open_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_SUN_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sun_open_sess_second" id="restaurant_delivery_sun_open_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['sunsecondopentimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['sunsecondopentimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
								</span>
							</span>
							</div>		
							<!--second open time-->
							
							<!--second Close time-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_mon_close_hr_second" id="restaurant_delivery_mon_close_hr_second"  onchange="changemonvalsecclose();">
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_MON_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_mon_close_min_second" id="restaurant_delivery_mon_close_min_second"  onchange="changemonvalsecclose();">
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_MON_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_mon_close_sess_second" id="restaurant_delivery_mon_close_sess_second" onchange="changemonvalsecclose();" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['monsecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['monsecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
							<span id="selectallclosetime">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_tue_close_hr_second" id="restaurant_delivery_tue_close_hr_second" >
										<option value="">Hrs</option>
											<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_TUE_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_tue_close_min_second" id="restaurant_delivery_tue_close_min_second" >
										<option value="">Mins</option>
											<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_TUE_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_tue_close_sess_second" id="restaurant_delivery_tue_close_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['tuesecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['tuesecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
												
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_wed_close_hr_second" id="restaurant_delivery_wed_close_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_WED_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_wed_close_min_second" id="restaurant_delivery_wed_close_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_WED_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_wed_close_sess_second" id="restaurant_delivery_wed_close_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['wedsecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['wedsecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_thu_close_hr_second" id="restaurant_delivery_thu_close_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_THU_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_thu_close_min_second" id="restaurant_delivery_thu_close_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_THU_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_thu_close_sess_second" id="restaurant_delivery_thu_close_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['thusecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['thusecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
										
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_fri_close_hr_second" id="restaurant_delivery_fri_close_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_FRI_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_fri_close_min_second" id="restaurant_delivery_fri_close_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_FRI_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_fri_close_sess_second" id="restaurant_delivery_fri_close_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['frisecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['frisecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sat_close_hr_second" id="restaurant_delivery_sat_close_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_SAT_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sat_close_min_second" id="restaurant_delivery_sat_close_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_SAT_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sat_close_sess_second" id="restaurant_delivery_sat_close_sess_second" >
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['satsecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['satsecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sun_close_hr_second" id="restaurant_delivery_sun_close_hr_second" >
										<option value="">Hrs</option>
										<?php echo $_smarty_tpl->tpl_vars['HOURS_LIST_CLOSE_SUN_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sun_close_min_second" id="restaurant_delivery_sun_close_min_second" >
										<option value="">Mins</option>
										<?php echo $_smarty_tpl->tpl_vars['MINUTES_LIST_CLOSE_SUN_SEC']->value;?>

									</select>
									<select class="selectbx" name="restaurant_delivery_sun_close_sess_second" id="restaurant_delivery_sun_close_sess_second">
										<option value="AM" <?php if ($_smarty_tpl->tpl_vars['sunsecondclosetimesess']->value=='AM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectam'];?>
</option> <!--Testing Validation-->
										<option value="PM" <?php if ($_smarty_tpl->tpl_vars['sunsecondclosetimesess']->value=='PM') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdelselectpm'];?>
</option>
									</select>
									
								</span>
							</span>
							</div>
							<!--Open Time Close TIme New-->	
						</div>
						
					</div>
					<div class="form-group">
					
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit" class="myaccsubmitbtn" onclick="return editOpenCloseInfoValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setopensubmitbut'];?>
" />
						</div>
							
						
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_photo">
		<div class="settingsInnerWrap">
			<div class="contain">
				<!-- Content start -->
				<div id="succPhotoMsg"></div>
				<div class="col-sm-12">
					<form class="form-horizontal" name="" method="post" action="restaurantOwnerMyaccount_setting.php#tabs|Tabs_Group:details_photo" onsubmit="return photoVideoDisplayValid();">
						<div class="form-group">
							<label class=" control-label font-normal col-sm-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_display_photos'];?>
</label>
							<div class="col-sm-9">
								<div class="radioln radio-inline radio-primary">
									<input type="radio" name="restaurant_display_photo" id="restaurant_display_photo_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_display_photo']=='Yes') {?> checked="checked"<?php }?> onclick="resPhotoShowornot()"/>
									<label class="btnName" for="restaurant_display_photo_yes" onclick="resPhotoShowornot()">&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_display_photosyes'];?>
</label> 
								</div>
								<div class="radioln radio-inline radio-primary">	
									<input type="radio" name="restaurant_display_photo" id="restaurant_display_photo_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_display_photo']=='No') {?> checked="checked"<?php }?> onclick="resPhotoShowornot()"/>
									<label class="btnName" for="restaurant_display_photo_no" onclick="resPhotoShowornot()">&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_display_photosno'];?>
</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class=" control-label font-normal col-sm-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_display_video'];?>
</label>
							<div class="col-sm-9">
								<div class="radioln radio-inline radio-primary">
									<input type="radio" name="restaurant_display_video" id="restaurant_display_video_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_display_video']=='Yes') {?> checked="checked"<?php }?> onclick="resVideoShowornot()" />
									<label class="btnName" for="restaurant_display_video_yes" onclick="resVideoShowornot()">&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_display_videoyes'];?>
</label> 
								</div>
								<div class="radioln radio-inline radio-primary">
									<input type="radio" name="restaurant_display_video" id="restaurant_display_video_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_display_video']=='No') {?> checked="checked"<?php }?> onclick="resVideoShowornot()" />
									<label class="btnName" for="restaurant_display_video_no" onclick="resVideoShowornot()">&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_display_videosno'];?>
</label>
								</div>						
							</div>
						</div>
						<div class="form-group" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_display_video']=='No') {?>style="display:none;"<?php }?> id="restaurant_video_container">
							<label class=" control-label font-normal col-sm-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_youtube_videocontent'];?>
</label>
							<div class="col-sm-6">
								<textarea name="restaurant_video" id="restaurant_video" rows="" cols="" class="form-control">
									<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_video']);?>

								</textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-5 col-sm-offset-3">					
								<input type="submit" class="myaccsubmitbtn" onclick="return photoVideoDisplayValid();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocconsubmitbut'];?>
" />
							</div>
						</div>	
					</form>
				</div>
			</div>
					
			<div class="contain" id="restaurant_display_photos" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_display_photo']=='No') {?>style="display:none;"<?php }?>>	
				<form name="resOwnerPhotoUpdate" method="post" action="restaurantOwnerMyaccount_setting.php#tabs|Tabs_Group:details_photo" enctype="multipart/form-data">
				<!--Restaurant Owner Photos Update start-->
				<input type="hidden" name="action" value="resOwnerPhotoUpdates" />
				<input type="hidden" name="photonumber" value="" />
				<input type="hidden" name="mode" value="" />
				
				<!--Restaurant Owner Logo Update Start-->
				<div class="newInnerLogo2">
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlogo'];?>
</h1>
					<div class="clr"></div>
					<div class="addPageCont">
						<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_logo']!='') {?>
							<div class="logoUpload" id="res_owner_logo1">
								<div class="logoImgInner">
									<div class="logo posRelate">
										<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_RESTAURANT_URL']->value;?>
/logo/<?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_logo'];?>
" alt="image" title="" class="logoInfoImg" width="70" height="70"  />
										<a href="javascript:void(0);" id="restaurantlogo1" onclick="resownerdeletelogo();" class="logoCloseIcon"></a>		
									<input type="button" value="Modify" class="addphoto-button logoInfoImgTxt" />
									<input type="file" class="hided modifyNew" size="10" name="restaurant_logo" id="restaurant_logo" onChange="resownerlogoUpdate('add');" />
									</div>
								</div>
							</div>
							
							<div id="res_owner_add_disp_logo" style="display:none;">
								<div class="logoImgInner">
									<div class="logo posRelate">
										<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
										<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
										<input type="file" class="hided modifyNew" size="10" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd('add');" />
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div id="res_owner_add_disp_logo" >
								<div class="logoImgInner">
									<div class="logo posRelate">
										<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
										<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
										<input type="file" class="hided modifyNew" size="10" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd('add');" />
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
				<!--Restaurant Owner Logo Update end-->
			
				<div class="clr"></div>
				<div class="newInner1">
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setphoto'];?>
</h1>
					<div class="clr"></div>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['photo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['name'] = 'photo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['photoLimit']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total']);
?>
					<?php $_smarty_tpl->tpl_vars["indexval"] = new Smarty_variable(0, null, 0);?>
					<?php $_smarty_tpl->tpl_vars["rownumval"] = new Smarty_variable(("restaurant_photos").($_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum']), null, 0);?>
					
						<div class="logoImgInner">
							<div class="logo posRelate">
								<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[$_smarty_tpl->tpl_vars['indexval']->value][$_smarty_tpl->tpl_vars['rownumval']->value]!='') {?>
								<div id="res_owner_photo<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" class="photoMargin">
									<!--Modify-->
									<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_RESTAURANT_URL']->value;?>
/photos/<?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[$_smarty_tpl->tpl_vars['indexval']->value][$_smarty_tpl->tpl_vars['rownumval']->value];?>
" alt="Photo<?php echo $_smarty_tpl->tpl_vars['rownumval']->value;?>
" title="" width="70" height="70" class="logoInfoImg"  />
								
									<a href="javascript:void(0);" id="restaurant_photo<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" onclick="resownerdeletephotos('<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
','<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
');" class="logoCloseIcon"></a>
								
									<input type="button" value="modify" class="addphoto-button logoInfoImgTxt" />
									<input type="file" class="hided modifyNew" size="10" name="<?php echo $_smarty_tpl->tpl_vars['rownumval']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['rownumval']->value;?>
" onChange="resownerphotoUpdate('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
','modify');" />
								</div>
								
								<div id="res_owner_add_disp_photo<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" style="display:none;" class="photoMargin">
									<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
								
									<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
									<input type="file"  class="hided modifyNew" size="10" name="restaurant_photo<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" id="restaurant_photo1<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" onchange="resownerphotoUpdate('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
','add');"  />
									
								</div>
											
								<?php } else { ?>
									<!--Add-->
									<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
									
									<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
									<input type="file"  class="hided modifyNew" size="10" name="restaurant_photo<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" id="restaurant_photo2<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
" onChange="resownerphotoUpdate('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['photo']['rownum'];?>
','add');" />
								 <?php }?>	
							</div>
						</div>
					<?php endfor; endif; ?>
				</div>
				<!-- Videos start -->
				<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_video']!='') {?>
				<div class="newInner1">
					<div class="contain"><h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setvideo'];?>
</h1></div>
					<div class="restInfo_wrapVideo" id="showVideoYoutube"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_video']);?>
</div>
				</div>
				<?php }?>
				<!-- Videos end -->
				</form>
				
				
			</div>
		</div>		
	</div>
	<!--Restaurant Owner Photos Update end-->
	
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_map">
		<div class="settingsInnerWrap">
			<div class="contain">
				<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmap'];?>
</h1>
				
				<!-- Content start -->
					<div class="contain">
						<div id="showGoogleMaps" style="width: 100%; height: 350px;"></div>
					</div>
				<!-- Content end -->
			</div>
		</div>
	</div>
	
	
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_bankinfo">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="bankInfoDetails">
					<div id="bankinfo_update"></div>
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_bank_title'];?>
</h1>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_bank_name'];?>
 </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_bank_name" id="res_bank_name" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['res_bank_name']);?>
" />
						<span class="errClass resBankNameErr" id="resBankNameErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_bank_acno'];?>
 </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_ac_no" id="res_ac_no" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['res_ac_no']);?>
" />
						<span class="errClass resBankAcNoErr" id="resBankAcNoErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_bank_routineno'];?>
 </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_routine_no" id="res_routine_no" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['res_routine_no']);?>
" />
						<span class="errClass resBankRoutineNoErr" id="resBankRoutineNoErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_bank_swift_code'];?>
 </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_swift_code" id="res_swift_code" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['res_swift_code']);?>
" />
						<span class="errClass resBankSwiftNoErr" id="resBankSwiftNoErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<input type="submit" class="myaccsubmitbtn" onclick="return editBankInfoValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliversubmitbut'];?>
" />
					</div>
				</div>
			</div>
		</div>		
	</div>
	
	
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item"  data-name="details_invoice">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="invoiceInfoDetails">
					<div id="invoiceinfo_update"></div>
					<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_invoice_title'];?>
</h1>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_inv_time_period'];?>
 </span>
						<span class="colon1">:</span>
						<select id="restaurant_inv_setting" name="restaurant_inv_setting" class="selectboxindex">
							<option value="m1" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_inv_setting']=='m1') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_invoice_monthly'];?>
</option>
							<option value="m2" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_inv_setting']=='m2') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_invoice_monthlytwice'];?>
</option>
							<option value="m4" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_inv_setting']=='m4') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_invoice_monthlyfour'];?>
</option>
						</select>
						<span class="errClass resInvSettErr" id="resInvSettErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<input type="submit" class="myaccsubmitbtn" onclick="return editInvoiceInfoValidate();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliversubmitbut'];?>
" />
					</div>
					
				</div>
			</div>
		</div>	
	</div>
    
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_commission">
		<div class="settingsInnerWrap">
				<div class="commissionInfoDetails">
					<h1 class="restOwnMyHead">Commission Info</h1>
					
					<!-- Content start -->
					<div class="addPageCont">
						<span class="addPageRightFont">Commission</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_commission'];?>
</span>
					</div>	
				
					<!-- Content end -->
				</div>
				
				<!-- Edit Delivery Info Start -->
				<div id="editCommissionInfo" class="col-sm-12" style="display:none;">
                 	<div class="addbtn pull-right" onclick="return backCommissionInfo();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliverbackbut'];?>
</div>
                 	
					<h1 class="restOwnMyHead">Edit Commission Info</h1>
					<div class="form-horizontal">
						<div id="CommissionErr"></div>
					<div class="form-group">
						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal">Commission Info (%)</label>
						<div class="col-sm-2">
							<input class="form-control" type="text" name="restaurant_commission" id="restaurant_commission" value="<?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_commission'];?>
" />
                            <span class="errClass resCommissionTimeErr" id="resCommissionTimeErr"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit" class="myaccsubmitbtn" onclick="return editCommissionInfoValidate();" value="Submit" />
						</div>	
					</div>
					
				</div>
				<!-- Content end -->
			</div>
		</div>
	</div>
	
						
	
	 <div class="ionTabs__preloader"></div> 
	</div>
</div>
<!--</form>-->
<!-- Setting end --><?php }} ?>
