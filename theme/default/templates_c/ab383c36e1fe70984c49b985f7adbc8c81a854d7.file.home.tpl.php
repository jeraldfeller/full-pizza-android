<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 14:33:07
         compiled from "C:\wamp\www\theme\default\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1032957de030bc4d7c6-88943449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab383c36e1fe70984c49b985f7adbc8c81a854d7' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\home.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1032957de030bc4d7c6-88943449',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57de030bc78f71_77062541',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57de030bc78f71_77062541')) {function content_57de030bc78f71_77062541($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('home_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div style="width: 400px; height: 0px;" id="map"></div>
<div class="container">
  <div class="row">
  	<div style="background-color: transparent; height: 350px;" class="col-md-8"></div>
  	<a href="/address.php">
  		<div style="background-color: white; height: 350px; padding: 25px 0px 0px 0px; border-radius: 20px;" class="col-md-4">
	  		<img class="img-responsive" src="theme/default/images/reticula3.png">
	  		<br>
	  		<img style="padding: 5px 20px 20px 20px;" class="img-responsive" src="theme/default/images/RealiceSuPedidoAqui.png">
	  		<img class="img-responsive" style="width: 22%; margin-left: 38%;" src="theme/default/images/CarBoton.png">
	  		<img style="padding-top: 30px" class="img-responsive" src="theme/default/images/Reticula3.png">
  		</div>
  	</a>
 
  </div>  
 <br>
 <br>
  <div class="row">
  	<div style="background-color: transparent; height: 250px;" class="col-md-3"></div>
  	<div style="background-color: transparent; height: 250px;" class="col-md-5"></div>
  	<div style="background-color: transparent; height: 250px;" class="col-md-4"></div>
  </div>

  

</div>






<style type="text/css">
  html, body { height: 100%; margin: 0; padding: 0; }
  #map { height: 100%; }
</style>


<?php echo '<script'; ?>
 type="text/javascript">

  var map;
function initMap() {
  console.log("here");
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
  console.log("here2");
}

<?php echo '</script'; ?>
>




<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&callback=initMap"
         async defer><?php echo '</script'; ?>
>

   <?php }} ?>
