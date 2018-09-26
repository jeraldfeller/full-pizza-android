<!-- Restaurant Menu Add -->
<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead">{$LANG.res_myaccount_menu}</h1>
	<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_menu.php{else}restaurant-myaccount-menu{/if}" class="addbtn pull-right"><i class="glyphicon glyphicon-arrow-left marRight"></i>{$LANG.res_myaccount_menuaddback}</a>
	<hr class="heading-hr">
	<div class="clr"></div>
	<form name="res_menuadd" method="post" action="{if $smarty.get.menuid neq ''}{$SITE_BASEURL}/restaurantOwnerMyaccount_menuAddEdit.php?menuid={$smarty.get.menuid}{/if}" onsubmit="{if $smarty.get.menuid neq ''}return restaurantMenuEditValidate();{else}return restaurantMenuAddnewValidate();{/if}" enctype="multipart/form-data" class="form-horizontal">
    	<input type="hidden" name="action" value="{if $smarty.get.menuid neq ''}Edit{else}Add{/if}"/>
        <input type="hidden" name="menuid" id="menuid" value="{$smarty.get.menuid}"/>
    	<input type="hidden" name="restid" id="restaurant_name" value="{$smarty.session.restaurantownerid}" />
		<div class="ownerStaticContainer">
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<div class="mandatoryField">
						<span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>
						- {$LANG.res_myaccount_menumandatory}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<div id="errormsg"></div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="menu_name" class="col-sm-5 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_menuname}</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="menu_name" id="menu_name" value="{if $smarty.get.menuid neq ''}{$menuValue.0.menu_name}{/if}" />
					</div>
				</div>
				<div class="form-group">
					<label for="menu_cuisine" class="col-sm-5 control-label font-normal">{$LANG.res_myaccount_menucuisine}</label>
					<div class="col-sm-7">
						<select class="form-control selectpicker" name="menu_cuisine" id="menu_cuisine" >
							<option value="">{$LANG.res_myaccount_menucuisine_sel}</option>
							{foreach from=$showcuisinelist item=cuis}
								<option value="{$cuis.cuisine_id}" {if $cuis.cuisine_id eq $menuValue.0.menu_cuisine}selected="selected"{/if}>{$cuis.cuisine_name}</option>
							{/foreach}
						</select>
					</div>
				</div>	
			</div>
			
			<!--Menu Type-->
			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-5 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_menutype}</label>
					<div class="col-sm-7">
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_type" id="menu_type"	value="veg" {if $menuValue.0.menu_type eq 'veg'}checked="checked"{else}checked="checked"{/if} /> 
							<label for="menu_type">{$LANG.res_myaccount_menutypeveg}</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_type" id="menu_type1" value="nonveg" {if $menuValue.0.menu_type eq 'nonveg'}checked="checked"{/if}/>
							<label for="menu_type1">{$LANG.res_myaccount_menutypenonveg}</label>
						</div>
						<div class="radioln radio-inline radio-primary">
		                    <input type="radio" name="menu_type" id="menu_type2" value="other" {if $menuValue.0.menu_type eq 'other'}checked="checked"{/if}/>
		                    <label for="menu_type2">Other</label>
		                </div>
					</div>
				</div>
				<div class="form-group">
					<label for="menu_category" class="col-sm-5 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_menucat}</label>
					<span class="col-sm-7">
						<select class="form-control selectpicker" name="menu_category" id="menu_category" onchange="otherSpecify('category');getShowAddons(this.value);" >
							<option value="">{$LANG.res_myaccount_menucat_select}</option>
							{foreach from=$showcategorylist item=cat}
								<option value="{$cat.maincateid}" {if $cat.maincateid eq $menuValue.0.menu_category}selected="selected"{/if}>{$cat.maincatename}</option>
							{/foreach}
							<option value="other" id="categoryOther" onclick="otherSpecify('category');">{$LANG.res_myaccount_menucatoptother}</option>
						</select>
						<span id="caterrormsg"></span>
					</span>
				</div>
			</div>
			
			<!--Other Category-->
			<div class="form-group" id="catoters" style="display:none;">
					<span class=" col-sm-offset-4 col-sm-4">
						<input class="form-control" type="text" name="menu_catothers" id="menu_catothers" value="" />
						<span id="catname_errormsg"></span>
					</span>
			</div>
		
            
            <!--Menu Addons-->
			<div id="addonsoption" class="col-sm-12 no-padding">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="col-sm-5 control-label font-normal">{$LANG.res_myaccount_menuaddons}</label>
						<div class="col-sm-7">
							<div class="radioln radio-inline radio-primary">
								<input type="radio" name="menu_addons" id="addonsval_yes" value="Yes" {if $menuValue.0.menu_addons eq 'Yes'}checked="checked"{/if} onclick="showAddons();"/>
								<label for="addonsval_yes">{$LANG.res_myaccount_menuaddonyes}</label>
							</div>
							<div class="radioln radio-inline radio-primary">
								<input type="radio" name="menu_addons" id="addonsval_no" value="No" {if $menuValue.0.menu_addons eq 'No' or $smarty.get.menuid eq ''} checked="checked" {/if} onclick="showAddonsnew();"/>
								<label for="addonsval_no">{$LANG.res_myaccount_menuaddonno}</label>
							</div>
							
						</div>
					</div> 
				</div>
			</div>
				
			<!--Menu Addons-->
			<div  id="menusize_option_add" class="col-sm-12 no-padding">
				<div class="col-sm-10">

				<div class="form-group">
					<label class="col-sm-3 control-label font-normal"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_menuprice}</label>
					<div class="col-sm-9">
						<div class="radio-inline radioln radio-primary pull-left">
							<input type="radio" name="sizeoption" class="sizeoption_fixedprice" id="sizeoption_fixedprice" value="fixed" checked="checked" onclick="return fixedOption();" {if $menudet.0.sizeoption eq 'fixed'}checked="checked"{else}checked="checked"{/if} />
							<label for="sizeoption_fixedprice">{$LANG.res_myaccount_fixedprice}Fixed</label>
						</div>
						<div class="radio-inline radioln radio-primary pull-left">
							<input type="radio" name="sizeoption" id="sizeoption_default" value="default" onclick="return defaultOption();" {if $menudet.0.sizeoption eq 'size'}checked="checked"{/if} />
							<label for="sizeoption_default">{$LANG.res_myaccount_size}</label>
						</div>
						<div class="radio-inline radioln radio-primary pull-left">
							<input type="radio" name="sizeoption" id="sizeoption_other" value="other" onclick="return otherOption();" {if $menudet.0.sizeoption eq 'slice'}checked="checked"{/if}/>
							<label for="sizeoption_other">{$LANG.res_myaccount_slice}</label>
						</div>
						{*--------------------------- Fixed -------------------------------*}
							<span id="fixedOption" class="" {if $menudet.0.sizeoption eq 'fixed' and $menudet.0.sizeoption neq 'size' and $menudet.0.sizeoption neq 'slice'}style="display:block;"{elseif $smarty.get.menuid eq ''}style="display:block;"{else}style="display:none;"{/if}>
								<div class="col-sm-9">
									<div class="row">
										<input class="form-control" type="text" name="menu_price_main" id="menu_price" value="{if $smarty.get.menuid neq '' and $menudet.0.sizeoption eq 'fixed'}{$menuValue.0.menu_price}{/if}" />
									</div>
								</div>
							</span>
							{*--------------------------- Size -------------------------------*}
							<span id="pizzaDefaultOption" class="col-sm-12"  {if $menudet.0.sizeoption neq 'size'} style="display:none;" {else}style="display:block"{/if}>
									
			                            {*---------- Size ----------*}
										<div class="col-sm-12 pad0 marBtm5">
											<div class="col-sm-4 pad0">
												<label class="checkbox-inline">
													<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" {if $menudet.0.pizza_small_value neq '0.00' and $menudet.0.pizza_small_value neq '' and $menudet.0.sizeoption eq 'size'}checked="checked"{/if} />{$LANG.res_myaccount_small}
												</label>
											</div>
											<div id="smallpriceshow" class="col-sm-6" {if $menudet.0.pizza_small_value eq '0.00' or $menudet.0.pizza_small_value eq '' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if}>
												<input type="text" name="smallval" id="smallval" value="{if $menudet.0.pizza_small_value neq '0.00' and $menudet.0.sizeoption eq 'size'}{$menudet.0.pizza_small_value}{/if}" class="form-control input-sm numericfield" placeholder="Price"/>
											</div>
										</div>
										
											
			                            {*------ Medium -------*}
										<div class="col-sm-12 pad0 marBtm5">
											<div class="col-sm-4 pad0">
												<label class="checkbox-inline">
													<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" {*if $menudet.0.pizza_size_medium eq 'medium'*}{if $menudet.0.pizza_medium_value neq '0.00' and $menudet.0.pizza_medium_value neq '' and $menudet.0.sizeoption eq 'size'}checked="checked"{/if} />{$LANG.res_medium}
												</label>
											</div>
											<div id="mediumpriceshow" {if $menudet.0.pizza_medium_value eq '0.00' or $menudet.0.pizza_medium_value eq '' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="col-sm-6">
											    <input class="form-control numericfield input-sm" type="text" name="mediumval" id="mediumval" value="{if $menudet.0.pizza_medium_value neq '0.00' and $menudet.0.sizeoption eq 'size'}{$menudet.0.pizza_medium_value}{/if}" placeholder="Price" />
			                                </div>
			                            </div>
											
			                            {*------ Large ---------*}
			                            <div class="col-sm-12 pad0 marBtm5" >
											<div class="col-sm-4 pad0">
												<label class="checkbox-inline">
													<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" {*if $menudet.0.pizza_size_large eq 'large'*}{if $menudet.0.pizza_large_value neq '0.00' and $menudet.0.pizza_large_value neq '' and $menudet.0.sizeoption eq 'size'}checked="checked"{/if} />{$LANG.res_large}
												</label>
											</div>
											<div id="largepriceshow" {if $menudet.0.pizza_large_value eq '0.00' or $menudet.0.pizza_large_value eq '' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="col-sm-6">
											    <input class="form-control numericfield input-sm" type="text" name="largeval" id="largeval" value="{if $menudet.0.pizza_large_value neq '0.00' and $menudet.0.sizeoption eq 'size'}{$menudet.0.pizza_large_value}{/if}" placeholder="Price"/>
			                                </div>
										</div>	
									
							</span>
							{*-------------------- Large --------------------*}  
							<div id="pizzaOtherOption" class="form-group" {if $menudet.0.sizeoption neq 'slice'} style="display:none;"{else}style="display:block"{/if}>
								<div class="col-sm-12">
									{section name="slicelist" loop=$showPizzaSlicelist}
				                    <div class="col-sm-12 pad0">
										<div class="col-sm-4 pad0">
											<input type="text" name="size_option[{$smarty.section.slicelist.index}][sizename]" id="sizename1" value='{$showPizzaSlicelist[slicelist].pizza_slice_name|stripslashes}' class="form-control slicevalidate slicenamecnt" style="margin:3px 0"/> 
										</div>
			                             <input type="hidden" id="pizzaeditid" name="size_option[{$smarty.section.slicelist.index}][sliceeditid]" value="{$showPizzaSlicelist[slicelist].pizza_slice_id}"/> 
										<div class="col-sm-2">
											<input type="text" name="size_option[{$smarty.section.slicelist.index}][sizevalue]" id="sizevalue1" value="{$showPizzaSlicelist[slicelist].pizza_slice_price}" class="form-control slicevalidate numericfield"  style="margin:3px 0" /> 
										</div>
									</div>
									{/section}
									<div id="specialPizzaSize">
										<div class="col-sm-12 pad0">
											<span onclick="addMorePizzaSize_ajax();" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign marRight"></i>{$LANG.res_myaccount_add_more_slice}</span>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				
				</div>
			</div>
				
			<div class="addPageCont">
				<div id="showcataddonsList" {if $menuValue.0.menu_addons eq 'No'}style="display:none;"{/if}>
                    <input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="{$cntSliceAddons}" />
				    <input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
					<div class="col-sm-9 col-sm-offset-3">
						
							{section name="addon" loop=$showAddonslist}
                				
                						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />
                						{*$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
                						{if $cntmenuSubAddons1 gt 0*}
                                        {assign var='showSubAddonslist' value=$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
					{if $showSubAddonslist neq ''}
                							<b style="cursor:pointer; margin:10px 0; float:left;" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|ucfirst|stripslashes}
                								<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/> 
                								<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/>
                							</b>
                						{/if}
                						
                						
                						<div class="clr"></div>
                						<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>
                						
                						{section name="subaddon" loop=$showSubAddonslist}
                							<div class="form-group">
                                                 <input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addoneditid]" value="{$showSubAddonslist[subaddon].menu_addonid}" />
                									<div class="col-sm-3">
	                									{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
	                										<label class="checkbox-inline"><input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" {if $showSubAddonslist[subaddon].id eq $showSubAddonslist[subaddon].addonid}checked="checked"{/if} /> {$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</label>
	                									{else}
	                										<label class="checkbox-inline">
	                											<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" />
	                											{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}
	                										</label>
	                									{/if}
	                								</div>
                									<div class="col-sm-3">
                                                        <div class="radioln radio-inline radio-primary">
															<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free_mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}]" value="Free" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $showSubAddonslist[subaddon].menuprice eq ''}checked="checked"{/if} onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');"/> 
															<label for="free_mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}]">{$LANG.res_free} </label>
														</div>
                                                        <div class="radioln radio-inline radio-primary">
															<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid_mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}]" value="Paid" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if} onclick="addonspaidoption_ajax('{$showSubAddonslist[subaddon].id}');"/> 
															<label for="paid_mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}]">{$LANG.res_paid}</label>
														</div>
                									</div>
                                                                                                        
                									<div class="col-sm-5">	
                										<!--Fixed option's addons price-->
                										<span id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed" >
                											<span class="col-sm-6"> 
                                                                <input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{$showSubAddonslist[subaddon].menuprice}"  placeholder="Price"/>							
                											</span>
                										</span>
                										<!--Fixed option's addons price-->
                										
                										<!--Size option's addons price-->
                										<div id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size">
                										   <div class="col-sm-4">
                                                            	<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
                                                            </div>
                                                            <div class="col-sm-4">
																<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Price{/if}';" />
															</div>
															<div class="col-sm-4">
																<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Price{/if}';" />
															</div>
                										</div>
                										<!--Size option's addons price-->
                										
                										<!--Slice options addons price-->
                                                        
                										<div id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="priceSpan showprice_slice">
                										
                											<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
                											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />					                                             
                											{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
                											{assign var='sliceaddonprice_arr' value=$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)}	
                												{section name=slice1 loop=$sliceaddonprice_arr}
                    												{assign var=sliceList value=$smarty.section.slice1.index}
                    												<div class="col-sm-4">
                    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{$sliceaddonprice_arr[slice1]}"  placeholder="Price"/>
                    												</div>			
                												{/section}										
                											{else}											
                												{section name=slice1 loop=$cntSliceAddons}
                    												{assign var=sliceList value=$smarty.section.slice1.index}
                    												<div class="col-sm-4">
                    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{$sliceaddonprice_arr[slice1]}"  placeholder="Price"/>
                    												</div>
                												{/section}
                											{/if}
                											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />
                											
                											<div class="slicemoreprice showprice_{$showSubAddonslist[subaddon].id}_slice" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></div>
                										</div>	
                										<!--Slice options addons price-->
	            									</div>
	            									{*------------  Remove Existing addons ------------*}
	                                               
	            									<div class="col-sm-1">
													 {if $showSubAddonslist[subaddon].addonid neq ''}
													  <span class="btn btn-danger btn-sm" onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname|addslashes}',{$smarty.request.menuid});" ><i class="glyphicon glyphicon-remove"></i></span>
													  {/if}
													 </div>
												</div>	
                							
                						{/section}
                						</div>
                					
                			{/section}
						
					</div>
					<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
					<div class="col-sm-offset-3 col-sm-2 marTop10">
						<a id="createaddons" onclick="addCreateMoreAddons_first();" {if $smarty.get.menuid neq ''} style="display:block;"{else}style="display:none;"{/if} class="btn btn-success btn-sm" id="madAddons_firstajax"><i class="fa fa-file marRight"></i>{$LANG.res_create_addons}</a>
					</div>
				</div>
			</div>
				
			<div id="showcatPizzaAddonsList" style="display:none;">
			
			</div>	
			<!--Menu Special Instruction-->
			<div class="col-sm-6">
				<div class="form-group">
					<label  class="col-sm-5 control-label font-normal">{$LANG.res_myaccount_menuinstruction}</label>
					 <div class="col-sm-7">
					 	<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spl_ins" id="menu_spl_ins1" value="Yes" {if $menuValue.0.menu_spl_instruction eq 'Yes'}checked="checked"{/if}/>
							<label for="menu_spl_ins1">{$LANG.res_myaccount_menuinstyes}</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spl_ins" id="menu_spl_ins2" value="No" {if $smarty.get.menuid neq ''}  {if $menuValue.0.menu_spl_instruction eq 'No'} checked="checked"{/if}{else} checked="checked"{/if} />
							<label for="menu_spl_ins2">{$LANG.res_myaccount_menuinstno}</label>
						</div>
					</div>
				</div>
				
				<!--Meno Photo -->
				<div class="form-group">
					<label for="menu_photo"  class="col-sm-5 control-label font-normal">{$LANG.res_myaccount_menuphoto}</label>
					<div class="col-sm-7">
						<div class="logoUpload">
							<input type="file" name="menu_photo" id="menu_photo" size="33" style="font:12px Arial;"/>
							{if $menuValue.0.menu_photo neq ''}<img src="{$SITE_IMAGE_MENU_URL}/{$menuValue.0.menu_photo}"alt="image" title="" width="50" height="50" />{/if}
						</div>
					</div>
				</div>
				<!--Menu Popular Dish-->
				<div class="form-group">
					<label  class="col-sm-5 control-label font-normal">{$LANG.res_myaccount_menupopulardish}</label>
					<span class="col-sm-7">
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_popular_dish" id="menu_popular_dish_yes" value="Yes" {if $menuValue.0.menu_popular_dish eq 'Yes'}checked="checked"{/if}/>
							<label for="menu_popular_dish_yes">{$LANG.res_myaccount_menuinstyes}</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_popular_dish" id="menu_popular_dish_no" value="No" {if $smarty.get.menuid neq ''}  {if $menuValue.0.menu_popular_dish eq 'No'} checked="checked"{/if}{else} checked="checked"{/if} />
							<label for="menu_popular_dish_no">{$LANG.res_myaccount_menuinstno}</label>
						</div>
					</span>
				</div>
			
				<!--Menu Spicy-->
				<div class="form-group">
					<label  class="col-sm-5 control-label font-normal">{$LANG.res_myaccount_menuspicy}</label>
					<span class="col-sm-7">
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spicy" id="menu_spicy_yes" value="Yes" {if $menuValue.0.menu_spicy eq 'Yes'}checked="checked"{/if}/>
							<label for="menu_spicy_yes">{$LANG.res_myaccount_menuinstyes}</label>
						</div>
						<div class="radioln radio-inline radio-primary">
							<input type="radio" name="menu_spicy" id="menu_spicy_no" value="No" {if $smarty.get.menuid neq ''}  {if $menuValue.0.menu_spicy eq 'No'} checked="checked" {/if}{else} checked="checked"{/if} />
							<label for="menu_spicy_no">{$LANG.res_myaccount_menuinstno}</label>
						</div>
					</span>
				</div>
			</div>
			<div class="col-sm-6">
				<!--Menu Description-->
				<div class="form-group">
					<label for="menu_description"  class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_menudesc}</label>
					<div class="col-sm-8">
						<textarea rows="5" cols="" class="form-control" name="menu_description" id="menu_description">{$menuValue.0.menu_description|stripslashes}</textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<span class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="myaccsubmitbtn" value="{$LANG.res_myaccount_menuaddsubmit}" />
                    <a class="btn" href="restaurantOwnerMyaccount_menu.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Cancel</a>                    
				</span>	
			</div>
		</div>
	</form>
</div>


