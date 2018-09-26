<div class="detailsInnerNewWrap">	
{$objRestaurant->paymentMethodList()}
<h1 class="restOwnMyHead">{$LANG.res_myaccount_payment_method}</h1>
<hr class="heading-hr">
<div class="clr"></div>	
	{if $succ_msg neq ''}<div class="ownerSucc" >{$succ_msg}</div>{/if}
	<div class="ordersInnerWrap">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr >
					<th  width="10%">{$LANG.res_myaccount_sno}</th>
					<th  width="30%">{$LANG.res_myaccount_payment_name}</th>
					<th  width="30%">{$LANG.res_myaccount_payment_photo}</th>
					<th  width="25%">{$LANG.res_myaccount_payment_status}</th>
				</tr>
				{assign var=i value=1}
				{section name=pay loop=$searchrestaurantDetailsPaymethod}
                {*if $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '1'*}
				<tr class="orderInnerCont {if $smarty.section.pay.rownum is div by 2} colorBgGray{/if}">
					<td>{$i++}</td>
					<td>{$searchrestaurantDetailsPaymethod[pay].paymentinfo_name|ucfirst|stripslashes}</td>
					<td>
						{if $searchrestaurantDetailsPaymethod[pay].paymentinfo_photo neq ''}
							<div class="largeImgTooltip">
								<img src="{$SITE_IMAGE_PAYMENTINFO_URL}/{$searchrestaurantDetailsPaymethod[pay].paymentinfo_photo|stripslashes}" width="40" height="20" alt="{$searchrestaurantDetailsPaymethod[pay].paymentinfo_name|stripslashes}" title="{$searchrestaurantDetailsPaymethod[pay].paymentinfo_name|stripslashes}" class="imgborder" />
							</div>
						{else}
							No Photo
						{/if}
					</td>
					<td>
						{if $searchrestaurantDetailsPaymethod[pay].paymentmethod eq 'Yes'}
						<img src="{$SITE_IMAGE_URL}/star_yellow.png" alt="Payment Active" title="Payment Active" onclick="return selectPaymentMethod('No','{$searchrestaurantDetailsPaymethod[pay].paymentinfo_id}','Paymentmethod');" style="cursor:pointer;" />
						{else}
						<img src="{$SITE_IMAGE_URL}/star_grey.png" alt="Payment Inactive" title="Payment Inactive" onclick="return selectPaymentMethod('Yes','{$searchrestaurantDetailsPaymethod[pay].paymentinfo_id}','Paymentmethod');" style="cursor:pointer;" />
						{/if}
					</td>
				</tr>
                {*/if*}
				{sectionelse}
				<td class="text-danger" colspan="6" align="center">{$LANG.res_myaccount_no_rec_found}</td>
				{/section}
			</tbody>
		</table>
	</div>
</div>