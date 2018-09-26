<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-22 07:53:40
         compiled from "C:\wamp\www\theme\default\templates\restaurantOwnerLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284295833ac2c5dc7a9-48266194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f059c567fac727f92fe3340bace5d1bab502078a' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\restaurantOwnerLogin.tpl',
      1 => 1473952436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284295833ac2c5dc7a9-48266194',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'error' => 0,
    'SITE_IMAGE_URL' => 0,
    'termsContentList' => 0,
    'SITE_BASEURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5833ac2c6e7c05_39450376',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5833ac2c6e7c05_39450376')) {function content_5833ac2c6e7c05_39450376($_smarty_tpl) {?><div class="container">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="customerLeftBox clearfix">
			<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_owner_admin_panel'];?>
</h1>
			<form name="restaurantOwnerLogin" method="post" action="" onsubmit="return restOwnerLoginValidate();" class="form-horizontal">
				<input type="hidden" name="feedback" class="feedback" value="<?php echo $_GET['page'];?>
" />
				<div class="customerLeft">
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">	
							<div class="mandatoryField mandotaryRite">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['restaurant_mandatory_sign']);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_mandatory_fields'];?>

							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">	
							<span id="errormsg" class="errormsg_login"<?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>class="errormsg"<?php }?>><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
						</div>
					</div>
					<div class="form-group">
						<label for="restaurant_logemail" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['restaurant_mandatory_sign']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['restaurant_owner_login_email']);?>
</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="restaurant_logemail" id="restaurant_logemail" value=""/>
							<?php echo '<script'; ?>
 type="text/javascript">document.restaurantOwnerLogin.restaurant_logemail.focus();<?php echo '</script'; ?>
>
						</div>
					</div>
					<div class="form-group">
						<label for="restaurant_logpassword" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['restaurant_mandatory_sign']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['restaurant_owner_login_password']);?>
</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" name="restaurant_logpassword" id="restaurant_logpassword" value="" autocomplete="off"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<label class="checkout-inline checknews"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_forgot_your_password'];?>
? 
								<a data-target="#restaurantforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return restaurantForgetPasswordPopup();" class="color2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_click_here'];?>
</a>
							</label>
						</div>
					</div>
					
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">
							<input type="submit" class="submit-bg" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_login'];?>
"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="customerRight col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<div class="customerRightBox clearfix">
			<div class="ownerAdminRite">
				<span class="ownerAdminImg">
					<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/book.png" alt="" title="" />
				</span>
				<div class="ownerAdminTxt">
					<h1 class="ownerAdminHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_confirm_orders'];?>
</h1>
					<span class="ownerAdminCont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_confirm_incoming_ord'];?>
</span>
				</div>
			</div>
			<div class="ownerAdminRite">
				<span class="ownerAdminImg">
					<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pc.png" alt="" title="" />
				</span>
				<div class="ownerAdminTxt">
					<h1 class="ownerAdminHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_manage_your_restaurant'];?>
</h1>
					<span class="ownerAdminCont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_update_menu_settings'];?>
</span>
				</div>
			</div>
			<div class="ownerAdminRite">
				<span class="ownerAdminImg">
					<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/board.png" alt="" title="" />
				</span>
				<div class="ownerAdminTxt">
					<h1 class="ownerAdminHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_sales'];?>
</h1>
					<span class="ownerAdminCont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_complete_analysis_page'];?>
</span>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content_title']!='') {?>
	<div class="termsCont">
		<div class="container">
			<span class="terms"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_by_using_our_site'];?>
 </span><span class="termsofUse"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/staticPage.php?contentpage=terms-conditions" data-toggle="modal"  class="color5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_ownerlogin_footer'];?>
</a></span>
		</div>
	</div>
<?php }?>
	
	

<div id="restaurantforgetpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			 <div class="addtoCartInner">
                <div class="carthead">
                    <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_forgot_title'];?>
</h1>
                    <div class="addtoCartClose" data-dismiss="modal"></div>
                </div>
				 <div class="forgotBg clearfix">
					<form name="restaurantforgetpass" method="post" action="" onsubmit="return restaurantForgetPassword();" class="form-horizontal">
						<div id="errforgetemail" class="errforgetemail errormsg_login"></div>
						<div class="form-group">
							<label for="forgetemail" class="col-sm-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_your_email_address'];?>
:</label>
							<div class="col-sm-8">
								<input type="text" name="forgetemail" id="forgetemail1" class="form-control" value=""/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<input class="submit-bg" type="submit" id="resownerforgotpasssubmit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['restaurant_forgot_submit'];?>
" />
							</div>
						</div>			
					</form>
        		</div>
			</div>
        </div>
    </div>
</div>
<?php }} ?>
