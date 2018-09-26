<div class="page-header">
    <h1 class="title">Manage Deleted Cuisine</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Deleted Cuisine</li>
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
				<form name="cuisinemanage" method="post" action="cuisineDeleteManage.php{if $smarty.request.limit}?limit={$smarty.request.limit}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}" />
				<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
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
			<div class="col-sm-12 no-padding">
			<!--Button Left start-->
			<div  class="manageButtonLeft">
				{if $totalRecords gt 0}
				<!--Filter-->
				<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
					 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
				</div>
				<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
					<form name="filterform" method="post" action="cuisineDeleteManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filterProcess" />
						<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
						
						<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Cuisine Name" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
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
						 <input type="radio" name="rd_import"  value="emptab" />&nbsp;Empty table
						 <input type="radio" name="rd_import"  value="upttab" checked="checked" />&nbsp;Update table	         
						 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
								 
					</form>
				 </div>*}
                 {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 {/if}
			</div>
			<!--Button Left End-->
			
			<!--Button Right start-->
			<div class="manageButtonLastCont">
				{*<a class="btn btn-default btn-sm" href="cuisineAddEdit.php{if $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}	{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}	{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}	{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>*}
				<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
				<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
				<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','cuisine');" />
                
        	</div>
			<!--Button Right End-->
            </div>
			 <span id="errormsg"></span>
			<!--List Start-->
			<div class="tableListContainer">
				<table width="100%" border="0" class="table table-bordered table-hover table-striped ">
					<tr class="">
						<th width="3%" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
								<label for="selectall"></label>
							</div>
						</th>
						<th width="7%" align="center" class="">S.No</th>
						<th width="27%" align="left" class="">
							<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Cuisine Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
							</a>
						</th>
						<th width="15%" align="center" class="">
							<a href="javascript:void(0);" {if $smarty.request.sortby eq 'idesc'}onclick="sortByAscDesc('iasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('idesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Cuisine Id{if $smarty.request.sortby eq 'idesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
							</a>
						</th>
						{*<th width="15%" align="center" class="">Cuisine Photo</th>*}
						<th width="15%" align="center" class="">Added Date</th>
						<th width="5%" align="center" class="">Status</th>
						<th width="10%" align="center" class="">Action</th>
						
					</tr>
					{section name="cuisine" loop=$cuisine_List}
					{assign var="trvar" value=$smarty.section.cuisine.rownum}
					<tr {if $trvar is even}class="listLightGray"{/if}>
						<td align="center" class="listCont">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" class="case" value="{$cuisine_List[cuisine].cuisine_id}"  id="tableselect_{$smarty.section.cuisine.rownum}" onclick="individualSelect();" />
								<label for="tableselect_{$smarty.section.cuisine.rownum}"></label>
							</div>
						</td>
						<td align="center" class="listCont">{$cuisine_List[cuisine].sno}</td>
						<td align="left" class="listCont txtindent">{$cuisine_List[cuisine].cuisine_name|stripslashes}</td>
						<td align="center" class="listCont">{$cuisine_List[cuisine].cuisine_id}</td>
						{*<td align="center" class="listCont">
							{if $cuisine_List[cuisine].cuisine_photo neq ''}
								<div class="largeImgTooltip">
									<img src="{$SITE_IMAGE_CUISINE_URL}/{$cuisine_List[cuisine].cuisine_photo|stripslashes}" width="40" height="20" alt="{$cuisine_List[cuisine].cuisine_name|stripslashes}" title="{$cuisine_List[cuisine].cuisine_name|stripslashes}" class="imgborder" />
									<span><img src="{$SITE_IMAGE_CUISINE_URL}/{$cuisine_List[cuisine].cuisine_photo|stripslashes}" alt="{$cuisine_List[cuisine].cuisine_name|stripslashes}" title="{$cuisine_List[cuisine].cuisine_name|stripslashes}" /></span>
								</div>
							{else}
								No Photo
							{/if}
						</td>*}
						<td align="center" class="listCont">{$cuisine_List[cuisine].addeddate|date_format:"%d - %m - %Y"}</td>				
						<td align="center" class="listCont" id="chgstatus{$cuisine_List[cuisine].cuisine_id}">
							{if $cuisine_List[cuisine].cuisine_status eq '1'}
							<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$cuisine_List[cuisine].cuisine_id}','{$filename}');" style="cursor:pointer;" />
							{else}
							<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$cuisine_List[cuisine].cuisine_id}','{$filename}');" style="cursor:pointer;" />
							{/if}
						</td>
						<td align="center" class="">
							<span class="EditDeleteButton">
								<a href="javascript:;" class="btn btn-icon btn-light" onclick="return restoreProcess('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$cuisine_List[cuisine].cuisine_id}','delete_cuisine');" >
											<i class="fa fa-recycle"></i>
									</a>
							</span>
                            	<span class="EditDeleteButton">
									<a href="javascript:;" class="btn btn-light btn-sm btn-icon" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$cuisine_List[cuisine].cuisine_id}');" style="cursor:pointer;" >
								        <i class="fa fa-close"></i>
							         </a>
                              </span>
							{*<span class="EditDeleteButton">
								<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$cuisine_List[cuisine].cuisine_id}','cuisine');" style="cursor:pointer;" />
							</span>*}
						</td>
					</tr>
					{sectionelse}
					<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
					{/section}
				</table>
			</div>
			<!--List End-->
			
			<div class="col-sm-5 no-padding form-horizontal margin-top-10">
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