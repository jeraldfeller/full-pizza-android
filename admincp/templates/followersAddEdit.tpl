<div class="page-header">
    <h1 class="title">{if $smarty.get.cusid neq ''}Edit Followers{else}Add New Followers{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.cusid neq ''}Edit Followers{else}Add New Followers{/if}</li>
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
       
    		
    		
    		<form name="addNewCuisine" method="post" enctype="multipart/form-data" onsubmit="{if $smarty.get.cusid neq ''}return editFollowersName();{else}return addNewfollowers();{/if}" class="form-horizontal col-sm-12">	
    		<input type="hidden" name="action" value="FollowersAddEdit">
    		<input type="hidden" name="cusid" id="cusid" value="{$smarty.get.cusid}">
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
                    <div id="errormsg">{$error}</div>
                </div>
            </div>
            
			<div class="form-group">
    			<span class="control-label col-sm-4 font-normal">Followers Name <span class="color-red">*</span></span>
    			<div class="col-sm-4" >
    			   <input class="form-control" type="text" name="followers_name" id="followers_name" value="{if $smarty.get.cusid neq ''}{$selectFollowersValue.0.followers_name|stripslashes}{/if}" />
    			   <script type="text/javascript">document.addNewCuisine.followers_name.focus();</script>
    			   
    	         </div>
              
            </div>
			{*<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Followers Logo <span class="color-red"></span></span>	
				<div class="col-sm-4" >
					<input class="fileUpload" type="file" name="followers_logo" id="followers_logo" value=""  style="display:none;"/>
                    <label for="followers_logo" class="btn btn-default btn-sm" >
                      <i class="fa fa-folder-open"></i> Add Followers Logo		
                    </label>
					{if $smarty.get.cusid neq '' and $selectFollowersValue.0.followers_logo neq ''}
						<div class="photoContainer">
							<img src="{$SITE_IMAGE_FOLLOWERS_URL}/{$selectFollowersValue.0.followers_logo}" alt="{$selectFollowersValue.0.followers_name|stripslashes}" title="{$selectFollowersValue.0.followers_name|stripslashes}" />
						</div>
					{/if}
                </div>
					
			</div>*}	
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Followers url <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="followers_url" id="followers_url" value="{if $smarty.get.cusid neq ''}{$selectFollowersValue.0.followers_url|stripslashes}{/if}" />
					<script type="text/javascript">document.addNewCuisine.followers_url.focus();</script>
                </div>
			</div>
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
    				<input type="submit" class="btn btn-default" name="cus_addEdit" id="followers_add" value="{if $smarty.get.cusid neq ''}Edit{else}Add{/if}">
    				<a class="btn" href="followersManage.php">Cancel</a>
                </div>
			</div>
		  </form>
	</div>
</div>

