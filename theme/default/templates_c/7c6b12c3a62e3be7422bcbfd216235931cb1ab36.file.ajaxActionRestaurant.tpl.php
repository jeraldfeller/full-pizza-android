<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 11:32:24
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/ajaxActionRestaurant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191770492580e3798acefe2-87997542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c6b12c3a62e3be7422bcbfd216235931cb1ab36' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/ajaxActionRestaurant.tpl',
      1 => 1466424460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191770492580e3798acefe2-87997542',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'LANG' => 0,
    'currency' => 0,
    'totalorderprice' => 0,
    'totalsalesprice' => 0,
    'remainingprice' => 0,
    'commission' => 0,
    'totalsalesCommissionprice' => 0,
    'showcategorylist' => 0,
    'cat' => 0,
    'menudet' => 0,
    'catval' => 0,
    'SITE_NAME' => 0,
    'SITE_LOGO' => 0,
    'orderDetails' => 0,
    'gprsoption' => 0,
    'cartDetails' => 0,
    'detailsCart' => 0,
    'subtotal' => 0,
    'salestax' => 0,
    'taxamount' => 0,
    'deliverytype' => 0,
    'deliverycharge' => 0,
    'orderDiscountPrice' => 0,
    'tipamount' => 0,
    'total' => 0,
    'restaurantname' => 0,
    'SITE_JS_URL' => 0,
    'showAddonslist' => 0,
    'objSite' => 0,
    'cntmenuSubAddons1' => 0,
    'showSubAddonslist' => 0,
    'menuaddonsdet' => 0,
    'showPizzaAddonslist' => 0,
    'showPizzaCrustlist' => 0,
    'menuid' => 0,
    'catid' => 0,
    'cntcrustAddons' => 0,
    'crustaddon' => 0,
    'cntpizzaAddons' => 0,
    'pizzaaddon' => 0,
    'addonsvalue' => 0,
    'showmainAddonslist' => 0,
    'getpriceoption' => 0,
    'cntmainAddons' => 0,
    'mainaddon' => 0,
    'objRestaurant' => 0,
    'selectCityList' => 0,
    'city' => 0,
    'showZiplist' => 0,
    'ziplist' => 0,
    'restaurantDetailsList' => 0,
    'restaurantstate' => 0,
    'restaurantcity' => 0,
    'restaurantzip' => 0,
    'SITE_IMAGE_RESTAURANT_URL' => 0,
    'resid' => 0,
    'servingcuisine' => 0,
    'restaurantEditListTiming' => 0,
    'cntSliceAddons' => 0,
    'SITE_IMAGE_URL' => 0,
    'sliceaddonprice_arr' => 0,
    'showPizzaSlicelist' => 0,
    'sliceList' => 0,
    'objResInvoice' => 0,
    'invoice_gen_no' => 0,
    'invoice_sent_date' => 0,
    'inv_period' => 0,
    'res_det' => 0,
    'site_address' => 0,
    'SITE_PHONE' => 0,
    'SITE_INVOICE_EMAIL' => 0,
    'SITE_BASEURL' => 0,
    'SITE_VAT_NO' => 0,
    'total_orders' => 0,
    'totalSales' => 0,
    'total_orders_cash' => 0,
    'totalSales_cash' => 0,
    'total_orders_cc' => 0,
    'totalSales_cc' => 0,
    'admin_service_fee_charge' => 0,
    'rest_comm_order_per' => 0,
    'totalCommission' => 0,
    'uk_vat_per' => 0,
    'uk_vat_cal' => 0,
    'net_amt_vat' => 0,
    'total_owned_to_restaurant' => 0,
    'prev_inv_cont' => 0,
    'previous_invoice_balance' => 0,
    'total_payable_to_restaurant' => 0,
    'payment_send_date' => 0,
    'endeddate' => 0,
    'card_payment_fees' => 0,
    'othername1' => 0,
    'otherprice1' => 0,
    'othername2' => 0,
    'otherprice2' => 0,
    'inv_deli_order' => 0,
    'SITE_CC_PERCENTAGE' => 0,
    'rest_status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e379a7a8af1_04414969',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e379a7a8af1_04414969')) {function content_580e379a7a8af1_04414969($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><?php if ($_SESSION['lan']=='CS'||$_SESSION['lan']=='SK'||$_SESSION['lan']=='SL'||$_SESSION['lan']=='AR'||$_SESSION['lan']=='SV'||$_SESSION['lan']=='LT') {?>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php } else { ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php }?>



	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardTodayorder") {?>
		<!-- Dashboard Today Details -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_dtoday.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardweekorder") {?>
		<!-- Dashboard Week Details -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_dweek.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardMonthorder") {?>
		<!-- Dashboard Month Details -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_dmonth.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardYearorder") {?>
		<!-- Dashboard Year Details -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_dyear.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardAllorder") {?>
		<!-- Dashboard Details All Order -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_ord_all.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardPendorder") {?>
		<!-- Dashboard Details Pending Order -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_ord_pending.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardProcessorder") {?>
		<!-- Dashboard Details Processing Order -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_ord_process.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardDeliverorder") {?>
		<!-- Dashboard Details Deliver Order -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_ord_deliver.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardFailorder") {?>
		<!-- Dashboard Details Failed Order -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_dashboard_ord_failed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="dashboardCommissionPrice") {?>
		<!-- Dashboard Commission details -->
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashtotprice'];?>
</h1>
			<span class="myAccntTopRightBoxTxt"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp; <?php echo $_smarty_tpl->tpl_vars['totalorderprice']->value;?>
</span>
		</div>
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_total_menu_price'];?>
</h1>
			<span class="myAccntTopRightBoxTxt"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp; <?php echo $_smarty_tpl->tpl_vars['totalsalesprice']->value;?>
</span>
		</div>
		
		<div class="myAccntTopRightBox2">
			<h1 class="myAccntTopRightBoxHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashremprice'];?>
</h1>
			<span class="myAccntTopRightBoxTxt"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp; <?php echo $_smarty_tpl->tpl_vars['remainingprice']->value;?>
</span>
		</div>
		<div class="myAccntTopRightBox2">
			<h1 class="myAccntTopRightBoxHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashcomprice'];?>
 (<?php echo $_smarty_tpl->tpl_vars['commission']->value;?>
 %)</h1>
			<span class="myAccntTopRightBoxTxt"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp; <?php echo $_smarty_tpl->tpl_vars['totalsalesCommissionprice']->value;?>
</span>
		</div>
		
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
		
		<div class="myAccntTopRightBox3">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
		<div class="myAccntTopRightBox3">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Order") {?>
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_order.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Orderstatus") {?>
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_order_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="categoryDropList") {?>
		<select class="selectbx" name="menu_category" id="menu_category" onchange="otherSpecify('category');getShowAddons(this.value);" >
			<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_select'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_category']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
			<?php } ?>
			<option value="other" id="categoryOther" onclick="otherSpecify('category');"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucatoptother'];?>
</option>
		</select>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="categoryDropListEdit") {?>
    
		<select class="selectbx menu_categoryedit" name="menu_category" id="menu_category1" onchange="otherSpecifyEdit('category');getShowAddonsEdit(this.value);" >
			<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_select'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['catval']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
			<?php } ?>
			<option value="other" id="categoryOtherEdit" onclick="otherSpecifyEdit('category');"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucatoptother'];?>
</option>
		</select>
        <?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="categoryDropListAddon") {?>
		<select class="selectbx" name="menu_categor" id="menu_categor" onchange="otherSpecifyAddon('category');">
			<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_select'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_category']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
			<?php } ?>
			<option value="other" id="categoryOther_addon" onclick="otherSpecifyAddon('category');"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addoncatoptother'];?>
</option>
		</select>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="categoryDropListAddonEdit") {?>
		<select class="selectbx addons_category" name="menu_categor" id="menu_categor1" onchange="otherSpecifyAddonEdit('category');" >
			<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_select'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['catval']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
			<?php } ?>
			<option value="other"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addoncatoptother'];?>
</option>
		</select>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="orderFullDetails") {?>
		<!-- Order Full details POPUP -->
		<!--<div class="addtocartPopupHead">
			<h1 class="addtocartPopupHeadNew"><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
</h1>
			
			<div class="addtoCartClose" data-dismiss="modal"></div>
		</div>-->
        
        
		<div class="container" id="logoimg" style="display:none; background-color:#ffffff">
			<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" />
		</div>
		<div class="order-box">
			<div class="popTxtarea1Inner1MyAcc">
				<a class="pdf" href="viewfullDetailsPDF.php?orderid=<?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderid'];?>
" target="_blank"  ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdwnformat'];?>
</a>
				<a class="print" href="javascript:void(0);" onclick="print();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewprint'];?>
</a>
			</div>
			<div class="frt"><a href="javascript:void(0);" class="backHistTxt"  onclick="backHistory();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['rest_back_history'];?>
</a></div>
			<div class="addtocartWrap newPopupHeight1">
				<!--<h1 class="addtoCartMainhead">Order Number - <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</h1>-->
				<div class="addtoCartInner">
					<a href='javascript:void(0);' id="printpage" onclick='window.print();' class='print' style="display:none">Print this page</a>
					<div class="thanksTableOrderNew1">
						<span class="orderNewPopHead"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewordernumber'];?>
 :</b> <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</span>
						<span class="orderNewPopsubHead"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderat'];?>
: </b><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate'];?>
 </span>
						<span class="orderNewPopsubHead"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewstatus'];?>
: </b><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_delivered'];
} else {
echo ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']);
}?></span>
						<!--<input type="button" class="addtoNotebtn1" value="Edit" />-->
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
                        
					</div>
					<table class="table table-striped  table-hover table-bordered">
						<tr class="">
                            <th class="bold" width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_sno'];?>
