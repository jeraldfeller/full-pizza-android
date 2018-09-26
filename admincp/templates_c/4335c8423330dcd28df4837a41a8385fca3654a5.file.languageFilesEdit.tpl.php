<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-09 10:58:58
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/languageFilesEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146819474958c17bc2675497-32089558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4335c8423330dcd28df4837a41a8385fca3654a5' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/languageFilesEdit.tpl',
      1 => 1466424114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146819474958c17bc2675497-32089558',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'langcode' => 0,
    'dir_files_list' => 0,
    'filedata' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c17bc283d479_06615004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c17bc283d479_06615004')) {function content_58c17bc283d479_06615004($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.replace.php';
?>

    <div class="adminTopHead">Edit Language Files - <?php echo $_smarty_tpl->tpl_vars['langcode']->value;?>
</div>
	
	<form name="languagemgmt" method="post" onsubmit="return updateselectLangFile()" class="form-horizontal col-sm-12" >
			<input type="hidden" name="langid" id="langid" value="<?php echo $_GET['langid'];?>
" />
			<input type="hidden" name="lfile" id="lfile" value="<?php echo $_GET['lfile'];?>
" />
			<div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">            
                    <div id="errormsg"></div>
                </div>
            </div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Select a File <span class="color-red">*</span></span>
				<div class="col-sm-4">
    				<select class="form-control selectpicker" name="lang_file_name" id="lang_file_name" onchange="loadselectLangFile(this.value,'<?php echo $_GET['langid'];?>
','<?php echo $_smarty_tpl->tpl_vars['langcode']->value;?>
');">
    					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['lf'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dir_files_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['name'] = 'lf';
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['lf']['total']);
?>
    					<option value="<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
" <?php if ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]==$_GET['lfile']) {?>selected="selected"<?php }?>>
    					<?php if ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='checkout.php') {?>Checkout (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='customerLogin.php') {?>Customer Login (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='customerMyaccount.php') {?>Customer Myaccount (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='customerRegister.php') {?>Customer Register (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='footer.php') {?>Footer (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='header.php') {?>Header (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='index.php') {?>Home (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='restaurantDetails.php') {?>Restaurant Details (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='restaurantOwnerLogin.php') {?>Restaurant Owner Login (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='restaurantOwnerMyaccount.php') {?>Restaurant Owner Myaccount (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='restaurantOwnerRegister.php') {?>Restaurant Owner Register (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='restaurantOwnerThanks.php') {?>Restaurant Owner Thanks (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='searchResult.php') {?>Search Result (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='success.php') {?>Success (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='thanks.php') {?>Thanks (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']]=='error_lang.js') {?>Error File (<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];?>
)
    					<?php } else {
echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['lf']['index']];
}?></option>
    					<?php endfor; endif; ?>
    				</select>	
                </div>
			</div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Language File <span class="color-red">*</span></span>
				<div class="col-sm-8">
    				<textarea name="langfilecontent" id="langfilecontent" cols="100" rows="25" class="form-control" /><?php echo stripslashes($_smarty_tpl->tpl_vars['filedata']->value);?>
</textarea>
    				<!--<textarea name="langfilecontent" id="langfilecontent" cols="100" rows="25" />dfdfdf</textarea>-->
                    
                  <!--- <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filedata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                    <input type="text" value="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['i']->value[0],'"','');
echo $_smarty_tpl->tpl_vars['i']->value[0];?>
" /><br />
                    <?php } ?>  -->
                </div>
			</div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
    				<input type="submit" class="btn btn-default" name="addEdit" value="<?php if ($_GET['langid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
    				<a class="btn" href="languageManage.php">Cancel</a>
                </div>
			</div>
		</form>
<?php }} ?>
