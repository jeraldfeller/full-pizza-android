<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:56:47
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/userAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204239070757b4c88792e1e7-34067777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ea84a5257119f3008c14368f58255420a527811' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/userAddEdit.tpl',
      1 => 1466424117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204239070757b4c88792e1e7-34067777',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errormsg' => 0,
    'userEditList' => 0,
    'userModulesList1' => 0,
    'getmoduleslist' => 0,
    'modulesid' => 0,
    'objAdmin' => 0,
    'subModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c887a96393_75141919',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c887a96393_75141919')) {function content_57b4c887a96393_75141919($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">User Addedit</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">User Addedit</li>
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
			<form name="addnewuser" method="post" onsubmit="return addnewuserValidate();" class="form-horizontal">
	        	<input type="hidden" name="action" id="action" value="<?php if ($_REQUEST['eid']=='') {?>ADD<?php } else { ?>EDIT<?php }?>" />
	        	<div class="form-group">
	        		<div class="col-sm-4 col-sm-offset-4">
	        			<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<div class="col-sm-4 col-sm-offset-4">
						<div id="errormsg" class="color-red"><?php echo $_smarty_tpl->tpl_vars['errormsg']->value;?>
</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Name <span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="form-control" type="test" name="username" id="username" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['userEditList']->value[0]['username']);
} else {
echo $_REQUEST['username'];
}?>" />
						<?php echo '<script'; ?>
 type="text/javascript">document.addnewuser.username.focus();<?php echo '</script'; ?>
>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Password <span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="form-control" type="password" name="userpassword" id="userpassword" maxlength="50" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['userEditList']->value[0]['password']);
} else {
echo $_REQUEST['password'];
}?>"  autocomplete="off"/>
					</div>
				</div>
				<!-- *********************** user text ****************** -->
	            <div class="form-group">
					<label class="control-label col-sm-4 font-normal">User Designation </label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="userdesignation" maxlength="50" id="userdesignation" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['userEditList']->value[0]['user_designation']);
} else {
echo $_REQUEST['user_text'];
}?>"  />
					</div>
				</div>
	            
	            <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Modules Permission <span class="color-red">*</span></label>
					<div class="col-sm-4">
		                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userModulesList1']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
		                    <?php $_smarty_tpl->tpl_vars["getmoduleslist"] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['userEditList']->value[0]['modules']), null, 0);?>
		                    <div class="col-sm-12 no-padding">
			                    <div class="checkbox checkbox-primary">
				    				<input type="checkbox"  class="mainmenuid_<?php echo $_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" onclick="removeSubmenus(<?php echo $_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
);" name="modules[]" id="modules_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" <?php  $_smarty_tpl->tpl_vars['modulesid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['modulesid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['getmoduleslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['modulesid']->key => $_smarty_tpl->tpl_vars['modulesid']->value) {
$_smarty_tpl->tpl_vars['modulesid']->_loop = true;
if ($_smarty_tpl->tpl_vars['modulesid']->value==$_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id']) {?>checked="checked"<?php }
} ?>/>
				    				<label for="modules_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"><?php echo $_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['modulesname'];?>
</label>
				                     
				                    <?php if ($_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menucount']>0) {?>
				                        <?php $_smarty_tpl->tpl_vars['subModules'] = new Smarty_variable($_smarty_tpl->tpl_vars['objAdmin']->value->selectSubMenu($_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id']), null, 0);?>
				                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['name'] = "sub";
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['subModules']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total']);
?>
				                        <div class="col-sm-12">
					                        <div class="checkbox checkbox-primary">
					                            <input type="checkbox"  class="submodules_<?php echo $_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" onchange="submenuClick(<?php echo $_smarty_tpl->tpl_vars['userModulesList1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
);" name="modules[]" id="submodules_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];
echo $_smarty_tpl->getVariable('smarty')->value['section']['sub']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['subModules']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['id'];?>
" <?php  $_smarty_tpl->tpl_vars['modulesid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['modulesid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['getmoduleslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['modulesid']->key => $_smarty_tpl->tpl_vars['modulesid']->value) {
$_smarty_tpl->tpl_vars['modulesid']->_loop = true;
if ($_smarty_tpl->tpl_vars['modulesid']->value==$_smarty_tpl->tpl_vars['subModules']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['id']) {?>checked="checked"<?php }
} ?>/>
					                            <label for="submodules_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];
echo $_smarty_tpl->getVariable('smarty')->value['section']['sub']['rownum'];?>
"><?php echo $_smarty_tpl->tpl_vars['subModules']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['modulesname'];?>
 </label>
					                        </div>
					                    </div>
				                        <?php endfor; endif; ?>
				                    <?php }?>
				                </div>
				             </div>

		                <?php endfor; endif; ?>
	            	</div>
				</div>
	            
				 <div class="form-group">
				 	<div class="col-sm-6 col-sm-offset-4">
						<input type="submit" class="btn btn-default" value="Submit" />
						<a class="btn" href="userManage.php">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php }} ?>
