
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
					{*<li><a  href="#paypalpro" aria-controls="paypalpro" role="tab" data-toggle="tab">PayPal Pro </a></li> *}
					<!-- <li><a  href="#authorize" aria-controls="authorize" role="tab" data-toggle="tab">Authorize.net </a> </li>
                    <li><a  href="#stand_credit_tab_content" aria-controls="stand_credit_tab_content" role="tab" data-toggle="tab">Stripe Payment </a> </li> -->
				</ul>
				<div class="tab-content">
				{*  --------------- STANDARD PAYPAL  --------------------- *}
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
                                <input class="radiobotton" type="radio" name="paypal_mode" id="live_mode" value="Live" {if $paymentsettingval.0.paypal_mode eq Live} checked="checked" {/if} />
                                <label for="live_mode">Live Mode</label>
                            </div>
                            <div class="radio-inline radio">	
    					       <input class="radiobotton" type="radio" name="paypal_mode" id="test_mode" value="Test" {if $paymentsettingval.0.paypal_mode eq Test} checked="checked" {/if}/>
                               <label for="test_mode">Test Mode</label>
                            </div>	
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Paypal Url </span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="paypal_url_live" id="paypal_url_live" value="{$paymentsettingval.0.paypal_url_live}" {if $paymentsettingval.0.paypal_mode eq Test} style="display:none" {/if} />
    						<input class="form-control" type="text" name="paypal_url_test" id="paypal_url_test" value="{$paymentsettingval.0.paypal_url_test}" {if $paymentsettingval.0.paypal_mode eq Live} style="display:none" {/if} />
    					    <div class="tooltip"><div class="HelpButton">?</div><span>Enter paypal Url</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Business Account</span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="business_live" id="business_live" value="{$paymentsettingval.0.business_live}" {if $paymentsettingval.0.paypal_mode eq Test} style="display:none" {/if} />
    						<input class="form-control" type="text" name="business_test" id="business_test" value="{$paymentsettingval.0.business_test}" {if $paymentsettingval.0.paypal_mode eq Live} style="display:none" {/if} />
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Business Account</span></div>
                        </div>
					</div>
				</div>
				
				{* -------------- PAYPAL PRO --------------- *}
				{*<div class="tab-pane form-horizontal" id="paypalpro" >
					
					<div class="form-group">
						<label class="control-label col-sm-4 font-normal">Paypal Pro Payment </label>
					    <div class="col-sm-4">
                            <div class="radio-inline radio">
        					   <input class="" type="radio" name="paypal_pro_mode" id="paypal_pro_live_mode" value="live" {if $paymentsettingval.0.paypal_pro_mode eq live} checked="checked" {/if} />
                               <label for="paypal_pro_live_mode">Live Mode</label>
                            </div>
                            <div class="radio-inline radio">
        					   <input class="" type="radio" name="paypal_pro_mode" id="paypal_pro_test_mode" value="sandbox" {if $paymentsettingval.0.paypal_pro_mode eq sandbox } checked="checked" {/if}/>
                               <label for="paypal_pro_test_mode">Test Mode</label>
                            </div>	

                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Paypal Pro Username</span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="pro_uname_live" id="pro_uname_live" value="{$paymentsettingval.0.pro_username_live}" {if $paymentsettingval.0.paypal_pro_mode eq sandbox} style="display:none" {/if} />
    						<input class="form-control" type="text" name="pro_uname_test" id="pro_uname_test" value="{$paymentsettingval.0.pro_username_test}" {if $paymentsettingval.0.paypal_pro_mode eq live} style="display:none" {/if} />
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter PayPal Pro Username</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Paypal Pro Password</span>
						<div class="col-sm-4">
    						<input class="form-control" type="password" name="pro_password_live" id="pro_password_live" value="{$paymentsettingval.0.pro_password_live}" {if $paymentsettingval.0.paypal_pro_mode eq sandbox} style="display:none" {/if} autocomplete="off"/>
    						<input class="form-control" type="password" name="pro_password_test" id="pro_password_test" value="{$paymentsettingval.0.pro_password_test}" {if $paymentsettingval.0.paypal_pro_mode eq live} style="display:none" {/if} autocomplete="off"/>
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter PayPal Pro Password</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Paypal Pro Signature</span>
						<div class="col-sm-4">
    				    	<input class="form-control" type="password" name="pro_sign_live" id="pro_sign_live" value="{$paymentsettingval.0.pro_signature_live}" {if $paymentsettingval.0.paypal_pro_mode eq sandbox} style="display:none" {/if} autocomplete="off"/>
    						<input class="form-control" type="password" name="pro_sign_test" id="pro_sign_test" value="{$paymentsettingval.0.pro_signature_test}" {if $paymentsettingval.0.paypal_pro_mode eq live} style="display:none" {/if} autocomplete="off"/>
						    <div class="tooltip"><div class="HelpButton">?</div><span>Enter PayPal Pro Signature</span></div>
                        </div>
					</div>
					
				</div>*}
				
				{* --------------- AUTHORIZE.NET ----------------- *}
				<!-- <div class="tab-pane form-horizontal" id="authorize" >
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Payment </span>
						<div class="col-sm-4">
                            <div class="radio-inline radio">
        						<input class="radiobotton" type="radio" name="authorized_mode" id="authorized_live_mode" value="Live" {if $paymentsettingval.0.authorized_mode eq Live} checked="checked" {/if} />
                                <label for="authorized_live_mode">Live Mode</label>
                            </div> 
                            <div class="radio-inline radio">
                                <input class="radiobotton" type="radio" name="authorized_mode" id="authorized_test_mode" value="Test" {if $paymentsettingval.0.authorized_mode eq Test} checked="checked" {/if}/>
                                <label for="authorized_test_mode">Test Mode</label>
                            </div>
    						
                        </div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Url </span>
						<div class="col-sm-4">
    						<input class="form-control" type="text" name="authorized_url_live" id="authorized_url_live" value="{$paymentsettingval.0.authorized_url_live}" {if $paymentsettingval.0.authorized_mode eq Test} style="display:none" {/if} />
    						<input class="form-control" type="text" name="authorized_url_test" id="authorized_url_test" value="{$paymentsettingval.0.authorized_url_test}" {if $paymentsettingval.0.authorized_mode eq Live} style="display:none" {/if} />
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Authorize.net Url</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Login key </span>
						<div class="col-sm-4">
    						<input class="form-control" type="password" name="authorized_login_key_live" id="authorized_login_key_live" value="{$paymentsettingval.0.authorized_login_key_live}" {if $paymentsettingval.0.authorized_mode eq Test} style="display:none" {/if} autocomplete="off"/>
    						<input class="form-control" type="password" name="authorized_login_key_test" id="authorized_login_key_test" value="{$paymentsettingval.0.authorized_login_key_test}" {if $paymentsettingval.0.authorized_mode eq Live} style="display:none" {/if} autocomplete="off"/>
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Authorize.net Login key</span></div>
                        </div>
					</div>
					
					<div class="form-group">
						<span class="control-label col-sm-4 font-normal">Authorize.net Transaction Key </span>
						<div class="col-sm-4">
    						<input class="form-control" type="password" name="authorized_transaction_key_live" id="authorized_transaction_key_live" value="{$paymentsettingval.0.authorized_transaction_key_live}" {if $paymentsettingval.0.authorized_mode eq Test} style="display:none" {/if} autocomplete="off"/>
    						<input class="form-control" type="password" name="authorized_transaction_key_test" id="authorized_transaction_key_test" value="{$paymentsettingval.0.authorized_transaction_key_test}" {if $paymentsettingval.0.authorized_mode eq Live} style="display:none" {/if} autocomplete="off"/>
    						<div class="tooltip"><div class="HelpButton">?</div><span>Enter Authorize.net Transaction key</span></div>
                        </div>
					</div>
					
				</div> -->
                {*------------- Credit Card -----------------*}
				<!-- <div class="tab-pane form-horizontal restaurantTabContent comTabClassContent" id="stand_credit_tab_content" >
					
					<div class="addPageCont">
						<span class="addPageRightFont">Card Payment <span class="color1"></span></span>
						<span class="colon1">:</span>
						<span class="radioBtn">
						<span class="labelcont"><input class="radiobotton" type="radio" name="credit_mode" id="credit_live_mode" value="live" {if $paymentsettingval.0.credit_mode eq 'live'} checked="checked" {/if} /><label class="labelfont" for="live_mode_lab">&nbsp;Live Mode</label> </span>
						<span class="labelcont"><input class="radiobotton" type="radio" name="credit_mode" id="credit_test_mode" value="test" {if $paymentsettingval.0.credit_mode eq 'test' } checked="checked" {/if}/><label class="labelfont" for="test_mode_lab">&nbsp;Test Mode</label></span>	
						</span>
						<div class="tooltip"><div class="HelpButton">?</div><span>Select any one mode</span></div>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">Stripe Key<span class="color1"></span></span>
						<span class="colon1">:</span>
						<input class="textbox" type="password" name="credit_stripe_live" id="credit_stripe_live" value="{$paymentsettingval.0.credit_stripe_live}" {if $paymentsettingval.0.credit_mode eq 'test'} style="display:none" {/if} autocomplete="off"/>
						<input class="textbox" type="password" name="credit_stripe_test" id="credit_stripe_test" value="{$paymentsettingval.0.credit_stripe_test}" {if $paymentsettingval.0.credit_mode eq 'live'} style="display:none" {/if} autocomplete="off"/>
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

