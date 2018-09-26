<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:41
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7190916957b4c6a14f8eb0-62170205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c3ac298956406ebea0a082d226c3d18f2e16df0' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_menu.tpl',
      1 => 1466424459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7190916957b4c6a14f8eb0-62170205',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'mcatid' => 0,
    'menuListCnt' => 0,
    'pagination' => 0,
    'succ_msg' => 0,
    'tot_menu' => 0,
    'tot_menu_active' => 0,
    'tot_menu_deactive' => 0,
    'tot_menu_popular' => 0,
    'tot_menu_normal' => 0,
    'showcategorylist' => 0,
    'menuList' => 0,
    'SITE_IMAGE_URL' => 0,
    'tablename' => 0,
    'wherefield' => 0,
    'fieldname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c6a16e1fa7_50566200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c6a16e1fa7_50566200')) {function content_57b4c6a16e1fa7_50566200($_smarty_tpl) {?><div class="detailsInnerNewWrap">

<h1 class="restOwnMyHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menu'];?>
</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_menuAddEdit.php<?php } else { ?>restaurant-myaccount-menu-add<?php }?>" class="addbtn pull-right" ><i class="glyphicon glyphicon-plus marRight"></i><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuaddnew'];?>
</a>
<?php if ($_smarty_tpl->tpl_vars['mcatid']->value!='') {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/restaurantOwnerMyaccount_category.php" class="btn btn-warning pull-right btn-sm" >Back</a>
<?php }?>
<hr class="heading-hr">
<div class="clr"></div>
	<!-- Pagination start -->
	<?php if ($_smarty_tpl->tpl_vars['menuListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
	<!-- Pagination end -->
		<div class="succmsg1"><?php echo $_smarty_tpl->tpl_vars['succ_msg']->value;?>
</div>
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
            
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menutotal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_menu']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_menu_active']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menudeactive'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_menu_deactive']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menupopular'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_menu_popular']->value;?>
</span></li>
				<li><span class="order"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menunormal'];?>
:</span><span class="value"><?php echo $_smarty_tpl->tpl_vars['tot_menu_normal']->value;?>
</span></li>
			</ul>
            	
            <div class="frt">
            
            <form name="myaccount_Menu" method="post" action="restaurantOwnerMyaccount_menu.php" >
				<span class="sortbytext">Sort By: </span>
                <select name="categorysortby" id="categorysortby" onchange="document.myaccount_Menu.submit();" class="selectpicker">
                    <option value="">Select</option>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['name'] = "cat";
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showcategorylist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["cat"]['total']);
?>
                    
                    <option value="<?php echo $_smarty_tpl->tpl_vars['showcategorylist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid'];?>
" <?php if ($_REQUEST['categorysortby']==$_smarty_tpl->tpl_vars['showcategorylist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincateid']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['showcategorylist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cat']['index']]['maincatename']);?>
</option>
                    <?php endfor; endif; ?>
                </select>
            
				<span class="sortbytext"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menusortby'];?>
:</span>
				<select name="sortbystatus" id="sortby" onchange="document.myaccount_Menu.submit();" class="selectpicker">
				<option value="">All</option>
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menusortstatus'];?>
">
						<option value="active" <?php if ($_GET['sortby']=='active'||$_REQUEST['sortbystatus']=='active') {?>selected="selected"<?php }?> >Active</option>
						<option value="deactive" <?php if ($_GET['sortby']=='deactive'||$_REQUEST['sortbystatus']=='deactive') {?>selected="selected"<?php }?>>Deactive</option>
						<option value="popular" <?php if ($_GET['sortby']=='popular'||$_REQUEST['sortbystatus']=='popular') {?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menusortpopular'];?>
</option>
						<option value="normal" <?php if ($_GET['sortby']=='normal'||$_REQUEST['sortbystatus']=='normal') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menusortnormal'];?>
</option>
					</optgroup>
				</select>
            </form>
			</div>	
		</div>
	
		<div class="ordersInnerWrap">
			<table class="table table-hover table-bordered table-striped restownertable" <?php if ($_smarty_tpl->tpl_vars['mcatid']->value!='') {?>id="table_menu_own" <?php }?>>
				<tbody>
					<tr class="nodrop nodrag">
						<th width="5%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menusno'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menucatname'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuname'];?>
</th>
                        <?php if ($_smarty_tpl->tpl_vars['mcatid']->value!='') {?>
                        	<th width="10%"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['res_menu_sort_order']);?>
</th>
                        <?php }?>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menuprice'];?>
</th>
						<th width="15%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menudate'];?>
</th>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menupopular'];?>
</th>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menustatus'];?>
</th>
						<th width="10%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_menumange'];?>
</th>
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
					<tr id="<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['sno'];?>
</td>
						<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['maincatename']));?>
</td>
						<td><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']));?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['mcatid']->value!='') {?>
                        <td <?php if ($_smarty_tpl->tpl_vars['mcatid']->value!='') {?> id="sort_order_<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['sortorder'];?>
</td>
                        <?php }?>
						<td><span class="rupeePrice"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_price']));?>
</span></td>
						<td><?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['addeddate'];?>
</td>
						<td align="center">
							<?php if ($_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_popular_dish']=='Yes') {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/star_yellow.png" alt="Popular" title="Popular" onclick="changeStatus('No','<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
','Menu','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')" class="curPointer" />
							<?php } else { ?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/star_grey.png" alt="Normal" title="Normal" onclick="changeStatus('Yes','<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
','Menu','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','menu_popular_dish','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')" class="curPointer" />
							<?php }?>
						</td>
						<td align="center">
							<?php if ($_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['status']=='1') {?>
								<a href="javascript:void(0);" onclick="changeStatus('0','<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
','Menu','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/icon_active.png" alt="" title="" class="editDel" /></a>
							<?php } else { ?>
								<a href="javascript:void(0);" onclick="changeStatus('1','<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
','Menu','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delete.png" alt="" title="" /></a>
							<?php }?>
						</td>
						<td align="center">
							<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_menuAddEdit.php?menuid=<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];
} else { ?>restaurant-myaccount-menu-edit/<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];
}?>" class="btn btn-sm btn-info" >
								<i class="fa fa-pencil"></i>
							</a>
                            <a href="javascript:;" onclick="changeStatus('delete','<?php echo $_smarty_tpl->tpl_vars['menuList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
','Menu','<?php echo $_smarty_tpl->tpl_vars['tablename']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fieldname']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['wherefield']->value;?>
');" class="btn btn-sm btn-danger" >
                            	<i class="fa fa-times"></i>
                            </a>
                        </td>
					</tr>
					<?php endfor; else: ?>
					<tr class="orderInnerCont">
						<td class="text-danger" colspan="8" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_no_rec_found'];?>
</td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<!-- Pagination start -->
		<?php if ($_smarty_tpl->tpl_vars['menuListCnt']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <?php }?>
		<!-- Pagination end -->
</div>
	<?php }} ?>
