<div class="page-header">
    <h1 class="title">Manage Main Category{if $smarty.request.resid neq ''} - {$resname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Main Category{if $smarty.request.resid neq ''} - {$resname}{/if}</li>
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
			<div id="loadingrefresh">
				<div class="col-sm-5 col-xs-12 no-padding form-horizontal">
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
			<input type="hidden" name="filenameurl" id="filenameurl" value="{$req_file_name}" />
			{if $totalRecords gt 0}
				{* ----------------- Sort By -------------------- *}
				<div class="col-sm-7 no-padding">	
					<form name="categorymanage" method="post" action="categoryManage.php{if $smarty.request.limit neq ''}?limit={$smarty.request.limit}{/if}" />
					<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
                        {*
                        {if !$smarty.get.resid}
            			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.categorymanage.submit();">
            				<option value="">Select Restaurant Name</option>
            				{foreach from=$restaurantSearchList item=searchreslist}
            				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
            				{/foreach}
            			</select>
            			{/if}
            			*}
                        <div class="pull-right">
    					<span class="restManageNameSort">Sort By</span>
    					<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.categorymanage.submit();">
    						<option value="">Select</option>
    						<optgroup label="Status">
    							<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>Active</option>
    							<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>Deactive</option>
    						</optgroup>
    						<optgroup label="Others">
    							<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>Category Name A to Z</option>
    							<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>Category Name Z to A</option>
    						</optgroup>				
    					</select>
                        </div>
					</form>
				</div>
				{/if}
				<!--Button Left start-->
                <div class="col-sm-12 no-padding">
				<div  class="manageButtonLeft">
					{if $totalRecords gt 0}
					<!--Filter-->
					<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
						 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
					</div>
                    
                    
					<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
						<form name="filterform" method="post" action="categoryManage.php{if $smarty.request.searchrestaurantid neq ''}?resid={$smarty.request.searchrestaurantid}{/if}" onsubmit="return filterValidation();">
							<input type="hidden" name="action"  value="filterProcess" />
							<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
							
	                           <input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Category Name"/>
                                <input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
    							<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />
                               	 
						</form>	 
					</div>
					<!--Export-->
					{*<div class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
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
					{*<div class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
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
                     
				</div>
               
				<!--Button Left End-->
				<div class="col-sm-5"> <span id="errormsg"></span></div>
				<!--Button Right start-->
				<div class="manageButtonLastCont">
					 {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
        			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                     {/if}
					{*<a class="manageButton_addnw thickbox" href="categoryAddEdit.php?height=300&width=700">Add New</a>*}
					<a class="btn btn-default btn-sm" href="categoryAddEdit.php{if $smarty.request.resid neq ''}?resid={$smarty.request.resid}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>
					<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
					<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
					<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','category');" />
                     
				</div>
               
                </div>
				<!--Button List End-->
                
				
				<!--List Start-->
				<div class="tableListContainer">
					<table class="table table-bordered table-hover table-striped" {if $smarty.request.resid neq ''}id="table_catgory"{/if}>
						<tr class="nodrop nodrag">
							<th width="3%" align="center" class="">
								<div class="checkbox checkbox-primary no-margin">
									<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
									<label for="selectall"></label>
								</div>
							</th>
							<th width="7%" align="center" class="">S.No</th>
							<th width="23%" align="center" class="">
								<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Main Category Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
								</a>
							</th>
                            
                            <th width="18%" align="center" class="">Restaurant Name</th>
                            
                            <th width="12%" align="center" class=""> Sort Order </th>
							<th width="8%" align="center" class="">
								<a href="javascript:void(0);" {if $smarty.request.sortby eq 'idesc'}onclick="sortByAscDesc('iasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('idesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Category Id{if $smarty.request.sortby eq 'idesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'iasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
								</a>
							</th>
                            
							<th width="15%" align="center" class="">Added Date</th>
							<th width="5%" align="center" class="">Status</th>
                            {if $VIEWABLE eq 'Yes'}
							<th width="10%" align="center" class="">Action</th>
                            {/if}
						</tr>
						{section name="maincat" loop=$mainCategory_list}
						{assign var="trvar" value=$smarty.section.maincat.rownum}
						<tr id="{$mainCategory_list[maincat].maincateid}">
							<td align="center" class="">
								<div class="checkbox checkbox-primary no-margin">
									<input type="checkbox" class="case" value="{$mainCategory_list[maincat].maincateid}" onclick="individualSelect();" id="tableselect_{$smarty.section.maincat.rownum}" />
									<label for="tableselect_{$smarty.section.maincat.rownum}"></label>
								</div>
							</td>
							<td align="center" class="">{$mainCategory_list[maincat].sno}</td>
                            <td align="center" class=""><a href="menuManage.php?catid={$mainCategory_list[maincat].maincateid}&resid={$mainCategory_list[maincat].restaurant_id}">{$mainCategory_list[maincat].maincatename|ucfirst|stripslashes}</a></td>
							<td align="center" class="">{$mainCategory_list[maincat].cat_restname|stripslashes}</td>
    
                            <td align="center" id="sort_order_{$mainCategory_list[maincat].maincateid}" class="">{$mainCategory_list[maincat].sortorder}</td>
							<td align="center" class="">{$mainCategory_list[maincat].maincateid}</td>
							<td align="center" class="">{$mainCategory_list[maincat].addeddate}</td>
							<td align="center" class="" id="chgstatus{$mainCategory_list[maincat].maincateid}">
								{if $mainCategory_list[maincat].status eq '1'}
								<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$mainCategory_list[maincat].maincateid}','{$filename}');" style="cursor:pointer;" />
								{elseif $mainCategory_list[maincat].status eq '0'}
								<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$mainCategory_list[maincat].maincateid}','{$filename}');" style="cursor:pointer;" />
								{/if}
							</td>
                            {if $VIEWABLE eq 'Yes'}
							<td align="center" class="">
								<span class="EditDeleteButton">
									<!--<a href="categoryAddEdit.php?eid={$mainCategory_list[maincat].maincateid}" class="thickbox">-->
									<a href="categoryAddEdit.php?eid={$mainCategory_list[maincat].maincateid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{else}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{/if}" class="btn btn-light btn-icon btn-sm" >
										<i class="fa fa-pencil"></i>
									</a>
								</span>
								<span class="EditDeleteButton">
									<a href="javascript:;" class="btn btn-light btn-sm btn-icon" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$mainCategory_list[maincat].maincateid}','delete_category');" style="cursor:pointer;" >
								        <i class="fa fa-close"></i>
							         </a>
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
</div>