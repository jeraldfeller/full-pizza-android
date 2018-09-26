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

           
            <form name="voucherAddEdit" method="post" action="" class="form-horizontal col-sm-12">
                <input type="hidden" name="AddEdit" value="{$smarty.get.vid}" />
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div id="errormsg"></div>
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label col-sm-4">Voucher Code <span class="color-red">*</span></span>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="voucherCode" id="voucherCode" value="{$voucherDet.0.voucher_name}" />
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Type Of Use <span class="color-red">*</span></span>
                   <div class="col-sm-4">
                        <div class="radio-inline radio" >
                            <input type="radio" name="useType" id="single" value="S" class="" {if $voucherDet.0.use_type neq 'M'}checked="checked"{/if}/> 
                            <label for="single"> Single </label>
                        </div>
                         <div class="radio-inline radio">
                            <input type="radio" name="useType" id="multiple" value="M" class=""  {if $voucherDet.0.use_type eq 'M'}checked="checked"{/if}/> 
                            <label for="multiple"> Multiple </label>
                        </div>
                      
                   
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Type Of Off <span class="color-red">*</span></span>
                    <div class="pull-left padding-l-r-15">
                        <div class="radio-inline radio">
                            <input type="radio" name="offType" id="Price" value="Price" class="" {if $voucherDet.0.off_type neq 'Percentage'}checked="checked"{/if}/>  
                            <label for="Price">Price</label>
                        </div>
                        <div class="radio-inline radio">
                            <input type="radio" name="offType" id="Percentage" value="Percentage" class="radiobotton" {if $voucherDet.0.off_type eq 'Percentage'}checked="checked"{/if}/> 
                            <label for="Percentage">Percentage</label>
                        </div>
                     </div>  
                      <div class="col-sm-1 no-padding-left"> 
                         <input type="text" name="offPrice" id="offPrice" value="{$voucherDet.0.off_price_percentage}" class="form-control numericfield"/>
                     </div>
                   
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Valid From <span class="color-red">*</span></span>
                     <div class="col-sm-4">
                        <div class="input-group">
                            <input class="form-control" type="text" name="validFrom" id="valid_from" value="{$voucherDet.0.valid_from|date_format:"%d-%m-%Y"}" />
                        	<span class="input-group-addon">
    							<span class="fa fa-calendar"></span>
    						</span>
                         </div>    
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Valid To <span class="color-red">*</span></span>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <input class="form-control" type="text" name="validTo" id="valid_to" value="{$voucherDet.0.valid_to|date_format:"%d-%m-%Y"}" />
                        <span class="input-group-addon">
    						<span class="fa fa-calendar"></span>
    						</span>
                         </div> 
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Assign Restaurant <span class="color-red">*</span></span>
                    <div class="col-sm-4">
                        <select class="form-control" name="restaurantList[]" id="restaurantList" multiple="multiple" size="15"> 
                            {section name="res" loop=$restaurantSearchList}
                                <option value="{$restaurantSearchList[res].restaurant_id}" {section name='resid' loop=$resList}{if $resList[resid].restaurant_id eq $restaurantSearchList[res].restaurant_id}selected="selected"{/if}{/section}>{$restaurantSearchList[res].restaurant_name|stripcslashes}</option>
                            {/section}
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <input class="btn btn-default" type="button" value="Submit" onclick="return AddEditVoucher({if $smarty.get.vid neq ''}1{else if $smarty.get.vid eq '' }0{/if});"/>
                        <a class="btn" href="voucherManage.php">Cancel</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

 