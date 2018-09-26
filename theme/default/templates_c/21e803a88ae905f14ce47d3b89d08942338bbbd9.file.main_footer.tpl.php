<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 14:54:28
         compiled from "C:\wamp\www\theme\default\templates\main_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:530457dcadca0606a4-73464773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21e803a88ae905f14ce47d3b89d08942338bbbd9' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\main_footer.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '530457dcadca0606a4-73464773',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dcadca20ae87_39900922',
  'variables' => 
  array (
    'req_file_name' => 0,
    'LANG' => 0,
    'SITE_IMAGE_URL' => 0,
    'footerFollowersCntList' => 0,
    'footerFollowersList' => 0,
    'SITE_IMAGE_FOLLOWERS_URL' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'footerContentList' => 0,
    'current' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcadca20ae87_39900922')) {function content_57dcadca20ae87_39900922($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\includes\\smarty\\plugins\\modifier.date_format.php';
?><!--Footer Starts-->
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value!='offline.php') {?>
<footer class="footer clearfix <?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>footer_mar_btm<?php }?>">
	<div class="footerTop hidden-xs">
		<div class="container">
			
			<div class="contain">	
				<div class="col-md-6">
					<section class="Footer_top_contt col-md-6 col-sm-4 col-xs-12">
						<h1 class="footerListhead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_payment_info'];?>
</h1>
						<div class="mobileCards"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/cards.png" alt="" title="" /></div>
					</section>
					<section class="Footer_top_contt col-md-6 col-sm-4 col-xs-12">	
						<h1 class="footerListhead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_followers'];?>
</h1>
					
					<?php if ($_smarty_tpl->tpl_vars['footerFollowersCntList']->value>0) {?>
						<div class="Footer_Link_Cont ">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['name'] = "followers";
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['footerFollowersList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["followers"]['total']);
?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['footerFollowersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['followers']['index']]['followers_url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_FOLLOWERS_URL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['footerFollowersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['followers']['index']]['followers_logo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['footerFollowersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['followers']['index']]['followers_name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['footerFollowersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['followers']['index']]['followers_name'];?>
" class="followerLink"  /></a> 
							<?php endfor; endif; ?>
						</div>
					<?php }?>
					
					</section>
				</div>
				<div class="col-md-6">							
					 
					<section class="col-md-12 col-xs-12 col-sm-12  newsletter_section">
                    <form name="customer_subscribe_newsletter" method="post" action="" onsubmit="return customersubscribenewsletter();" class="form-horizontal">
						<h1 class="footerListhead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_week_newsletter'];?>
</h1>
						<div class="col-md-8 col-xs-12 col-sm-8 pad0">	
							<input type="text" class="searchField col-md-12 col-xs-12 col-sm-12" name="newsletter" id="newsletter" placeholder="Enter your email"/>
                            <span id="cusemailerrormsg" class=" "></span>
                        </div> 
						<div class="col-md-4 col-xs-12 col-sm-4">  
							<input class="newslettr-btn col-md-12 col-xs-12 col-sm-12 pad0" id="newslettersubsubmit" type="submit"  value="SUBMIT"/>
						</div>	
                        
						<span class="col-md-12 col-xs-12 col-sm-12  mail_inst pad0"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_email_not_shared'];?>
</span>
                        </form>.
					</section>
				</div>
			</div>
			
            
         </div>
		</div>
		<div class="footerBtm">
			<div class="container">
				
				<div class="contain">
					<ul class="Footer_ContULSmall hidden-xs">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>faq.php<?php } else { ?>faq<?php }?>"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_faq'];?>
</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_SESSION['restaurantownerid']!='') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>siteFeedback.php<?php } else { ?>site-feedback<?php }
} else {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerLogin.php?page=feedback<?php } else { ?>go-feedback<?php }
}?>"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_feedback'];?>
</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>contactUs.php<?php } else { ?>contact-us<?php }?>"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_contact'];?>
</a></li>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['name'] = "foot";
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['footerContentList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["foot"]['total']);
?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>staticPage.php?contentpage=<?php echo $_smarty_tpl->tpl_vars['footerContentList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['foot']['index']]['content_seourl'];
} else { ?>p/<?php echo $_smarty_tpl->tpl_vars['footerContentList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['foot']['index']]['content_seourl'];
}?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['footerContentList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['foot']['index']]['content_title']));?>
</a></li>
						<?php endfor; endif; ?>			
					</ul>
				</div>
				
				<div class="copyRight">
				<?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_copyright'];?>
 &copy;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['current']->value,"%Y");?>
 <a class="roamsoftLink" href="http://roamsofttech.com/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_roamsoft_tech'];?>
</a> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_allrights_reserved'];?>

				</div>
			 </div>
		</div>
	</div>
</footer>

<div class="cartMask"></div>
<?php }?><?php }} ?>
