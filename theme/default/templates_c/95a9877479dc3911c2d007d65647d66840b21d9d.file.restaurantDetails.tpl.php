<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 22:54:56
         compiled from "C:\wamp\www\theme\default\templates\restaurantDetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12819584e01e114c0d9-03119426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95a9877479dc3911c2d007d65647d66840b21d9d' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\restaurantDetails.tpl',
      1 => 1499486086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12819584e01e114c0d9-03119426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_584e01e1679045_00417280',
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
    'categoryList' => 0,
    'searchname' => 0,
    'objSearchDetails' => 0,
    'categoryMenuList' => 0,
    'pizzzaSizeList' => 0,
    'restaurants' => 0,
    'resid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e01e1679045_00417280')) {function content_584e01e1679045_00417280($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\includes\\smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\includes\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('home_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<!-- Header Bottom line starts -->
<div class="searchAreaBgOuterBtm"></div>
<?php if ($_smarty_tpl->tpl_vars['get_res_detail']->value=='1'&&$_smarty_tpl->tpl_vars['res_det_status']->value=='1') {?>
<input type="hidden" id="resLat" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_lat'];?>
" />
<input type="hidden" id="resLong" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['restaurant_long'];?>
" />
<div class="container hide">
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
<div class="container hide">
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





<!-- **************************************************************MENU************************************************************ -->
<div class="container">
	<div class="row">
		
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 15%;" class="" src="theme/default/images/MenuTitle.png">

			<div class="reticulaInterna"></div>
			<h1> <?php echo $_SESSION['delivery_pickup'];?>
 </h1>

			<div id="accordion">

				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['name'] = 'catdet';
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total']);
?>

							<?php if ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']!='') {?>

								<?php if ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']=='Items Populares') {?>

									    <h3>
										    <table class="categoryMenuTables">
												<tr>
													<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/PopularItems.png"></td>
													<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
' name='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
'> <?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name'];?>
</a></td>
												</tr>	
											</table>
										</h3>
									  <div>
										    
											<?php $_smarty_tpl->tpl_vars['categoryMenuList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_id'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
											<ul id="popularTypeContainer" class="PizzaTypes">
												<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

														<li>
															<a href="#" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderPizza(this,<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_price'];?>
);">
																<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
																<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
															</a>
														</li>
																							

												<?php }?>
											<?php endfor; else: ?>
												<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
											<?php endif; ?>
											</ul>



									  </div>

									<?php } elseif ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']=='Bebidas') {?>

									    <h3>
									    <table class="categoryMenuTables">
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/Drinks.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
' name='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
'> <?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name'];?>
</a></td>
											</tr>	
										</table>
										</h3>


									  <div>
									    
										<?php $_smarty_tpl->tpl_vars['categoryMenuList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_id'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
											<ul id="drinksTypeContainer" class="PizzaTypes">
												<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

														<li>
															<a href="#" alt="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderDrinks(this);"><!-- ,<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_price'];?>
 -->
																<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
																<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
															</a>
														</li>
																							

												<?php }?>
											</ul>

											

											<div id="orderDrinksContainer" class="hide">
												<a href="#" class="return" onclick="returnDrinks()"><img src="theme/default/images/x.png"></a>
												<?php $_smarty_tpl->tpl_vars['pizzzaSizeList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeListFP($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['id']), null, 0);?>
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['size'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['size']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['name'] = 'size';
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzzaSizeList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total']);
?>

													<ul class="restaurantList">
														<li> 
															<ul class="pizzasContainer"> 
																<li><!-- <img style="width: 45%;" class="" src="theme/default/images/DrinksPriceSmall.png"> -->
																<p id="drink_slice_id<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_id'];?>
</p>
																<p id="drinksSize<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" class="AgentOrange"><?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_name'];?>
</p><p id="drinksPrice<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" class="AgentOrange">$<?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_price'];?>
</p></li>
																<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
																<li>

																	<form id='myform' method='POST' action='#'>
																	    <input type='button' class='qtyplusDrinks' field='quantityDrinks<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' />
																	    <input type='text' class="AgentOrange qtyIndicator" name='quantityDrinks<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' value='0' class='qty' />
																	    <input type='button' class='qtyminusDrinks' field='quantityDrinks<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' />
																	</form>

																</li>
															</ul>
														</li>
													</ul>


												<?php endfor; else: ?>
													<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
												<?php endif; ?>
												<button class="goToCheckout" onclick="checkoutArrayDrinks()"></button>
												
											</div>





										<?php endfor; else: ?>
											<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
										<?php endif; ?>
										
									  </div>


									  <?php } elseif ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']=='Pizzas') {?>

									    <h3>
									    <table class="categoryMenuTables">
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/PizzaIcon.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
' name='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
'> <?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name'];?>
</a></td>
											</tr>	
										</table>
										</h3>
									  <div>
									    
										<?php $_smarty_tpl->tpl_vars['categoryMenuList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_id'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
											<ul id="pizzaTypeContainer" class="PizzaTypes">
												<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

														<li>
															<a href="#" alt="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderPizza(this);">
																<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
																<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
															</a>
														</li>								

												<?php }?>

											</ul>
											<div id="orderPizzaContainer" class="hide">
												<a href="#" class="return" onclick="returnPizza()"><img src="theme/default/images/x.png"></a>
												<?php $_smarty_tpl->tpl_vars['pizzzaSizeList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeListFP($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['id']), null, 0);?>
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['size'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['size']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['name'] = 'size';
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzzaSizeList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total']);
?>
												<ul class="restaurantList">
														<li> 
															<ul class="pizzasContainer"> 
																<li><!-- <img style="width: 17%;" class="" src="theme/default/images/9_.png"> -->
																<p id="pizza_slice_id<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_id'];?>
</p>
																<p id="pizzaSize<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" class="AgentOrange"><?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_name'];?>
</p><p id="pizzaPrice<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" class="AgentOrange">$<?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_price'];?>
</p></li>
																<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
																<li>

																	<form id='myform' method='POST' action='#'>
																	    <input type='button' class='qtyplus' field='quantityPizzas<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' />
																	    <input type='text' class="AgentOrange qtyIndicator" name='quantityPizzas<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' value='0' class='qty' />
																	    <input type='button' class='qtyminus' field='quantityPizzas<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' />
																	</form>

																</li>
															</ul>
														</li>
												</ul>
												<?php endfor; else: ?>
													<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
												<?php endif; ?> 
												<button class="goToCheckout" onclick="checkoutArrayPizza()"></button>

											</div>
										
										<?php endfor; else: ?>
											<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
										<?php endif; ?>
										
									  </div>



									  <?php } elseif ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']=='Postres') {?>

									    <h3>
									    <table class="categoryMenuTables">
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/Desserts.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
' name='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
'> <?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name'];?>
</a></td>
											</tr>	
										</table>
										</h3>
									  <div>
									    
										<?php $_smarty_tpl->tpl_vars['categoryMenuList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_id'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
										<ul id="dessertsTypeContainer" class="PizzaTypes">
											<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

													<li>
														<a href="#" alt="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderDesserts(this);">
															<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
															<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
														</a>
													</li>
																						

											<?php }?>
										</ul>


										<div id="orderDessertsContainer" class="hide">
											<a href="#" class="return" onclick="returnDesserts()"><img src="theme/default/images/x.png"></a>
											<?php $_smarty_tpl->tpl_vars['pizzzaSizeList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeListFP($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['id']), null, 0);?>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['size'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['size']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['name'] = 'size';
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzzaSizeList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total']);
?>
											<ul class="restaurantList">
													<li> 
														<ul class="pizzasContainer"> 
															<li><!-- <img style="width: 45%;" class="" src="theme/default/images/DessertsPrice.png"> -->
															<p id="dessert_slice_id<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_id'];?>
</p>
															<p id="dessertsSize<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" class="AgentOrange"><?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_name'];?>
</p><p id="dessertsPrice<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
" class="AgentOrange">$<?php echo $_smarty_tpl->tpl_vars['pizzzaSizeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]['pizza_slice_price'];?>
</p></li>
															<li><img style="width: 15%;" class="" src="theme/default/images/Desserts.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
															<li>

																<form id='myform' method='POST' action='#'>
																    <input type='button' class='qtyplusDesserts' field='quantityDesserts<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' />
																    <input type='text' class="AgentOrange qtyIndicator" name='quantityDesserts<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' value='0' class='qty' />
																    <input type='button' class='qtyminusDesserts' field='quantityDesserts<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
' />
																</form>

															</li>
														</ul>
													</li>
													
											</ul>
											<?php endfor; else: ?>
												<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
											<?php endif; ?>
											<button class="goToCheckout" onclick="checkoutArrayDesserts()"></button> 
										</div>


										<?php endfor; else: ?>
											<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
										<?php endif; ?>
										
									  </div>



									  <?php } elseif ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']=='Promociones') {?>

									    <h3>
									    <table>
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/Promociones.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
' name='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
'> <?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name'];?>
</a></td>
											</tr>	
										</table>
										</h3>
									  <div>
									    <ul id="promoTypeContainer" class="PizzaTypes">
										<?php $_smarty_tpl->tpl_vars['categoryMenuList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_id'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>

											<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

													<li>
														<a href="#" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderDesserts(this);">
															<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
															<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
														</a>
													</li>
																						

											<?php }?>
										<?php endfor; else: ?>
											<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
										<?php endif; ?>
										</ul>
									  </div>

									<?php } elseif ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']=='GlutenFree') {?>

									  <h3>
									  	<table>
											<tr>
												<td class="PizzaListIcon" width="20%"><img style="width: 30%;" class="" src="theme/default/images/GlutenFree.png"></td>
												<td class="PizzaListText" width="80%"><a class="menus_detailsLink" id='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
