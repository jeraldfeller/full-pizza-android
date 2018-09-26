<!DOCTYPE html >
<html >
<head>

	<title>{$SITE_NAME} Admin Panel</title>
	{if $smarty.session.lan eq 'CS' || $smarty.session.lan eq 'SK' || $smarty.session.lan eq 'SL' || $smarty.session.lan eq 'AR' || $smarty.session.lan eq 'LT' || $smarty.session.lan eq 'TR' || $smarty.session.lan eq 'ES' || $smarty.get.langcode eq 'CS' || $smarty.get.langcode eq 'SK' || $smarty.get.langcode eq 'SL' || $smarty.get.langcode eq 'AR' || $smarty.get.langcode eq 'LT' || $smarty.get.langcode eq 'TR' || $smarty.get.langcode eq 'ES'}
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	{else}
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	{/if}
    
    {*{if $req_file_name neq 'index.php'}
    <link rel="shortcut icon" href="{$SITE_BASEURL}/favicon.ico" type="image/x-icon" />*}
	{if $SITE_FAVICON neq ''}
		<link rel="shortcut icon" href="{$SITE_IMAGE_LOGO_URL}/favicon.ico" type="image/x-icon" />
	{/if}
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
	{include file='admin_main_css.tpl'}
	
	{if $req_file_name eq 'index.php' or $req_file_name eq 'restaurantOrderManage.php'}
		{if $Alert_Sound eq 'Yes'}
		<meta http-equiv="refresh" content="300" />
			{if $Pending neq '0'}
				{if $smarty.session.browser eq MSIE}
					<bgsound src="{$SOUND_URL}/alertSound.mp3"/>
				{else}
					<audio src="{$SOUND_URL}/alertSound.wav" controls autoplay preload="auto" autobuffer hidden style="display:none;" >
					</audio>
				{/if}
			{/if}
		{/if}
	{/if}
	
	
	{*{if $req_file_name eq 'index.php' or $req_file_name eq 'restaurantOrderManage.php'}
	<meta http-equiv="refresh" content="30">
	{/if}*}

</head>

	<body>
		<!-- Start Page Loading -->
		  <div class="loading"><img src="images/loading.gif" alt="loading-img"></div>
		<!-- End Page Loading -->
		
		<!--Header start-->
		{include file='admin_main_header.tpl'}
		<!--Header End-->

		<!--Menu start-->
		<div class="sidebar clearfix {if $req_file_name neq 'index.php'}hidden{/if}">
			{if $req_file_name neq 'orderReportList.php' && $req_file_name neq 'orderCommissionList.php'}
			{include file='admin_main_menu.tpl'}
			{/if}
		</div>
		<!--Menu End-->
	
		<div class="content clearfix" {if $req_file_name neq 'index.php'}style="margin-left:0;"{/if} >
			{$MAIN_CONTENT}
		</div>



		{include file='admin_main_js.tpl'}

<!--comeneat plugin popup -->	
	<div class="modal fade" id="pluginmenuSite" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">Plugin Options</h4>
	          </div>
	          <div class="modal-body">
	          	<div class="commonwidth">
		           <div class="col-md-12 bold margin-topbottom">Just copy this HTML snippet and paste to your website{*Just copy this HTML snippet and paste in bottom of body tag &lt;body&gt;..&lt;&frasl;body&gt;.*}</div>
						<div class="col-md-12" id="restaurantPluginId">
							{*<textarea class="col-md-12"><span id='plugins'></span>
		                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		                    <script type="text/javascript" src="https://comeneat.com/plugin/widget.js"></script></textarea>*}
						</div>
		          </div>
	          </div>
	    </div>
      </div>
    </div>
   <!--  <div id="" class="modal fade">
	    <div class="modal-dialog clearfix">
	        <div class="modal-content">
				<div class="pluginwrapper">
					<div class="pluginpopupheading">
						<h1 class="pluginpopupmainheading"></h1>
						<div class="pluginpopupclose" data-dismiss="modal"></div>
					</div>
					<div class="clearfix padding20" >
						
						<div class="col-md-12">
							
	                        
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</div> -->
		
		{if $GOOGLE_ANALYTIC_CODE neq ''}
		<!-- Start of Google Analytic Code -->
		{$GOOGLE_ANALYTIC_CODE}
		<!-- End of Google Analytic Code -->
		{/if}
		{if $WOOPRA_ANALYTIC_CODE neq ''}
		<!-- Start of Woopra Code -->
		{$WOOPRA_ANALYTIC_CODE}
		<!-- End of Woopra Code -->
		{/if}
	
	</body>
</html>
