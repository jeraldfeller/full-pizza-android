<div style="width: 100%; margin-top: 40px;" class="container">
	<div class="row">		
		<div class="col-md-1 col-sm-2 col-xs-3 partialHeader">
			<a style="max-width: 100%;" href="/index.php">
				<img class="img-responsive homeLogo home" src="theme/default/images/home.png">
			</a>
		</div>
		<div class="col-md-3 col-sm-2 hidden-xs partialHeader" style="height: 60px;"></div>
		<div class="col-md-5 col-sm-4 col-xs-6 partialHeader">
			<img class="img-responsive fullPizzaLogo" src="theme/default/images/Logotipo.png">
		</div>
		<div class="col-md-2 col-sm-2 hidden-xs partialHeader" style="height: 60px;"></div>
	</div>
</div>

<br>

<div class="row">
	{*<div class="col-md-12" style="height: 30px; width: 1000px;">
		<img style="max-width: 100%; max-height: 100%;" class="" src="theme/default/images/Reticula.png">
		

	</div> *}
	<div class="col-md-12 carlos">
		

	</div> 


</div>


<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button> 
    {*<a class="navbar-brand" href="#">Logotipo</a>*}
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="myaccInnerNewMenuUlNew nav navbar-nav">
      <li class="active" id="customer_myorder"><a href="#">{$LANG.customer_myacc_my_order_history}</a></li>
      <li id="customer_profile"><a href="#">{$LANG.customer_myacc_profile}</a></li>
      <li id="customer_addressbook"><a href="#">{$LANG.customer_myacc_address_book}</a></li>
      <li id="customer_changepassword"><a href="#">{$LANG.customer_myacc_change_password}</a></li>
      <li id="customer_favorties"><a href="#">{$LANG.cus_myacc_favorites}</a></li>     
    </ul>
  </div>
</nav>


<!-- <div class="myaccInnerNewMenu">
	<div class="container">
		<ul class="myaccInnerNewMenuUl">
			<li class="active" id="customer_myorder">
				<div class="history"></div>
				<div class="menuList">{$LANG.customer_myacc_my_order_history}</div>
			</li>
			<li id="customer_profile">
				<div class="profile"></div>
				<div class="menuList">{$LANG.customer_myacc_profile}</div>
			</li>
			<li id="customer_addressbook">
				<div class="address"></div>
				<div class="menuList">{$LANG.customer_myacc_address_book}</div>
			</li>
			<li id="customer_changepassword">
				<div class="password"></div>
				<div class="menuList">{$LANG.customer_myacc_change_password}</div>
			</li>
			<li id="customer_favorties">
				<div class="favorite"></div>
				<div class="menuList">{$LANG.cus_myacc_favorites}</div>
			</li>
		</ul>
	</div>