' name='cat_name<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name']);?>
'> <?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_name'];?>
</a></td>
											</tr>	
										</table>
									  </h3>
									  <div>
									    <ul id="glutenTypeContainer" class="PizzaTypes">
										<?php $_smarty_tpl->tpl_vars['categoryMenuList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['cat_id'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>

											<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

													<li>
														<a href="#" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderGluten(this);">
															<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
															<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
														</a>
													</li>
																						

											<?php }?>
										<?php endfor; else: ?>
											<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
										<?php endif; ?>
										</ul>
									  </div>

									<?php }?>
															

							<?php }?>

			  	<?php endfor; else: ?>
					<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
				<?php endif; ?>	


				
			</div>



			<!-- <div id="orderDessertsContainer" class="row hide">
				<a href="#" class="return" onclick="returnDesserts()"><img src="theme/default/images/x.png"></a>
				<?php $_smarty_tpl->tpl_vars['pizzzaSizeList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->pizzzaSizeListFP($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['id']), null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['size'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['size']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['name'] = 'size';
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pizzzaSizeList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total']);
?>
				<ul class="restaurantList">
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DessertsPrice.png"><p>INDIVIDUAL</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Desserts.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myform' method='POST' action='#'>
									    <input type='button' class='qtyplusDesserts' field='quantityDesserts' />
									    <input type='text' name='quantityDesserts' value='0' class='qty' />
									    <input type='button' class='qtyminusDesserts' field='quantityDesserts' />
									</form>

								</li>
							</ul>
						</li>
						
				</ul>
				<?php endfor; else: ?>
					<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
				<?php endif; ?> 
			</div> -->


			<!-- <div id="orderPizzaContainer" class="row hide">
				<a href="#" class="return" onclick="returnPizza()"><img src="theme/default/images/x.png"></a>
				<ul class="restaurantList">
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 17%;" class="" src="theme/default/images/9_.png"><p>INDIVIDUAL</p></li>
								<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myform' method='POST' action='#'>
									    <input type='button' class='qtyplus' field='quantity' />
									    <input type='text' name='quantity' value='0' class='qty' />
									    <input type='button' class='qtyminus' field='quantity' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 25%;" class="" src="theme/default/images/12_.png"><p>MEDIANA</p></li>
								<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 20%;margin-left: 5%;" class="" src="theme/default/images/TwoPersons.png"></li>
								<li>

									<form id='myformTwo' method='POST' action='#'>
									    <input type='button' class='qtyplusTwo' field='quantityTwo' />
									    <input type='text' name='quantityTwo' value='0' class='qtyTwo' />
									    <input type='button' class='qtyminusTwo' field='quantityTwo' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 25%;" class="" src="theme/default/images/14_.png"><p>FAMILIAR</p></li>
								<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 25%;margin-left: 5%;" class="" src="theme/default/images/MorePersons.png"></li>
								<li>

									<form id='myformThree' method='POST' action='#'>
									    <input type='button' class='qtyplusThree' field='quantityThree' />
									    <input type='text' name='quantityThree' value='0' class='qtyThree' />
									    <input type='button' class='qtyminusThree' field='quantityThree' />
									</form>

								</li>
							</ul>
						</li>
				</ul>

			</div> -->


<!-- 


			<div id="orderDrinksContainer" class="row hide">
				<a href="#" class="return" onclick="returnDrinks()"><img src="theme/default/images/x.png"></a>
				<ul class="restaurantList">
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceSmall.png"><p>INDIVIDUAL</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myform' method='POST' action='#'>
									    <input type='button' class='qtyplusDrinks' field='quantityDrinks' />
									    <input type='text' name='quantityDrinks' value='0' class='qty' />
									    <input type='button' class='qtyminusDrinks' field='quantityDrinks' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceMedium.png"><p>MEDIANA</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myformTwo' method='POST' action='#'>
									    <input type='button' class='qtyplusTwoDrinks' field='quantityTwoDrinks' />
									    <input type='text' name='quantityTwoDrinks' value='0' class='qtyTwo' />
									    <input type='button' class='qtyminusTwoDrinks' field='quantityTwoDrinks' />
									</form>

								</li>
							</ul>
						</li>
						<li> 
							<ul class="pizzasContainer"> 
								<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceLarge.png"><p>GRANDE</p></li>
								<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
								<li>

									<form id='myformThree' method='POST' action='#'>
									    <input type='button' class='qtyplusThreeDrinks' field='quantityThreeDrinks' />
									    <input type='text' name='quantityThreeDrinks' value='0' class='qtyThree' />
									    <input type='button' class='qtyminusThreeDrinks' field='quantityThreeDrinks' />
									</form>

								</li>
							</ul>
						</li>
				</ul>
				
			</div> -->






		</div>

		<div class="col-md-4">
		<h1><?php echo $_SESSION['tulekeo'];?>
</h1>
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
				<div class="restaurantMenuAddtocartmm">
							
					<?php echo $_smarty_tpl->getSubTemplate ('cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

							
				</div>
			</form>	
		</div>
	</div>







	
</div>


<!-- **************************************************************TIPOS DE PIZZA************************************************************ -->
<!-- <div id="pizzaTypeContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryMenuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>

			<ul class="PizzaTypes">

				<?php if ($_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>

						<li>
							<a href="#" data-name="<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_category'];?>
" onclick="orderPizza(this,<?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_price'];?>
);">
								<p class="PizzaTypesTitle"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name'];?>
</p>
								<p class="PizzaTypesDescription"><?php echo $_smarty_tpl->tpl_vars['categoryMenuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description'];?>
</p>
							</a>
						</li>
															

				<?php }?>
			</ul>
			<?php endfor; else: ?>
				<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
			<?php endif; ?>	

		</div>
	</div>
</div>
 -->



<!-- 
<div class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 70%;" class="" src="theme/default/images/directions.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['name'] = 'elena';
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurants']->value['restaurants']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total']);
?>
					<li> <a href="restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_name'];?>
