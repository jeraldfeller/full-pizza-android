<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-15 11:14:12
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_offers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58074114658a47e5443cbf9-13337792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c22b4c88c306225f58c24b0c8ffcbe45f1d8000' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_offers.tpl',
      1 => 1466424444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58074114658a47e5443cbf9-13337792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'resid' => 0,
    'offersListCnt' => 0,
    'pagination' => 0,
    'succ_msg' => 0,
    'totres_offer' => 0,
    'tot_offer_active' => 0,
    'tot_offer_deactive' => 0,
    'offersList' => 0,
    'tablename' => 0,
    'fieldname' => 0,
    'wherefield' => 0,
    'SITE_IMAGE_URL' => 0,
    'today' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58a47e546ea5b8_18027133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a47e546ea5b8_18027133')) {function content_58a47e546ea5b8_18027133($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?>
<div class="detailsInnerNewWrap">

<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offer'];?>
</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_offers_AddEdit.php<?php } else { ?>restaurant-myaccount-offers-add<?php }?>" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offeraddnew'];?>
</a>
<hr class="heading-hr">
<div class="clr"></div>
<input type="hidden" name="restid" class="restid" value="<?php echo $_smarty_tpl->tpl_vars['resid']->value;?>
" id="resid"/>

<!-- Pagination -->

<?php if ($_smarty_tpl->tpl_vars['offersListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;
}?>


	<div class="succmsg1"><?php echo $_smarty_tpl->tpl_vars['succ_msg']->value;?>
</div>
	
	<div class="ownerStaticContainer">
		<ul class="orderTopLine1Ul">
			<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offertotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['totres_offer']->value;?>
</span></li>
			<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offeractive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_offer_active']->value;?>
</span></li>
			<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerdeactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_offer_deactive']->value;?>
</span></li>
		</ul>
		<div class="frt">
        <form name="myaccount_Offer" method="post" action="restaurantOwnerMyaccount_offers.php" >
			<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offersortby'];?>
 :</span>
			<select name="sortbystatus" id="sortby" onchange="document.myaccount_Offer.submit();" class="selectpicker">
				<option value="">All</option>
				<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerstatus'];?>
">
					<option value="active" <?php if ($_GET['sortby']=='active'||$_REQUEST['sortbystatus']=='active') {?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offeractivate'];?>
</option>
					<option value="deactive" <?php if ($_GET['sortby']=='deactive'||$_REQUEST['sortbystatus']=='deactive') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerdeactivate'];?>
</option>
				</optgroup>
			</select>
        </form>
		</div>
	</div>

	<div class="ordersInnerWrap">
		<table class="table table-hover table-striped table-bordered restownertable">
			<tbody>
				<tr class="">
					<th width="5%" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offersno'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerpercent'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerprice'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerfrom'];?>
</th>
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerto'];?>
</th>
					<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offerdate'];?>
</th>
					<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_status'];?>
</th>
					<th width="10%" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offermange'];?>
</th>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["off"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['name'] = "off";
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['offersList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["off"]['total']);
?>
				<tr>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['sno'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_percentage'];?>
</td>
					<td><span class="rupeePrice3"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_price']));?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_valid_from'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_valid_to'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['addeddate'];?>
</td>
					<td>
				
						<?php if ($_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['status']=='1') {?>
							<a href="javascript:void(0);" onclick="changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_id'];?>
','Offer','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
');"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/icon_active.png" alt="" title="" class="editDel" /></a>
						<?php } else { ?>
                        <?php if (smarty_modifier_date_format($_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_valid_to'],"%Y-%m-%d")>=$_smarty_tpl->tpl_vars['today']->value) {?>
							<a href="javascript:void(0);" onclick="changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_id'];?>
','Offer','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
');"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.png" alt="" title="" /> </a>
                            <?php } else { ?>
                          	<a href="javascript:void(0);" onclick="return offerEnd();"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.png" alt="" title="" /> </a>  
                            <?php }?>
						<?php }?>		
					
					</td>
					<td align="center">
						<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_offers_AddEdit.php?offer_id=<?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_id'];
} else { ?>restaurant-myaccount-offers-edit/<?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_id'];
}?>" class="btn btn-sm btn-info" >
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:void(0);" onclick="changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['offersList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['off']['index']]['offer_id'];?>
','Offer','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
');" class="btn btn-sm btn-danger">
							<i class="fa fa-times"></i>
						</a>
					</td>
					
				</tr>
				<?php endfor; else: ?>
				<tr class="orderInnerCont">
					<td align="center"  class="text-danger" colspan="8"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_offernorecord'];?>
</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Pagination -->
<?php if ($_smarty_tpl->tpl_vars['offersListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?><?php }} ?>
