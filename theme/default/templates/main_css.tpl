{* **** Roboto **** *}
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

{* **** Lato **** *}
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css' />

{* **** Open sans **** *}
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css' />

{* **** Montserrat **** *}
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />

<link href="{$SITE_THEME_CSS_URL}/stylesheet.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_THEME_CSS_URL}/font-awesome.css" type="text/css" rel="stylesheet" />

{if $req_file_name eq 'index.php' or $req_file_name eq 'searchResult.php' or $req_file_name eq 'restaurant_innerpage.php' or $req_file_name eq 'restaurantOwnerRegister.php' or $req_file_name eq 'customerRegister.php' or $req_file_name eq 'customerMyaccount.php' or $req_file_name eq 'checkout.php' or $req_file_name eq 'restaurantOwnerMyaccount.php'}

	<link rel="stylesheet" type="text/css" href="{$SITE_THEME_CSS_URL}/autocomplete.css" />

{/if}
{******************** Restaurant Details *********************}
{if $req_file_name eq 'restaurantDetails.php'}
<link type="text/css" href="{$SITE_THEME_CSS_URL}/slideshow.css" rel="stylesheet" />

{/if}
{if $req_file_name eq 'restaurantOwnerMyaccount.php'}
	<link type="text/css" href="{$SITE_THEME_CSS_URL}/jquery-ui-1.css" rel="stylesheet" />	
{/if}

{if $req_file_name eq 'restaurantDetails.php' or $req_file_name eq 'checkout.php' or $req_file_name eq 'contactUs.php' or $req_file_name eq 'restaurantOwnerMyaccount_offers_AddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_report.php' or $req_file_name eq 'ajaxActionRestaurant.php' }
	<link type="text/css" href="{$SITE_THEME_CSS_URL}/datepicker.css" rel="stylesheet" />
{/if}	


{$getglobalvarjavascript}
        


{if $req_file_name eq 'restaurantOwnerMyaccount.php' or $req_file_name eq 'restaurantOwnerMyaccount_order.php' or $req_file_name eq 'restaurantOwnerMyaccount_report.php' or $req_file_name eq 'restaurantOwnerMyaccount_category.php' or $req_file_name eq 'restaurantOwnerMyaccount_payment.php' or $req_file_name eq 'restaurantOwnerMyaccount_setting.php' or $req_file_name eq 'restaurantOwnerMyaccount_reviews.php' or $req_file_name eq 'restaurantOwnerMyaccount_invoice.php' or $req_file_name eq 'restaurantOwnerMyaccount_offers.php' or $req_file_name eq 'restaurantOwnerMyaccount_offers_AddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_category.php' or $req_file_name eq 'restaurantOwnerMyaccount_categoryAddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_menu.php' or $req_file_name eq 'restaurantOwnerMyaccount_menuAddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_addons.php' or $req_file_name eq 'restaurantOwnerMyaccount_addonsAddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_bookings.php' }
	<link href="{$SITE_THEME_CSS_URL}/myaccount.css" type="text/css" rel="stylesheet" />	
{/if}

<link href="{$SITE_THEME_CSS_URL}/bootstrap.css" type="text/css" rel="stylesheet" />
<!-- <link href="{$SITE_THEME_CSS_URL}/bootstrap-select.css" type="text/css" rel="stylesheet" /> -->

{if $req_file_name eq 'index.php'}
<link href="{$SITE_THEME_CSS_URL}/owl.carousel.css" type="text/css" rel="stylesheet" />
{/if}

<link href="{$SITE_THEME_CSS_URL}/custom.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.10.2.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="{$SITE_JS_URL}/bootstrap-select.js"></script> -->
