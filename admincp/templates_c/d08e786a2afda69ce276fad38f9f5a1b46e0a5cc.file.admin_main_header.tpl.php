<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 19:49:55
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2435630895806c333132be3-15705023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd08e786a2afda69ce276fad38f9f5a1b46e0a5cc' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_header.tpl',
      1 => 1473176675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2435630895806c333132be3-15705023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_LOGO' => 0,
    'SITE_NAME' => 0,
    'Pending' => 0,
    'Processing' => 0,
    'currentUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806c333193306_67336362',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806c333193306_67336362')) {function content_5806c333193306_67336362($_smarty_tpl) {?><!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      	<a href="index.php" class="logo">
			<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" style="height:90%;width:auto;" />
		</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Sidepanel Show-Hide Button -->
    <a href="logout.php" class="sidepanel-open-button"><i class="fa fa-power-off"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <div class="top-right">
	   	<a href="restaurantOrderManage.php?sortby=pending" class="status-btn hidden-xs">
	   		Pending Order <span class="badge"><?php echo $_smarty_tpl->tpl_vars['Pending']->value;?>
</span>
	   	</a>
	   	<a href="restaurantOrderManage.php?sortby=processing" class="status-btn hidden-xs">
	   		Processing Order <i class="badge"><?php echo $_smarty_tpl->tpl_vars['Processing']->value;?>
</i>
	   	</a>

 		<span class="profilebox hidden-sm hidden-xs">
 			<img src="images/profileimg.png" alt="img">
 			<b><?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
</b>
 		</span>
 	</div>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
<?php }} ?>
