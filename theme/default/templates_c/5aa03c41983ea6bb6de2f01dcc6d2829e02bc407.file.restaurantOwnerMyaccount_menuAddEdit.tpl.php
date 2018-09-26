<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 11:38:37
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_menuAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1195327555580e390d5c5a08-47182496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aa03c41983ea6bb6de2f01dcc6d2829e02bc407' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_menuAddEdit.tpl',
      1 => 1466424470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1195327555580e390d5c5a08-47182496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'menuValue' => 0,
    'showcuisinelist' => 0,
    'cuis' => 0,
    'showcategorylist' => 0,
    'cat' => 0,
    'menudet' => 0,
    'showPizzaSlicelist' => 0,
    'cntSliceAddons' => 0,
    'showAddonslist' => 0,
    'objSite' => 0,
    'showSubAddonslist' => 0,
    'SITE_IMAGE_URL' => 0,
    'sliceaddonprice_arr' => 0,
    'SITE_IMAGE_MENU_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e390dda91d6_36599227',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e390dda91d6_36599227')) {function content_580e390dda91d6_36599227($_smarty_tpl) {?><!-- Restaurant Menu Add -->
<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menu'];?>
</h1>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_menu.php<?php } else { ?>restaurant-myaccount-menu<?php }?>" class="addbtn pull-right"><i class="glyphicon glyphicon-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuaddback'];?>
</a>
	<hr class="heading-hr">
	<div class="clr"></div>
	<form name="res_menuadd" method="post" action="<?php if ($_GET['menuid']!='') {
echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/restaurantOwnerMyaccount_menuAddEdit.php?menuid=<?php echo $_GET['menuid'];
}?>" onsubmit="<?php if ($_GET['menuid']!='') {?>return restaurantMenuEditValidate();<?php } else { ?>return restaurantMenuAddnewValidate();<?php }?>" enctype="multipart/form-data" class="form-horizontal">
    	<input type="hidden" name="action" value="<?php if ($_GET['menuid']!='') {?>Edit<?php } else { ?>Add<?php }?>"/>
        <input type="hidden" name="menuid" id="menuid" value="<?php echo $_GET['menuid'];?>
"/>
    	<input type="hidden" name="restid" id="restaurant_name" value="<?php echo $_SESSION['restaurantownerid'];?>
" />
		<div class="ownerStaticContainer">
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<div class="mandatoryField">
						<span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span>
						- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menumandatory'];?>

					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<div id="errormsg"></div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="menu_name" class="col-sm-5 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuname'];?>
</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="menu_name" id="menu_name" value="<?php if ($_GET['menuid']!='') {
echo $_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_name'];
}?>" />
					</div>
				</div>
				<div class="form-group">
					<label for="menu_cuisine" class="col-sm-5 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucuisine'];?>
</label>
					<div class="col-sm-7">
						<select class="form-control selectpicker" name="menu_cuisine" id="menu_cuisine" >
							<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucuisine_sel'];?>
</option>
							<?php  $_smarty_tpl->tpl_vars['cuis'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cuis']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcuisinelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cuis']->key => $_smarty_tpl->tpl_vars['cuis']->value) {
$_smarty_tpl->tpl_vars['cuis']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['cuis']->value['cuisine_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cuis']->value['cuisine_id']==$_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_cuisine']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cuis']->value['cuisine_name'];?>
</option>
							<?php } ?>
						</select>
					</div>
				</div>	
			</div>
			
			<!--Menu Type-->
			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-5 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menutype'];?>
</label>
					<div class="col-sm-7">
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_type" id="menu_type"	value="veg" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_type']=='veg') {?>checked="checked"<?php } else { ?>checked="checked"<?php }?> /> 
							<label for="menu_type"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menutypeveg'];?>
</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_type" id="menu_type1" value="nonveg" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_type']=='nonveg') {?>checked="checked"<?php }?>/>
							<label for="menu_type1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menutypenonveg'];?>
</label>
						</div>
						<div class="radioln radio-inline radio-primary">
		                    <input type="radio" name="menu_type" id="menu_type2" value="other" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_type']=='other') {?>checked="checked"<?php }?>/>
		                    <label for="menu_type2">Other</label>
		                </div>
					</div>
				</div>
				<div class="form-group">
					<label for="menu_category" class="col-sm-5 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucat'];?>
