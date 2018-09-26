<div class="row">
<div class="heading">Customer <!--<a href="" class="btn btn-info btn-sm pull-right martopRgt"><i class="fa fa-mail-reply"></i></a>--></div>
<div class="adminRight">
<div class="adminTopHead">{if $smarty.get.addid neq ''}Edit AddressBook{else}Add New AddressBook{/if}</div>


	
	
	
	<form name="addressBookmgmt" method="post" onsubmit="{if $smarty.get.addid neq ''}return editAddressBook();{else}return addNewAddressBook();{/if}" class="form-horizontal col-sm-12">
	
		<input type="hidden" name="cusmid" id="cusmid" value="{$smarty.get.cusmid}"/>
        <input type="hidden" name="addid" id="addid" value="{$smarty.get.addid}"/>
        <input type="hidden" name="action" value="{if $smarty.get.addid eq ''}Add{else}Edit{/if}"/>
        <div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<span id="errormsg"></span>
			</div>
		</div>
		{if $smarty.get.addid eq ''}
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Customer Name <span class="color1">*</span></span>
				<div class="col-sm-4">
					<select class="form-control" name="cus_name" id="cus_name">
						<option value="">Select Customer</option>
						{section name="name" loop=$customer}
							<option value="{$customer[name].customer_id}">{$customer[name].customer_name|stripslashes} {$customer[name].customer_lastname|stripslashes}</option>
						{/section}
					</select>
					<script type="text/javascript">document.addressBookmgmt.cus_name.focus();</script>
					<div class="tooltip"><div class="HelpButton">?</div><span>Select customer's Name</span></div>
				</div>
			</div>
		{/if}
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Address Title <span class="color1">*</span></span>
			<div class="col-sm-4">				
			<input class="form-control" type="text" name="add_title" id="add_title" value="{if $smarty.get.addid neq ''}{$addressBookvalue.0.customer_address_title}{/if}" />
			{if $smarty.get.addid neq ''}
			<script type="text/javascript">document.addressBookmgmt.add_title.focus();</script>
			{/if}
			<div class="tooltip"><div class="HelpButton">?</div><span>Enter title for your address.</span></div>
		</div>
		</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Apt/Suite/Building </span>
			<div class="col-sm-4">			
			<input class="form-control" type="text" name="apt_name" id="apt_name" value="{if $smarty.get.addid neq ''}{$addressBookvalue.0.customer_apartment_name}{/if}" />
			<div class="tooltip"><div class="HelpButton">?</div><span>Enter customer's buliding name</span></div>
		</div>
		</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Street Address <span class="color1">*</span></span>
			<div class="col-sm-4">				
				<input class="form-control" type="text" name="street_add" id="street_add" value="{if $smarty.get.addid neq ''}{$addressBookvalue.0.customer_street}{/if}" />
				<div class="tooltip"><div class="HelpButton">?</div><span>Enter customer's street address</span></div>
			</div>
			</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">State <span class="color1">*</span></span>
			<div class="col-sm-4">			
			<select class="form-control" name="cus_state" id="cus_state" onchange="getCityListRest(this.value,'cust');">	
				<option value="">Select</option>
					{section name="state" loop=$showStatelist}
							<option value="{$showStatelist[state].statecode}" {if $showStatelist[state].statecode eq $addressBookvalue.0.customer_state}selected="selected"{/if}>{$showStatelist[state].statename|stripslashes}</option>
					{/section}
			</select>
			<div class="tooltip"><div class="HelpButton">?</div><span>Select customer's state</span></div>
		</div>
		</div>
		
		<div class="form-group">
			<span id="showResCityList">
				<span class="control-label col-sm-4 font-normal">City <span class="color1">*</span></span>
				<div class="col-sm-4">
				<select class="form-control" name="cus_city" id="cus_city">
					<option value="">First Select State</option>
					{section name="city" loop=$selectCityList}
						<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $addressBookvalue.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
					{/section}
				</select>
			</span>			
			<div class="tooltip"><div class="HelpButton">?</div><span>Select customer's city</span></div>
		</div>
		</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Zip Code <span class="color1">*</span></span>
			<div class="col-sm-4">			
			<input class="form-control" type="text" name="zip_code" id="zip_code" value="{if $smarty.get.addid neq ''}{$addressBookvalue.0.customer_zip}{/if}" />
			{*<input type="text" class="textbox" name="zip_code" id="zip_code" autocomplete="off" value="{if $addressBookvalue.0.customer_zip neq ''}{$addressBookvalue.0.customer_zip}{else}Zip Code{/if}" onfocus="if (this.value == '{if $addressBookvalue.0.customer_zip neq ''}{$addressBookvalue.0.customer_zip}{else}Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $addressBookvalue.0.customer_zip neq ''}{$addressBookvalue.0.customer_zip}{else}Zip Code{/if}';" onkeyup="autoSuggestZip();" />*}
			<div class="tooltip"><div class="HelpButton">?</div><span>Enter customer's zip code</span></div>
			</div>
		</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Landmark <span class="color1"></span></span>
			<div class="col-sm-4">			
			<input class="form-control" type="text" name="landmark" id="landmark" value="{if $smarty.get.addid neq ''}{$addressBookvalue.0.customer_landmark}{/if}" />
			<div class="tooltip"><div class="HelpButton">?</div><span>Enter customer's Landmark</span></div>
			</div>
		</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Landline <span class="color1"></span></span>
			<div class="col-sm-4">				
			<input class="form-control" type="text" name="landline" id="landline" value="{if $smarty.get.addid neq ''}{$addressBookvalue.0.customer_landline}{/if}" />
			<div class="tooltip"><div class="HelpButton">?</div><span>Enter customer's Landline</span></div>
			</div>
		</div>
		
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Address Label <span class="color1"></span></span>
			<div class="col-sm-4">	
			<label class="radio-inline">		
				<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_home" value="home" {if $addressBookvalue.0.customer_address_label eq 'home'}checked="checked"{/if}/>
				Home
			</label>
			<label class="radio-inline">
				<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_off" value="office" {if $addressBookvalue.0.customer_address_label eq 'office'}checked="checked"{/if} />
				Office
			</label>
			<label class="radio-inline">	
				<input type="radio" class="" name="customer_addresslabel_new" id="customer_addresslabel_other" value="other" {if $addressBookvalue.0.customer_address_label eq 'other'}checked="checked"{/if} />
				Other
			</label>
			<div class="tooltip"><div class="HelpButton">?</div><span>Select customer's address label</span></div>
		</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="submit" class="btn btn-warning btn-sm" id="AddressBookAdd" name="addEdit" value="{if $smarty.get.addid neq ''}Edit{else}Add{/if}">
				<a class="btn btn-default btn-sm" href="addressBookManage.php{if $smarty.request.searchbookcustomerid neq ''}?searchbookcustomerid={$smarty.request.searchbookcustomerid}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{if $smarty.request.searchbookcustomerid neq ''}&searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}{elseif $smarty.request.searchbookcustomerid neq ''}?searchbookcustomerid={$smarty.request.searchbookcustomerid}{/if}">Cancel</a>
			</div>
		</div>
	</form>
</div>

</div>