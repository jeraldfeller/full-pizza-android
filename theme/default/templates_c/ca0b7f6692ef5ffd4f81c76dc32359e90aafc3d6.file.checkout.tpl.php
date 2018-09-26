<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:47:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7954951925768cde1ec1e71-94953980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca0b7f6692ef5ffd4f81c76dc32359e90aafc3d6' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/checkout.tpl',
      1 => 1466424438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7954951925768cde1ec1e71-94953980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subtotal' => 0,
    'offervalue' => 0,
    'taxamount' => 0,
    'deliverycharge' => 0,
    'LANG' => 0,
    'customerDetails' => 0,
    'customerAddress' => 0,
    'showStatelist' => 0,
    'selectCityList' => 0,
    'searchrestaurantDetailsPaymethod_cnt' => 0,
    'searchrestaurantDetailsPaymethod' => 0,
    'total' => 0,
    'deliveryoption' => 0,
    'EXP_MONTH_LIST' => 0,
    'EXP_YEAR_LIST' => 0,
    'SITE_IMAGE_URL' => 0,
    'banklist' => 0,
    'currency' => 0,
    'withoutdel_total' => 0,
    'cartDetailsCnt' => 0,
    'SITE_BASEURL' => 0,
    'restaurantseourl' => 0,
    'restaurantname' => 0,
    'restaurant_streetaddress' => 0,
    'cartDetails' => 0,
    'salestax' => 0,
    'rest_offer_percentage' => 0,
    'offer' => 0,
    'voucher' => 0,
    'voucherMsg' => 0,
    'voucherPrice' => 0,
    'rest_status' => 0,
    'times' => 0,
    'timelist' => 0,
    'termsContentList' => 0,
    'SITE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768cde2a5fae2_16434779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768cde2a5fae2_16434779')) {function content_5768cde2a5fae2_16434779($_smarty_tpl) {?><div class="container">
	<form name="checkoutform" method="post" action="orderPayment.php" class="form-horizontal" >
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="orderid" id="orderid" value="" />
		<input type="hidden" name="deliverypickup" id="deliverypickup" value="<?php echo $_REQUEST['deliverypickup'];?>
"/>
		<input type="hidden" name="subtotal" id="subtotal" value="<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
"/>
		<input type="hidden" name="offeramount" id="offeramount" value="<?php echo $_smarty_tpl->tpl_vars['offervalue']->value;?>
" />
		<input type="hidden" name="taxamount" id="taxamount" value="<?php echo $_smarty_tpl->tpl_vars['taxamount']->value;?>
" />
		<input type="hidden" name="deliveryamount" id="deliveryamount" value="<?php echo $_smarty_tpl->tpl_vars['deliverycharge']->value;?>
" />
		<?php if ($_REQUEST['resid']!='') {?>
		<input type="hidden" name="restid" id="restid" value="<?php echo $_REQUEST['resid'];?>
"/>
		
		<?php } else { ?>
		<input type="hidden" name="restid" id="restid" value="<?php echo $_SESSION['RESTID'];?>
"/>
		
		<?php }?> 
		<input type="hidden" name="cusid" id="cusid" value="<?php echo $_SESSION['customerid'];?>
"/>
		<input type="hidden" name="paypal_type" class="paypal_type" id="paypal_type" value="cashon" />
		<input type="hidden" name="request_payment" id="request_payment" value="<?php echo $_REQUEST['paymentinfo'];?>
"/>
		<input type="hidden" name="striperesponse" id="striperesponse" value="<?php echo $_REQUEST['responsemessage'];?>
" />
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="customerLeftBox clearfix">
				<div class="checkBg no_margin">
					<h1 class="customSignupHead"><?php if ($_REQUEST['deliverypickup']=='pickup') {
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_pickup'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_delivery'];
}?></h1>
					<span id="submiterror"></span>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-5">
							<div class="mandatoryField">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory'];?>

							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contactname" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_name'];?>
</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="contactname" id="contactname" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_name']);?>
" />
							<span id="contactnameerrormsg"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="contactlastname" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_lastname'];?>
</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="contactlastname" id="contactlastname" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_lastname']);?>
" />
							<span id="contactlastnameerrormsg"></span>
						</div>
					</div>
					<?php if ($_SESSION['customerid']!=''&&$_smarty_tpl->tpl_vars['customerAddress']->value[0]['id']!='') {?>
						<div class="form-group">
							<input type="hidden" id="cus_type" value="Customer" />
							<label for="deliveryaddresstitle" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }?>Address Title</label>
							<div class="col-sm-5">
								 <select name="deliveryaddresstitle" id="deliveryaddresstitle" class="form-control" onchange="getAddressByTitle('<?php echo $_REQUEST['deliverypickup'];?>
');"> 
									<option value= "">select address title</option>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["title"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['name'] = "title";
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customerAddress']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["title"]['total']);
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['customerAddress']->value[$_smarty_tpl->getVariable('smarty')->value['section']['title']['index']]['id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['title']['index']=='0') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['customerAddress']->value[$_smarty_tpl->getVariable('smarty')->value['section']['title']['index']]['customer_address_title'];?>
</option>
										<?php endfor; endif; ?>
									<option value="Other">Other Address</option>
								</select>
								<span id="addresstitleerrormsg"></span>
							</div>
						</div>
						<div class="form-group">
							<div id="OtherAddress" style="display:none">
								<label for="otheraddresstitle" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }?>Other Address Title</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" name="otheraddresstitle" id="otheraddresstitle" value="" />
									<span id="otheradderrormsg"></span>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="form-group">
							<label for="otheraddresstitle" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }?>Address Title</label>
							<input type="hidden" id="cus_type" value="Guest" />
							<?php echo '<script'; ?>
 type="text/javascript">document.getElementById("contactname").focus();<?php echo '</script'; ?>
>
							<div class="col-sm-5">
								<input class="form-control" type="text" name="otheraddresstitle" id="otheraddresstitle" value="" />
								<span id="otheradderrormsg"></span>
							</div>
						</div>
					<?php }?>
					
					<div id="addressbook">
						<div class="form-group">
							<label for="deliverystreet" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_locality'];?>
