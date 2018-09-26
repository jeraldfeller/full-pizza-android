<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt();
$objAdmin->Admin_authetic();
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
	#EDIT
	if(isset($_GET['eid']) && !empty($_GET['eid'])){
		//echo "hi";
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		$eid = $_GET['eid'];
		if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){												
			$objAdminRestaurantMgmt->restaurantEdit($eid);
		}
		//List edit page
		$restauEditDet = $objAdminRestaurantMgmt->geteditRestaurantList($eid);
		
		$restauEditDetTiming = $objSite->geteditRestaurantListTiming($eid);
		$objSite->showcityList($restauEditDet[0]['restaurant_state']);
		$objSite->showzipList($restauEditDet[0]['restaurant_city']);
		
		//Google Map Delivery Area start-------------------------------
		$restaurantdetail 		= $objSite->siteRestDetails($eid);
		
		//$res_straddress 		= $objSite->My_stripslashes($restaurantdetail[0]['restaurant_streetaddress']);
		//$res_area 				= $objSite->My_stripslashes($restaurantdetail[0]['areaname']);
		$res_city 				= $objSite->My_stripslashes($restaurantdetail[0]['cityname']);
		$res_state 				= $objSite->My_stripslashes($restaurantdetail[0]['statename']);
		$restaurant_address_map = $objSite->findFullAddress($res_straddress, $res_area, $res_city, $res_state);
		//echo "hi";
	//	echo $restaurant_address_map;
	//	echo "<pre>";print_r($restaurant_address_map);echo "</pre>";
		$admin_smarty->assign("restaurant_address_map", $restaurant_address_map);
		//Google Map Delivery Area end-------------------------------
		
		
	}else{
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
			$objAdminRestaurantMgmt->restaurantAdd();
		}
	}
	$objSite->showStateList();
	$objSite->getShowCuisineList();
	$objSite->showDeliveryAresList();
	
		#Open Time	
		list($monopentimehr,$monopentimemin,$monopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['mon_firstopen_time']);
		list($tueopentimehr,$tueopentimemin,$tueopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['tue_firstopen_time']);
		list($wedopentimehr,$wedopentimemin,$wedopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['wed_firstopen_time']);
		list($thuopentimehr,$thuopentimemin,$thuopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['thu_firstopen_time']);
		list($friopentimehr,$friopentimemin,$friopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['fri_firstopen_time']);
		list($satopentimehr,$satopentimemin,$satopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['sat_firstopen_time']);
		list($sunopentimehr,$sunopentimemin,$sunopentimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['sun_firstopen_time']);
		
		#Second Open Time	
		list($monsecondopentimehr,$monsecondopentimemin,$monsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['mon_secondopen_time']);
		list($tuesecondopentimehr,$tuesecondopentimemin,$tuesecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['tue_secondopen_time']);
		list($wedsecondopentimehr,$wedsecondopentimemin,$wedsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['wed_secondopen_time']);
		list($thusecondopentimehr,$thusecondopentimemin,$thusecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['thu_secondopen_time']);
		list($frisecondopentimehr,$frisecondopentimemin,$frisecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['fri_secondopen_time']);
		list($satsecondopentimehr,$satsecondopentimemin,$satsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sat_secondopen_time']);
		list($sunsecondopentimehr,$sunsecondopentimemin,$sunsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sun_secondopen_time']);
		
		#Close Time	
		list($monclosetimehr,$monclosetimemin,$monclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['mon_firstclose_time']);
		list($tueclosetimehr,$tueclosetimemin,$tueclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['tue_firstclose_time']);
		list($wedclosetimehr,$wedclosetimemin,$wedclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['wed_firstclose_time']);
		list($thuclosetimehr,$thuclosetimemin,$thuclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['thu_firstclose_time']);
		list($friclosetimehr,$friclosetimemin,$friclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['fri_firstclose_time']);
		list($satclosetimehr,$satclosetimemin,$satclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['sat_firstclose_time']);
		list($sunclosetimehr,$sunclosetimemin,$sunclosetimesess) = $objSite->deliveryTimeHrMinSes($restauEditDetTiming[0]['sun_firstclose_time']);
      
		
		#Second Close Time	
		list($monsecondclosetimehr,$monsecondclosetimemin,$monsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['mon_secondclose_time']);
		list($tuesecondclosetimehr,$tuesecondclosetimemin,$tuesecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['tue_secondclose_time']);
		list($wedsecondclosetimehr,$wedsecondclosetimemin,$wedsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['wed_secondclose_time']);
		list($thusecondclosetimehr,$thusecondclosetimemin,$thusecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['thu_secondclose_time']);
		list($frisecondclosetimehr,$frisecondclosetimemin,$frisecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['fri_secondclose_time']);
		list($satsecondclosetimehr,$satsecondclosetimemin,$satsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sat_secondclose_time']);
		list($sunsecondclosetimehr,$sunsecondclosetimemin,$sunsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sun_secondclose_time']);
	
	/** if($monopentimehr == ''){
		$monopentimehr = '07';
	}
	if($monopentimemin == ''){
		$monopentimemin = '30';
	}
	if($monclosetimehr == ''){
		$monclosetimehr = '10';
	}		
	if($monclosetimemin == ''){
		$monclosetimemin = '30';
	}
	
	if($monsecondopentimehr == ''){
		$monsecondopentimehr = '01';
	}
	if($monsecondopentimemin == ''){
		$monsecondopentimemin = '30';
	}
	if($monsecondclosetimehr == ''){
		$monsecondclosetimehr = '07';
	}		
	if($monsecondclosetimemin == ''){
		$monsecondclosetimemin = '30';
	} **/
	#Monday
	  #Open Time
		#Hours List
		$hours_list_mon = $objSite->hourslist($monopentimehr);
		$admin_smarty->assign('HOURS_LIST_MON', $hours_list_mon);
		
		#Mins List
		$minutes_list_mon = $objSite->minuteslist($monopentimemin);
		$admin_smarty->assign('MINUTES_LIST_MON', $minutes_list_mon);
		
		$admin_smarty->assign('monopentimesess', $monopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_mon = $objSite->hourslist($monclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_MON', $hours_list_close_mon);
		
		#Mins List
		$minutes_list_close_mon = $objSite->minuteslist($monclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_MON', $minutes_list_close_mon);
		
		$admin_smarty->assign('monclosetimesess', $monclosetimesess);
	#Second Open Time
		#Hours List
		$hours_list_mon_second = $objSite->hourslist($monsecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_MON_SEC', $hours_list_mon_second);
		
		#Mins List
		$minutes_list_mon_second = $objSite->minuteslist($monsecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_MON_SEC', $minutes_list_mon_second);
		
		$admin_smarty->assign('monsecondopentimesess', $monsecondopentimesess);
		#echo "monsecondopentimesess ".$monsecondopentimesess;
	#Second Close Time
	  	#Hours List
		$hours_list_close_mon_second = $objSite->hourslist($monsecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_MON_SEC', $hours_list_close_mon_second);
		
		#Mins List
		$minutes_list_close_mon_second = $objSite->minuteslist($monsecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_MON_SEC', $minutes_list_close_mon_second);
		
		$admin_smarty->assign('monsecondclosetimesess', $monsecondclosetimesess);	
		
	#Tuesday
	  #Open Time
		#Hours List
		$hours_list_tue = $objSite->hourslist($tueopentimehr);
		$admin_smarty->assign('HOURS_LIST_TUE', $hours_list_tue);
		
		#Mins List
		$minutes_list_tue = $objSite->minuteslist($tueopentimemin);
		$admin_smarty->assign('MINUTES_LIST_TUE', $minutes_list_tue);
		
		$admin_smarty->assign('tueopentimesess', $tueopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_tue = $objSite->hourslist($tueclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_TUE', $hours_list_close_tue);
		
		#Mins List
		$minutes_list_close_tue = $objSite->minuteslist($tueclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_TUE', $minutes_list_close_tue);
		
		$admin_smarty->assign('tueclosetimesess', $tueclosetimesess);
		
	#Second Open Time
		#Hours List
		$hours_list_tue_second = $objSite->hourslist($tuesecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_TUE_SEC', $hours_list_tue_second);
		
		#Mins List
		$minutes_list_tue_second = $objSite->minuteslist($tuesecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_TUE_SEC', $minutes_list_tue_second);
		
		$admin_smarty->assign('tuesecondopentimesess', $tuesecondopentimesess);
	#Second Close Time
	  	#Hours List
		$hours_list_close_tue_second = $objSite->hourslist($tuesecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_TUE_SEC', $hours_list_close_tue_second);
		
		#Mins List
		$minutes_list_close_tue_second = $objSite->minuteslist($tuesecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_TUE_SEC', $minutes_list_close_tue_second);
		
		$admin_smarty->assign('tuesecondclosetimesess', $tuesecondclosetimesess);
		
	#Wednesday
	  #Open Time
		#Hours List
		$hours_list_wed = $objSite->hourslist($wedopentimehr);
		$admin_smarty->assign('HOURS_LIST_WED', $hours_list_wed);
		
		#Mins List
		$minutes_list_wed = $objSite->minuteslist($wedopentimemin);
		$admin_smarty->assign('MINUTES_LIST_WED', $minutes_list_wed);
		
		$admin_smarty->assign('wedopentimesess', $wedopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_wed = $objSite->hourslist($wedclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_WED', $hours_list_close_wed);
		
		#Mins List
		$minutes_list_close_wed = $objSite->minuteslist($wedclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_WED', $minutes_list_close_wed);
		
		$admin_smarty->assign('wedclosetimesess', $wedclosetimesess);
		
	#second Open Time
		#Hours List
		$hours_list_wed_second = $objSite->hourslist($wedsecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_WED_SEC', $hours_list_wed_second);
		
		#Mins List
		$minutes_list_wed_second = $objSite->minuteslist($wedsecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_WED_SEC', $minutes_list_wed_second);
		
		$admin_smarty->assign('wedsecondopentimesess', $wedsecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_wed_second = $objSite->hourslist($wedsecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_WED_SEC', $hours_list_close_wed_second);
		
		#Mins List
		$minutes_list_close_wed_second = $objSite->minuteslist($wedsecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_WED_SEC', $minutes_list_close_wed_second);
		
		$admin_smarty->assign('wedsecondclosetimesess', $wedsecondclosetimesess);
		
	#Thursday
	  #Open Time
		#Hours List
		$hours_list_thu = $objSite->hourslist($thuopentimehr);
		$admin_smarty->assign('HOURS_LIST_THU', $hours_list_thu);
		
		#Mins List
		$minutes_list_thu = $objSite->minuteslist($thuopentimemin);
		$admin_smarty->assign('MINUTES_LIST_THU', $minutes_list_thu);
		
		$admin_smarty->assign('thuopentimesess', $thuopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_thu = $objSite->hourslist($thuclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_THU', $hours_list_close_thu);
		
		#Mins List
		$minutes_list_close_thu = $objSite->minuteslist($thuclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_THU', $minutes_list_close_thu);
		
		$admin_smarty->assign('thuclosetimesess', $thuclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_thu_second = $objSite->hourslist($thusecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_THU_SEC', $hours_list_thu_second);
		
		#Mins List
		$minutes_list_thu_second = $objSite->minuteslist($thusecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_THU_SEC', $minutes_list_thu_second);
		
		$admin_smarty->assign('thusecondopentimesess', $thusecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_thu_second = $objSite->hourslist($thusecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_THU_SEC', $hours_list_close_thu_second);
		
		#Mins List
		$minutes_list_close_thu_second = $objSite->minuteslist($thusecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_THU_SEC', $minutes_list_close_thu_second);
		
		$admin_smarty->assign('thusecondclosetimesess', $thusecondclosetimesess);
		
	#Friday
	  #Open Time
		#Hours List
		$hours_list_fri = $objSite->hourslist($friopentimehr);
		$admin_smarty->assign('HOURS_LIST_FRI', $hours_list_fri);
		
		#Mins List
		$minutes_list_fri = $objSite->minuteslist($friopentimemin);
		$admin_smarty->assign('MINUTES_LIST_FRI', $minutes_list_fri);
		
		$admin_smarty->assign('friopentimesess', $friopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_fri = $objSite->hourslist($friclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_FRI', $hours_list_close_fri);
		
		#Mins List
		$minutes_list_close_fri = $objSite->minuteslist($friclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_FRI', $minutes_list_close_fri);
		
		$admin_smarty->assign('friclosetimesess', $friclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_fri_second = $objSite->hourslist($frisecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_FRI_SEC', $hours_list_fri_second);
		
		#Mins List
		$minutes_list_fri_second = $objSite->minuteslist($frisecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_FRI_SEC', $minutes_list_fri_second);
		
		$admin_smarty->assign('frisecondopentimesess', $frisecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_fri_second = $objSite->hourslist($frisecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_FRI_SEC', $hours_list_close_fri_second);
		
		#Mins List
		$minutes_list_close_fri_second = $objSite->minuteslist($frisecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_FRI_SEC', $minutes_list_close_fri_second);
		
		$admin_smarty->assign('frisecondclosetimesess', $frisecondclosetimesess);
		
	#Saturday
	  #Open Time
		#Hours List
		$hours_list_sat = $objSite->hourslist($satopentimehr);
		$admin_smarty->assign('HOURS_LIST_SAT', $hours_list_sat);
		
		#Mins List
		$minutes_list_sat = $objSite->minuteslist($satopentimemin);
		$admin_smarty->assign('MINUTES_LIST_SAT', $minutes_list_sat);
		
		$admin_smarty->assign('satopentimesess', $satopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sat = $objSite->hourslist($satclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_SAT', $hours_list_close_sat);
		
		#Mins List
		$minutes_list_close_sat = $objSite->minuteslist($satclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_SAT', $minutes_list_close_sat);
		
		$admin_smarty->assign('satclosetimesess', $satclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_sat_second = $objSite->hourslist($satsecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_SAT_SEC', $hours_list_sat_second);
		
		#Mins List
		$minutes_list_sat_second = $objSite->minuteslist($satsecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_SAT_SEC', $minutes_list_sat_second);
		
		$admin_smarty->assign('satsecondopentimesess', $satsecondopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sat_second = $objSite->hourslist($satsecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_SAT_SEC', $hours_list_close_sat_second);
		
		#Mins List
		$minutes_list_close_sat_second = $objSite->minuteslist($satsecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_SAT_SEC', $minutes_list_close_sat_second);
		
		$admin_smarty->assign('satsecondclosetimesess', $satsecondclosetimesess);		
		
	#Sunday
	 #Open Time
		#Hours List
		$hours_list_sun = $objSite->hourslist($sunopentimehr);
		$admin_smarty->assign('HOURS_LIST_SUN', $hours_list_sun);
		
		#Mins List
		$minutes_list_sun = $objSite->minuteslist($sunopentimemin);
		$admin_smarty->assign('MINUTES_LIST_SUN', $minutes_list_sun);
		
		$admin_smarty->assign('sunopentimesess', $sunopentimesess);
	 #Close Time
	  	#Hours List
       
		$hours_list_close_sun = $objSite->hourslist($sunclosetimehr);
       
		$admin_smarty->assign('HOURS_LIST_CLOSE_SUN', $hours_list_close_sun);
		
		#Mins List
		$minutes_list_close_sun = $objSite->minuteslist($sunclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_SUN', $minutes_list_close_sun);
		
		$admin_smarty->assign('sunclosetimesess', $sunclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_sun_second = $objSite->hourslist($sunsecondopentimehr);
		$admin_smarty->assign('HOURS_LIST_SUN_SEC', $hours_list_sun_second);
		
		#Mins List
		$minutes_list_sun_second = $objSite->minuteslist($sunsecondopentimemin);
		$admin_smarty->assign('MINUTES_LIST_SUN_SEC', $minutes_list_sun_second);
		
		$admin_smarty->assign('sunsecondopentimesess', $sunsecondopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sun_second = $objSite->hourslist($sunsecondclosetimehr);
		$admin_smarty->assign('HOURS_LIST_CLOSE_SUN_SEC', $hours_list_close_sun_second);
		
		#Mins List
		$minutes_list_close_sun_second = $objSite->minuteslist($sunsecondclosetimemin);
		$admin_smarty->assign('MINUTES_LIST_CLOSE_SUN_SEC', $minutes_list_close_sun_second);
		
		$admin_smarty->assign('sunsecondclosetimesess', $sunsecondclosetimesess);

#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('restaurantAddEdit.tpl');
$main_content = $admin_smarty->fetch('restaurantAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>