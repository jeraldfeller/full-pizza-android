<div class="detailsInnerNewWrap">
	{*$objRestaurant->addonsList()*}
	<h1 class="restOwnMyHead">
		{$LANG.res_myaccount_addon}
	</h1>
	<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_addonsAddEdit.php{else}restaurant-myaccount-addons-add{/if}" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i>{$LANG.res_myaccount_addonaddnew}</a>
	<hr class="heading-hr">
	<div class="clr"></div>
	<!-- Pagination start -->
	{if $addonsListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
    <div class="succmsg1"></div>
	<div class="ownerStaticContainer" id="statistics">
		<ul class="orderTopLine1Ul">
			<li>
				<span class="order">{$LANG.res_myaccount_addontotal}:</span>
				<span class="value">{$tot_add}</span>
			</li>
			<li>
				<span class="order">{$LANG.res_myaccount_addonactive}:</span>
				<span class="value">{$tot_addon_active}</span>
			</li>
			<li>
				<span class="order">{$LANG.res_myaccount_addondeactive}:</span>
				<span class="value">{$tot_addon_deactive}</span>
			</li>
		</ul>
		<div class="frt">
        <form name="myaccountCategory" method="post" action="restaurantOwnerMyaccount_addons.php" >
			<span class="sortbytext">{$LANG.res_myaccount_addonsortby} :</span>
			<select name="sortbystatus" id="sortby" onchange="document.myaccountCategory.submit();" class="selectpicker">
				<option value="">
					{$LANG.res_myaccount_addon_page_select}
				</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if}>
						{$LANG.res_myaccount_addonactivate}
					</option>
					<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>
						{$LANG.res_myaccount_addondeactivate}
					</option>
				</optgroup>
			</select>
        </form>
		</div>
	</div>
	<div class="ordersInnerWrap table-responsive">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr class="">
					<th width="10%">{$LANG.res_myaccount_addonsno}</th>
					<th width="25%">{$LANG.res_myaccount_addoncatname}</th>
					<th width="25%">{$LANG.res_myaccount_addonname}</th>
					<th width="15%">{$LANG.res_myaccount_addondate}</th>
					<th width="10%">{$LANG.res_myaccount_addonstatus}</th>
					<th width="10%">{$LANG.res_myaccount_addonaction}</th>
				</tr>
				{section name=add loop=$addonsList}
				<tr>
					<td>{$addonsList[add].sno}</td>
					<td>{$addonsList[add].maincatename|ucfirst|stripslashes}</td>
					<td>{$addonsList[add].addonsname|ucfirst|stripslashes}</td>
					<td>{$addonsList[add].addeddate}</td>
					<td>
						{if $addonsList[add].status eq '1'}
						<a href="javascript:void(0);" onclick="changeStatus('0','{$addonsList[add].id}','Addon','{$tablename}','{$fieldname}','{$wherefield}')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
						{else}
						<a href="javascript:void(0);" onclick="changeStatus('1','{$addonsList[add].id}','Addon','{$tablename}','{$fieldname}','{$wherefield}')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
						{/if}
					</td>
					<td>
						<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_addonsAddEdit.php?addonid={$addonsList[add].id}{else}restaurant-myaccount-addons-edit/{$addonsList[add].id}{/if}" class="btn btn-sm btn-info" >
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:void(0);" onclick="changeStatus('delete','{$addonsList[add].id}','Addon','{$tablename}','{$fieldname}','{$wherefield}');" class="btn btn-danger btn-sm">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
				{sectionelse}
				<tr class="orderInnerCont">
					<td class="text-danger" colspan="6" align="center">{$LANG.res_myaccount_no_rec_found}</td>
				</tr>
				{/section}
			</tbody>
		</table>
	</div>
	<!-- Pagination start -->
	{if $addonsListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
</div>