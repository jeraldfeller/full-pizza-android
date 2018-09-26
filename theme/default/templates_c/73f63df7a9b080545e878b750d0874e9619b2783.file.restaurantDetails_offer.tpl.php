<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 01:54:15
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails_offer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:838902452576850efe29062-54840855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73f63df7a9b080545e878b750d0874e9619b2783' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails_offer.tpl',
      1 => 1466424456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '838902452576850efe29062-54840855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'percentage_show' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_576850f009ceb5_42042545',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576850f009ceb5_42042545')) {function content_576850f009ceb5_42042545($_smarty_tpl) {?><div class="searchResultInner">
	<div class="detailsInnerNewWrap">
		<div id="detailsRightRelated">
			<div class="restDetInfo1Inner clearfix">
				<div class="newOfferLeft">
					<h1 class="offerDealCouponHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_offer'];?>
</h1>
					<span class="offerDealCouponCont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_offerperorder'];?>
</span>
					
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["off"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['name'] = "off";
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['percentage_show']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total']);
?>
					<div class="offerSaveOption">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/coupon_icon_menu.png" alt="" title="" />
						<div class="offerSaveTextNew col-sm-10 pull-right">
							<!--<span class="percentOffer"><?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'];
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_off'];?>
</span>-->
                            
                            <?php if ($_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_valprice']=='1') {?>
                            <span class="percentOfferImg1"><?php echo number_format($_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'],0);?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_off'];?>
</span>
                            <?php } else { ?>                    
							<span class="percentOfferImg1"><?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'];?>
  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_off'];?>
</span>
                            <?php }?>	
                            							
							<span class="percentOfferFree"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_free'];?>
!</span>
							<!--<span class="offerDealCouponCont"><?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'];
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_off'];?>
 <?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_price'];
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_or_more'];?>
.</span>-->
                             <?php if ($_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_valprice']=='1') {?>
                            <span class="offerDealCouponCont"><?php echo number_format($_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'],0);
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_off'];?>
 <?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_price'];
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_or_more'];?>
.</span>
                            <?php } else { ?>                    
						<span class="offerDealCouponCont"><?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'];
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_offer_off'];?>
 <?php echo $_smarty_tpl->tpl_vars['percentage_show']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_price'];
echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_or_more'];?>
.</span>
                            <?php }?>	
						</div>
					</div>
					<?php endfor; else: ?>
						<p class="text-danger text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_offerno'];?>
</p>
					<?php endif; ?>
				</div>
			</div>
				
		</div>
	</div>
</div><?php }} ?>
