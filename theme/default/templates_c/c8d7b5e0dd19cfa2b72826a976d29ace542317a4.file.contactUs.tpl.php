<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-16 21:57:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/contactUs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68936490457dcb111a757d5-65703165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8d7b5e0dd19cfa2b72826a976d29ace542317a4' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/contactUs.tpl',
      1 => 1466424465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68936490457dcb111a757d5-65703165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'rndnumber' => 0,
    'error' => 0,
    'site_address' => 0,
    'SITE_SUPPORT_MAIL' => 0,
    'SITE_PHONE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dcb111b518e9_39737681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcb111b518e9_39737681')) {function content_57dcb111b518e9_39737681($_smarty_tpl) {?><div class="container">
	<?php if ($_REQUEST['msg']=='succ') {?>
		<div class="customerLeftBox clearfix">
			<div class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_thanks_heading'];?>
</div>
			<p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_thanks_content'];?>
</p>
			<div class="pull-right"><a class="contact_backtohome btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='Y') {?>contact-us<?php } else { ?>contactUs.php<?php }?>"> &lt;&lt; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_thanks_contactus'];?>
</a></div>
		</div>
	<?php } else { ?>
		<div class="col-sm-12 col-lg-8 col-md-6 col-xs-12">
			<div class="customerLeftBox clearfix">
				<div class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_heading'];?>
</div>
				<p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_content'];?>
</p>
				<form name="contactus" method="post" action="" onsubmit="return contactValidate();" class="form-horizontal">
					<input type="hidden" name="action" value="ContactForm" />
					<input type="hidden" name="captchcode" id="captchcode" value="<?php echo $_smarty_tpl->tpl_vars['rndnumber']->value;?>
" /> 
					
					<span id="errormsg" <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>class="errormsg"<?php }?>><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
					
					<div class="form-group">
						 <label for="contact_name" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_name'];?>
</label>
						 <div class="col-sm-8">
							<input type="text" class="form-control" name="contact_name" id="contact_name" value="<?php echo $_POST['contact_name'];?>
" />
							<?php echo '<script'; ?>
 type="text/javascript">document.contactus.contact_name.focus();<?php echo '</script'; ?>
>
						</div>
					</div>
					<div class="form-group">
						<label for="contact_email" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_con_email'];?>
</label>
						<div class="col-sm-8">
						<input type="email" class="form-control" name="contact_email" id="contact_email" value="<?php echo $_POST['contact_email'];?>
"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="contact_ordernumber" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_ordernumber'];?>
</label>
						<div class="col-sm-8">
						<input type="text" class="form-control" name="contact_ordernumber" id="contact_ordernumber" value="<?php echo $_POST['contact_ordernumber'];?>
"/>
						</div>
					</div>
					<div class="form-group">
						<label for="contact_orderdate" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_orderdate'];?>
</label>
						<div class="col-sm-8">
						<div class="input-group date">
						<input type="text" class="form-control" name="contact_orderdate" id="contact_orderdate" value="<?php echo $_POST['contact_orderdate'];?>
"/>
						<span class="input-group-addon">
						   <span class="glyphicon glyphicon-calendar"></span>
						</span>
						</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="contact_restaurantname" class="col-sm-4 control-label font-normal">Restaurant Name</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="contact_restaurantname" id="contact_restaurantname" value="<?php echo $_POST['contact_restaurantname'];?>
"/></div>
					</div>
					<div class="form-group">
						<label for="contact_comments" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_comments'];?>
</label>
						<div class="col-sm-8"><textarea rows="3" cols="" class="form-control" name="contact_comments" id="contact_comments"></textarea></div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_enter_the_digits'];?>
</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control" name="contact_digit" id="contact_digit" maxlength="5" value="" autocomplete="off"/>
								<div class="input-group-addon pointer" onclick="return refreshContact('contact_verify_code','verification');"><i class="glyphicon glyphicon-refresh"></i></div>
							</div>
						</div>
						<div class="col-sm-3 contact_verify_code">
							<span class="contact_verifycode" id="captchcode"><?php echo $_smarty_tpl->tpl_vars['rndnumber']->value;?>
</span>
						</div>
					</div>
					
					<div class="col-sm-offset-4 col-sm-8">
						<input type="submit" id="contactussubmit" class="submit-bg" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_submit'];?>
" />
					</div>
				</form>
			</div>
		</div>
		<div class=" col-lg-4 col-md-5 pull-right">
			<div class="customerRightBox clearfix">
				<h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contact_address_heading'];?>
</h1>
				<div class="newContactcont"><?php echo $_smarty_tpl->tpl_vars['site_address']->value;?>
 </div>
				<div class="newContactMail"><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['SITE_SUPPORT_MAIL']->value;?>
"><i class="glyphicon glyphicon-envelope marRight"></i><?php echo $_smarty_tpl->tpl_vars['SITE_SUPPORT_MAIL']->value;?>
</a></div>
				<span class="newContactPhoneLeft">
						<i class="glyphicon glyphicon-phone-alt marRight"></i>
						
						<?php echo $_smarty_tpl->tpl_vars['SITE_PHONE']->value;?>

					</span>
			</div>
		</div>
	<?php }?>
</div><?php }} ?>
