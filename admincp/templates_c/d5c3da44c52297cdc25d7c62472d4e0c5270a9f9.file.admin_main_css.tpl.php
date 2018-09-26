<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 19:49:55
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20807300355806c33311c404-89751137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5c3da44c52297cdc25d7c62472d4e0c5270a9f9' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_css.tpl',
      1 => 1466424136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20807300355806c33311c404-89751137',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'req_file_name' => 0,
    'getglobalvarjavascript' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806c33312fac6_45745083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806c33312fac6_45745083')) {function content_5806c33312fac6_45745083($_smarty_tpl) {?><!--Css-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
<link type="text/css" rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<link href="css/awesome-bootstrap-checkbox.css" type="text/css" rel="stylesheet" />

<link type="text/css" rel="stylesheet" href="css/autocomplete.css" />
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300" />

<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700" />


<link href="css/bootstrap-select.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="css/font-awesome.css"  />

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOfferAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantReportManage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantInvoiceManage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='voucherAddEdit.php') {?>
<link rel="stylesheet" href="css/datepicker.css" type="text/css"/>
<?php }?>
<link href="css/slidebars.css" type="text/css" rel="stylesheet" />
<?php echo $_smarty_tpl->tpl_vars['getglobalvarjavascript']->value;?>

<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.11.1.js"><?php echo '</script'; ?>
>

<?php }} ?>