</th>
							<th class="bold" width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewmenuname'];?>
</th>
							<th class="bold" width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewcategory'];?>
</th>
							<th class="bold" width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewquantity'];?>
</th>
							<th class="bold " width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewprice'];?>
</th>
							<th class="bold center" width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewtotalprice'];?>
</th>
						</tr>
                        <?php $_smarty_tpl->tpl_vars['detailsCart'] = new Smarty_variable($_smarty_tpl->tpl_vars['cartDetails']->value, null, 0);?>
                        
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ord'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ord']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['name'] = 'ord';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ord']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['detailsCart']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
						<tr class="">
                            <td class=""><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ord']['rownum'];?>
</td>
							<td class=""><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuname']));?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size'];?>
)<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?> <br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addons'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']);
}?>
							<?php if ($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_crustname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_crust'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_crustname']);
}?>
							<?php if ($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_addonsname']!='') {?><br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_topping'];?>
:</b> <?php echo stripslashes($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_addonsname']);
}?>
							<?php if ($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['specialinstruction']!='') {?> <br><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_inst'];?>
:</b><?php echo stripslashes($_smarty_tpl->tpl_vars['detailsCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['specialinstruction']);
}?>
							</td>
							<td class=""><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['catname']));?>
</td>
							<td class=" "><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['quantity'];?>
</td>
							<td class=" "><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuprice'];
if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsprice']);?>
 Extra )<?php }?></td>
							<td class="padright75" align="right"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['tot_menuprice'];?>
</td>
						</tr>
						<?php endfor; endif; ?>
						<tr class="">
							<td class="" align="right" colspan="5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewsubtotal'];?>
</td>
							<td align="right" class=" padright75"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
						</tr>
                        <tr class="">
							
							<td class="" align="right"   colspan="5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_tax'];
if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00') {?>(<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['salestax']->value);?>
 %)<?php }?></td>
							<td align="right" class=" padright75"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['taxamount']->value;?>
</td>
						</tr>
						
						<?php if ($_smarty_tpl->tpl_vars['deliverytype']->value!='pickup') {?>
						<tr class=""> 
							<td class=""  align="right"  colspan="5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdeliverycharge'];?>
</td>
							<td align="right" class=" padright75"><?php if ($_smarty_tpl->tpl_vars['deliverycharge']->value=='0.00') {?>0.00<?php } else {
echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['deliverycharge']->value;
}?></td>
						</tr>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue']!='') {?>
						<tr class="">
							<td class="" align="right"  colspan="5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewdiscount'];?>
(<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue']);?>
 % Off)</td>
							<td align="right" class="padright75"><?php if ($_smarty_tpl->tpl_vars['orderDiscountPrice']->value=='0.00') {?>0.00<?php } else { ?>- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['orderDiscountPrice']->value;
}?></td>
						</tr>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['tipamount']!='0.00') {?>
						<tr class="" >
							<td class=" " align="right"  colspan="5">Tip</td>
							<td align="right" class="padright75"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['tipamount']->value;?>
</td>
						</tr>
						<?php }?>
						
                        <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_id']!=''&&$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']>0) {?>
                            <tr class="">
            					<td class="" align="right"  colspan="5">Voucher Discount Price</td>
            					<td align="right" class="padright75">- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']);?>
</td>
            				</tr>
                        <?php }?>
						<tr class="">
							<td class=""  align="right"  colspan="5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewtotal'];?>
</td>
							<td align="right" class="padright75"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</td>
						</tr>
					</table>
				</div>
				<div class="addtoCartInner">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h1 class="viewDetailHead">Order Details</h1>
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
echo $_smarty_tpl->tpl_vars['LANG']->value['res_as_soon_as'];
} else {
echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydate'];?>
 ,&nbsp; <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytime'];
}?></span>
							</li>
							<?php }?>
							
							<li>
								<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewpaymentmethod'];?>
</span>
								<span class="col">:</span>
								<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='cod') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_cash_on_del'];
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
echo $_smarty_tpl->tpl_vars['LANG']->value['res_delivered'];
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
							<!--<li>
									<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderstatus'];?>
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
echo $_smarty_tpl->tpl_vars['LANG']->value['res_as_soon_as'];
} else {
echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydate'];?>
 &nbsp; <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytime'];
}?></span>
								</li>
								<?php }?>
								
								<li>
									<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewpaymentmethod'];?>
</span>
									<span class="col">:</span>
									<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='cod') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_cash_on_del'];
} else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']));
}?></span>
								</li>
								<li>
									<span class="name">Payment Status</span>
									<span class="col">:</span>
									<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_status']=='P') {?>Paid<?php } else { ?>Not Paid<?php }?></span>
								</li>
								
								<li>
									<span class="name">Order Status</span>
									<span class="col">:</span>
									<span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_delivered'];
} else {
echo ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']);
}?></span>
								</li>
								<li>
									<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewyourindtruction'];?>
</span>
									<span class="col">:</span>
									<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']));?>
</span>
								</li>
								<!--<li>
										<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderstatus'];?>
</span>
										<span class="col">:</span>
										<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['status'];?>
</span>
									</li>
									<li>
										<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_vieworderdate'];?>
</span>
										<span class="col">:</span>
										<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate'];?>
</span>
									</li>-->
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<h1 class="viewDetailHead">Customer Details</h1>
							<ul class="thanksUlNew1MyAcc">
								<li>
									<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewcustomername'];?>
</span>
									<span class="col">:</span>
									<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customername']));?>
 <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlastname']));?>
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
								<li>
									<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewphonenumber'];?>
</span>
									<span class="col">:</span>
									<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customercellphone']));?>
</span>
								</li>
								<li>
									<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_viewcustomeremail'];?>
</span>
									<span class="col">:</span>
									<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customeremail']));?>
</span>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Report") {?>
	
	<!--Date Picker Files-->
	<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.7.2.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/zebra_datepicker.js"><?php echo '</script'; ?>
>-->
	
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() 
		{
	   		$('#report_from').datepicker({
			direction: [false, '2025-01-01'],
			//pair: $('#report_from') 	
   		});
   		 
   		$('#report_to').datepicker({
    	    direction: [false, '2025-01-01'],
			//pair: $('#report_to')                
   		});
	   	});
	<?php echo '</script'; ?>
>
	
		
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_report.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
    	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Reportdate") {?>
	
	<!--Date Picker Files-->
	<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.7.2.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/zebra_datepicker.js"><?php echo '</script'; ?>
>-->
	
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() 
		{
	   		$('#report_from').datepicker({
			direction: [false, '2025-01-01'],
			//pair: $('#report_from') 	
   		});
   		 
   		$('#report_to').datepicker({
        	direction: [false, '2025-01-01'],
			//pair: $('#report_to')                
   		});
	   	});
	<?php echo '</script'; ?>
>
	
		
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_report_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>







	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Category") {?>
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_category_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Menu") {?>
		<!-- Pegination Menu List -->
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_menu_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	

	<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCatAddonsListEdit") {?>
		<!-- Addons List from menu mgmt -->
		<!--<span class="addPageRightFont">&nbsp;</span><span class="colon1">&nbsp;</span>-->
		<table width="68%" cellpadding="0" cellspacing="0" border="0">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>
				<tr>
					<td align="left" width="25%" height="35">
						
						<table width="70%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonspriceoption']=='Paid') {?>
									<td align="left" width="16%" height="20">
										<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" /> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
</label>
									</td>
									
									<td width="50%" height="20">
										<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
');" checked="checked"/> Paid &nbsp;
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" >
											<span class="flt">Price :</span> <input type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons_price]" id="addonsprice" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsprice'];?>
" size="10" readonly=""/> 
										</span>
									</td>
								<?php }?>
							</tr>
						</table>
						
						
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['menu_addonid'];?>
" />
						<?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonspriceoption']=='Free') {?>
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" /><?php }?>
						<?php echo $_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id']);?>

						<?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonspriceoption']=='Free'&&$_smarty_tpl->tpl_vars['cntmenuSubAddons1']->value>0) {?>
							<b><?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
</b>
						<?php }?>
						<span class="addPageRightFont">&nbsp;</span><span class="colon1">&nbsp;</span>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['name'] = "subaddon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total']);
