<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:41
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_main_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4330685057b4c6a1701195-41901057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50e40493724d5257dc7314095f62d46db2aab9d3' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_main_menu.tpl',
      1 => 1466424445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4330685057b4c6a1701195-41901057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'req_file_name' => 0,
    'LANG' => 0,
    'restaurant_seourl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c6a18f9dc4_61023960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c6a18f9dc4_61023960')) {function content_57b4c6a18f9dc4_61023960($_smarty_tpl) {?>
<div class="myAccntMenu">
	
	<ul class="myAccntMenuUl borderbox">
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount.php<?php } else { ?>restaurant-myaccount<?php }?>"  <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashboard'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php<?php } else { ?>restaurant-myaccount-order<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_order.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_order'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_report.php<?php } else { ?>restaurant-myaccount-report<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_report.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_report'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_category.php<?php } else { ?>restaurant-myaccount-category<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_category.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_cat'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_menu.php<?php } else { ?>restaurant-myaccount-menu<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_menu.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menu'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_addons.php<?php } else { ?>restaurant-myaccount-addons<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_addons.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addon'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_offers.php<?php } else { ?>restaurant-myaccount-offers<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offer'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_payment.php<?php } else { ?>restaurant-myaccount-payment<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_payment.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_payment'];?>
</a>
		</li>
        <li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_setting.php<?php } else { ?>restaurant-myaccount-setting<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_setting.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_settings'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_bookings.php<?php } else { ?>restaurant-myaccount-book<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_bookings.php') {?>class="active"<?php }?>>Book a Table</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_reviews.php<?php } else { ?>restaurant-myaccount-review<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_reviews.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviews'];?>
</a>
		</li>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_invoice.php<?php } else { ?>restaurant-myaccount-invoice<?php }?>" <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_invoice.php') {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myacc_invoice'];?>
</a>
		</li>
        <!-- <li>
			<a href="javascript:void(0);" id="owner_plugin" data-target="#pluginmenuSite" data-toggle="modal" onclick="return restaurantPlugin('<?php echo $_SESSION['restaurantownerid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['restaurant_seourl']->value;?>
');">Plugin</a>
		</li> -->
	
	</ul>
</div>
            

<div id="pluginmenuSite" class="modal fade">
    <div class="modal-dialog clearfix">
        <div class="modal-content">
			<div class="pluginwrapper">
				<div class="pluginpopupheading">
					<h1 class="pluginpopupmainheading">Plugin Options</h1>
					<div class="pluginpopupclose" data-dismiss="modal"></div>
				</div>
				<div class="clearfix padding20" >
					
					<div class="col-md-12">
						<div class="col-md-12 bold margin-topbottom">Just copy this HTML snippet and paste in bottom of body tag &lt;body&gt;..&lt;&frasl;body&gt;.</div>
						<div class="col-md-12" id="restaurantPluginId">
							
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

<?php }} ?>
