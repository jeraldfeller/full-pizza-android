<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 08:58:59
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/menuManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:851184232580e13a30f73b1-16189924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '532f6d01245572fc235e23b77ce0bc656fea57cd' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/menuManage.tpl',
      1 => 1475619674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '851184232580e13a30f73b1-16189924',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'req_file_name' => 0,
    'tot_menu_rec' => 0,
    'active_menu_rec' => 0,
    'deactive_menu_rec' => 0,
    'popular_menu_rec' => 0,
    'normal_menu_rec' => 0,
    'veg_menu_rec' => 0,
    'nonveg_menu_rec' => 0,
    'limit' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'menu_list' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e13a36051d9_12749294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e13a36051d9_12749294')) {function content_580e13a36051d9_12749294($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Configuracion Menu </h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Configuracion Menu </li>
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
		<input type="hidden" name="filenameurl" id="filenameurl" value="<?php echo $_smarty_tpl->tpl_vars['req_file_name']->value;?>
" />
		
		<div  class="filterbutton">
			<span  class="topName1">Total Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['tot_menu_rec']->value;?>
</span>
			<span  class="topName1">Active Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['active_menu_rec']->value;?>
</span>
			<span  class="topName1">Deactive Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactive_menu_rec']->value;?>
</span>
			<span  class="topName1">Popular Records:</span> <span  class="topName2"> <?php echo $_smarty_tpl->tpl_vars['popular_menu_rec']->value;?>
 </span>
            <span  class="topName1">Normal Records:</span> <span  class="topName2"> <?php echo $_smarty_tpl->tpl_vars['normal_menu_rec']->value;?>
</span>
			<span  class="topName1">Veg :</span><span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['veg_menu_rec']->value;?>
</span>
			<span class="topName1">Non-veg :</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['nonveg_menu_rec']->value;?>
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
			<form name="menumanage" method="post" action="menuManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['searchrestaurantid']) {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>" />
			
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.menumanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Dish">
					<option value="popular" <?php if ($_REQUEST['sortby']=='popular') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Popular</option>
					<option value="normal" <?php if ($_REQUEST['sortby']=='normal') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Normal</option>
				</optgroup>
				<optgroup label="Menu Type">
					<option value="veg" <?php if ($_REQUEST['sortby']=='veg') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Veg</option>
					<option value="nonveg" <?php if ($_REQUEST['sortby']=='nonveg') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Non Veg</option>
				</optgroup>
				<optgroup label="Others">
					<option value="masc" <?php if ($_REQUEST['sortby']=='masc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Menu Name A to Z</option>
					<option value="mdesc" <?php if ($_REQUEST['sortby']=='mdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Menu Name Z to A</option>
					<option value="casc" <?php if ($_REQUEST['sortby']=='casc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Category Name A to Z</option>
					<option value="cdesc" <?php if ($_REQUEST['sortby']=='cdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Category Name Z to A</option>
					
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
			<form name="filterform" method="post" onsubmit="return filterValidation();" action="menuManage.php<?php if ($_REQUEST['resid']!='') {?>?resid=<?php echo $_REQUEST['resid'];
}?>">
				<input type="hidden" name="action"  value="filterProcess" />
				<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
				
				<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Menu Name/Restaurant Name"/>
				<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
				<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
			</form>	 
		</div>
			<!--Export-->
			<div  class="filterbutton filterBgImg" onclick="return exportOptShowHide();">Export
				<!--<img src="images/icon_plus.png" alt="Export" title="Export" />-->
			</div>
			<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
				<form name="exportform" method="post" onsubmit="return exportValidation();">
					<input type="hidden" name="action"  value="exportProcess" />
							
					<select name="exportfile" id="exportfile">				 	 
						<option value="CSV">CSV</option>
						<option value="Excel">Excel</option>	
					</select>
					<input type="submit" name="export" value="Export" class="buttonFilter" />	
				</form>				 
			</div>
			<?php }?>
			<!--Import-->
			<div  class="filterbutton filterBgImg" onclick="return importOptShowHide();">Import
				<img src="images/icon_plus.png" alt="Import" title="Import" />
			</div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" checked="checked" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
				</form>
			 </div>
             
             
		</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			 <?php if ($_smarty_tpl->tpl_vars['totalRecords']->value!='0') {?>
			<span id="errormsg" <?php if ($_REQUEST['catid']!='') {?>style="color:green"<?php }?>><?php if ($_REQUEST['catid']!='') {?>Now, you can drag menu<?php }?></span>
            <?php }?>
		</div>
		<!--Button Right start-->
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
			
			<a class="btn btn-default btn-sm" href="menuAddEdit.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['page'];
}
} elseif ($_REQUEST['searchrestaurantid']!='') {?>?resid=<?php echo $_REQUEST['searchrestaurantid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['page'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
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
','Menu');" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Popular" style="display:none;" onclick="adminActivateDeactivate('Yes','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" />
			<input type="button" class="btn btn-info btn-sm but_delete" value="Normal" style="display:none;" onclick="adminActivateDeactivate('No','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" />
            
		</div>
		<!--Button Right End-->
		</div>
		 
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped" <?php if ($_GET['catid']!='') {?>id="table_menu"<?php }?>>
				<tr class="nodrop nodrag">
					<th width="4%">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%">S.No</th>
					<th width="<?php if (!$_GET['resid']) {?>25%<?php } else { ?>25%<?php }?>" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='mdesc') {?>onclick="sortByAscDesc('masc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='masc') {?>onclick="sortByAscDesc('mdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('mdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Menu Name<?php if ($_REQUEST['sortby']=='mdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='masc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="8%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='tdesc') {?>onclick="sortByAscDesc('tasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='tasc') {?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Type<?php if ($_REQUEST['sortby']=='tdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='tasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="10%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Category<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
                    <?php if ($_GET['catid']) {?>
                    <th width="6%" >Sort Order</th>
                    <?php }?>
					
                    <th width="7%" >Id</th>
					<th width="10%" >Added Date</th>
					<th width="5%" >Popular</th>
					<th width="6%" >Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="20%" >Action</th>
                    <?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['name'] = "list";
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'], null, 0);?>
                
				
                <tr id="<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" class="case" value="<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" onclick="individualSelect();" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
						</div>
					</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_name']);?>
</td>
					<td ><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_type']=='veg') {?>Veg<?php } elseif ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_type']=='nonveg') {?>Non Veg<?php } else { ?>other<?php }?></td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_catname']);?>
</td>
					
                    <?php if ($_GET['catid']) {?>
                    <td  id="sort_order_<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sortorder']);?>
</td>
                    <?php }?>
					
                    <td ><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addeddate'],"%d - %m - %Y");?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_popular_dish']=='Yes') {?>
						<img src="images/star_yellow.png" alt="Popular" title="Popular" onclick="return changeStatus('No','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
					<td  id="chgstatus<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } elseif ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='0') {?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td>
						<span class="EditDeleteButton">
							<a href="menuAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
} else { ?>&resid=<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}?>" class="btn btn-light btn-icon">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
					   <span class="EditDeleteButton">
					   		<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','delete_menu');">
								<i class="fa fa-close"></i>
							</a>
						</span>	
					</td>
                    <?php }?>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="12" align="center" class="text-danger">No record(s) found</td></tr>
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
</div><?php }} ?>
