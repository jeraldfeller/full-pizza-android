



var useFile = "/use-file"; 

var latitud = 8.992244054228095;
var longitud = -79.56745147705078;	



var selectedOption= "";
var selectedOption2= "";
var marker;
var map;
var latitud;
var longitud;
var customer_latitude;
var customer_longitude;
var customer_apartment_name;
var customer_landmark;
var customer_street;
var customer_address_title;
var customer_state;
var customer_city;
var customer_neighborhood;
var customer_zip = "";
var customer_country;
var status;
var restaurantFoundFlag = false;
var resid = -1;


function saveAddress(element){
	
	selection = $(element).data("name");
	console.log(selection);
	localStorage.addressPickup = selection;
	$.post(jssitebaseUrl+'/customRequest.php',{"addressPickup":selection},function(response){
				console.log("response: " + response);
			}); 

}

function addressForCheckout(element){
	
	selection = $(element).data("name");
	console.log(selection);
	//alert(selection);
	localStorage.addressForCheckout = selection;
	$.post(jssitebaseUrl+'/customRequest.php',{"addressForCheckout":selection},function(response){
				console.log("response: " + response);
			}); 


	var array =  new Array();

	array = selection.split(',');

	var urb = array[0];
	$.post(jssitebaseUrl+'/customRequest.php',{"urb":urb},function(response){
				console.log("urb: " + urb);
			}); 


	var est = array[array.length - 1];
	$.post(jssitebaseUrl+'/customRequest.php',{"est":est},function(response){
				console.log("est: " + est);
			});


	var ciu = array[array.length - 2];
	$.post(jssitebaseUrl+'/customRequest.php',{"ciu":ciu},function(response){
				console.log("ciu: " + ciu);
			});

	var calle = array[array.length - 3];
	$.post(jssitebaseUrl+'/customRequest.php',{"calle":calle},function(response){
				console.log("calle: " + calle);
			});


	var numCasa = "";

	for (var i = 1; i < array.length - 3; i++) {
			numCasa = numCasa + array[i] + ",";
	}
	numCasa = numCasa.slice(0, -1);//remove last character "comma"
	$.post(jssitebaseUrl+'/customRequest.php',{"numCasa":numCasa},function(response){
				console.log("numCasa: " + numCasa);
			});
	//{"apartment":"2","company":"","faculty":"","floor":"2","postCode":"","specialIntructions":"si","university":""}
	var obj = JSON.parse(numCasa);

	//parsing num casa
	$.post(jssitebaseUrl+'/customRequest.php',{"apartment":obj.apartment},function(response){
				console.log("apartment: " + obj.apartment);
			});
	$.post(jssitebaseUrl+'/customRequest.php',{"company":obj.company},function(response){
				console.log("company: " + obj.company);
			});
	$.post(jssitebaseUrl+'/customRequest.php',{"faculty":obj.faculty},function(response){
				console.log("faculty: " + obj.faculty);
			});
	$.post(jssitebaseUrl+'/customRequest.php',{"floor":obj.floor},function(response){
				console.log("floor: " + obj.floor);
			});
	$.post(jssitebaseUrl+'/customRequest.php',{"postCode":obj.postCode},function(response){
				console.log("postCode: " + obj.postCode);
			});
	$.post(jssitebaseUrl+'/customRequest.php',{"specialIntructions":obj.specialIntructions},function(response){
				console.log("specialIntructions: " + obj.specialIntructions);
			});
	$.post(jssitebaseUrl+'/customRequest.php',{"university":obj.university},function(response){
				console.log("university: " + obj.university);
			});


	var direccionGoogleMaps = "";

	if (obj.university != "") {

		direccionGoogleMaps = direccionGoogleMaps + obj.university + ", ";
	}

	if (obj.faculty != "") {

		direccionGoogleMaps = direccionGoogleMaps + obj.faculty + ", ";
	}

	if (calle != "") {

		direccionGoogleMaps = direccionGoogleMaps + calle + ", ";
	}

	if (urb != "") {

		direccionGoogleMaps = direccionGoogleMaps + urb + ", ";
	}

	if (est != "") {

		direccionGoogleMaps = direccionGoogleMaps + est + ", ";
	}

	if (ciu != "") {

		direccionGoogleMaps = direccionGoogleMaps + ciu + ", ";
	}

	direccionGoogleMaps = direccionGoogleMaps.slice(0, -2);//remove last character "comma"

	console.log("direccionGoogleMaps: " + direccionGoogleMaps);

	console.log("listo para ejecutar query");

	$.get( "https://maps.googleapis.com/maps/api/geocode/json?address=" + direccionGoogleMaps+ "&key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU", function( data ) {
		console.log("**inicio**");
		console.log(data);
		if (typeof data.results[0].geometry.location.lat !== 'undefined' && typeof data.results[0].geometry.location.lng !== 'undefined') {
   			 latitud = data.results[0].geometry.location.lat;
			longitud = data.results[0].geometry.location.lng;
			makeRequest('menu');
		}
		
	});



}

