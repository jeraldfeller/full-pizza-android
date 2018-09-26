<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-23 11:49:55
         compiled from "C:\wamp\www\theme\default\templates\restaurantDetails_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19536584e01e168e835-59877795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f97ba8d434a6cd6622498f238de69ce4c210689' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\restaurantDetails_menu.tpl',
      1 => 1498236559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19536584e01e168e835-59877795',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_584e01e17cda86_27943076',
  'variables' => 
  array (
    'LANG' => 0,
    'categoryList' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'searchrestaurantDetails' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e01e17cda86_27943076')) {function content_584e01e17cda86_27943076($_smarty_tpl) {?><div class="searchResultInner">
	<div class="detailsInnerNewWrap">
		<div id="detailsRightRelated" class="middledivheight">
			<div class="catleftInTopWrap col-md-3 pad0 categoryScroll hidden-xxs">
				<div class="catleftIn borderbox" id="catScrollDiv">
					<div class="categoryleft pad0">
						<div class="filterOtion clearfix">
							<div class="fine_menu_head"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_find_menu_items']);?>
</div>
							<input type="text" class="srchMenuitem" id="menuvalue" name="menuvalue" autocomplete="off" value="" placeholder="Search menu items" onkeyup="return searchMenuItems(<?php echo $_GET['resid'];?>
);" />
						</div>
						<div class="categorySelect resmenuCategory">
							<h2 id="selectcatname"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_catagory']);?>
</h2>						
							
							<ul class="fullMeuListUl">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['name'] = "cat";
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total']);
?>
								
								<?php $_smarty_tpl->tpl_vars['catnam'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['catname'], null, 0);?>
									<?php if ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['catname']!='') {?>
									<li><a href="#catname_<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['catname']);?>
" class="selectCategory"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['catname']));?>
</a></li>
									<?php }?>
								<?php endfor; endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="middleIn col-lg-9 col-md-9 col-sm-12  col-xs-12">
				
				
				
		
				
				<div class="menuContain borderbox">
					
					<div id="loadingimg_vegnonveg_items" style="display:none;"></div>
					
					
					<div class="menuSrchTop">
						<div id="Indiv_Items">
							<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						</div>
					</div>
				</div>
			</div>
			<div id="menu_container" class="cartMenu">
				<div class="detailsRight11 menuRightFixed" id="sidebar">
					
					<h1 class="detailsRightHead borderbox"><span>Your Order</span> <span class="cart-close pull-right">X</span></h1>
					<div class="detailsRightMiddle1 borderbox">
					<form name="checkoutpage" method="post" onclick="<?php if ($_SESSION['customerid']=='') {?>return clear()<?php }?>" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_SESSION['customerid']=='') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerLogin.php?pagetype=checkout<?php } else { ?>custlogin/checkout<?php }?>  <?php } else {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>checkout.php<?php } else { ?>checkout<?php }
}?>" >
						<input type="hidden" name="minimumorder" id="minimumorder" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_minorder_price'];?>
"/>
						<input type="hidden" name="total" id="totalprice" value="<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
"/>
						<input type="hidden" name="resid" id="resid" value="<?php echo $_REQUEST['resid'];?>
"/>
						<input type="hidden" name="resname" id="resname" value="<?php echo $_REQUEST['resname'];?>
"/>
						<div class="contain center">
						 
						
						</div>
						<div class="restaurantMenuAddtocartmm">
						
							<?php echo $_smarty_tpl->getSubTemplate ('cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						
						</div>
					</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="orderPopup_limit" class="addtocartWrapNew1" style="display:none;">
    <span  class="orderLima"><span id="limitaddon"></span><span class="limitClose" onclick="myPopupWindowClose('#orderPopup_limit','#maskaa')">X</span></span>
</div>
<div id="maskaa"></div>
<!-- Note It POPUP -->
<div id="noteitpop" style="display:none; width:539px;">
	<div class="addtoCartInner">
		<div class="addtocartPopupHead popupNoteWidth">
			<h1 class="addtocartPopupHeadNew"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_heading']);?>
</h1>
			<div class="addtoCartClose" onclick="myPopupWindowClose('#noteitpop');"></div>
		</div>
		<div class="addtocartPopup popupNoteWidth" >
			<div class="addtocartWrap popupNoteWidthInner">
				<h1 class="popupNoteitHead"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_wings_with_fries']);?>
</h1>
				<span class="popupNoteCam"></span>
				<div class="addTableCart">
					<div class="addtoCartInBorder">
						<div class="addTableCartLeft"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_how_was_it']);?>
</div>
						<div class="addTableCartRight">
							<span class="popupTastyNote"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_tasty']);?>
</span>
							<span class="popupPassNote"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_will_pass']);?>
</span>
						</div>
					</div>
					<div class="addtoCartInBorder">
						<div class="addTableCartLeft"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_note']);?>
</div>
						<div class="addTableCartRight">
							<textarea rows="" cols="" class="addtocartTxtarea" name="" id="" ></textarea>
							<div class="addChargesApply"><input type="checkbox" /><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_keep_it_yourself']);?>
</div>
						</div>
					</div>
					<div class="addtoCartInBorder">
						<div class="addTableCartLeft"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_stick_it_where']);?>
</div>
						<div class="addTableCartRight">
							<select class="addtocartSelect1" name="" id="" >
								<option>All Notes</option>
							</select>
						</div>
					</div>
					<div class="addtoButton1">
						<span class="loginBtnNew"></span>
						<input class="loginBtnNewRite" type="button" value="Add to Cart" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
