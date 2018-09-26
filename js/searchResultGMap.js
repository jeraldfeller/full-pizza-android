//<![CDATA[

    /*var customIcons = {
    	restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };*/

    function gmapLoad(latti,longtti,ser_qrystring) {
    	/*alert(latti);
    	alert(longtti);
    	alert(ser_qrystring);*/
      var map = new google.maps.Map(document.getElementById("showGoogleMaps"), {
        //center: new google.maps.LatLng(13.0821, 80.2482),
        center: new google.maps.LatLng(latti, longtti),
        zoom: 10,
        mapTypeId: 'roadmap'
      });

      // Change this depending on the name of your PHP file
      downloadUrl(jssitebaseUrl+"/searchResultGoogleMap.php?gmapaction=gmapresult"+ser_qrystring, function(data) {
        
        var xml = data.responseXML;
        
        var markers = xml.documentElement.getElementsByTagName("marker");
        
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("restaurantname");
          var address = markers[i].getAttribute("restaurantaddress");
          //var type = markers[i].getAttribute("type");
          
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
              
          var html = "<b>" + name + "</b> <br/>" + address;
          //alert(name);
          //alert(address);
          /*alert(parseFloat(markers[i].getAttribute("lat")));
          alert(parseFloat(markers[i].getAttribute("lng")));*/
          //alert(html);
          //var icon = customIcons[type] || {};
          
          //Custom Icons
          var customIcons = {
		        icon: jssitebaseUrl+'/theme/default/images/mm_20_red.png',
		        shadow: jssitebaseUrl+'/theme/default/images/mm_20_shadow.png'
     
    		};
          var icon = customIcons || {};
          
          //Marker
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
          });
          
          //var infoWindow = new google.maps.InfoWindow;
          //bindInfoWindow(marker, map, infoWindow, html);
          
		  //Custome Info Window
		  customInfoWindow(marker, map, html);
        }
      });
    }
    
    function resDetailsGmap(latti,longtti,resid) {
    	//alert(latti);
    	//alert(longtti);
    	var myOptions = {
        	center: new google.maps.LatLng(latti, longtti),
        	zoom: 15,
        	//mapTypeId: 'roadmap'
        	mapTypeId: google.maps.MapTypeId.ROADMAP
      	}
      	var map = new google.maps.Map(document.getElementById("showGoogleMaps"), myOptions);
      	/*document.getElementById("showGoogleMaps").style.width = '600px';
    	document.getElementById("showGoogleMaps").style.height = '450px';
      	google.maps.event.trigger(map, 'resize');*/
      	
      	var infoWindow = new google.maps.InfoWindow;
		
      	// Change this depending on the name of your PHP file
      	downloadUrl(jssitebaseUrl+"/ajaxFile.php?action=restMyAccMap&resid="+resid, function(data) {
	        var xml = data.responseXML;
            
	        var markers = xml.documentElement.getElementsByTagName("marker");
	        for (var i = 0; i < markers.length; i++) {
	          var name = markers[i].getAttribute("restaurantname");
	          var address = markers[i].getAttribute("restaurantaddress");
	          //var type = markers[i].getAttribute("type");
	          /*alert(name);
	          alert(address);
	          alert(parseFloat(markers[i].getAttribute("lat")));
	          alert(parseFloat(markers[i].getAttribute("lng")));*/
	          var point = new google.maps.LatLng(
	              parseFloat(markers[i].getAttribute("lat")),
	              parseFloat(markers[i].getAttribute("lng")));
	          var html = "<b>" + name + "</b> <br/>" + address;
	          //var icon = customIcons[type] || {};
	          
	          var customIcons = {
			        icon: jssitebaseUrl+'/theme/default/images/mm_20_red.png',
			        shadow: jssitebaseUrl+'/theme/default/images/mm_20_shadow.png'
	     
	    		};
	          var icon = customIcons || {};
	          var marker = new google.maps.Marker({
	            map: map,
	            position: point,
	            icon: icon.icon,
	            shadow: icon.shadow
	          });
          	bindInfoWindow(marker, map, infoWindow, html);
        	}
      	});
    }
    function resMyaccGmap(latti,longtti) {
    	//alert(latti);
    	//alert(longtti);
      var myOptions = {
        	center: new google.maps.LatLng(latti, longtti),
        	zoom: 15,
        	//mapTypeId: 'roadmap'
        	mapTypeId: google.maps.MapTypeId.ROADMAP
      	}
    	var map = new google.maps.Map(document.getElementById("showGoogleMaps"), myOptions);
    	var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl(jssitebaseUrl+"/ajaxFile.php?action=restMyAccMap", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("restaurantname");
          var address = markers[i].getAttribute("restaurantaddress");
          //var type = markers[i].getAttribute("type");
          /*alert(name);
          alert(address);
          alert(parseFloat(markers[i].getAttribute("lat")));
          alert(parseFloat(markers[i].getAttribute("lng")));*/
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          //var icon = customIcons[type] || {};
          
          var customIcons = {
		        icon: jssitebaseUrl+'/theme/default/images/mm_20_red.png',
		        shadow: jssitebaseUrl+'/theme/default/images/mm_20_shadow.png'
     
    		};
          var icon = customIcons || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
    //custom info window
    function customInfoWindow(marker, map, html) {
    	
      	var boxText = document.createElement("div");
			boxText.style.cssText = "border: 1px solid red; margin-top: 8px; background: lightblue; padding: 5px;font-family:Arial;font-size:12px;";
			boxText.innerHTML = html;
	
			var myOptions = {
				 content: boxText
				,disableAutoPan: false
				,maxWidth: 0
				,pixelOffset: new google.maps.Size(-140, 0)
				,zIndex: null
				,boxStyle: { 
				  background: "url('"+jssitebaseUrl+"/theme/default/images/tipbox.gif') no-repeat"
				  ,opacity: 0.75
				  ,width: "200px"
				 }
				,closeBoxMargin: "10px 2px 2px 2px"
				,closeBoxURL: jssitebaseUrl+"/theme/default/images/close.gif"
				,infoBoxClearance: new google.maps.Size(1, 1)
				,isHidden: false
				,pane: "floatPane"
				,enableEventPropagation: false
			};
	
			google.maps.event.addListener(marker, "click", function () {
				ib.open(map, this);
			});
	
			var ib = new InfoBox(myOptions);
			//ib.open(theMap, marker);
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>