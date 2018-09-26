<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-26 15:10:56
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/newsLetterManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4855468855900fed01ae580-23987596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4e9bd81cddbb68369c9437d3f844cdfef7ceee4' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/newsLetterManage.tpl',
      1 => 1466424115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4855468855900fed01ae580-23987596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'limit' => 0,
    'totalRecords' => 0,
    'ErrorMessage' => 0,
    'SuccessMessage' => 0,
    'newsletterlist' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5900fed043c656_01006211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5900fed043c656_01006211')) {function content_5900fed043c656_01006211($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">News Letter</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">News Letter</li>
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
		<input type="hidden" name="action_user" id="action_user" value="<?php echo $_REQUEST['action'];?>
">
		
		<?php if ($_smarty_tpl->tpl_vars['totalRecords']->value>0) {?>
		<!-- Sort By -->
		<div class="col-sm-7 no-padding">	
			<form name="newsletter" method="post" action="newsLetterManage.php" >
			<input type="hidden" name="keyword"  value="<?php echo $_REQUEST['keyword'];?>
" />
            <div class="pull-right">
    			<span class="restManageNameSort">Sort By</span>
    			<select name="sortby" id="sortby" size="1" onchange="document.newsletter.submit();" class="selectpicker">
    				<option value="">Select</option>
    				
    				<optgroup label="Others">
    					<option value="easc" <?php if ($_REQUEST['sortby']=='easc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Email A to Z</option>
    					<option value="edesc" <?php if ($_REQUEST['sortby']=='edesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Email Z to A</option>
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
            <div class="col-sm-4 col-sm-offset-4">
			<?php if ($_smarty_tpl->tpl_vars['ErrorMessage']->value!='') {?>
				<span class="errormsg"><?php echo $_smarty_tpl->tpl_vars['ErrorMessage']->value;?>
</span><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['SuccessMessage']->value!='') {?>
				 <span class="successmsg"><?php echo $_smarty_tpl->tpl_vars['SuccessMessage']->value;?>
</span>
			<?php }?>	
			</div>
			<!--Filter-->
		    <div class="btn btn-success btn-sm" onclick="return filterOptShowHide();">
				 <i class="fa fa-filter"></i> Filter <i class="caret"></i> 
			</div>
			<div class="fliterbuttonContShow processButton" id="searchkey" style="display:none">
				<form name="filterform" method="post" action="newsLetterManage.php" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					<input type="hidden" name="sortby"  value="<?php echo $_REQUEST['sortby'];?>
" />
				
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter" placeholder="Email">
					<input type="submit" name="filter" value="Filter" class="btn btn-default btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
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
			
			<a class="btn btn-info btn-sm" href="mail_news.php?flag=all_site<?php if ($_REQUEST['action']!=''&&$_REQUEST['action']=='reg_user') {?>&action=reg_user<?php }?>" class="button1 add_new"><span><span>Send Mail to All Users</span></span></a>			
			<a class="btn btn-info btn-sm" href="#" onclick="return ifCheck('Mail');" class="button1 add_new"><span>Send Mail to Selected Users</span></a>
            <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
    		     <input type="button" name="back" value="Back" class="btn btn-sm btn-info" id="back" onclick="return backToContent();"/>
             <?php }?>
			
		</div>
		<!--Button List End-->
        </div>
		
		<!--List Start-->
		<form name="form1" method="post" action="mail_news.php"> 
		<div class="tableListContainer table-responsive">
			<table width="100%" border="0" class="table table-bordered table-hover table-striped">
				<tr>
					<td width="3%" >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
							<label for="selectall"></label>
						</div>
					</td>
					<td width="7%" >ID.Nr.</td>
					<td width="35%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='edesc') {?>onclick="sortByAscDesc('easc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='easc') {?>onclick="sortByAscDesc('edesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('edesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>Email<?php if ($_REQUEST['sortby']=='edesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='easc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
						</a>
					</td>
					
					<td width="15%" >Added Date</td>
					
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['name'] = 'maincat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['maincat']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['newsletterlist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
					<td >
						<div class="checkbox checkbox-primary no-margin">
							<input type="checkbox" name="Sel_Id[]" class="case" value="<?php echo $_smarty_tpl->tpl_vars['newsletterlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['id'];?>
" onclick="individualSelect();" id="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
" />
							<label for="tableselect_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['maincat']['rownum'];?>
"></label>
						</div>
					</td>
					<td ><?php echo $_smarty_tpl->tpl_vars['newsletterlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['sno'];?>
</td>
					<td ><?php echo utf8_encode(stripslashes($_smarty_tpl->tpl_vars['newsletterlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['customer_email']));?>
</td>
					
					<td ><?php echo $_smarty_tpl->tpl_vars['newsletterlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['maincat']['index']]['added_date'];?>
</td>
					
				</tr>
				<?php endfor; else: ?>
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
				<?php endif; ?>
			</table>
		</div>
		</form>
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
		<!--Button List End-->
	</div>



<?php echo '<script'; ?>
>
function ifCheck(val)
{   
		var flag=false;		
		
		for(i=0;i<document.form1.elements.length;i++)
		{		
			if(document.form1.elements[i].name=="Sel_Id[]")
			{
				if(document.form1.elements[i].checked)
				{
					flag=true;	
					break;
				}
			}
		}	
		if(flag)
		{
		var answer = confirm('Are you sure want to send Mail?')
			if (answer)
			{
				document.form1.action='mail_news.php';
				document.form1.submit();		
			}
		}
		else
		{	
			alert("Select Atleast One Email");
			return false;
		}
}
<?php echo '</script'; ?>
>

<?php }} ?>
