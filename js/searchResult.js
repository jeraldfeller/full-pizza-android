//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");    
	}
});	

function searchResultLeft(aid,pricemin,pricemax){
	//alert(min);
	//alert(max);
	
	var conditionvar = "";
	
	var searcharea 		 = check_undefined($(".searcharea").val());
	var searchcuisine    = check_undefined($(".searchcuisine").val());
	var searchrestaurant = check_undefined($(".searchrestaurant").val());
	
	var cuisine    		 = check_undefined($(".cuisine").val());
	var city    		 = check_undefined($(".city").val());
	var zipcode    		 = check_undefined($(".zipcode").val());
	var organizeby 		 = $("#organizeby").val();
	
	/*var trim_searchrestaurant = $.trim(searchrestaurant);
	alert("restaurant name: "+searchrestaurant);
	alert("trim_searchrestaurant: "+trim_searchrestaurant);*/
	
	//All Area
	if( check_undefined(aid) !='' ){
		var areaid 		 	 = check_undefined(aid);
		searcharea = '';
		city = '';
		zipcode = '';
		cuisine = '';
		//cuisineid = '';
	}
	else
		var areaid 		 	 = check_undefined($(".areaid").val());
	
	//Price min
	if( check_undefined(pricemin) !='' )
		var pricemin 		 	 = check_undefined(pricemin);
	else
		var pricemin 		 	 = check_undefined($(".pricemin").val());
		
	//Price max
	if( check_undefined(pricemax) !='' )
		var pricemax 		 	 = check_undefined(pricemax);
	else
		var pricemax 		 	 = check_undefined($(".pricemax").val());
	

	//Delivery
	if(document.getElementById("ser_delivery").checked == true){
		var ser_delivery  = $("#ser_delivery").val();
	}else{
		var ser_delivery  = '';
	}
	//Pick Up
	if(document.getElementById("ser_pickup").checked == true){
		var ser_pickup  = $("#ser_pickup").val();
	}else{
		var ser_pickup  = '';
	}
	//Book Table
	if(document.getElementById("ser_booktable").checked == true){
		var ser_booktable  = $("#ser_booktable").val();
	}else{
		var ser_booktable  = '';
	}
	/** //Open Now
	if(document.getElementById("ser_opennow").checked == true){
		var ser_opennow  = $("#ser_opennow").val();
	}else{
		var ser_opennow  = '';
	} **/
	//Offers
	if(document.getElementById("ser_offer").checked == true){
		var ser_offer  = $("#ser_offer").val();
	}else{
		var ser_offer  = '';
	}
	
	//Menu Type
	/*if(document.getElementById("menutype").checked == true){
		var vegmenutype  = $("#menutype").val();
	}else{
		var vegmenutype  = '';
	}
	if(document.getElementById("menutype1").checked == true){ 
		var nonvegmenutype 	= $("#menutype1").val();
	}else{
		var nonvegmenutype 	= '';
	}*/
	
	var vegmenutype 		= check_undefined(vegmenutype);
	var nonvegmenutype 		= check_undefined(nonvegmenutype);
	
	//Cuisine
	var totcuisineid = document.search.cuisinetype.length;
	if(totcuisineid > 0){
		var cuisinetype=new Array();
		var j=0;
		for(var i=0;i<totcuisineid;i++){
		
			if(document.search.cuisinetype[i].checked==true){
				cuisinetype[j]=document.search.cuisinetype[i].value;
				j++;
			}
		}
		var cuisineid=cuisinetype.toString();
		if( cuisineid !='' ){
			var cuisineid = cuisineid;
			//var cuisine1 = '';
			//var cuisine  = check_undefined(cuisine1);
		}
	}
	if( check_undefined(aid) !='' ){
		cuisineid = '';
	}
	
	
	

	//alert(cuisineid);
	//$(".searchResultRightList").load(jssitebaseUrl+"/searchResultAjax.php?action=searchResultRight", { 'cuisineid':cuisineid, 'vegmenutype':vegmenutype, 'nonvegmenutype':nonvegmenutype, 'ser_delivery':ser_delivery, 'ser_pickup':ser_pickup, 'ser_booktable':ser_booktable, 'ser_opennow':ser_opennow, 'ser_offer':ser_offer, 'areaid':areaid, 'searcharea':searcharea, 'searchcuisine':searchcuisine, 'searchrestaurant':searchrestaurant, 'cuisine':cuisine, 'pricemin':pricemin, 'pricemax':pricemax, 'organizeby':organizeby  } );
	
	//$(".searchResultRightList").load(jssitebaseUrl+"/searchResultAjax.php?action=searchResultRight", { 'cuisineid':cuisineid, 'vegmenutype':vegmenutype, 'nonvegmenutype':nonvegmenutype, 'ser_delivery':ser_delivery, 'ser_pickup':ser_pickup, 'ser_opennow':ser_opennow, 'ser_offer':ser_offer, 'areaid':areaid, 'searcharea':searcharea, 'searchcuisine':searchcuisine, 'searchrestaurant':searchrestaurant, 'cuisine':cuisine, 'pricemin':pricemin, 'pricemax':pricemax, 'organizeby':organizeby  } );
	$("#white-maska").show();
	
	$(".searchResultRightList").html('<div class="searchresultloading loadImgInner" style="position:relative; z-index:110;"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" class="flt" /><span class="loadPlsWait">Please wait...</span></div>').show();
	//return false;
	$(".searchResultRightList").load(jssitebaseUrl+"/searchResultAjax.php?action=searchResultRight", { 
				'cuisineid':cuisineid, 
				'vegmenutype':vegmenutype, 
				'nonvegmenutype':nonvegmenutype, 
				'ser_delivery':ser_delivery, 
				'ser_pickup':ser_pickup,
				'ser_booktable':ser_booktable, 
				//'ser_opennow':ser_opennow, 
				'ser_offer':ser_offer, 
				'searcharea':searcharea, 
				//'searchcuisine':searchcuisine, 
				'searchrestaurant':searchrestaurant,
				'areaid':areaid, 
				//'cuisine':cuisine,
				'city':city,
				'zipcode':zipcode,
				'pricemin':pricemin, 
				'pricemax':pricemax, 
				'organizeby':organizeby  }, function(responseText){
				    
		 		$("#white-maska").hide();
					//Google Map Script start
					var firstreclat    		= $('#firstreclat').val();
					var firstreclong    	= $('#firstreclong').val();
					var searchrestaurantTotal    	= $('#searchrestaurantTotal').val();
					
					if(searchrestaurantTotal > 0){
						if(firstreclat !='' && firstreclong !=''){
						
							var ser_qrystring = "";
							if(cuisineid != '') 		ser_qrystring += "&cuisineid="+cuisineid;
							if(vegmenutype != '') 		ser_qrystring += "&vegmenutype="+vegmenutype;
							if(nonvegmenutype != '') 	ser_qrystring += "&nonvegmenutype="+nonvegmenutype;
							if(ser_delivery != '') 		ser_qrystring += "&ser_delivery="+ser_delivery;
							if(ser_pickup != '') 		ser_qrystring += "&ser_pickup="+ser_pickup;
							if(ser_booktable != '')		ser_qrystring += "&ser_booktable="+ser_booktable;
							//if(ser_opennow != '') 		ser_qrystring += "&ser_opennow="+ser_opennow;
							if(ser_offer != '') 		ser_qrystring += "&ser_offer="+ser_offer;
							if(areaid != '') 			ser_qrystring += "&areaid="+areaid;
							if(searcharea != '') 		ser_qrystring += "&searcharea="+searcharea;
							if(searchcuisine != '') 	ser_qrystring += "&searchcuisine="+searchcuisine;
							if(searchrestaurant != '') 	ser_qrystring += "&searchrestaurant="+searchrestaurant;
							if(pricemin != '') 			ser_qrystring += "&pricemin="+pricemin;
							if(pricemax != '') 			ser_qrystring += "&pricemax="+pricemax;
							if(organizeby != '') 		ser_qrystring += "&organizeby="+organizeby;
							
							//gmapLoad(firstreclat,firstreclong);
							//alert(ser_qrystring);
							gmapLoad(firstreclat,firstreclong,ser_qrystring);	
						}
						$(".searchResultRight").show();
                        $("#count_number").html(searchrestaurantTotal);
					}else{
						$(".searchResultRight").hide();
					}
					
					//Google Map Script start
	});
    //var filename = $(location).attr('href');
                //alert(filename); return false;
    //$('body').load(filename);
}
function go_to_rest_view(ser_qrystring){
	//alert('ser_qrystring-->'+ser_qrystring); return false;

	
		
		//Google Map Script start
		var firstreclat    		= $('#firstreclat').val();
		var firstreclong    	= $('#firstreclong').val();
		var serv_delivery    	= $('#serv_delivery').val();
		var serv_pickup   	 	= $('#serv_pickup').val();
		var serv_opennow   	 	= $('#serv_opennow').val();
		var serv_offer   	 	= $('#serv_offer').val();
		
		//alert(activeTab);
		//alert(serv_delivery);
		//alert(firstreclong);
        
        /*alert("activeTab=>"+activeTab);
        alert("firstreclat=>"+firstreclat);
        alert("firstreclong=>"+firstreclong);
        alert("ser_qrystring=>"+ser_qrystring);
        alert("serv_delivery=>"+serv_delivery);
        alert("serv_pickup=>"+serv_pickup);
        alert("serv_opennow=>"+serv_opennow);
        alert("serv_offer=>"+serv_offer);*/
        //$(".searchResultRightList").html('<div class="searchresultloading loadImgInner"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" class="flt" /><span class="loadPlsWait">Please wait...</span></div>').show();
        //setTimeout(function(){
			 //gmapLoad(firstreclat,firstreclong,ser_qrystring);
        gmapLoad(firstreclat,firstreclong,ser_qrystring);
             //$(".searchResultRightList").html('');
	//	}, 50); 
	
}
//-------------------------------------------------------------------------------
//Get Show City
function Googlemap_Restaurent(restaurent_id){
	
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showGoogleMaps').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", "ajaxAction.php?restaurent_id="+restaurent_id+"&action=showGoogleMap", true);
   	req.send(null);
}

