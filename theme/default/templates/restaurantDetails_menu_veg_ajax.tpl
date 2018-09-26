				{section name=vegdet loop=$vegCategoryList}
					<div class="accordion">
						<h1>
							<span class="detailsGreenbg">
								<span class="detailsMidFirstRed">
									<span class="detailsMidFirstRed detailLine"><b>{$vegCategoryList[vegdet].catname|ucfirst|stripslashes}</b></span>
									<!--<span class="detailsMidFirstRed">5 soups prepared fresh daily.</span>-->
								</span>
							</span>
						</h1>
						
						{$objSearchDetails->categoryvegMenuList($vegCategoryList[vegdet].menu_category)}
						<div class="new">
						{section name=catmenu loop=$vegCategoryMenuList}
							<div class="detailsMiddle1ContGreen" onclick="menuOrder({$vegCategoryMenuList[catmenu].id})">
								<!--<div id="loadingimg_veg{$vegCategoryMenuList[catmenu].id}" style="display:none;"></div>-->
								<div class="detailsMidFirstRed">
									{if $vegCategoryMenuList[catmenu].menu_name neq ''}
										<span class="detailsMidFirstRed detailLine">
											<b>{$vegCategoryMenuList[catmenu].menu_name|ucfirst|stripslashes}</b>
											{if $vegCategoryMenuList[catmenu].menu_popular_dish eq 'Yes'}
											&nbsp;<img src="{$SITE_IMAGE_URL}/star1.png" alt="Popular Dish" title="Popular Dish" />
											{/if}
											
										</span>
									{/if}
									{if $vegCategoryMenuList[catmenu].menu_description neq ''}<span class="detailsMidFirstRed">{$vegCategoryMenuList[catmenu].menu_description|ucfirst|stripslashes}</span>{/if}
								</div>
								{if $vegCategoryMenuList[catmenu].menu_price neq '0.00'}<div class="detailsMidContPrice">
								{if $vegCategoryMenuList[catmenu].menu_photo neq ''}
									<span class="largeImgTooltip">
										<img src="{$SITE_IMAGE_MENU_URL}/{$vegCategoryMenuList[catmenu].menu_photo}" width="20" height="20" alt="{$vegCategoryMenuList[catmenu].menu_name|ucfirst|stripslashes}" title="" />
										<span><img src="{$SITE_IMAGE_MENU_URL}/{$vegCategoryMenuList[catmenu].menu_photo}" alt="{$vegCategoryMenuList[catmenu].menu_name|ucfirst|stripslashes}" title="{$vegCategoryMenuList[catmenu].menu_name|ucfirst|stripslashes}" /></span>
									</span>
								{/if}
								{$currency}&nbsp;{$vegCategoryMenuList[catmenu].menu_price|stripslashes}</div>{/if}
							</div>
						{/section}
						</div>
					</div>
					{/section}