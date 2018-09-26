<div class="page-header">
    <h1 class="title">Manage Addons {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Addons {if $smarty.get.resid} - {$restname}{/if}</li>
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
			<div  class="filterbutton">
				<span  class="topName1">Total Records:</span> <span class="topName2">{$tot_addon_rec}</span>
				<span  class="topName1">Active Records:</span> <span class="topName2">{$active_addon_rec}</span>
				<span  class="topName1">Deactive Records:</span> <span class="topName2">{$deactive_addon_rec}</span>
			</div>
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
			{*{if $totalRecords gt 0}*}
			
			
			
			
			<!-- Sort By -->
			<div class="col-sm-7 no-padding">	
				<form name="addonsmanage" method="post" action="addonsManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{/if}" >
				<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
				{if !$smarty.get.resid}
				<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.addonsmanage.submit();">
					<option value="">Select Restaurant Name</option>
					{foreach from=$restaurantSearchList item=searchreslist}
					<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
					{/foreach}
				</select>
				{/if}
				<div class="pull-right">
					<span class="restManageNameSort">Sort By</span>
					<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.addonsmanage.submit();">
						<option value="">Select</option>
						<optgroup label="Status">
							<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
							<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
						</optgroup>
						<optgroup label="Others">
							<option value="aasc" {if $smarty.request.sortby eq 'aasc'}selected="selected"{/if}>&nbsp;&nbsp;Addons Name A to Z</option>
							<option value="adesc" {if $smarty.request.sortby eq 'adesc'}selected="selected"{/if}>&nbsp;&nbsp;Addons Name Z to A</option>
							<option value="catasc" {if $smarty.request.sortby eq 'catasc'}selected="selected"{/if}>&nbsp;&nbsp;Category Name A to Z</option>
							<option value="catdesc" {if $smarty.request.sortby eq 'catdesc'}selected="selected"{/if}>&nbsp;&nbsp;Category Name Z to A</option>
							{if !$smarty.get.resid}
							<option value="rasc" {if $smarty.request.sortby eq 'rasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
							<option value="rdesc" {if $smarty.request.sortby eq 'rdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
							{/if}
						</optgroup>
					</select>
				</div>
				</form>
			</div>
			{*{/if}*}
			<div class="col-sm-12 no-padding">
			<!--Button Left start-->
				<div class="manageButtonLeft">
					{if $totalRecords gt 0}	
					<!--Filter-->
					<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
						 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
					</div>
					<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
						<form name="filterform" method="post" action="addonsManage.php" onsubmit="return filterValidation();">
							<input type="hidden" name="action"  value="filterProcess" />
							<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
							
							
							<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Addons Name" />
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
				<!--Button List start-->
				<div class="manageButtonLastCont">
					{if $smarty.get.resid}<a class="btn btn-info btn-sm" href="restaurantManage.php{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if} {if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Back</a>{/if}
					<!--<a class="manageButton_addnw thickbox" href="addonsAddEdit.php?resid={$smarty.get.resid}&height=300&width=700">Add New</a>-->
					<a class="btn btn-default btn-sm" href="addonsAddEdit.php{if $smarty.request.resid neq ''}?resid={$smarty.request.resid}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>
					<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
					<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
					<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','addon');" />
	                 {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
	    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
	                 {/if}
				</div>
				<!--Button List End-->
			</div>
			 <span id="errormsg"></span>
			<!--List Start-->
			<div class="tableListContainer">
				<table class="table table-hover table-bordered table-striped">
					<tr class="">
						<th width="5%" align="center" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
								<label for="selectall"></label>
							</div>
						</th>
						<th width="5%" align="center" class="">S.No</th>
						<th width="{if !$smarty.get.resid}20%{else}30%{/if}" align="left" class="">
							<a href="javascript:void(0);" {if $smarty.request.sortby eq 'adesc'}onclick="sortByAscDesc('aasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'aasc'}onclick="sortByAscDesc('adesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('adesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Addons Name{if $smarty.request.sortby eq 'adesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'aasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
							</a>
						</th>
						<th width="{if !$smarty.get.resid}20%{else}30%{/if}" align="left" class="">
							<a href="javascript:void(0);" {if $smarty.request.sortby eq 'catdesc'}onclick="sortByAscDesc('catasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'catasc'}onclick="sortByAscDesc('catdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('catdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Category{if $smarty.request.sortby eq 'catdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'catasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
							</a>
						</th>
				
						{if !$smarty.get.resid}
						<th width="{if !$smarty.get.resid}20%{else}30%{/if}" align="left" class="">
							<a href="javascript:void(0);" {if $smarty.request.sortby eq 'rdesc'}onclick="sortByAscDesc('rasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'rasc'}onclick="sortByAscDesc('rdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('rdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'rdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'rasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
							</a>
						</th>
						{/if}
						<th width="15%" align="center" class="">Added Date</th>
						<th width="5%" align="center" class="">Status</th>
                        {if $VIEWABLE eq 'Yes'}
						<th width="10%" align="center" class="">Action</th>
                        {/if}
					</tr>
					{section name=list loop=$addons_list}
					{assign var="trvar" value=$smarty.section.list.rownum}
					<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$addons_list[list].id}">
						<td align="center" class="listCont">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" class="case" value="{$addons_list[list].id}" onclick="individualSelect();" id="tableselect_{$smarty.section.list.rownum}"/>
								<label for="tableselect_{$smarty.section.list.rownum}"></label>
							</div>

						</td>
						<td align="center" class="listCont">{$addons_list[list].sno}</td>
						<td align="left" class="listCont">{$addons_list[list].addonsname|stripslashes}</td>
						<td align="left" class="listCont">{$addons_list[list].addons_catname|stripslashes}</td>
						{if !$smarty.get.resid}
						<td align="left" class="listCont">{$addons_list[list].addons_restname|stripslashes}</td>
						{/if}
						<td align="center" class="listCont">{$addons_list[list].addeddate}</td>
						<td align="center" class="listCont" id="chgstatus{$addons_list[list].id}">
							{if $addons_list[list].status eq '1'}
							<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$addons_list[list].id}','{$filename}');" style="cursor:pointer;" />
							{else}
							<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$addons_list[list].id}','{$filename}');" style="cursor:pointer;" />
							{/if}
						</td>
                        {if $VIEWABLE eq 'Yes'}
						<td align="center" class="">
							<span class="EditDeleteButton">
								<a href="addonsAddEdit.php?eid={$addons_list[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}"  class="btn btn-light btn-icon btn-sm">
									<i class="fa fa-pencil"></i>
								</a>
							</span>
							<span class="EditDeleteButton">
								<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$addons_list[list].id}','addon');" style="cursor:pointer;" />
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