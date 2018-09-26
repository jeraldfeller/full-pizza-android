<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:00:10
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/zipcodeManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9332537655768c2d2103538-37552570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4d27c7c615a8cf2ae10afcaf9bea060e940a771' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/zipcodeManage.tpl',
      1 => 1466424136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9332537655768c2d2103538-37552570',
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
    'zipcode_list' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768c2d289b229_50577832',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768c2d289b229_50577832')) {function content_5768c2d289b229_50577832($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Postcode</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Postcode</li>
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
			<form name="zipcodemanage" method="post" action="zipcodeManage.php" >
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.zipcodemanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
				
					<option value="zasc" <?php if ($_REQUEST['sortby']=='zasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Zip Code 1 to 9</option>
					<option value="zdesc" <?php if ($_REQUEST['sortby']=='zdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Zip Code 9 to 1</option>
				
					<option value="sasc" <?php if ($_REQUEST['sortby']=='sasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Code A to Z</option>
					<option value="sdesc" <?php if ($_REQUEST['sortby']=='sdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Code Z to A</option>
					
					<option value="aasc" <?php if ($_REQUEST['sortby']=='aasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Area Name A to Z</option>
					<option value="adesc" <?php if ($_REQUEST['sortby']=='adesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Area Name Z to A</option>
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
				<form name="filterform" method="post" action="zipcodeManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Area Name" />
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
				</form>	 
			</div>
			<!--Export-->
			
			<?php }?>
			<!--Import-->
			
             
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<a class="btn btn-default btn-sm " href="zipcodeAddEdit.php<?php if ($_GET['sc']!='') {?>?sc=<?php echo $_GET['sc'];
}
if ($_GET['cid']!='') {?>&cid=<?php echo $_GET['cid'];
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
','zipcode');" />
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
             <?php }?>
		</div>
		<!--Button List End-->
        </div>
        <span id="errormsg"></span>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-bordered table-hover table-striped">
				<tr >
					<th width="3%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="7%" >S.No</th>
					<th width="15%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='zdesc') {?>onclick="sortByAscDesc('zasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='zasc') {?>onclick="sortByAscDesc('zdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('zdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Zipcode<?php if ($_REQUEST['sortby']=='zdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='zasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="15%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='sdesc') {?>onclick="sortByAscDesc('sasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='sasc') {?>onclick="sortByAscDesc('sdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('sdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>State Code<?php if ($_REQUEST['sortby']=='sdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='sasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>				
					<th width="25%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='adesc') {?>onclick="sortByAscDesc('aasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='aasc') {?>onclick="sortByAscDesc('adesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('adesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Area Name<?php if ($_REQUEST['sortby']=='adesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='aasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="15%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='idesc') {?>onclick="sortByAscDesc('iasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('idesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Zipcode Id<?php if ($_REQUEST['sortby']=='idesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='iasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="15%">Added Date</th>
					<th width="5%">Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%" >Action</th>
                    <?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['name'] = 'zip';
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['zipcode_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['zip']['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['zip']['rownum'], null, 0);?>
				<tr  id="deletecate<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
">
					<td >
						
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['zip']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['zip']['rownum'];?>
"></label>
						</div>
					</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['sno'];?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode']);?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['statecode']);?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['areaname']);?>
</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
</td>
					<td ><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['addeddate'],"%d - %m - %Y");?>
</td>
					<td  id="chgstatus<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td >
						<span class="EditDeleteButton">
							<a href="zipcodeAddEdit.php?zipid=<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];
if ($_GET['sc']!='') {?>&sc=<?php echo $_GET['sc'];
}
if ($_GET['cid']!='') {?>&cid=<?php echo $_GET['cid'];
}?>" class="btn btn-light btn-icon btn-sm" >
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['zipcode_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zip']['index']]['zipcode_id'];?>
','zipcode');" style="cursor:pointer;" />
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
