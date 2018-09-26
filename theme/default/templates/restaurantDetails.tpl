{include file='home_header.tpl'}



<!-- Header Bottom line starts -->
<div class="searchAreaBgOuterBtm"></div>
{if $get_res_detail eq '1' && $res_det_status eq '1'}
<input type="hidden" id="resLat" value="{$searchrestaurantDetails.0.restaurant_lat}" />
<input type="hidden" id="resLong" value="{$searchrestaurantDetails.0.restaurant_long}" />
<div class="container hide">
    <div class="detSrchInner borderbox">
        <div class="searchMidImgNew hidden-xs  col-lg-2 col-md-2 col-sm-3 center pad0">
            <span  class="detSrchLeftImg">
                <!-- {if $searchrestaurantDetails.0.restaurant_logo neq ''}
                <img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$searchrestaurantDetails.0.restaurant_logo}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}"/>
                {else}
                <img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}"/>
                {/if} -->
                <img src="{$searchrestaurantDetails.0.restaurant_logo}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}"/>
            </span>
             {if $searchrestaurantDetails.0.restaurant_feature_status eq 'Yes'}
                <div class="featureIcon"></div>
            {/if}   
        </div>
        <div class="detSrchLeftCont col-lg-7 col-md-7 col-sm-6 pad0 searchright-xxs">
            <h1 class="searchInner1MidContHead">{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}</h1>
            <p class="searchAddressCont">{$searchrestaurantDetails.0.restaurant_streetaddress|stripslashes},&nbsp;{$searchrestaurantDetails.0.cityname|ucfirst|stripslashes}{if $searchrestaurantDetails.0.restaurant_zip neq ''}&nbsp;-&nbsp;{$searchrestaurantDetails.0.restaurant_zip|stripslashes}{/if}</p>
            <span class="contain mobilecenter">
            {if $deliveryoption eq 'Yes'}
                <span class="deliveryOrder">{$LANG.res_min_order|utf8_encode}<span style="color:#000000">{$currency}&nbsp;{$searchrestaurantDetails.0.restaurant_minorder_price|stripslashes}</span></span>
            {/if}    
                {if $searchrestaurantDetails.0.restaurant_delivery eq 'Yes' && $searchrestaurantDetails.0.restaurant_delivery_charge neq ''}
                <span class="deliveryOrder">{$LANG.res_details_shipping} :<span style="color:#000000"> {if $searchrestaurantDetails.0.restaurant_delivery_charge eq '0.00'}Free{else}{$currency}&nbsp;{$searchrestaurantDetails.0.restaurant_delivery_charge}{/if}</span></span>
                {/if}
                <span class="cuisine_types col-md-12 col-sm-12 pad0">{$searchrestaurantDetails.0.servingcuisine|truncate:120:"...":true}</span>
            </span>
        </div>   
        <div class="detSrchRight col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
			<span class="user_reviews">({$reviewscount} Reviews)</span>
            <div class="relate">
                <div class="searchStar">{$LANG.search_review}</div>
                <div class="orangeStar" style="width:{$reviewrating}%;"></div>
            </div>
            {if $voucherdis.0.voucher_name neq ''}
				<div class="voucher_code col-md-12 relative">
					<span class="scissorleft"></span>
					<span class="col-md-12 center pad0">Use our Voucher Code <span class="yellow">{$voucherdis.0.voucher_name}</span> <br />& Get <span class="yellow">{if $voucherdis.0.off_type eq 'Price'}Rs.{$voucherdis.0.off_price_percentage}{elseif $voucherdis.0.off_type eq 'Percentage'}{$voucherdis.0.off_price_percentage}%{/if}</span> Discount</span>
					<span class="scissorright"></span>
				</div>
            {/if}
			 {*{$objSearchDetails->MyFavoritesAddid($smarty.get.resid)}*}
            {if $myfavnum gt 0}
           		<a style="cursor:pointer;" class="detailsMinusicon" id="favaddrem" {if $smarty.session.customerid neq ''}onclick="myFavorites('{$smarty.get.resid}');"{else}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerLogin.php?pagetype=details&resid={$smarty.get.resid}&resname={$smarty.get.resname}{else}custLogin/details/{$smarty.get.resid}/{$smarty.get.resname}{/if}"{/if}><span>{$LANG.res_details_removefavorites}</span></a>
			{else}
				<a style="cursor:pointer;" class="detailsAddicon" id="favaddrem" {if $smarty.session.customerid neq ''}onclick="myFavorites('{$smarty.get.resid}');"{else}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerLogin.php?pagetype=details&resid={$smarty.get.resid}&resname={$smarty.get.resname}{else}custLogin/details/{$smarty.get.resid}/{$smarty.get.resname}{/if}"{/if}><span>{$LANG.res_details_addfavorites}</span></a>
			{/if}
            {*section name='pay' loop=$searchrestaurantDetailsPaymethod}
				{if $searchrestaurantDetailsPaymethod[pay].paymentinfo_id neq ''}
					<div class="cardImg"><img src="{$searchrestaurantDetailsPaymethod[pay].paymentinfo_photo}" alt="" title="" /></div>
				{/if}
            {/section*}
        </div> 
    </div>
