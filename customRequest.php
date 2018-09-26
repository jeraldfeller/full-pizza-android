<?php 
include("includes/config.inc.php");


if( isset($_SESSION['customerid']) && !empty($_SESSION['customerid']) ){
	  $objSmarty->assign("logged_user", true);
} else{
    $objSmarty->assign("logged_user", false);
}

if( isset($_REQUEST['selection']) && !empty($_REQUEST['selection'])  ){
	 $_SESSION["delivery_pickup"] = $_POST["selection"]; 
     echo $_SESSION["delivery_pickup"];
} 

if( isset($_REQUEST['addressPickup']) && !empty($_REQUEST['addressPickup'])  ){
	 $_SESSION["addressPickup"] = $_POST["addressPickup"]; 
     echo $_SESSION["addressPickup"];
} 

if( isset($_REQUEST['addressForCheckout']) && !empty($_REQUEST['addressForCheckout'])  ){
	 $_SESSION["addressForCheckout"] = $_POST["addressForCheckout"]; 
     echo $_SESSION["addressForCheckout"];
}

if( isset($_REQUEST['urb']) && !empty($_REQUEST['urb'])  ){
	 $_SESSION["urb"] = $_POST["urb"]; 
     echo $_SESSION["urb"];
}

if( isset($_REQUEST['est']) && !empty($_REQUEST['est'])  ){
	 $_SESSION["est"] = $_POST["est"]; 
     echo $_SESSION["est"];
}

if( isset($_REQUEST['ciu']) && !empty($_REQUEST['ciu'])  ){
	 $_SESSION["ciu"] = $_POST["ciu"]; 
     echo $_SESSION["ciu"];
}

if( isset($_REQUEST['calle']) && !empty($_REQUEST['calle'])  ){
	 $_SESSION["calle"] = $_POST["calle"]; 
     echo $_SESSION["calle"];
}

if( isset($_REQUEST['numCasa']) && !empty($_REQUEST['numCasa'])  ){
	 $_SESSION["numCasa"] = $_POST["numCasa"]; 
     echo $_SESSION["numCasa"];
}



if( isset($_REQUEST['apartment']) && !empty($_REQUEST['apartment'])  ){
	 $_SESSION["apartment"] = $_POST["apartment"]; 
     echo $_SESSION["apartment"];
}

if( isset($_REQUEST['company']) && !empty($_REQUEST['company'])  ){
	 $_SESSION["company"] = $_POST["company"]; 
     echo $_SESSION["company"];
}

if( isset($_REQUEST['faculty']) && !empty($_REQUEST['faculty'])  ){
	 $_SESSION["faculty"] = $_POST["faculty"]; 
     echo $_SESSION["faculty"];
}

if( isset($_REQUEST['floor']) && !empty($_REQUEST['floor'])  ){
	 $_SESSION["floor"] = $_POST["floor"]; 
     echo $_SESSION["floor"];
}

if( isset($_REQUEST['postCode']) && !empty($_REQUEST['postCode'])  ){
	 $_SESSION["postCode"] = $_POST["postCode"]; 
     echo $_SESSION["postCode"];
}

if( isset($_REQUEST['specialIntructions']) && !empty($_REQUEST['specialIntructions'])  ){
	 $_SESSION["specialIntructions"] = $_POST["specialIntructions"]; 
     echo $_SESSION["specialIntructions"];
}

if( isset($_REQUEST['university']) && !empty($_REQUEST['university'])  ){
	 $_SESSION["university"] = $_POST["university"]; 
     echo $_SESSION["university"];
}

?>