?>
							<table width="" cellpadding="0" cellspacing="0" border="0">
								<tr class="trMenu">
									<td align="left" width="30%" height="35">
										<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" /> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
</label>
									</td>
									<td align="left" width="20%" height="35" class="td1">
										<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free" value="Free" checked="checked" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');"/><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>
 
									</td>
									<td align="left" width="50%" height="35">
										<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');"/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" style="display:none;">
											<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span> <input type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price]" id="addonsprice" value="" class="" /> 
										</span>
									</td>
								</tr>
							</table>
						<?php endfor; endif; ?>
					</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
													
	<?php }?>
	
	
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCatPizzaAddonsList") {?>

		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_size'];?>
</span>
			<span class="colon1">:</span>
			<span>
			<table width="70%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="left" height="30">
						<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_small'];?>
 &nbsp;
					
						<span id="smallpriceshow" style="display:none;">
						<input type="text" name="smallval" id="smallval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="10%" height="30">
						<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_medium'];?>
&nbsp;
					
						<span id="mediumpriceshow" style="display:none;">
						<input type="text" name="mediumval" id="mediumval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="16%" height="30">	
						<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_large'];?>
 &nbsp;
					
						<span id="largepriceshow" style="display:none;">
						<input type="text" name="largeval" id="largeval" value="" />&nbsp;</span>
					</td>
				</tr>
			</table>
			</span>
		</div>
		<!--Crust Start -->
		<div class="addPageCont">
			<span class="addPageRightFont">Crust </span>
			<span class="colon1">:</span>
			<span>
				<table width="68%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" width="32%" height="35">
							<input type="text" name="crustname" id="crustname" value="" /> 
							<input type="radio" name="crust" id="crustfree" value="Free" onclick="pizzacrustfreeoption();" checked="checked" /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>

						</td>
						<td width="40%" height="35">
							<input type="radio" name="crust" id="crustpaid" value="Paid" onclick="pizzacrustpaidoption();"/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
							<span id="showcrustpizzaprice" style="display:none;">
							<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span><input type="text" name="crustprice" id="crustprice" value="" /> 
							</span>
						</td>
						<td align="left" width="9%" height="35">&nbsp;</td>
					</tr>
				</table>
			
				<label style="float:left; width:250px;">&nbsp;</label>
				<table id="specialcrust" >
				
					<tfoot><tr>
					<td class="left" colspan="3" align="center">
						<!--<span id="addonsAddMore" <?php if ($_smarty_tpl->tpl_vars['menuaddonsdet']->value=='Yes') {?> style="display:block"; <?php } else { ?> style="display:none";<?php }?>">-->
							<a onclick="addMorePizzaCrust1();" style="color:#ff0000;cursor:pointer;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_crust'];?>
</span></a>
						<!--</span>-->
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!--Crust End -->
		<!-- Add Topping Start-->
		<div class="addPageCont">	
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_topping'];?>
</span>
			<span class="colon1">:</span>
			<span class="addNewToppings">
				<table width="95%" cellpadding="0" cellspacing="0" border="0">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['name'] = "pizza";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total']);
?>
						<tr>
							<td align="left" width="30%" height="35">
								<input type="checkbox" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
" /> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
</label>
							</td>
							
							<td align="left" width="20%" height="35" class="td1">
								<input type="radio" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_priceoption]" id="free" value="Free" onclick="pizzaaddonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
');" checked="checked"/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>

							</td>
							
							<td width="50%" height="35">
								<input type="radio" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_priceoption]" id="paid[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
]" value="Paid" onclick="pizzaaddonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
');" /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
							
								<span id="showpizzaprice_<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
"  style="display:none;" >
									<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span> <input type="text" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_price]" id="pizzaaddonsprice[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
]" value="" /> 
								</span>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</table>
			
				<table id="specialpizza" border="0" width="98%">
				<tfoot><tr>
				<td class="left"  colspan="3" align="center">
					<!--<span id="addonsAddMore" <?php if ($_smarty_tpl->tpl_vars['menuaddonsdet']->value=='Yes') {?> style="display:block"; <?php } else { ?> style="display:none";<?php }?>">-->
						<a onclick="addMorePizzaAddons1();" style="color:#ff0000;cursor:pointer;margin-left:100px;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_topping'];?>
</span></a>
					<!--</span>-->
				</td>
				</tr></tfoot>
			</table>
			</span>
		</div>
		<!-- Add Topping End-->
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCatPizzaAddonsListEdit") {?>

		<div class="addPageCont">
			<span class="addPageRightFont">Size </span>
			<span class="colon1">:</span>
			<span>
			<table width="70%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="left" height="30">
						<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_small'];?>
&nbsp;
					
						<span id="smallpriceshow" style="display:none;">
						<input type="text" name="smallval" id="smallval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="10%" height="30">
						<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_medium'];?>
&nbsp;
					
						<span id="mediumpriceshow" style="display:none;">
						<input type="text" name="mediumval" id="mediumval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="16%" height="30">	
						<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_large'];?>
&nbsp;
					
						<span id="largepriceshow" style="display:none;">
						<input type="text" name="largeval" id="largeval" value="" />&nbsp;</span>
					</td>
				</tr>
			</table>
			</span>
		</div>
		<!--Crust Start -->
		<div class="addPageCont">
			<span class="addPageRightFont">Crust </span>
			<span class="colon1">:</span>
			<span>
				<table width="68%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" width="32%" height="35">
							<input type="text" name="crustname" id="crustname" value="" /> 
							<input type="radio" name="crust" id="crustfree" value="Free" onclick="pizzacrustfreeoption();" checked="checked" /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>

						</td>
						<td width="40%" height="35">
							<input type="radio" name="crust" id="crustpaid" value="Paid" onclick="pizzacrustpaidoption();"/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
							<span id="showcrustpizzaprice" style="display:none;">
							<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span> <input type="text" name="crustprice" id="crustprice" value="" /> 
							</span>
						</td>
						<td align="left" width="9%" height="35">&nbsp;</td>
					</tr>
				</table>
			
				<!--<label style="float:left; width:250px;">&nbsp;</label>-->
				<table id="specialcrust" border="0" width="98%">
				
					<tfoot><tr>
					<td class="left" height="20" >
						<!--<span id="addonsAddMore" <?php if ($_smarty_tpl->tpl_vars['menuaddonsdet']->value=='Yes') {?> style="display:block"; <?php } else { ?> style="display:none";<?php }?>">-->
							<a onclick="addMorePizzaCrust1();" style="color:#ff0000;cursor:pointer;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_crust'];?>
</span></a>
						<!--</span>-->
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!--Crust End -->
		<!-- Add Topping Start-->
		<div class="addPageCont">	
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_topping'];?>
</span>
			<span class="colon1">:</span>
			<span class="addNewToppings">
				<table width="95%" cellpadding="0" cellspacing="0" border="0">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['name'] = "pizza";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total']);
?>
						<tr>
							<td align="left" width="30%" height="35">
								<input type="checkbox" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
" /> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
</label>
							</td>
							
							<td align="left" width="20%" height="35" class="td1">
								<input type="radio" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_priceoption]" id="free" value="Free" onclick="pizzaaddonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
');" checked="checked"/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>

							</td>
							
							<td width="50%" height="35">
								<input type="radio" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_priceoption]" id="paid[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
]" value="Paid" onclick="pizzaaddonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
');" /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
							
								<span id="showpizzaprice_<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
"  style="display:none;" >
									<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
:</span> <input type="text" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_price]" id="pizzaaddonsprice[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
]" value="" /> 
								</span>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</table>
						
				<table id="specialpizza" border="0" width="98%">
					<tfoot><tr>
					<td class="left"  colspan="3" align="center">
						<!--<span id="addonsAddMore" <?php if ($_smarty_tpl->tpl_vars['menuaddonsdet']->value=='Yes') {?> style="display:block"; <?php } else { ?> style="display:none";<?php }?>">-->
							<a onclick="addMorePizzaAddons1();" style="color:#ff0000;cursor:pointer;margin-left:100px;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_topping'];?>
</span></a>
						<!--</span>-->
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!-- Add Topping End-->
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="pizzaAddons") {?>
		<div class="addPageCont">
			<span class="addPageRightFont">Size </span>
			<span class="colon1">:</span>
			<span>
			<table width="68%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="left" width="25%" height="35">
						<input type="checkbox" class="pizza_size_small_small" name="small" id="small" value="small" onclick="showSmallPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_small']=='small') {?>checked="checked"<?php }?> /><label class="btnNameMenu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_small'];?>
</label>
						<span id="smallpriceshow" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']=='0.00'||$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']=='') {?> style="display:none;" <?php }?> class="textboxAddonsizeName">
						<input type="text" class="pizza_size_small_value" name="smallval" id="smallval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']!='0.00') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value'];
}?>" class="textboxAddonsize" /></span><br />
					</td>
				</tr>
				
				<tr>
					<td align="left" width="25%" height="35">
						<input type="checkbox" class="pizza_size_medium_medium" name="medium" id="medium" value="medium" onclick="showMediumPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_medium']=='medium') {?>checked="checked"<?php }?> /><label class="btnNameMenu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_medium'];?>
