<div class="adminRight span9 offset0 pull-right">
<div class="rightContHeading Heading">Manage Index Banner</div>
<div class="rightContBody">
	<div class="riteContWrap1">
	
		<!-- Sort By -->
		<div class="manageButtonLeft marginBot">	
			<form name="bannermanage" method="post" action="indexBannerManage.php" />
			<span class="restManageNameSort">Sort By</span><span class="restManageCol">:</span>
			<select class="restManageNameDrop" name="sortby" id="sortby" size="1" onchange="document.bannermanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
			</select>
			</form>
		</div>
		
		<!--Button Left start-->
		<div  class="manageButtonLeft">
			{if $totalRecords gt 0}
		    <!--Filter-->
		    <div  class="filterbutton" onclick="return filterOptShowHide();">
				<span class="flt"> Filter </span>
				<img class="plusimg" src="images/icon_plus.png" alt="Filter" title="Filter" style="display:none" />
				<img class="minusimg" src="images/icon_minus.png" alt="Filter" title="Filter"  />
			</div>
		    <div class="fliterbuttonContShow processButton" id="searchkey">
	     		<form name="filterform" method="post" action="indexBannerManage.php" onsubmit="return filterValidation();">
		     		<input type="hidden" name="action"  value="filterProcess" />
		     		
		 		  	Keyword:
				    <input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter">
		            <input type="submit" name="filter" value="Filter" class="buttonFilter">
					<input type="button" name="clear" value="Clear" class="buttonFilter" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			{/if}
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
             {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="buttonFilter" id="back" onclick="return backToContent();"/>
             {/if}
		</div>
		<!--Button Left End-->
		
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<a class="manageButton_addnw" href="indexBannerAddEdit.php">Add New</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','banner');" />
		</div>
		<!--Button Right End-->
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
			<!--Pagination-->
			<div class="paginationCont">
				{$pagination}
			</div>
		</div>
		<!--Pagination End-->
		<!--List Start-->
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<tr class="listHeader">
					<td width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
					<td width="7%" align="center" class="listHeaderCont">S.No</td>
					<!--<td width="45%" align="left" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Cuisine Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>-->
					<td width="15%" align="center" class="listHeaderCont">Banner Photo</td>
                    <td width="15%" align="center" class="listHeaderCont">Id</td>
					<td width="15%" align="center" class="listHeaderCont">Added Date</td>
					<td width="5%" align="center" class="listHeaderCont">Status</td>
                    {if $VIEWABLE eq 'Yes'}
					<td width="10%" align="center" class="listHeaderCont">Action</td>
                    {/if}
					
				</tr>
				{section name="list" loop="$bannerList"}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if}>
					<td align="center" class="listCont"><input type="checkbox" class="case" value="{$bannerList[list].banner_id}" onclick="individualSelect();" /></td>
					<td align="center" class="listCont">{$bannerList[list].sno}</td>
					<!--<td align="left" class="listCont">{$bannerList[list].cuisine_name|stripslashes}</td>-->
					<td align="center" class="listCont">
						{if $bannerList[list].banner_photo neq ''}
							<div class="largeImgTooltip">
								<img src="{$SITE_IMAGE_BANNER_URL}/{$bannerList[list].banner_photo|stripslashes}" width="40" height="20" alt="{$bannerList[list].banner_photo|stripslashes}" title="{$bannerList[list].banner_photo|stripslashes}" class="imgborder" />
								<span><img src="{$SITE_IMAGE_BANNER_URL}/{$bannerList[list].banner_photo|stripslashes}" alt="{$bannerList[list].banner_photo|stripslashes}" title="{$bannerList[list].banner_photo|stripslashes}" width="255" height="210" /></span>
							</div>
						{else}
							No Photo
						{/if}
					</td>
                    <td align="center" class="listCont">{$bannerList[list].banner_id}</td>
					<td align="center" class="listCont">{$bannerList[list].addeddate|date_format}</td>				
					<td align="center" class="listCont" id="chgstatus{$bannerList[list].banner_id}">
						{if $bannerList[list].banner_status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$bannerList[list].banner_id}');" style="cursor:pointer;" />
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$bannerList[list].banner_id}');" style="cursor:pointer;" />
						{/if}
					</td>
                    {if $VIEWABLE eq 'Yes'}
					<td align="center" class="listCont">
						<span class="EditDeleteButton">
							<a href="indexBannerAddEdit.php?id={$bannerList[list].banner_id}" >
								<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$bannerList[list].banner_id}','banner');" style="cursor:pointer;" />
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
		<div class="manageButtonLastCont">
			<a class="manageButton_addnw" href="indexBannerAddEdit.php">Add New</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','cuisine');" />
		</div>
	  	<!--Button List End-->
	</div>
</div>
</div>