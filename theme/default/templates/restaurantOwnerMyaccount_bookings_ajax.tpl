	
	
	<div class="clr"></div>
{*$objRestaurant->bookingsList()*}

	<div class="detailsInnerNewWrap">
		<h1 class="restOwnMyHead">{$LANG.res_myaccount_bookings}</h1>
		<!-- Pagination start -->
		{if $ordersListCnt gt 0} {$pagination} {/if}
		<!-- Pagination end -->
		{if $succ_msg neq ''}<div class="ownerSucc succmsg1 text-red">{$succ_msg}</div>{/if}
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myaccount_bookingtotal}:</span><span class="value">{$ordersList_orderCnt}</span></li>
                <li><span class="order">Accept :</span><span class="value">{$orderAccept}</span></li>
                <li><span class="order">Reject :</span><span class="value">{$orderReject}</span></li>
			</ul>
			<div class="newSelect1">
				<b>{$LANG.res_myaccount_bookingsortby} : </b>
				<select name="sortby" onchange="return changeSortbyStatus(this.value,'Bookings');">
				<option value="">Select</option>
				<optgroup label="{$LANG.res_myaccount_offerstatus}">
					<option value="accept" {if $smarty.get.sortby eq 'accept' or $smarty.request.sortbystatus eq 'accept'}selected="selected"{/if} >Accept{*$LANG.res_myaccount_offeractivate*}</option>
					<option value="reject" {if $smarty.get.sortby eq 'reject' or $smarty.request.sortbystatus eq 'reject'}selected="selected"{/if}>Reject{*$LANG.res_myaccount_offerdeactivate*}</option>
				</optgroup>
				</select>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-striped table-bordered restownertable">
				<tbody>
					<tr>
						<th width="2%">{$LANG.res_booking_hash|utf8_encode}</th>
                        <th width="9%">{$LANG.res_booking_id|utf8_encode}</th>
						<th width="9%">{$LANG.res_myaccount_guests}</th>
						<th width="10%">{$LANG.res_myaccount_bookingdate}</th>
						<th width="7%">{$LANG.res_myaccount_bookingtime}</th>
						<th width="7%">{$LANG.res_myaccount_bookname}</th>
						<th width="0%">{$LANG.res_myaccount_bookemail}</th>
						<th width="7%">{$LANG.res_myaccount_booktmobile}</th>
						<th width="12%">{$LANG.res_myaccount_bookedat}</th>
                        <th width="12%">{$LANG.res_booking_status|utf8_encode}</th>
						{*<th width="8%">{$LANG.res_myaccount_bookstatus}</th>*}
						<th width="9%">{$LANG.res_myaccount_bookingviewdetails|utf8_encode}</th>
					</tr>
					{section name=order loop=$ordersList}
					<tr>
						<td>{$ordersList[order].sno}</td>
                        <td>{$ordersList[order].bookinggenerateid}</td>
						<td>{$ordersList[order].num_guests}</td>
						<td>{$ordersList[order].booking_date}</td>
						<td>{$ordersList[order].booking_time}</td>
						<td>{$ordersList[order].booking_name|ucfirst|stripslashes}</td>
						<td>{$ordersList[order].booking_email|stripslashes}</td>
						<td>{$ordersList[order].booking_mobileno}</td>
						<td>{$ordersList[order].addeddate}</td>
                        
                        <span id="bokstatustd{$ordersList[order].id}">
                        <td>
                    {if $ordersList[order].bookingstatus neq 'accept' and $ordersList[order].bookingstatus neq 'reject' }
                    <select class="selectpicker" name="changeorderstatus" id="changeorderstatus" onchange="return bookstatus(this.value,'disclaimReason{$ordersList[order].bookinggenerateid}','{$ordersList[order].id}');">
                    
                    
                    <option value="" selected="selected" >select</option>
                    <option value="accept" {if $ordersList[order].bookingstatus eq 'accept'}selected="selected"{/if} >Accept</option>
                    <option value="reject" {if $ordersList[order].bookingstatus eq 'reject'}selected="selected"{/if} >Reject</option>
                    </select>
                    
                    <span id="error"></span>
								<div id="disclaimReason{$ordersList[order].bookinggenerateid}" style="display:none" class="disclaimReason">
									<span class="disclaimReasonHead">Reason<span class="red">*</span></span>				
									<textarea  cols="5" rows="1" id="reason{$ordersList[order].id}" class="disclaimReasonArea"></textarea>
									<input type="button" onclick="return changebookOrderStatus('reject','{$ordersList[order].id}');" value="Submit" class="disclaimbtn">
								</div>
                    
                    
                    {/if}
                    
                    {if $ordersList[order].bookingstatus eq 'accept'}
						Accepted
					
                    {/if}
                    {if $ordersList[order].bookingstatus eq 'reject'}
						Rejected
						
					
                    {/if}
                    </span>
                    
                            
                    
                    
                    
                    
                    </td>
                        
                        
                        
                        
						{*<td>
							{if $ordersList[order].status eq '1'}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','{$ordersList[order].id}','Bookings')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
						{else}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','{$ordersList[order].id}','Bookings')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
						{/if}
						{*	<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','{$ordersList[order].id}','Bookings');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a> 
						</td>*}
						<td>
							<a class="orderEditDetails booking_view" onclick="return bookingViewFullDetails({$ordersList[order].id});" data-target="#bookingViewFullDetailsPop" href="javascript:void(0);" data-toggle="modal">{$LANG.res_myaccount_bookingviewdetails}</a>
						</td>
					</tr>
					{sectionelse}
					<tr class="">
						<td class="text-danger" colspan="12" align="center">{$LANG.res_myaccount_no_rec_found}</td>
					</tr>
					{/section}
				</tbody>
			</table>
			<!-- Pagination start -->
	{if $ordersListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->		
		</div>
	</div>
	