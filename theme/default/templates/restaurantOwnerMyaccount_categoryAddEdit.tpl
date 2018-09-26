<!-- Category Add Edit  -->
<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead">{$LANG.res_myaccount_cat}</h1>
	<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_category.php{else}restaurant-myaccount-category{/if}" class="addbtn pull-right" ><i class="glyphicon glyphicon-arrow-left marRight"></i>{$LANG.res_myaccount_cataddback}</a>
	<hr class="heading-hr">
	<div class="clr"></div>
	<div class="ownerStaticContainer">
    	<form name="categoryAddEdit" method="post" action="{if $smarty.get.catid neq ''}restaurantOwnerMyaccount_categoryAddEdit.php?catid={$smarty.get.catid}{/if}" onsubmit="{if $smarty.get.catid}return validateCategoryEdit();{else}return validateCategoryNew();{/if}" class="form-horizontal">
    
	        <input type="hidden" name="catid" id="catid" value="{$smarty.get.catid}"/>
			<input type="hidden" name="action" value="{if $smarty.get.catid eq ''}Add{else}Edit{/if}"/>
	        <div class="form-group">
		   		<div class="col-sm-12">
					<div class="mandatoryField">
						<span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>
						- {$LANG.res_myaccount_catmandatory}
					</div>
				</div>
			</div>
		   <!--Category Name-->
		   <div class="form-group">
		   		<div class="col-sm-offset-4 col-sm-5">
					<div id="errormsgCategory"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label font-normal" for="maincatename"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_catname}</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="maincatename" id="maincatename" value="{if $smarty.get.catid neq ''}{$categoryValue.0.maincatename}{/if}"/>
				</div>
			</div>
			
			<!--Category Option-->
			<div class="form-group" id="matcat_option">
				<label class="col-sm-4 control-label font-normal"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_category_option}</label>
				<span class="col-sm-4" id="">
					<div class="radioln radio-primary radio-inline">
						<input class="" type="radio" name="maincat_option" id="maincat_option_normal" value="normal" {if $categoryValue.0.maincat_option eq 'normal'} checked="checked" {else}checked="checked" {/if}/>
						<label for="maincat_option_normal" >{$LANG.res_myaccount_normal}</label>
					</div>
					<div class="radioln radio-primary radio-inline">
						<input class="" type="radio" name="maincat_option" id="maincat_option_pizza" value="pizza" {if $categoryValue.0.maincat_option eq 'pizza'} checked="checked" {/if}/>
						<label for="maincat_option_pizza" >{$LANG.res_myaccount_pizza}</label> 
					</div>
				</span>				
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-5">
					<input type="submit" class="myaccsubmitbtn" id="restcategoryAddEdit" value="{$LANG.res_myaccount_cataddsubmitbut}" />
				</div>	
			</div>
        </form>
	</div>
</div>		
