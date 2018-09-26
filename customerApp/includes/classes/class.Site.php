<?php

/**
 **Class Function for Site
 */

/**
 * Site
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class Site
{

    /**
     * Site::__construct()
     * 
     * @return
     */
    function __construct($db_host = "", $db_name = "", $db_user = "", $db_pwd = "")
    {
        global $CFG;

        $db_host = $CFG['db']['db_host'];
        $db_name = $CFG['db']['db_name'];
        $db_user = $CFG['db']['db_user'];
        $db_pwd = $CFG['db']['db_pwd'];

        $this->db_connection($db_host, $db_name, $db_user, $db_pwd);
    }
    #........................................................................................
    #DB CONNECTION
    /**
     * Site::db_connection()
     * 
     * @return
     */
    function db_connection($db_host, $db_name, $db_user, $db_pwd)
    {
        $con = mysql_connect($db_host, $db_user, $db_pwd) or die("Could not connect: " .
            $db_host . " :: " . $db_name . " :: " . $db_user . " :: " . $db_pwd . " " .
            mysql_error() . $this->anyMySqlIssue(mysql_error()));
        mysql_select_db($db_name, $con) or die('Can\'t use  : ' . $db_name . mysql_error
            () . $this->anyMySqlIssue(mysql_error()));

        mysql_query(' set character set utf8 ');
        mysql_query("SET NAMES 'utf8' ");
    }
    #........................................................................................
    /**
     * Site::pr()
     * 
     * @return
     */
    function pr($arry)
    {
        echo "<pre>";
        print_r($arry);
        echo "</pre>";
    }
    #........................................................................................
    #GET Single Value
    /**
     * Site::getValue()
     * 
     * @return
     */
    function getValue($select, $table_name, $condition)
    {
        $sql = "SELECT " . $select . " FROM " . $table_name . " WHERE " . $condition .
            " ";
        $res = mysql_query($sql) or die("Error in Selection Query <br> " . $sql . "<br>" .
            mysql_error());
        $row = mysql_fetch_assoc($res);

        return stripslashes($row[$select]);
    }
    #........................................................................................
    #GET Multi Value
    /**
     * Site::getMultiValue()
     * 
     * @return
     */
    function getMultiValue($select, $table_name, $condition)
    {
        $sql = "SELECT " . $select . " FROM " . $table_name . " WHERE " . $condition ." ";
        $res = mysql_query($sql) or die("Error in Selection Query <br> " . $sql . "<br>" .
            mysql_error());
        while ($row = mysql_fetch_assoc($res))
        {
            $row_list[] = $row;
        }

        return $row_list;
    }
    #........................................................................................
    #GET NUM VALUES
    /**
     * Site::getNumvalues()
     * 
     * @return
     */
    function getNumvalues($table_name, $condition)
    {
        $sql = "SELECT * FROM " . $table_name . " WHERE " . $condition . " ";
        $res = mysql_query($sql) or die("Error in Selection Query <br> " . $sql . "<br>" .
            mysql_error());
        $num = mysql_num_rows($res);

        return $num;
    }
    #........................................................................................
    #GET UPDATE
    /**
     * Site::getUpdate()
     * 
     * @return
     */
    function getUpdate($table_name, $upvalues, $condition)
    {
        $sql = "UPDATE " . $table_name . " SET " . $upvalues . " WHERE " . $condition .
            " ";
        $res = mysql_query($sql) or die("Error in Selection Query <br> " . $sql . "<br>" .
            mysql_error());

        return ($row[$select]);
    }
    #........................................................................................
    #GET Addslashes
    /**
     * Site::My_addslashes()
     * 
     * @return
     */
    function My_addslashes($string)
    {
        $string = htmlspecialchars(addslashes(trim($string)));
        return $string;
    }
    
    /**
     * Site::filterInput()
     * 
     * @param string $input
     * @return
     */
    function filterInput($input = "") {
        $safeInput = $this->process($input);
        $safeInput = $this->safeSQL($safeInput, $this->DBCONN);
        if(!is_array($safeInput))
            $safeInput = addslashes($safeInput);
            
        return $safeInput;
    }
    function process($source) {
        // clean all elements in this array
        if (is_array($source)) {
            foreach($source as $key => $value)
                // filter element for XSS and other 'bad' code etc.
                if (is_string($value)) $source[$key] = $this->remove($this->decode($value));
            return $source;
        // clean this string
        } else if (is_string($source)) {
            // filter source for XSS and other 'bad' code etc.
            return $this->remove($this->decode($source));
        // return parameter as given
        } else return $source;    
    }
     /** 
      * Internal method to iteratively remove all unwanted tags and attributes
      * @access protected
      * @param String $source - input string to be 'cleaned'
      * @return String $source - 'cleaned' version of input parameter
      */
    function remove($source) {
        $loopCounter=0;
        // provides nested-tag protection
        while($source != $this->filterTags($source)) {
            $source = $this->filterTags($source);
            $loopCounter++;
        }
        return $source;
    } 
    
     /** 
      * Try to convert to plaintext
      * @access protected
      * @param String $source
      * @return String $source
      */
    function decode($source) {
        // url decode
        $source = html_entity_decode($source,  ENT_QUOTES,  "ISO-8859-1");
        // convert decimal
        $source = preg_replace('/&#(\d+);/me', "chr(\\1)",  $source);                // decimal notation
        // convert hex
        $source = preg_replace('/&#x([a-f0-9]+);/mei', "chr(0x\\1)",  $source);    // hex notation
        return $source;
    }
     /** 
      * Internal method to strip a string of certain tags
      * @access protected
      * @param String $source - input string to be 'cleaned'
      * @return String $source - 'cleaned' version of input parameter
      */
    function filterTags($source) {
        // filter pass setup
        $preTag = NULL;
        $postTag = $source;
        // find initial tag's position
        $tagOpen_start = strpos($source,  '<');
        // interate through string until no tags left
        while($tagOpen_start !== FALSE) {
            // process tag interatively
            $preTag .= substr($postTag,  0,  $tagOpen_start);
            $postTag = substr($postTag,  $tagOpen_start);
            $fromTagOpen = substr($postTag,  1);
            // end of tag
            $tagOpen_end = strpos($fromTagOpen,  '>');
            if ($tagOpen_end === false) break;
            // next start of tag (for nested tag assessment)
            $tagOpen_nested = strpos($fromTagOpen,  '<');
            if (($tagOpen_nested !== false) && ($tagOpen_nested < $tagOpen_end)) {
                $preTag .= substr($postTag,  0,  ($tagOpen_nested+1));
                $postTag = substr($postTag,  ($tagOpen_nested+1));
                $tagOpen_start = strpos($postTag,  '<');
                continue;
            } 
            $tagOpen_nested = (strpos($fromTagOpen,  '<') + $tagOpen_start + 1);
            $currentTag = substr($fromTagOpen,  0,  $tagOpen_end);
            $tagLength = strlen($currentTag);
            if (!$tagOpen_end) {
                $preTag .= $postTag;
                $tagOpen_start = strpos($postTag,  '<');            
            }
            // iterate through tag finding attribute pairs - setup
            $tagLeft = $currentTag;
            $attrSet = array();
            $currentSpace = strpos($tagLeft,  ' ');
            // is end tag
            if (substr($currentTag,  0,  1) == "/") {
                $isCloseTag = TRUE;
                list($tagName) = explode(' ',  $currentTag);
                $tagName = substr($tagName,  1);
            // is start tag
            } else {
                $isCloseTag = FALSE;
                list($tagName) = explode(' ',  $currentTag);
            }        
            // excludes all "non-regular" tagnames OR no tagname OR remove if xssauto is on and tag is blacklisted
            if ((!preg_match("/^[a-z][a-z0-9]*$/i", $tagName)) || (!$tagName) || ((in_array(strtolower($tagName),  $this->tagBlacklist)) && ($this->xssAuto))) {                 
                $postTag = substr($postTag,  ($tagLength + 2));
                $tagOpen_start = strpos($postTag,  '<');
                // don't append this tag
                continue;
            }
            // this while is needed to support attribute values with spaces in!
            while ($currentSpace !== FALSE) {
                $fromSpace = substr($tagLeft,  ($currentSpace+1));
                $nextSpace = strpos($fromSpace,  ' ');
                $openQuotes = strpos($fromSpace,  '"');
                $closeQuotes = strpos(substr($fromSpace,  ($openQuotes+1)),  '"') + $openQuotes + 1;
                // another equals exists
                if (strpos($fromSpace,  '=') !== FALSE) {
                    // opening and closing quotes exists
                    if (($openQuotes !== FALSE) && (strpos(substr($fromSpace,  ($openQuotes+1)),  '"') !== FALSE))
                        $attr = substr($fromSpace,  0,  ($closeQuotes+1));
                    // one or neither exist
                    else $attr = substr($fromSpace,  0,  $nextSpace);
                // no more equals exist
                } else $attr = substr($fromSpace,  0,  $nextSpace);
                // last attr pair
                if (!$attr) $attr = $fromSpace;
                // add to attribute pairs array
                $attrSet[] = $attr;
                // next inc
                $tagLeft = substr($fromSpace,  strlen($attr));
                $currentSpace = strpos($tagLeft,  ' ');
            }
            // appears in array specified by user
            $tagFound = in_array(strtolower($tagName),  $this->tagsArray);            
            // remove this tag on condition
            if ((!$tagFound && $this->tagsMethod) || ($tagFound && !$this->tagsMethod)) {
                // reconstruct tag with allowed attributes
                if (!$isCloseTag) {
                    $attrSet = $this->filterAttr($attrSet);
                    $preTag .= '<' . $tagName;
                    for ($i = 0; $i < count($attrSet); $i++)
                        $preTag .= ' ' . $attrSet[$i];
                    // reformat single tags to XHTML
                    if (strpos($fromTagOpen,  "</" . $tagName)) $preTag .= '>';
                    else $preTag .= ' />';
                // just the tagname
                } else $preTag .= '</' . $tagName . '>';
            }
            // find next tag's start
            $postTag = substr($postTag,  ($tagLength + 2));
            $tagOpen_start = strpos($postTag,  '<');            
        }
        // append any code after end of tags
        $preTag .= $postTag;
        return $preTag;
    }
    function safeSQL($source,  &$connection) {
        // clean all elements in this array
        if (is_array($source)) {
            foreach($source as $key => $value)
                // filter element for SQL injection
                if (is_string($value)) $source[$key] = $this->quoteSmart($this->decode($value),  $connection);
            return $source;
        // clean this string
        } else if (is_string($source)) {
            // filter source for SQL injection
            if (is_string($source)) return $this->quoteSmart($this->decode($source),  $connection);
        // return parameter as given
        } else return $source;    
    }
    /** 
      * @author Chris Tobin
      * @author Daniel Morris
      * @access protected
      * @param String $source
      * @param Resource $connection - An open MySQL connection
      * @return String $source
      */
    function quoteSmart($source,  &$connection) {
        // strip slashes
        if (get_magic_quotes_gpc()) $source = stripslashes($source);
        // quote both numeric and text
        $source = $this->escapeString($source,  $connection);
        return $source;
    }
    /** 
      * @author Chris Tobin
      * @author Daniel Morris
      * @access protected
      * @param String $source
      * @param Resource $connection - An open MySQL connection
      * @return String $source
      */    
    function escapeString($string,  &$connection) {
        // depreciated function
        if (version_compare(phpversion(), "4.3.0",  "<")) mysqli_escape_string($this->DBCONN,$string);
        // current function
        else mysqli_real_escape_string($this->DBCONN,$string);
        return $string;
    } 

    #........................................................................................
    #GET Addslashes
    /**
     * Site::My_addslashes_content()
     * 
     * @return
     */
    function My_addslashes_content($string)
    {
        $string = addslashes(trim($string));
        return $string;
    }
    #........................................................................................
    #GET stripslashes
    /**
     * Site::My_stripslashes()
     * 
     * @return
     */
    function My_stripslashes($string)
    {
        $string = stripslashes($string);
        return $string;
    }
    #........................................................................................
    #GET stripslashes
    /**
     * Site::My_stripslashes_html()
     * 
     * @return
     */
    function My_stripslashes_html($string)
    {
        $string = stripslashes(htmlspecialchars_decode(utf8_decode($string)));
        return $string;
    }
    #........................................................................................
    /**
     * Return URL-Friendly string slug
     * @param string $string 
     * @return string 
     */
    /**
     * Site::seoUrl()
     * 
     * @return
     */
    function seoUrl($string)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower(trim($string));
        //Strip any unwanted characters
        $string = str_replace('/', '-', $string);
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
    #....................................................................................
    #READ FILE CONTENT
    /**
     * Site::readfilecontent()
     * 
     * @return
     */
    function readfilecontent($file)
    {
        $fp = fopen("$file", "r") or die("Could not open the file $file");
        $filesize = filesize($file);
        if ($filesize > 0)
        {
            $filecontent = fread($fp, $filesize);
        } else
        {
            echo 'File Content is empty';
        }

        fclose($fp);
        return $filecontent;
    }
    #....................................................................................
    /**
     * Site::sendMail()
     * 
     * @return
     */
    function sendMail($fromname, $fromemail, $to_email, $mail_subject, $mail_content,
        $mail_attachment_name = '', $mail_attachment_content = '')
    {
        /*if($_SERVER['HTTP_HOST'] != 'localhost'){
        $mail = new PHPMailer();
        
        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host     = "localhost"; // SMTP server
        $mail->Port     = 25; // set the SMTP port
        $mail->Username      = "test@comeneat.com"; // SMTP account username
        $mail->Password      = "6k7MqyQbs8xW";        // SMTP account password
        
        //$mail->SMTPDebug = 1;
        
        $mail->From     = $fromemail;
        $mail->FromName = $fromname;
        $mail->AddReplyTo($fromemail,$fromname);
        
        $mail->AddAddress($to_email); // Add a recipient // Name is optional
        
        $mail->Subject  = $mail_subject;
        $mail->IsHTML(true); 
        $mail->Body     = $mail_content;
        
        if( isset($mail_attachment_content) && !empty($mail_attachment_content) && isset($mail_attachment_name) && !empty($mail_attachment_name) ){
        $mail->AddAttachment($mail_attachment_content,$mail_attachment_name);
        }
        elseif( isset($mail_attachment_content) && !empty($mail_attachment_content) ){
        $mail->AddAttachment($mail_attachment_content);
        }
        
        $mailresult  = $mail->Send();
        //if(!$mailresult) {
        //$mailresult  = $mail->Send();
        $mailresult= $mail->ErrorInfo;
        //}
        
        }else{
        */
        $mailHeader = "From:" . $fromname . " <" . $fromemail . "> \n";
        $mailHeader .= "X-Sender:" . $fromemail . " \n";
        $mailHeader .= "Reply-To: " . $fromname . " <" . $fromemail . "> \n";
        $mailHeader .= "Content-Type: text/html; charset=iso-8859-1 \n";
        #$mailHeader .= "Content-Type: text/html; charset=utf-8 \n";
        $mailHeader .= "Return-Path:" . $fromemail . " \n";
        $mailHeader .= "Error-To: " . $fromemail . " \n";
        $mailHeader .= "X-Mailer: " . $_SERVER['SERVER_NAME'] . " \n";
        $mailHeader .= "MIME-Version: 1.0 \n";

        $mailresult = @mail($to_email, $mail_subject, $mail_content, $mailHeader);
        //}

        return $mailresult;
    }
    #........................................................................................
    #GET FILE NAME
    /**
     * Site::get_file_name()
     * 
     * @return
     */
    function get_file_name()
    {
        global $objSmarty, $admin_smarty;

        $php_self_arr = explode("/", $_SERVER['PHP_SELF']);
        #echo "<pre>Request";print_r($php_self_arr);echo"</pre>";
        $req_file_name = end($php_self_arr);
        /*$cnt_php_self_arr1	= count($php_self_arr1);
        $req_file_name		= $php_self_arr1[$cnt_php_self_arr1-1];*/
        //echo "<br>".$req_file_name;

        $objSmarty->assign('req_file_name', $req_file_name);
        $admin_smarty->assign('req_file_name', $req_file_name);

        return $req_file_name;
    }
    #........................................................................................
    #Redirect Url
    /**
     * Site::redirectUrl()
     * 
     * @return
     */
    function redirectUrl($filename)
    {
        global $CFG;

        header("Location:$filename");
        exit();
    }
    #........................................................................................
    #Check Email Id with Domain
    /**
     * Site::checkEmailValidDomain()
     * 
     * @return
     */
    function checkEmailValidDomain($email)
    {

        list($userName, $hostName) = explode("@", $email);

        if (function_exists('checkdnsrr'))
        {
            if (checkdnsrr($hostName, "MX"))
                return true;
        } else
        {
            if (!empty($hostName))
            {
                if ($recType == '')
                    $recType = "MX";
                exec("nslookup -type=$recType $hostName", $result);
                // check each line to find the one that starts with the host <br>
                // name. If it exists then the function succeeded. <br>
                foreach ($result as $line)
                {
                    if (eregi("^$hostName", $line))
                    {
                        return true;
                    }
                }
                // otherwise there was no mail handler for the domain <br>
                return false;
            }
            return false;
        }
    }
    #........................................................................................
    #Javascript Global Variable
    /**
     * Site::setglobalvarjavascript()
     * 
     * @return
     */
    function setglobalvarjavascript()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sitejsbaseurl = '<script type="text/javascript">' . "\n" .
            'var jssitebaseUrl = "' . $CFG['site']['base_url'] . '";' . "\n" .
            'var jssiteuserfriendly = "' . $CFG['site']['userfriendly'] . '";' . "\n" .
            'var site_fb_appsid = "' . $CFG['site']['site_fb_appsid'] . '";' . "\n" .
            'var fb_domain_name = "' . $CFG['site']['fb_domain_name'] . '";' . "\n" .
            '</script>';
        $objSmarty->assign('getglobalvarjavascript', $sitejsbaseurl);
        $admin_smarty->assign('getglobalvarjavascript', $sitejsbaseurl);
    }

    #........................................................................................
    #Javascript Global Variable for FB
    /**
     * Site::setglobalvarjavascript_fb()
     * 
     * @return
     */
    function setglobalvarjavascript_fb()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sitejsbaseurl = '<script type="text/javascript">' . "\n" .
            'var jssitebaseUrl = "' . $CFG['site']['base_url_https'] . '/fb";' . "\n" .
            'var jssiteuserfriendly = "' . $CFG['site']['userfriendly'] . '";' . "\n" .
            'var site_fb_appsid = "' . $CFG['site']['site_fb_appsid'] . '";' . "\n" .
            'var site_fb_menu_appsid = "' . $CFG['site']['site_fb_menu_appsid'] . '";' . "\n" .
            'var fb_domain_name = "' . $CFG['site']['fb_domain_name'] . '";' . "\n" .
            '</script>';
        $objSmarty->assign('getglobalvarjavascript', $sitejsbaseurl);
        $admin_smarty->assign('getglobalvarjavascript', $sitejsbaseurl);
    }
    #........................................................................................
    #GET UPLOADED EXTENSION
    /**
     * Site::getFileExtension()
     * 
     * @return
     */
    function getFileExtension($filename)
    {
        global $objSmarty, $admin_smarty;

        $vid_ext_arr = explode(".", $filename);
        $vid_ext_arr_cnt = count($vid_ext_arr);
        $vid_ext = strtolower($vid_ext_arr[$vid_ext_arr_cnt - 1]);

        return $vid_ext;
    }
    #........................................................................................
    #GET UPLOADED EXTENSION
    /**
     * Site::photoUpload()
     * 
     * @return
     */
    function photoUpload($uploadpath, $photoname, $fieldname)
    {
        global $CFG, $objSmarty, $admin_smarty;

        $logoext = $this->getFileExtension($_FILES[$fieldname]['name']);
        $dest_name = $uploadpath . $photoname;

        @move_uploaded_file($_FILES[$fieldname]['tmp_name'], $dest_name);
        @chmod($dest_name, 0777);

        return $photoname;
    }
    #........................................................................................
    #SESSION OF LANGUSGE
    /**
     * Site::languageSession()
     * 
     * @return
     */
    function languageSession()
    {
        global $CFG, $objSmarty, $_lang;

        $sesslan = $this->getValue("lang_code", $CFG['table']['language'],
            " lang_site ='Yes' LIMIT 1");
        if (isset($_GET['la']) && !empty($_GET['la']))
        {

            $reqlanname = strtoupper($_GET['la']);
            $_SESSION['lan'] = $reqlanname;

            header("Location: " . $_SERVER[HTTP_REFERER]);
            exit;
        } elseif (isset($_SESSION['lan']) && !empty($_SESSION['lan']) && ($_SESSION['lan'] ==
        $sesslan))
        {
            $reqlanname = strtoupper($_SESSION['lan']);
        } else
        {
            $_SESSION['lan'] = $sesslan;
            $reqlanname = strtoupper($_SESSION['lan']);
        }

        $this->addLangFiles($reqlanname);
        #echo "<pre>";print_r($_lang);echo "</pre>";

        if ($_SESSION['lan'] == 'CS' || $_SESSION['lan'] == 'SK' || $_SESSION['lan'] ==
            'SL' || $_SESSION['lan'] == 'AR' || $_SESSION['lan'] == 'SV' || $_SESSION['lan'] ==
            'LT' || $_SESSION['lan'] == 'TR' || $_SESSION['lan'] == 'ES')
        {
            $objSmarty->assign('LANG', $_lang);
        } else
        {
            $objSmarty->assign('LANG', $this->utf8_array_decode($_lang));
        }

        /*if(isset($_GET['la']) && !empty($_GET['la']) ){
        
        //header("Location: ".$_SERVER[HTTP_REFERER]);
        //exit;
        }*/
    }
    /**
     * Site::addLangFiles()
     * 
     * @return
     */
    function addLangFiles($reqlanname)
    {
        global $CFG, $objSmarty, $_lang;

        $req_file_name = $this->get_file_name();

        include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
            'header.php';
        if ($req_file_name == 'index.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'index.php';

        } elseif ($req_file_name == 'searchResult.php' || $req_file_name ==
        'searchResultAjax.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'searchResult.php';

        } elseif ($req_file_name == 'restaurantDetails.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantDetails.php';

        } elseif ($req_file_name == 'checkout.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'checkout.php';

        } elseif ($req_file_name == 'customerLogin.php' || $req_file_name ==
        'customerResetPassword.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'customerLogin.php';

        } elseif ($req_file_name == 'customerRegister.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'customerRegister.php';

        } elseif ($req_file_name == 'customerMyaccount.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'customerMyaccount.php';

        } elseif ($req_file_name == 'restaurantOwnerLogin.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantOwnerLogin.php';

        } elseif ($req_file_name == 'restaurantOwnerRegister.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantOwnerRegister.php';

        } elseif ($req_file_name == 'restaurantOwnerMyaccount.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantOwnerMyaccount.php';

        } elseif ($req_file_name == 'restaurantOwnerThanks.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantOwnerThanks.php';

        } elseif ($req_file_name == 'thanks.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'thanks.php';

        } elseif ($req_file_name == 'success.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'success.php';

        } elseif ($req_file_name == 'restaurant_innerpage.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurant_innerpage.php';

        } elseif ($req_file_name == 'restaurantCuisineInnerpage.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurant_innerpage.php';

        } elseif ($req_file_name == 'ajaxActionRestaurant.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantOwnerMyaccount.php';
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantOwnerRegister.php';

        } elseif ($req_file_name == 'ajaxAction.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'restaurantDetails.php';
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'customerMyaccount.php';
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'checkout.php';
            #include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'restaurantOwnerMyaccount.php';

        } elseif ($req_file_name == 'contactUs.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'contactUs.php';

        } //siteFeedback.php
        elseif ($req_file_name == 'siteFeedback.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'siteFeedback.php';

        }

        include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
            'footer.php';
    }
    /**
     * Site::utf8_array_decode()
     * 
     * @return
     */
    function utf8_array_decode($input)
    {
        $return = array();

        foreach ($input as $key => $val)
        {
            if (is_array($val))
            {
                $return[$key] = $this->utf8_array_decode($val);
            } else
            {
                $return[$key] = utf8_decode($val);
            }
        }
        return $return;
    }
    #........................................................................................
    #Javascript Global Variable
    /**
     * Site::lang_error_js_fb()
     * 
     * @return
     */
    function lang_error_js_fb()
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (isset($_SESSION['lan']) && !empty($_SESSION['lan']))
        {
            $filename_lang_err = $filename = $CFG['site']['language_path'] . '/' . $_SESSION['lan'] .
                '/error_lang.js';
            $filedata_lang_err = $this->readfilecontent($filename_lang_err);
        }
        $sitejs_lang_err = '<script type="text/javascript">' . "\n" . $filedata_lang_err .
            "\n" . '</script>';
        $objSmarty->assign('sitejs_lang_err', $sitejs_lang_err);
    }
    #....................................................................................
    #EXECUTE QUERY
    /**
     * Site::ExecuteQuery()
     * 
     * @return
     */
    function ExecuteQuery($Query, $Qrytype)
    {
        if (!empty($Query) && !empty($Qrytype))
        {
            switch (strtolower($Qrytype))
            {
                case "select":
                    $Result = mysql_query($Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" . mysql_error() . $this->anyMySqlIssue(mysql_error()));
                    if ($Result)
                    {
                        $ResultSet = array();
                        while ($ResultSet1 = mysql_fetch_assoc($Result))
                            $ResultSet[] = $ResultSet1;
                        return $ResultSet;
                    } else
                        return false;
                    break;

                case "update":
                    $Result = mysql_query($Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" . mysql_error() . $this->anyMySqlIssue(mysql_error()));
                    if ($Result)
                    {
                        $AffectedNums = mysql_affected_rows();
                        return $AffectedNums;
                    } else
                        return false;
                    break;

                case "norows":
                    $Result = mysql_query($Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" . mysql_error() . $this->anyMySqlIssue(mysql_error()));
                    if ($Result)
                    {
                        $Totalrows = mysql_num_rows($Result);
                        return $Totalrows;
                    } else
                        return false;
                    break;
                case "insert":
                    $Result = mysql_query($Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" . mysql_error() . $this->anyMySqlIssue(mysql_error()));
                    if ($Result)
                    {
                        $LastInsertedRow = mysql_insert_id();
                        return $LastInsertedRow;
                    } else
                        return false;
                    break;
                case "delete":
                    $Result = mysql_query($Query) or die("Error in Deletion Query <br> " . $Query .
                        "<br>" . mysql_error($this->anyMySqlIssue($Query)));
                    if ($Result)
                        return true;
                    else
                        return false;
            }
        }
    }

    /**
     * Site::anyMySqlIssue()
     * 
     * @return
     */
    function anyMySqlIssue($Query)
    {
        global $CFG, $objSmarty;

        #Server variables
        $alldata = '';
        foreach ($_SERVER as $key => $value)
        {
            $alldata .= "[" . $key . "]" .
                "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=> " . $value .
                "<br />";
        }

        #Ip address
        $ipaddr = '';
        $ipaddr = $_SERVER['REMOTE_ADDR'];
        if ($ipaddr == '122.164.33.162')
        {
            $ippp = 'Our IP';
        } else
        {
            $ippp = $ipaddr;
        }

        #Get Country Name
        $addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' .
            $ipaddr));
        $city = stripslashes(ucfirst($addr_details['geoplugin_city']));
        $countrycode = stripslashes(ucfirst($addr_details['geoplugin_countryCode']));
        $country = stripslashes(ucfirst($addr_details['geoplugin_countryName']));
        if (isset($countrycode) && !empty($countrycode))
        {
            $country_var = '<tr>
            							<td>Country Name :' . $country . '&nbsp;Country Code:' . $countrycode .
                '&nbsp;City:' . $city . '</td>
            						</tr>';
        }


        $mail_content = '<table>
                                 <tr>
        							<td>PLease inform to that who is working in this site.</td>
        						</tr>
                                <tr>
        							<td>Browse from IP Address :' . $ippp .
            '&nbsp;&nbsp;&nbsp;Browse Date:' . date("d m, Y h:i:s A") . '</td>
        						</tr>
                                ' . $country_var . '
                                <tr>
        							<td>ERROR IN MYSQL QUERY <br /><br />' . $Query .
            '<br /><br />SERVER VARIABLES:<br /><br />' . $alldata . '</td>
        						</tr>
                              </table>';

        $mailsubject = $CFG['site']['sitename'] . " : Urgent - Please fix Error";

        $this->sendMail($CFG['site']['sitename'], 'vinothini.k@roamsoft.in',
            'mikejohnvino@gmail.com', $mailsubject, $mail_content, $mail_attachment_name =
            '', $mail_attachment_content = '');
        /*$this->sendMail($CFG['site']['sitename'],'vinothini.k@roamsoft.in','sri.n@roamsoft.in',$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
        $this->sendMail($CFG['site']['sitename'],'vinothini.k@roamsoft.in','support@roamsoft.in',$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
        $this->sendMail($CFG['site']['sitename'],'vinothini.k@roamsoft.in','qa@roamsoft.in',$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');*/
    }
    #....................................................................................
    #PAGINATION ADMIN
    /**
     * Site::make_page()
     * 
     * @return
     */
    function make_page($targetpage, $total_pages, $limit, $page, $fields)
    {
        $adjacents = 1;
        /* Setup page vars for display. */ //if no page var is given, default to 1.
        $prev = $page - 1; //previous page is page - 1
        $next = $page + 1; //next page is page + 1
        $lastpage = ceil($total_pages / $limit); //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1; //last page minus 1

        /*
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
        */
        $pagination = "";
        if ($lastpage > 1)
        {
            $pagination .= "<div class=\"pagination\">";
            //First
            if ($page > 1)
                $pagination .= "<a href=\"$targetpage?page=1$fields\"=>&lt;&lt; First</a>";
            else
                $pagination .= "<span class=\"disabled\">&lt;&lt; First</span>";

            //previous button
            if ($page > 1)
                $pagination .= "<a href=\"$targetpage?page=$prev$fields\"=>&lt; Previous</a>";
            else
                $pagination .= "<span class=\"disabled\">&lt; Previous</span>";

            //pages
            if ($lastpage < 7 + ($adjacents * 2))
                //not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";

                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"$targetpage?page=$lpm1$fields\">$lpm1</a>";
                    $pagination .= "<a href=\"$targetpage?page=$lastpage$fields\">$lastpage</a>";

                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination .= "<a href=\"$targetpage?page=1$fields\">1</a>";
                    $pagination .= "<a href=\"$targetpage?page=2$fields\">2</a>";
                    $pagination .= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";

                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"$targetpage?page=$lpm1$fields\">$lpm1</a>";
                    $pagination .= "<a href=\"$targetpage?page=$lastpage$fields\">$lastpage</a>";
                }
                //close to end; only hide early pages
                else
                {
                    $pagination .= "<a href=\"$targetpage?page=1$fields\">1</a>";
                    $pagination .= "<a href=\"$targetpage?page=2$fields\">2</a>";
                    $pagination .= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
                $pagination .= "<a href=\"$targetpage?page=$next$fields\">Next &gt;</a>";
            else
                $pagination .= "<span class=\"disabled\">Next &gt;</span>";

            //Last button
            if ($page < $counter - 1)
                $pagination .= "<a href=\"$targetpage?page=$lastpage$fields\">Last &gt;&gt;</a>";
            else
                $pagination .= "<span class=\"disabled\">Last &gt;&gt;</span>";

            $pagination .= "</div>\n";
        }
        return $pagination;
    }
    #....................................................................................
    #PAGINATION Myaccount
    /**
     * Site::make_page_usersideAjax_myaccount()
     * 
     * @return
     */
    function make_page_usersideAjax_myaccount($targetpage, $total_pages, $limit, $page,
        $fields, $sortbystatus)
    {
        //echo $fields;
        //echo $total_pages;
        //echo $page;
        $adjacents = 1;
        /* Setup page vars for display. */ //if no page var is given, default to 1.
        $prev = $page - 1; //previous page is page - 1
        $next = $page + 1; //next page is page + 1
        $lastpage = ceil($total_pages / $limit); //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1; //last page minus 1

        /*
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
        */

        $pagination = "";
        if ($lastpage > 1)
        {
            $pagination .= "<div class=\"pagination\">";
            #$pagination .= "<div class=\"contRitePagenation\">";
            $pagination .= "<ul class=\"dashPaginationUl\">";
            //previous button
            if ($page > 1)
            {
                $pagination .= "<li><a onclick=\"ajaxPagination('1'" . $fields . $targetpage . $sortbystatus .
                    ")\" href=\"javascript:void(0);\"=>&laquo;</a></li>";
                $pagination .= "<li><a onclick=\"ajaxPagination('$prev'" . $fields . $targetpage .
                    $sortbystatus . ")\" href=\"javascript:void(0);\"=>&lt;</a></li>";
            } else
            {
                #$pagination.= "<span class=\"disabled\" title=\"First\">&laquo;</span>";
                #$pagination.= "<span class=\"disabled\" title=\"Previous\">Previous</span>";
            }

            //pages
            if ($lastpage < 7 + ($adjacents * 2))
                //not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                    else
                        $pagination .= "<li><a onclick=\"ajaxPagination('$counter'" . $fields . $targetpage .
                            $sortbystatus . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                        else
                            $pagination .= "<li><a onclick=\"ajaxPagination('$counter'" . $fields . $targetpage .
                                $sortbystatus . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
                    $pagination .= "<li><a onclick=\"ajaxPagination('$lastpage'" . $fields . $targetpage .
                        $sortbystatus . ")\" href=\"javascript:void(0);\">$lastpage</a></li>";
                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination .= "<li><a onclick=\"ajaxPagination('1'" . $fields . $targetpage . $sortbystatus .
                        ")\" href=\"javascript:void(0);\">1</a></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                        else
                        {
                            //if($counter != 2)
                            $pagination .= "<li><a onclick=\"ajaxPagination('$counter'" . $fields . $targetpage .
                                $sortbystatus . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                        }

                    }
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
                    $pagination .= "<li><a onclick=\"ajaxPagination('$lastpage'" . $fields . $targetpage .
                        $sortbystatus . ")\" href=\"javascript:void(0);\">$lastpage</a></li>";
                }
                //close to end; only hide early pages
                else
                {
                    $pagination .= "<li><a onclick=\"ajaxPagination('1'" . $fields . $targetpage . $sortbystatus .
                        ")\" href=\"javascript:void(0);\">1</a></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                        else
                            $pagination .= "<li><a onclick=\"ajaxPagination('$counter'" . $fields . $targetpage .
                                $sortbystatus . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
            {
                $pagination .= "<li><a onclick=\"ajaxPagination('$next'" . $fields . $targetpage .
                    $sortbystatus . ")\" href=\"javascript:void(0);\">&gt;</a></li>";
                $pagination .= "<li><a onclick=\"ajaxPagination('$lastpage'" . $fields . $targetpage .
                    $sortbystatus . ")\" href=\"javascript:void(0);\">&raquo;</a></li>";
            } else
            {
                #$pagination.= "<span class=\"disabled\" title=\"Next\">&gt;</span>";
                #$pagination.= "<span class=\"disabled\" title=\"Last\">&raquo;</span>";
            }
            $pagination .= "</ul>\n";
            #$pagination.= "</div>\n";
            $pagination .= "</div>\n";

        }
        return $pagination;
    }
    #....................................................................................
    #PAGINATION USER SIDE In Search Result
    /**
     * Site::make_page_usersideAjaxSearch()
     * 
     * @return
     */
    function make_page_usersideAjaxSearch($targetpage, $total_pages, $limit, $page,
        $fields, $searcharea, $searchcuisine, $searchrestaurant, $ser_delivery, $ser_pickup,
        $ser_opennow, $ser_offer, $vegmenutype, $nonvegmenutype, $cuisine, $cuisineid, $ser_area,
        $ser_areaid, $ser_pricemin, $ser_pricemax)
    {
        //echo $fields;
        //echo $total_pages;
        //echo $page;
        $adjacents = 1;
        /* Setup page vars for display. */ //if no page var is given, default to 1.
        $prev = $page - 1; //previous page is page - 1
        $next = $page + 1; //next page is page + 1
        $lastpage = ceil($total_pages / $limit); //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1; //last page minus 1

        /*
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
        */

        $pagination = "";
        if ($lastpage > 1)
        {
            $pagination .= "<div class=\"pagination\">";
            #$pagination .= "<div class=\"contRitePagenation\">";
            $pagination .= "<ul class=\"dashPaginationUl\">";
            //previous button
            if ($page > 1)
            {
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('1'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\"=>&laquo;</a></li>";
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$prev'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\"=>&lt;</a></li>";
            } else
            {
                #$pagination.= "<span class=\"disabled\" title=\"First\">&laquo;</span>";
                #$pagination.= "<span class=\"disabled\" title=\"Previous\">&lt;</span>";
            }

            //pages
            if ($lastpage < 7 + ($adjacents * 2))
                //not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                    else
                        $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                            $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                            $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                            $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                        else
                            $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                                $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                                $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                                $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$lastpage'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$lastpage</a></li>";
                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('1'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">1</a></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                        else
                        {
                            //if($counter != 2)
                            $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                                $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                                $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                                $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                        }

                    }
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$lastpage'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$lastpage</a></li>";
                }
                //close to end; only hide early pages
                else
                {
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('1'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">1</a></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
                        else
                            $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                                $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                                $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                                $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
            {
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$next'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">&gt;</a></li>";
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$lastpage'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">&raquo;</a></li>";
            } else
            {
                #$pagination.= "<span class=\"disabled\" title=\"Next\">&gt;</span>";
                #$pagination.= "<span class=\"disabled\" title=\"Last\">&raquo;</span>";
            }
            $pagination .= "</ul>\n";
            #$pagination.= "</div>\n";
            $pagination .= "</div>\n";

        }
        return $pagination;
    }
    #...................................................................................
    #Generate Id
    /**
     * Site::generateId()
     * 
     * @return
     */
    function generateId($refid)
    {

        /*if(!empty($refid) && ($refid > 0)){
        if($refid < 10 ){
        $generate = '000'.$refid;
        }elseif( ($refid > 10) && ($refid < 100) ){
        $generate = '00'.$refid;
        }elseif( ($refid > 100) && ($refid < 1000) ){
        $generate = '0'.$refid;
        }
        }
        return $generate;*/

        if (!empty($refid) && ($refid > 0))
        {
            if ($refid < 10)
            {
                $generate = '000' . $refid;
            } elseif (($refid >= 10) && ($refid < 100))
            {
                $generate = '00' . $refid;
            } elseif (($refid >= 100) && ($refid < 1000))
            {
                $generate = '0' . $refid;
            } else
            {
                $generate = $refid;
            }
        }

        return $generate;
    }
    #........................................................................................
    #ADMIN Site Setting
    /**
     * Site::getsite_setting()
     * 
     * @return
     */
    function getsite_setting()
    {
        global $CFG;
        $UpQuery = "SELECT  admin_name, admin_email, support_email, invoice_email, site_phone, userfriendly, site_fb_appsid, site_fb_appsecret, site_fb_menu_appsid, site_fb_menu_appsecret, sitename, sitelogo, site_fav_icon, offline_status, offline_notes, user_page, admin_page, currency_option , currency_image , currency_symbol, site_address, google_analytic_code, woopra_analytic_code, site_vat_no, site_vat_percentage, site_cc_percentage, admin_pending_order_alert, site_inv_setting, site_timezone, searchbyoption FROM " .
            $CFG['table']['sitesetting'] . " WHERE id  = '1'";
        $sitesetting = $this->ExecuteQuery($UpQuery, 'select');
        //echo "<pre>";print_r($sitesetting);echo "</pre>";
        #$UpResult = $this->ExecuteQuery($UpQuery,'select');
        #$objSmarty->assign('sitesetting', $UpResult);

        $CFG['site']['sitedomain'] = 'Restaurant';
        $CFG['site']['adminname'] = $this->My_stripslashes($sitesetting['0']['admin_name']);
        $CFG['site']['adminemail'] = $this->My_stripslashes($sitesetting['0']['admin_email']);
        $CFG['site']['supportemail'] = $this->My_stripslashes($sitesetting['0']['support_email']);
        $CFG['site']['invoiceemail'] = $this->My_stripslashes($sitesetting['0']['invoice_email']);
        $CFG['site']['site_phone'] = $this->My_stripslashes($sitesetting['0']['site_phone']);
        $CFG['site']['sitename'] = $this->My_stripslashes($sitesetting['0']['sitename']);
        $CFG['site']['adminperpage'] = $this->My_stripslashes($sitesetting['0']['admin_page']);
        $CFG['site']['userperpage'] = $this->My_stripslashes($sitesetting['0']['user_page']);
        $CFG['site']['logoname'] = $CFG['site']['photo_sitelogo_url'] . '/' . $sitesetting['0']['sitelogo'];
        $CFG['site']['favicon'] = $sitesetting['0']['site_fav_icon'];
        $CFG['site']['userfriendly'] = $sitesetting['0']['userfriendly'];
        $CFG['site']['offline_status'] = $sitesetting['0']['offline_status'];
        $CFG['site']['site_address'] = $this->My_stripslashes($sitesetting['0']['site_address']);
        //$CFG['site']['currency_option']	= $sitesetting['0']['currency_option'];
        //$CFG['site']['currency_image']	= $CFG['site']['photo_sitelogo_url'].'/'.$sitesetting['0']['currency_image'];
        //$CFG['site']['currency_symbol']	= $sitesetting['0']['currency_symbol'];
        $CFG['site']['header_text'] = $this->My_stripslashes($sitesetting['0']['header_text']);
        $CFG['site']['google_analytic_code'] = $this->My_stripslashes($sitesetting['0']['google_analytic_code']);
        $CFG['site']['woopra_analytic_code'] = $this->My_stripslashes($sitesetting['0']['woopra_analytic_code']);

        #search by
        $CFG['site']['searchbyoption'] = $sitesetting['0']['searchbyoption'];

        #facebook site
        $CFG['site']['site_fb_appsid'] = $this->My_stripslashes($sitesetting['0']['site_fb_appsid']);
        $CFG['site']['site_fb_appsecret'] = $this->My_stripslashes($sitesetting['0']['site_fb_appsecret']);

        #facebook menu
        $CFG['site']['site_fb_menu_appsid'] = $this->My_stripslashes($sitesetting['0']['site_fb_menu_appsid']);
        $CFG['site']['site_fb_menu_appsecret'] = $this->My_stripslashes($sitesetting['0']['site_fb_menu_appsecret']);

        $CFG['site']['admin_pending_order_alert'] = $this->My_stripslashes($sitesetting['0']['admin_pending_order_alert']);

        if ($sitesetting['0']['currency_option'] == 'img')
        {
            $CFG['site']['currency'] = '<img src="' . $CFG['site']['photo_sitelogo_url'] .
                '/' . $sitesetting['0']['currency_image'] .
                '" title="" alt="Currency" width = "30px" height="30px" />';
        } else
        {
            $CFG['site']['currency'] = $sitesetting['0']['currency_symbol'];
        }

        $Custdetail = $this->getMultiValue("customer_name, customer_lastname", $CFG['table']['customer'],
            "customer_id = '" . $_SESSION['customerid'] . "'");

        #VAT
        $CFG['site']['site_vat_no'] = $this->My_stripslashes($sitesetting['0']['site_vat_no']);
        $CFG['site']['site_vat_percentage'] = $this->My_stripslashes($sitesetting['0']['site_vat_percentage']);
        $CFG['site']['site_cc_percentage'] = $this->My_stripslashes($sitesetting['0']['site_cc_percentage']);
        $CFG['site']['site_inv_setting'] = $this->My_stripslashes($sitesetting['0']['site_inv_setting']);

        $CFG['site']['site_timezone'] = $this->My_stripslashes($sitesetting['0']['site_timezone']);

        #Image upload size
        $CFG['site']['max_img_upload_size'] = 1048576 * 2;

        #Payflow Link Paypal Credit Card Info
        /*$CFG['site']['payflow_partner'] 	= "Paypal";
        $CFG['site']['payflow_vendor'] 		= "armenianpassion";
        $CFG['site']['payflow_user'] 		= "armenianpassion";
        $CFG['site']['payflow_pwd'] 		= "brandon1";
        $CFG['site']['payflow_endpoint'] 	= "https://payflowpro.paypal.com";//https://payflowlink.paypal.com
        $CFG['site']['payflow_modetype'] 	= "live";*/

        #Test
        $CFG['site']['payflow_partner'] = "PayPal";
        $CFG['site']['payflow_vendor'] = "roamsoft";
        $CFG['site']['payflow_user'] = "roamsoft";
        $CFG['site']['payflow_pwd'] = "Mohan777roam";
        $CFG['site']['payflow_endpoint'] = "https://pilot-payflowpro.paypal.com";
        $CFG['site']['payflow_modetype'] = "test";
/*
        #Smarty Assigning
        $objSmarty->assign("SITE_DOMAIN", $CFG['site']['sitedomain']);

        $objSmarty->assign("SITE_NAME", $CFG['site']['sitename']);
        $admin_smarty->assign("SITE_NAME", $CFG['site']['sitename']);

        $objSmarty->assign("SITE_LOGO", $CFG['site']['logoname']);
        $admin_smarty->assign("SITE_LOGO", $CFG['site']['logoname']);

        $objSmarty->assign("SITE_FAVICON", $CFG['site']['favicon']);
        $admin_smarty->assign("SITE_FAVICON", $CFG['site']['favicon']);

        $objSmarty->assign("SITE_INVOICE_EMAIL", $CFG['site']['invoiceemail']);
        $admin_smarty->assign("SITE_INVOICE_EMAIL", $CFG['site']['invoiceemail']);

        $admin_smarty->assign("limit", $CFG['site']['adminperpage']);
        $objSmarty->assign("userlimit", $CFG['site']['userperpage']);

        $objSmarty->assign("USERFRIENDLY", $CFG['site']['userfriendly']);
        $objSmarty->assign("site_address", $CFG['site']['site_address']);
        $admin_smarty->assign("SITE_ADDRESS", $CFG['site']['site_address']);

        $admin_smarty->assign("SITE_PHONE", $CFG['site']['site_phone']);
        $objSmarty->assign("SITE_PHONE", $CFG['site']['site_phone']);

        $objSmarty->assign("currency", $CFG['site']['currency']);
        $admin_smarty->assign("currency", $CFG['site']['currency']);
        $admin_smarty->assign("timezone", $CFG['site']['site_timezone']);

        $objSmarty->assign("headertext", $CFG['site']['header_text']);

        $objSmarty->assign("GOOGLE_ANALYTIC_CODE", $CFG['site']['google_analytic_code']);
        $objSmarty->assign("WOOPRA_ANALYTIC_CODE", $CFG['site']['woopra_analytic_code']);
        //Customer detail
        $objSmarty->assign("customerDetails", $Custdetail);
        #VAT
        $admin_smarty->assign("SITE_VAT_NO", $CFG['site']['site_vat_no']);
        $objSmarty->assign("SITE_VAT_NO", $CFG['site']['site_vat_no']);
        $admin_smarty->assign("SITE_VAT_PERCENTAGE", $CFG['site']['site_vat_percentage']);
        $objSmarty->assign("SITE_VAT_PERCENTAGE", $CFG['site']['site_vat_percentage']);
        $admin_smarty->assign("SITE_CC_PERCENTAGE", $CFG['site']['site_cc_percentage']);
        $objSmarty->assign("SITE_CC_PERCENTAGE", $CFG['site']['site_cc_percentage']);
        $admin_smarty->assign("SITE_INV_SETTING", $CFG['site']['site_inv_setting']);
        $objSmarty->assign("SITE_INV_SETTING", $CFG['site']['site_inv_setting']);

        #FB Site
        $admin_smarty->assign("SITE_FB_APPSID", $CFG['site']['site_fb_appsid']);

        #FB Menu
        $objSmarty->assign("SITE_FB_MENU_APPSID", $CFG['site']['site_fb_menu_appsid']);
        $admin_smarty->assign("SITE_FB_MENU_APPSID", $CFG['site']['site_fb_menu_appsid']);

        #Alert Sound
        $admin_smarty->assign("Alert_Sound", $CFG['site']['admin_pending_order_alert']);
        #Search By Option
        $admin_smarty->assign("SeachByOption", $CFG['site']['searchbyoption']);
        $objSmarty->assign("SeachByOption", $CFG['site']['searchbyoption']);
*/
        define("PAGELIMIT", $CFG['site']['adminperpage']);
        define("USERPAGELIMIT", $CFG['site']['userperpage']);
        define("CURRENCY", $currency);

        return true;
    }
    #........................................................................................
    #Site Offline Status
    /**
     * Site::siteOfflineStaus()
     * 
     * @return
     */
    function siteOfflineStaus()
    {
        global $CFG, $objSmarty, $admin_smarty;

        if ($CFG['site']['offline_status'] == 'Y')
        {
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/offline.php');
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] ."/offline " );
            }
        }
    }
    #........................................................................................
    #Icon Setting
    /**
     * Site::iconSettingValues()
     * 
     * @return
     */
    function iconSettingValues()
    {
        global $CFG;

        $sel_cont = "SELECT cuisine_thumb_width, cuisine_thumb_height, cuisine_large_width, cuisine_large_height, menu_thumb_width, menu_thumb_height, restaurant_logo_thumb_width, restaurant_logo_thumb_height, restaurant_photo_thumb_width, restaurant_photo_thumb_height, follower_icon_height, follower_icon_width, marketbanner_width, marketbanner_height, paymenticon_width, paymenticon_height FROM " .
            $CFG['table']['iconsetting'] . " WHERE id ='1' LIMIT 1";
        $res_cont = $this->ExecuteQuery($sel_cont, 'select');
        //echo "<pre>";print_r();echo "</pre>";
        return $res_cont;
    }
    #........................................................................................
    #Restaurant
    #........................................................................................
    #HOURS LIST
    /**
     * Site::hourslist()
     * 
     * @return
     */
    function hourslist($ref_id)
    {
        $content = '';
        for ($i = 0; $i <= 12; $i++)
        {
            if ($ref_id != '  ')
            {
                if ($i == $ref_id)
                {
                    $sel = 'selected="selected"';
                } else
                {
                    $sel = '';
                }
            }
            if ($i < 10)
                $i = '0' . $i;

            $content .= "<option value=" . $i . " " . $sel . ">" . $i . "</option>\n";
        }
        return $content;
    }

    #HOURS LIST CLOSE
    /**
     * Site::hourslistclose()
     * 
     * @return
     */
    function hourslistclose($ref_id)
    {
        $content = '';
        for ($i = 0; $i <= 12; $i++)
        {
            if ($ref_id != '')
            {
                if ($i == $ref_id)
                {
                    $sel = 'selected="selected"';
                } else
                {
                    $sel = '';
                }
            }
            if ($i < 10)
                $i = '0' . $i;

            $content .= "<option value=" . $i . " " . $sel . ">" . $i . "</option>\n";
        }
        return $content;
    }
    #........................................................................................
    #HOURS LIST
    /**
     * Site::minuteslist()
     * 
     * @return
     */
    function minuteslist($ref_id)
    {
        $content = '';
        for ($i = 0; $i <= 59; $i++)
        {
            if ($ref_id != '')
            {
                if ($i == $ref_id)
                {
                    $sel = 'selected="selected"';
                } else
                {
                    $sel = '';
                }
            }
            if ($i < 10)
                $i = '0' . $i;

            $content .= "<option value=" . $i . " " . $sel . ">" . $i . "</option>\n";
        }

        return $content;
    }
    #........................................................................................
    #Add to Cart Quantity
    /**
     * Site::quantitylist()
     * 
     * @return
     */
    function quantitylist()
    {

        $content = '';
        for ($i = 1; $i <= 25; $i++)
        {
            if ($i == $ref_id)
            {
                $sel = 'selected="selected"';
            } else
            {
                $sel = '';
            }

            $content .= "<option value=" . $i . " " . $sel . ">" . $i . "</option>\n";
        }

        return $content;
    }
    #........................................................................................
    #Find full Address
    /**
     * Site::findFullAddress()
     * 
     * @return
     */
    function findFullAddress($address = '', $area = '', $city = '', $state = '', $country =
        '')
    {
        if (!empty($address))
        {
            $outputStr = $address;

            if (!empty($area) || !empty($city) || !empty($state) || !empty($country))
                $outputStr .= ",";
        }
        if (!empty($area))
        {
            $outputStr .= " " . $area;

            if (!empty($city) || !empty($state) || !empty($country))
                $outputStr .= ",";
        }
        if (!empty($city))
        {
            $outputStr .= " " . $city;

            if (!empty($state) || !empty($country))
                $outputStr .= ",";
        }
        if (!empty($state))
        {
            $outputStr .= " " . $state;

            if (!empty($country))
                $outputStr .= ",";
        }
        if (!empty($country))
        {
            $outputStr .= " " . $country;
        }

        return $outputStr;
    }
    #........................................................................................
    #find Lattitude & Longtitude from address
    /**
     * Site::findLatLongFromAddress()
     * 
     * @return
     */
    function findLatLongFromAddress($address = '', $area = '', $city = '', $state =
        '', $country = '')
    {
        if (!empty($address))
        {
            $outputStr = $address;
        }
        if (!empty($area))
        {
            $outputStr .= " " . $area;
        }
        if (!empty($city))
        {
            $outputStr .= " " . $city;
        }
        if (!empty($state))
        {
            $outputStr .= " " . $state;
        }
        if (!empty($country))
        {
            $outputStr .= " " . $country;
        }

        $outputaddr = str_replace(' ', '+', $outputStr);

        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' .
            $outputaddr . '&sensor=false');

        $output = json_decode($geocode);

        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;

        $lat   = '13.0826802';
        $long  = '80.2707184';

        return array($lat, $long);
    }
    /**
     * Site::restDetailGoogleMap()
     * 
     * @return
     */
    function restDetailGoogleMap()
    {
        global $CFG;

        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $resid = $_GET['resid'];
        } elseif (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
        {
            $resid = $_SESSION['restaurantownerid'];
        }

        $restaurantdetail = $this->getMultivalue("restaurant_name, restaurant_streetaddress, restaurant_zip, restaurant_city, restaurant_state	",
            $CFG['table']['restaurant'], "restaurant_id = '" . $resid . "' ");

        $rest_address = $this->My_stripslashes($restaurantdetail[0]['restaurant_streetaddress']);
        $res_area = $this->getValue("areaname", $CFG['table']['zipcode'],
            " zipcode_id='" . $restaurantdetail[0]['restaurant_zip'] . "' ");
        $rest_city = $this->getValue("cityname", $CFG['table']['city'], " city_id='" . $restaurantdetail[0]['restaurant_city'] .
            "' ");
        $rest_state = $this->getValue("statename", $CFG['table']['state'],
            " statecode='" . $restaurantdetail[0]['restaurant_state'] . "' ");
        $restaurant_name = $restaurantdetail[0]['restaurant_name'];

        return array(
            $restaurant_name,
            $rest_address,
            $res_area,
            $rest_city,
            $rest_state);
    }
    #google Map
    /**
     * Site::generateGoogleMap()
     * 
     * @return
     */
    function generateGoogleMap()
    {
        global $CFG, $objSmarty, $admin_smarty;

        list($restaurant_name, $rest_address, $res_area, $rest_city, $rest_state) = $this->
            restDetailGoogleMap();

        $rest_fullAddress = $this->findFullAddress($rest_address, $res_area, $rest_city,
            $rest_state, $rest_country);
        list($res_lat, $res_long) = $this->findLatLongFromAddress($rest_address, $res_area,
            $rest_city, $rest_state, $rest_country);

        header("Content-type: text/xml");
        echo '<markers>';
        echo '<marker ';
        echo 'restaurantname="' . htmlspecialchars($restaurant_name, ENT_QUOTES) . '" ';
        echo 'restaurantaddress="' . htmlspecialchars($rest_fullAddress, ENT_QUOTES) .
            '" ';
        echo 'lat="' . $res_lat . '" ';
        echo 'lng="' . $res_long . '" ';
        echo '/>';
        echo '</markers>';
    }
    #----------------------------------------------------------------------------------
    #Monday Open Time
    /**
     * Site::deliveryTimeHrMinSes()
     * 
     * @return
     */
    function deliveryTimeHrMinSes($opentime)
    {

        $monopentimesplit = explode(":", $opentime);
        $monopentimehr = $monopentimesplit[0];
        $monopentimemin = $monopentimesplit[1];
        $monopensecsplit = explode(" ", $monopentimemin);
        $monopentimesec = $monopensecsplit[1];

        return array(
            $monopentimehr,
            $monopentimemin,
            $monopentimesec);
    }
    #----------------------------------------------------------------------------------
    #Insert Time option in database
    /**
     * Site::insertTimeOption()
     * 
     * @return
     */
    function insertTimeOption($rest_del_mon_openhr, $rest_del_mon_openmin, $rest_del_mon_openses,
        $rest_del_mon_closehr, $rest_del_mon_closemin, $rest_del_mon_closeses)
    {
        $res_opening_time = $rest_del_mon_openhr . ':' . $rest_del_mon_openmin . ' ' . $rest_del_mon_openses;
        $res_closeing_time = $rest_del_mon_closehr . ':' . $rest_del_mon_closemin . ' ' .
            $rest_del_mon_closeses;

        return array($res_opening_time, $res_closeing_time);

    }
    #--------------------------------------------------------------------------
    #Week details
    /**
     * Site::week_from_monday()
     * 
     * @return
     */
    function week_from_monday($date)
    {
        // Assuming $date is in format DD-MM-YYYY
        list($day, $month, $year) = explode("-", $date);

        // Get the weekday of the given date
        $wkday = date('l', mktime(0, 0, 0, $month, $day, $year));

        switch ($wkday)
        {
            case 'Monday':
                $numDaysToMon = 0;
                break;
            case 'Tuesday':
                $numDaysToMon = 1;
                break;
            case 'Wednesday':
                $numDaysToMon = 2;
                break;
            case 'Thursday':
                $numDaysToMon = 3;
                break;
            case 'Friday':
                $numDaysToMon = 4;
                break;
            case 'Saturday':
                $numDaysToMon = 5;
                break;
            case 'Sunday':
                $numDaysToMon = 6;
                break;
        }

        // Timestamp of the monday for that week
        $monday = mktime('0', '0', '0', $month, $day - $numDaysToMon, $year);

        $seconds_in_a_day = 86400;

        // Get date for 7 days from Monday (inclusive)
        for ($i = 0; $i < 7; $i++)
        {
            $dates[$i] = date('Y-m-d', $monday + ($seconds_in_a_day * $i));
        }
        return $dates;
    }
    #--------------------------------------------------------------------------------
    #EXPORT & IMPORT PROCESS START
    #--------------------------------------------------------------------------------
    #Generate CSV file for Category List
    /**
     * Site::exportProcessCSVXLS()
     * 
     * @return
     */
    function exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
        $xls_heading_arr)
    {
        global $CFG, $objSmarty, $admin_smarty;

        $exportfile = strtolower($_POST['exportfile']);

        list($selectfld, $tablename, $tblcondition) = $table_arr;
        $selsql = "SELECT " . $selectfld . " FROM " . $tablename . " WHERE " . $tblcondition .
            " ";
        $result = mysql_query($selsql);
        $cnt = 1;
        //Generate CSV
        if ($exportfile == "csv")
        {
            $categorylist[] = $csv_heading_arr;
        }
        //Generate Excel File
        if ($exportfile == "excel")
        {
            $header = '';
            $tab = "\t";
            $header = $xls_heading_arr;
        }

        while ($row_list = mysql_fetch_assoc($result))
        {
            #CSV
            if ($exportfile == "csv")
            {

                for ($ii = 0; $ii < count($export_val_arr); $ii++)
                {
                    $filedvall = $export_val_arr[$ii];
                    $row[$filedvall] = $this->My_stripslashes_html($row_list[$filedvall]);
                }
                $categorylist[] = $row;
            }
            #Excel
            if ($exportfile == "excel")
            {
                $glu = '';

                for ($ii = 0; $ii < count($export_val_arr); $ii++)
                {
                    $filedvall = $export_val_arr[$ii];
                    $glu .= $this->My_stripslashes_html($row_list[$filedvall]) . $tab;
                }
                #$glu .= $this->My_stripslashes($row_list['maincateid']).$tab;
                #$glu .= $this->My_stripslashes($row_list['maincatename']).$tab;

                $data .= trim($glu) . "\n";
            } //if
            $cnt++;
        } //while

        #CSV
        if ($exportfile == "csv")
        {
            $filename = $file_name . ".csv";
            $this->saveExportCSV($filename, $categorylist);
        }
        #Excel File
        if ($exportfile == "excel")
        {
            $filename = $file_name . ".xls";
            $this->saveExportXLS($filename, $header, $data);
        }
    }

    #Import for category
    /**
     * Site::importProcessCSV()
     * 
     * @return
     */
    function importProcessCSV($tablename, $dbfields, $filename)
    {
        global $CFG, $objSmarty, $admin_smarty;

        #File Upload
        $file_name = $_FILES['importfile']['name'];

        $dest_folder = 'importfiles/' . $file_name;
        $sour_folder = $_FILES['importfile']['tmp_name'];

        move_uploaded_file($sour_folder, $dest_folder);

        $handle = @fopen($dest_folder, "r"); // Open file form read.
        $row = 0;
        $j = 0;
        if ($handle)
        {
            while (!feof($handle)) // Loop til end of file.
            {
                $buffer = fgets($handle, 4096); // Read a line.
                if ($row > 0 && !empty($buffer))
                {
                    $line[$j] = $buffer;
                    $j++;
                }
                $row++;
            }
            #echo "<pre>";print_r($line);echo "</pre>";
            fclose($handle); // Close the file.
        }

        $this->CreateImportProcess($line, $tablename, $dbfields, $filename);
        @unlink('importfiles/' . $file_name);
    }
    #--------------------------------------------------------------------------------
    #Create category
    /**
     * Site::CreateImportProcess()
     * 
     * @return
     */
    function CreateImportProcess($line, $tablename, $dbfields)
    {
        global $CFG, $objSmarty, $admin_smarty;

        /*if(isset($_POST['rd_import']) && !empty($_POST['rd_import']) && $_POST['rd_import'] == 'emptab' ){
        if(!empty($tablename))	{
        $TruncateTable = "TRUNCATE TABLE ".$tablename." ";			
        mysql_query($TruncateTable) or die(mysql_error());
        }
        }
        
        for($k=0;$k<count($line);$k++)
        {
        $allfields	   =  $line[$k];
        $fields		   =  explode(",",$allfields);
        $categorydata  =  "";
        foreach($fields as $key=>$value){ 
        if($fields[$key]!=""){
        $categorydata.=$dbfields[$key]."='".$this->My_addslashes($fields[$key])."',";
        }
        }						
        if(!empty($tablename))	{
        echo $ins_cat = "INSERT INTO ".$tablename." SET ".$categorydata."addeddate = now() ";
        $res_cat = $this->ExecuteQuery($ins_cat,'insert');
        }
        $categorydata = "";
        }
        $this->redirectUrl($filename);*/

        $restaurant_cond = '';
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurant_cond = " restaurant_id = '" . $_GET['resid'] . "',  ";
        }
        if (isset($_GET['catid']) && !empty($_GET['catid']))
        {
            $restaurant_cond .= " menu_category = '" . $_GET['catid'] . "',  ";
        }

        if (isset($_POST['rd_import']) && !empty($_POST['rd_import']) && $_POST['rd_import'] ==
            'emptab')
        {
            if (!empty($tablename))
            {
                $TruncateTable = "TRUNCATE TABLE " . $tablename . " ";
                mysql_query($TruncateTable) or die(mysql_error());
            }
        }

        //echo "<pre>";print_r($line);echo "</pre>";
        for ($k = 0; $k < count($line); $k++)
        {
            $allfields = $line[$k];
            $fields = explode(",", $allfields);
            $categorydata = "";
            foreach ($fields as $key => $value)
            {
                if ($value != "")
                {

                    $value1 = trim($value);
                    if ($value1[0] == '"' && substr($value1, -1) == '"')
                    {
                        $cdata1 = substr($value1, 1, -1);
                    } else
                    {
                        $cdata1 = $value1;
                    }
                    //echo "<br />after=>".$cdata1;
                    $categorydata .= $dbfields[$key] . "='" . $this->My_addslashes($cdata1) . "',";
                    //$categorydata.=$dbfields[$key]."='".$value1."',";

                    //echo "<br />categorydata=>".$categorydata;
                }
            }
            if (!empty($tablename))
            {
                $ins_cat = "INSERT INTO " . $tablename . " SET " . $categorydata . "" . $restaurant_cond .
                    "addeddate = '" . CURRENTTIME . "' ";
                #echo "<br />".$ins_cat;
                //$ins_cat = "INSERT INTO ".$tablename." SET ".$categorydata."addeddate = '".CURRENTTIME."' ";
                $res_cat = $this->ExecuteQuery($ins_cat, 'insert');
            }
            $categorydata = "";
        }
        //exit;
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl("categoryManage.php?resid='".$_GET['resid']."'");
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] . "/category/" . $_GET['resid'] );
            }
        }
    }
    #----------------------------------------------------------------------------------
    #EXPORT TO CSV
    /**
     * Site::saveExportCSV()
     * 
     * @return
     */
    function saveExportCSV($filename, $recordlist)
    {
        $fp = fopen($filename, 'w+');
        foreach ($recordlist as $fields)
        {
            fputcsv($fp, $fields);
        }
        fclose($fp);

        // required for IE, otherwise Content-disposition is ignored
        if (ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');

        // addition by Jorg Weske
        $file_extension = strtolower(substr(strrchr($filename, "."), 1));

        if ($filename == "")
        {
            echo "<html><title>eLouai's Download Script</title><body>ERROR: download file NOT SPECIFIED. USE force-download.php?file=filepath</body></html>";
            exit;
        } elseif (!file_exists($filename))
        {
            echo "<html><title>eLouai's Download Script</title><body>ERROR: File not found. USE force-download.php?file=filepath</body></html>";
            exit;
        }
        ;
        switch ($file_extension)
        {
            case "pdf":
                $ctype = "application/pdf";
                break;
            case "exe":
                $ctype = "application/octet-stream";
                break;
            case "zip":
                $ctype = "application/zip";
                break;
            case "doc":
                $ctype = "application/msword";
                break;
            case "txt":
                $ctype = "application/txt";
                break;
            case "xls":
                $ctype = "application/vnd.ms-excel";
                break;
            case "ppt":
                $ctype = "application/vnd.ms-powerpoint";
                break;
            case "gif":
                $ctype = "image/gif";
                break;
            case "png":
                $ctype = "image/png";
                break;
            case "jpeg":
            case "jpg":
                $ctype = "image/jpg";
                break;
            default:
                $ctype = "application/force-download";
        }
        header("Pragma: public"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-Type: $ctype");
        // change, added quotes to allow spaces in filenames, by Rajkumar Singh
        header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . filesize($filename));
        readfile("$filename");

        unlink($filename);
        exit();
    }
    #........................................................................................................
    #EXPORT TO CSV
    /**
     * Site::saveExportXLS()
     * 
     * @return
     */
    function saveExportXLS($filename, $header, $data)
    {
        # this line is needed because returns embedded in the data have "\r"
        # and this looks like a "box character" in Excel
        $data = str_replace("\r", "", $data);

        # Nice to let someone know that the search came up empty.
        # Otherwise only the column name headers will be output to Excel.
        if ($data == "")
        {
            $data = "\nNo matching records found\n";
        }

        // create table header showing to download a xls (excel) file
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$filename");
        header("Cache-Control: public");
        header("Content-length: " . strlen($data)); // tells file size
        header("Pragma: no-cache");
        header("Expires: 0");

        // output data
        echo $header . "\n" . $data;
        exit;
    }
    #--------------------------------------------------------------------------------
    #EXPORT & IMPORT PROCESS END
    #--------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Cuisine START
    #--------------------------------------------------------------------------------
    #Get Array Cuisine
    /**
     * Site::getArrayCuisines()
     * 
     * @return
     */
    function getArrayCuisines($id)
    {
        global $CFG;

        if (!empty($id))
            $cuisineid = explode(",", $id);
        $cnt = count($cuisineid);
        for ($i = 0; $i < $cnt; $i++)
        {
            $servingcuisine[] = $this->getValue("cuisine_name", $CFG['table']['cuisine'],
                "cuisine_id = '" . $cuisineid[$i] . "'");
        }
        if (isset($servingcuisine) && !empty($servingcuisine))
            $serving = implode(", ", $servingcuisine);

        return $serving;
    }
    #--------------------------------------------------------------------------------
    #Get Array Cuisine
    /**
     * Site::getArrayCuisinesInfo()
     * 
     * @return
     */
    function getArrayCuisinesInfo($id)
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (!empty($id))
            $cuisineid = explode(",", $id);
        $cnt = count($cuisineid);
        for ($i = 0; $i < $cnt; $i++)
        {
            $servingcuisine[] = $this->getValue("cuisine_name", $CFG['table']['cuisine'],
                "cuisine_id = '" . $cuisineid[$i] . "'");
        }
        if (isset($servingcuisine) && !empty($servingcuisine))
            //$serving = implode("<br/> ",$servingcuisine);

            $serving = implode(" , ", $servingcuisine);

        return $serving;
    }
    #--------------------------------------------------------------------------------
    #Get Array Areas
    /**
     * Site::getArrayAreas()
     * 
     * @return
     */
    function getArrayAreas($id)
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (!empty($id))
            $areaid = explode(",", $id);
        $cnt = count($areaid);
        for ($i = 0; $i < $cnt; $i++)
        {
            //$servingarea[] = $this->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id = '".$areaid[$i]."'");
            $servingarea[] = $this->getValue("cityname", $CFG['table']['city'],
                "city_id = '" . $areaid[$i] . "'");
        }
        if (isset($servingarea) && !empty($servingarea))
            $servearea = implode(", ", $servingarea);

        return $servearea;
    }
    #--------------------------------------------------------------------------------

    #--------------------------------------------------------------------------------
    #State & City & Zipcode PROCESS START
    #--------------------------------------------------------------------------------
    #Show State List
    /**
     * Site::showStateList()
     * 
     * @return
     */
    function showStateList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel = "SELECT state_id,statecode,statename FROM " . $CFG['table']['state'] .
            " WHERE state_status = '1' ORDER BY statename ASC ";
        $res = $this->ExecuteQuery($sel, 'select');

        $objSmarty->assign("showStatelist", $res);
        $admin_smarty->assign("showStatelist", $res);
    }
    #Get city List
    /**
     * Site::showcityList()
     * 
     * @return
     */
    function showcityList($statecode)
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (!empty($statecode))
            $selcond = " AND statecode = '" . $statecode . "' ";

        $sel = "SELECT city_id,statecode,cityname FROM " . $CFG['table']['city'] .
            " WHERE city_status = '1' " . $selcond . "  ORDER BY cityname ASC";
        $res = $this->ExecuteQuery($sel, 'select');

        $objSmarty->assign("selectCityList", $res);
        $admin_smarty->assign("selectCityList", $res);
    }
    #Show Zipcode List
    /**
     * Site::showzipList()
     * 
     * @return
     */
    function showzipList($cityid)
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (!empty($cityid))
            $selcond = " AND cityid = '" . $cityid . "' ";

        $sel = "SELECT zipcode_id, zipcode, areaname FROM " . $CFG['table']['zipcode'] .
            " WHERE  zipcode_status = '1' " . $selcond . " ORDER BY zipcode ASC ";
        $res = $this->ExecuteQuery($sel, 'select');

        $objSmarty->assign("showZiplist", $res);
        $objSmarty->assign("showZipcodelistCount", count($res));

        $admin_smarty->assign("showZiplist", $res);
        $admin_smarty->assign("showZipcodelistCount", count($res));
    }
    #Show Zipcode List
    /**
     * Site::showAllzipList()
     * 
     * @return
     */
    function showAllzipList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel = "SELECT zipcode_id, zipcode, areaname FROM " . $CFG['table']['zipcode'] .
            " WHERE  zipcode_status = '1' ORDER BY zipcode ASC ";
        $res = $this->ExecuteQuery($sel, 'select');

        $objSmarty->assign("showZiplist", $res);
        $admin_smarty->assign("showZiplist", $res);
    }
    #-----------------------------------------------------------------
    #commmon
    #-----------------------------------------------------------------
    #Show Cuisine List
    /**
     * Site::getShowCuisineList()
     * 
     * @return
     */
    function getShowCuisineList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel_cui = "SELECT cuisine_id,cuisine_name FROM " . $CFG['table']['cuisine'] .
            " WHERE cuisine_status = '1' ORDER BY cuisine_name ASC";
        $res_cui = $this->ExecuteQuery($sel_cui, "select");

        $objSmarty->assign("showcuisinelist", $res_cui);
        $admin_smarty->assign("showcuisinelist", $res_cui);
    }
    #--------------------------------------------
    #Delivery Areas List
    /**
     * Site::showDeliveryAresList()
     * 
     * @return
     */
    function showDeliveryAresList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        //$sel = "SELECT zipcode_id, areaname FROM ".$CFG['table']['zipcode']." WHERE zipcode_status = '1' ORDER BY areaname ASC ";
        $sel = "SELECT city_id, cityname FROM " . $CFG['table']['city'] .
            " WHERE city_status = '1' AND cityname != '' ORDER BY cityname ASC ";
        $res = $this->ExecuteQuery($sel, 'select');

        $objSmarty->assign("showDeliveryAreasList", $res);
        $objSmarty->assign("showDeliveryAreasListCount", count($res));

        $admin_smarty->assign("showDeliveryAreasList", $res);
        $admin_smarty->assign("showDeliveryAreasListCount", count($res));
    }
    #--------------------------------------------
    #Show Category List
    /**
     * Site::getShowCategoryList()
     * 
     * @return
     */
    function getShowCategoryList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel_cat = "SELECT maincateid,maincatename FROM " . $CFG['table']['category_main'] .
            " WHERE status = '1'  GROUP BY maincatename ORDER BY maincatename ASC";
        #echo "<br>".$sel_cat;
        $res_cat = $this->ExecuteQuery($sel_cat, "select");

        $objSmarty->assign("showcategorylist", $res_cat);
        $admin_smarty->assign("showcategorylist", $res_cat);
    }
    #--------------------------------------------
    #Show Addons List
    /**
     * Site::getShowPizzaAddonsList()
     * 
     * @return
     */
    function getShowPizzaAddonsList($catid)
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel_addon = "SELECT id,category_id,addonsname,restaurant_id FROM " . $CFG['table']['restaurant_addons'] .
            " WHERE category_id = '" . $catid . "' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "<pre>";print_r($res_addon);echo "</pre>";
        $restid = $_SESSION['restaurantownerid'];

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("pizza_addons_addonsname", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid . "' ");

            $res_addon[$key]['menupriceoption'] = $this->GetValue("pizza_addons_priceoption",
                $CFG['table']['restaurant_pizza_addons'], "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid . "'");
            $res_addon[$key]['menuprice'] = $this->GetValue("pizza_addons_price", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid . "'");

            $res_addon[$key]['menu_addonid'] = $this->GetValue("pizza_addonsid", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid . "'");
        }
        #echo "<pre>";print_r($res_addon);echo "</pre>";

        $objSmarty->assign("showPizzaAddonslist", $res_addon);
        $objSmarty->assign("cntpizzaAddons", count($res_addon));

        $admin_smarty->assign("showPizzaAddonslist", $res_addon);
        $admin_smarty->assign("cntpizzaAddons", count($res_addon));
    }
    #--------------------------------------------
    #Show Addons List
    /**
     * Site::getShowPizzaAddonsListEdit()
     * 
     * @return
     */
    function getShowPizzaAddonsListEdit($catid, $menuid)
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel_addon = "SELECT id,category_id,addonsname,restaurant_id FROM " . $CFG['table']['restaurant_addons'] .
            " WHERE category_id = '" . $catid . "' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "<pre>";print_r($res_addon);echo "</pre>";
        $restid = $_SESSION['restaurantownerid'];

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("pizza_addons_addonsname", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $catid .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");

            $res_addon[$key]['menupriceoption'] = $this->GetValue("pizza_addons_priceoption",
                $CFG['table']['restaurant_pizza_addons'], "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");
            $res_addon[$key]['menuprice'] = $this->GetValue("pizza_addons_price", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");

            $res_addon[$key]['menu_addonid'] = $this->GetValue("pizza_addonsid", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND pizza_addons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");
        }
        #echo "<pre>";print_r($res_addon);echo "</pre>";
        $objSmarty->assign("showPizzaAddonslist", $res_addon);
        $objSmarty->assign("cntpizzaAddons", count($res_addon));

        $admin_smarty->assign("showPizzaAddonslist", $res_addon);
        $admin_smarty->assign("cntpizzaAddons", count($res_addon));
    }
    #---------------------------------------------------------------------------------------
    #Select All Open Time
    /**
     * Site::selectAllOpenTime()
     * 
     * @return
     */
    function selectAllOpenTime()
    {

        global $CFG, $objSmarty, $admin_smarty;

        $opentimehrs = $_GET['opentimehrs'];
        $opentimemins = $_GET['opentimemins'];
        $opentimesess = $_GET['opentimesess'];

        #Tuesday
        #Hours List
        $hours_list_tue = $this->hourslist($opentimehrs);
        $objSmarty->assign('HOURS_LIST_TUE', $hours_list_tue);
        $admin_smarty->assign('HOURS_LIST_TUE', $hours_list_tue);
        #Mins List
        $minutes_list_tue = $this->minuteslist($opentimemins);
        $objSmarty->assign('MINUTES_LIST_TUE', $minutes_list_tue);
        $admin_smarty->assign('MINUTES_LIST_TUE', $minutes_list_tue);

        $objSmarty->assign('tueopentimesess', $opentimesess);
        $admin_smarty->assign('tueopentimesess', $opentimesess);

        #Wednesday
        #Hours List
        $hours_list_wed = $this->hourslist($opentimehrs);
        $objSmarty->assign('HOURS_LIST_WED', $hours_list_wed);
        $admin_smarty->assign('HOURS_LIST_WED', $hours_list_wed);
        #Mins List
        $minutes_list_wed = $this->minuteslist($opentimemins);
        $objSmarty->assign('MINUTES_LIST_WED', $minutes_list_wed);
        $admin_smarty->assign('MINUTES_LIST_WED', $minutes_list_wed);

        $objSmarty->assign('wedopentimesess', $opentimesess);
        $admin_smarty->assign('wedopentimesess', $opentimesess);

        #Thursday
        #Hours List
        $hours_list_thu = $this->hourslist($opentimehrs);
        $objSmarty->assign('HOURS_LIST_THU', $hours_list_thu);
        $admin_smarty->assign('HOURS_LIST_THU', $hours_list_thu);
        #Mins List
        $minutes_list_thu = $this->minuteslist($opentimemins);
        $objSmarty->assign('MINUTES_LIST_THU', $minutes_list_thu);
        $admin_smarty->assign('MINUTES_LIST_THU', $minutes_list_thu);

        $objSmarty->assign('thuopentimesess', $opentimesess);
        $admin_smarty->assign('thuopentimesess', $opentimesess);

        #Friday
        #Hours List
        $hours_list_fri = $this->hourslist($opentimehrs);
        $objSmarty->assign('HOURS_LIST_FRI', $hours_list_fri);
        $admin_smarty->assign('HOURS_LIST_FRI', $hours_list_fri);
        #Mins List
        $minutes_list_fri = $this->minuteslist($opentimemins);
        $objSmarty->assign('MINUTES_LIST_FRI', $minutes_list_fri);
        $admin_smarty->assign('MINUTES_LIST_FRI', $minutes_list_fri);

        $objSmarty->assign('friopentimesess', $opentimesess);
        $admin_smarty->assign('friopentimesess', $opentimesess);

        #Saturday
        #Hours List
        $hours_list_sat = $this->hourslist($opentimehrs);
        $objSmarty->assign('HOURS_LIST_SAT', $hours_list_sat);
        $admin_smarty->assign('HOURS_LIST_SAT', $hours_list_sat);
        #Mins List
        $minutes_list_sat = $this->minuteslist($opentimemins);
        $objSmarty->assign('MINUTES_LIST_SAT', $minutes_list_sat);
        $admin_smarty->assign('MINUTES_LIST_SAT', $minutes_list_sat);

        $objSmarty->assign('satopentimesess', $opentimesess);
        $admin_smarty->assign('satopentimesess', $opentimesess);

        #Sunday
        #Hours List
        $hours_list_sun = $this->hourslist($opentimehrs);
        $objSmarty->assign('HOURS_LIST_SUN', $hours_list_sun);
        $admin_smarty->assign('HOURS_LIST_SUN', $hours_list_sun);
        #Mins List
        $minutes_list_sun = $this->minuteslist($opentimemins);
        $objSmarty->assign('MINUTES_LIST_SUN', $minutes_list_sun);
        $admin_smarty->assign('MINUTES_LIST_SUN', $minutes_list_sun);

        $objSmarty->assign('sunopentimesess', $opentimesess);
        $admin_smarty->assign('sunopentimesess', $opentimesess);

    }
    #---------------------------------------------------------------------------------------
    #Select All Close Time
    /**
     * Site::selectAllCloseTime()
     * 
     * @return
     */
    function selectAllCloseTime()
    {

        global $CFG, $objSmarty, $admin_smarty;

        $closetimehrs = $_GET['closetimehrs'];
        $closetimemins = $_GET['closetimemins'];
        $closetimesess = $_GET['closetimesess'];

        #Tuesday
        #Hours List
        $hours_list_tue = $this->hourslist($closetimehrs);
        $objSmarty->assign('HOURS_LIST_CLOSE_TUE', $hours_list_tue);
        $admin_smarty->assign('HOURS_LIST_CLOSE_TUE', $hours_list_tue);
        #Mins List
        $minutes_list_tue = $this->minuteslist($closetimemins);
        $objSmarty->assign('MINUTES_LIST_CLOSE_TUE', $minutes_list_tue);
        $admin_smarty->assign('MINUTES_LIST_CLOSE_TUE', $minutes_list_tue);

        $objSmarty->assign('tueclosetimesess', $closetimesess);
        $admin_smarty->assign('tueclosetimesess', $closetimesess);

        #Wednesday
        #Hours List
        $hours_list_wed = $this->hourslist($closetimehrs);
        $objSmarty->assign('HOURS_LIST_CLOSE_WED', $hours_list_wed);
        $admin_smarty->assign('HOURS_LIST_CLOSE_WED', $hours_list_wed);

        #Mins List
        $minutes_list_wed = $this->minuteslist($closetimemins);
        $objSmarty->assign('MINUTES_LIST_CLOSE_WED', $minutes_list_wed);
        $admin_smarty->assign('MINUTES_LIST_CLOSE_WED', $minutes_list_wed);

        $objSmarty->assign('wedclosetimesess', $closetimesess);
        $admin_smarty->assign('wedclosetimesess', $closetimesess);

        #Thursday
        #Hours List
        $hours_list_thu = $this->hourslist($closetimehrs);
        $objSmarty->assign('HOURS_LIST_CLOSE_THU', $hours_list_thu);
        $admin_smarty->assign('HOURS_LIST_CLOSE_THU', $hours_list_thu);
        #Mins List
        $minutes_list_thu = $this->minuteslist($closetimemins);
        $objSmarty->assign('MINUTES_LIST_CLOSE_THU', $minutes_list_thu);
        $admin_smarty->assign('MINUTES_LIST_CLOSE_THU', $minutes_list_thu);

        $objSmarty->assign('thuclosetimesess', $closetimesess);
        $admin_smarty->assign('thuclosetimesess', $closetimesess);

        #Friday
        #Hours List
        $hours_list_fri = $this->hourslist($closetimehrs);
        $objSmarty->assign('HOURS_LIST_CLOSE_FRI', $hours_list_fri);
        $admin_smarty->assign('HOURS_LIST_CLOSE_FRI', $hours_list_fri);
        #Mins List
        $minutes_list_fri = $this->minuteslist($closetimemins);
        $objSmarty->assign('MINUTES_LIST_CLOSE_FRI', $minutes_list_fri);
        $admin_smarty->assign('MINUTES_LIST_CLOSE_FRI', $minutes_list_fri);

        $objSmarty->assign('friclosetimesess', $closetimesess);
        $admin_smarty->assign('friclosetimesess', $closetimesess);

        #Saturday
        #Hours List
        $hours_list_sat = $this->hourslist($closetimehrs);
        $objSmarty->assign('HOURS_LIST_CLOSE_SAT', $hours_list_sat);
        $admin_smarty->assign('HOURS_LIST_CLOSE_SAT', $hours_list_sat);
        #Mins List
        $minutes_list_sat = $this->minuteslist($closetimemins);
        $objSmarty->assign('MINUTES_LIST_CLOSE_SAT', $minutes_list_sat);
        $admin_smarty->assign('MINUTES_LIST_CLOSE_SAT', $minutes_list_sat);

        $objSmarty->assign('satclosetimesess', $closetimesess);
        $admin_smarty->assign('satclosetimesess', $closetimesess);

        #Sunday
        #Hours List
        $hours_list_sun = $this->hourslist($closetimehrs);
        $objSmarty->assign('HOURS_LIST_CLOSE_SUN', $hours_list_sun);
        $admin_smarty->assign('HOURS_LIST_CLOSE_SUN', $hours_list_sun);
        #Mins List
        $minutes_list_sun = $this->minuteslist($closetimemins);
        $objSmarty->assign('MINUTES_LIST_CLOSE_SUN', $minutes_list_sun);
        $admin_smarty->assign('MINUTES_LIST_CLOSE_SUN', $minutes_list_sun);

        $objSmarty->assign('sunclosetimesess', $closetimesess);
        $admin_smarty->assign('sunclosetimesess', $closetimesess);

    }
    //----------------------------------------------------------------------
    #Check Categoty Others List
    /**
     * Site::checkMenuName()
     * 
     * @return
     */
    function checkMenuName()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $menu_name = $this->My_addslashes($_POST['menu_name']);
        //$restaurant_name  = $this->My_addslashes($_POST['restid']);
        $restaurant_name = $this->My_addslashes($_POST['restaurant_name']);
        $menu_category = $this->My_addslashes($_POST['menu_category']);
        $menu_type = $this->My_addslashes($_POST['menu_type']);

        #echo "<pre>";print_r($_POST);echo "</pre>";

        /*if( isset($restaurant_name) && !empty($restaurant_name) ){
        $cond = " AND restaurant_id != '".$restaurant_name."' ";
        }else{
        $cond = " AND restaurant_id='".$restaurant_name."' ";
        }*/

        #$noofrows 	= $this->getNumvalues($CFG['table']['restaurant_menu'],"menu_name='".$menu_name."' AND menu_category='".$menu_category."' AND menu_type='".$menu_type."' ".$cond." " );

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'], "menu_name='" .
            $menu_name . "' AND menu_category='" . $menu_category . "' AND menu_type='" . $menu_type .
            "' AND restaurant_id='" . $restaurant_name . "' ");

        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    //--------------------------------------------------------------------------
    #Check Categoty Others List
    /**
     * Site::checkEditMenuName()
     * 
     * @return
     */
    function checkEditMenuName()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $menu_name = $this->My_addslashes($_POST['menu_name']);
        $menu_category = $this->My_addslashes($_POST['menu_category']);
        $menu_type = $this->My_addslashes($_POST['menu_type']);
        $restaurant_id = $this->My_addslashes($_POST['restaurant_name']);

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "menu_name = '" . $menu_name . "' AND menu_category = '" . $menu_category .
            "' AND menu_type='" . $menu_type . "' AND restaurant_id = '" . $restaurant_id .
            "' AND id != '" . $_POST['eid'] . "'");
        #echo $noofrows;
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    //---------------------------------------------------------------------------
    #Check Categoty Others List
    /**
     * Site::checkMenuCategoryOthers()
     * 
     * @return
     */
    function checkMenuCategoryOthers()
    {
        global $CFG, $objSmarty, $admin_smarty;
        $subquery = '';
        if (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
        {
            $subquery = " AND restaurant_id = '" . $_SESSION['restaurantownerid'] . "'";
        }
        $menu_catothers = $this->My_addslashes($_POST['menu_catothers']);
        $noofrows = $this->getNumvalues($CFG['table']['category_main'], "maincatename='" .
            $menu_catothers . "'");
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    //----------------------------------------------------------------------------
    #........................................................................................
    #Rest Details Guest List
    /**
     * Site::guestsList()
     * 
     * @return
     */
    function guestsList()
    {

        $content = '';
        for ($i = 1; $i <= 25; $i++)
        {
            if ($i == $ref_id)
            {
                $sel = 'selected="selected"';
            } else
            {
                $sel = '';
            }

            $content .= "<option value=" . $i . " " . $sel . ">" . $i . "</option>\n";
        }
        return $content;
    }

    //-----------------------------------------------------------------------
    #Open and Close Time
    //-----------------------------------------------------------------------
    /**
     * Site::HourMinuteToDecimal()
     * 
     * @return
     */
    function HourMinuteToDecimal($hour_minute)
    {
        $t = explode(':', $hour_minute);
        return $t[0] * 60 + $t[1];
    }
    
    /**
     * Site::HourMinuteToDecimal()
     * 
     * @return
     */
     function HourMinuteToDecimalBook($hour_minute)
    {
        $t = explode(':', $hour_minute);
        #echo "<pre>--->"; print_r($t); echo "</pre>";
        $sess = explode(" ", $t[1]);

        if ($sess[1] == 'PM')
        {
            if ($t[0] != 12)
            {
                $hour = $t[0] + 12;
            } else
            {
                $hour = $t[0];
            }
        } else
        {
            if ($t[0] == 12)
            {
                $hour = 0;
            } else
            {
                $hour = $t[0];
            }
        }
        #echo "<pre>";print_r($sess);echo "</pre>";
        #return $t[0]*60+$t[1];
        return $hour * 60 + $t[1];
    }
    //-----------------------------------------------------------------------

    //open & close time recursion
    /**
     * Site::openandcloseRecursion()
     * 
     * @return
     */
    function openandcloseRecursion($rrr_opentime, $rrr_closetime, $rrr_opentime_pre =
        '', $rrr_closetime_pre = '')
    {
        /*$rrr_nowtime = date("h:i A");
        $dec_rrr_nowtime = strtotime($rrr_nowtime);

        if (isset($rrr_opentime) && !empty($rrr_opentime))
            $dec_rrr_opentime = strtotime($rrr_opentime);
        if (isset($rrr_closetime) && !empty($rrr_closetime))
            $dec_rrr_closetime = strtotime($rrr_closetime);
        if (isset($rrr_opentime_pre) && !empty($rrr_opentime_pre))
            $dec_rrr_opentime_pre = strtotime($rrr_opentime_pre);
        if (isset($rrr_closetime_pre) && !empty($rrr_closetime_pre))
            $dec_rrr_closetime_pre = strtotime($rrr_closetime_pre);


        #echo "<br />Previous day start---------------------------------------------------------------";
        //Previous Day
        if (!empty($dec_rrr_opentime_pre) && !empty($dec_rrr_closetime_pre))
        {
            //2day
            if ($dec_rrr_opentime_pre > $dec_rrr_closetime_pre)
            {
                #echo "<br />99999999999999999";
                //For Delivery Hours
                $first_open_time = strtotime("12:00 AM");
                $first_close_time = $dec_rrr_closetime_pre;

                #Time status
                if (($dec_rrr_nowtime > $first_open_time) && ($first_close_time > $dec_rrr_nowtime))
                {
                    $first_openclosetype = "Open";
                } else
                {
                    $first_openclosetype = "Closed";
                }
            }
        }
        #echo "<br />Previous day end---------------------------------------------------------------";
        #echo "<br />Current day start---------------------------------------------------------------";
        //Current Day
        if (!empty($dec_rrr_opentime) && !empty($dec_rrr_closetime))
        {

            if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
            {
                #echo "<br />11111111111111111";
                $sec_openclosetype = "Open";

                //For Delivery Hours
                $sec_open_time = $dec_rrr_opentime;
                $sec_close_time = $dec_rrr_closetime;

            } //2day
            elseif ($dec_rrr_opentime > $dec_rrr_closetime)
            {
                #echo "<br />333333333333333";
                //For Delivery Hours
                $sec_open_time = $dec_rrr_opentime;
                $sec_close_time = strtotime("11:59 PM");

                #Time status
                if (($dec_rrr_nowtime > $sec_open_time) && ($sec_close_time > $dec_rrr_nowtime))
                {
                    $sec_openclosetype = "Open";
                } else
                {
                    $sec_openclosetype = "Closed";
                }
            } else
            {
                #echo "<br />4444444444444444";
                #echo "<br>Come here - current day????????????????????????????????";
                $sec_open_time = $dec_rrr_opentime;
                $sec_close_time = $dec_rrr_closetime;
                $sec_openclosetype = "Closed";
            }

        }
        #echo "<br />Current day end---------------------------------------------------------------";

        #echo "<br />first_openclosetype=>".$first_openclosetype;
        #echo "<br />sec_openclosetype=>".$sec_openclosetype;
        #open closetype
        if ($first_openclosetype == 'Open' || $sec_openclosetype == 'Open')
        {
            $openclosetype = 'Open';
        } else
        {
            $openclosetype = 'Closed';
        }
        return $openclosetype;*/
        $rrr_nowtime = date("h:i A");
        $dec_rrr_nowtime = $rrr_nowtime;
        
        if (isset($rrr_opentime) && !empty($rrr_opentime))
            $dec_rrr_opentime = $rrr_opentime;
            
        if (isset($rrr_closetime) && !empty($rrr_closetime))
            $dec_rrr_closetime = $rrr_closetime;
        if (isset($rrr_opentime_pre) && !empty($rrr_opentime_pre))
            $dec_rrr_opentime_pre = $rrr_opentime_pre;
        if (isset($rrr_closetime_pre) && !empty($rrr_closetime_pre))
            $dec_rrr_closetime_pre = $rrr_closetime_pre;
            
        $opentime = strtotime($rrr_opentime);
        $closetime = strtotime($rrr_opentime);    
        
        if (!empty($opentime) && !empty($closetime)){
              
            //Previous Day
            if (!empty($dec_rrr_opentime_pre) && !empty($dec_rrr_closetime_pre))
            {
                if ($dec_rrr_opentime_pre > $dec_rrr_closetime_pre)
                {
                    //For Delivery Hours
                    $first_open_time = strtotime("12:00 AM");
                    $first_close_time = $dec_rrr_closetime_pre;
    
                    #Time status
                    if (($dec_rrr_nowtime > $first_open_time) && ($first_close_time > $dec_rrr_nowtime))
                    {
                        $first_openclosetype = "Open";
                    } 
                    elseif (($dec_rrr_nowtime < $first_open_time) && ($first_close_time > $dec_rrr_nowtime)) {
                        
                        $sec_openclosetype = "Preorder";
                    }
                    else
                    {
                        $first_openclosetype = "Closed";
                    }
                }
            }
           
            //Current Day
            if (!empty($dec_rrr_opentime) && !empty($dec_rrr_closetime))
            {
                
                $dec_rrr_opentime   = strtotime($dec_rrr_opentime);
                $dec_rrr_closetime  = strtotime($dec_rrr_closetime);
                $dec_rrr_nowtime    = strtotime($dec_rrr_nowtime);
              
                
                if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    $sec_openclosetype = "Open";
    
                    //For Delivery Hours
                    $sec_open_time = $dec_rrr_opentime;
                    $sec_close_time = $dec_rrr_closetime;
    
                } 
                elseif (($dec_rrr_nowtime < $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    $sec_openclosetype = "Preorder";
                    
                    //For Delivery Hours
                    $sec_open_time = $dec_rrr_opentime;
                    $sec_close_time = $dec_rrr_closetime;
    
                } 
                //2day
                elseif ($dec_rrr_opentime > $dec_rrr_closetime)
                {
                    //For Delivery Hours
                    $sec_open_time = $dec_rrr_opentime;
                    $sec_close_time = strtotime("11:59 PM");
    
                    #Time status
                    if (($dec_rrr_nowtime > $sec_open_time) && ($sec_close_time > $dec_rrr_nowtime))
                    {   
                        $sec_openclosetype = "Open";
                    } 
                    elseif (($dec_rrr_nowtime < $sec_open_time) && ($sec_close_time > $dec_rrr_nowtime)) 
                    {
                        $sec_openclosetype = "Preorder";
                    }
                    else
                    {
                        $sec_openclosetype = "Closed";
                    }
                } else
                {   
                    $sec_open_time = $dec_rrr_opentime;
                    $sec_close_time = $dec_rrr_closetime;
                    $sec_openclosetype = "Closed";
                }
    
            }
            //echo "<br>1st status=========>".$first_openclosetype;
            //echo "<br>2nd status=========>".$sec_openclosetype;
            #open closetype
            if ($first_openclosetype == 'Open' || $sec_openclosetype == 'Open')
            {
                $openclosetype = 'Open';
            } 
            elseif ($first_openclosetype == 'Preorder' || $sec_openclosetype == 'Preorder')
            {
                $openclosetype = 'Preorder';
            } 
            else
            {
                $openclosetype = 'Closed';
            }
            
        } else {
            
            $openclosetype = 'Closed';
        }
        
        //echo "<br>Final status=========>".$openclosetype;
        return $openclosetype;
    }
    //----------------------------------------------------------------------------
    //Main Addons List
    /**
     * Site::getShowMainAddonsListEdit()
     * 
     * @return
     */
    function getShowMainAddonsListEdit($id)
    {
        global $CFG, $objSmarty, $admin_smarty;


        $sel_addon = "SELECT id, parentid, category_id, addonsname, restaurant_id, addonspriceoption, addonsprice, addonscount FROM " .
            $CFG['table']['restaurant_addons'] . " WHERE parentid = '" . $id .
            "' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        //echo "<pre>";print_r($res_addon);echo "</pre>";
        $getpriceoption = $this->getValue("addonspriceoption", $CFG['table']['restaurant_addons'],
            "id = '" . $id . "'");

        $objSmarty->assign("getpriceoption", $getpriceoption);
        $objSmarty->assign("showmainAddonslist", $res_addon);
        $objSmarty->assign("cntmainAddons", count($res_addon));

        $admin_smarty->assign("getpriceoption", $getpriceoption);
        $admin_smarty->assign("showmainAddonslist", $res_addon);
        $admin_smarty->assign("cntmainAddons", count($res_addon));
    }
    //-----------------------------------------------------------------------
    #from user side
    /**
     * Site::getShoweditlist()
     * 
     * @return
     */
    function getShoweditlist($id)
    {
        global $CFG, $objSmarty;

        $addonsvalue = $this->getMultivalue("restaurant_id,category_id,addonsname,addonspriceoption,addonsprice,addonscount",
            $CFG['table']['restaurant_addons'], "id='" . $id . "'");
        $objSmarty->assign("addonsvalue", $addonsvalue);
    }
    #----------------------------------------------------------------

    #----------------------------------------------------------------
    #Restaurant Details
    /**
     * Site::siteRestDetails()
     * 
     * @return
     */
    function siteRestDetails($restid)
    {
        global $CFG, $objSmarty;

        $sel = " SELECT restaurant_name, restaurant_streetaddress, restaurant_zip, restaurant_state, restaurant_city, " .
            " cty.cityname, " . "state.statename " . " FROM " . $CFG['table']['restaurant'] .
            " AS rest " . " LEFT JOIN " . $CFG['table']['city'] .
            " AS cty ON rest.restaurant_city = cty.city_id " .
            //" LEFT JOIN ".$CFG['table']['zipcode']." AS zip ON rest.restaurant_zip = zip.zipcode_id ".
            " LEFT JOIN " . $CFG['table']['state'] .
            " AS state ON rest.restaurant_state = state.statecode " .
            " WHERE rest.restaurant_id = '" . $restid . "' ";
        $res = $this->ExecuteQuery($sel, 'select');
        #echo "<pre>";print_r($res);echo "</pre>";

        return $res;
    }

    #---------------------------------------------------------------------------------------
    #delete Addons and subaddons:
    /**
     * Site::deleteAddons()
     * 
     * @return
     */
    function deleteAddons()
    {
        global $CFG, $objSmarty;

        #Delete Main addon in addons:
        $num_addons_relparent = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "parentid = '" . $_REQUEST['parentid'] . "' AND restaurant_id = '" . $_REQUEST['resid'] .
            "' ");

        if (!empty($_REQUEST['menuid']))
        {
            $menuid = $_REQUEST['menuid'];
        } else
        {
            $menuid = $_REQUEST['eid'];
        }

        #echo "num_addons_relparent ".$num_addons_relparent;

        /*if($num_addons_relparent == 1){
        $sql_delete		=	"DELETE FROM ".$CFG['table']['restaurant_addons']." WHERE id = '".$_REQUEST['parentid']."' AND restaurant_id = '".$_REQUEST['resid']."'";
        }elseif($num_addons_relparent > 1){
        $sql_delete		=	"DELETE FROM ".$CFG['table']['restaurant_addons']." WHERE  parentid = '".$_REQUEST['parentid']."' AND restaurant_id = '".$_REQUEST['resid']."' AND addonsname = '".$_REQUEST['addon_name']."'";
        }	
        $res_delete		=	$this->ExecuteQuery($sql_delete,"delete");*/
        #echo "sql_delete ***".$sql_delete;

        #Delete Sub addon in menu addons:
        $sql_delete_subaddon = "DELETE FROM " . $CFG['table']['restaurant_menuaddons'] .
            " WHERE menuaddons_id = '" . $_REQUEST['menu_addonid'] .
            "' AND menuaddons_restaurantid = '" . $_REQUEST['resid'] .
            "' AND addonparentid = '" . $_REQUEST['parentid'] .
            "' AND menuaddons_addonsname = '" . $_REQUEST['mainaddon_id'] .
            "' AND menuaddons_menuid = '" . $menuid . "'";

        $res_delete_subaddon = $this->ExecuteQuery($sql_delete_subaddon, "delete");
    }

    #-------------------------------------------------------------------
    #Show Category List restaurant wise
    /**
     * Site::getShowCategoryList_res()
     * 
     * @return
     */
    function getShowCategoryList_res($resid)
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel_cat = "SELECT maincateid,maincatename FROM " . $CFG['table']['category_main'] .
            " WHERE restaurant_id = '" . $resid .
            "' AND status = '1' ORDER BY sortorder ASC";
        $res_cat = $this->ExecuteQuery($sel_cat, "select");
        //echo "sel_cat =>".$sel_cat;
        //echo "<pre>";print_r($res_cat);echo "</pre>";
        $objSmarty->assign("showcategorylist", $res_cat);
        $admin_smarty->assign("showcategorylist", $res_cat);
    }


    #PIZZA ADDON NEW IMPLEMENTATIONS
    #---------------------------------------------------------------------------------------------------------------

    #Show Addons List
    /**
     * Site::getShowAddonsList()
     * 
     * @return
     */
    function getShowAddonsList($catid, $resid)
    {
        global $CFG, $objSmarty, $admin_smarty;


        $menu_categoryoption = $this->GetValue("maincat_option", $CFG['table']['category_main'],
            "maincateid = '" . $catid . "' ");

        #echo "menu_categoryoption ".$menu_categoryoption;

        if ($menu_categoryoption == 'pizza')
        {
            #$catcond  .= " AND cat.maincat_option = '".$menu_categoryoption."' AND addon.restaurant_id = '".$resid."' ";
            $catcond .= " AND cat.maincat_option = '" . $menu_categoryoption . "' ";
        } else
        {
            $catcond .= " AND cat.maincat_option = '" . $menu_categoryoption .
                "' AND addon.category_id = '" . $catid . "' ";
        }

        #$sel_addon = "SELECT id,category_id,addonsname,restaurant_id,addonspriceoption,addonsprice FROM ".$CFG['table']['restaurant_addons']." WHERE category_id = '".$catid."' AND restaurant_id = '".$resid."' AND parentid = '0' AND status = '1' ORDER BY addonsname ASC";
        $sel_addon = " SELECT addon.id, addon.addonsname,addon.category_id, addon.restaurant_id, addon.addonspriceoption, addon.addonsprice, cat.maincat_option " .
            " FROM " . $CFG['table']['restaurant_addons'] . " as addon LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON addon.category_id = cat.maincateid " .
            " WHERE addon.parentid = '0' " . $catcond . "  AND addon.restaurant_id = '" . $resid .
            "' ORDER BY addon.id ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "sel_addon ".$sel_addon;
        #echo "<pre>";print_r($res_addon);echo "</pre>";

        $cond .= " AND menuaddons_restaurantid = '" . $resid . "' ";

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] . "' " . $cond .
                " ");
            $res_addon[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption",
                $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] . "' " . $cond .
                "");
            $res_addon[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] . "' " . $cond .
                "");
            $res_addon[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] . "' " . $cond .
                "");
        }
        //echo "<pre>";print_r($res_addon);echo "</pre>";
        $objSmarty->assign("showAddonslist", $res_addon);
        $objSmarty->assign("cntmenuAddons", count($res_addon));

        $admin_smarty->assign("showAddonslist", $res_addon);
        $admin_smarty->assign("cntmenuAddons", count($res_addon));
    }
    #----------------------------------------------------------------
    #Show Sub Addons List
    /**
     * Site::getShowSubAddonsList()
     * 
     * @return
     */
    function getShowSubAddonsList($parentid, $maincat_option)
    {
        global $CFG, $objSmarty, $admin_smarty;

        //echo "resid:=====>".$_REQUEST['resid'];

        $sel = "SELECT id,	parentid, category_id,restaurant_id,addonsname,addonspriceoption,addonsprice FROM " .
            $CFG['table']['restaurant_addons'] . " WHERE parentid = '" . $parentid .
            "' AND status = '1' AND addonsname != '' AND restaurant_id = '" . $_REQUEST['resid'] .
            "' ORDER BY id ASC ";
        #echo "<br>sss--->".$sel;
        $res = $this->ExecuteQuery($sel, "select");
        //echo "<pre>===>";print_r($res);echo "</pre>";

        if (isset($_REQUEST['eid']) && !empty($_REQUEST['eid']))
        {
            $cond .= "AND menuaddons_menuid = '" . $_REQUEST['eid'] . "'";
            #$sort_by	=	"ORDER BY menuaddons_menuid ASC LIMIT 1";
        }
        /*elseif( isset($menu_id) && !empty($menu_id) ){
        $cond .= "AND menuaddons_menuid = '".$menu_id."'";
        }*/

        if ($maincat_option == 'pizza')
        {
            $catcond .= ' AND menu_catoption = "' . $maincat_option .
                '" AND menuaddons_restaurantid = "' . $_REQUEST['resid'] . '" ';
        } else
        {
            $catcond .= ' AND menu_catoption = "' . $maincat_option .
                '" AND menuaddons_restaurantid = "' . $_REQUEST['resid'] . '" ';
        }
        #echo "<br>main cat option ".$catcond;
        foreach ($res as $key => $value)
        {

            /*$res[$key]['menu_categoryoption'] = $this->GetValue("maincat_option",$CFG['table']['category_main'],"maincateid = '".$res[$key]['category_id']."'");
            
            */
            #echo "<br> ".$catcond;

            /*$res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname",$CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond." ");
            
            $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption",$CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond."");
            
            $res[$key]['menuprice'] = $this->GetValue("menuaddons_price",$CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond."");
            
            $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",$CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond."");
            
            $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",$CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond."");			
            
            
            $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id",$CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond."");
            
            $res[$key]['menu_categoryname'] = $this->GetValue("maincatename",$CFG['table']['category_main'],"maincateid = '".$res[$key]['category_id']."'");
            
            if(strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false){
            $res[$key]['menu_categoryname_pizzachk']   = 'Pizza';
            }else{
            $res[$key]['menu_categoryname_pizzachk']   = $res[$key]['menu_categoryname'];
            }
            
            $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],"menuaddons_addonsname = '".$res[$key]['id']."' AND menuaddons_categoryid = '".$res[$key]['category_id']."' ".$cond."");*/

            #Pizza category:

            $res[$key]['menu_categoryoption'] = $this->GetValue("maincat_option", $CFG['table']['category_main'],
                "maincateid = '" . $res[$key]['category_id'] . "'");

            if ($maincat_option == 'pizza')
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . "  " . $cond .
                    " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $res[$key]['category_id'] . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");
            }
            #Normal Category:
            else
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $res[$key]['category_id'] . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");
            }
        }
        #echo "<pre>";print_r($res);echo "</pre>";
        #echo "<br>cnt-->".count($res);
        $objSmarty->assign("showSubAddonslist", $res);
        $objSmarty->assign("cntmenuSubAddons1", count($res));

        $admin_smarty->assign("showSubAddonslist", $res);
        $admin_smarty->assign("cntmenuSubAddons1", count($res));
    }

    #------------------------------------------------------------------------------
    /**
     * Site::getShowAddonsListEdit()
     * 
     * @return
     */
    function getShowAddonsListEdit($catid, $menuid)
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $resid = $_REQUEST['resid'];
        }

        $menu_categoryoption = $this->GetValue("maincat_option", $CFG['table']['category_main'],
            "maincateid = '" . $catid . "' ");

        if ($menu_categoryoption == 'pizza')
        {
            $catcond .= " AND cat.maincat_option = '" . $menu_categoryoption . "'";
        } else
        {
            $catcond .= " AND cat.maincat_option = '" . $menu_categoryoption .
                "' AND addon.category_id = '" . $catid . "' ";
        }

        #$getmainaddons = $this->getMultiValue("id,addonsname,addonspriceoption,addonsprice",$CFG['table']['restaurant_addons'],"parentid = '0' AND category_id = '".$catid."' AND restaurant_id = '".$resid."' ORDER BY id ASC");
        //echo "<pre>";print_r($getmainaddons);echo "</pre>";

        $sql_addons = " SELECT addon.id,addon.addonsname,addon.addonspriceoption,addon.addonsprice, cat.maincat_option " .
            " FROM " . $CFG['table']['restaurant_addons'] . " as addon LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON addon.category_id = cat.maincateid " .
            " WHERE addon.parentid = '0' " . $catcond . "  AND addon.restaurant_id = '" . $resid .
            "' ORDER BY addon.id ASC";

        //echo "sql_addons ".$sql_addons;
        $getmainaddons = $this->ExecuteQuery($sql_addons, "select");

        $mainaddonsname = $getmainaddons[0]['addonsname'];

        $sel_addon = "SELECT id,category_id,addonsname,restaurant_id FROM " . $CFG['table']['restaurant_addons'] .
            " WHERE category_id = '" . $catid .
            "' AND status = '1'  AND parentid != '0' AND restaurant_id = '" . $resid .
            "' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        //echo "<pre>";print_r($res_addon);echo "</pre>";

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND menuaddons_menuid = '" . $menuid . "' ");
            $res_addon[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption",
                $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND menuaddons_menuid = '" . $menuid . "'");
            $res_addon[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND menuaddons_menuid = '" . $menuid . "'");

            $res_addon[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $res_addon[$key]['id'] .
                "' AND menuaddons_categoryid = '" . $res_addon[$key]['category_id'] .
                "' AND menuaddons_menuid = '" . $menuid . "'");
        }
        #echo "<pre>";print_r($getmainaddons);echo "</pre>";
        //echo "<pre>";print_r($res_addon);echo "</pre>";
        $objSmarty->assign("showAddonslist", $getmainaddons);
        $objSmarty->assign("mainaddonsname", $mainaddonsname);
        $objSmarty->assign("cntmenuAddons", count($getmainaddons));

        $admin_smarty->assign("showAddonslist", $getmainaddons);
        $admin_smarty->assign("mainaddonsname", $mainaddonsname);
        $admin_smarty->assign("cntmenuAddons", count($getmainaddons));
    }

    #---------------------------------------------------------------------------------------------------------
    #getSliceAddonsPrice:
    /**
     * Site::getSliceAddonsPrice()
     * 
     * @return
     */
    function getSliceAddonsPrice($sliceaddonprice)
    {
        global $objSmarty, $admin_smarty;

        $sliceaddonprice_arr = explode(",", $sliceaddonprice);

        for ($i = 0; $i < count($sliceaddonprice_arr); $i++)
        {
            //if (!empty($sliceaddonprice_arr[$i])){
                $sliceaddonprice_arr_new[] = $sliceaddonprice_arr[$i];
            //}
        }

        #echo "<pre>";print_r($sliceaddonprice_arr_new);echo "</pre>";

        #echo "count : ".count($sliceaddonprice_arr_new);

        $objSmarty->assign("sliceaddonprice_arr", $sliceaddonprice_arr_new);
        $admin_smarty->assign("sliceaddonprice_arr", $sliceaddonprice_arr_new);
    }
    #---------------------------------------------------------------------------------------------------------
    #getSliceAddonsPrice:
    /**
     * Site::getSliceAddonsPrice_OrderPop()
     * 
     * @return
     */
    function getSliceAddonsPrice_OrderPop($sliceaddonprice, $pos)
    {
        global $objSmarty;

        #echo "<pre>";print_r($sliceaddonprice);echo "</pre>";
        #echo "pos ******** ".$pos;

        $sliceaddonprice_arr = explode(",", $sliceaddonprice);

        for ($i = 0; $i < count($sliceaddonprice_arr); $i++)
        {
            if (!empty($sliceaddonprice_arr[$i]))
            {
                $sliceaddonprice_arr_new[] = $sliceaddonprice_arr[$i];
            }
        }

        #echo "<pre>";print_r($sliceaddonprice_arr_new);echo "</pre>";

        #echo "count : ".count($sliceaddonprice_arr_new);

        #$objSmarty->assign("sliceaddonprice_val",$sliceaddonprice_arr_new[$pos]);
        return $sliceaddonprice_arr_new[$pos];
    }

    /**
     * Site::getShowMenuPriceDet_cat()
     * 
     * @return
     */
    function getShowMenuPriceDet_cat($eid)
    {
        global $CFG, $admin_smarty, $objSmarty;
        #echo "eid ******* ".$eid;
        #echo "cat_id: ***********".$_REQUEST['catid'];
        /*if(isset($_REQUEST['catid']) && !empty($_REQUEST['catid'])){
        $sel = "SELECT cat.maincateid, cat.restaurant_id, cat.maincatename, cat.maincat_option, menu.id, menu.restaurant_id, menu.menu_name, menu.menu_category, menu.menu_type, menu.menu_cuisine, menu.menu_price, menu.menu_addons, menu.sizeoption, menu.menu_spl_instruction, menu.menu_description, menu.menu_photo, menu.menu_popular_dish, menu.menu_spicy, menu.pizza_size_small, menu.pizza_small_value, menu.pizza_size_medium, menu.pizza_medium_value, menu.pizza_size_large, menu.pizza_large_value FROM ".$CFG['table']['category_main']." as cat LEFT JOIN  ".$CFG['table']['restaurant_menu']." as menu ON cat.maincateid = menu.menu_category OR cat.maincat_option = menu.maincat_option WHERE cat.maincateid = '".$_REQUEST['catid']."' GROUP BY menu.maincat_option";
        }else{
        $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM ".$CFG['table']['restaurant_menu']." WHERE id='".$eid."' ";
        }*/
        if (!isset($eid) && empty($eid))
        {
            $sel = "SELECT cat.maincateid, cat.restaurant_id, cat.maincatename, cat.maincat_option, menu.id, menu.restaurant_id, menu.menu_name, menu.menu_category, menu.menu_type, menu.menu_cuisine, menu.menu_addons, menu.sizeoption, menu.menu_spl_instruction, menu.menu_description, menu.menu_photo, menu.menu_popular_dish, menu.menu_spicy, menu.pizza_size_small, menu.pizza_size_medium, menu.pizza_size_large FROM " .
                $CFG['table']['category_main'] . " as cat LEFT JOIN  " . $CFG['table']['restaurant_menu'] .
                " as menu ON cat.maincateid = menu.menu_category WHERE cat.maincateid = '" . $_REQUEST['catid'] .
                "' GROUP BY menu.maincat_option";
        } else
        {
            $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM " .
                $CFG['table']['restaurant_menu'] . " WHERE id='" . $eid . "' ";
        }
        $res = $this->ExecuteQuery($sel, 'select');
        #echo "<pre>";print_r($res);echo "</pre>";
        //echo "sel--> : ".$sel;
        $objSmarty->assign("menudet", $res);
        return $res;
    }

    //---------------------------------------------------------------------------
    #getShowPizzaSizeoption
    /**
     * Site::getShowPizzaSizeoption()
     * 
     * @return
     */
    function getShowPizzaSizeoption($cat_id, $maincat_option)
    {
        global $CFG, $objSmarty;

        #$sel_slice = "SELECT pizza_slice_id, pizza_slice_restaurantid, pizza_slice_categoryid, pizza_slice_menuid, pizza_slice_name, pizza_slice_price FROM ".$CFG['table']['restaurant_pizza_slice']." WHERE pizza_slice_categoryid = '".$cat_id."' AND pizza_slice_restaurantid = '".$_GET['resid']."'  ORDER BY pizza_slice_id ASC";

        #echo "maincat_option --->".$maincat_option;

        if (isset($_REQUEST['menuid']) && !empty($_REQUEST['menuid']))
        {
            $cond .= " AND piz.pizza_slice_menuid = '" . $_REQUEST['menuid'] . "' ";
        }

        if (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
            'pizza')
        {
            $cat_optioncond .= " WHERE piz.pizza_slice_restaurantid = '" . $_SESSION['restaurantownerid'] .
                "' AND cat.maincat_option = '" . $maincat_option . "'";
        } elseif (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
        'normal')
        {
            $cat_optioncond .= " WHERE piz.pizza_slice_categoryid = '" . $cat_id .
                "' AND piz.pizza_slice_restaurantid = '" . $_SESSION['restaurantownerid'] .
                "' AND cat.maincat_option = '" . $maincat_option . "'";
        }

        $sel_slice = "SELECT piz.pizza_slice_id, piz.pizza_slice_restaurantid, piz.pizza_slice_categoryid, piz.pizza_slice_menuid, piz.pizza_slice_name, piz.pizza_slice_price, cat.maincat_option FROM " .
            $CFG['table']['restaurant_pizza_slice'] . " as piz" . " LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON piz.pizza_slice_categoryid = cat.maincateid" . " $cat_optioncond " .
            $cond . " GROUP BY piz.pizza_slice_name ORDER BY piz.pizza_slice_id ASC";

        $res_slice = $this->ExecuteQuery($sel_slice, "select");
        //echo "qry: ".$sel_slice;
        #echo "<pre>";print_r($res_slice);echo "</pre>";
        #echo "count: ".count($res_slice);

        $objSmarty->assign("showPizzaSlicelist", $res_slice);
        $objSmarty->assign("cntSliceAddons", count($res_slice));
    }
    #---------------------------------------------------------------------------------------------#
    /**
     * Site::getShowSubAddonsListEdit()
     * 
     * @return
     */
    function getShowSubAddonsListEdit($parentid, $maincat_option, $menuid)
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel = "SELECT id,	parentid, category_id,restaurant_id,addonsname,addonspriceoption,addonsprice FROM " .
            $CFG['table']['restaurant_addons'] . " WHERE parentid = '" . $parentid .
            "' AND status = '1' AND addonsname != '' AND restaurant_id = '" . $_SESSION['restaurantownerid'] .
            "' ORDER BY id ASC ";
        #echo "<br>sss--->".$sel;
        $res = $this->ExecuteQuery($sel, "select");
        //echo "<pre>===>";print_r($res);echo "</pre>";

        if (isset($_GET['eid']) && !empty($_GET['eid']))
        {
            #$cond .= "AND menuaddons_menuid = '".$_GET['eid']."'";
            #$sort_by	=	"ORDER BY menuaddons_menuid ASC LIMIT 1";
        }

        if (isset($menuid) && !empty($menuid))
        {
            $cond .= "AND menuaddons_menuid = '" . $menuid . "'";
            #$sort_by	=	"ORDER BY menuaddons_menuid ASC LIMIT 1";
        }

        if ($maincat_option == 'pizza')
        {
            $catcond .= ' AND menu_catoption = "' . $maincat_option .
                '" AND menuaddons_restaurantid = "' . $_SESSION['restaurantownerid'] . '" ';
        } else
        {
            $catcond .= ' AND menu_catoption = "' . $maincat_option .
                '" AND menuaddons_restaurantid = "' . $_SESSION['restaurantownerid'] . '" ';
        }
        #echo "<br>main cat option ".$maincat_option;
        foreach ($res as $key => $value)
        {

            #Pizza category:

            $res[$key]['menu_categoryoption'] = $this->GetValue("maincat_option", $CFG['table']['category_main'],
                "maincateid = '" . $res[$key]['category_id'] . "'");

            if ($maincat_option == 'pizza')
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . "  " . $cond .
                    " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $res[$key]['category_id'] . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] . "' " . $catcond . " " . $cond .
                    "");
            }
            #Normal Category:
            else
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $res[$key]['category_id'] . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $res[$key]['id'] .
                    "' AND menuaddons_categoryid = '" . $res[$key]['category_id'] . "' '" . $catcond .
                    "' " . $cond . "");
            }
        }
        //echo "<pre>";print_r($res);echo "</pre>";
        //echo "<br>cnt-->".count($res);
        $objSmarty->assign("showSubAddonslist", $res);
        $objSmarty->assign("cntmenuSubAddons1", count($res));
    }

    /**
     * Site::getShowMenuPriceDet()
     * 
     * @return
     */
    function getShowMenuPriceDet($eid)
    {
        global $CFG, $admin_smarty, $objSmarty;
        #echo "eid ******* ".$eid;
        /*if(isset($_REQUEST['catid']) && !empty($_REQUEST['catid'])){
        $sel = "SELECT cat.maincateid, cat.restaurant_id, cat.maincatename, cat.maincat_option, menu.id, menu.restaurant_id, menu.menu_name, menu.menu_category, menu.menu_type, menu.item_type, menu.menu_cuisine, menu.menu_price, menu.menu_addons, menu.sizeoption, menu.menu_spl_instruction, menu.menu_description, menu.menu_photo, menu.menu_popular_dish, menu.menu_lunch_dish, menu.menu_spicy, menu.pizza_size_small, menu.pizza_small_value, menu.pizza_size_medium, menu.pizza_medium_value, menu.pizza_size_large, menu.pizza_large_value FROM ".$CFG['table']['category_main']." as cat LEFT JOIN  ".$CFG['table']['restaurant_menu']." as menu ON cat.maincateid = menu.menu_category OR cat.maincat_option = menu.maincat_option WHERE cat.maincateid = '".$_REQUEST['catid']."' GROUP BY menu.maincat_option";
        }else{*/

        $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE id='" . $eid . "' ";

        #}
        $res = $this->ExecuteQuery($sel, 'select');
        #echo "<pre>";print_r($res);echo "</pre>";
        //echo "sel-->: ".$sel;
        $objSmarty->assign("menudet", $res);
        return $res;
    }

    ###################PIZZA ADDON NEW IMPLEMENTATION###############################################
    #---------------------------------------------------------------------------------------
    #Restaurant edit list
    /**
     * Site::geteditRestaurantListTiming()
     * 
     * @return
     */
    function geteditRestaurantListTiming($rid)
    {
        global $CFG, $admin_smarty, $objSmarty;

        $sel = "SELECT
					restaurant_id, mon_firstopen_time, 	mon_firstclose_time, tue_firstopen_time, tue_firstclose_time, wed_firstopen_time, wed_firstclose_time, 	thu_firstopen_time,	thu_firstclose_time, fri_firstopen_time, fri_firstclose_time, sat_firstopen_time, sat_firstclose_time, sun_firstopen_time, sun_firstclose_time, mon_secondopen_time, mon_secondclose_time, tue_secondopen_time,	tue_secondclose_time, wed_secondopen_time, wed_secondclose_time, thu_secondopen_time, thu_secondclose_time,	fri_secondopen_time, fri_secondclose_time, sat_secondopen_time,	sat_secondclose_time, sun_secondopen_time, sun_secondclose_time
				FROM " . $CFG['table']['restaurant_timing'] . " WHERE restaurant_id = '" . $rid .
            "'  ";
        #echo "<br>resid--->".$sel;
        $res = $this->ExecuteQuery($sel, 'select');

        #if($res[0]['mon_firstopen_time'] >12 || $res[0]['mon_firstclose_time'] >12 || $res[0]['tue_firstopen_time'] >12 || $res[0]['tue_firstclose_time'] >12 )

        #echo "<pre>";print_r($res);echo "</pre>";

        $admin_smarty->assign("restaurantEditListTiming", $res);
        $objSmarty->assign("restaurantEditListTiming", $res);

        return $res;
    }
    #Monday Open Time Restaurant timings
    /**
     * Site::deliveryTimeHrMinSes_restime()
     * 
     * @return
     */
    function deliveryTimeHrMinSes_restime($opentime)
    {

        list($monopentimehr, $monopentimemin_xx) = explode(":", $opentime);
        list($monopentimemin, $monopentimesec) = explode(" ", $monopentimemin_xx);

        /*if($monopentimehr > 12){
        $monopentimesec = 'PM';
        }elseif($monopentimehr < 12){
        $monopentimesec = 'AM';
        }*/

        #echo "<br>".$monopentimehr." ".$monopentimemin." ".$monopentimesec;
        #echo "<br>".$monopentimehr." ".$monopentimemin." ".$monopentimesec;
        return array(
            $monopentimehr,
            $monopentimemin,
            $monopentimesec);
    }
    #----------------------------------------------------------------------------------
    #Insert Time option in database
    /**
     * Site::insertTimeOption_Second_Time()
     * 
     * @return
     */
    function insertTimeOption_Second_Time($rest_del_mon_openhr, $rest_del_mon_openmin,
        $rest_del_mon_openses, $rest_del_mon_closehr, $rest_del_mon_closemin, $rest_del_mon_closeses,
        $rest_del_mon_openhr_sec, $rest_del_mon_openmin_sec, $rest_del_mon_openses_sec,
        $rest_del_mon_closehr_sec, $rest_del_mon_closemin_sec, $rest_del_mon_closeses_sec)
    {


        /*if($rest_del_mon_openses == 'AM'){
        if($rest_del_mon_openhr == 12){
        $rest_del_mon_openhr	=	'00';
        #echo "rest_del_mon_openhr : ".$rest_del_mon_openhr."<br>";
        }
        }

        if($rest_del_mon_closeses == 'AM'){
        if($rest_del_mon_closehr == 12){
        $rest_del_mon_closehr	=	'00';
        #echo "rest_del_mon_closehr : ".$rest_del_mon_closehr."<br>";
        }
        }

        if($rest_del_mon_openses_sec == 'AM'){
        if($rest_del_mon_openhr_sec == 12){
        $rest_del_mon_openhr_sec	=	'00';
        #echo "rest_del_mon_openhr_sec : ".$rest_del_mon_openhr_sec."<br>";
        }
        }

        if($rest_del_mon_closeses_sec == 'AM'){
        if($rest_del_mon_closehr_sec == 12){
        $rest_del_mon_closehr_sec	=	'00';
        #echo "rest_del_mon_closehr_sec : ".$rest_del_mon_closehr_sec."<br>";
        }
        }*/


        #echo "rest_del_mon_openhr : ".$rest_del_mon_openhr."<br>";
        #echo "rest_del_mon_closehr : ".$rest_del_mon_closehr."<br>";
        $res_opening_time = $rest_del_mon_openhr . ':' . $rest_del_mon_openmin . ' ' . $rest_del_mon_openses;
        $res_closeing_time = $rest_del_mon_closehr . ':' . $rest_del_mon_closemin . ' ' .
            $rest_del_mon_closeses;

        $res_opening_time_sec = $rest_del_mon_openhr_sec . ':' . $rest_del_mon_openmin_sec .
            ' ' . $rest_del_mon_openses_sec;
        $res_closeing_time_sec = $rest_del_mon_closehr_sec . ':' . $rest_del_mon_closemin_sec .
            ' ' . $rest_del_mon_closeses_sec;


        /*$res_opening_time 	= $rest_del_mon_openhr.':'.$rest_del_mon_openmin.' '.$rest_del_mon_openses;
        $res_closeing_time 	= $rest_del_mon_closehr.':'.$rest_del_mon_closemin.' '.$rest_del_mon_closeses;

        $res_opening_time_sec 	= $rest_del_mon_openhr_sec.':'.$rest_del_mon_openmin_sec.' '.$rest_del_mon_openses_sec;
        $res_closeing_time_sec 	= $rest_del_mon_closehr_sec.':'.$rest_del_mon_closemin_sec.' '.$rest_del_mon_closeses_sec;*/

        return array(
            $res_opening_time,
            $res_closeing_time,
            $res_opening_time_sec,
            $res_closeing_time_sec);
    }
    #Card Expire month and year
    #-------------------------------------------------------------------------------
    #Exp Month LIST
    /**
     * Site::expMonthList()
     * 
     * @return
     */
    function expMonthList($ref_id)
    {
        $content = '';
        for ($i = 1; $i <= 12; $i++)
        {
            if ($i == $ref_id)
            {
                $sel = 'selected="selected"';
            } else
            {
                $sel = '';
            }

            $content .= "<option value='$i' $sel>$i</option>\n";
        }
        return $content;
    }
    #-------------------------------------------------------------------------------
    #Exp Month LIST
    /**
     * Site::expYearList()
     * 
     * @return
     */
    function expYearList($ref_id)
    {
        $content = '';
        $current_year = date("Y");
        for ($i = $current_year; $i <= 2020; $i++)
        {
            if ($i == $ref_id)
            {
                $sel = 'selected="selected"';
            } else
            {
                $sel = '';
            }

            $content .= "<option value='$i' $sel>$i</option>\n";
        }
        return $content;
    }

    #-------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Category Sort order
    /**
     * Site::updateCategoryOrder()
     * 
     * @return
     */
    function updateCategoryOrder()
    {
        global $CFG, $admin_smarty;

        $updateRecordsArray = explode("^", $_POST['data']);
        foreach ($updateRecordsArray as $key => $value)
        {
            if (!empty($value))
            {

                $cccnt = $key + 1;
                $uporder = "UPDATE " . $CFG['table']['category_main'] . " SET sortorder = '" . $cccnt .
                    "' WHERE maincateid = '" . $value . "' ";
                #echo $uporder;
                $resorder = $this->ExecuteQuery($uporder, "update");
            }
        }
    }
    #--------------------------------------------------------------------------------
    #Menu Sort order category wise
    /**
     * Site::updateMenuOrder()
     * 
     * @return
     */
    function updateMenuOrder()
    {
        global $CFG, $admin_smarty;

        $updateRecordsArray = explode("^", $_POST['data']);
        foreach ($updateRecordsArray as $key => $value)
        {
            if (!empty($value))
            {

                $cccnt = $key + 1;
                $uporder = "UPDATE " . $CFG['table']['restaurant_menu'] . " SET sortorder = '" .
                    $cccnt . "' WHERE id = '" . $value . "' ";
                #echo $uporder;
                $resorder = $this->ExecuteQuery($uporder, "update");
            }
        }
    }
    #----------------------------------------------------------------------------------
    #Start Encrypt password For Customer and Restaurant
    #----------------------------------------------------------------------------------
    //This function makes a new password from a plaintext password.
    /**
     * Site::encrypt_password_md5()
     * 
     * @return
     */
    function encrypt_password_md5($plain)
    {

        //echo $plain."<br>";

        $password = '';

        for ($i = 0; $i < 10; $i++)
        {
            $password .= $this->encrypt_password_rand();
        }
        //echo $password."<br>";

        $salt = substr(md5($password), 0, 2);
        //echo $salt."<br>";
        $password = md5($salt . $plain) . ':' . $salt;
        //echo $password."<br>";
        return $password;
    }
    /*function encrypt_password_md5($plain) {
    $password = '';
    
    for ($i=0; $i<10; $i++) {
    $password .= $this->encrypt_password_rand();
    }
    $salt = substr(md5($password), 0, 2);
    $password = md5($salt . $plain) . ':' . $salt;
    return $password;
    }*/
    #----------------------------------------------------
    // Return a random value
    /**
     * Site::encrypt_password_rand()
     * 
     * @return
     */
    function encrypt_password_rand($min = null, $max = null)
    {
        static $seeded;
        if (!isset($seeded))
        {
            mt_srand((double)microtime() * 1000000);
            $seeded = true;
        }
        if (isset($min) && isset($max))
        {
            if ($min >= $max)
            {
                return $min;
            } else
            {
                return mt_rand($min, $max);
            }
        } else
        {
            return mt_rand();
        }
    }
    #----------------------------------------------------
    // Validate For Login Process  ( encrpyted password )
    /**
     * Site::validate_password()
     * 
     * @return
     */
    function validate_password($plain, $encrypted)
    {
        if (!empty($plain) && !empty($encrypted))
        {
            // split apart the hash / salt
            $stack = explode(':', $encrypted);
            //echo "<pre>";print_r($stack);echo "</pre>";
            if (sizeof($stack) != 2)
                return false;
            if (md5($stack[1] . $plain) == $stack[0])
            {
                return true;
            }
        }
        return false;
    }
    /*function validate_password($plain, $encrypted) {
    if (!empty($plain) && !empty($encrypted)) {
    // split apart the hash / salt
    $stack = explode(':', $encrypted);
    if (sizeof($stack) != 2) return false;
    if (md5($stack[1] . $plain) == $stack[0]) {
    return true;
    }
    }
    return false;
    }*/
    #----------------------------------------------------------------------------------
    #End Encrypt password For Customer and Restaurant
    #----------------------------------------------------------------------------------
    #----------------------------------------------------------------------------------
    #Start PayPal Pro ( Do Direact payment Method )
    #----------------------------------------------------------------------------------
    #Do Direct Payment
    /**
     * Site::doDirectPayment()
     * 
     * @return
     */
    function doDirectPayment($methodName_, $nvpStr_)
    {
        global $CFG, $objSmarty;

        $getpaypalDet = $this->getMultiValue("paypal_pro_mode, pro_username_live,	pro_username_test, pro_password_live, pro_password_test, pro_signature_live, pro_signature_test ",
            $CFG['table']['setting_payment'], "id = '1'");

        $paypalmode = $getpaypalDet[0]['paypal_pro_mode'];

        // Set up your API credentials, PayPal end point, and API version.
        if ($paypalmode == 'live')
        {

            $environment = 'live';
            $API_UserName = urlencode($getpaypalDet[0]['pro_username_live']);
            $API_Password = urlencode($getpaypalDet[0]['pro_password_live']);
            $API_Signature = urlencode($getpaypalDet[0]['pro_signature_live']);
        } else
        {

            $environment = 'sandbox';
            $API_UserName = urlencode($getpaypalDet[0]['pro_username_test']);
            $API_Password = urlencode($getpaypalDet[0]['pro_password_test']);
            $API_Signature = urlencode($getpaypalDet[0]['pro_signature_test']);
        }

        //$environment = 'live';

        // Set up your API credentials, PayPal end point, and API version.
        /*$API_UserName = urlencode('admin_api1.food2takeaway.com');
        $API_Password = urlencode('RULM33WNHEV5NEMT');
        $API_Signature = urlencode('Anw-NNkgfl3yzebMmgfswxpjBE0bA.Hq-HcpUaEDEWQi6Hrj4A1tvJ3I');*/

        //$API_UserName = urlencode('paypal_api1.roamsoft.in');
        //$API_Password = urlencode('DSR827Y6E9HE46N9');
        //$API_Signature = urlencode('A1QMjq3dHo7PzWrXwl.ooPJcBq0nAo6Xj-DbYBof1HGrUGrUPi9DYt7S');

        $API_Endpoint = "https://api-3t.paypal.com/nvp";
        if ("sandbox" === $environment || "beta-sandbox" === $environment)
        {
            $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
        }
        $version = urlencode('51.0');

        // Set the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        // Turn off the server and peer verification (TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        // Set the API operation, version, and API signature in the request.
        $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

        // Set the request as a POST FIELD for curl.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

        // Get response from the server.
        $httpResponse = curl_exec($ch);

        //echo "<pre>-->";print_r($httpResponse);echo "</pre>";

        if (!$httpResponse)
        {
            exit("$methodName_ failed: " . curl_error($ch) . '(' . curl_errno($ch) . ')');
        }

        // Extract the response details.
        $httpResponseAr = explode("&", $httpResponse);

        $httpParsedResponseAr = array();
        foreach ($httpResponseAr as $i => $value)
        {
            $tmpAr = explode("=", $value);
            if (sizeof($tmpAr) > 1)
            {
                $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
            }
        }

        if ((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr))
        {
            exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
        }

        return $httpParsedResponseAr;
    }
    #----------------------------------------------------------------------------------
    # END PayPal Pro ( Do Direact Payment Method )
    #----------------------------------------------------------------------------------
    #----------------------------------------------------------------------------------
    #Start Authorize.Net Payment
    #----------------------------------------------------------------------------------
    /**
     * Site::do_payment()
     * 
     * @return
     */
    function do_payment($post_values)
    {
        global $CFG, $objSmarty;

        $getpaypalDet = $this->getMultiValue("authorized_mode, authorized_url_live, authorized_url_test,authorized_login_key_live, authorized_login_key_test, authorized_transaction_key_live, authorized_transaction_key_test ",
            $CFG['table']['setting_payment'], "id = '1'");
        $paypalmode = $getpaypalDet[0]['authorized_mode'];
        if ($paypalmode == 'Live')
        {
            $post_url = $getpaypalDet[0]['authorized_url_live'];
        } else
        {
            $post_url = $getpaypalDet[0]['authorized_url_test'];
        }

        //$post_url = "https://secure.authorize.net/gateway/transact.dll";
        // This section takes the input fields and converts them to the proper format
        $post_string = "";
        foreach ($post_values as $key => $value)
        {
            $post_string .= "$key=" . urlencode($value) . "&";
        }
        $post_string = rtrim($post_string, "& ");

        // This sample code uses the CURL library for php to establish a connection,
        // submit the post, and record the response.
        // If you receive an error, you may want to ensure that you have the curl
        // library enabled in your php configuration

        $request = curl_init($post_url); // initiate curl object

        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response

        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false); // uncomment this line if you get no gateway response.
        $post_response = curl_exec($request); // execute curl post and store results in $post_response

        // additional options may be required depending upon your server configuration
        // you can find documentation on curl options at http://www.php.net/curl_setopt
        curl_close($request); // close curl object

        // This line takes the response and breaks it into an array using the specified delimiting character
        $response_array = explode($post_values["x_delim_char"], $post_response);

        // The results are output to the screen in the form of an html numbered list.
        if ($response_array)
        {
            return $response_array;
        } else
        {
            return '';
        }
    }
    #-------------------------------------------------------------------------------------#
    /**
     * Site::do_user_payment()
     * 
     * @return
     */
    function do_user_payment($creditcardinfo)
    {
        global $CFG, $objSmarty;

        $getpaypalDet = $this->getMultiValue("authorized_mode, authorized_url_live, authorized_url_test,authorized_login_key_live, authorized_login_key_test, authorized_transaction_key_live, authorized_transaction_key_test",
            $CFG['table']['setting_payment'], "id = '1'");
        $paypalmode = $getpaypalDet[0]['authorized_mode'];
        if ($paypalmode == 'Live')
        {
            $x_login = $getpaypalDet[0]['authorized_login_key_live'];
            $x_tran_key = $getpaypalDet[0]['authorized_transaction_key_live'];
        } else
        {
            $x_login = $getpaypalDet[0]['authorized_login_key_test'];
            $x_tran_key = $getpaypalDet[0]['authorized_transaction_key_test'];
        }

        #$x_login  	 		= '2P78f6Az5';//test
        #$x_tran_key  		= '5mft9R43ppGd92J2';//test

        $invoice_num = '';
        $x_card_code = $creditcardinfo['0']['cvccode'];
        $card_number = $creditcardinfo['0']['cardnumber'];
        $card_expiration = $creditcardinfo['0']['expdate'];
        $paymentamount = $creditcardinfo['0']['paymentamount'];
        $user_first_name = '';
        $user_last_name = '';
        $user_address1 = '';
        $user_state = '';
        $user_zip = '';

        $post_values['x_invoice_num'] = $invoice_num;
        $post_values['x_login'] = $x_login;
        $post_values['x_tran_key'] = $x_tran_key;

        $post_values['x_card_code'] = $x_card_code;

        $post_values['x_version'] = "3.1";
        $post_values['x_delim_data'] = "TRUE";
        $post_values['x_delim_char'] = "|";
        $post_values['x_relay_response'] = "FALSE";

        $post_values['x_type'] = "AUTH_CAPTURE"; //Optional
        $post_values['x_method'] = "CC";
        $post_values['x_card_num'] = $card_number;
        $post_values['x_exp_date'] = $card_expiration;
        $post_values['x_amount'] = $paymentamount;

        $post_values['x_first_name'] = $user_first_name; //Optional (From Client)
        $post_values['x_last_name'] = $user_last_name; //Optional (From Client)
        $post_values['x_address'] = $user_address1; //Optional (From Client)
        $post_values['x_state'] = $user_state; //Optional (From Client)
        $post_values['x_zip'] = $user_zip; //Optional (From Client)

        //Calling Payment function
        $paymentResponse = $this->do_payment($post_values);

        return $paymentResponse;
    }
    #----------------------------------------------------------------------------------
    #End Authorize.Net Payment
    #----------------------------------------------------------------------------------
    #----------------------------------------------------------------------------------
    #Start Ideal Payment
    #----------------------------------------------------------------------------------
    #Selct Bank List
    /**
     * Site::SelectBank()
     * 
     * @return
     */
    function SelectBank()
    {
        global $CFG, $admin_smarty, $objSmarty;

        $url = "https://www.targetpay.com/ideal/getissuers.php";
        $strResponse = $this->httpGetRequest($url);

        /*echo "<html>";
        echo "<form method=\"get\" name=\"idealform\">";
        echo "<select name=\"bank\">".$strResponse."</select>";
        echo "<INPUT TYPE=\"submit\" VALUE=\"Continue..\"></form>";
        echo "</html>";*/
        $objSmarty->assign("banklist", $strResponse);

    }
    #-----------------------------
    /**
     * Site::StartTransaction()
     * 
     * @return
     */
    function StartTransaction($rtlo, $bank, $description, $amount, $returnurl, $reporturl)
    {

        $url = "https://www.targetpay.com/ideal/start?" . "rtlo=" . $rtlo . "&bank=" . $bank .
            "&description=" . urlencode($description) . "&amount=" . $amount . "&returnurl=" .
            urlencode($returnurl) . "&reporturl=" . urlencode($reporturl);

        $strResponse = $this->httpGetRequest($url);
        $aResponse = explode('|', $strResponse);

        # Bad response
        if (!isset($aResponse[1]))
            die('Error' . $aResponse[0]);

        $responsetype = explode(' ', $aResponse[0]);
        $trxid = $responsetype[1];

        // Hier kunt u het transactie id aan uw order toevoegen.

        if ($responsetype[0] == "000000")
            return $aResponse[1];

        else
            die($aResponse[0]);
    }
    #-----------------------------
    // Paragraaf 5. Vraag de status op vanuit de returnurl
    /**
     * Site::CheckReturnurl()
     * 
     * @return
     */
    function CheckReturnurl($rtlo, $trxid)
    {
        $once = 1;
        $test = 0; // Set to 1 for testing as described in paragraph 1.3
        $url = "https://www.targetpay.com/ideal/check?" . "rtlo=" . $rtlo . "&trxid=" .
            $trxid . "&once=" . $once . "&test=" . $test;
        return $this->httpGetRequest($url);
    }
    #-----------------------------
    // reporturl handler
    // Update uw orderstatus en lever het product indien $status="000000 OK"
    /**
     * Site::HandleReporturl()
     * 
     * @return
     */
    function HandleReporturl($rtlo, $trxid, $status)
    {
        if (substr($_SERVER['REMOTE_ADDR'], 0, 10) == "89.184.168")
        {
            // Update uw orderstatus hier
            // De reporturl hoort OK terug te geven aan Targetpay.
            die("OK");
        } else
        {
            die("IP address not correct... This call is not from Targetpay");
        }
    }
    #-----------------------------
    /**
     * Site::httpGetRequest()
     * 
     * @return
     */
    function httpGetRequest($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $strResponse = curl_exec($ch);
        curl_close($ch);
        if ($strResponse === false)
            die("Could not fetch response " . $url);
        return $strResponse;
    }
    #----------------------------
    /**
     * Site::orderDetailsList_failure()
     * 
     * @return
     */
    function orderDetailsList_failure($lastorderid)
    {
        global $CFG, $objSmarty;

        $resid = $this->getValue("restaurant_id", $CFG['table']['order'], "orderid = '" .
            $lastorderid . "'");
        $resname = $this->getValue("restaurant_seourl", $CFG['table']['restaurant'],
            "restaurant_id = '" . $resid . "'");

        $del = "DELETE FROM " . $CFG['table']['order'] . " WHERE orderid = '" . $lastorderid .
            "' ";
        $res = $this->ExecuteQuery($del, "delete");

        if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
        {
            $this->redirectUrl($CFG['site']['base_url'] . "/restaurantDetails.php?resid=" . $resid . "&resname=" . $resname);
        } else
        {
            $this->redirectUrl($CFG['site']['base_url'] . "/menu/" . $resid . "/" . $resname);
        }
    }
    #checkout page drodown------------------------------------------old script command by priya
    /*function checkdatePickerDate($resid){
    global $CFG,$objSmarty;
    //echo $resid;
    //echo "<pre>";print_r($_REQUEST);echo "</pre>";
    $date  = $_POST['date'];
    //$resid = $_POST['restid'];
    if(isset($_POST['restid']) && !empty($_POST['restid']) ){
    $resid = $_POST['restid'];
    }else{
    $resid = $resid;
    }
    if(isset($_POST['date']) && !empty($_POST['date']) ){
    $date = $_POST['date'];
    $day  = date("l", strtotime($_POST['date']));
    }else{
    $date = date('Y-m-d');
    $day  = date("l", strtotime($date));
    }
    
    //$day  = date("l", strtotime($_POST['date']));
    $currentday = date('Y-m-d');
    //echo $currentday;
    //echo  $_POST['date'];
    if($day == 'Monday'){
    //echo '1';
    $tday = 'mon_firstopen_time AS fir_open_time,mon_firstclose_time AS fir_close_time,mon_secondopen_time AS sec_open_time,mon_secondclose_time AS sec_close_time';
    }elseif($day == 'Tuesday'){
    //echo '2';
    $tday = 'tue_firstopen_time AS fir_open_time,tue_firstclose_time AS fir_close_time,tue_secondopen_time AS sec_open_time,tue_secondclose_time AS sec_close_time';
    }elseif($day == 'Wednesday'){
    //echo '3';
    $tday = 'wed_firstopen_time AS fir_open_time,wed_firstclose_time AS fir_close_time,wed_secondopen_time AS sec_open_time,wed_secondclose_time AS sec_close_time';
    }elseif($day == 'Thursday'){
    //echo '4';
    $tday = 'thu_firstopen_time AS fir_open_time,thu_firstclose_time AS fir_close_time,thu_secondopen_time AS sec_open_time,thu_secondclose_time AS sec_close_time';
    }elseif($day == 'Friday'){
    //echo '5';
    $tday = 'fri_firstopen_time AS fir_open_time,fri_firstclose_time AS fir_close_time,fri_secondopen_time AS sec_open_time,fri_secondclose_time AS sec_close_time';
    }elseif($day == 'Saturday'){
    //echo '6';
    $tday = 'sat_firstopen_time AS fir_open_time,sat_firstclose_time AS fir_close_time,sat_secondopen_time AS sec_open_time,sat_secondclose_time AS sec_close_time';
    }elseif($day == 'Sunday'){
    //echo '7';
    $tday = 'sun_firstopen_time AS fir_open_time,sun_firstclose_time AS fir_close_time,sun_secondopen_time AS sec_open_time,sun_secondclose_time AS sec_close_time';
    }
    
    $sel_date = "SELECT ".$tday." FROM ".$CFG['table']['restaurant_timing']." WHERE restaurant_id = '".$resid."' ";
    $res_date = $this->ExecuteQuery($sel_date, "select");
    //echo $sel_date;
    //echo "<pre>";print_r($res_date);echo "</pre>";
    //echo $sel_date;
    if($res_date){
    
    $fstart = strtotime($res_date[0]['fir_open_time']);
    $fend   = strtotime($res_date[0]['fir_close_time']);
    $sstart = strtotime($res_date[0]['sec_open_time']);
    $send   = strtotime($res_date[0]['sec_close_time']);
    
    
    #currentdate calculation
    if($currentday == ($date)){
    $nowtime=time();
    $fstart = strtotime($res_date[0]['fir_open_time']);
    $actualtime =  date('H:i:A',$nowtime)."<br>";
    if($nowtime > $fstart){
    $fstart = $nowtime;
    }
    }
    
    for($i=$fstart;$i<$send;$i++){
    #interval values need to skip so use
    if( ($i >=$fend) && ($i <= $sstart ) ){
    continue;
    }
    //$i= ($i+60);
    $i= ($i+(5*59));
    //$content .="<option value=".date('H:i:A',$i)." ".$sel.">".date('g:i A',$i)."</option>\n";
    //$content .="<option value=".date('H:i:A',$i)." ".$sel."> ".date('g:i A',$i)."</option>\n";
    $content .="<option value=".date('H:i:A',$i)." ".$sel.">".$day.'  - '.date('g:i A',$i)."</option>\n";
    //$content .="<option value=".date('g:i',$i)." >".date('g:i A',$i)."</option>\n";
    }
    //echo $content;
    //return $content;
    $objSmarty->assign("times", $content);
    }
    }*/

    #---------------------------checkout page drop down changes
    /**
     * Site::checkdatePickerDate()
     * 
     * @return
     */
    function checkdatePickerDate($resid)
    {
        global $CFG;

        // $currentday = date('d-m-Y');
        $currentday = date('Y-m-d');

        if (isset($_POST['resid']) && !empty($_POST['resid']))
        {
            $resid = $_POST['resid'];
        }

        if (isset($_POST['date']) && !empty($_POST['date']))
        {
            $date = $_POST['date'];
            $day = date("D", strtotime($_POST['date']));
        } else
        {
            //$date = date('d-m-Y');
            $date = date('Y-m-d');
            $day = date("D", strtotime($date));
        }

        list($res_open_status, $sfirst_open_time, $sfirst_close_time, $ffirst_open_time, $ffirst_close_time, $fsec_open_time, $fsec_close_time, $ssec_open_time, $ssec_close_time) = $this->open_close_time_rest($resid);


        if (!empty($sfirst_open_time))
            $yy_sfirst_open_time = strtotime($sfirst_open_time);
        if (!empty($sfirst_close_time))
            $yy_sfirst_close_time = strtotime($sfirst_close_time);
        if (!empty($ffirst_open_time))
            $yy_ffirst_open_time = strtotime($ffirst_open_time);
        if (!empty($ffirst_close_time))
            $yy_ffirst_close_time = strtotime($ffirst_close_time);
        if (!empty($fsec_open_time))
            $yy_fsec_open_time = strtotime($fsec_open_time);
        if (!empty($fsec_close_time))
            $yy_fsec_close_time = strtotime($fsec_close_time);
        if (!empty($ssec_open_time))
            $yy_ssec_open_time = strtotime($ssec_open_time);
        if (!empty($ssec_close_time))
            $yy_ssec_close_time = strtotime($ssec_close_time);

        #Current date calculation
        if ($currentday == $date)
        {
            //echo "yes";
            $nowtime = time();
            //echo $nowtime."<br>";

            $minute = date("i");
            $modul = $minute % 5;

            if ($modul != 0)
            {
                //echo "<br />if aaaa==>".$minute;
                if ($modul == 1)
                    $minute = $minute + 4;
                if ($modul == 2)
                    $minute = $minute + 3;
                if ($modul == 3)
                    $minute = $minute + 2;
                if ($modul == 4)
                    $minute = $minute + 1;

                //echo "<br />else aaaa==>".$minute;
            }
            $nowtime = strtotime(date("h") . ":" . $minute . " ".date("A"));

            //echo "nowtime".$nowtime."<br>";

            if ($nowtime > $yy_sfirst_open_time)
            {
                $yy_sfirst_open_time = $nowtime;
            }
            if ($nowtime > $yy_ffirst_open_time)
            {
                $yy_ffirst_open_time = $nowtime;
            }
            if ($nowtime > $yy_fsec_open_time)
            {
                $yy_fsec_open_time = $nowtime;
            }
            if ($nowtime > $yy_ssec_open_time)
            {
                $yy_ssec_open_time = $nowtime;
            }
        }
        
        if (isset($yy_sfirst_open_time) && !empty($yy_sfirst_open_time) && isset($yy_sfirst_close_time) &&
            !empty($yy_sfirst_close_time))
        {
            //echo "yes1";
            for ($i = $yy_sfirst_open_time; $i <= $yy_sfirst_close_time; $i++)
            {
                //echo "1";
                $i = ($i + (15 * 60));
                #echo "<br />i=>".$i."--".date('g:i A',$i);
                if ($i > $yy_sfirst_close_time)
                    $i = $yy_sfirst_close_time;

                //$content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",$i) . '</option>' . "\n";
                $content[] = $day . '  -'.date("h:i A",$i);
            }
        }

        #Second Open time
        if (isset($yy_ffirst_open_time) && !empty($yy_ffirst_open_time) && isset($yy_ffirst_close_time) &&
            !empty($yy_ffirst_close_time))
        {
            //echo "yes2";
            for ($i = $yy_ffirst_open_time; $i <= $yy_ffirst_close_time; $i++)
            {
                //echo "2";
                $i = ($i + (15 * 60));
                if ($i > $yy_ffirst_close_time)
                    $i = $yy_ffirst_close_time;
                #echo "<br />i=>".$i."--".date('g:i A',$i);

                //$content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",$i) . '</option>' . "\n";
                $content[] = $day . '  -'.date("h:i A",$i);
            }
        }

        #Third Open time
        if (isset($yy_fsec_open_time) && !empty($yy_fsec_open_time) && isset($yy_fsec_close_time) &&
            !empty($yy_fsec_close_time))
        {
            //echo "yes3";
            for ($i = $yy_fsec_open_time; $i <= $yy_fsec_close_time; $i++)
            {
                //echo "3";
                //$i= ($i+(15*60));
                $i = $i + (15 * 60);
                if ($i > $yy_fsec_close_time)
                    $i = $yy_fsec_close_time;
                #echo "<br />i=>".$i."--".date('h:i A',$i)."=>".$i;

                //$content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",$i) . '</option>' . "\n";
                $content[] = $day . '  -'.date("h:i A",$i);
            }
        }

        #Fourth Open time
        if (isset($yy_ssec_open_time) && !empty($yy_ssec_open_time) && isset($yy_ssec_close_time) &&
            !empty($yy_ssec_close_time))
        {
            //echo "yes4";
            for ($i = $yy_ssec_open_time; $i <= $yy_ssec_close_time; $i++)
            {
                //echo "4";
                $i = ($i + (15 * 60));
                if ($i > $yy_ssec_close_time)
                    $i = $yy_ssec_close_time;
                #echo "<br />i=>".$i."--".date('g:i A',$i);

                //$content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",$i) . '</option>' . "\n";
                $content[] = $day . '  -'.date("h:i A",$i);
            }
        }
        //$objSmarty->assign("times", $content);
        return $content;

    }
    #Search Result
    /**
     * Site::open_close_time_rest()
     * 
     * @return
     */
    function open_close_time_rest($resid)
    {
        global $CFG, $objSmarty;

        $day = date("l");
        if ($day == "Monday")
        {
            $open_close_time_cond =
                " re.mon_firstopen_time AS open_time, re.mon_firstclose_time AS close_time, re.mon_secondopen_time AS secopen_time, re.mon_secondclose_time AS secclose_time, re.sun_firstopen_time AS first_pre_open_time, re.sun_firstclose_time AS first_pre_close_time, re.sun_secondopen_time AS sec_pre_open_time, re.sun_secondclose_time AS sec_pre_close_time ";
        } elseif ($day == "Tuesday")
        {
            $open_close_time_cond =
                " re.tue_firstopen_time AS open_time, re.tue_firstclose_time AS close_time, re.tue_secondopen_time AS secopen_time, re.tue_secondclose_time AS secclose_time, re.mon_firstopen_time AS first_pre_open_time, re.mon_firstclose_time AS first_pre_close_time, re.mon_secondopen_time AS sec_pre_open_time, re.mon_secondclose_time AS sec_pre_close_time ";
        } elseif ($day == "Wednesday")
        {
            $open_close_time_cond =
                " re.wed_firstopen_time AS open_time, re.wed_firstclose_time AS close_time, re.wed_secondopen_time AS secopen_time, re.wed_secondclose_time AS secclose_time, re.tue_firstopen_time AS first_pre_open_time, re.tue_firstclose_time AS first_pre_close_time, re.tue_secondopen_time AS sec_pre_open_time, re.tue_secondclose_time AS sec_pre_close_time ";
        } elseif ($day == "Thursday")
        {
            $open_close_time_cond =
                " re.thu_firstopen_time AS open_time, re.thu_firstclose_time AS close_time, re.thu_secondopen_time AS secopen_time, re.thu_secondclose_time AS secclose_time, re.wed_firstopen_time AS first_pre_open_time, re.wed_firstclose_time AS first_pre_close_time, re.wed_secondopen_time AS sec_pre_open_time, re.wed_secondclose_time AS sec_pre_close_time ";
        } elseif ($day == "Friday")
        {
            $open_close_time_cond =
                " re.fri_firstopen_time AS open_time, re.fri_firstclose_time AS close_time, re.fri_secondopen_time AS secopen_time, re.fri_secondclose_time AS secclose_time, re.thu_firstopen_time AS first_pre_open_time, re.thu_firstclose_time AS first_pre_close_time, re.thu_secondopen_time AS sec_pre_open_time, re.thu_secondclose_time AS sec_pre_close_time ";
        } elseif ($day == "Saturday")
        {
            $open_close_time_cond =
                " re.sat_firstopen_time AS open_time, re.sat_firstclose_time AS close_time, re.sat_secondopen_time AS secopen_time, re.sat_secondclose_time AS secclose_time, re.fri_firstopen_time AS first_pre_open_time, re.fri_firstclose_time AS first_pre_close_time, re.fri_secondopen_time AS sec_pre_open_time, re.fri_secondclose_time AS sec_pre_close_time ";
        } elseif ($day == "Sunday")
        {
            $open_close_time_cond =
                " re.sun_firstopen_time AS open_time, re.sun_firstclose_time AS close_time, re.sun_secondopen_time AS secopen_time, re.sun_secondclose_time AS secclose_time, re.sat_firstopen_time AS first_pre_open_time, re.sat_firstclose_time AS first_pre_close_time, re.sat_secondopen_time AS sec_pre_open_time, re.sat_secondclose_time AS sec_pre_close_time ";
        }

        $sqlsel = "SELECT rest.restaurant_id, restaurant_status, " . $open_close_time_cond .
            "	FROM " . $CFG['table']['restaurant'] . " AS rest " . " LEFT JOIN " . $CFG['table']['restaurant_timing'] .
            " AS re ON rest.restaurant_id = re.restaurant_id " .
            "	WHERE rest.restaurant_id = '" . $resid . "' ";
        //echo "<br>".$sqlsel;
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        //echo "<pre>";print_r($sqlres);echo "</pre>";

        //Open & Close Time Srart---------------------------------
        //First Time---------------------------------
        $rrr_opentime = $sqlres['0']['open_time'];
        $rrr_closetime = $sqlres['0']['close_time'];

        //Previous day
        $rrr_opentime_pre = $sqlres['0']['first_pre_open_time'];
        $rrr_closetime_pre = $sqlres['0']['first_pre_close_time'];

        //Second Time---------------------------------
        $sec_rrr_opentime = $sqlres['0']['secopen_time'];
        $sec_rrr_closetime = $sqlres['0']['secclose_time'];

        //Previous day
        $sec_rrr_opentime_pre = $sqlres['0']['sec_pre_open_time'];
        $sec_rrr_closetime_pre = $sqlres['0']['sec_pre_close_time'];
        //echo "<br>hhhhh=>".$sec_rrr_closetime_pre;

        #Delivery
        #echo "<br>First-----------------------------------------------------------";
        list($sqlres['0']['first_status'], $sqlres['0']['ffirst_open_time'], $sqlres['0']['ffirst_close_time'],
            $sqlres['0']['fsec_open_time'], $sqlres['0']['fsec_close_time']) = $this->
            openandcloseDelivery($rrr_opentime, $rrr_closetime, $rrr_opentime_pre, $rrr_closetime_pre);
        //echo "<pre>";print_r($sqlres);echo "</pre>";exit;
        #echo "<br>Second-----------------------------------------------------------";
        list($sqlres['0']['second_status'], $sqlres['0']['sfirst_open_time'], $sqlres['0']['sfirst_close_time'],
            $sqlres['0']['ssec_open_time'], $sqlres['0']['ssec_close_time']) = $this->
            openandcloseDelivery($sec_rrr_opentime, $sec_rrr_closetime, $sec_rrr_opentime_pre,
            $sec_rrr_closetime_pre);

        if ($sqlres['0']['first_status'] == 'Open' || $sqlres['0']['second_status'] ==
            'Open')
        {
            $sqlres['0']['status'] = 'Open';
        } else
        {
            $sqlres['0']['status'] = 'Closed';
        }

        //$objSmarty->assign("rest_timing_status", $sqlres['0']['status']);

        //echo "<pre>";print_r($sqlres);echo "</pre>";

        return array(
            $sqlres['0']['status'],
            $sqlres['0']['sfirst_open_time'],
            $sqlres['0']['sfirst_close_time'],
            $sqlres['0']['ffirst_open_time'],
            $sqlres['0']['ffirst_close_time'],
            $sqlres['0']['fsec_open_time'],
            $sqlres['0']['fsec_close_time'],
            $sqlres['0']['ssec_open_time'],
            $sqlres['0']['ssec_close_time']);
    }

    #openandcloseDelivery
    /**
     * Site::openandcloseDelivery()
     * 
     * @return
     */
    function openandcloseDelivery($rrr_opentime, $rrr_closetime, $rrr_opentime_pre =
        '', $rrr_closetime_pre = '')
    {
        $rrr_nowtime = date("h:i A");
        $dec_rrr_nowtime = strtotime($rrr_nowtime);

        //echo "now".$rrr_nowtime."<br>";
        //exit ;
        if (isset($rrr_opentime) && !empty($rrr_opentime))
            $dec_rrr_opentime = strtotime($rrr_opentime);
        if (isset($rrr_closetime) && !empty($rrr_closetime))
            $dec_rrr_closetime = strtotime($rrr_closetime);
        if (isset($rrr_opentime_pre) && !empty($rrr_opentime_pre))
            $dec_rrr_opentime_pre = strtotime($rrr_opentime_pre);
        if (isset($rrr_closetime_pre) && !empty($rrr_closetime_pre))
            $dec_rrr_closetime_pre = strtotime($rrr_closetime_pre);


        #echo "<br />Previous day start---------------------------------------------------------------";
        //Previous Day
        if (!empty($dec_rrr_opentime_pre) && !empty($dec_rrr_closetime_pre))
        {
            //2day
            if ($dec_rrr_opentime_pre > $dec_rrr_closetime_pre)
            {
                //echo "<br />99999999999999999";
                //For Delivery Hours
                $first_open_time = strtotime("12:00 AM");
                $first_close_time = $dec_rrr_closetime_pre;

                #Time status
                if (($dec_rrr_nowtime > $first_open_time) && ($first_close_time > $dec_rrr_nowtime))
                {
                    $first_openclosetype = "Open";
                } else
                {
                    $first_openclosetype = "Closed";
                }
                //echo $first_openclosetype;
            }
        }

        //Current Day
        if (!empty($dec_rrr_opentime) && !empty($dec_rrr_closetime))
        {
            //echo "yes";

            if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
            {
                #echo "<br />11111111111111111";
                $sec_openclosetype = "Open";

                //For Delivery Hours
                $sec_open_time = $dec_rrr_opentime;
                $sec_close_time = $dec_rrr_closetime;

            } //2day
            elseif ($dec_rrr_opentime > $dec_rrr_closetime)
            {
                #echo "<br />333333333333333";
                //For Delivery Hours
                $sec_open_time = $dec_rrr_opentime;
                $sec_close_time = strtotime("11:59 PM");

                #Time status
                if (($dec_rrr_nowtime > $sec_open_time) && ($sec_close_time > $dec_rrr_nowtime))
                {
                    $sec_openclosetype = "Open";
                } else
                {
                    $sec_openclosetype = "Closed";
                }
            } else
            {
                #echo "<br />4444444444444444";
                #echo "<br>Come here - current day????????????????????????????????";
                $sec_open_time = $dec_rrr_opentime;
                $sec_close_time = $dec_rrr_closetime;
                $sec_openclosetype = "Closed";
            }

        }
        #echo "<br />Current day end---------------------------------------------------------------";

        #open closetype
        if ($first_openclosetype == 'Open' || $sec_openclosetype == 'Open')
        {
            $openclosetype = 'Open';
        } 
        else
        {
            $openclosetype = 'Closed';
        }

        if (isset($first_open_time) && !empty($first_open_time))
            $ffirst_open_time = date("h:i A", $first_open_time);
        if (isset($first_close_time) && !empty($first_close_time))
            $ffirst_close_time = date("h:i A", $first_close_time);
        if (isset($sec_open_time) && !empty($sec_open_time))
            $fsec_open_time = date("h:i A", $sec_open_time);
        if (isset($sec_close_time) && !empty($sec_close_time))
            $fsec_close_time = date("h:i A", $sec_close_time);

        return array(
            $openclosetype,
            $ffirst_open_time,
            $ffirst_close_time,
            $fsec_open_time,
            $fsec_close_time);
    }
    #----------------------------------------------------------------------------------
    #End Ideal Payment
    #----------------------------------------------------------------------------------

    #=====================================================================================
    #                               captchaCode Generation
    #=====================================================================================
    /**
     * Site::captchaCode()
     * 
     * @return
     */
    function captchaCode()
    {
        $RandomStr = md5(microtime()); // md5 to generate the random string
        $ResultStr = substr($RandomStr, 0, 5); //trim 5 digit

        return $ResultStr;
    }
    
    /**
     * Start respose functions (Not common functions)
     */
    #----------------------------------------------------------------------------------------------
    #                                   Add To Cart
    #----------------------------------------------------------------------------------------------
	#Menu Details In POP UP
    function menuDetails($menuid){
		global $CFG;
		
		$sel_menu_det = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_price, menu_addons, menu_description, menu_spl_instruction, sizeoption, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM ".$CFG['table']['restaurant_menu']." WHERE id = '".$menuid."' AND status = '1' ";
		$res_menu_det = $this->ExecuteQuery($sel_menu_det, "select");
        
        $getcategory = $this->getMultiValue("maincatename, maincat_option",$CFG['table']['category_main'],"maincateid = '".$res_menu_det[0]['menu_category']."' AND status = '1'");
        $res_menu_det[0]['category']           = $getcategory[0]['maincatename'];
        $res_menu_det[0]['category_option']    = $getcategory[0]['maincat_option'];
		
        return $res_menu_det;
	}
    #----------------------------------------------------------------------------------------------
    function menuAddonsList($menuaddonsid, $catid, $resid, $menu_categoryoption)
    {
        global $CFG;

        if ($menu_categoryoption == 'pizza')
        {
            $catcond .= " menu_catoption = '" . $menu_categoryoption .
                "' AND menuaddons_categoryid = '" . $catid . "' AND menuaddons_restaurantid = '" .
                $resid . "' AND menuaddons_menuid = '" . $menuaddonsid . "' ";
        } else
        {
            $catcond .= " menu_catoption = '" . $menu_categoryoption .
                "' AND menuaddons_categoryid = '" . $catid . "' AND menuaddons_restaurantid = '" .
                $resid . "' AND menuaddons_menuid = '" . $menuaddonsid . "' ";
        }

        $sel = "SELECT menuaddons_id, addonparentid, menuaddons_restaurantid, menuaddons_categoryid, menuaddons_menuid, menuaddons_addonsname, menuaddons_priceoption, menuaddons_price, menu_catoption FROM " .
            $CFG['table']['restaurant_menuaddons'] . " WHERE  " . $catcond .
            " AND menuaddons_addonsname != ''  GROUP BY addonparentid ";
        $res = $this->ExecuteQuery($sel, "select");
//echo $sel;
        foreach ($res as $key => $value)
        {
            $res[$key]['mainaddonsname'] = $this->getValue("addonsname", $CFG['table']['restaurant_addons'], "id = '" . $res[$key]['addonparentid'] . "'");
            $res[$key]['mainaddonsnamecnt'] = $this->getValue("addonscount", $CFG['table']['restaurant_addons'],"id = '" . $res[$key]['addonparentid'] . "'");
            $res[$key]['mainaddonstype'] = $this->getValue("addons_option", $CFG['table']['restaurant_addons'],"id = '" . $res[$key]['addonparentid'] . "'");
            $res[$key]['mainaddonspriceoption'] = $this->getValue("addonspriceoption", $CFG['table']['restaurant_addons'],"id = '" . $res[$key]['addonparentid'] . "'");
        }
        //print_r ($res);
        //die();
        return $res;
        
    }
    #----------------------------------------------------------------------------------------------------------
    #Menu Sub Addons List
    function menuSubAddonsList($pid, $mid, $catid, $menuaddons_addonsname, $menu_categoryoption, $resid)
    {
        global $CFG;

        if ($menu_categoryoption == 'pizza')
        {
            $catcond .= " AND 	menu_catoption = '" . $menu_categoryoption .
                "' AND menuaddons_categoryid = '" . $catid . "' AND menuaddons_restaurantid = '" . $resid . "' ";
        } else
        {
            $catcond .= " AND 	menu_catoption = '" . $menu_categoryoption .
                "' AND menuaddons_categoryid = '" . $catid . "' AND menuaddons_restaurantid = '" . $resid . "' ";
        }

        $sel = "SELECT menuaddons_id, addonparentid, menuaddons_restaurantid, menuaddons_menuid, menuaddons_addonsname, menuaddons_priceoption, menuaddons_price, menuaddons_categoryid, menuaddons_price_slice, menuaddons_price_medium, menuaddons_price_large FROM " . $CFG['table']['restaurant_menuaddons'] . " WHERE addonparentid = '" . $pid . "' " .$catcond . " AND menuaddons_menuid = '" . $mid . "' GROUP BY menuaddons_addonsname";
        $res = $this->ExecuteQuery($sel, "select");
        foreach ($res as $key => $value)
        {
            $res[$key]['subaddonsname'] = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],"id = '" . $res[$key]['menuaddons_addonsname'] . "' ");
        }
        return $res;
    }
    #-------------------------------------------------------------------------------
    #                           End Of Add To Cart
    #-------------------------------------------------------------------------------
    #Customer's Address Book List
    function addressbooklist($cusid){
        global $CFG;
        
        if($cusid != ''){
            $sel_add = "SELECT ca.id, ca.customer_id, ca.customer_apartment_name, ca.customer_landmark, ca.customer_street, ca.customer_address_title, ca.customer_zip, ca.customer_landline, ca.customer_address_label, ca.status, ca.added_date, cty.cityname AS customer_city, ca.customer_longitude AS customer_longitude, ca.customer_latitude AS customer_latitude, st.statename AS customer_state
                            FROM 
                                    " . $CFG['table']['customer_addressbook'] . " AS ca ".
                                    " LEFT JOIN " . $CFG['table']['city'] . " AS cty ON cty.city_id = ca.customer_city ".
                                    " LEFT JOIN " . $CFG['table']['state'] . " AS st ON st.statecode = ca.customer_state AND st.state_status = '1'".
                                    " WHERE customer_id = '".$cusid."' AND status != '0'"; 
            $res_add = $this->ExecuteQuery($sel_add, "select");
            #echo"<pre>";print_r($res_add);echo"</pre>";
            return $res_add;
        }
    }
    #Change Status
    function change_status($table, $field, $value, $condition){
        global $CFG;
        if($table != ''){
            $up_status  = "UPDATE 
                                ".$table."
                            SET
                                ".$field." = '".$value."'
                            WHERE
                                ".$condition."";
            $res_up_sta = $this->ExecuteQuery($up_status,'update');
            return $res_up_sta;
        }
    }
    #Delete Records Using Table Name And Condition
    function delete_record($table, $condition){
        global $CFG;
        if($table != ''){
            $del_rec    = "DELETE FROM ".$table." WHERE ".$condition."";
            $res_rec    = $this->ExecuteQuery($del_rec,'delete');
            return $res_rec;
        }
    }
	#Response particular address
	function single_address($addid){	
		global $CFG;
		if($addid != ''){
			$sel_add = "SELECT id, customer_id, customer_apartment_name, customer_landmark, customer_street, customer_address_title, customer_state, customer_city, customer_zip, customer_landline, customer_address_label, status, added_date
                            FROM 
                                    " . $CFG['table']['customer_addressbook'] . "
                            WHERE
                                    id = '".$addid."'";
            $result_add = $this->ExecuteQuery($sel_add, "select");	
            $result_add[0]['state']  = $this->getValue("statename",$CFG['table']['state'],"statecode = '".$result_add[0]['customer_state']."' AND state_status = '1'");
            $result_add[0]['city']   = $this->getValue("cityname",$CFG['table']['city'],"city_id = '".$result_add[0]['customer_city']."'");
            return $result_add;
		}
	}
    #Function for read file
    function readfile_content($file){
    	if ( ! file_exists($file))
    		{
    			return FALSE;
    		}
    
    	if (function_exists('file_get_contents'))
    		{
    			return file_get_contents($file);
    		}
    
    	if ( ! $fp = @fopen($file, 'rb'))
    		{
    			return FALSE;
    		}
    
    	flock($fp, LOCK_SH);
    
    	$data = '';
    	if (filesize($file) > 0)
    		{
    			$data =& fread($fp, filesize($file));
    		}
    
    	flock($fp, LOCK_UN);
    	fclose($fp);
    
    	return $data;
    }
    #---------------------------------------------------------------------------------------
    #Add Items To Cart Table
    function AddToCart(){
        global $CFG;
        $sessionid   = session_id();
        $cartdetails = json_decode($_REQUEST['cartdetails'],true);
        //echo "<pre>"; print_r($cartdetails[0]['menu_id']); echo "</pre>"; die();
        if(is_array($cartdetails)){
            foreach($cartdetails as $key=>$value){
                $ins_cart = "INSERT INTO 
    								" . $CFG['table']['restaurant_cart'] . " 
    							SET 
    								menuid 			   = '" . $cartdetails[$key]['menu_id'] . "', 
    								restaurantid 	   = '" . $cartdetails[$key]['res_id'] . "', 
    								menuname 		   = '" . $this->My_addslashes($cartdetails[$key]['menu_name']) . "',
    								addonsname 		   = '" . mysql_real_escape_string(addslashes($cartdetails[$key]['Addon_name'])) . "',
    								addonsprice		   = '" . $cartdetails[$key]['Addon_price'] . "',
    								menutype 		   = '" . $cartdetails[$key]['menu_type'] . "',  
    								menuprice 		   = '" . $cartdetails[$key]['Menu_price'] . "', 
    								quantity		   = '" . $cartdetails[$key]['quantity'] . "',
    								pizza_size		   = '" . mysql_real_escape_string($cartdetails[$key]['menu_size']) . "',
    								specialinstruction = '" . $cartdetails[$key]['instruction'] . "', 
    								tot_menuprice      = '" . $cartdetails[$key]['Total'] . "', 
    								sessionid 		   = '" . $sessionid . "',
    								addeddate 		   = '" . CUR_TIME . "' ";
                $res_cart = $this->ExecuteQuery($ins_cart, "insert");
            }
        }
    }
    #---------------------------------------------------------------------------------------
	#Submit Order
	function restaurantOrder(){
		global $CFG;
		
		$resid = $_REQUEST['resid'];
		
		//Delivery Address
		$contactname 		= $this->My_addslashes($_POST['contactname']);
		$contactlastname	= $this->My_addslashes($_POST['contactlastname']);
		$contactemail 		= $this->My_addslashes($_POST['contactemail']);
		$contactpassword 	= $this->My_addslashes($_POST['contactpassword']);
		$contactphone 	   	= $this->My_addslashes($_POST['contactphone']);
		//$contactlandline 	= $this->My_addslashes($_POST['contactlandline']);
		$deliveryaddress 	= $this->My_addslashes($_POST['deliveryapt']);
		$deliverystreet 	= $this->My_addslashes($_POST['deliverystreet']);
		$deliverylandmark 	= $this->My_addslashes($_POST['deliverylandmark']);
		$deliveryarea 		= $this->My_addslashes($_POST['deliveryarea']);
		$deliverycity 		= $this->getValue("city_id",$CFG['table']['city'],"cityname = '".$this->My_addslashes($_POST['deliverycity'])."'");
		$deliverystate 		= $this->getValue("statecode",$CFG['table']['state'],"statename = '".$this->My_addslashes($_POST['deliverystate'])."'");
		$deliveryzip 		= $this->My_addslashes($_POST['deliveryzip']);
		$deliveryassoonas 	= $this->My_addslashes($_POST['foodassoonas']); 
		
		$ordertotalprice 	= $this->My_addslashes($_POST['ordertotalprice']);
		$instructions 		= $this->My_addslashes($_POST['instructions']);
		$deliverypickup 	= $this->My_addslashes($_POST['deliverypickup']);
		$paymentmethod 	    = $this->My_addslashes($_POST['paymentinfo']);
        $transaction_id     = $this->My_addslashes($_POST['transaction_id']);
		
		if($deliveryassoonas == '1' ){
			
			$datedelivery 	= date("d-m-Y");
			$deliverytime 	= 'ASAP';
			
		}else{
			
			$datedelivery 	= $this->My_addslashes($_POST['datedelivery']);
            $deliverytime   = $this->My_addslashes($_POST['time_delivery']);
		}
		
		$taxpercentage = $this->getValue("restaurant_salestax",$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
		//COD-----------------------------------------
		//if($paymentmethod == 'cod'){
			
			if( isset($_REQUEST['customerid']) && !empty($_REQUEST['customerid']) ){
				//Customer
				$lastins_cusid = $_REQUEST['customerid'];
                $totaddress = $this->getNumvalues($CFG['table']['customer_addressbook'],"customer_id = '" . $lastins_cusid . "'");
                if ((isset($_REQUEST['deliveryaddresstitle']) && $_REQUEST['deliveryaddresstitle'] == 'Other') || ($totaddress == '0')){
    
                    $ins_other_add = "INSERT INTO 
    													" . $CFG['table']['customer_addressbook'] . " 
    												SET
    													customer_id 			= '" . $lastins_cusid . "',
    													customer_apartment_name	= '" . $_REQUEST['deliveryapt'] . "',
    													customer_street			= '" . $_REQUEST['deliverystreet'] . "',
    													customer_address_title	= '" . $_REQUEST['otheraddresstitle'] . "',
    													customer_state			= '" . $deliverystate . "',
    													customer_city			= '" . $deliverycity . "',
    													customer_zip			= '" . $_REQUEST['deliveryzip'] . "',
                                                        added_date              = '" . CUR_TIME. "'";
                    $this->ExecuteQuery($ins_other_add, 'insert');
                }
			}else{
            //Guest
            if ($contactpassword != '')
            {
                $cntemail = $this->getNumvalues($CFG['table']['customer'], "customer_email = '" . $contactemail . "' AND customer_id != '' ");
                if ($cntemail == '0')
                {

                    $sel        = "SELECT * FROM " . $CFG['table']['customer'] . " WHERE customer_id != '' ";
                    $res        = $this->ExecuteQuery($sel, 'select');
                    $num_visit  = count($res);
                    $num_visits = $num_visit + 1;
                    $sessionid  = session_id();

                    $cuspass = $this->encrypt_password_md5($contactpassword);

                    if (isset($_REQUEST['customer_news']) && !empty($_REQUEST['customer_news']))
                    {
                        $newsletter = $_REQUEST['customer_news'];
                    } else
                    {
                        $newsletter = 'No';
                    }

                    $ins_cus = "INSERT INTO 
										  " . $CFG['table']['customer'] . "
										SET
										   customer_name 		= '" . $contactname . "',
										   customer_lastname	= '" . $contactlastname . "',
										   customer_buildtype 	= '" . $deliveryaddress . "',
										   customer_street 		= '" . $deliverystreet . "',
										   customer_city 		= '" . $deliverycity . "',
										   customer_state 		= '" . $deliverystate . "',
										   customer_zip 		= '" . $deliveryzip . "',
										   customer_area 		= '" . $deliveryarea . "',
										   customer_phone 		= '" . $contactphone . "',
										   customer_email 		= '" . $contactemail . "',
										   customer_password 	= '" . $cuspass . "',
										   newsletter			= '" . $newsletter . "',
										   addeddate 			= '" . CUR_TIME . "',
										   last_logged 			= '" . CUR_TIME . "',
										   num_visits  			= '" . $num_visits . "', 
										   logged_in   			= '0',
										   last_active 			= '" . CUR_TIME . "', 
										   ip          			= '" . $_SERVER['REMOTE_ADDR'] . "',
										   session     			= '" . $sessionid . "' ";
                    $lastins_cusid = $this->ExecuteQuery($ins_cus, "insert");
                    if ($lastins_cusid)
                    {

                        $ins_guest_add = "INSERT INTO 
													" . $CFG['table']['customer_addressbook'] . " 
												SET
													customer_id 			= '" . $lastins_cusid . "',
													customer_apartment_name	= '" . $_REQUEST['deliveryapt'] . "',
													customer_street			= '" . $_REQUEST['deliverystreet'] . "',
													customer_address_title	= '" . $_REQUEST['otheraddresstitle'] . "',
													customer_state			= '" . $deliverystate . "',
													customer_city			= '" . $deliverycity . "',
													customer_zip			= '" . $_REQUEST['deliveryzip'] . "',
                                                    added_date              = '" . CUR_TIME. "'";
                        $this->ExecuteQuery($ins_guest_add, 'insert');

                        $toemail = $contactemail;
                        $active_link = $CFG['site']['main_base_url'] . "/customerLogin.php?ui=" . base64_encode($toemail);

                        $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " Customer Register";
                        $mail_content = $this->readfilecontent($CFG['site']['email_path'] . "/emailCustomerRegister.html");
                        $mail_content = str_replace('{SITE_URL}', $CFG['site']['main_base_url'], $mail_content);
                        $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                        $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                        $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                        $mail_content = str_replace('{CUSTOMER_EMAIL}', $contactemail, $mail_content);
                        $mail_content = str_replace('{CUSTOMER_PASSWORD}', $contactpassword, $mail_content);
                        $mail_content = str_replace('{ACTIVATION_LINK}', $active_link, $mail_content);

                        $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    }
                } else
                {
                    $lastins_cusid = 'already';
                }
                }
			}
			if($lastins_cusid != 'already'){
			
				if( isset($_REQUEST['customerid']) && !empty($_REQUEST['customerid']) ){
					$usertype  = 'C';
				}else{
					$usertype  = 'G';
				}
				
				if($paymentmethod == 'creditcard' || $paymentmethod == 'paypal'){
				    if($transaction_id != ''){
				        $paypalstatus = 'success';
                        $pay_status   = 'P';
				    }else{
				        $paypalstatus = 'failed';
                        $pay_status   = 'NP';
				    }
					
				}elseif($paymentmethod == 'cod'){
					$paypalstatus = 'success';
                    $pay_status   = 'NP';
				}else{
					$paypalstatus = 'failed';
                    $pay_status   = 'NP';
				}
				
				$ins_order = "INSERT INTO 
									".$CFG['table']['order']."
								 SET
								 	restaurant_id       = '".$resid."',
								 	customer_id         = '".$lastins_cusid."',
									usertype		 	= '".$usertype."',
									customername 		= '".$contactname."',
									customerlastname 	= '".$contactlastname."',
									customeremail 		= '".$contactemail."',
									customerpassword 	= '".$contactpassword."',
									customercellphone 	= '".$contactphone."',
									deliverydoornumber  = '".$deliveryaddress."',
									deliverystreet 		= '".$deliverystreet."',
									deliveryarea 		= '".$deliveryarea."',
									deliverycity 		= '".$deliverycity."',
									deliverystate 		= '".$deliverystate."',
									deliveryzip 		= '".$deliveryzip."',
									deliverytype 		= '".$deliverypickup."',
									deliverylandmark 	= '".$deliverylandmark."',
									foodassoonas 		= '".$deliveryassoonas."',
									deliverydate 	 	= '".$datedelivery."',
									deliverytime 		= '".$deliverytime."',
									instructions 		= '".$instructions."',
									offervalue          = '".$_REQUEST['offer_percentage']."',
									offeramount	        = '".$_REQUEST['offer_amount']."',
									ordersubtotal 		= '".$_REQUEST['subtotal']."',
									taxvalue			= '".$taxpercentage."',
                                    taxamount           = '".$_REQUEST['taxamount']."',
                                    deliveryamount      = '".$_REQUEST['deliveryamount']."',
									ordertotalprice 	= '".$ordertotalprice."',
									payment_type 	    = '".$paymentmethod."',
									paypal_status		= '".$paypalstatus."',
                                    payment_status      = '".$pay_status."',
                                    transaction_id      = '".$transaction_id."',
									orderdate         	= '".CUR_TIME."' ";
				$lastinsertid = $this->ExecuteQuery($ins_order, "insert");
					
				if(!empty($lastinsertid) && ($lastinsertid > 0)){
				 			
			 		#Customer Id Generation
					$ordergenid = $this->generateId($lastinsertid);
					$finalorderid = "ORD".$ordergenid;
					$this->getUpdate($CFG['table']['order'],"ordergenerateid='".$finalorderid."'","orderid='".$lastinsertid."'");
					
					//$sql_upd = "UPDATE ".$CFG['table']['restaurant_cart']." SET orderid = '".$lastinsertid."' WHERE sessionid = '".session_id()."' AND restaurantid = '".$resid."'";
					$sql_upd = "UPDATE ".$CFG['table']['restaurant_cart']." SET orderid = '".$lastinsertid."' WHERE sessionid = '".session_id()."' AND restaurantid = '0'";
					
					$res_upd = $this->ExecuteQuery($sql_upd, "update");
                    
                    #Insert GCM Registration Id
                    if(!empty($_REQUEST['gcm_regid'])){
                        $gcm_ins    = "INSERT INTO 
                                                    ".$CFG['table']['gcm']." 
                                                SET
                                                    userid          = '".$lastins_cusid."',
                                                    restaurant_id   = '".$resid."',
                                                    order_id        = '".$lastinsertid."',
                                                    gcm_register_id = '".trim($_REQUEST['gcm_regid'])."',
                                                    addeddate       = '".CUR_TIME."'";
                        $this->ExecuteQuery($gcm_ins, "insert");
                    }
                    
                    $ResName = $this->getValue("restaurant_name", $CFG['table']['restaurant'], "restaurant_id = '".$resid."'");
                    $Result = $this->getMultiValue("gcm_register_id, status", $CFG['table']['owner_gcm'], "restaurant_id   = '".$resid."' AND status = '1'");
					
                    if (is_array($Result)) {
                        foreach($Result as $key=>$val){
                            $Result1 = $this->sendGCMnotification('pending',trim($Result[$key]['gcm_register_id']),trim($finalorderid),trim(stripslashes($ResName)));
                            
                        }
                    }
                    
                    
					
					if($paymentmethod == 'cod' || $paymentmethod == 'creditcard' || $paymentmethod == 'paypal'){
						
						#Send Mail Satrt----------------------------------	
						$orderId = $lastinsertid;
						list($mail_content,$rest_cont_email) = $this->checkoutMailContent($resid,$orderId,$finalorderid);
						
						//Send Mail to Customer
						$toemail  	= $contactemail;
						$mailsubject= $CFG['site']['sitename'] ." Order : ".$finalorderid;
						
						$ok = $this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content);
				        if($ok){
				        
					        //Send mail to Admin
					        $toemail  	= $CFG['site']['adminemail'];
					        $mailsubject= $CFG['site']['sitename'] ." Order : ".$finalorderid;
					        $ok_mail 	= $this->sendMail($restaurant_name,$contactemail,$toemail,$mailsubject,$mail_content);
					        
					        	
							if($ok_mail){
								
								//Send mail to Restaurant Owner
						        $toemail  	= $rest_cont_email;
						        $mailsubject= $CFG['site']['sitename'] ." Order : ".$finalorderid;
						        $ok_mail 	= $this->sendMail($contactname,$contactemail,$toemail,$mailsubject,$mail_content);
							}
						}
						#Send Mail End----------------------------------
						
						//COD
						session_regenerate_id();
						
					}//end for cod
				}
				return $finalorderid;
				//return $lastinsertid;
			}else{
			 return 'Already';
			}
	}
    #Checkout Mail Content
    function checkoutMailContent($resid,$orderId,$finalorderid){
		global $CFG,$objSmarty;
		
			$sessionId = session_id();
		
				$restDetails	= $this->GetMultivalue("restaurant_name, restaurant_phone, restaurant_salestax, restaurant_delivery, restaurant_delivery_charge, restaurant_minorder_price,restaurant_contact_email, restaurant_fax",$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
				$restaurantmail = $restDetails[0]['restaurant_contact_email'];
					
				$restofferdetails = $this->GetMultivalue("offer_id, offer_percentage, offer_price, offer_valid_from, offer_valid_to, status",$CFG['table']['restaurant_offer'],"restaurant_id = '".$resid."'");
				
				$sel_order = "SELECT ordergenerateid, restaurant_id, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverylandmark, deliveryarea, deliverycity, deliveryzip, deliverytype, ordertotalprice, offervalue, foodassoonas, deliverydate, deliverytime, status, orderdate, payment_type, deliveryamount, taxvalue, taxamount, offeramount, tipamount, ordersubtotal FROM ".$CFG['table']['order']." WHERE orderid = '".$orderId."' ";
				$res_order = $this->ExecuteQuery($sel_order,'select');
				$deliveryarea = $res_order[0]['deliveryarea'];
				$deliverycity  = $this->getValue("cityname",$CFG['table']['city'],"city_id='".$res_order[0]['deliverycity']."'");
				$deliveryzip   = $res_order[0]['deliveryzip'];
				if($res_order['0']['deliverytype'] != 'pickup'){
                    $deliverychargeamt = $res_order['0']['deliveryamount'];
					$deliverycharge .= 	'<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Delivery Charge:</span>
															<span style="width:45%;display:inline-block;text-align: right;">'.$CFG['site']['currency'].''.$deliverychargeamt.'</span>
														</div>';	
														
					$delivery_pickuptype	=	'<div style="font-family:Arial; font-size:40px; font-weight:bold; color:#222; border-top:2px solid #ccc; padding-top:10px; margin-top:20px;">'.$res_order['0']['deliverytime'].' '.ucfirst($res_order['0']['deliverytype']).'<img src="'.$CFG['site']['image_url'].'/mail_delivery.png" alt="" title="" style="margin-left:10px;" /></div>';
					
					$deliverydate = ''.$res_order['0']['deliverytime'].' on '.date("M d, Y",strtotime($res_order['0']['deliverydate'])).'';		
				}
				if($res_order['0']['deliverytype'] == 'pickup'){
    				$delivery_pickuptype	=	'<div style="font-family:Arial; font-size:40px; font-weight:bold; color:#222; border-top:2px solid #ccc; padding-top:10px; margin-top:20px;">Cash on Collection<img src="'.$CFG['site']['image_url'].'/mail_pickup.png" alt="" title="" style="margin-left:10px;" /></div>';
    				$deliverydate = '';
    			}
					
				$sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype,addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice, pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price FROM ".$CFG['table']['restaurant_cart']." WHERE sessionid = '".$sessionId."' AND quantity != '0' AND orderid = '".$orderId."' ";
				$res_cart = $this->ExecuteQuery($sel_cart, "select");
					
				if(count($res_cart) > 0){
					foreach($res_cart as $key=>$value){
						
						$rowTotal[]= $res_cart[$key]['tot_menuprice'];
						$menuname  = $res_cart[$key]['menuname'];
						$menuprice = $res_cart[$key]['menuprice'];
						$tot_menuprice = $res_cart[$key]['tot_menuprice'];
						$quantity  = $res_cart[$key]['quantity'];
						$addonsname  = '';
						$addonsprice = '';
						$crustname   = '';
						$topping = '';
						$instruction = '';
						
						if($res_cart[$key]['addonsname'] != ''){
							$addonsname  = '<br> <b>Addons:</b>' .$res_cart[$key]['addonsname'];
							$addonsprice = '('.$res_cart[$key]['addonsprice'].' '.'Extra'.')';
						}
						if($res_cart[$key]['pizza_crustname'] != ''){
							$crustname = '<br> <b>Crust:</b>'.$res_cart[$key]['pizza_crustname'];
						}
						if($res_cart[$key]['pizza_addonsname'] != ''){
							$topping = '<br> <b>Topping:</b>'.$res_cart[$key]['pizza_addonsname'];
						}
						if($res_cart[$key]['specialinstruction'] != ''){
							$instruction = '<br> <b>Instruction:</b>'.$res_cart[$key]['specialinstruction'];
						}
						
						$menudetails .= '<tr>
											<td align="left" style="height:35px;border-bottom:1px solid #CCC;">'.html_entity_decode($menuname).' '.$addonsname.' '.$crustname.' '.$topping.' '.$instruction.' </td>
											<td align="center" style="height:35px;border-bottom:1px solid #CCC;">'.$quantity.'</td>
											<td align="left" style="height:35px;border-bottom:1px solid #CCC; text-align: center;">'.$CFG['site']['currency'].''.$menuprice.'</td>
											<td align="left" style="height:35px;border-bottom:1px solid #CCC; text-align: right;">'.$CFG['site']['currency'].''.$tot_menuprice.'</td>
										</tr>';
							
					}
				}
                $orderSubTotal = $res_order['0']['ordersubtotal'];
				$tax = $res_order['0']['taxvalue'];
				if($tax != ''){
                    $taxamount  = $res_order['0']['taxamount'];
				}
				$orderGrandTotal =$res_order['0']['ordertotalprice'];
                
				if($tax != '0.00'){
					$taxperchantage = $tax;
				}
                
                $tipamount = $res_order[0]['tipamount'];
				if($tipamount != '0.00'){
                                    
                    $tipdetails .= '<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
										<span style="width:50%;display:inline-block;">Tip:</span>
										<span style="width:45%;display:inline-block;text-align: right;">'.$CFG['site']['currency'].''.$tipamount.'</span>
									</div>';
				}
                
				$offer_percentage = $res_order['0']['offervalue'];
				if( isset($offer_percentage) && !empty($offer_percentage) ){
                    $orderDiscountPrice = $res_order['0']['offeramount'];
					$offerdetails .= '<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Discount('.$offer_percentage.' % Off) :</span>
															<span style="width:45%;display:inline-block;text-align: right;">'.$CFG['site']['currency'].''.number_format($orderDiscountPrice,2).'</span>
														</div>';
				}
				
				if($res_order['0']['deliverytype'] != 'pickup'){
					//Deliver Time
					if($res_order['0']['foodassoonas'] == '1'){
						$deliveryoption = 'ASAP';
					}else{
						$deliveryoption = $res_order['0']['deliverydate'].' '.$res_order['0']['deliverytime'];
					}
					$deliveryTime .= '<td>Delivery Time</td><td>:</td><td>'.$deliveryoption.'</td>';
				}
				
				
				if($res_order['0']['deliverylandmark'] != ''){
					$landmark = 'Landmark:'.$res_order['0']['deliverylandmark'];
				}
				if($res_order['0']['customerlandline'] != ''){
					$landline = 'Landline:'.$res_order['0']['customerlandline'];
				}
				if($res_order['0']['payment_type'] == 'cod'){
					$payment_type = 'Cash on Delivery'; 
				}else{
					$payment_type = $this->My_stripslashes($res_order['0']['payment_type']);
				}
				
				$restaurant_name = $this->My_stripslashes($restDetails[0]['restaurant_name']);
				
				if( !empty($res_order['0']['customername']) || !empty($res_order['0']['customerlastname']) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:20px;">'.$this->My_stripslashes($res_order['0']['customername']).' '.$this->My_stripslashes($res_order['0']['customerlastname']).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($res_order['0']['customername']).' '.$this->My_stripslashes($res_order['0']['customerlastname']).'</div>';
				}
				if( !empty($res_order['0']['customercellphone']) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:bold; font-size:22px;color:#222; padding-top:2px;">'.$res_order['0']['customercellphone'].'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($res_order['0']['customercellphone']).'</div>';
				}
				if( !empty($res_order['0']['deliverydoornumber']) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">'.$this->My_stripslashes($res_order['0']['deliverydoornumber']).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($res_order['0']['deliverydoornumber']).'</div>';
				}
				if( !empty($res_order['0']['deliverystreet']) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">'.$this->My_stripslashes($res_order['0']['deliverystreet']).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($res_order['0']['deliverystreet']).'</div>';
				}
				if( !empty($deliveryarea) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">'.$this->My_stripslashes($deliveryarea).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($deliveryarea).'</div>';
				}
				if( !empty($deliverycity) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">'.$this->My_stripslashes($deliverycity).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($deliverycity).'</div>';
				}
				if( !empty($deliveryState) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">'.$this->My_stripslashes($deliveryState).' - '.$this->My_stripslashes($deliveryZip).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$this->My_stripslashes($deliveryState).' - '.$this->My_stripslashes($deliveryzip).'</div>';
				}
				if( empty($deliveryState) && !empty($deliveryzip) ){
					$fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">'.'Post Code:'.$this->My_stripslashes($deliveryzip).'</div>';
					$fax_cust_addr_bot .= '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.'Post Code:'.$this->My_stripslashes($deliveryzip).'</div>';
				}

				if(!empty($fax_cust_addr)){
					$fax_cust_address 		= '<tr><td>
													'.$fax_cust_addr.'
												</td></tr>';
					$fax_cust_address_bottom = '<td>
													'.$fax_cust_addr_bot.'
												</td>';
				}
				//Address Details
				$cust_address = '';
				if( !empty($res_order['0']['deliverydoornumber']) )	$cust_address .= $this->My_stripslashes($res_order['0']['deliverydoornumber']).', ';
				if( !empty($res_order['0']['deliverystreet']) )	$cust_address .= $this->My_stripslashes($res_order['0']['deliverystreet']).', ';
				if( !empty($deliveryarea) )	$cust_address .= $this->My_stripslashes($deliveryarea).', ';
				if( !empty($deliverycity) )	$cust_address .= $this->My_stripslashes($deliverycity);
				if( !empty($deliveryzip) )	$cust_address .= " - ".$this->My_stripslashes($deliveryzip);
				
				//Lanline Details
				if( !empty($landmark) ){
					$landmark_details = '<td>Landmark</td><td>:</td><td>'.$this->My_stripslashes($landmark).'</td>';
				}
				//Lanline Details
				if( !empty($landline) ){
					$landline_details = '<td>Landline</td><td>:</td><td>'.$this->My_stripslashes($landline).'</td>';
				}
				
				//Payment Detils
				if( !empty($transactionId) ){
					$trasnsId_details = '<td width="18%">Transaction Id</td><td width="2%">:</td><td width="30%">'.$transactionId.'</td>';
				}else{
					$trasnsId_details = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
				}
				$order_payment_details = '<tr>
											<td align="left" colspan="3">
												<table width="100%" cellpadding="5" cellspacing="0" border="0" style="border:1px solid #CCC;">
													<tr><td width="18%">Payment Method</td><td width="2%">:</td><td width="30%">'.$payment_type.'</td>'.$trasnsId_details.'</tr>
												</table>
											</td>
										</tr>';
				
				
			$mail_content = '<table cellspacing="0" cellpadding="0" width="650" align="center" border="0" bgcolor="#fff">
									<tr>
										<td width="62%" valign="top" align="left">
											<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
												<tr>
													<td>
													 '.$delivery_pickuptype.'
													 </td>
												</tr>
												<tr>
													<td>
												    <div style="font-family:Arial; font-size:17px;color:#222; padding-top:10px; padding-bottom:10px; border-bottom:1px solid #ccc;"><span style="font-weight:bold;">'.$deliverydate.'</span><br/><span style="font-weight:normal;">Ordered on:'.date("M d, Y H:i:s A",strtotime($res_order['0']['orderdate'])).'</span></div>
													</td>
												</tr>
												<tr>
													<td align="left">
														<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222;padding-bottom:7px;">'.$restaurant_name.' - '.$restDetails[0]['restaurant_phone'].'</div>
													</td>
												</tr>
												<tr>
													<td align="left">
														<div style="font-family:Arial;font-weight:normal; font-size:24px;color:#222;padding-bottom:10px;border-bottom:2px solid #ccc;">ORDER #'.$finalorderid.'</div>
													</td>
												</tr>
												<tr>
													<td align="left">
														<div style="color:#222;padding-bottom:10px;margin-top:10px;">
															<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
																<tr>
																	<td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Menu</td>
                                                                    <td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Qty</td>
																	<td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Menu price</td>
																	<td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Price</td>
																</tr>
																<tr>
																	<td colspan="3">&nbsp;</td>
																</tr>
																'.$menudetails.'
															</table>
														</div>
													</td>
												</tr>
												
												<tr>
													<td align="left">
														<div style="padding-bottom:10px;border:1px solid #ccc; padding-top:10px;">
															<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
																<tr>
																	<td width="60%">&nbsp;</td>
																	<td align="left" width="40%">
																		<div style="font-family:Arial;font-weight:bold; font-size:12px;color:#222;padding-bottom:8px;text-align: right; padding-right:10px;" >Subtotal: '.$CFG['site']['currency'].''.number_format($orderSubTotal,2).'</div></td>
																</tr>
                                                                
															</table>
														</div>
													</td>
												</tr>
												'.$order_instruction.'
											</table>
										</td>
										<td width="38%" align="right" valign="top" style="padding-top:20px;padding-left:20px;">
											<table cellspacing="0" cellpadding="0" width="100%" align="left" border="0">
												<tr>
													<td>
														<img src="'.$CFG['site']['logoname'].'" alt="'.$CFG['site']['sitename'].'" title="'.$CFG['site']['sitename'].'" />
													</td>
												</tr>
												'.$fax_cust_address.'
												<tr>
													<td>
														<div style="padding-bottom:7px;border:1px solid #ccc; padding-top:7px;font-family:Arial;font-weight:bold; font-size:15px;color:#222; margin-top:20px;margin-bottom:10px; padding-left:5px; padding-right:5px;">
															'.$CFG['site']['currency'].' '.$payment_type.' 
														</div>
													</td>
												</tr>
												
												'.$order_payment_withid.'
												
												<tr>
													<td align="left">
                                                        <div style="clear:both;font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Subtotal: </span>
															<span style="width:45%;display:inline-block;text-align: right;">'.$CFG['site']['currency'].''.number_format($orderSubTotal,2).'</span>
														</div>
                                                       
														<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Tax ('.number_format($taxperchantage,0).' %):</span>
															<span style="width:45%;display:inline-block;text-align: right;">'.$CFG['site']['currency'].''.$taxamount.'</span>
														</div>
														
														'.$deliverycharge.'
														
														'.$offerdetails.'
                                                        
                                                        '.$tipdetails.'
                                                        
                                                        
														<div style="font-family:Arial;font-weight:bold; font-size:14px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Total: </span>
															<span style="width:45%;display:inline-block;text-align: right;">'.$CFG['site']['currency'].''.number_format($orderGrandTotal,2).'</span>
														</div>
													</td>
												</tr>
												<tr>
													<td colspan="3"><div style="border-top:1px dashed #ccc; margin-top:0; margin-top:40px;margin-bottom:5px;height:2px;">&nbsp;</div></td>
												</tr>
												<tr>
													<td align="right">
														<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222; padding-top:0px;">Customer Signature</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<table cellspacing="0" cellpadding="0" width="100%" border="0">
												<tr>
													<td colspan="3"><div style="border-top:2px dotted #ccc;margin-top:40px;height:2px; margin-bottom:5px;">&nbsp;</div></td>
												</tr>
												<tr>
													<td colspan="3" align="right"><div style="margin-bottom:10px;font-family:Arial;font-weight:normal; font-size:12px;color:#222;">Tear of Reciept</div></td>
												</tr>
												<tr>
													<td valign="top">
														<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">'.$restaurant_name.'</div>
														<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">Order #'.$finalorderid.'</div>
														'.$delivery_type_address.'
														<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">Total: '.$CFG['site']['currency'].''.number_format($orderGrandTotal,2).'</div>
                                                        <div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">Order #'.$payment_type.'</div>
													</td>
													'.$fax_cust_address_bottom.'
													<td align="center" width="30%" valign="top">
														<div style="border:1px solid #333; padding-left:5px; padding-right:5px; padding-top:10px; padding-bottom:10px;">
															<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:17px;color:#222;">Questions</div>
															<div style="margin-bottom:2px;font-family:Arial;font-weight:normal; font-size:13px;color:#222;">Customer service is available</div>
															<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:20px;color:#222;">'.$CFG['site']['site_phone'].'</div>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>';
                                
							return array($mail_content,$restDetails[0]['restaurant_contact_email']);
	}
    #Slice Addons With Correct Position Of Price
    function getSliceAddonPrice(){
        global $CFG;
        
        $resid          = trim($_REQUEST['resid']);
        //$cat_id         = trim($_REQUEST['cat_id']);
        $menuid         = trim($_REQUEST['menu_id']);
        $mainaddonid    = trim($_REQUEST['main_addon_id']);
        $price_pos      = trim($_REQUEST['menu_pos']);
        
        $sel_price      = "SELECT ma.menuaddons_price_slice, ra.addonsname".
                                " FROM ".$CFG['table']['restaurant_menuaddons']." AS ma".
                                " LEFT JOIN ".$CFG['table']['restaurant_addons']." AS ra ON ma.menuaddons_addonsname = ra.id".
                                " WHERE ma.menuaddons_restaurantid = '".$resid."' AND ma.menuaddons_menuid = '".$menuid."' AND ma.addonparentid = '".$mainaddonid."' ORDER BY ra.id ASC";
        $res_price      = $this->ExecuteQuery($sel_price,'select');
        if($res_price && is_array($res_price)){
            foreach($res_price as $key=>$value){
                $price                      = explode(',',$res_price[$key]['menuaddons_price_slice']);
                $addons[$key]['addonname']  = stripcslashes($res_price[$key]['addonsname']);
                $addons[$key]['addonprice'] = $price[$price_pos] == '' ? '0.00' : $price[$price_pos] ;
            }
        }
        return $addons;
    }
    #Size Addons With Correct Size Of Price
    function getSizeAddonPrice(){
        global $CFG;
        
        $resid          = trim($_REQUEST['resid']);
        //$cat_id         = trim($_REQUEST['cat_id']);
        $menuid         = trim($_REQUEST['menu_id']);
        $mainaddonid    = trim($_REQUEST['main_addon_id']);
        $size           = trim(strtolower($_REQUEST['size']));
        $sel_price      = "SELECT ma.menuaddons_price AS small, ma.menuaddons_price_medium AS medium, ma.menuaddons_price_large AS large, ra.addonsname".
                                " FROM ".$CFG['table']['restaurant_menuaddons']." AS ma".
                                " LEFT JOIN ".$CFG['table']['restaurant_addons']." AS ra ON ma.menuaddons_addonsname = ra.id".
                                " WHERE ma.menuaddons_restaurantid = '".$resid."' AND ma.menuaddons_menuid = '".$menuid."' AND ma.addonparentid = '".$mainaddonid."' ORDER BY ra.id ASC";
        $res_price      = $this->ExecuteQuery($sel_price,'select');
        if($res_price && is_array($res_price)){
            foreach($res_price as $key=>$value){
                $addons[$key]['addonname']  = stripcslashes($res_price[$key]['addonsname']);
                if($size == 'small'){
                    $addons[$key]['addonprice'] = $res_price[$key]['small'];
                }elseif($size == 'medium'){
                    $addons[$key]['addonprice'] = $res_price[$key]['medium'];
                }elseif($size == 'large'){
                    $addons[$key]['addonprice'] = $res_price[$key]['large'];
                }
            }
        }
        return $addons;
        
    }
    #Fixed Addons With Correct Fixed Of Price
    function getFixedAddonPrice(){
        global $CFG;
        
        $resid          = trim($_REQUEST['resid']);
        //$cat_id         = trim($_REQUEST['cat_id']);
        $menuid         = trim($_REQUEST['menu_id']);
        $mainaddonid    = trim($_REQUEST['main_addon_id']);
        $sel_price      = "SELECT ma.menuaddons_price AS addonprice, ra.addonsname AS addonname".
                                " FROM ".$CFG['table']['restaurant_menuaddons']." AS ma".
                                " LEFT JOIN ".$CFG['table']['restaurant_addons']." AS ra ON ma.menuaddons_addonsname = ra.id".
                                " WHERE ma.menuaddons_restaurantid = '".$resid."' AND ma.menuaddons_menuid = '".$menuid."' AND ma.addonparentid = '".$mainaddonid."' ORDER BY ra.id ASC";
        $res_price      = $this->ExecuteQuery($sel_price,'select');
        return $res_price;
    }
    
    #====================================================================================
    #                           Send GCM Notification To Android Mobile
    #====================================================================================
    function sendGCMnotification($status,$registatoin_ids,$order,$restaurant,$reason=''){
        global $CFG;
		
        $google_api_key="AIzaSyAWl9CSGsW2k-b-zHtyy9OtUXl_5hcjJlE";
        $registatoin_ids = array($registatoin_ids);
        
        if(trim($status) == 'processing'){
            //$message    = array("message"=>"Hi valued customer, Your order(".$order.") is accepted by ".$restaurant." and moved to process stage.");
            $message    = array("message"=>"Your order(".$order.") is accepted.");
        }elseif(trim($status) == 'completed'){
            $message    = array("message"=>"Your order(".$order.") delivered.");
        }elseif(trim($status) == 'failed'){
            $message    = array("message"=>"Your order(".$order.") cancelled.");
        }elseif(trim($status) == 'pending'){
            $message    = array("message"=>"You have received new order(".$order.").");
        }
       
	   // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array('registration_ids' => $registatoin_ids,'data' => $message,);

        $headers = array('Authorization: key='.$google_api_key,'Content-Type: application/json');
		
        // Open connection
		$ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) 
		{
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        //echo $result;
        return $result;
        #echo $result;
        //echo "<pre>"; print_r(json_decode($result)); echo "</pre>";
    }
    
    function averageReviews($resid)
    {
        global $CFG;
        
        $sel = "SELECT rating FROM " . $CFG['table']['restaurant_reviews'] . " WHERE restaurant_id = '" . $resid . "' ";
        $res = $this->ExecuteQuery($sel, 'select');

        $rescnt = count($res);
        $sumofrating = 0;
        if ($rescnt > 0)
        {
            foreach ($res as $key => $value)
            {

                $sumofrating += $res[$key]['rating'];
            }

            $sumofrating = ($sumofrating / ($rescnt * 5)) * 100;
            $sumofrating = number_format($sumofrating, 2);
        }
        return $sumofrating;
    }
    
    
    #--------------------- Stripe Payment ----------------------------------------------
    #Stripe Payment
    function payment_stripe_payment(){
        
        global $CFG;
        #echo "<pre>"; print_r($_REQUEST); echo "</pre>";
    	//require_once('lib/Stripe.php');
        
        require_once($_SERVER['DOCUMENT_ROOT'].'/platinum/android/lib/Stripe.php');
        
        $ordertotalprice = $this->My_addslashes($_REQUEST['ordertotalprice']);
        $amount = ($ordertotalprice > 0) ? ($ordertotalprice*100) : 0;
        $strip_publisher_id =  'sk_test_W0Bnkob2imsg5MIDehHiwyjz';           
        
        $error   = '';        
        try {
            Stripe::setApiKey($strip_publisher_id);
            if(isset($_REQUEST) && !empty($_REQUEST['stripe_cardnumber']) && !empty($_REQUEST['stripe_expmonth']) && !empty($_REQUEST['stripe_expyear']) && !empty($_REQUEST['stripe_expyear'])) 
            {  
                
                $stripe_desc = 'Spent order card payment from '.$_REQUEST['contactemail'].' with amount '.$ordertotalprice;
                $card_token = array(
                        'number'    => $_REQUEST['stripe_cardnumber'],
                        'exp_month' => $_REQUEST['stripe_expmonth'],
                        'exp_year'  => $_REQUEST['stripe_expyear'],
                        'cvc'       => $_REQUEST['stripe_cvccode']
                    );
                
                $payment = Stripe_Charge::create(array( 
                        'amount'        => $amount,
                        'currency'      => 'usd',
                        'card'          => $card_token,
                        'description'   => $stripe_desc
                    )); 
                
               if(isset($payment) && !empty($payment)){ 
                   
                   $stripe_val = $payment->getStripeSuccessValue();
                                 
                  $postarrvalues['transaction_id'] = $stripe_val['id'];
                  
                  return array($stripe_val['id'], 'paid');	
                  
               }    
            }
        }catch (Stripe_ApiConnectionError $e) {
            // Network problem, perhaps try again.
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
            return array($error['message'], 'error');
            
        } catch (Stripe_InvalidRequestError $e) {
            // You screwed up in your programming. Shouldn't happen!
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
            return array($error['message'], 'error');
            
        } catch (Stripe_ApiError $e) {
            // Stripe's servers are down!
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
            return array($error['message'], 'error');
            
        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
            return array($error['message'], 'error');
              
        } 
    	#Order Information		
     }
     
     function sendGCMMessage($gcmid, $Message) 
     {
        global $CFG;
        
        // please enter the api_key you received from google console
    	$api_key = "AIzaSyAWl9CSGsW2k-b-zHtyy9OtUXl_5hcjJlE";
             
    	// please enter the registration id of the device on which you want to send the message
    	$registrationIDs= array($gcmid);
    	 
    	 $message    = array("message"=>$Message);
    	
    	$url = 'https://android.googleapis.com/gcm/send';
    	
    	$fields = array(
                    'registration_ids'  => $registrationIDs,
                    'data'              => array( "message" => $message ),
                    );
    
    	$headers = array(
    					'Authorization: key=' . $api_key,
    					'Content-Type: application/json');
    					
    					
    					
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt( $ch, CURLOPT_POST, true );
    	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
    	$result = curl_exec($ch);
    	curl_close($ch);
     }
     
     
     /**
     * SearchDetails::openandcloseBookingTable()
     * 
     * @param mixed $rrr_opentime
     * @param mixed $rrr_closetime
     * @param mixed $rrr_opentime2
     * @param mixed $rrr_closetime2
     * @param mixed $bookHrsMinsSess
     * @return
     */
    function openandcloseBookingTable($rrr_opentime, $rrr_closetime, $rrr_opentime2,
        $rrr_closetime2, $bookHrsMinsSess)
    {
        $dec_rrr_opentime = $this->HourMinuteToDecimalBook($rrr_opentime);
        $dec_rrr_closetime = $this->HourMinuteToDecimalBook($rrr_closetime);
        $dec_rrr_nowtime = $this->HourMinuteToDecimalBook($bookHrsMinsSess);

        $dec_rrr_opentime2 = $this->HourMinuteToDecimalBook($rrr_opentime2);
        $dec_rrr_closetime2 = $this->HourMinuteToDecimalBook($rrr_closetime2);

        list($hh_book_hrmin, $hh_book_sess) = explode(" ", $bookHrsMinsSess);
        list($hh_book_hr, $hh_book_min) = explode(":", $hh_book_hrmin);

        //Open
        list($hh_open_hrmin, $hh_open_sess) = explode(" ", $rrr_opentime);
        list($hh_open_hr, $hh_open_min) = explode(":", $hh_open_hrmin);

        //Close
        list($hh_close_hrmin, $hh_close_sess) = explode(" ", $rrr_closetime);
        list($hh_close_hr, $hh_close_min) = explode(":", $hh_close_hrmin);

        //Open2
        list($hh_open_hrmin2, $hh_open_sess2) = explode(" ", $rrr_opentime2);
        list($hh_open_hr2, $hh_open_min2) = explode(":", $hh_open_hrmin2);

        //Close2
        list($hh_close_hrmin2, $hh_close_sess2) = explode(" ", $rrr_closetime2);
        list($hh_close_hr2, $hh_close_min2) = explode(":", $hh_close_hrmin2);

        if (($hh_open_sess == 'AM' && $hh_close_sess == 'AM') && ($hh_open_sess2 == 'PM' &&
            $hh_close_sess2 == 'PM'))
        {
            if ($hh_book_sess == 'AM' || $hh_book_sess == 'PM')
            {
                if ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)) ||
                    (($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)))
                {
                    #echo "<br><b>AM-PM--Open</b>";
                    $openclosetype = "Open";
                }
                 /*elseif( ($dec_rrr_nowtime > $dec_rrr_opentime2 ) &&  ($dec_rrr_closetime2 > $dec_rrr_nowtime) ){
                #echo "<br><b>AM-PM--Open</b>";
                $openclosetype = "Open";
                }*/  else
                {
                    #echo "<br><b>AM-PM--Closed</b>";
                    $openclosetype = "Closed";
                }
            } else
            {
                #echo "<br><b>AM-PM--Closed</b>";
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'PM' && $hh_close_sess2 == 'PM'))
        {

            if ($hh_book_sess == 'AM' || $hh_book_sess == 'PM')
            {
                if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>Fir-->AM-PM--Open</b>";
                    $openclosetype = "Open";
                } elseif (($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime))
                {
                    #echo "<br><b>2222AM-PM--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    #echo "<br><b>Fir-->AM-PM--Closed</b>";
                    $openclosetype = "Closed";
                }
            } else
            {
                #echo "<br><b>Last-->AM-PM--Closed</b>";
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'PM' && $hh_close_sess2 == 'AM'))
        {

            if ($hh_book_sess == 'AM' || $hh_book_sess == 'PM')
            {
                if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>1111AM-PM--Open</b>";
                    $openclosetype = "Open";
                } elseif (($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime))
                {
                    #echo "<br><b>2222AM-PM--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    #echo "<br><b>Sec--->AM-PM--Closed</b>";
                    $openclosetype = "Closed";
                }
            } else
            {
                #echo "<br><b>AM-PM--Closed</b>";
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'PM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'PM' && $hh_close_sess2 == 'PM'))
        {

            if ($hh_book_hr == '12')
            {

                if (($dec_rrr_nowtime > $dec_rrr_opentime) || ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    $openclosetype = "Closed";
                }
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)) ||
            ($dec_rrr_closetime > $dec_rrr_nowtime))
            {
                #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                $openclosetype = "Open";
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)) ||
            ($dec_rrr_closetime2 > $dec_rrr_nowtime))
            {
                #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                $openclosetype = "Open";
            } else
            {
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'AM') && ($hh_open_sess2 ==
        'AM' && $hh_close_sess2 == 'AM'))
        {

            if ($hh_book_hr == '12' || $hh_book_hr == '01')
            {

                if (($dec_rrr_nowtime > $dec_rrr_opentime) || ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    $openclosetype = "Closed";
                }
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sess--Open</b>"."bnmbnmbmbnm";
                $openclosetype = "Open";
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sessOpen222222222</b>"."vvvvvvvvvv";
                $openclosetype = "Open";
            } else
            {
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'AM' && $hh_close_sess2 == 'AM'))
        {
            if ($hh_book_hr == '12' || $hh_book_hr == '01')
            {

                if (($dec_rrr_nowtime > $dec_rrr_opentime) || ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    $openclosetype = "Closed";
                }
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sess--Open</b>"."bnmbnmbmbnm";
                $openclosetype = "Open";
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sessOpen222222222</b>"."vvvvvvvvvv";
                $openclosetype = "Open";
            } else
            {
                $openclosetype = "Closed";
            }
        }
        return $openclosetype;
    }
    
    //Couponcode
    /**
     * Site::voucherDetailByCode()
     * 
     * @param mixed $resid
     * @param mixed $voucherCode
     * @return
     */
    function voucherDetailByCode($resid,$voucherCode)
    {
        global $CFG;
        
        $today = date('Y-m-d');
        if ($resid != '' && $voucherCode != '') {
            $selQry     = " SELECT vr.id, vr.voucher_name, vr.use_type, vr.off_type, vr.off_price_percentage, vr.valid_from, vr.valid_to".
                            " FROM ".$CFG['table']['voucher']." AS vr ".
                            " LEFT JOIN ".$CFG['table']['restaurant_voucher']." AS rvr ON vr.id = rvr.voucher_id ".
                            " WHERE vr.status = '1' AND vr.voucher_name = '".$voucherCode."' AND rvr.restaurant_id = '".$resid."' AND vr.valid_from <= '".$today."' AND vr.valid_to >= '".$today."' ORDER BY vr.id ASC LIMIT 1 ";
            //echo $selQry; 
                            
            $voucherDet = $this->ExecuteQuery($selQry,'select');
            if (empty($voucherDet)) {
                $voucherDet = 'Not Avail';
            }
            return $voucherDet;
        }
        
    }
    
    function cusinecount($cid,$res_ids){
		global $CFG,$objSmarty;
		
		$sqlsel = " SELECT rsc.cuisine_id ".
		          " FROM ".$CFG['table']['restaurant_serving_cuisines']." as rsc ".
		          " RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
		          " WHERE rs.restaurant_id IN (".$res_ids.") AND rsc.cuisine_id ='".$cid."' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') ";
		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		$cnt    = count($sqlres);
		return $cnt;
		
	}
    
    /**
     * End respose functions (Not common functions)
     */

}
?>