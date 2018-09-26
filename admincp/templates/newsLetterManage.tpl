<div class="page-header">
    <h1 class="title">News Letter</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">News Letter</li>
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
		<input type="hidden" name="action_user" id="action_user" value="{$smarty.request.action}">
		
		{if $totalRecords gt 0}
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="newsletter" method="post" action="newsLetterManage.php" >
			<input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
            <div class="pull-right">
    			<span class="restManageNameSort">Sort By</span>
    			<select name="sortby" id="sortby" size="1" onchange="document.newsletter.submit();" class="selectpicker">
    				<option value="">Select</option>
    				{*<optgroup label="Status">
    					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
    					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
                        <option value="pending" {if $smarty.request.sortby eq pending} selected="selected"{/if}>&nbsp;&nbsp;pending</option>
    				</optgroup>*}
    				<optgroup label="Others">
    					<option value="easc" {if $smarty.request.sortby eq 'easc'}selected="selected"{/if}>&nbsp;&nbsp;Email A to Z</option>
    					<option value="edesc" {if $smarty.request.sortby eq 'edesc'}selected="selected"{/if}>&nbsp;&nbsp;Email Z to A</option>
    				</optgroup>				
    			</select>
            </div>
			</form>
		</div>
		{/if}
		<div class="col-sm-12 no-padding">
		<!--Button Left start-->
		<div  class="manageButtonLeft">
			{if $totalRecords gt 0}
            <div class="col-sm-4 col-sm-offset-4">
			{if $ErrorMessage neq ""}
				<span class="errormsg">{$ErrorMessage}</span>{/if}
			{if $SuccessMessage neq ""}
				 <span class="successmsg">{$SuccessMessage}</span>
			{/if}	
			</div>
			<!--Filter-->
		    <div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none">
				<form name="filterform" method="post" action="newsLetterManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
				
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Email">
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			<!--Export-->
		  {*<div  class="filterbutton" onclick="return exportOptShowHide();">Export<img src="images/icon_plus.png" alt="Export" title="Export" /></div>
			<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
				<form name="exportform" method="post" onsubmit="return exportValidation();">
					<input type="hidden" name="action"  value="exportProcess" />
							
					<select name="exportfile" id="exportfile">				 	 
						<option value="CSV">CSV</option>
						<option value="Excel">Excel</option>	
					</select>
					<input type="submit" name="export" value="Export" class="buttonFilter" />	
				</form>				 
			</div> *}
			{/if}
			<!--Import-->
	   	   {*<div  class="filterbutton" onclick="return importOptShowHide();">Import<img src="images/icon_plus.png" alt="Import" title="Import" /></div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
							 
				</form>
			 </div> *}
             
		</div> 
		<!--Button Left End-->
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
        
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			
			<a class="btn btn-info btn-sm" href="mail_news.php?flag=all_site{if $smarty.request.action neq '' and $smarty.request.action eq 'reg_user'}&action=reg_user{/if}" class="button1 add_new"><span><span>Send Mail to All Users</span></span></a>			
			<a class="btn btn-info btn-sm" href="#" onclick="return ifCheck('Mail');" class="button1 add_new"><span>Send Mail to Selected Users</span></a>
            {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
    		     <input type="button" name="back" value="Back" class="btn btn-sm btn-info" id="back" onclick="return backToContent();"/>
             {/if}
			
		</div>
		<!--Button List End-->
        </div>
		
		<!--List Start-->
		<form name="form1" method="post" action="mail_news.php"> 
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-bordered table-hover table-striped">
				<tr>
					<td width="3%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</td>
					<td width="7%" >ID.Nr.</td>
					<td width="35%">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'edesc'}onclick="sortByAscDesc('easc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'easc'}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('edesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Email{if $smarty.request.sortby eq 'edesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'easc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					{*<td width="15%" >User Name</td>
					<td width="15%">Contact Number</td>*}
					<td width="15%" >Added Date</td>
					{*<td width="5%" >Status</td>*}
				</tr>
				{section name=maincat loop=$newsletterlist}
				{assign var="trvar" value=$smarty.section.maincat.rownum}
				<tr >
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" name="Sel_Id[]" class="case" value="{$newsletterlist[maincat].id}" onclick="individualSelect();" id="tableselect_{$smarty.section.maincat.rownum}" />
							<label for="tableselect_{$smarty.section.maincat.rownum}"></label>
						</div>
					</td>
					<td >{$newsletterlist[maincat].sno}</td>
					<td >{$newsletterlist[maincat].customer_email|stripslashes|utf8_encode}</td>
					{*<td >{$newsletterlist[maincat].customer_name|stripslashes|utf8_encode} {$newsletterlist[maincat].customer_lastname|stripslashes|utf8_encode}</td>
					<td >{if $newsletterlist[maincat].customer_phone neq 0}{$newsletterlist[maincat].customer_phone|stripslashes|utf8_encode}{/if}</td>*}
					<td >{$newsletterlist[maincat].added_date}</td>
					{*<td  id="chgstatus{$newsletterlist[maincat].id}">
						{if $newsletterlist[maincat].status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$newsletterlist[maincat].customer_id}','{$filename}');" style="cursor:pointer;" />
						{elseif $newsletterlist[maincat].status eq '0'}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$newsletterlist[maincat].customer_id}','{$filename}');" style="cursor:pointer;" />
						{elseif $newsletterlist[maincat].status eq '2'}
						<img src="images/icon_pending.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$newsletterlist[maincat].customer_id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>*}
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
			</table>
		</div>
		</form>
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
		<!--Button List End-->
	</div>


{literal}
<script>
function ifCheck(val)
{   
		var flag=false;		
		
		for(i=0;i<document.form1.elements.length;i++)
		{		
			if(document.form1.elements[i].name=="Sel_Id[]")
			{
				if(document.form1.elements[i].checked)
				{
					flag=true;	
					break;
				}
			}
		}	
		if(flag)
		{
		var answer = confirm('Are you sure want to send Mail?')
			if (answer)
			{
				document.form1.action='mail_news.php';
				document.form1.submit();		
			}
		}
		else
		{	
			alert("Select Atleast One Email");
			return false;
		}
}
</script>
{/literal}
