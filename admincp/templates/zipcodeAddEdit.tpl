<div class="page-header">
    <h1 class="title">{if $smarty.get.zipid neq ''}Edit Postcode{else}Add New Postcode{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.zipid neq ''}Edit Postcode{else}Add New Postcode{/if}</li>
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
		<form name="zipmgmt" method="post" onsubmit="{if $smarty.get.zipid neq ''}return editZipcode();{else}return addNewZipcode();{/if}" class="form-horizontal col-sm-12">
		
			<input type="hidden" name="zipid" id="zipid" value="{$smarty.get.zipid}">
			<input type="hidden" name="stecode" id="stecode" value="{$smarty.get.sc}">
			<input type="hidden" name="cid" id="cid" value="{$smarty.get.cid}">
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
		
			{if $smarty.get.sc eq ''}
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal">State <span class="color-red">*</span></label>
				<div class="col-sm-4">	
					<select class="form-control selectpicker" name="state" id="state" onchange="getShowCityList(this.value);">
						<option value="">Select</option>
						{foreach from=$showStatelist item=state}
						<option value="{$state.statecode}" {if $zipcodeValue.0.statecode eq $state.statecode}selected="selected"{/if}>{$state.statename}</option>
						{/foreach}
					</select>	
				</div>	
			</div>
			{/if}
			{if $smarty.get.cid eq ''}
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal">City Name <span class="color-red">*</span>{$zipcodeValue.0.stateid}</label>
				<div class="col-sm-4" >	
				<span id="showcityList">
					<select class="form-control selectpicker" name="cityname" id="cityname" >
					<option value="">First Select State</option>
					{foreach from=$selectCityList item=city}
					<option value="{$city.city_id}"{if $zipcodeValue.0.cityid eq $city.city_id}selected="selected"{/if}>{$city.cityname}</option>
					{/foreach}
					</select>
				</span>	
                </div>
			</div>
			{/if}
				
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Postcode <span class="color-red">*</span></span>	
				<div class="col-sm-4">			
					<input class="form-control" type="text" name="zipcode" id="zipcode" maxlength="8" value="{if $smarty.get.zipid neq ''}{$zipcodeValue.0.zipcode}{/if}" />
				 </div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Area Name <span class="color-red"></span></span>
				<div class="col-sm-4">	
					<input class="form-control" type="text" name="areaname" id="areaname" value="{if $smarty.get.zipid neq ''}{$zipcodeValue.0.areaname}{/if}" />						  
                </div>
			</div>
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
    				<input type="submit" class="btn btn-default" id="ZipcodeAdd" name="addEdit" value="{if $smarty.get.zipid neq ''}Edit{else}Add{/if}">
    				<a class="btn" href="zipcodeManage.php">Cancel</a>
                </div>
				
			</div>
		</form>
	</div>
</div>