</div> -->
<div class="container">
	<div class="contain">
		{*-------------------------- My Order List Start --------------------------------------------*}

		<div class="customerTabContent myaccInnerNew" id="customer_myorder_content" >
			<div style="padding: 0;" class="MyAccountBg clearfix">

				<img style="width: 40%;margin-left: 30%;margin-top: 2%;margin-bottom: 1%;" class="" src="theme/default/images/MyOrderHistory.png">

				<div class="reticulaInterna"></div>

				<div style="padding: 15px">
					

					<!-- <h1 class="MyAccountBgHead">{$LANG.cus_order_history|utf8_encode}</h1> -->
					<div class="clr"></div>
					{assign var = orderHistory value = $objCustomer->customerMyorderHistory()}
	                {*<div id="order_filter">
	                    <span class="sortbytext">From</span>
	    				<input type="text" id="order_from" name="order_from" value="{$smarty.request.startdate}" size="15" class="sortbyline"/>
	    				<span class="sortbytext">To</span>
	    				<input type="text" id="order_to" name="order_to" value="{$smarty.request.enddate}" size="15" class="sortbyline"/>
	    				<span class="showBtn"><input type="submit" name="actionsubmit" value="Show" id="show" onclick="return order_validate();"/></span>
	                </div>*}
	                
					<div class="myAccInnerBg clearfix">
						<div class="contain" id="cus_myorder">
							<div class="tablecontainer">
									<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr class="orderInnerHead">
	                                        <td class="orderHeading" width="5%">{*$LANG.customer_myacc_order_number*}S No</td>
											<td class="orderHeading" width="12%">{$LANG.customer_myacc_order_number}</td>
	                                        <td class="orderHeading text-center" width="15%">{$LANG.customer_myacc_order_at}</td>
	                                        <td class="orderHeading" width="10%">{*$LANG.customer_myacc_order_at*}Order Type</td>
											<td class="orderHeading" width="15%">{$LANG.customer_myacc_total_price}</td>
											<td class="orderHeading" width="15%">{$LANG.customer_myacc_payment}</td>
											<td class="orderHeading" width="12%">{*$LANG.customer_myacc_status*} Order Status</td>
											<td class="orderHeading" width="15%">{$LANG.cus_myacc_viewfull_detail}</td>
											<td class="orderHeading" width="10%">{$LANG.cus_myacc_review}</td>
										</tr>
										{section name=cus_ord loop=$orderHistory}
										<tr class="orderInnerCont">
	                                        <td>{$smarty.section.cus_ord.rownum}</td>
											<td>{$orderHistory[cus_ord].ordergenerateid}&nbsp;{if $orderHistory[cus_ord].usertype eq 'G'}Guest{/if}</td>
	                                        <td>{$orderHistory[cus_ord].orderdate}</td>
	                                        <td>{$orderHistory[cus_ord].deliverytype|ucfirst}</td>
											<td><span class="rupeeImg">{$currency}</span> <span class="rupeePrice">{$orderHistory[cus_ord].ordertotalprice}</span></td>
											<td>{if $orderHistory[cus_ord].payment_type eq 'cod'}Cash on Delivery{else}{$orderHistory[cus_ord].payment_type|ucfirst|stripslashes}{/if}</td>
											
											<td>
												{if $orderHistory[cus_ord].status eq 'completed'}Delivered
												{else}{$orderHistory[cus_ord].status|ucfirst|stripslashes}
												{/if} 
											</td>
											<td >
												<a class="viewFullDetails bold" onclick="orderViewFullDetails({$orderHistory[cus_ord].orderid});" href="javascript:void(0);">{$LANG.cus_myacc_viewfull_detail}</a> 
											</td>
											<td>
												<div class="star_full">
	                                            {if $orderHistory[cus_ord].status eq 'completed'}
	                                                {if $orderHistory[cus_ord].rating eq '0' or $orderHistory[cus_ord].rating eq ''}
	                                                    <a class="orderEditDetailsview orderEditDetailsviewNew1 bold" onclick="return customerReviews('{$orderHistory[cus_ord].orderid}','{$orderHistory[cus_ord].restaurant_id}');" data-target="#customerReviewsPop" href="javascript:void(0);" data-toggle="modal">{$LANG.cus_myacc_review}</a>
	                                                {else}   
	                                                                                                 
	                                                    {if $orderHistory[cus_ord].rating eq '1'} <span class="reviewStar reviewStar1"></span>
	                        							{elseif $orderHistory[cus_ord].rating eq '2'} <span class="reviewStar reviewStar2"></span>
	                        							{elseif $orderHistory[cus_ord].rating eq '3'}<span class="reviewStar reviewStar3"></span>
	                        							{elseif $orderHistory[cus_ord].rating eq '4'} <span class="reviewStar reviewStar4"></span>
	                        							{elseif $orderHistory[cus_ord].rating eq '5'} <span class="reviewStar"></span>
	                        							{/if}
	                                                {/if}
	                                            {/if}
	                                            </div>
	                                        </td>
										</tr>
										{sectionelse}
										<tr><td colspan="7" style="color:red;">{$LANG.cus_myacc_no_rec_found}</td></tr>
										{/section}
									</tbody>
								</table>		
							</div>
						</div>
	                     <!--Full Order-->
						<div class="contain" id="cus_fullorder"></div>
					</div>



				</div>

				
			</div>
			
		</div>




		
		{*--------------------------------------- My Order List END -----------------------------------------------*}
		{*--------------------------------------- Profile start ---------------------------------------------------*}
		<div class="customerTabContent" id="customer_profile_content" style="display:none;">
			<div class="myaccInnerNew">
				<div  style="padding: 0;" class="MyAccountBg clearfix">
					<img style="width: 30%;margin-left: 35%;margin-top: 2%;margin-bottom: 2%;" class="" src="theme/default/images/ProfileInfo.png">

					<div class="reticulaInterna"></div>

					<div class="clr"></div>
					

					<div class="myAccInnerBg clearfix">
						<div class="form-horizontal">
							<div class="form-group no-margin-bottom">
								<div class="col-sm-4 col-sm-offset-4">
									<div class="mandatoryField marTop10">
										<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
										- {$LANG.customer_myacc_Mandatory}
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
								<label class="control-label col-sm-4 font-normal" for="firstname"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_first_name}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="firstname" id="firstname"  value="{$customerprofiledetails.0.customer_name|stripslashes}" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="lastname"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_last_name}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="lastname" id="lastname"  value="{$customerprofiledetails.0.customer_lastname|stripslashes}" />
								</div>
							</div>
						{*	<ul class="customsignupUl">
								<li><label class="name"><span class="redStar">*</span>{$LANG.customer_myacc_customer_street}</label></li>
								<li><input type="text" class="txt" name="customerstreet" id="customerstreet" value="{$customerprofiledetails.0.customer_street|stripslashes}" /></li>
							</ul>
							*}
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="customeremail"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_email}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="customeremail" id="customeremail" value="{$customerprofiledetails.0.customer_email|stripslashes}" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4 font-normal" for="customerphone"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_mobile_phone}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="customerphone" id="customerphone" value="{$customerprofiledetails.0.customer_phone|stripslashes}" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<label class="checkbox checknews">
										<input type="checkbox" class="" name="customer_news" id="customer_news" value="" {if $customerprofiledetails.0.newsletter eq 'Yes'} checked="checked" {/if}/>{$LANG.cus_monthly_newsletter|utf8_encode}
									</label>
									<span id="cusnewserror" class="errClass1 "></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<input class="submit-bg-new" type="button" onclick="return customerUpdateProfile();" value="{$LANG.cus_myacc_update}" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{*--------------------------------------- Profile end  page ------------------------------------------*}
        {*------------------------------------------------------------------------------------------------------------------------------*}
		{*--------------------------------------- Address Book Start -----------------------------------------*}
		<div class="customerTabContent myaccInnerNew" id="customer_addressbook_content" style="display:none;">
					
		
			<div class="CustomerAddress_Book" id="CustomerAddress_Book">

												
					{include file="customerMyaccount_addressBook_ajax.tpl"}
			
			</div>
			{*----------------------Customer Address Book Edit-----------------------------*}
			<div class="" id="customer_address_book_edit" style="display:none;">
				
			</div>
			{*---------------Add New Address Book-------------------------------------*}
			<div class="" id="customer_address_book_add" style="display:none;">

				
				<div style="padding: 0;" class="MyAccountBg clearfix">

					<img style="width: 30%;margin-left: 35%;margin-top: 2%;margin-bottom: 2%;" class="" src="theme/default/images/ManageAddressBook.png">

					<div class="reticulaInterna"></div>
					<!-- <h1 class="MyAccountBgHead">Add Your Address</h1> -->

					<div style="padding: 15px">
						
						<div class="mandatoryField">
							<a class="addressbook-lnk" href="javascript:void(0);" onclick="return backtolist();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i>Address List</a>
						</div>
						<div class="clr"></div>
						<div class="myAccInnerBg clearfix form-horizontal">
							<div class="form-group no-margin-bottom">
								<div class="col-sm-4 col-sm-offset-4">
									<div class="mandatoryField">
										<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
										- {$LANG.customer_myacc_Mandatory}
									</div>
								</div>
							</div>
							<div class="form-group no-margin-bottom">
								<div class="col-sm-6 col-sm-offset-4">
									<div class="restRightContNew">
										<span class="myAddressEdit1">{$LANG.customer_myacc_an_updo}.</span>
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
									<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
									{$LANG.cus_address_title|utf8_encode}
								</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="address_title" id="address_title_new" value="" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_plot_apt_door_numb}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="doornumber" id="doornumber_new" value="" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">
									<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
									{$LANG.customer_myacc_customer_street}
								</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="customerstreet" id="customerstreet_new" value="" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">
									<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
									{$LANG.customer_myacc_state}
								</label>
								<div class="col-sm-4">
									<select name="customer_state" id="customer_state_new" class="form-control" onchange="getCityListCusAdd(this.value);">
										<option value="">{$LANG.cus_myacc_select_state}</option>
										{section name="state" loop=$showStatelist}
											<option value="{$showStatelist[state].statecode}" >{$showStatelist[state].statename|stripslashes}</option>
										{/section}
									</select>
								</div>						
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">
									<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
									{$LANG.customer_myacc_city}
								</label>
								<div class="col-sm-4">
									<div id="showCusAddCityList">
										<select name="customer_city" id="customer_city_new" class="form-control">
											<option value="">{$LANG.cus_myacc_first_sel_state}</option>
											{section name=city loop=$selectCityList}
												<option value="{$selectCityList[city].city_id}" >{$selectCityList[city].cityname|stripslashes}</option>
											{/section}
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">
									<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
									{$LANG.customer_myacc_zip}
								</label>
								<div class="col-sm-4">
									<div id="showCusZipAddList">
										<input type="text" class="form-control" name="customer_zip" id="customer_zip_new" autocomplete="off" value="" />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_landmark}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="landmark" id="landmark_new" value="" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_landline}</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="landline" id="landline_new" value=""  />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_address_label}</label>
								<div class="col-sm-4">
									<label class="radio-inline">
										<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_home" value="home" />
										{$LANG.customer_myacc_home}
									</label>
									<label class="radio-inline">
										<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_off" value="office" />
										{$LANG.customer_myacc_office}
									</label>
									<label class="radio-inline">
										<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_other" value="other" />
										{$LANG.customer_myacc_other}
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<input class="submit-bg-new" id="NewButton" type="button" onclick="return CusAddNewAddress();" value="Submit" />
								</div>			
							</div>
						</div>

					</div>
					
				</div>
			</div>
		</div>
		{*---------------------------------- Address Book End ----------------------------------------------*}
        {*-------------------------------------------------------------------------------------------------------------------------*}
		{*---------------------------------- Change Password Start -----------------------------------------*}
		<div class="customerTabContent" id="customer_changepassword_content" style="display:none;">
			<div class="myaccInnerNew">
				<div style="padding: 0;" class="MyAccountBg clearfix">
					
					<img style="width: 30%;margin-left: 35%;margin-top: 2%;margin-bottom: 2%;" class="" src="theme/default/images/ChangePassword.png">

					<div class="reticulaInterna"></div>

					<!-- <h1 class="MyAccountBgHead">{$LANG.customer_myacc_change_password}</h1> -->
					<div style="padding: 15px">
						
						<div class="clr"></div>
						<div class="myAccInnerBg clearfix form-horizontal">
							<div class="form-group no-margin-bottom">
								<div class="col-sm-4 col-sm-offset-4">
									<div class="mandatoryField">
										<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
										- {$LANG.customer_myacc_Mandatory}
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<div id="changeerrormsg" class="errormsg_login"></div>
								</div>
							</div>	
							
							{*<ul class="customsignupUl">
								<li><label class="name"><span class="redStar">*</span>{$LANG.customer_myacc_old_password}</label></li>
								<li><input type="password" class="txt" name="oldpassword" id="oldpassword" value="" /></li>
							</ul>*}
							<div class="form-group">
								<label class="control-label col-sm-4"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_new_password}</label>
								<div class="col-sm-4">
									<input type="password" class="form-control" name="newpassword" id="newpassword" value="" autocomplete="off"/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_retype_new_password}</label>
								<div class="col-sm-4">
									<input type="password" class="form-control" name="retypepassword" id="retypepassword" value="" autocomplete="off"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<input class="submit-bg-new" type="button" onclick="return customerChangePassword();" value="{$LANG.customer_myacc_change_password}" />
								</div>
							</div>
						</div>

					</div>
					
				</div>
			</div>
		</div>
		{*-------------------------------------- Change Password End ----------------------------------------------*}
		{*-------------------------------------- My Favorties List Start ------------------------------------------*}
		<div class="customerTabContent" id="customer_favorties_content" style="display:none;">
		{$objCustomer->customerMyFavoritesList()}
		
		<div class="myaccInnerNew">
			<div style="padding: 0;" class="MyAccountBg clearfix">

				<img style="width: 30%;margin-left: 35%;margin-top: 2%;margin-bottom: 2%;" class="" src="theme/default/images/MyFavoritesList.png">

				<div class="reticulaInterna"></div>

				<!-- <h1 class="MyAccountBgHead">{$LANG.cus_myacc_fav_title}</h1> -->

				<div style="padding: 15px">
					
					<div class="clr"></div>
					<div class="myAccInnerBg clearfix">
						<div class="favoriteListDetails">
							<div class="detailsInnerNewWrap">
								<div class="ordersInnerWrap">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr class="orderInnerHead">
											<td class="orderHeading" width="10%">{$LANG.cus_myacc_fav_sno}</td>
											<td class="orderHeading" width="50%">{$LANG.cus_myacc_fav_resname}</td>
											<td class="orderHeading" width="15%">{$LANG.cus_myacc_fav_adddate}</td>
											<td class="orderHeading" width="15%">{$LANG.cus_myacc_fav_action}</td>
										</tr>
										{assign var=i value=1}
										{section name=cus_fav loop=$customerFavoritesList}
										<tr class="orderInnerCont">
											<td height="27">{$i++}</td>
											<td eight="27"><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$customerFavoritesList[cus_fav].restaurant_id}&resname={$customerFavoritesList[cus_fav].restaurant_seourl}{else}menu/{$customerFavoritesList[cus_fav].restaurant_id}/{$customerFavoritesList[cus_fav].restaurant_seourl}{/if}">{$customerFavoritesList[cus_fav].restaurant_name|stripslashes}</a></td>
											<td eight="27">{$customerFavoritesList[cus_fav].adddate|date_format:"%d-%m-%Y %H:%M"}</td>
											<td eight="27"><a href="javascript:void(0);" onclick="changeStatusOptionFav('delete','{$customerFavoritesList[cus_fav].id}','favorite');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a></td>
										</tr>
										{sectionelse}
										<tr><td class="red" colspan="4" align="center">{$LANG.cus_myacc_fav_norecord}</td></tr>
										{/section}
									</tbody>
								</table>		
								</div>			
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		{*------------------------------- My Favorties List End --------------------------------------*}
		</div>
	</div>
</div>
<div id="customFooter" style="display: none;">
	{include file='main_footer.tpl'}
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
					<!-- <h1 class="addtocartPopupHeadNew">{$LANG.cus_myacc_review}</h1> -->
					<img style="width: 40%;margin-top: 2%;margin-bottom: 1%;" class="" src="theme/default/images/Reviews.png">

					<div class="reticulaInterna"></div>
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
								<span class="redStar">*</span>{$LANG.cus_myacc_rating}
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
								{$LANG.cus_myacc_message}
							</label>
							<div class="col-sm-5">
								<textarea rows="3" cols="3" name="ratingmessage" id="ratingmessage" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-offset-4">
								<input class="submit-bg-new" id="review" type="submit" value="{$LANG.cus_myacc_submit}" />
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>