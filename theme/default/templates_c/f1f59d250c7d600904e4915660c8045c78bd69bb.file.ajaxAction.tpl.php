<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 19:22:56
         compiled from "C:\wamp\www\theme\default\templates\ajaxAction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16292584dfae16cf560-36067452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1f59d250c7d600904e4915660c8045c78bd69bb' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\ajaxAction.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16292584dfae16cf560-36067452',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_584dfae3cd40e6_29728354',
  'variables' => 
  array (
    'action' => 0,
    'LANG' => 0,
    'customerFavoritesList' => 0,
    'i' => 0,
    'SITE_IMAGE_URL' => 0,
    'SITE_LOGO' => 0,
    'SITE_NAME' => 0,
    'orderDetails' => 0,
    'gprsoption' => 0,
    'cartDetails' => 0,
    'currency' => 0,
    'subtotal' => 0,
    'salestax' => 0,
    'taxamount' => 0,
    'deliverytype' => 0,
    'deliverycharge' => 0,
    'tipamount' => 0,
    'orderDiscountPrice' => 0,
    'total' => 0,
    'restaurantname' => 0,
    'selectmenuDetails' => 0,
    'menuDetails' => 0,
    'menuid' => 0,
    'getcategory_option' => 0,
    'objSearchDetails' => 0,
    'pizzasizelist' => 0,
    'menuaddonslistNew' => 0,
    'menuSubaddonslistNew' => 0,
    'pizza_price_size' => 0,
    'objSite' => 0,
    'sliceaddonprice_val' => 0,
    'QUANTITY_LIST' => 0,
    'menuaddonslist' => 0,
    'menuSubaddonslist' => 0,
    'menuaddonslist_cnt' => 0,
    'menuSubaddonslist_cnt' => 0,
    'resid' => 0,
    'offer' => 0,
    'offervalue' => 0,
    'rest_offer_percentage' => 0,
    'minorderprice' => 0,
    'selectCityList' => 0,
    'customerprofiledetails' => 0,
    'showZiplist' => 0,
    'restaurant_reviews' => 0,
    'reviews' => 0,
    'allrestaurantList' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'res_order' => 0,
    'customerAddress' => 0,
    'showStatelist' => 0,
    'objCustomer' => 0,
    'customeraddress' => 0,
    'customerDetails' => 0,
    'customerOrderList' => 0,
    'restaurant_address_map' => 0,
    'restaurantDetailsList' => 0,
    'times' => 0,
    'timelist' => 0,
    'rndnumber' => 0,
    'cartDetailsCnt' => 0,
    'restaurantseourl' => 0,
    'restaurant_streetaddress' => 0,
    'deliveryoption' => 0,
    'voucher' => 0,
    'voucherMsg' => 0,
    'voucherPrice' => 0,
    'yelp_reviews' => 0,
    'CartCount' => 0,
    'restaurants' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584dfae3cd40e6_29728354')) {function content_584dfae3cd40e6_29728354($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\includes\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include 'C:\\wamp\\www\\includes\\smarty\\plugins\\modifier.replace.php';
?><meta http-equiv="content-type" content="text/html;charset=utf-8" />


                    

<?php if ($_smarty_tpl->tpl_vars['action']->value=="customerFavStatus") {?>
	<div class="detailsInnerNewWrap">
		<div class="ordersInnerWrap">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="orderInnerHead">
					<td class="orderHeading" width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_sno'];?>
</td>
					<td class="orderHeading" width="50%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_resname'];?>
</td>
					<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_adddate'];?>
</td>
					<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_action'];?>
</td>
				</tr>
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['name'] = "cus_fav";
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customerFavoritesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_fav"]['total']);
?>
				<tr class="orderInnerCont">
					<td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
					<td><a href="restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_id'];?>
&resname=<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_seourl'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_name']);?>
</a></td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['adddate'],"%a %e,%Y %H:%M");?>
</td>
					<td><a href="javascript:void(0);" onclick="changeStatusOptionFav('delete','<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['id'];?>
','favorite');"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.jpg" alt="" title="" /></a></td>
				</tr>
				<?php endfor; else: ?>
				<tr><td class="red" colspan="4" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_norecord'];?>
</td></tr>
				<?php endif; ?>
			</tbody>
		</table>		
		</div>			
	</div>
<?php }?>

<!-- Order Full details POPUP -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="orderFullDetails") {?>
	<div class="container" id="logoimg" style="display:none">
		<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" />
	</div>
	<div class="popTxtarea1Inner1MyAcc">
		<a class="pdf" href="viewfullDetailsPDF.php?orderid=<?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderid'];?>
" target="_blank" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdwnformat'];?>
</a>
		<a class="print" href="javascript:void(0);" onclick="print();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewprint'];?>
</a>
		
	</div>
	<div class="frt"><a href="javascript:void(0);" class="backHistTxt"  onclick="backHistory();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_back_history'];?>
</a></div>
	<div class="addtoCartInner">
		<div class="thanksTableOrderNew1">
			<span class="orderNewPopHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewordernumber'];?>
 : <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</span>
			<span class="orderNewPopsubHead"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderat'];?>
: </b><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate'];?>
 </span>
			<span class="orderNewPopsubHead"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewstatus'];?>
: </b><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {
echo $_smarty_tpl->tpl_vars['LANG']->value['cus_delivered'];
} else {
echo ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']);
}?></span>
            <?php if ($_smarty_tpl->tpl_vars['gprsoption']->value=='Yes') {?>
                <span class="orderNewPopsubHead"><b>Order is sent to Printer: </b><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_sent']);?>
</span>
                <span class="orderNewPopsubHead"><b>Printer received or not the order: </b><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_response']);?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_ack']!='') {?>
                    <span class="orderNewPopsubHead"><b>Printer acknowledgement: </b><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_ack']);?>
</span>
                <?php }?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {?>
            <span class="orderNewPopsubHead"><b>Food Ready/Deliver Time: </b><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_res_deli_time']);?>
</span>
            <?php } elseif ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='failed') {?>
            <span class="orderNewPopsubHead"><b>Reason: </b><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_ack_msg']);?>
</span>
            <?php }?>
			<!--<input type="button" class="addtoNotebtn1" value="Edit" />-->
		</div>
		<div class="tablecontainer">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr class="orderInnerHead">
					<th class="orderHeading" width="10%">S No</th>
					<th class="orderHeading" width="35%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewmenuname'];?>
</th>
					
					<th class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewquantity'];?>
</th>
					<th class="orderHeading" width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewprice'];?>
</th>
					<th class="orderHeading center" width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewtotalprice'];?>
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
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ord']['rownum'];?>
</td>
					<td>
					<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuname']));?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size'];?>
)<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?> <br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_addons'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']);
}?>
					<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_crustname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_crust'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_crustname']);
}?>
					<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_addonsname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_topping'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_addonsname']);
}?>
					<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['specialinstruction']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_inst'];?>
:</b><?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['specialinstruction']);
}?>
					</td>
					
					<td><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['quantity'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuprice'];
if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsprice'];?>
 Extra )<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['tot_menuprice'];?>
</td>
				</tr>				
				<?php endfor; endif; ?>
				<tr>
					<td   align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewsubtotal'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
				</tr>
				 <?php if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00'&&$_smarty_tpl->tpl_vars['salestax']->value!='') {?>
				<tr>
					<td align="right" colspan="4">Tax <?php if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00') {?>(<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['salestax']->value);?>
 %)<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['taxamount']->value;?>
