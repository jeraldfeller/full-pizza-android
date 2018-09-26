{***********Google Map Purpose Start*************}
<input type="hidden" name="" value="{$reslattitude}" id="firstreclat" />
<input type="hidden" name="" value="{$reslongtitude}" id="firstreclong" />
<input type="hidden" name="" value="{$searchrestaurantTotal}" id="searchrestaurantTotal" />

{***********Google Map Purpose End*************}
<input type="hidden" name="searcharea" class="searcharea" value="{$searcharea}"/>
<input type="hidden" name="searchcuisine" class="searchcuisine" value="{$searchcuisine}"/>
<input type="hidden" name="searchrestaurant" class="searchrestaurant" value="{$searchrestaurant}"/>

<input type="hidden" name="areaid" class="areaid" value="{$areaid}"/>
<input type="hidden" name="cuisine" class="cuisine" value="{$cuisine}"/>
<input type="hidden" name="city" class="city" value="{$city}"/>
<input type="hidden" name="zipcode" class="zipcode" value="{$zipcode}"/>

<input type="hidden" name="pricemin" class="pricemin" value="{$pricemin}"/>
<input type="hidden" name="pricemax" class="pricemax" value="{$pricemax}"/>
   	
{if $searchrestaurantTotal gt 0}
<div class="contain">
    {**************Normal Restaurant Start*************}
    {section name=searchRest loop=$searchrestaurantList}
	{if $searchrestaurantList[searchRest].status eq 'Open'}
    	<div class="searchResultMidInner borderbox">
    		<div class="searchMidContain relative">
            	<div class="searchMidBtm">
            		<div class="col-md-9 col-sm-12 pad0 col-xs-12 ">
                		<div class="col-md-12 col-xs-12 pad0">
                            <div class="searchMidImgNew col-md-3 col-sm-4 pad0">
    							{*if $searchrestaurantList[searchRest].restaurant_logo neq ''}
    							<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$searchrestaurantList[searchRest].restaurant_logo}" alt="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}"  />
    							{else}
    							<span class="relateNoImg">
    								<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}"/>
    							</span>
    							{/if*}	
                                <img src="{$searchrestaurantList[searchRest].restaurant_logo}" alt="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}"  />
                                {if $searchrestaurantList[searchRest].restaurant_feature_status eq 'Yes'}
                                    <div class="featureIcon"></div>
                                {/if}											
    							
    						</div>
            			
                   		<div class="col-md-9 col-sm-8 searchright-xxs">
                   			 <h1 class="searchInner1MidContHead">{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}</h1>
                    		 <span class="searchAddressCont">{$searchrestaurantList[searchRest].restaurant_streetaddress|stripslashes},&nbsp;{$searchrestaurantList[searchRest].cityname|ucfirst|stripslashes},&nbsp; {$searchrestaurantList[searchRest].statename|ucfirst|stripslashes}&nbsp;{if $searchrestaurantList[searchRest].restaurant_zip neq ''}&nbsp;-&nbsp;{$searchrestaurantList[searchRest].restaurant_zip}{/if}</span>
                       
                         {if $searchrestaurantList[searchRest].restaurant_minorder_price neq '' and $searchrestaurantList[searchRest].restaurant_delivery eq 'Yes'}
                            <span class="deliveryOrder border0"> {$LANG.search_mindelorder|utf8_encode}: <span style="color:#333;">{$currency}&nbsp;{$searchrestaurantList[searchRest].restaurant_minorder_price}</span></span>
                         {/if}
                         {if $searchrestaurantList[searchRest].restaurant_delivery eq 'Yes' && $searchrestaurantList[searchRest].restaurant_delivery_charge neq ''}
                         <span class="deliveryOrder">{$LANG.search_delivaryfee}: <span style="color:#333;">{if $searchrestaurantList[searchRest].restaurant_delivery_charge eq '0.00'}{$LANG.search_delfree}{else} {$currency}&nbsp;{$searchrestaurantList[searchRest].restaurant_delivery_charge}{/if}</span></span>
                         {/if}
                          </div>
                         
                	   </div>     
                	</div>
                	<div class="searchMidTxtRight col-lg-3 col-sm-5 col-md-3 col-xs-3 pull-right">
						<div class="clearfix">
							<span class="user_reviews">({$searchrestaurantList[searchRest].reviewscount} {$LANG.search_review|utf8_encode})</span>
							<div class="relate">
								<div class="searchStar">{*$LANG.search_review*}</div>
								<div class="orangeStar"  style="width:{$searchrestaurantList[searchRest].reviewrating}%;"></div>
							</div>
						</div>
						<div class="btn-group orderFont">
							<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$searchrestaurantList[searchRest].restaurant_id}&amp;resname={$searchrestaurantList[searchRest].restaurant_seourl}{else}menu/{$searchrestaurantList[searchRest].restaurant_id}/{$searchrestaurantList[searchRest].restaurant_seourl}{/if}" > 
							{if $searchrestaurantList[searchRest].status eq 'Open'}
								<span class="orderbutton">{$LANG.search_ordernow}</span>
							{else}
								<span class="preorderbutton">Closed{*{$LANG.search_preorder}*}</span>
							{/if}
							</a> 
						</div>					
    				</div>
                </div>
                <!--<div class="col-md-12 col-sm-12 col-xs-12 pad0 hidden-xs">
    				<div class="small_review_star">
                      {if $searchrestaurantList[searchRest].reviewcount neq ''}
    					{if $searchrestaurantList[searchRest].reviewcount eq '1'} <span class="reviewStar reviewStar1"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '2'} <span class="reviewStar reviewStar2"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '3'}<span class="reviewStar reviewStar3"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '4'} <span class="reviewStar reviewStar4"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '5'} <span class="reviewStar"></span>
						{/if}
                        {else}
                        <span class="searchnoreview"></span>
                        {/if}
                        
    				</div>
    				<div class="col-md-10 col-sm-8  border-left">
                        {if $searchrestaurantList[searchRest].reviewmessage neq ''}
                        <span class="small_review">"{$searchrestaurantList[searchRest].reviewmessage|truncate:120:"...":true}"</span>{else}
    					<span class="small_review">"{$LANG.search_taste_awesome|utf8_encode}"</span>
                        {/if}
    				</div>
    			</div>-->
            </div>
        </div>
    {/if}
    {/section}
 </div>
