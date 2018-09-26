<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-25 22:19:29
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/main_css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8335164515767e761a36068-72406579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc1218b105b66ed126a9f1f865c5616b1bdf09c8' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/main_css.tpl',
      1 => 1474859813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8335164515767e761a36068-72406579',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767e761af8308_48261487',
  'variables' => 
  array (
    'SITE_THEME_CSS_URL' => 0,
    'req_file_name' => 0,
    'getglobalvarjavascript' => 0,
    'SITE_JS_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767e761af8308_48261487')) {function content_5767e761af8308_48261487($_smarty_tpl) {?>
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>


<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css' />


<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css' />


<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />

<link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/stylesheet.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/font-awesome.css" type="text/css" rel="stylesheet" />

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurant_innerpage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerRegister.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerRegister.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerMyaccount.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='checkout.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php') {?>

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/autocomplete.css" />

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/slideshow.css" rel="stylesheet" />

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php') {?>
	<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/jquery-ui-1.css" rel="stylesheet" />	
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='checkout.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='contactUs.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers_AddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_report.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='ajaxActionRestaurant.php') {?>
	<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/datepicker.css" rel="stylesheet" />
<?php }?>	


<?php echo $_smarty_tpl->tpl_vars['getglobalvarjavascript']->value;?>

        


<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_order.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_report.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_category.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_payment.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_setting.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_reviews.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_invoice.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers_AddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_category.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_categoryAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_menu.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_menuAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_addons.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_addonsAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_bookings.php') {?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/myaccount.css" type="text/css" rel="stylesheet" />	
<?php }?>

<link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/bootstrap.css" type="text/css" rel="stylesheet" />
<!-- <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/bootstrap-select.css" type="text/css" rel="stylesheet" /> -->

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php') {?>
<link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/owl.carousel.css" type="text/css" rel="stylesheet" />
<?php }?>

<link href="<?php echo $_smarty_tpl->tpl_vars['SITE_THEME_CSS_URL']->value;?>
/custom.css" type="text/css" rel="stylesheet" />

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/bootstrap-select.js"><?php echo '</script'; ?>
> -->
<?php }} ?>
