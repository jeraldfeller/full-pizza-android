<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 18:23:53
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/index_search_tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2388441205767e761925d14-90514905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d52c2a9b9ba459571140a63e93d61513ad85384' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/index_search_tab.tpl',
      1 => 1466424471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2388441205767e761925d14-90514905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_BASEURL' => 0,
    'searchoption' => 0,
    'searchbyoption' => 0,
    'LANG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767e7619674f6_73025943',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767e7619674f6_73025943')) {function content_5767e7619674f6_73025943($_smarty_tpl) {?>	<div class="searchAreaBgOuter">	
        <div class="banner-caption col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
            <div class="banner-text">
                <span class="banner-text-block">Order Takeaway & Food Delivery Online</span>
            </div>
            <div class="div-container">

            
            <div class="search-details col-md-12 col-xs-12">
                <form name="searchresult" method="get" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/searchResult.php" onsubmit="return searchareaValidate();">
                    <div class="col-md-3 col-xs-12 col-sm-3">               
                        <label class="find">FIND RESTAURANTS</label>
                    </div>
                    <section class="searchTabContent center col-md-9 col-xs-12 col-sm-9 pad0" id="searchbyarea_content">
                        <div class="col-md-8 col-sm-8 searchleft-xxs searchleft-xs"> 
                        
                          <input type="text" class="searchField col-md-12 col-sm-12 col-xs-12 no-padding" name="searcharea" id="searchfieldArea"  autocomplete="off"  placeholder="<?php if ($_smarty_tpl->tpl_vars['searchoption']->value=='Normal'&&$_smarty_tpl->tpl_vars['searchbyoption']->value=='city') {?> Enter your city name<?php } elseif ($_smarty_tpl->tpl_vars['searchoption']->value=='Normal'&&$_smarty_tpl->tpl_vars['searchbyoption']->value=='zip') {?> Enter your zipcode<?php } elseif ($_smarty_tpl->tpl_vars['searchoption']->value=='Google') {?>Ex: Chennai, Tamil Nadu, India<?php }?>"/>
                          <input type="hidden" name="countrycode" id="countrycode" value=""/>
                         </div> 
                        <div class="col-md-3 pad0 col-sm-4 searchright-xxs searchright-xs center">  
                            <input class="search-btn col-md-12 col-xs-8 col-sm-12 pad0" type="submit"  value="<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_search']);?>
"/>
                        </div>  
                    </section>
                    
                </form>
            </div>
           
            
		</div>
	</div>
    <div class="searchOptionsNew hidden-xs">
            <ul class="searchOptionsNewUl">
                <li>
                    <label class="txt1 pad_left_right15 slogan-tick" for="delivery"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_free_to_use']);?>
</label>
                </li>
                <li>
                    <label class="txt1 pad_left_right15 slogan-tick" for="pickup"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_thousand_restaurants']);?>
</label>
                </li>
                <li>
                    
                    <label class="txt1 pad_left_right15 slogan-tick" for="pickup"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_sms_phone_confirm']);?>
</label>
                </li>
                <li>
                    
                    <label class="txt1 pad_left_right15 slogan-tick" for="pickup"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['home_payment_method']);?>
</label>
                </li>
            </ul>
        </div>
	<div class="searchAreaBgOuterBtm"></div>
</div>

<input type="hidden" name="sitesearchoption" id="sitesearchoption" value="<?php echo $_smarty_tpl->tpl_vars['searchoption']->value;?>
"/>

<input type="hidden" name="searchoptioncityzip" id="searchoptioncityzip" value="<?php echo $_smarty_tpl->tpl_vars['searchbyoption']->value;?>
"/><?php }} ?>
