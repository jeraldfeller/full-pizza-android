<div class="container">
<!-- Header Bottom line starts -->
<div class="headBtmLine1"></div>
<!-- Header Bottom line ends -->
<div class="staticContainer">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<h1 class="ownerHeadMain">{$LANG.res_reg_hey}</h1>
		<div class="ownerSignupTop">
			<h1 class="ownerHead1">{$LANG.res_reg_join}.</h1>
			<h1 class="ownerHead2">{$LANG.res_reg_increasesales}</h1>
		</div>
		<!-- Create Account start -->
		<div class="registerStatus">
			<h1 class="successMsg">{$LANG.res_redg_thanks_msg}..</h1>
		</div>
	</div>

	<div class="ownerLoginRight col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
		<div class="ownerLoginRightbg">
			<h1 class="haveanAccnt">{$LANG.res_have_on_account}</h1>
			<h1 class="restOwnerLogin">{$LANG.res_owner_login}</h1>
			<div class="contain center">
				<a  href="{$SITE_BASEURL}/restaurantOwnerLogin.php" class="inlineblock"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">{$LANG.res_login}</span></span></a>
			</div>
		</div>	
		{if $sitefeedbackcnt gt 0}
			<div class="restOwnerRightCont">
				<h1 class="restOwnerRiteHead">{$LANG.res_reg_ownersay}</h1>
				<div class="restRightContNew">
				{section name="feed" loop=$sitefeedbacklist}
					<p>{$sitefeedbacklist[feed].feedback|stripslashes}</p>
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$sitefeedbacklist[feed].restaurant_id}&amp;resname={$sitefeedbacklist[feed].restaurant_seourl}{else}menu/{$sitefeedbacklist[feed].restaurant_id}/{$sitefeedbacklist[feed].restaurant_seourl}{/if}" class="color1">{$sitefeedbacklist[feed].restaurant_name|stripslashes}, {$sitefeedbacklist[feed].cityname|stripslashes}</a>
				{/section}
				</div>
			</div>
			{/if}		
	</div>
</div>


<!-- Search By Cuisine start -->
{*include file='searchCuisine.tpl'*}
</div>