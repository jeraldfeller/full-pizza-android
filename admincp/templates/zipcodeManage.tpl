<div class="page-header">
    <h1 class="title">Manage Postcode</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Postcode</li>
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
		
		{if $totalRecords gt 0}
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="zipcodemanage" method="post" action="zipcodeManage.php" >
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.zipcodemanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
				
					<option value="zasc" {if $smarty.request.sortby eq 'zasc'}selected="selected"{/if}>&nbsp;&nbsp;Zip Code 1 to 9</option>
					<option value="zdesc" {if $smarty.request.sortby eq 'zdesc'}selected="selected"{/if}>&nbsp;&nbsp;Zip Code 9 to 1</option>
				
					<option value="sasc" {if $smarty.request.sortby eq 'sasc'}selected="selected"{/if}>&nbsp;&nbsp;State Code A to Z</option>
					<option value="sdesc" {if $smarty.request.sortby eq 'sdesc'}selected="selected"{/if}>&nbsp;&nbsp;State Code Z to A</option>
					
					<option value="aasc" {if $smarty.request.sortby eq 'aasc'}selected="selected"{/if}>&nbsp;&nbsp;Area Name A to Z</option>
					<option value="adesc" {if $smarty.request.sortby eq 'adesc'}selected="selected"{/if}>&nbsp;&nbsp;Area Name Z to A</option>
				</optgroup>				
			</select>
            </div>
			</form>
		</div>
		{/if}
	   <div class="col-sm-12 no-padding">
		<!--Button Left start-->
		<div  class="manageButtonLeft">	
			{if $totalRecords gt 0}
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" action="zipcodeManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Area Name" />
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
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
			<a class="btn btn-default btn-sm " href="zipcodeAddEdit.php{if $smarty.get.sc neq ''}?sc={$smarty.get.sc}{/if}{if $smarty.get.cid neq ''}&cid={$smarty.get.cid}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','zipcode');" />
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
             {/if}
		</div>
		<!--Button List End-->
        </div>
        <span id="errormsg"></span>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-bordered table-hover table-striped">
				<tr >
					<th width="3%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="7%" >S.No</th>
					<th width="15%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'zdesc'}onclick="sortByAscDesc('zasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'zasc'}onclick="sortByAscDesc('zdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('zdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Zipcode{if $smarty.request.sortby eq 'zdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'zasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="15%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'sdesc'}onclick="sortByAscDesc('sasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'sasc'}onclick="sortByAscDesc('sdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('sdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>State Code{if $smarty.request.sortby eq 'sdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'sasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>				
					<th width="25%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'adesc'}onclick="sortByAscDesc('aasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'aasc'}onclick="sortByAscDesc('adesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('adesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Area Name{if $smarty.request.sortby eq 'adesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'aasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="15%">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'idesc'}onclick="sortByAscDesc('iasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('idesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Zipcode Id{if $smarty.request.sortby eq 'idesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'iasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="15%">Added Date</th>
					<th width="5%">Status</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="10%" >Action</th>
                    {/if}
				</tr>
				{section name=zip loop=$zipcode_list}
				{assign var="trvar" value=$smarty.section.zip.rownum}
				<tr  id="deletecate{$zipcode_list[zip].zipcode_id}">
					<td >
						
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$zipcode_list[zip].zipcode_id}" onclick="individualSelect();" id="tableselect_{$smarty.section.zip.rownum}" />
							<label for="tableselect_{$smarty.section.zip.rownum}"></label>
						</div>
					</td>
					<td >{$zipcode_list[zip].sno}</td>
					<td >{$zipcode_list[zip].zipcode|stripslashes}</td>
					<td >{$zipcode_list[zip].statecode|stripslashes}</td>
					<td >{$zipcode_list[zip].areaname|stripslashes}</td>
					<td >{$zipcode_list[zip].zipcode_id}</td>
					<td >{$zipcode_list[zip].addeddate|date_format:"%d - %m - %Y"}</td>
					<td  id="chgstatus{$zipcode_list[zip].zipcode_id}">
						{if $zipcode_list[zip].zipcode_status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$zipcode_list[zip].zipcode_id}','{$filename}');" style="cursor:pointer;" />
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$zipcode_list[zip].zipcode_id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td >
						<span class="EditDeleteButton">
							<a href="zipcodeAddEdit.php?zipid={$zipcode_list[zip].zipcode_id}{if $smarty.get.sc neq ''}&sc={$smarty.get.sc}{/if}{if $smarty.get.cid neq ''}&cid={$smarty.get.cid}{/if}" class="btn btn-light btn-icon btn-sm" >
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$zipcode_list[zip].zipcode_id}','zipcode');" style="cursor:pointer;" />
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