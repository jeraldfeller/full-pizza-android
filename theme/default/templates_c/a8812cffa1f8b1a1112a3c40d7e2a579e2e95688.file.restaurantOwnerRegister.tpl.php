<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-09 16:35:27
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerRegister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209669958457a9b8f74c9572-66839185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8812cffa1f8b1a1112a3c40d7e2a579e2e95688' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerRegister.tpl',
      1 => 1466424449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209669958457a9b8f74c9572-66839185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'showStatelist' => 0,
    'state' => 0,
    'selectCityList' => 0,
    'city' => 0,
    'restaurantEditList' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'sitefeedbackcnt' => 0,
    'sitefeedbacklist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a9b8f77529a0_90137902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a9b8f77529a0_90137902')) {function content_57a9b8f77529a0_90137902($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<div class="customerLeftBox clearfix">
				<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_hey'];?>
</h1>
				<div class="ownerSignupTop">
					<h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_join'];?>
</h2>
					<h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_increasesales'];?>
</h3>
				</div>
				<!-- Create Account start -->
				<form name="restaurantowner" method="post" action="" onsubmit="return restOwnerRegisterValidate();" class="form-horizontal">
					<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_info'];?>
</h1>
					<div class="custRegBox">
						<div class="loginBg">
							<div class="form-group no-margin-bottom">
								<div class="col-sm-offset-4 col-sm-7">
									<div class="mandatoryField">
										<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_mandatory'];?>

									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-7">
									<span id="errormsg3" class="errormsg_login"></span>
								</div>
							</div>
							 <div class="form-group">
								<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_resname'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_name" id="restaurant_name" value="<?php echo $_POST['restaurant_name'];?>
"/>
									<?php echo '<script'; ?>
 type="text/javascript">document.restaurantowner.restaurant_name.focus();<?php echo '</script'; ?>
>
								</div>
							</div>
							<div class="form-group">
								<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_resphone'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_phone" id="restaurant_phone" value="<?php echo $_POST['restaurant_phone'];?>
" maxlength="15"/>
								</div>
							</div>
							<div class="form-group">
								<label for="cusrestaurant_faxtomer_name" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_resfax'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_fax" id="restaurant_fax" value="<?php echo $_POST['restaurant_fax'];?>
"/>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_name" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_contactname'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_contact_name" id="restaurant_contact_name" value="<?php echo $_POST['restaurant_contact_name'];?>
" />
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_phone" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_contactphone'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_contact_phone" id="restaurant_contact_phone" value="<?php echo $_POST['restaurant_contact_phone'];?>
" maxlength="15"/>
								</div>
							</div>
							<div class="form-group">	
								<label for="restaurant_contact_email" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_contactemail'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_contact_email" id="restaurant_contact_email" value="<?php echo $_POST['restaurant_contact_email'];?>
"/>
								</div>
							</div>
							<div class="form-group">	
								<label for="restaurant_website" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_reswebsite'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_website" id="restaurant_website" value="<?php echo $_POST['restaurant_website'];?>
"/>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_streetaddress" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_address'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_streetaddress" id="restaurant_streetaddress" value="<?php echo $_POST['restaurant_streetaddress'];?>
"/>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_state" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_state'];?>
</label>
								<div class="col-sm-7">
									<div class="selectboxouter">
										<div class="selectboxInner">
											<select class="form-control" name="restaurant_state" id="restaurant_state" onchange="getCityListRest(this.value);">
												<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_select'];?>
</option>
												<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showStatelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['statecode'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['state']->value['statename']);?>
</option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="restaurant_city" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_city'];?>
</label>
								<div class="col-sm-7">
									<div class="selectboxouter">
										<div class="selectboxInner">
										<div id="showResCityList">
											<select class="form-control" name="restaurant_city" id="restaurant_city_con" >
												<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_firstselectstate'];?>
</option>
												<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectCityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['city']->value['cityname']);?>
</option>
												<?php } ?>
											</select>
										</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="restaurant_zip" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_zip'];?>
</label>
								<div class="col-sm-7">
									<div class="selectboxouter">
										<div class="selectboxInner">
											<div id="showResZipList">
												<input type="text" class="form-control" name="restaurant_zip" id="restaurant_zip" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip']!='') {
echo $_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip'];
}?>" onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip']!='') {
echo $_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip'];
} else { ?>Restaurant Zip Code<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip']!='') {
echo $_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_zip'];
} else {
}?>';" onkeyup="autoSuggestZip();" />
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<!-- Create Account end -->
					
					<!-- Login Info end -->
					<div class="contain">
						<div class="form-group no-margin-bottom">
							<div class="col-sm-offset-4 col-sm-7">
								<input type="submit" class="submit-bg" id="restaurantregistersubmit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_submitbut'];?>
" />
							</div>
						</div>
					</div>
				 </div>
				</form>
			</div>
		</div>
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
			<div class="customerRightBox clearfix">
				<h1 class="haveanAccnt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_account'];?>
</h1>
				<h1 class="restOwnerLogin"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_ownerlog'];?>
</h1>
				<div class="contain center">
					<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerLogin.php<?php } else { ?>restaurant-login<?php }?>" class="submit-bg">
						<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_loginbut'];?>

					</a>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['sitefeedbackcnt']->value>0) {?>
			<div class="restOwnerRightCont">
				<h1 class="restOwnerRiteHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_ownersay'];?>
</h1>
				<div class="restRightContNew">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['name'] = "feed";
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sitefeedbacklist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["feed"]['total']);
?>
					<p><?php echo stripslashes($_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['feedback']);?>
</p>
					<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['restaurant_id'];?>
&amp;resname=<?php echo $_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['restaurant_seourl'];
} else { ?>menu/<?php echo $_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['restaurant_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['restaurant_seourl'];
}?>" class="color1"><?php echo stripslashes($_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['restaurant_name']);?>
, <?php echo stripslashes($_smarty_tpl->tpl_vars['sitefeedbacklist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['feed']['index']]['cityname']);?>
</a>
				<?php endfor; endif; ?>
				</div>
			</div>
			<?php }?>		
		</div>
	</div>
</div><?php }} ?>
