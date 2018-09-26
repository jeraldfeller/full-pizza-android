
<div class="heading">Restaurant <!--<a href="" class="btn btn-info btn-sm pull-right martopRgt"><i class="fa fa-mail-reply"></i></a>--></div>
<div class="adminRight">
<div class="adminTopHead">Manage Bookings {if $smarty.get.resid} - {$restname}{/if}</div>
		<!-- Sort By -->
		<div class="manageButtonLeft marginBot">	
			<form name="ordermanage" method="post" action="restaurantBookingManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}" />
			{if !$smarty.get.resid}
			<select name="searchrestaurantid" id="searchrestaurant" onchange="document.ordermanage.submit();" class="restManageNameDrop">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
			{/if}
			{if !$smarty.get.resid}
            <div class="pull-right">
			<span class="restManageNameSort">Sort By </span>
			<select name="sortby" id="sortby" class="restManageNameDrop" size="1" onchange="document.ordermanage.submit();">
				<option value="">Select</option>					
					<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>Restaurant Name A to Z</option>
					<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>Restaurant Name Z to A</option>
					<!--
					<option value="easc" {if $smarty.request.sortby eq 'easc'}selected="selected"{/if}>&nbsp;&nbsp;Email A to Z</option>
					<option value="edesc" {if $smarty.request.sortby eq 'edesc'}selected="selected"{/if}>&nbsp;&nbsp;Email Z to A</option>-->
			</select>
            </div>
			{/if}
			</form>
		</div>
		{*{/if}*}
		<div class="col-sm-12">
		<!--Button Left start-->
		<div class="manageButtonLeft">
			{if $totalRecords gt 0}	
			<!--Filter-->
            <div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
    			 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
    		</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" action="restaurantBookingManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					
				
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Restaurant/Booking Name" />
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			<!--Export-->
			{*<div  class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
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
			<!--Import-->
			{*<div  class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
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
             
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<!--{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a>{/if}-->
			<!--<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>-->
			<input type="button"  class="btn btn-primary btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-primary btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-primary btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
             {/if}
			</div>
		<!--Button Right End-->
		</div>
		<!--Pagination Start-->
		<div class="pageCont">
			<ul class="page">
				<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
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
			<!--Error Msg-->
			<span id="errormsg"></span>
			<!--Pagination-->
			<div class="paginationCont">
				{$pagination}
			</div>
		</div>
		<!--Pagination End-->
		<!--List Start-->
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<tr class="listHeader">
					<td width="2%" class="listHeaderCont" align="center"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
					<td width="2%" class="listHeaderCont" align="center">S.No</td>
                    <td width="2%" class="listHeaderCont" align="center">Booking_id</td>
					<td width="5%" class="listHeaderCont" align="center">Guests</td>
					<td width="10%" class="listHeaderCont txtindent">Booking Date</td>
					<td width="10%" class="listHeaderCont txtindent">Booking Time</td>
					<!--<td width="{if !$smarty.get.resid}20%{else}20%{/if}" align="left" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Customer Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					<td width="20%" align="left" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'edesc'}onclick="sortByAscDesc('easc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'easc'}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Customer Email{if $smarty.request.sortby eq 'edesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'easc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>-->
					<td width="7%" align="center" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Name{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					<td width="18%" class="listHeaderCont txtindent">Email</td>
					<td width="10%" class="listHeaderCont txtindent">MobileNo</td>
					{if !$smarty.get.resid}
					<td width="12%" align="left" class="listHeaderCont txtindent">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					{/if}
					<td width="5%" class="listHeaderCont" align="center">Id</td>
					<td width="10%" align="center" class="listHeaderCont">Booked At</td>
                    <td width="10%" align="center" class="listHeaderCont">Booking Status</td>
					<td width="5%" align="center" class="listHeaderCont">Status</td>
                    {if $VIEWABLE eq 'Yes'}
					<td width="10%" align="center" class="listHeaderCont">Action</td>
                    {/if}
				</tr>
				
				{section name=list loop=$order_list}				
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$order_list[list].id}">
					<td align="center" class="listCont"><input type="checkbox" class="case" value="{$order_list[list].id}" onclick="individualSelect();" /></td>
					<td align="center" class="listCont">{$order_list[list].sno}</td>
                    <td align="center" class="listCont">{$order_list[list].bookinggenerateid}</td>
					<td align="center" class="listCont">{$order_list[list].num_guests}</td>
					<td align="left" class="listCont txtindent">{$order_list[list].booking_date}</td>
					
					<td align="left" class="listCont txtindent">{$order_list[list].booking_time}</td>
					<!--<td align="left" class="listCont">{$order_list[list].customername|stripslashes}</td>
					<td align="left" class="listCont">{$order_list[list].customeremail|stripslashes}</td>-->
					<td align="center" class="listCont">{$order_list[list].booking_name|stripslashes}</td>
					<td align="left" class="listCont txtindent">{$order_list[list].booking_email|stripslashes}</td>
					<td align="left" class="listCont txtindent">{$order_list[list].booking_mobileno}</td>
					{if !$smarty.get.resid}
					<td align="left" class="listCont txtindent">{$order_list[list].restaurant_name|stripslashes}</td>
					{/if}
					<!--{if !$smarty.get.resid}
					<td align="left" class="listCont">{$order_list[list].menu_restname|stripslashes}</td>
					{/if}-->
					<!--<td align="left" class="listCont">{$order_list[list].instructions|stripslashes}</td>-->
					
					<!--<td align="center" class="listCont" id="chgstatus{$order_list[list].orderid}">-->
					<!--
					<td>
						<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');">
							<option value="pending" {if $order_list[list].status eq 'pending'}selected="selected"{/if} >Pending</option>
							<option value="processing" {if $order_list[list].status eq 'processing'}selected="selected"{/if}>Processing</option>
							<option value="completed" {if $order_list[list].status eq 'completed'}selected="selected"{/if}>Delivered</option>
							<option value="failed" {if $order_list[list].status eq 'failed'}selected="selected"{/if}>Failed</option>
						</select>
					</td>-->
                     <td align="center" class="listCont">{$order_list[list].id}</td>
					<td align="center" class="listCont">{$order_list[list].addeddate|date_format:"%m - %d - %Y"}</td>
                  <!--  <td align="center" class="listCont">{$order_list[list].bookinggenerateid}</td>-->
					
                    <td>
                    {if $order_list[list].bookingstatus neq 'accept' and $order_list[list].bookingstatus neq 'reject' }
                    <select class="orderSelect1new" name="changeorderstatus" id="changeorderstatus" onchange="return bookstatus(this.value,'disclaimReason{$order_list[list].id}','{$fieldname1}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');">
                    
                    
                    <option value="" selected="selected" >select</option>
                    <option value="accept" {if $order_list[list].bookingstatus eq 'accept'}selected="selected"{/if} >Accept</option>
                    <option value="reject" {if $order_list[list].bookingstatus eq 'reject'}selected="selected"{/if} >Reject</option>
                    </select>
                    
                    <div id="disclaimReason{$order_list[list].id}" style="display:none">
							<span class="addPageRightFont">Reason<span class="color1">*</span></span>				
							<textarea  cols="5" rows="1" style="width:120px;" id="reason{$order_list[list].id}"></textarea>
							<input type="button" onclick="return changebookOrderStatus('reject','{$fieldname1}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');" style="margin-top:5px;" class="btn btn-default" value="Submit"/>
						
						</div>
                    
                    
                    {/if}
                    
                    {if $order_list[list].bookingstatus eq 'accept'}
						Accepted
						
					
                    {/if}
                    {if $order_list[list].bookingstatus eq 'reject'}
						Rejected
						
					
                    {/if}
                    
                    
                            
                    
                    
                    
                    
                    </td>
              
                    
                    
                    
                    
					<td align="center" class="listCont">
					{if $order_list[list].status eq '1'}
					<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');" style="cursor:pointer;" />
					
					{else}
					<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');" style="cursor:pointer;" />
					{/if}
					</td>
					{if $VIEWABLE eq 'Yes'}
					<td align="center" class="listCont">
						<a href="viewBookingDetails.php?bkid={$order_list[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}" style="cursor:pointer;">View
							<!--<img src="images/icon_edit.png" width="16" height="16" alt="View Order Details" title="View Order Details" />-->
						</a>&nbsp;
						
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');" style="cursor:pointer;" />
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
		<!--Pagination start-->
	  	<div class="pageCont">
			<ul class="page">
				<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
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
	  	<!--Pagination End-->
		<div class="clr"></div>
		<!--Button Right start-->
		<!--<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantManage.php">Back</a>{/if}
			<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
		</div>-->
	  	<!--Button Right End-->
	</div>

