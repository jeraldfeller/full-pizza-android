<?php

#include(dirname(dirname(__FILE__))."/includes/config.inc.php");

//Open log file to append data.
$fp = fopen(dirname(dirname(__FILE__))."/gprs.log", "a+");

//Starting log
fwrite($fp, date("M d, Y h:m:s")." Receiving lines off printer: \n");

//“restid” is the “ResID” which had been set in the device
$ResId = "";
if(isset($_GET['restid']))
{
  $ResId = $_GET['restid'];
}
else
{
  fwrite($fp, date("M d, Y h:m:s")." Parameter 'restid' was not given \n");
}

//“ordernumber” is the “Order No” which come from the order.
$OrderNumber = "";
if(isset($_GET['ordernumber']))
{
  $OrderNumber = $_GET['ordernumber'];
}
else
{
  fwrite($fp, date("M d, Y h:m:s")." Parameter 'ordernumber' was not given \n");
}

//“status” is the operation of accepting/Rejecting order. If accept the order, status=Accepted. If reject order, status=Rejected
$acceptReject = "";
if(isset($_GET['status']))
{
  $acceptReject = $_GET['status'];
}
else
{
  fwrite($fp, date("M d, Y h:m:s")." Parameter 'status' was not given \n");
}

/*
“reason” is the description of accepting/Rejecting order. If accept the order, m=ok. If reject order, “reason” is the reject reason that the operator selected when rejecting the order.
*/
$message = "";
if(isset($_GET['reason']))
{
  $message = $_GET['reason'];
}
else
{
  fwrite($fp, date("M d, Y h:m:s")." Parameter 'reason' was not given \n");
}

/*
“deliverytime” is the time that the operator input when accepting/Rejecting order. 
*/
$time = "";
if(isset($_GET['deliverytime']))
{
  $time = $_GET['deliverytime'];
}
else
{
  fwrite($fp, date("M d, Y h:m:s")." Parameter 'deliverytime' was not given \n");
}


$generated_line = "ResId: ".$ResId.",OrderNumber: ".$OrderNumber.",acceptReject: ".$acceptReject.",message: ".$message.",time: ".$time;

//Saving the line on the log.
fwrite($fp, date("M d, Y h:m:s")." Parameters: ".$generated_line. " \n");

//Finish Receiving
fwrite($fp, date("M d, Y h:m:s")." Finish lines from printer: \n");

//capture allpost data
$alldata ='';
foreach($_POST as $key=>$value) 
{   
	$alldata .= $key." : ".$value;
} 
fwrite($fp, $alldata);
//Close log file.
fclose($fp);
	
if(!empty($ResId) && !empty($OrderNumber))
{
	if( $acceptReject ='accepted' || $acceptReject ='rejected' || $acceptReject ='1' || $acceptReject ='OK'){
		
		include(dirname(dirname(__FILE__))."/includes/dbDetails.php");
		
		$conn = mysqli_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PWD) or die("Could not connect: ".DATABASE_HOST." :: ".DATABASE_NAME." :: ".DATABASE_USER." :: ".DATABASE_PWD. mysqli_error($this->DBCONN));
		mysqli_select_db(DATABASE_NAME,$conn) or die ('<br>Can\'t use  : '.DATABASE_NAME . mysqli_error($this->DBCONN));
		
		$upqry = "UPDATE rt_order SET printer_response = 'Y', printer_res_deli_time = '".$time."', printer_ack = '".$acceptReject."', printer_ack_msg = '".$message."'  WHERE orderid = '".$OrderNumber."' ";
		#echo "<br>".$upqry;
		$reqry = mysqli_query($this->DBCONN,$upqry) or die("Error in Selection Query <br> ".$Query."<br>". mysqli_error($this->DBCONN));	
	}
	
	$f = dirname(dirname(__FILE__))."/includes/orderfiles/".$ResId.".txt";

	// read into array
	$arr = file($f);
	
	// remove first line
	unset($arr[0]);
	
	// reindex array
	$arr = array_values($arr);
	
	// write back to file
	file_put_contents($f,implode($arr));
}
