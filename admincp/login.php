<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_Notauthetic();
#..........................................................................
#..........................................................................	
$admin_smarty->display("login.tpl");
?>