function userSelection(element){
	selection = $(element).data("name");
	selectedOption = selection;
	console.log(selectedOption);	
	$(element).toggleClass('optionSelected').siblings().removeClass('optionSelected');

	switch(selectedOption) {
		case "delivery": 			
			$("#map").hide();
			$("#middle_question_map").hide();
			$("#pac-input").hide();
			$("#addressContainer").show();		
			//$("#all_restaurants_list").hide();
			$("#addressListContainer").addClass("hide");
			$("#saveAddressListContainer").hide();
			$.post(jssitebaseUrl+'/customRequest.php',{"selection":selectedOption},function(response){
				console.log("response: " + response);
			}); 
			break;
		case "pickup":
			//alert("ejecuto");
			$("#map").hide();			
			//$("#all_restaurants_list").show();
			
			//google.maps.event.trigger(map, "resize");
    		//autoCenter();
			//$("#pac-input").show();
			//$("#addressContainer").hide();	  
			$("#middle_question_map").hide(); 
			
			$("#saveAddressListContainer").hide();
			$("#addressListContainer").removeClass("hide");
			$("#addressContainer").hide(); 
			$.post(jssitebaseUrl+'/customRequest.php',{"selection":selectedOption},function(response){
				console.log("response: " + response);
			});        
			break;
		case "addresses":
			//alert("ejecuto");
			$("#map").hide();			
			//$("#all_restaurants_list").show();
			
			//google.maps.event.trigger(map, "resize");
    		//autoCenter();
			//$("#pac-input").show();
			//$("#addressContainer").hide();	  
			$("#middle_question_map").hide(); 
			
			$("#addressListContainer").hide();
			$("#saveAddressListContainer").removeClass("hide");
			$("#addressContainer").hide();         
			break;
		case "address":
			alert("Opción no disponible por los momentos");
			break;		
			

	}

	
}

function userSelection2(element){
	
	selection = $(element).data("name");
	selectedOption2 = selection;
	sessionStorage.setItem('addressType', selectedOption2);
	console.log(selectedOption2);	
	$(element).toggleClass('optionSelected2').siblings().removeClass('optionSelected2');

	switch(selectedOption) {
		case "delivery": 			
			$("#map").show();
            $("#middle_question_map").show();
			google.maps.event.trigger(map, "resize");    		
			$("#pac-input").show();
			break;
		case "pickup":			
			break;

	}	

	$("#completeApartmentAddress").hide();					
	$("#completeHomeAddress").hide();
	$("#completeOfficeAddress").hide();
	$("#completeHotelAddress").hide();
	$("#completeUniversityAddress").hide();
	$("#addressNextButton").hide();
	
	
}

