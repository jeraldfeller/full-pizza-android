<!--Footer Starts-->
{if $req_file_name neq 'offline.php'}
<footer class="footer clearfix {if $req_file_name eq 'restaurantDetails.php'}footer_mar_btm{/if}">
	<div class="footerTop hidden-xs">
		<div class="container">
			{*if $req_file_name neq 'searchResult.php'*}
			<div class="contain">	
				<div class="col-md-6">
					<section class="Footer_top_contt col-md-6 col-sm-4 col-xs-12">
						<h1 class="footerListhead">{$LANG.footer_payment_info}</h1>
						<div class="mobileCards"><img src="{$SITE_IMAGE_URL}/cards.png" alt="" title="" /></div>
					</section>
					<section class="Footer_top_contt col-md-6 col-sm-4 col-xs-12">	
						<h1 class="footerListhead">{$LANG.footer_followers}</h1>
					{*--------- Followers Start ---------*}
					{if $footerFollowersCntList gt 0}
						<div class="Footer_Link_Cont ">
							{section name="followers" loop=$footerFollowersList}
								<a href="{$footerFollowersList[followers].followers_url}" target="_blank"><img src="{$SITE_IMAGE_FOLLOWERS_URL}/{$footerFollowersList[followers].followers_logo}" alt="{$footerFollowersList[followers].followers_name}" title="{$footerFollowersList[followers].followers_name}" class="followerLink"  /></a> 
							{/section}
						</div>
					{/if}
					{*---------- Followers End -----------*}
					</section>
				</div>
				<div class="col-md-6">							
					 
					<section class="col-md-12 col-xs-12 col-sm-12  newsletter_section">
                    <form name="customer_subscribe_newsletter" method="post" action="" onsubmit="return customersubscribenewsletter();" class="form-horizontal">
						<h1 class="footerListhead">{$LANG.footer_week_newsletter}</h1>
						<div class="col-md-8 col-xs-12 col-sm-8 pad0">	
							<input type="text" class="searchField col-md-12 col-xs-12 col-sm-12" name="newsletter" id="newsletter" placeholder="Enter your email"/>
                            <span id="cusemailerrormsg" class=" "></span>
                        </div> 
						<div class="col-md-4 col-xs-12 col-sm-4">  
							<input class="newslettr-btn col-md-12 col-xs-12 col-sm-12 pad0" id="newslettersubsubmit" type="submit"  value="SUBMIT"/>
						</div>	
                        
						<span class="col-md-12 col-xs-12 col-sm-12  mail_inst pad0">{$LANG.footer_email_not_shared}</span>
                        </form>.
					</section>
				</div>
			</div>
			{*/if*}
            
         </div>
		</div>
		<div class="footerBtm">
			<div class="container">
				{*------------- Static Pages start ---------------------*}
				<div class="contain">
					<ul class="Footer_ContULSmall hidden-xs">
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}faq.php{else}faq{/if}">{$LANG.footer_faq}</a></li>
						<li><a href="{$SITE_BASEURL}/{if $smarty.session.restaurantownerid neq ''}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}siteFeedback.php{else}site-feedback{/if}{else}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerLogin.php?page=feedback{else}go-feedback{/if}{/if}">{$LANG.footer_feedback}</a></li>
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}contactUs.php{else}contact-us{/if}">{$LANG.footer_contact}</a></li>
						{section name="foot" loop=$footerContentList}
							<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}staticPage.php?contentpage={$footerContentList[foot].content_seourl}{else}p/{$footerContentList[foot].content_seourl}{/if}">{$footerContentList[foot].content_title|ucfirst|stripslashes}</a></li>
						{/section}			
					</ul>
				</div>
				{*---------- Static Pages end ----------------*}
				<div class="copyRight">
				{$LANG.footer_copyright} &copy;{$current|date_format:"%Y"} <a class="roamsoftLink" href="http://roamsofttech.com/" target="_blank">{$LANG.footer_roamsoft_tech}</a> {$LANG.footer_allrights_reserved}
				</div>
			 </div>
		</div>
	</div>
</footer>

<div class="cartMask"></div>
{/if}