</td>
				</tr>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['deliverytype']->value!='pickup') {?>
				<tr>
					<td  align="right"  colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdeliverycharge'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['deliverycharge']->value=='0.00') {?>0.00<?php } else {
echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['deliverycharge']->value;
}?></td>
				</tr>
				<?php }?>
			   
				<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['tipamount']!='0.00'&&$_smarty_tpl->tpl_vars['orderDetails']->value[0]['tipamount']!='') {?>
				<tr>
					<td  align="right" colspan="4">Tip</td>
					<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['tipamount']->value;?>
</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue']!='') {?>
				<tr>
					<td  align="right" colspan="4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdiscount'];?>
(<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue']);?>
 % Off)</td>
					<td><?php if ($_smarty_tpl->tpl_vars['orderDiscountPrice']->value=='0.00') {?>0.00<?php } else { ?> - <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['orderDiscountPrice']->value;
}?></td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_id']!=''&&$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']>0) {?>
					<tr>
						<td   align="right" colspan="4">Voucher Discount Price</td>
						<td>- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']);?>
</td>
					</tr>
				<?php }?>
				<tr>
					<td  align="right" colspan="4"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewtotal'];?>
</b></td>
					<td><b><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</b></td>
				</tr>
			</table>
		</div>
		<div class="addtoCartInner">
			<div class="col-sm-6">
				<h1 class="viewDetailHead">Order Detail</h1>
				<ul class="thanksUlNew1MyAcc">
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewrestaurant'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo $_smarty_tpl->tpl_vars['restaurantname']->value;?>
</span>
					</li>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewordernumber'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</span>
					</li>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewordertype'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']));?>
</span>
					</li>
					<?php if ($_smarty_tpl->tpl_vars['deliverytype']->value!='pickup') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdeliverytime'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['foodassoonas']=='1') {
echo $_smarty_tpl->tpl_vars['LANG']->value['as_soon_as'];
} else {
echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydate'];?>
, &nbsp; <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytime'];
}?></span>
					</li>
					<?php }?>
					<!--<li>
							<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderstatus'];?>
 :</span>
							<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['status'];?>
</span>
						</li>
						<li>
							<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderdate'];?>
 :</span>
							<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate'];?>
</span>
						</li> -->
					
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewpaymentmethod'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='cod') {
echo $_smarty_tpl->tpl_vars['LANG']->value['cash_on_del'];
} else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']));
}?></span>
					</li>
					<li>
						<span class="name">Payment Status</span>
						<span class="col">:</span>
						<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_status']=='P') {?>Paid<?php } else { ?>Not Paid<?php }?></span>
					</li>
                    <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='paypal'||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='creditcard') {?>
                    <li>
						<span class="name">Transaction Id</span>
                        <span class="col">:</span>
						<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['transaction_id'];?>
</span>
					</li>
                    <?php }?>
					<li>
						<span class="name">Order Status</span>
						<span class="col">:</span>
						<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {
echo $_smarty_tpl->tpl_vars['LANG']->value['cus_delivered'];
} else {
echo ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']);
}?></span>
					</li>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']!='') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewyourindtruction'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']));?>
</span>
					</li>
					<?php }?>
				</ul>
			</div>
			<div class="col-sm-6">
				<h1 class="viewDetailHead">Customer Detail</h1>
				<ul class="thanksUlNew1MyAcc">
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewcustomername'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customername']));?>
</span>
					</li>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewcustomeremail'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customeremail']);?>
</span>
					</li>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewphonenumber'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customercellphone']));?>
</span>
					</li>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydoornumber']!='') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewapt'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydoornumber']));?>
</span>
					</li>
					<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystreet']!='') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewstreet'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystreet']));?>
</span>
					</li>
                    <?php }?>
					
                    <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverycity']!='') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewcity'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverycity']));?>
</span>
					</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystate']!='') {?>
                    <li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewstate'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystate']));?>
</span>
					</li>
                    <?php }?>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip']!='') {?>
					<li>
						<span class="name">Zip Code</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip']);?>
</span>
					</li>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverylandmark']!='') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewlandmark'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverylandmark']));?>
</span>
					</li>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlandline']!='') {?>
					<li>
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewlandline'];?>
</span>
						<span class="col">:</span>
						<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlandline']));?>
</span>
					</li>
					<?php }?>
				</ul>
			</div>
			<!--<div class="popTxtarea1Inner span4">
				<h1 class="popTxtarea1Head"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewyourindtruction'];?>
</h1>
				<textarea rows="" cols="" class="popTxtarea1"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']));?>
</textarea>
			</div>-->
		</div>
	</div>
<?php }?>

                        


                        

<!-- Category Menu List -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="CategoryMenu") {?>
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="searchMenuItems") {?>
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    
    <?php echo '<script'; ?>
 type="text/javascript">
    	//execute();
    	$(".accordion h1:first").removeClass("active");
    	    $(".accordion div.new:not(:first)").show();
    	
    	    $(".accordion h1").click(function(e){ 
    		e.preventDefault(); 
    		$(this).next("div.new").slideToggle("fast")
    		.siblings("div.new:visible").slideUp("fast");
    		$(this).toggleClass("active");
            });
            $(".close").click(function(e){
            e.preventDefault();
               	var id=$(this).attr("id");
    			$("."+id).slideUp("fast");
    			$("."+id).prev("h3").removeClass("active");
    	    });  
    <?php echo '</script'; ?>
>
        
<?php }?>
<!-- Select option List-->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="selectOptionMenuList") {?>
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<!-- Category Veg Menu List -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="vegCategoryMenu") {?>
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu_veg_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<!-- Category  Non Veg Menu List -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="nonvegCategoryMenu") {?>
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu_nonveg_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>




<?php if ($_smarty_tpl->tpl_vars['action']->value=="orderPopup") {?>
    <?php $_smarty_tpl->tpl_vars['menuDetails'] = new Smarty_variable($_smarty_tpl->tpl_vars['selectmenuDetails']->value, null, 0);?>
    
   
	<!-- Add to Cart Menu details POPUP -->
	<input type="hidden" name="menuprice" id="menuprice" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_price'];?>
" />
	<input type="hidden" name="menuid" id="menuid" value="<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
" />
	<input type="hidden" name="restid" id="restid" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['restaurant_id'];?>
" />
	<input type="hidden" name="resname" id="resname" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['restaurant_seourl'];?>
" />

	<div class="addtocartWrapNew1">
		<div class="carthead">
            <h1><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_name']));?>
</h1>
            <div class="addtoCartClose" data-dismiss="modal"></div>
        </div>
		
		<form name="orderpop" action="" method="post"> 
		<div class="addTableCart">
		    <div class="pizza_prize_size_new">
                <input type="hidden" name="pizzasliceprice_position" id="pizzasliceprice_position" value="0" />
				<input type="hidden" id="sizeoption" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption'];?>
" />
				<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='size') {?>
					<input type="hidden" id="pizzasmall" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_small'];?>
" />
					<input type="hidden" id="pizzamedium" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_medium'];?>
" />
					<input type="hidden" id="pizzalarge" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_large'];?>
" />
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
						<div class="addTableCartRightPop">
							
							<!--For All category -->
							<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_small']!='') {?>
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_small" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_small_value'];?>
" checked="checked" class="popNameInput" onclick="pizzaSize_Price('size_small',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_small']);?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_small_value'];?>
)</span></span><?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_medium']!='') {?>
							<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_medium" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_medium_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_small']=='') {?>checked="checked"<?php }?> class="popNameInput" onclick="pizzaSize_Price('size_medium',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_medium']);?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_medium_value'];?>
) </span></span><?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_large']!='') {?>
							<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_large" value="<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_large_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_small']==''&&$_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_medium']=='') {?> checked="checked"<?php }?> class="popNameInput" onclick="pizzaSize_Price('size_large',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_size_large']);?>
