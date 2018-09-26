<div class="detailsInnerNewWrap">
{*$objRestaurant->menuList()*}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_menu}</h1>
<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_menuAddEdit.php{else}restaurant-myaccount-menu-add{/if}" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i>{$LANG.res_myaccount_menuaddnew}</a>
{if $mcatid neq ''}
    <a href="{$SITE_BASEURL}/restaurantOwnerMyaccount_category.php" class="btn btn-warning pull-right btn-sm" >Back</a>
{/if}
<hr class="heading-hr">
<div class="clr"></div>
	<!-- Pagination start -->
	{if $menuListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
		<div class="succmsg1">{$succ_msg}</div>
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
            
				<li><span class="order">{$LANG.res_myaccount_menutotal}:</span><span class="value">{$tot_menu}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menuactive}:</span><span class="value">{$tot_menu_active}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menudeactive}:</span><span class="value">{$tot_menu_deactive}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menupopular}:</span><span class="value">{$tot_menu_popular}</span></li>
				<li><span class="order">{$LANG.res_myaccount_menunormal}:</span><span class="value">{$tot_menu_normal}</span></li>
			</ul>
            	
            <div class="frt">
            
            <form name="myaccount_Menu" method="post" action="restaurantOwnerMyaccount_menu.php" >
				<span class="sortbytext">Sort By: </span>
                <select name="categorysortby" id="categorysortby" onchange="document.myaccount_Menu.submit();" class="selectpicker">
                    <option value="">Select</option>
                    {section name="cat" loop=$showcategorylist}
                    
                    <option value="{$showcategorylist[cat].maincateid}" {if $smarty.request.categorysortby eq $showcategorylist[cat].maincateid}selected="selected"{/if}>{$showcategorylist[cat].maincatename|stripslashes}</option>
                    {/section}
                </select>
            
				<span class="sortbytext">{$LANG.res_myaccount_menusortby}:</span>
				<select name="sortbystatus" id="sortby" onchange="document.myaccount_Menu.submit();" class="selectpicker">
				<option value="">All</option>
					<optgroup label="{$LANG.res_myaccount_menusortstatus}">
						<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >Active</option>
						<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>Deactive</option>
						<option value="popular" {if $smarty.get.sortby eq 'popular' or $smarty.request.sortbystatus eq 'popular'}selected="selected"{/if} >{$LANG.res_myaccount_menusortpopular}</option>
						<option value="normal" {if $smarty.get.sortby eq 'normal' or $smarty.request.sortbystatus eq 'normal'}selected="selected"{/if}>{$LANG.res_myaccount_menusortnormal}</option>
					</optgroup>
				</select>
            </form>
			</div>	
		</div>
	
		<div class="ordersInnerWrap">
			<table class="table table-hover table-bordered table-striped restownertable" {if $mcatid neq ''}id="table_menu_own" {/if}>
				<tbody>
					<tr class="nodrop nodrag">
						<th width="5%">{$LANG.res_myaccount_menusno}</th>
						<th width="15%">{$LANG.res_myaccount_menucatname}</th>
						<th width="15%">{$LANG.res_myaccount_menuname}</th>
                        {if $mcatid neq ''}
                        	<th width="10%">{$LANG.res_menu_sort_order|utf8_encode}</th>
                        {/if}
						<th width="10%">{$LANG.res_myaccount_menuprice}</th>
						<th width="15%">{$LANG.res_myaccount_menudate}</th>
						<th width="10%">{$LANG.res_myaccount_menupopular}</th>
						<th width="10%">{$LANG.res_myaccount_menustatus}</th>
						<th width="10%">{$LANG.res_myaccount_menumange}</th>
					</tr>
					{section name=menu loop=$menuList}
					<tr id="{$menuList[menu].id}">
						<td>{$menuList[menu].sno}</td>
						<td>{$menuList[menu].maincatename|ucfirst|stripslashes}</td>
						<td>{$menuList[menu].menu_name|ucfirst|stripslashes}</td>
                        {if $mcatid neq ''}
                        <td {if $mcatid neq ''} id="sort_order_{$menuList[menu].id}" {/if}>{$menuList[menu].sortorder}</td>
                        {/if}
						<td><span class="rupeePrice">{$menuList[menu].menu_price|ucfirst|stripslashes}</span></td>
						<td>{$menuList[menu].addeddate}</td>
						<td align="center">
							{if $menuList[menu].menu_popular_dish eq 'Yes'}
							<img src="{$SITE_IMAGE_URL}/star_yellow.png" alt="Popular" title="Popular" onclick="changeStatus('No','{$menuList[menu].id}','Menu','{$tablename}','menu_popular_dish','{$wherefield}')" class="curPointer" />
							{else}
							<img src="{$SITE_IMAGE_URL}/star_grey.png" alt="Normal" title="Normal" onclick="changeStatus('Yes','{$menuList[menu].id}','Menu','{$tablename}','menu_popular_dish','{$wherefield}')" class="curPointer" />
							{/if}
						</td>
						<td align="center">
							{if $menuList[menu].status eq '1'}
								<a href="javascript:void(0);" onclick="changeStatus('0','{$menuList[menu].id}','Menu','{$tablename}','{$fieldname}','{$wherefield}')"><img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
							{else}
								<a href="javascript:void(0);" onclick="changeStatus('1','{$menuList[menu].id}','Menu','{$tablename}','{$fieldname}','{$wherefield}')"><img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /></a>
							{/if}
						</td>
						<td align="center">
							<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_menuAddEdit.php?menuid={$menuList[menu].id}{else}restaurant-myaccount-menu-edit/{$menuList[menu].id}{/if}" class="btn btn-sm btn-info" >
								<i class="fa fa-pencil"></i>
							</a>
                            <a href="javascript:;" onclick="changeStatus('delete','{$menuList[menu].id}','Menu','{$tablename}','{$fieldname}','{$wherefield}');" class="btn btn-sm btn-danger" >
                            	<i class="fa fa-times"></i>
                            </a>
                        </td>
					</tr>
					{sectionelse}
					<tr class="orderInnerCont">
						<td class="text-danger" colspan="8" align="center">{$LANG.res_myaccount_no_rec_found}</td>
					</tr>
					{/section}
				</tbody>
			</table>
		</div>
		<!-- Pagination start -->
		{if $menuListCnt gt 0} {$pagination} {/if}
		<!-- Pagination end -->
</div>
	