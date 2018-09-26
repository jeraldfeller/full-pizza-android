<div class="page-header">
    <h1 class="title">Manage Delete Order {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Delete Order {if $smarty.get.resid} - {$restname}{/if}</li>
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
			<span class="topName1">Total Records:</span> <span class="topName2">{$ordersList_orderCnt}</span>
			<span class="topName1">Delivered Records:</span> <span class="topName2">{$delivered_ord}</span>
			<span class="topName1">Processing Records:</span> <span class="topName2">{$processing_ord}</span>
			<span class="topName1">Pending Records:</span> <span class="topName2">{$pending_ord} </span>
			<span class="topName1">Failed Records :</span> <span class="topName2">{$failed_ord} </span>
		</div>
		<!-- Sort By -->
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
		<div class="col-sm-7 no-padding">
			<form name="ordermanage" method="post" action="restaurantDeleteOrderManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}" >
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
			{if !$smarty.get.resid}
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.ordermanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
			{/if}
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.ordermanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="pending" {if $smarty.request.sortby eq 'pending'} selected="selected"{/if}>&nbsp;&nbsp;Pending</option>
					<option value="processing" {if $smarty.request.sortby eq 'processing'} selected="selected"{/if}>&nbsp;&nbsp;Processing</option>
					<option value="completed" {if $smarty.request.sortby eq 'completed'} selected="selected"{/if}>&nbsp;&nbsp;Delivered</option>
					<option value="failed" {if $smarty.request.sortby eq failed} selected="selected"{/if}>&nbsp;&nbsp;Failed</option>
				</optgroup>
				<optgroup label="Others">
					<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Customer Name A to Z</option>
					<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Customer Name Z to A</option>
					{if !$smarty.get.resid}
					<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
					{/if}
					<option value="easc" {if $smarty.request.sortby eq 'easc'}selected="selected"{/if}>&nbsp;&nbsp;Email A to Z</option>
					<option value="edesc" {if $smarty.request.sortby eq 'edesc'}selected="selected"{/if}>&nbsp;&nbsp;Email Z to A</option>
					<option value="tasc" {if $smarty.request.sortby eq 'tasc'}selected="selected"{/if}>&nbsp;&nbsp;Total Price 0 to 9</option>
					<option value="tdesc" {if $smarty.request.sortby eq 'tdesc'}selected="selected"{/if}>&nbsp;&nbsp;Total Price 9 to 0</option>
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
				<form name="filterform" method="post" action="restaurantDeleteOrderManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
					<input type="text" name="keyword" id="keyword" value="" class="textboxFilter" placeholder="Order Id/Restaurant Name"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			{*<!--Export-->
			<div class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
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
			</div>*}
			{/if}
			{*<!--Import-->
			<div class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
				<!--<img src="images/icon_plus.png" alt="Import" title="Import" />-->
			</div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input class="restManageNameDrop" type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
				</form>
			 </div>*}
             
		</div>
        <div class="col-sm-5">
        	<span id="errormsg"></span>
        </div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			{*{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a>{/if}
            <a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>*}
			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    			<input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
            {/if}
			</div>
		<!--Button Right End-->
		</div>
		
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered">
				<tr class="">
					<th width="4%" class="" align="center">
					<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%" class="" align="center">S.No</th>
					<th width="8%" class="" align="center">Order No</th>
					
					<th width="{if !$smarty.get.resid}8%{else}8%{/if}" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Order Type{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{*<th width="20%" align="left" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'edesc'}onclick="sortByAscDesc('easc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'easc'}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Customer Email{if $smarty.request.sortby eq 'edesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'easc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>*}
                    <th width="12%" class=" ">Order Date</th>                    
					<th width="10%" align="center" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Order Price{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="8%" class=" ">Phone</th>
					{if !$smarty.get.resid}
					<th width="15%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
					<th width="10%" align="center" class="">Status</th>
					<th width="8%" align="center" class="">Order At</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="7%" align="center" class="">Action</th>
                    {/if}
				</tr>
				{section name="list" loop=$order_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$order_list[list].orderid}">
					<td align="center" class="listCont">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$order_list[list].orderid}" onclick="individualSelect();" id="tableselect_{$smarty.section.list.rownum}" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
					</td>
					<td align="center" class="listCont">{$order_list[list].sno}</td>
					<td align="center" class="listCont">{$order_list[list].ordergenerateid}</td>
					<td align="left" class="listCont txtindent">{if $order_list[list].deliverytype eq 'delivery'}Delivery{elseif $order_list[list].deliverytype eq 'pickup'}Pickup{/if}</td>
					
					<td align="left" class="listCont txtindent">{if $order_list[list].deliverytype eq 'delivery'}{$order_list[list].deliverydate}&nbsp;{if $order_list[list].foodassoonas eq '1'}ASAP{else}{$order_list[list].deliverytime}{/if}{else}--{/if}</td>
					<!--<td align="left" class="listCont">{$order_list[list].customername|stripslashes}</td>
					<td align="left" class="listCont">{$order_list[list].customeremail|stripslashes}</td>-->
					<td align="center" class="listCont">{$order_list[list].ordertotalprice|stripslashes}</td>
					<td align="left" class="listCont txtindent">{$order_list[list].customercellphone}</td>
					{if !$smarty.get.resid}
					<td align="left" class="listCont txtindent">{$order_list[list].restaurant_name|stripslashes}</td>
					{/if}
					{*{if !$smarty.get.resid}
					<td align="left" class="listCont">{$order_list[list].menu_restname|stripslashes}</td>
					{/if}
					<td align="left" class="listCont">{$order_list[list].instructions|stripslashes}</td>
					
					<td align="center" class="listCont" id="chgstatus{$order_list[list].orderid}">*}
					<td>
					{*{if $order_list[list].status neq 'completed' and $order_list[list].status neq 'failed'}
						<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');">
						{if $order_list[list].status eq 'pending'}
							<option value="pending" selected="selected" >Pending</option>
						{/if}
						
							<option value="processing" {if $order_list[list].status eq 'processing'}selected="selected"{/if}>Processing</option>
							<option value="completed" {if $order_list[list].status eq 'completed'}selected="selected"{/if}>Delivered</option>
							<option value="failed" {if $order_list[list].status eq 'failed'}selected="selected"{/if}>Failed</option>
						</select>
						{/if}
						{if $order_list[list].status eq 'completed'}
						Delivered
						{/if}
						{if $order_list[list].status eq 'failed'}
						Failed
						{/if}*}
						
						{if $order_list[list].status neq 'processing' and $order_list[list].status neq 'failed' and $order_list[list].status neq 'completed'}
						<select class="orderSelect1new" name="changeorderstatus" >
						
							<option value="pending" selected="selected" >Pending</option>
						
						
							<option value="processing" {if $order_list[list].status eq 'processing'}selected="selected"{/if} onclick="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');">Accept</option>
							<option value="failed" {if $order_list[list].status eq 'failed'}selected="selected"{/if} onclick="document.getElementById('disclaimReason').style.display='block'">Disclaim</option>
							
						</select>
						<div id="disclaimReason" style="display:none">
							<span class="addPageRightFont">Reason<span class="color1">*</span></span>				
							<textarea  cols="5" rows="1" style="width:120px;" id="reason"></textarea>
							<input type="button" onclick="return changeOrderStatus('failed','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');" class="btn btn-default" style="margin-top:5px;" value="Submit">						
						</div>
						{/if}
						
						{if $order_list[list].status eq 'processing' and $order_list[list].status neq 'failed' and $order_list[list].status neq 'completed'}
						<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');">
						
							<option value="processing" {if $order_list[list].status eq 'processing'}selected="selected"{/if}>Processing</option>
							<option value="completed" {if $order_list[list].status eq 'completed'}selected="selected"{/if}>Delivered</option>
							
						</select>
						
						{/if}
						
						{if $order_list[list].status eq 'completed'}
						Delivered
						{/if}
						{if $order_list[list].status eq 'failed'}
						Failed
						{/if}
						
						
						
					</td>
					<td align="center" class="listCont">{$order_list[list].orderdate|date_format:"%d - %m - %Y"}</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="listCont">
						<a href="viewOrderDetails.php?oid={$order_list[list].orderid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}&type={$smarty.get.type}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}&pagetype=orderdelete" style="cursor:pointer;">View
							<!--<img src="images/icon_edit.png" width="16" height="16" alt="View Order Details" title="View Order Details" />-->
						</a>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light"onclick="return restoreProcess('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}','order_delete');"   >
								<i class="fa fa-recycle"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');" >
								<i class="fa fa-close"></i>
							</a>
						</span>
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="13" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
					
			</table>
		</div>
		<!--List End-->
		<!--Pagination start-->
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
	  	<!--Button Right End-->
	</div>

</div>