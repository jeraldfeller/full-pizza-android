<!-- Header Bottom line starts -->
<!--<div class="headBtmLine1"></div>-->
<!-- Header Bottom line ends -->
<div class="searchTab" id="addons_domain_id_wrap">

	<!--<div class="byCuisineTop"></div>-->
	<div class="contain">
		<div class="searchAreaBgTopLeft"></div>
		<div class="searchAreaBgTopCen"></div>
		<div class="searchAreaBgTopRight"></div>
	</div>
	<div class="contain">
		<div class="searchAreaBgMidLeft">
			<div class="searchAreaBgMidRight">
<!-- 			<div class="searchAreaBgOuter paddingTop20"></div>
			<div class="searchAreaBgOuterBtm"></div> -->
			<div class="searchTab" id="addons_domain_id_wrap"></div>
		</div>
	</div>
	<div class="container">
		<div class="staticContainer">
			<h1 class="customSignupHead width40">{$LANG.customer_reset_password}</h1>
			<div class="row-fluid">
				<form name="customerresetpassword" method="post" action="{$SITE_BASEURL}/customerResetPassword.php?ui={$smarty.get.ui}" onsubmit="return customerResetValidate();" >
				<input type="hidden" name="action" value="customerreset" />
				<div class="mandatoryField mandotaryRite"><span class="redStar">*</span> - {$LANG.customer_login_mandatory_fields}</div>
				<div class="clr"></div>
				<span id="errormsg">
					<span style="color:red; text-align:center; float:left; width:100%;">
						{if $smarty.get.msg eq 'Deleted'}
							Your account was deleted. Please contact Administrator!
						{elseif $smarty.get.msg eq 'Pending'}
							Your account is waiting for activation. Try again later!
						{elseif $smarty.get.msg eq 'Deactive'}	
							Your account was deactivated. Please contact Administrator!
						{elseif $smarty.get.msg eq 'Fail'}
							Account not found!
						{/if}	
					</span>
				</span>
				<span style="color:green; text-align:center; float:left; width:100%;">{if $smarty.get.msg eq 'Success'}Your password reset successfully! <br /> Please login your account{/if}</span>
				<!--<span style="color:red; text-align:center; float:left; width:100%;" id="resetsuccess" >{if $smarty.get.msg neq 'Success'} Please Enter the New password! {/if}</span>-->
				
				<div class="row-fluid">
					<div class="span1">&nbsp;</div>
					<div class="span11">
						<ul class="customerUlNew">
							<li><label class="name1"><span class="redStar">*</span>{$LANG.customer_resetpassword}:</label></li>
							<li><input type="password" class="txtbox" name="customer_resetpassword" id="customer_resetpassword" value="" autocomplete="off"/></li>
						</ul>
						
						<ul class="customerUlNew">
							<li><label class="name1"><span class="redStar">*</span>{$LANG.customer_retypepassword}:</label></li>
							<li><input type="password" class="txtbox" name="customer_retypepassword" id="customer_retypepassword" value="" autocomplete="off"/></li>
						</ul>
						
						<ul class="customerUlNew">
							<li><label class="name1">&nbsp;</label></li>
							<li>
								<span class="restOwnerLoginBtnLeft">
									<span class="restOwnerLoginBtnRight"><input type="submit" class="" value="{$LANG.customer_forgot_submit}" /></span>
								</span>
							</li>
						</ul>
					</div>
				</div>
				</form>
			</div>			
		</div>
	</div>