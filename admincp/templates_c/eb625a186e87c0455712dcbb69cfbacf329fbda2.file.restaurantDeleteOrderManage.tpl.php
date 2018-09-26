<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-31 22:19:37
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantDeleteOrderManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23043868158df1c49efed08-34420079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb625a186e87c0455712dcbb69cfbacf329fbda2' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantDeleteOrderManage.tpl',
      1 => 1466424120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23043868158df1c49efed08-34420079',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'ordersList_orderCnt' => 0,
    'delivered_ord' => 0,
    'processing_ord' => 0,
    'pending_ord' => 0,
    'failed_ord' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'totalRecords' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'order_list' => 0,
    'trvar' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58df1c4a21f7b4_14602807',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58df1c4a21f7b4_14602807')) {function content_58df1c4a21f7b4_14602807($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Delete Order <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Delete Order <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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
			<span class="topName1">Total Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['ordersList_orderCnt']->value;?>
</span>
			<span class="topName1">Delivered Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['delivered_ord']->value;?>
</span>
			<span class="topName1">Processing Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['processing_ord']->value;?>
</span>
			<span class="topName1">Pending Records:</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['pending_ord']->value;?>
 </span>
			<span class="topName1">Failed Records :</span> <span class="topName2"><?php echo $_smarty_tpl->tpl_vars['failed_ord']->value;?>
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
			<form name="ordermanage" method="post" action="restaurantDeleteOrderManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}?>" >
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
			<?php if (!$_GET['resid']) {?>
			<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.ordermanage.submit();">
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
			<select class="selectpicker" name="sortby" id="sortby" size="1" onchange="document.ordermanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="pending" <?php if ($_REQUEST['sortby']=='pending') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Pending</option>
					<option value="processing" <?php if ($_REQUEST['sortby']=='processing') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Processing</option>
					<option value="completed" <?php if ($_REQUEST['sortby']=='completed') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Delivered</option>
					<option value="failed" <?php if ($_REQUEST['sortby']=='failed') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Failed</option>
				</optgroup>
				<optgroup label="Others">
					<option value="casc" <?php if ($_REQUEST['sortby']=='casc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Customer Name A to Z</option>
					<option value="cdesc" <?php if ($_REQUEST['sortby']=='cdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Customer Name Z to A</option>
					<?php if (!$_GET['resid']) {?>
					<option value="resasc" <?php if ($_REQUEST['sortby']=='resasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name A to Z</option>
					<option value="resdesc" <?php if ($_REQUEST['sortby']=='resdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Restaurant Name Z to A</option>
					<?php }?>
					<option value="easc" <?php if ($_REQUEST['sortby']=='easc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Email A to Z</option>
					<option value="edesc" <?php if ($_REQUEST['sortby']=='edesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Email Z to A</option>
					<option value="tasc" <?php if ($_REQUEST['sortby']=='tasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Total Price 0 to 9</option>
					<option value="tdesc" <?php if ($_REQUEST['sortby']=='tdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Total Price 9 to 0</option>
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
				<form name="filterform" method="post" action="restaurantDeleteOrderManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
					<input type="text" name="keyword" id="keyword" value="" class="textboxFilter" placeholder="Order Id/Restaurant Name"/>
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			
			<?php }?>
			
             
		</div>
        <div class="col-sm-5">
        	<span id="errormsg"></span>
        </div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			
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
');" />
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
    			<input type="button" name="back" value="Back" class="btn btn-info btn-sm" id="back" onclick="return backToContent();"/>
            <?php }?>
			</div>
		<!--Button Right End-->
		</div>
		
		<!--List Start-->
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-hover table-striped table-bordered">
				<tr class="">
					<th width="4%" class="" align="center">
					<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%" class="" align="center">S.No</th>
					<th width="8%" class="" align="center">Order No</th>
					
					<th width="<?php if (!$_GET['resid']) {?>8%<?php } else { ?>8%<?php }?>" align="left" class=" ">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Order Type<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
                    <th width="12%" class=" ">Order Date</th>                    
					<th width="10%" align="center" class="">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='tdesc') {?>onclick="sortByAscDesc('tasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='tasc') {?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Order Price<?php if ($_REQUEST['sortby']=='tdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='tasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="8%" class=" ">Phone</th>
					<?php if (!$_GET['resid']) {?>
					<th width="15%" align="left" class=" ">
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
					<th width="10%" align="center" class="">Status</th>
					<th width="8%" align="center" class="">Order At</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="7%" align="center" class="">Action</th>
                    <?php }?>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['name'] = "list";
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['order_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
				<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?> id="deletecate<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
">
					<td align="center" class="listCont">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
						</div>
					</td>
					<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['ordergenerateid'];?>
</td>
					<td align="left" class="listCont txtindent"><?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytype']=='delivery') {?>Delivery<?php } elseif ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytype']=='pickup') {?>Pickup<?php }?></td>
					
					<td align="left" class="listCont txtindent"><?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytype']=='delivery') {
echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverydate'];?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['foodassoonas']=='1') {?>ASAP<?php } else {
echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytime'];
}
} else { ?>--<?php }?></td>
					<!--<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customername']);?>
</td>
					<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customeremail']);?>
</td>-->
					<td align="center" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['ordertotalprice']);?>
</td>
					<td align="left" class="listCont txtindent"><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customercellphone'];?>
</td>
					<?php if (!$_GET['resid']) {?>
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_name']);?>
</td>
					<?php }?>
					
					<td>
					
						
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='processing'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='failed'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='completed') {?>
						<select class="orderSelect1new" name="changeorderstatus" >
						
							<option value="pending" selected="selected" >Pending</option>
						
						
							<option value="processing" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='processing') {?>selected="selected"<?php }?> onclick="return changeOrderStatus(this.value,'<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');">Accept</option>
							<option value="failed" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='failed') {?>selected="selected"<?php }?> onclick="document.getElementById('disclaimReason').style.display='block'">Disclaim</option>
							
						</select>
						<div id="disclaimReason" style="display:none">
							<span class="addPageRightFont">Reason<span class="color1">*</span></span>				
							<textarea  cols="5" rows="1" style="width:120px;" id="reason"></textarea>
							<input type="button" onclick="return changeOrderStatus('failed','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');" class="btn btn-default" style="margin-top:5px;" value="Submit">						
						</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='processing'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='failed'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='completed') {?>
						<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');">
						
							<option value="processing" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='processing') {?>selected="selected"<?php }?>>Processing</option>
							<option value="completed" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='completed') {?>selected="selected"<?php }?>>Delivered</option>
							
						</select>
						
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='completed') {?>
						Delivered
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='failed') {?>
						Failed
						<?php }?>
						
						
						
					</td>
					<td align="center" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderdate'],"%d - %m - %Y");?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td align="center" class="listCont">
						<a href="viewOrderDetails.php?oid=<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
}
if ($_GET['type']!='') {?>&type=<?php echo $_GET['type'];
}
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>&pagetype=orderdelete" style="cursor:pointer;">View
							<!--<img src="images/icon_edit.png" width="16" height="16" alt="View Order Details" title="View Order Details" />-->
						</a>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-icon btn-light"onclick="return restoreProcess('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
','order_delete');"   >
								<i class="fa fa-recycle"></i>
							</a>
						</span>
						<span class="EditDeleteButton">
							<a href="javascript:;" class="btn btn-light btn-icon" onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');" >
								<i class="fa fa-close"></i>
							</a>
						</span>
					</td>
                    <?php }?>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="13" align="center" class="listCont">No record(s) found</td></tr>
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
	  	<!--Button Right End-->
	</div>

</div><?php }} ?>
