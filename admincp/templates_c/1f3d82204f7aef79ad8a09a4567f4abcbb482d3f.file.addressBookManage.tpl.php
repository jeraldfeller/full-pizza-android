<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-09 11:00:03
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/addressBookManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131961812258c17c03df28c6-18453715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f3d82204f7aef79ad8a09a4567f4abcbb482d3f' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/addressBookManage.tpl',
      1 => 1466424140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131961812258c17c03df28c6-18453715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'totalRecords' => 0,
    'customerSearchList' => 0,
    'searchcuslist' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'fromRecords' => 0,
    'toRecords' => 0,
    'limit' => 0,
    'pagination' => 0,
    'VIEWABLE' => 0,
    'addressBook_list' => 0,
    'trvar' => 0,
    'filename' => 0,
    'customer_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c17c05503410_42710315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c17c05503410_42710315')) {function content_58c17c05503410_42710315($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="row">
<div class="heading">Customer </div>
<div class="adminRight">
<div class="adminTopHead">Manage Customer AddressBook</div>

		
		<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>
		<!-- Sort By -->
		<div class="manageButtonLeft marginBot">	
			<form name="addressBookmanage" method="post" action="addressBookManage.php" >
			<select class="restManageNameDrop" name="searchbookcustomerid" id="searchbookcustomer" onchange="document.addressBookmanage.submit();">
				<option value="">Select Customer Name</option>
				<?php  $_smarty_tpl->tpl_vars['searchcuslist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['searchcuslist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customerSearchList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['searchcuslist']->key => $_smarty_tpl->tpl_vars['searchcuslist']->value) {
$_smarty_tpl->tpl_vars['searchcuslist']->_loop = true;
echo $_REQUEST['cusmid'];?>

				<option value="<?php echo $_smarty_tpl->tpl_vars['searchcuslist']->value['customer_id'];?>
" <?php if ($_REQUEST['cusmid']==$_smarty_tpl->tpl_vars['searchcuslist']->value['customer_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['searchcuslist']->value['customer_name']);?>
- <?php echo $_smarty_tpl->tpl_vars['searchcuslist']->value['customer_email'];?>
</option>
				<?php } ?>
			</select>
			<div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="restManageNameDrop" name="sortby" id="sortby" size="1" onchange="document.addressBookmanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="atasc" <?php if ($_REQUEST['sortby']=='atasc') {?>selected="selected"<?php }?>>Address Title A to Z</option>
					<option value="atdesc" <?php if ($_REQUEST['sortby']=='atdesc') {?>selected="selected"<?php }?>>Address Title Z to A</option>
					
					<option value="cnasc" <?php if ($_REQUEST['sortby']=='cnasc') {?>selected="selected"<?php }?>>Customer Name A to Z</option>
					<option value="cndesc" <?php if ($_REQUEST['sortby']=='cndesc') {?>selected="selected"<?php }?>>Customer Name Z to A</option>
					
					<option value="pasc" <?php if ($_REQUEST['sortby']=='pasc') {?>selected="selected"<?php }?>>Phone Number 0 to 9</option>
					<option value="pdesc" <?php if ($_REQUEST['sortby']=='pdesc') {?>selected="selected"<?php }?>>Phone Number 9 to 0</option>
					
					
				</optgroup>				
			</select>
		</div>
			</form>
		</div>
		<?php }?>
		<div class="col-sm-12">
		<!--Button Left start-->
		<div  class="manageButtonLeft">
			<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" action="addressBookManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Address title/Customer email"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-primary">
					<input type="button" name="clear" value="Clear" class="btn btn-sm btn-primary" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			<!--Export-->
			<!--<div  class="filterbutton" onclick="return exportOptShowHide();">Export<img src="images/icon_plus.png" alt="Export" title="Export" /></div>
			<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
				<form name="exportform" method="post" onsubmit="return exportValidation();">
					<input type="hidden" name="action"  value="exportProcess" />
							
					<select name="exportfile" id="exportfile">				 	 
						<option value="CSV">CSV</option>
						<option value="Excel">Excel</option>	
					</select>
					<input type="submit" name="export" value="Export" class="buttonFilter" />	
				</form>				 
			</div>-->
			<?php }?>
			<!--Import-->
			<!--<div  class="filterbutton" onclick="return importOptShowHide();">Import<img src="images/icon_plus.png" alt="Import" title="Import" /></div>
			<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
				<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
					<input type="hidden" name="action" value="importProcess" />	
					
					 <input type="file" name="importfile" id="importfile" />
					 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
					 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
					 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
							 
				</form>
			 </div>-->
             
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<!--<a class="manageButton_addnw " href="addressBookAddEdit.php?<?php if ($_GET['cusmid']!='') {?>cusmid=<?php echo $_GET['cusmid'];
}?>">Add New</a>-->
			<a class="btn btn-primary btn-sm " href="addressBookAddEdit.php<?php if ($_REQUEST['searchbookcustomerid']!='') {?>?searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['searchbookcustomerid']!='') {?>?searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}?>"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn btn-primary btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
			<input type="button" class="btn btn-primary btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
			<input type="button" class="btn btn-primary btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','customer');" />
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-sm btn-primary" id="back" onclick="return backToContent();"/>
             <?php }?>
            <?php if ($_REQUEST['cusmid']!='') {?>
                <input type="button" name="back" value="Back" class="btn btn-sm btn-primary" id="back" onclick="return backToOldContent();"/>
            <?php }?>
		</div>
		<!--Button List End-->
	</div>
		<!--Pagination Start-->
		<div class="pageCont">
			<ul class="page">
				<li><?php echo $_smarty_tpl->tpl_vars['fromRecords']->value;?>
 to <?php echo $_smarty_tpl->tpl_vars['toRecords']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['totalRecords']->value;?>
