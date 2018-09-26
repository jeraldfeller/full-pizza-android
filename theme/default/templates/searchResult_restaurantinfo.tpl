<!--Right side Restaurant Info Start-->
<div class="restInfoPopContInner borderbox">
		<h1 class="restInfo1HeadNew">{$LANG.search_resinfohead}</h1>
		<!--<div class="restInfoPopAddress">
			<span class="restInfoPopAddress"><b>{$LANG.search_resinfoaddress}</b></span>
			<span class="restInfoPopAddress">{$searchrestaurantList[searchRest].restaurant_streetaddress|stripslashes}</span>
			<span class="restInfoPopAddress">{$searchrestaurantList[searchRest].cityname|ucfirst|stripslashes}-{$searchrestaurantList[searchRest].reszipcode} </span>
		</div>-->
		<div class="restInfoPopAddress">
			<h1 class="restInfoPopDetails"><b>{$LANG.search_resinfodeltime}</b>{if $searchrestaurantList[searchRest].restaurant_estimated_time neq ''} {$searchrestaurantList[searchRest].restaurant_estimated_time} min{/if}</h1>
			<!--<span class="restInfoPopAddress"></span>-->
		</div>
		<div class="restInfoPopAddress">
			<h1 class="restInfoPopDetails"><b>{$LANG.search_resinfohour}</b></h1>
			<ul class="restInfoPopDayUl">
				<li>
					<label class="day">{$LANG.search_resinfohourmon}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_mon_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_mon_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_mon_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_mon_closetime}{/if}*}
						{if $day eq 'Monday'}
                            {if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].mon_firstopen_time eq '' and $searchrestaurantList[searchRest].mon_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].mon_firstopen_time neq '' and $searchrestaurantList[searchRest].mon_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].mon_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].mon_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].mon_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].mon_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].mon_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].mon_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].mon_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].mon_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].mon_firstclose_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Monday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].mon_secondopen_time eq '' and $searchrestaurantList[searchRest].mon_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        
                        {else}
                            {if $searchrestaurantList[searchRest].mon_secondopen_time neq '' and $searchrestaurantList[searchRest].mon_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].mon_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].mon_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].mon_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].mon_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].mon_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].mon_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].mon_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].mon_secondopen_time} {$LANG.search_resinfohourto} {$searchrestaurantList[searchRest].mon_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
						
					</label>
				</li>
				<li>
					<label class="day">{$LANG.search_resinfohourtue}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_tue_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_tue_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_tue_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_tue_closetime}{/if}*}
						{if $day eq 'Tuesday'}
    						{if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].tue_firstopen_time eq '' and $searchrestaurantList[searchRest].tue_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].tue_firstopen_time neq '' and $searchrestaurantList[searchRest].tue_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].tue_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].tue_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].tue_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].tue_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].tue_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].tue_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].tue_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].tue_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].tue_firstclose_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Tuesday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].tue_secondopen_time eq '' and $searchrestaurantList[searchRest].tue_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {else}
                            {if $searchrestaurantList[searchRest].tue_secondopen_time neq '' and $searchrestaurantList[searchRest].tue_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].tue_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].tue_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].tue_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].tue_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].tue_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].tue_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].tue_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].tue_secondopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].tue_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
						
					</label>
				</li>
				<li>
					<label class="day">{$LANG.search_resinfohourwed}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_wed_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_wed_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_wed_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_wed_closetime}{/if}*}
						
						{if $day eq 'Wednesday'}
    						{if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].wed_firstopen_time eq '' and $searchrestaurantList[searchRest].wed_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].wed_firstopen_time neq '' and $searchrestaurantList[searchRest].wed_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].wed_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].wed_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].wed_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].wed_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].wed_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].wed_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].wed_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].wed_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].wed_firstclose_time}&nbsp;&nbsp;
                            {else}
                               {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Wednesday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].wed_secondopen_time eq '' and $searchrestaurantList[searchRest].wed_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                           {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {else}
                            {if $searchrestaurantList[searchRest].wed_secondopen_time neq '' and $searchrestaurantList[searchRest].wed_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].wed_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].wed_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].wed_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].wed_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].wed_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].wed_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].wed_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].wed_secondopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].wed_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
						</label>
				</li>
				<li>
					<label class="day">{$LANG.search_resinfohourthur}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_thu_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_thu_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_thu_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_thu_closetime}{/if}*}
						
						{if $day eq 'Thursday'}
    						{if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].thu_firstopen_time eq '' and $searchrestaurantList[searchRest].thu_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].thu_firstopen_time neq '' and $searchrestaurantList[searchRest].thu_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].thu_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].thu_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].thu_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].thu_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].thu_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].thu_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].thu_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].thu_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].thu_firstclose_time}&nbsp;&nbsp;
                            {else}
                               {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Thursday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].thu_secondopen_time eq '' and $searchrestaurantList[searchRest].thu_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {else}
                            {if $searchrestaurantList[searchRest].thu_secondopen_time neq '' and $searchrestaurantList[searchRest].thu_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].thu_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].thu_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].thu_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].thu_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].thu_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].thu_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].thu_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].thu_secondopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].thu_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
						
					</label>
				</li>
				<li>
					<label class="day">{$LANG.search_resinfohourfri}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_fri_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_fri_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_fri_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_fri_closetime}{/if}*}
						
						 {if $day eq 'Friday'}
    						{if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].fri_firstopen_time eq '' and $searchrestaurantList[searchRest].fri_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].fri_firstopen_time neq '' and $searchrestaurantList[searchRest].fri_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].fri_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].fri_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].fri_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].fri_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].fri_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].fri_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].fri_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].fri_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].fri_firstclose_time}&nbsp;&nbsp;
                            {else}
                                Closed
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Friday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].fri_secondopen_time eq '' and $searchrestaurantList[searchRest].fri_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {else}
                            {if $searchrestaurantList[searchRest].fri_secondopen_time neq '' and $searchrestaurantList[searchRest].fri_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].fri_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].fri_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].fri_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].fri_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].fri_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].fri_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].fri_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].fri_secondopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].fri_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
						
					</label>
				</li>
				<li>
					<label class="day">{$LANG.search_resinfohoursat}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_sat_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_sat_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_sat_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_sat_closetime}{/if}*}
						
						{if $day eq 'Saturday'}
    						{if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].sat_firstopen_time eq '' and $searchrestaurantList[searchRest].sat_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].sat_firstopen_time neq '' and $searchrestaurantList[searchRest].sat_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].sat_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].sat_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].sat_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].sat_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].sat_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].sat_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].sat_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].sat_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].sat_firstclose_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Saturday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].sat_secondopen_time eq '' and $searchrestaurantList[searchRest].sat_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {else}
                            {if $searchrestaurantList[searchRest].sat_secondopen_time neq '' and $searchrestaurantList[searchRest].sat_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].sat_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].sat_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].sat_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].sat_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].sat_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].sat_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].sat_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].sat_secondopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].sat_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
						
					</label>
				</li>
				<li>
					<label class="day">{$LANG.search_resinfohoursun}</label>
					<label class="time">
						{*{if $searchrestaurantList[searchRest].restaurant_delivery_sun_opentime eq ''}{$searchrestaurantList[searchRest].open_time}{else}								  {$searchrestaurantList[searchRest].restaurant_delivery_sun_opentime}{/if} 
						{$LANG.search_resinfohourto} 
						{if $searchrestaurantList[searchRest].restaurant_delivery_sun_closetime eq ''}{$searchrestaurantList[searchRest].close_time}{else}
						{$searchrestaurantList[searchRest].restaurant_delivery_sun_closetime}{/if}*}
						
						{if $day eq 'Sunday'}
    						{if $searchrestaurantList[searchRest].open_time neq '' and $searchrestaurantList[searchRest].open_time neq '00:00 AM' and $searchrestaurantList[searchRest].open_time neq ': AM' and $searchrestaurantList[searchRest].open_time neq '00: AM' and $searchrestaurantList[searchRest].open_time neq ':00 AM' and $searchrestaurantList[searchRest].open_time neq '00:00 PM' and $searchrestaurantList[searchRest].open_time neq ': PM' and $searchrestaurantList[searchRest].open_time neq '00: PM' and $searchrestaurantList[searchRest].open_time neq ':00 PM' and $searchrestaurantList[searchRest].sun_firstopen_time eq '' and $searchrestaurantList[searchRest].sun_firstclose_time eq ''}
                                {$searchrestaurantList[searchRest].open_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].close_time}&nbsp;&nbsp;
                            {else}
                               {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {else}
                            {if $searchrestaurantList[searchRest].sun_firstopen_time neq '' and $searchrestaurantList[searchRest].sun_firstopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].sun_firstopen_time neq ': AM' and $searchrestaurantList[searchRest].sun_firstopen_time neq '00: AM' and $searchrestaurantList[searchRest].sun_firstopen_time neq ':00 AM' and $searchrestaurantList[searchRest].sun_firstopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].sun_firstopen_time neq ': PM' and $searchrestaurantList[searchRest].sun_firstopen_time neq '00: PM' and $searchrestaurantList[searchRest].sun_firstopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].sun_firstopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].sun_firstclose_time}&nbsp;&nbsp;
                            {else}
                                {$LANG.search_close|utf8_encode}
                            {/if}&nbsp;&nbsp;
                        {/if}
						</label>
						<label class="time">
                        {if $day eq 'Sunday'}
    						{if $searchrestaurantList[searchRest].secopen_time neq '' and $searchrestaurantList[searchRest].secopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].secopen_time neq ': AM' and $searchrestaurantList[searchRest].secopen_time neq '00: AM' and $searchrestaurantList[searchRest].secopen_time neq ':00 AM' and $searchrestaurantList[searchRest].secopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].secopen_time neq ': PM' and $searchrestaurantList[searchRest].secopen_time neq '00: PM' and $searchrestaurantList[searchRest].secopen_time neq ':00 PM' and $searchrestaurantList[searchRest].sun_secondopen_time eq '' and $searchrestaurantList[searchRest].sun_secondclose_time eq ''}
                                {$searchrestaurantList[searchRest].secopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].secclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {else}
                            {if $searchrestaurantList[searchRest].sun_secondopen_time neq '' and $searchrestaurantList[searchRest].sun_secondopen_time neq '00:00 AM' and $searchrestaurantList[searchRest].sun_secondopen_time neq ': AM' and $searchrestaurantList[searchRest].sun_secondopen_time neq '00: AM' and $searchrestaurantList[searchRest].sun_secondopen_time neq ':00 AM' and $searchrestaurantList[searchRest].sun_secondopen_time neq '00:00 PM' and $searchrestaurantList[searchRest].sun_secondopen_time neq ': PM' and $searchrestaurantList[searchRest].sun_secondopen_time neq '00: PM' and $searchrestaurantList[searchRest].sun_secondopen_time neq ':00 PM'}
                                {$searchrestaurantList[searchRest].sun_secondopen_time} {$LANG.search_resinfohourto}  {$searchrestaurantList[searchRest].sun_secondclose_time}
                            {elseif $searchrestaurantList[searchRest].secopen_time eq '00:00 AM' or $searchrestaurantList[searchRest].secopen_time eq '00:00 PM'}
                                    Closed
                            {else}
                                   {*Closed*}
                            {/if}
                        {/if}
					</label>
				</li>
			</ul>
		</div>
</div>
<!--Right side Restaurant Info End-->