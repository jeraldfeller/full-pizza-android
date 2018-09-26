<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:49:23
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerMyaccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12038494945768ce5bcdba81-93895350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8d74f8fb74ee4009cdd1332e1f4916341dfbd2f' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerMyaccount.tpl',
      1 => 1466424435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12038494945768ce5bcdba81-93895350',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'objCustomer' => 0,
    'orderHistory' => 0,
    'currency' => 0,
    'customerprofiledetails' => 0,
    'showStatelist' => 0,
    'selectCityList' => 0,
    'customerFavoritesList' => 0,
    'i' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768ce5c04b218_39177081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768ce5c04b218_39177081')) {function content_5768ce5c04b218_39177081($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="myaccInnerNewMenu">
	<div class="container">
		<ul class="myaccInnerNewMenuUl">
			<li class="active" id="customer_myorder">
				<div class="history"></div>
				<div class="menuList"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_my_order_history'];?>
</div>
			</li>
			<li id="customer_profile">
				<div class="profile"></div>
				<div class="menuList"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_profile'];?>
</div>
			</li>
			<li id="customer_addressbook">
				<div class="address"></div>
				<div class="menuList"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_address_book'];?>
</div>
			</li>
			<li id="customer_changepassword">
				<div class="password"></div>
				<div class="menuList"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_change_password'];?>
</div>
			</li>
			<li id="customer_favorties">
				<div class="favorite"></div>
				<div class="menuList"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_favorites'];?>
</div>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="contain">
		
		<div class="customerTabContent myaccInnerNew" id="customer_myorder_content" >
			<div class="MyAccountBg clearfix">
				<h1 class="MyAccountBgHead"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_order_history']);?>
</h1>
				<div class="clr"></div>
				<?php $_smarty_tpl->tpl_vars['orderHistory'] = new Smarty_variable($_smarty_tpl->tpl_vars['objCustomer']->value->customerMyorderHistory(), null, 0);?>
                
                
				<div class="myAccInnerBg clearfix">
					<div class="contain" id="cus_myorder">
						<div class="tablecontainer">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr class="orderInnerHead">
                                        <td class="orderHeading" width="5%">S No</td>
										<td class="orderHeading" width="12%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_order_number'];?>
</td>
                                        <td class="orderHeading text-center" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_order_at'];?>
</td>
                                        <td class="orderHeading" width="10%">Order Type</td>
										<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_total_price'];?>
</td>
										<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_payment'];?>
</td>
										<td class="orderHeading" width="12%"> Order Status</td>
										<td class="orderHeading" width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_viewfull_detail'];?>
</td>
										<td class="orderHeading" width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_review'];?>
</td>
									</tr>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['name'] = 'cus_ord';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['orderHistory']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_ord']['total']);
?>
									<tr class="orderInnerCont">
                                        <td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['rownum'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['ordergenerateid'];?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['usertype']=='G') {?>Guest<?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['orderdate'];?>
</td>
                                        <td><?php echo ucfirst($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['deliverytype']);?>
</td>
										<td><span class="rupeeImg"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</span> <span class="rupeePrice"><?php echo $_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['ordertotalprice'];?>
</span></td>
										<td><?php if ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['payment_type']=='cod') {?>Cash on Delivery<?php } else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['payment_type']));
}?></td>
										
										<td>
											<?php if ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['status']=='completed') {?>Delivered
											<?php } else {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['status']));?>

											<?php }?> 
										</td>
										<td >
											<a class="viewFullDetails bold" onclick="orderViewFullDetails(<?php echo $_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['orderid'];?>
);" href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_viewfull_detail'];?>
</a> 
										</td>
										<td>
											<div class="star_full">
                                            <?php if ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['status']=='completed') {?>
                                                <?php if ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='0'||$_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='') {?>
                                                    <a class="orderEditDetailsview orderEditDetailsviewNew1 bold" onclick="return customerReviews('<?php echo $_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['orderid'];?>
','<?php echo $_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['restaurant_id'];?>
');" data-target="#customerReviewsPop" href="javascript:void(0);" data-toggle="modal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_review'];?>
</a>
                                                <?php } else { ?>   
                                                                                                 
                                                    <?php if ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='1') {?> <span class="reviewStar reviewStar1"></span>
                        							<?php } elseif ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='2') {?> <span class="reviewStar reviewStar2"></span>
                        							<?php } elseif ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='3') {?><span class="reviewStar reviewStar3"></span>
                        							<?php } elseif ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='4') {?> <span class="reviewStar reviewStar4"></span>
                        							<?php } elseif ($_smarty_tpl->tpl_vars['orderHistory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_ord']['index']]['rating']=='5') {?> <span class="reviewStar"></span>
                        							<?php }?>
                                                <?php }?>
                                            <?php }?>
                                            </div>
                                        </td>
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
			</div>
			
		</div>
		
		
		<div class="customerTabContent" id="customer_profile_content" style="display:none;">
			<div class="myaccInnerNew">
				<div class="MyAccountBg clearfix">
					<h1 class="MyAccountBgHead">Profile Info</h1>
					<div class="clr"></div>
					<div class="myAccInnerBg clearfix">
						<div class="form-horizontal">
							<div class="form-group no-margin-bottom">
								<div class="col-sm-4 col-sm-offset-4">
									<div class="mandatoryField marTop10">
										<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
										- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_Mandatory'];?>

									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<div id="profileerrormsg" class="errormsg_login"></div>
									<div id="profilesuccessmsg" class="succmsg"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="firstname"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_first_name'];?>
