<div class="page-header">
    <h1 class="title">User Addedit</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">User Addedit</li>
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
			<form name="addnewuser" method="post" onsubmit="return addnewuserValidate();" class="form-horizontal">
	        	<input type="hidden" name="action" id="action" value="{if $smarty.request.eid eq ''}ADD{else}EDIT{/if}" />
	        	<div class="form-group">
	        		<div class="col-sm-4 col-sm-offset-4">
	        			<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<div class="col-sm-4 col-sm-offset-4">
						<div id="errormsg" class="color-red">{$errormsg}</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Name <span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="form-control" type="test" name="username" id="username" value="{if $smarty.get.eid neq ''}{$userEditList.0.username|stripslashes}{else}{$smarty.request.username}{/if}" />
						<script type="text/javascript">document.addnewuser.username.focus();</script>
					</div>
				</div>
				{*<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Email <span class="color-redr">*</span></label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="useremail" id="useremail" value="{if $smarty.get.eid neq ''}{$userEditList.0.useremail|stripslashes}{else}{$smarty.request.useremail}{/if}" />
					</div>
				</div>*}
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Password <span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="form-control" type="password" name="userpassword" id="userpassword" maxlength="50" value="{if $smarty.get.eid neq ''}{$userEditList.0.password|stripslashes}{else}{$smarty.request.password}{/if}"  autocomplete="off"/>
					</div>
				</div>
				<!-- *********************** user text ****************** -->
	            <div class="form-group">
					<label class="control-label col-sm-4 font-normal">User Designation </label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="userdesignation" maxlength="50" id="userdesignation" value="{if $smarty.get.eid neq ''}{$userEditList.0.user_designation|stripslashes}{else}{$smarty.request.user_text}{/if}"  />
					</div>
				</div>
	            
	            <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Modules Permission <span class="color-red">*</span></label>
					<div class="col-sm-4">
		                {section name=list loop=$userModulesList1}
		                    {assign var="getmoduleslist" value=","|explode:$userEditList.0.modules}
		                    <div class="col-sm-12 no-padding">
			                    <div class="checkbox checkbox-primary">
				    				<input type="checkbox"  class="mainmenuid_{$userModulesList1[list].id}" onclick="removeSubmenus({$userModulesList1[list].id});" name="modules[]" id="modules_{$smarty.section.list.rownum}" value="{$userModulesList1[list].id}" {foreach from=$getmoduleslist item=modulesid}{if $modulesid eq $userModulesList1[list].id}checked="checked"{/if}{/foreach}/>
				    				<label for="modules_{$smarty.section.list.rownum}">{$userModulesList1[list].modulesname}</label>
				                     
				                    {if $userModulesList1[list].menucount gt 0}
				                        {assign var = subModules value = $objAdmin->selectSubMenu($userModulesList1[list].id)}
				                        {section name="sub" loop=$subModules}
				                        <div class="col-sm-12">
					                        <div class="checkbox checkbox-primary">
					                            <input type="checkbox"  class="submodules_{$userModulesList1[list].id}" onchange="submenuClick({$userModulesList1[list].id});" name="modules[]" id="submodules_{$smarty.section.list.rownum}{$smarty.section.sub.rownum}" value="{$subModules[sub].id}" {foreach from=$getmoduleslist item=modulesid}{if $modulesid eq $subModules[sub].id}checked="checked"{/if}{/foreach}/>
					                            <label for="submodules_{$smarty.section.list.rownum}{$smarty.section.sub.rownum}">{$subModules[sub].modulesname} </label>
					                        </div>
					                    </div>
				                        {/section}
				                    {/if}
				                </div>
				             </div>

		                {/section}
	            	</div>
				</div>
	            
				 <div class="form-group">
				 	<div class="col-sm-6 col-sm-offset-4">
						<input type="submit" class="btn btn-default" value="Submit" />
						<a class="btn" href="userManage.php">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
