

    <div class="adminTopHead">Edit Language Files - {$langcode}</div>
	
	<form name="languagemgmt" method="post" onsubmit="return updateselectLangFile()" class="form-horizontal col-sm-12" >
			<input type="hidden" name="langid" id="langid" value="{$smarty.get.langid}" />
			<input type="hidden" name="lfile" id="lfile" value="{$smarty.get.lfile}" />
			<div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">            
                    <div id="errormsg"></div>
                </div>
            </div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Select a File <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<select class="form-control selectpicker" name="lang_file_name" id="lang_file_name" onchange="loadselectLangFile(this.value,'{$smarty.get.langid}','{$langcode}');">
    					{section loop=$dir_files_list name=lf}
    					<option value="{$dir_files_list[lf]}" {if $dir_files_list[lf] eq $smarty.get.lfile}selected="selected"{/if}>
    					{if $dir_files_list[lf] eq 'checkout.php'}Checkout ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'customerLogin.php'}Customer Login ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'customerMyaccount.php'}Customer Myaccount ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'customerRegister.php'}Customer Register ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'footer.php'}Footer ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'header.php'}Header ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'index.php'}Home ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'restaurantDetails.php'}Restaurant Details ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'restaurantOwnerLogin.php'}Restaurant Owner Login ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'restaurantOwnerMyaccount.php'}Restaurant Owner Myaccount ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'restaurantOwnerRegister.php'}Restaurant Owner Register ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'restaurantOwnerThanks.php'}Restaurant Owner Thanks ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'searchResult.php'}Search Result ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'success.php'}Success ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'thanks.php'}Thanks ({$dir_files_list[lf]})
    					{elseif $dir_files_list[lf] eq 'error_lang.js'}Error File ({$dir_files_list[lf]})
    					{else}{$dir_files_list[lf]}{/if}</option>
    					{/section}
    				</select>	
                </div>
			</div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Language File <span class="color-red">*</span></span>
				<div class="col-sm-8">
    				<textarea name="langfilecontent" id="langfilecontent" cols="100" rows="25" class="form-control" />{$filedata|stripslashes}</textarea>
    				<!--<textarea name="langfilecontent" id="langfilecontent" cols="100" rows="25" />dfdfdf</textarea>-->
                    
                  <!--- {foreach from=$filedata key=k item=i}
                    <input type="text" value="{$i[0]|replace:'"':''}{$i[0]}" /><br />
                    {/foreach}  -->
                </div>
			</div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
    				<input type="submit" class="btn btn-default" name="addEdit" value="{if $smarty.get.langid neq ''}Edit{else}Add{/if}">
    				<a class="btn" href="languageManage.php">Cancel</a>
                </div>
			</div>
		</form>
