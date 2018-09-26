<div class="page-header">
    <h1 class="title">Manage Restaurant Offer {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Restaurant Offer {if $smarty.get.resid} - {$restname}{/if}</li>
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


		
		{*{if $totalRecords gt 0}*}
		<div  class="filterbutton">
			<span class="topName1">Total Records:</span> <span class="topName2">{$tot_offer_rec}</span>
			<span class="topName1">Active Records:</span> <span class="topName2">{$active_offer_rec}</span>
			<span class="topName1">Deactive Records:</span> <span class="topName2">{$deactive_offer_rec}</span>
		</div>
		
		<div class="col-sm-5 no-padding form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-2">Show</label>
				<select class="selectpicker" data-width="80px" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
					<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
					<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
					<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
					<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
					<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
					<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
					<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
					<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
				</select>
				<span class="">per page</span>
			</div>
		</div>
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="restaurantoffermanage" method="post" action="restaurantOfferManage.php" />
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
			{if !$smarty.get.resid}
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.restaurantoffermanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
			{/if}
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.restaurantoffermanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				
				<optgroup label="Others">
					{if !$smarty.get.resid}
					<option value="rasc" {if $smarty.request.sortby eq 'rasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="rdesc" {if $smarty.request.sortby eq 'rdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
					{/if}
					<option value="priceasc" {if $smarty.request.sortby eq 'priceasc'}selected="selected"{/if}>&nbsp;&nbsp;Offer Price 0 to 9</option>
					<option value="pricedesc" {if $smarty.request.sortby eq 'pricedesc'}selected="selected"{/if}>&nbsp;&nbsp;Offer Price 9 to 0</option>
					<option value="perasc" {if $smarty.request.sortby eq 'perasc'}selected="selected"{/if}>&nbsp;&nbsp;Offer Percentage 0 to 9</option>
					<option value="perdesc" {if $smarty.request.sortby eq 'perdesc'}selected="selected"{/if}>&nbsp;&nbsp;Offer Percentage 9 to 0</option>
				</optgroup>
			</select>
            </div>
			</form>
		</div>
		{*{/if}*}
		<div class="col-sm-12 no-padding">
		<!--Button Left start-->
			<div  class="manageButtonLeft">	
				<!--Filter-->
				<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
        			 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
        		</div>
				<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
					<form name="filterform" method="post" action="restaurantOfferManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filter" />
						<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
						
						<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Offer Percentage/Price" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
					</form>	 
				</div>
				{*<!--Export-->
				<div class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
					<!--<img src="images/icon_plus.png" alt="Export" title="Export" />-->
				</div>
				<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
					<form name="exportform" method="post" onsubmit="return exportValidation();">
						<input type="hidden" name="action"  value="export" />
								
						<select name="exportfile" id="exportfile">				 	 
							<option value="CSV">CSV</option>
							<option value="Excel">Excel</option>	
						</select>
						<input type="submit" name="export" value="Export" class="buttonFilter" />	
					</form>				 
				</div>
				<!--Import-->
				<div class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
					<!--<img src="images/icon_plus.png" alt="Import" title="Import" />-->
				</div>
				<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
					<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
						<input type="hidden" name="action" value="import" />	
						
						 <input type="file" name="importfile" id="importfile" />
						 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
						 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
						 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
								 
					</form>
				 </div>*}
                 
			</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			 <span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="btn btn-info btn-sm" href="restaurantManage.php{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Back</a>{/if}
			
			<a class="btn btn-default btn-sm" href="restaurantOfferAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{elseif $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}"><i class="fa fa-plus-circle"></i>  Add New</a>
			
			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','restoffer');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 {/if}
		</div>
		<!--Button List End-->
        </div>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th width="5%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="5%" >S.No</th>
					<th width="{if !$smarty.get.resid}10%{else}10%{/if}" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'perdesc'}onclick="sortByAscDesc('perasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'perasc'}onclick="sortByAscDesc('perdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('perdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Offer (%){if $smarty.request.sortby eq 'perdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'perasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="10%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'pricedesc'}onclick="sortByAscDesc('priceasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'priceasc'}onclick="sortByAscDesc('pricedesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('pricedesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Offer Price{if $smarty.request.sortby eq 'pricedesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'priceasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="10%" >Offer From</th>
					<th width="10%" >Offer To</th>
					{if !$smarty.get.resid}
					<th width="20%" ><a href="javascript:void(0);" {if $smarty.request.sortby eq 'rdesc'}onclick="sortByAscDesc('rasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'rasc'}onclick="sortByAscDesc('rdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('rdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'rdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'rasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
                    <th width="5%">Id</th>
					<th width="10%">Added Date</th>
					<th width="5%">Status</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="15%">Action</th>
                    {/if}
				</tr>									
				{section name="maincat" loop=$restaurantOfferList}
				{assign var="trvar" value=$smarty.section.maincat.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$restaurantOfferList[maincat].offer_id}">
					<td align="center" class="listCont">
					
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$restaurantOfferList[maincat].offer_id}" onclick="individualSelect();" id="tableselect_{$smarty.section.maincat.rownum}" />
							<label for="tableselect_{$smarty.section.maincat.rownum}"></label>
						</div>
					</td>
					<td align="center" class="listCont">{$restaurantOfferList[maincat].sno}</td>
					<td align="left" class="listCont">{$restaurantOfferList[maincat].offer_percentage|stripslashes|string_format:"%.0f"}</td>
					<td align="left" class="listCont">{$restaurantOfferList[maincat].offer_price|stripslashes}</td>
					<td align="left" class="listCont">{$restaurantOfferList[maincat].offer_valid_from|date_format:"%d-%m-%Y"}</td>
					<td align="left" class="listCont">{$restaurantOfferList[maincat].offer_valid_to|date_format:"%d-%m-%Y"}</td>
					{if !$smarty.get.resid}
					<td align="left" class="listCont">{$restaurantOfferList[maincat].offer_restname|ucfirst|stripslashes}</td>
					{/if}
                    <td align="center" class="listCont">{$restaurantOfferList[maincat].offer_id}</td>
					<td align="center" class="listCont">{$restaurantOfferList[maincat].addeddate|date_format:"%d-%m-%Y"}</td>
					<td align="center" class="listCont" id="chgstatus{$restaurantOfferList[maincat].offer_id}">
						{if $restaurantOfferList[maincat].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurantOfferList[maincat].offer_id}');" style="cursor:pointer;" />
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurantOfferList[maincat].offer_id}');" style="cursor:pointer;" />
						{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="">
						<span class="EditDeleteButton">
							<a href="restaurantOfferAddEdit.php?eid={$restaurantOfferList[maincat].offer_id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}" class="btn btn-light btn-icon">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurantOfferList[maincat].offer_id}','restoffer');" >
								<i class="fa fa-close"></i>
							</a>
						</span>
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
			</table>
		</div>
		<!--List End-->
		<div class="col-sm-5 col-xs-12 no-padding form-horizontal margin-top-10">
			<div class="form-group">
				<label class="control-label col-sm-2">Show</label>
				<select class="selectpicker" data-width="80px" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
					<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
					<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
					<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
					<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
					<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
					<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
					<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
					<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
				</select>
				<span class="">per page</span>
			</div>
		</div>
		<div class="col-sm-7 no-padding pull-right">
			{$pagination}
		</div>
	
	</div>