</a>	</li>
				<?php endfor; endif; ?>
			</ul>
		</div>
	</div>
	<br>	
</div> -->


<!-- **************************************************************ORDENAR PIZZA************************************************************ -->

<!-- <div id="orderPizzaContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 17%;" class="" src="theme/default/images/9_.png"><p>INDIVIDUAL</p></li>
							<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myform' method='POST' action='#'>
								    <input type='button' class='qtyplus' field='quantity' />
								    <input type='text' name='quantity' value='0' class='qty' />
								    <input type='button' class='qtyminus' field='quantity' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 25%;" class="" src="theme/default/images/12_.png"><p>MEDIANA</p></li>
							<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 20%;margin-left: 5%;" class="" src="theme/default/images/TwoPersons.png"></li>
							<li>

								<form id='myformTwo' method='POST' action='#'>
								    <input type='button' class='qtyplusTwo' field='quantityTwo' />
								    <input type='text' name='quantityTwo' value='0' class='qtyTwo' />
								    <input type='button' class='qtyminusTwo' field='quantityTwo' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 25%;" class="" src="theme/default/images/14_.png"><p>FAMILIAR</p></li>
							<li><img style="width: 35%;" class="" src="theme/default/images/Pizza.png"><img style="width: 25%;margin-left: 5%;" class="" src="theme/default/images/MorePersons.png"></li>
							<li>

								<form id='myformThree' method='POST' action='#'>
								    <input type='button' class='qtyplusThree' field='quantityThree' />
								    <input type='text' name='quantityThree' value='0' class='qtyThree' />
								    <input type='button' class='qtyminusThree' field='quantityThree' />
								</form>

							</li>
						</ul>
					</li>
			</ul>

		</div>
	</div>
