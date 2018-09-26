<div class="detailsInnerNewWrap">
{$objRestaurant->reviewsList()}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_reviews}</h1>
<div class="clr"></div>
<input type="hidden" name="restid" class="restid" value="{$resid}" id="resid"/>
<!-- Pagination -->
{if $reviewsListCnt gt 0} {$pagination}{/if}

	
	{if $succ_msg neq ''}<div class="ownerSucc">{$succ_msg}</div>{/if}
	
	<div class="ownerStaticContainer">
		<ul class="orderTopLine1Ul">
			<li><span class="order">{$LANG.res_myaccount_reviewtotal}:</span><span class="value">{$totres_review}</span></li>
			<li><span class="order">{$LANG.res_myaccount_reviewactive}:</span><span class="value">{$tot_review_active}</span></li>
			<li><span class="order">{$LANG.res_myaccount_reviewdeactive}:</span><span class="value">{$tot_review_deactive}</span></li>
		</ul>
		<div class="frt">
			<span class="sortbytext">{$LANG.res_myaccount_reviewsortby} : </span>
			<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Reviews');" class="selectpicker">
			<option value="">All</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.get.sortby eq 'active' or $smarty.request.sortbystatus eq 'active'}selected="selected"{/if} >{$LANG.res_myaccount_reviewactivate}</option>
					<option value="deactive" {if $smarty.get.sortby eq 'deactive' or $smarty.request.sortbystatus eq 'deactive'}selected="selected"{/if}>{$LANG.res_myaccount_reviewdeactivate}</option>
				</optgroup>
			</select>
		</div>
	</div>

	<div class="ordersInnerWrap">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr>
					<th width="5%">{$LANG.res_myaccount_reviewsno}</th>
					<th width="20%">{$LANG.res_myaccount_reviewcustname}</th>
					<th width="15%">{$LANG.res_myaccount_reviewrating}</th>
					<th width="15%">{$LANG.res_myaccount_reviewmessage}</th>
					<th width="20%">{$LANG.res_myaccount_reviewdate}</th>
					<th width="10%">{$LANG.res_myaccount_reviewstatus}</th>
					<th width="10%">{$LANG.res_myaccount_reviewaction}</th>
				</tr>
				{assign var=i value=1}
				{section name="rev" loop=$reviewsList}
				<tr class="{if $smarty.section.rev.rownum is div by 2} colorBgGray{/if}">
					<td>{$reviewsList[rev].sno}</td>
					<td>{$reviewsList[rev].customer_name|ucfirst|stripslashes}</td>
					<td>{if $reviewsList[rev].rating eq '1'} <img alt="" title="" src="{$SITE_IMAGE_URL}/single-star.png" /> 
						{elseif $reviewsList[rev].rating eq '2'} <img alt="" title="" src="{$SITE_IMAGE_URL}/double-star.png" /> 
						{elseif $reviewsList[rev].rating eq '3'} <img alt="" title="" src="{$SITE_IMAGE_URL}/triple-star.png" /> 
						{elseif $reviewsList[rev].rating eq '4'} <img alt="" title="" src="{$SITE_IMAGE_URL}/four-star.png" /> 
						{elseif $reviewsList[rev].rating eq '5'} <img alt="" title="" src="{$SITE_IMAGE_URL}/five-star.png" /> 
						{/if}</td>
					<td>{$reviewsList[rev].message|stripslashes}</td>
					<td>{$reviewsList[rev].addeddate}</td>
					<td>
					
						{if $reviewsList[rev].status eq '1'}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','{$reviewsList[rev].rating_id}','Reviews')"> <img src="{$SITE_IMAGE_URL}/icon_active.png" alt="" title="" class="editDel" /></a>
						{else}
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','{$reviewsList[rev].rating_id}','Reviews')"> <img src="{$SITE_IMAGE_URL}/delete.png" alt="" title="" /> </a>
						{/if}		
					
					</td>
					<td>
						<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','{$reviewsList[rev].rating_id}','Reviews');" class="btn btn-sm btn-danger">
							<i class="fa fa-times"></i>
						</a>
					</td>
					
				</tr>
				{sectionelse}
				<tr class="">
					<td class="text-dang"e colspan="7" align="center">{$LANG.res_myaccount_no_rec_found}</td>
				</tr>
				{/section}
			</tbody>
		</table>
	</div>
	<!-- Pagination -->
	{if $reviewsListCnt gt 0} {$pagination} {/if}
</div>
