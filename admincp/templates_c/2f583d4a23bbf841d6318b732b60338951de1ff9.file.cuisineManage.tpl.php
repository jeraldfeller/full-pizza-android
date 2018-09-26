<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-06 05:05:39
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/cuisineManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46750976057ce014b710b90-48130755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f583d4a23bbf841d6318b732b60338951de1ff9' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/cuisineManage.tpl',
      1 => 1466424128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46750976057ce014b710b90-48130755',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'limit' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'cuisine_List' => 0,
    'trvar' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ce014bc292d1_31934745',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ce014bc292d1_31934745')) {function content_57ce014bc292d1_31934745($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Cuisine</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Cuisine</li>
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
	
		<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>
			<!-- Sort By -->
			<div class="col-sm-7 no-padding">	
				<form name="cuisinemanage" method="post" action="cuisineManage.php<?php if ($_REQUEST['limit']) {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>" />
                <div class="pull-right">
				<span class="restManageNameSort">Sort By</span>
				<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.cuisinemanage.submit();">
					<option value="">Select</option>
					<optgroup label="Status">
						<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
						<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
					</optgroup>
					<optgroup label="Others">
						<option value="casc" <?php if ($_REQUEST['sortby']=='casc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Cuisine Name A to Z</option>
						<option value="cdesc" <?php if ($_REQUEST['sortby']=='cdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Cuisine Name Z to A</option>
					</optgroup>				
				</select>
                </div>
				</form>
			</div>
			<?php }?>
			<div class="col-sm-12 no-padding">
			<!--Button Left start-->
			<div  class="manageButtonLeft">
				<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>
				<!--Filter-->
				<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
					 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
				</div>
				<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
					<form name="filterform" method="post" action="cuisineManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filterProcess" />
						<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
						
						<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Cuisine Name" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();"/>		 
					</form>	 
				</div>
				<!--Export-->
				
				<?php }?>
				<!--Import-->
				
                 <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 <?php }?>
			</div>
			<!--Button Left End-->
			<div class="col-sm-5">
				<span id="errormsg"></span>
			</div>
			<!--Button Right start-->
			<div class="manageButtonLastCont">
				<a class="btn btn-default btn-sm" href="cuisineAddEdit.php<?php if ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}?>	<?php } elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}?>	<?php } elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}?>	<?php } elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
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
','cuisine');" />
                
        	</div>
			<!--Button Right End-->
            </div>
			
			<!--List Start-->
			<div class="tableListContainer">
				<table width="100%" border="0" class="table table-bordered table-hover table-striped ">
					<tr class="">
						<th width="3%" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
								<label for="selectall"></label>
							</div>
						</th>
						<th width="7%" align="center" class="">S.No</th>
						<th width="27%" align="left" class="">
							<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Cuisine Name<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
							</a>
						</th>
						<th width="15%" align="center" class="">
							<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='idesc') {?>onclick="sortByAscDesc('iasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('idesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Cuisine Id<?php if ($_REQUEST['sortby']=='idesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
							</a>
						</th>
						
						<th width="15%" align="center" class="">Added Date</th>
						<th width="5%" align="center" class="">Status</th>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
						<th width="10%" align="center" class="">Action</th>
                        <?php }?>
						
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['name'] = "cuisine";
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cuisine_List']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["cuisine"]['total']);
?>
					<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['rownum'], null, 0);?>
					<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?>>
						<td align="center" class="listCont">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];?>
"  id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['rownum'];?>
" onclick="individualSelect();" />
								<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['rownum'];?>
"></label>
							</div>
						</td>
						<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['sno'];?>
</td>
						<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_name']);?>
</td>
						<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];?>
</td>
						
						<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['addeddate'];?>
</td>				
						<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_status']=='1') {?>
							<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
							<?php } else { ?>
							<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
							<?php }?>
						</td>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
						<td align="center" class="">
							<span class="EditDeleteButton">
								<a href="cuisineAddEdit.php?cusid=<?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}?>	<?php if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}?>	<?php if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}?>	<?php if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}?>" class="btn btn-light btn-icon btn-sm" >
									<i class="fa fa-pencil"></i>
								</a>
							</span>
                            <span class="EditDeleteButton">
								<a href="javascript:;" class="btn btn-light btn-sm btn-icon" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cuisine_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cuisine']['index']]['cuisine_id'];?>
','delete_cuisine');" >
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
</div><?php }} ?>
