<div class="detailsInnerNewWrap">
{$objRestaurant->addonsList()}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_addon}</h1>
<a href="javascript:void(0);" class="restOwnMyAddBtn" onclick="clickAddnewAddons();">{$LANG.res_myaccount_addonaddnew}</a>
<div class="clr"></div>
<!-- Pagination start -->
	{if $addonsListCnt gt 0} {$pagination} {/if}
<!-- Pagination end -->	

	{if $succ_msg neq ''}<div class="succmsg1">{$succ_msg}</div>{/if}
	<div class="ownerStaticContainer" id="statistics">
		<ul class="orderTopLine1Ul">
			<li><span class="order">{$LANG.res_myaccount_addontotal}:</span><span class="value">{$tot_add}</span></li>
			<li><span class="order">{$LANG.res_myaccount_addonactive}:</span><span class="value">{$tot_addon_active}</span></li>
			<li><span class="order">{$LANG.res_myaccount_addondeactive}:</span><span class="value">{$tot_addon_deactive}</span></li>
		</ul>
		<div class="frt">
			<span class="sortbytext">{$LANG.res_myaccount_addonsortby} : </span>
			<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Addon');" class="selectpicker">
			<option value="">{$LANG.res_myaccount_addon_page_select}</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_addonactivate}</option>
					<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_addondeactivate}</option>
				</optgroup>
			</select>
		</div>
	</div>
	<div class="ordersInnerWrap">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="orderInnerHead">
					<td class="orderHeading" width="10%">{$LANG.res_myaccount_addonsno}</td>
					<td class="orderHeading" width="25%">{$LANG.res_myaccount_addoncatname}</td>
					<td class="orderHeading" width="25%">{$LANG.res_myaccount_addonname}</td>
					<td class="orderHeading" width="15%">{$LANG.res_myaccount_addondate}</td>
					<td class="orderHeading" width="10%">{$LANG.res_myaccount_addonstatus}</td>
					<td class="orderHeading" width="10%">{$LANG.res_myaccount_addonaction}</td>
				</tr>    
				{section name=add loop="$addonsList"}
				<tr class="orderInnerCont {if $smarty.section.add.rownum is div by 2} colorBgGray{/if}">
					<td>{$addonsList[add].sno}</td>
					<td>{$addonsList[add].maincatename|ucfirst|stripslashes}</td>
					<td>{$addonsList[add].addonsname|ucfirst|stripslashes}</td>
					<td>{$addonsList[add].addeddate|date_format}</td>
					<td>
						{if $addonsList[add].status eq '1'}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','{$addonsList[add].id}','Addon')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
						{else}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','{$addonsList[add].id}','Addon')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
						{/if}	
					</td>
					
					<td>
						<a href="javascript:void(0);" onclick="addonsEdit('{$addonsList[add].id}')"><img src="{$SITE_IMAGE_URL}/edit.jpg" alt="" title="" class="editDel" /></a>					  
						<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','{$addonsList[add].id}','Addon');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a>
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
	{if $addonsListCnt gt 0}
	{$pagination}
	{/if}	
	<!-- Pagination end -->
</div>
	