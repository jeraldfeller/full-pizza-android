<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 18:35:32
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/voucherManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7123877115767ea1ced9510-25923225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1999c06215f2ee0e7531174661ae69fda2514041' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/voucherManage.tpl',
      1 => 1466424138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7123877115767ea1ced9510-25923225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'totalRecords' => 0,
    'active' => 0,
    'deactive' => 0,
    'limit' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'voucherList' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767ea1d286c98_19209075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767ea1d286c98_19209075')) {function content_5767ea1d286c98_19209075($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Voucher <?php if ($_GET['vid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Voucher <?php if ($_GET['vid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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
    			<span class="topName1">Total Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['totalRecords']->value;?>
</span>
    			<span class="topName1">Active Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['active']->value;?>
</span>
    			<span class="topName1">Deactive Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactive']->value;?>
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
    			<form name="restaurantoffermanage" method="post" action="voucherManage.php" >
                <input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
    		  <div class="pull-right">
    			<span class="restManageNameSort">Sort By</span>
    			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.restaurantoffermanage.submit();">
    				<option value="">Select</option>
    				<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
    				<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
    			</select>
            </div>
    			</form>
    		</div>
            <div class="col-sm-12 no-padding">
		<!--Button Left start-->
			<div  class="manageButtonLeft">	
				<!--Filter-->
				<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
                     <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
                </div>
                <div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
					<form name="filterform" method="post" action="voucherManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filter" />
						<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
						
						<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Voucher Code" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
					</form>	 
				</div>
                 
			</div>
			<!--Button Left End-->
            <!--Button Right start-->
    		<div class="manageButtonLastCont">
    			<?php if ($_GET['resid']) {?><a class="btn btn-info btn-sm" href="voucherManage.php<?php if ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
}?>">Back</a><?php }?>
    			
    			<a class="btn btn-default btn-sm" href="voucherAddEdit.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}?> <?php if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
} elseif ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>"><i class="fa fa-plus-circle"></i>  Add New</a>
    			
    			<input type="button"  class="btn btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
    			<input type="button" class="btn btn-primary btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
    			<input type="button" class="btn btn-info btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','restoffer');" />
                <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
                     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 <?php }?>
    		</div>
    		<!--Button List End-->
        </div>
        <span id="errormsg"></span>
           
            <!--List Start-->
    		<div class="tableListContainer table-container">
    			<table class="table table-bordered table-hover table-striped">
    				<tr>
    					<th width="5%">
                            <div class="checkbox checkbox-primary no-margin">
                                <input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
                                <label for="selectall"></label>
                            </div>
                        </th>
    					<th width="5%">S.No</th>
    					<th width="20%">Voucher Code</th>
    					<th width="10%">Type of use</th>
                        <th width="10%">Offer</th>
    					<th width="10%">Valid From</th>
    					<th width="8%">Valid To</th>
    					<th width="10%">Added Date</th>
    					<th width="5%">Status</th>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
    					<th width="10%">Action</th>
                        <?php }?>
    				</tr>									
    				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['voucherList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
    				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'], null, 0);?>
    				<tr id="deletecate<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
    					<td>
                            <div class="checkbox checkbox-primary no-margin">
                                <input type="checkbox" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" class="case" value="<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" onclick="individualSelect();" />
                                <label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
">&nbsp;</label>
                            </div>
                        </td>
    					<td><?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
    					<td><?php echo stripslashes($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['voucher_name']);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['use_type']=='S') {?>Single<?php } else { ?>Multiple<?php }?></td>
                        <td><?php if ($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['off_type']=='Price') {?>Price(<?php echo stripslashes($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['off_price_percentage']);?>
)<?php } elseif ($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['off_type']=='Percentage') {?>Percentage(<?php echo stripslashes($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['off_price_percentage']);?>
 %)<?php }?></td>
    					
    					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['valid_from'],"%d-%m-%Y");?>
</td>
    					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['valid_to'],"%d-%m-%Y");?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addeddate'],"%d-%m-%Y %H:%M");?>
</td>
    					<td id="chgstatus<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
    						<?php if ($_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='1') {?>
    						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
    						<?php } else { ?>
    						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
    						<?php }?>
    					</td>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
    					<td>
    						<span class="EditDeleteButton">
    							<a href="voucherAddEdit.php?vid=<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
}
if ($_REQUEST['page']) {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']) {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']) {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']) {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>"  class="btn btn-light btn-icon btn-sm">
    								<i class="fa fa-pencil"></i>
    							</a>
    						</span>
    						<span class="EditDeleteButton">
                                <a href="javascript:;"  class="btn btn-light btn-icon btn-sm" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['voucherList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','restoffer');" >
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

 <?php }} ?>
