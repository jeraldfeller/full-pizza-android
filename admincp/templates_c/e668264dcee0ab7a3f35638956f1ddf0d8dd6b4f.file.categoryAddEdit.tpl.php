<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 17:40:44
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/categoryAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19001523645768c4f0283500-01406456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e668264dcee0ab7a3f35638956f1ddf0d8dd6b4f' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/categoryAddEdit.tpl',
      1 => 1476398441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19001523645768c4f0283500-01406456',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c4f053c0a5_06004248',
  'variables' => 
  array (
    'catename' => 0,
    'parentname' => 0,
    'catename_sub' => 0,
    'subcatname_id' => 0,
    'catoption' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c4f053c0a5_06004248')) {function content_5768c4f053c0a5_06004248($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['eid']) {?>Edit Main Category - <?php echo stripslashes($_smarty_tpl->tpl_vars['catename']->value);
} elseif ($_GET['seid']&&$_GET['mcatid']) {?>Edit Sub Category - <?php echo stripslashes($_smarty_tpl->tpl_vars['parentname']->value);
} elseif ($_GET['mcatid']) {?>Add New Sub Category - <?php echo stripslashes($_smarty_tpl->tpl_vars['catename_sub']->value);
} else { ?>Add New Main Category<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Addnew Category</li>
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
			<form name="addNewMainCategory" method="post" onsubmit="<?php if ($_GET['eid']) {?>return editMainCategory();<?php } elseif ($_GET['seid']&&$_GET['mcatid']) {?>return editSubCategory();<?php } elseif ($_GET['mcatid']) {?>return addSubCategory();<?php } else { ?>return addMainCategory();<?php }?>" class="form-horizontal col-sm-12">
			
				<input type="hidden" name="eid" id="eid" value="<?php echo $_GET['eid'];?>
">
				<input type="hidden" name="mcatid" id="mcatid" value="<?php echo $_GET['mcatid'];?>
">
				<input type="hidden" name="action" value="<?php if ($_GET['eid']=='') {?>Add<?php } else { ?>Edit<?php }?>">
				<input type="hidden" name="seid" id="seid" value="<?php echo $_GET['seid'];?>
"/>
				<input type="hidden" name="parentid" id="parentid" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['subcatname_id']->value[0]['parent_id']);?>
"/>
				<input type="hidden" name="resid" id="resid" value="<?php echo $_GET['resid'];?>
"/>
		        <div class="form-group">
		            <div class="col-sm-8">
			 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
		            </div>
		        </div>
		         <div class="form-group">
		            <div class="col-sm-8 col-sm-offset-4">
		                <div id="errormsg"></div>
		            </div>
		         </div>
		        
		        
				
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">
					<?php if ($_GET['mcatid']||$_GET['seid']) {?>Sub Category Name:<?php } else { ?>Main Category Name 
					<span class="color-red">*</span><?php }?></span>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="maincatename" id="maincatename" value="<?php if ($_GET['eid']) {
echo stripslashes($_smarty_tpl->tpl_vars['catename']->value);
} elseif ($_GET['seid']) {
echo stripslashes($_smarty_tpl->tpl_vars['subcatname_id']->value[0]['maincatename']);
}?>" />
						<?php echo '<script'; ?>
 type="text/javascript">document.addNewMainCategory.maincatename.focus();<?php echo '</script'; ?>
>
		            </div>
				</div>
				
				<div class="form-group">
					<span class="control-label  col-sm-4 font-normal">Category Option<span class="color-red">*</span></span>
					<div class="col-sm-4">
			            <div class="radio-inline radio">
							<input class="radiobotton" type="radio" name="maincat_option" id="maincat_option_normal" value="normal" <?php if ($_GET['eid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['catoption']->value=='normal') {?> checked="checked" <?php }?> <?php } else { ?>checked="checked" <?php }?>/>
			                <label for="maincat_option_normal">Normal</label>
			            </div>
						<div class="radio-inline radio">
							<input class="radiobotton" type="radio" name="maincat_option" id="maincat_option_pizza" value="pizza" <?php if ($_GET['eid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['catoption']->value=='pizza') {?> checked="checked" <?php }
}?>/>
			                <label for="maincat_option_pizza">Pizza</label>
			            </div> 
					</div>
				</div>
				<div class="form-group">
		            <div class="col-sm-4 col-sm-offset-4">
						<input type="submit" class="btn btn-default" id="CategoryAdd" name="addEdit" value="<?php if ($_GET['eid']||$_GET['seid']) {?>Edit<?php } else { ?>Add<?php }?>">
						<a class="btn"<?php if ($_GET['mcatid']) {?> href="categorySubManage.php?mcatid=<?php echo $_GET['mcatid'];?>
"<?php } elseif ($_GET['seid']) {?> href="categorySubManage.php?mcatid=<?php echo $_GET['mcatid'];?>
"<?php } else { ?>href="categoryManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>"<?php }?>>Cancel</a>
		            </div>
				</div>
			</form>
	    </div>
    </div>
<?php }} ?>
