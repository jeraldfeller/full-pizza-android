	<div class="searchAreaBgOuter">	
        <div class="banner-caption col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
            <div class="banner-text">
                <span class="banner-text-block">Order Takeaway & Food Delivery Online</span>
            </div>
            <div class="div-container">

            {*----------- Tab Content Start ------------*}
            <div class="search-details col-md-12 col-xs-12">
                <form name="searchresult" method="get" action="{$SITE_BASEURL}/searchResult.php" onsubmit="return searchareaValidate();">
                    <div class="col-md-3 col-xs-12 col-sm-3">               
                        <label class="find">FIND RESTAURANTS</label>
                    </div>
                    <section class="searchTabContent center col-md-9 col-xs-12 col-sm-9 pad0" id="searchbyarea_content">
                        <div class="col-md-8 col-sm-8 searchleft-xxs searchleft-xs"> 
                        {*<input type="text" class="searchField col-md-12 col-sm-12 col-xs-12 no-padding" name="searcharea" id="searchfieldArea"  autocomplete="off" value="Enter your city name" onfocus="if (this.value == 'Enter your city name')this.value='';" onblur="if(this.value == '')this.value='Enter your city name';"  {*onkeyup="mapClickGeolocate();"*}
                          <input type="text" class="searchField col-md-12 col-sm-12 col-xs-12 no-padding" name="searcharea" id="searchfieldArea"  autocomplete="off"  placeholder="{if $searchoption eq 'Normal' and $searchbyoption eq 'city'} Enter your city name{else if $searchoption eq 'Normal' and $searchbyoption eq 'zip'} Enter your zipcode{else if $searchoption eq 'Google'}Ex: Chennai, Tamil Nadu, India{/if}"{*onkeyup="mapClickGeolocate();"*}/>
                          <input type="hidden" name="countrycode" id="countrycode" value=""/>
                         </div> 
                        <div class="col-md-3 pad0 col-sm-4 searchright-xxs searchright-xs center">  
                            <input class="search-btn col-md-12 col-xs-8 col-sm-12 pad0" type="submit"  value="{*{$LANG.home_findarestaurant}*}{$LANG.home_search|utf8_encode}"/>
                        </div>  
                    </section>
                    
                </form>
            </div>
           
            {**************Tab Content End*************}
		</div>
	</div>
    <div class="searchOptionsNew hidden-xs">
            <ul class="searchOptionsNewUl">
                <li>
                    <label class="txt1 pad_left_right15 slogan-tick" for="delivery">{$LANG.home_free_to_use|utf8_encode}</label>
                </li>
                <li>
                    <label class="txt1 pad_left_right15 slogan-tick" for="pickup">{$LANG.home_thousand_restaurants|utf8_encode}</label>
                </li>
                <li>
                    
                    <label class="txt1 pad_left_right15 slogan-tick" for="pickup">{$LANG.home_sms_phone_confirm|utf8_encode}</label>
                </li>
                <li>
                    
                    <label class="txt1 pad_left_right15 slogan-tick" for="pickup">{$LANG.home_payment_method|utf8_encode}</label>
                </li>
            </ul>
        </div>
	<div class="searchAreaBgOuterBtm"></div>
</div>

<input type="hidden" name="sitesearchoption" id="sitesearchoption" value="{$searchoption}"/>

<input type="hidden" name="searchoptioncityzip" id="searchoptioncityzip" value="{$searchbyoption}"/>