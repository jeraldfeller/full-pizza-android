<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 10:49:24
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerMyaccount_addressBook_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19816594805768ce5c05c748-67276867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a630a6c9bb8cea788d7dc4f9235c646416b0797' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerMyaccount_addressBook_ajax.tpl',
      1 => 1466424443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19816594805768ce5c05c748-67276867',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'objCustomer' => 0,
    'LANG' => 0,
    'addressBook' => 0,
    'word' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5768ce5c322fb6_47568237',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768ce5c322fb6_47568237')) {function content_5768ce5c322fb6_47568237($_smarty_tpl) {?>
	<?php $_smarty_tpl->tpl_vars['addressBook'] = new Smarty_variable($_smarty_tpl->tpl_vars['objCustomer']->value->addressBookList(), null, 0);?>
	<div class="customerAddress" id="customerAddress" >
		<div class="MyAccountBg clearfix">
			<h1 class="MyAccountBgHead"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_manage_address_book']);?>
</h1>
			<div align="right" class="mandatoryField"><a class="addressbook-lnk" href="javascript:void(0);" onclick="return newAddress();"><i class="glyphicon glyphicon-plus-sign marRight"></i> <?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_new_address']);?>
</a></div>
			<div class="clr"></div>
			<div class="myAccInnerBg clearfix">
				<div class="contain" id="cus_add">
					<div class="detailsInnerNewWrap">
						<div class="ordersInnerWrap">
							<span id="Addedmsg"></span>
							<span id="updatedmsg"></span>
							<table class="manageAddBook" width="100%" cellpadding="0" cellspacing="0" border="0">
							<tbody>
								<tr class="orderInnerHead">
									<td class="orderHeading" width="5%" align="center"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_sno']);?>
</td>
									<td class="orderHeading" width="15%" align="center"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_address_title']);?>
</td>
									<td class="orderHeading" width="55%" align="center"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_address']);?>
</td>
									<td class="orderHeading" width="10%" align="center"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_myacc_status']);?>
</td>
									<td class="orderHeading" width="15%" align="center"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_fav_action']);?>
</td>
								</tr>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['name'] = 'cus_add';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['addressBook']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total']);
?>
								<tr class="orderInnerCont">
								
									<td height="27" align="center"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['iteration'];?>
</td>
									
									<td height="27" align="center"><?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_address_title']);?>
</td>
									
									<td height="27" align="center"><?php if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_apartment_name']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_apartment_name']);?>
, <?php }
if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_landmark']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_landmark']);?>
, <?php }
echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_street']);?>
,  <?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['cityname']);?>
, <?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['statename']);?>
 <?php if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_zip']!='') {?>-<?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_zip']);?>
 <?php }?></td>
									
									<td height="27" align="center" id="chgstatus<?php echo $_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['id'];?>
">
									<?php if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['status']=='1') {?>
									<img src="admincp/images/icon_active.png" alt="Active" title="Active" onclick="return changeStatusCus('0','<?php echo $_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="cursor:pointer;" />
								
									<?php } else { ?>
									<img src="admincp/images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatusCus('1','<?php echo $_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');" style="cursor:pointer;" />
									<?php }?>
									</td>
									<td height="27" align="center"><a class="underline" href="javascript:void(0)" onclick="return editAddress(<?php echo $_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['id'];?>
);">Edit</a> &nbsp;<a href="javascript:void(0)" onclick="return changeStatusCus('delete','<?php echo $_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
');">Delete</a></td>
								</tr>
								<?php endfor; else: ?>
								<tr><td height="27" class="red" colspan="5" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cus_myacc_no_rec_found'];?>
</td></tr>
								<?php endif; ?>
							</tbody>
						</table>		
						</div>			
					</div>
				</div>
			</div>
			<div class="contain" id=""></div>
		</div>
	</div>
<?php }} ?>