</label>
					<span class="col-sm-7">
						<select class="form-control selectpicker" name="menu_category" id="menu_category" onchange="otherSpecify('category');getShowAddons(this.value);" >
							<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucat_select'];?>
</option>
							<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_category']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
							<?php } ?>
							<option value="other" id="categoryOther" onclick="otherSpecify('category');"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucatoptother'];?>
</option>
						</select>
						<span id="caterrormsg"></span>
					</span>
				</div>
			</div>
			
			<!--Other Category-->
			<div class="form-group" id="catoters" style="display:none;">
					<span class=" col-sm-offset-4 col-sm-4">
						<input class="form-control" type="text" name="menu_catothers" id="menu_catothers" value="" />
						<span id="catname_errormsg"></span>
					</span>
			</div>
		
            
            <!--Menu Addons-->
			<div id="addonsoption" class="col-sm-12 no-padding">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="col-sm-5 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuaddons'];?>
</label>
						<div class="col-sm-7">
							<div class="radioln radio-inline radio-primary">
								<input type="radio" name="menu_addons" id="addonsval_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_addons']=='Yes') {?>checked="checked"<?php }?> onclick="showAddons();"/>
								<label for="addonsval_yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuaddonyes'];?>
</label>
							</div>
							<div class="radioln radio-inline radio-primary">
								<input type="radio" name="menu_addons" id="addonsval_no" value="No" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_addons']=='No'||$_GET['menuid']=='') {?> checked="checked" <?php }?> onclick="showAddonsnew();"/>
								<label for="addonsval_no"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuaddonno'];?>
</label>
							</div>
							
						</div>
					</div> 
				</div>
			</div>
				
			<!--Menu Addons-->
			<div  id="menusize_option_add" class="col-sm-12 no-padding">
				<div class="col-sm-10">

				<div class="form-group">
					<label class="col-sm-3 control-label font-normal"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuprice'];?>
</label>
					<div class="col-sm-9">
						<div class="radio-inline radioln radio-primary pull-left">
							<input type="radio" name="sizeoption" class="sizeoption_fixedprice" id="sizeoption_fixedprice" value="fixed" checked="checked" onclick="return fixedOption();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {?>checked="checked"<?php } else { ?>checked="checked"<?php }?> />
							<label for="sizeoption_fixedprice"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_fixedprice'];?>
Fixed</label>
						</div>
						<div class="radio-inline radioln radio-primary pull-left">
							<input type="radio" name="sizeoption" id="sizeoption_default" value="default" onclick="return defaultOption();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> />
							<label for="sizeoption_default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_size'];?>
</label>
						</div>
						<div class="radio-inline radioln radio-primary pull-left">
							<input type="radio" name="sizeoption" id="sizeoption_other" value="other" onclick="return otherOption();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice') {?>checked="checked"<?php }?>/>
							<label for="sizeoption_other"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_slice'];?>
</label>
						</div>
						
							<span id="fixedOption" class="" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?>style="display:block;"<?php } elseif ($_GET['menuid']=='') {?>style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
								<div class="col-sm-9">
									<div class="row">
										<input class="form-control" type="text" name="menu_price_main" id="menu_price" value="<?php if ($_GET['menuid']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {
echo $_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_price'];
}?>" />
									</div>
								</div>
							</span>
							
							<span id="pizzaDefaultOption" class="col-sm-12"  <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php } else { ?>style="display:block"<?php }?>>
									
			                            
										<div class="col-sm-12 pad0 marBtm5">
											<div class="col-sm-4 pad0">
												<label class="checkbox-inline">
													<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_small'];?>

												</label>
											</div>
											<div id="smallpriceshow" class="col-sm-6" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']=='0.00'||$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']==''||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?>>
												<input type="text" name="smallval" id="smallval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value'];
}?>" class="form-control input-sm numericfield" placeholder="Price"/>
											</div>
										</div>
										
											
			                            
										<div class="col-sm-12 pad0 marBtm5">
											<div class="col-sm-4 pad0">
												<label class="checkbox-inline">
													<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_medium'];?>

												</label>
											</div>
											<div id="mediumpriceshow" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']=='0.00'||$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']==''||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="col-sm-6">
											    <input class="form-control numericfield input-sm" type="text" name="mediumval" id="mediumval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value'];
}?>" placeholder="Price" />
			                                </div>
			                            </div>
											
			                            
			                            <div class="col-sm-12 pad0 marBtm5" >
											<div class="col-sm-4 pad0">
												<label class="checkbox-inline">
													<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_large'];?>

												</label>
											</div>
											<div id="largepriceshow" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']=='0.00'||$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']==''||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="col-sm-6">
											    <input class="form-control numericfield input-sm" type="text" name="largeval" id="largeval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value'];
}?>" placeholder="Price"/>
			                                </div>
										</div>	
									
							</span>
							  
							<div id="pizzaOtherOption" class="form-group" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;"<?php } else { ?>style="display:block"<?php }?>>
								<div class="col-sm-12">
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['name'] = "slicelist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaSlicelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total']);
?>
				                    <div class="col-sm-12 pad0">
										<div class="col-sm-4 pad0">
											<input type="text" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizename]" id="sizename1" value='<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_name']);?>
