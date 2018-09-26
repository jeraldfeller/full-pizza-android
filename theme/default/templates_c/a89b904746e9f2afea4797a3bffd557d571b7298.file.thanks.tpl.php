<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:48:30
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/thanks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13502655945768ce26b71095-39493329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a89b904746e9f2afea4797a3bffd557d571b7298' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/thanks.tpl',
      1 => 1466424465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13502655945768ce26b71095-39493329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lastorderid' => 0,
    'respmsg' => 0,
    'LANG' => 0,
    'SITE_NAME' => 0,
    'restaurantname' => 0,
    'orderDetails' => 0,
    'deliverycity' => 0,
    'deliverystate' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'cartDetails' => 0,
    'currency' => 0,
    'subtotal' => 0,
    'salestax' => 0,
    'taxamount' => 0,
    'deliveryoption' => 0,
    'deliverytype' => 0,
    'deliverycharge' => 0,
    'orderDiscountPrice' => 0,
    'tipamount' => 0,
    'total' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768ce26ebdff4_90067725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768ce26ebdff4_90067725')) {function content_5768ce26ebdff4_90067725($_smarty_tpl) {?><div class="finalorderid" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['lastorderid']->value;?>
</div>
<div class="container">
	<div class="MyAccountBg clearfix">
			
			<?php if ($_smarty_tpl->tpl_vars['respmsg']->value!=''&&$_smarty_tpl->tpl_vars['respmsg']->value!='Approved') {?>
				<h1 class="thanksHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_payment_failure'];?>
</h1>
				<h1 class="thanksInnerHead"><?php echo $_smarty_tpl->tpl_vars['respmsg']->value;?>
</h1>
			<?php }?>
			
			<?php if ($_GET['orderid']!='') {?>
			<div class="thanksordershow"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_orderthank'];?>
 <?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_orderfrom'];?>
 <?php echo $_smarty_tpl->tpl_vars['restaurantname']->value;?>
</div>
			<h1 class="MyAccountBgHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_orderdetails'];?>
</h1>
			<div class="addtoCartInner marTop20">
				<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="viewDetailHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_order_info'];?>
</div>
                        <ul class="thanksUlNew1MyAcc">
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_orderno'];?>
</span>
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['restaurantname']->value!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_restname'];?>
</span>
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['restaurantname']->value;?>
</span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_ordertype'];?>
</span>
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']));?>
</span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']=='delivery'&&$_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydate']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_deliverytime'];?>
</span>
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydate'];?>
 <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['foodassoonas']=='1') {?> ASAP <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytime'];?>
 <?php }?> </span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_ordertime'];?>
</span>
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate'];?>
</span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_paymentmethod'];?>
</span>
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='cod') {?>Cash on Delivery<?php } elseif ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='CC') {?>Credit Card<?php } else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']));
}?></span>
                            </li>
                            <li>
                                <span class="name">Payment Status</span>
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_status']=='P') {?>Paid<?php } else { ?>Not Paid<?php }?></span>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="viewDetailHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_customer_info'];?>
</div>
                        <ul class="thanksUlNew1MyAcc">
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customername']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_custname'];?>
</span>
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customername']));?>
 <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlastname']));?>
</span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystreet']!=''||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryarea']!=''||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverycity']!=''||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystate']!=''||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip']!='') {?> 
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_custaddress'];?>
</span>
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystreet']!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystreet']));?>
,<?php }
if ($_smarty_tpl->tpl_vars['deliverycity']->value!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['deliverycity']->value));?>
,<?php }
if ($_smarty_tpl->tpl_vars['deliverystate']->value!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['deliverystate']->value));
}
if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip']!='') {?>&nbsp;-<?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip'];
}?></span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customercellphone']!='') {?>
                            <li>
                                <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_phoneno'];?>
</span>
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customercellphone']));?>
</span>
                            </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlandline']!='') {?>
                                <li>
                                    <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_landline'];?>
</span>
                                    <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlandline']));?>
</span>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverylandmark']!='') {?>
                                <li>
                                    <span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_landmark'];?>
</span>
                                    <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverylandmark']));?>
</span>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']!='') {?>
                                <li>
                                    <span class="name">Instructions</span>
                                    <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']));?>
</span>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
				</div>
			</div>
			<div class="checkBtmLine">
				
				<?php if ($_SESSION['customerid']!='') {?>
				<div class="thanksbutton">
					<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerMyaccount.php<?php } else { ?>myaccount<?php }?>" class="submit-bg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_myorderbut'];?>
