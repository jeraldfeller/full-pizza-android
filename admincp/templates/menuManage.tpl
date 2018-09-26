<div class="page-header">
    <h1 class="title">Configuracion Menu {*{if $smarty.get.resid} - {$restname}{/if}*}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Configuracion Menu {*{if $smarty.get.resid} - {$restname}{/if}*}</li>
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
			<span  class="topName1">Popular Records:</span> <span  class="topName2"> {$popular_menu_rec} </span>
            <span  class="topName1">Normal Records:</span> <span  class="topName2"> {$normal_menu_rec}</span>
			<span  class="topName1">Veg :</span><span  class="topName2">{$veg_menu_rec}</span>
			<span class="topName1">Non-veg :</span> <span  class="topName2">{$nonveg_menu_rec}</span>
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
			<form name="menumanage" method="post" action="menuManage.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.searchrestaurantid}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}" />
			{*
			{if !$smarty.get.resid}
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.menumanage.submit();">
				<option value="">Select Restaurant Name</option>
				{foreach from=$restaurantSearchList item=searchreslist}
				<option value="{$searchreslist.restaurant_id}" {if $smarty.request.searchrestaurantid eq $searchreslist.restaurant_id}selected="selected"{/if}>{$searchreslist.restaurant_name|stripslashes}</option>
				{/foreach}
			</select>
			{/if}
            *}
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.menumanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Dish">
					<option value="popular" {if $smarty.request.sortby eq popular} selected="selected"{/if}>&nbsp;&nbsp;Popular</option>
					<option value="normal" {if $smarty.request.sortby eq normal} selected="selected"{/if}>&nbsp;&nbsp;Normal</option>
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
					{*{if !$smarty.get.resid}
					<option value="resasc" {if $smarty.request.sortby eq 'resasc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" {if $smarty.request.sortby eq 'resdesc'}selected="selected"{/if}>&nbsp;&nbsp;Restaurant Name Z to A</option>
					{/if}*}
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
			<form name="filterform" method="post" onsubmit="return filterValidation();" action="menuManage.php{if $smarty.request.resid neq ''}?resid={$smarty.request.resid}{/if}">
				<input type="hidden" name="action"  value="filterProcess" />
				<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
				
				<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Menu Name/Restaurant Name"/>
				<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
				<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
			</form>	 
		</div>
			<!--Export-->
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
			</div>
			{/if}
			<!--Import-->
			<div  class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
				<img src="images/icon_plus.png" alt="Import" title="Import" />
			</div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" checked="checked" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
				</form>
			 </div>
             
             
		</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			 {if $totalRecords neq '0'}
			<span id="errormsg" {if $smarty.request.catid neq ''}style="color:green"{/if}>{if $smarty.request.catid neq ''}Now, you can drag menu{/if}</span>
            {/if}
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="btn btn-info btn-sm" href="restaurantManage.php{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if} {if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Back</a>{/if}
			
			<a class="btn btn-default btn-sm" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.page}{/if}{elseif $smarty.request.searchrestaurantid neq ''}?resid={$smarty.request.searchrestaurantid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.page}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}"><i class="fa fa-plus-circle"></i> Add New</a>
			
			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','Menu');" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Popular" style="display:none;" onclick="adminActivateDeactivate('Yes','menu_popular_dish','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Normal" style="display:none;" onclick="adminActivateDeactivate('No','menu_popular_dish','{$whereField}','{$tablename}','{$word}');" />
            {*if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
             {/if*}
		</div>
		<!--Button Right End-->
		</div>
		 
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped" {if $smarty.get.catid neq ''}id="table_menu"{/if}>
				<tr class="nodrop nodrag">
					<th width="4%">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%">S.No</th>
					<th width="{if !$smarty.get.resid}25%{else}25%{/if}" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'mdesc'}onclick="sortByAscDesc('masc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'masc'}onclick="sortByAscDesc('mdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('mdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Menu Name{if $smarty.request.sortby eq 'mdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'masc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="8%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Type{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th width="10%">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Category{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{*{if !$smarty.get.resid}
					<th width="15%" >
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}*}
                    {if $smarty.get.catid}
                    <th width="6%" >Sort Order</th>
                    {/if}
					{*<th width="7%" >Photo</th>*}
                    <th width="7%" >Id</th>
					<th width="10%" >Added Date</th>
					<th width="5%" >Popular</th>
					<th width="6%" >Status</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="20%" >Action</th>
                    {/if}
				</tr>
				{section name="list" loop=$menu_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
                
				{*<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$menu_list[list].id}">*}
                <tr id="{$menu_list[list].id}">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="tableselect_{$smarty.section.list.rownum}" class="case" value="{$menu_list[list].id}" onclick="individualSelect();" />
							<label for="tableselect_{$smarty.section.list.rownum}"></label>
						</div>
					</td>
					<td >{$menu_list[list].sno}</td>
					<td >{$menu_list[list].menu_name|stripslashes}</td>
					<td >{if $menu_list[list].menu_type eq 'veg'}Veg{elseif $menu_list[list].menu_type eq 'nonveg'}Non Veg{else}other{/if}</td>
					<td >{$menu_list[list].menu_catname|stripslashes}</td>
					{*{if !$smarty.get.resid} 
					<td >{$menu_list[list].menu_restname|stripslashes}</td>
					{/if}*}
                    {if $smarty.get.catid}
                    <td  id="sort_order_{$menu_list[list].id}">{$menu_list[list].sortorder|stripslashes}</td>
                    {/if}
					{*<td >
						{if $menu_list[list].menu_photo neq ''}
							<div class="largeImgTooltip">
								<img src="{$SITE_IMAGE_MENU_URL}/{$menu_list[list].menu_photo|stripslashes}" width="40" height="20" alt="{$menu_list[list].menu_name|stripslashes}" title="{$menu_list[list].menu_name|stripslashes}" class="imgborder" />
								<span><img src="{$SITE_IMAGE_MENU_URL}/{$menu_list[list].menu_photo|stripslashes}" alt="{$menu_list[list].menu_name|stripslashes}" title="{$menu_list[list].menu_name|stripslashes}" /></span>
							</div>
						{else}
							No Photo
						{/if}
					</td>*}
                    <td >{$menu_list[list].id}</td>
					<td>{$menu_list[list].addeddate|date_format:"%d - %m - %Y"}</td>
					<td>
						{if $menu_list[list].menu_popular_dish eq 'Yes'}
						<img src="images/star_yellow.png" alt="Popular" title="Popular" onclick="return changeStatus('No','menu_popular_dish','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}','{$filename}');" style="cursor:pointer;" />
						{else}
						<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','menu_popular_dish','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>
					<td  id="chgstatus{$menu_list[list].id}">
						{if $menu_list[list].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}','{$filename}');" style="cursor:pointer;" />
						{elseif $menu_list[list].status eq '0'}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td>
						<span class="EditDeleteButton">
							<a href="menuAddEdit.php?eid={$menu_list[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{else}&resid={$menu_list[list].restaurant_id}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}" class="btn btn-light btn-icon">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
					   <span class="EditDeleteButton">
					   		<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}','delete_menu');">
								<i class="fa fa-close"></i>
							</a>
						</span>	
					</td>
                    {/if}
				</tr>
				{sectionelse}
				<tr><td colspan="12" align="center" class="text-danger">No record(s) found</td></tr>
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