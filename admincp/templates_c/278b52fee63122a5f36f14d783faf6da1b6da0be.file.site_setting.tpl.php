<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-24 08:57:53
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/site_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:869066196580e13613b3f07-81815311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '278b52fee63122a5f36f14d783faf6da1b6da0be' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/site_setting.tpl',
      1 => 1473176365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '869066196580e13613b3f07-81815311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SuccessMessage' => 0,
    'site_adimin_value' => 0,
    'SITE_IMAGE_LOGO_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580e1361686435_62832424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e1361686435_62832424')) {function content_580e1361686435_62832424($_smarty_tpl) {?><div class="page-header">
    <h1 class="title">Site Setting</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">site setting</li>
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
	
		<div class="contain">
			
			<form name="site_seeting" method="post" onsubmit="return siteSeetingValidation();" enctype="multipart/form-data" action="site_setting.php">
			<input type="hidden" name="action" value="updateSiteSetting" />
			
			
			<ul class="nav nav-tabs settings_tab tabcolor5-bg">
				<li class="active"><a href="#site" id="siteContent" aria-controls="site" role="tab" data-toggle="tab">Site</a></li>
				<li><a href="#contact" id="ContactContent"  aria-controls="contact" role="tab" data-toggle="tab">Contact</a></li>
                
				<li><a href="#location" id="LocationContent" aria-controls="location" role="tab" data-toggle="tab">Location</a></li>
				<li><a href="#code" id="AnalyticContent" aria-controls="code" role="tab" data-toggle="tab">Analytics Code</a> </li>
				<li><a href="#currency" id="MailContent" aria-controls="currency" role="tab" data-toggle="tab">Currency &amp; Mail</a></li>
				
				<li><a href="#invoice" aria-controls="invoice" role="tab" data-toggle="tab">Invoice</a></li>
				<li><a href="#offline" aria-controls="offline" role="tab" data-toggle="tab">Offline</a> </li>
				<!-- <li><a href="#sms" aria-controls="sms" role="tab" data-toggle="tab">SMS</a> </li>
				<li><a href="#interfax" aria-controls="interfax" role="tab" data-toggle="tab">Inter Fax</a></li>
                <li><a href="#fb" aria-controls="fb" role="tab" data-toggle="tab">FB</a></li> -->
			</ul>
			
			<div class="tab-content clearfix">
			
			<div role="tabpanel" class="tab-pane active form-horizontal" id="site">
            	<div class="form-group">
                    <div class="col-sm-8">
			 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        <?php if ($_smarty_tpl->tpl_vars['SuccessMessage']->value!='') {?> <div <?php if ($_smarty_tpl->tpl_vars['SuccessMessage']->value!='') {?>class="successmsg"<?php }?>><?php echo $_smarty_tpl->tpl_vars['SuccessMessage']->value;?>
</div><?php }?>
			 	        <div id="errormsg" ></div>
                    </div>
                </div>
                
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal" for="sitename">Site Name <span class="color-red">*</span></label>
				    <div class="col-sm-4">
    					<input class="form-control" type="text" name="sitename" id="sitename" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['sitename']);?>
"  />
    					
                    </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Logo <span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="fileUpload" type="file" name="sitelogo" id="sitelogo"/>
                        <label for="sitelogo" class="btn btn-default btn-sm" >
			                 <i class="fa fa-folder-open"></i> Add Logo		
                        </label>
                        <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['sitelogo']!='') {?>
        					<div class="photoContainer">
        						<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_LOGO_URL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['sitelogo'];?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['sitename']);?>
 Logo" height="23" />
        					</div>
        				<?php }?>
                    </div>
					
				
				</div> 
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Fav Icon<span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="fileUpload" type="file" name="site_fav_icon" id="site_fav_icon" size="25" style="display:none;" />
						<label for="site_fav_icon" class="btn btn-default btn-sm" >
                          <i class="fa fa-folder-open"></i> Add Logo		
                        </label>
                        <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_fav_icon']!='') {?>
    					<div class="photoContainer">
    						<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_LOGO_URL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_fav_icon'];?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['sitename']);?>
 Fav Icon" />
    					</div>
    					<?php }?>
					</div>
					
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Records Per Page in User Side <span class="color-red">*</span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="user_page" id="user_page" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['user_page']);?>
"  />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Records Per Page in Admin Side <span class="color-red">*</span></label>
					<div class="col-sm-4">
    					<select class="form-control selectpicker" name="admin_page" id="admin_page" >
    						<option value="5"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="5") {?> selected="selected"<?php }?>>5</option>
    						<option value="10"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="10") {?> selected="selected"<?php }?>>10</option>
    						<option value="15"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="15") {?> selected="selected"<?php }?>>15</option>
    						<option value="20"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="20") {?> selected="selected"<?php }?>>20</option>
    						<option value="25"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="25") {?> selected="selected"<?php }?>>25</option>
    						<option value="30"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="30") {?> selected="selected"<?php }?>>30</option>
    						<option value="50"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="50") {?> selected="selected"<?php }?>>50</option>
    						<option value="100"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_page']=="100") {?> selected="selected"<?php }?>>100</option>  
    					</select>
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">User Friendly <span class="color-red">*</span></label>
					 <div class="col-sm-4">
						<div class="radio radio-inline" >
							<input class="" type="radio" name="userfriendly" id="userfriendly_yes" value="Y"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['userfriendly']=="Y") {?>checked="checked"<?php }?> />
							<label for="userfriendly_yes">Yes</label>
						</div>
						<div class="radio radio-inline" >
							<input class="" type="radio" name="userfriendly" id="userfriendly_no" value="N"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['userfriendly']=="N") {?>checked="checked"<?php }?> />
                            <label for="userfriendly_no">No</label>
                        </div>
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Pending Order Alert Ring<span class="color-red"></span></label>
					<div class="col-sm-4">
					   	<div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="admin_alert" id="admin_alert_Yes" value="Yes"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_pending_order_alert']=="Yes") {?>checked="checked"<?php }?> />
						     <label for="admin_alert_Yes"> Yes</label>
                        </div>
						<div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="admin_alert" id="admin_alert_No" value="No"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_pending_order_alert']=="No") {?>checked="checked"<?php }?> />
							<label for="admin_alert_No">No</label>
                        </div>
					   
                    </div>
				</div>
                
                
                <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Search By Option</label>
					<div class="col-sm-4">
				        <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchoption" id="searchnormal" value="Normal"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['searchoption']=="Normal") {?>checked="checked"<?php }?> />
							<label for="searchnormal">Normal</label>
                        </div>
					    <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchoption" id="searchgoogle" value="Google" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['searchoption']=="Google") {?>checked="checked"<?php }?> />
							<label for="searchgoogle">Google</label>
                        </div>
                    </div>
				</div>
                
                <div id="searchnormalgoogle" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['searchoption']=="Normal") {?>style="display:block" <?php } else { ?>style="display:none"<?php }?>>
                <div class="form-group">
                <label class="control-label col-sm-4 font-normal"></label>
					<div class="col-sm-4">
				        <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchbyoption" id="searchbycity" value="city"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['searchbyoption']=="city") {?>checked="checked"<?php }?> />
							<label for="searchbycity">City</label>
                        </div>
					    <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchbyoption" id="searchbyzip" value="zip" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['searchbyoption']=="zip") {?>checked="checked"<?php }?> />
							<label for="searchbyzip">Zip Code</label>
                        </div>
                    </div>
				</div>
                </div>                
                
                
                
                <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Google API Key <span class="color-red"></span></label>
				     <div class="col-sm-4">
					   <input class="form-control" type="text" name="gapi_key" id="gapi_key" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['google_api_key']);?>