</label>
							<div class="col-sm-5">
								<input class="form-control" type="text" name="deliverystreet" id="deliverystreet" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_street']);?>
" />
								<span id="deliverystreeterrormsg"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="deliveryaddress" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_doorno'];?>
</label>
							<div class="col-sm-5">
								<input class="form-control" type="text" name="deliveryaddress" id="deliveryaddress" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_apartment_name']);?>
" />
								<span id="deliveryaddresserrormsg"></span>
							</div>
						</div>
								
		
						 <div class="form-group">
							<label for="deliverystate" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_state'];?>
</label>
							<div class="col-sm-5">
								<select name="deliverystate" id="deliverystate" class="form-control" onchange="getCityListCuscheck(this.value);"> 
								<option value= ""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_selectstate'];?>
</option>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["state"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['name'] = "state";
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showStatelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total']);
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['showStatelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode'];?>
" <?php if ($_smarty_tpl->tpl_vars['showStatelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode']==$_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_state']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['showStatelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statename']);?>
</option>
									<?php endfor; endif; ?>
								</select>
								<span id="deliverystateerrormsg"></span>
							</div>
						</div>
						
						 <div class="form-group">
							<label for="deliverycity" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_city'];?>
</label>
							<div class="col-sm-5">
								<div id="showCusCityListcheck">
								<select name ="deliverycity" class= "form-control" id="deliverycity">
									<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_firstselectstate'];?>
</option>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['city'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['city']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['name'] = 'city';
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['selectCityList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['city']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['city']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['city']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['city']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['city']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['city']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['city']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['city']['total']);
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['city_id']==$_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_city']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['cityname']);?>
</option>
									<?php endfor; endif; ?>
								</select>	
								</div>			
								<span id="deliverycityerrormsg"></span>
							</div>
						</div>
							
						 <div class="form-group">
							<label for="deliveryzip" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php }
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_zip'];?>
</label>
							<div class="col-sm-5">
								<div id="showCusZipListcheck">
								<input type="text" class="form-control" name="deliveryzip" id="deliveryzip" value="<?php echo stripcslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_zip']);?>
">
								
								</div>							
								<span id="deliveryziperrormsg"></span>
							</div>
						</div>	
								
					</div>			
					<div class="form-group">
						<label for="contactphone" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_cellphone'];?>
</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="contactphone" id="contactphone" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_phone']);?>
" />
							<span id="contactphoneerrormsg"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="contactemail" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_email'];?>
</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="contactemail" id="contactemail" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_email']);?>
" />
							<span id="contactemailerrormsg"></span>
							<span id="errAlreadyemail"></span>
						</div>
					</div>
				</div>
				<?php if ($_SESSION['customerid']=='') {?>
					<div class="checkBg">
						<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_createacc'];?>
</h1>
						<div class="form-group">
							<label for="contactpassword" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_password'];?>
</label>
							<div class="col-sm-5">
								<input class="form-control" type="password" name="contactpassword" id="contactpassword" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_password']);?>
" autocomplete="off"/>
								<span id="contactpasserrormsg"></span>
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<div class="col-sm-offset-4 col-sm-6">
								<!--<label class="checkbox-inline" for="customer_terms">
									<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
								</label>
								<b class="redStar autowidth"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</b><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_accept_agree']);?>
 <a class="color4" data-toggle="modal" href="#termsCondition"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_terms_conditions']);?>
</a>-->
								<label for="customer_terms" class="checkoutTerms">
									<span class="checkbox-inline">
										<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
									</span>
									<b class="redStar autowidth"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_mandatory_symbol']);?>
</b><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_accept_agree']);?>
 <a class="color4" data-toggle="modal" href="#termsCondition"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_terms_conditions']);?>
</a>
								</label>
								<span id="custermerror" class="errClass1"></span>
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<div class="col-sm-offset-4 col-sm-5">
								<label class="checkbox-inline" for="customer_news">
									<input type="checkbox" class="" name="customer_news" id="customer_news" value="Yes" checked="checked"/>
									<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_monthly_newsletter']);?>

								</label>
								<span id="cusnewserror" class="errClass1"></span>
							</div>
						</div>
					</div>
				<?php }?>
				
				<?php if ($_REQUEST['resid']!=''&&$_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod_cnt']->value>0) {?>
					<div class="checkBg">
						<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_paymentinfo'];?>
</h1>
						<div class="row">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['name'] = "pay";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total']);
?>
								<div class="col-md-4 col-lg-4 col-sm-4">
									<span class="checkRadio">
										<?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id']=='1') {?>
											<input type="radio" name="paymentinfo" value="cod" id="paymentinfo_cashon" checked="checked" onclick="tipcalculation('',<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;
} elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>);"/>
										<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id']=='2') {?>
											<input type="radio" name="paymentinfo" id="paymentinfo_paypal" value="paypal" />
										<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id']=='3') {?>
											<input type="radio" name="paymentinfo" id="paymentinfo_credit" value="creditcard" <?php if ($_REQUEST['paymentinfo']=='creditcard') {?> checked="checkeif"<?php }?>/>
										<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id']=='4') {?>
											<input type="radio" name="paymentinfo" id="paymentInfoPro" value="paypalpro" />
										<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id']=='5') {?>
											<input type="radio" name="paymentinfo" value="authorizenet" id="paymentinfo_authorize"/>
										<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id']=='6') {?>
											<input type="radio" name="paymentinfo" value="ideal" id="paymentinfo_ideal"/>
										<?php }?>
									</span>									
									<span class="checkradioName"><?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_name']);?>
