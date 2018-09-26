<div class="page-header">
    <h1 class="title">{if $smarty.get.eid}Edit Faq {else}Add Faq{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.eid}Edit Faq {else}Add Faq{/if}</li>
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
	
		<form name="faqmgmt" method="post" onsubmit="{if $smarty.get.eid neq ''}return editfaqManage();{else}return addNewfaqManage();{/if}" class="col-sm-12 form-horizontal">
		
			<input type="hidden" name="faq_id" id="eid" value="{$smarty.get.eid}">
			<input type="hidden" name="action" value="{if $smarty.get.eid eq ''}Add{else}Edit{/if}">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
					<span class="color-red">{$ErrorMessage}</span>
				</div>
			</div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Question <span class="color-red">*</span></span>
				<div class="col-sm-4" >
					<textarea class="form-control" rows="5" name="question" id="question" />{if $smarty.get.eid neq ''}{$faqEditList.0.question|stripslashes}{else}{$smarty.request.question}{/if}</textarea>	
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Answer<span class="color-red">*</span></span>
				<div class="col-sm-7 col-xs-12">{$Editor}</div>
				<!------------------Static Editor -------------------->
				<div class="col-sm-8 col-xs-12 col-md-8 col-sm-offset-4">
					<textarea name="textarea" class="jqte-test"></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" name="addEdit" value="{if $smarty.get.eid neq ''}Edit{else}Add{/if}">
					<a class="btn" href="faqManage.php">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>
