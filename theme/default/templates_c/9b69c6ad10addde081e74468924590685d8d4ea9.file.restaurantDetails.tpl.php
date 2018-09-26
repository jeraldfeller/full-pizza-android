<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 01:54:14
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1572413918576850eeb43489-61358335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b69c6ad10addde081e74468924590685d8d4ea9' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails.tpl',
      1 => 1466424471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1572413918576850eeb43489-61358335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'get_res_detail' => 0,
    'res_det_status' => 0,
    'searchrestaurantDetails' => 0,
    'SITE_IMAGE_RESTAURANT_URL' => 0,
    'SITE_IMAGE_URL' => 0,
    'deliveryoption' => 0,
    'LANG' => 0,
    'currency' => 0,
    'reviewscount' => 0,
    'reviewrating' => 0,
    'voucherdis' => 0,
    'myfavnum' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'req_file_name' => 0,
    'CartCount' => 0,
    'cartDetailsCnt' => 0,
    'total' => 0,
    'reslattitude' => 0,
    'reslongtitude' => 0,
    'yelp_reviews' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_576850ef1df5f2_68139365',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576850ef1df5f2_68139365')) {function content_576850ef1df5f2_68139365($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><!-- Header Bottom line starts -->
<div class="searchAreaBgOuterBtm"></div>
<?php if ($_smarty_tpl->tpl_vars['get_res_detail']->value=='1'&&$_smarty_tpl->tpl_vars['res_det_status']->value=='1') {?>
<input type="hidden" id="resLat" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_lat'];?>
" />
<input type="hidden" id="resLong" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_long'];?>
" />
<div class="container">
    <div class="detSrchInner borderbox">
        <div class="searchMidImgNew hidden-xs  col-lg-2 col-md-2 col-sm-3 center pad0">
            <span  class="detSrchLeftImg">
                <!-- <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_logo']!='') {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_RESTAURANT_URL']->value;?>
/logo/<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_logo'];?>
" alt="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
" title="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
"/>
                <?php } else { ?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/no-image.jpg" alt="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
" title="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
"/>
                <?php }?> -->
                <img src="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_logo'];?>
" alt="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
" title="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
"/>
            </span>
             <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_feature_status']=='Yes') {?>
                <div class="featureIcon"></div>
            <?php }?>   
        </div>
        <div class="detSrchLeftCont col-lg-7 col-md-7 col-sm-6 pad0 searchright-xxs">
            <h1 class="searchInner1MidContHead"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_name']));?>
</h1>
            <p class="searchAddressCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_streetaddress']);?>
,&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['cityname']));
if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_zip']!='') {?>&nbsp;-&nbsp;<?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_zip']);
}?></p>
            <span class="contain mobilecenter">
            <?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {?>
                <span class="deliveryOrder"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_min_order']);?>
<span style="color:#000000"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_minorder_price']);?>
</span></span>
            <?php }?>    
                <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_delivery']=='Yes'&&$_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_delivery_charge']!='') {?>
                <span class="deliveryOrder"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_shipping'];?>
 :<span style="color:#000000"> <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_delivery_charge']=='0.00') {?>Free<?php } else {
echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_delivery_charge'];
}?></span></span>
                <?php }?>
                <span class="cuisine_types col-md-12 col-sm-12 pad0"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['servingcuisine'],120,"...",true);?>
</span>
            </span>
        </div>   
        <div class="detSrchRight col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
			<span class="user_reviews">(<?php echo $_smarty_tpl->tpl_vars['reviewscount']->value;?>
 Reviews)</span>
            <div class="relate">
                <div class="searchStar"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_review'];?>
</div>
                <div class="orangeStar" style="width:<?php echo $_smarty_tpl->tpl_vars['reviewrating']->value;?>
%;"></div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['voucherdis']->value[0]['voucher_name']!='') {?>
				<div class="voucher_code col-md-12 relative">
					<span class="scissorleft"></span>
					<span class="col-md-12 center pad0">Use our Voucher Code <span class="yellow"><?php echo $_smarty_tpl->tpl_vars['voucherdis']->value[0]['voucher_name'];?>
