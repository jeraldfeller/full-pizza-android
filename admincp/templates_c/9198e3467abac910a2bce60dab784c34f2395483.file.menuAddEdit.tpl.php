<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 11:40:40
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/menuAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1594153033580e39889c6553-94765516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9198e3467abac910a2bce60dab784c34f2395483' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/menuAddEdit.tpl',
      1 => 1475619674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1594153033580e39889c6553-94765516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menudet' => 0,
    'showcuisinelist' => 0,
    'cuis' => 0,
    'showcategorylist' => 0,
    'cat' => 0,
    'menuaddonscategory_edit' => 0,
    'showPizzaSlicelist' => 0,
    'cntSliceAddons' => 0,
    'sliceList' => 0,
    'showAddonslist' => 0,
    'objSite' => 0,
    'showSubAddonslist' => 0,
    'sliceaddonprice_arr' => 0,
    'SITE_IMAGE_MENU_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e398a7a8e80_14285756',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e398a7a8e80_14285756')) {function content_580e398a7a8e80_14285756($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['eid']!='') {?>Edit<?php } else { ?>Add<?php }?> Menu</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['eid']!='') {?>Edit<?php } else { ?>Add<?php }?> Menu</li>
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


<div class="panel panel-default">
	    <div class="panel-body">

		<form name="addNewMenu" method="post" action="<?php if ($_GET['eid']!='') {?>menuAddEdit.php?eid=<?php echo $_GET['eid'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
}
} else { ?>menuAddEdit.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
}?>" onsubmit="return <?php if ($_GET['eid']!='') {?>menuValidateEdit();<?php } else { ?>menuValidateNew();<?php }?>" enctype="multipart/form-data" class="form-horizontal col-sm-12">
			<input type="hidden" name="eid" id="eid" value="<?php echo $_GET['eid'];?>
" />
			<input type="hidden" name="resid" id="resid" value="<?php echo $_GET['resid'];?>
" />
			<input type="hidden" name="action" value="<?php if ($_GET['eid']=='') {?>Add<?php } else { ?>Edit<?php }?>" />
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
				</div>
			</div>

			<!--Restaurant Name-->
			
			<!--Menu Name1-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Name <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="menu_name" id="menu_name" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_name']);
}?>" />
				</div>
			</div>
			
			<!--Menu Type-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Type </span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_type" id="menu_type"	value="veg" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_type']=='veg') {?>checked="checked"<?php } else { ?>checked="checked"<?php }?> class=""  />
						<label for="menu_type">Veg</label>
					</div>
					<div class="radio-inline radio">	
						<input type="radio" name="menu_type" id="menu_type1" value="nonveg" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_type']=='nonveg') {?>checked="checked"<?php }?> class="radiobotton" />
						<label for="menu_type1">Non-Veg</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="menu_type" id="menu_type2" value="other" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_type']=='other') {?>checked="checked"<?php }?> class="radiobotton" />
						<label for="menu_type2">Other</label>
					</div>
				</div>
			</div>
            
			<!--Menu Cuisine-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Cuisine (Not mandatory Field)</span>
				<div class="col-sm-4">
					<select class="form-control selectpicker" name="menu_cuisine" id="menu_cuisine" >
						<option value="">Select</option>
						<?php  $_smarty_tpl->tpl_vars['cuis'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cuis']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcuisinelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cuis']->key => $_smarty_tpl->tpl_vars['cuis']->value) {
$_smarty_tpl->tpl_vars['cuis']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['cuis']->value['cuisine_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cuis']->value['cuisine_id']==$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_cuisine']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cuis']->value['cuisine_name'];?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>	
			
			<!--Menu Category-->
			<div class="form-group">
    			<span id="restCategoryList">
        			<span class="control-label col-sm-4">Menu Category <span class="color-red">*</span></span>
	        			<div class="col-sm-4">
	            			<select class="form-control selectpicker" name="menu_category" id="menu_category" <?php if ($_GET['eid']=='') {?>onchange="otherSpecify('category');getShowAddons(this.value);"<?php } else { ?>onchange="otherSpecify('category');getShowAddons(this.value);"<?php }?> >
	                			<option value="">Select</option>
	                			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
	                			<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_category']||$_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_GET['catid']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
