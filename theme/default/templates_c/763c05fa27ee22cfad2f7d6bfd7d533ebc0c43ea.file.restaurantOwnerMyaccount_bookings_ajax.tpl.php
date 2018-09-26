<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-08 14:00:31
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_bookings_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52725521458c054cf84b272-04663734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '763c05fa27ee22cfad2f7d6bfd7d533ebc0c43ea' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_bookings_ajax.tpl',
      1 => 1466424462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52725521458c054cf84b272-04663734',
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
    'orderAccept' => 0,
    'orderReject' => 0,
    'ordersList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c054cfcaa655_82652692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c054cfcaa655_82652692')) {function content_58c054cfcaa655_82652692($_smarty_tpl) {?>	
	
	<div class="clr"></div>


	<div class="detailsInnerNewWrap">
		<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookings'];?>
</h1>
		<!-- Pagination start -->
		<?php if ($_smarty_tpl->tpl_vars['ordersListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
		<!-- Pagination end -->
		<?php if ($_smarty_tpl->tpl_vars['succ_msg']->value!='') {?><div class="ownerSucc succmsg1 text-red"><?php echo $_smarty_tpl->tpl_vars['succ_msg']->value;?>
</div><?php }?>
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingtotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['ordersList_orderCnt']->value;?>
</span></li>
                <li><span class="order">Accept :</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['orderAccept']->value;?>
</span></li>
                <li><span class="order">Reject :</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['orderReject']->value;?>
</span></li>
			</ul>
			<div class="newSelect1">
				<b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingsortby'];?>
 : </b>
				<select name="sortby" onchange="return changeSortbyStatus(this.value,'Bookings');">
				<option value="">Select</option>
				<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerstatus'];?>
">
					<option value="accept" <?php if ($_GET['sortby']=='accept'||$_REQUEST['sortbystatus']=='accept') {?>selected="selected"<?php }?> >Accept</option>
					<option value="reject" <?php if ($_GET['sortby']=='reject'||$_REQUEST['sortbystatus']=='reject') {?>selected="selected"<?php }?>>Reject</option>
				</optgroup>
				</select>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-striped table-bordered restownertable">
				<tbody>
					<tr>
						<th width="2%"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_booking_hash']);?>
</th>
                        <th width="9%"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_booking_id']);?>
</th>
						<th width="9%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_guests'];?>
</th>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingdate'];?>
</th>
						<th width="7%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingtime'];?>
</th>
						<th width="7%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookname'];?>
</th>
						<th width="0%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookemail'];?>
</th>
						<th width="7%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_booktmobile'];?>
</th>
						<th width="12%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookedat'];?>
</th>
                        <th width="12%"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_booking_status']);?>
</th>
						
						<th width="9%"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingviewdetails']);?>
</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookinggenerateid'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['num_guests'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['booking_date'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['booking_time'];?>
</td>
						<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['booking_name']));?>
</td>
						<td><?php echo stripslashes($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['booking_email']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['booking_mobileno'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['addeddate'];?>
</td>
                        
                        <span id="bokstatustd<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['id'];?>
">
                        <td>
                    <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookingstatus']!='accept'&&$_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookingstatus']!='reject') {?>
                    <select class="selectpicker" name="changeorderstatus" id="changeorderstatus" onchange="return bookstatus(this.value,'disclaimReason<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookinggenerateid'];?>
','<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['id'];?>
');">
                    
                    
                    <option value="" selected="selected" >select</option>
                    <option value="accept" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookingstatus']=='accept') {?>selected="selected"<?php }?> >Accept</option>
                    <option value="reject" <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookingstatus']=='reject') {?>selected="selected"<?php }?> >Reject</option>
                    </select>
                    
                    <span id="error"></span>
								<div id="disclaimReason<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookinggenerateid'];?>
" style="display:none" class="disclaimReason">
									<span class="disclaimReasonHead">Reason<span class="red">*</span></span>				
									<textarea  cols="5" rows="1" id="reason<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['id'];?>
" class="disclaimReasonArea"></textarea>
									<input type="button" onclick="return changebookOrderStatus('reject','<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['id'];?>
');" value="Submit" class="disclaimbtn">
								</div>
                    
                    
                    <?php }?>
                    
                    <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookingstatus']=='accept') {?>
						Accepted
					
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['bookingstatus']=='reject') {?>
						Rejected
						
					
                    <?php }?>
                    </span>
                    
                            
                    
                    
                    
                    
                    </td>
                        
                        
                        
                        
						
						<td>
							<a class="orderEditDetails booking_view" onclick="return bookingViewFullDetails(<?php echo $_smarty_tpl->tpl_vars['ordersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['id'];?>
);" data-target="#bookingViewFullDetailsPop" href="javascript:void(0);" data-toggle="modal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_bookingviewdetails'];?>
</a>
						</td>
					</tr>
					<?php endfor; else: ?>
					<tr class="">
						<td class="text-danger" colspan="12" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['ordersListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->		
		</div>
	</div>
	<?php }} ?>
