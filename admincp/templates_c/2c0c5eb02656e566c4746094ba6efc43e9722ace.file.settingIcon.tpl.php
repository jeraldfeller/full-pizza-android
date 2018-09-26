<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 18:34:00
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/settingIcon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9897426965767e9c039e865-30734474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c0c5eb02656e566c4746094ba6efc43e9722ace' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/settingIcon.tpl',
      1 => 1466424112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9897426965767e9c039e865-30734474',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iconSettingVal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767e9c040e159_52719618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767e9c040e159_52719618')) {function content_5767e9c040e159_52719618($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Setting Icon</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">setting Icon</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
        <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>

<div class="adminRight">
    
	<div class="contain">
		
		<form name="iconSettingsfrm" method="post" onsubmit="return iconSettingValidation();" action="settingIcon.php" class="form-horizontal col-sm-12">
            <div class="form-group">
                <div class="col-sm-8">
			        <div id="errormsg"></div>
                </div>
            </div>
           
             <div class="form-group">
                <div class="col-sm-8">
		 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                </div>
            </div>
            
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Cuisine Photo Thumbnail Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="cuisine_thumb_width" id="cuisine_thumb_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['cuisine_thumb_width'];?>
" maxlength="3" />
    				<?php echo '<script'; ?>
 type="text/javascript">document.iconSettingsfrm.cuisine_thumb_width.focus();<?php echo '</script'; ?>
>
			     </div>
            </div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Cuisine Photo Thumbnail Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="cuisine_thumb_height" id="cuisine_thumb_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['cuisine_thumb_height'];?>
" maxlength="3" />
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Cuisine Photo Large Thumbnail Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="cuisine_large_width" id="cuisine_large_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['cuisine_large_width'];?>
" maxlength="3" />
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Cuisine Photo Large Thumbnail Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="cuisine_large_height" id="cuisine_large_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['cuisine_large_height'];?>
" maxlength="3" />
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Menu Photo Thumbnail Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="menu_thumb_width" id="menu_thumb_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['menu_thumb_width'];?>
" maxlength="3" />
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Menu Photo Thumbnail Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="menu_thumb_height" id="menu_thumb_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['menu_thumb_height'];?>
" maxlength="3" />
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Restaurant Logo Thumbnail Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="restaurant_logo_thumb_width" id="restaurant_logo_thumb_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['restaurant_logo_thumb_width'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Restaurant Logo Thumbnail Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="restaurant_logo_thumb_height" id="restaurant_logo_thumb_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['restaurant_logo_thumb_height'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Restaurant Photo Thumbnail Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="restaurant_photo_thumb_width" id="restaurant_photo_thumb_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['restaurant_photo_thumb_width'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Restaurant Photo Thumbnail Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="restaurant_photo_thumb_height" id="restaurant_photo_thumb_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['restaurant_photo_thumb_height'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Follower Icon Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="follower_icon_width" id="follower_icon_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['follower_icon_width'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Follower Icon Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="follower_icon_height" id="follower_icon_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['follower_icon_height'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Market Banner Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="market_banner_width" id="market_banner_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['marketbanner_width'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Market Banner Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="market_banner_height" id="market_banner_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['marketbanner_height'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">PaymentIcon Width <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="paymenticon_width" id="paymenticon_width" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['paymenticon_width'];?>
" maxlength="3" />			
                </div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">PaymentIcon Height <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<input class="form-control" type="text" name="paymenticon_height" id="paymenticon_height" value="<?php echo $_smarty_tpl->tpl_vars['iconSettingVal']->value[0]['paymenticon_height'];?>
" maxlength="3" />			
                </div>
			</div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
			         <input type="submit" class="btn btn-default" name="" value="Submit" />
                </div>
            </div>
			
				
		</form>
	</div>		

    </div>
<?php }} ?>
