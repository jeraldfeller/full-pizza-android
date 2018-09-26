<div class="page-header">
    <h1 class="title">Manage Deleted Restaurant</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Deleted Restaurant</li>
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
		{if $searchrestaurantid eq ''}
		<div  class="filterbutton">
			<span class="topName1">Total Restaurant:</span> <span class="topName2">{$tot_res}</span>
			<span class="topName1">Active Restaurant:</span> <span class="topName2">{$active_res}</span>
			<span class="topName1">Deactive Restaurant:</span> <span class="topName2">{$deactive_res}</span>
			<span class="topName1">Pending Restaurant :</span> <span class="topName2">{$pending_res}</span>
		</div>
		{/if}
		
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
			<form name="restaurantmanage" method="post" action="deletedRestaurantManage.php" >
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.restaurantmanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.restaurantmanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
					<option value="pending" {if $smarty.request.sortby eq pending} selected="selected"{/if}>&nbsp;&nbsp;Pending Activation</option>
				</optgroup>
				<optgroup label="Others">
					<option value="rasc" {if $smarty.request.sortby eq 'rasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="rdesc" {if $smarty.request.sortby eq 'rdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
					
					<option value="stateasc" {if $smarty.request.sortby eq 'stateasc'}selected="selected"{/if}>&nbsp;&nbsp;State Name A to Z</option>
					<option value="statedesc" {if $smarty.request.sortby eq 'statedesc'}selected="selected"{/if}>&nbsp;&nbsp;State Name Z to A</option>
					
					<option value="cityasc" {if $smarty.request.sortby eq 'cityasc'}selected="selected"{/if}>&nbsp;&nbsp;City Name A to Z</option>
					<option value="citydesc" {if $smarty.request.sortby eq 'citydesc'}selected="selected"{/if}>&nbsp;&nbsp;City Name Z to A</option>
					
					{*<option value="zipasc" {if $smarty.request.sortby eq 'zipasc'}selected="selected"{/if}>&nbsp;&nbsp;Zip Code 1 to 9</option>
					<option value="zipdesc" {if $smarty.request.sortby eq 'zipdesc'}selected="selected"{/if}>&nbsp;&nbsp;Zip Code 9 to 1</option>
					*}
				</optgroup>
			</select>
            </div>
			</form>
		</div>
		{*{/if}*}
        <div class="col-sm-12 no-padding">
		<!--Button Left start-->
		<div class="manageButtonLeft">
			{if $totalRecords gt 0}	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
    			 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
    		</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" action="deletedRestaurantManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
					
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Restaurant name/City/Email">
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			{*<!--Export-->
			<div  class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
				<!--<img src="images/icon_plus.png" alt="Export" title="Export" />-->
			</div>
			<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
				<form name="exportform" method="post" onsubmit="return exportValidation();">
					<input type="hidden" name="action"  value="exportProcess" />
							
					<select name="exportfile" id="exportfile">				 	 
						<option value="CSV">CSV</option>
						<option value="Excel">Excel</option>	
					</select>
					<input type="submit" name="export" value="Export" class="buttonFilter" />	
				</form>				 
			</div>
			
			<!--Import-->
			<div  class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
				<!--<img src="images/icon_plus.png" alt="Import" title="Import" />-->
			</div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
				</form>
			 </div>*}
			 {/if}
             
		</div>
        
		<!--Button Left End-->
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
		<!--Button List start-->
		<div class="manageButtonLastCont">
            
			{*<a class="manageButton_addnw" href="restaurantAddEdit.php">Add New</a>*}
			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminFullDelete('delete','deletefield','{$whereField}','{$tablename}','{$word}','restaurant');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    			 <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
            {/if}
		</div>
		<!--Button List End-->
		</div>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table width="100%" border="0" class="table table-hover table-bordered table-striped">
				<tr class="">
					<th width="2%" align="center" class="">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%" align="center" class="">S.No</th>
					<th width="6%" align="left" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'rdesc'}onclick="sortByAscDesc('rasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('rdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant Name{if $smarty.request.sortby eq 'rdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'rasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="8%" align="left" class="">Phone No</th>
					<th width="7%" align="center" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'statedesc'}onclick="sortByAscDesc('stateasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('statedesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>State{if $smarty.request.sortby eq 'statedesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'stateasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="8%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'citydesc'}onclick="sortByAscDesc('cityasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('citydesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>City{if $smarty.request.sortby eq 'citydesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'cityasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="8%" align="left" class=" ">Zip Code
						{*<a href="javascript:void(0);" {if $smarty.request.sortby eq 'zipdesc'}onclick="sortByAscDesc('zipasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('zipdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Zip Code{if $smarty.request.sortby eq 'zipdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'zipasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>*}
					</th>
					<th width="5%" align="center" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'idesc'}onclick="sortByAscDesc('iasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('idesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Id{if $smarty.request.sortby eq 'idesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'iasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="10%" align="center" class="">Added Date</th>
					<th width="5%" align="center" class="">Feature</th>
					{*<th width="5%" align="center" class="">Footer</th>*}
					<th width="5%" align="center" class="">Status</th>
					<th width="15%" align="center" class="">Options</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="15%" align="center" class="">Action</th>
                    {/if}
				</tr>
				{section name=list loop=$restaurant_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$restaurant_list[list].restaurant_id}">
					<td align="center" class="listContResta">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$restaurant_list[list].restaurant_id}" onclick="individualSelect();" id="tableselect_{$smarty.section.list.rownum}" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
					</td>
					<td align="center" class="listContResta">{$restaurant_list[list].sno}</td>
					<td align="left" class="listContResta txtindent">{$restaurant_list[list].restaurant_name|stripslashes}</td>
					<td align="left" class="listContResta txtindent">{$restaurant_list[list].restaurant_phone|stripslashes}</td>
					<td align="center" class="listContResta">{$restaurant_list[list].restaurant_state|stripslashes}</td>
					<td align="left" class="listContResta txtindent">{$restaurant_list[list].cityname|stripslashes}</td>
					<td align="left" class="listContResta txtindent">{$restaurant_list[list].zipcode|stripslashes}</td>
					<td align="center" class="listContResta">{$restaurant_list[list].restaurant_id}</td>
					<td align="center" class="listContResta">{$restaurant_list[list].addeddate|date_format:"%d - %m - %Y"}</td>
					<td align="center" class="listContResta">
						{if $restaurant_list[list].restaurant_feature_status eq 'Yes'}
							<img src="images/star_yellow.png" alt="Feature" title="Feature" onclick="return changeStatus('No','restaurant_feature_status','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{else}
							<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','restaurant_feature_status','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{/if}
					</td>
					{*<td align="center" class="listContResta">
						{if $restaurant_list[list].restaurant_footer_status eq 'Yes'}
							<img src="images/star_yellow.png" alt="Footer" title="Footer" onclick="return changeStatus('No','restaurant_footer_status','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{else}
							<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','restaurant_footer_status','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{/if}
					</td>*}

					<td align="center" class="listContResta">
						{if $restaurant_list[list].restaurant_status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{elseif $restaurant_list[list].restaurant_status eq '2'}
						<img src="images/icon_pending.png" alt="Pending" title="Pending" onclick="return changeStatus('Pending','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}');" style="cursor:pointer;" />
						{/if}
					</td>
					<td align="center" class="listContResta">
						<!-- <a href="restaurantDetails.php?resid={$restaurant_list[list].restaurant_id}">Details</a>&nbsp;| -->
						<a href="menuManage.php?resid={$restaurant_list[list].restaurant_id}">Menu</a>&nbsp;|
						<a href="categoryManage.php?resid={$restaurant_list[list].restaurant_id}">Category</a>&nbsp;|
						<a href="restaurantOfferManage.php?resid={$restaurant_list[list].restaurant_id}">Offer</a>&nbsp;|
						<a href="addonsManage.php?resid={$restaurant_list[list].restaurant_id}">Addons</a>&nbsp;|
						{if $restaurant_list[list].reviewscnt gt 0}
						<a href="restaurantReviewsManage.php?resid={$restaurant_list[list].restaurant_id}">Reviews</a> |{/if}
						<a href="paymentInfoManage.php?resid={$restaurant_list[list].restaurant_id}">Payment Method</a> |
						{if $restaurant_list[list].bookingcnt gt 0}
						<a href="restaurantBookingManage.php?resid={$restaurant_list[list].restaurant_id}">Bookings</a> |{/if}
						{if $restaurant_list[list].orderscnt gt 0}
						<a href="restaurantOrderManage.php?resid={$restaurant_list[list].restaurant_id}">Order</a>&nbsp; |{/if}
						{if $restaurant_list[list].reportscnt gt 0}
						<a href="restaurantReportManage.php?resid={$restaurant_list[list].restaurant_id}">Report</a>&nbsp; |
						<a href="restaurantInvoiceManage.php?resid={$restaurant_list[list].restaurant_id}">Invoice</a>&nbsp; |{/if}
						{if $restaurant_list[list].commorderscnt gt 0}
						<a href="commissionOrderManage.php?resid={$restaurant_list[list].restaurant_id}">Commission</a>{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="">
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light" onclick="return restoreProcess('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}','restaurant');"  >
								<i class="fa fa-recycle"></i>
							</a>
						</span> 
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return fullDelete('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$restaurant_list[list].restaurant_id}','restaurant');" >
								<i class="fa fa-close"></i>
							</a>
						</span> 
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="14" align="center" class="listContResta">No record(s) found</td></tr>
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

</div>