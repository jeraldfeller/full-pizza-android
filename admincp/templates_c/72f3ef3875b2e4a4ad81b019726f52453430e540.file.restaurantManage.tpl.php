<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:41:47
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:384410135807a24b5e9237-27833029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72f3ef3875b2e4a4ad81b019726f52453430e540' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantManage.tpl',
      1 => 1466424132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '384410135807a24b5e9237-27833029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fbapps_message' => 0,
    'searchrestaurantid' => 0,
    'tot_res' => 0,
    'active_res' => 0,
    'deactive_res' => 0,
    'pending_res' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'restaurant_list' => 0,
    'filename' => 0,
    'SITE_FB_MENU_APPSID' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a25dc5d6b2_50979424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a25dc5d6b2_50979424')) {function content_5807a25dc5d6b2_50979424($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Restaurant</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Restaurant</li>
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

		
        <?php if ($_smarty_tpl->tpl_vars['fbapps_message']->value=='success') {?>
        	<div style="color:green;">This Restaurant has been added to your facebook page.</div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['fbapps_message']->value=='error') {?>
        	<div style="color:red;">Sorry unknown error.</div>
        <?php }?>
        
		<?php if ($_smarty_tpl->tpl_vars['searchrestaurantid']->value=='') {?>
		<div  class="filterbutton">
			<span class="topName1">Total Restaurant:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['tot_res']->value;?>
</span>
			<span class="topName1">Active Restaurant:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['active_res']->value;?>
</span>
			<span class="topName1">Deactive Restaurant:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactive_res']->value;?>
</span>
			<span class="topName1">Pending Restaurant :</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['pending_res']->value;?>
</span>
		</div>
		<?php }?>
		
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
			<form name="restaurantmanage" method="post" action="restaurantManage.php">
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.restaurantmanage.submit();">
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
            <div class="pull-right">
			<span class="restManageNameSort">Sort By</span>
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.restaurantmanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
					<option value="pending" <?php if ($_REQUEST['sortby']=='pending') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Pending Activation</option>
				</optgroup>
				<optgroup label="Others">
					<option value="rasc" <?php if ($_REQUEST['sortby']=='rasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="rdesc" <?php if ($_REQUEST['sortby']=='rdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name Z to A</option>
					
					<option value="stateasc" <?php if ($_REQUEST['sortby']=='stateasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Name A to Z</option>
					<option value="statedesc" <?php if ($_REQUEST['sortby']=='statedesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;State Name Z to A</option>
					
					<option value="cityasc" <?php if ($_REQUEST['sortby']=='cityasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;City Name A to Z</option>
					<option value="citydesc" <?php if ($_REQUEST['sortby']=='citydesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;City Name Z to A</option>
					
					
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
				<form name="filterform" method="post" action="restaurantManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
					
					
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Restaurant Name / City / Email / Zipcode" />
					<input type="submit" name="filter" value="Filter" class="btn btn-sm btn-default" />
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
				</form>	 
			</div>
			
			 <?php }?>
             
		</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			<span id="errormsg"></span>
		</div>
		<!--Button List start-->
		<div class="manageButtonLastCont">
			<a class="btn btn-default btn-sm" href="restaurantAddEdit.php<?php if ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
} else { ?>?page=1<?php }
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>"><i class="fa fa-plus-circle"></i> Add New</a>
			<input type="button"  class="btn  btn-info btn-sm but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
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
','restaurant');" />
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-sm btn-info" id="back" onclick="return backToContent();"/>
             <?php }?>
		</div>
		<!--Button List End-->
		</div>
		
		
		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th width="2%">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="2%">S.No</th>
					<th width="10%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='rdesc') {?>onclick="sortByAscDesc('rasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Restaurant Name<?php if ($_REQUEST['sortby']=='rdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='rasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
                    <th width="6%">Open/Close Status</th>
					<th width="8%">Phone No</th>
					
					<th width="8%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='citydesc') {?>onclick="sortByAscDesc('cityasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('citydesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>City<?php if ($_REQUEST['sortby']=='citydesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='cityasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
					<th width="5%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='idesc') {?>onclick="sortByAscDesc('iasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('idesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Id<?php if ($_REQUEST['sortby']=='idesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='iasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
				    <th width="5%">Feature</th>
					
					<th width="5%">Status</th>
					<th width="20%">Options</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%">Action</th>
                    <?php }?>
					<!-- <th>Plugin</th>
                    <th width="10%">FB Apps</th> -->
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['name'] = "list";
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurant_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
				<tr id="deletecate<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
">
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" class="case" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
" onclick="individualSelect();" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
						</div>
					</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_name']);?>
</td>
                    <td ><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['rest_status']);?>
</td>
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_phone']);?>
</td>
					
					<td ><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['cityname']);?>
</td>
					
					<td ><?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
</td>

					

					<td >
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_feature_status']=='Yes') {?>
							<img src="images/star_yellow.png" alt="Feature" title="Feature" onclick="return changeStatus('No','restaurant_feature_status','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
');" style="cursor:pointer;" />
						<?php } else { ?>
							<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','restaurant_feature_status','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
					
					
					<td >
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_status']=='2') {?>
						<img src="images/icon_pending.png" alt="Pending" title="Pending" onclick="return changeStatus('Pending','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
					<td >
						
						<a href="menuManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Menu</a>&nbsp;|
						<a href="categoryManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Category</a>&nbsp;|
						<a href="restaurantOfferManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Offer</a>&nbsp;|
						<a href="addonsManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Addons</a>&nbsp;|
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['reviewscnt']>0) {?>
						<a href="restaurantReviewsManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Reviews</a> |<?php }?>
						<a href="paymentInfoManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Payment Method</a> |
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['bookingcnt']>0) {?>
						<a href="restaurantBookingManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Bookings</a> |<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderscnt']>0) {?>
						<a href="restaurantOrderManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Order (<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderscnt'];?>
)</a>&nbsp; |<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['reportscnt']>0) {?>
						<a href="restaurantReportManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Report</a>&nbsp; |
						<a href="restaurantInvoiceManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Invoice</a>&nbsp; |<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['commorderscnt']>0) {?>
						<a href="commissionOrderManage.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Commission</a><?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td >
						
						<span class="EditDeleteButton">
							<a href="restaurantAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>" class="btn btn-icon btn-light">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
','restaurant');">
								<i class="fa fa-close"></i>
							</a>
						</span> 
					</td>
                    <?php }?>
                    <!-- <td><a class="btn btn-success btn-xs" data-target="#pluginmenuSite" data-toggle="modal" onclick="return restaurantPlugin('<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_seourl'];?>
');" >Click</a></td>
                     <td><a href="https://www.facebook.com/dialog/pagetab?app_id=<?php echo $_smarty_tpl->tpl_vars['SITE_FB_MENU_APPSID']->value;?>
&next=https://comeneat.com/v2/admincp/facebookApps.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurant_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];?>
" >Add Apps</a></td> -->
                     
					 
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="13" align="center" class="text-danger">No record(s) found</td></tr>
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
    
</div>

<!--Facebook Order start-->
<div id="fb-root"></div>

<!--Facebook Order end-->


<?php }} ?>
