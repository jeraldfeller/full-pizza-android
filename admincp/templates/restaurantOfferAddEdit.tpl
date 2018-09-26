<div class="page-header">
    <h1 class="title">{if $smarty.get.eid} Edit Restaurant Offer {else} Add New Restaurant Offer{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.eid} Edit Restaurant Offer {else} Add New Restaurant Offer{/if}</li>
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
		
		<form name="addNewResOffr" method="post" action="{if $smarty.get.eid neq ''}restaurantOfferAddEdit.php?eid={$smarty.get.eid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{else}restaurantOfferAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{/if}" onsubmit="{if $smarty.get.eid}return editRestaurantOffer(); {else} return addNewRestaurantOffer(); {/if}" class="form-horizontal col-sm-12">
			<input type="hidden" name="eid" id="eid" value="{$smarty.get.eid}">
			<input type="hidden" name="resid" id="resid" value="{$smarty.get.resid}">
			<input type="hidden" name="action" value="{if $smarty.get.eid eq ''}Add{else}Edit{/if}">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
            <div class="successmsg">NOTE: Able to add multiple offers but the recently added offer alone will be applicable for customers</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
				</div>
			</div>
			{*$restOffEdList|@print_r*}
			{if $smarty.get.resid eq ''}
			<div class="form-group">
				<span class="control-label col-sm-4">Restaurant Name <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<select class="form-control selectpicker" name="restaurant_name" id="restaurant_name">
					<option value="">Select</option>
					{foreach from=$showRestaurantList item=restlist}
						<option value="{$restlist.restaurant_id}" {if $restlist.restaurant_id eq $restOffEdList.0.restaurant_id}selected="selected"{/if}>{$restlist.restaurant_name|stripslashes}</option>
					{/foreach}
					</select>
				</div>
			</div>
			{/if}
			
			<div class="form-group">
				<span class="control-label col-sm-4">Offer Percentage <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<div class="input-group">
						<input class="form-control numericfield" type="text" max='100' name="offer_percentage" id="offer_percentage" value="{$restOffEdList.0.offer_percentage}" />
						<span class="input-group-addon">
							%
						</span>
					</div>
					<script type="text/javascript">document.addNewResOffr.offer_percentage.focus();</script>
					<input type="hidden" name="offer_id" id="offer_id" value="{$restOffEdList.0.offer_id}" />
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4">Offer Price <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control numericfield" type="text" name="offer_price" id="offer_price" value="{$restOffEdList.0.offer_price}" />
				</div>
			</div>
			
			<div class="form-group">
					<span class="control-label col-sm-4">Valid From <span class="color-red">*</span></span>
					<div class="col-sm-4">
					<div class="input-group">
						<input class="form-control" name="offer_valid_from" id="offer_valid_from" type="text" value="{$restOffEdList.0.offer_valid_from|date_format:"%d-%m-%Y"}" />
						<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
					</div>
					
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4">Valid To <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<div class="input-group">
						<input class="form-control" class="textbox" name="offer_valid_to" id="offer_valid_to" type="text" value="{$restOffEdList.0.offer_valid_to|date_format:"%d-%m-%Y"}" />
						<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
					</div>
					
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" id="OfferAdd" name="addEdit" value="{if $smarty.get.eid}Edit{else}Add{/if}" >
					<a class="btn" href="restaurantOfferManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}">Cancel</a>
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