"  />
					   
                    </div>
				</div>
				
			</div>
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="contact">
				<div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        <div id="errormsgContact" ></div>
                    </div>
                </div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Admin Name <span class="color-red">*</span></label>
				    <div class="col-sm-4">
					   <input class="form-control" type="text" name="admin_name" id="admin_name" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_name']);?>
"  />
					   <?php echo '<script'; ?>
 type="text/javascript">document.site_seeting.admin_name.focus();<?php echo '</script'; ?>
>
					   
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Admin Email <span class="color-red">*</span></label>
				    <div class="col-sm-4">
    					<input class="form-control" type="text" name="admin_email" id="admin_email" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['admin_email']);?>
"  />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Contact us Email <span class="color-red">*</span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="support_email" id="support_email" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['support_email']);?>
"  />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Invoice Email Id <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="invoice_email" id="invoice_email" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['invoice_email']);?>
" />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Contact Phone <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_phone" id="site_phone" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_phone']);?>
" />
    					
                    </div>
				</div>
				
			</div>
			
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="location">
				<div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        <div id="errormsgLocation" ></div>
                    </div>
                </div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Address<span class="color-red">*</span></label>
					<div class="col-sm-4">
    					<textarea class="form-control" rows="5" name="site_address" id="site_address" /><?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_address']);?>
