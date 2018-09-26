<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 02:00:42
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/voucherAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26777433857b4c9721766c5-38857123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22374f64c9a0b29a1cec74a85d325f4f485cfd6a' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/voucherAddEdit.tpl',
      1 => 1466424138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26777433857b4c9721766c5-38857123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restname' => 0,
    'voucherDet' => 0,
    'restaurantSearchList' => 0,
    'resList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c9725b4dd7_87294601',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c9725b4dd7_87294601')) {function content_57b4c9725b4dd7_87294601($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title">Manage Voucher <?php if ($_GET['vid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Manage Voucher <?php if ($_GET['vid']) {?> - <?php echo $_smarty_tpl->tpl_vars['restname']->value;
}?></li>
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

           
            <form name="voucherAddEdit" method="post" action="" class="form-horizontal col-sm-12">
                <input type="hidden" name="AddEdit" value="<?php echo $_GET['vid'];?>
" />
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div id="errormsg"></div>
                    </div>
                </div>
                <div class="form-group">
                    <span class="control-label col-sm-4">Voucher Code <span class="color-red">*</span></span>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="voucherCode" id="voucherCode" value="<?php echo $_smarty_tpl->tpl_vars['voucherDet']->value[0]['voucher_name'];?>
" />
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Type Of Use <span class="color-red">*</span></span>
                   <div class="col-sm-4">
                        <div class="radio-inline radio" >
                            <input type="radio" name="useType" id="single" value="S" class="" <?php if ($_smarty_tpl->tpl_vars['voucherDet']->value[0]['use_type']!='M') {?>checked="checked"<?php }?>/> 
                            <label for="single"> Single </label>
                        </div>
                         <div class="radio-inline radio">
                            <input type="radio" name="useType" id="multiple" value="M" class=""  <?php if ($_smarty_tpl->tpl_vars['voucherDet']->value[0]['use_type']=='M') {?>checked="checked"<?php }?>/> 
                            <label for="multiple"> Multiple </label>
                        </div>
                      
                   
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Type Of Off <span class="color-red">*</span></span>
                    <div class="pull-left padding-l-r-15">
                        <div class="radio-inline radio">
                            <input type="radio" name="offType" id="Price" value="Price" class="" <?php if ($_smarty_tpl->tpl_vars['voucherDet']->value[0]['off_type']!='Percentage') {?>checked="checked"<?php }?>/>  
                            <label for="Price">Price</label>
                        </div>
                        <div class="radio-inline radio">
                            <input type="radio" name="offType" id="Percentage" value="Percentage" class="radiobotton" <?php if ($_smarty_tpl->tpl_vars['voucherDet']->value[0]['off_type']=='Percentage') {?>checked="checked"<?php }?>/> 
                            <label for="Percentage">Percentage</label>
                        </div>
                     </div>  
                      <div class="col-sm-1 no-padding-left"> 
                         <input type="text" name="offPrice" id="offPrice" value="<?php echo $_smarty_tpl->tpl_vars['voucherDet']->value[0]['off_price_percentage'];?>
" class="form-control numericfield"/>
                     </div>
                   
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Valid From <span class="color-red">*</span></span>
                     <div class="col-sm-4">
                        <div class="input-group">
                            <input class="form-control" type="text" name="validFrom" id="valid_from" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherDet']->value[0]['valid_from'],"%d-%m-%Y");?>
" />
                        	<span class="input-group-addon">
    							<span class="fa fa-calendar"></span>
    						</span>
                         </div>    
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Valid To <span class="color-red">*</span></span>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <input class="form-control" type="text" name="validTo" id="valid_to" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['voucherDet']->value[0]['valid_to'],"%d-%m-%Y");?>
" />
                        <span class="input-group-addon">
    						<span class="fa fa-calendar"></span>
    						</span>
                         </div> 
                    </div>
                </div>
                
                <div class="form-group">
                    <span class="control-label col-sm-4">Assign Restaurant <span class="color-red">*</span></span>
                    <div class="col-sm-4">
                        <select class="form-control" name="restaurantList[]" id="restaurantList" multiple="multiple" size="15"> 
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["res"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['name'] = "res";
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurantSearchList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["res"]['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['restaurantSearchList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['res']['index']]['restaurant_id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['resid'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['name'] = 'resid';
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['resList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['resid']['total']);
if ($_smarty_tpl->tpl_vars['resList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['resid']['index']]['restaurant_id']==$_smarty_tpl->tpl_vars['restaurantSearchList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['res']['index']]['restaurant_id']) {?>selected="selected"<?php }
endfor; endif; ?>><?php echo stripcslashes($_smarty_tpl->tpl_vars['restaurantSearchList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['res']['index']]['restaurant_name']);?>
</option>
                            <?php endfor; endif; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <input class="btn btn-default" type="button" value="Submit" onclick="return AddEditVoucher(<?php if ($_GET['vid']!='') {?>1<?php } elseif ($_GET['vid']=='') {?>0<?php }?>);"/>
                        <a class="btn" href="voucherManage.php">Cancel</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

 <?php }} ?>
