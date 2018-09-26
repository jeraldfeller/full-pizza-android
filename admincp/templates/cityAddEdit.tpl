<div class="page-header">
    <h1 class="title">{if $smarty.get.cityid neq ''}Edit City{else}Add New City{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.cityid neq ''}Edit City{else}Add New City{/if}</li>
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
	<form name="citymgmt" method="post" onsubmit="{if $smarty.get.cityid neq ''}return editCityValidate();{else}return addNewCityValidate();{/if}" class="col-sm-12 form-horizontal">
	
		<input type="hidden" name="cityid" id="cityid" value="{$smarty.get.cityid}">
		<input type="hidden" name="statecode" id="stecode" value="{$smarty.get.sc}">
		
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
			<span class="control-label col-sm-4">State Name <span class="color-red">*</span></span>
			<div class="col-sm-4" >
    			<select class="form-control selectpicker" name="statename" id="statename" >
    				<option value="">Select</option>
    				{foreach from=$showStatelist item=ste}
    				<option value="{$ste.statecode}" {if $cityvalue.0.statecode eq $ste.statecode} selected="selected"{/if}>{$ste.statename}</option>
    				{/foreach}
    			</select>
            </div>
		</div>
		{/if}
		
		<div class="form-group">
			<span class="control-label col-sm-4">City Name <span class="color-red">*</span></span>
			<div class="col-sm-4">			
    			<input class="form-control" type="text" name="cityname" id="cityname" value="{if $smarty.get.cityid neq ''}{$cityvalue.0.cityname}{/if}" />
			</div>
		</div>
		
		<div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
    			<input type="submit" class="btn btn-default" id="CityAdd" name="addEdit" value="{if $smarty.get.cityid neq ''}Edit{else}Add{/if}">
    			<a class="btn" href="cityManage.php">Cancel</a>
            </div>			
		</div>
	</form>
</div>

</div>