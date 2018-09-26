<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-26 15:09:51
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/faqManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16391737305900fe8f0e4fb5-48518001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac7e755c35c4b68310cd2863d6fa8d6648342415' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/faqManage.tpl',
      1 => 1466424117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16391737305900fe8f0e4fb5-48518001',
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
    'faqManageList' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5900fe8f44b882_80441415',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5900fe8f44b882_80441415')) {function content_5900fe8f44b882_80441415($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Faq</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Faq</li>
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
			<form name="faqmanage" method="post" action="faqManage.php" >
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.faqmanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="qasc" <?php if ($_REQUEST['sortby']=='qasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Question A to Z</option>
					<option value="qdesc" <?php if ($_REQUEST['sortby']=='qdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Question Z to A</option>
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
				<form name="filterform" method="post" action="faqManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
					<input type="text" name="keyword" id="keyword" value="" class="textboxFilter" placeholder="Question" />
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-default">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			
			<?php }?>
			<!--Import-->
			
            
		</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			 <span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<a class="btn btn-default btn-sm" href="faqAddEdit.php"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn btn-sm btn-info but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-info but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-info but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','faq');" />
             <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-sm btn-info" id="back" onclick="return backToContent();"/>
             <?php }?>
		</div>
		<!--Button List End-->
        </div>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-bordered table-hover table-striped">
				<tr class="">
					<th width="3%" >
						
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div></th>
					<th width="7%" >S.No</th>
					<th width="60%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='qdesc') {?>onclick="sortByAscDesc('qasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='qasc') {?>onclick="sortByAscDesc('qdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('qdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Question<?php if ($_REQUEST['sortby']=='qdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='qasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="15%" >Added Date</th>
					<th width="5%" >Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%" >Action</th>
                    <?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['name'] = 'maincat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['faqManageList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'], null, 0);?>
				<tr >
					<td>
						
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['faq_id'];?>
" onclick="individualSelect();" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
"></label>
						</div>
						
					</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['sno'];?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['question']);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['addeddate'];?>
</td>
					<td id="chgstatus<?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['faq_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['faq_status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['faq_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['faq_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td >
						<span class="EditDeleteButton">
							<a href="faqAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['faqManageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['faq_id'];?>
" class="btn btn-light btn-icon btn-sm" >
								<i class="fa fa-edit"></i>
							</a>
						</span>
						
					</td><?php }?>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="6" align="center" class="listCont">No record(s) found</td></tr>
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
<?php }} ?>
