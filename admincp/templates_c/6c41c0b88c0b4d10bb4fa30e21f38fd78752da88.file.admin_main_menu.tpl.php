<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 19:49:55
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8691086365806c333196ab7-98891450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c41c0b88c0b4d10bb4fa30e21f38fd78752da88' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_menu.tpl',
      1 => 1466432193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8691086365806c333196ab7-98891450',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mainModulesList' => 0,
    'objAdmin' => 0,
    'modulesList' => 0,
    'userModulesList' => 0,
    'subModulesList' => 0,
    'userUsedModulesList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806c33336ee61_20185184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806c33336ee61_20185184')) {function content_5806c33336ee61_20185184($_smarty_tpl) {?>	<ul class="sidebar-panel nav">
        <?php if ($_SESSION['adminid']=='1') {?>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['name'] = "menulist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mainModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total']);
?>
                <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']!='13') {?>
                <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['menucount']>0) {?>
                    <?php $_smarty_tpl->tpl_vars['modulesList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objAdmin']->value->selectSubMenu($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']), null, 0);?>
                <?php }?>
                
                <li>
                    
                    <a href="<?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['page_url']!='') {
echo $_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['page_url'];
} else { ?>javascript:void(0);<?php }?>">
                        <span class="icon color8">
                            <i class="fa fa-th-large"></i>
                        </span>
                        <?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['modulesname']));?>
 
                        <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['menucount']>0) {?><i class="caret"></i><?php }?>
                    </a>

                    <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['menucount']>0) {?>
                        <ul>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['name'] = "sub";
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['modulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total']);
?>
                                 <li><a href="<?php if ($_smarty_tpl->tpl_vars['modulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['page_url']!='') {
echo $_smarty_tpl->tpl_vars['modulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['page_url'];
} else { ?>javascript:void(0);<?php }?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['modulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['modulesname']));?>
</a></li>
                            <?php endfor; endif; ?>
                        </ul>
                    <?php }?>
                </li>
                <?php }?>
            <?php endfor; endif; ?>
        <?php } else { ?>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['name'] = "menulist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mainModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total']);
?>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['name'] = "userlist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total']);
?>
                    <?php if ($_smarty_tpl->tpl_vars['userModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['userlist']['index']]['modules']==$_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']!='13') {?>
                        <li><a href="<?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['page_url']!='') {
echo $_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['page_url'];
} else { ?>javascript:void(0);<?php }?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['modulesname']));?>

                         <span class="icon color8">
                            <i class="fa fa-th-large"></i>
                        </span>
                        <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['menucount']>0) {?><i class="caret"></i><?php }?></a>                        
                            <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['menucount']>0) {?>
                                
                                <?php $_smarty_tpl->tpl_vars['subModulesList'] = new Smarty_variable($_smarty_tpl->tpl_vars['objAdmin']->value->selectSubMenu($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']), null, 0);?>
                                
                                <ul>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['name'] = "sub";
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['subModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total']);
?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['name'] = "usedlist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userUsedModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total']);
?>
                                            <?php if ($_smarty_tpl->tpl_vars['userUsedModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['usedlist']['index']]['modules']==$_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['id']) {?>
                                                <li><a href="<?php if ($_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['page_url']!='') {
echo $_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['page_url'];
} else { ?>javascript:void(0);<?php }?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['modulesname']));?>
</a></li>
                                            <?php }?>
                                        <?php endfor; endif; ?>
                                    <?php endfor; endif; ?>
                                </ul>
                            <?php }?>
                        </li>
                        <?php }?>
                    <?php }?>
                <?php endfor; endif; ?>
            <?php endfor; endif; ?>
        <?php }?>
    </ul>  

<?php }} ?>
