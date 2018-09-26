<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_main_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88062218357b4c692c33472-75818577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ff2e9af4ebe4247886672cd6c583f63d41a3383' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_main_header.tpl',
      1 => 1466424462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88062218357b4c692c33472-75818577',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'req_file_name' => 0,
    'SITE_BASEURL' => 0,
    'SITE_LOGO' => 0,
    'SITE_NAME' => 0,
    'restaurantname' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'SITE_IMAGE_URL' => 0,
    'Pending' => 0,
    'LANG' => 0,
    'Processing' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692ce1356_95878844',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692ce1356_95878844')) {function content_57b4c692ce1356_95878844($_smarty_tpl) {?><header class="headerDiv <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='restaurantOwnerMyaccount.php') {?>col-md-12<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php') {?>
	<div class="rest-headertop">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
" class="ownername">
           <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" />
        </a>
	</div>
    <div class="rest-headerbtm col-md-12">
        <div class="container text-center">
            <h1 class="welcome-msg"><small>Welcome</small> <?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantname']->value);?>
</h1>
            <div class="orderstatusbx">
                <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=pending<?php } else { ?>restaurant-myaccount-order/pending<?php }?>" class="col-sm-5 orderstatusinner">
                    <span class="orderstatusleft"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pending-orders.png" alt="" title=""></span>
                    <div class="orderstatusright">
                        <span class="count pending"><?php echo $_smarty_tpl->tpl_vars['Pending']->value;?>
</span>
                        <span class="status"> <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder']);?>
</span>
                    </div>
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=processing<?php } else { ?>restaurant-myaccount-order/processing<?php }?>" class="col-sm-5 col-sm-offset-1 orderstatusinner">
                     <span class="orderstatusleft"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/processing-orders.png" alt="" title=""></span>
                     <div class="orderstatusright">
                        <span class="count process"><?php echo $_smarty_tpl->tpl_vars['Processing']->value;?>
</span>
                        <span class="status"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder']);?>
</span>
                    </div>
                </a>
            </div>
        </div>
       <a href="ajaxFile.php?action=restaurantLogout" class="logout_btn"></a>
    </div>  
   <?php } else { ?>
    <div class="row">
        <div class="rest-headertop padTopBot10 col-md-12 no-padding">
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
" class="ownername">
               <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" />
            </a>
        </div>
        <div class="rest-headerbtm padTopBot10 col-md-12 no-padding">
            <div class="container text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-4">
                        <div class="row">
                            <h1 class="welcome-msg autowidth line_height71 no-margin"><small>Welcome</small> <?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantname']->value);?>
</h1>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="orderstatusbx pull-left col-md-12">
                                <div class="row">
                                    <div class="col-sm-4 no-lg-right-padding">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=pending<?php } else { ?>restaurant-myaccount-order/pending<?php }?>" class=" orderstatusinner pull-left full_width">
                                        
                                        <div class="orderstatusright full_width">
                                            <span class="count1 pending"><?php echo $_smarty_tpl->tpl_vars['Pending']->value;?>
</span>
                                            
                                        </div>
                                        <span class="orderstatusleft no-border full_width no-padding">
                                            <span class="order_img"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pending-orders_small.png" alt="" title=""></span>
                                            <span class="status1 autowidth no-float"> <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder']);?>
</span>
                                        </span>
                                    </a>
                                    </div>
                                    <div class="col-sm-4 no-lg-right-padding">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=processing<?php } else { ?>restaurant-myaccount-order/processing<?php }?>" class="orderstatusinner pull-left full_width">
                                             
                                             <div class="orderstatusright full_width">
                                                <span class="count1"><?php echo $_smarty_tpl->tpl_vars['Processing']->value;?>
</span>
                                                
                                            </div>
                                            <span class="orderstatusleft no-border full_width no-padding">
                                                <span class="order_img"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/processing-orders_small.png" alt="" title=""></span>
                                                <span class="status1 autowidth no-float"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder']);?>
</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="ajaxFile.php?action=restaurantLogout" class="logout_btn"></a>
            <div class="menus_open"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/rightslide.png" alt="" title=""></div>
            <a class="menu_list"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/leftslide.png" alt="" title=""></a> 
        </div>  
    </div>
    <?php }?>



   <!-- <div class="col-sm-1 pull-right">
		<a href="ajaxFile.php?action=restaurantLogout" class="logout"><i class="fa fa-sign-out"></i> </a>
	</div> -->


</header><?php }} ?>
