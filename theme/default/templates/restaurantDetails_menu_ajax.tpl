{section name=catdet loop=$categoryList}
{assign var=catnam value=$categoryList[catdet].catname}

<div class="categoryContain">
	<a class="menus_detailsLink" id="catname_{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[catdet].catname}" name="catname_{$catnam|replace:' ':''}"></a>
	{if $categoryList[catdet].catname neq ''}
	<div class="accordion">
		<h1>
			<span class="detailsGreenbg borderbox">
				{$categoryList[catdet].catname|ucfirst|stripslashes}
			</span>
		</h1>
		{assign var = menuCategoryList value = $objSearchDetails->categoryMenuList($categoryList[catdet].menu_category,$searchname)}
		<div class="new">
			<div class="detailsMiddle1Contain">
				{section name=menu loop=$menuCategoryList}
				
				
					<div class="detailsMiddle1ContGreen borderbox {if $smarty.section.menu.rownum is div by 2} menubg1{/if}">
						<div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 pad0 hidden-xxs">
							<div class="menuImage borderbox col-lg-12 col-sm-12 col-xs-12 zero_padding">
								<img src="{$menuCategoryList[menu].menu_photo}" alt="food Image" title="food Image" />
							</div>
						</div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 paddRight0">
							<div class="detailsMidFirstRed col-lg-12 col-sm-12 col-xs-8 col-md-12 zero_padding">
							{if $menuCategoryList[menu].menu_name neq ''}
								<span class="detailsMidFirstRed detailLine">
									<b class="leaf">{$menuCategoryList[menu].menu_name|ucfirst|stripslashes}
									{if $menuCategoryList[menu].menu_popular_dish eq 'Yes'}
									&nbsp;<img src="{$SITE_IMAGE_URL}/star1.png" alt="Popular Dish" title="Popular Dish"  class="leaf" />
									{/if}
									{if $menuCategoryList[menu].menu_type eq 'veg'} <img src="{$SITE_IMAGE_URL}/vegmenu.png" alt="" title="" class="leaf" /> {/if}
									{if $menuCategoryList[menu].menu_type eq 'nonveg'} <img src="{$SITE_IMAGE_URL}/nonveg.png" alt="" title="" class="leaf" /> {/if}
									{if $menuCategoryList[menu].menu_spicy eq 'Yes'}
									&nbsp;<img src="{$SITE_IMAGE_URL}/spicy.png" alt="Spicy Dish" title="Spicy Dish"  class="leaf" />
									{/if}
									</b>
								</span>
								{/if}
							</div>	
							<div class="add_menu_btn col-md-12 col-sm-12 col-xs-12 pad0  ">
								{if $menuCategoryList[menu].menu_description neq '' || $menuCategoryList[menu].menu_description eq ''}
								<span class="menuDescription col-md-8 col-sm-8 col-xs-12 zero_padding tribledots">{$menuCategoryList[menu].menu_description|ucfirst|stripslashes}</span>{/if}
								{*<span class="flt">
							
								<span class="largeImgTooltip">
									<img src="{$SITE_IMAGE_MENU_URL}/{$categoryMenuList[menu].menu_photo}" width="75" height="40" alt="{$categoryMenuList[menu].menu_name|ucfirst|stripslashes}" title="{$categoryMenuList[menu].menu_name|ucfirst|stripslashes}" />
									<span><img src="{$categoryMenuList[menu].menu_photo}" alt="{$categoryMenuList[menu].menu_name|ucfirst|stripslashes}" title="{$categoryMenuList[menu].menu_name|ucfirst|stripslashes}" /></span>
								</span>
							
								</span>*}
								<div class="col-md-4 col-xs-12 col-sm-4 zero_padding">
									<span class="detailsMidFirstRedPrice col-lg-10 col-md-9  col-xs-10 zero_padding">
										{if $menuCategoryList[menu].menu_price neq '0.00'}
											<span class="detailsMidContPrice col-md-12 zero_padding">
											<b>	{$currency}&nbsp;{$menuCategoryList[menu].menu_price|stripslashes}</b>
											</span>
										{/if}
									</span>
									<a onclick="menuOrder({$menuCategoryList[menu].id},{$smarty.request.resid})" data-target="#orderpop" href="javascript:void(0);" data-toggle="modal" class="add_menu_cart"><img src="{$SITE_IMAGE_URL}/add_menu.png"  alt="add button"/></a>
								</div>
							</div>
						</div>
					</div>
					{*if $smarty.section.menu.rownum is div by 2}
					<div class="clr"></div>
					{/if*}
				{/section}
		
			</div>
		</div>
	</div>
	{/if}
</div>
{sectionelse}
	<div class="menu-norecord">{$LANG.res_no_rec_found}</div>
{/section}