<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-09 03:05:01
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_report_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125467054157d1d9858c4088-16247821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fed20cebf9b5ddf8580e8858887236cd222aec8f' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_report_ajax.tpl',
      1 => 1466424462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125467054157d1d9858c4088-16247821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'ordersReportListCnt' => 0,
    'pagination' => 0,
    'succ_msg' => 0,
    'sortbystatus' => 0,
    'resid' => 0,
    'ordersReportList' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d1d985b26f76_84611486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d1d985b26f76_84611486')) {function content_57d1d985b26f76_84611486($_smarty_tpl) {?><!--Date Picker Files-->
<div class="detailsInnerNewWrap">

	<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_report'];?>
</h1>
	<div class="clr"></div>
	<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['ordersReportListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->
		
		<div class="succmsg1"><?php echo $_smarty_tpl->tpl_vars['succ_msg']->value;?>
</div>
	
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reporttotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['ordersReportListCnt']->value;?>
</span></li>
			</ul>
			<div class="pull-right col-lg-9 col-md-7 col-sm-12 col-xs-12">
				<select name="report" id="report" size="1" onchange="return changeSortbyStatus(this.value,'Report');" class="selectpicker">
					<option value="">All</option>
					<option value="Today" <?php if ($_REQUEST['sortbystatus']=='Today') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportselecttoday'];?>
</option>
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportselectweek'];?>
">
						<option value="ThisWeek" <?php if ($_REQUEST['sortbystatus']=='ThisWeek') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportthisweek'];?>
</option>
						<option value="LastWeek" <?php if ($_REQUEST['sortbystatus']=='LastWeek') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportlastweek'];?>
</option>
					</optgroup>	
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportselectmonth'];?>
">
						<option value="ThisMonth" <?php if ($_REQUEST['sortbystatus']=='ThisMonth') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportthismonth'];?>
</option>
						<option value="LastMonth" <?php if ($_REQUEST['sortbystatus']=='LastMonth') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportlastmonth'];?>
</option>
					</optgroup>	
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportselectyear'];?>
">
						<option value="ThisYear" <?php if ($_REQUEST['sortbystatus']=='ThisYear') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportthisyear'];?>
</option>
						<option value="LastYear" <?php if ($_REQUEST['sortbystatus']=='LastYear') {?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportlastyear'];?>
</option>
					</optgroup>				
				</select>
				<div class="input-group date dateWid">
					<input type="text" id="report_from" name="report_from" value="<?php echo $_REQUEST['startdate'];?>
" size="15" class="form-control" readonly=""/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
				<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportto'];?>
</span>
				<div class="input-group date dateWid">
					<input type="text" id="report_to" name="report_to" value="<?php echo $_REQUEST['enddate'];?>
" size="15" class="form-control" readonly=""/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
				<span class="showBtn"><input type="submit" name="actionsubmit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportshowbut'];?>
" id="show" onclick="return report_validate();"/></span>
				
				<a class="restOwnMyAddBtn" style="cursor:pointer;" href="reportListPdf.php?total=<?php echo $_smarty_tpl->tpl_vars['ordersReportListCnt']->value;
if ($_smarty_tpl->tpl_vars['sortbystatus']->value=='Today'||$_smarty_tpl->tpl_vars['sortbystatus']->value=='ThisWeek'||$_smarty_tpl->tpl_vars['sortbystatus']->value=='LastWeek'||$_smarty_tpl->tpl_vars['sortbystatus']->value=='LastMonth'||$_smarty_tpl->tpl_vars['sortbystatus']->value=='ThisMonth'||$_smarty_tpl->tpl_vars['sortbystatus']->value=='ThisYear'||$_smarty_tpl->tpl_vars['sortbystatus']->value=='LastYear') {?>&sortbystatus=<?php echo $_smarty_tpl->tpl_vars['sortbystatus']->value;
} else {
if ($_REQUEST['startdate']!='') {?>&startdate=<?php echo $_REQUEST['startdate'];?>
&enddate=<?php echo $_REQUEST['enddate'];
}
}
if ($_smarty_tpl->tpl_vars['resid']->value!='') {?>&resid=<?php echo $_smarty_tpl->tpl_vars['resid']->value;
}?>" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportgenpdf'];?>
</a>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-bordered table-striped restownertable">
				<tbody>
					<tr class="">
						<th width="5%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_report_sno'];?>
</th>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportname'];?>
</th>
						<th width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportemail'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportorderno'];?>
</th>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reporttotprice'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reportorderat'];?>
</th>
						<!--<td class="" width="30%">Status</td>-->
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["report"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['name'] = "report";
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ordersReportList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["report"]['total']);
?>
					<tr class="orderInnerCont  <?php if (!($_smarty_tpl->getVariable('smarty')->value['section']['report']['rownum'] % 2)) {?> colorBgGray<?php }?>">
						<td><?php echo $_smarty_tpl->tpl_vars['ordersReportList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['report']['index']]['sno'];?>
</td>
						<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersReportList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['report']['index']]['customername']));?>
</td>
						<td><?php echo stripslashes($_smarty_tpl->tpl_vars['ordersReportList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['report']['index']]['customeremail']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersReportList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['report']['index']]['ordergenerateid'];?>
</td>
						<td><span class="rupeeImg2"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;</span><span class="rupeePrice2"><?php echo $_smarty_tpl->tpl_vars['ordersReportList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['report']['index']]['ordertotalprice'];?>
</span></td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersReportList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['report']['index']]['orderdate'];?>
</td>
					</tr>
					<?php endfor; else: ?>
					<td class="text-danger" colspan="6" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
					<?php endif; ?>
				</tbody>
			</table>		
		</div>
		<!-- Pagination start -->
		<?php if ($_smarty_tpl->tpl_vars['ordersReportListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
		<!-- Pagination end -->
</div>
	<?php }} ?>