(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['pizza_large_value'];?>
)</span></span><?php }?>
							
						</div>
					</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='fixed') {?> 
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
						<div class="addTableCartRightPop"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_price'];?>
</div>
					</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='slice') {?>
										
					<?php $_smarty_tpl->tpl_vars["pizzasizelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeList($_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_category'],$_smarty_tpl->tpl_vars['getcategory_option']->value,$_smarty_tpl->tpl_vars['menuid']->value), null, 0);?>
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
						<div class="addTableCartRightPop">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['size'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['size']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['name'] = 'size';
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzasizelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total']);
?>						
							<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['size']['index']==0) {?>checked="checked"<?php }?> onchange="pizzaSlize_PriceperIndex(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
,<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
)" /><span class="addonsName"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_name']));?>
( <?php echo $_smarty_tpl->tpl_vars['currency']->value;
echo $_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_price'];?>
 )</span></div>
						<?php endfor; endif; ?>
						</div>
					</div>
                    <?php } else { ?>
                     Menu not available					
				<?php }?>
				
				
				<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_addons']=='Yes') {?>
                    <?php if (count($_smarty_tpl->tpl_vars['objSearchDetails']->value->menuAddonsList($_smarty_tpl->tpl_vars['menuid']->value,$_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_category']))>0) {?>
					<?php $_smarty_tpl->tpl_vars["menuaddonslistNew"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->menuAddonsList($_smarty_tpl->tpl_vars['menuid']->value,$_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_category']), null, 0);?>
					<input type="hidden" name="addonstype1" class="addonstype1" id="addonstype1" value="<?php if (count($_smarty_tpl->tpl_vars['menuaddonslistNew']->value)>0) {
echo count($_smarty_tpl->tpl_vars['menuaddonslistNew']->value);
}?>" />
					<?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value>0) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['add'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['add']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['name'] = 'add';
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuaddonslistNew']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total']);
?>
							<?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']!='') {?>
								<div class="addtoCartInBorder">
									<div class="addTableCartLeftPop"><span class="width60"><?php echo stripslashes($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']);?>
</span>
                                        <!--Subaddons Reset Button-->
                                        <?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>
                                            <input type="button" name="reset" value="Remove" onclick="return uncheckSingleAddon('<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_id'],' ','_');
echo $_smarty_tpl->getVariable('smarty')->value['section']['add']['index'];?>
');" class="removeBtn pull-right"/>
                                        <?php }?>
                                    </div>
									<div class="addTableCartRightPop <?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>newminht<?php }?>">
										<div class="contain1">
											<?php $_smarty_tpl->tpl_vars["menuSubaddonslistNew"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->menuSubAddonsList($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'],$_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_menuid'],$_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_category'],$_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_addonsname'],$_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menu_catoption']), null, 0);?>
											<!-- Multiple Addons-->	
                                           															
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['name'] = 'subadd';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subadd']['total']);
?>
												<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']!='') {?>
												<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']!='slice') {?>
												    <?php $_smarty_tpl->tpl_vars['pizza_price_size'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->showPizzaPriceperSize('size_small',$_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'],$_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'],$_smarty_tpl->tpl_vars['menuid']->value), null, 0);?>
                                                <?php }?>
													<?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>
													<input type="hidden" name="singleopt" class="singleopt" id="singleopt" value="single" />
														<div class="madInputPopup single"><input class="flt <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_id'],' ','_');
echo $_smarty_tpl->getVariable('smarty')->value['section']['add']['index'];?>
" type="radio" class="addo" name="addonstype_<?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname'];?>
" id="addonstypee_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value);?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'];?>
"  />
															<span class="addonsName">&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']));?>
 
															<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
																<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																	&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pizza_price_size']->value;?>
 ) 
																<?php }?>
															<?php } else { ?>
																<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																	&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 
																<?php $_smarty_tpl->tpl_vars["sliceaddonprice_val"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice_OrderPop($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_price_slice'],0), null, 0);?>
																
																	<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sliceaddonprice_val']->value);?>
 )
																<?php }?>
															<?php }?>
															</span>
														</div>
													<?php }?>
													
													<?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']!='1') {?>													
														<input type="hidden" name="multipleopt" class="multipleopt" id="multipleopt" value="multiple" />	
														<div class="madInputPopup">
                                                        
                                                        <input class="flt <?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'];?>
_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value);?>
_<?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
" type="checkbox" name="addonstype" id="<?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'];?>
_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value);?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']>0) {?>onclick="clickCheckedBox(this.id,'<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value);?>
','<?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
','<?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'];?>
_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value);?>
_<?php echo $_smarty_tpl->tpl_vars['menuaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
');"<?php }?> />
															<span class="addonsName">&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']));?>
 
															<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']!='slice') {?>
																<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?>
																	&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pizza_price_size']->value;?>
  )  
																<?php }?>
															<?php } else { ?>
																<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																	&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
  
																<?php $_smarty_tpl->tpl_vars["sliceaddonprice_val"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice_OrderPop($_smarty_tpl->tpl_vars['menuSubaddonslistNew']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_price_slice'],0), null, 0);?>
																
																	<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sliceaddonprice_val']->value);?>
 )
																<?php }?>
															<?php }?>
															</span>
														</div>
													<?php }?>
													
												<?php }?>
											<?php endfor; endif; ?>
										</div>
									</div>
								</div>
							<?php }?>
						<?php endfor; endif; ?>
					<?php }?>
                    <?php }?>
				<?php }?>
			</div>	
			
			<!--<div class="addtoCartInBorder">
					<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_addon'];?>
</div>
					<div class="addTableCartRightPop"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_price'];?>
</div>
			</div> -->				
			<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='fixed'||$_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='size'||$_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='slice') {?>
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_qty'];?>
</div>
				<div class="addTableCartRightPop">
					<select class="addtocartSelect2" name="qty" id="qty">
						<?php echo $_smarty_tpl->tpl_vars['QUANTITY_LIST']->value;?>

					</select>
				</div>
			</div>
            <?php }?>
			<?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_spl_instruction']=='Yes') {?>
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_spl_ins'];?>
</div>
				<div class="addTableCartRightPop">
					<textarea rows="" cols="" class="addtocartTxtarea" name="splins" id="splins" ></textarea>
					<div class="addChargesApply"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_spl_ins_desc1'];?>
</div>
					<div class="addChargesApply"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_spl_ins_desc2'];?>