' class="form-control slicevalidate slicenamecnt" style="margin:3px 0"/> 
										</div>
			                             <input type="hidden" id="pizzaeditid" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sliceeditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_id'];?>
"/> 
										<div class="col-sm-2">
											<input type="text" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizevalue]" id="sizevalue1" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_price'];?>
" class="form-control slicevalidate numericfield"  style="margin:3px 0" /> 
										</div>
									</div>
									<?php endfor; endif; ?>
									<div id="specialPizzaSize">
										<div class="col-sm-12 pad0">
											<span onclick="addMorePizzaSize_ajax();" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_add_more_slice'];?>
</span>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				
				</div>
			</div>
				
			<div class="addPageCont">
				<div id="showcataddonsList" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_addons']=='No') {?>style="display:none;"<?php }?>>
                    <input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
				    <input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
					<div class="col-sm-9 col-sm-offset-3">
						
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
                						
                                        <?php $_smarty_tpl->tpl_vars['showSubAddonslist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option']), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value!='') {?>
                							<b style="cursor:pointer; margin:10px 0; float:left;" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']));?>

                								<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/> 
                								<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/>
                							</b>
                						<?php }?>
                						
                						
                						<div class="clr"></div>
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
                                                 <input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
" />
                									<div class="col-sm-3">
	                									<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
	                										<label class="checkbox-inline"><input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id']==$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']) {?>checked="checked"<?php }?> /> <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</label>
	                									<?php } else { ?>
	                										<label class="checkbox-inline">
	                											<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" />
	                											<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>

	                										</label>
	                									<?php }?>
	                								</div>
                									<div class="col-sm-3">
                                                        <div class="radioln radio-inline radio-primary">
															<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free_mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
]" value="Free" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']=='') {?>checked="checked"<?php }?> onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');"/> 
															<label for="free_mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
]"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>
 </label>
														</div>
                                                        <div class="radioln radio-inline radio-primary">
															<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid_mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
]" value="Paid" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']!='Free') {?>checked="checked"<?php }?> onclick="addonspaidoption_ajax('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');"/> 
															<label for="paid_mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
]"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
</label>
														</div>
                									</div>
                                                                                                        
                									<div class="col-sm-5">	
                										<!--Fixed option's addons price-->
                										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed" >
                											<span class="col-sm-6"> 
                                                                <input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];?>
"  placeholder="Price"/>							
                											</span>
                										</span>
                										<!--Fixed option's addons price-->
                										
                										<!--Size option's addons price-->
                										<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size">
                										   <div class="col-sm-4">
                                                            	<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
                                                            </div>
                                                            <div class="col-sm-4">
																<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']);
} else { ?>Price<?php }?>';" />
															</div>
															<div class="col-sm-4">
																<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']);
} else { ?>Price<?php }?>';" />
															</div>
                										</div>
                										<!--Size option's addons price-->
                										
                										<!--Slice options addons price-->
                                                        
                										<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="priceSpan showprice_slice">
                										
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
                    												<div class="col-sm-4">
                    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];?>
"  placeholder="Price"/>
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
                    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];?>
"  placeholder="Price"/>
                    												</div>
                												<?php endfor; endif; ?>
                											<?php }?>
                											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />
                											
                											<div class="slicemoreprice showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></div>
                										</div>	
                										<!--Slice options addons price-->
	            									</div>
	            									
	                                               
	            									<div class="col-sm-1">
													 <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']!='') {?>
													  <span class="btn btn-danger btn-sm" onclick="return removeAddon(<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['category_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['restaurant_id'];?>