</div>
<!-- Search Area ends -->
<div class="container hide">
    <!-- Container Inner starts -->
    <div class="ionTabs" id="tabs_1" data-name="Tabs_Group">    
        <ul class="ionTabs__head detailsMainMenuUl detailsMainMenu">
            <li class="ionTabs__tab" data-target="details_menu">
                <a href="javascript:void(0);">{$LANG.res_details_menu}</a>
            </li>
            <li  class="ionTabs__tab" data-target="details_info">
                <a href="javascript:void(0);">{$LANG.res_details_info}</a>
            </li>
            {if $searchrestaurantDetails.0.restaurant_booktable neq 'No'}
            <li  class="ionTabs__tab" data-target="details_book">
                <a href="javascript:void(0);">{$LANG.res_details_booking}</a>
            </li>
            {/if}
            <li  class="ionTabs__tab" data-target="details_offer">
                <a href="javascript:void(0);">{$LANG.res_details_offer}</a>
            </li>
            {if $searchrestaurantDetails.0.voucher_id neq ''}
            <li  class="ionTabs__tab" data-target="details_vouchers">
                <a href="javascript:void(0);">Vouchers</a>
            </li>
            {/if}
            <li  class="ionTabs__tab" data-target="details_review">
                <a href="javascript:void(0);">{$LANG.res_details_review}</a>
            </li>
            {*<li  class="ionTabs__tab" data-target="details_map">
                <a href="javascript:void(0);" >{$LANG.res_details_map}</a>
            </li>
            <li  class="ionTabs__tab" data-target="details_yelp">
                <a href="javascript:void(0);">Yelp Reviews</a>
            </li>  *}   
			{if $req_file_name eq 'restaurantDetails.php'}
			<li class="pull-right">
				<div class="cartScroll" id="cartTotal">
                    <div class="add_cart"><span id="CartCount">{if $CartCount neq ''}{$CartCount}{else}0{/if}</span></div> <p class="text">Your Cart - </p> 
                    <span class="totalPriceCount">{$currency} {if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}</span>
					<div class="cartloadingimage"><img src="{$SITE_IMAGE_URL}/menu-loading.gif" alt="loading" title="loading" /></div>
                </div>

			</li>    
			{/if}  
        </ul>
        
        <div class="ionTabs__body">
		

            {*********** Loading Image **************}
            <!--<div id="loadingimg" style="display:none;">&nbsp;</div>-->
            
            {*************************** Menu *******************************}
            <div class="ionTabs__item menutabcontent" data-name="details_menu" >
                {include file='restaurantDetails_menu.tpl'}
            </div>
            
            {*************************** Book a Table *******************************}
            {if $searchrestaurantDetails.0.restaurant_booktable neq 'No'}
            <div class="ionTabs__item" data-name="details_book" >
                {include file='restaurantDetails_bookatable.tpl'}
            </div>
            {/if} 
            
            {*************************** Offers *******************************}
            <div class="ionTabs__item" data-name="details_offer" >          
                {include file='restaurantDetails_offer.tpl'}
            </div>
            
            {*************************** Vouchers *******************************}
            <div class="ionTabs__item" data-name="details_vouchers">
				<div class="searchResultInner">      
					<div class="restDetInfo1Inner clearfix">     
						  <div class="tablecontainer">
							   <table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr class="orderInnerHead">
											<td class="orderHeading">{$LANG.res_voucher_code|utf8_encode}</td>
											 <td class="orderHeading">{$LANG.res_voucher_price|utf8_encode}</td>
											 <td class="orderHeading">Type of Use {*$LANG.res_voucher_price|utf8_encode*}</td>                    
											 <td class="orderHeading">{$LANG.res_validity|utf8_encode} </td>
										</tr>
										{section name="voucher"  loop=$voucherdis}
											{if $voucherdis[voucher].valid_from neq '' and $voucherdis[voucher].valid_to neq '' }   
												<tr class="orderInnerCont">                
													<td>{$voucherdis[voucher].voucher_name}</td>
													<td>{$voucherdis[voucher].off_price_percentage}</td>
													<td>{if $voucherdis[voucher].use_type eq 'S'} Single{else} Multiple{/if}</td>
													<td>
														<div>{$LANG.res_validity_from|utf8_encode} - {$voucherdis[voucher].valid_from|date_format:"%d/%m/%Y"}</div>
														<div>{$LANG.res_validity_to|utf8_encode} - {$voucherdis[voucher].valid_to|date_format:"%d/%m/%Y"}</div>
													</td>
												</tr>
											{/if}    
										{sectionelse}
											<tr>
												<td colspan="4" class="text-danger text-center">No vouchers found </td>                 
											</tr>
										{/section}
									</tbody>
								</table>
							</div>
					</div>
				</div>
			  </div> 
				
				{*************************** Info *******************************}
				<div class="ionTabs__item" data-name="details_info" >
					{include file='restaurantDetails_info.tpl'}
				</div>
				
				{*************************** Reviews *******************************}
				<div class="ionTabs__item" data-name="details_review">
					{include file='restaurantDetails_review.tpl'}
				</div>
			
				{*************************** Map *******************************}
				<div class="ionTabs__item" data-name="details_map">
					<div class="searchResultInner">
						<div class="restDetInfo1Inner">
							<input type="hidden" name="reslattitude" id="reslattitude" value="{$reslattitude}" />
							<input type="hidden" name="reslongtitude" id="reslongtitude" value="{$reslongtitude}" />
							<input type="hidden" name="resid" id="resid" value="{$smarty.get.resid}" />
						   <div id="showGoogleMaps" class="showGoogleMaps"></div>    
						</div>
						{*<div class="dropdown pull-right">
							<a data-toggle="dropdown" class="mapdeliveryTab" href="#">Delivery Fee <span class="caret"></span></a>
							<div class="dropdown-menu mapdelivery" role="menu" aria-labelledby="dLabel">
								<table cellspacing="0" cellpadding="0" border="1" bordercolor="#dddddd">
									<thead>
										<tr>
											<th>Delivery Color</th>
											<th>Minimum Order</th>
											<th>Delivery Charge</th>
										</tr>
									</thead>
									<tbody>
										{section name='color' loop=$searchrestaurantDetails}
										<tr>
											<td><span class="bgcolor" style="background:{$searchrestaurantDetails[color].colorcode}"></span></td>
											<td>{$searchrestaurantDetails[color].service_min_order}</td>
											<td>{$searchrestaurantDetails[color].service_delivery_charge}</td>
										</tr>
										{/section}
										
									</tbody>
								</table>
							</div>
						</div>*}
						<div class="addPageCont" id="map_distance_show">
							<div class="contain">
								<span class="addPageRightFont">&nbsp;</span>
								<span class="colon1">&nbsp;</span>
								<div id="map" class="col-sm-12 no-padding"></div>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="ionTabs__item" data-name="details_yelp">
					<div class="searchResultInner">
						<div class="contents_review_left">
							<a class="cont_review_head_left" href="{$yelp_reviews.2}" target="_blank">
								<div class="yelp_review_head col-md-12 col-xs-12 col-sm-12"><img src="{$SITE_IMAGE_URL}/yelp_logo.png" alt=""/> {if $yelp_reviews.1 neq ''} <img src="{$yelp_reviews.1}" /> {$yelp_reviews.0}{/if} {$LANG.res_details_review}</div>
							</a>
							
							<div class="detail-yelp">
								{if $yelp_reviews.2 neq ''}
									<div class="yelprev-left">
										<span class="user-photo"><img src="{$yelp_reviews.5}" alt="" title="" /></span>
										<span class="revUserName">{$yelp_reviews.7}
										<div class="review-date"><img src="{$yelp_reviews.3}" alt="" title=""/> {$yelp_reviews.6}</div></span>
									</div>
								   <span class="ylep-reviewcon"> {$yelp_reviews.4}<a href="{$yelp_reviews.8}" class="pull-right" target="_blank">{$LANG.res_read_more|utf8_encode}</a></span>
								{else}
									{$LANG.res_no_records_found|utf8_encode}
							   {/if}
							</div>
						</div>
					</div>
				</div>
				
				 <!-- Pre loader is Very Important-->
				<div class="ionTabs__preloader"></div>  
				
			</div>
		
        <!-- Order POP -->
