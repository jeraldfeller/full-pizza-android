<!--Date Picker Files-->

{literal}
<script type="text/javascript">
	$(document).ready(function() 
	{
   		
   		$('.offer_valid_from').Zebra_DatePicker({
        	//direction: 1
			direction:true,
			pair: $('#offer_valid_from') 	
   		});
   		 
   		$('.offer_valid_to').Zebra_DatePicker({
        	//direction: 1
			direction:true,
			pair: $('#offer_valid_to')                
   		});
   		
   	});
</script>
{/literal}

<div class="detailsInnerNewWrap">
{$objRestaurant->offersList()}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_offer}</h1>
<a href="javascript:void(0);" class="restOwnMyAddBtn" onclick="clickAddnewOffers();">{$LANG.res_myaccount_offeraddnew}</a>
<div class="clr"></div>
<input type="hidden" name="restid" class="restid" value="{$resid}" id="resid"/>
<!-- Pagination -->

{if $offersListCnt gt 0} {$pagination}{/if}


	{if $succ_msg neq ''}<div class="succmsg1">{$succ_msg}</div>{/if}
	
	<div class="ownerStaticContainer">
		<ul class="orderTopLine1Ul">
			<li><span class="order">{$LANG.res_myaccount_offertotal}:</span><span class="value">{$totres_offer}</span></li>
			<li><span class="order">{$LANG.res_myaccount_offeractive}:</span><span class="value">{$tot_offer_active}</span></li>
			<li><span class="order">{$LANG.res_myaccount_offerdeactive}:</span><span class="value">{$tot_offer_deactive}</span></li>
		</ul>
		<div class="frt">
			<span class="sortbytext">{$LANG.res_myaccount_offersortby} :</span>
			<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Offer');" class="selectpicker">
				<option value="">All</option>
				<optgroup label="{$LANG.res_myaccount_offerstatus}">
					<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_offeractivate}</option>
					<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_offerdeactivate}</option>
				</optgroup>
			</select>
		</div>
	</div>

	<div class="ordersInnerWrap">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="orderInnerHead">
					<td class="orderHeading" width="5%" align="center">{$LANG.res_myaccount_offersno}</td>
					<td class="orderHeading" width="20%">{$LANG.res_myaccount_offerpercent}</td>
					<td class="orderHeading" width="20%">{$LANG.res_myaccount_offerprice}</td>
					<td class="orderHeading" width="15%">{$LANG.res_myaccount_offerfrom}</td>
					<td class="orderHeading" width="10%">{$LANG.res_myaccount_offerto}</td>
					<td class="orderHeading" width="10%">{$LANG.res_myaccount_offerdate}</td>
					<td class="orderHeading" width="10%">{$LANG.res_myaccount_status}</td>
					<td class="orderHeading" width="10%" align="center">{$LANG.res_myaccount_offermange}</td>
				</tr>
				{section name="off" loop=$offersList}
				<tr class="orderInnerCont {if $smarty.section.off.rownum is div by 2} colorBgGray{/if}">
					<td align="center">{$offersList[off].sno}</td>
					<td>{$offersList[off].offer_percentage}</td>
					<td><span class="rupeePrice3">{$offersList[off].offer_price|ucfirst|stripslashes}</span></td>
					<td>{$offersList[off].offer_valid_from|date_format:"%d-%m-%Y"|stripslashes}</td>
					<td>{$offersList[off].offer_valid_to|date_format:"%d-%m-%Y"|stripslashes}</td>
					<td>{$offersList[off].addeddate|date_format:"%d-%m-%Y"}</td>
					<td>
					
						{if $offersList[off].status eq '1'}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','{$offersList[off].offer_id}','Offer')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
						{else}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','{$offersList[off].offer_id}','Offer')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
						{/if}		
					
					</td>
					<td align="center">
						<a href="javascript:void(0);" onclick="offerEdit('{$offersList[off].offer_id}');"><img src="{$SITE_IMAGE_URL}/edit.jpg" alt="" title="" class="editDel" /></a>
						<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','{$offersList[off].offer_id}','Offer');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a>
					</td>
					
				</tr>
				{sectionelse}
				<tr class="orderInnerCont">
					<td align="center" style="color:red;" colspan="8">{$LANG.res_myaccount_offernorecord}</td>
				</tr>
				{/section}
			</tbody>
		</table>
	</div>
</div>

<!-- Pagination -->
{if $offersListCnt gt 0} {$pagination} {/if}