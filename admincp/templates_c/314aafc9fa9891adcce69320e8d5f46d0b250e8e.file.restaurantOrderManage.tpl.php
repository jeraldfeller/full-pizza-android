<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-21 20:58:49
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantOrderManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17819510035806c330939bf1-45335824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314aafc9fa9891adcce69320e8d5f46d0b250e8e' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantOrderManage.tpl',
      1 => 1477101525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17819510035806c330939bf1-45335824',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806c332efb3a3_70777566',
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
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'VIEWABLE' => 0,
    'order_list' => 0,
    'fieldname' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806c332efb3a3_70777566')) {function content_5806c332efb3a3_70777566($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage <?php if ($_GET['type']=='CO') {?>Customer <?php } elseif ($_GET['type']=='GO') {?>Guest <?php }?> Order <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage <?php if ($_GET['type']=='CO') {?>Customer <?php } elseif ($_GET['type']=='GO') {?>Guest <?php }?> Order <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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
			<form name="ordermanage" method="post" action="restaurantOrderManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
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
				<form name="filterform" method="post" action="restaurantOrderManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
				
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Order Id/Restaurant Name" />
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm"/>
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
			
			<input type="button" class="btn btn-primary btn-sm but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','Order');" />
             <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-primary btn-sm" id="back" onclick="return backToContent();"/>
             <?php }?>
			</div>
		<!--Button Right End-->
		</div>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table width="100%" border="0" class="table table-hover table-bordered table-striped">
				<tr>
					<th width="3%">
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</th>
					<th width="4%">S.No</th>
					<th width="7%">Order No</th>
					
					<th width="<?php if (!$_GET['resid']) {?>10%<?php } else { ?>10%<?php }?>">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='cdesc') {?>onclick="sortByAscDesc('casc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='casc') {?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('cdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Order Type<?php if ($_REQUEST['sortby']=='cdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='casc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					
                    <th width="13%" >Order Date</th>                    
					<th width="9%" >
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='tdesc') {?>onclick="sortByAscDesc('tasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='tasc') {?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Order Price<?php if ($_REQUEST['sortby']=='tdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='tasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
					<th width="10%">Phone</th>
					<?php if (!$_GET['resid']) {?>
					<th width="12%">
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
                    <th width="6%" >Id</th>
					<th width="5%" >Status</th>
					<th width="10%">Order At</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<th width="15%">Action</th>
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
				<tr id="deletecate<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
">
					<td>
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" class="case" value="<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
" onclick="individualSelect();" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['rownum'];?>
"></label>
						</div>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['ordergenerateid'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytype']=='delivery') {?>Delivery<?php } elseif ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytype']=='pickup') {?>Pickup<?php }?></td>
					
					<td><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverydate'];?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['foodassoonas']=='1') {?>ASAP<?php } else {
echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['deliverytime'];
}?></td>
					<!--<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customername']);?>
</td>
					<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customeremail']);?>
</td>-->
					<td><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['ordertotalprice']);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['customercellphone'];?>
</td>
					<?php if (!$_GET['resid']) {?>
					<td><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_name']);?>
</td>
					<?php }?>
					<!--<?php if (!$_GET['resid']) {?>
					<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['menu_restname']);?>
</td>
					<?php }?>-->
					<!--<td align="left" class="listCont"><?php echo stripslashes($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['instructions']);?>
</td>-->
					
					<!--<td align="center" class="listCont" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
">-->
                    <td><?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
</td>
					<td>
					
						
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='processing'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='failed'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='completed'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='testing'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='preparando'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='horneando'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='empacando'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='listo-para-enviar'&&$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']!='enviado') {?>
						<select class="selectpicker" name="changeorderstatus" id="changeorderstatus" onchange="return disclaimOrder(this.value,'disclaimReason<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');" data-width="120px">
						
							<option value="pending" selected="selected" >Pending</option>
						
						
							
							
							<option value="processing" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='processing') {?>selected="selected"<?php }?> >Accept</option>
							
							<option value="failed" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='failed') {?> selected="selected"<?php }?> >Disclaim</option>
                            
							
							
						</select>
						<div id="disclaimReason<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
" style="display:none">
							<span class="addPageRightFont">Reason<span class="color-red">*</span></span>				
							<textarea  cols="5" rows="1" style="width:120px;" id="reason<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
"></textarea>
							<input type="button" onclick="return changeOrderStatus('failed','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');" style="margin-top:5px;" class="btn btn-default" value="Submit"/>
						
						</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='processing'||$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='preparando'||$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='horneando'||$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='empacando'||$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='listo-para-enviar'||$_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='enviado') {?> 
						
						
						
							
						<select class="selectpicker" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
');" data-width="120px">
						
							
							
							<option value="processing" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='processing') {?>selected="selected"<?php }?>>Aceptada</option>
							<option value="preparando" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='preparando') {?>selected="selected"<?php }?>>Preparando</option>
							<option value="horneando" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='horneando') {?>selected="selected"<?php }?>>Horneando</option>
							<option value="empacando" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='empacando') {?>selected="selected"<?php }?>>Empacando</option>
							<option value="listo-para-enviar" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='listo-para-enviar') {?>selected="selected"<?php }?>>Listo para enviar</option>
							<option value="enviado" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='enviado') {?>selected="selected"<?php }?>>Enviada</option>
							<option value="completed" <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='completed') {?>selected="selected"<?php }?>>Entregada</option>
							
						
							
							
						</select>
							
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='completed') {?>
						Entregado
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='failed') {?>
						Cancelado
						<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['status']=='testing') {?>
						Probando
						<?php }?>
						
						
                       
						
						
					</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderdate'],"%d - %m - %Y");?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEWABLE']->value=='Yes') {?>
					<td>
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
}?>&pagetype=ordermanage" style="cursor:pointer;" class="btn btn-light btn-icon">
							<i class="fa fa-search-plus"></i>
						</a>
						<span class="EditDeleteButton">
							<a href="javascript:;"  onclick="return changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['orderid'];?>
','order_delete');" class="btn btn-light btn-icon">
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

</div><?php }} ?>
