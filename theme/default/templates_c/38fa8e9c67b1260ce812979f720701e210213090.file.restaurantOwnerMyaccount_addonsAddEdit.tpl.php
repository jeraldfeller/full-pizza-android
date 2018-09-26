<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-09 12:14:51
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_addonsAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111701320558c18d8b71a5d1-01168091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38fa8e9c67b1260ce812979f720701e210213090' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_addonsAddEdit.tpl',
      1 => 1466424443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111701320558c18d8b71a5d1-01168091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'showcategorylist' => 0,
    'cat' => 0,
    'addonsValue' => 0,
    'addonsvalue' => 0,
    'showmainAddonslist' => 0,
    'cntmainAddons' => 0,
    'mainaddon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c18d8b921c81_97944103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c18d8b921c81_97944103')) {function content_58c18d8b921c81_97944103($_smarty_tpl) {?><!-- Addons Add and Edit -->
<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead">
		<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addon'];?>

	</h1>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_addons.php<?php } else { ?>restaurant-myaccount-addons<?php }?>" class="addbtn pull-right"><i class="glyphicon glyphicon-arrow-left marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonback'];?>
</a>
	<hr class="heading-hr">
	<form name="res_AddonsaddEdit" method="post" action="<?php if ($_GET['addonid']!='') {?>restaurantOwnerMyaccount_addonsAddEdit.php?addonid=<?php echo $_GET['addonid'];
}?>" onsubmit="<?php if ($_GET['addonid']!='') {?>return validateAddonsEdit();<?php } else { ?>return validateAddonsNew();<?php }?>" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="action" value="<?php if ($_GET['addonid']!='') {?>Edit<?php } else { ?>Add<?php }?>"/>
        <input type="hidden" name="addonid" id="addonid" value="<?php echo $_GET['addonid'];?>
"/>
		
			<div class="ownerStaticContainer">
				<div class="form-group">
					<div class="col-sm-12">
						<div class="mandatoryField">
							<span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonmandatory'];?>

						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<div id="errormsgAddon"></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label font-normal" for="menu_categor"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addoncatname'];?>
</label>
					<span class="col-sm-4"> 
						<select class="form-control" name="menu_categor" id="menu_categor" onchange="otherSpecifyAddon('category');">
							<option value="">
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addon_addnew_select'];?>

							</option>
							<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showcategorylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
    							<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincateid'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['maincateid']==$_smarty_tpl->tpl_vars['addonsValue']->value[0]['category_id']) {?>selected="selected"<?php }?>>
    								<?php echo $_smarty_tpl->tpl_vars['cat']->value['maincatename'];?>

    							</option>
							<?php } ?>
							<option value="other" id="categoryOther_addon">
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addoncatoptother'];?>

							</option>
						</select>
					</span>
				</div>
				<!--Other Category-->
				<div class="form-group" id="catoters_addon" style="display:none;">
					<div class="col-sm-offset-4 col-sm-4">
						<input class="form-control" type="text" name="addon_catothers" id="addon_catothers" value="" />
						<span id="catname_errormsg">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label font-normal" for="addons_name"><span class="yellowStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonname'];?>
</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="addons_name" id="addons_name" value="<?php if ($_GET['addonid']!='') {
echo $_smarty_tpl->tpl_vars['addonsValue']->value[0]['addonsname'];
}?>"/>
					</div>
					<div class="col-sm-1">
						<input type="text" name="mainaddoncnt" id="mainaddoncnt" value="<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>Count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>" onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>Count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>')this.value='';"
					onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount']=='') {?>Count<?php } else {
echo $_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonscount'];
}?>';" size="12" class="form-control"/>
					</div>
					<div class="col-sm-2">
						<a onclick="addListSubAddons1();" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addsub_addons'];?>
</a>
					</div>
				</div>
				<?php if ($_GET['addonid']!='') {?>
				<div id="editSubaddonsList">
					<div class="newContMadfood" <?php if ($_smarty_tpl->tpl_vars['addonsvalue']->value[0]['addonspriceoption']=='Paid') {?> style="display:none;"<?php }?>>
						
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
						<div class="form-group">
							<span class="col-sm-offset-4 col-sm-4">
								<input type="text" name="addonsub[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['addon']['index'];?>
][subaddonsname]" id="<?php echo stripslashes($_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['addon']['index']]['addonsname']);?>
"
							class="form-control" />
							</span>
						</div>
						<?php endfor; endif; ?>
						
					
						<div id="subaddonslistEdit">
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
?> <?php $_smarty_tpl->tpl_vars['mainaddon'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['addon1']['index'], null, 0);?>
							<input type="hidden" name="addonsub[<?php echo $_smarty_tpl->tpl_vars['mainaddon']->value;?>
][subaddoneditid]" value="<?php echo $_smarty_tpl->tpl_vars['showmainAddonslist']->value[$_smarty_tpl->tpl_vars['mainaddon']->value]['id'];?>
" />
						<?php endfor; endif; ?>
					</div>
				</div>
				<?php }?>
				<div id="subaddonslist">
				</div>
				<!-- Add Start -->
				<div id="buttondiv">
				</div>
						
						<!-- Add End -->
			
                
			<div class="form-group">
				<span class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="myaccsubmitbtn" id="restAddonsAddEdit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonaddsubmit'];?>
" />
				</span>
			</div>
						
				
			
		</div>
	</form>
</div>
<?php }} ?>
