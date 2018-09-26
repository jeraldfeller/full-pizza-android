<div class="page-header">
    <h1 class="title">Edit Metatag - {$smarty.get.filename}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Edit Metatag - {$smarty.get.filename}</li>
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


			<form name="metatag" method="post" enctype="multipart/form-data" action="metatagAddEdit.php" class="form-horizontal col-sm-12">
            <input type="hidden" name="action"  value="metatagUpdate"  />
            <input type="hidden" name="filename"  value="{$smarty.get.filename}"  />
            	<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
						<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
						<div id="errormsg" {if $SuccessMessage neq ''}class="successmsg"{/if}>{if $SuccessMessage neq ''}{$SuccessMessage}{/if}</div>
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4">Title </span>
					<div class="col-sm-4">
						<textarea class="form-control" name="metatag_title" id="metatag_title" />{$metatagList.0.metatag_title|stripslashes}</textarea>
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4">Keyword </span>
					<div class="col-sm-4">
						<textarea class="form-control" name="metatag_keyword" id="metatag_keyword" />{$metatagList.0.metatag_keyword|stripslashes}</textarea>
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4">Description </span>
					<div class="col-sm-4">
						<textarea class="form-control" name="metatag_desc" id="metatag_desc" />{$metatagList.0.metatag_desc|stripslashes}</textarea>
					</div>
				</div>
                
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
		                <input type="submit" class="btn btn-default" name="Edit" value="Submit" />
		    			<a class="btn" href="metatagManage.php">Cancel</a>
		    		</div>
	            </div>

			</form>
		</div>		

</div>