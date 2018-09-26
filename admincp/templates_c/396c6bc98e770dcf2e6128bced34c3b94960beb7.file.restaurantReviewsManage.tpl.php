<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-31 10:29:31
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantReviewsManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191185176558de75db2808e4-07109279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '396c6bc98e770dcf2e6128bced34c3b94960beb7' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantReviewsManage.tpl',
      1 => 1466424121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191185176558de75db2808e4-07109279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'reviewsCnt' => 0,
    'activerec' => 0,
    'deactiverec' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'review_list' => 0,
    'filename' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58de75db8a01d7_45612168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58de75db8a01d7_45612168')) {function content_58de75db8a01d7_45612168($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Reviews <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Reviews <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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
			<span class="topName1">Total Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['reviewsCnt']->value;?>
</span>
			<span class="topName1">Active Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['activerec']->value;?>
</span>
			<span class="topName1">Deactive Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactiverec']->value;?>
</span>
		</div>
		<!-- Sort By -->
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
		<div class="col-sm-7 no-padding">	
			<form name="reviewmanage" method="post" action="restaurantReviewsManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>" />
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
			<?php if (!$_GET['resid']) {?>
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.reviewmanage.submit();">
				<option value="">Select Restaurant Name</option>
				<?php  $_smarty_tpl->tpl_vars['searchreslist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['searchreslist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['restaurantSearchList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['searchreslist']->key => $_smarty_tpl->tpl_vars['searchreslist']->value) {
$_smarty_tpl->tpl_vars['searchreslist']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['searchreslist']->value['restaurant_id'];?>
" <?php if ($_REQUEST['searchrestaurantid']==$_smarty_tpl->tpl_vars['searchreslist']->value['restaurant_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['searchreslist']->value['restaurant_name']);?>
</option>
				<?php } ?>
			</select>
			<?php }?>
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker"  name="sortby" id="sortby" size="1" onchange="document.reviewmanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="casc" <?php if ($_REQUEST['sortby']=='casc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Customer Name A to Z</option>
					<option value="cdesc" <?php if ($_REQUEST['sortby']=='cdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Customer Name Z to A</option>
					<?php if (!$_GET['resid']) {?>
					<option value="resasc" <?php if ($_REQUEST['sortby']=='resasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" <?php if ($_REQUEST['sortby']=='resdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name Z to A</option>
					<?php }?>
					
					<option value="tasc" <?php if ($_REQUEST['sortby']=='rasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Rating 0 to 9</option>
					<option value="tdesc" <?php if ($_REQUEST['sortby']=='rdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Rating 9 to 0</option>
				</optgroup>				
			</select>
            </div>
			</form>
		</div>
		
		<div class="col-sm-12 no-padding">
		<!--Button Left start-->
		<div class="manageButtonLeft">
			<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>	
			<!--Filter-->
	       <div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
    			 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
    		</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" action="restaurantReviewsManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
					
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Customer/Restaurant Name" />
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-default">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			
			<?php }?>
			
             
		</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<!--<?php if ($_GET['resid']) {?><a class="manageButton_addnw" href="restaurantOrderManage.php">Back</a><?php }?>-->
			<!--<a class="manageButton_addnw" href="menuAddEdit.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>">Add New</a>-->
			<input type="button"  class="btn btn-default btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
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
');" />
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
             <?php }?>
			</div>
		<!--Button Right End-->
		</div>
		
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th width="5%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="5%">S.No</th>
					<th width="<?php if (!$_GET['resid']) {?>15%<?php } else { ?>15%<?php }?>" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Customer Name<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
					<?php if (!$_GET['resid']) {?>
					<th width="15%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='resdesc') {?>onclick="sortByAscDesc('resasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='resasc') {?>onclick="sortByAscDesc('resdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('resdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Restaurant<?php if ($_REQUEST['sortby']=='resdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='resasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<?php }?>
					<th width="15%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='rdesc') {?>onclick="sortByAscDesc('rasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='rasc') {?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Rating<?php if ($_REQUEST['sortby']=='rdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='rasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
					<!--<td width="25%" align="center" class="listHeaderCont">Rating</td>-->
					<th width="20%" >Message</th>
                    <th width="5%" >Id</th>
					<th width="10%" >Added Date</th>
					<th width="5%" >Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="5%" >Action</th>
                    <?php }?>
				</tr>
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['name'] = "list";
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['review_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'], null, 0);?>
				<tr id="deletecate<?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
						</div>
					</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customer_name']);?>
</td>
					<?php if (!$_GET['resid']) {?>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_name']);?>
</td>
					<?php }?>
					
					<td >
						<?php if ($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating']=='1') {?> <img alt="1" title="" src="images/single-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating']=='2') {?> <img alt="2" title="" src="images/double-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating']=='3') {?> <img alt="3" title="" src="images/triple-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating']=='4') {?> <img alt="4" title="" src="images/four-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating']=='5') {?> <img alt="5" title="" src="images/five-star.png" /> 
						<?php }?>
					</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['message']);?>
</td>
                    <td ><?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
</td>
					<td ><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addeddate'],"%d - %m - %Y");?>
</td>
					<td id="chgstatus<?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" class="listCont">
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['review_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rating_id'];?>
','restreviews');" style="cursor:pointer;" />
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

<?php }} ?>