</label>
						<span id="mediumpriceshow" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']=='0.00'||$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']=='') {?> style="display:none;" <?php }?> class="textboxAddonsizeName">
						<input type="text" class="pizza_size_medium_value" name="mediumval" id="mediumval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']!='0.00') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value'];
}?>" class="textboxAddonsize" /></span><br />
					</td>
				</tr>
				
				<tr>
					<td align="left" width="25%" height="35">
						<input type="checkbox" class="pizza_size_large_large" name="large" id="large" value="large" onclick="showLargePrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_large']=='large') {?>checked="checked"<?php }?> /><label class="btnNameMenu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_large'];?>
</label>
						<span id="largepriceshow" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']=='0.00'||$_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']=='') {?> style="display:none;" <?php }?> class="textboxAddonsizeName">
						<input type="text" class="pizza_size_large_value" name="largeval" id="largeval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']!='0.00') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value'];
}?>" class="textboxAddonsize" /></span>
					</td>
				</tr>
			</table>
			</span>
		</div>
		<!--Crust Start -->
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_crust'];?>
</span>
			<span class="colon1">:</span>
			<span>
				<table width="70%" cellpadding="0" cellspacing="0" border="0">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['name'] = "crust";
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaCrustlist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["crust"]['total']);
?>
						<tr>
							<td align="left" width="40%" height="30">
								<input type="text" name="crust[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['crust']['index'];?>
][crustname]" id="crustname" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_addonsname'];?>
" />
								<input type="radio" name="crust[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['crust']['index'];?>
][pizza_crust_priceoption]" id="crustfree" value="Free" onclick="pizzacrusteditfreeoptionedit('<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crustid'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_priceoption']=='Free'||$_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_price']=='') {?> checked="checked"<?php }?> /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>

							</td>
							<td width="40%" height="44">	
								<input type="radio" name="crust[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['crust']['index'];?>
][pizza_crust_priceoption]" id="crustpaid[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['crust']['index'];?>
]" value="Paid" onclick="pizzacrusteditpaidoptionedit('<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crustid'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_priceoption']=='Paid') {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
								<span id="showcrustpizzapriceedit_<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crustid'];?>
" <?php if ($_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_price']==''||$_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_price']=='0'||$_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_priceoption']=='Free') {?> style="display:none;" <?php }?>>
								<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span> <input type="text" name="crust[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['crust']['index'];?>
][crustprice]" id="crustprice" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crust_price'];?>
" /> 
								</span>
							</td>
							<td class="left">
								<!--<a href="menuAddEdit.php?eid=<?php echo $_GET['eid'];?>
&action=crustdelete&crustid=<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crustid'];?>
" style="color:#ff0000;cursor:pointer;" name="remove" id="remove"  >Remove</a>-->
								
								<a href="javascript:void(0);" style="color:#ff0000;cursor:pointer;" name="remove" id="remove" onclick="removeCrust('<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crust']['index']]['pizza_crustid'];?>
');"  ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_remove'];?>
</a>
							</td>
						</tr>	
					<?php endfor; endif; ?>
				</table>
			
				<!--<label style="float:left; width:250px;">&nbsp;</label>-->
				<table id="specialcrust" border="0" width="98%">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['name'] = 'crust1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntcrustAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['crust1']['total']);
?>
					<?php $_smarty_tpl->tpl_vars['crustaddon'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['crust1']['index'], null, 0);?>
					<input type="hidden" name="crust[<?php echo $_smarty_tpl->tpl_vars['crustaddon']->value;?>
][crusteditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaCrustlist']->value[$_smarty_tpl->tpl_vars['crustaddon']->value]['pizza_crustid'];?>
" />
					<?php endfor; endif; ?>
				
					<tfoot><tr>
					<td class="left" height="20" colspan="3">
						
						<a onclick="addMorePizzaCrust1();" style="color:#ff0000;cursor:pointer;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_crust'];?>
</span></a>
						
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>	
		<!--Crust End -->
		<!-- Add Topping Start-->
		<div class="addPageCont">	
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_topping'];?>
</span>
			<span class="colon1">:</span>
			<span class="addNewToppings">
				<table width="95%" cellpadding="0" cellspacing="0" border="0">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['name'] = "pizza";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pizza"]['total']);
?>
						<tr>
							<td align="left" width="30%" height="35">
								<input type="checkbox" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id']==$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonid']) {?>checked="checked"<?php }?> /> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['addonsname']);?>
</label>
							</td>
							
							<td align="left" width="20%" height="35" class="td1">
								<input type="radio" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_priceoption]" id="free" value="Free" onclick="pizzaaddonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menuprice']=='') {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>

							</td>
							
							<td width="50%" height="35">
								<input type="radio" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_priceoption]" id="paid[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
]" value="Paid" onclick="pizzaaddonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 &nbsp;
							
								<span id="showpizzaprice_<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menuprice']==''||$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menuprice']=='0'||$_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menupriceoption']=='Free') {?> style="display:none;" <?php }?>>
									<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span> <input type="text" name="pizzaaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
][pizzaaddons_price]" id="pizzaaddonsprice[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pizza']['index']]['menuprice'];?>
" /> 
								</span>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</table>
				
				<table id="specialpizza" border="0" width="98%">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['name'] = 'pizza1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntpizzaAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pizza1']['total']);
?>
					<?php $_smarty_tpl->tpl_vars['pizzaaddon'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['pizza1']['index'], null, 0);?>
					<input type="hidden" name="pizzaaddons[<?php echo $_smarty_tpl->tpl_vars['pizzaaddon']->value;?>
][pizzaeditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaAddonslist']->value[$_smarty_tpl->tpl_vars['pizzaaddon']->value]['menu_addonid'];?>
" />
					<?php endfor; endif; ?>
				
					<tfoot><tr>
					<td class="left" height="20" colspan="3">
						<a onclick="addMorePizzaAddons1();" style="color:#ff0000;cursor:pointer;margin-left:100px;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_topping'];?>
</span></a>
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!-- Add Topping End-->
	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Addon") {?>
		<?php echo $_smarty_tpl->getSubTemplate ("restaurantOwnerMyaccount_addons_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownershowaddonList") {?>
		<?php echo $_smarty_tpl->getSubTemplate ("restaurantOwnerMyaccount_addons_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="editSubAddon") {?>
			<!--<span class="madAddons">
				<input type="radio" name="mainaddonoption" id="mainaddon_free" value="Free" <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']=='Free') {?> checked="checked"<?php }?> onclick="mainaddonfree();" class="madInput"><span class="flt">Free</span>
			</span>	
			<span class="madAddons">
				<input type="radio" name="mainaddonoption" id="mainaddon_paid" value="Paid" <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']=='Paid') {?>checked="checked"<?php }?> onclick="mainaddonpaid();" class="madInput" /><span class="flt">Paid</span>
			</span>
			<span class="showaddPrice" <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']!='Paid') {?> style="display:none;"<?php }?>>
				<input type="text" name="mainaddonvalue" id="mainaddonvalue" value="<?php echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonsprice'];?>
" size="" class="madTxtBox"/>
			</span>-->
				<input type="text" name="mainaddoncnt" id="mainaddoncnt" value="<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>Addons count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>" onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>Addons count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>Addons count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>';" size="12" class="madTxtBoxcnt"/>
			
			
		<div class="showaddPriceList newSubBtnDiv" <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']=='Paid') {?> style="display:none;"<?php }?>>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showmainAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>
			<input type="text" name="addonsub[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][subaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" class="textboxAddon madBox" />
		<?php endfor; endif; ?>
		</div>
		
		<div id="subaddonslistEdit"></div>
		
		<span class="showaddPriceList" <?php if ($_smarty_tpl->tpl_vars['getpriceoption']->value=='Paid') {?>style="display:none;"<?php }?>>
		<a onclick="addListSubAddonsEdit();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_sub_addon'];?>
</span></a>	
		</span>
		
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['name'] = 'addon1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntmainAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total']);
?>
		<?php $_smarty_tpl->tpl_vars['mainaddon'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['addon1']['index'], null, 0);?>
		<input type="hidden" name="addonsub[<?php echo $_smarty_tpl->tpl_vars['mainaddon']->value;?>
][subaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->tpl_vars['mainaddon']->value]['id'];?>
" />
		<?php endfor; endif; ?>
	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Offer") {?>
		<?php echo $_smarty_tpl->getSubTemplate ("restaurantOwnerMyaccount_offers_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownerAccountsList") {?>
		<?php echo $_smarty_tpl->tpl_vars['objRestaurant']->value->restaurantDetailsList();?>

		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_accounts_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Reviews") {?>
		<?php echo $_smarty_tpl->getSubTemplate ("restaurantOwnerMyaccount_reviews_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>







	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="showResCityList") {?>
		<!-- City List from Restaurant -->
		<select class="form-control" name="restaurant_city" id="restaurant_city_con" >
			<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_select'];?>
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
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="showResZipList") {?>
		<!-- Zipcode List from Restaurant -->
		<select class="form-control" name="restaurant_zip" id="restaurant_zip" >
			<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_reg_select'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars['ziplist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ziplist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showZiplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ziplist']->key => $_smarty_tpl->tpl_vars['ziplist']->value) {
$_smarty_tpl->tpl_vars['ziplist']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['ziplist']->value['zipcode_id'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['ziplist']->value['zipcode']);?>
 - <?php echo stripslashes($_smarty_tpl->tpl_vars['ziplist']->value['areaname']);?>
</option>
			<?php } ?>
		</select>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownerEditContactList") {?>
	<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="return editLocationShow();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocedit'];?>
</a>
	<div class="restTabNewIn3">
	<!-- Content start -->
		<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontact'];?>
</h1> 
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactname'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_name']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactphone'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_phone']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactemail'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_contact_email'];?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactpassword'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">******** <a href="javascript:void(0);" onclick="showChangePassword();" class="colorLink"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcontactchgpass'];?>
 </a></span>
		</div>
	</div>
	<div class="restTabNewIn2">
		<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocinfo'];?>
