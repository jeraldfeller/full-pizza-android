<div class="page-header">
    <h1 class="title">{if $smarty.get.conid neq ''}Edit Content{else}Add New Content{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.conid neq ''}Edit Content{else}Add New Content{/if}</li>
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


		<form name="contentMgmt" method="post" onsubmit="{if $smarty.get.conid neq ''}return editContent();{else}return addNewContent();{/if}" class="form-horizontal col-sm-12">
		
			<input type="hidden" name="conid" id="conid" value="{$smarty.get.conid}">
			<input type="hidden" name="action" value="{if $smarty.get.conid eq ''}Add{else}Edit{/if}">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
					<span class="text-danger">{$ErrorMessage}</span>
				</div>
			</div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Title <span class="color-red">*</span></span>
				<div class="col-sm-4" >			
					<input class="form-control" type="text" name="title" id="title" value="{if $smarty.get.conid neq ''}{$contentValue.0.content_title}{else}{$smarty.request.title}{/if}" />
				</div>
			</div>	
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Metatag Title<span class="color-red">*</span></span>
				<div class="col-sm-4">		
					<textarea class="form-control" rows="5" name="mettitle" id="mettitle" />{if $smarty.get.conid neq ''}{$contentValue.0.metatagtitle|stripslashes}{else}{$smarty.request.mettitle}{/if}</textarea>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Metatag Description <span class="color-red">*</span></span>
				<div class="col-sm-4" >		
					<textarea class="form-control" rows="5" name="metdes" id="metdes" />{if $smarty.get.conid neq ''}{$contentValue.0.metatagdescription|stripslashes}{else}{$smarty.request.metdes}{/if}</textarea>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Metatag Keyword <span class="color-red">*</span></span>
				<div class="col-sm-4">		
					<textarea class="form-control" rows="5"  name="metkey" id="metkey" />{if $smarty.get.conid neq ''}{$contentValue.0.metatagkeyword|stripslashes}{else}{$smarty.request.metkey}{/if}</textarea>
				</div>
			</div>
						
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Display Type<span class="color-red"></span></span>
				<div class="col-sm-4">		
					<div class="checkbox checkbox-primary checkbox-inline">
						<input type="checkbox" name="dis_footer" value="F" id="display_yes" {if $contentValue.0.display_footer eq 'F'}checked="checked"{/if} >
						<label for="display_yes">Footer</label>
					</div>
					<div class="checkbox checkbox-primary checkbox-inline">
						<input type="checkbox" name="dis_page" value="CR"  id="display_no" {if $contentValue.0.display_customer eq 'CR'}checked="checked"{/if} >
						<label for="display_no">Customer Register</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Terms &amp; Condition</span>
				<div class="col-sm-4">		
					<div class="radio-inline radio">
						<input type="radio" name="terms" value="Yes" id="terms_yes" {if $contentValue.0.termscondition eq 'Yes'}checked="checked"{/if}>
						<label for="terms_yes">Yes</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="terms" value="No" id="terms_no" {if $contentValue.0.termscondition eq 'No'}checked="checked"{/if} >
						<label for="terms_no">No</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Content <span class="color-red">*</span></span>	
				<div class="col-sm-8 col-xs-12">			
					{$Editor}
				</div>	
				<!------------------Static Editor -------------------->
				{*<div class="col-sm-8 col-xs-12 col-md-8 col-sm-offset-4">
					<textarea name="textarea" class="jqte-test"></textarea>
				</div>*}	
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" name="addEdit" value="{if $smarty.get.conid neq ''}Edit{else}Add{/if}">
					<a class="btn" href="contentManage.php">Cancel</a>
				</div>
			</div>
			
		</form>
	</div>
</div>