<div id="orderpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog clearfix">
        <div class="modal-content">
            <div class="addtoCartInner">
                
                <div class="clr"></div>
                <div class="addtocartPopup1" >
                    <input type="hidden" class="mid" name="mid" />
                    <div id="Popupordermenuinfo"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container Inner ends -->
    </div>
</div>
<a href="#" class="scrollup">Scroll</a>
{elseif $res_det_status eq '0'}
<div class="noRecord">{$LANG.res_food_order_not_available|utf8_encode}</div>
{else}
<div class="noRecord">{$LANG.res_no_restaurant|utf8_encode}</div>
{/if}





<!-- **************************************************************MENU************************************************************ -->
<div class="container">
	<div class="row">
		
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 15%;" class="" src="theme/default/images/MenuTitle.png">

			<div class="reticulaInterna"></div>
			

			<div id="accordion">

				{section name=catdet loop=$categoryList}

							{if $categoryList[catdet].cat_name neq ''}

								{if $categoryList[catdet].cat_name eq 'Items Populares'}

									    <h3>
										    <table class="categoryMenuTables">
												<tr>
													<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/PopularItems.png"></td>
													<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}' name='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}'> {$categoryList[catdet].cat_name}</a></td>
												</tr>	
											</table>
										</h3>
									  <div>
										    
											{assign var = categoryMenuList value = $objSearchDetails->categoryMenuList($categoryList[catdet].cat_id,$searchname)}
											{section name=menu loop=$categoryMenuList}
											<ul id="popularTypeContainer" class="PizzaTypes">
												{if $categoryMenuList[menu].menu_name neq ''}

														<li>
															<a href="#" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderPizza(this,{$categoryMenuList[menu].menu_price});">
																<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
																<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
															</a>
														</li>
																							

												{/if}
											{sectionelse}
												<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
											{/section}
											</ul>



									  </div>

									{elseif $categoryList[catdet].cat_name eq 'Bebidas'}

									    <h3>
									    <table class="categoryMenuTables">
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/Drinks.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}' name='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}'> {$categoryList[catdet].cat_name}</a></td>
											</tr>	
										</table>
										</h3>


									  <div>
									    
										{assign var = categoryMenuList value = $objSearchDetails->categoryMenuList($categoryList[catdet].cat_id,$searchname)}
										{section name=menu loop=$categoryMenuList}
											<ul id="drinksTypeContainer" class="PizzaTypes">
												{if $categoryMenuList[menu].menu_name neq ''}

														<li>
															<a href="#" alt="{$categoryMenuList[menu].id}" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderDrinks(this);"><!-- ,{$categoryMenuList[menu].menu_price} -->
																<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
																<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
															</a>
														</li>
																							

												{/if}
											</ul>

											

											<div id="orderDrinksContainer" class="hide">
												<a href="#" class="return" onclick="returnDrinks()"><img src="theme/default/images/x.png"></a>
												{assign var = pizzzaSizeList value = $objSearchDetails->pizzzaSizeListFP($categoryMenuList[catdet].id)}
												{section name=size loop=$pizzzaSizeList}

													<ul class="restaurantList">
														<li> 
															<ul class="pizzasContainer"> 
																<li><!-- <img style="width: 45%;" class="" src="theme/default/images/DrinksPriceSmall.png"> -->
																<p id="drink_slice_id{$smarty.section.size.index}" style="display: none;">{$pizzzaSizeList[size].pizza_slice_id}</p>
																<p id="drinksSize{$smarty.section.size.index}" class="AgentOrange">{$pizzzaSizeList[size].pizza_slice_name}</p><p id="drinksPrice{$smarty.section.size.index}" class="AgentOrange">${$pizzzaSizeList[size].pizza_slice_price}</p></li>
																<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
																<li>

																	<form id='myform' method='POST' action='#'>
																	    <input type='button' class='qtyplusDrinks' field='quantityDrinks{$smarty.section.size.index}' />
																	    <input type='text' class="AgentOrange qtyIndicator" name='quantityDrinks{$smarty.section.size.index}' value='0' class='qty' />
																	    <input type='button' class='qtyminusDrinks' field='quantityDrinks{$smarty.section.size.index}' />
																	</form>

																</li>
															</ul>
														</li>
													</ul>


												{sectionelse}
													<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
												{/section}
												<button class="goToCheckout" onclick="checkoutArrayDrinks()"></button>
												
											</div>





										{sectionelse}
											<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
										{/section}
										
									  </div>


									  {elseif $categoryList[catdet].cat_name eq 'Pizzas'}

									    <h3>
									    <table class="categoryMenuTables">
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/PizzaIcon.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}' name='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}'> {$categoryList[catdet].cat_name}</a></td>
											</tr>	
										</table>
										</h3>
									  <div>
									    
										{assign var = categoryMenuList value = $objSearchDetails->categoryMenuList($categoryList[catdet].cat_id,$searchname)}
										{section name=menu loop=$categoryMenuList}
											<ul id="pizzaTypeContainer" class="PizzaTypes">
												{if $categoryMenuList[menu].menu_name neq ''}

														<li>
															<a href="#" alt="{$categoryMenuList[menu].id}" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderPizza(this);">
																<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
																<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
															</a>
														</li>								

												{/if}

											</ul>
											<div id="orderPizzaContainer" class="hide">
												<a href="#" class="return" onclick="returnPizza()"><img src="theme/default/images/x.png"></a>
												{assign var = pizzzaSizeList value = $objSearchDetails->pizzzaSizeListFP($categoryMenuList[catdet].id)}
												{section name=size loop=$pizzzaSizeList}
												<ul class="restaurantList">
														<li> 
															<ul class="pizzasContainer"> 
																<li><!-- <img style="width: 17%;" class="" src="theme/default/images/9_.png"> -->
																<p id="pizza_slice_id{$smarty.section.size.index}" style="display: none;">{$pizzzaSizeList[size].pizza_slice_id}</p>
																<p id="pizzaSize{$smarty.section.size.index}" class="AgentOrange">{$pizzzaSizeList[size].pizza_slice_name}</p><p id="pizzaPrice{$smarty.section.size.index}" class="AgentOrange">${$pizzzaSizeList[size].pizza_slice_price}</p></li>
																<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
																<li>

																	<form id='myform' method='POST' action='#'>
																	    <input type='button' class='qtyplus' field='quantityPizzas{$smarty.section.size.index}' />
																	    <input type='text' class="AgentOrange qtyIndicator" name='quantityPizzas{$smarty.section.size.index}' value='0' class='qty' />
																	    <input type='button' class='qtyminus' field='quantityPizzas{$smarty.section.size.index}' />
																	</form>

																</li>
															</ul>
														</li>
												</ul>
												{sectionelse}
													<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
												{/section} 
												<button class="goToCheckout" onclick="checkoutArrayPizza()"></button>

											</div>
										
										{sectionelse}
											<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
										{/section}
										
									  </div>



									  {elseif $categoryList[catdet].cat_name eq 'Postres'}

									    <h3>
									    <table class="categoryMenuTables">
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/Desserts.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}' name='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}'> {$categoryList[catdet].cat_name}</a></td>
											</tr>	
										</table>
										</h3>
									  <div>
									    
										{assign var = categoryMenuList value = $objSearchDetails->categoryMenuList($categoryList[catdet].cat_id,$searchname)}
										{section name=menu loop=$categoryMenuList}
										<ul id="dessertsTypeContainer" class="PizzaTypes">
											{if $categoryMenuList[menu].menu_name neq ''}

													<li>
														<a href="#" alt="{$categoryMenuList[menu].id}" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderDesserts(this);">
															<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
															<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
														</a>
													</li>
																						

											{/if}
										</ul>


										<div id="orderDessertsContainer" class="hide">
											<a href="#" class="return" onclick="returnDesserts()"><img src="theme/default/images/x.png"></a>
											{assign var = pizzzaSizeList value = $objSearchDetails->pizzzaSizeListFP($categoryMenuList[catdet].id)}
											{section name=size loop=$pizzzaSizeList}
											<ul class="restaurantList">
													<li> 
														<ul class="pizzasContainer"> 
															<li><!-- <img style="width: 45%;" class="" src="theme/default/images/DessertsPrice.png"> -->
															<p id="dessert_slice_id{$smarty.section.size.index}" style="display: none;">{$pizzzaSizeList[size].pizza_slice_id}</p>
															<p id="dessertsSize{$smarty.section.size.index}" class="AgentOrange">{$pizzzaSizeList[size].pizza_slice_name}</p><p id="dessertsPrice{$smarty.section.size.index}" class="AgentOrange">${$pizzzaSizeList[size].pizza_slice_price}</p></li>
															<li><img style="width: 15%;" class="" src="theme/default/images/Desserts.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
															<li>

																<form id='myform' method='POST' action='#'>
																    <input type='button' class='qtyplusDesserts' field='quantityDesserts{$smarty.section.size.index}' />
																    <input type='text' class="AgentOrange qtyIndicator" name='quantityDesserts{$smarty.section.size.index}' value='0' class='qty' />
																    <input type='button' class='qtyminusDesserts' field='quantityDesserts{$smarty.section.size.index}' />
																</form>

															</li>
														</ul>
													</li>
													
											</ul>
											{sectionelse}
												<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
											{/section}
											<button class="goToCheckout" onclick="checkoutArrayDesserts()"></button> 
										</div>


										{sectionelse}
											<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
										{/section}
										
									  </div>



									  {elseif $categoryList[catdet].cat_name eq 'Promociones'}

									    <h3>
									    <table>
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/Promociones.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}' name='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}'> {$categoryList[catdet].cat_name}</a></td>
											</tr>	
										</table>
										</h3>
									  <div>
									    <ul id="promoTypeContainer" class="PizzaTypes">
										{assign var = categoryMenuList value = $objSearchDetails->categoryMenuList($categoryList[catdet].cat_id,$searchname)}
										{section name=menu loop=$categoryMenuList}

											{if $categoryMenuList[menu].menu_name neq ''}

													<li>
														<a href="#" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderDesserts(this);">
															<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
															<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
														</a>
													</li>
																						

											{/if}
										{sectionelse}
											<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
										{/section}
										</ul>
									  </div>

									{elseif $categoryList[catdet].cat_name eq 'GlutenFree'}

									  <h3>
									  	<table>
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/GlutenFree.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}' name='cat_name{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].cat_name}'> {$categoryList[catdet].cat_name}</a></td>
											</tr>	
										</table>
									  </h3>
									  <div>
									    <ul id="glutenTypeContainer" class="PizzaTypes">
										{assign var = categoryMenuList value = $objSearchDetails->categoryMenuList($categoryList[catdet].cat_id,$searchname)}
										{section name=menu loop=$categoryMenuList}

											{if $categoryMenuList[menu].menu_name neq ''}

													<li>
														<a href="#" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderGluten(this);">
															<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
															<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
														</a>
													</li>
																						

											{/if}
										{sectionelse}
											<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
										{/section}
										</ul>
									  </div>

									{/if}
															

							{/if}

			  	{sectionelse}
					<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
				{/section}	


				
			</div>



			<!-- <div id="orderDessertsContainer" class="row hide">
				<a href="#" class="return" onclick="returnDesserts()"><img src="theme/default/images/x.png"></a>
				{assign var = pizzzaSizeList value = $objSearchDetails->pizzzaSizeListFP($categoryMenuList[catdet].id)}
				{section name=size loop=$pizzzaSizeList}
				<ul class="restaurantList">
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DessertsPrice.png"><p>INDIVIDUAL</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Desserts.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myform' method='POST' action='#'>
									    <input type='button' class='qtyplusDesserts' field='quantityDesserts' />
									    <input type='text' name='quantityDesserts' value='0' class='qty' />
									    <input type='button' class='qtyminusDesserts' field='quantityDesserts' />
									</form>

								</li>
							</ul>
						</li>
						
				</ul>
				{sectionelse}
					<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
				{/section} 
			</div> -->


			<!-- <div id="orderPizzaContainer" class="row hide">
				<a href="#" class="return" onclick="returnPizza()"><img src="theme/default/images/x.png"></a>
				<ul class="restaurantList">
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 17%;" class="" src="theme/default/images/9_.png"><p>INDIVIDUAL</p></li>
								<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myform' method='POST' action='#'>
									    <input type='button' class='qtyplus' field='quantity' />
									    <input type='text' name='quantity' value='0' class='qty' />
									    <input type='button' class='qtyminus' field='quantity' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 25%;" class="" src="theme/default/images/12_.png"><p>MEDIANA</p></li>
								<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 20%;margin-left: 5%;" class="" src="theme/default/images/TwoPersons.png"></li>
								<li>

									<form id='myformTwo' method='POST' action='#'>
									    <input type='button' class='qtyplusTwo' field='quantityTwo' />
									    <input type='text' name='quantityTwo' value='0' class='qtyTwo' />
									    <input type='button' class='qtyminusTwo' field='quantityTwo' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 25%;" class="" src="theme/default/images/14_.png"><p>FAMILIAR</p></li>
								<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 25%;margin-left: 5%;" class="" src="theme/default/images/MorePersons.png"></li>
								<li>

									<form id='myformThree' method='POST' action='#'>
									    <input type='button' class='qtyplusThree' field='quantityThree' />
									    <input type='text' name='quantityThree' value='0' class='qtyThree' />
									    <input type='button' class='qtyminusThree' field='quantityThree' />
									</form>

								</li>
							</ul>
						</li>
				</ul>

			</div> -->