function makeRequest(type){
	//latitud = 8.992244054228095;
	//longitud = -79.56745147705078;	
	//console.log(latitud);
	//var useFile = "/use-file";
	//$.post(jssitebaseUrl+'/address.php',{"lat":latitud, "long":longitud, "action":"searchResultRestaurantByLocation"},function(response){
	$.post(jssitebaseUrl+'/address.php',{"lat":latitud, "long":longitud},function(response){
		console.log(response);


		var arrayResponse= response.split("insert");		
		var cleanResponse = arrayResponse[0];		
		if(cleanResponse != ''){
			console.log("Restaurant with delivery found");
			var jsonResponse = JSON.parse(cleanResponse);		
            console.log(jsonResponse);
			console.log(jsonResponse['restaurants']['0']['restaurant_name']);
			restaurantFoundFlag = true;
			resid= jsonResponse['restaurants']['0']['restaurant_id'];
			if(type == 'menu'){
				window.location.href = '/restaurantDetails.php?resid='+resid;
			}
			
		} else {
			console.log("No restaurants with delivery found");	
			restaurantFoundFlag = false;
			if(type == 'menu'){
				alert("No hay restaurantes disponibles en la dirección seleccionada, intente con otra");
			}
		}
		


		
		 $("#aMostrar").show();		
	}); 
	

}



function geocodeLatLng(geocoder, map, latlng, InfoWindow){

	geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[0]) {
      	
		
		InfoWindow.setContent(results[0].formatted_address + '<br><div class="btn" style="font-weight:bold;" id="delivery_address_map" >ENVIAR PEDIDO A ESTA DIRECCIÓN</div>');
        InfoWindow.open(map, marker);
        $('#delivery_address_map').click(function() {
	    	//restaurantFoundFlag = true;
	    	if(restaurantFoundFlag) {

		    	customer_latitude = latitud;
		    	customer_longitude = longitud;
					console.log(results);
					
					
		    	for(var i in results[0].address_components){
						
	    			//console.log(results[0].address_components[i].types);
	    			var types = results[0].address_components[i].types;						
						//console.log(results[0].address_components[i]);
						//console.log(results[0].address_components[i].types[0]);
						//console.log(types[0]);						
	    			switch(types[0]) {
				    case "route":
							//	console.log("entro en route");
				        customer_street = results[0].address_components[i].long_name;                        
				        break;
				    case "street_address":
				        customer_street = results[0].address_components[i].long_name;
				        break;				    
				    case "postal_code":
				        customer_zip = results[0].address_components[i].long_name;
				        break;
						case "country":
							customer_country = results[0].address_components[i].long_name;
							break;
						case "locality":
						  customer_city = results[0].address_components[i].long_name;
							break;	
						case "administrative_area_level_1":
							customer_state = results[0].address_components[i].long_name;		
							break;
				    
					}
				}

				for(var i in results[1].address_components){
					types = results[1].address_components[i].types;
					switch(types[0]) {
				    case "neighborhood":								
				        customer_neighborhood = results[1].address_components[i].long_name;                        
				        break;			    
					}
				}

				console.log("dirección lista:");
				console.log(customer_street + ", " + customer_neighborhood +  ", " + customer_city + ", " + customer_state);


				//mostrar formulario
				$("#map").hide();
				$("#middle_question_map").hide();				
				$("#addressContainer").show();

				switch(selectedOption2) {
					case "apartment" :
						$("#completeApartmentAddress").show();
						break;
					case "home" :
						$("#completeHomeAddress").show();
						break;
					case "office" :
						$("#completeOfficeAddress").show();
						break;
					case "hotel" :
						$("#completeHotelAddress").show();
						break;
					case "university" :
						$("#completeUniversityAddress").show();
						break;
				}

				$('input[name=street]').val(customer_street);
				$('input[name=urbanization]').val(customer_neighborhood);
				$('input[name=city]').val(customer_city);
				$('input[name=state]').val(customer_state);
				$('input[name=zip]').val(customer_zip);
				$("#addressNextButton").show();


				//$("#completeAddressInfo").show();
				//window.location.href = '/restaurantDetails.php/?resid='+resid;

			} else {
				//alert("Debes selecionar un area con delivery");
				InfoWindow.setContent(results[0].formatted_address + '<br><div class="btn" style="font-weight:bold;color:red;" id="delivery_address_map">La dirección seleccionada no está en la zona de delivery <br/> de nuestros restaurantes</div>');
			}
	    	
		});
        //console.log("formatted_address: " + results[0].address_components[1].types);   
        //console.log(typeof results);
        //console.log("results " + results[1]);    
      } else {
        console.log('No results found');
      }
    } else {
      console.log('Geocoder failed due to: ' + status);
    }
  });

}