</span> <br />& Get <span class="yellow"><?php if ($_smarty_tpl->tpl_vars['voucherdis']->value[0]['off_type']=='Price') {?>Rs.<?php echo $_smarty_tpl->tpl_vars['voucherdis']->value[0]['off_price_percentage'];
} elseif ($_smarty_tpl->tpl_vars['voucherdis']->value[0]['off_type']=='Percentage') {
echo $_smarty_tpl->tpl_vars['voucherdis']->value[0]['off_price_percentage'];?>
%<?php }?></span> Discount</span>
					<span class="scissorright"></span>
				</div>
            <?php }?>
			 
            <?php if ($_smarty_tpl->tpl_vars['myfavnum']->value>0) {?>
           		<a style="cursor:pointer;" class="detailsMinusicon" id="favaddrem" <?php if ($_SESSION['customerid']!='') {?>onclick="myFavorites('<?php echo $_GET['resid'];?>
');"<?php } else { ?>href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerLogin.php?pagetype=details&resid=<?php echo $_GET['resid'];?>
&resname=<?php echo $_GET['resname'];
} else { ?>custLogin/details/<?php echo $_GET['resid'];?>
/<?php echo $_GET['resname'];
}?>"<?php }?>><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_removefavorites'];?>
</span></a>
			<?php } else { ?>
				<a style="cursor:pointer;" class="detailsAddicon" id="favaddrem" <?php if ($_SESSION['customerid']!='') {?>onclick="myFavorites('<?php echo $_GET['resid'];?>
');"<?php } else { ?>href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerLogin.php?pagetype=details&resid=<?php echo $_GET['resid'];?>
&resname=<?php echo $_GET['resname'];
} else { ?>custLogin/details/<?php echo $_GET['resid'];?>
/<?php echo $_GET['resname'];
}?>"<?php }?>><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_addfavorites'];?>
</span></a>
			<?php }?>
            
        </div> 
    </div>
</div>
<!-- Search Area ends -->
<div class="container">
    <!-- Container Inner starts -->
    <div class="ionTabs" id="tabs_1" data-name="Tabs_Group">    
        <ul class="ionTabs__head detailsMainMenuUl detailsMainMenu">
            <li class="ionTabs__tab" data-target="details_menu">
                <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_menu'];?>
</a>
            </li>
            <li  class="ionTabs__tab" data-target="details_info">
                <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_info'];?>
</a>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_booktable']!='No') {?>
            <li  class="ionTabs__tab" data-target="details_book">
                <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_booking'];?>
</a>
            </li>
            <?php }?>
            <li  class="ionTabs__tab" data-target="details_offer">
                <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_offer'];?>
</a>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['voucher_id']!='') {?>
            <li  class="ionTabs__tab" data-target="details_vouchers">
                <a href="javascript:void(0);">Vouchers</a>
            </li>
            <?php }?>
            <li  class="ionTabs__tab" data-target="details_review">
                <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_review'];?>
</a>
            </li>
               
			<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>
			<li class="pull-right">
				<div class="cartScroll" id="cartTotal">
                    <div class="add_cart"><span id="CartCount"><?php if ($_smarty_tpl->tpl_vars['CartCount']->value!='') {
echo $_smarty_tpl->tpl_vars['CartCount']->value;
} else { ?>0<?php }?></span></div> <p class="text">Your Cart - </p> 
                    <span class="totalPriceCount"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?></span>
					<div class="cartloadingimage"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/menu-loading.gif" alt="loading" title="loading" /></div>
                </div>

			</li>    
			<?php }?>  
        </ul>
        
        <div class="ionTabs__body">
		

            
            <!--<div id="loadingimg" style="display:none;">&nbsp;</div>-->
            
            
            <div class="ionTabs__item menutabcontent" data-name="details_menu" >
                <?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            
            
            <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_booktable']!='No') {?>
            <div class="ionTabs__item" data-name="details_book" >
                <?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_bookatable.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <?php }?> 
            
            
            <div class="ionTabs__item" data-name="details_offer" >          
                <?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_offer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            
            
            <div class="ionTabs__item" data-name="details_vouchers">
				<div class="searchResultInner">      
					<div class="restDetInfo1Inner clearfix">     
						  <div class="tablecontainer">
							   <table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr class="orderInnerHead">
											<td class="orderHeading"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_voucher_code']);?>
</td>
											 <td class="orderHeading"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_voucher_price']);?>
