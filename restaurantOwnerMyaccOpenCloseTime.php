<?php

		$restauEditDetTiming = $objSite->geteditRestaurantListTiming($_SESSION['restaurantownerid']);
		#echo "<pre>";print_r($restauEditDetTiming);echo "</pre>";
		
		#Open Time	
		list($monopentimehr,$monopentimemin,$monopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['mon_firstopen_time']);
		list($tueopentimehr,$tueopentimemin,$tueopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['tue_firstopen_time']);
		list($wedopentimehr,$wedopentimemin,$wedopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['wed_firstopen_time']);
		list($thuopentimehr,$thuopentimemin,$thuopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['thu_firstopen_time']);
		list($friopentimehr,$friopentimemin,$friopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['fri_firstopen_time']);
		list($satopentimehr,$satopentimemin,$satopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sat_firstopen_time']);
		list($sunopentimehr,$sunopentimemin,$sunopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sun_firstopen_time']);
		
		#Second Open Time	
		list($monsecondopentimehr,$monsecondopentimemin,$monsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['mon_secondopen_time']);
		list($tuesecondopentimehr,$tuesecondopentimemin,$tuesecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['tue_secondopen_time']);
		list($wedsecondopentimehr,$wedsecondopentimemin,$wedsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['wed_secondopen_time']);
		list($thusecondopentimehr,$thusecondopentimemin,$thusecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['thu_secondopen_time']);
		list($frisecondopentimehr,$frisecondopentimemin,$frisecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['fri_secondopen_time']);
		list($satsecondopentimehr,$satsecondopentimemin,$satsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sat_secondopen_time']);
		list($sunsecondopentimehr,$sunsecondopentimemin,$sunsecondopentimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sun_secondopen_time']);
		
		#Close Time	
		list($monclosetimehr,$monclosetimemin,$monclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['mon_firstclose_time']);
		list($tueclosetimehr,$tueclosetimemin,$tueclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['tue_firstclose_time']);
		list($wedclosetimehr,$wedclosetimemin,$wedclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['wed_firstclose_time']);
		list($thuclosetimehr,$thuclosetimemin,$thuclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['thu_firstclose_time']);
		list($friclosetimehr,$friclosetimemin,$friclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['fri_firstclose_time']);
		list($satclosetimehr,$satclosetimemin,$satclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sat_firstclose_time']);
		list($sunclosetimehr,$sunclosetimemin,$sunclosetimesess) = $objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sun_firstclose_time']);
		
		#Second Close Time	
		list($monsecondclosetimehr,$monsecondclosetimemin,$monsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['mon_secondclose_time']);
		list($tuesecondclosetimehr,$tuesecondclosetimemin,$tuesecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['tue_secondclose_time']);
		list($wedsecondclosetimehr,$wedsecondclosetimemin,$wedsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['wed_secondclose_time']);
		list($thusecondclosetimehr,$thusecondclosetimemin,$thusecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['thu_secondclose_time']);
		list($frisecondclosetimehr,$frisecondclosetimemin,$frisecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['fri_secondclose_time']);
		list($satsecondclosetimehr,$satsecondclosetimemin,$satsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sat_secondclose_time']);
		list($sunsecondclosetimehr,$sunsecondclosetimemin,$sunsecondclosetimesess)=$objSite->deliveryTimeHrMinSes_restime($restauEditDetTiming[0]['sun_secondclose_time']);
	
	#echo "<br> monopentimehr: ".$monopentimehr;
	
	if($monopentimehr == ''){		
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
	}	
	
	#Monday
	  #Open Time
		#Hours List
		$hours_list_mon = $objSite->hourslist($monopentimehr);
		$objSmarty->assign('HOURS_LIST_MON', $hours_list_mon);
		
		#Mins List
		$minutes_list_mon = $objSite->minuteslist($monopentimemin);
		$objSmarty->assign('MINUTES_LIST_MON', $minutes_list_mon);
		
		$objSmarty->assign('monopentimesess', $monopentimesess);
		#echo "monopentimesess ".$monopentimesess;
	  #Close Time
	  	#Hours List
		$hours_list_close_mon = $objSite->hourslist($monclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_MON', $hours_list_close_mon);
		
		#Mins List
		$minutes_list_close_mon = $objSite->minuteslist($monclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_MON', $minutes_list_close_mon);
		
		$objSmarty->assign('monclosetimesess', $monclosetimesess);		
		
	#Second Open Time
		#Hours List
		$hours_list_mon_second = $objSite->hourslist($monsecondopentimehr);
		$objSmarty->assign('HOURS_LIST_MON_SEC', $hours_list_mon_second);
		
		#Mins List
		$minutes_list_mon_second = $objSite->minuteslist($monsecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_MON_SEC', $minutes_list_mon_second);
		
		$objSmarty->assign('monsecondopentimesess', $monsecondopentimesess);
		#echo "monsecondopentimesess ".$monsecondopentimesess;
	#Second Close Time
	  	#Hours List
		$hours_list_close_mon_second = $objSite->hourslist($monsecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_MON_SEC', $hours_list_close_mon_second);
		
		#Mins List
		$minutes_list_close_mon_second = $objSite->minuteslist($monsecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_MON_SEC', $minutes_list_close_mon_second);
		
		$objSmarty->assign('monsecondclosetimesess', $monsecondclosetimesess);		
		
	#Tuesday
	  #Open Time
		#Hours List
		$hours_list_tue = $objSite->hourslist($tueopentimehr);
		$objSmarty->assign('HOURS_LIST_TUE', $hours_list_tue);
		
		#Mins List
		$minutes_list_tue = $objSite->minuteslist($tueopentimemin);
		$objSmarty->assign('MINUTES_LIST_TUE', $minutes_list_tue);
		
		$objSmarty->assign('tueopentimesess', $tueopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_tue = $objSite->hourslist($tueclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_TUE', $hours_list_close_tue);
		
		#Mins List
		$minutes_list_close_tue = $objSite->minuteslist($tueclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_TUE', $minutes_list_close_tue);
		
		$objSmarty->assign('tueclosetimesess', $tueclosetimesess);		
		
		#Open Time
		#Hours List
		$hours_list_tue_second = $objSite->hourslist($tuesecondopentimehr);
		$objSmarty->assign('HOURS_LIST_TUE_SEC', $hours_list_tue_second);
		
		#Mins List
		$minutes_list_tue_second = $objSite->minuteslist($tuesecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_TUE_SEC', $minutes_list_tue_second);
		
		$objSmarty->assign('tuesecondopentimesess', $tuesecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_tue_second = $objSite->hourslist($tuesecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_TUE_SEC', $hours_list_close_tue_second);
		
		#Mins List
		$minutes_list_close_tue_second = $objSite->minuteslist($tuesecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_TUE_SEC', $minutes_list_close_tue_second);
		
		$objSmarty->assign('tuesecondclosetimesess', $tuesecondclosetimesess);
		
	#Wednesday
	  #Open Time
		#Hours List
		$hours_list_wed = $objSite->hourslist($wedopentimehr);
		$objSmarty->assign('HOURS_LIST_WED', $hours_list_wed);
		
		#Mins List
		$minutes_list_wed = $objSite->minuteslist($wedopentimemin);
		$objSmarty->assign('MINUTES_LIST_WED', $minutes_list_wed);
		
		$objSmarty->assign('wedopentimesess', $wedopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_wed = $objSite->hourslist($wedclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_WED', $hours_list_close_wed);
		
		#Mins List
		$minutes_list_close_wed = $objSite->minuteslist($wedclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_WED', $minutes_list_close_wed);
		
		$objSmarty->assign('wedclosetimesess', $wedclosetimesess);
		
	#second Open Time
		#Hours List
		$hours_list_wed_second = $objSite->hourslist($wedsecondopentimehr);
		$objSmarty->assign('HOURS_LIST_WED_SEC', $hours_list_wed_second);
		
		#Mins List
		$minutes_list_wed_second = $objSite->minuteslist($wedsecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_WED_SEC', $minutes_list_wed_second);
		
		$objSmarty->assign('wedsecondopentimesess', $wedsecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_wed_second = $objSite->hourslist($wedsecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_WED_SEC', $hours_list_close_wed_second);
		
		#Mins List
		$minutes_list_close_wed_second = $objSite->minuteslist($wedsecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_WED_SEC', $minutes_list_close_wed_second);
		
		$objSmarty->assign('wedsecondclosetimesess', $wedsecondclosetimesess);		
		
	#Thursday
	  #Open Time
		#Hours List
		$hours_list_thu = $objSite->hourslist($thuopentimehr);
		$objSmarty->assign('HOURS_LIST_THU', $hours_list_thu);
		
		#Mins List
		$minutes_list_thu = $objSite->minuteslist($thuopentimemin);
		$objSmarty->assign('MINUTES_LIST_THU', $minutes_list_thu);
		
		$objSmarty->assign('thuopentimesess', $thuopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_thu = $objSite->hourslist($thuclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_THU', $hours_list_close_thu);
		
		#Mins List
		$minutes_list_close_thu = $objSite->minuteslist($thuclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_THU', $minutes_list_close_thu);
		
		$objSmarty->assign('thuclosetimesess', $thuclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_thu_second = $objSite->hourslist($thusecondopentimehr);
		$objSmarty->assign('HOURS_LIST_THU_SEC', $hours_list_thu_second);
		
		#Mins List
		$minutes_list_thu_second = $objSite->minuteslist($thusecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_THU_SEC', $minutes_list_thu_second);
		
		$objSmarty->assign('thusecondopentimesess', $thusecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_thu_second = $objSite->hourslist($thusecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_THU_SEC', $hours_list_close_thu_second);
		
		#Mins List
		$minutes_list_close_thu_second = $objSite->minuteslist($thusecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_THU_SEC', $minutes_list_close_thu_second);
		
		$objSmarty->assign('thusecondclosetimesess', $thusecondclosetimesess);		
		
	#Friday
	  #Open Time
		#Hours List
		$hours_list_fri = $objSite->hourslist($friopentimehr);
		$objSmarty->assign('HOURS_LIST_FRI', $hours_list_fri);
		
		#Mins List
		$minutes_list_fri = $objSite->minuteslist($friopentimemin);
		$objSmarty->assign('MINUTES_LIST_FRI', $minutes_list_fri);
		
		$objSmarty->assign('friopentimesess', $friopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_fri = $objSite->hourslist($friclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_FRI', $hours_list_close_fri);
		
		#Mins List
		$minutes_list_close_fri = $objSite->minuteslist($friclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_FRI', $minutes_list_close_fri);
		
		$objSmarty->assign('friclosetimesess', $friclosetimesess);
						
	#Open Time
		#Hours List
		$hours_list_fri_second = $objSite->hourslist($frisecondopentimehr);
		$objSmarty->assign('HOURS_LIST_FRI_SEC', $hours_list_fri_second);
		
		#Mins List
		$minutes_list_fri_second = $objSite->minuteslist($frisecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_FRI_SEC', $minutes_list_fri_second);
		
		$objSmarty->assign('frisecondopentimesess', $frisecondopentimesess);
	  #Close Time
	  	#Hours List
		$hours_list_close_fri_second = $objSite->hourslist($frisecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_FRI_SEC', $hours_list_close_fri_second);
		
		#Mins List
		$minutes_list_close_fri_second = $objSite->minuteslist($frisecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_FRI_SEC', $minutes_list_close_fri_second);
		
		$objSmarty->assign('frisecondclosetimesess', $frisecondclosetimesess);
		
		
	#Saturday
	  #Open Time
		#Hours List
		$hours_list_sat = $objSite->hourslist($satopentimehr);
		$objSmarty->assign('HOURS_LIST_SAT', $hours_list_sat);
		
		#Mins List
		$minutes_list_sat = $objSite->minuteslist($satopentimemin);
		$objSmarty->assign('MINUTES_LIST_SAT', $minutes_list_sat);
		
		$objSmarty->assign('satopentimesess', $satopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sat = $objSite->hourslist($satclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_SAT', $hours_list_close_sat);
		
		#Mins List
		$minutes_list_close_sat = $objSite->minuteslist($satclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_SAT', $minutes_list_close_sat);
		
		$objSmarty->assign('satclosetimesess', $satclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_sat_second = $objSite->hourslist($satsecondopentimehr);
		$objSmarty->assign('HOURS_LIST_SAT_SEC', $hours_list_sat_second);
		
		#Mins List
		$minutes_list_sat_second = $objSite->minuteslist($satsecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_SAT_SEC', $minutes_list_sat_second);
		
		$objSmarty->assign('satsecondopentimesess', $satsecondopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sat_second = $objSite->hourslist($satsecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_SAT_SEC', $hours_list_close_sat_second);
		
		#Mins List
		$minutes_list_close_sat_second = $objSite->minuteslist($satsecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_SAT_SEC', $minutes_list_close_sat_second);
		
		$objSmarty->assign('satsecondclosetimesess', $satsecondclosetimesess);		
		

	#Sunday
	 #Open Time
		#Hours List
		$hours_list_sun = $objSite->hourslist($sunopentimehr);
		$objSmarty->assign('HOURS_LIST_SUN', $hours_list_sun);
		
		#Mins List
		$minutes_list_sun = $objSite->minuteslist($sunopentimemin);
		$objSmarty->assign('MINUTES_LIST_SUN', $minutes_list_sun);
		
		$objSmarty->assign('sunopentimesess', $sunopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sun = $objSite->hourslist($sunclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_SUN', $hours_list_close_sun);
		
		#Mins List
		$minutes_list_close_sun = $objSite->minuteslist($sunclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_SUN', $minutes_list_close_sun);
		
		$objSmarty->assign('sunclosetimesess', $sunclosetimesess);
		
	#Open Time
		#Hours List
		$hours_list_sun_second = $objSite->hourslist($sunsecondopentimehr);
		$objSmarty->assign('HOURS_LIST_SUN_SEC', $hours_list_sun_second);
		
		#Mins List
		$minutes_list_sun_second = $objSite->minuteslist($sunsecondopentimemin);
		$objSmarty->assign('MINUTES_LIST_SUN_SEC', $minutes_list_sun_second);
		
		$objSmarty->assign('sunsecondopentimesess', $sunsecondopentimesess);
	 #Close Time
	  	#Hours List
		$hours_list_close_sun_second = $objSite->hourslist($sunsecondclosetimehr);
		$objSmarty->assign('HOURS_LIST_CLOSE_SUN_SEC', $hours_list_close_sun_second);
		
		#Mins List
		$minutes_list_close_sun_second = $objSite->minuteslist($sunsecondclosetimemin);
		$objSmarty->assign('MINUTES_LIST_CLOSE_SUN_SEC', $minutes_list_close_sun_second);
		
		$objSmarty->assign('sunsecondclosetimesess', $sunsecondclosetimesess);
        
        $rest_status = $objSite->open_close_time_rest($_SESSION['restaurantownerid'],CUR_TIME);
        $objSmarty->assign("rest_status", $rest_status[0]);

?>