<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-20 18:33:51
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/settingPayment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5228828515767e9b74f6eb2-20006650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '735b0b6bfb8ebb96f006ba2dc773e4cb236296e1' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/settingPayment.tpl',
      1 => 1466424143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5228828515767e9b74f6eb2-20006650',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'paymentsettingval' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767e9b763f7d9_61301043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767e9b763f7d9_61301043')) {function content_5767e9b763f7d9_61301043($_smarty_tpl) {?>
<div class="page-header">
    <h1 class="title">Setting Payment</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">setting Payment</li>
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
<a class="setting_button visible-xs" href="#">
	<i class="fa fa-bars"></i>
</a>
<div class="adminRight">
		<div class="riteContWrap1">
			<div id="errormsg"></div>
			
			<form name="paymentSettingsfrm" method="post"  action="settingPayment.php">
				<input type="hidden" name="action" value="payment_update" />
				<ul class="nav nav-tabs settings_tab tabcolor5-bg">
					<li class="active"><a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab">Standard PayPal </a></li>
					
					<!-- <li><a  href="#authorize" aria-controls="authorize" role="tab" data-toggle="tab">Authorize.net </a> </li>
                    <li><a  href="#stand_credit_tab_content" aria-controls="stand_credit_tab_content" role="tab" data-toggle="tab">Stripe Payment </a> </li> -->
				</ul>
				<div class="tab-content">
				
				<div class="tab-pane active form-horizontal" id="paypal" >
                    <div class="form-group">
                        <div class="col-sm-8">
    			 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                        </div>
                    </div>
					<div class="form-group">
						<label class="control-label col-sm-4 font-normal">Paypal Payment </label>
				    	<div class="col-sm-4">
        					<div class="radio-inline radio">	
                                <input class="radiobotton" type="radio" name="paypal_mode" id="live_mode" value="Live" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_mode']=='Live') {?> checked="checked" <?php }?> />
                                <label for="live_mode">Live Mode</label>
                            </div>
                            <div class="radio-inline radio">	
    					       <input class="radiobotton" type="radio" name="paypal_mode" id="test_mode" value="Test" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_mode']=='Test') {?> checked="checked" <?php }?>/>
                               <label for="test_mode">Test Mode</label>
                            </div>	
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Paypal Url </span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="paypal_url_live" id="paypal_url_live" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_url_live'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_mode']=='Test') {?> style="display:none" <?php }?> />
    						<input class="form-control" type="text" name="paypal_url_test" id="paypal_url_test" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_url_test'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_mode']=='Live') {?> style="display:none" <?php }?> />
    					    <div class="tooltip"><div class="HelpButton">?</div><span>Enter paypal Url</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Business Account</span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="business_live" id="business_live" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['business_live'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_mode']=='Test') {?> style="display:none" <?php }?> />
    						<input class="form-control" type="text" name="business_test" id="business_test" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['business_test'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['paypal_mode']=='Live') {?> style="display:none" <?php }?> />
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Business Account</span></div>
                        </div>
					</div>
				</div>
				
				
				
				
				
				<!-- <div class="tab-pane form-horizontal" id="authorize" >
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Payment </span>
						<div class="col-sm-4">
                            <div class="radio-inline radio">
        						<input class="radiobotton" type="radio" name="authorized_mode" id="authorized_live_mode" value="Live" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Live') {?> checked="checked" <?php }?> />
                                <label for="authorized_live_mode">Live Mode</label>
                            </div> 
                            <div class="radio-inline radio">
                                <input class="radiobotton" type="radio" name="authorized_mode" id="authorized_test_mode" value="Test" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Test') {?> checked="checked" <?php }?>/>
                                <label for="authorized_test_mode">Test Mode</label>
                            </div>
    						
                        </div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Url </span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="authorized_url_live" id="authorized_url_live" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_url_live'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Test') {?> style="display:none" <?php }?> />
    						<input class="form-control" type="text" name="authorized_url_test" id="authorized_url_test" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_url_test'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Live') {?> style="display:none" <?php }?> />
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Authorize.net Url</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Login key </span>
						<div class="col-sm-4">
    						<input class="form-control" type="password" name="authorized_login_key_live" id="authorized_login_key_live" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_login_key_live'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Test') {?> style="display:none" <?php }?> autocomplete="off"/>
    						<input class="form-control" type="password" name="authorized_login_key_test" id="authorized_login_key_test" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_login_key_test'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Live') {?> style="display:none" <?php }?> autocomplete="off"/>
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Authorize.net Login key</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Transaction Key </span>
						<div class="col-sm-4">
    						<input class="form-control" type="password" name="authorized_transaction_key_live" id="authorized_transaction_key_live" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_transaction_key_live'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Test') {?> style="display:none" <?php }?> autocomplete="off"/>
    						<input class="form-control" type="password" name="authorized_transaction_key_test" id="authorized_transaction_key_test" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_transaction_key_test'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['authorized_mode']=='Live') {?> style="display:none" <?php }?> autocomplete="off"/>
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Authorize.net Transaction key</span></div>
                        </div>
					</div>
					
				</div> -->
                
				<!-- <div class="tab-pane form-horizontal restaurantTabContent comTabClassContent" id="stand_credit_tab_content" >
					
					<div class="addPageCont">
						<span class="addPageRightFont">Card Payment <span class="color1"></span></span>
						<span class="colon1">:</span>
						<span class="radioBtn">
						<span class="labelcont"><input class="radiobotton" type="radio" name="credit_mode" id="credit_live_mode" value="live" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['credit_mode']=='live') {?> checked="checked" <?php }?> /><label class="labelfont" for="live_mode_lab">&nbsp;Live Mode</label> </span>
						<span class="labelcont"><input class="radiobotton" type="radio" name="credit_mode" id="credit_test_mode" value="test" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['credit_mode']=='test') {?> checked="checked" <?php }?>/><label class="labelfont" for="test_mode_lab">&nbsp;Test Mode</label></span>	
						</span>
						<div class="tooltip"><div class="HelpButton">?</div><span>Select any one mode</span></div>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">Stripe Key<span class="color1"></span></span>
						<span class="colon1">:</span>
						<input class="textbox" type="password" name="credit_stripe_live" id="credit_stripe_live" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['credit_stripe_live'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['credit_mode']=='test') {?> style="display:none" <?php }?> autocomplete="off"/>
						<input class="textbox" type="password" name="credit_stripe_test" id="credit_stripe_test" value="<?php echo $_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['credit_stripe_test'];?>
" <?php if ($_smarty_tpl->tpl_vars['paymentsettingval']->value[0]['credit_mode']=='live') {?> style="display:none" <?php }?> autocomplete="off"/>
						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Stripe Key</span></div>
					</div>
					
				</div> -->
				</div>
				
				<div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <input type="submit" class="btn btn-default" name="" value="Submit"/>
                    </div>
                </div>
				
			</form>
		</div>		
   </div>	

<?php }} ?>
