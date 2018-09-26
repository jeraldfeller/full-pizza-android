<div class="page-header">
    <h1 class="title">{if $smarty.get.eid neq ''}Edit{else}Add{/if} Addons</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.eid neq ''}Edit{else}Add{/if} Addons</li>
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

		<form name="addNewAddons" method="post" action="{if $smarty.get.eid neq ''}addonsAddEdit.php?eid={$smarty.get.eid}{else}addonsAddEdit.php{/if}" onsubmit="return {if $smarty.get.eid neq ''}addonsValidateEdit();{else}addonsValidateNew();{/if}" class="col-sm-12 form-horizontal">
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
			{if $smarty.get.resid eq ''}
			<div class="form-group">
				<span class="col-sm-4 control-label">Restaurant Name <span class="color-red">*</span></span>
				<div class="col-sm-4" >
					<select class="form-control selectpicker" name="restaurant_name" id="restaurant_name" onchange="restaurantAddonsCategory(this.value);">
						<option value="">Select</option>
						{foreach from=$showRestaurantList item=restlist}
						<option value="{$restlist.restaurant_id}" {if $restlist.restaurant_id eq $addonsvalue.0.restaurant_id}selected="selected"{/if}>{$restlist.restaurant_name|stripslashes}</option>
						{/foreach}
					</select>
				</div>
			</div>
			{/if}
			<!-- Category Name -->
			{if $addonsvalue.0.restaurant_id neq ''}
				{$objSite->getShowCategoryList_res($addonsvalue.0.restaurant_id)}
			{/if}
			<div class="form-group">
                <span id="restAddonCategoryList">
    				<span class="col-sm-4 control-label">Category Name <span class="color-red">*</span></span>
    				<div class="col-sm-4" >
    				<select class="form-control selectpicker" name="category_name" id="category_name" onchange="otherSpecifyAddon('category');">
    				{if $smarty.request.resid eq '' and $smarty.request.eid eq ''}
						<option value="">Select restaurant</option>
					{/if}
					{if $smarty.request.resid neq '' or $smarty.request.eid neq ''}
						<option value="">Select</option>
						{foreach from=$showcategorylist item=cat}
							<option value="{$cat.maincateid}" {if $cat.maincateid eq $addonsvalue.0.category_id}selected="selected"{/if}>{$cat.maincatename|stripslashes}</option>
						{/foreach}
                        <option value="other" id="categoryOther_addon">Others</option>
					{/if}
    				</select>
    			</div>
                </span>    
			</div>
            <!--Other Category-->
    		<div class="form-group" id="catoters_addon" style="display:none;">
    			<div class="col-sm-offset-4 col-sm-4">
    				<input class="form-control" type="text" name="addon_catothers" id="addon_catothers" value="" />
    				<span id="catname_errormsg">
    			</div>
    		</div>
		<!--Addons Name-->
		<div class="form-group">
			<span class="col-sm-4 control-label">Addons Name <span class="color-red">*</span></span>
			<div class="col-sm-3 col-xs-12">
				<input class="form-control" type="text" name="addons_name" id="addons_name" value="{if $smarty.get.eid neq ''}{$addonsvalue.0.addonsname|stripslashes}{/if}" />
			</div>
			{*--------------------------------------------------------------------------------------------------*}
			<div class="col-sm-1 col-xs-12  no-pad-left xs-padding" >
					<input type="text" name="mainaddoncnt" id="mainaddoncnt" value="{if $addonsvalue.0.addonscount eq ''}count{else}{$addonsvalue.0.addonscount}{/if}" onfocus="if (this.value == '{if $addonsvalue.0.addonscount eq ''}count{else}{$addonsvalue.0.addonscount}{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $addonsvalue.0.addonscount eq ''}count{else}{$addonsvalue.0.addonscount}{/if}';" size="12" class="form-control"/>
			</div>
			<span class="showaddPriceList " {if $addonsvalue.0.addonspriceoption eq 'Paid'} style="display:none;"{/if}>
				<a onclick="addListSubAddons1();" class="btn btn-success btn-sm">Add Sub Addons</a>
			</span>
			
				{if $smarty.get.eid eq ''}<a onclick="addListMoreAddons();" class="btn btn-success btn-sm ">Add More Main Addons</a>{/if}
			
		</div>
		
			
				
				
		
				<div class="form-group">
	            	
					<div class="col-sm-4  col-sm-offset-4" {if $addonsvalue.0.addonspriceoption eq 'Paid'} style="display:none;"{/if}>
					{section name="addon" loop=$showmainAddonslist}
						<input type="text" name="addonsub[{$smarty.section.addon.index}][subaddonsname]" id="{$showmainAddonslist[addon].addonsname|stripslashes}" value="{$showmainAddonslist[addon].addonsname|stripslashes}" class="form-control marBtm5"/>
					{/section}
					</div>
					
					{section name=addon1 loop=$cntmainAddons}
					{assign var=mainaddon value=$smarty.section.addon1.index}
					<input type="hidden" name="addonsub[{$mainaddon}][subaddoneditid]" value="{$showmainAddonslist.$mainaddon.id}">
					{/section}
					<!-- Edit End-->
					
					
					
					{*<span class="showaddPriceList addPageRightFont" {if $addonsvalue.0.addonspriceoption eq 'Paid'} style="display:none;"{/if}>
						<a onclick="addListSubAddons1();" style="color:#3B3B3B;cursor:pointer;" class="madAddons"><span>Add Sub Addons</span></a>
					</span>*}
					
					<div id="subaddonslist"></div>
				</div>
				<div class="form-group">
					
					
					<!-- Add Start -->
						<div id="buttondiv" class=""></div>
						
						<!--{if $smarty.get.eid eq ''}<a onclick="addListSubAddons();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons">Add More Main Addons</a>{/if}	-->
					<!-- Add End -->
				</div>
			
		{********************************************************************************************}
			
		
		
		
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="submit" class="btn btn-default" id="AddonsAdd" name="addEdit" value="{if $smarty.get.eid}Edit{else}Add{/if}"> 
				<a class="btn" href="addonsManage.php{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Cancel</a>
			</div>
		</div>
	</form>
	</div>
</div>
