<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 18:23:53
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/main_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15942685375767e761afeba5-04159095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28224ca1c0539836b34543532f28d0c79e8946a4' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/main_header.tpl',
      1 => 1466424453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15942685375767e761afeba5-04159095',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'req_file_name' => 0,
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'SITE_LOGO' => 0,
    'SITE_NAME' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'customerDetails' => 0,
    'message' => 0,
    'cookieusermail' => 0,
    'cookieuserpassword' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767e761ce29a1_02655007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767e761ce29a1_02655007')) {function content_5767e761ce29a1_02655007($_smarty_tpl) {?><!-- Header starts -->
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='offline.php') {?>
<header class="header">
	<div class="headerTop <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='index.php') {?>headerTopSec<?php }?>">
		<div class="container">
          <!--  <div class="headerTopMiddle hidden-xs"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_number_one_online'];?>
</div>-->
          <?php if ($_SESSION['plugin']=='') {?>
		   <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
" class="logo <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?> menu-left <?php }?> <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php') {?>logo_pad<?php }?>">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" />
                </a>
               <?php } else { ?>
                <a class="iframe plugins" href="http://comeneat.com/v2/restaurantDetails.php?resid=<?php echo $_SESSION['resid'];?>
&resname=<?php echo $_SESSION['resname'];?>
&plugin=yes">Show Menu</a>
            <?php }?>
                <input type="hidden" name="pagetype" id="pagetype1" value="<?php echo $_GET['pagetype'];?>
"/>
                
				<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerLogin.php') {?>
					
					<ul class="nav navbar-nav headerTopRight pull-right">
						<li> <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
" class="regBtn"><i class="glyphicon glyphicon-home marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_owner_home'];?>
</a></li>
						<?php if ($_SESSION['restaurantownerid']!='') {?>
						<li><a href="javascript:void(0);" class="regBtn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_log_out'];?>
</a></li>
						<?php } else { ?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerRegister.php<?php } else { ?>restaurant-register<?php }?>" class="regBtn"><i class="glyphicon glyphicon-cutlery marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_owner_signup'];?>
</a></li>
						<?php }?>
					</ul>
					 <div class="welcomeTxt pull-right visible-lg" >
						<?php if ($_SESSION['customerid']!='') {?>				
							Welcome <b><?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_name']);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_lastname']);?>
</b>
						<?php }?>
					 </div>	
				<?php } else { ?>
					
					<ul class="headerTopRight pull-right">
					   <li> <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>contactUs.php<?php } else { ?>contact-us<?php }?>" class="regBtn"><i class="glyphicon contact_icon marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_contact'];?>
</a></li>
					<?php if ($_SESSION['restaurantownerid']!='') {?>
					   
					<?php } else { ?>
						
					   
					<?php }?>
					<?php if ($_SESSION['customerid']!='') {?>
						<li ><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerMyaccount.php<?php } else { ?>myaccount<?php }?>"  class="regBtn"><i class="glyphicon glyphicon-user marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['header_customer_myaccount'];?>
</a></li>
						<li ><a href="javascript:void(0);" class="regBtn" <?php if ($_SESSION['cusLogin']=='FB') {?>onclick="FacebookLogout();"<?php } else { ?>onclick="customerLogout();"<?php }?>><i class="glyphicon glyphicon-lock marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['header_customer_logout'];?>
</a></li>
					<?php } else { ?>
						
					   <li> <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerRegister.php<?php } else { ?>register<?php }?>"  class="regBtn signup_btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['header_signup'];?>
</a></li>
					   <li>
							<a href="javascript:void(0);" id="signindrop"  class="signIn visible-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['header_signin'];?>
