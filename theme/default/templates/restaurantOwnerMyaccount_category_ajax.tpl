<div class="detailsInnerNewWrap">
{$objRestaurant->categoryList()}
	<h1 class="restOwnMyHead">{$LANG.res_myaccount_cat}</h1>
	<a href="javascript:void(0);" class="restOwnMyAddBtn" onclick="clickAddnewCategory();">{$LANG.res_myaccount_cataddnew}</a>	
	<div class="clr"></div>	
	<input type="hidden" name="restid" class="restid" value="{$categoryList.0.restaurant_id}" id="resid"/>
	<!-- Pagination start -->
	{if $categoryListCnt gt 0}	{$pagination}	{/if}
	<!-- Pagination end -->
		{if $succ_msg neq ''}<div class="succmsg1" >{$succ_msg}</div>{/if}
		<div class="ownerStaticContainer" id="statistics">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myaccount_cattotal}:</span><span class="value">{$totalcategory}</span></li>
				<li><span class="order">{$LANG.res_myaccount_catactive}:</span><span class="value">{$totalactive}</span></li>
				<li><span class="order">{$LANG.res_myaccount_catdeactive}:</span><span class="value">{$totdeactive}</span></li>
			</ul>
			<div class="frt">
				<span class="sortbytext">{$LANG.res_myaccount_catsortby}: </span>
				<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Category');" class="selectpicker">
				<option value="">All</option>
					<optgroup label="{$LANG.res_myaccount_catsortstatus}">
						<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_catsortactivate}</option>
						<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_catsortdeactivate}</option>
					</optgroup>
				</select>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-striped restownertabl" id="table_catgory_own">
				<tbody>
					<tr>
						<th width="10%">{$LANG.res_myaccount_catsno}</th>
						<th width="40%">{$LANG.res_myaccount_catname}</th>
						<th width="15%">{$LANG.res_myaccount_catdate}</th>
						<th width="15%">{$LANG.res_myaccount_catstatus}</th>
						<th width="15%">{$LANG.res_myaccount_cataction}</th>
					</tr>
					{section name=cat loop="$categoryList"}
					<tr class="" id="{$categoryList[cat].maincateid}">
						<td>{$categoryList[cat].sno}</td>
						<!--<td>{$categoryList[cat].menu_catname|ucfirst|stripslashes}</td>-->
						<td>{$categoryList[cat].maincatename|ucfirst|stripslashes}</td>
						<td>{$categoryList[cat].addeddate|date_format:"%d-%m-%Y"}</td>
						<td align="center">
							{if $categoryList[cat].status eq '1'}
								<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','{$categoryList[cat].maincateid}','Category')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
							{else}
								<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','{$categoryList[cat].maincateid}','Category')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
							{/if}
						</td>
						<td>
    						<a href="javascript:void(0);" onclick="categorysEdit('{$categoryList[cat].maincateid}')"><img src="{$SITE_IMAGE_URL}/edit.jpg" alt="" title="" class="editDel" /></a>
    						<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','{$categoryList[cat].maincateid}','Category');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a>
						</td>
					</tr>
					{sectionelse}
					<tr class="orderInnerCont">
						<td class="text-danger" colspan="5" align="center">{$LANG.res_myaccount_no_rec_found}</td>
					</tr>
					{/section}
				</tbody>
			</table>
		</div>
		<!-- Pagination start -->
		{if $categoryListCnt gt 0}	{$pagination}	{/if}
		<!-- Pagination end -->
	</div>
	