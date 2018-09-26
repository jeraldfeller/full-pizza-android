<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-14 08:55:48
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/languageAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200659278857d8c33cef33c1-03842348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b40585350eff37a33335c967186772e64bdf06df' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/languageAddEdit.tpl',
      1 => 1466424125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200659278857d8c33cef33c1-03842348',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'langvalue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d8c33d0cd456_26746202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d8c33d0cd456_26746202')) {function content_57d8c33d0cd456_26746202($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['langid']!='') {?>Edit Language<?php } else { ?>Add New Language<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['langid']!='') {?>Edit Language<?php } else { ?>Add New Language<?php }?></li>
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
		<?php if ($_GET['langid']!=''&&$_GET['lfile']!='') {?>
			<?php echo $_smarty_tpl->getSubTemplate ('languageFilesEdit.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php } else { ?>
		<!--Add Edit-->
		<form name="languagemgmt" method="post" onsubmit="<?php if ($_GET['langid']!='') {?>return editLanguage();<?php } else { ?>return addNewLanguage();<?php }?>" class="col-sm-12 form-horizontal">
		
			<input type="hidden" name="langid" id="langid" value="<?php echo $_GET['langid'];?>
">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
				</div>
			</div>
			<div class="form-group">
				<span class="control-label font-normal col-sm-4">Language Name <span class="color-red">*</span></span>
				<div class="col-sm-4" >			
					<input class="form-control" type="text" name="languagename" id="languagename"  value="<?php if ($_GET['langid']!='') {
echo $_smarty_tpl->tpl_vars['langvalue']->value[0]['lang_name'];
}?>" />
					<?php echo '<script'; ?>
 type="text/javascript">document.languagemgmt.languagename.focus();<?php echo '</script'; ?>
>
					
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label font-normal col-sm-4">Language Code <span class="color-red">*</span></span>
				<div class="col-sm-4">				
					<input class="form-control" type="text" name="languagecode" id="languagecode" maxlength="2" value="<?php if ($_GET['langid']!='') {
echo $_smarty_tpl->tpl_vars['langvalue']->value[0]['lang_code'];
}?>" />	
				</div>		
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" id="LanguageAdd" name="addEdit" value="<?php if ($_GET['langid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
					<a class="btn" href="languageManage.php">Cancel</a>
				</div>
			</div>
		</form>


<?php }?>
</div>
<?php }} ?>