<span class="caret"></span></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerLogin.php<?php } else { ?>login<?php }?>" class="signIn hidden-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['header_signin'];?>
</a>
						</li>

					<?php }?>
					<li>
					<div class="loginContain" style="display:none;">
						<form name="customerlogin_head" method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_GET['pagetype']=='checkout') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>checkout.php<?php } else { ?>checkout<?php }
} elseif ($_GET['pagetype']=='details') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_GET['resid'];?>
&resname=<?php echo $_GET['resname'];
} else { ?>menu/<?php echo $_GET['resid'];?>
/<?php echo $_GET['resname'];
}
}?>" onsubmit="return customerLoginValidate_header();" >
					
						<?php if ($_GET['pagetype']=='checkout') {?>
							<!--<input type="hidden" name="filetype" id="filetype" value="checkout.php" />-->
							<input type="hidden" name="resid" id="resid" value="<?php echo $_REQUEST['resid'];?>
"/>
							<input type="hidden" name="offer" id="offer" value="<?php echo $_REQUEST['offer'];?>
" />
							<input type="hidden" name="deliverypickup" id="deliverypickup" value="<?php echo $_REQUEST['deliverypickup'];?>
"/>
						<?php }?>
							<div class="contain">
								<!--<div class="mandatoryField mandotaryRite">
									<span class="redStar">*</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_mandatory_fields'];?>

								</div>-->
								<div class="clr"></div>
								<span id="errormsg5" class="errormsg_login_head" style="margin: 0;text-align: center;width: 100%;"></span>
								<?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?><span style="color:green;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span><?php }?>
								<div class="form-group">
									<label for="customer_logemail_header"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_email'];?>
:</label></label>
						<!--		<li><input type="text" class="txtbox" name="customer_logemail" id="customer_logemail" value="email" /></li><i></i>-->
								<!--<li><input type="text" class="txtbox customer_logemail_head" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
} else { ?>e-mail<?php }?>" onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
} else { ?>e-mail<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_SESSION['customer_logemail'];
} else { ?>email<?php }?>';"  /></li>-->
									<input type="text" class="form-control" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
}?>" placeholder="e-mail"/>
								<!--<?php echo '<script'; ?>
>document.customerlogin.customer_logemail.focus();<?php echo '</script'; ?>
>-->
								 </div>
								
									<span class="customForgot">
										<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return customerForgetPasswordPopup();" class="color2" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_customer_login_fpwd'];?>
</a>
									</span>
							   
								 <div class="form-group">
									<label for="customer_logpassword_header"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_password'];?>
:</label></label>
									<input type="password" class="form-control" name="customer_logpassword_header" id="customer_logpassword_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieuserpassword']->value;
}?>" placeholder="password"/>
								</div>
							  
									<span class="customForgot pull-left"><input class="headChckBox" type="checkbox" name="rememberme" id="rememberme" value="Yes" <?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!=''&&$_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_remember_me'];?>
</span>
									
								<div class="form-group">
									<div class="keepContain">
										<input type="submit" class="headLoginBtn" value="Login" onclick="return loginValidation()" />
										<a href="javascript:void(0);" class="fbSignIn" onclick="callFacebookConnect();"></a>
									</div>
								</div>
								<!--<a class="fbSignIn"  href="javascript:void(0);" onclick="callFacebookConnect();"></a>-->
								
								<!--<a  href="javascript:void(0);" class="frt"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">Login</span></span></a>-->
							</div>
						</form>
						</div>
					 </li>
				 </ul>
				<?php }?>
				  <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='restaurantOwnerLogin.php') {?>
					 <div class="welcomeTxt pull-right visible-lg" >
						<?php if ($_SESSION['customerid']!='') {?>				
							<?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_welcome'];?>
 <b><?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_name']);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_lastname']);?>
</b>
						<?php }?>
					</div>
				<?php }?>		
		</div>
	</div>
</header>
<!-- Header ends -->

<div id="customerforgetpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
            <div class="addtoCartInner">
                <div class="carthead">
                    <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_cust_forget_pwd'];?>
</h1>
                    <div class="addtoCartClose" data-dismiss="modal"></div>
                </div>
                <div class="forgotBg clearfix">
					<form name="customerforgetpass" class="form-horizontal" action="" method="post" onsubmit="return customerForgetPassword();">
						<div id="errforgetemail" class="errormsg_login"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_your_email_address'];?>
:</label>
							<div class="col-sm-7 pad0">
								<input type="text" name="forgetemail" id="forgetemail" value="" class="form-control" />
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<label class="col-sm-4 control-label font-normal">&nbsp;</label>
							<div class="col-sm-7 pad0">
								<input class="submit-bg" id="forgotpasswordsubmit" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_submit'];?>
" />
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }?><?php }} ?>
