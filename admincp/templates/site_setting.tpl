<div class="page-header">
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
                {*<a href="#mail" aria-controls="mail" role="tab" data-toggle="tab">Mail</a>*}
				<li><a href="#location" id="LocationContent" aria-controls="location" role="tab" data-toggle="tab">Location</a></li>
				<li><a href="#code" id="AnalyticContent" aria-controls="code" role="tab" data-toggle="tab">Analytics Code</a> </li>
				<li><a href="#currency" id="MailContent" aria-controls="currency" role="tab" data-toggle="tab">Currency &amp; Mail</a></li>
				{*<a href="#Metatag" aria-controls="metatag" role="tab" data-toggle="tab">Meta Tag</a>*}
				<li><a href="#invoice" aria-controls="invoice" role="tab" data-toggle="tab">Invoice</a></li>
				<li><a href="#offline" aria-controls="offline" role="tab" data-toggle="tab">Offline</a> </li>
				<!-- <li><a href="#sms" aria-controls="sms" role="tab" data-toggle="tab">SMS</a> </li>
				<li><a href="#interfax" aria-controls="interfax" role="tab" data-toggle="tab">Inter Fax</a></li>
                <li><a href="#fb" aria-controls="fb" role="tab" data-toggle="tab">FB</a></li> -->
			</ul>
			
			<div class="tab-content clearfix">
			{*-------------------- Site Info ---------------------------------------*}
			<div role="tabpanel" class="tab-pane active form-horizontal" id="site">
            	<div class="form-group">
                    <div class="col-sm-8">
			 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        {if $SuccessMessage neq ''} <div {if $SuccessMessage neq ''}class="successmsg"{/if}>{$SuccessMessage}</div>{/if}
			 	        <div id="errormsg" ></div>
                    </div>
                </div>
                
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal" for="sitename">Site Name <span class="color-red">*</span></label>
				    <div class="col-sm-4">
    					<input class="form-control" type="text" name="sitename" id="sitename" value="{$site_adimin_value.0.sitename|stripslashes}"  />
    					{*<div class=""><div class="HelpButton">?</div><span>Enter the Site Name</span></div>*}
                    </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Logo <span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="fileUpload" type="file" name="sitelogo" id="sitelogo"/>
                        <label for="sitelogo" class="btn btn-default btn-sm" >
			                 <i class="fa fa-folder-open"></i> Add Logo		
                        </label>
                        {if $site_adimin_value.0.sitelogo neq  ''}
        					<div class="photoContainer">
        						<img src="{$SITE_IMAGE_LOGO_URL}/{$site_adimin_value.0.sitelogo}" alt="{$site_adimin_value.0.sitename|stripslashes} Logo" height="23" />
        					</div>
        				{/if}
                    </div>
					
				
				</div> 
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Fav Icon<span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="fileUpload" type="file" name="site_fav_icon" id="site_fav_icon" size="25" style="display:none;" />
						<label for="site_fav_icon" class="btn btn-default btn-sm" >
                          <i class="fa fa-folder-open"></i> Add Logo		
                        </label>
                        {if $site_adimin_value.0.site_fav_icon neq  ''}
    					<div class="photoContainer">
    						<img src="{$SITE_IMAGE_LOGO_URL}/{$site_adimin_value.0.site_fav_icon}" alt="{$site_adimin_value.0.sitename|stripslashes} Fav Icon" />
    					</div>
    					{/if}
					</div>
					
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Records Per Page in User Side <span class="color-red">*</span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="user_page" id="user_page" value="{$site_adimin_value.0.user_page|stripslashes}"  />
    					{*<div class=""><div class="HelpButton">?</div><span>No. of records per page in Admin side</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Records Per Page in Admin Side <span class="color-red">*</span></label>
					<div class="col-sm-4">
    					<select class="form-control selectpicker" name="admin_page" id="admin_page" >
    						<option value="5"{if $site_adimin_value.0.admin_page eq "5"} selected="selected"{/if}>5</option>
    						<option value="10"{if $site_adimin_value.0.admin_page eq "10"} selected="selected"{/if}>10</option>
    						<option value="15"{if $site_adimin_value.0.admin_page eq "15"} selected="selected"{/if}>15</option>
    						<option value="20"{if $site_adimin_value.0.admin_page eq "20"} selected="selected"{/if}>20</option>
    						<option value="25"{if $site_adimin_value.0.admin_page eq "25"} selected="selected"{/if}>25</option>
    						<option value="30"{if $site_adimin_value.0.admin_page eq "30"} selected="selected"{/if}>30</option>
    						<option value="50"{if $site_adimin_value.0.admin_page eq "50"} selected="selected"{/if}>50</option>
    						<option value="100"{if $site_adimin_value.0.admin_page eq "100"} selected="selected"{/if}>100</option>  
    					</select>
    					{*}<div class=""><div class="HelpButton">?</div><span>No. of records per page in User side</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">User Friendly <span class="color-red">*</span></label>
					 <div class="col-sm-4">
						<div class="radio radio-inline" >
							<input class="" type="radio" name="userfriendly" id="userfriendly_yes" value="Y"{if $site_adimin_value.0.userfriendly eq "Y"}checked="checked"{/if} />
							<label for="userfriendly_yes">Yes</label>
						</div>
						<div class="radio radio-inline" >
							<input class="" type="radio" name="userfriendly" id="userfriendly_no" value="N"{if $site_adimin_value.0.userfriendly eq "N"}checked="checked"{/if} />
                            <label for="userfriendly_no">No</label>
                        </div>
    					{*<div class=""><div class="HelpButton">?</div><span>Yes - http://domain.com/register<br /> No - http://domain.com/register.php</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Pending Order Alert Ring<span class="color-red"></span></label>
					<div class="col-sm-4">
					   	<div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="admin_alert" id="admin_alert_Yes" value="Yes"{if $site_adimin_value.0.admin_pending_order_alert eq "Yes"}checked="checked"{/if} />
						     <label for="admin_alert_Yes"> Yes</label>
                        </div>
						<div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="admin_alert" id="admin_alert_No" value="No"{if $site_adimin_value.0.admin_pending_order_alert eq "No"}checked="checked"{/if} />
							<label for="admin_alert_No">No</label>
                        </div>
					   {*<div class=""><div class="HelpButton">?</div><span>Yes - Ring alert sound<br /> No - Not ring alert sound</span></div>*}
                    </div>
				</div>
                
                {* -------------- Search by Option -------------------- *}
                <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Search By Option</label>
					<div class="col-sm-4">
				        <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchoption" id="searchnormal" value="Normal"{if $site_adimin_value.0.searchoption eq "Normal"}checked="checked"{/if} />
							<label for="searchnormal">Normal</label>
                        </div>
					    <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchoption" id="searchgoogle" value="Google" {if $site_adimin_value.0.searchoption eq "Google"}checked="checked"{/if} />
							<label for="searchgoogle">Google</label>
                        </div>
                    </div>
				</div>
                
                <div id="searchnormalgoogle" {if $site_adimin_value.0.searchoption eq "Normal"}style="display:block" {else}style="display:none"{/if}>
                <div class="form-group">
                <label class="control-label col-sm-4 font-normal"></label>
					<div class="col-sm-4">
				        <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchbyoption" id="searchbycity" value="city"{if $site_adimin_value.0.searchbyoption eq "city"}checked="checked"{/if} />
							<label for="searchbycity">City</label>
                        </div>
					    <div class="radio-inline radio" >
							<input class="radiobotton" type="radio" name="searchbyoption" id="searchbyzip" value="zip" {if $site_adimin_value.0.searchbyoption eq "zip"}checked="checked"{/if} />
							<label for="searchbyzip">Zip Code</label>
                        </div>
                    </div>
				</div>
                </div>                
                
                
                {* --------------  Google API Key -------------------- *}
                <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Google API Key <span class="color-red"></span></label>
				     <div class="col-sm-4">
					   <input class="form-control" type="text" name="gapi_key" id="gapi_key" value="{$site_adimin_value.0.google_api_key|stripslashes}"  />
					   {*<div class=""><div class="HelpButton">?</div><span>Google API key for send order notification to android</span></div>*}
                    </div>
				</div>
				
			</div>
			
			{*---------------- Contact Info -------------------------*}
			<div role="tabpanel" class="tab-pane form-horizontal" id="contact">
				<div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        <div id="errormsgContact" ></div>
                    </div>
                </div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Admin Name <span class="color-red">*</span></label>
				    <div class="col-sm-4">
					   <input class="form-control" type="text" name="admin_name" id="admin_name" value="{$site_adimin_value.0.admin_name|stripslashes}"  />
					   <script type="text/javascript">document.site_seeting.admin_name.focus();</script>
					   {*<div class="tooltip span3"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Admin Email <span class="color-red">*</span></label>
				    <div class="col-sm-4">
    					<input class="form-control" type="text" name="admin_email" id="admin_email" value="{$site_adimin_value.0.admin_email|stripslashes}"  />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Admin Email is used to send an email to user</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Contact us Email <span class="color-red">*</span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="support_email" id="support_email" value="{$site_adimin_value.0.support_email|stripslashes}"  />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Support Email is used to send an contact us email from user</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Invoice Email Id <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="invoice_email" id="invoice_email" value="{$site_adimin_value.0.invoice_email|stripslashes}" />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Invoice Email Id</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Contact Phone <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_phone" id="site_phone" value="{$site_adimin_value.0.site_phone|stripslashes}" />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site Phone</span></div>*}
                    </div>
				</div>
				
			</div>
			{*---------------- Mail Info - SMTP setting -------------------------*}
			{*<div role="tabpanel" class="tab-pane form-horizontal" id="sitemailinfo_content" >
				
                <div class="addPageCont">
					<span class="addPageRightFont">Mail Option&nbsp;&nbsp;<span class="color-red">*</span></span>
					<span class="colon1">:</span>
                    <span class="radioBtn">
						<span class="labelcont">{*<pre>{$site_adimin_value|print_r}</pre>
        					<input class="" type="radio" name="mail_option" id="mail_option_smtp" value="smtp" {if $site_adimin_value.0.mail_option eq 'smtp'} checked="checked" {/if} onclick="$('#mail_option').css('display','block');" />
        				    <label class="labelfont" for="smtp">&nbsp;SMTP</label>
                        </span>
						<span class="labelcont">            
                            <input class="" type="radio" name="mail_option" id="mail_option_normal" value="normal" {if $site_adimin_value.0.mail_option eq 'normal'} checked="checked" {/if} onclick="$('#mail_option').css('display','none');" />
        					   <label class="labelfont" for="normal">&nbsp;Normal</label>
                        </span>
                    </span>       
					<script type="text/javascript">document.site_seeting.mail_option.focus();</script>
				</div>
                <div id="mail_option" {if $site_adimin_value.0.mail_option eq 'smtp'}style="display:block" {else}style="display:none"{/if}>
    				<div class="addPageCont">
    					<span class="addPageRightFont">SMTP Host&nbsp;&nbsp;<span class="color-red">*</span></span>
    					<span class="colon1">:</span>
    					<input class="textbox" type="text" name="smtp_host" id="smtp_host" value="{$site_adimin_value.0.smtp_host}"  />
    					<script type="text/javascript">document.site_seeting.smtp_host.focus();</script>
    				</div>
    				
    				<div class="addPageCont">
    					<span class="addPageRightFont">SMTP Port&nbsp;&nbsp;<span class="color-red">*</span></span>
    					<span class="colon1">:</span>
    					<input class="textbox" type="text" name="smtp_port" id="smtp_port" value="{$site_adimin_value.0.smtp_port}"  />
    				</div>
    				
    				<div class="addPageCont">
    					<span class="addPageRightFont">SMTP Username&nbsp;&nbsp;<span class="color-red">*</span></span>
    					<span class="colon1">:</span>
    					<input class="textbox" type="text" name="smtp_username" id="smtp_username" value="{$site_adimin_value.0.smtp_username}"  />
    					<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter SMTP Username</span></div>
    				</div>
    				
    				<div class="addPageCont">
    					<span class="addPageRightFont">SMTP Password&nbsp;&nbsp;<span class="color-red">*</span></span>
    					<span class="colon1">:</span>
    					<input class="textbox" type="password" name="smtp_password" id="smtp_password" value="{$site_adimin_value.0.smtp_password}" autocomplete="off"/>
    				</div>
    			</div>
            </div>*}
			{*---------------- Site Location Info --------------------*}
			<div role="tabpanel" class="tab-pane form-horizontal" id="location">
				<div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
			 	        <div id="errormsgLocation" ></div>
                    </div>
                </div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Address<span class="color-red">*</span></label>
					<div class="col-sm-4">
    					<textarea class="form-control" rows="5" name="site_address" id="site_address" />{$site_adimin_value.0.site_address|stripslashes}</textarea>
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site Address</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal ">Site City <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control no-padding textindent10" type="text" name="site_city" id="site_city" onkeyup="autoSuggestcity()" value="{$site_adimin_value.0.site_city|stripslashes}" />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site City</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Zipcode <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_zipcode" id="site_zipcode"  onfocus="autozipcode()" value="{$site_adimin_value.0.site_zipcode|stripslashes}" />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site Zipcode</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site State <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control no-padding textindent10" type="text" name="site_state" id="site_state" onfocus="sitestate()" value="{$site_adimin_value.0.site_state|stripslashes}" />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site State</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Country <span class="color-red"></span></label>
					<div class="col-sm-4">

    					<input class="form-control no-padding textindent10"  type="text" name="site_country" id="site_country" value= "{$site_adimin_value.0.site_country|stripslashes}" onkeyup="autoSuggestCountry()"   />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site Country</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Country Name in short <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_country_short" id="site_country_short" onfocus="autoSuggestCountryShort()" value="{$site_adimin_value.0.site_country_short|stripslashes}"    maxlength="2"  />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site Country in short</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Site Timezone <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_timezone" id="site_timezone" onfocus="autoSuggestSitetimezone()" value="{$site_adimin_value.0.site_timezone|stripslashes}"  />
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Site Timezone</span></div>*}
                    </div>
				</div>
			</div>
			
			{*--------------Analytics Code Info ----------------------*}
			<div role="tabpanel" class="tab-pane form-horizontal" id="code">
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Google Analytics Code</label>
				    <div class="col-sm-4">  
    					<textarea class="form-control" rows="8" name="google_analytic_code" id="google_analytic_code" />{$site_adimin_value.0.google_analytic_code|stripslashes}</textarea>
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Google Analytic Code</span></div>*}
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Woopra Analytics Code</label>
					<div class="col-sm-4"> 
    					<textarea class="form-control" rows="8" name="woopra_analytic_code" id="woopra_analytic_code" />{$site_adimin_value.0.woopra_analytic_code|stripslashes}</textarea>
    					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Woopra Analytic Code</span></div>*}
                    </div>
				</div>
				
			</div>
			
			{*------------- Currency Info ----------------*}
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
                            <input class="" type="radio" name="currency_option" id="currency_display_img" value="img" {if $site_adimin_value.0.currency_option eq 'img'} checked="checked"{else}checked="checked"{/if} />
                            <label for="currency_display_img">Image</label>
                        </div>
						<div class="radio-inline radio">
                            <input class="" type="radio" name="currency_option" id="currency_display_sym" value="sym" {if $site_adimin_value.0.currency_option eq 'sym'} checked="checked" {/if} />
                            <label for="currency_display_sym">Symbol</label>
                        </div>
					</div>
				</div>
				{*<div id="currency_img_display" {if $site_adimin_value.0.currency_option eq 'sym'} style="display:none;"{/if} class="form-group" >
					<label class="control-label col-sm-4 font-normal">Currency image <span class="color-red">*</span></label>
					<div class="col-sm-4">
				        <label for="currencyimg" class="btn btn-default btn-sm" >
                          <i class="fa fa-folder-open"></i> Add Logo		
                        </label>
						<input class="fileUpload" type="file" name="currencyimg" id="currencyimg" size="31" style="display:none;" />
    					
    					<div class="photoContainer">
    						<img src="{$SITE_IMAGE_URL}/{$site_adimin_value.0.currency_image}" alt="image" />
    					</div>
                    </div>
				</div>*}
				<div class="form-group" id="currency_sym_display" {if $site_adimin_value.0.currency_option neq 'sym'} style="display: none;"{/if}>
					<label class="control-label col-sm-4 font-normal">Currency symbol <span class="color-red">*</span></label>
					<div class="col-sm-3">
						<div class="input-group">
							<input class="form-control" type="text" name="currency_sym" id="currency_sym" value="{$site_adimin_value.0.currency_symbol|stripslashes}"/> 
							<span class="input-group-addon">
								<!-- <input type="button" value="GetCurrency" id="currency" onclick="return autocurrencysymbol()"/> -->
								<i id="currency"  onclick="return autocurrencysymbol()">Getcurrency</i>
							</span>
						</div>
                    </div>
                     
				</div>
                <div class="form-group">
					<label class="control-label col-sm-4 font-normal">Mail Option&nbsp;&nbsp;<span class="color-red">*</span></label>
					<div class="col-sm-4">{*<pre>{$site_adimin_value|print_r}</pre>*}
 						<div class="radio-inline radio">
        					<input class="" type="radio" name="mail_option" id="mail_option_smtp" value="smtp" {if $site_adimin_value.0.mail_option eq 'smtp'} checked="checked" {/if} onclick="$('#mail_option').css('display','block');" />
        				    <label for="mail_option_smtp">SMTP</label>
                        </div>
                        
						<div class="radio-inline radio">            
                            <input class="" type="radio" name="mail_option" id="mail_option_normal" value="normal" {if $site_adimin_value.0.mail_option eq 'normal'} checked="checked" {/if} onclick="$('#mail_option').css('display','none');" />
        					<label for="mail_option_normal">Normal</label>
                        </div>
					    {*<div class="tooltip span3"><div class="HelpButton">?</div><span>Select Mail Option</span></div>*}
                    </div>
				</div>
                <div id="mail_option" {if $site_adimin_value.0.mail_option eq 'smtp'}style="display:block" {else}style="display:none"{/if}>
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Host <span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="text" name="smtp_host" id="smtp_host" value="{$site_adimin_value.0.smtp_host}"  />
        					<script type="text/javascript">document.site_seeting.smtp_host.focus();</script>
    					    {*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter SMTP host</span></div>*}
                        </div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Port&nbsp;&nbsp;<span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="text" name="smtp_port" id="smtp_port" value="{$site_adimin_value.0.smtp_port}"  />
        					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter SMTP port</span></div>*}
                        </div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Username&nbsp;&nbsp;<span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="text" name="smtp_username" id="smtp_username" value="{$site_adimin_value.0.smtp_username}"  />
        					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter SMTP Username</span></div>*}
                        </div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label col-sm-4 font-normal">SMTP Password&nbsp;&nbsp;<span class="color-red">*</span></label>
    					<div class="col-sm-4">
        					<input class="form-control" type="password" name="smtp_password" id="smtp_password" value="{$site_adimin_value.0.smtp_password}" autocomplete="off"/>
        					{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter SMTP Password</span></div>*}
                        </div>
    				</div>
    			</div>
				
			</div>
			{*------------- Meta Tag Info --------------------*}
			{*<div role="tabpanel" class="tab-pane form-horizontal" id="metataginfo_content">
				
				<div class="addPageCont">
					<span class="addPageRightFont">Title <span class="color-red">*</span></span>
					<span class="colon1">:</span>
					<textarea class="addPageTxtArea" name="site_metatag_title" id="site_metatag_title" />{$site_adimin_value.0.site_metatag_title|stripslashes}</textarea>
					<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Meta Tag Title</span></div>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont">Keyword <span class="color-red">*</span></span>
					<span class="colon1">:</span>
					<textarea class="addPageTxtArea" name="site_metatag_keyword" id="site_metatag_keyword" />{$site_adimin_value.0.site_metatag_keyword|stripslashes}</textarea>
					<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Meta Tag Keyword</span></div>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont">Description <span class="color-red">*</span></span>
					<span class="colon1">:</span>
					<textarea class="addPageTxtArea" name="site_metatag_desc" id="site_metatag_desc" />{$site_adimin_value.0.site_metatag_desc|stripslashes}</textarea>
					<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Meta Tag Description</span></div>
				</div>
				
			</div>*}
			
			{*----------- VAT Info ------------------*}
			<div role="tabpanel" class="tab-pane form-horizontal" id="invoice">
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">VAT No <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_vat_no" id="site_vat_no" value="{$site_adimin_value.0.site_vat_no|stripslashes}" />
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">VAT (%) <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_vat_percentage" id="site_vat_percentage" value="{$site_adimin_value.0.site_vat_percentage|stripslashes}" />
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Credit card Fee (%) <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_cc_percentage" id="site_cc_percentage" value="{$site_adimin_value.0.site_cc_percentage|stripslashes}" />
                    </div>
				</div>
                
                <div class="form-group">
            		<label class="control-label col-sm-4 font-normal">Invoice Time Period <span class="color-red"></span></label>
            		<div class="col-sm-4">
                		<!-- <select class="form-control selectpicker" name="site_inv_setting" id="site_inv_setting">
                			{*<option value="m1" {if $site_adimin_value.0.site_inv_setting eq 'm1'}selected="selected"{/if}>Monthly</option>*}
                			<option value="m2" {if $site_adimin_value.0.site_inv_setting eq 'm2'}selected="selected"{/if}>Monthly Twice</option>
                			{*<option value="m4" {if $site_adimin_value.0.site_inv_setting eq 'm4'}selected="selected"{/if}>Monthly 4 Times</option>*}
                		</select> -->
                		<input type="text" class="form-control" readonly value="Monthly Twice">
                		{*<div class="tooltip span3"><div class="HelpButton">?</div><span>Enter Invoice Setting Monthly -> 1 time, Twice -> 1-15 &amp; 16-30, 4times-> 1-7, 8-14, 15-21 &amp; 22-30</span></div>*}
                		<span class="errClass" id="resCommErr"></span>
                    </div>
            	</div>
				
			</div>	
			
			{*------------ Offline Info --------------*}
			<div role="tabpanel" class="tab-pane form-horizontal" id="offline">
			
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Offline Status </label>
					<div class="col-sm-4">
					   <div class="radio-inline radio">
							<input class="" type="radio" name="offline_status" id="offline_status_yes" value="Y"{if $site_adimin_value.0.offline_status eq "Y"}checked="checked"{/if} />
							<label for="offline_status_yes">Yes</label>
                        </div>
						<div class="radio-inline radio">
							<input class="" type="radio" name="offline_status" id="offline_status_no" value="N"{if $site_adimin_value.0.offline_status eq "N"}checked="checked"{/if} />
							<label for="offline_status_no">No</label>
                        </div>
                    </div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Offline Notes </label>
					<div class="col-sm-4">
    					<textarea class="form-control" rows="5" name="offline_notes" id="offline_notes" />{$site_adimin_value.0.offline_notes|stripslashes}</textarea>
                    </div>
				</div>
				
			</div>
			
			{*-----------------SMS Integration Information-------------------------*}
			<div role="tabpanel" class="tab-pane form-horizontal" id="sms">
			
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Twilio Sid  <span class="color-red"></span></label>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_sms_apiID" id="site_sms_apiID" value="{$site_adimin_value.0.site_twiliosms_sid|stripslashes}" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Twilio Token <span class="color-red"></span></span>
					<div class="col-sm-4">
					<input class="form-control" type="text" name="site_sms_url" id="site_sms_url" value="{$site_adimin_value.0.site_twiliosms_token|stripslashes}" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Twilio From No <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_sms_username" id="site_sms_username" value="{$site_adimin_value.0.site_twiliosms_from_no|stripslashes}" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Password <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="password" name="site_sms_password" id="site_sms_password" value="{$site_adimin_value.0.site_sms_password|stripslashes}" autocomplete="off"/>
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Sender <span class="color-red"></span></span>
				    <div class="col-sm-4">
    					<input class="form-control" type="text" name="site_sms_sender" id="site_sms_sender" value="{$site_adimin_value.0.site_sms_sender|stripslashes}" />
                    </div>
				</div>
			
			</div>
			{*----------------- Inter Fax Information ---------------------*}	
			<div role="tabpanel" class="tab-pane form-horizontal" id="interfax" >
			
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">User Name <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="text" name="site_fax_username" id="site_fax_username" value="{$site_adimin_value.0.site_interfax_username|stripslashes}" />
                    </div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">Password <span class="color-red"></span></span>
					<div class="col-sm-4">
    					<input class="form-control" type="password" name="site_fax_password" id="site_fax_password" value="{$site_adimin_value.0.site_interfax_password|stripslashes}" autocomplete="off"/>
                    </div>
				</div>
			
			</div>
            
            {*------------- FB Info --------------------*}
    		<div role="tabpanel" class="tab-pane form-horizontal" id="fb">
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Id for Site <span class="color-red"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_appsid" id="site_fb_appsid" value="{$site_adimin_value.0.site_fb_appsid|stripslashes}" />
                    </div>
    			</div>
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Secret for Site <span class="color-red"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_appsecret" id="site_fb_appsecret" value="{$site_adimin_value.0.site_fb_appsecret|stripslashes}" />
                    </div>
    			</div>
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Id for Menu <span class="color1"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_menu_appsid" id="site_fb_menu_appsid" value="{$site_adimin_value.0.site_fb_menu_appsid|stripslashes}" />
                    </div>
    			</div>
                <div class="form-group">
    				<span class="control-label col-sm-4 font-normal">Facebook App Secret for Menu <span class="color1"></span></span>
    				<div class="col-sm-4">
        				<input class="form-control" type="text" name="site_fb_menu_appsecret" id="site_fb_menu_appsecret" value="{$site_adimin_value.0.site_fb_menu_appsecret|stripslashes}" />
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