</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="firstname" id="firstname"  value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_name']);?>
" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="lastname"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_last_name'];?>
</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="lastname" id="lastname"  value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_lastname']);?>
" />
								</div>
							</div>
						
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="customeremail"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_email'];?>
</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="customeremail" id="customeremail" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_email']);?>
" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="customerphone"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_mobile_phone'];?>
</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="customerphone" id="customerphone" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['customer_phone']);?>
" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<label class="checkbox checknews">
										<input type="checkbox" class="" name="customer_news" id="customer_news" value="" <?php if ($_smarty_tpl->tpl_vars['customerprofiledetails']->value[0]['newsletter']=='Yes') {?> checked="checked" <?php }?>/><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_monthly_newsletter']);?>

									</label>
									<span id="cusnewserror" class="errClass1 "></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<input class="updateBtn" type="button" onclick="return customerUpdateProfile();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_update'];?>
" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
        
		
		<div class="customerTabContent myaccInnerNew" id="customer_addressbook_content" style="display:none;">
		
			<div class="CustomerAddress_Book" id="CustomerAddress_Book">
					
					<?php echo $_smarty_tpl->getSubTemplate ("customerMyaccount_addressBook_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			
			</div>
			
			<div class="" id="customer_address_book_edit" style="display:none;">
				
			</div>
			
			<div class="" id="customer_address_book_add" style="display:none;">
				<div class="MyAccountBg clearfix">
					<h1 class="MyAccountBgHead">Add Your Address</h1>
					<div class="mandatoryField">
						<a class="addressbook-lnk" href="javascript:void(0);" onclick="return backtolist();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i>Address List</a>
					</div>
					<div class="clr"></div>
					<div class="myAccInnerBg clearfix form-horizontal">
						<div class="form-group no-margin-bottom">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="mandatoryField">
									<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
									- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_Mandatory'];?>

								</div>
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<div class="col-sm-6 col-sm-offset-4">
								<div class="restRightContNew">
									<span class="myAddressEdit1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_an_updo'];?>
.</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
								<span id="errormsg" class="errormsg_login"></span>
								<span id="successmsg" class="succmsg"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
								<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_address_title']);?>

							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="address_title" id="address_title_new" value="" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_plot_apt_door_numb'];?>
</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="doornumber" id="doornumber_new" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_customer_street'];?>

							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="customerstreet" id="customerstreet_new" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_state'];?>

							</label>
							<div class="col-sm-4">
								<select name="customer_state" id="customer_state_new" class="form-control" onchange="getCityListCusAdd(this.value);">
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
" ><?php echo stripslashes($_smarty_tpl->tpl_vars['showStatelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statename']);?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>						
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_city'];?>

							</label>
							<div class="col-sm-4">
								<div id="showCusAddCityList">
									<select name="customer_city" id="customer_city_new" class="form-control">
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
" ><?php echo stripslashes($_smarty_tpl->tpl_vars['selectCityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['city']['index']]['cityname']);?>
</option>
										<?php endfor; endif; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_zip'];?>

							</label>
							<div class="col-sm-4">
								<div id="showCusZipAddList">
									<input type="text" class="form-control" name="customer_zip" id="customer_zip_new" autocomplete="off" value="" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_landmark'];?>
</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="landmark" id="landmark_new" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_landline'];?>
</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="landline" id="landline_new" value=""  />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_address_label'];?>
</label>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_home" value="home" />
									<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_home'];?>

								</label>
								<label class="radio-inline">
									<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_off" value="office" />
									<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_office'];?>

								</label>
								<label class="radio-inline">
									<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_other" value="other" />
									<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_other'];?>

								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
								<input class="updateBtn" id="NewButton" type="button" onclick="return CusAddNewAddress();" value="Submit" />
							</div>			
						</div>
					</div>
				</div>
			</div>
		</div>
		
        
		
		<div class="customerTabContent" id="customer_changepassword_content" style="display:none;">
			<div class="myaccInnerNew">
				<div class="MyAccountBg clearfix">
					<h1 class="MyAccountBgHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_change_password'];?>
</h1>
					
					<div class="clr"></div>
					<div class="myAccInnerBg clearfix form-horizontal">
						<div class="form-group no-margin-bottom">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="mandatoryField">
									<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span>
									- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_Mandatory'];?>

								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
								<div id="changeerrormsg" class="errormsg_login"></div>
							</div>
						</div>	
						
						
						<div class="form-group">
							<label class="control-label col-sm-4"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_new_password'];?>
</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="newpassword" id="newpassword" value="" autocomplete="off"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_retype_new_password'];?>
</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="retypepassword" id="retypepassword" value="" autocomplete="off"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
								<input class="updateBtn" type="button" onclick="return customerChangePassword();" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_change_password'];?>
" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="customerTabContent" id="customer_favorties_content" style="display:none;">
		<?php echo $_smarty_tpl->tpl_vars['objCustomer']->value->customerMyFavoritesList();?>

		
		<div class="myaccInnerNew">
			<div class="MyAccountBg clearfix">
				<h1 class="MyAccountBgHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_title'];?>
</h1>
				<div class="clr"></div>
				<div class="myAccInnerBg clearfix">
					<div class="favoriteListDetails">
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
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['name'] = 'cus_fav';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customerFavoritesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_fav']['total']);
?>
							<tr class="orderInnerCont">
								<td height="27"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
								<td eight="27"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_id'];?>
&resname=<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_seourl'];
} else { ?>menu/<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_seourl'];
}?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['restaurant_name']);?>
</a></td>
								<td eight="27"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['adddate'],"%d-%m-%Y %H:%M");?>
