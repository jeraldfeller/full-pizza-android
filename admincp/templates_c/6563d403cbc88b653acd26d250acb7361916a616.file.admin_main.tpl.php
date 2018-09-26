<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 19:49:54
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9978138845806c332f0c1d0-55715799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6563d403cbc88b653acd26d250acb7361916a616' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main.tpl',
      1 => 1466424142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9978138845806c332f0c1d0-55715799',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_NAME' => 0,
    'SITE_FAVICON' => 0,
    'SITE_IMAGE_LOGO_URL' => 0,
    'req_file_name' => 0,
    'Alert_Sound' => 0,
    'Pending' => 0,
    'SOUND_URL' => 0,
    'MAIN_CONTENT' => 0,
    'GOOGLE_ANALYTIC_CODE' => 0,
    'WOOPRA_ANALYTIC_CODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806c333117e42_68406966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806c333117e42_68406966')) {function content_5806c333117e42_68406966($_smarty_tpl) {?><!DOCTYPE html >
<html >
<head>

	<title><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
 Admin Panel</title>
	<?php if ($_SESSION['lan']=='CS'||$_SESSION['lan']=='SK'||$_SESSION['lan']=='SL'||$_SESSION['lan']=='AR'||$_SESSION['lan']=='LT'||$_SESSION['lan']=='TR'||$_SESSION['lan']=='ES'||$_GET['langcode']=='CS'||$_GET['langcode']=='SK'||$_GET['langcode']=='SL'||$_GET['langcode']=='AR'||$_GET['langcode']=='LT'||$_GET['langcode']=='TR'||$_GET['langcode']=='ES') {?>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php } else { ?>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php }?>
    
    
	<?php if ($_smarty_tpl->tpl_vars['SITE_FAVICON']->value!='') {?>
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_LOGO_URL']->value;?>
/favicon.ico" type="image/x-icon" />
	<?php }?>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
	<?php echo $_smarty_tpl->getSubTemplate ('admin_main_css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOrderManage.php') {?>
		<?php if ($_smarty_tpl->tpl_vars['Alert_Sound']->value=='Yes') {?>
		<meta http-equiv="refresh" content="300" />
			<?php if ($_smarty_tpl->tpl_vars['Pending']->value!='0') {?>
				<?php if ($_SESSION['browser']=='MSIE') {?>
					<bgsound src="<?php echo $_smarty_tpl->tpl_vars['SOUND_URL']->value;?>
/alertSound.mp3"/>
				<?php } else { ?>
					<audio src="<?php echo $_smarty_tpl->tpl_vars['SOUND_URL']->value;?>
/alertSound.wav" controls autoplay preload="auto" autobuffer hidden style="display:none;" >
					</audio>
				<?php }?>
			<?php }?>
		<?php }?>
	<?php }?>
	
	
	

</head>

	<body>
		<!-- Start Page Loading -->
		  <div class="loading"><img src="images/loading.gif" alt="loading-img"></div>
		<!-- End Page Loading -->
		
		<!--Header start-->
		<?php echo $_smarty_tpl->getSubTemplate ('admin_main_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!--Header End-->

		<!--Menu start-->
		<div class="sidebar clearfix <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='index.php') {?>hidden<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='orderReportList.php'&&$_smarty_tpl->tpl_vars['req_file_name']->value!='orderCommissionList.php') {?>
			<?php echo $_smarty_tpl->getSubTemplate ('admin_main_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php }?>
		</div>
		<!--Menu End-->
	
		<div class="content clearfix" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='index.php') {?>style="margin-left:0;"<?php }?> >
			<?php echo $_smarty_tpl->tpl_vars['MAIN_CONTENT']->value;?>

		</div>



		<?php echo $_smarty_tpl->getSubTemplate ('admin_main_js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
		           <div class="col-md-12 bold margin-topbottom">Just copy this HTML snippet and paste to your website</div>
						<div class="col-md-12" id="restaurantPluginId">
							
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
</html>
<?php }} ?>
