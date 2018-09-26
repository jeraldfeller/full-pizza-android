<div class="page-header">
    <h1 class="title">{if $smarty.get.stateid neq ''}Edit State{else}Add New State{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.stateid neq ''}Edit State{else}Add New State{/if}</li>
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
	<form name="statemgmt" method="post" onsubmit="{if $smarty.get.stateid neq ''}return editState();{else}return addNewState();{/if}" class="col-sm-12 form-horizontal">
		<input type="hidden" name="stateid" id="stateid" value="{$smarty.get.stateid}">
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
			<label class="control-label col-sm-4 font-normal">State Code <span class="color-red">*</span></label>
			<div class="col-sm-4">				
				<input class="form-control" type="text" name="statecode" id="statecode" maxlength="2" value="{if $smarty.get.stateid neq ''}{$statevalue.0.statecode}{/if}" />
				<script type="text/javascript">document.statemgmt.statecode.focus();</script>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">State Name <span class="color-red">*</span></label>
			<div class="col-sm-4" >				
				<input class="form-control" type="text" name="statename" id="statename" value="{if $smarty.get.stateid neq ''}{$statevalue.0.statename}{/if}" />			   						
            </div>	
		</div>
		
		<div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
    			<input type="submit" class="btn btn-default btn-sm" id="StateAdd" name="addEdit" value="{if $smarty.get.stateid neq ''}Edit{else}Add{/if}">
    			<a class="btn  btn-sm" href="stateManage.php">Cancel</a>
            </div>
		</div>
	</form>

    </div>
</div>