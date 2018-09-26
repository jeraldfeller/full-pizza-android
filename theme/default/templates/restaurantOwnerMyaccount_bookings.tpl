<!-- Orders start -->
<div class="restaurantBookingsContent">
	{include file='restaurantOwnerMyaccount_bookings_ajax.tpl'}
</div>
<!-- Orders end -->

<!-- Order Full Details POP -->
<div id="bookingViewFullDetailsPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type="button">
					<span aria-hidden="true">X</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">{$SITE_NAME} </h4>
			</div>
			<div class="modal-body">
					<div id="bookingFullDetailsList"></div>
			</div>	
		</div>
	</div>
</div>
