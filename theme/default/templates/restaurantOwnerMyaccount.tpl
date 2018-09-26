<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	{if $smarty.session.lan eq 'CS' || $smarty.session.lan eq 'SK' || $smarty.session.lan eq 'SL' || $smarty.session.lan eq 'AR' || $smarty.session.lan eq 'SV' || $smarty.session.lan eq 'LT' || $smarty.session.lan eq 'TR' || $smarty.session.lan eq 'ES'}
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	{else}
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	{/if}
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<!--<meta http-equiv="refresh" content="30">-->
	<title>{$SITE_NAME} - {$restaurantname|stripslashes} {$LANG.res_myaccount_myaccount}</title>
	{if $SITE_FAVICON neq ''}
		<link rel="shortcut icon" href="{$SITE_IMAGE_LOGO_URL}/favicon.ico" type="image/x-icon" />
	{/if}
	{include file='main_css.tpl'}
	{if $req_file_name eq 'restaurantOwnerMyaccount.php' and $Alert eq 'Yes'}
	<!--<meta http-equiv="refresh" content="300" />-->
		{if $Pending neq '0'}
			{if $smarty.session.browser eq MSIE}
				<bgsound src="{$SOUND_URL}/alertSound.mp3"/>
			{else}
				<audio src="{$SOUND_URL}/alertSound.wav" controls autoplay preload="auto" autobuffer hidden style="display:none;" ></audio>
			{/if}
		{/if}
	{/if}
</head>
<body {if $req_file_name eq 'restaurantOwnerMyaccount.php'}onload="resMyaccGmap({$reslattitude},{$reslongtitude});"{/if} class="autosuggestCnt restOwnerMyaccout" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">
	<!-- Wrapper Page Starts-->
<div class="row-fluid">
    {include file='restaurantOwnerMyaccount_main_header.tpl'}
    {if $req_file_name neq 'restaurantOwnerMyaccount.php'}
    {include file='restaurantOwnerMyaccount_main_menu.tpl'}
    {/if}
		
	<div class=" {if $req_file_name neq 'restaurantOwnerMyaccount.php'} content {/if} ownerInnerwrap">
		
			{$MAIN_CONTENT}
		       

			<div id="myacctFooter">
				<a class="" href="{$SITE_BASEURL}" target="_blank">Copyright</a>&copy;{'Y'|date} {$smarty.server.HTTP_HOST}. {$LANG.res_myaccount_all_rights_reserved}.
			</div>
	 </div>
        
        {*literal}
            <script type="text/javascript">
                //Allow only numbers in textbox
                $(".numericfield").keypress(function(e) {	
                    var k = e.which;    
                    /* numeric inputs can come from the keypad or the numeric row at the top */
                    if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                        e.preventDefault();
                        return false;
                    }				   
                });	
            </script>
        {/literal*}
	
	
	
	
	<!--<div id="myacctFooter">
		&copy;{$smarty.now|date_format:"%Y"} {$smarty.server.HTTP_HOST}. {$LANG.res_myaccount_all_rights_reserved}.
	</div>-->
	<div id="maska" style="display:none;"></div>
	<div class="ui-loader"><img src="{$SITE_IMAGE_URL}/loading_circle.gif" alt="" title=""></div>
	<!-- Wrapper Page Ends-->
	{include file='main_js.tpl'}
	
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
</div>
</body>
</html>