<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-14 08:53:34
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/viewOrderDetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71204066257d8c2b6bdb056-54509246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcebc19db68bcaa83f3ccabc08021d011c6f153d' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/viewOrderDetails.tpl',
      1 => 1466424141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71204066257d8c2b6bdb056-54509246',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderDetails' => 0,
    'cartDetails' => 0,
    'currency' => 0,
    'subtotal' => 0,
    'salestax' => 0,
    'taxamount' => 0,
    'deliverycharge' => 0,
    'orderDiscountPrice' => 0,
    'tipamount' => 0,
    'total' => 0,
    'restaurantname' => 0,
    'gprs_option' => 0,
    'printer_option' => 0,
    'printer_email' => 0,
    'printer_password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d8c2b7724173_36615459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d8c2b7724173_36615459')) {function content_57d8c2b7724173_36615459($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Order view full details - <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Order view full details - <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
        <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>

<div class="panel panel-default">
    <div class="panel-body">
		<div class="manageButtonLastCont">
		  <a class="btn btn-default btn-sm" href="<?php if ($_GET['pagetype']=='orderdelete') {?>restaurantDeleteOrderManage.php<?php if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}
if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['oid']!='') {?>?oid=<?php echo $_GET['oid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_GET['pagetype']=='ordermanage') {?>restaurantOrderManage.php<?php if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}
if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['oid']!='') {?>?oid=<?php echo $_GET['oid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_GET['pagetype']=='reportmanage') {?>restaurantReportManage.php<?php if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}
if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['oid']!='') {?>?oid=<?php echo $_GET['oid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
}?>">Back</a>
		</div>

		
			<div class="addtocartWrap">
				
					<div class="thanksTableOrderview table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr class="">
                                <th width="5%">S no</th>
								<th width="40%">Item</th>
								<!--<th width="30%">Addon</th>-->
								<th width="25%">Qty</th>
								<th width="15%">Price</th>
								<th width="15%">Total Price</th>
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
							<tr class="">
                                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ord']['rownum'];?>
</td>
								<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuname']));?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size']!='') {?>(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['pizza_size'];?>
)<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']!='') {?><br /> Addons : (<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']));?>
)<?php }?></td>
								<!--<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['addonsname']));?>
</td>-->
								<td><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['quantity'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['menuprice'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ord']['index']]['tot_menuprice'];?>
</td>
							</tr>
							<?php endfor; endif; ?>
							<tr class="">
								<td colspan="4" align="right">Total</td>
								<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
							</tr>
							<tr class="">
								<td colspan="4" align="right">Tax <?php if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00') {?>(<?php echo $_smarty_tpl->tpl_vars['salestax']->value;?>
%)<?php }?></td>
								<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['taxamount']->value;?>
</td>
							</tr>
							<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']=='delivery') {?>
							<tr class="">
								<td colspan="4" align="right">Delivery Charges</td>
								<td><?php if ($_smarty_tpl->tpl_vars['deliverycharge']->value=='0.00') {?>0.00<?php } else {
echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['deliverycharge']->value;
}?></td>
							</tr>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue']!='') {?>
							<tr class="">
								<td colspan="4" align="right">Discount(<?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['offervalue'];?>
 % Off)</td>
								<td><?php if ($_smarty_tpl->tpl_vars['orderDiscountPrice']->value=='0.00') {?>0.00<?php } else { ?>- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['orderDiscountPrice']->value;
}?></td>
							</tr>
							<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['tipamount']!='0.00') {?>
							<tr class="">
								<td colspan="4" align="right">Tip</td>
								<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['tipamount']->value;?>
</td>
							</tr>
							<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_id']!=''&&$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']>0) {?>
                                <tr class="">
    								<td colspan="4" align="right">Voucher Discount Price</td>
    								<td>- <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_price']);?>
</td>
    							</tr>
                            <?php }?>
							<tr class="">
								<td colspan="4" align="right">Final Total</td>
								<td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
							</tr>
						</table>
					</div>
				
				
				<!--ORDER DETAILS-->
                    <div class="contain">
                       <div class="col-sm-6">
                            <div class="addPageCont"><h1><b>Order Details</b></h1></div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Order Number</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['ordergenerateid'];?>
</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Order Type</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']));?>
</span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytype']=='delivery') {?>
                            <div class="addPageCont">
                                <span class="orderLeft">Delivery Time</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['foodassoonas']=='1') {?>As Soon As Possible<?php } else {
echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydate'];?>
 &nbsp; <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverytime'];
}?></span>
                            </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_code']!='') {?>
                            <div class="addPageCont">
                                <span class="orderLeft">Voucher Code</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['voucher_code'];?>
