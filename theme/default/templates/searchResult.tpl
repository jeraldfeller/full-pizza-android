<!-- Search Area starts -->


<h2>
	{$restaurants.restaurants[0].restaurant_name}

</h2>
<h1>
	{$restaurants.restaurants}
</h1>
<div class="">
	{section name=elena loop=$restaurants.restaurants}
		<h1> {$restaurants.restaurants[elena].restaurant_name}	</h1>
	{/section}	</h1>
</div>
<div class="container hidden-xxs">
	<div class="contain relative">

		<!--<div class="search_box">
			<div class="col-md-2 col-sm-3 pad0 searchtopleft"> 
				<span class="col-md-12 col-xs-12 col-sm-12 state_name">{$searcharea}</span>
				<span class="col-md-12 col-xs-12 col-sm-12 city_name">{$statename}</span>					
			</div>
		</div>-->
		<div class="banner-caption col-md-10 col-md-offset-1 col-xs-12 col-sm-12 change_loc_slide">
			<form name="searchresult1" method="post" action="searchResult.php" onsubmit="return searchareaValidate();">
				<div class="col-md-3 col-xs-12 col-sm-3">				
					<label class="find">{$LANG.search_find_restaurants|utf8_encode}</label>
				</div>
				<section class="searchTabContent center col-md-9 col-xs-12 col-sm-9 pad0" id="searchbyarea_content">
					<div class="col-md-9 col-sm-8 searchleft-xxs searchleft-xs"> 
                        {*<input type="text" class="searchField col-md-12 col-sm-12 col-xs-12 no-padding" name="searcharea" id="searchfieldArea"  autocomplete="off" value="Enter your city name" onfocus="if (this.value == 'Enter your city name')this.value='';" onblur="if(this.value == '')this.value='Enter your city name';"  {*onkeyup="mapClickGeolocate();"*}
                          <input type="text" class="searchField col-md-12 col-sm-12 col-xs-12 no-padding" name="searcharea" id="searchfieldArea"  autocomplete="off"  placeholder="{if $searchoption eq 'Normal' and $searchbyoption eq 'city'} Enter your city name{else if $searchoption eq 'Normal' and $searchbyoption eq 'zip'} Enter your zipcode{else if $searchoption eq 'Google'}Ex: Chennai, Tamil Nadu, India{/if}" value="{$smarty.request.searcharea}" />
                          <input type="hidden" name="countrycode" id="countrycode" value=""/>
                         </div> 
					<div class="col-md-3 pad0 col-sm-4 searchright-xxs searchright-xs center">  
						<input class="search-btn col-md-12 col-xs-8 col-sm-12 pad0" type="submit"  value="{*{$LANG.home_findarestaurant}*}{$LANG.home_search|utf8_encode}"/>
					</div>
				</section>
			</form>
		</div>
		{**************Tab Content End*************}
		<div class="searchTabArrow"></div>
		<div class="searchTabImg"></div>
	</div>
</div>
<div class="searchAreaBgOuterBtm"></div>
<!-- Search Area ends -->

<div class="container">
	<!-- Container Inner starts -->
	<div class="searchResultInner no-border">
		<div class="row">
			
		{if $searchrestaurantTotal eq 0}
		<div class="errorline">{$LANG.home_no_rec_found|utf8_encode}</div>
		{/if} 
		{**************Search Result Left Start*************}
		{include file='searchResultLeft.tpl'}
		{**************Search Result Left End*************}
		
			<div class="searchResultMiddle col-md-9 col-sm-8 col-xs-12">
				{if $searchrestaurantTotal gt 0}
				    <div class="col-md-9 col-sm-9 col-xs-12 restaurant_count"><span class="count_number" id="count_number">"{$searchrestaurantTotal}"</span>  {if $searchrestaurantTotal gt 1}{$LANG.search_restaurants_serving|utf8_encode}{else if $searchrestaurantTotal eq 1} {$LANG.search_restaurant_serving|utf8_encode} {/if}</div>
				    <!--<div class="col-md-3 col-sm-3 col-xs-12 text-right pad0 hidden-xxs"> <span id="map_btn" data-string="{$ser_qrystring}">{$LANG.search_map_view|utf8_encode}</span></div>-->
					<div class="col-md-3 hidden-xs col-sm-3 col-xs-12 text-right pad0"><span id="chage_location">{$LANG.search_change_location|utf8_encode}</span></div>
				{/if}
            	{if $searchrestaurantTotal gt 0}
				<ul class="searchResultLeftUl">
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_delivery" name="delivery" value="Yes" {if $smarty.request.ser_delivery eq 'Yes' or $smarty.request.ordertype eq 'delivery'}checked="checked"{/if} onclick="searchResultLeft();"/>
						<label class="txt" for="ser_delivery">{$LANG.search_delivery}</label>
					</li>
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_pickup" name="pickup" value="Yes" {if $smarty.request.ser_pickup eq 'Yes' or $smarty.request.ordertype eq 'pickup'}checked="checked"{/if} onclick="searchResultLeft();" />
						<label class="txt" for="ser_pickup">{$LANG.search_pickup}</label>
					</li>
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_booktable" name="booktable" value="Yes" {if $smarty.request.ser_booktable eq 'Yes'}checked="checked"{/if} onclick="searchResultLeft();" />
						<label class="txt" for="ser_booktable">{$LANG.home_bookatable}</label>
					</li>
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_offer" name="offer" value="Yes" onclick="searchResultLeft();" />
						<label class="txt" for="ser_offer">{$LANG.search_offers}</label>
					</li>
				</ul>
                {/if}
				<div class="searchResultRightList">

					{**************Search Result Middle Start*************}
					{include file='searchResultMiddle.tpl'}
					{**************Search Result Middle End*************}
				</div>
			</div>
		</div>
	</div>
	<!-- Container Inner ends -->
</div>

<input type="hidden" name="sitesearchoption" id="sitesearchoption" value="{$searchoption}"/>

<input type="hidden" name="searchoptioncityzip" id="searchoptioncityzip" value="{$searchbyoption}"/>