</div> -->



<!-- **************************************************************ORDENAR BEBIDA************************************************************ -->

<!-- <div id="orderDrinksContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceSmall.png"><p>INDIVIDUAL</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myform' method='POST' action='#'>
								    <input type='button' class='qtyplusDrinks' field='quantityDrinks' />
								    <input type='text' name='quantityDrinks' value='0' class='qty' />
								    <input type='button' class='qtyminusDrinks' field='quantityDrinks' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceMedium.png"><p>MEDIANA</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myformTwo' method='POST' action='#'>
								    <input type='button' class='qtyplusTwoDrinks' field='quantityTwoDrinks' />
								    <input type='text' name='quantityTwoDrinks' value='0' class='qtyTwo' />
								    <input type='button' class='qtyminusTwoDrinks' field='quantityTwoDrinks' />
								</form>

							</li>
						</ul>
					</li>
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DrinksPriceLarge.png"><p>GRANDE</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Drinks.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myformThree' method='POST' action='#'>
								    <input type='button' class='qtyplusThreeDrinks' field='quantityThreeDrinks' />
								    <input type='text' name='quantityThreeDrinks' value='0' class='qtyThree' />
								    <input type='button' class='qtyminusThreeDrinks' field='quantityThreeDrinks' />
								</form>

							</li>
						</ul>
					</li>
			</ul>

		</div>
	</div>