</div>
				</div>
			</div>
			<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='fixed'||$_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='size'||$_smarty_tpl->tpl_vars['menuDetails']->value[0]['sizeoption']=='slice') {?>
			<div class="addtocartButton" id="buttonwidth">
				<input type="button" onclick="addToMenu();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_addtocart'];?>
" data-dismiss="modal" />
			</div>
            <?php }?>
		</div>
		</form>
	</div>
	
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="showPizzaPriceSize_new") {?>
    
    <input type="hidden" name="pizzasliceprice_position" id="pizzasliceprice_position" value="" />
    <input type="hidden" id="sizeoption" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption'];?>
" />
	<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']=='size') {?>
		<input type="hidden" id="pizzasmall" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small'];?>
" />
		<input type="hidden" id="pizzamedium" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium'];?>
" />
		<input type="hidden" id="pizzalarge" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_large'];?>
" />
		<div class="addtoCartInBorder">
			<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
			<div class="addTableCartRightPop">
				<!--For All category -->
                <!-- Small -->
				<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']!='') {?>
					<span class="madInputPopup">
					     <input type="radio" name="pizza_size" id="size_small" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_small_value'];?>
" checked="checked" class="popNameInput" onclick="pizzaSize_Price('size_small',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']);?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_small_value'];?>
)</span>
                    </span>
                <?php }?>
				<!-- Medium -->
				<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium']!='') {?>
					<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_medium" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_medium_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']=='') {?>checked="checked"<?php }?> class="popNameInput" onclick="pizzaSize_Price('size_medium',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium']);?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_medium_value'];?>
) </span>
                    </span>
                <?php }?>
				<!-- large -->
				<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_large']!='') {?>
					<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_large" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_large_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']==''&&$_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium']=='') {?> checked="checked"<?php }?> class="popNameInput" onclick="pizzaSize_Price('size_large',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_large']);?>
(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_large_value'];?>
)</span>
                    </span>
                <?php }?>
				
			</div>
		</div>
	<?php } elseif ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']=='fixed') {?>
		<div class="addtoCartInBorder">
			<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
			<div class="addTableCartRightPop"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_price'];?>
</div>
		</div>
	<?php } else { ?>
							
		
		<?php $_smarty_tpl->tpl_vars['pizzasizelist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeList($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_category'],$_smarty_tpl->tpl_vars['getcategory_option']->value,$_smarty_tpl->tpl_vars['menuid']->value), null, 0);?>
		<div class="addtoCartInBorder">
			<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
			<div class="addTableCartRightPop">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["size"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['name'] = "size";
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzasizelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total']);
?>						
				<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['size']['index']==0) {?>checked="checked"<?php }?> onclick="pizzaSlize_PriceperIndex(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
,<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
)" /><span class="addonsName"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_name']));?>
( <?php echo $_smarty_tpl->tpl_vars['currency']->value;
echo $_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_price'];?>
 )</span></div>
			<?php endfor; endif; ?>
			</div>
		</div>					
	<?php }?>
    
     
    <?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_addons']=='Yes') {?>
    <?php $_smarty_tpl->tpl_vars["menuaddonslist"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->menuAddonsList($_smarty_tpl->tpl_vars['menuid']->value,$_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_category']), null, 0);?>
    <?php if (count($_smarty_tpl->tpl_vars['menuaddonslist']->value)>0) {?>					
    	
    	<input type="hidden" name="addonstype1" class="addonstype1" id="addonstype1" value="<?php echo count($_smarty_tpl->tpl_vars['menuaddonslist']->value);?>
" />
    	<?php if (count($_smarty_tpl->tpl_vars['menuaddonslist']->value)>0) {?>
    		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["add"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['name'] = "add";
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuaddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total']);
?>
    			<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']!='') {?>
    				<div class="addtoCartInBorder">
    					<div class="addTableCartLeftPop">
							<span class="width60"><?php echo stripslashes($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']);?>
</span>
							<!--Subaddons Reset Button-->
							<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>
								<input type="button" name="reset" value="Remove" onclick="return uncheckSingleAddon('<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_id'],' ','_');
echo $_smarty_tpl->getVariable('smarty')->value['section']['add']['index'];?>
');" class="removeBtn pull-right"/>
							<?php }?>
						</div>
                        
    					<div class="addTableCartRightPop <?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>newminht<?php }?>">
    						<div class="contain1">
                                <?php $_smarty_tpl->tpl_vars["menuSubaddonslist"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->menuSubAddonsList($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_menuid'],$_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_category'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_addonsname'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menu_catoption']), null, 0);?><!-- Multiple Addons-->																					
    							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['name'] = "subadd";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuSubaddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total']);
?>
    								<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']!='') {?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
    								    
                                        <?php $_smarty_tpl->tpl_vars["pizza_price_size"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->showPizzaPriceperSize($_REQUEST['pizza_size'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'],$_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'],$_smarty_tpl->tpl_vars['menuid']->value), null, 0);?>
                                    <?php }?>
                                    
    									<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>
    									<input type="hidden" name="singleopt" class="singleopt" id="singleopt" value="single" />
    										<div class="madInputPopup single"><input class="flt <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_id'],' ','_');
echo $_smarty_tpl->getVariable('smarty')->value['section']['add']['index'];?>
" type="radio" class="addo" name="addonstype_<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname'];?>
" id="addonstypee_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslist']->value);?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'];?>
"  />
    											<span class="addonsName">&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']));?>
 
    											<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
    												<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
    													&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pizza_price_size']->value;?>
 ) 
    												<?php }?>
    											<?php } else { ?>
    												<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
    													&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 
    												<?php $_smarty_tpl->tpl_vars["sliceaddonprice_val"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice_OrderPop($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_price_slice'],$_REQUEST['pos']), null, 0);?>
    												
    													<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sliceaddonprice_val']->value);?>
 )
    												<?php }?>
    											<?php }?>
    											</span>
    										</div>
    									<?php }?>
    									
    									<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']!='1') {?>													
    										<input type="hidden" name="multipleopt" class="multipleopt" id="multipleopt" value="multiple" />	
    										<div class="madInputPopup">
                                            
                                            <input class="flt <?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'];?>
