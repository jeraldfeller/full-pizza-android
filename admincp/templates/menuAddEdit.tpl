<div class="page-header">
    <h1 class="title">{if $smarty.get.eid neq ''}Edit{else}Add{/if} Menu</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.eid neq ''}Edit{else}Add{/if} Menu</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
        <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>


<div class="panel panel-default">
	    <div class="panel-body">

		<form name="addNewMenu" method="post" action="{if $smarty.get.eid neq ''}menuAddEdit.php?eid={$smarty.get.eid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{else}menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{/if}" onsubmit="return {if $smarty.get.eid neq ''}menuValidateEdit();{else}menuValidateNew();{/if}" enctype="multipart/form-data" class="form-horizontal col-sm-12">
			<input type="hidden" name="eid" id="eid" value="{$smarty.get.eid}" />
			<input type="hidden" name="resid" id="resid" value="{$smarty.get.resid}" />
			<input type="hidden" name="action" value="{if $smarty.get.eid eq ''}Add{else}Edit{/if}" />
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
				</div>
			</div>

			<!--Restaurant Name-->
			{*{if $smarty.get.resid eq ''}
			<div class="form-group">
				<span class="control-label col-sm-4">Restaurant Name<span class="color-red">*</span></span>
				<div class="col-sm-4">
					<select class="form-control selectpicker" name="restaurant_name" id="restaurant_name" onchange="changeRestaurant(); restaurantCategory(this.value);">
						<option value="">Select</option>
						{foreach from=$showRestaurantList item=restlist}
							<option value="{$restlist.restaurant_id}" {if $restlist.restaurant_id eq $menudet.0.restaurant_id}selected="selected"{/if}>{$restlist.restaurant_name|stripslashes}</option>
						{/foreach}
					</select>
				</div>
			</div>
			{/if}*}
			<!--Menu Name1-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Name <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="menu_name" id="menu_name" value="{if $smarty.get.eid neq ''}{$menudet.0.menu_name|stripslashes}{/if}" />
				</div>
			</div>
			
			<!--Menu Type-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Type </span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_type" id="menu_type"	value="veg" {if $menudet.0.menu_type eq 'veg'}checked="checked"{else}checked="checked"{/if} class=""  />
						<label for="menu_type">Veg</label>
					</div>
					<div class="radio-inline radio">	
						<input type="radio" name="menu_type" id="menu_type1" value="nonveg" {if $menudet.0.menu_type eq 'nonveg'}checked="checked"{/if} class="radiobotton" />
						<label for="menu_type1">Non-Veg</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="menu_type" id="menu_type2" value="other" {if $menudet.0.menu_type eq 'other'}checked="checked"{/if} class="radiobotton" />
						<label for="menu_type2">Other</label>
					</div>
				</div>
			</div>
            
			<!--Menu Cuisine-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Cuisine (Not mandatory Field)</span>
				<div class="col-sm-4">
					<select class="form-control selectpicker" name="menu_cuisine" id="menu_cuisine" >
						<option value="">Select</option>
						{foreach from=$showcuisinelist item=cuis}
							<option value="{$cuis.cuisine_id}" {if $cuis.cuisine_id eq $menudet.0.menu_cuisine}selected="selected"{/if}>{$cuis.cuisine_name}</option>
						{/foreach}
					</select>
				</div>
			</div>	
			
			<!--Menu Category-->
			<div class="form-group">
    			<span id="restCategoryList">
        			<span class="control-label col-sm-4">Menu Category <span class="color-red">*</span></span>
	        			<div class="col-sm-4">
	            			<select class="form-control selectpicker" name="menu_category" id="menu_category" {if $smarty.get.eid eq ''}onchange="otherSpecify('category');getShowAddons(this.value);"{else}onchange="otherSpecify('category');getShowAddons(this.value);"{/if} >
	                			<option value="">Select</option>
	                			{foreach from=$showcategorylist item=cat}
	                			<option value="{$cat.maincateid}" {if $cat.maincateid eq $menudet.0.menu_category || $cat.maincateid eq $smarty.get.catid}selected="selected"{/if}>{$cat.maincatename}</option>
	                			{/foreach}
	                            
	                			<option value="other" id="categoryOther" onclick="otherSpecify('category');">Others</option>
	                            
	            			</select>
	        			<span id="caterrormsg"></span>
	        		</div>
    			</span>
			</div>
			
			{*----------- To Check Pizza category in ceartesubaddons link ------------*}
			{foreach from=$showcategorylist item=cat}				
				<input type="hidden" name="cat_pizzasubaddon_changecat_val_{$cat.maincateid}" id="cat_pizzasubaddon_changecat_val_{$cat.maincateid}" value="{$cat.maincatename}" />				
			{/foreach}
			
			{*------------ To Check Pizza category in ceartesubaddons link -----------*}	
			<!--Other Category-->
			<div class="form-group" id="catoters" style="display:none;">
				<div class="col-sm-4 col-sm-offset-4">
				    <input class="form-control" type="text" name="menu_catothers" id="menu_catothers" value="" />
				    <span id="catname_errormsg"></span>
				</div>
	        </div>
            {*---------------------------------------------------------------------------------------------------*}
			<!--Menu Addons-->
			<div class="form-group">
				<span class="control-label col-sm-4">Addons </span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_addons" id="addonsval_yes" value="Yes" {if $menudet.0.menu_addons eq 'Yes'}checked="checked"{/if} onclick="{if $smarty.get.eid eq ''}showAddons();{else}{if $menudet.0.menu_addons eq 'No'}showeditaddon({$menuaddonscategory_edit},{$smarty.get.eid},{$smarty.get.resid});{else}showeditaddon_yes();{/if}{/if}" class=""/>
						<label for="addonsval_yes">Yes</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="menu_addons" id="addonsval_no" value="No" {if $menudet.0.menu_addons eq 'No' or $smarty.get.eid eq ''}checked="checked"{/if} onclick="showAddons1();" class=""/>
						<label for="addonsval_no">No</label>
					</div> 
				</div>
			</div>	
			{*--------------------------------------------------------------------------*}		
			<!--Menu Size option Pizza Slice New concept Starts-->
				
			<div class="form-group" id="menusize_option">
				<span class="control-label col-sm-4">Menu Price<span class="color-red">*</span></span>
				<div class="col-sm-4">
					{*{$objSite->geteditMenuSizeList_cat($menudet.0.menu_category)}*}
					<div class="radio-inline radio">
						<input type="radio" name="sizeoption" id="sizeoption_fixedprice" value="fixed" {if $menudet.0.sizeoption eq 'fixed'}checked="checked"{else}checked="checked"{/if} onclick="return fixedOption();" class=""/>
						<label for="sizeoption_fixedprice">Fixed Price</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="sizeoption" id="sizeoption_default" value="default" {if $menudet.0.sizeoption eq 'size'}checked="checked"{/if} onclick="return defaultOption();" class=""/>
						<label for="sizeoption_default">Size</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="sizeoption" id="sizeoption_other" value="other" {if $menudet.0.sizeoption eq 'slice'}checked="checked"{/if} onclick="return otherOption();" class="radiobotton"/>
						<label for="sizeoption_other">Slice</label>
					</div>	
				</div>
				
                {*------------- Fixed -----------------*}
				<span id="fixedOption" class="col-sm-4 col-sm-offset-4 martopbtm5"  {if $menudet.0.sizeoption eq 'slice' or $menudet.0.sizeoption eq 'size' and $smarty.get.eid neq ''}style="display:none;"{/if}>
					
						<input class="form-control numericfield" type="text" name="menu_price_main" id="menu_price" value="{if $smarty.get.eid neq '' and $menudet.0.sizeoption eq 'fixed'}{$menudet[0].menu_price|stripslashes}{/if}" />
							
				</span>
				{*------------- Size -----------------*}
				<span id="pizzaDefaultOption" class="col-sm-4 col-sm-offset-4 martopbtm5" {if $smarty.get.eid neq '' and $menudet.0.sizeoption eq 'size'}style="display:block;"{else}style="display:none;"{/if}>
					<div class="col-sm-12 no-pad">
						<div class="col-sm-6">
							<div class="checkbox checkbox-primary">
								<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" {if $menudet.0.pizza_size_small eq 'small' and $menudet.0.sizeoption eq 'size'}checked="checked"{/if} class=""/>
								<label for="small">Small</label>
							</div>
						</div>

							<span id="smallpriceshow" class="col-sm-6 marBtm5" {if $menudet.0.pizza_size_small neq 'small'  or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} >
							<input type="text" name="smallval_main" id="smallval" value="{if $menudet.0.pizza_small_value neq '0.00'  and $menudet.0.sizeoption eq 'size'}{$menudet.0.pizza_small_value}{/if}" class="form-control input-sm numericfield" placeholder="Price" /></span>
					</div>
					<div class="col-sm-12 no-pad">
						<div class="col-sm-6">
							<div class="checkbox checkbox-primary">
								<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" {if $menudet.0.pizza_size_medium eq 'medium' and $menudet.0.sizeoption eq 'size'}checked="checked"{/if} class="" />
								<label for="medium">Medium</label>
							</div>
						</div>
					
						<span id="mediumpriceshow" class="col-sm-6 marBtm5" {if $menudet.0.pizza_size_medium neq 'medium'  or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if}>
						<input type="text" name="mediumval_main" id="mediumval" value="{if $menudet.0.pizza_medium_value neq '0.00' and $menudet.0.sizeoption eq 'size'}{$menudet.0.pizza_medium_value}{/if}" class="form-control input-sm numericfield" placeholder="Price" /></span>
					</div>
					<div class="col-sm-12 no-pad">
						<div class="col-sm-6">
							<div class="checkbox checkbox-primary">
								<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" {if $menudet.0.pizza_size_large eq 'large' and $menudet.0.sizeoption eq 'size'}checked="checked"{/if} class="">
								<label for="large">Large</label>
							</div>
						</div>	
					
						<span id="largepriceshow" class="col-sm-6 marBtm5" {if $menudet.0.pizza_size_large neq 'large' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if}>
						<input type="text" name="largeval_main" id="largeval" value="{if $menudet.0.pizza_large_value neq '0.00' and $menudet.0.sizeoption eq 'size'}{$menudet.0.pizza_large_value}{/if}" class="form-control input-sm numericfield" placeholder="Price" /></span>
					</div>
										
				</span>
				{*------------- Slice -----------------*}
				<span id="pizzaOtherOption"  class="col-sm-8 col-sm-offset-4 martopbtm5" {if $menudet.0.sizeoption eq 'slice' and $smarty.get.eid neq ''}style="display:block;"{else}style="display:none;"{/if}>
					<div id="existSlice">
						{section name="slicelist" loop=$showPizzaSlicelist}
						<div class="col-sm-12 no-padding marBtm5">
							 <div class="row">
							 	<div class="col-sm-4">
									<input type="text" name="size_option[{$smarty.section.slicelist.index}][sizename]" id="sizename" value='{$showPizzaSlicelist[slicelist].pizza_slice_name|stripslashes}' class="form-control slicevalidate sliceCnt"/>
								</div>
                                <input type="hidden" id="pizzaeditid" name="size_option[{$smarty.section.slicelist.index}][sliceeditid]" value="{$showPizzaSlicelist[slicelist].pizza_slice_id}"/>   
								<div class="col-sm-2">
									<input type="txt" name="{if $menudet.0.menu_addons eq 'Yes'}size_option[{$smarty.section.slicelist.index}][sizevalue]{else}size_option[{$smarty.section.slicelist.index}][sizevalue]{/if}" id="sizevalue" value="{$showPizzaSlicelist[slicelist].pizza_slice_price}" class="form-control numericfield slicevalidate" /> 
								</div>
							</div>
						</div>
						{/section}
					</div>
					
					
                    {if $smarty.get.eid eq ''}
					<div id="specialPizzaSize" >
						{section name=slice1 loop=$cntSliceAddons}
						{assign var=sliceList value=$smarty.section.slice1.index}
						<input type="hidden" name="size_option[{$sliceList}][sliceeditid]" value="{$showPizzaSlicelist.$sliceList.pizza_slice_id}" />
						{/section}
						
						<a onclick="addMorePizzaSize();" class="btn btn-success">Add More Slice</a>
						
					</div>
                    {else}
                    <div id="specialPizzaSize">
						{section name=slice1 loop=$cntSliceAddons}
						{assign var=sliceList value=$smarty.section.slice1.index}
						<input type="hidden" name="size_option[{$sliceList}][sliceeditid]" value="{$showPizzaSlicelist.$sliceList.pizza_slice_id}" />
						{/section}
						
                        
							<a onclick="addMorePizzaSize();" class="btn btn-success">Add More Slice</a>
						
					</div>
                    {/if}
				</span>					
			</div>
			
			{*-------------------------------------------------------------------------------------------------------------------------*}
			<!--Pizza Slice Addons New Concept Starts-->
			<div class="addPageCont addonsListShow">
				<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="{$cntSliceAddons}" />
				<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
				<div id="showcataddonsList" {if $smarty.get.eid eq '' or $menudet.0.menu_addons neq 'Yes'} style="display:none;" {/if}>
					
					<div class="col-sm-8 col-sm-offset-4">
				    
					{section name="addon" loop=$showAddonslist}					
					{*if $showAddonslist[addon].addonspriceoption eq 'Free'*}
					<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />{*/if*}
					<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddoneditid]" value="{$showAddonslist[addon].menu_addonid}" />
					{*$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)*}
                    {assign var='showSubAddonslist' value=$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
					{if $showSubAddonslist neq ''}
                     
						<b class="contain marBtm5" style="cursor:pointer;" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|ucfirst|stripslashes}
                            <img src="images/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/>
                            <img src="images/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/>
                        </b>	
						<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>
							{section name=subaddon loop=$showSubAddonslist}
							<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addoneditid]" value="{$showSubAddonslist[subaddon].menu_addonid}" />
                            <div class="form-group">
								<div class="col-sm-3">	
                                	
									{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
										<div class="checkbox-inline checkbox checkbox-primary">
											<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" {if $showSubAddonslist[subaddon].id eq $showSubAddonslist[subaddon].addonid}checked="checked"{/if} />
											<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</label>
										</div>
									{else}
										<div class="checkbox-inline checkbox  checkbox-primary">
											<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" class="" />
											<span class="">{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</span>
										</div>
									{/if}
								</div>			
								<div class="col-sm-3">			
									<div class="radio-inline radio">
										<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" value="Free" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}','{$menudet.0.sizeoption}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $showSubAddonslist[subaddon].menuprice eq ''}checked="checked"{/if} class="free"/>
										<label for="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]">Free</label>
									</div>
                                    <div class="radio-inline radio">
                                    	<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" value="Paid" onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}','{$menudet.0.sizeoption}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if} class="paid"/>
                                    	<label for="paid_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]">Paid</label>
                                    </div>
                                </div>                                         
								<div class="col-sm-5">			
									<span {if $showSubAddonslist[subaddon].menupriceoption eq 'Free'}style="display:none;"{/if} id="addonspricepaid_{$showSubAddonslist[subaddon].id}" >
                                    
										<!--Fixed option's addons price-->												
										<span id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed">
                                            <span class="col-sm-6">
                                                <input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Fixed{/if}';"/>			
    										</span>	
                                        </span>					
												
										<!--Size option's addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size">
    										<div class="col-sm-4">		
											    <input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Small{/if}';"/>
                                            </div>
                                            <div class="col-sm-4">	
												<input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
                                            </div>
                                            <div class="col-sm-4">
												<input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />
                                            </div>
    									</span>
												
										<!--Slice options addons price-->
										<div id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="showprice_slice">
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />	
 											{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
												{assign var='sliceaddonprice_arr' value=$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)}	
												{section name=slice1 loop=$sliceaddonprice_arr}
												{assign var=sliceList value=$smarty.section.slice1.index}
                                                <div class="col-sm-4 marBtm5">
												   <input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $sliceaddonprice_arr[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
                                                </div> 			
												{/section}										
											{else}											
												{section name=slice1 loop=$cntSliceAddons}
												{assign var=sliceList value=$smarty.section.slice1.index}
                                                <div class="col-sm-4 marBtm5">
											    	<input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $cntSliceAddons[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
                                                </div>
												{/section}
											{/if}
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />
												
											<span class="slicemoreprice" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></span>																																		 
										</div>
									</span>
                                </div>
								{*------------- Remove Existing addons -----------------*}
                                {if $showSubAddonslist[subaddon].menu_addonid neq ''}
                                <div class="col-sm-1">
								<span  class="btn btn-danger btn-icon" onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname|addslashes}');"><i class="fa fa-close"></i></span>
                                </div>
                                {/if}
										
                            </div>										
							{/section}
								
						</div>
						{/if}
					{/section}
					<input type="hidden" id="total" value="{$smarty.section.addon.total}" />
					
				</div>
				<div id="createbuttondiv" class="addtoCartInnerNew1"></div>	
				<div class="clr"></div>				
				{*<a {if $menudet.0.sizeoption eq 'slice'}onclick="addCreateMoreAddons_slice();"{else}onclick="addCreateMoreAddons();"{/if} style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons">Create Addons</a>*}
				{if $smarty.get.eid neq ''}
                <div class="col-sm-offset-4 col-sm-4">
				   <a onclick="addCreateMoreAddons_first();"  class="btn btn-success" id="madAddons_first">Create Addons</a>
                </div>
                {/if}
	
					{*<a onclick="addCreateMoreAddons();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline; display:none;" class="madAddons" id="madAddons_def_fix_pg">Create Addons</a>
					
					<a onclick="addCreateMoreAddons_slice();" style="display:none;" class="btn btn-success" id="madAddons_slice_pg">Create Addons</a>*}
					
					
			</div>				
		</div>
			<!--Pizza Slice Addons New Concept Ends-->
			{*---------------------------------------------------------------------------------------------------------------------*}
			
			<!--Menu Special Instruction-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Special Instruction <span class="color-red"></span></span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_spl_ins" id="menu_spl_ins1" value="Yes" {if $menudet.0.menu_spl_instruction eq 'Yes'}checked="checked"{/if} />
						<label for="menu_spl_ins1">Yes</label>
					</div> 
					<div class="radio-inline radio">
						<input type="radio" name="menu_spl_ins" id="menu_spl_ins2" value="No" {if $smarty.get.eid neq ''}  {if $menudet.0.menu_spl_instruction eq 'No'}checked="checked"{/if}{else}checked="checked"{/if}  />
						<label for="menu_spl_ins2">No</label>
					</div>
						
				</div>
			</div>
			<!--Menu Description-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Description <span class="color-red"></span></span>
				<div class="col-sm-4">
					<textarea class="form-control" rows="5" name="menu_description" id="menu_description" />{$menudet.0.menu_description|stripslashes}</textarea>
				</div>
			</div>
			<!--Meno Photo -->
    	<div class="form-group">
				<label class="control-label col-sm-4">Menu Photo <span class="color-red"></span></label>
				<div class="col-sm-4">
					<input class="fileUpload" type="file" name="menu_photo" id="menu_photo" size="31" style="display:none;" />
					<label for="menu_photo" class="btn btn-default btn-sm" >
                      <i class="fa fa-folder-open"></i> Add Menu image		
                    </label>
					{if $smarty.get.eid neq '' and $menudet.0.menu_photo neq ''}<img src="{$SITE_IMAGE_MENU_URL}/{$menudet.0.menu_photo}"alt="image" width="50" height="50">{/if}
				</div>
			</div>
			<!--Menu Popular dish-->
			<div class="form-group">
				<span class="control-label col-sm-4">Popular Dish <span class="color-red"></span></span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_popular_dish" id="menu_popular_yes"	value="Yes" {if $menudet.0.menu_popular_dish eq 'Yes'}checked="checked"{/if} class="" />
						<label for="menu_popular_yes">Yes</label>
					</div>	
					<div class="radio-inline radio">	
						<input type="radio" name="menu_popular_dish" id="menu_popular_no" value="No" {if $menudet.0.menu_popular_dish eq 'No' or $smarty.get.eid eq ''}checked="checked"{/if} class=""/>
						<label for="menu_popular_no">No</label>
					</div>	
				</div>
			</div>
			<!--Menu Spicy-->
			<div class="form-group">
				<span class="control-label col-sm-4">Spicy Dish <span class="color-red"></span></span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_spicy" id="menu_spicy_yes"	value="Yes" {if $menudet.0.menu_spicy eq 'Yes'}checked="checked"{/if} class="" />
						<label for="menu_spicy_yes">Yes</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="menu_spicy" id="menu_spicy_no" value="No" {if $menudet.0.menu_spicy eq 'No' or $smarty.get.eid eq ''}checked="checked"{/if} class=""/>
						<label for="menu_spicy_no">No</label>
					</div>	
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" id="MenuAdd" name="addEdit" value="{if $smarty.get.eid}Edit{else}Add{/if}"> 
					<a class="btn" href="menuManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>

{literal}
    <script type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            /* numeric inputs can come from the keypad or the numeric row at the top */
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    </script>
{/literal}