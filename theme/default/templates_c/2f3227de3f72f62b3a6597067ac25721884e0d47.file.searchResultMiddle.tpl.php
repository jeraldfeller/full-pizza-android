<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 19:02:39
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/searchResultMiddle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3694360145767f077cc4be4-29044051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f3227de3f72f62b3a6597067ac25721884e0d47' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/searchResultMiddle.tpl',
      1 => 1466424444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3694360145767f077cc4be4-29044051',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reslattitude' => 0,
    'reslongtitude' => 0,
    'searchrestaurantTotal' => 0,
    'searcharea' => 0,
    'searchcuisine' => 0,
    'searchrestaurant' => 0,
    'areaid' => 0,
    'cuisine' => 0,
    'city' => 0,
    'zipcode' => 0,
    'pricemin' => 0,
    'pricemax' => 0,
    'searchrestaurantList' => 0,
    'LANG' => 0,
    'currency' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'pagination' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767f07838ddf9_05038186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767f07838ddf9_05038186')) {function content_5767f07838ddf9_05038186($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.truncate.php';
?>
<input type="hidden" name="" value="<?php echo $_smarty_tpl->tpl_vars['reslattitude']->value;?>
" id="firstreclat" />
<input type="hidden" name="" value="<?php echo $_smarty_tpl->tpl_vars['reslongtitude']->value;?>
" id="firstreclong" />
<input type="hidden" name="" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantTotal']->value;?>
" id="searchrestaurantTotal" />


<input type="hidden" name="searcharea" class="searcharea" value="<?php echo $_smarty_tpl->tpl_vars['searcharea']->value;?>
"/>
<input type="hidden" name="searchcuisine" class="searchcuisine" value="<?php echo $_smarty_tpl->tpl_vars['searchcuisine']->value;?>
"/>
<input type="hidden" name="searchrestaurant" class="searchrestaurant" value="<?php echo $_smarty_tpl->tpl_vars['searchrestaurant']->value;?>
"/>

<input type="hidden" name="areaid" class="areaid" value="<?php echo $_smarty_tpl->tpl_vars['areaid']->value;?>
"/>
<input type="hidden" name="cuisine" class="cuisine" value="<?php echo $_smarty_tpl->tpl_vars['cuisine']->value;?>
"/>
<input type="hidden" name="city" class="city" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
"/>
<input type="hidden" name="zipcode" class="zipcode" value="<?php echo $_smarty_tpl->tpl_vars['zipcode']->value;?>
"/>

<input type="hidden" name="pricemin" class="pricemin" value="<?php echo $_smarty_tpl->tpl_vars['pricemin']->value;?>
"/>
<input type="hidden" name="pricemax" class="pricemax" value="<?php echo $_smarty_tpl->tpl_vars['pricemax']->value;?>
"/>
   	
<?php if ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value>0) {?>
<div class="contain">
    
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['name'] = 'searchRest';
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['searchrestaurantList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total']);
?>
	<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['status']=='Open') {?>
    	<div class="searchResultMidInner borderbox">
    		<div class="searchMidContain relative">
            	<div class="searchMidBtm">
            		<div class="col-md-9 col-sm-12 pad0 col-xs-12 ">
                		<div class="col-md-12 col-xs-12 pad0">
                            <div class="searchMidImgNew col-md-3 col-sm-4 pad0">
    								
                                <img src="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_logo'];?>
" alt="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_name']));?>
" title="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_name']));?>
"  />
                                <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_feature_status']=='Yes') {?>
                                    <div class="featureIcon"></div>
                                <?php }?>											
    							
    						</div>
            			
                   		<div class="col-md-9 col-sm-8 searchright-xxs">
                   			 <h1 class="searchInner1MidContHead"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_name']));?>
</h1>
                    		 <span class="searchAddressCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_streetaddress']);?>
,&nbsp;<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['cityname']));?>
,&nbsp; <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['statename']));?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_zip']!='') {?>&nbsp;-&nbsp;<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_zip'];
}?></span>
                       
                         <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_minorder_price']!=''&&$_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery']=='Yes') {?>
                            <span class="deliveryOrder border0"> <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_mindelorder']);?>
: <span style="color:#333;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_minorder_price'];?>
</span></span>
                         <?php }?>
                         <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery']=='Yes'&&$_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery_charge']!='') {?>
                         <span class="deliveryOrder"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_delivaryfee'];?>
: <span style="color:#333;"><?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery_charge']=='0.00') {
echo $_smarty_tpl->tpl_vars['LANG']->value['search_delfree'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery_charge'];
}?></span></span>
                         <?php }?>
                          </div>
                         
                	   </div>     
                	</div>
                	<div class="searchMidTxtRight col-lg-3 col-sm-5 col-md-3 col-xs-3 pull-right">
						<div class="clearfix">
							<span class="user_reviews">(<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewscount'];?>
 <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_review']);?>
)</span>
							<div class="relate">
								<div class="searchStar"></div>
								<div class="orangeStar"  style="width:<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewrating'];?>
%;"></div>
							</div>
						</div>
						<div class="btn-group orderFont">
							<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_id'];?>
