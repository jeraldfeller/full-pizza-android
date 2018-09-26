{* ----------- Restaurant Photos ---------------- *}
{*<div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>*}

	{*<div class="addPageCont">
		<span class="addPageRightFont">Display Option </span>
		<span class="colon1">:</span>
		<span class="radioBtn">
		<span class="labelcont"><input class="radiobotton" type="radio" name="restaurant_display" id="restaurant_display_ph" value="photo" {if $smarty.get.eid neq ''}  {if $restaurantEditList.0.restaurant_displayoption eq 'photo'} checked="checked" {/if} {else}checked="checked" {/if}/><label class="labelfont" for="restaurant_display_ph">&nbsp;Photos</label> </span>
		<span class="labelcont"><input class="radiobotton" type="radio" name="restaurant_display" id="restaurant_display_vid" value="video" {if $smarty.get.eid neq ''} {if $restaurantEditList.0.restaurant_displayoption eq 'video'} checked="checked" {/if} {/if} /><label class="labelfont" for="restaurant_display_vid">&nbsp;Video</label></span>	
		</span>
	</div>*}
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Display photos</span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
    			<input class="" type="radio" name="restaurant_display_photo" id="restaurant_display_photo_yes" value="Yes" {if $restaurantEditList.0.restaurant_display_photo eq 'Yes'} checked="checked" {/if} />
            	<label for="restaurant_display_photo_yes">Yes</label>
            </div> 
            <div class="radio-inline radio">
           		<input class="" type="radio" name="restaurant_display_photo" id="restaurant_display_photo_no" value="No" {if $smarty.get.eid neq ''} {if $restaurantEditList.0.restaurant_display_photo eq 'No'} checked="checked" {/if} {else}checked="checked" {/if} />
           		<label for="restaurant_display_photo_no">No</label>
            </div>
		</div>
	</div>
	
	{*<div class="photoDispOpt" {if $restaurantEditList.0.restaurant_display_photo eq 'No' or $smarty.get.eid eq ''} style="display:none;" {/if}>
		<div class="photoDispOpt" id="photoDispOpt" >
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal ">Restaurant Photo1 </label>
				<div class="col-sm-4">
				    <input class="fileUpload" type="file" name="restaurant_photos1" id="restaurant_photos1" size="25" style="display:none;" />
                    <label for="restaurant_photos1" class="btn btn-default btn-sm valigntop" >
                      <i class="fa fa-folder-open"></i> Add Restaurant photo		
                    </label>
					
                    
        			{if $smarty.get.eid neq '' and $restaurantEditList.0.restaurant_photos1 neq ''}
        				<div id="res_photo1" class="inline-block">
        					<div class="photoContainer" >
        						<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$restaurantEditList.0.restaurant_photos1}"alt="image" width="70" height="70">
                                <a href="javascript:void(0);" id="restaurantphoto1" onclick="deletephotos('{$smarty.get.eid}','1');" class="upload-cls btn btn-icon btn-light btn-rounded"><i class="fa fa-close"></i></a>
        					</div>	
        				</div>
        			{/if}
    				</div>
			</div>
			<span id="resPhoErr"></span>
		</div>
		
		<div class="photoDispOpt" id="photoDispOpt2" >
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal">Restaurant Photo2 </label>
				<div class="col-sm-4">
					<input class="fileUpload" type="file" name="restaurant_photos2" id="restaurant_photos2" size="25" style="display:none;" />
                     <label for="restaurant_photos2" class="btn btn-default btn-sm valigntop" >
                      <i class="fa fa-folder-open"></i> Add Restaurant photo		
                    </label>
					
        			{if $smarty.get.eid neq '' and $restaurantEditList.0.restaurant_photos2 neq ''}
        				<div id="res_photo2" class="inline-block" >
        					<div class="photoContainer">
        						<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$restaurantEditList.0.restaurant_photos2}"alt="image" width="70" height="70">
                                <a href="javascript:void(0);" id="restaurantphoto2" onclick="deletephotos('{$smarty.get.eid}','2');" class="upload-cls btn btn-icon btn-light btn-rounded"><i class="fa fa-close"></i></a>
        					</div>
        				    
        				</div>	
        			{/if}	
        			</div>
            </div>
		</div>
		
		<div class="photoDispOpt" id="photoDispOpt3" >
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal ">Restaurant Photo3 </label>
				<div class="col-sm-4">
					<input class="fileUpload" type="file" name="restaurant_photos3" id="restaurant_photos3" size="25" style="display:none;" />
                    <label for="restaurant_photos3" class="btn btn-default btn-sm valigntop" >
                      <i class="fa fa-folder-open"></i> Add Restaurant photo		
                    </label>
        			{if $smarty.get.eid neq '' and $restaurantEditList.0.restaurant_photos3 neq ''}
        				<div id="res_photo3" class="inline-block">
        					<div class="photoContainer">
        						<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$restaurantEditList.0.restaurant_photos3}"alt="image" width="70" height="70">
                                <a href="javascript:void(0);" id="restaurantphoto3" class="upload-cls btn-rounded btn btn-icon btn-light" onclick="deletephotos('{$smarty.get.eid}','3');"><i class="fa fa-close"></i></a>
        					</div>
        				    
        				</div>
        			{/if}.
               </div>	
			</div>
		</div>
		
		<div class="photoDispOpt" id="photoDispOpt4" >
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal">Restaurant Photo4 </label>
				<div class="col-sm-4">
				    <label for="restaurant_photos4" class="btn btn-default btn-sm valigntop" >
                      <i class="fa fa-folder-open"></i> Add Restaurant photo		
                    </label>
				    <input class="fileUpload" type="file" name="restaurant_photos4" id="restaurant_photos4" size="25" style="display:none;" />
                
    			{if $smarty.get.eid neq '' and $restaurantEditList.0.restaurant_photos4 neq ''}
    				<div id="res_photo4" class="inline-block">	
    					<div class="photoContainer">
    						<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$restaurantEditList.0.restaurant_photos4}"alt="image" width="70" height="70">
                            	<a href="javascript:void(0);" id="restaurantphoto4" onclick="deletephotos('{$smarty.get.eid}','4');" class="upload-cls btn btn-icon btn-light btn-rounded"><i class="fa fa-close"></i></a>
    					</div>
    				
    				</div>
    			{/if}
                </div>	
			</div>
		</div>
	</div>*}
	
	{*<div class="mapDispOpt" id="mapDispOpt" style="display: none;">
		<div class="addPageCont">
			<label class="addPageRightFont">Restaurant Map <span class="color1">*</span></label>
			<span class="colon1">:</span>
			<div class="map">
				<div class="map">
						<textarea class="addPageTxtArea" name="restaurant_map" id="map" />{$restaurantEditList.0.restaurant_map|stripslashes}</textarea>		
						<span id="resMapErr"></span>
				</div>
			</div>
			<div class="tooltip"><div class="HelpButton">?</div><span>Restaurant Map</span></div>
		</div>
	</div>*}
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Display Videos</span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
    			<input class="" type="radio" name="restaurant_display_video" id="restaurant_display_video_yes" value="Yes" {if $restaurantEditList.0.restaurant_display_video eq 'Yes'} checked="checked" {/if} />
    			<label for="restaurant_display_video_yes">Yes</label>
            </div> 
    		<div class="radio-inline radio">	
    			<input class="radiobotton" type="radio" name="restaurant_display_video" id="restaurant_display_video_no" value="No" {if $smarty.get.eid neq ''} {if $restaurantEditList.0.restaurant_display_video eq 'No'} checked="checked" {/if} {else} checked="checked"{/if}/>
                <label for="restaurant_display_video_no">No</label>
            </div> 
        </div>
	</div>
	
	<div class="videoDispOpt" id="videoDispOpt" {if $restaurantEditList.0.restaurant_display_video eq 'No' or $smarty.get.eid eq ''} style="display: none;" {/if}>
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">Restaurant Video </label>
			<div class="col-sm-4">
    			<textarea class="form-control" rows="8" name="restaurant_video" id="vid" >{$restaurantEditList.0.restaurant_video|stripslashes}</textarea>		
    			<span id="resVideoErr"></span>
            </div>
		</div>
	</div>
	
	{*<div class="addPageCont">
		<span class="addPageRightFont">Market Banner</span>
		<span class="colon1">:</span>
		<span class="radioBtn">
			<span class="labelcont"><input class="radiobotton" type="radio" name="restaurant_market_banner" id="restaurant_banner_img" value="img" {if $smarty.get.eid neq ''}  {if $restaurantEditList.0.res_marketbanner_option eq 'img'} checked="checked" {/if} {else}checked="checked" {/if}/><label class="labelfont" for="restaurant_banner_img">&nbsp;Image</label> </span>
			<span class="labelcont"><input class="radiobotton" type="radio" name="restaurant_market_banner" id="restaurant_banner_code" value="code" {if $smarty.get.eid neq ''} {if $restaurantEditList.0.res_marketbanner_option eq 'code'} checked="checked" {/if} {/if} /><label class="labelfont" for="restaurant_banner_code">&nbsp;Code</label></span>
		</span>
	</div>*}
	
	{*<div class="addPageCont">
		<span class="addPageRightFont">Display Banners</span>
		<span class="colon1">:</span>
		<span class="radioBtn">
			<span class="labelcont"><input class="radiobotton" type="radio" name="restaurant_display_banner" id="restaurant_display_banner_yes" value="Yes" {if $restaurantEditList.0.restaurant_display_banner eq 'Yes'} checked="checked" {/if} /><label class="labelfont" for="restaurant_display_banner_yes">&nbsp;Yes</label> </span>
			
			<span class="labelcont"><input class="radiobotton" type="radio" name="restaurant_display_banner" id="restaurant_display_banner_no" value="No" {if $smarty.get.eid neq ''}{if $restaurantEditList.0.restaurant_display_banner eq 'No'} checked="checked" {/if}{else}checked="checked"{/if} /><label class="labelfont" for="restaurant_display_banner_no">&nbsp;No</label> </span>
		</span>
	</div>
	
	<div class="bannerDispOpt" id="marketbannerimageOpt" {if $restaurantEditList.0.restaurant_display_banner eq 'No' or $smarty.get.eid eq ''} style="display:none;" {/if}>
		<div class="addPageCont">
			<label class="addPageRightFont">Market Banner Image </label>
			<span class="colon1">:</span>
			<div class="photoUpload">
				<div class="Photo">
					<input class="fileUpload" type="file" name="market_ban_image" id="market_ban_image" size="25" />
				</div>
			</div>
			<span id="resBannerErr"></span>
		<div class="tooltip"><div class="HelpButton">?</div><span>Upload Market Banner Image</span></div>
		{if $smarty.get.eid neq '' and $restaurantEditList.0.res_marketbanner_img_code neq ''}
			<div id="res_photo4">	
				<div class="photoContainer">
					<img src="{$SITE_IMAGE_RESTAURANT_URL}/banner/{$restaurantEditList.0.res_marketbanner_img_code}"alt="image" width="70" height="70">
				</div>
				&nbsp;&nbsp;&nbsp;<!--<a href="javascript:void(0);" id="restaurantphoto4" onclick="deletephotos('{$smarty.get.eid}','4');">Delete</a>-->
			</div>
		{/if}	
		</div>
	</div>*}
	
	{*<div id="marketbannercodeOpt" {if $restaurantEditList.0.res_marketbanner_option neq 'code'} style="display: none;" {/if}>
		<div class="addPageCont">
			<label class="addPageRightFont">Market Banner Code<span class="color1">*</span></label>
			<span class="colon1">:</span>
			<div class="vid">
				<div class="vid">
						<textarea class="addPageTxtArea" name="market_ban_code" id="market_ban_code" />{if $restaurantEditList.0.res_marketbanner_option eq 'code'} {$restaurantEditList.0.res_marketbanner_img_code}{/if}</textarea>		
						<span id="resBannerCodeErr"></span>
				</div>
			</div>
			<div class="tooltip"><div class="HelpButton">?</div><span>Upload Market Banner Code</span></div>
		</div>
	</div>*}
	
