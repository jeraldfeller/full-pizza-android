<div class="page-header">
    <h1 class="title">Manage Site Feedback</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Site Feedback</li>
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
			<form name="feedbackmanage" method="post" action="siteFeedbackManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}" />
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
			{if !$smarty.get.resid}
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.feedbackmanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_name}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
			{/if}
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.feedbackmanage.submit();">
				<option value="">Select</option>
                <optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					{if !$smarty.get.resid}
					<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
					{/if}
				</optgroup>				
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
				<form name="filterform" method="post" action="siteFeedbackManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
				
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="feedback/restaurant name"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-default"/>
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
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<!--{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a>{/if}-->
			<!--<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>-->
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
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th width="5%">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="5%" >S.No</th>
					{if !$smarty.get.resid}
					<th width="20%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant Name{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
					<th width="25%" >Feedback</th>
                    <th width="5%" >Id</th>
					<th width="10%">Added Date</th>
					<th width="5%" >Status</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="8%" >Options</th>
                    {/if}
                    {*<th width="10%">Actions</th>*}
				</tr>
				
				{section name="list" loop=$sitefeedbackList}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr id="deletecate{$sitefeedbackList[list].id}">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$sitefeedbackList[list].id}" onclick="individualSelect();" id="tableselect_{$smarty.section.list.rownum}" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
						</td>
					<td >{$sitefeedbackList[list].sno}</td>
					{if !$smarty.get.resid}
					<td >{$sitefeedbackList[list].restaurant_name|stripslashes}</td>
					{/if}
					<td>{$sitefeedbackList[list].feedback|stripslashes}</td>
                    <td>{$sitefeedbackList[list].id}</td>
					<td >{$sitefeedbackList[list].addeddate}</td>
					<td  id="chgstatus{$sitefeedbackList[list].id}">
						{if $sitefeedbackList[list].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$sitefeedbackList[list].id}','{$filename}');" style="cursor:pointer;" />
						
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$sitefeedbackList[list].id}','{$filename}');" style="cursor:pointer;" />
						{/if}
                        
					</td>
                    {if $VIEWABLE eq 'Yes'}
                    <td>
                        <a href="fullDetails.php?det_id={$sitefeedbackList[list].id}&det=feedback" class="btn btn-light btn-icon btn-sm"><i class="fa fa-search-plus"></i></a>
                        <span class="EditDeleteButton">
                        	<a href="javascript:;" class="btn btn-light btn-icon btn-sm" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$sitefeedbackList[list].id}');">
								<i class="fa fa-close"></i>
							</a>
						</span>
                    </td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="8" align="center" class="listCont">No record(s) found</td></tr>
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