</span>
									<span class="checkPayImg">
										<img src="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_photo'];?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_name']);?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_name']);?>
" />
									</span>
								</div>
							<?php endfor; endif; ?>
						</div>
					</div>
				<?php }?>
				
				<!-- PayPal Pro DoDireact Method Start -->
				<div id="paymentinfo_credit_paypalpro" style="display:none;">
					<div class="checkBg">              
							<span id="cardDetailserrormsg"></span>
							<ul class="customsignupUl">
								<li>
									<span class="name">Select Card Type:</span>
								</li>
								<li class="relative">
									<select name="cardtype" id="cardtype" class="selectboxindex">
										<option value="Select Card">Select Card</option>
										<option value="visa">VISA</option>
										<option value="master">MASTER CARD</option>
										<option value="maestro">MAESTRO CARD</option>
										<option value="switch">SWITCH</option>
									</select>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_first_name']);?>
</span>
									<input class="txt" type="text" name="cardholderfirstname" id="cardholderfirstname" value="" autocomplete="off"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_last_name']);?>
</span>
									<input class="txt" type="text" name="cardholderlastname" id="cardholderlastname" value="" autocomplete="off"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_credit_card_no']);?>
</span>
									<input class="txt numericfield" type="text" name="cardnumber" id="cardnumber" value="" autocomplete="off"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_expiration_date']);?>
