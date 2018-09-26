<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-14 08:55:20
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/cuisineAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67022925057d8c32023b082-37979564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '642f5d03f769f1d1b5522319da0c2779385d7b74' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/cuisineAddEdit.tpl',
      1 => 1466424129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67022925057d8c32023b082-37979564',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMsg' => 0,
    'selectCuisineValue' => 0,
    'Editor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d8c320386675_52524767',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d8c320386675_52524767')) {function content_57d8c320386675_52524767($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['cusid']!='') {?>Edit Cuisine<?php } else { ?>Add New Cuisine<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['cusid']!='') {?>Edit Cuisine<?php } else { ?>Add New Cuisine<?php }?></li>
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
			<form name="addNewCuisine" method="post" enctype="multipart/form-data" onsubmit="<?php if ($_GET['cusid']!='') {?>return editCuisineName();<?php } else { ?>return addNewcuisine();<?php }?>" class="form-horizontal col-sm-12">	
			<input type="hidden" name="action" value="CuisineAddEdit">
			<input type="hidden" name="cusid" id="cusid" value="<?php echo $_GET['cusid'];?>
">
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg" <?php if ($_smarty_tpl->tpl_vars['errorMsg']->value!='') {?>class="errormsg"<?php }?>><?php if ($_smarty_tpl->tpl_vars['errorMsg']->value!='') {
echo $_smarty_tpl->tpl_vars['errorMsg']->value;
}?></div>
				</div>
			</div>
				
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">Cuisine Name <span class="color-red">*</span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="cuisine_name" id="cuisine_name" value="<?php if ($_GET['cusid']!='') {
echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['selectCuisineValue']->value[0]['cuisine_name']));
} else {
echo $_POST['cuisine_name'];
}?>" />
    					<?php echo '<script'; ?>
 type="text/javascript">document.addNewCuisine.cuisine_name.focus();<?php echo '</script'; ?>
>
                    </div>
				</div>
				
					
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Description</span>
					<div class="col-sm-7 col-xs-12">	
					   <div class="editordiv"><?php echo $_smarty_tpl->tpl_vars['Editor']->value;?>
</div>
                    </div>
                    <!------------------Static Editor -------------------->
				<!-- <div class="col-sm-8 col-xs-12 col-md-8 col-sm-offset-4">
					<textarea name="textarea" class="jqte-test"></textarea>
				</div> -->
				</div>
				
				<div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
    					<input type="submit" class="btn btn-default" id="CuisineAdd" name="cus_addEdit" value="<?php if ($_GET['cusid']!='') {?>Edit<?php } else { ?>Add<?php }?>">
    					<a class="btn" href="cuisineManage.php<?php if ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}?> <?php if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['limit']) {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}?> <?php } elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>">Cancel</a>
                    </div>
				</div>
			</form>
		</div>
	
</div>
<?php }} ?>
