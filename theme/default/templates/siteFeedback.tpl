<!-- Header Bottom line starts -->
<!--<div class="wrapper">
	<div class="headBtmLine1"></div>
</div>-->
<!-- Header Bottom line ends -->
<!-- <div class="searchAreaBgOuter paddingTop20"></div>
<div class="searchAreaBgOuterBtm"></div> -->
	<div class="container">
		<div class="staticContainer pull-left">
			<div class="customSignupHead">{$LANG.site_feedback_heading}</div>
			<div class="form-horizontal">
				<div id="errormsgFeed"></div>
				<div class="restaurantFeedbackSuccess" style="color:green;margin-left:250px;"></div>
				
				<div class="form-group">
					<label class="col-sm-4 control-label font-normal" for="contact_name">
						<span class="redStar">*</span>
						{$LANG.site_feedback_comments}
					</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="feedback" id="feedback" ></textarea>
					</div>
				</div>
				<div class="col-sm-offset-4 col-sm-8">
					<input class="submit-bg" type="submit" id="submitFeedback" onclick="return validateFeedback();" value="{$LANG.site_feedback_submit}" />
				</div>
			</div>
			
			
		</div>
	</div>	
		