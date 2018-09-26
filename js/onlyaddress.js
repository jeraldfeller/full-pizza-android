// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.
var placeSearch, autocomplete,autocomplete_new;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  //var code = $("#countrycode").val();
  //alert("code"+code);
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('searchfieldArea')),
      { types: ['geocode'],componentRestrictions: {country: "PA"} });      
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// The START and END in square brackets define a snippet for our documentation:
// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();  
  
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      //alert(val);
      //document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}
$(document).ready(function(){ 
   var sitesearchoption = $.trim($("#sitesearchoption").val());
   //var searchoptioncityzip = $.trim($("#searchoptioncityzip").val());
   if(sitesearchoption == 'Google') {      
	   initialize();
    }   
});

$(document).ready(function(){ 
    mapClickGeolocate();
   // alert("hjgjmg".output);
	
});

//Search Option 
function searchareaValidate(){
    
	//var langareaval = $("#langareaval").val();
    var regex       = /^[a-zA-Z0-9 ]+$/;
	//Error Language
	var err_lang_arr = error_language();    
	
	var searcharea = $.trim($("#searchfieldArea").val());
  var sitesearchoption = $.trim($("#sitesearchoption").val());
	var searchoptioncityzip = $.trim($("#searchoptioncityzip").val());
  
	if(searcharea == ''){
	   
	//	alert('hi');
        //return false;
        //$("#sundar").addClass('errormsg').html(err_lang_arr['alert']);
        if(sitesearchoption == 'Google'){
            alert('Please enter your address');
            //alert('Please enter cityname to search');
            $("#searchfieldArea").focus();
            $("#searchfieldArea").select();
            //$("#customer_name").parent().parent().addClass("has-error");        
            return false;
        }
        else if(sitesearchoption == 'Normal' && searchoptioncityzip == 'zip'){
            //alert('enter zipcode');
            alert('Please enter your zipcode');
            $("#searchfieldArea").focus();
            $("#searchfieldArea").select();
            //$("#customer_name").parent().parent().addClass("has-error");        
            return false;
        }else if(sitesearchoption == 'Normal' && searchoptioncityzip == 'city'){
            alert('Please enter your city');
            //alert('Please enter cityname to search');
            $("#searchfieldArea").focus();
            $("#searchfieldArea").select();
            //$("#customer_name").parent().parent().addClass("has-error");        
            return false;
        }
	}

	if(searcharea != '')
	{
    if(sitesearchoption == 'Normal')  {
      var useFile = (jssiteuserfriendly == 'N') ? '/ajaxFile.php' : '/use-file';
        $.post(jssitebaseUrl+useFile,{'searcharea':searcharea, 'action':'checkArea'}, function(output){
         //alert(output); return false;
           if(output =='no_results'){
              if(searchoptioncityzip == 'city') {
                alert("Please Select city name from Drop Down");
              } else if(searchoptioncityzip == 'zip') {
                alert("Please Select zipcode from Drop Down");
              }
              
           } else if(output != '') {
        	    if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
        	       
                    window.location.href = jssitebaseUrl+'/searchResult.php?searcharea='+searcharea;
        	    }else{
        	       //window.location.href = jssitebaseUrl+'/searchResult.php?searcharea='+searcharea;
                    window.location.href = jssitebaseUrl+'/search/'+searcharea;
        	    }
          }
      });
		return false;
	} else {
    if(output != '') {
      if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
         
            window.location.href = jssitebaseUrl+'/searchResult.php?searcharea='+searcharea;
      }else{
         //window.location.href = jssitebaseUrl+'/searchResult.php?searcharea='+searcharea;
            window.location.href = jssitebaseUrl+'/search/'+searcharea;
      }
    
      }
  }
	
}
	
}

//--------------------------------------------
function mapClickGeolocate(){
    	//alert("hi");
    getLocation();
}
//---------------------------geocode location
function getLocation(){
	//alert("hi");
	if (navigator.geolocation){
    	navigator.geolocation.getCurrentPosition(showPosition);
    }
  	else{x.innerHTML="Geolocation is not supported by this browser.";}
}
//from geocode function one function called
function showPosition(position)
{
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    
    var useFile = (jssiteuserfriendly == 'N') ? '/ajaxFile.php' : '/use-file';
    //alert(lat);
    //alert(lon);
	//alert("hello");
    //$.post(jssitebaseUrl+'/ajaxFile.php',{"lat":lat,"lon":lon,"action":"getLocationAddress"},function(response){
    $.post(jssitebaseUrl+useFile,{"lat":lat,"lon":lon,"action":"getLocationAddress"},function(response){
    	//alert(response);
        //var countrycode = response;
        if(response != ''){
            var countrycode = $("#countrycode").val(response);
            initialize();
        }   
    });
    return false;
}
