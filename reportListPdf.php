<?php

include ("includes/config.inc.php");
global $CFG;
$fromdate = 'From Date : '.$_GET['startdate'];
$todate = 'To Date : '.$_GET['enddate'];
$downloaddate = 'Download Date : '.date("d.m.Y");
$totalRecords = 'Total Orders : '.$_REQUEST['total'];

//Order Information
	#From date & End date
	if(isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) )
	{
		if($_REQUEST['sortbystatus'] == 'ThisWeek'){
			$searcri = "This Week (Mon - Today)";
		}
		elseif($_REQUEST['sortbystatus'] == 'LastWeek'){
			$searcri = "Last Week (Mon - Sun)";
		}else{
			$searcri = $_GET['sortbystatus'];
		}
		$searchcreteria = 'Search criteria : '.$searcri;
	}
	#From date & End date
	elseif(isset($_REQUEST['startdate']) && isset($_REQUEST['enddate']) && !empty($_REQUEST['startdate']) && !empty($_REQUEST['enddate']))
	{
		$searchkeyword = '<td valign="middle">'.$fromdate.'</td><td valign="middle">'.$todate.'</td>';
	}else{
		$searchkeyword = '<td valign="middle">Search keyword : '.'All</td>';
	}
	
$html .= '
<table><tr><td><p><img src="'.$CFG['site']['logoname'].'" /></p></td><td valign="middle">'.$searchcreteria.'</td>'.$searchkeyword.'<td valign="middle">'.$downloaddate.'</td><td valign="middle">'.$totalRecords.'</td></tr></table>


<table class="bpmTopnTailC" width="100%"><thead>
<tr class="headerrow"><td align="center">SNo</td><td align="center"><p>Order No</p></td><td align="center">Name</td><td align="center">Email</td><td align="center">Total Price</td><td align="center">Ordered Date</td></tr>
</thead><tbody>
';

	if(!empty($_REQUEST['startdate']) && !empty($_REQUEST['enddate']))
	{
		//Delivered date List from datewise		 
		$stdate = $_REQUEST['startdate'];
		list($day,$month,$year) = explode("-",$stdate);
		$startdate = $year.'-'.$month.'-'.$day.' 00:00:01';
		
		$enddate = $_REQUEST['enddate'];
		list($day,$month,$year) = explode("-",$enddate);
		$end_date = $year.'-'.$month.'-'.$day.' 23:59:59';
		
		$condition .= " AND orderdate BETWEEN '".$startdate."' AND '".$end_date."' ";
	}
	elseif($_REQUEST['sortbystatus'] == "Today"){
		$today = date("Y-m-d");
		$condition .= " AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '".$today."'";
	}
	elseif($_REQUEST['sortbystatus'] == "ThisWeek"){
		$condition .= " AND WEEK(now(),7) = WEEK(orderdate,7) AND DATEDIFF(now(),orderdate)<7";
	}
	elseif($_REQUEST['sortbystatus'] == "LastWeek"){
		$lastweek = date("d-m-Y",strtotime('-1 week'));
		$date = $objSite->week_from_monday($lastweek);
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
	elseif($_REQUEST['sortbystatus'] == "LastMonth"){
		$lastmonth = date("Y-m", strtotime("-1 month") ) ;
		$condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='".$lastmonth."'";
	}
	elseif($_REQUEST['sortbystatus'] == "ThisMonth"){
		$currentmonth = date("Y-m");
		$condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='".$currentmonth."'";
	}
	elseif($_REQUEST['sortbystatus'] == "ThisYear"){
		$currentyear = date("Y");
		$condition .= " AND DATE_FORMAT(orderdate,'%Y')='".$currentyear."'";
	}
	elseif($_REQUEST['sortbystatus'] == "LastYear"){
		$lastyear = date("Y", strtotime("-1 year") ) ;
		$condition .= " AND DATE_FORMAT(orderdate,'%Y')='".$lastyear."'";
	}
	
	if(isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid'])){
		$condition .= " AND res.restaurant_id = '".$objSite->filterInput($_REQUEST['searchrestaurantid'])."' " ;
	}elseif(isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid'])){
		$condition .= " AND res.restaurant_id = '".$objSite->filterInput($_SESSION['restaurantownerid'])."' " ;
	}
	
	$sql_sel = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, ro.ordertotalprice, ro.status, ro.orderdate, ". 
			   " res.restaurant_name ".
			   " FROM ".$CFG['table']['order']." AS ro ".
			   " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON ro.restaurant_id = res.restaurant_id ".
			   " WHERE ro.delete_status = 'No' AND ro.paypal_status = 'success' AND ro.status = 'completed' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL ".$condition." ORDER BY ro.orderid DESC ";  
	$ressql = mysqli_query($objSite->DBCONN,$sql_sel) or die(mysqli_error($objSite->DBCONN));
    
    //echo "<pre>";print_r($ressql);echo "</pre>";
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
		$orderdate  = date("d.m.Y h:i a  D",$ordmktime);
		
		if($cnt%2==1) $rowclass = 'oddrow';else $rowclass = 'evenrow';
		
		$html .= '
<tr class="'.$rowclass.'"><td align="center">'.$cnt.'</td><td align="center">'.$orderid.'</td><td align="center">'.$customername.'</td><td align="center">'.$customeremail.'</td><td align="center">'.$CFG['site']['currency'].' '.$totalprice.'</td><td align="center">'.$orderdate.'</td></tr>
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
$stylesheet = file_get_contents(dirname(__FILE__).'/includes/mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================


?> 