</a>
				</div>
				<?php }?>
			</div>
			<h1 class="MyAccountBgHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menudetails'];?>
</h1>
			<div class="tablecontainer marTop20">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr class="orderInnerHead">
						<th class="orderHeading" width="10%">S No</th>
						<th class="orderHeading" width="30%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menuitem'];?>
</th>
						<th class="orderHeading" width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menuqty'];?>
</th>
						<th class="orderHeading" width="25%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menuprice'];?>
</th>
						<th class="orderHeading" width="50%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menutotprice'];?>
</th>
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ord'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['name'] = 'ord';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cartDetails']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['total']);
?>
					<tr class="orderInnerCont">
						<td width="10%"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ord']['rownum'];?>
</td>
						<td width="30%">
						<?php echo html_entity_decode(stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuname'])));?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size'];?>
)<?php }?>
						<span class="addonthanks">
							<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_customer_addons'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']);?>
 <?php }?>
							<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_crustname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_customer_crust'];?>
:</b><?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_crustname']);?>
 <?php }?>
							<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_addonsname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_customer_topping'];?>
:</b><?php echo html_entity_decode(stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_addonsname']));?>
 <?php }?>
							<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['specialinstruction']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_inst'];?>
:</b><?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['specialinstruction']);
}?>
						</span>
						</td>
						<td width="20%"><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['quantity'];?>
</td>
						<td width="15%"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuprice'];
if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?>( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsprice'];?>
 Extra )<?php }?></td>
						<td width="50%" class="last align-right padright90"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['tot_menuprice'];?>
</td>
					</tr>
					<?php endfor; endif; ?>
					<tr>
						<td align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menutotal'];?>
</td>
						<td class="last align-right padright90"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
					</tr>
					<tr>
						<td align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menutax'];
if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00') {?> (<?php echo $_smarty_tpl->tpl_vars['salestax']->value;?>
 %)<?php }?></td>
						<td class="last align-right padright90"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['taxamount']->value;?>
</td>
					</tr>
					<?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes'&&$_smarty_tpl->tpl_vars['deliverytype']->value!='pickup') {?>
					<tr>
						<td align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_deliverycharge'];?>
</td>
						<td class="last align-right padright90"><?php if ($_smarty_tpl->tpl_vars['deliverycharge']->value=='0.00') {?>0.00<?php } else {
echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['deliverycharge']->value;
}?></td>
					</tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue']!='') {?>
					<tr>
						<td align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_discount'];?>
(<?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_percent'];?>
)</td>
						<td class="last align-right padright90"><?php if ($_smarty_tpl->tpl_vars['orderDiscountPrice']->value=='0.00') {?>0.00<?php } else { ?>- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['orderDiscountPrice']->value;
}?></td>
					</tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['tipamount']!='0.00') {?>
					<tr>
						<td align="right" colspan="4">Tip</td>
						<td class="last align-right padright90"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['tipamount']->value;?>
</td>
					</tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_id']!=''&&$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']>0) {?>
						<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']!='0.00') {?>
						<tr>
							<td align="right" colspan="4">Voucher Discount Price</td>
							<td class="last align-right padright90">- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']);?>
</td>
						</tr>
						<?php }?>
					<?php }?>
					<tr>
						<td align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_menufinaltot'];?>
</td>
						<td class="last align-right padright90"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</td>
					</tr>
				</table>
			</div>
			<?php }?>
			
			
		</div>
</div><br /><br />



<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
    
    var finalorderid = $(".finalorderid").html();  
    callorderprocess(finalorderid);  
});
<?php echo '</script'; ?>
>

<!--Customer Forget Password -->
<div id="printer_respone" style="display:none;">
	<div class="addtoCartInner">
		<div class="customaddtocartPopupHead">
			<h1 class="addtocartPopupHeadNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_order_ack'];?>
</h1>
			<div class="addtoCartClose" onclick="myPopupWindowClose('#printer_respone');"></div>
		</div>
		<div class="customaddtocartPopup">
			<div class="customaddtocartWrap">
				<div class="contain center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_request_is_processed'];?>
.</div>
				<div class="contain center"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/loader.gif" alt="" title="" /></div>
				<div class="contain center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_order_is_under_ack'];?>
</div>
				<div class="contain center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['thank_please_wait'];?>
....</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