</h1>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocaddress'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_streetaddress']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setlocstate'];?>
 </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantstate']->value);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloccity'];?>
 </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantcity']->value;?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setloczip'];?>
 </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantzip']->value;?>
</span>
		</div>
	</div>
	<!-- Content end -->
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownerEditRestaurantInfoList") {?>
	<div class="contain">
		<h1 class="restOwnMyHead">Restauarnt Info</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="editRestaurantInfoShow();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_edit'];?>
</a>
	</div>
	<div class="restTabNewIn3">
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_resname'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_name']);?>
</span>
		</div>	
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_resphone'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_phone']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_resweb'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_website']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Order Receive Email</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['order_receive_email']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_resfax'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_fax']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_about_res'];?>
</span>
			<span class="colon1">:</span>
			<span class="widthAboutRest"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_description']);?>
</span>
		</div>
		<!--<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Logo</span>
			<span class="colon1">:</span>
			<?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_logo']!='') {?>
			<div class="logoUpload" id="res_owner_logo1">
				<div class="logoImgInner">
					<div class="logo posRelate">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_RESTAURANT_URL']->value;?>
/logo/<?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_logo'];?>
" alt="image" title="" class="logoInfoImg" />
						<a href="javascript:void(0);" id="restaurantlogo1" onclick="resownerdeletelogo('<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
');" class="logoCloseIcon"></a>
					</div>
					
					<input type="button" value="Modify" class="addphoto-button logoInfoImgTxt" />
					<input type="file" class="hided modify1" size="1" name="restaurant_logo" id="restaurant_logo" onChange="resownerlogoUpdate();" />
				</div>
			</div>
			
			<span id="res_owner_add_disp_logo" style="display:none;">
				<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
				<input type="file" class="hided" size="1" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd();" />
			</span>
		
		<?php } else { ?>
		<span id="res_owner_add_disp_logo" >
			<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
			<input type="file" class="hided" size="1" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd();" />
		</span>	
		
		<?php }?>
		</div>-->
	</div>
	<div class="restTabNewIn2">
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_pickup'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_pickup']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_booktab'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_booktable']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_min_order'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_minorder_price']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_sales_tax'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_salestax']);?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_serving_cuisine'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['servingcuisine']->value;?>
</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Order Pending Alert Tone</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['pending_order_alert']);?>
</span>
		</div>
        <!-- Open/Close Status -->
        <div class="addPageCont">
			<span class="addPageRightFont">Open/Close Status</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">
            <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_set_status']=='TT') {?>Time Table
            <?php } else { ?>
            <?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_set_status']);?>
(<?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_set_time'];?>
)
            <?php }?></span>
		</div>
		
		
	<!-- Content end -->
	</div>
	
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownerEditDeliveryInfoList") {?>
		<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_del_info'];?>
</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="editDeliveryInfoShow();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_edit'];?>
</a>
		<!-- Content start -->
		<div class="addPageCont">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_delivery'];?>
</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']);?>
</span>
		</div>	
		
		
        <div id="Deliveryinfo" <?php if ($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery']=='No') {?> style="display:none; <?php }?>">
    		<div class="addPageCont">
    			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_del_estimated_time'];?>
</span>
    			<span class="colon1">:</span>
    			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_estimated_time']);?>
</span>
    		</div>
    		<div class="addPageCont">
    			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_del_charge'];?>
</span>
    			<span class="colon1">:</span>
    			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_charge']);?>
</span>
    		</div>
    		<div class="addPageCont">
    			<span class="addPageRightFont">Delivery miles</span>
    			<span class="colon1">:</span>
    			<span class="addPageRightFont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_delivery_distance']);?>
</span>
    		</div>
         </div>   
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownerEditOpenCloseInfoList") {?>
		<h1 class="restOwnMyHead">Open and Close Time</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="editOpenAndCloseInfoShow();"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_edit'];?>
</a>
		<!-- Content start -->
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setmonday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['mon_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settuesday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['tue_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setwednesday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['wed_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setthursday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['thu_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setfriday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['fri_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setsaturday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sat_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setsunday'];?>
 </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_firstopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_firstclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_secondopen_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditListTiming']->value[0]['sun_secondclose_time']);?>
<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		<!-- Content end -->
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Paymentmethod") {?>
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_payment_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
	<?php }?>







	<?php if ($_smarty_tpl->tpl_vars['action']->value=="Invoice") {?>
		<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_invoice_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>





<?php if ($_smarty_tpl->tpl_vars['action']->value=="showCatAddonsList") {?>
		<div class="addPageCont">
		<div class="showcataddonsList_delete addontable">
		<input type="hidden" name="cntSliceAddons" id="cntSliceAddons1" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
		<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub1" value="" />
		<input type="hidden" name="sizeoption_addmoreaddonedit" id="sizeoption_addmoreaddonedit_ajax" value="<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
" />
        
        
        
        <input type='hidden' class="selectoptionsFirst" id="selectoptions" name='selectoptions' value='<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
' />
        
			<!--Addons List-->
			<div class="col-sm-8 col-sm-offset-4">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>
				
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" />
					
						<?php $_smarty_tpl->tpl_vars['showSubAddonslist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option']), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value!='') {?>
						
						
							<b style="cursor:pointer;" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']));?>
 
								<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/>  
								<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/>
							</b>
						<?php }?>
						
						
						<div class="clr"></div>
						<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>>
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['name'] = "subaddon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total']);
?>
							<div  class="form-group">
								
									<div class="col-sm-3">
									<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
										<label class="checkbox-inline">
											<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" /> <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>

										</label>
									<?php } else { ?>
										<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" />
										<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</label>
									<?php }?>
									</div>
									<div class="col-sm-2">
										<label class="radio-inline">
											<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free" class="free" value="Free" checked="checked" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');"/>  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>
 
										</label>
                                        
                                        
										<label class="radio-inline">
											<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid" class="paid" value="Paid"  onclick="addonspaidoption_ajax('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');"/>
											 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
 
										</label>
                                        
									</div>
									<div  class="col-sm-5">	
										<!--Fixed option's addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed" style="display:none;">
                                            <span class="col-sm-6"> 
                                                <input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value=""   placeholder="Price"/>											
													
											</span>									
										</span>
										<!--Fixed option's addons price-->
										
										<!--Size option's addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size">
										   <div class="col-sm-4">
                                            	<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value=""   placeholder="Small"/>
                                           </div>
                                            <div class="col-sm-4">
												<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value=""  placeholder="Medium" />
											</div>
											<div class="col-sm-4">
												<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value="" placeholder="Large" />
											</div>
										</span>
										<!--Size option's addons price-->
										
										<!--Slice options addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="priceSpan showprice_slice">
										
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
" />					
											<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']!='') {?>
												
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
    												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
    												<div class="col-sm-4">
    												<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value=""  placeholder="Price"/>		
    												</div>	
												<?php endfor; endif; ?>										
											<?php } else { ?>											
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
    												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
    												<div class="col-sm-4">
	    												<input class="form-control numericfield input-sm" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value=""  placeholder="Price"/>
	    											</div>
												<?php endfor; endif; ?>
											<?php }?>
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />
											
											<div class="slicemoreprice showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice addonrowline" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></div>
										</span>	
										<!--Slice options addons price-->
									</div>
									
									
								
							</div>
						<?php endfor; endif; ?>
						</div>
					
			<?php endfor; endif; ?>
			<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['total'];?>
" />
		</div>
		</div>
		</div>
		
		<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
		<div class="col-sm-offset-4 col-sm-2">
			<a onclick="addCreateMoreAddons_first();"  class="btn btn-success btn-sm" id="madAddons_firstajax"><i class="glyphicon glyphicon-edit marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_create_addons'];?>
