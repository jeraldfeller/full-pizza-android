					{section name=nonvegdet loop="$nonvegCategoryList"}
						<div class="accordion">
						<h1>
							<div class="detailsMidRedBorder">
								<div class="detailsMidFirstRed">
									<span class="detailsMidFirstRed detailLine"><b>{$nonvegCategoryList[nonvegdet].catname|ucfirst|stripslashes}</b></span>
									<!--<span class="detailsMidFirstRed">5 soups prepared fresh daily.</span>-->
								</div>
							</div>
						</h1>
							{$objSearchDetails->categorynonvegMenuList($nonvegCategoryList[nonvegdet].menu_category)}
							<div class="new">
							{section name=nvcatmenu loop=$nonvegCategoryMenuList}
								<div class="detailsMiddle1Cont" onclick="menuOrder({$nonvegCategoryMenuList[nvcatmenu].id})">
								<!--<div id="loadingimg_nonveg{$nonvegCategoryMenuList[nvcatmenu].id}" style="display:none;"></div>-->
									<div class="detailsMidFirstRed">
										{if $nonvegCategoryMenuList[nvcatmenu].menu_name neq ''}
											<span class="detailsMidFirstRed detailLine">
												<b>{$nonvegCategoryMenuList[nvcatmenu].menu_name|ucfirst|stripslashes}</b>
												{if $nonvegCategoryMenuList[nvcatmenu].menu_popular_dish eq 'Yes'}
												&nbsp;<img src="{$SITE_IMAGE_URL}/star1.png" alt="Popular Dish" title="Popular Dish" />
												{/if}
												{if $nonvegCategoryMenuList[nvcatmenu].menu_photo neq ''}
												&nbsp;<img src="{$SITE_IMAGE_MENU_URL}/{$nonvegCategoryMenuList[nvcatmenu].menu_photo}" width="20" height="20" alt="{$nonvegCategoryMenuList[nvcatmenu].menu_name|ucfirst|stripslashes}" title="{$nonvegCategoryMenuList[nvcatmenu].menu_name|ucfirst|stripslashes}" />
												{/if}
											</span>
										{/if}
										{if $nonvegCategoryMenuList[nvcatmenu].menu_description neq ''}<span class="detailsMidFirstRed">{$nonvegCategoryMenuList[nvcatmenu].menu_description|ucfirst|stripslashes}</span>{/if}
									</div>
									{if $nonvegCategoryMenuList[nvcatmenu].menu_price neq '0.00'}<div class="detailsMidContPrice">{$currency}&nbsp;{$nonvegCategoryMenuList[nvcatmenu].menu_price|stripslashes}</div>{/if}
								</div>
							{/section}
							</div>
						</div>
						{/section}