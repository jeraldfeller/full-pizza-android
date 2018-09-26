<!--Css-->
<link type="text/css" rel="stylesheet" href="css/style.css"  />
<link type="text/css" rel="stylesheet" href="css/pagination.css" />
<link type="text/css" rel="stylesheet" href="css/autocomplete.css" />
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="css/mobile.css"  />
{$getglobalvarjavascript}
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<!--<script type="text/javascript" src="js/auto_suggest.js"></script>-->
<!--Js-->
{*<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>*}
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/admin_common.js"></script>
<script type="text/javascript" src="js/admin_restaurant.js"></script>
<script type="text/javascript" src="js/validation.js"></script>


<!--Thick Box-->
<link type="text/css" rel="stylesheet" href="css/thickbox.css" />
<script type="text/javascript" src="js/thickbox.js"></script>
<!--<script type="text/javascript" src="js/footerNew.js"></script>-->

<!--Confirm Message-->
{*<link type="text/css" href="css/confirm.css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="js/confirm.js"></script>*}

{if $req_file_name eq 'restaurantAddEdit.php' or $req_file_name eq 'adminAjaxAction.php'}
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/restaurant_gmap_deliveryarea.js"></script>
{/if}