</span>
									<span class="relativeClass">
										<select class="selectboxindexChecknew" name="expmonth" id="expmonth">
											<option value="Month">Month</option>
											<?php echo $_smarty_tpl->tpl_vars['EXP_MONTH_LIST']->value;?>

										</select>
									</span>
									<span  class="dateSplit">/</span>
									<span class="relativeClass">
										<select class="selectboxindexChecknew" name="expyear" id="expyear">
											<option value="Year">Year</option>
											<?php echo $_smarty_tpl->tpl_vars['EXP_YEAR_LIST']->value;?>

										</select>
									</span>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_cvc_code']);?>
</span>
									<input name="cvccode" id="cvccode" class="txt numericfield" type="text" value="" autocomplete="off"/>
								</li>
							</ul>
							<!--<div class="paymentCheckbox"><input class="checkbox" type="checkbox" /> Save my Credit Card (optional)</div>-->
						</div>
				</div>
				<!-- PayPal Pro ( Do Direact method ) End -->
				
				<!-- Stripe Credit Card Start-->
				<div id="paymentinfo_credit_contact" <?php if ($_REQUEST['paymentinfo']=='creditcard') {?> style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
				
					<div class="checkBg">
							<div class="checkBtmLine">
								<h1 class="customSignupHead "><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_usecredit'];?>
</h1>
								<div class="form-group">
									<div class=" col-sm-offset-4 col-sm-5">
										<span class="useAddressCheck">
											<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/big-cards.jpg" alt="" title="" />
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class=" col-sm-offset-4 col-sm-5">
										<span id="stripecardDetailserrormsg"></span>
										<span id="paymentError" class="errClass1"><?php echo $_REQUEST['responsemessage'];?>
</span> 
									</div>
								</div>		
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar"></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_cardholder'];?>
</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" value="" name="stripe_cardname" id="stripe_cardname"/>	
															
										<span class="phoneNo"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_creditdebit'];?>
</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_cardno'];?>
</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" value="<?php echo $_REQUEST['stripe_cardnumber'];?>
" name="stripe_cardnumber" id="stripe_cardnumber"/>
										<?php if ($_REQUEST['responsemessage']=='Your card number is incorrect.') {?>
										<?php echo '<script'; ?>
 type="text/javascript">document.checkoutform.stripe_cardnumber.focus();<?php echo '</script'; ?>
>	
										<?php }?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_securitycode'];?>
</label>
									<div class="col-sm-5">
										<input class="form-control" type="password" value="<?php echo $_REQUEST['stripe_cvccode'];?>
" name="stripe_cvccode" id="stripe_cvccode" autocomplete="off"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_expdate'];?>
</label>
									<div class="col-sm-2">
										<select class="form-control" name="stripe_expmonth" id="stripe_expmonth">
											<option value="Month"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_month'];?>
</option>
											<?php echo $_smarty_tpl->tpl_vars['EXP_MONTH_LIST']->value;?>

										</select>
										
									</div>
										
										<span class="flt"> / </span>
									
									<div class="col-sm-2">
									   
										<select class="form-control" name="stripe_expyear" id="stripe_expyear">
											<option value="Year"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_year'];?>
</option>
											<?php echo $_smarty_tpl->tpl_vars['EXP_YEAR_LIST']->value;?>

										</select>
									</div>
								</div>
							</div>
						</div>
				</div>
				<!-- Stripe credit card end -->
				
				<!-- Authorize.net Credit card start-->
				<div class="checkBg" id="payment_authorizeNetnfo" style="display:none;">
							<span id="aut_cardDetailserrormsg"></span>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_select_card_type']);?>
</span>
								</li>
								<li>
									<select name="aut_cardtype" id="aut_cardtype" class="selectboxindex">
										<option value=""><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_select_card']);?>
</option>
										<option value="visa"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_visa']);?>
</option>
										<option value="master"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_master_card']);?>
</option>
										<option value="amex"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_american_express']);?>
</option>
										<option value="discover"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_discover']);?>
</option>
									</select>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_name_on_card']);?>
:</span>
									<input class="txt" type="text" name="cardholdername" id="cardholdername" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_card_holder_name']);?>
"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_credit_card_no']);?>
</span>
									<input class="txt" type="text" name="cardnumber" id="aut_cardnumber" value="<?php echo $_smarty_tpl->tpl_vars['customerDetails']->value[0]['card_number'];?>
"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_expiration_date']);?>
</span>
									<select class="selectboxindexChecknew" name="expmonth" id="aut_expmonth">
										<option value="">Month</option>
										<?php echo $_smarty_tpl->tpl_vars['EXP_MONTH_LIST']->value;?>

									</select>
									<span class="dateSplit">/</span>
									<select class="selectboxindexChecknew" name="expyear" id="aut_expyear">
										<option value="">Year</option>
										<?php echo $_smarty_tpl->tpl_vars['EXP_YEAR_LIST']->value;?>

									</select>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_paypal_cvc_code']);?>
</span>
									<input name="cvccode" id="aut_cvccode" class="txtCode" type="text" value="<?php echo $_smarty_tpl->tpl_vars['customerDetails']->value[0]['security_code'];?>
"/>
								</li>
							</ul>
					   </div>
				
				<!-- Ideal Payment -->
				<div class="checkBg" id="payment_idealinfo" style="display:none;">
					 <span class="TipHead customSignupHead">Ideal Bank List</span>
					 <select name="bank" id="bank"><?php echo $_smarty_tpl->tpl_vars['banklist']->value;?>
</select>
				</div>       
				
				<!-- Tip Options Start -->
				<div class="tipOptionContent" <?php if ($_REQUEST['paymentinfo']=='creditcard') {?> style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
					<div class="checkBg">
						<div class="" id="tip_creditoption">
							<div class="TipHead customSignupHead"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_tip_options']);?>
</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">&nbsp;</label>
								<div class="col-sm-5">
									<input type="hidden" name="tipsubtot" id="tipsubtot" value="<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;
} elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>"/>
									<input type="radio" name="creditCal" id="tip_credit" onclick="tipcalculation('',<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;
} elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>);" value="0"/> <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_remove_tip']);?>

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">&nbsp;</label>
								<div class="col-sm-5">
									<div id="tip_creditoption_price" class="tioPaypal">
										<div class="tipPaypalSubDiv tipPaypalSubDivCnt checkRadioInner">
											<span class="tipPaypalSubDivCntLink flt"><input type="radio" class="checkRadio" name="creditCal" id="creditper10" onclick="tipcalculation('10',<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;
} elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>);" class="checkRadio" value="10"/><span class="tipPaypalSubDivPercnt tipinName"> 10%</span></span>
											<span class="tipPaypalSubDivCntLink flt"><input type="radio" class="checkRadio" name="creditCal" id="creditper10" onclick="tipcalculation('15',<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;
} elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>);" class="checkRadio" value="15" /><span class="tipPaypalSubDivPercnt tipinName">  15%</span></span> 
											<span class="tipPaypalSubDivCntLink flt"><input type="radio" class="checkRadio" name="creditCal" id="creditper10" onclick="tipcalculation('20',<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;
} elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>);" class="checkRadio" value="20" /><span class="tipPaypalSubDivPercnt tipinName">  20%</span></span>
										</div>
										<div class="tipPaypalSubDiv tipPaypalSubDivCnt checkRadioInner">
											<span class="tipPaypalSubDivCntLink dollerSym flt">$</span>
											<input type="text" name="credittipprice" readonly="readonly"class="txt txtboxSmall pervalue checkpervalue" id="txt1" value="0" onkeyup="calculateSum(<?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value;
}?>);" autocomplete="off" />
										</div>
										<div class="updateTotal">
											<span class="updatelable"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_updated_total']);?>
