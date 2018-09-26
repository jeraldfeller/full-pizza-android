<div class="container">
	<form name="checkoutform" method="post" action="orderPayment.php" class="form-horizontal" >
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="orderid" id="orderid" value="" />
		<input type="hidden" name="deliverypickup" id="deliverypickup" value="{$smarty.session.delivery_pickup}"/>
		<input type="hidden" name="subtotal" id="subtotal" value="{$subtotal}"/>
		<input type="hidden" name="offeramount" id="offeramount" value="{$offervalue}" />
		<input type="hidden" name="taxamount" id="taxamount" value="{$taxamount}" />
		<input type="hidden" name="deliveryamount" id="deliveryamount" value="{$deliverycharge}" />
		{if $smarty.request.resid neq ''}
		<input type="hidden" name="restid" id="restid" value="{$smarty.request.resid}"/>
		{*<input type="hidden" name="offer" id="offer" value="{$smarty.request.offer}"/>*}
		{else}
		<input type="hidden" name="restid" id="restid" value="{$smarty.session.RESTID}"/>
		{*<input type="hidden" name="offer" id="offer" value="{$smarty.session.OFFER}"/>*}
		{/if} 
		<input type="hidden" name="cusid" id="cusid" value="{$smarty.session.customerid}"/>
		<input type="hidden" name="paypal_type" class="paypal_type" id="paypal_type" value="cashon" />
		<input type="hidden" name="request_payment" id="request_payment" value="{$smarty.request.paymentinfo}"/>
		<input type="hidden" name="striperesponse" id="striperesponse" value="{$smarty.request.responsemessage}" />
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="background: white;padding-left: 0;padding-right: 0;margin-top: 5%;">
			<p style="font-size: x-large !important;" class="AgentOrange">Formulario de Pago</p>

			<div class="reticulaInterna"></div>
			<div class="customerLeftBox clearfix">
				<div class="checkBg no_margin">
					
					
						<!-- {if $smarty.session.delivery_pickup eq 'pickup'}
							{$LANG.checkout_pickup}
						{else}
							{$LANG.checkout_delivery}
						{/if} -->
						{if $smarty.session.delivery_pickup eq 'pickup'}
							<h1 class="customSignupHead">
								Recoger en: <br>
								<p style="font: 14px source_sans_proregular;">{$smarty.session.addressPickup} </p>
							</h1>
						{else}
							<h1 class="customSignupHead">Entrega:</h1>


							<span id="submiterror"></span>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-5">
									<div class="mandatoryField">
										<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span> - {$LANG.checkout_mandatory}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="contactname" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{$LANG.checkout_name}</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" name="contactname" id="contactname" value="{$customerDetails[0].customer_name|stripslashes}" />
									<span id="contactnameerrormsg"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="contactlastname" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{$LANG.checkout_lastname}</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" name="contactlastname" id="contactlastname" value="{$customerDetails[0].customer_lastname|stripslashes}" />
									<span id="contactlastnameerrormsg"></span>
								</div>
							</div>
							{if $smarty.session.customerid neq '' and $customerAddress.0.id neq ''}
								<div class="form-group">
									<input type="hidden" id="cus_type" value="Customer" />
									<label for="deliveryaddresstitle" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}Address Title</label>
									<div class="col-sm-5">
										 <select name="deliveryaddresstitle" id="deliveryaddresstitle" class="form-control" onchange="getAddressByTitle('{$smarty.session.delivery_pickup}');"> 
											<option value= "">select address title</option>
												{section name="title" loop=$customerAddress}
													<option value="{$customerAddress[title].id}" {if $smarty.section.title.index eq '0'}selected="selected"{/if}>{$customerAddress[title].customer_address_title}</option>
												{/section}
											<option value="Other">Other Address</option>
										</select>
										<span id="addresstitleerrormsg"></span>
									</div>
								</div>
								<div class="form-group">
									<div id="OtherAddress" style="display:none">
										<label for="otheraddresstitle" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}Other Address Title</label>
										<div class="col-sm-5">
											<input class="form-control" type="text" name="otheraddresstitle" id="otheraddresstitle" value="" />
											<span id="otheradderrormsg"></span>
										</div>
									</div>
								</div>
							{else}
								<div class="form-group">
									<label for="otheraddresstitle" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}Address Title</label>
									<input type="hidden" id="cus_type" value="Guest" />
									<script type="text/javascript">document.getElementById("contactname").focus();</script>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="otheraddresstitle" id="otheraddresstitle" value="" />
										<span id="otheradderrormsg"></span>
									</div>
								</div>
							{/if}
							
							<div id="addressbook">
								<div class="form-group">
									<label for="deliverystreet" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}{$LANG.checkout_locality}</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="deliverystreet" id="deliverystreet" value="{$customerAddress[0].customer_street|stripslashes}" />
										<span id="deliverystreeterrormsg"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="deliveryaddress" class="col-sm-4 control-label font-normal">{$LANG.checkout_doorno}</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="deliveryaddress" id="deliveryaddress" value="{$customerAddress[0].customer_apartment_name|stripslashes}" />
										<span id="deliveryaddresserrormsg"></span>
									</div>
								</div>
								
								{*----------------------------state,city,zipcode start-----------------*}		
				
								 <div class="form-group">
									<label for="deliverystate" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}{$LANG.checkout_state}</label>
									<div class="col-sm-5">
										<select name="deliverystate" id="deliverystate" class="form-control" onchange="getCityListCuscheck(this.value);"> 
										<option value= "">{$LANG.checkout_selectstate}</option>
											{section name="state" loop=$showStatelist}
													<option value="{$showStatelist[state].statecode}" {if $showStatelist[state].statecode eq $customerAddress.0.customer_state}selected="selected"{/if}>{$showStatelist[state].statename|stripslashes}</option>
											{/section}
										</select>
										<span id="deliverystateerrormsg"></span>
									</div>
								</div>
								
								 <div class="form-group">
									<label for="deliverycity" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}{$LANG.checkout_city}</label>
									<div class="col-sm-5">
										<div id="showCusCityListcheck">
										<select name ="deliverycity" class= "form-control" id="deliverycity">
											<option value="">{$LANG.checkout_firstselectstate}</option>
											{section name=city loop=$selectCityList}
												<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customerAddress.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
											{/section}
										</select>	
										</div>			
										<span id="deliverycityerrormsg"></span>
									</div>
								</div>
									
								 <div class="form-group">
									<label for="deliveryzip" class="col-sm-4 control-label font-normal">{if $smarty.session.delivery_pickup neq 'pickup'}<span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{/if}{$LANG.checkout_zip}</label>
									<div class="col-sm-5">
										<div id="showCusZipListcheck">
										<input type="text" class="form-control" name="deliveryzip" id="deliveryzip" value="{$customerAddress.0.customer_zip|stripcslashes}">
										
										</div>							
										<span id="deliveryziperrormsg"></span>
									</div>
								</div>	
								{*------------------------------state,city,zipcode end--------------------*}		
							</div>
							<div id="addressTypeContainer">
								<div class="form-group">
									<label for="apartmentaddress" id="apartmentaddresslabel" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>Apartamento Numero/ Apartment Number</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="apartmentaddress" id="apartmentaddress" value="{$smarty.session.apartment}" />
										<span id="deliveryaddresserrormsg"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="companyaddress" id="companyaddresslabel" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>Compañia / Company</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="companyaddress" id="companyaddress" value="{$smarty.session.company}" />
										<span id="deliveryaddresserrormsg"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="universityaddress" id="universityaddresslabel" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>Universidad / University</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="universityaddress" id="universityaddress" value="{$smarty.session.university}" />
										<span id="deliveryaddresserrormsg"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="facultyaddress" id="facultyaddresslabel" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>Facultad / Faculty</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="facultyaddress" id="facultyaddress" value="{$smarty.session.faculty}" />
										<span id="deliveryaddresserrormsg"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="flooraddress" id="flooraddresslabel" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>Piso / Floor</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="flooraddress" id="flooraddress" value="{$smarty.session.floor}" />
										<span id="deliveryaddresserrormsg"></span>
									</div>
								</div>
							</div>			
							<div class="form-group">
								<label for="contactphone" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{$LANG.checkout_cellphone}</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" name="contactphone" id="contactphone" value="{$customerDetails[0].customer_phone|stripslashes}" />
									<span id="contactphoneerrormsg"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="contactemail" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{$LANG.checkout_email}</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" name="contactemail" id="contactemail" value="{$customerDetails[0].customer_email|stripslashes}" />
									<span id="contactemailerrormsg"></span>
									<span id="errAlreadyemail"></span>
								</div>
							</div>


						{/if}
					
					
				</div>
				{if $smarty.session.customerid eq ''}
					<div class="checkBg">
						<h1 class="customSignupHead">{$LANG.checkout_createacc}</h1>
						<div class="form-group">
							<label for="contactpassword" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.checkout_mandatory_symbol|utf8_encode}</span>{$LANG.checkout_password}</label>
							<div class="col-sm-5">
								<input class="form-control" type="password" name="contactpassword" id="contactpassword" value="{$customerDetails[0].customer_password|stripslashes}" autocomplete="off"/>
								<span id="contactpasserrormsg"></span>
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<div class="col-sm-offset-4 col-sm-6">
								<!--<label class="checkbox-inline" for="customer_terms">
									<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
								</label>
								<b class="redStar autowidth">{$LANG.checkout_mandatory_symbol|utf8_encode}</b>{$LANG.checkout_accept_agree|utf8_encode} <a class="color4" data-toggle="modal" href="#termsCondition">{$LANG.checkout_terms_conditions|utf8_encode}</a>-->
								<label for="customer_terms" class="checkoutTerms">
									<span class="checkbox-inline">
										<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
									</span>
									<b class="redStar autowidth">{$LANG.checkout_mandatory_symbol|utf8_encode}</b>{$LANG.checkout_accept_agree|utf8_encode} <a class="color4" data-toggle="modal" href="#termsCondition">{$LANG.checkout_terms_conditions|utf8_encode}</a>
								</label>
								<span id="custermerror" class="errClass1"></span>
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<div class="col-sm-offset-4 col-sm-5">
								<label class="checkbox-inline" for="customer_news">
									<input type="checkbox" class="" name="customer_news" id="customer_news" value="Yes" checked="checked"/>
									{$LANG.checkout_monthly_newsletter|utf8_encode}
								</label>
								<span id="cusnewserror" class="errClass1"></span>
							</div>
						</div>
					</div>
				{/if}
				
				{if $smarty.request.resid neq '' and $searchrestaurantDetailsPaymethod_cnt gt 0}
					<div class="checkBg">
						<h1 class="customSignupHead">{$LANG.checkout_paymentinfo}</h1>
						<div class="row">
							{section name="pay" loop=$searchrestaurantDetailsPaymethod}
								<div class="col-md-4 col-lg-4 col-sm-4">
									<span class="checkRadio">
										{if $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '1'}
											<input type="radio" name="paymentinfo" value="cod" id="paymentinfo_cashon" checked="checked" onclick="tipcalculation('',{if $smarty.session.delivery_pickup neq 'pickup'} {$total}{elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if});"/>
										{elseif $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '2'}
											<input type="radio" name="paymentinfo" id="paymentinfo_paypal" value="paypal" />
										{elseif $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '3'}
											<input type="radio" name="paymentinfo" id="paymentinfo_credit" value="creditcard" {if $smarty.request.paymentinfo eq 'creditcard'} checked="checkeif"{/if}/>
										{elseif $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '4'}
											<input type="radio" name="paymentinfo" id="paymentInfoPro" value="paypalpro" />
										{elseif $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '5'}
											<input type="radio" name="paymentinfo" value="authorizenet" id="paymentinfo_authorize"/>
										{elseif $searchrestaurantDetailsPaymethod[pay].paymentinfo_id eq '6'}
											<input type="radio" name="paymentinfo" value="ideal" id="paymentinfo_ideal"/>
										{/if}
									</span>									
									<span class="checkradioName">{$searchrestaurantDetailsPaymethod[pay].paymentinfo_name|stripslashes}</span>
									<span class="checkPayImg">
										<img src="{$searchrestaurantDetailsPaymethod[pay].paymentinfo_photo}" alt="{$searchrestaurantDetailsPaymethod[pay].paymentinfo_name|stripslashes}" title="{$searchrestaurantDetailsPaymethod[pay].paymentinfo_name|stripslashes}" />
									</span>
								</div>
							{/section}
						</div>
					</div>
				{/if}
				{*-----------------------------------------------------------------------------------------*}
				<!-- PayPal Pro DoDireact Method Start -->
				<div id="paymentinfo_credit_paypalpro" style="display:none;">
					<div class="checkBg">              
							<span id="cardDetailserrormsg"></span>
							<ul class="customsignupUl">
								<li>
									<span class="name">Select Card Type:</span>
								</li>
								<li class="relative">
									<select name="cardtype" id="cardtype" class="selectboxindex">
										<option value="Select Card">Select Card</option>
										<option value="visa">VISA</option>
										<option value="master">MASTER CARD</option>
										<option value="maestro">MAESTRO CARD</option>
										<option value="switch">SWITCH</option>
									</select>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name">{$LANG.checkout_paypal_first_name|utf8_encode}</span>
									<input class="txt" type="text" name="cardholderfirstname" id="cardholderfirstname" value="" autocomplete="off"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name">{$LANG.checkout_paypal_last_name|utf8_encode}</span>
									<input class="txt" type="text" name="cardholderlastname" id="cardholderlastname" value="" autocomplete="off"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name">{$LANG.checkout_paypal_credit_card_no|utf8_encode}</span>
									<input class="txt numericfield" type="text" name="cardnumber" id="cardnumber" value="" autocomplete="off"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name">{$LANG.checkout_paypal_expiration_date|utf8_encode}</span>
									<span class="relativeClass">
										<select class="selectboxindexChecknew" name="expmonth" id="expmonth">
											<option value="Month">Month</option>
											{$EXP_MONTH_LIST}
										</select>
									</span>
									<span  class="dateSplit">/</span>
									<span class="relativeClass">
										<select class="selectboxindexChecknew" name="expyear" id="expyear">
											<option value="Year">Year</option>
											{$EXP_YEAR_LIST}
										</select>
									</span>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name">{$LANG.checkout_paypal_cvc_code|utf8_encode}</span>
									<input name="cvccode" id="cvccode" class="txt numericfield" type="text" value="" autocomplete="off"/>
								</li>
							</ul>
							<!--<div class="paymentCheckbox"><input class="checkbox" type="checkbox" /> Save my Credit Card (optional)</div>-->
						</div>
				</div>
				<!-- PayPal Pro ( Do Direact method ) End -->
				{*--------------------------------------------------------------------------------------------------*}
				<!-- Stripe Credit Card Start-->
				<div id="paymentinfo_credit_contact" {if $smarty.request.paymentinfo eq 'creditcard'} style="display:block;"{else}style="display:none;"{/if}>
				
					<div class="checkBg">
							<div class="checkBtmLine">
								<h1 class="customSignupHead ">{$LANG.checkout_usecredit}</h1>
								<div class="form-group">
									<div class=" col-sm-offset-4 col-sm-5">
										<span class="useAddressCheck">
											<img src="{$SITE_IMAGE_URL}/big-cards.jpg" alt="" title="" />
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class=" col-sm-offset-4 col-sm-5">
										<span id="stripecardDetailserrormsg"></span>
										<span id="paymentError" class="errClass1">{$smarty.request.responsemessage}</span> 
									</div>
								</div>		
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar"></span>{$LANG.checkout_cardholder}</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" value="{*$smarty.request.stripe_cardnumber*}" name="stripe_cardname" id="stripe_cardname"/>	
															
										<span class="phoneNo">{$LANG.checkout_creditdebit}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.checkout_cardno}</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" value="{$smarty.request.stripe_cardnumber}" name="stripe_cardnumber" id="stripe_cardnumber"/>
										{if $smarty.request.responsemessage eq 'Your card number is incorrect.'}
										<script type="text/javascript">document.checkoutform.stripe_cardnumber.focus();</script>	
										{/if}
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.checkout_securitycode}</label>
									<div class="col-sm-5">
										<input class="form-control" type="password" value="{$smarty.request.stripe_cvccode}" name="stripe_cvccode" id="stripe_cvccode" autocomplete="off"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.checkout_expdate}</label>
									<div class="col-sm-2">
										<select class="form-control" name="stripe_expmonth" id="stripe_expmonth">
											<option value="Month">{$LANG.checkout_month}</option>
											{$EXP_MONTH_LIST}
										</select>
										{*<input type="text" name="stripe_expmonth" value="" size="2" class="card-expiry-month"/>*}
									</div>
										
										<span class="flt"> / </span>
									
									<div class="col-sm-2">
									   {*<input type="text" name="stripe_expyear" id="stripe_expyear" value="" size="4" class="card-expiry-year"/>*}
										<select class="form-control" name="stripe_expyear" id="stripe_expyear">
											<option value="Year">{$LANG.checkout_year}</option>
											{$EXP_YEAR_LIST}
										</select>
									</div>
								</div>
							</div>
						</div>
				</div>
				<!-- Stripe credit card end -->
				{*---------------------------------------------------------------------------------------------*}
				<!-- Authorize.net Credit card start-->
				<div class="checkBg" id="payment_authorizeNetnfo" style="display:none;">
							<span id="aut_cardDetailserrormsg"></span>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span>{$LANG.checkout_select_card_type|utf8_encode}</span>
								</li>
								<li>
									<select name="aut_cardtype" id="aut_cardtype" class="selectboxindex">
										<option value="">{$LANG.checkout_select_card|utf8_encode}</option>
										<option value="visa">{$LANG.checkout_visa|utf8_encode}</option>
										<option value="master">{$LANG.checkout_master_card|utf8_encode}</option>
										<option value="amex">{$LANG.checkout_american_express|utf8_encode}</option>
										<option value="discover">{$LANG.checkout_discover|utf8_encode}</option>
									</select>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span>{$LANG.checkout_name_on_card|utf8_encode}:</span>
									<input class="txt" type="text" name="cardholdername" id="cardholdername" value="{$customerDetails.0.customer_card_holder_name|stripslashes}"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span>{$LANG.checkout_paypal_credit_card_no|utf8_encode}</span>
									<input class="txt" type="text" name="cardnumber" id="aut_cardnumber" value="{$customerDetails.0.card_number}"/>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span>{$LANG.checkout_paypal_expiration_date|utf8_encode}</span>
									<select class="selectboxindexChecknew" name="expmonth" id="aut_expmonth">
										<option value="">Month</option>
										{$EXP_MONTH_LIST}
									</select>
									<span class="dateSplit">/</span>
									<select class="selectboxindexChecknew" name="expyear" id="aut_expyear">
										<option value="">Year</option>
										{$EXP_YEAR_LIST}
									</select>
								</li>
							</ul>
							<ul class="customsignupUl">
								<li>
									<span class="name"><span class="redStar">*</span>{$LANG.checkout_paypal_cvc_code|utf8_encode}</span>
									<input name="cvccode" id="aut_cvccode" class="txtCode" type="text" value="{$customerDetails.0.security_code}"/>
								</li>
							</ul>
					   </div>
				{*------------------------------------------------------------------------------------------------*}
				<!-- Ideal Payment -->
				<div class="checkBg" id="payment_idealinfo" style="display:none;">
					 <span class="TipHead customSignupHead">Ideal Bank List</span>
					 <select name="bank" id="bank">{$banklist}</select>
				</div>       
				{*------------------------------------------------------------------------------------------------*}
				<!-- Tip Options Start -->
				<div class="tipOptionContent" {if $smarty.request.paymentinfo eq 'creditcard'} style="display:block;"{else}style="display:none;"{/if}>
					<div class="checkBg">
						<div class="" id="tip_creditoption">
							<div class="TipHead customSignupHead">{$LANG.checkout_tip_options|utf8_encode}</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">&nbsp;</label>
								<div class="col-sm-5">
									<input type="hidden" name="tipsubtot" id="tipsubtot" value="{if $smarty.session.delivery_pickup neq 'pickup'} {$total}{elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if}"/>
									<input type="radio" name="creditCal" id="tip_credit" onclick="tipcalculation('',{if $smarty.session.delivery_pickup neq 'pickup'} {$total}{elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if});" value="0"/> {$LANG.checkout_remove_tip|utf8_encode}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label font-normal">&nbsp;</label>
								<div class="col-sm-5">
									<div id="tip_creditoption_price" class="tioPaypal">
										<div class="tipPaypalSubDiv tipPaypalSubDivCnt checkRadioInner">
											<span class="tipPaypalSubDivCntLink flt"><input type="radio" class="checkRadio" name="creditCal" id="creditper10" onclick="tipcalculation('10',{if $smarty.session.delivery_pickup neq 'pickup'} {$total}{elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if});" class="checkRadio" value="10"/><span class="tipPaypalSubDivPercnt tipinName"> 10%</span></span>
											<span class="tipPaypalSubDivCntLink flt"><input type="radio" class="checkRadio" name="creditCal" id="creditper10" onclick="tipcalculation('15',{if $smarty.session.delivery_pickup neq 'pickup'} {$total}{elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if});" class="checkRadio" value="15" /><span class="tipPaypalSubDivPercnt tipinName">  15%</span></span> 
											<span class="tipPaypalSubDivCntLink flt"><input type="radio" class="checkRadio" name="creditCal" id="creditper10" onclick="tipcalculation('20',{if $smarty.session.delivery_pickup neq 'pickup'} {$total}{elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if});" class="checkRadio" value="20" /><span class="tipPaypalSubDivPercnt tipinName">  20%</span></span>
										</div>
										<div class="tipPaypalSubDiv tipPaypalSubDivCnt checkRadioInner">
											<span class="tipPaypalSubDivCntLink dollerSym flt">$</span>
											<input type="text" name="credittipprice" readonly="readonly"class="txt txtboxSmall pervalue checkpervalue" id="txt1" value="0" onkeyup="calculateSum({if $smarty.session.delivery_pickup neq 'pickup'} {$total} {elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total} {else} {$total-$deliverycharge}{/if});" autocomplete="off" />
										</div>
										<div class="updateTotal">
											<span class="updatelable">{$LANG.checkout_updated_total|utf8_encode}</span>
											<span class="updatecurrency">{$currency}</span>
											<span class="updatevalue">{if $smarty.session.delivery_pickup neq 'pickup'} {$total|string_format:"%.2f"} {elseif $smarty.session.delivery_pickup eq 'pickup' and $deliveryoption eq 'No'} {$total|string_format:"%.2f"} {else} {$withoutdel_total|string_format:"%.2f"} {/if}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Tip Options End -->
			</div>
		</div>		
   
		<div class="detailsRight1 checkoutcartBox col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align:center;background: white;padding-left: 0;padding-right: 0;margin-left: 1%;width: 30%;margin-top: 5%;">
			<p style="font-size: x-large !important;" class="AgentOrange">Orden</p>
			<div class="reticulaInterna"></div>	
			<div class="customerRightBox checkoutRightTop clearfix" id="checkoutcart">
				{if $cartDetailsCnt gt 0 and $subtotal neq ''}
					<a href="{$SITE_BASEURL}/{if $smarty.request.resid neq ''}restaurantDetails.php?resid={$smarty.request.resid}&resname={$restaurantseourl}&ordoption={$smarty.session.delivery_pickup}{else}index.php{/if}" class="checkout_replan">{*$LANG.checkout_replanbut*}Edit Order</a>
				{else}
					<a href="{$SITE_BASEURL}/index.php" class="checkout_replan">{*$LANG.checkout_replanbut*} Edit Order</a>
				{/if}
				<div class="cartRightHeadInfo clearfix">
					<h1>{$restaurantname|stripslashes} {$LANG.checkout_varityorder}</h1>
					<p class="searchAddressCont">{$restaurant_streetaddress}</p>
				</div>
				<div class="detailsRightMiddle1">
					<div class="contain">
						<ul class="detRiteNewCont1Ul checkoutItemHead">
							<li class="item"><label class="bgNew">{$LANG.checkout_item}</label></li>
							<li class="Qty"><label class="bgNew align-center">{$LANG.checkout_qty}</label></li>
							<li class="price "><label class="bgNew align-right">{$LANG.checkout_price}</label></li>
						</ul>
						
						<input type="hidden" name="ordertotalprice" id="ordertotalprice" value="{if $smarty.session.delivery_pickup eq 'pickup'}{$total}{else}{$total}{/if}"/>
						
						{section name=cart loop=$cartDetails}
						<ul class="detRiteNewCont1Ul">
							<li class="item">
								<label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}">{$cartDetails[cart].menuname|ucfirst|stripslashes|html_entity_decode} {if $cartDetails[cart].pizza_size neq ''}({$cartDetails[cart].pizza_size}){/if}</label>
							</li>
							<li class="Qty"><label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}"> {$cartDetails[cart].quantity}  </label></li>
							<li class="price"><label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}">{$cartDetails[cart].tot_menuprice}</label></li>
						</ul>
						{if $cartDetails[cart].pizza_crustname neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_crust}:
								{$cartDetails[cart].pizza_crustname|stripslashes}&nbsp;</span>
							</span>
						{/if}
						{if $cartDetails[cart].pizza_addonsname neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_add_topping}:
								{$cartDetails[cart].pizza_addonsname|stripslashes|html_entity_decode}&nbsp;</span>
							</span>
						{/if}
						{if $cartDetails[cart].addonsname neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_addons}
								{$cartDetails[cart].addonsname|ucfirst|stripslashes}</span>
								<!--<span class="option2">{$cartDetails[cart].addonsname|ucfirst|stripslashes}&nbsp;({$currency}&nbsp;{$cartDetails[cart].addonsprice} Extra)</span>-->
							</span>
						{/if}
						{if $cartDetails[cart].specialinstruction neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_spl_inst}:
								{$cartDetails[cart].specialinstruction|ucfirst|stripslashes}</span>
							</span>
						{/if}
						{sectionelse}
						<span class="noOrderYet">{$LANG.checkout_noitem}</span>
						{/section}
						<div class="border100"></div>
						<ul class="detRitePriceCont1Ul">
							<li>
								<label class="txt1">{$LANG.checkout_subtotal}:</label>
								<label class="price1">{if $cartDetailsCnt gt 0 and $subtotal neq ''}{$subtotal|string_format:"%.2f"}{else}0.00{/if}</label>
							</li>
							<li>
								<label class="txt1">{$LANG.checkout_tax} {if $salestax neq '0.00'}({$salestax} %){/if}:</label>
								<label class="price1">{if $cartDetailsCnt gt 0 and $salestax neq ''}{$taxamount|string_format:"%.2f"}{else}0.00{/if}</label>
							</li> 
							{if $deliveryoption eq 'Yes' and $smarty.session.delivery_pickup neq 'pickup'}
							<li>
								<label class="txt1">{$LANG.checkout_deliverycharge}:</label>
								<label class="price1"><span class="color3">{if $cartDetailsCnt gt 0}{if $deliverycharge eq '0.00'}{$LANG.checkout_free}{else}{$deliverycharge}{/if}{else}0.00{/if}</span></label>
							</li> 
							{/if}                   
						</ul>
						
						{if !empty($rest_offer_percentage)}
						<input type="hidden" name="offer" id="offer" value="{$offer}" />
							{if $offervalue gt 0}
							<ul class="detRiteTotalCont1Ul">
								<li>
									<label class="txt1">{$LANG.checkout_discount} ({$rest_offer_percentage} {$LANG.checkout_percentoff}):</label>
									<label class="total1" id="total1">{if $cartDetailsCnt gt 0 and $offervalue neq ''}- {$offervalue|string_format:"%.2f"}{else}0.00{/if}</label>
								</li>
							</ul>
							{/if}
						{/if}
						<ul class="detRiteTotalCont1Ul" id="checkupdatetotalshow" style="display:none;">
							<li>
								<label class="txt1">Tip:</label>
								<label class="total1" id="checkpervalue">0.00</label>
								<span id="checkpervalue1"></span>
							</li>  
						</ul>
						<ul class="detRiteTotalCont1Ul">
							<li>
								<label class="txt1">{$LANG.checkout_total}:&nbsp;&nbsp;&nbsp;&nbsp;</label>
								{if $smarty.session.delivery_pickup neq 'pickup'}
								<label class="total1" id="checkupdatetotal" >{$currency}&nbsp;{if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}</label>
								<input type="hidden" name="grandtotal" id="grandtotal" value="{if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}"/>
								{else}
								<label class="total1" id="checkupdatetotal">{$currency}&nbsp;{if $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'Yes'}{($total-$deliverycharge)|string_format:"%.2f"}{elseif $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'No'}{$total|string_format:"%.2f"}{else}0.00{/if}</label>
								<input type="hidden" name="grandtotal" id="grandtotal" value="{if $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'Yes'}{($total-$deliverycharge)|string_format:"%.2f"}{elseif $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'No'}{$total|string_format:"%.2f"}{else}0.00{/if}"/>
								{/if}
							</li>
						</ul>

						{*----------------------Voucher concept-------------------------------*}
						{if $voucher eq 'Available'}
							<div class="form-group">
								<div class="col-sm-12" id="voucherErr">{$voucherMsg}</div>
								<label class ="control-label col-sm-12 align-left ">{$LANG.checkout_enter_voucher_code|utf8_encode}</label>
								<div class="col-sm-12 margintopbot10">
									<div class="input-group">
										<input type="text" class="form-control" id="voucher" />
										<label class="input-group-addon" >
											<input type="submit" class="apply-icn" value="" onclick="return applyVoucherCode({$smarty.request.resid});" />
										</label>
									</div>
								</div>
							</div>
							
						{else}
							<input type="hidden" id="voucher" value="{$smarty.session.voucher}"/>
							{if $voucherMsg eq '' and $voucherPrice neq ''}
								<div class="contain">
									
										<label class="vou-name">Voucher Discount Price</label>
									
										<label class="vou-price">- {$currency}&nbsp;{$voucherPrice|string_format:"%.2f"}</label>
										<span class="voucherdelete" onclick="return removeVoucherCode({$smarty.request.resid});">x</span>
									
								</div>
							{/if}
						{/if}
						
						
						
					</div>
				</div>
			</div>
					
					
			{*if $smarty.session.delivery_pickup eq 'delivery'*}	
				<div class="customerRightBox clearfix">
					<!--<h1>{if $smarty.session.delivery_pickup eq 'pickup'}{$LANG.checkout_datepickuphead}{else}{$LANG.checkout_datedeliveryhead}{/if} </h1>-->
					<div class="detailsRightMiddle1">
					
					<input type="hidden" name="restStatus" id="restStatus" value="{$rest_status}" />
						<div class="contain">
							<!--<h1 class="customSignupHead">{$LANG.checkout_datedeliveryhead}</h1>-->
							{*if $smarty.session.delivery_pickup neq 'pickup'}
							<div class="form-group" id="foodassoonpos" {if $rest_status eq 'Closed'} style="display:none"{/if}>
								<div class="col-sm-12">
									<label class="checkbox-inline" for="foodassoonas"  >
									<input type="checkbox" name="foodassoonas" id="foodassoonas" class="flt" value="1" onclick="foodSoonAsCheck();"/>
									{$LANG.checkout_bringfood}
									</label>
								</div>
							</div>
							{/if*}
							<div id="soonaspos">
								<div class="checkRadioInner">
									{*if $smarty.session.delivery_pickup eq 'delivery'}
										<label class="datePickTit">{$LANG.checkout_datedelivery}</label>
									{else}
										<label class="datePickTit">{$LANG.checkout_date_of_pickup|utf8_encode}</label>
									{/if*}
									<div style="display:none" class='input-group date'>
										<input type="text" class="form-control booking_date" name="datedelivery" id="datedelivery"  readonly/>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
									<input type="hidden" name="restid" id="restid" value="{$smarty.request.resid}"/>
									<!--<img src="{$SITE_IMAGE_URL}/calender.png" alt="" title="" class="flt" />-->
									<span id="dateerrormsg"></span>
									
								</div>
									<!-------------------------time drop down box--------------------- -->
								<div style="display:none" id="Newopentimeclosetime">
									
									{if $times eq ''}
										<select name="time_delivery" id="time_delivery">
											<option value="">Closed</option>     
										
										</select>
									{else}
										<select name="time_delivery" id="time_delivery">
											{foreach key=opentime item=timelist from=$times}
												{$timelist}
											{/foreach}
										</select>
									{/if}
								</div>
							</div>
						 </div>
					</div>
				</div>
			{*/if*}
			<div class="customerRightBox clearfix">
				<h1>{$LANG.checkout_instruction}</h1>
				<div class="detailsRightMiddle1">
					<div class="contain">
						<textarea rows="" cols="" class="riteTextAree1" name="instructions" id="instructions"></textarea>
						<span id="instructionerrormsg"></span>
						<div class="checkRadioInner">
							<span class="myAddressEdit1">{$LANG.checkout_instructioncommand}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="ritebtnMar">
				<span id="submiterror"></span>
				{if $cartDetailsCnt gt 0 and $subtotal neq '' and $searchrestaurantDetailsPaymethod_cnt gt 0 }
					<input class="goToCheckout" type="button" id="checkoutSubmit" onclick="return submitOrder();" value=""  />
				{else}				   
					<input class="goToCheckout" style="opacity: 0.3;" disabled="disabled" id="checkoutSubmit" type="button" value="" />
				{/if}
				</div>
			<div class="checkRadioInner">
				<span class="myAddressEdit1"><a data-toggle="modal" class="color4" data-target="#foodAllergy" href="javascript:void(0);" >{$termsContentList.1.content_title|ucfirst|stripslashes}</a></span>
			</div>
			{if $termsContentList.0.content_title neq ''}
				<div class="checkRadioInner">
					<span class="myAddressEdit1">{$LANG.checkout_agreetxt} <a class="color4" data-toggle="modal" data-target="#termsCondition" href="javascript:void(0);">{$termsContentList.0.content_title|ucfirst|stripslashes}</a></span>
				</div>
			{/if}
		</div>
	</form>
</div>
{*---------------------------------------------------------------------------------------*}
{*------------Terms and Conditions--------*}
<div id="termsCondition"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
            <div class="carthead">
				<h1>{$SITE_NAME|stripslashes}</h1>
				<div class="addtoCartClose" data-dismiss="modal"></div>
			</div>
			<div class="termsCondionPop clearfix">
				<h1>{$termsContentList.0.content_title|ucfirst|stripslashes}</h1>	
				<p>{$termsContentList.0.content|stripslashes}</p>
			</div>
        </div>
    </div>
</div>
{*------------------------Food Allergy and Dietary Information------------------------*}
<div id="foodAllergy"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="carthead">
				<h1>{$SITE_NAME|stripslashes}</h1>
				<div class="addtoCartClose" data-dismiss="modal"></div>
			</div>
            <div class="termsCondionPop clearfix">
				<h1>{$termsContentList.1.content_title|ucfirst|stripslashes}</h1>	
				<p>{$termsContentList.1.content|stripslashes}</p>
			</div>
        </div>
    </div>
</div>