</a>
		</div>
	<?php }?>
	
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="menuAddons") {?>
		<!-- Addons List from menu mgmt -->
		<div id="showcataddonsList1" class="showcataddonsList_delete">
		<div class="myaccMenudiv myaccMenudivNew frt">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
			<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
            
            <input type='hidden' class="selectoptionsFirst" id="selectoptions" name='selectoptions' value='<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
' />
            <span class="selectoptionVal"></span>
            			
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>
				<tr>
					<td align="left" width="25%" height="35">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
    							<?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonspriceoption']=='Paid') {?>
    								<td align="left" width="35%" height="20">								
    									<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id']==$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonid']) {?>checked="checked"<?php }?>/> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
</label>								
    								</td>
    								<td width="50%" height="20">
    									<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonspriceoption']=='Paid') {?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
&nbsp;
    									<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsprice']==''||$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsprice']=='0'||$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonspriceoption']=='Free') {?> style="display:none;" <?php }?>>
    										<span class="flt"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
:</span><span class="priceSpan"> <input type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons_price]" id="addonsprice" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsprice'];?>
" size="10" readonly="" class="numericfield"/> </span>
    									</span>
    								</td>
    							<?php }?>
							</tr>
						</table>
						
						
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" />
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['menu_addonid'];?>
" />
						
						
						<?php $_smarty_tpl->tpl_vars['showSubAddonslist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option']), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value!='') {?>
                    <b style="cursor:pointer;" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']));?>
&nbsp;<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/> &nbsp;<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/></b><?php }?>						
						<div class="clr"></div>
						<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>>
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['name'] = "subaddon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total']);
?>						
							<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
" />
							
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr class="trMenu">
									<td align="left" width="30%" height="35" valign="top">									
    									<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
    										<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id']==$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']) {?>checked="checked"<?php }?> /> &nbsp;<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</label>
    									<?php } else { ?>
    										<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" />
    										<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</label>
    									<?php }?>
									</td>
									
									<td align="left" width="10%" height="35" valign="top" class="td1">
										<label><input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free" value="Free" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free') {?>checked="checked"<?php }?>/>&nbsp;<span class="btnName" > <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>
 </span></label>
									</td>
									
									<td align="left" width="10%" height="35" valign="top">
										<label><input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']!='Free') {?>checked="checked"<?php }?>/>  &nbsp;<span class="btnName" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
</span></label>
									</td>
                                    
									<td align="left" headers="35" valign="top" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free') {?>style="display:none;"<?php }?> id="addonspricefreepaid_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" width="40%">
										<!--Fixed option's addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed">
											<span class="btnName"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_price'];?>
 :</span>
                                            <span class="priceSpan"> 
                                                <input class="paidTxtBox numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Fixed<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Fixed<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Fixed<?php }?>';"/>											
												
											</span>	
										</span>
										<!--Fixed option's addons price-->
										
										<!--Size option's addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size">
											<span class="btnName">Price :</span>
                                            <span class="priceSpan">
                                                <input class="paidTxtBox numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Small<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Small<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Small<?php }?>';"/>
												<input class="paidTxtBox numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Medium<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Medium<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']);
} else { ?>Medium<?php }?>';" />
												<input class="paidTxtBox numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Large<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Large<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']);
} else { ?>Large<?php }?>';" />
											</span>
										</span>
										<!--Size option's addons price-->
										
										<!--Slice options addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="priceSpan showprice_slice">
										
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
" />	
											
											<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']!='') {?>
                                            <?php $_smarty_tpl->tpl_vars['sliceaddonprice_arr'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']), null, 0);?>	
											
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
    												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
    												<input class="paidTxtBox numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]==0.00) {?>Price<?php } else {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
}?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='0.00') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>			
												<?php endfor; endif; ?>										
											<?php } else { ?>											
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
    												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
    												<input class="paidTxtBox numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['cntSliceAddons']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]==0.00) {?>Price<?php } else {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
}?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='0.00') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
												<?php endfor; endif; ?>
											<?php }?>
											
											
											
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />
											
											<span class="slicemoreprice addonrowline" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></span>
										</span>	
										<!--Slice options addons price-->										
									</td>
									
                                    
									<td valign="top" style="cursor:pointer;" width="10%" > 
									<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']!='') {?>
										<span class="btnName" style="color:#ff0000;" onclick="return removeAddon(<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['category_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['restaurant_id'];?>
,'<?php echo addslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
','<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
');" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_remove'];?>
</span>
									<?php }?>
									</td>
                                    
								</tr>
							</table>
						<?php endfor; endif; ?>
						</div>
					</td>
				</tr>
			<?php endfor; endif; ?>
			<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['total'];?>
" />
		</table>
		</div>
		
		<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
		
		<a onclick="addCreateMoreAddons_first();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons" id="madAddons_first"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_create_addons'];?>
</a>	
		<input type="hidden" name="sizeoption_addmoreaddonedit" id="sizeoption_addmoreaddonedit" value="<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
" />	
		</div>									
	 <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['action']->value=="deleteAddons") {?>
    
        <div class="col-sm-8 col-sm-offset-4">
		
			<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
			<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
            
            <input type='hidden' class="selectoptionsFirst" id="selectoptions" name='selectoptions' value='<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
' />
            <span class="selectoptionVal"></span>
            			
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>
				
						
						
						
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" />
						<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['menu_addonid'];?>
" />
						
						
						<?php echo $_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsListEdit($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option'],$_smarty_tpl->tpl_vars['menuid']->value);?>

												
						<?php if ($_smarty_tpl->tpl_vars['cntmenuSubAddons1']->value>0) {?><b style="cursor:pointer;" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']));?>
&nbsp;<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/> &nbsp;<img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/></b><?php }?>						
						<div class="clr"></div>
						<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>>
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['name'] = "subaddon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["subaddon"]['total']);
?>	
							<div class="form-group">					
							<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
" />
							
						
									<div class="col-sm-3">									
    									<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
    										<label class="checkbox-inline">
    											<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id']==$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']) {?>checked="checked"<?php }?> /><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>

    										</label>
    									<?php } else { ?>
    										<label class="checkbox-inline">	
    											<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" /><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>

    										</label>
    									<?php }?>
									</div>
									
									<div class="col-sm-2">
										<label class="radio-inline"><input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free" value="Free" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free') {?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_free'];?>
 </label>
									
										<label  class="radio-inline"><input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']!='Free') {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_paid'];?>
</label>
									</div>
                                    
									<div class="col-sm-5">	
										<!--Fixed option's addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed">
                                                <input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>		
										</span>
										<!--Fixed option's addons price-->
										
										<!--Size option's addons price-->
										<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size">
											
                                            <div class="col-sm-4">
                                                <input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
                                            </div>
                                            <div class="col-sm-4">
												<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']);
} else { ?>Price<?php }?>';" />
											</div>
											<div class="col-sm-4">
												<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']);
} else { ?>Price<?php }?>';" />
											</div>
										</div>
										<!--Size option's addons price-->
										
										<!--Slice options addons price-->
										<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="priceSpan showprice_slice">
										
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
" />	
														
											<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']!='') {?>
												<?php echo $_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']);?>

												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
    												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
    												<div class="col-sm-4">
    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]!='') {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>	
    												</div>		
												<?php endfor; endif; ?>										
											<?php } else { ?>											
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
    												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
    												<div class="col-sm-4">
    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['cntSliceAddons']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]!='') {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
    												</div>
												<?php endfor; endif; ?>
											<?php }?>
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />
											
											<div class="slicemoreprice addonrowline" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></div>
										</div>	
										<!--Slice options addons price-->	
									</div>									
									
									
                                   
									<div class="col-sm-2">
									 <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']!='') {?>
									 	 <span class="btn btn-danger btn-sm"  onclick="return removeAddon(<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['category_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['restaurant_id'];?>
,'<?php echo addslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
','<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
');" ><i class="glyphicon glyphicon-remove"></i>
									 	 </span>
									 <?php }?>
									</div>
                                    
								</div>
						<?php endfor; endif; ?>
						</div>
					
			<?php endfor; endif; ?>
			<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['total'];?>
" />
		
		</div>
		
		<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
		
		<div class="col-sm-offset-4 col-sm-2 marTop10">
			<a onclick="addCreateMoreAddons_first();" class="btn btn-success btn-sm"  id="madAddons_first"><i class="glyphicon glyphicon-edit marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_create_addons'];?>
</a>	
		</div>
		<input type="hidden" name="sizeoption_addmoreaddonedit" id="sizeoption_addmoreaddonedit" value="<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
" />	
        
   
    <?php }?>
	
	
	
	
	<?php if ($_smarty_tpl->tpl_vars['action']->value=="menuPriceDetails") {?>
		<div class="addPageCont">		
		  
			<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_menu_price'];?>
</span>
			<span class="colon1">:</span>
			<span class="myaccMenudiv myaccMenudivNew frt">
				<span class="row-fluid">
					<span class="span3 offset0"><input type="radio" name="sizeoption" id="sizeoption_fixedprice_edit" value="fixed" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {?>checked="checked"<?php }?> onclick="return fixedOption_Edit();"/><label class="btnName"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_fixed_price'];?>
</label></span>
					<span class="span3 offset0"><input type="radio" name="sizeoption" id="sizeoption_default_edit" value="default" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> onclick="return defaultOption_Edit();"/><label class="btnName"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_size'];?>
</label></span>
					<span class="span3 offset0"><input type="radio" name="sizeoption" id="sizeoption_other_edit" value="other" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice') {?>checked="checked"<?php }?> onclick="return otherOption_Edit();"/><label class="btnName"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_slice'];?>
