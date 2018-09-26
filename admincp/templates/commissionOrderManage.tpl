<!--Date Picker Files--> 
<link rel="stylesheet" href="css/zebra_datepicker_metallic.css" type="text/css">
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/zebra_datepicker.js"></script>

{literal}
<script type="text/javascript">
	$(document).ready(function() 
	{
        $('#report_from').Zebra_DatePicker({
			direction: [false, '2012-01-01'],
			pair: $('#report_from')
   		});
   		 
   		$('#report_to').Zebra_DatePicker({
   			direction: [false, '2012-01-01'],
			pair: $('#report_to')        
   		});
   	});
</script>
{/literal}

<div class="page-header">
    <h1 class="title">Manage Commission {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Commission</li>
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
		
		{if $totalRecords gt 0}
		<div  class="filterbutton">
			
			<span class="topName1">Commission Price:</span> 
			<span class="topName2">{$totalsalesCommissionprice}</span>
			
			
		</div>
		{/if}
		<!-- Sort By -->
		<div class="manageButtonLeft marginBot">	
			<form name="ordermanage" method="post" action="commissionOrderManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}" />
			{if !$smarty.get.resid}
			<select class="restManageNameDrop" name="searchrestaurantid" id="searchrestaurant" onchange="document.ordermanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from="$restaurantSearchList" item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>&nbsp;
			{/if}
			<b>&nbsp; </b>
				<select class="restManageNameDrop" name="report" id="report" size="1" onchange="document.ordermanage.submit();">
					<option value="">Select</option>
					<option value="Today" {if $smarty.request.report eq 'Today'}selected="selected"{/if}>&nbsp;&nbsp;Today</option>
					<optgroup label="Week">
						<option value="ThisWeek" {if $smarty.request.report eq 'ThisWeek'}selected="selected"{/if}>&nbsp;&nbsp;This Week</option>
						<option value="LastWeek" {if $smarty.request.report eq 'LastWeek'}selected="selected"{/if}>&nbsp;&nbsp;Last Week</option>
					</optgroup>	
					<optgroup label="Month">
						<option value="ThisMonth" {if $smarty.request.report eq 'ThisMonth'}selected="selected"{/if}>&nbsp;&nbsp;This Month</option>
						<option value="LastMonth" {if $smarty.request.report eq 'LastMonth'}selected="selected"{/if}>&nbsp;&nbsp;Last Month</option>
					</optgroup>	
					<optgroup label="Year">
						<option value="ThisYear" {if $smarty.request.report eq 'ThisYear'}selected="selected"{/if}>&nbsp;&nbsp;This Year</option>
						<option value="LastYear" {if $smarty.request.report eq 'LastYear'}selected="selected"{/if}>&nbsp;&nbsp;Last Year</option>
					</optgroup>				
				</select>
				
				<input type="text" class="calDateBox" id="report_from" name="report_from" value="{$smarty.request.report_from}"/></a>
				<span class="restRepManageToTxt">to</span>
				<input type="text" class="calDateBox" id="report_to" name="report_to" value="{$smarty.request.report_to}" size="15"/></a>
				<input class="restRepManageSub" type="submit" name="actionsubmit" value="Show" id="show" onclick="return report_validate();"/>
				
				<a style="cursor:pointer;" href="pdfCommissionList.php?total={$totalRecords}{if $smarty.request.report_from neq '' and $smarty.request.report_to neq ''}&report_from={$smarty.request.report_from}&report_to={$smarty.request.report_to}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}" target="_blank" class="manageButton_addnw_pdf">Generate PDF</a>
			
			</form>
		</div>
		{*{/if}*}
		
		<!--Button Left start-->
		<div class="manageButtonLeft">
			{if $totalRecords gt 0}	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					<input type="text" name="keyword" id="keyword" value="" class="textboxFilter">
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			
			
			{/if}
			
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
		
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
		</div>
		<!--Button Right End-->
		<div class="col-sm-12 no-padding">
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
	
			{if $totalRecords gt 0}
			<!-- Sort By -->
			<div class="col-sm-7 no-padding">	
				<form name="cuisinemanage" method="post" action="cuisineManage.php{if $smarty.request.limit}?limit={$smarty.request.limit}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}" />
                <div class="pull-right">
				<span class="restManageNameSort">Sort By</span>
				<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.cuisinemanage.submit();">
					<option value="">Select</option>
					<optgroup label="Status">
						<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
						<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
					</optgroup>
					<optgroup label="Others">
						<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Cuisine Name A to Z</option>
						<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Cuisine Name Z to A</option>
					</optgroup>				
				</select>
                </div>
				</form>
			</div>
			{/if}
			</div>
		<!--List Start-->
		<div class="tableListContainer">
				<table width="100%" border="0" class="table table-bordered table-hover table-striped ">
				<tr class="listHeader">
					<th width="2%" class="listHeaderCont" align="center"><input type="checkbox" id="selectall" onclick="selectheselectAll();" /></th>
					<th width="2%" class="listHeaderCont" align="center">S.No</th>
					<th width="10%" class="listHeaderCont" align="center">Order No</th>
					<!--<th width="7%" class="listHeaderCont">Order Type</th>
					<th width="12%" class="listHeaderCont">Order Date</th>-->
					
					<th width="12%" align="center" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Order Price{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<!--<td width="8%" class="listHeaderCont">Phone</td>-->
					{if !$smarty.get.resid}
					<th width="15%" align="left" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
					<th width="18%" align="center" class="listHeaderCont">Commission(%)</th>
					<th width="18%" align="center" class="listHeaderCont">Commission Price</th>
					<!--<td width="5%" align="center" class="listHeaderCont">Status</td>-->
					<th width="10%" align="center" class="listHeaderCont">Date</th>
					<th width="7%" align="center" class="listHeaderCont">Action</th>
				</tr>
				{section name="list" loop="$order_list"}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$order_list[list].orderid}">
					<td align="center" class="listCont"><input type="checkbox" class="case" value="{$order_list[list].orderid}" onclick="individualSelect();" /></td>
					<td align="center" class="listCont">{$order_list[list].sno}</td>
					<td align="center" class="listCont">{$order_list[list].ordergenerateid}</td>
					<!--<td align="left" class="listCont">{if $order_list[list].deliverytype eq 'delivery'}Delivery{elseif $order_list[list].deliverytype eq 'pickup'}Pickup{/if}</td>
					
					<td align="left" class="listCont">{if $order_list[list].deliverytype eq 'delivery'}{$order_list[list].deliverydate}&nbsp;{if $order_list[list].foodassoonas eq '1'}ASAP{else}{$order_list[list].deliverytime}{/if}{else} {/if}</td>
					<td align="left" class="listCont">{$order_list[list].customername|stripslashes}</td>
					<td align="left" class="listCont">{$order_list[list].customeremail|stripslashes}</td>-->
					<td align="center" class="listCont">{$order_list[list].ordertotalprice|stripslashes}</td>
					<!--<td align="left" class="listCont">{$order_list[list].customercellphone}</td>-->
					{if !$smarty.get.resid}
					<td align="left" class="listCont">{$order_list[list].restaurant_name|stripslashes}</td>
					{/if}
					<!--<td>
						<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');">
							<option value="pending" {if $order_list[list].status eq 'pending'}selected="selected"{/if} >Pending</option>
							<option value="processing" {if $order_list[list].status eq 'processing'}selected="selected"{/if}>Processing</option>
							<option value="completed" {if $order_list[list].status eq 'completed'}selected="selected"{/if}>Delivered</option>
							<option value="failed" {if $order_list[list].status eq 'failed'}selected="selected"{/if}>Failed</option>
						</select>
					</td>-->
					<td align="center" class="listCont">{$order_list[list].res_comm_perchantage}</td>
					<td align="center" class="listCont">{$order_list[list].res_comm_price}</td>
					<td align="center" class="listCont">{$order_list[list].res_order_delivereddate}</td>
					{*<td align="center" class="listCont">
						<!--<a href="viewOrderDetails.php?oid={$order_list[list].orderid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}&type={$smarty.get.type}{/if}" style="cursor:pointer;">View</a>&nbsp;-->
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');" style="cursor:pointer;" />
						</span>
					</td>*}
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
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
	  	<!--Pagination End-->
		<div class="clr"></div>

	</div>
</div>