</span>
                            </div>
                            <?php }?>
                            <div class="addPageCont">
                                <span class="orderLeft">Order Status</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {?>Delivered<?php } else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']));
}?></span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Order Date</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['orderDetails']->value[0]['orderdate'],"%d-%m-%Y, %I:%M %p");?>
</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Restaurant</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['restaurantname']->value));?>
</span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']!='') {?>
                                <div class="addPageCont">
                                    <span class="orderLeft">Instruction</span>
                                    <span class="colon1">:</span>				
                                    <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['instructions']));?>
</span>
                                </div>
                            <?php }?>
                           </div>
                       <div class="col-sm-6">
                            <!--CUSTOMER DETAILS-->
                            <div class="addPageCont"><h1><b>Customer Details</b></h1></div>
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Name</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customername']));?>
 <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customerlastname']));?>
</span>
                            </div>
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Email</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customeremail']));?>
</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Address</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydoornumber']!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverydoornumber']));?>
, <br><?php }
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystreet']));?>
,<?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverycity']!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverycity']));?>
,<?php }
if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystate']!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliverystate']));
}
if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip']!='') {?> - <?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['deliveryzip'];
}?></span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Phone Number</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['customercellphone']));?>
</span>
                            </div>
                            </div>
                     </div>
                     <div class="contain">
                        <div class="col-sm-6">
                        <!--PAYMENT DETAILS-->
                        <div class="addPageCont"><h1><b>Payment Details</b></h1></div>
                            <div class="addPageCont">
                                <span class="orderLeft">Payment Method</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']));?>
</span>
                            </div>
                            <div class="addPageCont">
                                <span class="orderLeft">Payment Status</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_status']=='P') {?>Paid<?php } elseif ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_status']=='NP') {?>Not Paid<?php }?></span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='CC'||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='P'||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='creditcard'||$_smarty_tpl->tpl_vars['orderDetails']->value[0]['payment_type']=='paypal') {?>
                            <div class="addPageCont">
                                <span class="orderLeft">Transaction Id</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo $_smarty_tpl->tpl_vars['orderDetails']->value[0]['transaction_id'];?>
</span>
                            </div>
                            <?php }?>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['gprs_option']->value=='Yes') {?>
                        <div class="col-sm-6">
                            <!--PRINTER DETAILS-->
                            <div class="addPageCont"><h1><b>Printer Details</b></h1></div>
                            <div class="addPageCont">
                                <span class="orderLeft">GPRS Printer Option</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['gprs_option']->value);?>
</span>
                            </div>
                            <div class="addPageCont">
            					<span class="orderLeft">Order is sent to Printer</span>
            					<span class="colon1">:</span>				
            					<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_sent']);?>
</span>
            				</div>
                            <div class="addPageCont">
            					<span class="orderLeft">Printer received or not the order</span>
            					<span class="colon1">:</span>				
            					<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_response']);?>
</span>
            				</div>
                            <div class="addPageCont">
            					<span class="orderLeft">Printer acknowledgement</span>
            					<span class="colon1">:</span>				
            					<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_ack']);?>
</span>
            				</div>
                            <?php if ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='failed') {?>
                            <div class="addPageCont">
            					<span class="orderLeft">Rejected Reason</span>
            					<span class="colon1">:</span>				
            					<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_ack_msg']);?>
</span>
            				</div>
                            <?php } elseif ($_smarty_tpl->tpl_vars['orderDetails']->value[0]['status']=='completed') {?>
                            <div class="addPageCont">
            					<span class="orderLeft">Food Ready/Deliver Time</span>
            					<span class="colon1">:</span>				
            					<span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderDetails']->value[0]['printer_res_deli_time']);?>
</span>
            				</div>
                            <?php }?>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Google Cloud Printer Option</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['printer_option']->value);?>
</span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['printer_option']->value=='Yes') {?>
                            <div class="addPageCont">
                                <span class="orderLeft">Printer email</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['printer_email']->value);?>
</span>
                            </div>
                            <div class="addPageCont">
                                <span class="orderLeft">Printer password</span>
                                <span class="colon1">:</span>				
                                <span class="value"><?php echo stripslashes($_smarty_tpl->tpl_vars['printer_password']->value);?>
</span>
                            </div>
                            <?php }?>
                         </div>
                         <?php }?>
                     </div>
			</div>
		
        <div class="col-sm-12">
		<div class="manageButtonLastCont">
		<a class="btn btn-default btn-sm" href="<?php if ($_GET['pagetype']=='orderdelete') {?>restaurantDeleteOrderManage.php<?php if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}
if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['oid']!='') {?>?oid=<?php echo $_GET['oid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_GET['pagetype']=='ordermanage') {?>restaurantOrderManage.php<?php if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}
if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['oid']!='') {?>?oid=<?php echo $_GET['oid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_GET['pagetype']=='reportmanage') {?>restaurantReportManage.php<?php if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}
if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['oid']!='') {?>?oid=<?php echo $_GET['oid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
}?>">Back</a>
		</div>
    </div>
	</div>

</div><?php }} ?>