</div> -->

<!-- **************************************************************ORDENAR POSTRE************************************************************ -->

<!-- <div id="orderDessertsContainer" class="container hide">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 20%;" class="" src="theme/default/images/Pizzas.png">

			<div class="reticulaInterna"></div>

			<ul class="restaurantList">
					<li> 
						<ul class="pizzasContainer"> 
							<li><img style="width: 45%;" class="" src="theme/default/images/DessertsPrice.png"><p>INDIVIDUAL</p></li>
							<li><img style="width: 15%;" class="" src="theme/default/images/Desserts.png"><img style="width: 15%;margin-left: 5%;" class="" src="theme/default/images/OnePerson.png"></li>
							<li>

								<form id='myform' method='POST' action='#'>
								    <input type='button' class='qtyplusDesserts' field='quantityDesserts' />
								    <input type='text' name='quantityDesserts' value='0' class='qty' />
								    <input type='button' class='qtyminusDesserts' field='quantityDesserts' />
								</form>

							</li>
						</ul>
					</li>
					
			</ul>

		</div>
	</div>
</div> -->



<style type="text/css">
	
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
#target {
        width: 345px;
}

/*---------------------------------------LISTA DE RESTAURANTS----------------------------------------------*/

.hide {
	display: none;
}

.restaurantList>li {
    padding: 1%;
    border-bottom: 1px solid #eee;
    margin: 2%;
    padding-top: 0% !important;
    font-size: 18px;
}

.restaurantList>li:last-child {
	border-bottom: none; 
	margin-bottom: 0 !important;
	padding-bottom: 0 !important; 
}

.restaurantList a {
    color: black;
}

.restaurantList a:hover {
    font-weight: bold;
    transition: 0.5s;
    text-decoration: none;
}


/*------------------------------------------PIZZAS ORDENAR--------------------------------------------*/