</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'<?php echo $_GET['keyword'];?>
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
				</li>
				<li class="pages"> per page</li>	
			</ul>
			<!--Error Msg-->
			<span id="errormsg"></span>
			<!--Page Navigation-->
			<div class="paginationCont">
				<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

			</div>
		</div>
		<!--Pagination End-->
		<!--List Start-->
		<div class="tableListContainer ">
			<table class="manageAddBook" width="100%" border="0" class="tableListContent">
				<tr class="listHeader">
					<td align="center" width="3%"  class="listHeaderCont"><div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div></td>
					<td align="center" width="3%"  class="listHeaderCont">S.No</td>
				
					<td align="left" width="8%" class="listHeaderCont txtindent">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='atdesc') {?>onclick="sortByAscDesc('atasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='atasc') {?>onclick="sortByAscDesc('atdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('atdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Address Title<?php if ($_REQUEST['sortby']=='atdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='atasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</td>
				
					<td a width="10%" align="left" class="listHeaderCont txtindent">Customer Name
						
					</td>
                    <!--<td width="15%" align="left" class="listHeaderCont">Lastname</td>-->
					<td  width="25%" align="left" class="listHeaderCont">Address</td>
					<td align="center" width="13%"  class="listHeaderCont">Added Date</td>
					<td align="center" width="5%" class="listHeaderCont">Status</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" width="10%" class="listHeaderCont">Action</td>
                    <?php }?>
				</tr>
                
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['book'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['book']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['name'] = 'book';
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['addressBook_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['book']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['book']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['book']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['book']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['book']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['book']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['book']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['book']['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['book']['rownum'], null, 0);?>
				<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?>  id="deletecate<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];?>
">
					<td align="center" class="listCont">
                        <div class="checkbox checkbox-primary no-margin">
                        <input type="checkbox" class="case" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['book']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];?>
" onclick="individualSelect();" />
                        <label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['book']['rownum'];?>
"></label>
                        </div>
                    </td>
					<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['sno'];?>
</td>
					<td align="center" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_address_title']);?>
</td>
					<td align="center" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_first_name']);?>
&nbsp;<?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_last_name']);?>
</td>
                    <!--<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_lastname']);?>
</td>-->
					<td align="center" class="listCont"><?php if ($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_apartment_name']!='') {
echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_apartment_name'];?>
, <?php }
if ($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_landmark']!='') {
echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_landmark'];?>
, <?php }
echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_street'];?>
, <?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['cityname'];?>
, <?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['statename'];?>
-<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['customer_zip'];?>
</td>
					<td align="center" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['added_date'],"%m - %d - %Y");?>
</td>
					<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } elseif ($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['status']=='2') {?>
						<img src="images/icon_pending.png" alt="Pending" title="Pending" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" class="listCont">
						<span class="EditDeleteButton">
							<a href="addressBookAddEdit.php?addid=<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];
if ($_GET['cusmid']!='') {?>&cusmid=<?php echo $_GET['cusmid'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}?>">
								<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
							</a>
						</span>
                        
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['addressBook_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['book']['index']]['id'];?>
','customer');" style="cursor:pointer;" />
						</span>
                        
					</td>
                    <?php }?>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="8" align="center" class="listCont">No record(s) found</td></tr>
				<?php endif; ?>
			</table>
		</div>
		<!--List End-->
		<!--Pagination start-->
		<div class="pageCont">
			<ul class="page">
				<li><?php echo $_smarty_tpl->tpl_vars['fromRecords']->value;?>
 to <?php echo $_smarty_tpl->tpl_vars['toRecords']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['totalRecords']->value;?>
</li>
				<li class="pages">Show</li>
				<li class="pages">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'<?php echo $_GET['keyword'];?>
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
				</li>
				<li class="pages"> per page</li>	
			</ul>
			<div class="paginationCont">
				<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

			</div>
		</div>
		<!--Pagination End-->
		<div class="clr"></div>
		<!--Button List start-->
		<div class="col-sm-12">
		<div class="manageButtonLastCont">
			<a class="btn btn-sm btn-primary " href="addressBookAddEdit.php<?php if ($_REQUEST['searchbookcustomerid']!='') {?>?searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
if ($_REQUEST['searchbookcustomerid']!='') {?>&searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}
} elseif ($_REQUEST['searchbookcustomerid']!='') {?>?searchbookcustomerid=<?php echo $_REQUEST['searchbookcustomerid'];
}?>"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn btn-sm btn-primary but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-primary but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-primary but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','customer');" />
		</div>
	</div>
		<!--Button List End-->
	
	</div>

</div><?php }} ?>
