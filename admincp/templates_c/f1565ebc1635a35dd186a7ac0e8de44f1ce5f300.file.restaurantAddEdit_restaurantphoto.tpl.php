<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_restaurantphoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14111232735807a26d96b410-40829466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1565ebc1635a35dd186a7ac0e8de44f1ce5f300' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_restaurantphoto.tpl',
      1 => 1466424116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14111232735807a26d96b410-40829466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restaurantEditList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26da46e40_53306573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26da46e40_53306573')) {function content_5807a26da46e40_53306573($_smarty_tpl) {?>


	
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Display photos</span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
    			<input class="" type="radio" name="restaurant_display_photo" id="restaurant_display_photo_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_display_photo']=='Yes') {?> checked="checked" <?php }?> />
            	<label for="restaurant_display_photo_yes">Yes</label>
            </div> 
            <div class="radio-inline radio">
           		<input class="" type="radio" name="restaurant_display_photo" id="restaurant_display_photo_no" value="No" <?php if ($_GET['eid']!='') {?> <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_display_photo']=='No') {?> checked="checked" <?php }?> <?php } else { ?>checked="checked" <?php }?> />
           		<label for="restaurant_display_photo_no">No</label>
            </div>
		</div>
	</div>
	
	
	
	
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Display Videos</span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
    			<input class="" type="radio" name="restaurant_display_video" id="restaurant_display_video_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_display_video']=='Yes') {?> checked="checked" <?php }?> />
    			<label for="restaurant_display_video_yes">Yes</label>
            </div> 
    		<div class="radio-inline radio">	
    			<input class="radiobotton" type="radio" name="restaurant_display_video" id="restaurant_display_video_no" value="No" <?php if ($_GET['eid']!='') {?> <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_display_video']=='No') {?> checked="checked" <?php }?> <?php } else { ?> checked="checked"<?php }?>/>
                <label for="restaurant_display_video_no">No</label>
            </div> 
        </div>
	</div>
	
	<div class="videoDispOpt" id="videoDispOpt" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_display_video']=='No'||$_GET['eid']=='') {?> style="display: none;" <?php }?>>
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">Restaurant Video </label>
			<div class="col-sm-4">
    			<textarea class="form-control" rows="8" name="restaurant_video" id="vid" ><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_video']);?>
</textarea>		
    			<span id="resVideoErr"></span>
            </div>
		</div>
	</div>
	
	
	
	
	
	
	
<?php }} ?>