</option>
	                			<?php } ?>
	                            
	                			<option value="other" id="categoryOther" onclick="otherSpecify('category');">Others</option>
	                            
	            			</select>
	        			<span id="caterrormsg"></span>
	        		</div>
    			</span>
			</div>
			
			
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>				
				<input type="hidden" name="cat_pizzasubaddon_changecat_val_<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" id="cat_pizzasubaddon_changecat_val_<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>
" />				
			<?php } ?>
			
				
			<!--Other Category-->
			<div class="form-group" id="catoters" style="display:none;">
				<div class="col-sm-4 col-sm-offset-4">
				    <input class="form-control" type="text" name="menu_catothers" id="menu_catothers" value="" />
				    <span id="catname_errormsg"></span>
				</div>
	        </div>
            
			<!--Menu Addons-->
			<div class="form-group">
				<span class="control-label col-sm-4">Addons </span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_addons" id="addonsval_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_addons']=='Yes') {?>checked="checked"<?php }?> onclick="<?php if ($_GET['eid']=='') {?>showAddons();<?php } else {
if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_addons']=='No') {?>showeditaddon(<?php echo $_smarty_tpl->tpl_vars['menuaddonscategory_edit']->value;?>
,<?php echo $_GET['eid'];?>
,<?php echo $_GET['resid'];?>
);<?php } else { ?>showeditaddon_yes();<?php }
}?>" class=""/>
						<label for="addonsval_yes">Yes</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="menu_addons" id="addonsval_no" value="No" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_addons']=='No'||$_GET['eid']=='') {?>checked="checked"<?php }?> onclick="showAddons1();" class=""/>
						<label for="addonsval_no">No</label>
					</div> 
				</div>
			</div>	
					
			<!--Menu Size option Pizza Slice New concept Starts-->
				
			<div class="form-group" id="menusize_option">
				<span class="control-label col-sm-4">Menu Price<span class="color-red">*</span></span>
				<div class="col-sm-4">
					
					<div class="radio-inline radio">
						<input type="radio" name="sizeoption" id="sizeoption_fixedprice" value="fixed" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {?>checked="checked"<?php } else { ?>checked="checked"<?php }?> onclick="return fixedOption();" class=""/>
						<label for="sizeoption_fixedprice">Fixed Price</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="sizeoption" id="sizeoption_default" value="default" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> onclick="return defaultOption();" class=""/>
						<label for="sizeoption_default">Size</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="sizeoption" id="sizeoption_other" value="other" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice') {?>checked="checked"<?php }?> onclick="return otherOption();" class="radiobotton"/>
						<label for="sizeoption_other">Slice</label>
					</div>	
				</div>
				
                
				<span id="fixedOption" class="col-sm-4 col-sm-offset-4 martopbtm5"  <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size'&&$_GET['eid']!='') {?>style="display:none;"<?php }?>>
					
						<input class="form-control numericfield" type="text" name="menu_price_main" id="menu_price" value="<?php if ($_GET['eid']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='fixed') {
echo stripslashes($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_price']);
}?>" />
							
				</span>
				
				<span id="pizzaDefaultOption" class="col-sm-4 col-sm-offset-4 martopbtm5" <?php if ($_GET['eid']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
					<div class="col-sm-12 no-pad">
						<div class="col-sm-6">
							<div class="checkbox checkbox-primary">
								<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_small']=='small'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> class=""/>
								<label for="small">Small</label>
							</div>
						</div>

							<span id="smallpriceshow" class="col-sm-6 marBtm5" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_small']!='small'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> >
							<input type="text" name="smallval_main" id="smallval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_small_value'];
}?>" class="form-control input-sm numericfield" placeholder="Price" /></span>
					</div>
					<div class="col-sm-12 no-pad">
						<div class="col-sm-6">
							<div class="checkbox checkbox-primary">
								<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_medium']=='medium'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> class="" />
								<label for="medium">Medium</label>
							</div>
						</div>
					
						<span id="mediumpriceshow" class="col-sm-6 marBtm5" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_medium']!='medium'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?>>
						<input type="text" name="mediumval_main" id="mediumval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_medium_value'];
}?>" class="form-control input-sm numericfield" placeholder="Price" /></span>
					</div>
					<div class="col-sm-12 no-pad">
						<div class="col-sm-6">
							<div class="checkbox checkbox-primary">
								<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_large']=='large'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {?>checked="checked"<?php }?> class="">
								<label for="large">Large</label>
							</div>
						</div>	
					
						<span id="largepriceshow" class="col-sm-6 marBtm5" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_size_large']!='large'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?>>
						<input type="text" name="largeval_main" id="largeval" value="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value']!='0.00'&&$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='size') {
