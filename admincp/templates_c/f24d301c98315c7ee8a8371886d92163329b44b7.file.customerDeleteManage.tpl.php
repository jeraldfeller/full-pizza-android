<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-14 15:54:28
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/customerDeleteManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154008472557d9b90427bed6-34167386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f24d301c98315c7ee8a8371886d92163329b44b7' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/customerDeleteManage.tpl',
      1 => 1466424115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154008472557d9b90427bed6-34167386',
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
    'customer_list' => 0,
    'trvar' => 0,
    'stateName_list' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d9b904960031_98791930',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d9b904960031_98791930')) {function content_57d9b904960031_98791930($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Deleted Customer</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Deleted Customer</li>
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
			<form name="customermanage" method="post" action="customerDeleteManage.php" />
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
			<div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.customermanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="nasc" <?php if ($_REQUEST['sortby']=='nasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Customer Name A to Z</option>
					<option value="ndesc" <?php if ($_REQUEST['sortby']=='ndesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Customer Name Z to A</option>
					
					
					
					<option value="pasc" <?php if ($_REQUEST['sortby']=='pasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Phone Number 0 to 9</option>
					<option value="pdesc" <?php if ($_REQUEST['sortby']=='pdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Phone Number 9 to 0</option>
					
					
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
				<form name="filterform" method="post" action="customerDeleteManage.php" onsubmit="return filterValidation();" >
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
				
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Name/Phone/Zipcode">
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			<!--Export-->
			
			<?php }?>
			<!--Import-->
			
             
		</div>
        <div class="col-sm-5">
        	<span id="errormsg"></span>
        </div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			
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
');" />
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
    			 <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
            <?php }?>
		</div>
		<!--Button List End-->
        </div>
		
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered">
				<tr class="">
					<th width="3%" align="center" class="">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="5%" align="center" class="">S.No</th>
				
					<th width="12%" align="left" class="">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='ndesc') {?>onclick="sortByAscDesc('nasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='nasc') {?>onclick="sortByAscDesc('ndesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('ndesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Customer Name<?php if ($_REQUEST['sortby']=='ndesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='nasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
				
					
					
					<th width="10%" align="left" class=" ">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='pdesc') {?>onclick="sortByAscDesc('pasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='pasc') {?>onclick="sortByAscDesc('pdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('pdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Phone<?php if ($_REQUEST['sortby']=='pdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='pasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
				
					<th width="10%" align="left" class=" ">Zipcode
						
					</th>
					<th width="12%" align="center" class="">Option</th>
					<th width="10%" align="center" class="">Added Date</th>
					<th width="5%" align="center" class="">Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%" align="center" class="">Action</th>
                    <?php }?>
				</tr>
                
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['customer'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['name'] = 'customer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customer_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['customer']['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['customer']['rownum'], null, 0);?>
				<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?> id="deletecate<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
">
					<td align="center" class="listCont">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['customer']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['customer']['rownum'];?>
"></label>
						</div>
					</td>
					<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['sno'];?>
</td>
					<!--<td align="left" class="listCont"><a href="zipcodeManage.php?sc=<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode']);?>
</a></td>-->
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_name']);?>
</td>
					
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_phone']);?>
</td>
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_zip']);?>
</td>
					<td align="center" class="listCont"><a href="addressBookManage.php?cusmid=<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
">Address Book</a></td>
					<td align="center" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['addeddate'],"%d - %m - %Y");?>
</td>
					<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
');" style="cursor:pointer;" />
						<?php } elseif ($_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['status']=='2') {?>
						<img src="images/icon_pending.png" alt="Pending" title="Pending" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" class="">
						
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light" onclick="return restoreProcess('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
','customer');"  >
								<i class="fa fa-recycle"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['customer_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer']['index']]['customer_id'];?>
');" >
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
