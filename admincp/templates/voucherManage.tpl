<div class="page-header">
    <h1 class="title">Manage Voucher {if $smarty.get.vid} - {$restname}{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Voucher {if $smarty.get.vid} - {$restname}{/if}</li>
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

            <div  class="filterbutton">
    			<span class="topName1">Total Records:</span> <span class="topName2">{$totalRecords}</span>
    			<span class="topName1">Active Records:</span> <span class="topName2">{$active}</span>
    			<span class="topName1">Deactive Records:</span> <span class="topName2">{$deactive}</span>
    		</div>
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
            <!-- Sort By -->
    		<div class="col-sm-7 no-padding">	
    			<form name="restaurantoffermanage" method="post" action="voucherManage.php" >
                <input type="hidden" name="keyword"  value="{$smarty.request.keyword}" />
    		  <div class="pull-right">
    			<span class="restManageNameSort">Sort By</span>
    			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.restaurantoffermanage.submit();">
    				<option value="">Select</option>
    				<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
    				<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
    			</select>
            </div>
    			</form>
    		</div>
            <div class="col-sm-12 no-padding">
		<!--Button Left start-->
			<div  class="manageButtonLeft">	
				<!--Filter-->
				<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
                     <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
                </div>
                <div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
					<form name="filterform" method="post" action="voucherManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filter" />
						<input type="hidden" name="sortby"  value="{$smarty.request.sortby}" />
						
						<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="textboxFilter" placeholder="Voucher Code" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
					</form>	 
				</div>
                 
			</div>
			<!--Button Left End-->
            <!--Button Right start-->
    		<div class="manageButtonLastCont">
    			{if $smarty.get.resid}<a class="btn btn-info btn-sm" href="voucherManage.php{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{/if}">Back</a>{/if}
    			
    			<a class="btn btn-default btn-sm" href="voucherAddEdit.php{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.page neq ''}?page={$smarty.request.sortby}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if} {if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.limit neq ''}?limit={$smarty.request.limit}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.request.sortby neq ''}?sortby={$smarty.request.sortby}{elseif $smarty.request.keyword neq ''}?keyword={$smarty.request.keyword}{elseif $smarty.request.searchrestaurantid neq ''}?searchrestaurantid={$smarty.request.searchrestaurantid}{/if}"><i class="fa fa-plus-circle"></i>  Add New</a>
    			
    			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
    			<input type="button" class="btn btn-primary btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
    			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','restoffer');" />
                {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
                     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 {/if}
    		</div>
    		<!--Button List End-->
        </div>
        <span id="errormsg"></span>
           
            <!--List Start-->
    		<div class="tableListContainer table-container">
    			<table class="table table-bordered table-hover table-striped">
    				<tr>
    					<th width="5%">
                            <div class="checkbox checkbox-primary no-margin">
                                <input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
                                <label for="selectall"></label>
                            </div>
                        </th>
    					<th width="5%">S.No</th>
    					<th width="20%">Voucher Code</th>
    					<th width="10%">Type of use</th>
                        <th width="10%">Offer</th>
    					<th width="10%">Valid From</th>
    					<th width="8%">Valid To</th>
    					<th width="10%">Added Date</th>
    					<th width="5%">Status</th>
                        {if $VIEWABLE eq 'Yes'}
    					<th width="10%">Action</th>
                        {/if}
    				</tr>									
    				{section name=list loop=$voucherList}
    				{assign var="trvar" value=$smarty.section.maincat.rownum}
    				<tr id="deletecate{$voucherList[list].id}">
    					<td>
                            <div class="checkbox checkbox-primary no-margin">
                                <input type="checkbox" id="tableselect_{$smarty.section.list.rownum}" class="case" value="{$voucherList[list].id}" onclick="individualSelect();" />
                                <label for="tableselect_{$smarty.section.list.rownum}">&nbsp;</label>
                            </div>
                        </td>
    					<td>{$voucherList[list].sno}</td>
    					<td>{$voucherList[list].voucher_name|stripslashes}</td>
                        <td>{if $voucherList[list].use_type eq 'S'}Single{else}Multiple{/if}</td>
                        <td>{if $voucherList[list].off_type eq 'Price'}Price({$voucherList[list].off_price_percentage|stripslashes}){elseif $voucherList[list].off_type eq 'Percentage'}Percentage({$voucherList[list].off_price_percentage|stripslashes} %){/if}</td>
    					
    					<td>{$voucherList[list].valid_from|date_format:"%d-%m-%Y"}</td>
    					<td>{$voucherList[list].valid_to|date_format:"%d-%m-%Y"}</td>
                        <td>{$voucherList[list].addeddate|date_format:"%d-%m-%Y %H:%M"}</td>
    					<td id="chgstatus{$voucherList[list].id}">
    						{if $voucherList[list].status eq '1'}
    						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$voucherList[list].id}','{$filename}');" style="cursor:pointer;" />
    						{else}
    						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$voucherList[list].id}','{$filename}');" style="cursor:pointer;" />
    						{/if}
    					</td>
                        {if $VIEWABLE eq 'Yes'}
    					<td>
    						<span class="EditDeleteButton">
    							<a href="voucherAddEdit.php?vid={$voucherList[list].id}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.request.page}&page={$smarty.request.page}{/if}{if $smarty.request.limit}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}"  class="btn btn-light btn-icon btn-sm">
    								<i class="fa fa-pencil"></i>
    							</a>
    						</span>
    						<span class="EditDeleteButton">
                                <a href="javascript:;"  class="btn btn-light btn-icon btn-sm" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$voucherList[list].id}','restoffer');" >
    							 <i class="fa fa-close"></i>
                                </a>
    						</span>
    					</td>
                        {/if}
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
        </div>

 