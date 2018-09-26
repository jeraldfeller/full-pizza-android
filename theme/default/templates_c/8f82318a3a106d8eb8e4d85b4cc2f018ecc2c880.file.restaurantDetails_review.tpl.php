<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 01:54:16
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails_review.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1917168200576850f0cf1204-40066086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f82318a3a106d8eb8e4d85b4cc2f018ecc2c880' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails_review.tpl',
      1 => 1466424461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1917168200576850f0cf1204-40066086',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'objSearchDetails' => 0,
    'restaurant_reviews' => 0,
    'reviews' => 0,
    'LANG' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_576850f0f0e276_91616654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576850f0f0e276_91616654')) {function content_576850f0f0e276_91616654($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->tpl_vars['objSearchDetails']->value->restaurantReviewDetails();?>

<div class="searchResultInner">
	<div class="contents_review_left">
		
		<div id="revieworganizeby">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["review"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['name'] = "review";
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurant_reviews']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["review"]['total']);
?>
			<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['section']['review']['rownum'])) {?>
				<?php $_smarty_tpl->tpl_vars["reviews"] = new Smarty_variable("cont_review_head_left1", null, 0);?>
			<?php } else { ?>
				<?php $_smarty_tpl->tpl_vars["reviews"] = new Smarty_variable("cont_review_head_left2", null, 0);?>
			<?php }?>
			<div class="<?php echo $_smarty_tpl->tpl_vars['reviews']->value;?>
">
				<div class="upDownImg col-md-1 col-xs-3 col-sm-1">
					
				</div>
				<div class="likeTex col-md-11 col-xs-9 col-sm-11">
					<span class="cont_review_post col-md-10 col-xs-6 col-sm-10"> <span style="color:#faaf0e;"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['customername']));?>
</span> <span style="color:#9f9f9f"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_reviewposton'];?>
</span> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['addeddate'],"%d.%m.%Y");?>
</span>
					<span class="col-md-2 col-xs-6 col-sm-2">
					<span class="newcont_review_star1 pull-right">
						<?php if ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='1') {?> <span class="reviewStar reviewStar1"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='2') {?> <span class="reviewStar reviewStar2"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='3') {?><span class="reviewStar reviewStar3"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='4') {?> <span class="reviewStar reviewStar4"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='5') {?> <span class="reviewStar"></span>
						<?php }?>
						
					</span></span>
					<div class="col-md-12 col-xs-12 col-sm-12">
						<span class="cont_review_para"><span class="open_quotes"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/open_quotes.png" /></span><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['message']));?>
<span class="close_quotes"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/close_quotes.png" /></span></span>
					</div>
					<!--<span class="cont_review_star1">
					<?php if ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='1') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/single-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='2') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/double-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='3') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/triple-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='4') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/four-star.png" /> 
					<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_reviews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['review']['index']]['rating']=='5') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/five-star.png" /> 
					<?php }?>
					</span>-->
					
					
				</div>
			</div>
			<?php endfor; else: ?>
				<div style="color:red; text-align:center;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_reviewno'];?>
 </div>
			<?php endif; ?>
		</div>
		<!--<div class="cont_review_head_left1">
			<span class="cont_review_para">Very bad food, not fresh, high in salt. naans were very hard.will not order again.</span>
			<span class="cont_review_post">Posted by <b>Gaurav</b> on <b>07/06/2011</b></span>
		</div>-->
	</div>
	<!--<div class="reviewWriterbtn1">
		<a class="review1NewBtn1" title="Write a Review" href="javascript:void(0);">
			
			<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_writereview'];?>

		</a>
	</div>-->
</div>
<?php }} ?>
