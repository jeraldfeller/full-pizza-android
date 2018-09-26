<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 14:33:07
         compiled from "C:\wamp\www\theme\default\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2715757dcadc9878dd8-12107553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30947e07ff6f8b124e71b913c9d4aa086c9d3a03' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\main.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2715757dcadc9878dd8-12107553',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dcadc9a0f3d8_86905065',
  'variables' => 
  array (
    'Meta_Tag_Title' => 0,
    'SITE_NAME' => 0,
    'Meta_Tag_Keyword' => 0,
    'Meta_Tag_Desc' => 0,
    'SITE_FAVICON' => 0,
    'SITE_IMAGE_LOGO_URL' => 0,
    'req_file_name' => 0,
    'orderid' => 0,
    'gprsoption' => 0,
    'reslattitude' => 0,
    'reslongtitude' => 0,
    'resid' => 0,
    'MAIN_CONTENT' => 0,
    'SITE_IMAGE_URL' => 0,
    'GOOGLE_ANALYTIC_CODE' => 0,
    'WOOPRA_ANALYTIC_CODE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcadc9a0f3d8_86905065')) {function content_57dcadc9a0f3d8_86905065($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php if ($_smarty_tpl->tpl_vars['Meta_Tag_Title']->value!='') {
echo stripslashes($_smarty_tpl->tpl_vars['Meta_Tag_Title']->value);?>
 - <?php }
echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
</title>
    <meta content="<?php echo stripslashes($_smarty_tpl->tpl_vars['Meta_Tag_Keyword']->value);?>
" name="keywords" />
	<meta content="<?php echo stripslashes($_smarty_tpl->tpl_vars['Meta_Tag_Desc']->value);?>
" name="description" />
	
	<?php if ($_SESSION['lan']=='CS'||$_SESSION['lan']=='SK'||$_SESSION['lan']=='SL'||$_SESSION['lan']=='AR'||$_SESSION['lan']=='SV'||$_SESSION['lan']=='LT'||$_SESSION['lan']=='TR'||$_SESSION['lan']=='ES') {?>
	<meta http-equiv="content-type" content="text/html;charset=utf-8 X-Content-Type-Options=nosniff" />
	<meta http-equiv="X-Frame-Options" content="deny">

	<?php } else { ?>
	<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
	<meta http-equiv="content-type" content="text/html;charset=utf-8 X-Content-Type-Options=nosniff" />
	<meta http-equiv="X-Frame-Options" content="deny">

	<?php }?>
	
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<?php if ($_smarty_tpl->tpl_vars['SITE_FAVICON']->value!='') {?>
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_LOGO_URL']->value;?>
/favicon.ico" type="image/x-icon" />
	<?php }?>
	<?php echo $_smarty_tpl->getSubTemplate ('main_css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>

<body style="background-color: #FDCC06;" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='thanks.php'&&$_smarty_tpl->tpl_vars['orderid']->value!=''&&$_smarty_tpl->tpl_vars['gprsoption']->value=='Yes') {?> onload="return goToAck('<?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
');"<?php }?> <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='index.php') {?> class="autosuggestCnt"<?php }?> <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>onload="resDetailsGmap('<?php echo $_smarty_tpl->tpl_vars['reslattitude']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['reslongtitude']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
')"<?php }?>>
	<!-- Wrapper Page Starts-->
	<div class="outerbody <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>body_bck<?php }?> <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php') {?>indexBannerBg<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='orderPayment.php') {?>
		
    <?php }?>
	<!-- Menu starts -->
	
	<!-- Menu ends -->
	<section class="full_section fondo" id="balancing">	
	
		<?php echo $_smarty_tpl->tpl_vars['MAIN_CONTENT']->value;?>

	</section>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='restaurantOwnerLogin.php'&&$_smarty_tpl->tpl_vars['req_file_name']->value!='customerMyaccount.php'&&$_smarty_tpl->tpl_vars['req_file_name']->value!='orderPayment.php') {?>
		<!--Footer starts-->
		
		<!--Footer ends-->
	<?php }?>
	<!-- Wrapper Page Ends-->
	<div id="maska"></div>
	<div id="white-maska" style="display:none;"></div>
	<div class="ui-loader"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/loading_circle.gif" alt="" title=""></div>
	<?php echo $_smarty_tpl->getSubTemplate ('main_js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<?php if ($_smarty_tpl->tpl_vars['GOOGLE_ANALYTIC_CODE']->value!='') {?>
	<!-- Start of Google Analytic Code -->
	<?php echo $_smarty_tpl->tpl_vars['GOOGLE_ANALYTIC_CODE']->value;?>

	<!-- End of Google Analytic Code -->
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['WOOPRA_ANALYTIC_CODE']->value!='') {?>
	<!-- Start of Woopra Code -->
	<?php echo $_smarty_tpl->tpl_vars['WOOPRA_ANALYTIC_CODE']->value;?>

	<!-- End of Woopra Code -->
	<?php }?>
	

	
</body>
</html><?php }} ?>
