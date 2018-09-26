<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 09:59:07
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/cityAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11687581715768c29383e051-43839377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35fa95dbfdeb8dca5744a21b0be3825cc6c2e5f2' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/cityAddEdit.tpl',
      1 => 1466424124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11687581715768c29383e051-43839377',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showStatelist' => 0,
    'ste' => 0,
    'cityvalue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c29396ede7_62058401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c29396ede7_62058401')) {function content_5768c29396ede7_62058401($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['cityid']!='') {?>Edit City<?php } else { ?>Add New City<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['cityid']!='') {?>Edit City<?php } else { ?>Add New City<?php }?></li>
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
	<form name="citymgmt" method="post" onsubmit="<?php if ($_GET['cityid']!='') {?>return editCityValidate();<?php } else { ?>return addNewCityValidate();<?php }?>" class="col-sm-12 form-horizontal">
	
		<input type="hidden" name="cityid" id="cityid" value="<?php echo $_GET['cityid'];?>
">
		<input type="hidden" name="statecode" id="stecode" value="<?php echo $_GET['sc'];?>
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
		<?php if ($_GET['sc']=='') {?>
		<div class="form-group">
			<span class="control-label col-sm-4">State Name <span class="color-red">*</span></span>
			<div class="col-sm-4" >
    			<select class="form-control selectpicker" name="statename" id="statename" >
    				<option value="">Select</option>
    				<?php  $_smarty_tpl->tpl_vars['ste'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ste']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showStatelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ste']->key => $_smarty_tpl->tpl_vars['ste']->value) {
$_smarty_tpl->tpl_vars['ste']->_loop = true;
?>
    				<option value="<?php echo $_smarty_tpl->tpl_vars['ste']->value['statecode'];?>
" <?php if ($_smarty_tpl->tpl_vars['cityvalue']->value[0]['statecode']==$_smarty_tpl->tpl_vars['ste']->value['statecode']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['ste']->value['statename'];?>
</option>
    				<?php } ?>
    			</select>
            </div>
		</div>
		<?php }?>
		
		<div class="form-group">
			<span class="control-label col-sm-4">City Name <span class="color-red">*</span></span>
			<div class="col-sm-4">			
    			<input class="form-control" type="text" name="cityname" id="cityname" value="<?php if ($_GET['cityid']!='') {
echo $_smarty_tpl->tpl_vars['cityvalue']->value[0]['cityname'];
}?>" />
			</div>
		</div>
		
		<div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
    			<input type="submit" class="btn btn-default" id="CityAdd" name="addEdit" value="<?php if ($_GET['cityid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
    			<a class="btn" href="cityManage.php">Cancel</a>
            </div>			
		</div>
	</form>
</div>

</div><?php }} ?>
