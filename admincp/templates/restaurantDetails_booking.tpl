<div class="riteCont1Inner">
	<div class="riteCont1Inner">
		<div class="manageButtonLastCont">
			{if $smarty.get.resid}<a class="btn btn-default" href="restaurantManage.php{if $smarty.get.resid}?searchrestaurantid={$smarty.get.resid}{/if}">Back</a>{/if}
		</div>
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered">
				<tr class="">
					{*<td align="center" width="2%" class="" align="center"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>*}
					<th align="center" width="2%" class="" align="center">S.No</th>
					<th align="center" width="8%" class="" align="center">Guests</th>
					<th align="center" width="7%" class="">Booking Date</th>
					<th align="center" width="12%" class="">Booking Time</th>
					<th align="center" width="7%" align="center" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Name{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					<th align="center" width="18%" class="">Email</th>
					<th align="center" width="10%" class="">MobileNo</th>
					{if !$smarty.get.resid}
					<th align="center" width="12%" align="left" class="">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</th>
					{/if}
					
					<th align="center" width="10%" align="center" class="">Booked At</th>
					<th width="5%" align="center" class="">Status</th>
					<th align="center" width="10%" align="center" class="">Action</th>
				</tr>
				
				{section name=list loop=$order_list}				
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$order_list[list].id}">
					{*<td  align="center" class="listCont"><input type="checkbox" class="case" value="{$order_list[list].id}" onclick="individualSelect();" /></td>*}
					<td align="center" class="listCont">{$order_list[list].sno}</td>
					<td align="center" class="listCont">{$order_list[list].num_guests}</td>
					<td align="center" class="listCont">{$order_list[list].booking_date}</td>
					
					<td align="center" class="listCont">{$order_list[list].booking_time}</td>
					<td align="center" class="listCont">{$order_list[list].booking_name|stripslashes}</td>
					<td align="center" class="listCont">{$order_list[list].booking_email|stripslashes}</td>
					<td align="center" class="listCont">{$order_list[list].booking_mobileno}</td>
					{if !$smarty.get.resid}
					<td align="center" class="listCont">{$order_list[list].restaurant_name|stripslashes}</td>
					{/if}
					<td align="center" class="listCont">{$order_list[list].addeddate|date_format}</td>
					
					<td align="center" class="listCont">
					{if $order_list[list].status eq '1'}
					<img src="images/icon_active.png" alt="Active" title="Active"  style="cursor:not-allowed;" />
					
					{else}
					<img src="images/delete.png" alt="Deactive" title="Deactive" style="cursor:not-allowed;" />
					{/if}
					</td>
					
					<td align="center" class="listCont">
						<a href="viewBookingDetails.php?bkid={$order_list[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}" class="btn btn-icon btn-light"><i class="fa fa-search-plus"></i>
						</a>
						
						{*<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].id}');" style="cursor:pointer;" />
						</span>*}
					</td>
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="text-danger">No record(s) found</td></tr>
				{/section}
					
			</table>
		</div>
		<!--List End-->
		<div class="manageButtonLastCont">
			{if $limit lt $totalRecords}
			<a class="manageButton_addnw" href="restaurantBookingManage.php{if $smarty.get.resid}?searchrestaurantid={$smarty.get.resid}{/if}">View More</a>
			{/if}
		</div>
	</div>
</div>