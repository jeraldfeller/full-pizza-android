<div class="row">
<div class="heading">Customer </div>
<div class="adminRight">
<div class="adminTopHead">Manage Customer AddressBook</div>

		
		{if $totalRecords gt 0}
		<!-- Sort By -->
		<div class="manageButtonLeft marginBot">	
			<form name="addressBookmanage" method="post" action="addressBookManage.php" >
			<select class="restManageNameDrop" name="searchbookcustomerid" id="searchbookcustomer" onchange="document.addressBookmanage.submit();">
				<option value="">Select Customer Name</option>
				{foreach from=$customerSearchList item=searchcuslist}{$smarty.request.cusmid}
				<option value="{$searchcuslist.customer_id}" {if $smarty.request.cusmid eq $searchcuslist.customer_id}selected="selected"{/if}>{$searchcuslist.customer_name|stripslashes}- {$searchcuslist.customer_email}</option>
				{/foreach}
			</select>
			<div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="restManageNameDrop" name="sortby" id="sortby" size="1" onchange="document.addressBookmanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="atasc" {if $smarty.request.sortby eq 'atasc'}selected="selected"{/if}>Address Title A to Z</option>
					<option value="atdesc" {if $smarty.request.sortby eq 'atdesc'}selected="selected"{/if}>Address Title Z to A</option>
					
					<option value="cnasc" {if $smarty.request.sortby eq 'cnasc'}selected="selected"{/if}>Customer Name A to Z</option>
					<option value="cndesc" {if $smarty.request.sortby eq 'cndesc'}selected="selected"{/if}>Customer Name Z to A</option>
					
					<option value="pasc" {if $smarty.request.sortby eq 'pasc'}selected="selected"{/if}>Phone Number 0 to 9</option>
					<option value="pdesc" {if $smarty.request.sortby eq 'pdesc'}selected="selected"{/if}>Phone Number 9 to 0</option>
					
					{*<option value="zasc" {if $smarty.request.sortby eq 'zasc'}selected="selected"{/if}>Zipcode 1 to 9</option>
					<option value="zdesc" {if $smarty.request.sortby eq 'zdesc'}selected="selected"{/if}>Zipcode 9 to 1</option>
					*}
				</optgroup>				
			</select>
		</div>
			</form>
		</div>
		{/if}
		<div class="col-sm-12">
		<!--Button Left start-->
		<div  class="manageButtonLeft">
			{if $totalRecords gt 0}	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" action="addressBookManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Address title/Customer email"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-primary">
					<input type="button" name="clear" value="Clear" class="btn btn-sm btn-primary" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			<!--Export-->
			<!--<div  class="filterbutton" onclick="return exportOptShowHide();">Export<img src="images/icon_plus.png" alt="Export" title="Export" /></div>
			<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
				<form name="exportform" method="post" onsubmit="return exportValidation();">
					<input type="hidden" name="action"  value="exportProcess" />
							
					<select name="exportfile" id="exportfile">				 	 
						<option value="CSV">CSV</option>
						<option value="Excel">Excel</option>	
					</select>
					<input type="submit" name="export" value="Export" class="buttonFilter" />	
				</form>				 
			</div>-->
			{/if}
			<!--Import-->
			<!--<div  class="filterbutton" onclick="return importOptShowHide();">Import<img src="images/icon_plus.png" alt="Import" title="Import" /></div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
							 
				</form>
			 </div>-->
             
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<!--<a class="manageButton_addnw " href="addressBookAddEdit.php?{if $smarty.get.cusmid neq ''}cusmid={$smarty.get.cusmid}{/if}">Add New</a>-->
			<a class="btn btn-primary btn-sm " href="addressBookAddEdit.php{if $smarty.request.searchbookcustomerid neq ''}?searchbookcustomerid={$smarty.request.searchbookcustomerid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.searchbookcustomerid neq ''}?searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn btn-primary btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-primary btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-primary btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','customer');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-sm btn-primary" id="back" onclick="return backToContent();"/>
             {/if}
            {if $smarty.request.cusmid neq ''}
                <input type="button" name="back" value="Back" class="btn btn-sm btn-primary" id="back" onclick="return backToOldContent();"/>
            {/if}
		</div>
		<!--Button List End-->
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
			<!--Page Navigation-->
			<div class="paginationCont">
				{$pagination}
			</div>
		</div>
		<!--Pagination End-->
		<!--List Start-->
		<div class="tableListContainer ">
			<table class="manageAddBook" width="100%" border="0" class="tableListContent">
				<tr class="listHeader">
					<td align="center" width="3%"  class="listHeaderCont"><div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div></td>
					<td align="center" width="3%"  class="listHeaderCont">S.No</td>
				
					<td align="left" width="8%" class="listHeaderCont txtindent">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'atdesc'}onclick="sortByAscDesc('atasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'atasc'}onclick="sortByAscDesc('atdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('atdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Address Title{if $smarty.request.sortby eq 'atdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'atasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
				
					<td a width="10%" align="left" class="listHeaderCont txtindent">Customer Name
						{*<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cndesc'}onclick="sortByAscDesc('cnasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'cnasc'}onclick="sortByAscDesc('cndesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cndesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Customer Name{if $smarty.request.sortby eq 'cndesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'cnasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>*}
					</td>
                    <!--<td width="15%" align="left" class="listHeaderCont">Lastname</td>-->
					<td  width="25%" align="left" class="listHeaderCont">Address</td>
					<td align="center" width="13%"  class="listHeaderCont">Added Date</td>
					<td align="center" width="5%" class="listHeaderCont">Status</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" width="10%" class="listHeaderCont">Action</td>
                    {/if}
				</tr>
                
				{section name=book loop=$addressBook_list}
				{assign var="trvar" value=$smarty.section.book.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if}  id="deletecate{$addressBook_list[book].id}">
					<td align="center" class="listCont">
                        <div class="checkbox checkbox-primary no-margin">
                        <input type="checkbox" class="case" id="tableselect_{$smarty.section.book.rownum}" value="{$addressBook_list[book].id}" onclick="individualSelect();" />
                        <label for="tableselect_{$smarty.section.book.rownum}"></label>
                        </div>
                    </td>
					<td align="center" class="listCont">{$addressBook_list[book].sno}</td>
					<td align="center" class="listCont">{$addressBook_list[book].customer_address_title|stripslashes}</td>
					<td align="center" class="listCont">{$addressBook_list[book].customer_first_name|stripslashes}&nbsp;{$addressBook_list[book].customer_last_name|stripslashes}</td>
                    <!--<td align="left" class="listCont">{$addressBook_list[book].customer_lastname|stripslashes}</td>-->
					<td align="center" class="listCont">{if $addressBook_list[book].customer_apartment_name neq ''}{$addressBook_list[book].customer_apartment_name}, {/if}{if $addressBook_list[book].customer_landmark neq ''}{$addressBook_list[book].customer_landmark}, {/if}{$addressBook_list[book].customer_street}, {$addressBook_list[book].cityname}, {$addressBook_list[book].statename}-{$addressBook_list[book].customer_zip}</td>
					<td align="center" class="listCont">{$addressBook_list[book].added_date|date_format:"%m - %d - %Y"}</td>
					<td align="center" class="listCont" id="chgstatus{$addressBook_list[book].id}">
						{if $addressBook_list[book].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$addressBook_list[book].id}','{$filename}');" style="cursor:pointer;" />
						{elseif $customer_list[customer].status eq '2'}
						<img src="images/icon_pending.png" alt="Pending" title="Pending" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$customer_list[customer].customer_id}','{$filename}');" style="cursor:pointer;" />
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$addressBook_list[book].id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="listCont">
						<span class="EditDeleteButton">
							<a href="addressBookAddEdit.php?addid={$addressBook_list[book].id}{if $smarty.get.cusmid neq ''}&cusmid={$smarty.get.cusmid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}">
								<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
							</a>
						</span>
                        {*{if $smarty.session.agenttype eq 'SA'}*}
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$addressBook_list[book].id}','customer');" style="cursor:pointer;" />
						</span>
                        {*{/if}*}
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="8" align="center" class="listCont">No record(s) found</td></tr>
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
		<!--Button List start-->
		<div class="col-sm-12">
		<div class="manageButtonLastCont">
			<a class="btn btn-sm btn-primary " href="addressBookAddEdit.php{if $smarty.request.searchbookcustomerid neq ''}?searchbookcustomerid={$smarty.request.searchbookcustomerid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.searchbookcustomerid neq ''}?searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn btn-sm btn-primary but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-primary but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-primary but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','customer');" />
		</div>
	</div>
		<!--Button List End-->
	
	</div>

</div>