_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslist']->value);?>
_<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
" type="checkbox" name="addonstype" id="<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'];?>
_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslist']->value);?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']>0) {?>onclick="clickCheckedBox(this.id,'<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslist']->value);?>
','<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
','<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'];?>
_<?php echo count($_smarty_tpl->tpl_vars['menuSubaddonslist']->value);?>
_<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
');"<?php }?> />
    											<span class="addonsName">&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']));?>
 
    											<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
    												<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?>
    													&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pizza_price_size']->value;?>
 )  
    												<?php }?>
    											<?php } else { ?>
    												<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
    													&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
  
    												<?php $_smarty_tpl->tpl_vars["sliceaddonprice_val"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice_OrderPop($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_price_slice'],$_REQUEST['pos']), null, 0);?>
    												
    													<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sliceaddonprice_val']->value);?>
 )
    												<?php }?>
    											<?php }?>
    											</span>
    										</div>
    									<?php }?>
    									
    								<?php }?>
    							<?php endfor; endif; ?>
    						</div>
    					</div>
    				</div>
    			<?php }?>
    		<?php endfor; endif; ?>
    	<?php }?>
        <?php }?>
    <?php }?>
    
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['action']->value=="showPizzaPriceSize") {?>
	<div class="pizza_prize_size">
	<!-- Add to Cart Menu details POPUP -->
	<input type="hidden" name="menuprice" id="menuprice" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_price'];?>
" />
	<input type="hidden" name="menuid" id="menuid" value="<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
" />
	<input type="hidden" name="restid" id="restid" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['restaurant_id'];?>
" />	
	<input type="hidden" name="pizzasliceprice_position" id="pizzasliceprice_position" value="" />
	
	
	<div class="addtocartWrapNew1">
	<h1 class="addtoCartMainhead"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_name']));?>
</h1>
		<form name="orderpop" action="" method="post"> 
		<div class="addTableCart">
				<input type="hidden" id="sizeoption" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption'];?>
" />
				<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']=='size') {?>
					<input type="hidden" id="pizzasmall" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small'];?>
" />
					<input type="hidden" id="pizzamedium" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium'];?>
" />
					<input type="hidden" id="pizzalarge" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_large'];?>
" />
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
						<div class="addTableCartRightPop">
							<!--For pizza Category only-->
							
							
							<!--For All Category-->
							<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']!='') {?>
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_small" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_small_value'];?>
" checked="checked" class="popNameInput" onclick="pizzaSize_Price('size_small',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']);?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_small_value'];?>
)</span></span><?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium']!='') {?>
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_medium" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_medium_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']=='') {?>checked="checked"<?php }?> class="popNameInput" onclick="pizzaSize_Price('size_medium',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium']);?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_medium_value'];?>
) </span></span><?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_large']!='') {?>
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_large" value="<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_large_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_small']==''&&$_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_medium']=='') {?> checked="checked"<?php }?> class="popNameInput" onclick="pizzaSize_Price('size_large',<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
);" /><span class="addonsName"><?php echo ucfirst($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_size_large']);?>
(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['pizza_large_value'];?>
)</span></span><?php }?>
						</div>
					</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']=='fixed') {?>
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
						<div class="addTableCartRightPop"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_price'];?>
</div>
					</div>
				<?php } else { ?>
										
					
					<?php $_smarty_tpl->tpl_vars["pizzasizelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeList($_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_category'],$_smarty_tpl->tpl_vars['getcategory_option']->value,$_smarty_tpl->tpl_vars['menuid']->value), null, 0);?>
					
					
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_price'];?>
</div>
						<div class="addTableCartRightPop">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["size"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['name'] = "size";
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzasizelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["size"]['total']);
?>
							<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['size']['index']==0) {?>checked="checked"<?php }?> onclick="pizzaSlize_PriceperIndex(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
,<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
,<?php echo $_REQUEST['resid'];?>
)" /><span class="addonsName"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_name']));?>
( <?php echo $_smarty_tpl->tpl_vars['currency']->value;
echo $_smarty_tpl->tpl_vars['pizzasizelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_price'];?>
 )</span></div>
						<?php endfor; endif; ?>
						</div>
					</div>					
				<?php }?>
				
				
				<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_addons']=='Yes') {?>		
                <?php if (count($_smarty_tpl->tpl_vars['objSearchDetails']->value->menuAddonsList($_smarty_tpl->tpl_vars['menuid']->value,$_smarty_tpl->tpl_vars['menuDetails']->value[0]['menu_category']))>0) {?>			
					<?php echo $_smarty_tpl->tpl_vars['objSearchDetails']->value->menuAddonsList($_REQUEST['menuid'],$_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_category']);?>

					<input type="hidden" name="addonstype1" class="addonstype1" id="addonstype1" value="<?php echo $_smarty_tpl->tpl_vars['menuaddonslist_cnt']->value;?>
" />
					
					<?php if ($_smarty_tpl->tpl_vars['menuaddonslist_cnt']->value>0) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["add"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['name'] = "add";
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuaddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["add"]['total']);
?>
							<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']!='') {?>
								<div class="addtoCartInBorder">
									<div class="addTableCartLeftPop"><?php echo stripslashes($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']);?>
</div>
									<div class="addTableCartRightPop">
										<div class="contain1">
											
											<?php echo $_smarty_tpl->tpl_vars['objSearchDetails']->value->menuSubAddonsList($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_menuid'],$_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_category'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menuaddons_addonsname'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['menu_catoption']);?>

											<!-- Multiple Addons-->
											
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['name'] = "subadd";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuSubaddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subadd"]['total']);
?>
												<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']!='') {?>
												
												<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
												<?php echo $_smarty_tpl->tpl_vars['objSearchDetails']->value->showPizzaPriceperSize($_REQUEST['pizza_size'],$_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonparentid'],$_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id']);?>
		
												<?php }?>
																						
													<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']=='1') {?>
													<input type="hidden" name="singleopt" class="singleopt" id="singleopt" value="single" />
														<div class="madInputPopup single"><input class="flt" type="radio" class="addo" name="addonstype_<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname'];?>
" id="addonstypee_<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist_cnt']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum']=='1') {?>checked="checked"<?php }?> />
															<span class="addonsName">&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']));?>

																<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
																	<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																		&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pizza_price_size']->value;?>
 ) 
																	<?php }?>
																<?php } else { ?>
																	
																	<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																	&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 
																
																	<?php $_smarty_tpl->tpl_vars["sliceaddonprice_val"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice_OrderPop($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_price_slice'],$_REQUEST['pos']), null, 0);?>
																	
																	<?php echo $_smarty_tpl->tpl_vars['sliceaddonprice_val']->value;?>
 )
																	<?php }?>
																<?php }?>
															</span>
														</div>
													<?php }?>
													
													<?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']!='1') {?>													
														<input type="hidden" name="multipleopt" class="multipleopt" id="multipleopt" value="multiple" />	
														<div class="madInputPopup"><input class="flt <?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
','<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']),' ','_');?>
_<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist_cnt']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
" type="checkbox" name="addonstype" id="<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']),' ','_');?>
_<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist_cnt']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subadd']['rownum'];?>
" <?php if ($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt']>0) {?>onclick="clickCheckedBox(this.id,'<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist_cnt']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
','<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
','<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsname']),' ','_');?>
_<?php echo $_smarty_tpl->tpl_vars['menuSubaddonslist_cnt']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['menuaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['mainaddonsnamecnt'];?>
');"<?php }?> />
															<span class="addonsName">&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['subaddonsname']));?>
 
																<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['sizeoption']!='slice') {?>
																	<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																		&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pizza_price_size']->value;?>
 )  
																	<?php }?>
																<?php } else { ?>
																	<?php if ($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_priceoption']=='Paid') {?> 
																	&nbsp;( <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 
																	<?php $_smarty_tpl->tpl_vars["sliceaddonprice_val"] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice_OrderPop($_smarty_tpl->tpl_vars['menuSubaddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subadd']['index']]['menuaddons_price_slice'],$_REQUEST['pos']), null, 0);?> 
																	
																	<?php echo $_smarty_tpl->tpl_vars['sliceaddonprice_val']->value;?>
 )
																	<?php }?>
																<?php }?>
															</span>
														</div>
													<?php }?>													
												<?php }?>
											<?php endfor; endif; ?>
										</div>
									</div>
								</div>
							<?php }?>
						<?php endfor; endif; ?>
					<?php }?>
				<?php }?>	
                <?php }?>			
				
			
			<!--<div class="addtoCartInBorder">
					<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_addon'];?>
</div>
					<div class="addTableCartRightPop"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_price'];?>
