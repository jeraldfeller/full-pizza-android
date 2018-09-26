<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-15 10:43:43
         compiled from "C:\wamp\www\theme\default\templates\customerRegister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1348957df46167a3d62-76078081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2be52b8f1cf7b44a87cbc01860bf74116e3e334' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\customerRegister.tpl',
      1 => 1479186818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1348957df46167a3d62-76078081',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57df4616a6bf65_38259745',
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_NAME' => 0,
    'termsContentList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57df4616a6bf65_38259745')) {function content_57df4616a6bf65_38259745($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('home_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="container">
	<!-- Create Account start -->
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 col-md-7 col-sm-12 col-xs-12">
			<div class="customerLeftBox clearfix bordeContenedores">

				<form name="customer_register" method="post" action="" onsubmit="return customerRegisterValidate();" class="form-horizontal">
					<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_create_account'];?>
</h1>					
					<div class="custRegBox">
						<div class="loginBg">
							<div class="mandatoryField">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_mandatory_fields'];?>

							</div>
							<div class="clr"></div>
							<span id="errormsg" class="errormsg_login"></span>
							  <div class="form-group">
									<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_full_name'];?>
</label>
									<div class="col-sm-7">
										<input type="text" class="form-control bordesInputs" name="customer_name" id="customer_name" value="<?php echo $_POST['customer_name'];?>
" />
										<?php echo '<script'; ?>
 type="text/javascript">document.customer_register.customer_name.focus();<?php echo '</script'; ?>
>
										<span id="cusnameerrormsg" class="errClass1"></span>
									</div>
								</div>
							  <div class="form-group">
									<label for="customer_lastname" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_last_name'];?>
</label>
									<div class="col-sm-7">
										<input type="text" class="form-control bordesInputs" name="customer_lastname" id="customer_lastname" value="<?php echo $_POST['customer_lastname'];?>
" />
										<span id="cuslastnameerrormsg" class="errClass1"></span>
									</div>
							   </div>							  
							  
							  
							
							
						
						   
							
						   <div class="form-group">
								<label for="customer_phone" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_phone']);?>
</label>
								<div class="col-sm-5">
									<input type="text" class="form-control bordesInputs" name="customer_phone" id="customer_phone" value="<?php echo $_POST['customer_phone'];?>
"/>
									<span id="cusphoneerrormsg" class="errClass1"></span>
								</div>
								<span class="phoneNo col-sm-2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_phone_eg'];?>
</span>
						   </div>
							
							
							
						</div>
						<!-- Login Info start -->
						<div class="loginBg">
							<h1 class="customSignupHead marbtm15"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_login_info']);?>
</h1>
							<div class="form-group">
								<label for="customer_email"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_email']);?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control bordesInputs" name="customer_email" id="customer_email" value="<?php echo $_POST['customer_email'];?>
"/>
									<span id="cusemailerrormsg" class="errClass1 "></span>
									
								</div>
						   </div>

						   <div class="form-group">
								<label for="customer_email_confirm"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_conemail']);?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control bordesInputs" name="customer_email_confirm" id="customer_email_confirm" value="<?php echo $_POST['customer_email_confirm'];?>
"/>
									<span id="cusemailconerrormsg" class="errClass1 "></span>
									
								</div>
						   </div>
							
							<div class="form-group">
								<label for="customer_password"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_password']);?>
</label>
								<div class="col-sm-7">
									<input type="password" class="form-control bordesInputs" name="customer_password" id="customer_password" value="<?php echo $_POST['customer_password'];?>
" autocomplete="off"/>
									<span id="cuspasserrormsg" class="errClass1 "></span>
								</div>
						   </div>
						   <div class="form-group">
								<label for="customer_conpassword"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_conpassword']);?>
</label>
								<div class="col-sm-7">
									<input type="password" class="form-control bordesInputs" name="customer_conpassword" id="customer_conpassword" value="<?php echo $_POST['customer_conpassword'];?>
" autocomplete="off"/>
									<span id="cusconpasserrormsg" class="errClass1 "></span>
								</div>
						   </div>
						   <div class="form-group" style="display:none;">
								<div class="col-sm-offset-4 col-sm-7">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span>
									<label class="checkbox-inline checknews">
										<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
									</label>
										<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_accept_agree']);?>

										<a class="color4" data-target="#termsCondition" href="javascript:void(0);" data-toggle="modal"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_terms_conditions']);?>
</a>
									
									<span id="custermerror" class="errClass1 "></span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-7">								
									<label class="checkbox-inline checknews">
										<input type="checkbox" class="" name="customer_active_sesion" id="customer_active_sesion" value="Yes"/>
									</label>
										<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_active_session']);?>
										
									
									<span id="custermerror" class="errClass1 "></span>
								</div>
							</div>
							
						</div>
						<!-- Login Info end -->
						<div class="contain">
						 <div class="form-group">
							<div class="col-md-12 text-center">
								
								<input type="image" id="customerregistersubmit" style="width: 8%;" src="../theme/default/images/check.png"/>
								
							</div>
						</div>
						</div>
					</div>
				</form>
			</label>
		</div>
		</div>
		<!-- Create Account end -->
		
	</div>
</div>

<div id="termsCondition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="carthead">
				<h1><?php echo stripslashes($_smarty_tpl->tpl_vars['SITE_NAME']->value);?>
</h1>
				<div class="addtoCartClose" data-dismiss="modal"></div>
			</div>
			<div class="termsCondionPop clearfix">
				<h1><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content_title']));?>
</h1>	
				<p><?php echo stripslashes($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content']);?>
</p>
			</div>
		</div>
	</div>
</div>

<?php }} ?>