.pizzasContainer {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.pizzasContainer li {
    display: inline-block;
    width: 50%;
    vertical-align: middle;
  }



#myform,
#myformTwo,
#myformThree {
    text-align: center;
    padding: 5px;
    margin: 2%;
}
.qty,
.qtyTwo,
.qtyThree {
    width: 40px;
    height: 25px;
    text-align: center;
    border: none;
}
input.qtyplus,
input.qtyplusTwo,
input.qtyplusThree,

input.qtyplusDrinks,
input.qtyplusTwoDrinks,
input.qtyplusThreeDrinks,

input.qtyplusDesserts {
    width: 25px;
    height: 25px;
    background: url("../theme/default/images/ADD_number.png");
    background-size: cover;
    border: none;
}


input.qtyminus,
input.qtyminusTwo,
input.qtyminusThree,

input.qtyminusDrinks,
input.qtyminusTwoDrinks,
input.qtyminusThreeDrinks,

input.qtyminusDesserts {
    width: 25px;
    height: 25px;
    background: url("../theme/default/images/Remove_number.png");
    background-size: cover;
    border: none;
}


@media screen and (min-width: 20em) {

.pizzasContainer li {
    width: 33%;
    vertical-align: middle;
  }

}

/*--------------------------------------PIZZA LIST---------------------------------------*/

.pizzaList table {
	width: 90%;
}

.PizzaListIcon {
    text-align: right;
    padding: 2%;
}

.PizzaListText {
    padding: 2%;
    border-bottom: 1px solid black;
    text-align: left;
}

.PizzaListTextLast {
    padding: 2%;
    text-align: left;
}

.PizzaMenuListItem a {
	color: black;
}

.PizzaMenuListItem a:hover,
.PizzaMenuListItem:hover {
	font-weight: bold;
    transition: 0.5s;
    text-decoration: none;
}

/*---------------------------------------------------------------------------------------*/

/*------------------------------------PIZZA TYPES--------------------------------------*/

.PizzaTypes {
    padding-right: 15%;
    width: 100%;
    padding-left: 20%;
}

.PizzaTypes a {
	color: black;
	text-align: left;
}

.PizzaTypes li {
    padding: 1%;
    border-bottom: 1px solid #eee;
    margin: 2%;
    padding-top: 0% !important;
}

.PizzaTypes li:last-child {
	border-bottom: none; 
	margin-bottom: 0 !important;
	padding-bottom: 0 !important; 
}


.PizzaTypesTitle {
    font-size: x-large;
    font-weight: bold;
    margin: 0;
}

.PizzaTypesDescription {
    font-style: italic;
}


/*------------------------RETURN-------------------------*/
.return {
    float: right;
    width: 5%;
    position: absolute;
    right: 2%;
}

.return img {
    width: 100%;
}

</style>


