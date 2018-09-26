<div class="page-header">
    <h1 class="title">Manage Report {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Report {if $smarty.get.resid} - {$restname}{/if}</li>
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
		<div class="filterbutton">
			<span class="topName1">Total Records:</span> <span class="topName2">{$ordersList_orderCnt}</span>
			<span class="topName1">Today :</span> <span class="topName2">{$today_ord}</span>
			<span class="topName1">This Week :</span> <span class="topName2">{$thisweek_ord}</span>
			{*<span class="topName1">Last Week :</span> <span class="topName2">{$lastweek_ord} </span>*}
			<span class="topName1">This Month  :</span> <span class="topName2">{$thismonth_ord} </span>
			<span class="topName1">Last Month  :</span> <span class="topName2">{$lastmonth_ord} </span>
			<span class="topName1">This Year  :</span> <span class="topName2">{$thisyear_ord} </span>
			<span class="topName1">Last Year  :</span> <span class="topName2">{$lastyear_ord} </span>
		</div>
        
		<!-- Sort By -->
		<div class="manageButtonLeft col-sm-12">	
			<form name="reportmanage" method="post" action="restaurantReportManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.get.resid eq ''}{if $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.request.report neq ''}?report={$smarty.request.report}{if $smarty.request.report_from neq ''}&report_from={$smarty.request.report_from}{/if}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{elseif $smarty.request.report_from neq ''}?report_from={$smarty.request.report_from}{if $smarty.request.report_to neq ''}&report_to={$smarty.request.report_to}{/if}{/if}{/if}" >
			{if !$smarty.get.resid}
			<div class="col-sm-3 no-padding">
				<select class="selectpicker" data-width="95%" name="searchrestaurantid" id="searchrestaurant" onchange="document.reportmanage.submit();">
					<option value="">Select Restaurant Name</option>
					{foreach from=$restaurantSearchList item=searchreslist}
					<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
					{/foreach}
				</select>
			</div>
			{/if}
			<div class="col-sm-3 no-padding form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Show</label>
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
			<div class="col-sm-6">
				<span class="restManageNameSort">Sort by order</span>
				<select class="selectpicker" data-width="150px" name="sortby" id="sortby" size="1" onchange="document.reportmanage.submit();">
					<option value="">Select</option>
					<optgroup label="Others">
						<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>Customer Name A to Z</option>
						<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>Customer Name Z to A</option>
						{if !$smarty.get.resid}
						<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>Restaurant Name A to Z</option>
						<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>Restaurant Name Z to A</option>
						{/if}
						<option value="easc" {if $smarty.request.sortby eq 'easc'}selected="selected"{/if}>Email A to Z</option>
						<option value="edesc" {if $smarty.request.sortby eq 'edesc'}selected="selected"{/if}>Email Z to A</option>
						<option value="tasc" {if $smarty.request.sortby eq 'tasc'}selected="selected"{/if}>Total Price 0 to 9</option>
						<option value="tdesc" {if $smarty.request.sortby eq 'tdesc'}selected="selected"{/if}>Total Price 9 to 0</option>
					</optgroup>				
				</select>
			
			 	
				<select class="selectpicker" name="report" id="report" size="1" data-width="150px" onchange="document.reportmanage.submit();">
					<option value="">Select</option>
					<option value="Today" {if $smarty.request.report eq 'Today'}selected="selected"{/if}>Today</option>
					<optgroup label="Week">
						<option value="ThisWeek" {if $smarty.request.report eq 'ThisWeek'}selected="selected"{/if}>This Week</option>
						<option value="LastWeek" {if $smarty.request.report eq 'LastWeek'}selected="selected"{/if}>Last Week</option>
					</optgroup>	
					<optgroup label="Month">
						<option value="ThisMonth" {if $smarty.request.report eq 'ThisMonth'}selected="selected"{/if}>This Month</option>
						<option value="LastMonth" {if $smarty.request.report eq 'LastMonth'}selected="selected"{/if}>Last Month</option>
					</optgroup>	
					<optgroup label="Year">
						<option value="ThisYear" {if $smarty.request.report eq 'ThisYear'}selected="selected"{/if}>This Year</option>
						<option value="LastYear" {if $smarty.request.report eq 'LastYear'}selected="selected"{/if}>Last Year</option>
					</optgroup>				
				</select>
			</div>
			<div class="col-sm-8 marginTopBot">
			    <span class="restManageNameSort">Sort by Date</span>
			    <div class="col-sm-4">
					<div class="input-group">
						<input type="text" class="form-control" id="report_from" name="report_from" value="{$smarty.request.report_from}"/>
						<span class="input-group-addon">
	                    	<span class="fa fa-calendar"></span>
	                    </span>
					</div>
				</div>
				<span class="restRepManageToTxt">to</span>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" class="form-control" id="report_to" name="report_to" value="{$smarty.request.report_to}" size="15"/>
						<span class="input-group-addon">
	                    	<span class="fa fa-calendar"></span>
	                    </span>
					</div>
				</div>
				<input class="btn btn-default btn-sm" type="submit" name="actionsubmit" value="Show" id="show" onclick="return report_validate();"/>
			</div>

			<div class="pull-right marginTopBot">
				
				<a href="pdfReportList.php?total={$totalRecords}{if $smarty.request.report_from neq '' and $smarty.request.report_to neq ''}&report_from={$smarty.request.report_from}&report_to={$smarty.request.report_to}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.resid neq ''}&resid={$smarty.request.resid}{/if}" target="_blank" class="btn btn-primary btn-sm">Generate PDF</a>
			</div>
				
			{*	{if $smarty.get.resid neq '' or $smarty.request.searchrestaurantid neq ''}
				<a style="cursor:pointer; margin-right:5px;" {if $totalRecords gt 0} href="orderReportList.php?total={$totalRecords}{if $smarty.request.report_from neq '' and $smarty.request.report_to neq ''}&report_from={$smarty.request.report_from}&report_to={$smarty.request.report_to}{/if}{if $smarty.request.report neq ''}&report={$smarty.request.report}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}" target="_blank" {else} href="javascript:void(0);" {/if} class="manageButton_addnw_pdf">View Report List</a>
				{/if} *}
				
			</form>
		</div>
		{*{/if}*}
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<!--{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a>{/if}-->
			<!--<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>-->
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    			     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
            {/if}
		</div>
		<!--Button Right End-->
		
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped">
				<tr >
					<th width="3%">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="3%" >S.No</th>
					<th width="8%" >Order #</th>
					<th width="{if !$smarty.get.resid}10%{else}10%{/if}" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Cust Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="15%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'edesc'}onclick="sortByAscDesc('easc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'easc'}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Customer Email{if $smarty.request.sortby eq 'edesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'easc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="9%" >Phone</th>
					{if !$smarty.get.resid}
					<th width="12%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
					<th width="7%" >Pay Method</th>
					<th width="9%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Order Price{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
                    <th width="5%" >Id</th>
					<th width="9%" >Ord Date</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="15%" >Action</th>
                    {/if}
				</tr>
				{*$order_list|@print_r*}
				{section name="list" loop=$report_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr id="deletecate{$report_list[list].orderid}">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$report_list[list].orderid}" onclick="individualSelect();" id="tableselect_{$smarty.section.list.rownum}" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
					</td>
					<td >{$report_list[list].sno}</td>
					<td >{$report_list[list].ordergenerateid}</td>
					<td >{$report_list[list].customername|stripslashes}</td>
					<td >{$report_list[list].customeremail|stripslashes}</td>
					<td >{$report_list[list].customercellphone|stripslashes}</td>
					{if !$smarty.get.resid}
					<td >{$report_list[list].restaurant_name|stripslashes}</td>
					{/if}
					<!--{if !$smarty.get.resid}
					<td align="left" class="listCont">{$order_list[list].menu_restname|stripslashes}</td>
					{/if}-->
					<td >{if $report_list[list].payment_type eq 'cod'}COD{elseif $report_list[list].payment_type eq 'CC'}Credit Card{else}{$report_list[list].payment_type}{/if}</td>
					<td >{$report_list[list].ordertotalprice|stripslashes}</td>
					
                    <td >{$report_list[list].orderid}</td>
					<td >{$report_list[list].orderdate|date_format:"%d - %m - %Y"}</td>
                    {if $VIEWABLE eq 'Yes'}
					<td >
						<a href="viewOrderDetails.php?oid={$report_list[list].orderid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}&type={$smarty.get.type}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}&pagetype=reportmanage" class="btn btn-light btn-icon"><i class="fa fa-search-plus"></i>
						</a>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$report_list[list].orderid}','{$filename}');">
								<i class="fa fa-close"></i>
							</a>
						</span>
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="12" align="center" class="listCont">No record(s) found</td></tr>
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