</td>
											 <td class="orderHeading">Type of Use </td>                    
											 <td class="orderHeading"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_validity']);?>
 </td>
										</tr>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['name'] = "voucher";
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['voucherdis']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["voucher"]['total']);
?>
											<?php if ($_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['valid_from']!=''&&$_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['valid_to']!='') {?>   
												<tr class="orderInnerCont">                
													<td><?php echo $_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['voucher_name'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['off_price_percentage'];?>
</td>
													<td><?php if ($_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['use_type']=='S') {?> Single<?php } else { ?> Multiple<?php }?></td>
													<td>
														<div><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_validity_from']);?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['valid_from'],"%d/%m/%Y");?>
</div>
														<div><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_validity_to']);?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherdis']->value[$_smarty_tpl->getVariable('smarty')->value['section']['voucher']['index']]['valid_to'],"%d/%m/%Y");?>
</div>
													</td>
												</tr>
											<?php }?>    
										<?php endfor; else: ?>
											<tr>
												<td colspan="4" class="text-danger text-center">No vouchers found </td>                 
											</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			  </div> 
				
				
				<div class="ionTabs__item" data-name="details_info" >
					<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_info.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>
				
				
				<div class="ionTabs__item" data-name="details_review">
					<?php echo $_smarty_tpl->getSubTemplate ('restaurantDetails_review.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>
			
				
				<div class="ionTabs__item" data-name="details_map">
					<div class="searchResultInner">
						<div class="restDetInfo1Inner">
							<input type="hidden" name="reslattitude" id="reslattitude" value="<?php echo $_smarty_tpl->tpl_vars['reslattitude']->value;?>
" />
							<input type="hidden" name="reslongtitude" id="reslongtitude" value="<?php echo $_smarty_tpl->tpl_vars['reslongtitude']->value;?>
" />
							<input type="hidden" name="resid" id="resid" value="<?php echo $_GET['resid'];?>
" />
						   <div id="showGoogleMaps" class="showGoogleMaps"></div>    
						</div>
						
						<div class="addPageCont" id="map_distance_show">
							<div class="contain">
								<span class="addPageRightFont">&nbsp;</span>
								<span class="colon1">&nbsp;</span>
								<div id="map" class="col-sm-12 no-padding"></div>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="ionTabs__item" data-name="details_yelp">
					<div class="searchResultInner">
						<div class="contents_review_left">
							<a class="cont_review_head_left" href="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[2];?>
" target="_blank">
								<div class="yelp_review_head col-md-12 col-xs-12 col-sm-12"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/yelp_logo.png" alt=""/> <?php if ($_smarty_tpl->tpl_vars['yelp_reviews']->value[1]!='') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[1];?>
" /> <?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[0];
}?> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_review'];?>
</div>
							</a>
							
							<div class="detail-yelp">
								<?php if ($_smarty_tpl->tpl_vars['yelp_reviews']->value[2]!='') {?>
									<div class="yelprev-left">
										<span class="user-photo"><img src="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[5];?>
" alt="" title="" /></span>
										<span class="revUserName"><?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[7];?>

										<div class="review-date"><img src="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[3];?>
" alt="" title=""/> <?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[6];?>
</div></span>
									</div>
								   <span class="ylep-reviewcon"> <?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[4];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['yelp_reviews']->value[8];?>
" class="pull-right" target="_blank"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_read_more']);?>
</a></span>
								<?php } else { ?>
									<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_no_records_found']);?>

							   <?php }?>
							</div>
						</div>
					</div>
				</div>
				
				 <!-- Pre loader is Very Important-->
				<div class="ionTabs__preloader"></div>  
				
			</div>
		
        <!-- Order POP -->
<div id="orderpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog clearfix">
        <div class="modal-content">
            <div class="addtoCartInner">
                
                <div class="clr"></div>
                <div class="addtocartPopup1" >
                    <input type="hidden" class="mid" name="mid" />
                    <div id="Popupordermenuinfo"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container Inner ends -->
    </div>
</div>
<a href="#" class="scrollup">Scroll</a>
<?php } elseif ($_smarty_tpl->tpl_vars['res_det_status']->value=='0') {?>
<div class="noRecord"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_food_order_not_available']);?>
</div>
<?php } else { ?>
<div class="noRecord"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_no_restaurant']);?>
</div>
<?php }?>


<?php if ($_REQUEST['lowamt']=='ideal') {?>

<?php echo '<script'; ?>
 type="text/javascript">
alert("Your ideal payment price is low.Please choose menu morethan 84 EURO");
<?php echo '</script'; ?>
>

<?php }?>
<?php }} ?>
