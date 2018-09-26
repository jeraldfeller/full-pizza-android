<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-09 03:05:08
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_order_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40689456357d1d98cedd578-64030209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dda70da6288ed921e9686f0ebb88de42fc94b97' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_order_ajax.tpl',
      1 => 1466424468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40689456357d1d98cedd578-64030209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'ordersListCnt' => 0,
    'pagination' => 0,
    'succ_msg' => 0,
    'ordersList_orderCnt' => 0,
    'delivered_ord' => 0,
    'processing_ord' => 0,
    'pending_ord' => 0,
    'failed_ord' => 0,
    'ordersList' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d1d98d523996_25726956',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d1d98d523996_25726956')) {function content_57d1d98d523996_25726956($_smarty_tpl) {?><div class="detailsInnerNewWrap">	
	<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_order'];?>
</h1>
	<div class="clr"></div>

	<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['ordersListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->
	
		
		<?php if ($_smarty_tpl->tpl_vars['succ_msg']->value!='') {?><div class="ownerSucc succmsg1 text-center" id="msg"><?php echo $_smarty_tpl->tpl_vars['succ_msg']->value;?>
</div><?php }?>
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_ordertotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['ordersList_orderCnt']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderdeliver'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['delivered_ord']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderprocessing'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['processing_ord']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderpending'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['pending_ord']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderfailed'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['failed_ord']->value;?>
</span></li>
			</ul>
			<div class="frt">
				<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_ordersortby'];?>
 : </span>
				<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Order');" class="selectpicker">
					<option value="">All</option>
					<option value="pending" <?php if ($_GET['sortby']=='pending'||$_REQUEST['sortbystatus']=='pending') {?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptpending'];?>
</option>
					<option value="processing" <?php if ($_GET['sortby']=='processing'||$_REQUEST['sortbystatus']=='processing') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptprocessing'];?>
</option>
					<option value="completed" <?php if ($_GET['sortby']=='completed'||$_REQUEST['sortbystatus']=='completed') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptdelivered'];?>
</option>
					<option value="failed" <?php if ($_GET['sortby']=='failed'||$_REQUEST['sortbystatus']=='failed') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptfailed'];?>
</option>
				</select>
				
			</div>
		</div>
		<div class="ordersInnerWrap">
			<div class="contain" id="rest_myorder">
				<table class="table table-hover table-striped restownertable">
					<tbody>
						<tr>
							<th width="1%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_sno'];?>
</th>
							<th width="8%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderno'];?>
</th>
							<th width="11%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_ordertime'];?>
</th>
							<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_ordertype'];?>
</th>
							<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_ordertotprice'];?>
</th>
							<th width="12%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_paymenttype'];?>
</th>
							<th width="8%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_ordername'];?>
</th>
							<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderaddress'];?>
</th>
							<th width="13%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderat'];?>
</th>
							<th width="9%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderstatus'];?>
</th>
							<th width="10%" class="last_priceTd"> Details</th>
						</tr>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['order'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['order']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['name'] = 'order';
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ordersList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['sno'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['ordergenerateid'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverydate'];?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['foodassoonas']=='1') {?>ASAP<?php } else {
echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverytime'];
}?></td>
							<td><?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverytype']=='delivery') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_delivery'];
} elseif ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverytype']=='pickup') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_pickup'];
}?></td>
							<td><span class="rupeeImg2"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;</span><span class="rupeePrice"><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['ordertotalprice'];?>
</span></td>
							<td><?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['payment_type']=='cod') {
echo $_smarty_tpl->tpl_vars['LANG']->value['res_cash_on_del'];
} else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['payment_type']));
}?></td>
							<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['customername']));?>
</td>
							<td class="indentZero"><?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverydoornumber']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverydoornumber']);?>
,<?php }
echo stripslashes($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['deliverystreet']);?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderdate'];?>
</td>
							<td valign="top" width="30%">
								<span id="ordstatustd<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
">
								<!--<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='completed'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='failed') {?>
									<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
');">
									<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='pending') {?>
										<option value="pending" selected="selected" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptpending'];?>
</option>
									<?php }?>
										<option value="processing" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='processing') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptprocessing'];?>
</option>
										<option value="completed" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='completed') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptdelivered'];?>
</option>
										<option value="failed" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='failed') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptfailed'];?>
</option>
									</select>
									<a class="orderEditDetails" href="javascript:void(0);">Edit Status</a>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='completed') {?>
									<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptdelivered'];?>

								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='failed') {?>
									<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_orderoptfailed'];?>

								<?php }?>-->
								<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='processing'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='failed'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='completed'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='testing') {?>
								<select class="selectpicker" name="changeorderstatus" id="changeorderstatus" onchange="return disclaimOrder(this.value,'disclaimReason<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['ordergenerateid'];?>
','<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
');">
								
									<option value="pending" selected="selected" >Pending</option>
								
								
									<option value="processing" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='processing') {?>selected="selected"<?php }?> >Accept</option>
									<option value="failed" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='failed') {?>selected="selected"<?php }?> >Disclaim</option>
                                    
									
								</select>
                                <span id="error"></span>
								<div id="disclaimReason<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['ordergenerateid'];?>
" style="display:none" class="disclaimReason">
									<span class="disclaimReasonHead">Reason<span class="red">*</span></span>				
									<textarea  cols="5" rows="1" id="reason<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
" class="disclaimReasonArea"></textarea>
									<input type="button" onclick="return changeOrderStatus('failed','<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
');" value="Submit" class="disclaimbtn">
								</div>
								<?php }?>
								
								<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='processing'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='failed'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='completed'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']!='testing') {?>
								<select class="selectpicker" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
');">
								    
									<option value="processing" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='processing') {?>selected="selected"<?php }?>>Processing</option>
									<option value="completed" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='completed') {?>selected="selected"<?php }?>>Delivered</option>
									
								</select>
								
								<?php }?>
								
							 	<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='completed') {?>
								Delivered
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='failed') {?>
								Failed
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['status']=='testing') {?>
								Testing
								<?php }?>
								</span>
							</td>
							<td align="center">
								<a class="orderEditDetails" onclick="return orderViewFullDetails(<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderid'];?>
);" href="javascript:void(0);"></a>
							</td>
						</tr>
						<?php endfor; else: ?>
    					<td class="text-danger" colspan="11" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
    					<?php endif; ?>
					</tbody>
				</table>	
			</div>	
			<div class="contain" id="rest_fullorder"></div>
		</div>
		<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['ordersListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->
	</div>
		<!-- Order Full Details POP -->
<div id="orderViewFullDetailsPop" style="display:none;">
	<div class="addtoCartInner">
		<div class="addtocartPopup">
			<div id="orderFullDetailsList"></div>
		</div>
	</div>
</div>
<?php }} ?>
