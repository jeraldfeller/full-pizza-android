<div class="page-header">
    <h1 class="title">{if $smarty.get.eid}Edit Main Category - {$catename|stripslashes}{elseif $smarty.get.seid and $smarty.get.mcatid }Edit Sub Category - {$parentname|stripslashes}{elseif $smarty.get.mcatid}Add New Sub Category - {$catename_sub|stripslashes}{else}Add New Main Category{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Addnew Category</li>
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
			<form name="addNewMainCategory" method="post" onsubmit="{if $smarty.get.eid}return editMainCategory();{elseif $smarty.get.seid and $smarty.get.mcatid}return editSubCategory();{elseif $smarty.get.mcatid}return addSubCategory();{else}return addMainCategory();{/if}" class="form-horizontal col-sm-12">
			
				<input type="hidden" name="eid" id="eid" value="{$smarty.get.eid}">
				<input type="hidden" name="mcatid" id="mcatid" value="{$smarty.get.mcatid}">
				<input type="hidden" name="action" value="{if $smarty.get.eid eq ''}Add{else}Edit{/if}">
				<input type="hidden" name="seid" id="seid" value="{$smarty.get.seid}"/>
				<input type="hidden" name="parentid" id="parentid" value="{$subcatname_id.0.parent_id|stripslashes}"/>
				<input type="hidden" name="resid" id="resid" value="{$smarty.get.resid}"/>
		        <div class="form-group">
		            <div class="col-sm-8">
			 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
		            </div>
		        </div>
		         <div class="form-group">
		            <div class="col-sm-8 col-sm-offset-4">
		                <div id="errormsg"></div>
		            </div>
		         </div>
		        
		        {*
				{if $smarty.get.resid eq ''}
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">Restaurant Name<span class="color-red">&nbsp;*</span></span>
					<div class="col-sm-4" >
						<select class="form-control selectpicker" name="restaurant_name" id="restaurant_name">
						<option value="">Select</option>
		                
		                
						{foreach from=$showRestaurantList item=restlist}
							<option value="{$restlist.restaurant_id}" {if $restlist.restaurant_id eq $restaurant_id}selected="selected"{/if}>{$restlist.restaurant_name|stripslashes}</option>
						{/foreach}
						</select>
		            </div>
				</div>
				{/if}
				*}
				
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">
					{if $smarty.get.mcatid || $smarty.get.seid}Sub Category Name:{else}Main Category Name 
					<span class="color-red">*</span>{/if}</span>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="maincatename" id="maincatename" value="{if $smarty.get.eid}{$catename|stripslashes}{elseif $smarty.get.seid}{$subcatname_id.0.maincatename|stripslashes}{/if}" />
						<script type="text/javascript">document.addNewMainCategory.maincatename.focus();</script>
		            </div>
				</div>
				
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">Category Option<span class="color-red">*</span></span>
					<div class="col-sm-4">
			            <div class="radio-inline radio">
							<input class="radiobotton" type="radio" name="maincat_option" id="maincat_option_normal" value="normal" {if $smarty.get.eid neq ''}  {if $catoption eq 'normal'} checked="checked" {/if} {else}checked="checked" {/if}/>
			                <label for="maincat_option_normal">Normal</label>
			            </div>
						<div class="radio-inline radio">
							<input class="radiobotton" type="radio" name="maincat_option" id="maincat_option_pizza" value="pizza" {if $smarty.get.eid neq ''}  {if $catoption eq 'pizza'} checked="checked" {/if}{/if}/>
			                <label for="maincat_option_pizza">Pizza</label>
			            </div> 
					</div>
				</div>
				<div class="form-group">
		            <div class="col-sm-4 col-sm-offset-4">
						<input type="submit" class="btn btn-default" id="CategoryAdd" name="addEdit" value="{if $smarty.get.eid || $smarty.get.seid}Edit{else}Add{/if}">
						<a class="btn"{if $smarty.get.mcatid} href="categorySubManage.php?mcatid={$smarty.get.mcatid}"{elseif $smarty.get.seid} href="categorySubManage.php?mcatid={$smarty.get.mcatid}"{else}href="categoryManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}"{/if}>Cancel</a>
		            </div>
				</div>
			</form>
	    </div>
    </div>
