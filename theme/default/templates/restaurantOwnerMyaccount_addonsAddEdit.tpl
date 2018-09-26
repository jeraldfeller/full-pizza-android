<!-- Addons Add and Edit -->
<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead">
		{$LANG.res_myaccount_addon}
	</h1>
	<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_addons.php{else}restaurant-myaccount-addons{/if}" class="addbtn pull-right"><i class="glyphicon glyphicon-arrow-left marRight"></i>{$LANG.res_myaccount_addonback}</a>
	<hr class="heading-hr">
	<form name="res_AddonsaddEdit" method="post" action="{if $smarty.get.addonid neq ''}restaurantOwnerMyaccount_addonsAddEdit.php?addonid={$smarty.get.addonid}{/if}" onsubmit="{if $smarty.get.addonid neq ''}return validateAddonsEdit();{else}return validateAddonsNew();{/if}" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="action" value="{if $smarty.get.addonid neq ''}Edit{else}Add{/if}"/>
        <input type="hidden" name="addonid" id="addonid" value="{$smarty.get.addonid}"/>
		
			<div class="ownerStaticContainer">
				<div class="form-group">
					<div class="col-sm-12">
						<div class="mandatoryField">
							<span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span> - {$LANG.res_myaccount_addonmandatory}
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<div id="errormsgAddon"></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label font-normal" for="menu_categor"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_addoncatname}</label>
					<span class="col-sm-4"> 
						<select class="form-control" name="menu_categor" id="menu_categor" onchange="otherSpecifyAddon('category');">
							<option value="">
								{$LANG.res_myaccount_addon_addnew_select}
							</option>
							{foreach from=$showcategorylist item=cat}
    							<option value="{$cat.maincateid}" {if $cat.maincateid eq $addonsValue.0.category_id}selected="selected"{/if}>
    								{$cat.maincatename}
    							</option>
							{/foreach}
							<option value="other" id="categoryOther_addon">
								{$LANG.res_myaccount_addoncatoptother}
							</option>
						</select>
					</span>
				</div>
				<!--Other Category-->
				<div class="form-group" id="catoters_addon" style="display:none;">
					<div class="col-sm-offset-4 col-sm-4">
						<input class="form-control" type="text" name="addon_catothers" id="addon_catothers" value="" />
						<span id="catname_errormsg">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label font-normal" for="addons_name"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_addonname}</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="addons_name" id="addons_name" value="{if $smarty.get.addonid neq ''}{$addonsValue.0.addonsname}{/if}"/>
					</div>
					<div class="col-sm-1">
						<input type="text" name="mainaddoncnt" id="mainaddoncnt" value="{if $addonsvalue.0.addonscount eq ''}Count{else}{$addonsvalue.0.addonscount}{/if}" onfocus="if (this.value == '{if $addonsvalue.0.addonscount eq ''}Count{else}{$addonsvalue.0.addonscount}{/if}')this.value='';"
					onblur="if(this.value == '')this.value='{if $addonsvalue.0.addonscount eq ''}Count{else}{$addonsvalue.0.addonscount}{/if}';" size="12" class="form-control"/>
					</div>
					<div class="col-sm-2">
						<a onclick="addListSubAddons1();" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign marRight"></i>{$LANG.res_myaccount_addsub_addons}</a>
					</div>
				</div>
				{if $smarty.get.addonid neq ''}
				<div id="editSubaddonsList">
					<div class="newContMadfood" {if $addonsvalue.0.addonspriceoption eq 'Paid'} style="display:none;"{/if}>
						
						{section name="addon" loop=$showmainAddonslist}
						<div class="form-group">
							<span class="col-sm-offset-4 col-sm-4">
								<input type="text" name="addonsub[{$smarty.section.addon.index}][subaddonsname]" id="{$showmainAddonslist[addon].addonsname|stripslashes}" value="{$showmainAddonslist[addon].addonsname|stripslashes}"
							class="form-control" />
							</span>
						</div>
						{/section}
						
					
						<div id="subaddonslistEdit">
						</div>
				   
						{section name=addon1 loop=$cntmainAddons} {assign var=mainaddon value=$smarty.section.addon1.index}
							<input type="hidden" name="addonsub[{$mainaddon}][subaddoneditid]" value="{$showmainAddonslist.$mainaddon.id}" />
						{/section}
					</div>
				</div>
				{/if}
				<div id="subaddonslist">
				</div>
				<!-- Add Start -->
				<div id="buttondiv">
				</div>
						
						<!-- Add End -->
			
                
			<div class="form-group">
				<span class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="myaccsubmitbtn" id="restAddonsAddEdit" value="{$LANG.res_myaccount_addonaddsubmit}" />
				</span>
			</div>
						
				
			
		</div>
	</form>
</div>
