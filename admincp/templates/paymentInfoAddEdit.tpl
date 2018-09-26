<div class="page-header">
    <h1 class="title">{if $smarty.get.payid neq ''}Edit Payment Info{else}Add New Payment Info{/if}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.payid neq ''}Edit Payment Info{else}Add New Payment Info{/if}</li>
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
		<form name="addNewPaymentInfo" method="post" enctype="multipart/form-data" onsubmit="{if $smarty.get.payid neq ''}return editPaymentInfoValidate();{else}return addNewPaymentInfoValidate();{/if}" class="form-horizontal col-sm-12">
			<input type="hidden" name="action" value="{if $smarty.get.payid eq ''}paymentInfoAdd{else}paymentInfoEdit{/if}">
			<input type="hidden" name="payid" id="payid" value="{$smarty.get.payid}">
			<div class="form-group">
	            <div class="col-sm-8">
		 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-sm-8 col-sm-offset-4">
	                <div id="errormsg">{$error}</div>
	            </div>
	        </div>
			<div class="form-group">
				<span class="control-label col-sm-4">Payment Info Name <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="paymentinfo_name" id="paymentinfo_name" value="{if $smarty.get.payid neq ''}{$selectPaymentinfoValue.0.paymentinfo_name|stripslashes}{/if}" />
					<script type="text/javascript">document.addNewPaymentInfo.paymentinfo_name.focus();</script>
				</div>
			</div>
			{*<div class="form-group">
				<span class="control-label col-sm-4">Payment Info Photo <span class="color-red">*</span></span>	
				<div class="col-sm-4">	
					<input class="fileUpload" type="file" name="paymentinfo_photo" id="paymentinfo_photo" value="" style="display:none;" />
					 <label for="paymentinfo_photo" class="btn btn-default btn-sm" >
                      	<i class="fa fa-folder-open"></i> Add Payment image		
                    </label>
				{if $smarty.get.payid neq '' and $selectPaymentinfoValue.0.paymentinfo_photo neq ''}
				<div class="photoContainer">
					<img src="{$SITE_IMAGE_PAYMENTINFO_URL}/{$selectPaymentinfoValue.0.paymentinfo_photo}" alt="{$selectPaymentinfoValue.0.paymentinfo_name|stripslashes}" title="{$selectPaymentinfoValue.0.paymentinfo_name|stripslashes}" />
				</div>
				{/if}
				</div>
			</div>*}	
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
    				<input type="submit" class="btn btn-default" id="PaymentAdd" name="cus_addEdit" value="{if $smarty.get.payid neq ''}Edit{else}Add{/if}">
    				<a class="btn" href="paymentInfoManage.php">Cancel</a>
                </div>
			</div>
					
		</form>
			
		</div>
	</div>