<!-- -----------------------------restaurant closed status--------------------------------------------------- -->	
{section name=searchRest loop=$searchrestaurantList}
{if $searchrestaurantList[searchRest].status neq 'Open'}
    <div class="searchResultMidInner borderbox">
    	
    		<div class="searchMidContain relative">
                <div class="searchMidBtm">
    				<div class="col-md-9 col-sm-12 pad0  col-xs-12">
    					<div class="col-md-12 col-xs-12 pad0">
    						<div class="searchMidImgNew col-md-3 pad0">									
    							{*if $searchrestaurantList[searchRest].restaurant_logo neq ''}
    							<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$searchrestaurantList[searchRest].restaurant_logo}" alt="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}"/>
    							{else}
    							<span class="relateNoImg">
    								<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}"/>
    							</span>
    							{/if*}
                                <img src="{$searchrestaurantList[searchRest].restaurant_logo}" alt="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}"/>
                                
                                {if $searchrestaurantList[searchRest].restaurant_feature_status eq 'Yes'}
                                    <div class="featureIcon"></div>
                                {/if}   										
    						</div>
    							
                            <div class="col-md-9 col-sm-8 searchright-xxs pad0">
    							<div class="searchMidTxtNew col-md-12 col-sm-12">
                            		<h1 class="searchInner1MidContHead">
                            		{$searchrestaurantList[searchRest].restaurant_name|ucfirst|stripslashes}
                            		</h1>                                  					
    								<span class="searchAddressCont">
                                        {*<b>{$LANG.search_address}:</b>*} {$searchrestaurantList[searchRest].restaurant_streetaddress|stripslashes}, {$searchrestaurantList[searchRest].cityname|ucfirst|stripslashes}-{$searchrestaurantList[searchRest].restaurant_zip}
                                    </span>
								    <span class="deliveryOrder border0"> 
                                        {$LANG.search_mindelorder}: <span style="color:#333;"> {$currency}&nbsp;{$searchrestaurantList[searchRest].restaurant_minorder_price}</span>
                                    </span>
                                    {if $searchrestaurantList[searchRest].restaurant_delivery eq 'Yes' && $searchrestaurantList[searchRest].restaurant_delivery_charge neq ''}
                                        <span class="deliveryOrder">
                                            {$LANG.search_delivaryfee}: <span style="color:#333;"> {if $searchrestaurantList[searchRest].restaurant_delivery_charge eq '0.00'}{$LANG.search_delfree}{else} {$currency} {$searchrestaurantList[searchRest].restaurant_delivery_charge}{/if}</span>
                                        </span>
                                    {/if}
               					</div>
               				</div>	
    					</div>
    				</div>		
    				<div class="searchMidTxtRight col-lg-3 col-sm-5 col-md-3 col-xs-3 pull-right">			
                       <div class="clearfix">
								<span class="user_reviews">({$searchrestaurantList[searchRest].reviewscount} {$LANG.search_review|utf8_encode})</span>
                                <div class="relate">
                                    <div class="searchStar">{*$LANG.search_review*}</div>
                                    <div class="orangeStar"  style="width:{$searchrestaurantList[searchRest].reviewrating}%;"></div>
                                </div>   
                            </div>   
						<div class=" btn-group orderFont">
							<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$searchrestaurantList[searchRest].restaurant_id}&amp;resname={$searchrestaurantList[searchRest].restaurant_seourl}{else}menu/{$searchrestaurantList[searchRest].restaurant_id}/{$searchrestaurantList[searchRest].restaurant_seourl}{/if}" >
							{if $searchrestaurantList[searchRest].status eq 'Open'}
								<span class="orderbutton">{$LANG.search_ordernow}</span>
							{elseif $searchrestaurantList[searchRest].status eq 'Preorder'}
								<span class="preorderbutton">{$LANG.search_preorder|utf8_encode}</span>
							{else}
								<span class="cancelbutton">{$LANG.search_close|utf8_encode}</span>
							{/if}
							</a>
						</div>	                   
                    </div> 
                    <!--<div class="col-md-12 col-sm-12 pad0">
    					<div class="small_review_star">
                        
					 {if $searchrestaurantList[searchRest].reviewcount neq ''}
    					{if $searchrestaurantList[searchRest].reviewcount eq '1'} <span class="reviewStar reviewStar1"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '2'} <span class="reviewStar reviewStar2"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '3'}<span class="reviewStar reviewStar3"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '4'} <span class="reviewStar reviewStar4"></span>
						{elseif $searchrestaurantList[searchRest].reviewcount eq '5'} <span class="reviewStar"></span>
						{/if}
                        {else}
                        <span class="searchnoreview"></span>
                        
                        {/if}
                        
    					</div>
    					<div class="col-md-10 col-sm-8 border-left">
                            {if $searchrestaurantList[searchRest].reviewmessage neq ''}
                            <span class="small_review">"{$searchrestaurantList[searchRest].reviewmessage}"</span>{else}
        					<span class="small_review">"{$LANG.search_taste_awesome|utf8_encode}"</span>
                            {/if}
                        </div>
    				</div>-->
    			</div>
    		</div>
    	
    </div>
{/if}
{/section}

<div style="display:none" class="col-md-12 col-xs-12 map_view">
	<div class="row">	
        <div id="showGoogleMaps" class="showGoogleMaps" ></div>	
    </div>    
</div>		
{**************Normal Restaurant End*************}
{elseif $smarty.request.action eq 'searchResultRight'}
    <div class="errorline">{$LANG.home_no_rec_found|utf8_encode}</div>
{/if} 
{if $searchrestaurantTotal gt 0}
{$pagination}
{/if}
       
<div id="yelppopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">X</span>
                    <span class="sr-only">Close</span>
                </button>
           		 <h4 class="modal-title center"><img src="{$SITE_IMAGE_URL}/yelp_logo.png" alt="" title=""></h4>
        	</div>
    		<div class="modal-body">
        		 <div class="yelpReviewreplace"> </div>
        	</div>
        </div>
    </div>
</div>
      
    	