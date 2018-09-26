<div class="page-header">
    <h1 class="title">Manage Payment Info</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Payment Info</li>
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
		
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="paymentinfo" method="post" action="paymentInfoManage.php" />
		<div class="pull-right">
            <span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.paymentinfo.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
					<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
				</optgroup>
			</select>
        </div>
			</form>
		</div>
		
		<!--Button Right start-->
        <div class="col-sm-12 no-padding">
		<div class="manageButtonLastCont">
			<!--<a class="manageButton_addnw" href="paymentInfoAddEdit.php">Add New</a>-->
			<input type="button"  class="btn btn-sm btn-default but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-inof but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<!--<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','cuisine');" />-->
		     {if $smarty.request.searchrestaurantid neq '' or $smarty.request.keyword neq '' or $smarty.request.sortby neq ''}
			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
             {/if}
        </div>
        </div>
		<!--Button Right End-->
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-bordered table-hover table-striped">
				<tr >
					<th width="3%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="7%" >S.No</th>
					<th width="30%" >Payment Name</th>
					{if $smarty.get.resid neq ''}
					<th width="15%" >Payment Method</th>
					{/if}
					{*<th width="15%" >Payment Photo</th>*}
                    <th width="5%" >Id</th>
					{if $smarty.get.resid eq ''}
                    
					<th width="5%" >Status</th>
                    {if $VIEWABLE eq 'Yes'}
					<th width="10%" >Action</th>
                    {/if}
					{/if}
				</tr>
				{section name="pay" loop=$paymentinfo_List}
                {*if $paymentinfo_List[pay].paymentinfo_id eq '1'*}
				{assign var="trvar" value=$smarty.section.pay.rownum}
				<tr >
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="{$paymentinfo_List[pay].paymentinfo_id}" onclick="individualSelect();" id="tableselect_{$smarty.section.pay.rownum}" />
							<label for="tableselect_{$smarty.section.pay.rownum}"></label>
						</div>
						</td>
					<td >{$paymentinfo_List[pay].sno}</td>
					<td >{$paymentinfo_List[pay].paymentinfo_name|stripslashes}</td>
					{if $smarty.get.resid neq ''}
					<td >
						{if $paymentinfo_List[pay].paymentmethod eq 'Yes'}
						<img src="images/star_yellow.png" alt="Payment Select" title="Payment Select" onclick="return selectPaymentMethod('No','paymentmethod','{$whereField}','{$tablename}','{$word}','{$paymentinfo_List[pay].paymentinfo_id}','{$smarty.get.resid}','{$paymentinfo_List[pay].paymentinfo_status}');" style="cursor:pointer;" />
						{else}
						<img src="images/star_grey.png" alt="Payment Delete" title="Payment Delete" onclick="return selectPaymentMethod('Yes','paymentmethod','{$whereField}','{$tablename}','{$word}','{$paymentinfo_List[pay].paymentinfo_id}','{$smarty.get.resid}','{$paymentinfo_List[pay].paymentinfo_status}');" style="cursor:pointer;" />
						{/if}
					</td>
					{/if}
					{*<td >
						{if $paymentinfo_List[pay].paymentinfo_photo neq ''}
							<div class="largeImgTooltip">
								<img src="{$SITE_IMAGE_PAYMENTINFO_URL}/{$paymentinfo_List[pay].paymentinfo_photo|stripslashes}" alt="{$paymentinfo_List[pay].paymentinfo_name|stripslashes}" title="{$paymentinfo_List[pay].paymentinfo_name|stripslashes}" class="imgborder" />
							</div>
						{else}
							No Photo
						{/if}
					</td>*}
                    <td >{$paymentinfo_List[pay].paymentinfo_id}</td>
					{if $smarty.get.resid eq ''}	
					<td  id="chgstatus{$paymentinfo_List[pay].paymentinfo_id}">
						{if $paymentinfo_List[pay].paymentinfo_status eq '1'}
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$paymentinfo_List[pay].paymentinfo_id}','{$filename}');" style="cursor:pointer;" />
						{else}
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$paymentinfo_List[pay].paymentinfo_id}','{$filename}');" style="cursor:pointer;" />
						{/if}
					</td>
					{if $VIEWABLE eq 'Yes'}
					<td >
						<span class="EditDeleteButton">
							<a href="paymentInfoAddEdit.php?payid={$paymentinfo_List[pay].paymentinfo_id}" class="btn btn-light btn-icon btn-sm">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$paymentinfo_List[pay].paymentinfo_id}','cuisine');" style="cursor:pointer;" />
						</span>
					</td>
                    {/if}
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