<?php echo '<script'; ?>
 type="text/javascript">
	
	$(function(){

		$('.navbar-nav li').eq(0).removeClass("active");

		$('.navbar-nav li').eq(4).addClass("active");

		//---------------------------------------------PIZZA-----------------------------------------------
	    // This button will increment the value
	    $('.qtyplus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminus").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    // This button will increment the value
	    $('.qtyplusTwo').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusTwo").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    // This button will increment the value
	    $('.qtyplusThree').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusThree").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    //-------------------------------------------------------------------DRINKS

	    // This button will increment the value
	    $('.qtyplusDrinks').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusDrinks").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    // This button will increment the value
	    $('.qtyplusTwoDrinks').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusTwoDrinks").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    // This button will increment the value
	    $('.qtyplusThreeDrinks').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusThreeDrinks").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    //-------------------------------------------------------------------DESSERTS

	    // This button will increment the value
	    $('.qtyplusDesserts').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusDesserts").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    


		$( "#accordion" ).accordion({
	      collapsible: true
	    });


	});

	var res_id = "";
	function getValuesForCheckOut(){
		res_id = sessionStorage.getItem("res_id");
	}

	var alt = "";
	function orderPizza(element){
		var selection = $(element).data("name");
		alt = $(element).attr("alt");
		console.log("alt: " + alt);
		console.log(selection);			
		$("#orderPizzaContainer").removeClass("hide");
		$("#orderDrinksContainer").addClass("hide");
		$("#orderDessertsContainer").addClass("hide");
		
		$("#pizzaTypeContainer").addClass("hide");
		$(".categoryMenuTables").addClass("hide");
		$(".PizzaTypes").addClass("hide");

		sessionStorage.setItem('menu_category', selection);
	}

	function orderDrinks(element){
		var selection = $(element).data("name");
		alt = $(element).attr("alt");
		console.log("alt: " + alt);
		console.log(selection);			
		$("#orderDrinksContainer").removeClass("hide");
		$("#orderPizzaContainer").addClass("hide");
		$("#orderDessertsContainer").addClass("hide");
		
		$("#drinksTypeContainer").addClass("hide");
		$(".categoryMenuTables").addClass("hide");
		$(".PizzaTypes").addClass("hide");

		sessionStorage.setItem('menu_category', selection);
	}

	function orderDesserts(element){
		var selection = $(element).data("name");
		alt = $(element).attr("alt");
		console.log("alt: " + alt);
		console.log(selection);			
		$("#orderDrinksContainer").addClass("hide");
		$("#orderPizzaContainer").addClass("hide");
		$("#orderDessertsContainer").removeClass("hide");
		
		$("#dessertsTypeContainer").addClass("hide");
		$(".categoryMenuTables").addClass("hide");
		$(".PizzaTypes").addClass("hide");

		sessionStorage.setItem('menu_category', selection);
	}


	function returnDesserts(){
		$("#orderDessertsContainer").addClass("hide");
		
		$("#dessertsTypeContainer").removeClass("hide");
		$(".categoryMenuTables").removeClass("hide");
		$(".PizzaTypes").removeClass("hide");
	}

	function returnDrinks(){
		$("#orderDrinksContainer").addClass("hide");
		
		$("#drinksTypeContainer").removeClass("hide");
		$(".categoryMenuTables").removeClass("hide");
		$(".PizzaTypes").removeClass("hide");
	}

	function returnPizza(){
		$("#orderPizzaContainer").addClass("hide");

		$("#pizzaTypeContainer").removeClass("hide");
		$(".categoryMenuTables").removeClass("hide");
		$(".PizzaTypes").removeClass("hide");
	}

	var itemList = [];  // new array

	function checkoutArrayPizza() {
		
		for (var i = 0; i < 3; i++) {
			var item = $("input[name='quantityPizzas"+i+"']").val();
			if (item > 0) {

				//alert($("#pizzaSize"+i).text());

				itemList.push({
				                quantity: item,
				                //resid: sessionStorage.getItem("resID"),
								resid: <?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
 ,
				                pizzasize_slice: $("#pizza_slice_id"+i).text(),
				                menuid: alt

				            });  // add a new object
			}
		}
		
		customAddItemToCart();

		for (var i = 0; i < 3; i++) {
			$("input[name='quantityPizzas"+i+"']").val(0);
			
		}

		itemList = [];
		
	}


	function checkoutArrayDrinks() {

		for (var i = 0; i < 3; i++) {
			var item = $("input[name='quantityDrinks"+i+"']").val();
			if (item > 0) {

				//alert($("#pizzaSize"+i).text());

				itemList.push({
				                quantity: item,
				                resid: <?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
,
				                pizzasize_slice: $("#drink_slice_id"+i).text(),
				                menuid: alt

				            });  // add a new object
			}
		}
		//alert(itemList.length);
	}


	function checkoutArrayDesserts() {

		for (var i = 0; i < 3; i++) {
			var item = $("input[name='quantityDesserts"+i+"']").val();
			if (item > 0) {

				//alert($("#pizzaSize"+i).text());

				itemList.push({
				                quantity: item,
				                resid: <?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
,
				                pizzasize_slice: $("#dessert_slice_id"+i).text(),
				                menuid: alt

				            });  // add a new object
			}
		}
		//alert(itemList.length);
	}

	

<?php echo '</script'; ?>
>






<?php if ($_REQUEST['lowamt']=='ideal') {?>

<?php echo '<script'; ?>
 type="text/javascript">
alert("Your ideal payment price is low.Please choose menu morethan 84 EURO");
<?php echo '</script'; ?>
>

<?php }?>
<?php }} ?>