</span>
											<span class="updatecurrency"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</span>
											<span class="updatevalue"><?php if ($_REQUEST['deliverypickup']!='pickup') {?> <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
 <?php } elseif ($_REQUEST['deliverypickup']=='pickup'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
 <?php } else { ?> <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['withoutdel_total']->value);?>
 <?php }?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Tip Options End -->
			</div>
		</div>		
   
		<div class="detailsRight1 checkoutcartBox col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="customerRightBox checkoutRightTop clearfix" id="checkoutcart">
				<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['subtotal']->value!='') {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_REQUEST['resid']!='') {?>restaurantDetails.php?resid=<?php echo $_REQUEST['resid'];?>
&resname=<?php echo $_smarty_tpl->tpl_vars['restaurantseourl']->value;?>
&ordoption=<?php echo $_REQUEST['deliverypickup'];
} else { ?>index.php<?php }?>" class="checkout_replan">Edit Order</a>
				<?php } else { ?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/index.php" class="checkout_replan"> Edit Order</a>
				<?php }?>
				<div class="cartRightHeadInfo clearfix">
					<h1><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantname']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_varityorder'];?>
</h1>
					<p class="searchAddressCont"><?php echo $_smarty_tpl->tpl_vars['restaurant_streetaddress']->value;?>
</p>
				</div>
				<div class="detailsRightMiddle1">
					<div class="contain">
						<ul class="detRiteNewCont1Ul checkoutItemHead">
							<li class="item"><label class="bgNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_item'];?>
