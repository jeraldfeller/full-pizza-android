
<div class="heading">Restaurant <!--<a href="" class="btn btn-info btn-sm pull-right martopRgt"><i class="fa fa-mail-reply"></i></a>--></div>
<div class="adminRight">
<div class="adminTopHead">Restaurant Booking view full details - {$orderDetails.0.ordergenerateid}</div>

		<div class="manageButtonLastCont">
		  <a class="btn btn-primary btn-sm" href="restaurantBookingManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Back</a>
		</div>

		<div class="riteContWrap1">
			<div class="addtocartWrap">
				<!--ORDER DETAILS-->
				<div class="addPageCont"><h1><b>Bookings Details</b></h1></div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Number of Guests</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.num_guests}</span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Booked Date </span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_date}</span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Booked Time</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_time}</span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Name</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_name}</span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Email</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_email}</span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Restaurant</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.restaurant_name}</span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont">Mobile Number</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_mobileno}</span>
				</div>
				{if $orderDetails.0.booking_phoneno neq ''}
				<div class="addPageCont">
					<span class="addPageRightFont">Telephone Number</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_phoneno}</span>
				</div>
				{/if}
				{if $orderDetails.0.booking_ext neq ''}
				<div class="addPageCont">
					<span class="addPageRightFont">Ext</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_ext}</span>
				</div>
				{/if}
				{if $orderDetails.0.booking_instruction neq ''}
				<div class="addPageCont">
					<span class="addPageRightFont">Instructions</span>
					<span class="colon1">:</span>				
					<span class="value">{$orderDetails.0.booking_instruction}</span>
				</div>	
				{/if}			
			</div>
		</div>
		<div class="manageButtonLastCont">
		  <a class="btn btn-primary btn-sm" href="restaurantBookingManage.php?{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Back</a>
		</div>
	</div>

