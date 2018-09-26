<div class="page-header">
    <h1 class="title">Manage Metatag</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Metatag</li>
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
		<div class="col-sm-5 no-padding form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-2">Show</label>
				<select class="selectpicker" data-width="80px" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
					<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
					<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
					<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
					<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
					<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
					<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
					<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
					<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
				</select>
				<span class="">per page</span>
			</div>
		</div>

	
		{if $totalRecords gt 0}
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="languagemanage" method="post"  >
			<b>Sort By : </b>
			<select name="sortby" id="sortby" size="1" onchange="document.languagemanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="lnasc" {if $smarty.request.sortby eq 'lnasc'}selected="selected"{/if}>&nbsp;&nbsp;Language Name A to Z</option>
					<option value="lndesc" {if $smarty.request.sortby eq 'lndesc'}selected="selected"{/if}>&nbsp;&nbsp;Language Name Z to A</option>
					
					<option value="lcasc" {if $smarty.request.sortby eq 'lcasc'}selected="selected"{/if}>&nbsp;&nbsp;Language Code A to Z</option>
					<option value="lcdesc" {if $smarty.request.sortby eq 'lcdesc'}selected="selected"{/if}>&nbsp;&nbsp;Language Code Z to A</option>
				</optgroup>				
			</select>
			</form>
		</div>
		{/if}
		
		<div class="col-sm-12 no-padding">	
		<!--Button Left start-->
		<div  class="manageButtonLeft">
			{if $totalRecords gt 0}	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey">
				<form name="filterform" method="post" action="metatagManage.php" onsubmit="return loadselecFile();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter">
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			{*<!--Export-->
			<div  class="filterbutton" onclick="return exportOptShowHide();">Export<img src="images/icon_plus.png" alt="Export" title="Export" /></div>
			<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
				<form name="exportform" method="post" onsubmit="return exportValidation();">
					<input type="hidden" name="action"  value="exportProcess" />
							
					<select name="exportfile" id="exportfile">				 	 
						<option value="CSV">CSV</option>
						<option value="Excel">Excel</option>	
					</select>
					<input type="submit" name="export" value="Export" class="buttonFilter" />	
				</form>				 
			</div>*}
			{/if}
			{*<!--Import-->
			<div  class="filterbutton" onclick="return importOptShowHide();">Import<img src="images/icon_plus.png" alt="Import" title="Import" /></div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
							 
				</form>
			 </div>*}
            
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			{*<a class="manageButton_addnw " href="languageAddEdit.php">Add New</a>*}
			<input type="button"  class="btn btn-sm btn-default but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-info but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-info but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','language');" />
             {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-sm btn-info" id="back" onclick="return backToContent();"/>
             {/if}
		</div>
		<!--Button List End-->
		</div>

		<span id="errormsg"></span>

		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-striped table-hover table-bordered">
				<tr >
				
					<th width="5%" >S.No</th>
					<th width="30%">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'lndesc'}onclick="sortByAscDesc('lnasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'lnasc'}onclick="sortByAscDesc('lndesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('lndesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>File Name{if $smarty.request.sortby eq 'lndesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'lnasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
					</th>
					<th width="15%" >Options</th>
					
				</tr>
				{section name=dir loop=$dir_files_list}
				{assign var="trvar" value=$smarty.section.dir.rownum}
				<tr >
					<td>{$smarty.section.dir.iteration}.</td>
					<td >
                        {if $dir_files_list[dir] eq 'checkout.php'}Checkout
                        {elseif $dir_files_list[dir] eq 'contactUs.php'}Contact Us
                        {elseif $dir_files_list[dir] eq 'customerLogin.php'}Customer Login
                        {elseif $dir_files_list[dir] eq 'customerMyaccount.php'}Customer Myaccount
                        {elseif $dir_files_list[dir] eq 'customerRegister.php'}Customer Registration
                        {elseif $dir_files_list[dir] eq 'customerResetPassword.php'}Customer Reset Password
                        {elseif $dir_files_list[dir] eq 'faq.php'}FAQ
                        {elseif $dir_files_list[dir] eq 'index.php'}Home
                        {elseif $dir_files_list[dir] eq 'orderPayment.php'}Order Payment
                        {elseif $dir_files_list[dir] eq 'restaurantOwnerLogin.php'}Restaurant Owner Login
                        {elseif $dir_files_list[dir] eq 'restaurantOwnerMyaccount.php'}Restaurant Owner Myaccount
                        {elseif $dir_files_list[dir] eq 'restaurantOwnerRegister.php'}Restaurant Owner Registration
                        {elseif $dir_files_list[dir] eq 'restaurantOwnerThanks.php'}Restaurant Owner Registration Thanks
                        {elseif $dir_files_list[dir] eq 'siteFeedback.php'}Site Feedback
                        {elseif $dir_files_list[dir] eq 'success.php'}Success
                        {elseif $dir_files_list[dir] eq 'thanks.php'}Order Success
                        {else}
                        {$dir_files_list[dir]}
                        {/if}
                        
                    </td>
					<td >
						<a href="metatagAddEdit.php?filename={$dir_files_list[dir]}" class="btn btn-light btn-icon"><i class="fa fa-pencil"></i></a>
					</td>
					
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
			</table>
		</div>
		<!--List End-->
		
		<div class="col-sm-5 col-xs-12 no-padding form-horizontal margin-top-10">
			<div class="form-group">
				<label class="control-label col-sm-2">Show</label>
				<select class="selectpicker" data-width="80px" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
					<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
					<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
					<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
					<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
					<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
					<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
					<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
					<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
				</select>
				<span class="">per page</span>
			</div>
		</div>
		<div class="col-sm-7 no-padding pull-right">
			{$pagination}
		</div>
	</div>

