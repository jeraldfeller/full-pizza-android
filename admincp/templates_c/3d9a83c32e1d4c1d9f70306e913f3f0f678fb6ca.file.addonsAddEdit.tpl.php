<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:16:17
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/addonsAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19701976065768c6999d7a73-47773082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d9a83c32e1d4c1d9f70306e913f3f0f678fb6ca' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/addonsAddEdit.tpl',
      1 => 1466424114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19701976065768c6999d7a73-47773082',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showRestaurantList' => 0,
    'restlist' => 0,
    'addonsvalue' => 0,
    'objSite' => 0,
    'showcategorylist' => 0,
    'cat' => 0,
    'showmainAddonslist' => 0,
    'cntmainAddons' => 0,
    'mainaddon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c699c84f35_78653952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c699c84f35_78653952')) {function content_5768c699c84f35_78653952($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['eid']!='') {?>Edit<?php } else { ?>Add<?php }?> Addons</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['eid']!='') {?>Edit<?php } else { ?>Add<?php }?> Addons</li>
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

		<form name="addNewAddons" method="post" action="<?php if ($_GET['eid']!='') {?>addonsAddEdit.php?eid=<?php echo $_GET['eid'];
} else { ?>addonsAddEdit.php<?php }?>" onsubmit="return <?php if ($_GET['eid']!='') {?>addonsValidateEdit();<?php } else { ?>addonsValidateNew();<?php }?>" class="col-sm-12 form-horizontal">
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
			<?php if ($_GET['resid']=='') {?>
			<div class="form-group">
				<span class="col-sm-4 control-label">Restaurant Name <span class="color-red">*</span></span>
				<div class="col-sm-4" >
					<select class="form-control selectpicker" name="restaurant_name" id="restaurant_name" onchange="restaurantAddonsCategory(this.value);">
						<option value="">Select</option>
						<?php  $_smarty_tpl->tpl_vars['restlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['restlist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showRestaurantList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['restlist']->key => $_smarty_tpl->tpl_vars['restlist']->value) {
$_smarty_tpl->tpl_vars['restlist']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['restlist']->value['restaurant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['restlist']->value['restaurant_id']==$_smarty_tpl->tpl_vars['addonsvalue']->value[0]['restaurant_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['restlist']->value['restaurant_name']);?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<?php }?>
			<!-- Category Name -->
			<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['restaurant_id']!='') {?>
				<?php echo $_smarty_tpl->tpl_vars['objSite']->value->getShowCategoryList_res($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['restaurant_id']);?>

			<?php }?>
			<div class="form-group">
                <span id="restAddonCategoryList">
    				<span class="col-sm-4 control-label">Category Name <span class="color-red">*</span></span>
    				<div class="col-sm-4" >
    				<select class="form-control selectpicker" name="category_name" id="category_name" onchange="otherSpecifyAddon('category');">
    				<?php if ($_REQUEST['resid']==''&&$_REQUEST['eid']=='') {?>
						<option value="">Select restaurant</option>
					<?php }?>
					<?php if ($_REQUEST['resid']!=''||$_REQUEST['eid']!='') {?>
						<option value="">Select</option>
						<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['addonsvalue']->value[0]['category_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['cat']->value['maincatename']);?>
</option>
						<?php } ?>
                        <option value="other" id="categoryOther_addon">Others</option>
					<?php }?>
    				</select>
    			</div>
                </span>    
			</div>
            <!--Other Category-->
    		<div class="form-group" id="catoters_addon" style="display:none;">
    			<div class="col-sm-offset-4 col-sm-4">
    				<input class="form-control" type="text" name="addon_catothers" id="addon_catothers" value="" />
    				<span id="catname_errormsg">
    			</div>
    		</div>
		<!--Addons Name-->
		<div class="form-group">
			<span class="col-sm-4 control-label">Addons Name <span class="color-red">*</span></span>
			<div class="col-sm-3 col-xs-12">
				<input class="form-control" type="text" name="addons_name" id="addons_name" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonsname']);
}?>" />
			</div>
			
			<div class="col-sm-1 col-xs-12  no-pad-left xs-padding" >
					<input type="text" name="mainaddoncnt" id="mainaddoncnt" value="<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>" onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>';" size="12" class="form-control"/>
			</div>
			<span class="showaddPriceList " <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']=='Paid') {?> style="display:none;"<?php }?>>
				<a onclick="addListSubAddons1();" class="btn btn-success btn-sm">Add Sub Addons</a>
			</span>
			
				<?php if ($_GET['eid']=='') {?><a onclick="addListMoreAddons();" class="btn btn-success btn-sm ">Add More Main Addons</a><?php }?>
			
		</div>
		
			
				
				
		
				<div class="form-group">
	            	
					<div class="col-sm-4  col-sm-offset-4" <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']=='Paid') {?> style="display:none;"<?php }?>>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['name'] = "addon";
$_smarty_tpl->tpl_vars['smarty']->value['section']["addon"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showmainAddonslist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
						<input type="text" name="addonsub[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][subaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" class="form-control marBtm5"/>
					<?php endfor; endif; ?>
					</div>
					
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['name'] = 'addon1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cntmainAddons']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['addon1']['total']);
?>
					<?php $_smarty_tpl->tpl_vars['mainaddon'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['addon1']['index'], null, 0);?>
					<input type="hidden" name="addonsub[<?php echo $_smarty_tpl->tpl_vars['mainaddon']->value;?>
][subaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->tpl_vars['mainaddon']->value]['id'];?>
">
					<?php endfor; endif; ?>
					<!-- Edit End-->
					
					
					
					
					
					<div id="subaddonslist"></div>
				</div>
				<div class="form-group">
					
					
					<!-- Add Start -->
						<div id="buttondiv" class=""></div>
						
						<!--<?php if ($_GET['eid']=='') {?><a onclick="addListSubAddons();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons">Add More Main Addons</a><?php }?>	-->
					<!-- Add End -->
				</div>
			
		
			
		
		
		
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="submit" class="btn btn-default" id="AddonsAdd" name="addEdit" value="<?php if ($_GET['eid']) {?>Edit<?php } else { ?>Add<?php }?>"> 
				<a class="btn" href="addonsManage.php<?php if ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>">Cancel</a>
			</div>
		</div>
	</form>
	</div>
</div>
<?php }} ?>