</div>
			</div> -->				
			
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_qty'];?>
</div>
				<div class="addTableCartRightPop">
					<select class="addtocartSelect2" name="qty" id="qty">
						<?php echo $_smarty_tpl->tpl_vars['QUANTITY_LIST']->value;?>

					</select>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['selectmenuDetails']->value[0]['menu_spl_instruction']=='Yes') {?>
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_spl_ins'];?>
</div>
				<div class="addTableCartRightPop">
					<textarea rows="" cols="" class="addtocartTxtarea" name="splins" id="splins" ></textarea>
					<div class="addChargesApply"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_spl_ins_desc1'];?>
</div>
					<div class="addChargesApply"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_spl_ins_desc2'];?>
</div>
				</div>
			</div>
			<?php }?>
			<div class="addtocartButton" id="buttonwidth">
				<input type="button" onclick="addToMenu();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_addtocart'];?>
"/>
			</div>
		</div>
		</form>
	</div>
	</div>

<?php }?>



<?php if ($_smarty_tpl->tpl_vars['action']->value=="offerItem") {?>
<!--<input type="hidden" name="resid" id="resid" value="<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
"/>
<input type="hidden" name="offer" id="offer" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value;?>
" />

	<?php if ($_smarty_tpl->tpl_vars['offervalue']->value>0) {?>
	<ul class="detRiteTotalCont1Ul">
		<li>
			<label class="txt1">Discount(<?php echo $_smarty_tpl->tpl_vars['rest_offer_percentage']->value;?>
 % Off):</label>
			<label class="total1"><?php if ($_smarty_tpl->tpl_vars['offervalue']->value!='') {
echo $_smarty_tpl->tpl_vars['offervalue']->value;
} else { ?>0.00<?php }?></label>
		</li>
	</ul>
	<?php }?>
	
	<ul class="detRiteTotalCont1Ul">
			<li>
				<label class="txt1"><b>Total:</b></label>
				<label class="total1"><b><?php if ($_smarty_tpl->tpl_vars['total']->value!='') {
echo $_smarty_tpl->tpl_vars['total']->value;
} else { ?>0.00<?php }?></b></label>
			</li>
	</ul>-->
<?php }?>

<!-- Add To Cart Menu -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="userMenuOrderList") {?>
<input type="hidden" name="resid" id="resid" value="<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
"/>
<input type="hidden" name="minimumorder" id="minimumorder" value="<?php echo $_smarty_tpl->tpl_vars['minorderprice']->value;?>
"/>
<input type="hidden" name="total" id="totalprice" value="<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
"/>
<input type="hidden" name="offer" id="offer" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value;?>
" />

	<?php echo $_smarty_tpl->getSubTemplate ('cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
	
	<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		//execute();
	 $(".detRiteNewCont1Ul li.item .contNew1").click(function(){
    	$(this).toggleClass("active");
    	$(this).parent().parent().next().toggle();
   	 });
    });	
	 <?php echo '</script'; ?>
>
	 
<?php }?>



<!-- *************************************customer signup state,city,zip************************************ -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCusCityList") {?>
	<select name="customer_city" id="customer_city" class="form-control" >
		<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_select'];?>
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
" <?php if ($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['city_id']==$_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_city']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['cityname']);?>
</option>
		<?php endfor; endif; ?>
	</select>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCusCityListAdd") {?>
	<select name="customer_city" id="customer_city_new" class="form-control" >
		<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_select'];?>
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
" <?php if ($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['city_id']==$_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_city']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['cityname']);?>
</option>
		<?php endfor; endif; ?>
	</select>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCusAreaList") {?>
	<!-- Zipcode List from Customer -->
	<select name="customer_zip" class="form-control" id="customer_zip">
	<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_select'];?>
</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['name'] = 'zip';
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showZiplist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total']);
?>		
			<option value="<?php echo $_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id']==$_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_zip']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode']);?>
- <?php echo stripslashes($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['areaname']);?>
</option>
		<?php endfor; endif; ?>
	</select>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCusAreaListAdd") {?>
	<!-- Zipcode List from Customer -->
	<select name="customer_zip" class="form-control" id="customer_zip_new">
	<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_select'];?>
</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['name'] = 'zip';
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showZiplist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total']);
?>		
			<option value="<?php echo $_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id']==$_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_zip']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode']);?>
- <?php echo stripslashes($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['areaname']);?>
</option>
		<?php endfor; endif; ?>
	</select>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCusCityListcheck") {?>
	<select name="deliverycity" id="deliverycity" class="form-control" >
		<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_select'];?>
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
" <?php if ($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['city_id']==$_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_city']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['cityname']);?>
</option>
		<?php endfor; endif; ?>
	</select>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCusZipListcheck") {?>
	<!-- Zipcode List from Customer -->
	<select name="deliveryzip" class="form-control" id="deliveryzip">
	<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_select'];?>
</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['name'] = 'zip';
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showZiplist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total']);
?>		
			<option value="<?php echo $_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id']==$_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_zip']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode']);?>
- <?php echo stripslashes($_smarty_tpl->tpl_vars['showZiplist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['areaname']);?>
</option>
		<?php endfor; endif; ?>
	</select>
<?php }?>


<!-- Organize Reviews List -->
<?php if ($_smarty_tpl->tpl_vars['action']->value=="reviewOrganize") {?>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["review"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['name'] = "review";
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurant_reviews']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total']);
?>
		<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['section']['review']['rownum'])) {?>
	      	<?php $_smarty_tpl->tpl_vars["reviews"] = new Smarty_variable("cont_review_head_left1", null, 0);?>
	  	<?php } else { ?>
	  		<?php $_smarty_tpl->tpl_vars["reviews"] = new Smarty_variable("cont_review_head_left2", null, 0);?>
	  	<?php }?>
		<div class="<?php echo $_smarty_tpl->tpl_vars['reviews']->value;?>
">
				<div class="upDownImg">
					<?php if ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='5'||$_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='4'||$_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='3') {?>
					<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/hand1.png" />
					<?php } else { ?>
					<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/hand2.png" />
					<?php }?>
				</div>
				<div class="likeText">
					<span class="cont_review_para"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['message']));?>
</span>
					<span class="cont_review_star1">
					<?php if ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='1') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/single-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='2') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/double-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='3') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/triple-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='4') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/four-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='5') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/five-star.png" /> 
					<?php }?>
					</span>
					<span class="cont_review_post"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_posted_by'];?>
<b><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['customername']));?>
</b> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_on'];?>
 <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['addeddate'],"%d/%m/%Y");?>
</b></span>
				</div>
			</div>
	<?php endfor; else: ?>
		<div style="color:red;margin-left:150px;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_no_review'];?>
</div>
	<?php endif; ?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="viewRestaurantNamewise") {?>

<ul class="byLocCityUl">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['name'] = "allres";
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allrestaurantList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["allres"]['total']);
?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['allrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allres']['index']]['restaurant_id'];?>
&resname=<?php echo $_smarty_tpl->tpl_vars['allrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allres']['index']]['restaurant_seourl'];
} else { ?>menu/<?php echo $_smarty_tpl->tpl_vars['allrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allres']['index']]['restaurant_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['allrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allres']['index']]['restaurant_seourl'];
}?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['allrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allres']['index']]['restaurant_name']));?>
 </a></li>
	<?php endfor; else: ?>
		<span style="color:red;"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_no_rec_found'];?>
 </span>
	<?php endif; ?>
