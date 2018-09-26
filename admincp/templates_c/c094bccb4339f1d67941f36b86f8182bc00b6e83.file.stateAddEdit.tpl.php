<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 09:59:42
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/stateAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14302825705768c2b6643a89-63381325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c094bccb4339f1d67941f36b86f8182bc00b6e83' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/stateAddEdit.tpl',
      1 => 1466424137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14302825705768c2b6643a89-63381325',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'statevalue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c2b66ab727_72215588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c2b66ab727_72215588')) {function content_5768c2b66ab727_72215588($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['stateid']!='') {?>Edit State<?php } else { ?>Add New State<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['stateid']!='') {?>Edit State<?php } else { ?>Add New State<?php }?></li>
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
	<form name="statemgmt" method="post" onsubmit="<?php if ($_GET['stateid']!='') {?>return editState();<?php } else { ?>return addNewState();<?php }?>" class="col-sm-12 form-horizontal">
		<input type="hidden" name="stateid" id="stateid" value="<?php echo $_GET['stateid'];?>
">
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
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">State Code <span class="color-red">*</span></label>
			<div class="col-sm-4">				
				<input class="form-control" type="text" name="statecode" id="statecode" maxlength="2" value="<?php if ($_GET['stateid']!='') {
echo $_smarty_tpl->tpl_vars['statevalue']->value[0]['statecode'];
}?>" />
				<?php echo '<script'; ?>
 type="text/javascript">document.statemgmt.statecode.focus();<?php echo '</script'; ?>
>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-sm-4 font-normal">State Name <span class="color-red">*</span></label>
			<div class="col-sm-4" >				
				<input class="form-control" type="text" name="statename" id="statename" value="<?php if ($_GET['stateid']!='') {
echo $_smarty_tpl->tpl_vars['statevalue']->value[0]['statename'];
}?>" />			   						
            </div>	
		</div>
		
		<div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
    			<input type="submit" class="btn btn-default btn-sm" id="StateAdd" name="addEdit" value="<?php if ($_GET['stateid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
    			<a class="btn  btn-sm" href="stateManage.php">Cancel</a>
            </div>
		</div>
	</form>

    </div>
</div><?php }} ?>