function placeMarkerAndPanTo(latLng, map) {

	if(marker){
		marker.setPosition(latLng);
	} 
	else {
  		marker = new google.maps.Marker({
	    position: latLng,
	    map: map
	  });  
  	}
 	latitud = latLng.lat();
 	longitud = latLng.lng();
 	console.log("latitud seleccionada: " + latitud);
 	console.log("longitud seleccionada: " + longitud);
 	
  makeRequest('map');
}

function addNewAddress(){
	var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';

	//var add_title	= sessionStorage.getItem("calle");	
	//var apt_name	= sessionStorage.getItem("numero_casa");
	var street_add	= sessionStorage.getItem("calle");	
	/*var state		= sessionStorage.getItem("estado");
	var city		= sessionStorage.getItem("ciudad");*/
	var state		= 'PA';
	var city		= '2';
	var zip			= sessionStorage.getItem("codigo_postal");
	var landline	= '';
	var add_label	= sessionStorage.getItem("addressType");
	var specialIntructions = sessionStorage.getItem("instrucciones_especiales");
	var apartment = sessionStorage.getItem("apartamento");
	//var building = sessionStorage.setItem("edificio");
	var office = sessionStorage.getItem("oficina");
	var floor = sessionStorage.getItem("piso");
	var business = sessionStorage.getItem("empresa");
	var classroom = sessionStorage.getItem("salon");
	var faculty = sessionStorage.getItem("facultad");
	var hotel_hab = sessionStorage.getItem("habitacion");
	var university = sessionStorage.getItem("universidad_colegio");
	
	

	switch(add_label) {
		case "home": 			
			var landmark	= '{"apartment":"","company":"","faculty":"","floor":"","postCode":"'+zip+'","specialIntructions":"'+specialIntructions+'","university":""}';
			var add_title	= 'Casa';
			var apt_name	= sessionStorage.getItem("numero_casa");	
			break;
		case "apartment":
			var landmark	= '{"apartment":"'+apartment+'","company":"","faculty":"","floor":"","postCode":"'+zip+'","specialIntructions":"'+specialIntructions+'","university":""}';
			var add_title	= 'Apartamento';	
			var apt_name	= sessionStorage.getItem("edificio");
			break;
		case "office":
			var landmark	= '{"apartment":"'+office+'","company":"'+business+'","faculty":"","floor":"'+floor+'","postCode":"'+zip+'","specialIntructions":"'+specialIntructions+'","university":""}';      
			var add_title	= 'Oficina';
			var apt_name	= sessionStorage.getItem("edificio");
			break;
		case "university":
			var landmark	= '{"apartment":"'+classroom+'","company":"","faculty":"'+faculty+'","floor":"'+floor+'","postCode":"'+zip+'","specialIntructions":"'+specialIntructions+'","university":"'+university+'"}';      
			var add_title	= 'Universidad';
			var apt_name	= sessionStorage.getItem("edificio");
			break;	
		case "hotel":
			var landmark	= '{"apartment":"'+hotel_hab+'","company":"","faculty":"","floor":"'+floor+'","postCode":"'+zip+'","specialIntructions":"'+specialIntructions+'","university":""}';      
			var add_title	= 'Hotel';
			var apt_name	= sessionStorage.getItem("hotel");
			break;		

	}
	


	$.post(jssitebaseUrl+useAction,{"add_title":add_title, "apt_name":apt_name, "street_add":street_add, "landmark":landmark, "state":state, "city":city, "zip":zip, "landline":landline, "add_label":add_label,"action":"AddNewAddress"},function(response){
		console.log("Your new address added successfully");
	});
	
}
 
 $('#apartmentInput').submit(function() {
	sessionStorage.setItem('edificio', $("#apartmentBuilding").val());
	sessionStorage.setItem('calle', $("#apartmentStreet").val());
	sessionStorage.setItem('ciudad', $("#apartmentCity").val());
	sessionStorage.setItem('estado', $("#apartmentState").val());
	sessionStorage.setItem('piso', $("#floor").val());
	sessionStorage.setItem('urbanizacion', $("#apartmentUrbanization").val());
	sessionStorage.setItem('apartamento', $("#apartment").val());
	sessionStorage.setItem('codigo_postal', $("#apartmentZip").val());
	sessionStorage.setItem('instrucciones_especiales', $("#apartment_special_instructions").val());
	var input = $("<input>")
		.attr("type", "hidden")
		.attr("name", "resid").val(resid);
	$('#apartmentInput').append($(input));
	addNewAddress();
});


 $('#hotelInput').submit(function() {
	sessionStorage.setItem('hotel', $("#hotel").val());
	sessionStorage.setItem('calle', $("#hotelStreet").val());
	sessionStorage.setItem('ciudad', $("#hotelCity").val());
	sessionStorage.setItem('estado', $("#hotelState").val());
	sessionStorage.setItem('piso', $("#hotelFloor").val());
	sessionStorage.setItem('urbanizacion', $("#hotelUrbanization").val());
	sessionStorage.setItem('habitacion', $("#hotelRoom").val());
	sessionStorage.setItem('codigo_postal', $("#hotelZip").val());
	sessionStorage.setItem('instrucciones_especiales', $("#hotel_special_instructions").val());
	var input = $("<input>")
		.attr("type", "hidden")
		.attr("name", "resid").val(resid);
	$('#hotelInput').append($(input));
	addNewAddress();
});

 $('#officeInput').submit(function() {
	sessionStorage.setItem('edificio', $("#officeBuilding").val());
	sessionStorage.setItem('calle', $("#officeStreet").val());
	sessionStorage.setItem('ciudad', $("#officeCity").val());
	sessionStorage.setItem('estado', $("#officeState").val());
	sessionStorage.setItem('piso', $("#officeFloor").val());
	sessionStorage.setItem('urbanizacion', $("#officeUrbanization").val());
	sessionStorage.setItem('oficina', $("#office").val());
	sessionStorage.setItem('empresa', $("#business").val());
	sessionStorage.setItem('codigo_postal', $("#officeZip").val());
	sessionStorage.setItem('instrucciones_especiales', $("#office_special_instructions").val());
	var input = $("<input>")
		.attr("type", "hidden")
		.attr("name", "resid").val(resid);
	$('#officeInput').append($(input));
	addNewAddress();
});

 $('#universityInput').submit(function() {
	sessionStorage.setItem('edificio', $("#universityBuilding").val());
	sessionStorage.setItem('calle', $("#universityStreet").val());
	sessionStorage.setItem('ciudad', $("#universityCity").val());
	sessionStorage.setItem('estado', $("#universityState").val());
	sessionStorage.setItem('piso', $("#universityFloor").val());
	sessionStorage.setItem('salon', $("#universityClassroom").val());
	sessionStorage.setItem('universidad_colegio', $("#university").val());
	sessionStorage.setItem('facultad', $("#faculty").val());
	sessionStorage.setItem('urbanizacion', $("#universityUrbanization").val());
	sessionStorage.setItem('codigo_postal', $("#universityZip").val());
	sessionStorage.setItem('instrucciones_especiales', $("#university_special_instructions").val());
	var input = $("<input>")
		.attr("type", "hidden")
		.attr("name", "resid").val(resid);
	$('#universityInput').append($(input));
	addNewAddress();
});

 $('#homeInput').submit(function() {
	
	sessionStorage.setItem('calle', $("#homeStreet").val());			
	sessionStorage.setItem('numero_casa', $("#home_number").val());
	sessionStorage.setItem('estado', $("#homeState").val());			
	sessionStorage.setItem('urbanizacion', $("#homeUrbanization").val());
	sessionStorage.setItem('ciudad', $("#homeCity").val());
	sessionStorage.setItem('codigo_postal', $("#homeZip").val());
	sessionStorage.setItem('instrucciones_especiales', $("#home_special_instructions").val());
	var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "resid").val(resid);
	$('#homeInput').append($(input));
	addNewAddress();
	//window.location.href = '/restaurantDetails.php/?resid='+resid;

});