echo $_smarty_tpl->tpl_vars['menudet']->value[0]['pizza_large_value'];
}?>" class="form-control input-sm numericfield" placeholder="Price" /></span>
					</div>
										
				</span>
				
				<span id="pizzaOtherOption"  class="col-sm-8 col-sm-offset-4 martopbtm5" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']=='slice'&&$_GET['eid']!='') {?>style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
					<div id="existSlice">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['name'] = "slicelist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showPizzaSlicelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["slicelist"]['total']);
?>
						<div class="col-sm-12 no-padding marBtm5">
							 <div class="row">
							 	<div class="col-sm-4">
									<input type="text" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizename]" id="sizename" value='<?php echo stripslashes($_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_name']);?>
' class="form-control slicevalidate sliceCnt"/>
								</div>
                                <input type="hidden" id="pizzaeditid" name="size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sliceeditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_id'];?>
"/>   
								<div class="col-sm-2">
									<input type="txt" name="<?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_addons']=='Yes') {?>size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizevalue]<?php } else { ?>size_option[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index'];?>
][sizevalue]<?php }?>" id="sizevalue" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slicelist']['index']]['pizza_slice_price'];?>
" class="form-control numericfield slicevalidate" /> 
								</div>
							</div>
						</div>
						<?php endfor; endif; ?>
					</div>
					
					
                    <?php if ($_GET['eid']=='') {?>
					<div id="specialPizzaSize" >
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
						<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
						<input type="hidden" name="size_option[<?php echo $_smarty_tpl->tpl_vars['sliceList']->value;?>
][sliceeditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->tpl_vars['sliceList']->value]['pizza_slice_id'];?>
" />
						<?php endfor; endif; ?>
						
						<a onclick="addMorePizzaSize();" class="btn btn-success">Add More Slice</a>
						
					</div>
                    <?php } else { ?>
                    <div id="specialPizzaSize">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
						<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
						<input type="hidden" name="size_option[<?php echo $_smarty_tpl->tpl_vars['sliceList']->value;?>
][sliceeditid]" value="<?php echo $_smarty_tpl->tpl_vars['showPizzaSlicelist']->value[$_smarty_tpl->tpl_vars['sliceList']->value]['pizza_slice_id'];?>
" />
						<?php endfor; endif; ?>
						
                        
							<a onclick="addMorePizzaSize();" class="btn btn-success">Add More Slice</a>
						
					</div>
                    <?php }?>
				</span>					
			</div>
			
			
			<!--Pizza Slice Addons New Concept Starts-->
			<div class="addPageCont addonsListShow">
				<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="<?php echo $_smarty_tpl->tpl_vars['cntSliceAddons']->value;?>
" />
				<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
				<div id="showcataddonsList" <?php if ($_GET['eid']==''||$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_addons']!='Yes') {?> style="display:none;" <?php }?>>
					
					<div class="col-sm-8 col-sm-offset-4">
				    
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['total']);
?>					
					
					<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddonsname]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
" />
					<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][mainaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['menu_addonid'];?>
" />
					
                    <?php $_smarty_tpl->tpl_vars['showSubAddonslist'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getShowSubAddonsList($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'],$_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['maincat_option']), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value!='') {?>
                     
						<b class="contain marBtm5" style="cursor:pointer;" onclick="openAddons('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
')"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']));?>

                            <img src="images/arrowdown.png" class="uparr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']=='1') {?>style="display:none;"<?php }?>/>
                            <img src="images/arrowup.png" class="downarr_q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>/>
                        </b>	
						<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['addon']['rownum']!='1') {?>style="display:none;"<?php }?>>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['name'] = 'subaddon';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showSubAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subaddon']['total']);
?>
							<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
