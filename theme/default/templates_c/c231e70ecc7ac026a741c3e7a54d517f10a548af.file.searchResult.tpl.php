<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 19:02:39
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/searchResult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18775241215767f0776b5c70-72120385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c231e70ecc7ac026a741c3e7a54d517f10a548af' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/searchResult.tpl',
      1 => 1466424440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18775241215767f0776b5c70-72120385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'searcharea' => 0,
    'statename' => 0,
    'LANG' => 0,
    'searchoption' => 0,
    'searchbyoption' => 0,
    'searchrestaurantTotal' => 0,
    'ser_qrystring' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767f07783d629_80297010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767f07783d629_80297010')) {function content_5767f07783d629_80297010($_smarty_tpl) {?><!-- Search Area starts -->
<div class="container hidden-xxs">
	<div class="contain relative">
		<!--<div class="search_box">
			<div class="col-md-2 col-sm-3 pad0 searchtopleft"> 
				<span class="col-md-12 col-xs-12 col-sm-12 state_name"><?php echo $_smarty_tpl->tpl_vars['searcharea']->value;?>
</span>
				<span class="col-md-12 col-xs-12 col-sm-12 city_name"><?php echo $_smarty_tpl->tpl_vars['statename']->value;?>
</span>					
			</div>
		</div>-->
		<div class="banner-caption col-md-10 col-md-offset-1 col-xs-12 col-sm-12 change_loc_slide">
			<form name="searchresult1" method="post" action="searchResult.php" onsubmit="return searchareaValidate();">
				<div class="col-md-3 col-xs-12 col-sm-3">				
					<label class="find"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_find_restaurants']);?>
</label>
				</div>
				<section class="searchTabContent center col-md-9 col-xs-12 col-sm-9 pad0" id="searchbyarea_content">
					<div class="col-md-9 col-sm-8 searchleft-xxs searchleft-xs"> 
                        
                          <input type="text" class="searchField col-md-12 col-sm-12 col-xs-12 no-padding" name="searcharea" id="searchfieldArea"  autocomplete="off"  placeholder="<?php if ($_smarty_tpl->tpl_vars['searchoption']->value=='Normal'&&$_smarty_tpl->tpl_vars['searchbyoption']->value=='city') {?> Enter your city name<?php } elseif ($_smarty_tpl->tpl_vars['searchoption']->value=='Normal'&&$_smarty_tpl->tpl_vars['searchbyoption']->value=='zip') {?> Enter your zipcode<?php } elseif ($_smarty_tpl->tpl_vars['searchoption']->value=='Google') {?>Ex: Chennai, Tamil Nadu, India<?php }?>" value="<?php echo $_REQUEST['searcharea'];?>
" />
                          <input type="hidden" name="countrycode" id="countrycode" value=""/>
                         </div> 
					<div class="col-md-3 pad0 col-sm-4 searchright-xxs searchright-xs center">  
						<input class="search-btn col-md-12 col-xs-8 col-sm-12 pad0" type="submit"  value="<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_search']);?>
"/>
					</div>
				</section>
			</form>
		</div>
		
		<div class="searchTabArrow"></div>
		<div class="searchTabImg"></div>
	</div>
</div>
<div class="searchAreaBgOuterBtm"></div>
<!-- Search Area ends -->

<div class="container">
	<!-- Container Inner starts -->
	<div class="searchResultInner no-border">
		<div class="row">
			
		<?php if ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value==0) {?>
		<div class="errorline"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_no_rec_found']);?>
</div>
		<?php }?> 
		
		<?php echo $_smarty_tpl->getSubTemplate ('searchResultLeft.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		
			<div class="searchResultMiddle col-md-9 col-sm-8 col-xs-12">
				<?php if ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value>0) {?>
				    <div class="col-md-9 col-sm-9 col-xs-12 restaurant_count"><span class="count_number" id="count_number">"<?php echo $_smarty_tpl->tpl_vars['searchrestaurantTotal']->value;?>
"</span>  <?php if ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value>1) {
echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_restaurants_serving']);
} elseif ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value==1) {?> <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_restaurant_serving']);?>
 <?php }?></div>
				    <!--<div class="col-md-3 col-sm-3 col-xs-12 text-right pad0 hidden-xxs"> <span id="map_btn" data-string="<?php echo $_smarty_tpl->tpl_vars['ser_qrystring']->value;?>
"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_map_view']);?>
</span></div>-->
					<div class="col-md-3 hidden-xs col-sm-3 col-xs-12 text-right pad0"><span id="chage_location"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['search_change_location']);?>
</span></div>
				<?php }?>
            	<?php if ($_smarty_tpl->tpl_vars['searchrestaurantTotal']->value>0) {?>
				<ul class="searchResultLeftUl">
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_delivery" name="delivery" value="Yes" <?php if ($_REQUEST['ser_delivery']=='Yes'||$_REQUEST['ordertype']=='delivery') {?>checked="checked"<?php }?> onclick="searchResultLeft();"/>
						<label class="txt" for="ser_delivery"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_delivery'];?>
</label>
					</li>
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_pickup" name="pickup" value="Yes" <?php if ($_REQUEST['ser_pickup']=='Yes'||$_REQUEST['ordertype']=='pickup') {?>checked="checked"<?php }?> onclick="searchResultLeft();" />
						<label class="txt" for="ser_pickup"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_pickup'];?>
</label>
					</li>
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_booktable" name="booktable" value="Yes" <?php if ($_REQUEST['ser_booktable']=='Yes') {?>checked="checked"<?php }?> onclick="searchResultLeft();" />
						<label class="txt" for="ser_booktable"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_bookatable'];?>
</label>
					</li>
					<li class="col-md-3 col-xs-12 col-sm-6 pad0">
						<input type="checkbox" class="check" id="ser_offer" name="offer" value="Yes" onclick="searchResultLeft();" />
						<label class="txt" for="ser_offer"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['search_offers'];?>
</label>
					</li>
				</ul>
                <?php }?>
				<div class="searchResultRightList">

					
					<?php echo $_smarty_tpl->getSubTemplate ('searchResultMiddle.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					
				</div>
			</div>
		</div>
	</div>
	<!-- Container Inner ends -->
</div>

<input type="hidden" name="sitesearchoption" id="sitesearchoption" value="<?php echo $_smarty_tpl->tpl_vars['searchoption']->value;?>
"/>

<input type="hidden" name="searchoptioncityzip" id="searchoptioncityzip" value="<?php echo $_smarty_tpl->tpl_vars['searchbyoption']->value;?>
"/><?php }} ?>
