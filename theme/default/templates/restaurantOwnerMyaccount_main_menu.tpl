
<div class="myAccntMenu">
	
	<ul class="myAccntMenuUl borderbox">
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount.php{else}restaurant-myaccount{/if}"  {if $req_file_name eq 'restaurantOwnerMyaccount.php'}class="active"{/if}>{$LANG.res_myaccount_dashboard}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php{else}restaurant-myaccount-order{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_order.php'}class="active"{/if}>{$LANG.res_myaccount_order}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_report.php{else}restaurant-myaccount-report{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_report.php'}class="active"{/if}>{$LANG.res_myaccount_report}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_category.php{else}restaurant-myaccount-category{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_category.php'}class="active"{/if}>{$LANG.res_myaccount_cat}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_menu.php{else}restaurant-myaccount-menu{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_menu.php'}class="active"{/if}>{$LANG.res_myaccount_menu}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_addons.php{else}restaurant-myaccount-addons{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_addons.php'}class="active"{/if}>{$LANG.res_myaccount_addon}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_offers.php{else}restaurant-myaccount-offers{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_offers.php'}class="active"{/if}>{$LANG.res_myaccount_offer}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_payment.php{else}restaurant-myaccount-payment{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_payment.php'}class="active"{/if}>{$LANG.res_myaccount_payment}</a>
		</li>
        <li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_setting.php{else}restaurant-myaccount-setting{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_setting.php'}class="active"{/if}>{$LANG.res_myaccount_settings}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_bookings.php{else}restaurant-myaccount-book{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_bookings.php'}class="active"{/if}>Book a Table</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_reviews.php{else}restaurant-myaccount-review{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_reviews.php'}class="active"{/if}>{$LANG.res_myaccount_reviews}</a>
		</li>
		<li>
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_invoice.php{else}restaurant-myaccount-invoice{/if}" {if $req_file_name eq 'restaurantOwnerMyaccount_invoice.php'}class="active"{/if}>{$LANG.res_myacc_invoice}</a>
		</li>
        <!-- <li>
			<a href="javascript:void(0);" id="owner_plugin" data-target="#pluginmenuSite" data-toggle="modal" onclick="return restaurantPlugin('{$smarty.session.restaurantownerid}', '{$restaurant_seourl}');">Plugin</a>
		</li> -->
	{*	<li>
			<a href="javascript:void(0);" id="owner_fbapps">FB Apps</a>
		</li> *}
	</ul>
</div>
            
{*------- Plugin Popup-------*}
<div id="pluginmenuSite" class="modal fade">
    <div class="modal-dialog clearfix">
        <div class="modal-content">
			<div class="pluginwrapper">
				<div class="pluginpopupheading">
					<h1 class="pluginpopupmainheading">Plugin Options</h1>
					<div class="pluginpopupclose" data-dismiss="modal"></div>
				</div>
				<div class="clearfix padding20" >
					
					<div class="col-md-12">
						<div class="col-md-12 bold margin-topbottom">Just copy this HTML snippet and paste in bottom of body tag &lt;body&gt;..&lt;&frasl;body&gt;.</div>
						<div class="col-md-12" id="restaurantPluginId">
							{*<textarea class="col-md-12"><span id='plugins'></span>
                            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script type="text/javascript" src="https://comeneat.com/plugin/widget.js"></script></textarea>*}
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

