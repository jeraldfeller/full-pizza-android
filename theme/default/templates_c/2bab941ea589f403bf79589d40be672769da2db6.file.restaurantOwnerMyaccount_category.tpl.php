<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-15 11:15:53
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211088004658a47eb9722390-70569675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bab941ea589f403bf79589d40be672769da2db6' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_category.tpl',
      1 => 1466424455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211088004658a47eb9722390-70569675',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'categoryList' => 0,
    'req_file_name' => 0,
    'categoryListCnt' => 0,
    'pagination' => 0,
    'totalcategory' => 0,
    'totalactive' => 0,
    'totdeactive' => 0,
    'tablename' => 0,
    'fieldname' => 0,
    'wherefield' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58a47eb9b7cc95_91401749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a47eb9b7cc95_91401749')) {function content_58a47eb9b7cc95_91401749($_smarty_tpl) {?>

<div class="detailsInnerNewWrap">

	<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_cat'];?>
</h1>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_categoryAddEdit.php<?php } else { ?>restaurant-myaccount-category-add<?php }?>" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_cataddnew'];?>
</a>	
	<hr class="heading-hr">
	<div class="clr"></div>	
	<input type="hidden" name="restid" class="restid" value="<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[0]['restaurant_id'];?>
" id="resid"/>
    <input type="hidden" name="filenameurl" id="filenameurl" value="<?php echo $_smarty_tpl->tpl_vars['req_file_name']->value;?>
" />
	<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['categoryListCnt']->value>0) {?>	<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
	<?php }?>
	<!-- Pagination end -->
		<div class="succmsg1" ></div>
		<div class="ownerStaticContainer" id="statistics">
			<ul class="orderTopLine1Ul">
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_cattotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['totalcategory']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['totalactive']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catdeactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['totdeactive']->value;?>
</span></li>
			</ul>
			<div class="frt">
            <form name="myaccountCategory" method="post" action="restaurantOwnerMyaccount_category.php" >
				<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catsortby'];?>
: </span>
				<select name="sortbystatus" id="sortby" onchange="document.myaccountCategory.submit();" class="selectpicker">
				<option value="">All</option>
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catsortstatus'];?>
">
						<option value="active" <?php if ($_GET['sortby']=='active'||$_REQUEST['sortbystatus']=='active') {?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catsortactivate'];?>
</option>
						<option value="deactive" <?php if ($_GET['sortby']=='deactive'||$_REQUEST['sortbystatus']=='deactive') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catsortdeactivate'];?>
</option>
					</optgroup>
				</select>
            </form>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-bordered table-striped restownertable" id="table_catgory_own">
				<tbody>
					<tr class="nodrop nodrag">
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catsno'];?>
</th>
						<th width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catname'];?>
</th>
                        
                        <th width="10%">Sort Order</th>
						<th width="20%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catdate'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_catstatus'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_cataction'];?>
</th>
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cat'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['name'] = 'cat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cat']['total']);
?>
					<tr id="<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['sno'];?>
</td>
						<!--<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['menu_catname']));?>
</td>-->
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/restaurantOwnerMyaccount_menu.php?mcatid=<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
" ><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincatename']));?>
</a></td>
                        
                        <td id="sort_order_<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
"><?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['sortorder'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['addeddate'];?>
</td>
						<td align="center">
							<?php if ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['status']=='1') {?>
								<a href="javascript:void(0);" onclick="changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
','Category','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/icon_active.png" alt="" title="" class="" /></a>
							<?php } else { ?>
								<a href="javascript:void(0);" onclick="changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
','Category','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.png" alt="" title="" /> </a>
							<?php }?>
						</td>
						<td align="center">
    						<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_categoryAddEdit.php?catid=<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];
} else { ?>restaurant-myaccount-category-edit/<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];
}?>" class="btn btn-sm btn-info" >
    						<!-- <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/edit.jpg" alt="" title="" class="editDel" /> -->
    							<i class="fa fa-pencil"></i>
    						</a>
    						<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
','Category','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
');">
    						<!-- <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.jpg" alt="" title="" /> -->
    						<i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php endfor; else: ?>
					<tr class="orderInnerCont">
						<td style="color:red;" colspan="6" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<!-- Pagination start -->
		<?php if ($_smarty_tpl->tpl_vars['categoryListCnt']->value>0) {?>	<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
	<?php }?>
		<!-- Pagination end -->
	</div>
	<?php }} ?>
