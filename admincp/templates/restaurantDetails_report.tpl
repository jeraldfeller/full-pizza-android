{assign var = reportList value=$objAdminRestaurantMgmt->reportList($resid)}
<div class="riteCont1Inner">
	<div class="riteCont1Inner">
		<!--Button List start-->
		<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="btn btn-default" href="restaurantManage.php">Back</a>{/if}
		</div>
		<!--Button List End-->
		<!--Pagination Start
		<div class="pageCont">
			<ul class="page">
				<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$filename}');" >
						<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
						<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
						<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
						<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
						<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
						<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
						<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
						<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
					</select>
				</li>
				<li class="pages"> per page</li>	
			</ul>
			<div class="paginationCont">
				{$pagination}
			</div>
		</div>
		Pagination End-->
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered">
				<tr class="">
					{*<td width="5%" align="center" class=""><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>*}
					<th width="5%" align="center" class="">S.No</th>
					<th width="25%" align="center" class="">Name</th>
					<th width="15%" align="center" class="">Address</th>
					<th width="10%" align="center" class="">Order Number</th>
					<th width="15%" align="center" class="">Total Price</th>
					<th width="15%" align="center" class="">Order At</th>
					<!--<td width="10%" align="center" class="listHeaderCont">Status</td>
					<td width="10%" align="center" class="listHeaderCont">Action</td>-->
				</tr>
				{section name=list loop=$reportList}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr id="deletecate{$reportList[list].id}">
					{*<td align="center" class="listCont"><input type="checkbox" class="case" value="{$report_list[list].id}" onclick="individualSelect();" /></td>*}
					<td align="center" class="">{$reportList[list].sno}</td>
					<td align="center" class="">{$reportList[list].customername|stripslashes}</td>
					<td align="center" class="">{$reportList[list].deliverydoornumber|stripslashes},{$reportList[list].deliverystreet|stripslashes}</td>
					<td align="center" class="">{$reportList[list].ordergenerateid}</td>
					<td align="center" class="">{$reportList[list].ordertotalprice}</td>
					<td align="center" class="">{$reportList[list].orderdate|date_format}</td>
					
					<!--<td align="center" class="listCont" id="chgstatus{$order_list[list].id}">
						{if $order_list[list].status eq 'pending'}
						<img src="images/icon_active1.png" alt="Pending" title="Pending" />
						{elseif $order_list[list].status eq 'processing'}
						<img src="images/icon_active1.png" alt="Processing" title="Processing" />
						{elseif $order_list[list].status eq 'completed'}
						<img src="images/icon_active1.png" alt="Delivered" title="Delivered" />
						{else}
						<img src="images/delete1.png" alt="Failed" title="Failed" />
						{/if}
					</td>-->
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="text-danger">No record(s) found</td></tr>
				{/section}
			</table>
		</div>
		<!--List End-->
		<!--Pagination start
	  	<div class="pageCont">
			<ul class="page">
				<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$filename}');" >
						<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
						<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
						<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
						<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
						<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
						<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
						<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
						<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
					</select>
				</li>
				<li class="pages"> per page</li>	
			</ul>
			<div class="paginationCont">
				{$pagination}
			</div>
		</div>
	  	Pagination End-->
		<div class="clr"></div>
		<!--Button List start-->
		<div class="manageButtonLastCont">
			{if $limit lt $totalRecords}
				<a class="btn btn-default" href="restaurantReportManage.php{if $smarty.get.resid}?searchrestaurantid={$smarty.get.resid}{/if}">View More</a>
			{/if}
		</div>
	  	<!--Button List End-->
	</div>
</div>