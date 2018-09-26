<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-15 11:14:15
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_offers_AddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175819477858a47e579c4eb7-68296454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49d798ed779dc65fe91bd4bd3ebe23b4964df60c' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_offers_AddEdit.tpl',
      1 => 1466424453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175819477858a47e579c4eb7-68296454',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'offerValue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58a47e57afaf42_25570051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a47e57afaf42_25570051')) {function content_58a47e57afaf42_25570051($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?>

<!-- Offers add new start -->
<div class="detailsInnerNewWrap">
<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offer'];?>
</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_offers.php<?php } else { ?>restaurant-myaccount-offers<?php }?>" class="addbtn pull-right"><i class="glyphicon glyphicon-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerback'];?>
</a>
<hr class="heading-hr">
<div class="clr"></div>
	<div class="ownerStaticContainer">
	<form name="offerAddEdit" method="post" action="<?php if ($_GET['offer_id']!='') {?>restaurantOwnerMyaccount_offers_AddEdit.php?offer_id=<?php echo $_GET['offer_id'];
}?>" onsubmit="<?php if ($_GET['offer_id']!='') {?>return editRestaurantOffer();<?php } else { ?>return addNewRestaurantOffer();<?php }?>">	
        <input type="hidden" name="offerid" value="<?php echo $_GET['offer_id'];?>
" id="offerid"/>
        <input type="hidden" name="action" id="action" value="<?php if ($_GET['offer_id']!='') {?>Edit<?php } else { ?>Add<?php }?>" />
		<div class="mandatoryField">
			<span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span>
			- <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offermandatory'];?>

		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">&nbsp;</span>
			<span class="colon1">&nbsp;</span>
			<div id="offer_errormsg"></div>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerpercentage'];?>
</span>
			<span class="colon1">:</span>
			<input class="textbox numericfield" type="text" name="offer_percentage" id="offer_percentage" value="<?php if ($_GET['offer_id']!='') {
echo $_smarty_tpl->tpl_vars['offerValue']->value[0]['offer_percentage'];
}?>" />
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerprice'];?>
</span>
			<span class="colon1">:</span>
			<input class="textbox numericfield" type="text" name="offer_price" id="offer_price" value="<?php if ($_GET['offer_id']!='') {
echo $_smarty_tpl->tpl_vars['offerValue']->value[0]['offer_price'];
}?>" />
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offervalidfrom'];?>
</span>
			<span class="colon1">:</span>
			<div class="input-group date offerdateAln">
				<input class="offer_valid_from form-control" name="offer_valid_from" id="offer_valid_from" type="text" value="<?php if ($_GET['offer_id']!='') {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['offerValue']->value[0]['offer_valid_from'],"%d-%m-%Y");
}?>" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offervalidto'];?>
</span>
			<span class="colon1">:</span>
			<div class="input-group date offerdateAln">
				<input class=" offer_valid_to form-control" name="offer_valid_to" id="offer_valid_to" type="text" value="<?php if ($_GET['offer_id']!='') {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['offerValue']->value[0]['offer_valid_to'],"%d-%m-%Y");
}?>" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">&nbsp;</span>
			<span class="colon1">&nbsp;</span>
			
					<input type="submit" class="myaccsubmitbtn" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offeraddsubmit'];?>
" />
				
		</div> 
        </form>
	</div>
</div>

<!-- Offers add new end -->

<?php }} ?>
