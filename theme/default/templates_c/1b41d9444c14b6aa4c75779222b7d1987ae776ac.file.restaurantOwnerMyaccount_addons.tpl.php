<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:56:01
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_addons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37636901657b4c859d7f3a6-57638929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b41d9444c14b6aa4c75779222b7d1987ae776ac' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_addons.tpl',
      1 => 1466424447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37636901657b4c859d7f3a6-57638929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'addonsListCnt' => 0,
    'pagination' => 0,
    'tot_add' => 0,
    'tot_addon_active' => 0,
    'tot_addon_deactive' => 0,
    'addonsList' => 0,
    'tablename' => 0,
    'fieldname' => 0,
    'wherefield' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c859ec3ed1_42262955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c859ec3ed1_42262955')) {function content_57b4c859ec3ed1_42262955($_smarty_tpl) {?><div class="detailsInnerNewWrap">
	
	<h1 class="restOwnMyHead">
		<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addon'];?>

	</h1>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_addonsAddEdit.php<?php } else { ?>restaurant-myaccount-addons-add<?php }?>" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonaddnew'];?>
</a>
	<hr class="heading-hr">
	<div class="clr"></div>
	<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['addonsListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->
    <div class="succmsg1"></div>
	<div class="ownerStaticContainer" id="statistics">
		<ul class="orderTopLine1Ul">
			<li>
				<span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addontotal'];?>
:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_add']->value;?>
</span>
			</li>
			<li>
				<span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonactive'];?>
:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_addon_active']->value;?>
</span>
			</li>
			<li>
				<span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addondeactive'];?>
:</span>
				<span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_addon_deactive']->value;?>
</span>
			</li>
		</ul>
		<div class="frt">
        <form name="myaccountCategory" method="post" action="restaurantOwnerMyaccount_addons.php" >
			<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonsortby'];?>
 :</span>
			<select name="sortbystatus" id="sortby" onchange="document.myaccountCategory.submit();" class="selectpicker">
				<option value="">
					<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addon_page_select'];?>

				</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_GET['sortby']=='active'||$_REQUEST['sortbystatus']=='active') {?>selected="selected"<?php }?>>
						<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonactivate'];?>

					</option>
					<option value="deactive" <?php if ($_GET['sortby']=='deactive'||$_REQUEST['sortbystatus']=='deactive') {?>selected="selected"<?php }?>>
						<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addondeactivate'];?>

					</option>
				</optgroup>
			</select>
        </form>
		</div>
	</div>
	<div class="ordersInnerWrap table-responsive">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr class="">
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonsno'];?>
</th>
					<th width="25%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addoncatname'];?>
</th>
					<th width="25%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonname'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addondate'];?>
</th>
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonstatus'];?>
</th>
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_addonaction'];?>
</th>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['add'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['add']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['name'] = 'add';
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['addonsList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['add']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['add']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['add']['total']);
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['sno'];?>
</td>
					<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['maincatename']));?>
</td>
					<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addonsname']));?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['addeddate'];?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['status']=='1') {?>
						<a href="javascript:void(0);" onclick="changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['id'];?>
','Addon','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/icon_active.png" alt="" title="" class="editDel" /></a>
						<?php } else { ?>
						<a href="javascript:void(0);" onclick="changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['id'];?>
','Addon','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.png" alt="" title="" /> </a>
						<?php }?>
					</td>
					<td>
						<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_addonsAddEdit.php?addonid=<?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['id'];
} else { ?>restaurant-myaccount-addons-edit/<?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['id'];
}?>" class="btn btn-sm btn-info" >
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:void(0);" onclick="changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['addonsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['add']['index']]['id'];?>
','Addon','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
');" class="btn btn-danger btn-sm">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
				<?php endfor; else: ?>
				<tr class="orderInnerCont">
					<td class="text-danger" colspan="6" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['addonsListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->
</div><?php }} ?>