&amp;resname=<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_seourl'];
} else { ?>menu/<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_seourl'];
}?>" > 
							<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['status']=='Open') {?>
								<span class="orderbutton"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_ordernow'];?>
</span>
							<?php } else { ?>
								<span class="preorderbutton">Closed</span>
							<?php }?>
							</a> 
						</div>					
    				</div>
                </div>
                <!--<div class="col-md-12 col-sm-12 col-xs-12 pad0 hidden-xs">
    				<div class="small_review_star">
                      <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']!='') {?>
    					<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='1') {?> <span class="reviewStar reviewStar1"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='2') {?> <span class="reviewStar reviewStar2"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='3') {?><span class="reviewStar reviewStar3"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='4') {?> <span class="reviewStar reviewStar4"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='5') {?> <span class="reviewStar"></span>
						<?php }?>
                        <?php } else { ?>
                        <span class="searchnoreview"></span>
                        <?php }?>
                        
    				</div>
    				<div class="col-md-10 col-sm-8  border-left">
                        <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewmessage']!='') {?>
                        <span class="small_review">"<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewmessage'],120,"...",true);?>
"</span><?php } else { ?>
    					<span class="small_review">"<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_taste_awesome']);?>
"</span>
                        <?php }?>
    				</div>
    			</div>-->
            </div>
        </div>
    <?php }?>
    <?php endfor; endif; ?>
 </div>
<!-- -----------------------------restaurant closed status--------------------------------------------------- -->	
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['name'] = 'searchRest';
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['searchrestaurantList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['searchRest']['total']);
?>
<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['status']!='Open') {?>
    <div class="searchResultMidInner borderbox">
    	
    		<div class="searchMidContain relative">
                <div class="searchMidBtm">
    				<div class="col-md-9 col-sm-12 pad0  col-xs-12">
    					<div class="col-md-12 col-xs-12 pad0">
    						<div class="searchMidImgNew col-md-3 pad0">									
    							
                                <img src="<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_logo'];?>
" alt="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_name']));?>
" title="<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_name']));?>
"/>
                                
                                <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_feature_status']=='Yes') {?>
                                    <div class="featureIcon"></div>
                                <?php }?>   										
    						</div>
    							
                            <div class="col-md-9 col-sm-8 searchright-xxs pad0">
    							<div class="searchMidTxtNew col-md-12 col-sm-12">
                            		<h1 class="searchInner1MidContHead">
                            		<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_name']));?>

                            		</h1>                                  					
    								<span class="searchAddressCont">
                                         <?php echo stripslashes($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_streetaddress']);?>
, <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['cityname']));?>
-<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_zip'];?>

                                    </span>
								    <span class="deliveryOrder border0"> 
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_mindelorder'];?>
: <span style="color:#333;"> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_minorder_price'];?>
</span>
                                    </span>
                                    <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery']=='Yes'&&$_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery_charge']!='') {?>
                                        <span class="deliveryOrder">
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_delivaryfee'];?>
: <span style="color:#333;"> <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery_charge']=='0.00') {
echo $_smarty_tpl->tpl_vars['LANG']->value['search_delfree'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_delivery_charge'];
}?></span>
                                        </span>
                                    <?php }?>
               					</div>
               				</div>	
    					</div>
    				</div>		
    				<div class="searchMidTxtRight col-lg-3 col-sm-5 col-md-3 col-xs-3 pull-right">			
                       <div class="clearfix">
								<span class="user_reviews">(<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewscount'];?>
 <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_review']);?>
)</span>
                                <div class="relate">
                                    <div class="searchStar"></div>
                                    <div class="orangeStar"  style="width:<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewrating'];?>
%;"></div>
                                </div>   
                            </div>   
						<div class=" btn-group orderFont">
							<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_id'];?>
&amp;resname=<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_seourl'];
} else { ?>menu/<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['restaurant_seourl'];
}?>" >
							<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['status']=='Open') {?>
								<span class="orderbutton"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_ordernow'];?>
</span>
							<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['status']=='Preorder') {?>
								<span class="preorderbutton"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_preorder']);?>
</span>
							<?php } else { ?>
								<span class="cancelbutton"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_close']);?>
</span>
							<?php }?>
							</a>
						</div>	                   
                    </div> 
                    <!--<div class="col-md-12 col-sm-12 pad0">
    					<div class="small_review_star">
                        
					 <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']!='') {?>
    					<?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='1') {?> <span class="reviewStar reviewStar1"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='2') {?> <span class="reviewStar reviewStar2"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='3') {?><span class="reviewStar reviewStar3"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='4') {?> <span class="reviewStar reviewStar4"></span>
						<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewcount']=='5') {?> <span class="reviewStar"></span>
						<?php }?>
                        <?php } else { ?>
                        <span class="searchnoreview"></span>
                        
                        <?php }?>
                        
    					</div>
    					<div class="col-md-10 col-sm-8 border-left">
                            <?php if ($_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewmessage']!='') {?>
                            <span class="small_review">"<?php echo $_smarty_tpl->tpl_vars['searchrestaurantList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['searchRest']['index']]['reviewmessage'];?>
"</span><?php } else { ?>
        					<span class="small_review">"<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_taste_awesome']);?>
"</span>
                            <?php }?>
                        </div>
    				</div>-->
    			</div>
    		</div>
    	
    </div>
<?php }?>
<?php endfor; endif; ?>

<div style="display:none" class="col-md-12 col-xs-12 map_view">
	<div class="row">	
        <div id="showGoogleMaps" class="showGoogleMaps" ></div>	
    </div>    
</div>		

<?php } elseif ($_REQUEST['action']=='searchResultRight') {?>
    <div class="errorline"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_no_rec_found']);?>
</div>
<?php }?> 
<?php if ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value>0) {?>
<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

<?php }?>
       
<div id="yelppopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">X</span>
                    <span class="sr-only">Close</span>
                </button>
           		 <h4 class="modal-title center"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/yelp_logo.png" alt="" title=""></h4>
        	</div>
    		<div class="modal-body">
        		 <div class="yelpReviewreplace"> </div>
        	</div>
        </div>
    </div>
</div>
      
    	<?php }} ?>
