<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-09 10:59:38
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/contentManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135884989458c17bea3dbd78-91926456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8fa74db46e08593345eb7aaa33e6ff083261e89' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/contentManage.tpl',
      1 => 1466424124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135884989458c17bea3dbd78-91926456',
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
    'content_List' => 0,
    'trvar' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c17bea6c88f4_61398309',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c17bea6c88f4_61398309')) {function content_58c17bea6c88f4_61398309($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Content</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Content</li>
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
				<form name="contentmanage" method="post" action="contentManage.php" />
				<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
                <div class="pull-right">
				<span class="restManageNameSort">Sort By</span>
				<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.contentmanage.submit();">
					<option value="">Select</option>
					<optgroup label="Status">
						<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
						<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
					</optgroup>
					<optgroup label="Others">
						<option value="tasc" <?php if ($_REQUEST['sortby']=='tasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Title Name A to Z</option>
						<option value="tdesc" <?php if ($_REQUEST['sortby']=='tdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Title Name Z to A</option>
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
					<form name="filterform" method="post" action="contentManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filterProcess" />
						<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
						
						<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Content Title" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
					</form>	 
				</div>
				
				<?php }?>
				
                
			</div>
            
			<!--Button Left End-->
			<!--Button Right start-->
			<div class="manageButtonLastCont">
				<a class="btn btn-default btn-sm" href="contentAddEdit.php"><i class="fa fa-plus-circle"></i> Add New</a>
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
','content');" />
                 <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
    			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
                 <?php }?>
			</div>
			<!--Button List End-->
            </div>
			<!--List Start-->
			<div class="tableListContainer">
				<table class="table table-hover table-bordered table-striped" id="table_content">
					<tr>
						<th width="3%" align="" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
								<label for="selectall"></label>
							</div>
						</th>
						<th width="7%" align="" class="">S.No</th>
						<th width="40%" align="" class="">
							<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='tdesc') {?>onclick="sortByAscDesc('tasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='tasc') {?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Title<?php if ($_REQUEST['sortby']=='tdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='tasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
							</a>
						</th>	
						<!--<td width="10%" align="left" class="listHeaderCont">Sort Order</td>	-->	
                        <th width="15%" align="" class="">Id</th>
						<th width="15%" align="" class="">Added Date</th>
						<th width="10%" align="" class="">Status</th>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
						<th width="10%" align="" class="">Action</th>
                        <?php }?>
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['content'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['content']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['name'] = 'content';
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['content_List']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['content']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['content']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['content']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['content']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['content']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['content']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['content']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['content']['total']);
?>
					<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['content']['rownum'], null, 0);?>
					<tr id="<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
" <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?>>
						<td align="" class="">
							<div class="checkbox checkbox-primary no-margin">
								<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['content']['rownum'];?>
" />
								<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['content']['rownum'];?>
"></label>
							</div>
						</td>
						<td align="" class=""><?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['sno'];?>
</td>
						<td align="" class=""><?php echo stripslashes($_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_title']);?>
</td>
                        <td align="" class=""><?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
</td>
						<!--<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['sortorder']);?>
</td>-->
						<td align="" class=""><?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['addeddate'];?>
</td>
						<td align="" class="" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['status']=='1') {?>
							<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
' ,'<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
							
							<?php } elseif ($_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['status']=='0') {?>
							<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
' ,'<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
							<?php }?>
						</td>
                        <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
						<td align="" class="">
							<span class="EditDeleteButton">
								<a href="contentAddEdit.php?conid=<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
" class="btn btn-light btn-icon btn-sm">
									<i class="fa fa-pencil"></i>
								</a>
							</span>
							<span class="EditDeleteButton">
								<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['content_List']->value[$_smarty_tpl->getVariable('smarty')->value['section']['content']['index']]['content_id'];?>
','content');" style="cursor:pointer;" />
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
			<!--Pagination End-->
			
		
	
</div>
</div><?php }} ?>