<!-- 


			<div id="orderDrinksContainer" class="row hide">
				<a href="#" class="return" onclick="returnDrinks()"><img src="theme/default/images/x.png"></a>
				<ul class="restaurantList">
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceSmall.png"><p>INDIVIDUAL</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myform' method='POST' action='#'>
									    <input type='button' class='qtyplusDrinks' field='quantityDrinks' />
									    <input type='text' name='quantityDrinks' value='0' class='qty' />
									    <input type='button' class='qtyminusDrinks' field='quantityDrinks' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceMedium.png"><p>MEDIANA</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myformTwo' method='POST' action='#'>
									    <input type='button' class='qtyplusTwoDrinks' field='quantityTwoDrinks' />
									    <input type='text' name='quantityTwoDrinks' value='0' class='qtyTwo' />
									    <input type='button' class='qtyminusTwoDrinks' field='quantityTwoDrinks' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceLarge.png"><p>GRANDE</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myformThree' method='POST' action='#'>
									    <input type='button' class='qtyplusThreeDrinks' field='quantityThreeDrinks' />
									    <input type='text' name='quantityThreeDrinks' value='0' class='qtyThree' />
									    <input type='button' class='qtyminusThreeDrinks' field='quantityThreeDrinks' />
									</form>

								</li>
							</ul>
						</li>
				</ul>
				
			</div> -->






		</div>

		<div class="col-md-4">
		<h1>{$smarty.session.tulekeo}</h1>
			<form name="checkoutpage" method="post" onclick="{if $smarty.session.customerid eq ''}return clear(){/if}" action="{$SITE_BASEURL}/{if $smarty.session.customerid eq ''}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerLogin.php?pagetype=checkout{else}custlogin/checkout{/if}  {else}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}checkout.php{else}checkout{/if}{/if}" >
				<input type="hidden" name="minimumorder" id="minimumorder" value="{$searchrestaurantDetails.0.restaurant_minorder_price}"/>
				<input type="hidden" name="total" id="totalprice" value="{$total}"/>
				<input type="hidden" name="resid" id="resid" value="{$smarty.request.resid}"/>
				<input type="hidden" name="resname" id="resname" value="{$smarty.request.resname}"/>
				<div class="restaurantMenuAddtocartmm">
							
					{include file='cart.tpl'}
							
				</div>
			</form>	
		</div>
	</div>







	
