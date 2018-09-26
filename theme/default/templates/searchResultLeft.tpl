<div class="col-sm-12 col-xs-12 hidden-xxs">
	<span class="btn btn-primary pull-right btn-sm hidden-sm hidden-lg hidden-md" id="searchflitermobile">
		<i class="glyphicon glyphicon-filter"></i> Click to fliter
	</span>
</div>
<div class="searchResultLeft search-xs hidden-xxs col-lg-3 col-xs-12 col-md-3 col-sm-4">
	{if $searchrestaurantTotal neq ''}
		<!--<div class="searchResultLeftTop"></div>-->
		<!--<h1 class="filterResult">{$LANG.search_filter}<span class="icon24 icomoon-icon-arrow-down-2 downlist"></span></h1>-->
		<div class="searchResultLeftMiddle">		
			<form name="search" method="post" action="">
			<!--<div class="searchPartLeft">-->
				<!-- <ul class="searchResultLeftUl">
					<li>
						<input type="checkbox" class="check" id="ser_delivery" name="delivery" value="Yes" {if $smarty.request.ser_delivery eq 'Yes'}checked="checked"{/if} onclick="searchResultLeft();"/>
						<label class="txt" for="ser_delivery">{$LANG.search_delivery|utf8_encode}</label>
					</li>
					<li>
						<input type="checkbox" class="check" id="ser_pickup" name="pickup" value="Yes" {if $smarty.request.ser_pickup eq 'Yes'}checked="checked"{/if} onclick="searchResultLeft();" />
						<label class="txt" for="ser_pickup">{$LANG.search_pickup}</label>
					</li>
					<li>
						<input type="checkbox" class="check" id="ser_booktable" name="booktable" value="Yes" {if $smarty.request.ser_booktable eq 'Yes'}checked="checked"{/if} onclick="searchResultLeft();" />
						<label class="txt" for="ser_booktable">{$LANG.home_bookatable}</label>
					</li>
					<li>
						<input type="checkbox" class="check" id="ser_opennow" name="opennow" value="Yes" onclick="searchResultLeft();" />
						<label class="txt" for="ser_opennow">{$LANG.search_opennow}</label>
					</li>
					<li>
						<input type="checkbox" class="check" id="ser_offer" name="offer" value="Yes" onclick="searchResultLeft();" />
						<label class="txt" for="ser_offer">{$LANG.search_offers}</label>
					</li>
				</ul> -->
			<!--</div>-->
			<!--<div class="searchPartLeft1">
				<ul class="searchResultLeftUl">
					<li>
						<input type="checkbox" class="check" name="menutype" id="menutype" value="veg" onclick="searchResultLeft();"/>
						<span class="img"><img src="{$SITE_IMAGE_URL}/veg.png" alt="" title="" /></span>
						<label class="txt" for="menutype">{$LANG.search_pureveg}</label>
					</li>
					<li>
						<input type="checkbox" class="check" name="menutype" id="menutype1" value="nonveg" onclick="searchResultLeft();"/>
						<span class="img"><img src="{$SITE_IMAGE_URL}/non.png" alt="" title="" /></span>
						<label class="txt" for="menutype1">{$LANG.search_purenonveg}</label>
					</li>
				</ul>
			</div>-->
			<div class="contain">
				<h1 id="more_cuisines" class="searchPartLeftHead">{$LANG.search_cuisine}</h1>
				<ul id="more_cuisines_content" class="searchCuisineUl">
			{section  name=choosecuisine loop=$cuisinecount}
					<li class="col-md-2 searchcousinList pad0">
						<input type="checkbox" class="check" name="cuisinetype" id="cuisinetype{$smarty.section.choosecuisine.rownum}" value="{$cuisinecount[choosecuisine].cuisine_id}" {foreach from=$cuisineid item=cseid} {if $cseid eq $cuisinecount[choosecuisine].cuisine_id} checked="checked" {/if} {/foreach} onclick="searchResultLeft();"  />
						<label class="txt" for="cuisinetype{$smarty.section.choosecuisine.rownum}">{$cuisinecount[choosecuisine].cuisine_name|ucfirst|stripslashes}<span class="pull-right cuisine_count">({$cuisinecount[choosecuisine].counts})</span></label>
					</li>
				{/section}
				</ul>
			</div>
		
			<!--<div class="searchPartLeft2">
				<h1 class="searchPartLeftHead">{$LANG.search_deliveryarea}</h1>
				<div class="selectboxSearch">
					<select class="selectSearchIndex1 deliveryarea" name="deliveryarea" id="deliveryarea" onchange="searchResultLeft(this.value);">
						<option value="">{$LANG.search_allarea} </option>
						{section name=area loop="$choosedeliveryareaList"}
							<option value="{$choosedeliveryareaList[area].zipcode_id|stripslashes}" {if $areaid eq $choosedeliveryareaList[area].zipcode_id}selected="selected"{/if}>{$choosedeliveryareaList[area].areaname|stripslashes}</option>
						{/section}
					</select>
				</div>
			</div>-->
			
			</form>
		</div>
		<!--<div class="searchResultLeftBottom"></div>-->
	{/if}
</div>