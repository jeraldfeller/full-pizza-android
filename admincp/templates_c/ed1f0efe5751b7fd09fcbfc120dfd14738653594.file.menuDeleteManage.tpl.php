<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 19:47:11
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/menuDeleteManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40519854858002b0f591ba8-08288464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed1f0efe5751b7fd09fcbfc120dfd14738653594' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/menuDeleteManage.tpl',
      1 => 1466424139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40519854858002b0f591ba8-08288464',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'req_file_name' => 0,
    'tot_menu_rec' => 0,
    'active_menu_rec' => 0,
    'deactive_menu_rec' => 0,
    'popular_menu_rec' => 0,
    'normal_menu_rec' => 0,
    'veg_menu_rec' => 0,
    'nonveg_menu_rec' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'menu_list' => 0,
    'trvar' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58002b0fb9d0a5_29523893',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58002b0fb9d0a5_29523893')) {function content_58002b0fb9d0a5_29523893($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Deleted Menu <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Deleted Menu <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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

		<input type="hidden" name="filenameurl" id="filenameurl" value="<?php echo $_smarty_tpl->tpl_vars['req_file_name']->value;?>
" />
		
		<div  class="filterbutton">
			<span  class="topName1">Total Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['tot_menu_rec']->value;?>
</span>
			<span  class="topName1">Active Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['active_menu_rec']->value;?>
</span>
			<span  class="topName1">Deactive Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactive_menu_rec']->value;?>
</span>
			<span  class="topName1">Popular Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['popular_menu_rec']->value;?>
 </span>
            <span  class="topName1">Normal Records:</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['normal_menu_rec']->value;?>
</span>
			<span  class="topName1">Menu Type :</span> <span  class="topName1">Veg :</span><span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['veg_menu_rec']->value;?>
</span><span class="topName1">Non-veg :</span> <span  class="topName2"><?php echo $_smarty_tpl->tpl_vars['nonveg_menu_rec']->value;?>
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
			<form name="menumanage" method="post" action="menuDeleteManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>" >
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
			<?php if (!$_GET['resid']) {?>
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.menumanage.submit();">
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
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.menumanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Dish">
					<option value="popular" <?php if ($_REQUEST['sortby']=='pop') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Popular</option>
					<option value="normal" <?php if ($_REQUEST['sortby']=='nor') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Normal</option>
				</optgroup>
				<optgroup label="Menu Type">
					<option value="veg" <?php if ($_REQUEST['sortby']=='veg') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Veg</option>
					<option value="nonveg" <?php if ($_REQUEST['sortby']=='nonveg') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Non Veg</option>
				</optgroup>
				<optgroup label="Others">
					<option value="masc" <?php if ($_REQUEST['sortby']=='masc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Menu Name A to Z</option>
					<option value="mdesc" <?php if ($_REQUEST['sortby']=='mdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Menu Name Z to A</option>
					<option value="casc" <?php if ($_REQUEST['sortby']=='casc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Category Name A to Z</option>
					<option value="cdesc" <?php if ($_REQUEST['sortby']=='cdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Category Name Z to A</option>
					<?php if (!$_GET['resid']) {?>
					<option value="resasc" <?php if ($_REQUEST['sortby']=='resasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" <?php if ($_REQUEST['sortby']=='resdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name Z to A</option>
					<?php }?>
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
				<form name="filterform" method="post" onsubmit="return filterValidation();" action="menuDeleteManage.php<?php if ($_REQUEST['resid']!='') {?>?resid=<?php echo $_REQUEST['resid'];
}?>">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Menu Name/Restaurant Name"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm" />
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
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
			<?php if ($_GET['resid']) {?><a class="manageButton_addnw" href="restaurantManage.php">Back</a><?php }?>
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
             <?php }?>
			
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
			<input type="button" class="btn btn-sm btn-danger but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" />
			<input type="button" class="btn btn-sm btn-danger but_delete" value="Popular" style="display:none;" onclick="adminActivateDeactivate('Yes','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" />
			<input type="button" class="btn btn-sm btn-danger but_delete" value="Normal" style="display:none;" onclick="adminActivateDeactivate('No','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" />
		</div>
		<!--Button Right End-->
		</div>
		
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered" id="table_menu">
				<tr class="">
					<th width="3%" align="center" class="">
					<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%" align="center" class="">S.No</th>
					<th width="<?php if (!$_GET['resid']) {?>20%<?php } else { ?>20%<?php }?>" align="left" class="">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='mdesc') {?>onclick="sortByAscDesc('masc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='masc') {?>onclick="sortByAscDesc('mdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('mdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Menu Name<?php if ($_REQUEST['sortby']=='mdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='masc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="8%" align="left" class=" ">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='tdesc') {?>onclick="sortByAscDesc('tasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='tasc') {?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Type<?php if ($_REQUEST['sortby']=='tdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='tasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="10%" align="left" class=" ">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Category<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<?php if (!$_GET['resid']) {?>
					<th width="20%" align="left" class=" ">
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
                    <?php if ($_GET['catid']) {?>
                    <th width="6%" align="center" class="">Sort Order</th>
                    <?php }?>
					
					<th width="10%" align="center" class="">Added Date</th>
					<th width="5%" align="center" class="">Popular</th>
					<th width="5%" align="center" class="">Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="10%" align="center" class="">Action</th>
                    <?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['name'] = "list";
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
				
                <tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
					<td align="center" class="">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
						</div>
					</td>
					<td align="center" class=""><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_name']);?>
</td>
					<td align="left" class="listCont txtindent"><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_type']=='veg') {?>Veg<?php } elseif ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_type']=='nonveg') {?>Non Veg<?php } else { ?>-<?php }?></td>
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_catname']);?>
</td>
					<?php if (!$_GET['resid']) {?>
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_restname']);?>
</td>
					<?php }?>
                    <?php if ($_GET['catid']) {?>
                    <td align="center" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sortorder']);?>
</td>
                    <?php }?>
						
					<td align="center" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['addeddate'],"%d - %m - %Y");?>
</td>
					<td align="center" class="listCont">
						<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_popular_dish']=='Yes') {?>
						<img src="images/star_yellow.png" alt="Popular" title="Popular" onclick="return changeStatus('No','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/star_grey.png" alt="Normal" title="Normal" onclick="return changeStatus('Yes','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
					<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
');" style="cursor:pointer;" />
						<?php } elseif ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='0') {?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" class="listCont">
						
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light" onclick="return restoreProcess('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
','delete_menu');"   >
								<i class="fa fa-recycle"></i>
							</a>
							
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon"onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
');" >
								<i class="fa fa-close"></i>
							</a>
						</span>
					</td>
                    <?php }?>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="11" align="center" class="listCont">No record(s) found</td></tr>
				<?php endif; ?>
			</table>
		</div>
		<!--List End-->
		<!--Pagination start-->
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
