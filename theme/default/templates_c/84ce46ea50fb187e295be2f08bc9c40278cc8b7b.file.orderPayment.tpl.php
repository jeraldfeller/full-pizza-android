<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-16 21:54:27
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/orderPayment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197805503657dcb063e10748-05003105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84ce46ea50fb187e295be2f08bc9c40278cc8b7b' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/orderPayment.tpl',
      1 => 1466424438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197805503657dcb063e10748-05003105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'req_file_name' => 0,
    'PAYHTML' => 0,
    'paymentError' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dcb063e93362_36189103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcb063e93362_36189103')) {function content_57dcb063e93362_36189103($_smarty_tpl) {?><!-- Header Bottom line starts -->
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='orderPayment.php') {?>
<div class="wrapper">
	<div class="headBtmLine"></div>
</div>
<!-- Header Bottom line ends -->
<div class="wrapper">
	<!-- Container Inner starts -->
	<div class="byCuisine customFood">
		<div class="byCuisineTop"></div>
		<div class="byCuisineMiddle customLoginPad">
			<div class="restOwnerRiteHead">Payment</div>
			
			<?php if ($_POST['paymentinfo']=='creditcard') {?>
			<!--Credit card Paypal Payment Start-->
			<div class="staticContent">If this page shows for more than 10 seconds click this button:<?php echo $_smarty_tpl->tpl_vars['PAYHTML']->value;?>
</div>
			<!--Credit card Paypal Payment End-->
            <?php } elseif ($_POST['paymentinfo']=='authorizenet') {?>
				<!-- Authorize.net Start-->
				<div class="staticContent"><?php echo $_smarty_tpl->tpl_vars['paymentError']->value;?>
</div>
			<?php }?>
			
		</div>
		<div class="byCuisineBottom"></div>
	</div>
	<!-- Container Inner ends -->
</div>
<?php }?><?php }} ?>