" />
                            <div class="form-group">
								<div class="col-sm-3">	
                                	
									<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_categoryoption']!='pizza') {?>
										<div class="checkbox-inline checkbox checkbox-primary">
											<input type="checkbox" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id']==$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid']) {?>checked="checked"<?php }?> />
											<label for="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</label>
										</div>
									<?php } else { ?>
										<div class="checkbox-inline checkbox  checkbox-primary">
											<input type="hidden" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" class="" />
											<span class=""><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']));?>
</span>
										</div>
									<?php }?>
								</div>			
								<div class="col-sm-3">			
									<div class="radio-inline radio">
										<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="free_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" value="Free" onclick="addonsfreeoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']=='') {?>checked="checked"<?php }?> class="free"/>
										<label for="free_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]">Free</label>
									</div>
                                    <div class="radio-inline radio">
                                    	<input type="radio" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" id="paid_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]" value="Paid" onclick="addonspaidoption('<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption'];?>
');" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Paid') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']!='Free') {?>checked="checked"<?php }?> class="paid"/>
                                    	<label for="paid_[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addonspriceoption]">Paid</label>
                                    </div>
                                </div>                                         
								<div class="col-sm-5">			
									<span <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free') {?>style="display:none;"<?php }?> id="addonspricepaid_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
" >
                                    
										<!--Fixed option's addons price-->												
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_fixed" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='fixed') {?> style="display:none;" <?php }?> class="showprice_fixed">
                                            <span class="col-sm-6">
                                                <input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_fixed]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Fixed<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Fixed<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Fixed<?php }?>';"/>			
    										</span>	
                                        </span>					
												
										<!--Size option's addons price-->
										<span id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_size" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='size') {?> style="display:none;" <?php }?> class="showprice_size">
    										<div class="col-sm-4">		
											    <input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_size]" id="addonsprice" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Small<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Small<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Small<?php }?>';"/>
                                            </div>
                                            <div class="col-sm-4">	
												<input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_medium_size]" id="addonsprice_medium" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Medium<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium'];
} else { ?>Medium<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_medium']);
} else { ?>Medium<?php }?>';" />
                                            </div>
                                            <div class="col-sm-4">
												<input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][addons_price_large_size]" id="addonsprice_large" value="<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Large<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large'];
} else { ?>Large<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_large']);
} else { ?>Large<?php }?>';" />
                                            </div>
    									</span>
												
										<!--Slice options addons price-->
										<div id="showprice_<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['id'];?>
_slice" <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menupriceoption']=='Free'||$_smarty_tpl->tpl_vars['menudet']->value[0]['sizeoption']!='slice') {?> style="display:none;" <?php }?> class="showprice_slice">
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
" />	
 											<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']!='') {?>
												<?php $_smarty_tpl->tpl_vars['sliceaddonprice_arr'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSite']->value->getSliceAddonsPrice($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuaddons_price_slice']), null, 0);?>	
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
                                                <div class="col-sm-4 marBtm5">
												   <input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]!='') {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
                                                </div> 			
												<?php endfor; endif; ?>										
											<?php } else { ?>											
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['name'] = 'slice1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntSliceAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['slice1']['total']);
?>
												<?php $_smarty_tpl->tpl_vars['sliceList'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'], null, 0);?>
                                                <div class="col-sm-4 marBtm5">
											    	<input class="form-control numericfield" type="text" name="mainaddons[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][addons][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index'];?>
][addons_price_slice]" id="addonsprice_slice" value="<?php if ($_smarty_tpl->tpl_vars['cntSliceAddons']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']]!='') {
echo $_smarty_tpl->tpl_vars['sliceaddonprice_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['slice1']['index']];
} else { ?>Price<?php }?>"  onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice'];
} else { ?>Price<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menuprice']);
} else { ?>Price<?php }?>';"/>
                                                </div>
												<?php endfor; endif; ?>
											<?php }?>
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
" value="" />
												
											<span class="slicemoreprice" id="slicemoreprice_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index'];?>
"></span>																																		 
										</div>
									</span>
                                </div>
								
                                <?php if ($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid']!='') {?>
                                <div class="col-sm-1">
								<span  class="btn btn-danger btn-icon" onclick="return removeAddon(<?php echo $_smarty_tpl->tpl_vars['showAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['category_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['menu_addonid'];?>
,<?php echo $_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['restaurant_id'];?>
,'<?php echo addslashes($_smarty_tpl->tpl_vars['showSubAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['subaddon']['index']]['addonsname']);?>
');"><i class="fa fa-close"></i></span>
                                </div>
                                <?php }?>
										
                            </div>										
							<?php endfor; endif; ?>
								
						</div>
						<?php }?>
					<?php endfor; endif; ?>
					<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['total'];?>
