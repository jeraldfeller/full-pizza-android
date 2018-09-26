<header class="headerDiv {if $req_file_name neq 'restaurantOwnerMyaccount.php'}col-md-12{/if}">
    {if $req_file_name eq 'restaurantOwnerMyaccount.php'}
	<div class="rest-headertop">
        <a href="{$SITE_BASEURL}" class="ownername">
           <img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" />
        </a>
	</div>
    <div class="rest-headerbtm col-md-12">
        <div class="container text-center">
            <h1 class="welcome-msg"><small>Welcome</small> {$restaurantname|stripslashes}</h1>
            <div class="orderstatusbx">
                <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=pending{else}restaurant-myaccount-order/pending{/if}" class="col-sm-5 orderstatusinner">
                    <span class="orderstatusleft"><img src="{$SITE_IMAGE_URL}/pending-orders.png" alt="" title=""></span>
                    <div class="orderstatusright">
                        <span class="count pending">{$Pending}</span>
                        <span class="status"> {$LANG.res_myaccount_dashpendorder|utf8_encode}</span>
                    </div>
                </a>
                <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=processing{else}restaurant-myaccount-order/processing{/if}" class="col-sm-5 col-sm-offset-1 orderstatusinner">
                     <span class="orderstatusleft"><img src="{$SITE_IMAGE_URL}/processing-orders.png" alt="" title=""></span>
                     <div class="orderstatusright">
                        <span class="count process">{$Processing}</span>
                        <span class="status">{$LANG.res_myaccount_dashprocessorder|utf8_encode}</span>
                    </div>
                </a>
            </div>
        </div>
       <a href="ajaxFile.php?action=restaurantLogout" class="logout_btn"></a>
    </div>  
   {else}
    <div class="row">
        <div class="rest-headertop padTopBot10 col-md-12 no-padding">
            <a href="{$SITE_BASEURL}" class="ownername">
               <img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" />
            </a>
        </div>
        <div class="rest-headerbtm padTopBot10 col-md-12 no-padding">
            <div class="container text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-4">
                        <div class="row">
                            <h1 class="welcome-msg autowidth line_height71 no-margin"><small>Welcome</small> {$restaurantname|stripslashes}</h1>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="orderstatusbx pull-left col-md-12">
                                <div class="row">
                                    <div class="col-sm-4 no-lg-right-padding">
                                    <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=pending{else}restaurant-myaccount-order/pending{/if}" class=" orderstatusinner pull-left full_width">
                                        
                                        <div class="orderstatusright full_width">
                                            <span class="count1 pending">{$Pending}</span>
                                            
                                        </div>
                                        <span class="orderstatusleft no-border full_width no-padding">
                                            <span class="order_img"><img src="{$SITE_IMAGE_URL}/pending-orders_small.png" alt="" title=""></span>
                                            <span class="status1 autowidth no-float"> {$LANG.res_myaccount_dashpendorder|utf8_encode}</span>
                                        </span>
                                    </a>
                                    </div>
                                    <div class="col-sm-4 no-lg-right-padding">
                                        <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=processing{else}restaurant-myaccount-order/processing{/if}" class="orderstatusinner pull-left full_width">
                                             
                                             <div class="orderstatusright full_width">
                                                <span class="count1">{$Processing}</span>
                                                
                                            </div>
                                            <span class="orderstatusleft no-border full_width no-padding">
                                                <span class="order_img"><img src="{$SITE_IMAGE_URL}/processing-orders_small.png" alt="" title=""></span>
                                                <span class="status1 autowidth no-float">{$LANG.res_myaccount_dashprocessorder|utf8_encode}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="ajaxFile.php?action=restaurantLogout" class="logout_btn"></a>
            <div class="menus_open"><img src="{$SITE_IMAGE_URL}/rightslide.png" alt="" title=""></div>
            <a class="menu_list"><img src="{$SITE_IMAGE_URL}/leftslide.png" alt="" title=""></a> 
        </div>  
    </div>
    {/if}



   <!-- <div class="col-sm-1 pull-right">
		<a href="ajaxFile.php?action=restaurantLogout" class="logout"><i class="fa fa-sign-out"></i> {*$LANG.res_myaccount_logout*}</a>
	</div> -->


</header>