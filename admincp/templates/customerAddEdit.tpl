<div class="page-header">
    <h1 class="title">{if $smarty.get.cusmid neq ''}Edit Customer{else}Add New Customer{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.cusmid neq ''}Edit Customer{else}Add New Customer{/if}</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
         <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>

<div class="panel panel-default">
	    <div class="panel-body">
	
	
	<form name="customermgmt" method="post" onsubmit="{if $smarty.get.cusmid neq ''}return editCustomer();{else}return addNewCustomer();{/if}" class="form-horizontal col-sm-12"> 
	
		<input type="hidden" name="cusmid" id="cusmid" value="{$smarty.get.cusmid}" />

		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<div id="errormsg"></div>
			</div>
		</div>
		<div class="form-group">
			<label for="cus_name" class="control-label col-sm-4 font-normal">Name <span class="color-red">*</span></label>
			<div class="col-sm-4" >			
				<input class="form-control" type="text" name="cus_name" id="cus_name" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_name}{/if}" />
				<script type="text/javascript">document.customermgmt.cus_name.focus();</script>
				
			</div>
		</div>
		{* --------------------------------- last name----------------------------------------- *}
		<div class="form-group">
			<label for="cus_lastname" class="control-label col-sm-4 font-normal">Last Name <span class="color-red">*</span></label>
			<div class="col-sm-4">						
				<input class="form-control" type="text" name="cus_lastname" id="cus_lastname" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_lastname}{/if}" />
				
			</div>
		</div>
		{* --------------------------------- last name end ----------------------------------------- *}
		
	{*	<div class="addPageCont">
			<span class="addPageRightFont">Street Address <span class="color-red">*</span></span>
			<span class="colon1">:</span>				
			<input class="textbox" type="text" name="cus_address" id="cus_address" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_street}{/if}"/>		  	  
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Apt/Suite/Building</span>
			<span class="colon1">:</span>				
			<input class="textbox" type="text" name="cus_building" id="cus_building" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_buildtype}{/if}" />
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Cross street </span>
			<span class="colon1">:</span>				
			<input class="textbox" type="text" name="cus_crostreet" id="cus_crostreet" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_crossstreet}{/if}" />
		</div>		
	
	 <!-- ****************** state  ************* -->
	    <div class="addPageCont">
			<span class="addPageRightFont">State <span class="color-red">*</span></span>
			<span class="colon1">:</span>
			<select class="selectbx" name="cus_state" id="cus_state" onchange="getCityListRest(this.value,'cust');">
					
				<option value="">Select</option>
					{section name="state" loop=$showStatelist}
							<option value="{$showStatelist[state].statecode}" {if $showStatelist[state].statecode eq $customervalue.0.customer_state}selected="selected"{/if}>{$showStatelist[state].statename|stripslashes}</option>
					{/section}
			</select>
			<span class="errClass" id="resStaErr"></span>
	    </div>		
	
		<div class="addPageCont">
			<span id="showResCityList">
				<span class="addPageRightFont">City <span class="color-red">*</span></span>
				<span class="colon1">:</span>
					<select class="selectbx" name="cus_city" id="cus_city" >
					<option value="">First Select State</option>
						{section name="city" loop=$selectCityList}
							<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customervalue.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
						{/section}
					</select>
				<span class="errClass" id="resCitErr"></span>
			</span>	
		</div>
	
		<!-- zip-->
		<div class="addPageCont">
			<span id="showResZipList">
				<span class="addPageRightFont">Zip <span class="color-red">*</span></span>
				<span class="colon1">:</span>
				<input type="text" class="textbox" name="cus_zip" id="cus_zip" autocomplete="off" value="{if $customervalue.0.customer_zip neq ''} {$customervalue.0.customer_zip}{else}Zip Code{/if}" onfocus="if (this.value == '{if $customervalue.0.customer_zip neq ''}{$customervalue.0.customer_zip}{else}Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $customervalue.0.customer_zip neq ''}{$customervalue.0.customer_zip}{else}Zip Code{/if}';" onkeyup="autoSuggestZip();" />
				
				<span class="errClass" id="resZipErr"></span>
			</span>
		</div>  
	*}
		<div class="form-group">
			<label for="cus_phone" class="control-label col-sm-4 font-normal">Phone <span class="color-red">*</span></label>
			<div class="col-sm-4" >
				<input class="form-control" type="text" name="cus_phone" id="cus_phone" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_phone}{/if}" />
			</div>
		</div>	
		{*
		<div class="form-group">
			<span class="addPageRightFont">Landline</span>
			<span class="colon1">:</span>				
			<input class="textbox" type="text" name="cus_landline" id="cus_landline" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_landline}{/if}" />
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">Landmark</span>
			<span class="colon1">:</span>				
			<input class="textbox" type="text" name="cus_landmark" id="cus_landmark" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_landmark}{/if}" />
		</div>	
		
		<div class="addPageCont">
			<label class="addPageRightFont">Address Label </label>
			<span class="colon1">:</span>
			<span class="radioBtn">
				<span class="labelcont">
					<input class="radiobotton" type="radio" name="address_lab" id="address_lab1" value="home" {if $customervalue.0.customer_addresslabel eq "home"}checked="checked"{/if} />
					<label class="labelfont" for="Home">&nbsp;Home</label>
				</span>
				<span class="labelcont">
					<input class="radiobotton" type="radio" name="address_lab" id="address_lab2" value="office"{if $customervalue.0.customer_addresslabel eq "office"}checked="checked"{/if} />
					<label class="labelfont" for="Office">&nbsp;Office</label>
				</span>
				<span class="labelcont">
					<input class="radiobotton" type="radio" name="address_lab" id="address_lab3" value="other"{if $customervalue.0.customer_addresslabel eq "other"}checked="checked"{/if} />
					<label class="labelfont" for="Other">&nbsp;Other</label>
				</span>
			</span>
		</div>
		*}
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">Email <span class="color-red">*</span></label>
			<div class="col-sm-4" >	
				<input class="form-control" type="text" name="cus_email" id="cus_email" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_email}{/if}" />
				
			</div>
		</div>
		{if $smarty.get.cusmid eq ''}
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">password <span class="color-red">*</span></label>
			<div class="col-sm-4">	
				<input class="form-control" type="password" name="cus_pwd" id="cus_pwd" value="{if $smarty.get.cusmid neq ''}{$customervalue.0.customer_password}{/if}" autocomplete="off"/>
			</div>
		</div>
		{/if}
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="submit" class="btn btn-default" id="CustomerAdd" name="addEdit" value="{if $smarty.get.cusmid neq ''}Edit{else}Add{/if}" />
				<a class="btn" href="customerManage.php{if $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Cancel</a>
			</div>
			
		</div>
	</form>
</div>
</div>