</td>
								<td eight="27"><a href="javascript:void(0);" onclick="changeStatusOptionFav('delete','<?php echo $_smarty_tpl->tpl_vars['customerFavoritesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_fav']['index']]['id'];?>
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
			</div>
				</div>
			</div>
		</div>
		
		</div>
	</div>
</div>
<div id="customFooter" >
	<?php echo $_smarty_tpl->getSubTemplate ('main_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<!-- Order Full Details POP -->
<div id="orderViewFullDetailsPop" style="display:none;height:460px;">
	<div class="addtoCartInner">
		<div class="addtocartPopup">
			<div id="customerOrderFullDetailsList"></div>
		</div>
	</div>
</div>

<!--Customer Reviews Popup -->
<div id="customerReviewsPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="addtoCartInner">
				<div class="customaddtocartPopupHead">
					<h1 class="addtocartPopupHeadNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_review'];?>
</h1>
					<div class="addtoCartClose" data-dismiss="modal"></div>
				</div>
				<div class="customaddtocartPopup popMinheight" >
					<div class="customaddtocartWrap">
					
					<form name="customer_review" class="form-horizontal" method="post" onsubmit="return customerReviewsSubmit();" action="">
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
								<div id="errormsg_review" class="errormsg_login"></div>
							</div>
						</div>
						<input type="hidden" name="orderid" class="orderid" />
						<input type="hidden" name="resid" class="resid" />
						<div class="form-group">
							<label class="control-label col-sm-4 font-normal">
								<span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_rating'];?>

							</label>
							<div class="col-sm-5">
								<label class="radio-inline" >
									<input type="radio" name="rating" class="rating1 btn" id="rating1" value="1"  /> 1
								</label>
								<label class="radio-inline" >
									<input type="radio" name="rating" class="rating2 btn" id="rating2" value="2"  /> 2
								</label>
								<label class="radio-inline" >
									<input type="radio" name="rating" class="rating3 btn" id="rating3" value="3"  /> 3
								</label> 
								<label class="radio-inline" >
									<input type="radio" name="rating" class="rating4 btn" id="rating4" value="4"  /> 4
								</label> 
								<label class="radio-inline" >
									<input type="radio" name="rating" class="rating5 btn" id="rating5" value="5"  />5
								</label> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4 font-normal"><span class="redStar">*</span>
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_message'];?>

							</label>
							<div class="col-sm-5">
								<textarea rows="3" cols="3" name="ratingmessage" id="ratingmessage" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-offset-4">
								<input class="submit-bg" id="review" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_submit'];?>
" />
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
