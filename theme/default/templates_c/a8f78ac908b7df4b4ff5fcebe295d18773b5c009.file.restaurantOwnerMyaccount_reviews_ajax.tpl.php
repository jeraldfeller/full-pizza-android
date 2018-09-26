<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-15 11:15:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_reviews_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86515922758a47e999ea8f3-22116876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8f78ac908b7df4b4ff5fcebe295d18773b5c009' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_reviews_ajax.tpl',
      1 => 1466424445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86515922758a47e999ea8f3-22116876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'objRestaurant' => 0,
    'LANG' => 0,
    'resid' => 0,
    'reviewsListCnt' => 0,
    'pagination' => 0,
    'succ_msg' => 0,
    'totres_review' => 0,
    'tot_review_active' => 0,
    'tot_review_deactive' => 0,
    'reviewsList' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58a47e99cef878_28322052',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a47e99cef878_28322052')) {function content_58a47e99cef878_28322052($_smarty_tpl) {?><div class="detailsInnerNewWrap">
<?php echo $_smarty_tpl->tpl_vars['objRestaurant']->value->reviewsList();?>

<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviews'];?>
</h1>
<div class="clr"></div>
<input type="hidden" name="restid" class="restid" value="<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
" id="resid"/>
<!-- Pagination -->
<?php if ($_smarty_tpl->tpl_vars['reviewsListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;
}?>

	
	<?php if ($_smarty_tpl->tpl_vars['succ_msg']->value!='') {?><div class="ownerSucc"><?php echo $_smarty_tpl->tpl_vars['succ_msg']->value;?>
</div><?php }?>
	
	<div class="ownerStaticContainer">
		<ul class="orderTopLine1Ul">
			<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewtotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['totres_review']->value;?>
</span></li>
			<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_review_active']->value;?>
</span></li>
			<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewdeactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_review_deactive']->value;?>
</span></li>
		</ul>
		<div class="frt">
			<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewsortby'];?>
 : </span>
			<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Reviews');" class="selectpicker">
			<option value="">All</option>
				<optgroup label="Status">
					<option value="active" <?php if ($_GET['sortby']=='active'||$_REQUEST['sortbystatus']=='active') {?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewactivate'];?>
</option>
					<option value="deactive" <?php if ($_GET['sortby']=='deactive'||$_REQUEST['sortbystatus']=='deactive') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewdeactivate'];?>
</option>
				</optgroup>
			</select>
		</div>
	</div>

	<div class="ordersInnerWrap">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr>
					<th width="5%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewsno'];?>
</th>
					<th width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewcustname'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewrating'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewmessage'];?>
</th>
					<th width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewdate'];?>
</th>
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewstatus'];?>
</th>
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_reviewaction'];?>
</th>
				</tr>
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['name'] = "rev";
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['reviewsList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["rev"]['total']);
?>
				<tr class="<?php if (!($_smarty_tpl->getVariable('smarty')->value['section']['rev']['rownum'] % 2)) {?> colorBgGray<?php }?>">
					<td><?php echo $_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['sno'];?>
</td>
					<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['customer_name']));?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating']=='1') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/single-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating']=='2') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/double-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating']=='3') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/triple-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating']=='4') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/four-star.png" /> 
						<?php } elseif ($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating']=='5') {?> <img alt="" title="" src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/five-star.png" /> 
						<?php }?></td>
					<td><?php echo stripslashes($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['message']);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['addeddate'];?>
</td>
					<td>
					
						<?php if ($_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['status']=='1') {?>
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('0','<?php echo $_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating_id'];?>
','Reviews')"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/icon_active.png" alt="" title="" class="editDel" /></a>
						<?php } else { ?>
							<a href="javascript:void(0);" onclick="changeStatusResMyacc('1','<?php echo $_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating_id'];?>
','Reviews')"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.png" alt="" title="" /> </a>
						<?php }?>		
					
					</td>
					<td>
						<a href="javascript:void(0);" onclick="changeStatusResMyacc('delete','<?php echo $_smarty_tpl->tpl_vars['reviewsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rev']['index']]['rating_id'];?>
','Reviews');" class="btn btn-sm btn-danger">
							<i class="fa fa-times"></i>
						</a>
					</td>
					
				</tr>
				<?php endfor; else: ?>
				<tr class="">
					<td class="text-dang"e colspan="7" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<!-- Pagination -->
	<?php if ($_smarty_tpl->tpl_vars['reviewsListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
</div>
<?php }} ?>