</label></span>
				</span>
			</span>
            <!-- Fixed -->
			<span id="fixedOption1" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>style="display:none;"<?php }?> class="clr addPageCont">
				<span class="myaccMenudiv frt">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="left" width="16%" height="30">
								<input class="textbox textboxNew numericfield" type="text" name="menu_price" id="menu_price1_edit" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_price']);?>
" placeholder="Price"/>
							</td>
						</tr>
					</table>
				</span>
			</span>
			<!-- Size -->
			<span id="pizzaDefaultOption1" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {?>style="display:none;"<?php }?> class="clr addPageCont">
				<span class="myaccMenudiv frt">
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" width="16%" height="30">
							<input type="checkbox" name="small" id="small1" value="small" onclick="showSmallPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_small']=='small') {?>checked="checked"<?php }?> /><label class="btnNameMenu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_small'];?>
</label>
						
							<span id="smallpriceshowedit" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_small']!='small') {?>style="display:none;"<?php }?> class="textboxAddonsizeName">
							<input type="text" name="smallval" id="smallval1" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']!='0.00') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value'];
}?>" class="textboxAddonsize numericfield" placeholder="Price" />
							</span><br />
						</td>
					</tr>
					
					<tr>
						<td align="left" width="16%" height="30">
							<input type="checkbox" name="medium" id="medium1" value="medium" onclick="showMediumPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_medium']=='medium') {?>checked="checked"<?php }?> /><label class="btnNameMenu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_medium'];?>
</label>
							<span id="mediumpriceshowedit" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_medium']!='medium') {?>style="display:none;"<?php }?> class="textboxAddonsizeName">
							<input type="text" name="mediumval" id="mediumval1" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']!='0.00') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value'];
}?>" class="textboxAddonsize numericfield" placeholder="Price" /></span><br />
						</td>
					</tr>
					
					<tr>
						<td align="left" width="16%" height="30">
							<input type="checkbox" name="large" id="large1" value="large" onclick="showLargePrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_large']=='large') {?>checked="checked"<?php }?> /><label class="btnNameMenu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_large'];?>
</label>
							<span id="largepriceshowedit" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_large']!='large') {?>style="display:none;"<?php }?> class="textboxAddonsizeName">
							<input type="text" name="largeval" id="largeval1" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']!='0.00') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value'];
}?>" class="textboxAddonsize numericfield" placeholder="Price" /></span>
						</td>
					</tr>
				</table>				
				</span>
			</span>
			<!-- Slice -->
			<span id="pizzaOtherOption1" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {?>style="display:none;"<?php }?> class="clr addPageCont">
				<span class="myaccMenudiv frt">
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['name'] = "slicelist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaSlicelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total']);
?>
					<tr>
						<td align="left" width="16%" height="40">
							<input type="text" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizename]" id="sizename1" value='<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_name']);?>
' class="textboxAddonsize span2 slicevalidate"/> &nbsp;&nbsp;
							<input type="text" class="textboxAddonsize span2 slicevalidate numericfield" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizevalue]" id="sizevalue1" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_price'];?>
" /> 
						</td>
					</tr>					
										
					<?php endfor; endif; ?>
					</table>
				</span>
				<div class="clr"></div>
				<span class="myaccMenudiv myaccMenudivNew frt">
				<table id="specialPizzaSize" border="0" width="100%">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
					<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
					<input type="hidden" name="size_option[<?php echo $_smarty_tpl->tpl_vars['sliceList']->value;?>
][sliceeditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->tpl_vars['sliceList']->value]['pizza_slice_id'];?>
" />
					<?php endfor; endif; ?>
					<tfoot><tr>
					<td class="left" height="20">
						<a onclick="addMorePizzaSize();" style="color:#ff0000;cursor:pointer;"><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_add_more_slice'];?>
</span></a>
					</td>
					</tr></tfoot>
				</table>
				</span>
			</span>
		
	  </div>
	<?php }?>	

<?php if ($_smarty_tpl->tpl_vars['action']->value=='Bookings') {?>
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_bookings.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="bookingFullDetails") {?>
<!-- Order Full details POPUP -->
	<!--<div class="addtocartPopupHead">
		<h1 class="addtocartPopupHeadNew"><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
</h1>
		<h1 class="addtocartPopupHeadNew">Order No - <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</h1>
		<div class="addtoCartClose" data-dismiss="modal" ></div>
	</div>-->

	<div class="inlineblock">
		<h1 class="bookingHeading"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantname']->value);?>
 Booking Details</h1>
		<ul class="thanksUlNew1Book">
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_guests'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['num_guests'];?>
</span>
			</li>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingdate'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_date'];?>
</span>
			</li>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingtime'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_time'];?>
</span>
			</li>
		
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookname'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_name']));?>
</span>
			</li>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookemail'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_email']);?>
</span>
			</li>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_booktmobile'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_mobileno'];?>
</span>
			</li>
			<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_phoneno']!='') {?>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingtelephone'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_phoneno']));?>
</span>
			</li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_ext']!='') {?>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingext'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_ext'];?>
</span>
			</li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_instruction']!='') {?>
			<li>
				<span class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookinginst'];?>
</span>
				<span class="colon">:</span>
				<span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['booking_instruction']));?>
</span>
			</li>
			<?php }?>
		</ul>
	</div>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='restaurantInvoiceDetails') {?>
<?php echo $_smarty_tpl->tpl_vars['objResInvoice']->value->inv_deli_order_list();?>

	<div class="rightContBody">
		<div class="riteContWrap1"> 
			<div style="display:block; width:96%; padding:0 2%;"> 
	
			<span id="backtoinvoice"><input type="button" value="Back" onclick="return backtoinvoice();"></span>
	        <div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top;margin-top:15px;">
				<div style="display:block; width:100%; vertical-align:top;">
					<!--  Logo  -->
					<div style="display:inline-block; width:100%; padding-bottom:20px;">
						<div style="display:inline-block; width:49%; vertical-align:top;">
							<div style="display:inline-block; width:100%; vertical-align:top; font-size:20px; font-weight:bold; padding-bottom:5px;">Invoice  <?php echo $_smarty_tpl->tpl_vars['invoice_gen_no']->value;?>
</div>
							<div style="display:inline-block; width:100%; vertical-align:top padding-bottom:5px;;">Invoice Date :  <?php echo $_smarty_tpl->tpl_vars['invoice_sent_date']->value;?>
</div>
							<div style="display:inline-block; width:100%; vertical-align:top; padding-bottom:5px;">Period : (<?php echo $_smarty_tpl->tpl_vars['inv_period']->value;?>
)</div>
						</div>
						<div style="display:inline-block; width:49%; vertical-align:top; float:right;">
						
						<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" style="float:right;" />
						</div>
					</div>
					<!--  Address  -->
					<div style="display:inline-block; width:100%; border-top:1px solid #000; padding-top:20px;">
						<div style="display:inline-block; width:49%; vertical-align:top;">
							<div style="width:100%; font-family:Arial; font-size:13px; font-weight:bold;">Restaurant</div>
							<div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['res_det']->value[0]['res_name']);?>
</div>
							<?php if ($_smarty_tpl->tpl_vars['res_det']->value[0]['res_st_address']!='') {?><div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['res_det']->value[0]['res_st_address']);?>
</div><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['res_det']->value[0]['res_city']!='') {?><div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['res_det']->value[0]['res_city']);
if ($_smarty_tpl->tpl_vars['res_det']->value[0]['res_zip']!='') {?>-<?php echo stripslashes($_smarty_tpl->tpl_vars['res_det']->value[0]['res_zip']);
}?></div><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['res_det']->value[0]['res_state']!='') {?><div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['res_det']->value[0]['res_state']);?>
</div><?php }?>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Account number : </span>HB<?php echo $_smarty_tpl->tpl_vars['res_det']->value[0]['restaurant_generate_id'];?>
</div>
							</div>
						</div>
						<div style="display:inline-block; width:49%; vertical-align:top; float:right; text-align:right;">
							<div style="display:block; width:100%; font-family:Arial; font-size:13px;">
								<div style="display:inline-block; vertical-align:top;"><?php echo $_smarty_tpl->tpl_vars['site_address']->value;?>
</div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Tel : </span><?php echo $_smarty_tpl->tpl_vars['SITE_PHONE']->value;?>
</div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Email : </span><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_INVOICE_EMAIL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['SITE_INVOICE_EMAIL']->value;?>
</a></div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Website : </span><?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
</div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">VAT Registration : </span><?php echo $_smarty_tpl->tpl_vars['SITE_VAT_NO']->value;?>
</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Invoice List  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
				
					<div style="clear:both;"></div>
					<table width="100%" align="center"  style="font:13px Arial;">
						<tr style="border-bottom:1px solid #000; font-size:18px;">
							<th width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Invoice breakdown</td>
										<td width="30%" style="text-align:right;"></td>
									</tr>
								</table>
							</th>
							<th width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-weight:bold;">Amount</th>
						</tr>
						<tr>
							<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Total value for</td>
										<td width="30%" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['total_orders']->value;?>
 orders</td>
									</tr>
								</table>
							</td>
							<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalSales']->value;?>
