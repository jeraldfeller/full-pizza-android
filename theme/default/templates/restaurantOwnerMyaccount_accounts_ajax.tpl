<div class="detailsInnerNewWrap">
		<h1 class="restOwnMyHead">{$LANG.res_myaccount_acc}</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="showEditAccounts();">{$LANG.res_myaccount_accedit}</a>
		
		<div class="ordersInnerWrap">
			<div id="accountinfo" class="succmsg"></div>
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr class="orderInnerHead">
					<td class="orderHeading" width="50%">{$LANG.res_myaccount_acc1}</td>
					<td class="orderHeading" width="50%">{$LANG.res_myaccount_acc2}</td>
				</tr>
			
				{$objRestaurant->restaurantDetailsList()}
				<tr class="orderInnerCont"> 
					<td>{$LANG.res_myaccount_accresname}</td>
					<td>{$restaurantDetailsList.0.restaurant_name|stripslashes}</td>
				</tr>	
				<tr class="orderInnerCont colorBgGray"> 
					<td>{$LANG.res_myaccount_accresphone}</td>
					<td>{$restaurantDetailsList.0.restaurant_phone|stripslashes}</td>
				</tr>
				<tr class="orderInnerCont"> 
					<td>{$LANG.res_myaccount_accreswebsite} </td>
					<td>{$restaurantDetailsList.0.restaurant_website|stripslashes}</td>
				</tr>
				<tr class="orderInnerCont colorBgGray"> 
					<td>{$LANG.res_myaccount_accresfax} </td>
					<td>{$restaurantDetailsList.0.restaurant_fax|stripslashes}</td>
				</tr>
				<tr class="orderInnerCont"> 
					<td>{$LANG.res_myaccount_accaddress} </td>
					<td>{$restaurantDetailsList.0.restaurant_streetaddress|stripslashes}</td>
				</tr>
				
				<tr class="orderInnerCont colorBgGray">
					<td>{$LANG.res_myaccount_accstate} </td>
					<td>{$restaurantDetailsList.0.restaurant_state}</td>
				</tr>
				<tr class="orderInnerCont">
					<td>{$LANG.res_myaccount_acccity} </td>
					<td>{$restaurantcity}</span>
				</tr>
				<tr class="orderInnerCont colorBgGray">
					<td>{$LANG.res_myaccount_acczip} </td>
					<td>{$restaurantzip}</td>
				</tr>
				<tr class="orderInnerCont">
					<td>{$LANG.res_myaccount_acccontactname} </td>
					<td>{$restaurantDetailsList.0.restaurant_contact_name|stripslashes}</td>
				</tr>
				<tr class="orderInnerCont colorBgGray">
					<td>{$LANG.res_myaccount_acccontactphone} </td>
					<td>{$restaurantDetailsList.0.restaurant_contact_phone|stripslashes}</td>
				</tr>
				<tr class="orderInnerCont">
					<td>{$LANG.res_myaccount_acccontactemail} </td>
					<td>{$restaurantDetailsList.0.restaurant_contact_email|stripslashes}</td>
				</tr>
		<!-- Accounts end -->
			</table>
		</div>
	</div>