</div>


<!-- **************************************************************TIPOS DE PIZZA************************************************************ -->
<!-- <div id="pizzaTypeContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			{section name=menu loop=$categoryMenuList}

			<ul class="PizzaTypes">

				{if $categoryMenuList[menu].menu_name neq ''}

						<li>
							<a href="#" data-name="{$categoryMenuList[menu].menu_category}" onclick="orderPizza(this,{$categoryMenuList[menu].menu_price});">
								<p class="PizzaTypesTitle">{$categoryMenuList[menu].menu_name}</p>
								<p class="PizzaTypesDescription">{$categoryMenuList[menu].menu_description}</p>
							</a>
						</li>
															

				{/if}
			</ul>
			{sectionelse}
				<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
			{/section}	

		</div>
	</div>
</div>
 -->



<!-- 
<div class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 70%;" class="" src="theme/default/images/directions.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
				{section name=elena loop=$restaurants.restaurants}
					<li> <a href="restaurantDetails.php?resid={$restaurants.restaurants[elena].restaurant_id}">{$restaurants.restaurants[elena].restaurant_name}</a>	</li>
				{/section}
			</ul>
		</div>
	</div>
	<br>	
</div> -->


<!-- **************************************************************ORDENAR PIZZA************************************************************ -->

<!-- <div id="orderPizzaContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 17%;" class="" src="theme/default/images/9_.png"><p>INDIVIDUAL</p></li>
							<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myform' method='POST' action='#'>
								    <input type='button' class='qtyplus' field='quantity' />
								    <input type='text' name='quantity' value='0' class='qty' />
								    <input type='button' class='qtyminus' field='quantity' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 25%;" class="" src="theme/default/images/12_.png"><p>MEDIANA</p></li>
							<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 20%;margin-left: 5%;" class="" src="theme/default/images/TwoPersons.png"></li>
							<li>

								<form id='myformTwo' method='POST' action='#'>
								    <input type='button' class='qtyplusTwo' field='quantityTwo' />
								    <input type='text' name='quantityTwo' value='0' class='qtyTwo' />
								    <input type='button' class='qtyminusTwo' field='quantityTwo' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 25%;" class="" src="theme/default/images/14_.png"><p>FAMILIAR</p></li>
							<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 25%;margin-left: 5%;" class="" src="theme/default/images/MorePersons.png"></li>
							<li>

								<form id='myformThree' method='POST' action='#'>
								    <input type='button' class='qtyplusThree' field='quantityThree' />
								    <input type='text' name='quantityThree' value='0' class='qtyThree' />
								    <input type='button' class='qtyminusThree' field='quantityThree' />
								</form>

							</li>
						</ul>
					</li>
			</ul>

		</div>
	</div>
