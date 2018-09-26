<div class="page-header">
    <h1 class="title">{if $smarty.get.eid neq ''}Edit{else}Add{/if} Restaurant</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{if $smarty.get.eid neq ''}Edit{else}Add{/if} Restaurant</li>
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
<a class="setting_button visible-xs" href="#">
        <i class="fa fa-bars"></i>
    </a>
    <div class="adminRight">
		<form name="addNewRestaurant" method="post" action="{if $smarty.get.eid neq ''}restaurantAddEdit.php?eid={$smarty.get.eid}{else}restaurantAddEdit.php{/if}" onsubmit="return addRestaurantValidate();" enctype="multipart/form-data">
    		<input type="hidden" name="eid" id="eid" value="{$smarty.get.eid}" />
    		<input type="hidden" name="action" value="{if $smarty.get.eid eq ''}Add{else}Edit{/if}">
    		{* -------------------- For Redirect URL ------------------------- *}
    		<input type="hidden" name="sortby" value="{$smarty.request.sortby}">
    		<input type="hidden" name="keyword" value="{$smarty.request.keyword}">
    		<input type="hidden" name="page" value="{$smarty.request.page}">
    		<input type="hidden" name="searchrestaurantid" value="{$smarty.request.searchrestaurantid}">
    		{*-------------------------------------------------------------*}
    		<ul class="nav nav-tabs settings_tab tabcolor5-bg">
    			<li class="active"> 
                    <a href="#contactinfo" id="contactinfo_tab" aria-controls="contactinfo" role="tab" data-toggle="tab">Contact Info </a>
                </li>
    			<li><a  href="#restinfo" aria-controls="restinfo" role="tab" data-toggle="tab">Restaurant Info </a></li> 
    			<li><a href="#deliveryinfo" aria-controls="deliveryinfo" role="tab" data-toggle="tab" onclick="viewMap();">
                Delivery Info </a> </li>
    			<li><a href="#orderinfo" id="orderinfo_tab" aria-controls="orderinfo" role="tab" data-toggle="tab">Order Info </a> </li>
    			<li><a href="#restphoto" aria-controls="restphoto" role="tab" data-toggle="tab">Restaurant Photo </a></li>
    			<li><a href="#commission" aria-controls="commission" role="tab" data-toggle="tab">Commission Info </a></li>
    			<li><a href="#bankinfo" aria-controls="bankinfo" role="tab" data-toggle="tab">Bank A/c Info </a></li>
    			{*{if $smarty.get.eid neq ''}<a href="javascript:void(0);" id="restaurantreviews">Restaurant Reviews </a>{/if}*}
    		</ul>
    		<div class="tab-content clearfix">
    		{* ----------- Contact Info ------------- *}
    		<div role="tabpanel" class="tab-pane active form-horizontal" id="contactinfo">
    			{include file='restaurantAddEdit_contactinfo.tpl'}
    		</div>
    		
    		{* ---------------- Restaurant Info  ------------------------ *}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="restinfo">
            
    		<input type="hidden" name="rest_info" id="rest_info" value=""/>
    			{include file='restaurantAddEdit_restaurantinfo.tpl'}
    		</div>
    		{*------------------- Delivery Info ---------------------*}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="deliveryinfo">
    		<input type="hidden" name="deli_info" id="deli_info" value=""/>
    			{include file='restaurantAddEdit_deliveryinfo.tpl'}
    		</div>
    		{*------------------ Order Info --------------------------*}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="orderinfo">
    		<input type="hidden" name="order_info" id="order_info" value=""/>
    			{include file='restaurantAddEdit_orderinfo.tpl'}
    		</div>
    		
    		{*-------------- Restaurant Photo ---------------------*}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="restphoto">
    		<input type="hidden" name="photo_info" id="photo_info" value=""/>
    			{include file='restaurantAddEdit_restaurantphoto.tpl'}
    		</div>
    		
    		{*------------------- Restaurant Commission -------------------*}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="commission">
    			<input type="hidden" name="commission_info" id="commission_info" value=""/>
    			{include file='restaurantAddEdit_commission.tpl'}
    		</div>
    		
    		{*--------------------- Bank A/C Info ---------------------------*}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="bankinfo">
    			<input type="hidden" name="bank_info" id="bank_info" value=""/>
    			{include file='restaurantAddEdit_bankinfo.tpl'}
    		</div>
    		{*---------------------- Restaurant Reviews -----------------
    		<div class="restaurantTabContent" id="restaurantreviews_content" style="display:none;">
    			Reviews
    		</div>*}
            <div class="col-sm-12">
        		<div class="form-group">
            		<div class="col-sm-4 col-sm-offset-4">
            			<input type="submit" class="btn btn-default" id="restaurantAdd" value="{if $smarty.get.eid || $smarty.get.seid}Save{else}Add{/if}"> 
            			<a class="btn" href="restaurantManage.php{if $smarty.request.page neq ''}?page={$smarty.request.page}{else}?page=1{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}">Cancel</a>
            		</div>
                </div>
            </div>
            </div>
    	</form>
	
			
    </div>	
