<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 14:33:07
         compiled from "C:\wamp\www\theme\default\templates\home_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15257de04dcb940b6-46184156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6828478e113cb0a666fd7c5b9919b3c23017197' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\home_header.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15257de04dcb940b6-46184156',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57de04dcb969e6_08363298',
  'variables' => 
  array (
    'SITE_BASEURL' => 0,
    'LANG' => 0,
    'message' => 0,
    'cookieusermail' => 0,
    'cookieuserpassword' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57de04dcb969e6_08363298')) {function content_57de04dcb969e6_08363298($_smarty_tpl) {?><div style="width: 100%; margin-top: 40px;" class="container">
	<div class="row">		
		<div class="col-md-1 col-sm-2 col-xs-3 partialHeader">
			<a style="max-width: 100%;" href="/index.php">
				<img class="img-responsive homeLogo home" src="theme/default/images/home.png">
			</a>
		</div>
		<div class="col-md-3 col-sm-2 hidden-xs partialHeader" style="height: 60px;"></div>
		<div class="col-md-5 col-sm-4 col-xs-6 partialHeader">
			<img class="img-responsive fullPizzaLogo" src="theme/default/images/Logotipo.png">
		</div>
		<div class="col-md-2 col-sm-2 hidden-xs partialHeader" style="height: 60px;"></div>
		<div class="col-md-1 col-sm-2 col-xs-3">
			<a id="profileIcon" style="max-width: 100%;" href="javascript:void(0);">
				<img class="img-responsive userIcon homeLogo" src="theme/default/images/user.png">
			</a>
		</div>
	</div>
</div>

<div class="loginContain" style="display: none;">
						

						<form name="customerlogin_head" method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/myaccount" onsubmit="return customerLoginValidate_header();" >
					
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
}?>" placeholder="Correo"/>
								<!--<?php echo '<script'; ?>
>document.customerlogin.customer_logemail.focus();<?php echo '</script'; ?>
>-->
								 </div>
								
									<span class="customForgot">
										<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return customerForgetPasswordPopup();" class="color2" ><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_customer_login_fpwd']);?>
</a>
									</span>
							   
								 <div class="form-group">
									<label for="customer_logpassword_header"><span class="redStar">*</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_password']);?>
:</label></label>
									<input type="password" class="form-control" name="customer_logpassword_header" id="customer_logpassword_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieuserpassword']->value;
}?>" placeholder="Contraseña"/>
								</div>
							  
									<span class="customForgot pull-left"><input class="headChckBox" type="checkbox" name="rememberme" id="rememberme" value="Yes" <?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!=''&&$_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {?> checked="checked"<?php }?> /><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_remember_me']);?>
</span>
									
								<div class="form-group">
									<div class="keepContain">
										<input type="submit" class="headLoginBtn" value="Iniciar sesión" onclick="return loginValidation()" />
										

										<span style="margin-top: 10px;" class="customForgot pull-left"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_not_registered']);?>
</span>

										<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/register" class="regSignIn">Crea una cuenta</a>
									</div>
								</div>
								<!--<a class="fbSignIn"  href="javascript:void(0);" onclick="callFacebookConnect();"></a>-->
								
								<!--<a  href="javascript:void(0);" class="frt"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">Login</span></span></a>-->
							</div>
						</form>
</div>


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
<?php echo $_smarty_tpl->getSubTemplate ('main_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
