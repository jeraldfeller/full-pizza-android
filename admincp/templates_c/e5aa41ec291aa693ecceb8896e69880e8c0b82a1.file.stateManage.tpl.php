<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 09:59:53
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/stateManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5039383165768c2c1f1c4c3-33471569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5aa41ec291aa693ecceb8896e69880e8c0b82a1' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/stateManage.tpl',
      1 => 1466424126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5039383165768c2c1f1c4c3-33471569',
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
    'stateName_list' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c2c2449670_35049266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c2c2449670_35049266')) {function content_5768c2c2449670_35049266($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage State</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage State</li>
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
			<form name="statemanage" method="post" action="stateManage.php" >
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.statemanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="sasc" <?php if ($_REQUEST['sortby']=='sasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Code A to Z</option>
					<option value="sdesc" <?php if ($_REQUEST['sortby']=='sdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Code Z to A</option>
					
					<option value="snasc" <?php if ($_REQUEST['sortby']=='snasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Name A to Z</option>
					<option value="sndesc" <?php if ($_REQUEST['sortby']=='sndesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Name Z to A</option>
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
				<form name="filterform" method="post" action="stateManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="text" name="keyword" id="keyword" placeholder="State Name"  value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter">
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-default">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			<!--Export-->
			
			<?php }?>
			<!--Import-->
			
            
		</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<a class="btn btn-default btn-sm" href="stateAddEdit.php"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
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
','state');" />
             <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
             <?php }?>
		</div>
		<!--Button List End-->
        </div>
		
		<!--List Start-->
		<div class="tableListContainer table-resonsive">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th width="3%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="7%" >S.No</th>
					<th width="10%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='sdesc') {?>onclick="sortByAscDesc('sasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='sasc') {?>onclick="sortByAscDesc('sdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('sdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>State Code<?php if ($_REQUEST['sortby']=='sdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='sasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="40%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='sndesc') {?>onclick="sortByAscDesc('snasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='snasc') {?>onclick="sortByAscDesc('sndesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('sndesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>State Name<?php if ($_REQUEST['sortby']=='sndesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='snasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="10%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='idesc') {?>onclick="sortByAscDesc('iasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('idesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>State Id<?php if ($_REQUEST['sortby']=='idesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='iasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="15%">Added Date</th>
					<th width="5%" >Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%">Action</th>
                    <?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["state"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['name'] = "state";
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['stateName_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["state"]['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['state']['rownum'], null, 0);?>
				<tr id="deletecate<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
">
					<td>
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['state']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['state']['rownum'];?>
"></label>
						</div>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['sno'];?>
</td>
					<td><a href="cityManage.php?sc=<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode']);?>
</a></td>
					<td ><a href="cityManage.php?sc=<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statecode'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['statename']);?>
</a></td>
					<td ><?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
</td>
					<td ><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['addeddate'],"%m - %d - %Y");?>
</td>
					<td id="chgstatus<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
');" style="cursor:pointer;" />
						
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td >
						<span class="EditDeleteButton">
							<a href="stateAddEdit.php?stateid=<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
" class="btn btn-light btn-icon">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['stateName_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['state']['index']]['state_id'];?>
','state');" style="cursor:pointer;" />
						</span>
					</td>
                    <?php }?>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="10" align="center" class="text-danger">No record(s) found</td></tr>
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
