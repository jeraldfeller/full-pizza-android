<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108262199257b4c692b59d30-03305484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42840d658bd6b1733e0262b1e24cea86b9dc8d29' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount.tpl',
      1 => 1466424454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108262199257b4c692b59d30-03305484',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_NAME' => 0,
    'restaurantname' => 0,
    'LANG' => 0,
    'SITE_FAVICON' => 0,
    'SITE_IMAGE_LOGO_URL' => 0,
    'req_file_name' => 0,
    'Alert' => 0,
    'Pending' => 0,
    'SOUND_URL' => 0,
    'reslattitude' => 0,
    'reslongtitude' => 0,
    'MAIN_CONTENT' => 0,
    'SITE_BASEURL' => 0,
    'SITE_IMAGE_URL' => 0,
    'GOOGLE_ANALYTIC_CODE' => 0,
    'WOOPRA_ANALYTIC_CODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692c2a7f2_85704354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692c2a7f2_85704354')) {function content_57b4c692c2a7f2_85704354($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php if ($_SESSION['lan']=='CS'||$_SESSION['lan']=='SK'||$_SESSION['lan']=='SL'||$_SESSION['lan']=='AR'||$_SESSION['lan']=='SV'||$_SESSION['lan']=='LT'||$_SESSION['lan']=='TR'||$_SESSION['lan']=='ES') {?>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php } else { ?>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php }?>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<!--<meta http-equiv="refresh" content="30">-->
	<title><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
 - <?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantname']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_myaccount'];?>
</title>
	<?php if ($_smarty_tpl->tpl_vars['SITE_FAVICON']->value!='') {?>
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_LOGO_URL']->value;?>
/favicon.ico" type="image/x-icon" />
	<?php }?>
	<?php echo $_smarty_tpl->getSubTemplate ('main_css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php'&&$_smarty_tpl->tpl_vars['Alert']->value=='Yes') {?>
	<!--<meta http-equiv="refresh" content="300" />-->
		<?php if ($_smarty_tpl->tpl_vars['Pending']->value!='0') {?>
			<?php if ($_SESSION['browser']=='MSIE') {?>
				<bgsound src="<?php echo $_smarty_tpl->tpl_vars['SOUND_URL']->value;?>
/alertSound.mp3"/>
			<?php } else { ?>
				<audio src="<?php echo $_smarty_tpl->tpl_vars['SOUND_URL']->value;?>
/alertSound.wav" controls autoplay preload="auto" autobuffer hidden style="display:none;" ></audio>
			<?php }?>
		<?php }?>
	<?php }?>
</head>
<body <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php') {?>onload="resMyaccGmap(<?php echo $_smarty_tpl->tpl_vars['reslattitude']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['reslongtitude']->value;?>
);"<?php }?> class="autosuggestCnt restOwnerMyaccout" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">
	<!-- Wrapper Page Starts-->
<div class="row-fluid">
    <?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_main_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='restaurantOwnerMyaccount.php') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_main_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
		
	<div class=" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='restaurantOwnerMyaccount.php') {?> content <?php }?> ownerInnerwrap">
		
			<?php echo $_smarty_tpl->tpl_vars['MAIN_CONTENT']->value;?>

		       

			<div id="myacctFooter">
				<a class="" href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
" target="_blank">Copyright</a>&copy;<?php echo date('Y');?>
 <?php echo $_SERVER['HTTP_HOST'];?>
. <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_all_rights_reserved'];?>
.
			</div>
	 </div>
        
        
	
	
	
	
	<!--<div id="myacctFooter">
		&copy;<?php echo smarty_modifier_date_format(time(),"%Y");?>
 <?php echo $_SERVER['HTTP_HOST'];?>
. <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_all_rights_reserved'];?>
.
	</div>-->
	<div id="maska" style="display:none;"></div>
	<div class="ui-loader"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/loading_circle.gif" alt="" title=""></div>
	<!-- Wrapper Page Ends-->
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
</div>
</body>
</html><?php }} ?>