//-------------------------------------------------------------------------------------------------
//Pagination 
/*function ajaxPaginationSearch(page,pagename,searcharea,searchcuisine,searchrestaurant,ser_delivery,ser_pickup,ser_booktable,ser_opennow,ser_offer,vegmenutype,nonvegmenutype,cuisine,cuisineid,area,areaid,pricemin,pricemax){
	//alert(page);alert(pagename);alert(searcharea);

	if(pagename == 'searchResultList') {
		
		$(".searchResultRightList").load(jssitebaseUrl+"/searchResultAjax.php?action=searchResultRight", { 'page':page ,'pagename':pagename ,'searcharea':searcharea, 'searchcuisine':searchcuisine, 'searchrestaurant':searchrestaurant, 'ser_delivery':ser_delivery, 'ser_pickup':ser_pickup, 'ser_booktable':ser_booktable, 'ser_opennow':ser_opennow, 'ser_offer':ser_offer, 'vegmenutype':vegmenutype, 'nonvegmenutype':nonvegmenutype, 'cuisine':cuisine, 'cuisineid':cuisineid, 'area':area, 'areaid':areaid, 'pricemin':pricemin, 'pricemax':pricemax } );
	}
}*/
function ajaxPaginationSearch(page,pagename,searcharea,searchcuisine,searchrestaurant,ser_delivery,ser_pickup,ser_opennow,ser_offer,vegmenutype,nonvegmenutype,cuisine,cuisineid,area,city, areaid,pricemin,pricemax){
	//alert(page);alert(pagename);alert(searcharea);

	if(pagename == 'searchResultList') {
		
		$(".searchResultRightList").load(jssitebaseUrl+"/searchResultAjax.php?action=searchResultRight", { 'page':page ,'pagename':pagename ,'searcharea':searcharea, 'searchcuisine':searchcuisine, 'searchrestaurant':searchrestaurant, 'ser_delivery':ser_delivery, 'ser_pickup':ser_pickup, 'ser_opennow':ser_opennow, 'ser_offer':ser_offer, 'vegmenutype':vegmenutype, 'nonvegmenutype':nonvegmenutype, 'cuisine':cuisine, 'cuisineid':cuisineid, 'area':area, 'city':city, 'areaid':areaid, 'pricemin':pricemin, 'pricemax':pricemax,  } );
	}
}
$(document).ready(function(){
	$(".searchPartLeftHead").click(function(){
		//$(".arrowTab").toggleClass("arrowDown");
		//$(".searchPartLeft2 ul").toggle(1000);
		
		var windowHeight = $(window).height();
		var headerHeight = $(".header").height(); //alert(headerHeight);
		var footerHeight = $(".Footer_BgCont").height(); //alert(footerHeight);
		var footerHeight1 = $(".bgDown").height(); //alert(footerHeight);
		var height = windowHeight-headerHeight-footerHeight-footerHeight+30; //alert(height);
		//$(".searchResultLeft").css({"min-height":height});
		});

		/*$("#more_cuisines").click(function(){
		$("#more_cuisines").toggleClass("active")
		$("#more_cuisines_content").slideToggle();
		});*/
		$("#searchflitermobile").click(function(){
			$(this).parent().next(".searchResultLeft").toggleClass("active");
		});

	 });

//------------------------------------------------------------------------------------------------
//Yelp reviews
function yeplreviews(resid){
    //alert(resid);
 
    $(".yelpReviewreplace").load(jssitebaseUrl+"/ajaxAction.php",{'action':'yelpreviewsdisplay','resid':resid } );
}