</label></li>
							<li class="Qty"><label class="bgNew align-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_qty'];?>
</label></li>
							<li class="price "><label class="bgNew align-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_price'];?>
</label></li>
						</ul>
						
						<input type="hidden" name="ordertotalprice" id="ordertotalprice" value="<?php if ($_REQUEST['deliverypickup']=='pickup') {
echo $_smarty_tpl->tpl_vars['total']->value;
} else {
echo $_smarty_tpl->tpl_vars['total']->value;
}?>"/>
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cart'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['name'] = 'cart';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cartDetails']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total']);
?>
						<ul class="detRiteNewCont1Ul">
							<li class="item">
								<label class="<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menutype']=='veg') {?>contNew1<?php } else { ?>contNew1<?php }?>"><?php echo html_entity_decode(stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menuname'])));?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_size']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_size'];?>
)<?php }?></label>
							</li>
							<li class="Qty"><label class="<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menutype']=='veg') {?>contNew1<?php } else { ?>contNew1<?php }?>"> <?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['quantity'];?>
  </label></li>
							<li class="price"><label class="<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menutype']=='veg') {?>contNew1<?php } else { ?>contNew1<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['tot_menuprice'];?>
</label></li>
						</ul>
						<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_crustname']!='') {?>
							<span class="deal_info_desc1">
								<span class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_crust'];?>
:
								<?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_crustname']);?>
&nbsp;</span>
							</span>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_addonsname']!='') {?>
							<span class="deal_info_desc1">
								<span class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_add_topping'];?>
:
								<?php echo html_entity_decode(stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_addonsname']));?>
&nbsp;</span>
							</span>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsname']!='') {?>
							<span class="deal_info_desc1">
								<span class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_addons'];?>

								<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsname']));?>
</span>
								<!--<span class="option2"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsname']));?>
&nbsp;(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsprice'];?>
 Extra)</span>-->
							</span>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['specialinstruction']!='') {?>
							<span class="deal_info_desc1">
								<span class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_spl_inst'];?>
:
								<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['specialinstruction']));?>
</span>
							</span>
						<?php }?>
						<?php endfor; else: ?>
						<span class="noOrderYet"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_noitem'];?>
</span>
						<?php endif; ?>
						<div class="border100"></div>
						<ul class="detRitePriceCont1Ul">
							<li>
								<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_subtotal'];?>
:</label>
								<label class="price1"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['subtotal']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['subtotal']->value);
} else { ?>0.00<?php }?></label>
							</li>
							<li>
								<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_tax'];?>
 <?php if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00') {?>(<?php echo $_smarty_tpl->tpl_vars['salestax']->value;?>
 %)<?php }?>:</label>
								<label class="price1"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['salestax']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['taxamount']->value);
} else { ?>0.00<?php }?></label>
							</li> 
							<?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes'&&$_REQUEST['deliverypickup']!='pickup') {?>
							<li>
								<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_deliverycharge'];?>