</textarea>
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal ">Site City <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control no-padding textindent10" type="text" name="site_city" id="site_city" onkeyup="autoSuggestcity()" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_city']);?>
" />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Zipcode <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_zipcode" id="site_zipcode"  onfocus="autozipcode()" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_zipcode']);?>
" />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site State <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control no-padding textindent10" type="text" name="site_state" id="site_state" onfocus="sitestate()" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_state']);?>
" />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Country <span class="color-red"></span></label>
					<div class="col-sm-4">

    					<input class="form-control no-padding textindent10"  type="text" name="site_country" id="site_country" value= "<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_country']);?>
" onkeyup="autoSuggestCountry()"   />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Country Name in short <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_country_short" id="site_country_short" onfocus="autoSuggestCountryShort()" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_country_short']);?>
"    maxlength="2"  />
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Timezone <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_timezone" id="site_timezone" onfocus="autoSuggestSitetimezone()" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_timezone']);?>
"  />
    					
                    </div>
				</div>
			</div>
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="code">
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Google Analytics Code</label>
				    <div class="col-sm-4">  
    					<textarea class="form-control" rows="8" name="google_analytic_code" id="google_analytic_code" /><?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['google_analytic_code']);?>
</textarea>
    					
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Woopra Analytics Code</label>
					<div class="col-sm-4"> 
    					<textarea class="form-control" rows="8" name="woopra_analytic_code" id="woopra_analytic_code" /><?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['woopra_analytic_code']);?>
</textarea>
    					
                    </div>
				</div>
				
			</div>
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="currency" >
				<div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        <div id="errormsgMail" ></div>
                    </div>
                </div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Currency </label>
					<div class="col-sm-4">
						<div class="radio-inline radio">
                            <input class="" type="radio" name="currency_option" id="currency_display_img" value="img" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['currency_option']=='img') {?> checked="checked"<?php } else { ?>checked="checked"<?php }?> />
                            <label for="currency_display_img">Image</label>
                        </div>
						<div class="radio-inline radio">
                            <input class="" type="radio" name="currency_option" id="currency_display_sym" value="sym" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['currency_option']=='sym') {?> checked="checked" <?php }?> />
                            <label for="currency_display_sym">Symbol</label>
                        </div>
					</div>
				</div>
				
				<div class="form-group" id="currency_sym_display" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['currency_option']!='sym') {?> style="display: none;"<?php }?>>
					<label class="control-label col-sm-4 font-normal">Currency symbol <span class="color-red">*</span></label>
					<div class="col-sm-3">
						<div class="input-group">
							<input class="form-control" type="text" name="currency_sym" id="currency_sym" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['currency_symbol']);?>
"/> 
							<span class="input-group-addon">
								<!-- <input type="button" value="GetCurrency" id="currency" onclick="return autocurrencysymbol()"/> -->
								<i id="currency"  onclick="return autocurrencysymbol()">Getcurrency</i>
							</span>
						</div>
                    </div>
                     
				</div>
                <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Mail Option&nbsp;&nbsp;<span class="color-red">*</span></label>
					<div class="col-sm-4">
 						<div class="radio-inline radio">
        					<input class="" type="radio" name="mail_option" id="mail_option_smtp" value="smtp" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['mail_option']=='smtp') {?> checked="checked" <?php }?> onclick="$('#mail_option').css('display','block');" />
        				    <label for="mail_option_smtp">SMTP</label>
                        </div>
                        
						<div class="radio-inline radio">            
                            <input class="" type="radio" name="mail_option" id="mail_option_normal" value="normal" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['mail_option']=='normal') {?> checked="checked" <?php }?> onclick="$('#mail_option').css('display','none');" />
        					<label for="mail_option_normal">Normal</label>
                        </div>
					    
                    </div>
				</div>
                <div id="mail_option" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['mail_option']=='smtp') {?>style="display:block" <?php } else { ?>style="display:none"<?php }?>>
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Host <span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="text" name="smtp_host" id="smtp_host" value="<?php echo $_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['smtp_host'];?>
"  />
        					<?php echo '<script'; ?>
 type="text/javascript">document.site_seeting.smtp_host.focus();<?php echo '</script'; ?>
>
    					    
                        </div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Port&nbsp;&nbsp;<span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="text" name="smtp_port" id="smtp_port" value="<?php echo $_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['smtp_port'];?>
