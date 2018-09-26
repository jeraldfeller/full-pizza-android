<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-16 10:59:20
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerResetPassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166510058557dc16d8930128-14704060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52ce2a3e089e77bd287289eff2547a27f7e0f0fe' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerResetPassword.tpl',
      1 => 1466424464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166510058557dc16d8930128-14704060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dc16d91bdaa5_34009584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dc16d91bdaa5_34009584')) {function content_57dc16d91bdaa5_34009584($_smarty_tpl) {?><!-- Header Bottom line starts -->
<!--<div class="headBtmLine1"></div>-->
<!-- Header Bottom line ends -->
<div class="searchTab" id="addons_domain_id_wrap">

	<!--<div class="byCuisineTop"></div>-->
	<div class="contain">
		<div class="searchAreaBgTopLeft"></div>
		<div class="searchAreaBgTopCen"></div>
		<div class="searchAreaBgTopRight"></div>
	</div>
	<div class="contain">
		<div class="searchAreaBgMidLeft">
			<div class="searchAreaBgMidRight">
<!-- 			<div class="searchAreaBgOuter paddingTop20"></div>
			<div class="searchAreaBgOuterBtm"></div> -->
			<div class="searchTab" id="addons_domain_id_wrap"></div>
		</div>
	</div>
	<div class="container">
		<div class="staticContainer">
			<h1 class="customSignupHead width40"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reset_password'];?>
</h1>
			<div class="row-fluid">
				<form name="customerresetpassword" method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/customerResetPassword.php?ui=<?php echo $_GET['ui'];?>
" onsubmit="return customerResetValidate();" >
				<input type="hidden" name="action" value="customerreset" />
				<div class="mandatoryField mandotaryRite"><span class="redStar">*</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_mandatory_fields'];?>
</div>
				<div class="clr"></div>
				<span id="errormsg">
					<span style="color:red; text-align:center; float:left; width:100%;">
						<?php if ($_GET['msg']=='Deleted') {?>
							Your account was deleted. Please contact Administrator!
						<?php } elseif ($_GET['msg']=='Pending') {?>
							Your account is waiting for activation. Try again later!
						<?php } elseif ($_GET['msg']=='Deactive') {?>	
							Your account was deactivated. Please contact Administrator!
						<?php } elseif ($_GET['msg']=='Fail') {?>
							Account not found!
						<?php }?>	
					</span>
				</span>
				<span style="color:green; text-align:center; float:left; width:100%;"><?php if ($_GET['msg']=='Success') {?>Your password reset successfully! <br /> Please login your account<?php }?></span>
				<!--<span style="color:red; text-align:center; float:left; width:100%;" id="resetsuccess" ><?php if ($_GET['msg']!='Success') {?> Please Enter the New password! <?php }?></span>-->
				
				<div class="row-fluid">
					<div class="span1">&nbsp;</div>
					<div class="span11">
						<ul class="customerUlNew">
							<li><label class="name1"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_resetpassword'];?>
:</label></li>
							<li><input type="password" class="txtbox" name="customer_resetpassword" id="customer_resetpassword" value="" autocomplete="off"/></li>
						</ul>
						
						<ul class="customerUlNew">
							<li><label class="name1"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_retypepassword'];?>
:</label></li>
							<li><input type="password" class="txtbox" name="customer_retypepassword" id="customer_retypepassword" value="" autocomplete="off"/></li>
						</ul>
						
						<ul class="customerUlNew">
							<li><label class="name1">&nbsp;</label></li>
							<li>
								<span class="restOwnerLoginBtnLeft">
									<span class="restOwnerLoginBtnRight"><input type="submit" class="" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_forgot_submit'];?>
" /></span>
								</span>
							</li>
						</ul>
					</div>
				</div>
				</form>
			</div>			
		</div>
	</div><?php }} ?>
