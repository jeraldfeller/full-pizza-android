{include file='home_header.tpl'}
<div style="width: 400px; height: 0px;" id="map"></div>
<div class="container">
  <div class="row">
    <div style="background-color: transparent; height: 350px;" class="col-md-8">
      <img class="img-responsive" style="width:93%; margin-left: 1%" src="theme/default/images/fullpizza-collage.png">
    </div>
    
    <!--<div style="background-color: transparent; height: 350px;" class="col-md-8"></div>-->
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
  <!--<div class="row">
    <div style="background-color: transparent; height: 250px;" class="col-md-3"></div>
    <div style="background-color: transparent; height: 250px;" class="col-md-5"></div>
    <div style="background-color: transparent; height: 250px;" class="col-md-4"></div>
  </div>-->

 </div>



<style type="text/css">
  html, body { height: 100%; margin: 0; padding: 0; }
  #map { height: 100%; }
</style>

{literal}
<script type="text/javascript">

  var map;
function initMap() {
  console.log("here");
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
  console.log("here2");
}

</script>

{/literal}

{literal}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&callback=initMap"
         async defer></script>
{/literal}