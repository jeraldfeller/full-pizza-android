<?php

include ("../includes/config.inc.php");

$fromdate = 'From Date : '.$_GET['report_from'];
$todate = 'To Date : '.$_GET['report_to'];
$downloaddate = 'Download Date : '.date("d.m.Y");
$totalRecords = 'Total Orders : '.$_REQUEST['total'];

//Order Information
	#From date & End date
	if(isset($_REQUEST['report']) && !empty($_REQUEST['report']) )
	{
		if($_REQUEST['report'] == 'ThisWeek'){
			$searcri = "This Week (Mon - Today)";
		}
		elseif($_REQUEST['report'] == 'LastWeek'){
			$searcri = "Last Week (Mon - Sun)";
		}else{
			$searcri = $_GET['report'];
		}
		$searchcreteria = 'Search criteria : '.$searcri;
	}
	#From date & End date
	elseif(isset($_REQUEST['report_from']) && isset($_REQUEST['report_to']) && !empty($_REQUEST['report_from']) && !empty($_REQUEST['report_to']))
	{
		$searchkeyword = '<td valign="middle">'.$fromdate.'</td><td valign="middle">'.$todate.'</td>';
	}else{
		$searchkeyword = '<td valign="middle">Search keyword : '.'All</td>';
	}
	
$html .= '
<table><tr><td><p><img src="'.$CFG['site']['logoname'].'" /></p></td><td valign="middle">'.$searchcreteria.'</td>'.$searchkeyword.'<td valign="middle">'.$downloaddate.'</td><td valign="middle">'.$totalRecords.'</td></tr></table>


<table class="bpmTopnTailC" width="100%"><thead>
<tr class="headerrow"><th>SNo</th><td><p>Order No</p></td><td align="left">Name</td><td align="left">Email</td><td align="left">Restaurant</td><td align="right">Total Price</td><td align="left">Ordered Date</td></tr>
</thead><tbody>
';

	if(!empty($_REQUEST['report_from']) && !empty($_REQUEST['report_to']))
	{
		//Delivered date List from datewise		 
			$stdate = $_REQUEST['report_from'];
		list($day,$month,$year) = explode("-",$stdate);
		$startdate = $year.'-'.$month.'-'.$day;
		
		$enddate = $_REQUEST['report_to'];
		list($day,$month,$year) = explode("-",$enddate);
		$end_date = $year.'-'.$month.'-'.$day;
        $end_date = strtotime($end_date);
        $end_date = strtotime("+1 day",$end_date);
        $end_date = date("Y-m-d",$end_date);
		
		$condition .= " AND orderdate BETWEEN '".$startdate."' AND '".$end_date."' ";
        
	}
	elseif($_REQUEST['report'] == "Today"){
		$today = date("Y-m-d");
		$condition .= " AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '".$today."'";
	}
	elseif($_REQUEST['report'] == "ThisWeek"){
		$condition .= " AND WEEK(now(),7) = WEEK(orderdate,7) AND DATEDIFF(now(),orderdate)<7";
	}
	elseif($_REQUEST['report'] == "LastWeek"){
		$lastweek = date("d-m-Y",strtotime('-1 week'));
		$date = $objSite->week_from_monday($lastweek);
        //$date = $objAdmin->week_from_monday($lastweek);
		$weekdate = implode(",",$date);
		
		$condition .= " AND (
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[0]' OR 
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[1]' OR 
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[2]' OR 
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[3]' OR 
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[4]' OR 
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[5]' OR
						DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[6]' ) ";		
	}
	elseif($_REQUEST['report'] == "LastMonth"){
		$lastmonth = date("Y-m", strtotime("-1 month") ) ;
		$condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='".$lastmonth."'";
	}
	elseif($_REQUEST['report'] == "ThisMonth"){
		$currentmonth = date("Y-m");
		$condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='".$currentmonth."'";
	}
	elseif($_REQUEST['report'] == "ThisYear"){
		$currentyear = date("Y");
		$condition .= " AND DATE_FORMAT(orderdate,'%Y')='".$currentyear."'";
	}
	elseif($_REQUEST['report'] == "LastYear"){
		$lastyear = date("Y", strtotime("-1 year") ) ;
		$condition .= " AND DATE_FORMAT(orderdate,'%Y')='".$lastyear."'";
	}
	
	if(isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid'])){
		$condition .= " AND res.restaurant_id = '".$_REQUEST['searchrestaurantid']."' " ;
	}
	
	echo $sql_sel = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, ro.ordertotalprice, ro.status, ro.orderdate, ". 
			   " res.restaurant_name ".
			   " FROM ".$CFG['table']['order']." AS ro ".
			   " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON ro.restaurant_id = res.restaurant_id ".
			   " WHERE ro.delete_status = 'No' AND ro.paypal_status = 'success' AND ro.status = 'completed' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL ".$condition." ORDER BY ro.orderid DESC ";
	$ressql = mysqli_query($objSite->DBCONN,$sql_sel) or die(mysqli_error($objSite->DBCONN));
    //$ressql = $objSite->ExecuteQuery($sql,'select');
    //$ressql = $objAdmin->ExecuteQuery($sql,'select');
	$cnt = 1;
	while($row=mysqli_fetch_array($ressql))
	{
		$orderid 	    = $row['ordergenerateid'];
		$customername   = $row['customername'];
		$customeremail  = $row['customeremail'];
		$restaurantname = $row['restaurant_name'];
		$totalprice     = $row['ordertotalprice'];
		
		#Delivery Date
		list($orddate, $ordtime) = explode(" ",$row['orderdate']);
		list($ordyear, $ordmonth, $ordday) = explode("-",$orddate);
		list($ordhour, $ordmin, $ordsec) = explode(":",$ordtime);
		$ordmktime = mktime($ordhour, $ordmin, $ordsec, $ordmonth, $ordday, $ordyear);
		$orderdate  = date("d.m.Y H:i D",$ordmktime);
		
		if($cnt%2==1) $rowclass = 'oddrow';else $rowclass = 'evenrow';
		
		$html .= '
<tr class="'.$rowclass.'"><td>'.$cnt.'</td><td>'.$orderid.'</td><td align="left">'.$customername.'</td><td align="left">'.$customeremail.'</td><td align="left">'.$restaurantname.'</td><td align="right">'.$totalprice.'</td><td align="left">'.$orderdate.'</td></tr>
';
		$cnt++;  
	}

$html .= '
</tbody></table>

<p>&nbsp;</p>


';

//==============================================================
//==============================================================
//==============================================================
include($CFG['site']['base_path']."/includes/mpdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',5,5,5,5,5,5); 
$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle($CFG['site']['sitename']." - Report");
$mpdf->SetAuthor($CFG['site']['sitename']);
$mpdf->SetWatermarkText($CFG['site']['sitename']);
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.03;
$mpdf->SetDisplayMode('fullwidth');

// LOAD a stylesheet
$stylesheet = file_get_contents(dirname(dirname(__FILE__)).'/includes/mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================


?>