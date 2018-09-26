<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_deliveryinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14600503425807a26d4dfc02-10281438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f123539986d37d6ea84f863bde2b99a73dd05599' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_deliveryinfo.tpl',
      1 => 1475619674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14600503425807a26d4dfc02-10281438',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restaurantEditList' => 0,
    'restaurant_address_map' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26d709da8_25070251',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26d709da8_25070251')) {function content_5807a26d709da8_25070251($_smarty_tpl) {?>
	
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Delivery </span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
    		  <input class="radiobotton" type="radio" name="restaurant_delivery" id="restaurant_delivery_yes" value="Yes" <?php if ($_GET['eid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery']=='Yes') {?> checked="checked" <?php }?> <?php } else { ?>checked="checked" <?php }?>/>
                <label for="restaurant_delivery_yes">Yes</label>
            </div>
            <div class="radio-inline radio">
    		  <input class="radiobotton" type="radio" name="restaurant_delivery" id="restaurant_delivery_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery']=='No') {?> checked="checked" <?php }?> />
                <label for="restaurant_delivery_no">No</label>
            </div>
        </div>
	</div>
	
    <div id="Deliveryinfo" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery']=='No') {?> style="display:none;" <?php }?>>
    	
    	
    	
    	<div class="form-group">
    		<span class="control-label col-sm-4 font-normal">Delivery Charge </span>
    		<div class="col-sm-4">
        		<input class="form-control numericfield" type="text" name="restaurant_delivery_charge" id="restaurant_delivery_charge" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_charge']);
} else { ?>0.00<?php }?>" <?php if ($_GET['eid']=='') {?> onfocus="this.value=''" <?php }?>  />
    		    <span id="resDeliChgErr"></span>
            </div>
    	</div>
    	
    	
    	<div class="form-group">
    		<span class="control-label col-sm-4 font-normal">Coordenadas </span>
    		<div class="col-sm-4">
        		<input class="form-control numericfield" type="text" name="restaurant_coordinates" id="restaurant_coordinates" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_lat']);?>
,<?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_long']);
} else { ?>0.00<?php }?>" <?php if ($_GET['eid']=='') {?> onfocus="this.value=''" <?php }?>  />
    		    
    		    <input id="restaurant_delivery_zone" name="restaurant_delivery_zone" type="hidden" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_zone']);
} else { ?>0.00<?php }?>">
            </div>
            <div class="col-sm-2">
                	<a href="javascript:void(0);" onclick="viewMap();" class="btn btn-info" id="view_map"><i class="fa fa-search-plus"></i> refresh map</a>
            	</div>
    	</div>
    	
    		
    	
    	
    	<div class="form-group">
    		<!--<span class="control-label col-sm-4 font-normal">Delivery Distance (miles) <span class="color-red"></span></span>
    		<div class="col-sm-4">
        		<input class="form-control" type="text" name="restaurant_delivery_distance" id="restaurant_delivery_distance" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_distance']);
}?>" <?php if ($_GET['eid']=='') {?> onfocus="this.value=''" <?php }?>  />
        		<span id="restdelDistanceErr"></span>
            </div>-->
        	
    	</div>
    	
    	
    	
    	<div class="form-group" id="map_distance_show">
            <div class="col-sm-12">
        		<input type="hidden" name="restaurant_address" id="restaurant_address" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_address_map']->value;?>
" />
        		<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="<?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_distance']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_delivery_distance']);
} else { ?>45<?php }?>" />
        		<div id="map" style="height:500px;"></div>
            </div>
    	</div>
    	 <?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&libraries=drawing"
         async defer><?php echo '</script'; ?>
>
    	
    </div>
	
	<!--Restaurant Delivery Areas-->
	
	
<?php }} ?>
