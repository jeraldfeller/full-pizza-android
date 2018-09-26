<div class="riteCont1Inner">
	<h1 class="restDashHead">Account</h1>
	<h1 class="frt"><a href="restaurantManage.php" class="btn btn-default">Back</a></h1>
	<div class="riteCont1Inner">
		<!--This is Account	-->
		<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Name </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_name|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Phone </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_phone|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Website </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_website|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Fax </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_fax|stripslashes}</span>
			<span class="errClass" id="resFaxErr"></span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Street Address </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_streetaddress|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">State </span>
			<span class="colon1">:</span> 
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_state}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">City </span>
			<span class="colon1">:</span> 
			<span class="addPageRightFont">{$restaurantcity}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Zip </span>
			<span class="colon1">:</span> 
			<span class="addPageRightFont">{$restaurantzip}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Contact Name </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_contact_name|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Contact Phone </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_contact_phone|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Contact Email </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantEditList.0.restaurant_contact_email|stripslashes}</span>
		</div>
	</div>
</div>