<div class="riteCont1Inner">
	<h1 class="restDashHead">Setting</h1>
	<h1 class="frt"><a href="restaurantManage.php" style="cursor:pointer;"> Back </a></h1>
	
		<div class="riteCont1Inner">
			<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Logo </span>
			<span class="colon1">:</span>
			<div class="logoUpload">
				<div class="logo">
					<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$restaurantEditList.0.restaurant_logo}" alt="image" >
				</div>
			</div>
		</div>	
		
		<div class="addPageCont">
			<span class="addPageRightFont">About Restaurant</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_description|stripslashes}</span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Restaurant delivery estimated time </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_estimated_time|stripslashes}</span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Delivery </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_delivery}</span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Open & Close timings </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrs1">First Opening Time<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrs1">First Closing Time<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrs1">Second Opening Time<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrs1">Second Closing Time<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Monday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.mon_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.mon_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.mon_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.mon_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Tuesday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.tue_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.tue_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.tue_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.tue_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Wednesday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.wed_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.wed_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.wed_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.wed_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Thursday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.thu_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.thu_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.thu_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.thu_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Friday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.fri_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.fri_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.fri_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.fri_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Saturday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.sat_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.sat_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.sat_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.sat_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Sunday </span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet">{$restauEditDetTiming.0.sun_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.sun_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
            <span class="DeliveryHrsdet">{$restauEditDetTiming.0.sun_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restauEditDetTiming.0.sun_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		{*<div class="addPageCont">
			<span class="addPageRightFont">Delivery Areas </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$servingareas}</span>
		</div>*}
		{if $restaurantEditList.0.restaurant_delivery eq 'Yes'}
		<div class="addPageCont">
			<span class="addPageRightFont">Delivery Charge </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{if $restaurantEditList.0.restaurant_delivery_charge eq '0.00'}Free{else}{$restaurantEditList.0.restaurant_delivery_charge|stripslashes}{/if}</span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Min Order </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_minorder_price|stripslashes}</span>
		</div>
	    {/if}
       
		<div class="addPageCont">
			<span class="addPageRightFont">Sales Tax </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_salestax|stripslashes}</span>
		</div>
	
		<div class="addPageCont">
			<span class="addPageRightFont">Serving Cuisines </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$servingcuisine}</span>
		</div>
		
	</div>
</div>