</td>
						</tr>
						<tr>
							<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Customers paid cash for</td>
										<td width="30%" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['total_orders_cash']->value;?>
 orders</td>
									</tr>
								</table>
							</td>
							<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalSales_cash']->value;?>
</td>
						</tr>
						<tr>
							<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Customers prepaid online with card for </td>
										<td width="30%" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['total_orders_cc']->value;?>
 orders</td>
									</tr>
								</table>
							</td>
							<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalSales_cc']->value;?>
</td>
						</tr>
					</table>
					<table width="100%" align="center" style="font:13px Arial;">
	                    <tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">Admin fee and charges</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['admin_service_fee_charge']->value;?>
</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['rest_comm_order_per']->value;?>
% commission on orders</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalCommission']->value;?>
</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">UK VAT (<?php echo $_smarty_tpl->tpl_vars['uk_vat_per']->value;?>
%):</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['uk_vat_cal']->value;?>
</td>
						</tr>
	                    <tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Total amount owed to <?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
:</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['net_amt_vat']->value;?>
</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">Total owned to restaurant (<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalSales_cc']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['net_amt_vat']->value;?>
):</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['total_owned_to_restaurant']->value;?>
</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Account balance carried forward from previous invoice <?php echo $_smarty_tpl->tpl_vars['prev_inv_cont']->value;?>
<br />(Note: This should be &pound;0.00 if the previous amount is positive, because it had been paid by <?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
)</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['previous_invoice_balance']->value;?>
</td>
						</tr>
						<tr height="1"><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3; font-weight:bold;">Total payable to restaurant (this invoice):</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3; font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['total_payable_to_restaurant']->value;?>
</td>
						</tr>
					</table>
				</div>
				
				<!-- Hunger Buster  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
					<div style="display:block; width:80%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;"><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
 will pay <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['total_payable_to_restaurant']->value;?>
<br /> into your account: <?php echo $_smarty_tpl->tpl_vars['res_det']->value[0]['res_ac_no'];?>
</div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px; line-height:20px;margin-bottom:10px;">The sort code and account number on this invoice are masked for your protection  if the unmasked section of these fields appears to be incorrect or if you have any questions regarding this invoice please call us on Tel: <?php echo $_smarty_tpl->tpl_vars['SITE_PHONE']->value;?>
 or write to us at <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['SITE_INVOICE_EMAIL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['SITE_INVOICE_EMAIL']->value;?>
</a></div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px; padding-bottom:10px; border-bottom:1px solid #000; margin-bottom:20px;">Amount will be paid in your account on or around the <?php echo $_smarty_tpl->tpl_vars['payment_send_date']->value;?>
</div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:20px;line-height:20px;">If you have any question regarding this invoice or changes to your information, please contact <?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
 at Tel: <?php echo $_smarty_tpl->tpl_vars['SITE_PHONE']->value;?>
 or via e-mail at: <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['SITE_INVOICE_EMAIL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['SITE_INVOICE_EMAIL']->value;?>
</a></a></div>
				</div>
				
				<!-- Other Service  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
					<div style="display:block; width:100%; font-family:Arial; font-size:20px; font-weight:bold; padding-bottom:15px; border-bottom:1px solid #000;margin-bottom:15px;">Other services charges for this period</div>
					<table width="100%" align="center" style="font-size:13px; font-family:Arial; line-height:22px;">
						<thead>
						  <tr>
							<th style="text-align:center; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Date</th>
							<th style=" text-align:left; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Narrative</th>
							<th style="text-align:center; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Quantity</th>
							<th style="text-align:right; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Price</th>
							<th style="text-align:center; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Discount</th>
							<th style="text-align:right; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Net</th>
						  </tr>
						 </thead>
						 <tbody>
						  <tr>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['endeddate']->value,"%d %b %Y");?>
</td>
							 <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Card Payment fees (on <?php echo $_smarty_tpl->tpl_vars['total_orders_cc']->value;?>
 payments worth <?php echo $_smarty_tpl->tpl_vars['totalSales_cc']->value;?>
)</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">1</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['card_payment_fees']->value;?>
</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">&nbsp;</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['card_payment_fees']->value;?>
</td>
						  </tr>
	                      <?php if ($_smarty_tpl->tpl_vars['othername1']->value!='') {?>
						  <tr>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['endeddate']->value,"%d %b %Y");?>
</td>
							 <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['othername1']->value;?>
</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">1</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['otherprice1']->value;?>
</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">&nbsp;</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['otherprice1']->value;?>
</td>
						  </tr>
	                      <?php }?>
	                      <?php if ($_smarty_tpl->tpl_vars['othername2']->value!='') {?>
						  <tr>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['endeddate']->value,"%d %b %Y");?>
</td>
							 <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['othername2']->value;?>
</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">1</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['otherprice2']->value;?>
</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">&nbsp;</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['otherprice2']->value;?>
</td>
						  </tr>
	                      <?php }?>
						  <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Subtotal services:</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['admin_service_fee_charge']->value;?>
</td>
						  </tr>
						  <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Subtotal commission on orders:</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalCommission']->value;?>
</td>
						  </tr>
						  <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">UK VAT (<?php echo $_smarty_tpl->tpl_vars['uk_vat_per']->value;?>
%):</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['uk_vat_cal']->value;?>
</td>
						  </tr>
	                      <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;">Total Service Charges:</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['net_amt_vat']->value;?>
</td>
						  </tr>
						 </tbody>
					</table>
				</div>
				
				<!-- Order Detail  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px; border-top:1px solid #000000; padding-top:15px;">
					<div style="display:block; width:100%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;">Order details</div>
					<table width="100%" align="center" style="font-size:13px; font-family:Arial; line-height:22px;">
					<thead>
					  <tr>
						<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">#</th>
						<th style=" text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Date</th>
						<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Order No</th>
						<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Paid Mtd</th>
						<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Value</th>
						<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Commission</th>
						<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Total</th>
					  </tr>
					 </thead>
					 <tbody>
					  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['inv'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['name'] = 'inv';
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['inv_deli_order']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['inv']['total']);
?>
	                  <?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['inv']['rownum'], null, 0);?>
					  <tr>
						<td width="5%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['inv']['rownum'];?>
</td>
						<td width="10%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['deliverydate'],"%a %d %b %Y");?>
</td>
						<td width="15%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php echo $_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['ordergenerateid'];?>
 <?php if ($_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='cc'||$_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='CC'||$_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='paypal'||$_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='creditcard') {?>(card fee: <?php echo $_smarty_tpl->tpl_vars['SITE_CC_PERCENTAGE']->value;?>
)<?php }?></td>
						<td width="10%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php if ($_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='cod') {?>Cash<?php } elseif ($_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='CC') {?>Credit Card<?php } elseif ($_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type']=='paypal') {?>Paypal<?php } else {
echo $_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['payment_type'];
}?></td>
						<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php echo $_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['ordertotalprice'];?>
</td>
						<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['res_comm_price'];?>
</td>
						<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['inv_deli_order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inv']['index']]['res_comm_price'];?>
</td>
					  </tr>
					  <?php endfor; endif; ?>
					  <tr>
						<td colspan="7" align="right" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff;border-bottom:2px solid #f5950c;/*4bacc6*/ font-weight:bold;">Subtotal commission on orders: <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalCommission']->value;?>
</td>
					 </tbody>
				</table>
				</div>
				
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:15px;">
					<div style="display:block; width:100%; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:5px;">Partner tariff</div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:5px;">Your current commission is: <?php echo $_smarty_tpl->tpl_vars['rest_comm_order_per']->value;?>
% per order</div>
				</div>	
			</div>
		
		</div>
		
	</div>
	</div>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="booktable") {?>
    <?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_bookings_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="rest_status") {?>
    <a  class="ownername"><?php echo $_smarty_tpl->tpl_vars['rest_status']->value;?>
</a>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="resownerEditCommissionInfoList") {?>
    <h1 class="restOwnMyHead">Commission</h1>
			<a class="btn btn-warning pull-right btn-sm" href="javascript:void(0);" onclick="editCommissionInfoShow();"><i class="glyphicon glyphicon-edit marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setdeliveredit'];?>
</a>
			<!-- Content start -->
			<div class="addPageCont">
				<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_setcommission'];?>
</span>
				<span class="colon1">:</span>
				<span class="addPageRightFont"><?php echo $_smarty_tpl->tpl_vars['restaurantDetailsList']->value[0]['restaurant_commission'];?>
</span>
			</div>
<?php }?>




    <?php echo '<script'; ?>
 type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    <?php echo '</script'; ?>
>

<?php }} ?>