</ul>

<?php }?>




<?php if ($_smarty_tpl->tpl_vars['action']->value=="check_printer_response") {?>
	
	<div class="addtoCartInner">
		<div class="customaddtocartPopupHead">
			<h1 class="addtocartPopupHeadNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_order_ack'];?>
</h1>
			<div class="addtoCartClose" onclick="myPopupWindowClose('#printer_respone');"></div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['res_order']->value[0]['printer_response']=="Y") {?>
		<div class="customaddtocartPopup" style="min-height: 150px;">
			<?php if ($_smarty_tpl->tpl_vars['res_order']->value[0]['printer_ack']=='accepted'||$_smarty_tpl->tpl_vars['res_order']->value[0]['printer_ack']=='Accepted') {?>
			<div class="customaddtocartWrap">
				<div style="float:left;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_your_order'];?>
: <?php echo smarty_modifier_date_format(time());?>
 <?php echo $_smarty_tpl->tpl_vars['res_order']->value[0]['printer_res_deli_time'];?>
</div>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['res_order']->value[0]['printer_ack']=='rejected'||$_smarty_tpl->tpl_vars['res_order']->value[0]['printer_ack']=='Rejected') {?>
			<div class="customaddtocartWrap">
				<div style="float:left;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_your_order_rejected'];
echo $_smarty_tpl->tpl_vars['res_order']->value[0]['printer_ack_msg'];?>
.</div>
			</div>
			<?php } else { ?>
			<div class="customaddtocartWrap">
				<div style="float:left;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_your_order_failed'];?>
.</div>
			</div>
			<?php }?>
		</div>
		<?php } else { ?>
		<div class="customaddtocartPopup">
			<div class="customaddtocartWrap">
				<div style="float:left;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_your_request_being'];?>
.</div>
				<div style="float:right;"><img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/loader.gif" /></div><br /><br />
				<p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_order_is_under_ack'];?>
</p><br />
				<p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_please_wait'];?>
....</p>
			</div>
		</div>
		<?php }?>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='Address_Book') {?>

	<?php echo $_smarty_tpl->getSubTemplate ("customerMyaccount_addressBook_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='customerUpdatePrimary') {?>

	<?php echo $_smarty_tpl->getSubTemplate ("customerMyaccount_addressBook_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='AddNewAddress') {?>

	<?php echo $_smarty_tpl->getSubTemplate ("customerMyaccount_addressBook_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=='EditAddress') {?>
	
    <div class="MyAccountBg clearfix">
		<h1 class="MyAccountBgHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_edit_your_address'];?>
</h1>
		<div class="mandatoryField"><a class="addressbook-lnk" href="javascript:void(0);" onclick="return backtolist();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i> Address List</a></div>
	
	<div class="clr"></div>
    <div class="myAccInnerBg clearfix form-horizontal">
    	<div class="form-group">
	    	<div class="col-sm-4 col-sm-offset-4">
				<div class="mandatoryField">
					<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
					- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_Mandatory'];?>

				</div>
			</div>
		</div>
		<div class="form-group">
	    	<div class="col-sm-6 col-sm-offset-4">
				<span class="myAddressEdit1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_an_updo'];?>
.</span>
			</div>
		</div>
		<div class="form-group">
	    	<div class="col-sm-4 col-sm-offset-4">
				<span id="primaryerrormsg" class="errormsg_login"></span>
				<span id="primarysuccessmsg" class="succmsg"></span>
			</div>
		</div>
		<input type="hidden" id="Address_id" value="<?php echo $_smarty_tpl->tpl_vars['customerAddress']->value[0]['id'];?>
">
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal">
				<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
				<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_address_title']);?>

			</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="address_title" id="address_title" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_address_title']);?>
" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_plot_apt_door_numb'];?>
</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="doornumber" id="doornumber" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_apartment_name']);?>
" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_customer_street'];?>
</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="customerstreet" id="customerstreet" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_street']);?>
" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_state'];?>
</label>
			<div class="col-sm-4">
				<select name="customer_state" id="customer_state" class="form-control" onchange="getCityListCus(this.value);">
					<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_select_state'];?>
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
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_city'];?>
</label></li>				
			<div class="col-sm-4">
				<div id="showCusCityList">
					<select name="customer_city" id="customer_city" class="form-control" >
						<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_first_sel_state'];?>
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
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_zip'];?>
</label>
			<div class="col-sm-4">
				<div id="showCusZipList">
					<input type="text" class="form-control" name="customer_zip" id="customer_zip" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_zip'];?>
"   onkeyup="autoSuggestZip();"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_landmark'];?>
</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="landmark" id="landmark" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_landmark']);?>
" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_landline'];?>
</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="landline" id="landline" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_landline']);?>
"  />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_address_label'];?>
</label></li>
			<div class="col-sm-4">
				<label class="radio-inline">
					<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_home" value="home" <?php if ($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_address_label']=='home') {?>checked="checked"<?php }?>/>
					<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_home'];?>

				</label>
				<label class="radio-inline">
					<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_off" value="office" <?php if ($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_address_label']=='office') {?>checked="checked"<?php }?>/>
					<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_office'];?>

				</label>
				<label class="radio-inline">
					<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_other" value="other" <?php if ($_smarty_tpl->tpl_vars['customerAddress']->value[0]['customer_address_label']=='other') {?>checked="checked"<?php }?>/>
					<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_other'];?>

				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input class="updateBtn" type="button" id="editaddressbook" onclick="return customerUpdatePrimaryAddress();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_change_address'];?>
" />
			</div>
		</div>
    </div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=='GetAddress') {?>
	<?php echo $_smarty_tpl->tpl_vars['objCustomer']->value->getParticularAddress();?>

	<div class="form-group">
		<label for="deliverystreet" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar">*</span><?php }
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_locality'];?>
</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" name="deliverystreet" id="deliverystreet" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customeraddress']->value[0]['customer_street']);?>
" />
			<span id="deliverystreeterrormsg"></span>
		</div>
	</div>
	 <div class="form-group">
		<label for="deliveryaddress" class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_doorno'];?>
</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" name="deliveryaddress" id="deliveryaddress" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customeraddress']->value[0]['customer_apartment_name']);?>
" />
			<span id="deliveryaddresserrormsg"></span>
		</div>
	</div>
   
	
<!--		<ul class="customsignupUl">
		<li><label class="name"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_zip'];?>
</label></li>
		<li><input type="text" class="txt" name="deliveryzip" id="deliveryzip" value="<?php echo $_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_zip'];?>
"/></li>
		<span id="deliveryziperrormsg"></span>
	</ul>-->
<!--		<ul class="customsignupUl">
		<li>
			<label class="name"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_city'];?>
/State</label>
		</li>
		<li>
			<input class="txt1" type="text" name="deliverycity" id="deliverycity" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_city']);?>
">
		</li>
		<li><input type="text" class="txt2" name="deliverystate" id="deliverystate" value="<?php echo $_smarty_tpl->tpl_vars['customerDetails']->value[0]['customer_state'];?>
"/></li>
		<span id="deliverycityerrormsg"></span>
	</ul>-->
    		
     <div class="form-group">
	 	<label for="deliverystate" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar">*</span><?php }
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
" <?php if ($_smarty_tpl->tpl_vars['showStatelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode']==$_smarty_tpl->tpl_vars['customeraddress']->value[0]['customer_state']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['showStatelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statename']);?>
</option>
				<?php endfor; endif; ?>
			</select>
			<span id="deliverystateerrormsg"></span>
		</div>
	</div>
	
     <div class="form-group">
	 	<label for="deliverycity" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar">*</span><?php }
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
" <?php if ($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['city_id']==$_smarty_tpl->tpl_vars['customeraddress']->value[0]['customer_city']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['cityname']);?>
</option>
				<?php endfor; endif; ?>
			</select>	
			</div>			
			<span id="deliverycityerrormsg"></span>
		</div>
	</div>
	 <div class="form-group">
	 	<label for="deliveryzip" class="col-sm-4 control-label font-normal"><?php if ($_REQUEST['deliverypickup']!='pickup') {?><span class="redStar">*</span><?php }
echo $_smarty_tpl->tpl_vars['LANG']->value['checkout_zip'];?>
</label>
		<div class="col-sm-5">
			<div id="showCusZipListcheck">
			<input type="text" class="form-control" name="deliveryzip" id="deliveryzip" value="<?php echo $_smarty_tpl->tpl_vars['customeraddress']->value[0]['customer_zip'];?>
">
			
			
				
			</div>							
			<span id="deliveryziperrormsg"></span>
		</div>
	</div>	
    

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="OrderFilter") {?>
	
	<!--Date Picker Files-->
	
		
	<?php echo $_smarty_tpl->tpl_vars['objCustomer']->value->customerMyorderHistory();?>

    <div id="order_filter">
        <span class="sortbytext">From</span>
		<input type="text" id="order_from" name="order_from" value="<?php echo $_REQUEST['startdate'];?>
" size="15" class="sortbyline"/>
		<span class="sortbytext">To</span>
		<input type="text" id="order_to" name="order_to" value="<?php echo $_REQUEST['enddate'];?>
" size="15" class="sortbyline"/>
		<span class="showBtn"><input type="submit" name="actionsubmit" value="Show" id="show" onclick="return order_validate();"/></span>
    </div>
    
	<div class="myAccInnerBg clearfix">
		<div class="contain" id="cus_myorder">
			<div class="tablecontainer">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr class="orderInnerHead">
							<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_order_number'];?>
</td>
							<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_total_price'];?>
</td>
							<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_payment'];?>
</td>
							<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_order_at'];?>
</td>
							<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_status'];?>
</td>
							<td class="orderHeading" width="15%">&nbsp;</td>
							<td class="orderHeading" width="10%">&nbsp;</td>
						</tr>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['name'] = "cus_ord";
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customerOrderList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["cus_ord"]['total']);
?>
						<tr class="orderInnerCont">
							<td><?php echo $_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['ordergenerateid'];?>
</td>
							<td><span class="rupeeImg"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</span><span class="rupeePrice"><?php echo $_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['ordertotalprice'];?>
</span></td>
							<td><?php if ($_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['payment_type']=='cod') {?>Cash on Delivery<?php } else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['payment_type']));
}?></td>
							<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['orderdate'],"%a %e,%Y %H:%M");?>
