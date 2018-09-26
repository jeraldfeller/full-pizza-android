
<div class="detailsInnerNewWrap">
{*$objRestaurant->offersList()*}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_offer}</h1>
<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_offers_AddEdit.php{else}restaurant-myaccount-offers-add{/if}" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i>{$LANG.res_myaccount_offeraddnew}</a>
<hr class="heading-hr">
<div class="clr"></div>
<input type="hidden" name="restid" class="restid" value="{$resid}" id="resid"/>

<!-- Pagination -->

{if $offersListCnt gt 0} {$pagination}{/if}


	<div class="succmsg1">{$succ_msg}</div>
	
	<div class="ownerStaticContainer">
		<ul class="orderTopLine1Ul">
			<li><span class="order">{$LANG.res_myaccount_offertotal}:</span><span class="value">{$totres_offer}</span></li>
			<li><span class="order">{$LANG.res_myaccount_offeractive}:</span><span class="value">{$tot_offer_active}</span></li>
			<li><span class="order">{$LANG.res_myaccount_offerdeactive}:</span><span class="value">{$tot_offer_deactive}</span></li>
		</ul>
		<div class="frt">
        <form name="myaccount_Offer" method="post" action="restaurantOwnerMyaccount_offers.php" >
			<span class="sortbytext">{$LANG.res_myaccount_offersortby} :</span>
			<select name="sortbystatus" id="sortby" onchange="document.myaccount_Offer.submit();" class="selectpicker">
				<option value="">All</option>
				<optgroup label="{$LANG.res_myaccount_offerstatus}">
					<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_offeractivate}</option>
					<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_offerdeactivate}</option>
				</optgroup>
			</select>
        </form>
		</div>
	</div>

	<div class="ordersInnerWrap">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr class="">
					<th width="5%" align="center">{$LANG.res_myaccount_offersno}</th>
					<th width="15%">{$LANG.res_myaccount_offerpercent}</th>
					<th width="15%">{$LANG.res_myaccount_offerprice}</th>
					<th width="15%">{$LANG.res_myaccount_offerfrom}</th>
					<th width="10%">{$LANG.res_myaccount_offerto}</th>
					<th width="15%">{$LANG.res_myaccount_offerdate}</th>
					<th width="10%">{$LANG.res_myaccount_status}</th>
					<th width="10%" align="center">{$LANG.res_myaccount_offermange}</th>
				</tr>
				{section name="off" loop=$offersList}
				<tr>
					<td align="center">{$offersList[off].sno}</td>
					<td>{$offersList[off].offer_percentage}</td>
					<td><span class="rupeePrice3">{$offersList[off].offer_price|ucfirst|stripslashes}</span></td>
					<td>{$offersList[off].offer_valid_from}</td>
					<td>{$offersList[off].offer_valid_to}</td>
					<td>{$offersList[off].addeddate}</td>
					<td>
				
						{if $offersList[off].status eq '1'}
							<a href="javascript:void(0);" onclick="changeStatus('0','{$offersList[off].offer_id}','Offer','{$tablename}','{$fieldname}','{$wherefield}');"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
						{else}
                        {if $offersList[off].offer_valid_to|date_format:"%Y-%m-%d" gte $today}
							<a href="javascript:void(0);" onclick="changeStatus('1','{$offersList[off].offer_id}','Offer','{$tablename}','{$fieldname}','{$wherefield}');"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
                            {else}
                          	<a href="javascript:void(0);" onclick="return offerEnd();"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>  
                            {/if}
						{/if}		
					
					</td>
					<td align="center">
						<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_offers_AddEdit.php?offer_id={$offersList[off].offer_id}{else}restaurant-myaccount-offers-edit/{$offersList[off].offer_id}{/if}" class="btn btn-sm btn-info" >
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:void(0);" onclick="changeStatus('delete','{$offersList[off].offer_id}','Offer','{$tablename}','{$fieldname}','{$wherefield}');" class="btn btn-sm btn-danger">
							<i class="fa fa-times"></i>
						</a>
					</td>
					
				</tr>
				{sectionelse}
				<tr class="orderInnerCont">
					<td align="center"  class="text-danger" colspan="8">{$LANG.res_myaccount_offernorecord}</td>
				</tr>
				{/section}
			</tbody>
		</table>
	</div>
</div>

<!-- Pagination -->
{if $offersListCnt gt 0} {$pagination} {/if}