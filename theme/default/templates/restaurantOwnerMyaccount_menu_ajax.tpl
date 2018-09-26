<div class="detailsInnerNewWrap">
{$objRestaurant->menuList()}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_menu}</h1>
<a href="javascript:void(0);" class="restOwnMyAddBtn" onclick="clickAddnewMenu();">{$LANG.res_myaccount_menuaddnew}</a>
<div class="clr"></div>
	<!-- Pagination start -->
	{if $menuListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
	
	
		{if $succ_msg neq ''}<div class="succmsg1">{$succ_msg}</div>{/if}
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myaccount_menutotal}:</span><span class="value">{$tot_menu}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menuactive}:</span><span class="value">{$tot_menu_active}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menudeactive}:</span><span class="value">{$tot_menu_deactive}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menupopular}:</span><span class="value">{$tot_menu_popular}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menunormal}:</span><span class="value">{$tot_menu_normal}</span></li>
			</ul>
            	
            <div class="frt">
				<span class="sortbytext">Sort By: </span>
                <select name="categorysortby" id="categorysortby" onchange="return categorySortbyStatus(this.value,'Menu');" class="selectpicker">
                    <option value="">Select</option>
                    {section name="cat" loop=$showcategorylist}
                    <option value="{$showcategorylist[cat].maincateid}" {if $smarty.request.sortbystatus eq $showcategorylist[cat].maincateid}selected="selected"{/if}>{$showcategorylist[cat].maincatename|stripslashes}</option>
                    {/section}
                </select>
            
				<span class="sortbytext">{$LANG.res_myaccount_menusortby}:</span>
				<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Menu');" class="selectpicker">
				<option value="">All</option>
					<optgroup label="{$LANG.res_myaccount_menusortstatus}">
						<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_menusortactivate}</option>
						<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_menusortdeactivate}</option>
						<option value="popular" {if $smarty.get.sortby eq 'popular' or $smarty.request.sortbystatus eq 'popular'}selected="selected"{/if} >{$LANG.res_myaccount_menusortpopular}</option>
						<option value="normal" {if $smarty.get.sortby eq 'normal' or $smarty.request.sortbystatus eq 'normal'}selected="selected"{/if}>{$LANG.res_myaccount_menusortnormal}</option>
					</optgroup>
				</select>
			</div>	
		</div>
	
		<div class="ordersInnerWrap">
			<table width="100%" cellpadding="0" cellspacing="0" border="0" onmousemove="table_menu_own();">
				<tbody>
					<tr class="orderInnerHead">
						<td class="orderHeading" width="10%">{$LANG.res_myaccount_menusno}</td>
						<td class="orderHeading" width="15%">{$LANG.res_myaccount_menucatname}</td>
						<td class="orderHeading" width="15%">{$LANG.res_myaccount_menuname}</td>
						<td class="orderHeading" width="15%">{$LANG.res_myaccount_menuprice}</td>
						<td class="orderHeading" width="15%">{$LANG.res_myaccount_menudate}</td>
						<td class="orderHeading" width="10%">{$LANG.res_myaccount_menupopular}</td>
						<td class="orderHeading" width="10%">{$LANG.res_myaccount_menustatus}</td>
						<td class="orderHeading" width="10%">{$LANG.res_myaccount_menumange}</td>
					</tr>
					{section name=menu loop="$menuList"}
					<tr class="orderInnerCont {if $smarty.section.menu.rownum is div by 2} colorBgGray{/if}" id="{$menuList[menu].id}">
						<td>{$menuList[menu].sno}</td>
						<td>{$menuList[menu].maincatename|ucfirst|stripslashes}</td>
						<td>{$menuList[menu].menu_name|ucfirst|stripslashes}</td>
						<td><span class="rupeePrice">{$menuList[menu].menu_price|ucfirst|stripslashes}</span></td>
						<td>{$menuList[menu].addeddate|date_format}</td>
						<td align="center">
							<!--{if $menuList[menu].menu_popular_dish eq 'Yes'}<a href="javascript:void(0);" onclick="return changeStatusOption('No','{$menuList[menu].id}','popular')"> Popular</a>
							{else}<a href="javascript:void(0);" style="color:red;" onclick="return changeStatusOption('Yes','{$menuList[menu].id}','popular')"> Normal </a>{/if}-->
							{if $menuList[menu].menu_popular_dish eq 'Yes'}
							<img src="{$SITE_IMAGE_URL}/star_yellow.png" alt="Popular" title="Popular" {*onclick="changeStatusResMyacc('No','{$menuList[menu].id}','Menu')"*} class="curPointer" />
							{else}
							<img src="{$SITE_IMAGE_URL}/star_grey.png" alt="Normal" title="Normal" {*onclick="changeStatusResMyacc('Yes','{$menuList[menu].id}','Menu')"*} class="curPointer" />
							{/if}
						</td>
						<td align="center">
							{if $menuList[menu].status eq '1'}
								<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','{$menuList[menu].id}','Menu')"><img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
							{else}
								<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','{$menuList[menu].id}','Menu')"><img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /></a>
							{/if}
						</td>
						<td align="center">
							<a href="javascript:void(0);" onclick="menuEdit1('{$menuList[menu].id}');"><img src="{$SITE_IMAGE_URL}/edit.jpg" alt="" title="" class="editDel" /></a>
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','{$menuList[menu].id}','Menu');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a></td>
					</tr>
					{sectionelse}
					<tr class="orderInnerCont">
						<td style="color:red;" colspan="8" align="center">{$LANG.res_myaccount_no_rec_found}</td>
					</tr>
					{/section}
				</tbody>
			</table>
		</div>
		<!-- Pagination start -->
		{if $menuListCnt gt 0} {$pagination} {/if}
		<!-- Pagination end -->
</div>
	