,'<?php echo addslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
',<?php echo $_REQUEST['menuid'];?>
);" ><i class="glyphicon glyphicon-remove"></i></span>
													  <?php }?>
													 </div>
												</div>	
                							
                						<?php endfor; endif; ?>
                						</div>
                					
                			<?php endfor; endif; ?>
						
					</div>
					<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
					<div class="col-sm-offset-3 col-sm-2 marTop10">
						<a id="createaddons" onclick="addCreateMoreAddons_first();" <?php if ($_GET['menuid']!='') {?> style="display:block;"<?php } else { ?>style="display:none;"<?php }?> class="btn btn-success btn-sm" id="madAddons_firstajax"><i class="fa fa-file marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_create_addons'];?>
</a>
					</div>
				</div>
			</div>
				
			<div id="showcatPizzaAddonsList" style="display:none;">
			
			</div>	
			<!--Menu Special Instruction-->
			<div class="col-sm-6">
				<div class="form-group">
					<label  class="col-sm-5 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstruction'];?>
</label>
					 <div class="col-sm-7">
					 	<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spl_ins" id="menu_spl_ins1" value="Yes" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_spl_instruction']=='Yes') {?>checked="checked"<?php }?>/>
							<label for="menu_spl_ins1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstyes'];?>
</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spl_ins" id="menu_spl_ins2" value="No" <?php if ($_GET['menuid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_spl_instruction']=='No') {?> checked="checked"<?php }
} else { ?> checked="checked"<?php }?> />
							<label for="menu_spl_ins2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstno'];?>
</label>
						</div>
					</div>
				</div>
				
				<!--Meno Photo -->
				<div class="form-group">
					<label for="menu_photo"  class="col-sm-5 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuphoto'];?>
</label>
					<div class="col-sm-7">
						<div class="logoUpload">
							<input type="file" name="menu_photo" id="menu_photo" size="33" style="font:12px Arial;"/>
							<?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_photo']!='') {?><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_MENU_URL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_photo'];?>
"alt="image" title="" width="50" height="50" /><?php }?>
						</div>
					</div>
				</div>
				<!--Menu Popular Dish-->
				<div class="form-group">
					<label  class="col-sm-5 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menupopulardish'];?>
</label>
					<span class="col-sm-7">
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_popular_dish" id="menu_popular_dish_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_popular_dish']=='Yes') {?>checked="checked"<?php }?>/>
							<label for="menu_popular_dish_yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstyes'];?>
</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_popular_dish" id="menu_popular_dish_no" value="No" <?php if ($_GET['menuid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_popular_dish']=='No') {?> checked="checked"<?php }
} else { ?> checked="checked"<?php }?> />
							<label for="menu_popular_dish_no"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstno'];?>
</label>
						</div>
					</span>
				</div>
			
				<!--Menu Spicy-->
				<div class="form-group">
					<label  class="col-sm-5 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuspicy'];?>
</label>
					<span class="col-sm-7">
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spicy" id="menu_spicy_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_spicy']=='Yes') {?>checked="checked"<?php }?>/>
							<label for="menu_spicy_yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstyes'];?>
</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spicy" id="menu_spicy_no" value="No" <?php if ($_GET['menuid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_spicy']=='No') {?> checked="checked" <?php }
} else { ?> checked="checked"<?php }?> />
							<label for="menu_spicy_no"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuinstno'];?>
</label>
						</div>
					</span>
				</div>
			</div>
			<div class="col-sm-6">
				<!--Menu Description-->
				<div class="form-group">
					<label for="menu_description"  class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menudesc'];?>
</label>
					<div class="col-sm-8">
						<textarea rows="5" cols="" class="form-control" name="menu_description" id="menu_description"><?php echo stripslashes($_smarty_tpl->tpl_vars['menuValue']->value[0]['menu_description']);?>
</textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<span class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="myaccsubmitbtn" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuaddsubmit'];?>
" />
                    <a class="btn" href="restaurantOwnerMyaccount_menu.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>">Cancel</a>                    
				</span>	
			</div>
		</div>
	</form>
</div>


<?php }} ?>
