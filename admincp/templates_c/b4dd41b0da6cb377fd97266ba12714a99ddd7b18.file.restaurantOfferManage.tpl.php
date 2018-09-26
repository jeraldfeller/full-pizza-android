<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-06 05:19:10
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantOfferManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146537190757ce04762104e5-39112247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4dd41b0da6cb377fd97266ba12714a99ddd7b18' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantOfferManage.tpl',
      1 => 1466424140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146537190757ce04762104e5-39112247',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'tot_offer_rec' => 0,
    'active_offer_rec' => 0,
    'deactive_offer_rec' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'restaurantOfferList' => 0,
    'trvar' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ce047689c501_55413045',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ce047689c501_55413045')) {function content_57ce047689c501_55413045($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Restaurant Offer <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Restaurant Offer <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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
			<span class="topName1">Total Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['tot_offer_rec']->value;?>
</span>
			<span class="topName1">Active Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['active_offer_rec']->value;?>
</span>
			<span class="topName1">Deactive Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['deactive_offer_rec']->value;?>
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
			<form name="restaurantoffermanage" method="post" action="restaurantOfferManage.php" />
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
			<?php if (!$_GET['resid']) {?>
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.restaurantoffermanage.submit();">
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
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.restaurantoffermanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				
				<optgroup label="Others">
					<?php if (!$_GET['resid']) {?>
					<option value="rasc" <?php if ($_REQUEST['sortby']=='rasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="rdesc" <?php if ($_REQUEST['sortby']=='rdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name Z to A</option>
					<?php }?>
					<option value="priceasc" <?php if ($_REQUEST['sortby']=='priceasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Offer Price 0 to 9</option>
					<option value="pricedesc" <?php if ($_REQUEST['sortby']=='pricedesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Offer Price 9 to 0</option>
					<option value="perasc" <?php if ($_REQUEST['sortby']=='perasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Offer Percentage 0 to 9</option>
					<option value="perdesc" <?php if ($_REQUEST['sortby']=='perdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Offer Percentage 9 to 0</option>
				</optgroup>
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
					<form name="filterform" method="post" action="restaurantOfferManage.php" onsubmit="return filterValidation();">
						<input type="hidden" name="action"  value="filter" />
						<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
						
						<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Offer Percentage/Price" />
						<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
						<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
					</form>	 
				</div>
				
                 
			</div>
		<!--Button Left End-->
		<div class="col-sm-5">
			 <span id="errormsg"></span>
		</div>
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			<?php if ($_GET['resid']) {?><a class="btn btn-info btn-sm" href="restaurantManage.php<?php if ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
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
			
			<a class="btn btn-default btn-sm" href="restaurantOfferAddEdit.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
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
			<input type="button" class="btn btn-info btn-sm but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
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
					<th width="5%" >S.No</th>
					<th width="<?php if (!$_GET['resid']) {?>10%<?php } else { ?>10%<?php }?>" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='perdesc') {?>onclick="sortByAscDesc('perasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='perasc') {?>onclick="sortByAscDesc('perdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('perdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Offer (%)<?php if ($_REQUEST['sortby']=='perdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='perasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="10%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='pricedesc') {?>onclick="sortByAscDesc('priceasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='priceasc') {?>onclick="sortByAscDesc('pricedesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('pricedesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Offer Price<?php if ($_REQUEST['sortby']=='pricedesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='priceasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="10%" >Offer From</th>
					<th width="10%" >Offer To</th>
					<?php if (!$_GET['resid']) {?>
					<th width="20%" ><a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='rdesc') {?>onclick="sortByAscDesc('rasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='rasc') {?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('rdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Restaurant<?php if ($_REQUEST['sortby']=='rdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='rasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<?php }?>
                    <th width="5%">Id</th>
					<th width="10%">Added Date</th>
					<th width="5%">Status</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="15%">Action</th>
                    <?php }?>
				</tr>									
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['name'] = "maincat";
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurantOfferList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["maincat"]['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'], null, 0);?>
				<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?> id="deletecate<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
">
					<td align="center" class="listCont">
					
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
"></label>
						</div>
					</td>
					<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['sno'];?>
</td>
					<td align="left" class="listCont"><?php echo sprintf("%.0f",stripslashes($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_percentage']));?>
</td>
					<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_price']);?>
</td>
					<td align="left" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_valid_from'],"%d-%m-%Y");?>
</td>
					<td align="left" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_valid_to'],"%d-%m-%Y");?>
</td>
					<?php if (!$_GET['resid']) {?>
					<td align="left" class="listCont"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_restname']));?>
</td>
					<?php }?>
                    <td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
</td>
					<td align="center" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['addeddate'],"%d-%m-%Y");?>
</td>
					<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['status']=='1') {?>
						<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
');" style="cursor:pointer;" />
						<?php } else { ?>
						<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
');" style="cursor:pointer;" />
						<?php }?>
					</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" class="">
						<span class="EditDeleteButton">
							<a href="restaurantOfferAddEdit.php?eid=<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];
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
}?>" class="btn btn-light btn-icon">
								<i class="fa fa-pencil"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['restaurantOfferList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['offer_id'];?>
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

<?php }} ?>
