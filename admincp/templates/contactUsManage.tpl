<div class="page-header">
    <h1 class="title">Manage Contact Us</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Contact Us</li>
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
			<form name="contactUsManage" method="post" action="contactUsManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}" />
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
			{*{if !$smarty.get.resid}
			<select class="restManageNameDrop" name="searchrestaurantid" id="searchrestaurant" onchange="document.feedbackmanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from="$restaurantSearchList" item=searchreslist}
				<option value="{$searchreslist.restaurant_name}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_name}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>&nbsp;
			{/if}*}
            <div class="pull-right">
				<span class="restManageNameSort">Sort By</span>
				<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.contactUsManage.submit();">
					<option value="">Select</option>
	                <optgroup label="Status">
						<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
						<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
					</optgroup>
					{*<optgroup label="Others">
						{if !$smarty.get.resid}
						<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
						<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
						{/if}
					</optgroup>	*}			
				</select>
            </div>
			</form>
		</div>
		
		<div class="col-sm-12 no-padding">
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
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
					<input type="text" name="keyword" id="keyword" value="" class="textboxFilter" placeholder="Name"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm"/>
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();"/>
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
			</div>
			{/if}
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
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			{*{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a>{/if}
			<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>*}
			<input type="button"  class="btn btn-primary btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-primary btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-primary btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    		     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
             {/if}
			</div>
		<!--Button Right End-->
		</div>
		
		<span id="errormsg"></span>
		
		
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
					<th width="7%" >S.No</th>
					{if !$smarty.get.resid}
					<th width="10%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Name{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
					<th width="20%">Email Id</th>
					<th width="15%">Order No</th>
                    <th width="15%">Order Date</th>
                    <th width="17%" >Added Date</th>
                    <th width="18%" >Status</th>
                    {if $VIEWABLE eq 'Yes'} 
                    <th width="15%">Options</th> 
                    {/if}	
				</tr>
				
				{section name="list" loop=$contactUsList}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr id="deletecate{$contactUsList[list].contact_id}">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="tableselect_{$smarty.section.list.rownum}" class="case" value="{$contactUsList[list].contact_id}" onclick="individualSelect();" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
						</td>
					<td >{$contactUsList[list].sno}</td>
					{if !$smarty.get.contact_id}
					<td>{$contactUsList[list].contact_name|stripslashes}</td>
					{/if}
					<td >{if $contactUsList[list].contact_email neq ''}{$contactUsList[list].contact_email}{else}--{/if}</td>
                    <td >{if $contactUsList[list].contact_ordernumber neq ''}{$contactUsList[list].contact_ordernumber}{else}--{/if}</td>
                    <td >{if $contactUsList[list].contact_orderdate neq ''}{$contactUsList[list].contact_orderdate}{else}--{/if}</td>
                    <td >{$contactUsList[list].addeddate}</td>
					<td id="chgstatus{$contactUsList[list].contact_id}">
						{if $contactUsList[list].contact_status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$contactUsList[list].contact_id}','{$filename}');" style="cursor:pointer;" />
						
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$contactUsList[list].contact_id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>
                    <td >
                    <a href="fullDetails.php?det_id={$contactUsList[list].contact_id}&det=contact" class="btn btn-light btn-icon">
                    	<i class="fa fa-search-plus"></i></a>
                    </td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="listCont">
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$contactUsList[list].id}');" style="cursor:pointer;" />
						</span>
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="6" align="center" class="listCont">No record(s) found</td></tr>
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