" />
					
				</div>
				<div id="createbuttondiv" class="addtoCartInnerNew1"></div>	
				<div class="clr"></div>				
				
				<?php if ($_GET['eid']!='') {?>
                <div class="col-sm-offset-4 col-sm-4">
				   <a onclick="addCreateMoreAddons_first();"  class="btn btn-success" id="madAddons_first">Create Addons</a>
                </div>
                <?php }?>
	
					
					
					
			</div>				
		</div>
			<!--Pizza Slice Addons New Concept Ends-->
			
			
			<!--Menu Special Instruction-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Special Instruction <span class="color-red"></span></span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_spl_ins" id="menu_spl_ins1" value="Yes" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_spl_instruction']=='Yes') {?>checked="checked"<?php }?> />
						<label for="menu_spl_ins1">Yes</label>
					</div> 
					<div class="radio-inline radio">
						<input type="radio" name="menu_spl_ins" id="menu_spl_ins2" value="No" <?php if ($_GET['eid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_spl_instruction']=='No') {?>checked="checked"<?php }
} else { ?>checked="checked"<?php }?>  />
						<label for="menu_spl_ins2">No</label>
					</div>
						
				</div>
			</div>
			<!--Menu Description-->
			<div class="form-group">
				<span class="control-label col-sm-4">Menu Description <span class="color-red"></span></span>
				<div class="col-sm-4">
					<textarea class="form-control" rows="5" name="menu_description" id="menu_description" /><?php echo stripslashes($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_description']);?>
</textarea>
				</div>
			</div>
			<!--Meno Photo -->
    	<div class="form-group">
				<label class="control-label col-sm-4">Menu Photo <span class="color-red"></span></label>
				<div class="col-sm-4">
					<input class="fileUpload" type="file" name="menu_photo" id="menu_photo" size="31" style="display:none;" />
					<label for="menu_photo" class="btn btn-default btn-sm" >
                      <i class="fa fa-folder-open"></i> Add Menu image		
                    </label>
					<?php if ($_GET['eid']!=''&&$_smarty_tpl->tpl_vars['menudet']->value[0]['menu_photo']!='') {?><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_MENU_URL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menudet']->value[0]['menu_photo'];?>
"alt="image" width="50" height="50"><?php }?>
				</div>
			</div>
			<!--Menu Popular dish-->
			<div class="form-group">
				<span class="control-label col-sm-4">Popular Dish <span class="color-red"></span></span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_popular_dish" id="menu_popular_yes"	value="Yes" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_popular_dish']=='Yes') {?>checked="checked"<?php }?> class="" />
						<label for="menu_popular_yes">Yes</label>
					</div>	
					<div class="radio-inline radio">	
						<input type="radio" name="menu_popular_dish" id="menu_popular_no" value="No" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_popular_dish']=='No'||$_GET['eid']=='') {?>checked="checked"<?php }?> class=""/>
						<label for="menu_popular_no">No</label>
					</div>	
				</div>
			</div>
			<!--Menu Spicy-->
			<div class="form-group">
				<span class="control-label col-sm-4">Spicy Dish <span class="color-red"></span></span>
				<div class="col-sm-4">
					<div class="radio-inline radio">
						<input type="radio" name="menu_spicy" id="menu_spicy_yes"	value="Yes" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_spicy']=='Yes') {?>checked="checked"<?php }?> class="" />
						<label for="menu_spicy_yes">Yes</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="menu_spicy" id="menu_spicy_no" value="No" <?php if ($_smarty_tpl->tpl_vars['menudet']->value[0]['menu_spicy']=='No'||$_GET['eid']=='') {?>checked="checked"<?php }?> class=""/>
						<label for="menu_spicy_no">No</label>
					</div>	
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" id="MenuAdd" name="addEdit" value="<?php if ($_GET['eid']) {?>Edit<?php } else { ?>Add<?php }?>"> 
					<a class="btn" href="menuManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>


    <?php echo '<script'; ?>
 type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            /* numeric inputs can come from the keypad or the numeric row at the top */
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    <?php echo '</script'; ?>
>
<?php }} ?>
