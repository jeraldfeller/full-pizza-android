<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:00:12
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/zipcodeAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11693242505768c2d4c64848-46368096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26510f01db30a873573ad66c070b7ab2a3ddc04' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/zipcodeAddEdit.tpl',
      1 => 1466424149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11693242505768c2d4c64848-46368096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showStatelist' => 0,
    'state' => 0,
    'zipcodeValue' => 0,
    'selectCityList' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c2d4d20b36_64081914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c2d4d20b36_64081914')) {function content_5768c2d4d20b36_64081914($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['zipid']!='') {?>Edit Postcode<?php } else { ?>Add New Postcode<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['zipid']!='') {?>Edit Postcode<?php } else { ?>Add New Postcode<?php }?></li>
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
		<form name="zipmgmt" method="post" onsubmit="<?php if ($_GET['zipid']!='') {?>return editZipcode();<?php } else { ?>return addNewZipcode();<?php }?>" class="form-horizontal col-sm-12">
		
			<input type="hidden" name="zipid" id="zipid" value="<?php echo $_GET['zipid'];?>
">
			<input type="hidden" name="stecode" id="stecode" value="<?php echo $_GET['sc'];?>
">
			<input type="hidden" name="cid" id="cid" value="<?php echo $_GET['cid'];?>
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
				<label class="control-label col-sm-4 font-normal">State <span class="color-red">*</span></label>
				<div class="col-sm-4">	
					<select class="form-control selectpicker" name="state" id="state" onchange="getShowCityList(this.value);">
						<option value="">Select</option>
						<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showStatelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['statecode'];?>
" <?php if ($_smarty_tpl->tpl_vars['zipcodeValue']->value[0]['statecode']==$_smarty_tpl->tpl_vars['state']->value['statecode']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['state']->value['statename'];?>
</option>
						<?php } ?>
					</select>	
				</div>	
			</div>
			<?php }?>
			<?php if ($_GET['cid']=='') {?>
			<div class="form-group">
				<label class="control-label col-sm-4 font-normal">City Name <span class="color-red">*</span><?php echo $_smarty_tpl->tpl_vars['zipcodeValue']->value[0]['stateid'];?>
</label>
				<div class="col-sm-4" >	
				<span id="showcityList">
					<select class="form-control selectpicker" name="cityname" id="cityname" >
					<option value="">First Select State</option>
					<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectCityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['zipcodeValue']->value[0]['cityid']==$_smarty_tpl->tpl_vars['city']->value['city_id']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['cityname'];?>
</option>
					<?php } ?>
					</select>
				</span>	
                </div>
			</div>
			<?php }?>
				
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Postcode <span class="color-red">*</span></span>	
				<div class="col-sm-4">			
					<input class="form-control" type="text" name="zipcode" id="zipcode" maxlength="8" value="<?php if ($_GET['zipid']!='') {
echo $_smarty_tpl->tpl_vars['zipcodeValue']->value[0]['zipcode'];
}?>" />
				 </div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Area Name <span class="color-red"></span></span>
				<div class="col-sm-4">	
					<input class="form-control" type="text" name="areaname" id="areaname" value="<?php if ($_GET['zipid']!='') {
echo $_smarty_tpl->tpl_vars['zipcodeValue']->value[0]['areaname'];
}?>" />						  
                </div>
			</div>
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
    				<input type="submit" class="btn btn-default" id="ZipcodeAdd" name="addEdit" value="<?php if ($_GET['zipid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
    				<a class="btn" href="zipcodeManage.php">Cancel</a>
                </div>
				
			</div>
		</form>
	</div>
</div>

<?php }} ?>
