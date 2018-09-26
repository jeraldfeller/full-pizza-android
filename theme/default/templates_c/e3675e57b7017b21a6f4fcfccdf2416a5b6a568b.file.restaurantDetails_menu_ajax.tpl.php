<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-05 21:38:35
         compiled from "C:\wamp\www\theme\default\templates\restaurantDetails_menu_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3657584e01e17dea56-91033210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3675e57b7017b21a6f4fcfccdf2416a5b6a568b' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\restaurantDetails_menu_ajax.tpl',
      1 => 1496715248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3657584e01e17dea56-91033210',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_584e01e193cac9_36287214',
  'variables' => 
  array (
    'categoryList' => 0,
    'catnam' => 0,
    'searchname' => 0,
    'objSearchDetails' => 0,
    'menuCategoryList' => 0,
    'SITE_IMAGE_URL' => 0,
    'currency' => 0,
    'LANG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e01e193cac9_36287214')) {function content_584e01e193cac9_36287214($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\wamp\\www\\includes\\smarty\\plugins\\modifier.replace.php';
?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['name'] = 'catdet';
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['catdet']['total']);
?>
<?php $_smarty_tpl->tpl_vars['catnam'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['catname'], null, 0);?>

<div class="categoryContain">
	<a class="menus_detailsLink" id="catname_<?php echo preg_replace("/[^a-zA-Z0-9]/",'',$_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['catname']);?>
" name="catname_<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['catnam']->value,' ','');?>
"></a>
	<?php if ($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['catname']!='') {?>
	<div class="accordion">
		<h1>
			<span class="detailsGreenbg borderbox">
				<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['catname']));?>

			</span>
		</h1>
		<?php $_smarty_tpl->tpl_vars['menuCategoryList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objSearchDetails']->value->categoryMenuList($_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['catdet']['index']]['menu_category'],$_smarty_tpl->tpl_vars['searchname']->value), null, 0);?>
		<div class="new">
			<div class="detailsMiddle1Contain">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menuCategoryList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
				
				
					<div class="detailsMiddle1ContGreen borderbox <?php if (!($_smarty_tpl->getVariable('smarty')->value['section']['menu']['rownum'] % 2)) {?> menubg1<?php }?>">
						<div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 pad0 hidden-xxs">
							<div class="menuImage borderbox col-lg-12 col-sm-12 col-xs-12 zero_padding">
								<img src="<?php echo $_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_photo'];?>
" alt="food Image" title="food Image" />
							</div>
						</div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 paddRight0">
							<div class="detailsMidFirstRed col-lg-12 col-sm-12 col-xs-8 col-md-12 zero_padding">
							<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']!='') {?>
								<span class="detailsMidFirstRed detailLine">
									<b class="leaf"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_name']));?>

									<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_popular_dish']=='Yes') {?>
									&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/star1.png" alt="Popular Dish" title="Popular Dish"  class="leaf" />
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_type']=='veg') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/vegmenu.png" alt="" title="" class="leaf" /> <?php }?>
									<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_type']=='nonveg') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/nonveg.png" alt="" title="" class="leaf" /> <?php }?>
									<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_spicy']=='Yes') {?>
									&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/spicy.png" alt="Spicy Dish" title="Spicy Dish"  class="leaf" />
									<?php }?>
									</b>
								</span>
								<?php }?>
							</div>	
							<div class="add_menu_btn col-md-12 col-sm-12 col-xs-12 pad0  ">
								<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description']!=''||$_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description']=='') {?>
								<span class="menuDescription col-md-8 col-sm-8 col-xs-12 zero_padding tribledots"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_description']));?>
</span><?php }?>
								
								<div class="col-md-4 col-xs-12 col-sm-4 zero_padding">
									<span class="detailsMidFirstRedPrice col-lg-10 col-md-9  col-xs-10 zero_padding">
										<?php if ($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_price']!='0.00') {?>
											<span class="detailsMidContPrice col-md-12 zero_padding">
											<b>	<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo stripslashes($_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_price']);?>
</b>
											</span>
										<?php }?>
									</span>
									<a onclick="menuOrder(<?php echo $_smarty_tpl->tpl_vars['menuCategoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
,<?php echo $_REQUEST['resid'];?>
)" data-target="#orderpop" href="javascript:void(0);" data-toggle="modal" class="add_menu_cart"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/add_menu.png"  alt="add button"/></a>
								</div>
							</div>
						</div>
					</div>
					
				<?php endfor; endif; ?>
		
			</div>
		</div>
	</div>
	<?php }?>
</div>
<?php endfor; else: ?>
	<div class="menu-norecord"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_no_rec_found'];?>
</div>
<?php endif; ?><?php }} ?>