</td>
							<td>
								<?php if ($_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['status']=='completed') {?>Delivered
								<?php } else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['status']));?>

								<?php }?> 
							</td>
							<td align="center">
								<a class="viewFullDetails bold" onclick="orderViewFullDetails(<?php echo $_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['orderid'];?>
);" href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_viewfull_detail'];?>
</a> 
							</td>
							<td><?php if ($_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['status']=='completed') {?><a class="orderEditDetailsview orderEditDetailsviewNew1 bold" onclick="return customerReviews('<?php echo $_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['orderid'];?>
','<?php echo $_smarty_tpl->tpl_vars['customerOrderList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['restaurant_id'];?>
');" href="#customerReviewsPop" data-toggle="modal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_review'];?>
</a><?php }?></td>
						</tr>
						<?php endfor; else: ?>
						<tr><td colspan="7" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_no_rec_found'];?>
</td></tr>
						<?php endif; ?>
					</tbody>
				</table>		
			</div>
		</div>
         <!--Full Order-->
		<div class="contain" id="cus_fullorder"></div>
	</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="mapInfoUpdate") {?>
	<!--Google Map Delivery Area-->
	<div class="addPageCont" id="map_distance_show">
		<input type="hidden" name="restaurant_address" id="restaurant_address" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_address_map']->value;?>
" />
		<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']);
} else { ?>5<?php }?>" />
		<div id="map" style="width:100%;height:500px;"></div>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="Datepickerdate") {?>

<?php if ($_smarty_tpl->tpl_vars['times']->value=='') {?>
  <select name="time_delivery" id="time_delivery">
   <option value="">Closed</option>     
     
  </select>
  |@@|Closed
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
|@@|Open
<?php }?>
<?php }?>


 <?php if ($_smarty_tpl->tpl_vars['action']->value=="verification") {?>
	  <span class="contact_verifycode" class="contact_verifycode" id="captchcode"><?php echo $_smarty_tpl->tpl_vars['rndnumber']->value;?>
</span>
 <?php }?>
 
<?php if ($_smarty_tpl->tpl_vars['action']->value=='checkoutDeliveryCharge') {?> 
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
					</div>
				</div>  
<?php }?> 

<?php if ($_smarty_tpl->tpl_vars['action']->value=="yelpreviewsdisplay") {?>
    	
			<?php if ($_smarty_tpl->tpl_vars['yelp_reviews']->value[1]!='') {?>
			 <div class="total-rev">
                 <img src="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[1];?>
" /> <?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[0];?>
 Reviews
            </div>
			<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['yelp_reviews']->value[2]!='') {?>
                <div class="last-revBox">
                    
                	<div class="last-revHead">
                    	<span class="last-revTit">Last Review</span>
                    	<div class="relate pull-right">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[3];?>
"/><?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[6];?>

                        </div>
                    </div>
                	<span class="rev-info"><?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[4];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[8];?>
" target="_blank">Read more</a></span>
                	<span class="rev-by">Posted by <?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[7];?>
 on Yelp.com</span>
                    
                </div>
            <?php } else { ?>
               <span class="no-rec"> No record(s) found</span>
            <?php }?>
		
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="Datepickerdatebook") {?>

<?php if ($_smarty_tpl->tpl_vars['times']->value=='') {?>
  <select name="booking_hours" id="booking_hours" class="form-control">
   <option value="">Closed</option>     
     
  </select>
|@@|Closed   
  
<?php } else { ?>    
<select name="booking_hours" id="booking_hours" class="form-control">
 
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
|@@|Open   
<?php }?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="cartTotal") {?>
	<div class="add_cart"><span id="CartCount"><?php if ($_smarty_tpl->tpl_vars['CartCount']->value!='') {
echo $_smarty_tpl->tpl_vars['CartCount']->value;
} else { ?>0<?php }?></span></div> <p class="text">Your Cart - </p> 
                
    <span class="totalPriceCount"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?></span>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="showAllRestaurants") {?>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['name'] = 'elena';
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurants']->value['restaurants']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total']);
?>
		<h1> <?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_name'];?>
	</h1>
	<?php endfor; endif; ?>
<?php }?><?php }} ?>
