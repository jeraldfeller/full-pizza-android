	<div class="searchResultInner">
	<div class="restDetInfo1Inner">
		<div class="restDetInfoContent col-md-7 col-lg-8">
			{*if $searchrestaurantDetails.0.restaurant_displayoption ne ""*}
			
			{******** Photos *********}
			{if $searchrestaurantDetails.0.restaurant_display_photo eq 'Yes'}
			{*{if $searchrestaurantDetails.0.restaurant_photos1 neq ''}<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$searchrestaurantDetails.0.restaurant_photos1}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}" />{/if}*}
			{if $searchrestaurantDetails.0.restaurant_photos1 neq '' or $searchrestaurantDetails.0.restaurant_photos2 neq '' or $searchrestaurantDetails.0.restaurant_photos3 neq '' or $searchrestaurantDetails.0.restaurant_photos4 neq ''}
			<div class="detailsInnerNewWrap">
				<h1 class="rest_info_title">{$LANG.res_restaurant_photo|utf8_encode}</h1>
			</div>
			<div class="contain">
			<div class="slider_resphoto">
	        	{if $searchrestaurantDetails.0.restaurant_photos1 neq ""}
	        	<div class="slide">
	            	<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$searchrestaurantDetails.0.restaurant_photos1}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}1" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}1" height="165" />
	            </div>
	            {/if}
	            {if $searchrestaurantDetails.0.restaurant_photos2 neq ""}
	            <div class="slide">
	            	<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$searchrestaurantDetails.0.restaurant_photos2}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}2" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}2" height="165" />
	            </div>
	            {/if}
	            {if $searchrestaurantDetails.0.restaurant_photos3 neq ""}
	            <div class="slide">
	           		<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$searchrestaurantDetails.0.restaurant_photos3}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}3" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}3" height="165" />
	           	</div>
	            {/if}
	            {if $searchrestaurantDetails.0.restaurant_photos4 neq ""}
	            <div class="slide">
	           		 <img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$searchrestaurantDetails.0.restaurant_photos4}" alt="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}4" title="{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes}4" height="165" />
	           	</div>
				{/if} 
		    </div>	
		</div>
			{/if}			
			{/if}
			
			{******** Video *********}
			{if $searchrestaurantDetails.0.restaurant_display_video eq 'Yes' and $searchrestaurantDetails.0.restaurant_video neq ''}
				<div class="detailsInnerNewWrap">
					<h1 class="rest_info_title">{$LANG.res_restaurant_video|utf8_encode}</h1>
				</div>
				{*<div class="restInfo_wrapViedo"><iframe width="560" height="315" src="{$searchrestaurantDetails.0.restaurant_video}" frameborder="0" allowfullscreen></iframe></div>*}
                <div class="restInfo_wrap">{$searchrestaurantDetails.0.restaurant_video|stripslashes}</div>
			{/if}
		
		{*/if*}

		{******** Restaurant Map **********}
		<div class="searchResultInner">
            <div class="restDetInfo1Inner">
                <input type="hidden" name="reslattitude" id="reslattitude" value="{$reslattitude}" />
                <input type="hidden" name="reslongtitude" id="reslongtitude" value="{$reslongtitude}" />
                <input type="hidden" name="resid" id="resid" value="{$smarty.get.resid}" />
               <div id="showGoogleMaps" class="showGoogleMaps"></div>    
            </div>
            {*<div class="addPageCont" id="map_distance_show">
                <div class="contain">
                    <span class="addPageRightFont">&nbsp;</span>
                    <span class="colon1">&nbsp;</span>
                    <div id="map" class="col-sm-12 no-padding"></div>
                </div>
            </div>*}
        </div>

		{******** About Restaurant *********}
		{if $searchrestaurantDetails.0.restaurant_description neq ''}
		<div class="detailsInnerNewWrap">
			<h1 class="rest_info_title">{$LANG.res_details_infoaboutres}</h1>
			<p class="rest_info_txt">
				{$searchrestaurantDetails.0.restaurant_description|ucfirst|stripslashes}
			</p>
		</div>
		{/if}
		{******** Delivery Areas *********}
		{if $searchrestaurantDetails.0.restaurant_delivery_distance neq '' and $searchrestaurantDetails.0.restaurant_delivery neq 'No'}
		<div class="detailsInnerNewWrap">
			<h1 class="rest_info_title">{$LANG.res_details_infodelarea}</h1>
			<span class="rest_info_txt">
				The delivery applicable with in {$searchrestaurantDetails.0.restaurant_delivery_distance}&nbsp;miles from the restaurant current address
			</span>
		</div>
		{/if}
	</div>
	<div class="rest_info_right col-lg-4 col-md-5 col-xs-12 pull-right">
		{******** Delivery Hours *********}
		<div class="detailsInnerNewWrap ">
			<h1 class="rest_info_title">{$LANG.res_details_infodelhour}</h1>
			<div class="rest_info_right_ulDiv col-xs-12 col-lg-12 pad0">
				<ul class="rest_info_right_ul">
					{*<li class="active">
						<span class="day">{$LANG.res_details_infomonday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_mon_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_mon_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_mon_closetime eq ''}{$searchrestaurantDetails.0.close_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_mon_closetime|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="day">{$LANG.res_details_infotuesday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_tue_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_tue_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_tue_closetime eq ''}{$searchrestaurantDetails.0.close_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_tue_closetime|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="day">{$LANG.res_details_infowednesday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_wed_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_wed_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_wed_closetime eq ''}{$searchrestaurantDetails.0.close_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_wed_closetime|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="day">{$LANG.res_details_infothursday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_thu_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_thu_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_thu_closetime eq ''}{$searchrestaurantDetails.0.close_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_thu_closetime|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="day">{$LANG.res_details_infofriday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_fri_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_fri_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_fri_closetime eq ''}{$searchrestaurantDetails.0.close_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_fri_closetime|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="day">{$LANG.res_details_infosaturday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_sat_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_sat_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_sat_closetime eq ''}{$searchrestaurantDetails.0.close_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_sat_closetime|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="day">{$LANG.res_details_infosunday}</span>
						<span class="time">{if $searchrestaurantDetails.0.restaurant_delivery_sun_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_sun_opentime|stripslashes}{/if} {$LANG.res_to} {if $searchrestaurantDetails.0.restaurant_delivery_sun_opentime eq ''}{$searchrestaurantDetails.0.open_time}{else}{$searchrestaurantDetails.0.restaurant_delivery_sun_closetime|stripslashes}{/if}</span>
					</li>*}
					
					<li {if $day eq 'Monday'} class="active" {/if}>
						<span class="day">{$LANG.res_details_infomonday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Monday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.mon_firstopen_time neq '' and $searchrestaurantDetails.0.mon_firstopen_time neq ': AM' and $searchrestaurantDetails.0.mon_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.mon_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.mon_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.mon_firstopen_time neq ': PM' and $searchrestaurantDetails.0.mon_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.mon_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.mon_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.mon_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.mon_firstclose_time}&nbsp;&nbsp;
                                
                              
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Monday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                                
                               {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed
                               {else}
                                    {*Closed*}
                               {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.mon_secondopen_time neq '' and $searchrestaurantDetails.0.mon_secondopen_time neq ': AM' and $searchrestaurantDetails.0.mon_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.mon_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.mon_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.mon_secondopen_time neq ': PM' and $searchrestaurantDetails.0.mon_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.mon_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.mon_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.mon_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.mon_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.mon_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.mon_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li>
					<li {if $day eq 'Tuesday'} class="active" {/if}>
						<span class="day">{$LANG.res_details_infotuesday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Tuesday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                
                                
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.tue_firstopen_time neq '' and $searchrestaurantDetails.0.tue_firstopen_time neq ': AM' and $searchrestaurantDetails.0.tue_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.tue_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.tue_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.tue_firstopen_time neq ': PM' and $searchrestaurantDetails.0.tue_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.tue_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.tue_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.tue_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.tue_firstclose_time}&nbsp;&nbsp;
                                
                               
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Tuesday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                               
                                {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed  
                                {else}
                                    {*Closed*}
                                {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.tue_secondopen_time neq '' and $searchrestaurantDetails.0.tue_secondopen_time neq ': AM' and $searchrestaurantDetails.0.tue_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.tue_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.tue_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.tue_secondopen_time neq ': PM' and $searchrestaurantDetails.0.tue_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.tue_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.tue_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.tue_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.tue_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.tue_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.tue_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li>
					<li {if $day eq 'Wednesday'} class="active" {/if}>
						<span class="day">{$LANG.res_details_infowednesday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Wednesday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                
                               
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.wed_firstopen_time neq '' and $searchrestaurantDetails.0.wed_firstopen_time neq ': AM' and $searchrestaurantDetails.0.wed_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.wed_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.wed_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.wed_firstopen_time neq ': PM' and $searchrestaurantDetails.0.wed_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.wed_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.wed_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.wed_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.wed_firstclose_time}&nbsp;&nbsp;
                                
                                
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Wednesday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.wed_secondopen_time neq '' and $searchrestaurantDetails.0.wed_secondopen_time neq ': AM' and $searchrestaurantDetails.0.wed_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.wed_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.wed_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.wed_secondopen_time neq ': PM' and $searchrestaurantDetails.0.wed_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.wed_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.wed_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.wed_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.wed_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.wed_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.wed_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li>
					<li {if $day eq 'Thursday'} class="active" {/if}>
						<span class="day">{$LANG.res_details_infothursday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Thursday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                
                               
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.thu_firstopen_time neq '' and $searchrestaurantDetails.0.thu_firstopen_time neq ': AM' and $searchrestaurantDetails.0.thu_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.thu_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.thu_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.thu_firstopen_time neq ': PM' and $searchrestaurantDetails.0.thu_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.thu_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.thu_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.thu_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.thu_firstclose_time}&nbsp;&nbsp;
                                
                                
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Thursday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.thu_secondopen_time neq '' and $searchrestaurantDetails.0.thu_secondopen_time neq ': AM' and $searchrestaurantDetails.0.thu_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.thu_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.thu_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.thu_secondopen_time neq ': PM' and $searchrestaurantDetails.0.thu_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.thu_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.thu_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.thu_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.thu_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.thu_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.thu_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li>
					<li {if $day eq 'Friday'} class="active" {/if}>						
						<span class="day">{$LANG.res_details_infofriday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Friday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                
                                
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.fri_firstopen_time neq '' and $searchrestaurantDetails.0.fri_firstopen_time neq ': AM' and $searchrestaurantDetails.0.fri_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.fri_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.fri_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.fri_firstopen_time neq ': PM' and $searchrestaurantDetails.0.fri_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.fri_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.fri_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.fri_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.fri_firstclose_time}&nbsp;&nbsp;
                               
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Friday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.fri_secondopen_time neq '' and $searchrestaurantDetails.0.fri_secondopen_time neq ': AM' and $searchrestaurantDetails.0.fri_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.fri_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.fri_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.fri_secondopen_time neq ': PM' and $searchrestaurantDetails.0.fri_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.fri_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.fri_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.fri_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.fri_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.fri_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.fri_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li>
					<li {if $day eq 'Saturday'} class="active" {/if}>
						<span class="day">{$LANG.res_details_infosaturday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Saturday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.sat_firstopen_time neq '' and $searchrestaurantDetails.0.sat_firstopen_time neq ': AM' and $searchrestaurantDetails.0.sat_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.sat_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.sat_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.sat_firstopen_time neq ': PM' and $searchrestaurantDetails.0.sat_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.sat_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.sat_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.sat_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.sat_firstclose_time}&nbsp;&nbsp;
                               
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Saturday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.sat_secondopen_time neq '' and $searchrestaurantDetails.0.sat_secondopen_time neq ': AM' and $searchrestaurantDetails.0.sat_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.sat_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.sat_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.sat_secondopen_time neq ': PM' and $searchrestaurantDetails.0.sat_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.sat_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.sat_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.sat_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.sat_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.sat_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.sat_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li >
					<li {if $day eq 'Sunday'} class="active" {/if}>
						<span class="day">{$LANG.res_details_infosunday}</span>
						<span class="time">
							<span class="contain">
                            {if $day eq 'Sunday'}
                                {if $searchrestaurantDetails.0.open_time neq '' and $searchrestaurantDetails.0.open_time neq ': AM' and $searchrestaurantDetails.0.open_time neq '00: AM' and $searchrestaurantDetails.0.open_time neq ':00 AM' and $searchrestaurantDetails.0.open_time neq '00:00 AM' and $searchrestaurantDetails.0.open_time neq ': PM' and $searchrestaurantDetails.0.open_time neq '00: PM' and $searchrestaurantDetails.0.open_time neq ':00 PM' and $searchrestaurantDetails.0.open_time neq '00:00 PM'}{$searchrestaurantDetails.0.open_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.close_time}&nbsp;&nbsp;
                                 
                                {else}
                                    Closed
                                {/if}&nbsp;&nbsp;
                            {else}
                                {if $searchrestaurantDetails.0.sun_firstopen_time neq '' and $searchrestaurantDetails.0.sun_firstopen_time neq ': AM' and $searchrestaurantDetails.0.sun_firstopen_time neq '00: AM' and $searchrestaurantDetails.0.sun_firstopen_time neq ':00 AM' and $searchrestaurantDetails.0.sun_firstopen_time neq '00:00 AM' and $searchrestaurantDetails.0.sun_firstopen_time neq ': PM' and $searchrestaurantDetails.0.sun_firstopen_time neq '00: PM' and $searchrestaurantDetails.0.sun_firstopen_time neq ':00 PM' and $searchrestaurantDetails.0.sun_firstopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.sun_firstopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.sun_firstclose_time}&nbsp;&nbsp;
                                
                                
                                {else}
                                    Closed
                                {/if}
                            {/if}
							</span>
							<span class="contain">
                            {if $day eq 'Sunday'}
                                {if $searchrestaurantDetails.0.secopen_time neq '' and $searchrestaurantDetails.0.secopen_time neq ': AM' and $searchrestaurantDetails.0.secopen_time neq '00: AM' and $searchrestaurantDetails.0.secopen_time neq ':00 AM' and $searchrestaurantDetails.0.secopen_time neq '00:00 AM' and $searchrestaurantDetails.0.secopen_time neq ': PM' and $searchrestaurantDetails.0.secopen_time neq '00: PM' and $searchrestaurantDetails.0.secopen_time neq ':00 PM' and $searchrestaurantDetails.0.secopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.secopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.secclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.secopen_time eq '00:00 AM' or $searchrestaurantDetails.0.secopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}&nbsp;&nbsp;
                                   
                            {else}
                                {if $searchrestaurantDetails.0.sun_secondopen_time neq '' and $searchrestaurantDetails.0.sun_secondopen_time neq ': AM' and $searchrestaurantDetails.0.sun_secondopen_time neq '00: AM' and $searchrestaurantDetails.0.sun_secondopen_time neq ':00 AM' and $searchrestaurantDetails.0.sun_secondopen_time neq '00:00 AM' and $searchrestaurantDetails.0.sun_secondopen_time neq ': PM' and $searchrestaurantDetails.0.sun_secondopen_time neq '00: PM' and $searchrestaurantDetails.0.sun_secondopen_time neq ':00 PM' and $searchrestaurantDetails.0.sun_secondopen_time neq '00:00 PM'}{$searchrestaurantDetails.0.sun_secondopen_time}&nbsp;{$LANG.res_to}&nbsp;{$searchrestaurantDetails.0.sun_secondclose_time}&nbsp;&nbsp;
                                
                                {elseif $searchrestaurantDetails.0.sun_secondopen_time eq '00:00 AM' or $searchrestaurantDetails.0.sun_secondopen_time eq '00:00 PM'}
                                    Closed 
                                {else}
                                    {*Closed*}
                                {/if}
                                
                            {/if}
							</span>
						</span>
					</li>
				</ul>
			</div>
		</div>
		{******** Ordering Info *********}
		<div class="detailsInnerNewWrap">
			<h1 class="rest_info_title">{$LANG.res_details_infoorder}</h1>
			<div class="rest_info_right_ulDiv col-lg-12 col-xs-12 pad0">
				<ul class="rest_info_right_ul">
                    {if $searchrestaurantDetails.0.restaurant_delivery neq 'No'}
                        <li class="active">
    						<span class="order">{$LANG.res_details_infominorder}:</span>
    						<span class="option">{$currency}&nbsp;{$searchrestaurantDetails.0.restaurant_minorder_price|stripslashes}</span>
    					</li>
                    
					<li>
						<span class="order">{$LANG.res_details_infodelivercharge}:</span>
						<span class="option">{if $searchrestaurantDetails.0.restaurant_delivery_charge eq '0.00'}{$LANG.res_free}{else}{$currency}&nbsp;{$searchrestaurantDetails.0.restaurant_delivery_charge}{/if}</span>
					</li>
                    {/if}
					<li>
						<span class="order">{$LANG.res_details_infopaymentoption}:</span>
						<span class="option">
						{section name="paymethod" loop=$searchrestaurantDetailsPaymethod}
						{if $searchrestaurantDetailsPaymethod[paymethod].paymentinfo_photo neq ''}
							<img alt="{$searchrestaurantDetailsPaymethod[paymethod].paymentinfo_name}" title="{$searchrestaurantDetailsPaymethod[paymethod].paymentinfo_name}" src="{$searchrestaurantDetailsPaymethod[paymethod].paymentinfo_photo}" />
						{/if}
						{/section}
						</span>
					</li>
					<li>
						<span class="order">{$LANG.res_details_infocontact}:</span>
						<span class="option">{$searchrestaurantDetails.0.restaurant_contact_phone|stripslashes}</span>
					</li>
					<li>
						<span class="order">{$LANG.res_details_infoserving}:</span>
						<span class="option">
							<span class="itemType">{if $searchrestaurantDetails.0.servingcuisine neq ''} {$searchrestaurantDetails.0.servingcuisine|ucfirst|stripslashes}{else}-{/if}</span>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
	</div>
{if $searchrestaurantDetails.0.restaurant_photos1 neq '' or $searchrestaurantDetails.0.restaurant_photos2 neq '' or $searchrestaurantDetails.0.restaurant_photos3 neq '' or $searchrestaurantDetails.0.restaurant_photos4 neq ''}    
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.bxslider.js"></script>
{literal}
<script type="text/javascript">
$(document).ready(function(){
	$(".detailsMainMenu li").click(function(){
		a.reloadSlider();
	});
	var a = $('.slider_resphoto').bxSlider({
			slideWidth: 800,
			minSlides: 3,
			maxSlides: 3,
			moveSlides: 1,
			slideMargin: 20,
			auto:true,
			pager:false,
			controls: false,		
		});
});
</script>
{/literal}
{/if}