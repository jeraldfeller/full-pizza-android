{*---------------------- Address Book Management -----------------------------*}
	{assign var = addressBook value = $objCustomer->addressBookList()}
	<div class="customerAddress" id="customerAddress" >
		<div style="padding: 0;" class="MyAccountBg clearfix">

			<img style="width: 30%;margin-left: 35%;margin-top: 2%;margin-bottom: 2%;" class="" src="theme/default/images/ManageAddressBook.png">

			<div class="reticulaInterna"></div>
			<!-- <h1 class="MyAccountBgHead">{$LANG.cus_manage_address_book|utf8_encode}</h1> -->
			<div style="padding: 15px">
				
				<div align="right" class="mandatoryField"><a class="addressbook-lnk" href="javascript:void(0);" onclick="return newAddress();"><i class="glyphicon glyphicon-plus-sign marRight"></i> {$LANG.cus_new_address|utf8_encode}</a></div>
				<div class="clr"></div>
				<div class="myAccInnerBg clearfix">
					<div class="contain" id="cus_add">
						<div class="detailsInnerNewWrap">
							<div class="ordersInnerWrap">
								<span id="Addedmsg"></span>
								<span id="updatedmsg"></span>
								<table class="manageAddBook" width="100%" cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr class="orderInnerHead">
										<td class="orderHeading" width="5%" align="center">{$LANG.cus_myacc_fav_sno|utf8_encode}</td>
										<td class="orderHeading" width="15%" align="center">{$LANG.cus_address_title|utf8_encode}</td>
										<td class="orderHeading" width="55%" align="center">{$LANG.cus_address|utf8_encode}</td>
										<td class="orderHeading" width="10%" align="center">{$LANG.customer_myacc_status|utf8_encode}</td>
										<td class="orderHeading" width="15%" align="center">{$LANG.cus_myacc_fav_action|utf8_encode}</td>
									</tr>
									{section name=cus_add loop=$addressBook}
									<tr class="orderInnerCont">
									
										<td height="27" align="center">{$smarty.section.cus_add.iteration}</td>
										
										<td height="27" align="center">{$addressBook[cus_add].customer_address_title|stripslashes}</td>
										
										<td height="27" align="center">{if $addressBook[cus_add].customer_apartment_name neq ''}{$addressBook[cus_add].customer_apartment_name|stripslashes}, {/if}{if $addressBook[cus_add].customer_landmark neq ''}{$addressBook[cus_add].customer_landmark|stripslashes}, {/if}{$addressBook[cus_add].customer_street|stripslashes},  {$addressBook[cus_add].cityname|stripslashes}, {$addressBook[cus_add].statename|stripslashes} {if $addressBook[cus_add].customer_zip neq ''}-{$addressBook[cus_add].customer_zip|stripslashes} {/if}</td>
										
										<td height="27" align="center" id="chgstatus{$addressBook[cus_add].id}">
										{if $addressBook[cus_add].status eq '1'}
										<img src="admincp/images/icon_active.png" alt="Active" title="Active" onclick="return changeStatusCus('0','{$addressBook[cus_add].id}','{$word}');" style="cursor:pointer;" />
									
										{else}
										<img src="admincp/images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatusCus('1','{$addressBook[cus_add].id}','{$word}');" style="cursor:pointer;" />
										{/if}
										</td>
										<td height="27" align="center"><a class="underline" href="javascript:void(0)" onclick="return editAddress({$addressBook[cus_add].id});">Edit</a> &nbsp;<a href="javascript:void(0)" onclick="return changeStatusCus('delete','{$addressBook[cus_add].id}','{$word}');">Delete</a></td>
									</tr>
									{sectionelse}
									<tr><td height="27" class="red" colspan="5" align="center">{$LANG.cus_myacc_no_rec_found}</td></tr>
									{/section}
								</tbody>
							</table>		
							</div>			
						</div>
					</div>
				</div>
				<div class="contain" id=""></div>
				
			</div>
			
		</div>
	</div>
{*---------------------- Address Book Management End -----------------------------*}