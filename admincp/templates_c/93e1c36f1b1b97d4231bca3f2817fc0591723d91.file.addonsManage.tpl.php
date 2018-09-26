<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:16:15
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/addonsManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17480313615768c69717ee49-42724465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93e1c36f1b1b97d4231bca3f2817fc0591723d91' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/addonsManage.tpl',
      1 => 1466424123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17480313615768c69717ee49-42724465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'tot_addon_rec' => 0,
    'active_addon_rec' => 0,
    'deactive_addon_rec' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'addons_list' => 0,
    'trvar' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c6976d6f04_89807784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c6976d6f04_89807784')) {function content_5768c6976d6f04_89807784($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Addons <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Addons <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></li>
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
			<div  class="filterbutton">
				<span  class="topName1">Total Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['tot_addon_rec']->value;?>
</span>
				<span  class="topName1">Active Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['active_addon_rec']->value;?>
</span>
				<span  class="topName1">Deactive Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactive_addon_rec']->value;?>
</span>
			</div>
			<div class="col-sm-5 no-padding form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2">Show</label>
					<select class="selectpicker" data-width="80px" onchange="showPerPage(this.value,'<?php echo $_GET['keyword'];?>
','<?php echo $_GET['sortby'];?>
');" >
						<option value="5" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='5') {?>selected="selected"<?php }?>>5</option>
						<option value="10" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='10') {?>selected="selected"<?php }?>>10</option>
						<option value="15" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='15') {?>selected="selected"<?php }?>>15</option>
						<option value="20" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='20') {?>selected="selected"<?php }?>>20</option>
						<option value="25" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='25') {?>selected="selected"<?php }?>>25</option>
						<option value="30" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='30') {?>selected="selected"<?php }?>>30</option>
						<option value="50" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='50') {?>selected="selected"<?php }?>>50</option>
						<option value="100" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='100') {?>selected="selected"<?php }?>>100</option>
					</select>
					<span class="">per page</span>
				</div>
			</div>
			
			
			
			
			
			<!-- Sort By -->
			<div class="col-sm-7 no-padding">	
				<form name="addonsmanage" method="post" action="addonsManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
}?>" >
				<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
				<?php if (!$_GET['resid']) {?>
				<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.addonsmanage.submit();">
					<option value="">Select Restaurant Name</option>
					<?php  $_smarty_tpl->tpl_vars['searchreslist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['searchreslist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['restaurantSearchList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['searchreslist']->key => $_smarty_tpl->tpl_vars['searchreslist']->value) {
$_smarty_tpl->tpl_vars['searchreslist']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['searchreslist']->value['restaurant_id'];?>
" <?php if ($_REQUEST['searchrestaurantid']==$_smarty_tpl->tpl_vars['searchreslist']->value['restaurant_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['searchreslist']->value['restaurant_name']);?>
</option>
					<?php } ?>
				</select>
				<?php }?>
				<div class="pull-right">
					<span class="restManageNameSort">Sort By</span>
					<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.addonsmanage.submit();">
						<option value="">Select</option>
						<optgroup label="Status">
							<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
							<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
						</optgroup>
						<optgroup label="Others">
							<option value="aasc" <?php if ($_REQUEST['sortby']=='aasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Addons Name A to Z</option>
							<option value="adesc" <?php if ($_REQUEST['sortby']=='adesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Addons Name Z to A</option>
							<option value="catasc" <?php if ($_REQUEST['sortby']=='catasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Category Name A to Z</option>
							<option value="catdesc" <?php if ($_REQUEST['sortby']=='catdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Category Name Z to A</option>
							<?php if (!$_GET['resid']) {?>
							<option value="rasc" <?php if ($_REQUEST['sortby']=='rasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name A to Z</option>
							<option value="rdesc" <?php if ($_REQUEST['sortby']=='rdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name Z to A</option>
							<?php }?>
						</optgroup>
					</select>
				</div>
				</form>
			</div>
			
			<div class="col-sm-12 no-padding">
			<!--Button Left start-->
				<div class="manageButtonLeft">
					<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>	
					<!--Filter-->
					<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
						 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
					</div>
					<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
						<form name="filterform" method="post" action="addonsManage.php" onsubmit="return filterValidation();">
							<input type="hidden" name="action"  value="filterProcess" />
							<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
							
							
							<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Addons Name" />
							<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
							<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
						</form>	 
					</div>
					
					<?php }?>
					
	                
				</div>
				<!--Button Left End-->
				<!--Button List start-->
				<div class="manageButtonLastCont">
					<?php if ($_GET['resid']) {?><a class="btn btn-info btn-sm" href="restaurantManage.php<?php if ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}?> <?php if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>">Back</a><?php }?>
					<!--<a class="manageButton_addnw thickbox" href="addonsAddEdit.php?resid=<?php echo $_GET['resid'];?>
&height=300&width=700">Add New</a>-->
					<a class="btn btn-default btn-sm" href="addonsAddEdit.php<?php if ($_REQUEST['resid']!='') {?>?resid=<?php echo $_REQUEST['resid'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>"><i class="fa fa-plus-circle"></i> Add New</a>
					<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
					<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
					<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','addon');" />
	                 <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
	    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
	                 <?php }?>
				</div>
				<!--Button List End-->
			</div>
			 <span id="errormsg"></span>
			<!--List Start-->
			<div class="tableListContainer">
				<table class="table table-hover table-bordered table-striped">
					<tr class="">
						<th width="5%" align="center" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
								<label for="selectall"></label>
							</div>
						</th>
						<th width="5%" align="center" class="">S.No</th>
						<th width="<?php if (!$_GET['resid']) {?>20%<?php } else { ?>30%<?php }?>" align="left" class="">
							<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='adesc') {?>onclick="sortByAscDesc('aasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='aasc') {?>onclick="sortByAscDesc('adesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('adesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Addons Name<?php if ($_REQUEST['sortby']=='adesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='aasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
							</a>
						</th>
						<th width="<?php if (!$_GET['resid']) {?>20%<?php } else { ?>30%<?php }?>" align="left" class="">
							<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='catdesc') {?>onclick="sortByAscDesc('catasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='catasc') {?>onclick="sortByAscDesc('catdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('catdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Category<?php if ($_REQUEST['sortby']=='catdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='catasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
							</a>
						</th>
				
						<?php if (!$_GET['resid']) {?>
						<th width="<?php if (!$_GET['resid']) {?>20%<?php } else { ?>30%<?php }?>" align="left" class="">
							<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='rdesc') {?>onclick="sortByAscDesc('rasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='rasc') {?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Restaurant<?php if ($_REQUEST['sortby']=='rdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='rasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
							</a>
						</th>
						<?php }?>
						<th width="15%" align="center" class="">Added Date</th>
						<th width="5%" align="center" class="">Status</th>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
						<th width="10%" align="center" class="">Action</th>
                        <?php }?>
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['addons_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
					<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'], null, 0);?>
					<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?> id="deletecate<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
						<td align="center" class="listCont">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"/>
								<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
							</div>

						</td>
						<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
						<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addonsname']);?>
</td>
						<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addons_catname']);?>
</td>
						<?php if (!$_GET['resid']) {?>
						<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addons_restname']);?>
</td>
						<?php }?>
						<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addeddate'];?>
</td>
						<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='1') {?>
							<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
							<?php } else { ?>
							<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
							<?php }?>
						</td>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
						<td align="center" class="">
							<span class="EditDeleteButton">
								<a href="addonsAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>"  class="btn btn-light btn-icon btn-sm">
									<i class="fa fa-pencil"></i>
								</a>
							</span>
							<span class="EditDeleteButton">
								<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['addons_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','addon');" style="cursor:pointer;" />
							</span>
						</td>
                        <?php }?>
					</tr>
					<?php endfor; else: ?>
					<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
					<?php endif; ?>
				</table>
			</div>
			<!--List End-->
			<div class="col-sm-5 col-xs-12 no-padding form-horizontal margin-top-10">
				<div class="form-group">
					<label class="control-label col-sm-2">Show</label>
					<select class="selectpicker" data-width="80px" onchange="showPerPage(this.value,'<?php echo $_GET['keyword'];?>
','<?php echo $_GET['sortby'];?>
');" >
						<option value="5" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='5') {?>selected="selected"<?php }?>>5</option>
						<option value="10" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='10') {?>selected="selected"<?php }?>>10</option>
						<option value="15" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='15') {?>selected="selected"<?php }?>>15</option>
						<option value="20" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='20') {?>selected="selected"<?php }?>>20</option>
						<option value="25" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='25') {?>selected="selected"<?php }?>>25</option>
						<option value="30" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='30') {?>selected="selected"<?php }?>>30</option>
						<option value="50" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='50') {?>selected="selected"<?php }?>>50</option>
						<option value="100" <?php if ($_smarty_tpl->tpl_vars['limit']->value=='100') {?>selected="selected"<?php }?>>100</option>
					</select>
					<span class="">per page</span>
				</div>
			</div>
			<div class="col-sm-7 no-padding pull-right">
				<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

			</div>
			
		</div>
	</div>
</div><?php }} ?>
