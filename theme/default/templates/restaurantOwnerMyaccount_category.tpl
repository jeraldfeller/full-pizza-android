

<div class="detailsInnerNewWrap">

	<h1 class="restOwnMyHead">{$LANG.res_myaccount_cat}</h1>
	<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_categoryAddEdit.php{else}restaurant-myaccount-category-add{/if}" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i>{$LANG.res_myaccount_cataddnew}</a>	
	<hr class="heading-hr">
	<div class="clr"></div>	
	<input type="hidden" name="restid" class="restid" value="{$categoryList.0.restaurant_id}" id="resid"/>
    <input type="hidden" name="filenameurl" id="filenameurl" value="{$req_file_name}" />
	<!-- Pagination start -->
	{if $categoryListCnt gt 0}	{$pagination}	{/if}
	<!-- Pagination end -->
		<div class="succmsg1" ></div>
		<div class="ownerStaticContainer" id="statistics">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myaccount_cattotal}:</span><span class="value">{$totalcategory}</span></li>
				<li><span class="order">{$LANG.res_myaccount_catactive}:</span><span class="value">{$totalactive}</span></li>
				<li><span class="order">{$LANG.res_myaccount_catdeactive}:</span><span class="value">{$totdeactive}</span></li>
			</ul>
			<div class="frt">
            <form name="myaccountCategory" method="post" action="restaurantOwnerMyaccount_category.php" >
				<span class="sortbytext">{$LANG.res_myaccount_catsortby}: </span>
				<select name="sortbystatus" id="sortby" onchange="document.myaccountCategory.submit();" class="selectpicker">
				<option value="">All</option>
					<optgroup label="{$LANG.res_myaccount_catsortstatus}">
						<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_catsortactivate}</option>
						<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_catsortdeactivate}</option>
					</optgroup>
				</select>
            </form>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-bordered table-striped restownertable" id="table_catgory_own">
				<tbody>
					<tr class="nodrop nodrag">
						<th width="10%">{$LANG.res_myaccount_catsno}</th>
						<th width="20%">{$LANG.res_myaccount_catname}</th>
                        {*<td class="orderHeading" width="15%">{$LANG.res_myaccount_category_option}</td>*}
                        <th width="10%">Sort Order</th>
						<th width="20%">{$LANG.res_myaccount_catdate}</th>
						<th width="15%">{$LANG.res_myaccount_catstatus}</th>
						<th width="15%">{$LANG.res_myaccount_cataction}</th>
					</tr>
					{section name=cat loop=$categoryList}
					<tr id="{$categoryList[cat].maincateid}">
						<td>{$categoryList[cat].sno}</td>
						<!--<td>{$categoryList[cat].menu_catname|ucfirst|stripslashes}</td>-->
						<td><a href="{$SITE_BASEURL}/restaurantOwnerMyaccount_menu.php?mcatid={$categoryList[cat].maincateid}" >{$categoryList[cat].maincatename|ucfirst|stripslashes}</a></td>
                        {*<td>{$categoryList[cat].maincat_option}</td>*}
                        <td id="sort_order_{$categoryList[cat].maincateid}">{$categoryList[cat].sortorder}</td>
						<td>{$categoryList[cat].addeddate}</td>
						<td align="center">
							{if $categoryList[cat].status eq '1'}
								<a href="javascript:void(0);" onclick="changeStatus('0','{$categoryList[cat].maincateid}','Category','{$tablename}','{$fieldname}','{$wherefield}')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="" /></a>
							{else}
								<a href="javascript:void(0);" onclick="changeStatus('1','{$categoryList[cat].maincateid}','Category','{$tablename}','{$fieldname}','{$wherefield}')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
							{/if}
						</td>
						<td align="center">
    						<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_categoryAddEdit.php?catid={$categoryList[cat].maincateid}{else}restaurant-myaccount-category-edit/{$categoryList[cat].maincateid}{/if}" class="btn btn-sm btn-info" >
    						<!-- <img src="{$SITE_IMAGE_URL}/edit.jpg" alt="" title="" class="editDel" /> -->
    							<i class="fa fa-pencil"></i>
    						</a>
    						<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="changeStatus('delete','{$categoryList[cat].maincateid}','Category','{$tablename}','{$fieldname}','{$wherefield}');">
    						<!-- <img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /> -->
    						<i class="fa fa-times"></i></a>
						</td>
					</tr>
					{sectionelse}
					<tr class="orderInnerCont">
						<td style="color:red;" colspan="6" align="center">{$LANG.res_myaccount_no_rec_found}</td>
					</tr>
					{/section}
				</tbody>
			</table>
		</div>
		<!-- Pagination start -->
		{if $categoryListCnt gt 0}	{$pagination}	{/if}
		<!-- Pagination end -->
	</div>
	