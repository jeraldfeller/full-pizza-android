<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-08 14:00:31
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_bookings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179633205858c054cf63ebd3-34642734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0c303b2525551d2c2c0ce739448bb10abe469f6' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_bookings.tpl',
      1 => 1466424458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179633205858c054cf63ebd3-34642734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c054cf836c27_32828275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c054cf836c27_32828275')) {function content_58c054cf836c27_32828275($_smarty_tpl) {?><!-- Orders start -->
<div class="restaurantBookingsContent">
	<?php echo $_smarty_tpl->getSubTemplate ('restaurantOwnerMyaccount_bookings_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<!-- Orders end -->

<!-- Order Full Details POP -->
<div id="bookingViewFullDetailsPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type="button">
					<span aria-hidden="true">X</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
 </h4>
			</div>
			<div class="modal-body">
					<div id="bookingFullDetailsList"></div>
			</div>	
		</div>
	</div>
</div>
<?php }} ?>
