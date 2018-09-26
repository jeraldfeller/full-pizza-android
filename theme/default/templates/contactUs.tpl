<div class="container">
	{if $smarty.request.msg eq 'succ'}
		<div class="customerLeftBox clearfix">
			<div class="customSignupHead">{$LANG.contact_thanks_heading}</div>
			<p>{$LANG.contact_thanks_content}</p>
			<div class="pull-right"><a class="contact_backtohome btn btn-danger" href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}contact-us{else}contactUs.php{/if}"> &lt;&lt; {$LANG.contact_thanks_contactus}</a></div>
		</div>
	{else}
		<div class="col-sm-12 col-lg-8 col-md-6 col-xs-12">
			<div class="customerLeftBox clearfix">
				<div class="customSignupHead">{$LANG.contact_heading}</div>
				<p>{$LANG.contact_content}</p>
				<form name="contactus" method="post" action="" onsubmit="return contactValidate();" class="form-horizontal">
					<input type="hidden" name="action" value="ContactForm" />
					<input type="hidden" name="captchcode" id="captchcode" value="{$rndnumber}" /> 
					
					<span id="errormsg" {if $error neq ''}class="errormsg"{/if}>{$error}</span>
					
					<div class="form-group">
						 <label for="contact_name" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.contact_name}</label>
						 <div class="col-sm-8">
							<input type="text" class="form-control" name="contact_name" id="contact_name" value="{$smarty.post.contact_name}" />
							<script type="text/javascript">document.contactus.contact_name.focus();</script>
						</div>
					</div>
					<div class="form-group">
						<label for="contact_email" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.contact_con_email}</label>
						<div class="col-sm-8">
						<input type="email" class="form-control" name="contact_email" id="contact_email" value="{$smarty.post.contact_email}"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="contact_ordernumber" class="col-sm-4 control-label font-normal">{$LANG.contact_ordernumber}</label>
						<div class="col-sm-8">
						<input type="text" class="form-control" name="contact_ordernumber" id="contact_ordernumber" value="{$smarty.post.contact_ordernumber}"/>
						</div>
					</div>
					<div class="form-group">
						<label for="contact_orderdate" class="col-sm-4 control-label font-normal">{$LANG.contact_orderdate}</label>
						<div class="col-sm-8">
						<div class="input-group date">
						<input type="text" class="form-control" name="contact_orderdate" id="contact_orderdate" value="{$smarty.post.contact_orderdate}"/>
						<span class="input-group-addon">
						   <span class="glyphicon glyphicon-calendar"></span>
						</span>
						</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="contact_restaurantname" class="col-sm-4 control-label font-normal">Restaurant Name</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="contact_restaurantname" id="contact_restaurantname" value="{$smarty.post.contact_restaurantname}"/></div>
					</div>
					<div class="form-group">
						<label for="contact_comments" class="col-sm-4 control-label font-normal">{$LANG.contact_comments}</label>
						<div class="col-sm-8"><textarea rows="3" cols="" class="form-control" name="contact_comments" id="contact_comments"></textarea></div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.contact_enter_the_digits}</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control" name="contact_digit" id="contact_digit" maxlength="5" value="" autocomplete="off"/>
								<div class="input-group-addon pointer" onclick="return refreshContact('contact_verify_code','verification');"><i class="glyphicon glyphicon-refresh"></i></div>
							</div>
						</div>
						<div class="col-sm-3 contact_verify_code">
							<span class="contact_verifycode" id="captchcode">{$rndnumber}</span>
						</div>
					</div>
					
					<div class="col-sm-offset-4 col-sm-8">
						<input type="submit" id="contactussubmit" class="submit-bg" value="{$LANG.contact_submit}" />
					</div>
				</form>
			</div>
		</div>
		<div class=" col-lg-4 col-md-5 pull-right">
			<div class="customerRightBox clearfix">
				<h1>{$LANG.contact_address_heading}</h1>
				<div class="newContactcont">{$site_address} </div>
				<div class="newContactMail"><a href="mailto:{$SITE_SUPPORT_MAIL}"><i class="glyphicon glyphicon-envelope marRight"></i>{$SITE_SUPPORT_MAIL}</a></div>
				<span class="newContactPhoneLeft">
						<i class="glyphicon glyphicon-phone-alt marRight"></i>
						{*$LANG.contact_phone_head*}
						{$SITE_PHONE}
					</span>
			</div>
		</div>
	{/if}
</div>