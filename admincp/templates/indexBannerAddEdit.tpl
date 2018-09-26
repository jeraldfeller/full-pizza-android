<div class="adminRight span9 offset0 pull-right">
<div class="rightContHeading Heading">{if $smarty.get.cusid neq ''}Edit Index Banner{else}Add New Index Banner{/if}</div>
<div class="rightContBody">

	<div class="riteContWrap1">
		<div id="errormsg">{$error}</div>
		<div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
		<form name="addNewBanner" method="post" enctype="multipart/form-data" onsubmit="{if $smarty.get.cusid neq ''}return editIndexBanner();{else}return addIndexBanner();{/if}">	
		<input type="hidden" name="action" value="{if $smarty.get.id eq ''}bannerAdd{else}bannerEdit{/if}">
		<input type="hidden" name="id" id="id" value="{$smarty.get.id}">
			
			<div class="addPageCont">
				<span class="addPageRightFont">Banner Photo <span class="color1">*</span></span>	
				<span class="colon1">:</span>							
				<div class="photoUpload">
					<div class="Photo">	
						<input class="fileUpload" type="file" name="banner_photo" id="banner_photo" value="" />
					</div>
				</div>
				<div class="tooltip"><div class="HelpButton">?</div><span>Upload banner photo</span></div>
				{if $smarty.get.id neq '' and $selectBannerValue.0.banner_photo neq ''}
					<img src="{$SITE_IMAGE_BANNER_URL}/{$selectBannerValue.0.banner_photo}" alt="{$selectBannerValue.0.banner_photo|stripslashes}" title="{$selectBannerValue.0.banner_photo|stripslashes}" width="225" height="210" />
				{/if}
				
			</div>		
			
			<div class="buttonCont2">
				<input type="submit" class="button" name="cus_addEdit" value="{if $smarty.get.id neq ''}Edit{else}Add{/if}">
				<a class="CanceButton" href="indexBannerManage.php">Cancel</a>
			</div>
		</form>
	</div>
</div>
</div>