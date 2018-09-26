<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>{if $Meta_Tag_Title neq ''}{$Meta_Tag_Title|stripslashes} - {/if}{$SITE_NAME}</title>
    <meta content="{$Meta_Tag_Keyword|stripslashes}" name="keywords" />
	<meta content="{$Meta_Tag_Desc|stripslashes}" name="description" />
	
	{if $smarty.session.lan eq 'CS' || $smarty.session.lan eq 'SK' || $smarty.session.lan eq 'SL' || $smarty.session.lan eq 'AR' || $smarty.session.lan eq 'SV' || $smarty.session.lan eq 'LT' || $smarty.session.lan eq 'TR' || $smarty.session.lan eq 'ES'}
	<meta http-equiv="content-type" content="text/html;charset=utf-8 X-Content-Type-Options=nosniff" />
	<meta http-equiv="X-Frame-Options" content="deny">

	{else}
	<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
	<meta http-equiv="content-type" content="text/html;charset=utf-8 X-Content-Type-Options=nosniff" />
	<meta http-equiv="X-Frame-Options" content="deny">

	{/if}
	
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	{if $SITE_FAVICON neq ''}
	<link rel="shortcut icon" href="{$SITE_IMAGE_LOGO_URL}/favicon.ico" type="image/x-icon" />
	{/if}
	{include file='main_css.tpl'}
</head>

<body style="background-color: #FDCC06;" {if $req_file_name eq 'thanks.php' and $orderid neq '' and $gprsoption eq 'Yes'} onload="return goToAck('{$orderid}');"{/if} {if $req_file_name neq 'index.php'} class="autosuggestCnt"{/if} {if $req_file_name eq 'restaurantDetails.php'}onload="resDetailsGmap('{$reslattitude}','{$reslongtitude}','{$resid}')"{/if}>
	<!-- Wrapper Page Starts-->
	<div class="outerbody {if $req_file_name eq 'searchResult.php' || $req_file_name eq 'restaurantDetails.php'}body_bck{/if} {if $req_file_name eq 'index.php'}indexBannerBg{/if}">
    {if $req_file_name neq 'orderPayment.php'}
		{*include file='main_header.tpl'*}
    {/if}
	<!-- Menu starts -->
	{*include file='main_menu.tpl'*}
	<!-- Menu ends -->
	<section class="full_section fondo" id="balancing">	
	
		{$MAIN_CONTENT}
	</section>
	</div>
	{if $req_file_name neq 'restaurantOwnerLogin.php' and $req_file_name neq 'customerMyaccount.php' and $req_file_name neq 'orderPayment.php'}
		<!--Footer starts-->
		{*include file='main_footer.tpl'*}
		<!--Footer ends-->
	{/if}
	<!-- Wrapper Page Ends-->
	<div id="maska"></div>
	<div id="white-maska" style="display:none;"></div>
	<div class="ui-loader"><img src="{$SITE_IMAGE_URL}/loading_circle.gif" alt="" title=""></div>
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
	

	
</body>
</html>