</div> -->



<!-- **************************************************************ORDENAR BEBIDA************************************************************ -->

<!-- <div id="orderDrinksContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceSmall.png"><p>INDIVIDUAL</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myform' method='POST' action='#'>
								    <input type='button' class='qtyplusDrinks' field='quantityDrinks' />
								    <input type='text' name='quantityDrinks' value='0' class='qty' />
								    <input type='button' class='qtyminusDrinks' field='quantityDrinks' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceMedium.png"><p>MEDIANA</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myformTwo' method='POST' action='#'>
								    <input type='button' class='qtyplusTwoDrinks' field='quantityTwoDrinks' />
								    <input type='text' name='quantityTwoDrinks' value='0' class='qtyTwo' />
								    <input type='button' class='qtyminusTwoDrinks' field='quantityTwoDrinks' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceLarge.png"><p>GRANDE</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myformThree' method='POST' action='#'>
								    <input type='button' class='qtyplusThreeDrinks' field='quantityThreeDrinks' />
								    <input type='text' name='quantityThreeDrinks' value='0' class='qtyThree' />
								    <input type='button' class='qtyminusThreeDrinks' field='quantityThreeDrinks' />
								</form>

							</li>
						</ul>
					</li>
			</ul>

		</div>
	</div>
</div> -->

