<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 08:58:38
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/categoryManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1966316887580e138e291cf2-39909559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9241b27e9835ffdd1051d09094073ffc916c35c8' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/categoryManage.tpl',
      1 => 1476398162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1966316887580e138e291cf2-39909559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resname' => 0,
    'limit' => 0,
    'req_file_name' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'mainCategory_list' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e138e4ebb81_66803877',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e138e4ebb81_66803877')) {function content_580e138e4ebb81_66803877($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Main Category<?php if ($_REQUEST['resid']!='') {?> - <?php echo $_smarty_tpl->tpl_vars['resname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Main Category<?php if ($_REQUEST['resid']!='') {?> - <?php echo $_smarty_tpl->tpl_vars['resname']->value;
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
			<div id="loadingrefresh">
				<div class="col-sm-5 col-xs-12 no-padding form-horizontal">
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
			<input type="hidden" name="filenameurl" id="filenameurl" value="<?php echo $_smarty_tpl->tpl_vars['req_file_name']->value;?>
" />
			<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>
				
				<div class="col-sm-7 no-padding">	
					<form name="categorymanage" method="post" action="categoryManage.php<?php if ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
}?>" />
					<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
                        
                        <div class="pull-right">
    					<span class="restManageNameSort">Sort By</span>
    					<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.categorymanage.submit();">
    						<option value="">Select</option>
    						<optgroup label="Status">
    							<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>Active</option>
    							<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>Deactive</option>
    						</optgroup>
    						<optgroup label="Others">
    							<option value="casc" <?php if ($_REQUEST['sortby']=='casc') {?>selected="selected"<?php }?>>Category Name A to Z</option>
    							<option value="cdesc" <?php if ($_REQUEST['sortby']=='cdesc') {?>selected="selected"<?php }?>>Category Name Z to A</option>
    						</optgroup>				
    					</select>
                        </div>
					</form>
				</div>
				<?php }?>
				<!--Button Left start-->
                <div class="col-sm-12 no-padding">
				<div  class="manageButtonLeft">
					<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>
					<!--Filter-->
					<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
						 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
					</div>
                    
                    
					<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
						<form name="filterform" method="post" action="categoryManage.php<?php if ($_REQUEST['searchrestaurantid']!='') {?>?resid=<?php echo $_REQUEST['searchrestaurantid'];
}?>" onsubmit="return filterValidation();">
							<input type="hidden" name="action"  value="filterProcess" />
							<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
							
	                           <input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Category Name"/>
                                <input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
    							<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />
                               	 
						</form>	 
					</div>
					<!--Export-->
					
					<?php }?>
					<!--Import-->
					
                     
				</div>
               
				<!--Button Left End-->
				<div class="col-sm-5"> <span id="errormsg"></span></div>
				<!--Button Right start-->
				<div class="manageButtonLastCont">
					 <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
        			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                     <?php }?>
					
					<a class="btn btn-default btn-sm" href="categoryAddEdit.php<?php if ($_REQUEST['resid']!='') {?>?resid=<?php echo $_REQUEST['resid'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
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
','category');" />
                     
				</div>
               
                </div>
				<!--Button List End-->
                
				
				<!--List Start-->
				<div class="tableListContainer">
					<table class="table table-bordered table-hover table-striped" <?php if ($_REQUEST['resid']!='') {?>id="table_catgory"<?php }?>>
						<tr class="nodrop nodrag">
							<th width="3%" align="center" class="">
								<div class="checkbox checkbox-primary no-margin">
									<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
									<label for="selectall"></label>
								</div>
							</th>
							<th width="7%" align="center" class="">S.No</th>
							<th width="23%" align="center" class="">
								<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Main Category Name<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
								</a>
							</th>
                            
                            <th width="18%" align="center" class="">Restaurant Name</th>
                            
                            <th width="12%" align="center" class=""> Sort Order </th>
							<th width="8%" align="center" class="">
								<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='idesc') {?>onclick="sortByAscDesc('iasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('idesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Category Id<?php if ($_REQUEST['sortby']=='idesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='iasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
								</a>
							</th>
                            
							<th width="15%" align="center" class="">Added Date</th>
							<th width="5%" align="center" class="">Status</th>
                            <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
							<th width="10%" align="center" class="">Action</th>
                            <?php }?>
						</tr>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['name'] = "maincat";
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mainCategory_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total']);
?>
						<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'], null, 0);?>
						<tr id="<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
">
							<td align="center" class="">
								<div class="checkbox checkbox-primary no-margin">
									<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
" />
									<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
"></label>
								</div>
							</td>
							<td align="center" class=""><?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['sno'];?>
</td>
                            <td align="center" class=""><a href="menuManage.php?catid=<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
&resid=<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['restaurant_id'];?>
"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincatename']));?>
</a></td>
							<td align="center" class=""><?php echo stripslashes($_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['cat_restname']);?>
</td>
    
                            <td align="center" id="sort_order_<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
" class=""><?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['sortorder'];?>
</td>
							<td align="center" class=""><?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
</td>
							<td align="center" class=""><?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['addeddate'];?>
</td>
							<td align="center" class="" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
">
								<?php if ($_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['status']=='1') {?>
								<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
								<?php } elseif ($_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['status']=='0') {?>
								<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
								<?php }?>
							</td>
                            <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
							<td align="center" class="">
								<span class="EditDeleteButton">
									<!--<a href="categoryAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
" class="thickbox">-->
									<a href="categoryAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
} else {
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
}?>" class="btn btn-light btn-icon btn-sm" >
										<i class="fa fa-pencil"></i>
									</a>
								</span>
								<span class="EditDeleteButton">
									<a href="javascript:;" class="btn btn-light btn-sm btn-icon" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['mainCategory_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['maincateid'];?>
','delete_category');" style="cursor:pointer;" >
								        <i class="fa fa-close"></i>
							         </a>
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
