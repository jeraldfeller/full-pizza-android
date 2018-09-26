<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 18:32:25
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/paymentInfoManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21462241255767e9613f5019-51026431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '357af8c2f6eb4b50704e93dba1a89d525ceced6e' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/paymentInfoManage.tpl',
      1 => 1466424133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21462241255767e9613f5019-51026431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'limit' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'paymentinfo_List' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767e961743471_01737750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767e961743471_01737750')) {function content_5767e961743471_01737750($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Payment Info</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Payment Info</li>
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
		
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="paymentinfo" method="post" action="paymentInfoManage.php" />
		<div class="pull-right">
            <span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.paymentinfo.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
			</select>
        </div>
			</form>
		</div>
		
		<!--Button Right start-->
        <div class="col-sm-12 no-padding">
		<div class="manageButtonLastCont">
			<!--<a class="manageButton_addnw" href="paymentInfoAddEdit.php">Add New</a>-->
			<input type="button"  class="btn btn-sm btn-default but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-inof but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
			<!--<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','cuisine');" />-->
		     <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
             <?php }?>
        </div>
        </div>
		<!--Button Right End-->
		
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
					<th width="30%" >Payment Name</th>
					<?php if ($_GET['resid']!='') {?>
					<th width="15%" >Payment Method</th>
					<?php }?>
					
                    <th width="5%" >Id</th>
					<?php if ($_GET['resid']=='') {?>
                    
					<th width="5%" >Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%" >Action</th>
                    <?php }?>
					<?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['name'] = "pay";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paymentinfo_List']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pay"]['total']);
?>
                
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['pay']['rownum'], null, 0);?>
				<tr >
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pay']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pay']['rownum'];?>
"></label>
						</div>
						</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['sno'];?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_name']);?>
</td>
					<?php if ($_GET['resid']!='') {?>
					<td >
						<?php if ($_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentmethod']=='Yes') {?>
						<img src="images/star_yellow.png" alt="Payment Select" title="Payment Select" onclick="return selectPaymentMethod('No','paymentmethod','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
','<?php echo $_GET['resid'];?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_status'];?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/star_grey.png" alt="Payment Delete" title="Payment Delete" onclick="return selectPaymentMethod('Yes','paymentmethod','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
','<?php echo $_GET['resid'];?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_status'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
					<?php }?>
					
                    <td ><?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
</td>
					<?php if ($_GET['resid']=='') {?>	
					<td  id="chgstatus<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
					<?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td >
						<span class="EditDeleteButton">
							<a href="paymentInfoAddEdit.php?payid=<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
" class="btn btn-light btn-icon btn-sm">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['paymentinfo_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pay']['index']]['paymentinfo_id'];?>
','cuisine');" style="cursor:pointer;" />
						</span>
					</td>
                    <?php }?>
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