<!-- **************************************************************ORDENAR POSTRE************************************************************ -->

<!-- <div id="orderDessertsContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DessertsPrice.png"><p>INDIVIDUAL</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Desserts.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myform' method='POST' action='#'>
								    <input type='button' class='qtyplusDesserts' field='quantityDesserts' />
								    <input type='text' name='quantityDesserts' value='0' class='qty' />
								    <input type='button' class='qtyminusDesserts' field='quantityDesserts' />
								</form>

							</li>
						</ul>
					</li>
					
			</ul>

		</div>
	</div>
</div> -->


{literal}
<style type="text/css">
	
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
#target {
        width: 345px;
}

/*---------------------------------------LISTA DE RESTAURANTS----------------------------------------------*/

.hide {
	display: none;
}

.restaurantList>li {
    padding: 1%;
    border-bottom: 1px solid #eee;
    margin: 2%;
    padding-top: 0% !important;
    font-size: 18px;
}

.restaurantList>li:last-child {
	border-bottom: none; 
	margin-bottom: 0 !important;
	padding-bottom: 0 !important; 
}

.restaurantList a {
    color: black;
}

.restaurantList a:hover {
    font-weight: bold;
    transition: 0.5s;
    text-decoration: none;
}


/*------------------------------------------PIZZAS ORDENAR--------------------------------------------*/

.pizzasContainer {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.pizzasContainer li {
    display: inline-block;
    width: 50%;
    vertical-align: middle;
  }



#myform,
#myformTwo,
#myformThree {
    text-align: center;
    padding: 5px;
    margin: 2%;
}
.qty,
.qtyTwo,
.qtyThree {
    width: 40px;
    height: 25px;
    text-align: center;
    border: none;
}
input.qtyplus,
input.qtyplusTwo,
input.qtyplusThree,

input.qtyplusDrinks,
input.qtyplusTwoDrinks,
input.qtyplusThreeDrinks,

input.qtyplusDesserts {
    width: 25px;
    height: 25px;
    background: url("../theme/default/images/ADD_number.png");
    background-size: cover;
    border: none;
}


input.qtyminus,
input.qtyminusTwo,
input.qtyminusThree,

input.qtyminusDrinks,
input.qtyminusTwoDrinks,
input.qtyminusThreeDrinks,

input.qtyminusDesserts {
    width: 25px;
    height: 25px;
    background: url("../theme/default/images/Remove_number.png");
    background-size: cover;
    border: none;
}


@media screen and (min-width: 20em) {

.pizzasContainer li {
    width: 33%;
    vertical-align: middle;
  }

}

/*--------------------------------------PIZZA LIST---------------------------------------*/

.pizzaList table {
	width: 90%;
}

.PizzaListIcon {
    text-align: right;
    padding: 2%;
}

.PizzaListText {
    padding: 2%;
    border-bottom: 1px solid black;
    text-align: left;
}

.PizzaListTextLast {
    padding: 2%;
    text-align: left;
}

.PizzaMenuListItem a {
	color: black;
}

.PizzaMenuListItem a:hover,
.PizzaMenuListItem:hover {
	font-weight: bold;
    transition: 0.5s;
    text-decoration: none;
}

/*---------------------------------------------------------------------------------------*/

/*------------------------------------PIZZA TYPES--------------------------------------*/

.PizzaTypes {
    padding-right: 15%;
    width: 100%;
    padding-left: 20%;
}

.PizzaTypes a {
	color: black;
	text-align: left;
}

.PizzaTypes li {
    padding: 1%;
    border-bottom: 1px solid #eee;
    margin: 2%;
    padding-top: 0% !important;
}

.PizzaTypes li:last-child {
	border-bottom: none; 
	margin-bottom: 0 !important;
	padding-bottom: 0 !important; 
}


.PizzaTypesTitle {
    font-size: x-large;
    font-weight: bold;
    margin: 0;
}

.PizzaTypesDescription {
    font-style: italic;
}


/*------------------------RETURN-------------------------*/
.return {
    float: right;
    width: 5%;
    position: absolute;
    right: 2%;
}

.return img {
    width: 100%;
}

</style>


