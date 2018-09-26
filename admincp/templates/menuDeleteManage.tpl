<div class="page-header">
    <h1 class="title">Manage Deleted Menu {if $smarty.get.resid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Deleted Menu {if $smarty.get.resid} - {$restname}{/if}</li>
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

		<input type="hidden" name="filenameurl" id="filenameurl" value="{$req_file_name}" />
		{*{if $totalRecords gt 0}*}
		<div  class="filterbutton">
			<span  class="topName1">Total Records:</span> <span  class="topName2">{$tot_menu_rec}</span>
			<span  class="topName1">Active Records:</span> <span  class="topName2">{$active_menu_rec}</span>
			<span  class="topName1">Deactive Records:</span> <span  class="topName2">{$deactive_menu_rec}</span>
			<span  class="topName1">Popular Records:</span> <span  class="topName2">{$popular_menu_rec} </span>
            <span  class="topName1">Normal Records:</span> <span  class="topName2">{$normal_menu_rec}</span>
			<span  class="topName1">Menu Type :</span> <span  class="topName1">Veg :</span><span  class="topName2">{$veg_menu_rec}</span><span class="topName1">Non-veg :</span> <span  class="topName2">{$nonveg_menu_rec}</span>
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
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">
			<form name="menumanage" method="post" action="menuDeleteManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}" >
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
			{if !$smarty.get.resid}
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.menumanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
			{/if}
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.menumanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Dish">
					<option value="popular" {if $smarty.request.sortby eq pop} selected="selected"{/if}>&nbsp;&nbsp;Popular</option>
					<option value="normal" {if $smarty.request.sortby eq nor} selected="selected"{/if}>&nbsp;&nbsp;Normal</option>
				</optgroup>
				<optgroup label="Menu Type">
					<option value="veg" {if $smarty.request.sortby eq veg} selected="selected"{/if}>&nbsp;&nbsp;Veg</option>
					<option value="nonveg" {if $smarty.request.sortby eq nonveg} selected="selected"{/if}>&nbsp;&nbsp;Non Veg</option>
				</optgroup>
				<optgroup label="Others">
					<option value="masc" {if $smarty.request.sortby eq 'masc'}selected="selected"{/if}>&nbsp;&nbsp;Menu Name A to Z</option>
					<option value="mdesc" {if $smarty.request.sortby eq 'mdesc'}selected="selected"{/if}>&nbsp;&nbsp;Menu Name Z to A</option>
					<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Category Name A to Z</option>
					<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Category Name Z to A</option>
					{if !$smarty.get.resid}
					<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
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
				<form name="filterform" method="post" onsubmit="return filterValidation();" action="menuDeleteManage.php{if $smarty.request.resid neq ''}?resid={$smarty.request.resid}{/if}">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Menu Name/Restaurant Name"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm" />
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
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
             
		</div>
        
		<!--Button Left End-->
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="manageButton_addnw" href="restaurantManage.php">Back</a>{/if}
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
             {/if}
			{*<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>*}
			<input type="button"  class="btn btn-sm btn-primary but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-primary but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-danger but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="btn btn-sm btn-danger but_delete" value="Popular" style="display:none;" onclick="adminActivateDeactivate('Yes','menu_popular_dish','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="btn btn-sm btn-danger but_delete" value="Normal" style="display:none;" onclick="adminActivateDeactivate('No','menu_popular_dish','{$whereField}','{$tablename}','{$word}');" />
		</div>
		<!--Button Right End-->
		</div>
		
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered" id="table_menu">
				<tr class="">
					<th width="3%" align="center" class="">
					<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%" align="center" class="">S.No</th>
					<th width="{if !$smarty.get.resid}20%{else}20%{/if}" align="left" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'mdesc'}onclick="sortByAscDesc('masc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'masc'}onclick="sortByAscDesc('mdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('mdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Menu Name{if $smarty.request.sortby eq 'mdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'masc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="8%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Type{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="10%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Category{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{if !$smarty.get.resid}
					<th width="20%" align="left" class=" ">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
                    {if $smarty.get.catid}
                    <th width="6%" align="center" class="">Sort Order</th>
                    {/if}
					{*<th width="10%" align="center" class="">Photo</th>*}
					<th width="10%" align="center" class="">Added Date</th>
					<th width="5%" align="center" class="">Popular</th>
					<th width="5%" align="center" class="">Status</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="10%" align="center" class="">Action</th>
                    {/if}
				</tr>
				{section name="list" loop=$menu_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				{*<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$menu_list[list].id}">*}
                <tr {if $trvar is even}class="listLightGray"{/if} id="{$menu_list[list].id}">
					<td align="center" class="">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$menu_list[list].id}" onclick="individualSelect();" id="tableselect_{$smarty.section.list.rownum}" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
					</td>
					<td align="center" class="">{$menu_list[list].sno}</td>
					<td align="left" class="listCont txtindent">{$menu_list[list].menu_name|stripslashes}</td>
					<td align="left" class="listCont txtindent">{if $menu_list[list].menu_type eq 'veg'}Veg{elseif $menu_list[list].menu_type eq 'nonveg'}Non Veg{else}-{/if}</td>
					<td align="left" class="listCont txtindent">{$menu_list[list].menu_catname|stripslashes}</td>
					{if !$smarty.get.resid}
					<td align="left" class="listCont txtindent">{$menu_list[list].menu_restname|stripslashes}</td>
					{/if}
                    {if $smarty.get.catid}
                    <td align="center" class="listCont">{$menu_list[list].sortorder|stripslashes}</td>
                    {/if}
					{*<td align="center" class="listCont">
						{if $menu_list[list].menu_photo neq ''}
							<div class="largeImgTooltip">
								<img src="{$SITE_IMAGE_MENU_URL}/{$menu_list[list].menu_photo|stripslashes}" width="40" height="20" alt="{$menu_list[list].menu_name|stripslashes}" title="{$menu_list[list].menu_name|stripslashes}" class="imgborder" />
								<span><img src="{$SITE_IMAGE_MENU_URL}/{$menu_list[list].menu_photo|stripslashes}" alt="{$menu_list[list].menu_name|stripslashes}" title="{$menu_list[list].menu_name|stripslashes}" /></span>
							</div>
						{else}
							No Photo
						{/if}
					</td>*}	
					<td align="center" class="listCont">{$menu_list[list].addeddate|date_format:"%d - %m - %Y"}</td>
					<td align="center" class="listCont">
						{if $menu_list[list].menu_popular_dish eq 'Yes'}
						<img src="images/star_yellow.png" alt="Popular" title="Popular" onclick="return changeStatus('No','menu_popular_dish','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}');" style="cursor:pointer;" />
						{else}
						<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','menu_popular_dish','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}');" style="cursor:pointer;" />
						{/if}
					</td>
					<td align="center" class="listCont" id="chgstatus{$menu_list[list].id}">
						{if $menu_list[list].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}');" style="cursor:pointer;" />
						{elseif $menu_list[list].status eq '0'}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}');" style="cursor:pointer;" />
						{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="listCont">
						{*<span class="EditDeleteButton">
							<a href="menuAddEdit.php?eid={$menu_list[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{else}&resid={$menu_list[list].restaurant_id}{/if}">
								<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
							</a>
						</span>*}
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light" onclick="return restoreProcess('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}','delete_menu');"   >
								<i class="fa fa-recycle"></i>
							</a>
							
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon"onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}');" >
								<i class="fa fa-close"></i>
							</a>
						</span>
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="11" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
			</table>
		</div>
		<!--List End-->
		<!--Pagination start-->
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