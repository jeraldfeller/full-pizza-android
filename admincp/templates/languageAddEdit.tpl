<div class="page-header">
    <h1 class="title">{if $smarty.get.langid neq ''}Edit Language{else}Add New Language{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.langid neq ''}Edit Language{else}Add New Language{/if}</li>
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

<div class="adminRight">
		{if $smarty.get.langid neq '' and $smarty.get.lfile neq ''}
			{include file='languageFilesEdit.tpl'}
		{else}
		<!--Add Edit-->
		<form name="languagemgmt" method="post" onsubmit="{if $smarty.get.langid neq ''}return editLanguage();{else}return addNewLanguage();{/if}" class="col-sm-12 form-horizontal">
		
			<input type="hidden" name="langid" id="langid" value="{$smarty.get.langid}">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
				</div>
			</div>
			<div class="form-group">
				<span class="control-label font-normal col-sm-4">Language Name <span class="color-red">*</span></span>
				<div class="col-sm-4" >			
					<input class="form-control" type="text" name="languagename" id="languagename"  value="{if $smarty.get.langid neq ''}{$langvalue.0.lang_name}{/if}" />
					<script type="text/javascript">document.languagemgmt.languagename.focus();</script>
					
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label font-normal col-sm-4">Language Code <span class="color-red">*</span></span>
				<div class="col-sm-4">				
					<input class="form-control" type="text" name="languagecode" id="languagecode" maxlength="2" value="{if $smarty.get.langid neq ''}{$langvalue.0.lang_code}{/if}" />	
				</div>		
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" id="LanguageAdd" name="addEdit" value="{if $smarty.get.langid neq ''}Edit{else}Add{/if}">
					<a class="btn" href="languageManage.php">Cancel</a>
				</div>
			</div>
		</form>


{/if}
</div>