"  />
        					
                        </div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Username&nbsp;&nbsp;<span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="text" name="smtp_username" id="smtp_username" value="<?php echo $_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['smtp_username'];?>
"  />
        					
                        </div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Password&nbsp;&nbsp;<span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="password" name="smtp_password" id="smtp_password" value="<?php echo $_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['smtp_password'];?>
" autocomplete="off"/>
        					
                        </div>
    				</div>
    			</div>
				
			</div>
			
			
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="invoice">
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">VAT No <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_vat_no" id="site_vat_no" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_vat_no']);?>
" />
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">VAT (%) <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_vat_percentage" id="site_vat_percentage" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_vat_percentage']);?>
" />
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Credit card Fee (%) <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_cc_percentage" id="site_cc_percentage" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_cc_percentage']);?>
" />
                    </div>
				</div>
                
                <div class="form-group">
            		<label class="control-label col-sm-4 font-normal">Invoice Time Period <span class="color-red"></span></label>
            		<div class="col-sm-4">
                		<!-- <select class="form-control selectpicker" name="site_inv_setting" id="site_inv_setting">
                			
                			<option value="m2" <?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_inv_setting']=='m2') {?>selected="selected"<?php }?>>Monthly Twice</option>
                			
                		</select> -->
                		<input type="text" class="form-control" readonly value="Monthly Twice">
                		
                		<span class="errClass" id="resCommErr"></span>
                    </div>
            	</div>
				
			</div>	
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="offline">
			
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Offline Status </label>
					<div class="col-sm-4">
					   <div class="radio-inline radio">
							<input class="" type="radio" name="offline_status" id="offline_status_yes" value="Y"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['offline_status']=="Y") {?>checked="checked"<?php }?> />
							<label for="offline_status_yes">Yes</label>
                        </div>
						<div class="radio-inline radio">
							<input class="" type="radio" name="offline_status" id="offline_status_no" value="N"<?php if ($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['offline_status']=="N") {?>checked="checked"<?php }?> />
							<label for="offline_status_no">No</label>
                        </div>
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Offline Notes </label>
					<div class="col-sm-4">
    					<textarea class="form-control" rows="5" name="offline_notes" id="offline_notes" /><?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['offline_notes']);?>
</textarea>
                    </div>
				</div>
				
			</div>
			
			
			<div role="tabpanel" class="tab-pane form-horizontal" id="sms">
			
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Twilio Sid  <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_sms_apiID" id="site_sms_apiID" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_twiliosms_sid']);?>
" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Twilio Token <span class="color-red"></span></span>
					<div class="col-sm-4">
					<input class="form-control" type="text" name="site_sms_url" id="site_sms_url" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_twiliosms_token']);?>
" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Twilio From No <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_sms_username" id="site_sms_username" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_twiliosms_from_no']);?>
" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Password <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="password" name="site_sms_password" id="site_sms_password" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_sms_password']);?>
" autocomplete="off"/>
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Sender <span class="color-red"></span></span>
				    <div class="col-sm-4">
    					<input class="form-control" type="text" name="site_sms_sender" id="site_sms_sender" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_sms_sender']);?>
" />
                    </div>
				</div>
			
			</div>
				
			<div role="tabpanel" class="tab-pane form-horizontal" id="interfax" >
			
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">User Name <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_fax_username" id="site_fax_username" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_interfax_username']);?>
" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Password <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="password" name="site_fax_password" id="site_fax_password" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_interfax_password']);?>
" autocomplete="off"/>
                    </div>
				</div>
			
			</div>
            
            
    		<div role="tabpanel" class="tab-pane form-horizontal" id="fb">
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Id for Site <span class="color-red"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_appsid" id="site_fb_appsid" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_fb_appsid']);?>
" />
                    </div>
    			</div>
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Secret for Site <span class="color-red"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_appsecret" id="site_fb_appsecret" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_fb_appsecret']);?>
" />
                    </div>
    			</div>
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Id for Menu <span class="color1"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_menu_appsid" id="site_fb_menu_appsid" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_fb_menu_appsid']);?>
" />
                    </div>
    			</div>
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Secret for Menu <span class="color1"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_menu_appsecret" id="site_fb_menu_appsecret" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['site_adimin_value']->value[0]['site_fb_menu_appsecret']);?>
" />
                    </div>
    			</div>
            </div> 
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
			         <input type="submit" class="btn btn-default" name="" value="Submit" />
                </div>
            </div>
            </div>
			</form>
		</div>		
	
</div>







<?php }} ?>
