<div class="page-header">
    <h1 class="title">Manage Invoice {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Invoice {if $smarty.get.resid} - {$restname}{/if}</li>
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
			<div class="manageButtonLeft marginBot">	
				<form name="reportmanage" method="post" action="restaurantInvoiceManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}" />
				{if !$smarty.get.resid}
				<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.reportmanage.submit();">
					<option value="">Select Restaurant Name</option>
					{foreach from=$restaurantSearchList item=searchreslist}
					<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
					{/foreach}
				</select>
				{/if}
					
				</form>
			</div>
		</div>

		{if $smarty.request.resid}
		<!-- Invoice Generation Condition start -->
		
		<!--Current Invoice-->
		<div class="manageButtonLeft marginBot">
			{if $invoice_occur gte 1}
			You have already sent Invoice to Restaurant on <b>{$invoice_sent_date|date_format:"%b %d, %Y"}</b>. You can see the Invoice from Below List.
			{else}	
			<form name="reportmanage" method="post" action="restaurantInvoice.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}" />
				<input type="hidden" name="res_invoice_setting" value="{$restaurant_inv_setting}" />
				{if $restaurant_inv_setting eq 'm1'}
				<input type="hidden" name="invoice_monthly" value="{$current_year_mon}" />
                <input type="hidden" name="invoice_monthly_once" value="{$numoftime}" />
				{elseif $restaurant_inv_setting eq 'm2'}
				<input type="hidden" name="invoice_monthly" value="{$current_year_mon}" />
				<input type="hidden" name="invoice_monthly_twice_tm" value="{$numoftime}" />
				{elseif $restaurant_inv_setting eq 'm4'}
				<input type="hidden" name="invoice_monthly" value="{$current_year_mon}" />
				<input type="hidden" name="invoice_monthly_4t_tm" value="{$numoftime}" />
				{/if}
				
				{*<span class="restManageNameSort">{if $restaurant_inv_setting eq 'm1'}Current Month Invoice{elseif $restaurant_inv_setting eq 'm2'}Current Month Twice Invoice{elseif $restaurant_inv_setting eq 'm4'}Current Month 4 times Invoice{/if}</span><input class="button" type="submit" name="actionsubmit" value="View Invoice" id="show" onclick="return report_validate();"/>*}
			</form>
			{/if}
		</div>
		
		
        
		{if $restaurant_inv_setting eq 'm1'}
    		<div class="manageButtonLeft marginBot">	
    			<form name="reportmanage" method="post" action="restaurantInvoice.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}" />
                <input type="hidden" name="res_invoice_setting" value="{$restaurant_inv_setting}" />
    				<!--Monthly-->
    				<span class="restManageNameSort">Monthly</span>
    				<div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="invoice_monthly" name="invoice_monthly" value="{$current_year_mon}"/>
                            <span class="input-group-addon">
    							<span class="fa fa-calendar"></span>
    						</span>
                        </div>
                    </div>
    				<input type="hidden" name="invoice_monthly_once" value="1" />
    				<input class="btn btn-default" type="submit" name="actionsubmit" value="Show" id="show" onclick="return report_validate();"/>
            
    			</form>
    		</div>
        {/if}
		{if $restaurant_inv_setting eq 'm2'}
		<div class="manageButtonLeft marginBot">	
			<form name="reportmanage" method="post" action="restaurantInvoice.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}" />
			<input type="hidden" name="res_invoice_setting" value="{$restaurant_inv_setting}" />
				<!--Monthly Twice-->
				<span class="restManageNameSort">Monthly Twice</span>
                <div class="col-sm-3">
                    <div class="input-group">
				        <input type="text" class="form-control" id="invoice_monthly" name="invoice_monthly" value="{$current_year_mon}"/>
                        <span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
                    </div>
                </div>
				<select id="invoice_monthly_twice_tm" name="invoice_monthly_twice_tm" class="selectpicker" data-width="100px">
					<option value="1">1-15</option>
					<option value="16">16-30</option>
				</select>
				<input class="btn btn-default" type="submit" name="actionsubmit" value="Show" id="show" onclick="return report_validate();"/>
			</form>
		</div>
		{/if}
        
        {if $restaurant_inv_setting eq 'm4'}
		<div class="manageButtonLeft marginBot">	
			<form name="reportmanage" method="post" action="restaurantInvoice.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}" />
			<input type="hidden" name="res_invoice_setting" value="{$restaurant_inv_setting}" />
				<!--Monthly Four-->
				<span class="restManageNameSort">Monthly 4 times</span>
                <div class="col-sm-3">
                    <div class="input-group">
			             <input type="text" class="form-control" id="invoice_monthly" name="invoice_monthly" value="{$current_year_mon}"/>
                         <span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
                    </div>
                </div>
				<select id="invoice_monthly_4t_tm" name="invoice_monthly_4t_tm" class="selectpicker" data-width="100px">
					<option value="1">1-7</option>
					<option value="8">8-14</option>
					<option value="15">15-21</option>
					<option value="22">22-30</option>
				</select>
				<input class="btn btn-default" type="submit" name="actionsubmit" value="Show" id="show" onclick="return invoice_report_validate();"/>
			</form>
		</div>
        {/if}
		<!-- Invoice Generation Condition End -->
		{/if}

       
		
		 <div class="col-sm-12 no-padding">
		<!--Button Left start-->
		<div class="manageButtonLeft">
			{if $totalRecords gt 0}	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
    			 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
    		</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" onsubmit="return filterValidation1();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Restaurant Name/Invoice Id" />
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
				</form>	 
			</div>
			{/if}
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		{*<div class="manageButtonLastCont">
            {if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a>{/if}
			<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>
			<input type="button"  class="btn btn-sm btn-primary but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-primary but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-primary but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
			</div>*}
		<!--Button Right End-->
		</div>
		<span id="errormsg"></span>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table width="100%" border="0" class="table table-striped table-bordered table-hover">
				<tr class="">
                {*
					<th width="3%" align="center" class="">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>*}
					<th width="3%" align="center" class="">S.No</th>
					<th width="8%" align="left" class="">Invoice #</th>
					<th width="7%" align="left" class=" ">Month</th>
					<th width="7%" align="left" class=" ">Invoice Period</th>
					<th width="12%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Invoice Ac Balance{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{if !$smarty.get.resid}
					<th width="15%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
                    <th width="7%" align="center" class="">Invoice Id</th>
					<th width="8%" align="center" class="">Invoice Date</th>
					<th width="12%" align="center" class="">Status</th>
					<th width="7%" align="center" class="">Action</th>
				</tr>
				{*$invoice_list|@print_r*}
				{section name="list" loop=$invoice_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$invoice_list[list].invoice_id}">
					{*<td align="center" class="listCont"><input type="checkbox" class="case" value="{$invoice_list[list].invoice_id}" onclick="individualSelect();" /></td>*}
					<td align="center" class="listCont">{$invoice_list[list].sno}</td>
					<td align="left" class="listCont txtindent">{$invoice_list[list].invoice_gen_id}</td>
					<td align="left" class="listCont txtindent">{$invoice_list[list].inv_month|date_format:"%b %Y"}</td>
					<td align="left" class="listCont txtindent">{if $invoice_list[list].inv_month_period_limit eq ''}Monthly once{else}{$invoice_list[list].inv_month_period_limit}{/if}</td>
					<td align="left" class="listCont txtindent">{$invoice_list[list].inv_acc_balance}</td>
					{if !$smarty.get.resid}
					<td align="left" class="listCont txtindent">{$invoice_list[list].restaurant_name|stripslashes}</td>
					{/if}
                    <td align="center" class="listCont">{$invoice_list[list].invoice_id}</td>
					<td align="center" class="listCont">{$invoice_list[list].invoice_sent_date|date_format:"%d - %m - %Y"}</td>
					<td align="center" class="listCont">
						<select class="selectpicker" data-width="170px" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$invoice_list[list].invoice_id}');">
							<option value="IS" {if $invoice_list[list].invoice_status eq 'IS'}selected="selected"{/if} >Invoice Sent</option>
							<option value="PS" {if $invoice_list[list].invoice_status eq 'PS'}selected="selected"{/if}>Payment Sent</option>
							<option value="PR" {if $invoice_list[list].invoice_status eq 'PR'}selected="selected"{/if}>Payment Receive</option>
						</select>
					</td>
					<td align="center" class="listCont">
						<a href="restaurantInvoice.php?invoiceno={$invoice_list[list].invoice_gen_id}{if $invoice_list[list].restaurant_id neq ''}&resid={$invoice_list[list].restaurant_id}{/if}" style="cursor:pointer;">View</a>&nbsp;
						<a href="../restaurantInvoicePDF.php?invoiceno={$invoice_list[list].invoice_gen_id}{if $invoice_list[list].restaurant_id neq ''}&resid={$invoice_list[list].restaurant_id}{/if}" style="cursor:pointer;" target="_blank">Pdf</a>&nbsp;
						{*<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$invoice_list[list].invoice_id}');" style="cursor:pointer;" />
						</span>*}
					</td>
				</tr>
				{sectionelse}
				<tr><td colspan="11" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
					
			</table>
		</div>
		<!--List End-->
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