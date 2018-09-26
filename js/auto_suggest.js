//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");    
	}
});	

//Auto Suggestion
$(function() {
	
	//Home Page & Search Result Page Tab
	$(".searchTab h1").click(function() { //When click open tab
		
		$(".searchTab h1").removeClass("active");
		$(".searchTabContent").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
	});
		
	//Index page & Search Result Area
		//Area search
		$('#searchfieldArea').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchArea', minLength:1});
		//Cuisine Search
		$('#searchfieldArea_cuisine').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchArea', minLength:1});
		$('#searchfieldCuisine').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchCuisine', minLength:1});
		//Restaurant Search
		$('#searchfieldArea_restaurant').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchArea', minLength:1});
		$('#searchfieldRestaurant').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchRestaurant', minLength:1});
        
         var sitesearchoption = $.trim($("#sitesearchoption").val());
        var searchoptioncityzip = $.trim($("#searchoptioncityzip").val());
        
        if(sitesearchoption == 'Normal') {
            if(searchoptioncityzip == 'city') {
                $('#searchfieldArea').autocomplete({ source: jssitebaseUrl + '/ajaxFile.php?searchoptioncityzip='+searchoptioncityzip+'&action=searchArea',minLength: 1});            
            } else if(searchoptioncityzip == 'zip') { 
               $('#searchfieldArea').autocomplete({ source: jssitebaseUrl + '/ajaxFile.php?searchoptioncityzip='+searchoptioncityzip+'&action=searchArea',minLength: 1});
            } 
        }     
});

//Search Option 
function searchareaValidate(){
    
	//var langareaval = $("#langareaval").val();
    var regex       = /^[a-zA-Z0-9 ]+$/;
	//Error Language
	var err_lang_arr = error_language();    
	
	var searcharea = $.trim($("#searchfieldArea").val());
	var searchoptioncityzip = $.trim($("#searchoptioncityzip").val());
	if(searcharea == '' || searcharea == 'Enter your city name' || searcharea == 'Enter your zipcode'){
	   
	//	alert('hi');
        //return false;
        //$("#sundar").addClass('errormsg').html(err_lang_arr['alert']);
        if(searcharea == 'Enter your zipcode'){
            //alert('enter zipcode');
            alert(err_lang_arr['alert_message_to_zipsearch']);
            $("#searchfieldArea").focus();
            $("#searchfieldArea").select();
            //$("#customer_name").parent().parent().addClass("has-error");        
            return false;
        }else if(searcharea == 'Enter your city name'){
            alert(err_lang_arr['alert_message_to_search']);
            //alert('Please enter cityname to search');
            $("#searchfieldArea").focus();
            $("#searchfieldArea").select();
            //$("#customer_name").parent().parent().addClass("has-error");        
            return false;
        }
	}
	if(!searcharea.match(regex)) {
	   
        alert(err_lang_arr['alert_message_to_valid']);
	    //alert('Please enter Valid value in Text box');
	    return false;
	}
	if(searcharea != '')
	{
	    if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
	       
            window.location.href = jssitebaseUrl+'/searchResult.php?searcharea='+searcharea+'&searchtype='+searchoptioncityzip;
	    }else{
	       //window.location.href = jssitebaseUrl+'/searchResult.php?searcharea='+searcharea;
            window.location.href = jssitebaseUrl+'/search/'+searcharea;
	    }
		return false;
	}
	return false;
}

function searchcuisineValidate(search_box_val,search_box_val_area){
	//alert(search_box_val); return false;
	//alert(search_box_val_area);
	
	var langcuival  = $("#langcuisineval").val();
	var langareaval = $("#langareaval").val();
	//Error Language
	var err_lang_arr = error_language();
	
	var searcharea	  = $.trim($("#searchfieldArea_cuisine").val());
	var searchcuisine = $.trim($("#searchfieldCuisine").val());
	
	if(searcharea == '' || searcharea == langareaval){
		alert(err_lang_arr['alert_message_indexarea']);
		$("#searchfieldArea_cuisine").focus();
		$("#searchfieldArea_cuisine").select();
		return false;
	}
	if(searchcuisine == '' || searchcuisine == langcuival){
	   
		alert(err_lang_arr['alert_message_indexcuisine']);
		$("#searchfieldCuisine").focus();
		$("#searchfieldCuisine").select();
		return false;
	}
}
function searchrestaurantValidate(search_box_val,search_box_val_area){
	//alert(search_box_val);
	//alert(search_box_val_area);
	var langrestval  = $("#langrestval").val();
	var langareaval  = $("#langareaval").val();
	
	//Error Language
	var err_lang_arr = error_language();
	
	var searcharea_restaurant = $.trim($("#searchfieldArea_restaurant").val());
	var searchrest = $.trim($("#searchfieldRestaurant").val());
	
	if(searcharea_restaurant == '' || searcharea_restaurant == langareaval){
		alert(err_lang_arr['alert_message_indexarea']);
		$("#searchfieldArea_restaurant").focus();
		$("#searchfieldArea_restaurant").select();
		return false;
	}
	if(searchrest == '' || searchrest == langrestval){
		alert(err_lang_arr['alert_message_indexresname']);
		$("#searchfieldRestaurant").focus();
		$("#searchfieldRestaurant").select();
		return false;
	}
}

