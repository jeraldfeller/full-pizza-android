<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-26 15:11:02
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/metatagManage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1322581175900fed67ec299-89646294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e85fb93afe931491c3e15a3dbb03bb99a73ffd3b' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/metatagManage.tpl',
      1 => 1466424139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1322581175900fed67ec299-89646294',
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
    'dir_files_list' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5900fed6ac17a1_60261106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5900fed6ac17a1_60261106')) {function content_5900fed6ac17a1_60261106($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Manage Metatag</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Metatag</li>
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
			<form name="languagemanage" method="post"  >
			<b>Sort By : </b>
			<select name="sortby" id="sortby" size="1" onchange="document.languagemanage.submit();">
				<option value="">Select</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_REQUEST['sortby']=='active') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Active</option>
					<option value="deactive" <?php if ($_REQUEST['sortby']=='deactive') {?> selected="selected"<?php }?>>&nbsp;&nbsp;Deactive</option>
				</optgroup>
				<optgroup label="Others">
					<option value="lnasc" <?php if ($_REQUEST['sortby']=='lnasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Language Name A to Z</option>
					<option value="lndesc" <?php if ($_REQUEST['sortby']=='lndesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Language Name Z to A</option>
					
					<option value="lcasc" <?php if ($_REQUEST['sortby']=='lcasc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Language Code A to Z</option>
					<option value="lcdesc" <?php if ($_REQUEST['sortby']=='lcdesc') {?>selected="selected"<?php }?>>&nbsp;&nbsp;Language Code Z to A</option>
				</optgroup>				
			</select>
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
			<div class="fliterbuttonContShow processButton" id="searchkey">
				<form name="filterform" method="post" action="metatagManage.php" onsubmit="return loadselecFile();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					
					<input type="text" name="keyword" id="keyword" value="<?php echo $_REQUEST['keyword'];?>
" class="textboxFilter">
					<input type="submit" name="filter" value="Filter" class="btn btn-primary btn-sm">
					<input type="button" name="clear" value="Clear" class="btn btn-default btn-sm" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	 
			</div>
			
			<?php }?>
			
            
		</div>
		<!--Button Left End-->
		<!--Button Right start-->
		<div class="manageButtonLastCont">
			
			<input type="button"  class="btn btn-sm btn-default but_activate" value="Activate" onclick="adminActivateDeactivate('1','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;"/>
			<input type="button" class="btn btn-sm btn-info but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="display:none;" />
			<input type="button" class="btn btn-sm btn-info but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','<?php echo $_smarty_tpl->tpl_vars['whereField']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
','language');" />
             <?php if ($_REQUEST['searchrestaurantid']!=''||$_REQUEST['keyword']!=''||$_REQUEST['sortby']!='') {?>
			     <input type="button" name="back" value="Back" class="btn btn-sm btn-info" id="back" onclick="return backToContent();"/>
             <?php }?>
		</div>
		<!--Button List End-->
		</div>

		<span id="errormsg"></span>

		<!--List Start-->
		<div class="tableListContainer">
			<table class="table table-striped table-hover table-bordered">
				<tr >
				
					<th width="5%" >S.No</th>
					<th width="30%">
						<a href="javascript:void(0);" <?php if ($_REQUEST['sortby']=='lndesc') {?>onclick="sortByAscDesc('lnasc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } elseif ($_REQUEST['sortby']=='lnasc') {?>onclick="sortByAscDesc('lndesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php } else { ?>onclick="sortByAscDesc('lndesc','<?php echo $_GET['limit'];?>
','<?php echo $_REQUEST['keyword'];?>
');"<?php }?>>File Name<?php if ($_REQUEST['sortby']=='lndesc') {?><img src="images/icon_arrow_down.png" alt="" title="Descending" /><?php } elseif ($_REQUEST['sortby']=='lnasc') {?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php } else { ?><img src="images/icon_arrow_up.png" alt="" title="Ascending" /><?php }?>
					</th>
					<th width="15%" >Options</th>
					
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dir'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['name'] = 'dir';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dir_files_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total']);
?>
				<?php $_smarty_tpl->tpl_vars["trvar"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['dir']['rownum'], null, 0);?>
				<tr >
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['dir']['iteration'];?>
.</td>
					<td >
                        <?php if ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='checkout.php') {?>Checkout
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='contactUs.php') {?>Contact Us
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='customerLogin.php') {?>Customer Login
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='customerMyaccount.php') {?>Customer Myaccount
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='customerRegister.php') {?>Customer Registration
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='customerResetPassword.php') {?>Customer Reset Password
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='faq.php') {?>FAQ
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='index.php') {?>Home
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='orderPayment.php') {?>Order Payment
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='restaurantOwnerLogin.php') {?>Restaurant Owner Login
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='restaurantOwnerMyaccount.php') {?>Restaurant Owner Myaccount
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='restaurantOwnerRegister.php') {?>Restaurant Owner Registration
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='restaurantOwnerThanks.php') {?>Restaurant Owner Registration Thanks
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='siteFeedback.php') {?>Site Feedback
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='success.php') {?>Success
                        <?php } elseif ($_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]=='thanks.php') {?>Order Success
                        <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']];?>

                        <?php }?>
                        
                    </td>
					<td >
						<a href="metatagAddEdit.php?filename=<?php echo $_smarty_tpl->tpl_vars['dir_files_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']];?>
" class="btn btn-light btn-icon"><i class="fa fa-pencil"></i></a>
					</td>
					
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
