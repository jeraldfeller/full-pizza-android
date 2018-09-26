<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-06 05:19:59
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantInvoiceManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168472187757ce04a7a7e6b7-87546865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8427ec4a62162b54257003aa3b209612141ef0b9' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantInvoiceManage.tpl',
      1 => 1466424123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168472187757ce04a7a7e6b7-87546865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'limit' => 0,
    'restaurantSearchList' => 0,
    'searchreslist' => 0,
    'invoice_occur' => 0,
    'invoice_sent_date' => 0,
    'restaurant_inv_setting' => 0,
    'current_year_mon' => 0,
    'numoftime' => 0,
    'totalRecords' => 0,
    'invoice_list' => 0,
    'trvar' => 0,
    'fieldname' => 0,
    'whereField' => 0,
    'tablename' => 0,
    'word' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ce04a7e1f339_40883993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ce04a7e1f339_40883993')) {function content_57ce04a7e1f339_40883993($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Invoice <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Invoice <?php if ($_GET['resid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
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
			<div class="manageButtonLeft marginBot">	
				<form name="reportmanage" method="post" action="restaurantInvoiceManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
if ($_GET['type']!='') {?>?type=<?php echo $_GET['type'];
}?>" />
				<?php if (!$_GET['resid']) {?>
				<select class="selectpicker" name="searchrestaurantid" id="searchrestaurant" onchange="document.reportmanage.submit();">
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
					
				</form>
			</div>
		</div>

		<?php if ($_REQUEST['resid']) {?>
		<!-- Invoice Generation Condition start -->
		
		<!--Current Invoice-->
		<div class="manageButtonLeft marginBot">
			<?php if ($_smarty_tpl->tpl_vars['invoice_occur']->value>=1) {?>
			You have already sent Invoice to Restaurant on <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['invoice_sent_date']->value,"%b %d, %Y");?>
</b>. You can see the Invoice from Below List.
			<?php } else { ?>	
			<form name="reportmanage" method="post" action="restaurantInvoice.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>" />
				<input type="hidden" name="res_invoice_setting" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_inv_setting']->value;?>
" />
				<?php if ($_smarty_tpl->tpl_vars['restaurant_inv_setting']->value=='m1') {?>
				<input type="hidden" name="invoice_monthly" value="<?php echo $_smarty_tpl->tpl_vars['current_year_mon']->value;?>
" />
                <input type="hidden" name="invoice_monthly_once" value="<?php echo $_smarty_tpl->tpl_vars['numoftime']->value;?>
" />
				<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_inv_setting']->value=='m2') {?>
				<input type="hidden" name="invoice_monthly" value="<?php echo $_smarty_tpl->tpl_vars['current_year_mon']->value;?>
" />
				<input type="hidden" name="invoice_monthly_twice_tm" value="<?php echo $_smarty_tpl->tpl_vars['numoftime']->value;?>
" />
				<?php } elseif ($_smarty_tpl->tpl_vars['restaurant_inv_setting']->value=='m4') {?>
				<input type="hidden" name="invoice_monthly" value="<?php echo $_smarty_tpl->tpl_vars['current_year_mon']->value;?>
" />
				<input type="hidden" name="invoice_monthly_4t_tm" value="<?php echo $_smarty_tpl->tpl_vars['numoftime']->value;?>
" />
				<?php }?>
				
				
			</form>
			<?php }?>
		</div>
		
		
        
		<?php if ($_smarty_tpl->tpl_vars['restaurant_inv_setting']->value=='m1') {?>
    		<div class="manageButtonLeft marginBot">	
    			<form name="reportmanage" method="post" action="restaurantInvoice.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>" />
                <input type="hidden" name="res_invoice_setting" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_inv_setting']->value;?>
" />
    				<!--Monthly-->
    				<span class="restManageNameSort">Monthly</span>
    				<div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="invoice_monthly" name="invoice_monthly" value="<?php echo $_smarty_tpl->tpl_vars['current_year_mon']->value;?>
"/>
                            <span class="input-group-addon">
    							<span class="fa fa-calendar"></span>
    						</span>
                        </div>
                    </div>
    				<input type="hidden" name="invoice_monthly_once" value="1" />
    				<input class="btn btn-default" type="submit" name="actionsubmit" value="Show" id="show" onclick="return report_validate();"/>
            
    			</form>
    		</div>
        <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['restaurant_inv_setting']->value=='m2') {?>
		<div class="manageButtonLeft marginBot">	
			<form name="reportmanage" method="post" action="restaurantInvoice.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>" />
			<input type="hidden" name="res_invoice_setting" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_inv_setting']->value;?>
" />
				<!--Monthly Twice-->
				<span class="restManageNameSort">Monthly Twice</span>
                <div class="col-sm-3">
                    <div class="input-group">
				        <input type="text" class="form-control" id="invoice_monthly" name="invoice_monthly" value="<?php echo $_smarty_tpl->tpl_vars['current_year_mon']->value;?>
"/>
                        <span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
                    </div>
                </div>
				<select id="invoice_monthly_twice_tm" name="invoice_monthly_twice_tm" class="selectpicker" data-width="100px">
					<option value="1">1-15</option>
					<option value="16">16-30</option>
				</select>
				<input class="btn btn-default" type="submit" name="actionsubmit" value="Show" id="show" onclick="return report_validate();"/>
			</form>
		</div>
		<?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['restaurant_inv_setting']->value=='m4') {?>
		<div class="manageButtonLeft marginBot">	
			<form name="reportmanage" method="post" action="restaurantInvoice.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}?>" />
			<input type="hidden" name="res_invoice_setting" value="<?php echo $_smarty_tpl->tpl_vars['restaurant_inv_setting']->value;?>
" />
				<!--Monthly Four-->
				<span class="restManageNameSort">Monthly 4 times</span>
                <div class="col-sm-3">
                    <div class="input-group">
			             <input type="text" class="form-control" id="invoice_monthly" name="invoice_monthly" value="<?php echo $_smarty_tpl->tpl_vars['current_year_mon']->value;?>
"/>
                         <span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
                    </div>
                </div>
				<select id="invoice_monthly_4t_tm" name="invoice_monthly_4t_tm" class="selectpicker" data-width="100px">
					<option value="1">1-7</option>
					<option value="8">8-14</option>
					<option value="15">15-21</option>
					<option value="22">22-30</option>
				</select>
				<input class="btn btn-default" type="submit" name="actionsubmit" value="Show" id="show" onclick="return invoice_report_validate();"/>
			</form>
		</div>
        <?php }?>
		<!-- Invoice Generation Condition End -->
		<?php }?>

       
		
		 <div class="col-sm-12 no-padding">
		<!--Button Left start-->
		<div class="manageButtonLeft">
			<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>	
			<!--Filter-->
			<div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
    			 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
    		</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none;">
				<form name="filterform" method="post" onsubmit="return filterValidation1();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Restaurant Name/Invoice Id" />
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm" />
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();" />		 
				</form>	 
			</div>
			<?php }?>
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		
		<!--Button Right End-->
		</div>
		<span id="errormsg"></span>
		
		<!--List Start-->
		<div class="tableListContainer">
			<table width="100%" border="0" class="table table-striped table-bordered table-hover">
				<tr class="">
                
					<th width="3%" align="center" class="">S.No</th>
					<th width="8%" align="left" class="">Invoice #</th>
					<th width="7%" align="left" class=" ">Month</th>
					<th width="7%" align="left" class=" ">Invoice Period</th>
					<th width="12%" align="left" class=" ">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='tdesc') {?>onclick="sortByAscDesc('tasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='tasc') {?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('tdesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Invoice Ac Balance<?php if ($_REQUEST['sortby']=='tdesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='tasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</th>
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
                    <th width="7%" align="center" class="">Invoice Id</th>
					<th width="8%" align="center" class="">Invoice Date</th>
					<th width="12%" align="center" class="">Status</th>
					<th width="7%" align="center" class="">Action</th>
				</tr>
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["list"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['name'] = "list";
$_smarty_tpl->tpl_vars['smarty']->value['section']["list"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['invoice_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
				<tr <?php if (!(1 & $_smarty_tpl->tpl_vars['trvar']->value)) {?>class="listLightGray"<?php }?> id="deletecate<?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_id'];?>
">
					
					<td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['sno'];?>
</td>
					<td align="left" class="listCont txtindent"><?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_gen_id'];?>
</td>
					<td align="left" class="listCont txtindent"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['inv_month'],"%b %Y");?>
</td>
					<td align="left" class="listCont txtindent"><?php if ($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['inv_month_period_limit']=='') {?>Monthly once<?php } else {
echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['inv_month_period_limit'];
}?></td>
					<td align="left" class="listCont txtindent"><?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['inv_acc_balance'];?>
</td>
					<?php if (!$_GET['resid']) {?>
					<td align="left" class="listCont txtindent"><?php echo stripslashes($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_name']);?>
</td>
					<?php }?>
                    <td align="center" class="listCont"><?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_id'];?>
</td>
					<td align="center" class="listCont"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_sent_date'],"%d - %m - %Y");?>
</td>
					<td align="center" class="listCont">
						<select class="selectpicker" data-width="170px" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_id'];?>
');">
							<option value="IS" <?php if ($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_status']=='IS') {?>selected="selected"<?php }?> >Invoice Sent</option>
							<option value="PS" <?php if ($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_status']=='PS') {?>selected="selected"<?php }?>>Payment Sent</option>
							<option value="PR" <?php if ($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_status']=='PR') {?>selected="selected"<?php }?>>Payment Receive</option>
						</select>
					</td>
					<td align="center" class="listCont">
						<a href="restaurantInvoice.php?invoiceno=<?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_gen_id'];
if ($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id']!='') {?>&resid=<?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
}?>" style="cursor:pointer;">View</a>&nbsp;
						<a href="../restaurantInvoicePDF.php?invoiceno=<?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['invoice_gen_id'];
if ($_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id']!='') {?>&resid=<?php echo $_smarty_tpl->tpl_vars['invoice_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['restaurant_id'];
}?>" style="cursor:pointer;" target="_blank">Pdf</a>&nbsp;
						
					</td>
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="11" align="center" class="listCont">No record(s) found</td></tr>
				<?php endif; ?>
					
			</table>
		</div>
		<!--List End-->
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
