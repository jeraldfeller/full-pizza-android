<div class="page-header">
    <h1 class="title">Manage Content</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Content</li>
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
				<form name="contentmanage" method="post" action="contentManage.php" />
				<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
                <div class="pull-right">
				<span class="restManageNameSort">Sort By</span>
				<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.contentmanage.submit();">
					<option value="">Select</option>
					<optgroup label="Status">
						<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
						<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
					</optgroup>
					<optgroup label="Others">
						<option value="tasc" {if $smarty.request.sortby eq 'tasc'}selected="selected"{/if}>&nbsp;&nbsp;Title Name A to Z</option>
						<option value="tdesc" {if $smarty.request.sortby eq 'tdesc'}selected="selected"{/if}>&nbsp;&nbsp;Title Name Z to A</option>
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
					<form name="filterform" method="post" action="contentManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filterProcess" />
						<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
						
						<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Content Title" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
					</form>	 
				</div>
				{*<!--Export-->
				<div  class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
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
				{*<!--Import-->
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
                
			</div>
            
			<!--Button Left End-->
			<!--Button Right start-->
			<div class="manageButtonLastCont">
				<a class="btn btn-default btn-sm" href="contentAddEdit.php"><i class="fa fa-plus-circle"></i> Add New</a>
				<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
				<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
				<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','content');" />
                 {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 {/if}
			</div>
			<!--Button List End-->
            </div>
			<!--List Start-->
			<div class="tableListContainer">
				<table class="table table-hover table-bordered table-striped" id="table_content">
					<tr>
						<th width="3%" align="" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
								<label for="selectall"></label>
							</div>
						</th>
						<th width="7%" align="" class="">S.No</th>
						<th width="40%" align="" class="">
							<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Title{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
							</a>
						</th>	
						<!--<td width="10%" align="left" class="listHeaderCont">Sort Order</td>	-->	
                        <th width="15%" align="" class="">Id</th>
						<th width="15%" align="" class="">Added Date</th>
						<th width="10%" align="" class="">Status</th>
                        {if $VIEWABLE eq 'Yes'}
						<th width="10%" align="" class="">Action</th>
                        {/if}
					</tr>
					{section name=content loop=$content_List}
					{assign var="trvar" value=$smarty.section.content.rownum}
					<tr id="{$content_List[content].content_id}" {if $trvar is even}class="listLightGray"{/if}>
						<td align="" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" class="case" value="{$content_List[content].content_id}" onclick="individualSelect();" id="tableselect_{$smarty.section.content.rownum}" />
								<label for="tableselect_{$smarty.section.content.rownum}"></label>
							</div>
						</td>
						<td align="" class="">{$content_List[content].sno}</td>
						<td align="" class="">{$content_List[content].content_title|stripslashes}</td>
                        <td align="" class="">{$content_List[content].content_id}</td>
						<!--<td align="left" class="listCont">{$content_List[content].sortorder|stripslashes}</td>-->
						<td align="" class="">{$content_List[content].addeddate}</td>
						<td align="" class="" id="chgstatus{$content_List[content].content_id}">
							{if $content_List[content].status eq '1'}
							<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$content_List[content].content_id}' ,'{$filename}');" style="cursor:pointer;" />
							
							{elseif $content_List[content].status eq '0'}
							<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$content_List[content].content_id}' ,'{$filename}');" style="cursor:pointer;" />
							{/if}
						</td>
                        {if $VIEWABLE eq 'Yes'}
						<td align="" class="">
							<span class="EditDeleteButton">
								<a href="contentAddEdit.php?conid={$content_List[content].content_id}" class="btn btn-light btn-icon btn-sm">
									<i class="fa fa-pencil"></i>
								</a>
							</span>
							<span class="EditDeleteButton">
								<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$content_List[content].content_id}','content');" style="cursor:pointer;" />
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
			<!--Pagination End-->
			
		
	
</div>
</div>