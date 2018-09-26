function restaurant_gmap_delivery_area(restaurant_address,rest_deliver_miles) {
	
	//alert(restaurant_address);
	//alert(rest_deliver_miles);
	//var restaurant_address = 'New York';
	var area_in_meters = Math.round(rest_deliver_miles*1609.34);
	
	getCoords(restaurant_address, function(latLng) {
		var rest_lat = latLng.lat();
		var rest_lng = latLng.lng();
		//alert(rest_lat);
		//alert(rest_lng);
		
		var
	        contentCenter = '<span class="infowin">'+restaurant_address+'</span>';
	    var
	        latLngCenter = new google.maps.LatLng(rest_lat, rest_lng),
	        latLngCMarker = new google.maps.LatLng(rest_lat, rest_lng),
	        map = new google.maps.Map(document.getElementById('map'), {
	            zoom: 9,
	            center: latLngCenter,
	            mapTypeId: google.maps.MapTypeId.ROADMAP,
	            mapTypeControl: false
	        }),
	        markerCenter = new google.maps.Marker({
	            position: latLngCMarker,
	            title: 'Location',
	            map: map,
	            icon: jssitebaseUrl+'/theme/default/images/mm_20_red.png',
	            draggable: false
	        }),
	        infoCenter = new google.maps.InfoWindow({
	            content: contentCenter
	        }),
	        // exemplary setup: 
	        // Assumes that your map is signed to the var "map"
	        // Also assumes that your marker is named "marker"
	        circle = new google.maps.Circle({
	            map: map,
	            clickable: false,
	            // metres
	            radius: area_in_meters,
	            fillColor: '#FFDFFF',
	            fillOpacity: .6,
	            strokeColor: '#008000',
	            strokeOpacity: .4,
	            strokeWeight: .8
	        });
	    // attach circle to marker
	    circle.bindTo('center', markerCenter, 'position');
	
	
	    google.maps.event.addListener(markerCenter, 'click', function() {
	        infoCenter.open(map, markerCenter);
	    });

	});
    
}

function getCoords(address, callback) {
  var latLng = [];
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      callback(results[0].geometry.location);
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }    
  });
}