<script type="text/javascript">
	
	$(function(){

		$('.navbar-nav li').eq(0).removeClass("active");

		$('.navbar-nav li').eq(4).addClass("active");

		//---------------------------------------------PIZZA-----------------------------------------------
	    // This button will increment the value
	    $('.qtyplus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminus").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    // This button will increment the value
	    $('.qtyplusTwo').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusTwo").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    // This button will increment the value
	    $('.qtyplusThree').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusThree").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    //-------------------------------------------------------------------DRINKS

	    // This button will increment the value
	    $('.qtyplusDrinks').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusDrinks").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    // This button will increment the value
	    $('.qtyplusTwoDrinks').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusTwoDrinks").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    // This button will increment the value
	    $('.qtyplusThreeDrinks').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusThreeDrinks").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    //-------------------------------------------------------------------DESSERTS

	    // This button will increment the value
	    $('.qtyplusDesserts').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusDesserts").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    


		$( "#accordion" ).accordion({
	      collapsible: true
	    });


	});

	var res_id = "";
	function getValuesForCheckOut(){
		res_id = sessionStorage.getItem("res_id");
	}

	var alt = "";
	function orderPizza(element){
		var selection = $(element).data("name");
		alt = $(element).attr("alt");
		console.log("alt: " + alt);
		console.log(selection);			
		$("#orderPizzaContainer").removeClass("hide");
		$("#orderDrinksContainer").addClass("hide");
		$("#orderDessertsContainer").addClass("hide");
		
		$("#pizzaTypeContainer").addClass("hide");
		$(".categoryMenuTables").addClass("hide");
		$(".PizzaTypes").addClass("hide");

		sessionStorage.setItem('menu_category', selection);
	}

	function orderDrinks(element){
		var selection = $(element).data("name");
		alt = $(element).attr("alt");
		console.log("alt: " + alt);
		console.log(selection);			
		$("#orderDrinksContainer").removeClass("hide");
		$("#orderPizzaContainer").addClass("hide");
		$("#orderDessertsContainer").addClass("hide");
		
		$("#drinksTypeContainer").addClass("hide");
		$(".categoryMenuTables").addClass("hide");
		$(".PizzaTypes").addClass("hide");

		sessionStorage.setItem('menu_category', selection);
	}

	function orderDesserts(element){
		var selection = $(element).data("name");
		alt = $(element).attr("alt");
		console.log("alt: " + alt);
		console.log(selection);			
		$("#orderDrinksContainer").addClass("hide");
		$("#orderPizzaContainer").addClass("hide");
		$("#orderDessertsContainer").removeClass("hide");
		
		$("#dessertsTypeContainer").addClass("hide");
		$(".categoryMenuTables").addClass("hide");
		$(".PizzaTypes").addClass("hide");

		sessionStorage.setItem('menu_category', selection);
	}


	function returnDesserts(){
		$("#orderDessertsContainer").addClass("hide");
		
		$("#dessertsTypeContainer").removeClass("hide");
		$(".categoryMenuTables").removeClass("hide");
		$(".PizzaTypes").removeClass("hide");
	}

	function returnDrinks(){
		$("#orderDrinksContainer").addClass("hide");
		
		$("#drinksTypeContainer").removeClass("hide");
		$(".categoryMenuTables").removeClass("hide");
		$(".PizzaTypes").removeClass("hide");
	}

	function returnPizza(){
		$("#orderPizzaContainer").addClass("hide");

		$("#pizzaTypeContainer").removeClass("hide");
		$(".categoryMenuTables").removeClass("hide");
		$(".PizzaTypes").removeClass("hide");
	}

	var itemList = [];  // new array

	function checkoutArrayPizza() {
		
		for (var i = 0; i < 3; i++) {
			var item = $("input[name='quantityPizzas"+i+"']").val();
			if (item > 0) {

				//alert($("#pizzaSize"+i).text());

				itemList.push({
				                quantity: item,
				                //resid: sessionStorage.getItem("resID"),
								resid: {/literal}{$resid}{literal} ,
				                pizzasize_slice: $("#pizza_slice_id"+i).text(),
				                menuid: alt

				            });  // add a new object
			}
		}
		
		customAddItemToCart();

		for (var i = 0; i < 3; i++) {
			$("input[name='quantityPizzas"+i+"']").val(0);
			
		}

		itemList = [];
		
	}


	function checkoutArrayDrinks() {

		for (var i = 0; i < 3; i++) {
			var item = $("input[name='quantityDrinks"+i+"']").val();
			if (item > 0) {

				//alert($("#pizzaSize"+i).text());

				itemList.push({
				                quantity: item,
				                resid: {/literal}{$resid}{literal},
				                pizzasize_slice: $("#drink_slice_id"+i).text(),
				                menuid: alt

				            });  // add a new object
			}
		}
		//alert(itemList.length);
	}


	function checkoutArrayDesserts() {

		for (var i = 0; i < 3; i++) {
			var item = $("input[name='quantityDesserts"+i+"']").val();
			if (item > 0) {

				//alert($("#pizzaSize"+i).text());

				itemList.push({
				                quantity: item,
				                resid: {/literal}{$resid}{literal},
				                pizzasize_slice: $("#dessert_slice_id"+i).text(),
				                menuid: alt

				            });  // add a new object
			}
		}
		//alert(itemList.length);
	}

	

</script>

{/literal}




{if $smarty.request.lowamt eq 'ideal'}
{literal}
<script type="text/javascript">
alert("Your ideal payment price is low.Please choose menu morethan 84 EURO");
</script>
{/literal}
{/if}