:</label>
								<label class="price1"><span class="color3"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0) {
if ($_smarty_tpl->tpl_vars['deliverycharge']->value=='0.00') {
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_free'];
} else {
echo $_smarty_tpl->tpl_vars['deliverycharge']->value;
}
} else { ?>0.00<?php }?></span></label>
							</li> 
							<?php }?>                   
						</ul>
						
						<?php if (!empty($_smarty_tpl->tpl_vars['rest_offer_percentage']->value)) {?>
						<input type="hidden" name="offer" id="offer" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value;?>
" />
							<?php if ($_smarty_tpl->tpl_vars['offervalue']->value>0) {?>
							<ul class="detRiteTotalCont1Ul">
								<li>
									<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_discount'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rest_offer_percentage']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_percentoff'];?>
):</label>
									<label class="total1" id="total1"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['offervalue']->value!='') {?>- <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['offervalue']->value);
} else { ?>0.00<?php }?></label>
								</li>
							</ul>
							<?php }?>
						<?php }?>
						<ul class="detRiteTotalCont1Ul" id="checkupdatetotalshow" style="display:none;">
							<li>
								<label class="txt1">Tip:</label>
								<label class="total1" id="checkpervalue">0.00</label>
								<span id="checkpervalue1"></span>
							</li>  
						</ul>
						<ul class="detRiteTotalCont1Ul">
							<li>
								<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_total'];?>
:&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<?php if ($_REQUEST['deliverypickup']!='pickup') {?>
								<label class="total1" id="checkupdatetotal" ><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?></label>
								<input type="hidden" name="grandtotal" id="grandtotal" value="<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?>"/>
								<?php } else { ?>
								<label class="total1" id="checkupdatetotal"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!=''&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {
echo sprintf("%.2f",($_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value));
} elseif ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!=''&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?></label>
								<input type="hidden" name="grandtotal" id="grandtotal" value="<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!=''&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {
echo sprintf("%.2f",($_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value));
} elseif ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!=''&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?>"/>
								<?php }?>
							</li>
						</ul>

						
						<?php if ($_smarty_tpl->tpl_vars['voucher']->value=='Available') {?>
							<div class="form-group">
								<div class="col-sm-12" id="voucherErr"><?php echo $_smarty_tpl->tpl_vars['voucherMsg']->value;?>
</div>
								<label class ="control-label col-sm-12 align-left "><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_enter_voucher_code']);?>
</label>
								<div class="col-sm-12 margintopbot10">
									<div class="input-group">
										<input type="text" class="form-control" id="voucher" />
										<label class="input-group-addon" >
											<input type="submit" class="apply-icn" value="" onclick="return applyVoucherCode(<?php echo $_REQUEST['resid'];?>
);" />
										</label>
									</div>
								</div>
							</div>
							
						<?php } else { ?>
							<input type="hidden" id="voucher" value="<?php echo $_SESSION['voucher'];?>
"/>
							<?php if ($_smarty_tpl->tpl_vars['voucherMsg']->value==''&&$_smarty_tpl->tpl_vars['voucherPrice']->value!='') {?>
								<div class="contain">
									
										<label class="vou-name">Voucher Discount Price</label>
									
										<label class="vou-price">- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['voucherPrice']->value);?>
</label>
										<span class="voucherdelete" onclick="return removeVoucherCode(<?php echo $_REQUEST['resid'];?>
);">x</span>
									
								</div>
							<?php }?>
						<?php }?>
						
						
						
					</div>
				</div>
			</div>
					
					
				
				<div class="customerRightBox clearfix">
					<h1><?php if ($_REQUEST['deliverypickup']=='pickup') {
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_datepickuphead'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_datedeliveryhead'];
}?> </h1>
					<div class="detailsRightMiddle1">
					
					<input type="hidden" name="restStatus" id="restStatus" value="<?php echo $_smarty_tpl->tpl_vars['rest_status']->value;?>
" />
						<div class="contain">
							<!--<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_datedeliveryhead'];?>
