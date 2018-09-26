<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-25 10:33:52
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/contentAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103883551158ff6c60b3fc14-75473190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5ada41aacfaf803ff1f17184e89123d177d565e' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/contentAddEdit.tpl',
      1 => 1466424131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103883551158ff6c60b3fc14-75473190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ErrorMessage' => 0,
    'contentValue' => 0,
    'Editor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58ff6c60c63fa6_53287318',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff6c60c63fa6_53287318')) {function content_58ff6c60c63fa6_53287318($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['conid']!='') {?>Edit Content<?php } else { ?>Add New Content<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['conid']!='') {?>Edit Content<?php } else { ?>Add New Content<?php }?></li>
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


		<form name="contentMgmt" method="post" onsubmit="<?php if ($_GET['conid']!='') {?>return editContent();<?php } else { ?>return addNewContent();<?php }?>" class="form-horizontal col-sm-12">
		
			<input type="hidden" name="conid" id="conid" value="<?php echo $_GET['conid'];?>
">
			<input type="hidden" name="action" value="<?php if ($_GET['conid']=='') {?>Add<?php } else { ?>Edit<?php }?>">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
					<span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['ErrorMessage']->value;?>
</span>
				</div>
			</div>
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Title <span class="color-red">*</span></span>
				<div class="col-sm-4" >			
					<input class="form-control" type="text" name="title" id="title" value="<?php if ($_GET['conid']!='') {
echo $_smarty_tpl->tpl_vars['contentValue']->value[0]['content_title'];
} else {
echo $_REQUEST['title'];
}?>" />
				</div>
			</div>	
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Metatag Title<span class="color-red">*</span></span>
				<div class="col-sm-4">		
					<textarea class="form-control" rows="5" name="mettitle" id="mettitle" /><?php if ($_GET['conid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['contentValue']->value[0]['metatagtitle']);
} else {
echo $_REQUEST['mettitle'];
}?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Metatag Description <span class="color-red">*</span></span>
				<div class="col-sm-4" >		
					<textarea class="form-control" rows="5" name="metdes" id="metdes" /><?php if ($_GET['conid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['contentValue']->value[0]['metatagdescription']);
} else {
echo $_REQUEST['metdes'];
}?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Metatag Keyword <span class="color-red">*</span></span>
				<div class="col-sm-4">		
					<textarea class="form-control" rows="5"  name="metkey" id="metkey" /><?php if ($_GET['conid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['contentValue']->value[0]['metatagkeyword']);
} else {
echo $_REQUEST['metkey'];
}?></textarea>
				</div>
			</div>
						
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Display Type<span class="color-red"></span></span>
				<div class="col-sm-4">		
					<div class="checkbox checkbox-primary checkbox-inline">
						<input type="checkbox" name="dis_footer" value="F" id="display_yes" <?php if ($_smarty_tpl->tpl_vars['contentValue']->value[0]['display_footer']=='F') {?>checked="checked"<?php }?> >
						<label for="display_yes">Footer</label>
					</div>
					<div class="checkbox checkbox-primary checkbox-inline">
						<input type="checkbox" name="dis_page" value="CR"  id="display_no" <?php if ($_smarty_tpl->tpl_vars['contentValue']->value[0]['display_customer']=='CR') {?>checked="checked"<?php }?> >
						<label for="display_no">Customer Register</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Terms &amp; Condition</span>
				<div class="col-sm-4">		
					<div class="radio-inline radio">
						<input type="radio" name="terms" value="Yes" id="terms_yes" <?php if ($_smarty_tpl->tpl_vars['contentValue']->value[0]['termscondition']=='Yes') {?>checked="checked"<?php }?>>
						<label for="terms_yes">Yes</label>
					</div>
					<div class="radio-inline radio">
						<input type="radio" name="terms" value="No" id="terms_no" <?php if ($_smarty_tpl->tpl_vars['contentValue']->value[0]['termscondition']=='No') {?>checked="checked"<?php }?> >
						<label for="terms_no">No</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4 font-normal">Content <span class="color-red">*</span></span>	
				<div class="col-sm-8 col-xs-12">			
					<?php echo $_smarty_tpl->tpl_vars['Editor']->value;?>

				</div>	
				<!------------------Static Editor -------------------->
					
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" name="addEdit" value="<?php if ($_GET['conid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
					<a class="btn" href="contentManage.php">Cancel</a>
				</div>
			</div>
			
		</form>
	</div>
</div>

<?php }} ?>
