<div class="page-header">
    <h1 class="title">{if $smarty.get.cusid neq ''}Edit Cuisine{else}Add New Cuisine{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.cusid neq ''}Edit Cuisine{else}Add New Cuisine{/if}</li>
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
			<form name="addNewCuisine" method="post" enctype="multipart/form-data" onsubmit="{if $smarty.get.cusid neq ''}return editCuisineName();{else}return addNewcuisine();{/if}" class="form-horizontal col-sm-12">	
			<input type="hidden" name="action" value="CuisineAddEdit">
			<input type="hidden" name="cusid" id="cusid" value="{$smarty.get.cusid}">
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg" {if $errorMsg neq ''}class="errormsg"{/if}>{if $errorMsg neq ''}{$errorMsg}{/if}</div>
				</div>
			</div>
				
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">Cuisine Name <span class="color-red">*</span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="cuisine_name" id="cuisine_name" value="{if $smarty.get.cusid neq ''}{$selectCuisineValue.0.cuisine_name|ucfirst|stripslashes}{else}{$smarty.post.cuisine_name}{/if}" />
    					<script type="text/javascript">document.addNewCuisine.cuisine_name.focus();</script>
                    </div>
				</div>
				
				{*<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Cuisine Photo <span class="color-red">*</span></span>	
					<div class="col-sm-4">						
					   <input class="fileUpload" type="file" name="cuisine_photo" id="cuisine_photo" value="" style="display:none;" />
                       <label for="cuisine_photo" class="btn btn-default btn-sm" >
                          <i class="fa fa-folder-open"></i> Add Cuisine image		
                        </label>
					  
    					{if $smarty.get.cusid neq '' and $selectCuisineValue.0.cuisine_photo neq ''}
    						<img src="{$SITE_IMAGE_CUISINE_URL}/{$selectCuisineValue.0.cuisine_photo}" alt="{$selectCuisineValue.0.cuisine_name|stripslashes}" title="{$selectCuisineValue.0.cuisine_name|stripslashes}" width="250" />
    					{/if}
                    </div>
				</div>*}	
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Description</span>
					<div class="col-sm-7 col-xs-12">	
					   <div class="editordiv">{$Editor}</div>
                    </div>
                    <!------------------Static Editor -------------------->
				<!-- <div class="col-sm-8 col-xs-12 col-md-8 col-sm-offset-4">
					<textarea name="textarea" class="jqte-test"></textarea>
				</div> -->
				</div>
				
				<div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
    					<input type="submit" class="btn btn-default" id="CuisineAdd" name="cus_addEdit" value="{if $smarty.get.cusid neq ''}Edit{else}Add{/if}">
    					<a class="btn" href="cuisineManage.php{if $smarty.request.page neq ''}?page={$smarty.request.page}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if} {if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.limit}?limit={$smarty.request.limit}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if} {elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Cancel</a>
                    </div>
				</div>
			</form>
		</div>
	
</div>
