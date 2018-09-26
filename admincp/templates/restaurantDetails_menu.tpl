{assign var = menuList value = $objAdminRestaurantMgmt->menuList($resid)}
<div class="riteCont1Inner">
	<div class="riteCont1Inner">
		
<!--Button List start-->
		<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="btn btn-default" href="restaurantManage.php">Back</a>{/if}
			<!--<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />-->
		</div>
		<!--Button List End-->
		<!--Pagination Start
		<div class="pageCont">
			<ul class="page">
				<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$filename}');" >
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
		Pagination End-->
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<tr class="">
					<th width="5%" align="center" class="">S.No</th>
					<th width="45%" align="center" class="">Menu Name</th>
					<th width="15%" align="center" class="">Category</th>
					<th width="15%" align="center" class="">Added Date</th>
					<th width="5%" align="center" class="">Status</th>
					<!--<td width="10%" align="center" class="listHeaderCont">Action</td>-->
				</tr>
				{section name=list loop=$menuList}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr id="deletecate{$menuList[list].id}">
					{*<td align="center" class=""><input type="checkbox" class="case" value="{$menu_list[list].id}" onclick="individualSelect();" /></td>*}
					<td align="center" class="">{$menuList[list].sno}</td>
					<td align="center" class="">{$menuList[list].menu_name|stripslashes}</td>
					<td align="center" class="">{$menuList[list].menu_catname|stripslashes}</td>
					<td align="center" class="">{$menuList[list].addeddate|date_format}</td>
					<td align="center" class="" id="chgstatus{$menuList[list].id}">
						{if $menuList[list].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" style="cursor:not-allowed;"/>
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" style="cursor:not-allowed;"/>
						{/if}
					</td>
					<!--<td align="center" class="listCont">
						<span class="EditDeleteButton">
							<a href="menuAddEdit.php?eid={$menu_list[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}">
								<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$menu_list[list].id}');" style="cursor:pointer;" />
						</span>
					</td>-->
				</tr>
				{sectionelse}
				<tr><td colspan="5" align="center" class="text-danger">No record(s) found</td></tr>
				{/section}
			</table>
		</div>
		<!--List End-->
		<!--Pagination start
	  	<div class="pageCont">
			<ul class="page">
				<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$filename}');" >
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
	  	Pagination End-->
		<div class="clr"></div>
		<!--Button List start-->
		<div class="manageButtonLastCont">
			{if $limit lt $totalRecords}
				<a class="manageButton_addnw" href="menuManage.php{if $smarty.get.resid}?searchrestaurantid={$smarty.get.resid}{/if}">View More</a>
			{/if}
			<!--<a class="manageButton_addnw" href="menuAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}">Add New</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}');" />-->
		</div>
	  	<!--Button List End-->
	</div>
</div>