</h1>-->
							<?php if ($_REQUEST['deliverypickup']!='pickup') {?>
							<div class="form-group" id="foodassoonpos" <?php if ($_smarty_tpl->tpl_vars['rest_status']->value=='Closed') {?> style="display:none"<?php }?>>
								<div class="col-sm-12">
									<label class="checkbox-inline" for="foodassoonas"  >
									<input type="checkbox" name="foodassoonas" id="foodassoonas" class="flt" value="1" onclick="foodSoonAsCheck();"/>
									<?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_bringfood'];?>

									</label>
								</div>
							</div>
							<?php }?>
							<div id="soonaspos">
								<div class="checkRadioInner">
									<?php if ($_REQUEST['deliverypickup']=='delivery') {?>
										<label class="datePickTit"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_datedelivery'];?>
</label>
									<?php } else { ?>
										<label class="datePickTit"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['checkout_date_of_pickup']);?>
</label>
									<?php }?>
									<div class='input-group date'>
										<input type="text" class="form-control booking_date" name="datedelivery" id="datedelivery"  readonly/>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
									<input type="hidden" name="restid" id="restid" value="<?php echo $_REQUEST['resid'];?>
"/>
									<!--<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/calender.png" alt="" title="" class="flt" />-->
									<span id="dateerrormsg"></span>
									
								</div>
									<!-------------------------time drop down box--------------------- -->
								<div id="Newopentimeclosetime">
									
									<?php if ($_smarty_tpl->tpl_vars['times']->value=='') {?>
										<select name="time_delivery" id="time_delivery">
											<option value="">Closed</option>     
										
										</select>
									<?php } else { ?>
										<select name="time_delivery" id="time_delivery">
											<?php  $_smarty_tpl->tpl_vars['timelist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['timelist']->_loop = false;
 $_smarty_tpl->tpl_vars['opentime'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['times']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['timelist']->key => $_smarty_tpl->tpl_vars['timelist']->value) {
$_smarty_tpl->tpl_vars['timelist']->_loop = true;
 $_smarty_tpl->tpl_vars['opentime']->value = $_smarty_tpl->tpl_vars['timelist']->key;
?>
												<?php echo $_smarty_tpl->tpl_vars['timelist']->value;?>

											<?php } ?>
										</select>
									<?php }?>
								</div>
							</div>
						 </div>
					</div>
				</div>
			
			<div class="customerRightBox clearfix">
				<h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_instruction'];?>
</h1>
				<div class="detailsRightMiddle1">
					<div class="contain">
						<textarea rows="" cols="" class="riteTextAree1" name="instructions" id="instructions"></textarea>
						<span id="instructionerrormsg"></span>
						<div class="checkRadioInner">
							<span class="myAddressEdit1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_instructioncommand'];?>
</span>
						</div>
					</div>
				</div>
			</div>
			<div class="ritebtnMar">
				<span id="submiterror"></span>
				<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['subtotal']->value!=''&&$_smarty_tpl->tpl_vars['searchrestaurantDetailsPaymethod_cnt']->value>0) {?>
					<input class="submit-bg" type="button" id="checkoutSubmit" onclick="return submitOrder();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_sendorderbut'];?>
"  />
				<?php } else { ?>				   
					<input class="btn btn-default" disabled="disabled" id="checkoutSubmit" type="button" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_sendorderbut'];?>
" />
				<?php }?>
				</div>
			<div class="checkRadioInner">
				<span class="myAddressEdit1"><a data-toggle="modal" class="color4" data-target="#foodAllergy" href="javascript:void(0);" ><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['termsContentList']->value[1]['content_title']));?>
</a></span>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content_title']!='') {?>
				<div class="checkRadioInner">
					<span class="myAddressEdit1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_agreetxt'];?>
 <a class="color4" data-toggle="modal" data-target="#termsCondition" href="javascript:void(0);"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content_title']));?>
</a></span>
				</div>
			<?php }?>
		</div>
	</form>
</div>


<div id="termsCondition"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
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

<div id="foodAllergy"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="carthead">
				<h1><?php echo stripslashes($_smarty_tpl->tpl_vars['SITE_NAME']->value);?>
</h1>
				<div class="addtoCartClose" data-dismiss="modal"></div>
			</div>
            <div class="termsCondionPop clearfix">
				<h1><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['termsContentList']->value[1]['content_title']));?>
</h1>	
				<p><?php echo stripslashes($_smarty_tpl->tpl_vars['termsContentList']->value[1]['content']);?>
</p>
			</div>
        </div>
    </div>
</div><?php }} ?>
