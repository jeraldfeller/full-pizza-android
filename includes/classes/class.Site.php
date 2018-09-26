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
    var $tagsArray;            // default = empty array
    var $attrArray;            // default = empty array

    var $tagsMethod;        // default = 0
    var $attrMethod;        // default = 0

    var $xssAuto;           // default = 1
    var $tagBlacklist = array('applet',  'body',  'bgsound',  'base',  'basefont',  'embed',  'frame',  'frameset',  'head',  'html',  'id',  'iframe',  'ilayer',  'layer',  'link',  'meta',  'name',  'object',  'script',  'style',  'title',  'xml');
    var $attrBlacklist = array('action',  'background',  'codebase',  'dynsrc',  'lowsrc');  // also will strip ALL event handlers
    var $DBCONN;
    

    /**
     * Site::__construct()
     * 
     * @return
     */
    function __construct($db_host = "", $db_name = "", $db_user = "", $db_pwd = "")
    {
        
        global $CFG;

        $db_host    = $CFG['db']['db_host'];
        $db_name    = $CFG['db']['db_name'];
        $db_user    = $CFG['db']['db_user'];
        $db_pwd     = $CFG['db']['db_pwd'];

        $this->db_connection($db_host, $db_name, $db_user, $db_pwd );
        $this->inputFilter($tagsArray = array(),  $attrArray = array(),  $tagsMethod = 0,  $attrMethod = 0,  $xssAuto = 1);
    }
    #........................................................................................
    #DB CONNECTION
    /**
     * Site::db_connection()
     * 
     * @return
     */
    function db_connection($db_host, $db_name, $db_user, $db_pwd )
    {
        $con    = mysqli_connect($db_host, $db_user, $db_pwd,$db_name) 
                  or die("Could not connect: " .$db_host . " :: " . $db_name . 
                  " :: " . $db_user . " :: " . $db_pwd . " " .
                  mysqli_error($con) );
                  mysqli_select_db($con,$db_name) or die('Can\'t use  : ' . $db_name . mysqli_error($con));
        $this->DBCONN = $con;
        mysqli_set_charset($this->DBCONN,"utf8");
        //mysqli_query(' set character set utf8 ');
        //mysqli_query("SET NAMES 'utf8' ");
        
    }
    #..........................................................................
    /** 
      * Constructor for inputFilter class. Only first parameter is required.
      * @access constructor
      * @param Array $tagsArray - list of user-defined tags
      * @param Array $attrArray - list of user-defined attributes
      * @param int $tagsMethod - 0= allow just user-defined,  1= allow all but user-defined
      * @param int $attrMethod - 0= allow just user-defined,  1= allow all but user-defined
      * @param int $xssAuto - 0= only auto clean essentials,  1= allow clean blacklisted tags/attr
      */
      
    function inputFilter($tagsArray = array(),  $attrArray = array(),  $tagsMethod = 0,  $attrMethod = 0,  $xssAuto = 1) {        
        // make sure user defined arrays are in lowercase
        for ($i = 0; $i < count($tagsArray); $i++) $tagsArray[$i] = strtolower($tagsArray[$i]);
        for ($i = 0; $i < count($attrArray); $i++) $attrArray[$i] = strtolower($attrArray[$i]);
        // assign to member vars
        $this->tagsArray = (array) $tagsArray;
        $this->attrArray = (array) $attrArray;
        $this->tagsMethod = $tagsMethod;
        $this->attrMethod = $attrMethod;
        $this->xssAuto = $xssAuto;
    }
    
    /** 
      * Method to be called by another php script. Processes for XSS and specified bad code.
      * @access public
      * @param Mixed $source - input string/array-of-string to be 'cleaned'
      * @return String $source - 'cleaned' version of input parameter
      */
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

    /** 
      * Internal method to strip a tag of certain attributes
      * @access protected
      * @param Array $attrSet
      * @return Array $newSet
      */
    function filterAttr($attrSet) {    
        $newSet = array();
        // process attributes
        for ($i = 0; $i <count($attrSet); $i++) {
            // skip blank spaces in tag
            if (!$attrSet[$i]) continue;
            // split into attr name and value
            $attrSubSet = explode('=',  trim($attrSet[$i]));
            list($attrSubSet[0]) = explode(' ',  $attrSubSet[0]);
            // removes all "non-regular" attr names AND also attr blacklisted
            if ((!eregi("^[a-z]*$", $attrSubSet[0])) || (($this->xssAuto) && ((in_array(strtolower($attrSubSet[0]),  $this->attrBlacklist)) || (substr($attrSubSet[0],  0,  2) == 'on')))) 
                continue;
            // xss attr value filtering
            if ($attrSubSet[1]) {
                // strips unicode,  hex,  etc
                $attrSubSet[1] = str_replace('&#',  '',  $attrSubSet[1]);
                // strip normal newline within attr value
                $attrSubSet[1] = preg_replace('/\s+/',  '',  $attrSubSet[1]);
                // strip double quotes
                $attrSubSet[1] = str_replace('"',  '',  $attrSubSet[1]);
                // [requested feature] convert single quotes from either side to doubles (Single quotes shouldn't be used to pad attr value)
                if ((substr($attrSubSet[1],  0,  1) == "'") && (substr($attrSubSet[1],  (strlen($attrSubSet[1]) - 1),  1) == "'"))
                    $attrSubSet[1] = substr($attrSubSet[1],  1,  (strlen($attrSubSet[1]) - 2));
                // strip slashes
                $attrSubSet[1] = stripslashes($attrSubSet[1]);
            }
            // auto strip attr's with "javascript:
            if (    ((strpos(strtolower($attrSubSet[1]),  'expression') !== false) &&    (strtolower($attrSubSet[0]) == 'style')) ||
                    (strpos(strtolower($attrSubSet[1]),  'javascript:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'behaviour:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'vbscript:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'mocha:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'livescript:') !== false) 
            ) continue;

            // if matches user defined array
            $attrFound = in_array(strtolower($attrSubSet[0]),  $this->attrArray);
            // keep this attr on condition
            if ((!$attrFound && $this->attrMethod) || ($attrFound && !$this->attrMethod)) {
                // attr has value
                if ($attrSubSet[1]) $newSet[] = $attrSubSet[0] . '="' . $attrSubSet[1] . '"';
                // attr has decimal zero as value
                else if ($attrSubSet[1] == "0") $newSet[] = $attrSubSet[0] . '="0"';
                // reformat single attributes to XHTML
                else $newSet[] = $attrSubSet[0] . '="' . $attrSubSet[0] . '"';
            }    
        }
        return $newSet;
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
      * Method to be called by another php script. Processes for SQL injection
      * @access public
      * @param Mixed $source - input string/array-of-string to be 'cleaned'
      * @param Buffer $connection - An open MySQL connection
      * @return String $source - 'cleaned' version of input parameter
      */
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
    
    function filterInput($input = "") {
        $safeInput = $this->process($input);
        $safeInput = $this->safeSQL($safeInput, $this->DBCONN);
        if(!is_array($safeInput))
            $safeInput = addslashes($safeInput);
            
        return $safeInput;
    }
    
    #..........................................................................
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
        $sql = "SELECT " . $select . " FROM " . $table_name . " WHERE " . $condition . " ";
        $res = mysqli_query($this->DBCONN,$sql) or die("Error in Selection Query <br> " . $sql . "<br>" .mysqli_error($this->DBCONN));
        $row = mysqli_fetch_assoc($res);
        
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
        $res = mysqli_query($this->DBCONN, $sql) or die("Error in Selection Query <br> " . $sql . "<br>" .mysqli_error($this->DBCONN));
        while ($row = mysqli_fetch_assoc($res))
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
        $res = mysqli_query($this->DBCONN, $sql) or die("Error in Selection Query <br> " . $sql . "<br>" .mysqli_error($this->DBCONN));
        $num = mysqli_num_rows($res);

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
        $sql = "UPDATE " . $table_name . " SET " . $upvalues . " WHERE " . $condition ." ";
        $res = mysqli_query($this->DBCONN, $sql) or die("Error in Selection Query <br> " . $sql . "<br>" .mysqli_error($this->DBCONN));

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
        //$string = htmlspecialchars(addslashes(trim($string)));
        $string = $this->filterInput($string);
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
        //echo $file;
        $fp = fopen("$file", "r") or die("Could not open the file $file");
        $filesize = filesize($file);
        if ($filesize > 0)
        {
            $filecontent = fread($fp, $filesize);
             
             
            //echo $filecontent;
        } else
        {
            echo 'File Content is empty';
        }

        fclose($fp);
        return $filecontent;
        //return $filecontent1;
        
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
        //echo $mail_subject;
        global $CFG;
        
        $mail_option    = $this->getValue("mail_option",$CFG['table']['sitesetting'],"id = '1'");
        
        #echo $mail_option;
        
        if($_SERVER['HTTP_HOST'] != 'localhost' && $mail_option == 'smtp')
        {    
            $mail = new PHPMailer();
            
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->Host     = "localhost"; // SMTP server
            $mail->Port     = 25; // set the SMTP port
            $mail->SMTPAuth = true; //Whether to use SMTP authentication
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
        }

        return $mailresult;
    }
    
    #....................................................................................
	#Send Inter Fax
	function sendInterFAX($fromname,$faxnumber,$fax_subject,$fax_content,$page_fax=''){
		global $CFG;
        
        //echo "priya";
        //echo $fax_content;
        
		$username            = $CFG['site']['site_interfax_username'];  // Insert your InterFAX username here
		$password            = $CFG['site']['site_interfax_password'];  // Insert your InterFAX password here
		$filename            = $CFG['site']['emailtpl_path'].'/fax_template.html'; // The HTML template location in your filesystem
		$filetype            = 'HTML'; // File format; supported types are listed at
		                      // http://www.interfax.net/en/help/supported_file_types
		$postponetime        = '2001-12-31T00:00:00-00:00';  // don't postpone
		$retries             = '10';
		//$csid                = 'AA CSID';
		$csid                = 'INTERFAX';
		$pageheader          = 'To: {To} From: {From} Pages: {TotalPages}';
		$subject             = $fax_subject;
		$replyemail          = '';
		$page_size           = 'A4';
		$page_orientation    = 'Portrait';
		$high_resolution     = FALSE;
		$fine_rendering      = TRUE;

		//$page                = "http://youronlinerestaurant.com/checkout.php"; // URL from which the form may be posted
        //$page                = $CFG['site']['base_url_https']."/checkout.php"; // URL from which the form may be posted
        if($CFG['site']['fb_domain_name'] == 'fb')
        {
            $page                = $CFG['site']['base_url_https']."/fb/checkout.php"; // URL from which the form may be posted
        }
        elseif($CFG['site']['fb_domain_name'] == 'facebook')
        {
            $page                = $CFG['site']['base_url_https']."/facebook/checkout.php"; // URL from which the form may be posted
        }else
        {
            $page                = $CFG['site']['base_url_https']."/checkout.php"; // URL from which the form may be posted
        }
        
		/*echo "<pre>";print_r($_SERVER);echo "</pre>";
		
		echo "<br>page_fax=>".$page_fax."<br>";
        echo "<br>page=>".$page."<br>";
        echo "<br>HTTP_REFERER=>".$_SERVER['HTTP_REFERER']."<br>";
        exit;*/
		/**************** Settings end ****************/

		$errcount = 0;

		// only allow posting of the form from a defined URL
		/*if ($page_fax == 'checkout' && $page <> $_SERVER['HTTP_REFERER']){
		    echo "Invalid referrer";
		    die;
		}*/
        
        if ($page_fax != 'checkout' && $page_fax == ''){
		    echo "Invalid referrer"; 
		    die;
		}		
	
		#echo $fax_content;
		// import form information
		$name        	= $fromname;
		#$faxnumber    	= $_POST['faxnumber'];
		//$faxnumber    = 3152992403;
		$message    	= $fax_content;

		/*
		Simple form validation
		check to see if recipient name, fax number and message were entered
		*/

		// if no recipient name entered print an error
		if (empty($name)){
		        print "Error: Recipient name is required <br>";
		        $errcount++;
		}

		 // if no fax number entered print an error
		if (empty($faxnumber)){
		        print "Error: Fax number is required <br>";
		        $errcount++;
		}

		 // if no subject entered print an error
		if (empty($subject)){
		        print "Error: Subject is required.<br>";
		        $errcount++;
		}
		// if no message entered print an error
		if (empty($message)){
		        print "Error: Message is required.<br>";
		        $errcount++;
		    }

		// end validation

		// if the form is valid
		if(!$errcount){

		    // open template file
		    if( !($fp = fopen($filename, "r"))){
		        // Error opening file
		        echo "Error opening file";
		        exit;
		    }

		    // read data from template file into $template
		    $template = "";
		    while (!feof($fp)) $template .= fread($fp,1024);
		    fclose($fp);

		    // replace placeholders in template with collected data

		    $template = str_replace('{name}',        $name,        $template);
		    $template = str_replace('{faxnumber}',    $faxnumber, $template);
		    $template = str_replace('{message}',    $message,    $template);

		    //fax the form contents

		    //echo $template;  // uncomment to debug template

		    $client = new SoapClient("http://ws.interfax.net/dfs.asmx?WSDL");

		    // load all Web Service parameters

		    $params->Username          =  $username;
		    $params->Password          =  $password;
		    $params->FaxNumbers        =  $faxnumber;
		    $params->Contacts          =  $name;
		    $params->FilesData         =  $template;
		    $params->FileTypes         =  $filetype;
		    $params->FileSizes         =  strlen($template) ;
		    $params->Postpone          =  $postponetime;
		    $params->RetriesToPerform  =  $retries;
		    $params->CSID              =  $csid;
		    $params->PageHeader        =  $pageheader;
		    $params->JobID             =  '';
		    $params->Subject           =  $subject;
		    $params->ReplyAddress      =  $replyemail;
		    $params->PageSize          =  $page_size;
		    $params->PageOrientation   =  $page_orientation;
		    $params->IsHighResolution  =  $high_resolution;
		    $params->IsFineRendering   =  $fine_rendering;


		    // submit document for faxing
		    $result = $client->SendfaxEx_2($params);

		    // capture return value
		    $ret = $result->SendfaxEx_2Result;

		} // end valid form handling

		return $ret;
    }
    
      #....................................................................................
    /**
     * Site::sendTwilioSms()
     * 
     * @return
     */
    function sendTwilioSms($toNumber, $Message){
        global $CFG, $objSmarty, $_lang;
        
        //echo 'To-->'.$toNumber;
        //echo '<br>Message-->'.$Message;
        //echo 'Path-->'.$CFG['site']['include_path'];
        require_once($CFG['site']['include_path'].'/classes/Services/Twilio.php');
        
        $AccountSid = $CFG['site']['site_twilio_sid'];
        $AuthToken  = $CFG['site']['site_twilio_token'];
        
        $http = new Services_Twilio_TinyHttp(
            'https://api.twilio.com',
            array('curlopts' => array(CURLOPT_SSL_VERIFYPEER => false))
        );
        $client = new Services_Twilio($AccountSid, $AuthToken, '2010-04-01', $http);
        //echo "<pre>"; print_r($client); echo "</pre>";
        $client->http->debug = true;
        
        #$client = new Services_Twilio($AccountSid, $AuthToken);
        
        // The number of the phone initiating the the call.
        // (Must be previously validated with Twilio.)
        $from_number = $CFG['site']['site_twilio_from'];
        
        // The number of the phone receiving call.
        $to_number = $toNumber; 
        
        // The phone message text.
        $message = $Message;
        
        // Send the SMS message.
        try
        {
            $response = $client->account->sms_messages->create($from_number, $to_number, $message);
            
            // Display a confirmation message on the screen
            //echo "Sent message {$response->sid}";
            return $response->sid;
        }
        catch (Exception $e) 
        {
            #echo 'Error: ' . $e->getMessage();
            return $e->getMessage();
        }
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
        #echo "<br>".$req_file_name;

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
            'var jssitebaseUrl      = "' . $CFG['site']['base_url'] . '";' . "\n" .
            'var jssiteuserfriendly = "' . $CFG['site']['userfriendly'] . '";' . "\n" .
            'var site_fb_appsid     = "' . $CFG['site']['site_fb_appsid'] . '";' . "\n" .
            'var fb_domain_name     = "' . $CFG['site']['fb_domain_name'] . '";' . "\n" .
            'var viewable           = "' . $CFG['site']['viewable'] . '";' . "\n" .
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
    
    /**
     * Site::setglobalvarjavascript_fb()
     * 
     * @return void
     */
    function setglobalvarjavascript_facebook()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sitejsbaseurl = '<script type="text/javascript">' . "\n" .
            'var jssitebaseUrl = "' . $CFG['site']['base_url_https'] . '/facebook";' . "\n" .
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

        $vid_ext_arr        = explode(".", $filename);
        $vid_ext_arr_cnt    = count($vid_ext_arr);
        $vid_ext            = strtolower($vid_ext_arr[$vid_ext_arr_cnt - 1]);

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
        $imagesizedata = getimagesize($_FILES[$fieldname]['tmp_name']);
        if($imagesizedata == TRUE) {
            $logoext    = $this->getFileExtension($_FILES[$fieldname]['name']);
            $dest_name  = $uploadpath . $photoname;
    
            @move_uploaded_file($_FILES[$fieldname]['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);
        }
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
        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        global $CFG, $objSmarty, $_lang;

        $sesslan = $this->getValue("lang_code", $CFG['table']['language']," lang_site ='Yes' LIMIT 1");
        if (isset($_GET['la']) && !empty($_GET['la']))
        {
            $reqlanname = strtoupper($_GET['la']);
            $_SESSION['lan'] = $reqlanname;

            header("Location: " . $_SERVER[HTTP_REFERER]);exit;
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
        #echo "<pre>";print_r($_lang);echo "</pre>";exit;
        if ($_SESSION['lan'] == 'CS' || $_SESSION['lan'] == 'SK' || 
            $_SESSION['lan'] == 'SL' || $_SESSION['lan'] == 'AR' || 
            $_SESSION['lan'] == 'SV' || $_SESSION['lan'] == 'LT' || 
            $_SESSION['lan'] == 'TR' || $_SESSION['lan'] == 'ES')
        {
            $objSmarty->assign('LANG', $_lang);
        } else
        {
            $objSmarty->assign('LANG', $this->utf8_array_decode($_lang));
        }
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
        #echo $req_file_name;

        include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
            'header.php';
        if ($req_file_name == 'index.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'index.php';

        } elseif ($req_file_name == 'address.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'address.php';

        } 

         elseif ($req_file_name == 'searchResult.php' || $req_file_name ==
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

        } elseif ($req_file_name == 'restaurantCuisineInnerpage.php' || $req_file_name == 'restaurant_innerpage_cuisine.php' || $req_file_name == 'restaurantCityInnerpage.php')
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
            #echo "set";
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'contactUs.php';

        } //siteFeedback.php
        elseif ($req_file_name == 'siteFeedback.php')
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' .
                'siteFeedback.php';

        } elseif (  $req_file_name == 'restaurantOwnerMyaccount.php'            || $req_file_name == 'restaurantOwnerMyaccount_order.php'         || 
                    $req_file_name == 'restaurantOwnerMyaccount_report.php'     || $req_file_name == 'restaurantOwnerMyaccount_category.php'      || 
                    $req_file_name == 'restaurantOwnerMyaccount_menu.php'       || $req_file_name == 'restaurantOwnerMyaccount_menuAddEdit.php'   ||
                    $req_file_name == 'restaurantOwnerMyaccount_addons.php'     || $req_file_name == 'restaurantOwnerMyaccount_offers.php'        || 
                    $req_file_name == 'restaurantOwnerMyaccount_payment.php'    || $req_file_name == 'restaurantOwnerMyaccount_addonsAddEdit.php' ||
                    $req_file_name == 'restaurantOwnerMyaccount_setting.php'    || $req_file_name == 'restaurantOwnerMyaccount_reviews.php'       ||
                    $req_file_name == 'restaurantOwnerMyaccount_bookings.php'   || $req_file_name == 'restaurantOwnerMyaccount_offers_AddEdit.php'||
                    $req_file_name == 'restaurantOwnerMyaccount_invoice.php'    || $req_file_name == 'restaurantOwnerMyaccount_categoryAddEdit.php'  )
        {
            include_once $CFG['site']['language_path'] . '/' . $reqlanname . '/' . 'restaurantOwnerMyaccount.php';

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
                    $Result = mysqli_query($this->DBCONN,$Query) or die("Error in Selection Query <br>".mysqli_error($this->DBCONN));
                    if ($Result)
                    {
                        $ResultSet = array();
                        while ($ResultSet1 = mysqli_fetch_assoc($Result))
                            $ResultSet[] = $ResultSet1;
                        return $ResultSet;
                    } else
                        return false;
                    break;

                case "update":
                    $Result = mysqli_query($this->DBCONN, $Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" .mysqli_error($this->DBCONN) );
                        
                    if ($Result)
                    {
                        $AffectedNums = mysqli_affected_rows($this->DBCONN);
                        return $AffectedNums;
                    } else
                        return false;
                    break;

                case "norows":
                    $Result = mysqli_query($this->DBCONN, $Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" .mysqli_error($this->DBCONN));
                    if ($Result)
                    {
                        $Totalrows = mysqli_num_rows($Result);
                        return $Totalrows;
                    } else
                        return false;
                    break;
                case "insert":
                    $Result = mysqli_query($this->DBCONN, $Query) or die("Error in Selection Query <br> " . $Query .
                        "<br>" . mysqli_error($this->DBCONN) );
                        //echo $Result;
                    if ($Result)
                    {
                        $LastInsertedRow = mysqli_insert_id($this->DBCONN);
                        return $LastInsertedRow;
                    } else
                        return false;
                    break;
                case "delete":
                    $Result = mysqli_query($this->DBCONN, $Query) or die("Error in Deletion Query <br> " . $Query .
                        "<br>" );
                    if ($Result)
                        return true;
                    else
                        return false;
            }
        }
    }
    
        /**
     * Site::setDateFormatWithTime()
     * 
     * @return
     */
     function setDateFormatWithTime($date) {
        global $CFG, $objSmarty;
        
       $time = strtotime($date);
       $changedFormat = date("d-m-Y, g:i A", $time);
       return $changedFormat;
     }    
     
        /**
     * Site::setDateFormatWithOutTime()
     * 
     * @return
     */
     function setDateFormatWithOutTime($date) {
        global $CFG, $objSmarty;
        
       $time = strtotime($date);
       $changedFormat = date("d-m-Y", $time);
       return $changedFormat;
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
            $pagination .= "<ul class=\"pagination pull-right\">";
            //First
            if ($page > 1)
                $pagination .= "<li><a href=\"$targetpage?page=1$fields\"=>&lt;&lt;</a></li>";
            else
                $pagination .= "<li class=\"disabled\"><a >&lt;&lt;</a></li>";

            //previous button
            if ($page > 1)
                $pagination .= "<li><a href=\"$targetpage?page=$prev$fields\"=>&lt;</a></li>";
            else
                $pagination .= "<li class=\"disabled\"><a >&lt;</a></li>";

            //pages
            if ($lastpage < 7 + ($adjacents * 2))
                //not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<li class=\"active\"><a class=\"\">$counter</a><li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage?page=$counter$fields\">$counter</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li class=\"active\"><a href=\"\">$counter</a></li>";
                        else
                            $pagination .= "<li><a href=\"$targetpage?page=$counter$fields\">$counter</a></li>";
                    }
                    $pagination .= "<li><a href=\"\">...</a></li>";
                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1$fields\">$lpm1</a></li>";
                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage$fields\">$lastpage</a><li>";

                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination .= "<li><a href=\"$targetpage?page=1$fields\">1</a></li>";
                    if($page != '3')
                    {
                        $pagination .= "<li><a href=\"$targetpage?page=2$fields\">2</a></li>";
                    }
                    if($page != '3' &&  $page != '4')
                    $pagination .= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page )
                        {
                            $pagination .= "<li class=\"active\"><a class=\"\">$counter</a></li>";
                        }    
                        else
                            $pagination .= "<li><a href=\"$targetpage?page=$counter$fields\">$counter</a><li>";

                    }
                    $pagination .= "<li><a href=\"\">...</a></li>";
                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1$fields\">$lpm1</a></li>";
                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage$fields\">$lastpage</a></li>";
                }
                //close to end; only hide early pages
                else
                {
                    $pagination .= "<li><a href=\"$targetpage?page=1$fields\">1</a></li>";
                    $pagination .= "<li><a href=\"$targetpage?page=2$fields\">2</a></li>";
                    $pagination .= "<li><a href=\"\">...</a></li>";
                    
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li class=\"active\"><a class=\"\">$counter</a></li>";
                        else
                            $pagination .= "<li><a href=\"$targetpage?page=$counter$fields\">$counter</a></li>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
                $pagination .= "<li><a href=\"$targetpage?page=$next$fields\">&gt;</a></li>";
            else
                $pagination .= "<li class=\"disabled\"><a >&gt;</a></li>";

            //Last button
            if ($page < $counter - 1)
                $pagination .= "<li><a href=\"$targetpage?page=$lastpage$fields\"> &gt;&gt;</a><li>";
            else
                $pagination .= "<li class=\"disabled\"><a >&gt;&gt;</a><li>";

            $pagination .= "</ul>\n";
            
        }
        //echo $pagination;
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
            $pagination .= "<ul class=\"pagination\">";
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
                        $pagination .= "<li class=\"active\"><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
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
                            $pagination .= "<li class=\"active\"><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
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
                            $pagination .= "<li class=\"active\"><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
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
                            $pagination .= "<li class=\"active\"><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
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
        $ser_opennow, $ser_offer, $vegmenutype, $nonvegmenutype, $cuisine, $cuisineid, $ser_area, $ser_city,
        $ser_areaid, $ser_pricemin, $ser_pricemax)
    {
        //echo $fields;
        //echo $total_pages;
        //echo $page;
        //echo $targetpage;
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
            $pagination .= "<ul class=\"pagination\">";
            //previous button
            if ($page > 1)
            {
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('1'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area. $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\"=>&laquo;</a></li>";
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$prev'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\"=>&lt;</a></li>";
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
                        $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
                    else
                    {
                        $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                            $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                            $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                            $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }        
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
                        else
                            $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                                $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                                $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                                $ser_area . $ser_city  . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$lastpage'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_city  . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$lastpage</a></li>";
                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('1'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_city  . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">1</a></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
                        else
                        {
                            //if($counter != 2)
                            $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                                $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                                $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                                $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                        }

                    }
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$lastpage'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$lastpage</a></li>";
                }
                //close to end; only hide early pages
                else
                {
                    $pagination .= "<li><a onclick=\"ajaxPaginationSearch('1'" . $fields . $targetpage .
                        $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                        $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                        $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">1</a></li>";
                    //$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
                    $pagination .= "<li><span class=\"dotted\">...</span></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination .= "<li><a href=\"javascript:void(0);\"><span class=\"\">$counter</span></a></li>";
                        else
                            $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$counter'" . $fields . $targetpage .
                                $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                                $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                                $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">$counter</a></li>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
            {
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$next'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">&gt;</a></li>";
                $pagination .= "<li><a onclick=\"ajaxPaginationSearch('$lastpage'" . $fields . $targetpage .
                    $searcharea . $searchcuisine . $searchrestaurant . $ser_delivery . $ser_pickup .
                    $ser_opennow . $ser_offer . $vegmenutype . $nonvegmenutype . $cuisine . $cuisineid .
                    $ser_area . $ser_city . $ser_areaid . $ser_pricemin . $ser_pricemax . ")\" href=\"javascript:void(0);\">&raquo;</a></li>";
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
    
    /**
     * Site::updateViewable()
     * 
     * @return void
     */
    function updateViewable($view)
    {
        global $CFG;
        
        $Query = "UPDATE " . $CFG['table']['sitesetting'] .
            " SET viewable = '".$view."' WHERE id  = '1'";
        $this->ExecuteQuery($Query, "update");
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
        global $CFG, $objSmarty, $admin_smarty;
        $UpQuery = "SELECT  admin_name, admin_email, support_email, invoice_email, site_phone, userfriendly, site_fb_appsid, site_fb_appsecret, site_fb_menu_appsid, site_fb_menu_appsecret, sitename, sitelogo, site_fav_icon, offline_status, offline_notes, user_page, admin_page, currency_option , currency_image , currency_symbol, site_address, google_analytic_code, woopra_analytic_code, site_vat_no, site_vat_percentage, site_cc_percentage, admin_pending_order_alert, site_inv_setting, site_timezone,site_interfax_username, site_interfax_password,searchbyoption,google_api_key,site_twiliosms_sid, site_twiliosms_token, site_twiliosms_from_no, viewable FROM " .
            $CFG['table']['sitesetting'] . " WHERE id  = '1'";
        $sitesetting = $this->ExecuteQuery($UpQuery, 'select');

        $CFG['site']['sitedomain']     = 'Restaurant';
        $CFG['site']['adminname']      = $this->filterInput($sitesetting['0']['admin_name']);
        $CFG['site']['adminemail']     = $this->filterInput($sitesetting['0']['admin_email']);
        $CFG['site']['supportemail']   = $this->filterInput($sitesetting['0']['support_email']);
        $CFG['site']['invoiceemail']   = $this->filterInput($sitesetting['0']['invoice_email']);
        $CFG['site']['site_phone']     = $this->filterInput($sitesetting['0']['site_phone']);
        $CFG['site']['sitename']       = $this->filterInput($sitesetting['0']['sitename']);
        $CFG['site']['adminperpage']   = $this->filterInput($sitesetting['0']['admin_page']);
        $CFG['site']['userperpage']    = $this->filterInput($sitesetting['0']['user_page']);
        $CFG['site']['logoname']       = $CFG['site']['photo_sitelogo_url'] . '/' . $this->filterInput($sitesetting['0']['sitelogo']);
        $CFG['site']['favicon']        = $this->filterInput($sitesetting['0']['site_fav_icon']);
        $CFG['site']['userfriendly']   = $this->filterInput($sitesetting['0']['userfriendly']);
        $CFG['site']['offline_status'] = $this->filterInput($sitesetting['0']['offline_status']);
        $CFG['site']['site_address']   = $this->filterInput($sitesetting['0']['site_address']);
        $CFG['site']['viewable']       = $this->filterInput($sitesetting['0']['viewable']);
        $CFG['site']['google_analytic_code'] = $this->filterInput($sitesetting['0']['google_analytic_code']);
        $CFG['site']['woopra_analytic_code'] = $this->filterInput($sitesetting['0']['woopra_analytic_code']);

        #search by
        $CFG['site']['searchbyoption'] = $this->filterInput($sitesetting['0']['searchbyoption']);

        #facebook site
        $CFG['site']['site_fb_appsid'] = $this->filterInput($sitesetting['0']['site_fb_appsid']);
        $CFG['site']['site_fb_appsecret'] = $this->filterInput($sitesetting['0']['site_fb_appsecret']);
        
        #Interfax
        $CFG['site']['site_interfax_username'] = $this->filterInput($sitesetting['0']['site_interfax_username']);
        $CFG['site']['site_interfax_password'] = $this->filterInput($sitesetting['0']['site_interfax_password']);

        #facebook menu
        $CFG['site']['site_fb_menu_appsid'] = $this->filterInput($sitesetting['0']['site_fb_menu_appsid']);
        $CFG['site']['site_fb_menu_appsecret'] = $this->filterInput($sitesetting['0']['site_fb_menu_appsecret']);

        $CFG['site']['admin_pending_order_alert'] = $this->filterInput($sitesetting['0']['admin_pending_order_alert']);

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
            "customer_id = '" . $this->filterInput($_SESSION['customerid']) . "'");

        #VAT
        $CFG['site']['site_vat_no'] = $this->filterInput($sitesetting['0']['site_vat_no']);
        $CFG['site']['site_vat_percentage'] = $this->filterInput($sitesetting['0']['site_vat_percentage']);
        $CFG['site']['site_cc_percentage'] = $this->filterInput($sitesetting['0']['site_cc_percentage']);
        $CFG['site']['site_inv_setting'] = $this->filterInput($sitesetting['0']['site_inv_setting']);

        $CFG['site']['site_timezone'] = $this->filterInput($sitesetting['0']['site_timezone']);

        #Image upload size
        $CFG['site']['max_img_upload_size'] = 1048576 * 2;
        
        #Google API Key
        $CFG['site']['google_api_key'] = $this->filterInput($sitesetting['0']['google_api_key']);

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
        
        #SMS
        $CFG['site']['site_twilio_sid']     = $this->filterInput($sitesetting['0']['site_twiliosms_sid']);
        $CFG['site']['site_twilio_token']   = $this->filterInput($sitesetting['0']['site_twiliosms_token']);
        $CFG['site']['site_twilio_from']    = $this->filterInput($sitesetting['0']['site_twiliosms_from_no']);

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
        
        $objSmarty->assign("SITE_SUPPORT_MAIL", $CFG['site']['supportemail']);
        $admin_smarty->assign("SITE_SUPPORT_MAIL", $CFG['site']['supportemail']);
        
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

        #$objSmarty->assign("headertext", $CFG['site']['header_text']);

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
        
        #FB Site
        $admin_smarty->assign("VIEWABLE", $CFG['site']['viewable']);
        $objSmarty->assign("VIEWABLE", $CFG['site']['viewable']);

        define("PAGELIMIT", $CFG['site']['adminperpage']);
        define("USERPAGELIMIT", $CFG['site']['userperpage']);
        define("CURRENCY", $currency);

        $objSmarty->assign('menuUrl',$CFG['site']['photo_menu_url']);
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
    function findFullAddress($address = '', $area = '', $city = '', $state = '', $country = '')
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
        //echo '<br>Output-->'.$outputStr;
        return $outputStr;
    }
    #........................................................................................
    #find Lattitude & Longtitude from address
    /**
     * Site::findLatLongFromAddress()
     * 
     * @return
     */
    function findLatLongFromAddress($address = '', $area = '', $city = '', $state = '', $country = '')
    {
        
       
        if (!empty($address))   $outputStr  = $address;
        if (!empty($area))      $outputStr .= " " . $area;
        if (!empty($city))      $outputStr .= " " . $city;
        if (!empty($state))     $outputStr .= " " . $state;
        if (!empty($country))   $outputStr .= " " . $country;

        $outputaddr = str_replace(' ', '+', $outputStr);
        //echo '<br>Output-->'.$outputaddr;
        #$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $outputaddr . '&sensor=false');
        $url = "http://maps.google.com/maps/api/geocode/json?address=".$outputaddr."&sensor=false";
        #echo $url;
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $geocode = curl_exec($ch); 
        curl_close($ch);
        $output = json_decode($geocode);
        
        //echo "<pre>";print_r($output);echo "</pre>";
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
        //echo "the lat is".$lat;
       

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
            $resid = $this->filterInput($_GET['resid']);
        } elseif (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
        {
            $resid = $this->filterInput($_SESSION['restaurantownerid']);
        }
        
        $restaurantdetail   = $this->getMultivalue("restaurant_name, restaurant_streetaddress, restaurant_zip, restaurant_city, restaurant_state", $CFG['table']['restaurant'], "restaurant_id = '" . $resid . "'");

        $rest_address       = $this->filterInput($restaurantdetail[0]['restaurant_streetaddress']);
        $res_area           = $this->filterInput($restaurantdetail[0]['restaurant_zip']);
        $rest_city          = $this->getValue("cityname", $CFG['table']['city'], " city_id='" . $this->filterInput($restaurantdetail[0]['restaurant_city']) . "' ");
        $rest_state         = $this->getValue("statename", $CFG['table']['state'], " statecode='" . $this->filterInput($restaurantdetail[0]['restaurant_state']) . "' ");
        $restaurant_name    = $this->filterInput($restaurantdetail[0]['restaurant_name']);
        
        

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

        $rest_fullAddress = $this->findFullAddress($rest_address, $rest_city,
            $rest_state.' - '. $res_area);
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
        $result = mysqli_query($this->DBCONN,$selsql);
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

        while ($row_list = mysqli_fetch_assoc($result))
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
        mysqli_query($TruncateTable) or die(mysqli_error());
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
            $restaurant_cond = " restaurant_id = '" . $this->filterInput($_GET['resid']) . "',  ";
        }
        if (isset($_GET['catid']) && !empty($_GET['catid']))
        {
            $restaurant_cond .= " menu_category = '" . $this->filterInput($_GET['catid']) . "',  ";
        }

        if (isset($_POST['rd_import']) && !empty($_POST['rd_import']) && $_POST['rd_import'] ==
            'emptab')
        {
            if (!empty($tablename))
            {
                $TruncateTable = "TRUNCATE TABLE " . $tablename . " ";
                mysqli_query($this->DBCONN,$TruncateTable) or die(mysqli_error($this->DBCONN));
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
        global $CFG, $objSmarty, $admin_smarty;

        if (!empty($id))
            $cuisineid = explode(",", $id);
        $cnt = count($cuisineid);
        for ($i = 0; $i < $cnt; $i++)
        {
            $servingcuisine[] = $this->getValue("cuisine_name", $CFG['table']['cuisine'],
                "cuisine_id = '" . $this->filterInput($cuisineid[$i]) . "'");
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
                "cuisine_id = '" . $this->filterInput($cuisineid[$i]) . "'AND delete_status = 'No' AND cuisine_status = '1' " );
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
                "city_id = '" . $this->filterInput($areaid[$i]) . "'");
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
            $selcond = " AND statecode = '" . $this->filterInput($statecode) . "' ";

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
    function showzipList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        if (!empty($cityid))
            $selcond = " AND cityid = '" . $this->filterInput($cityid) . "' ";

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
            " WHERE cuisine_status = '1' AND delete_status = 'No' ORDER BY cuisine_name ASC";
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
    /*function getShowCategoryList()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $sel_cat = "SELECT maincateid,maincatename FROM " . $CFG['table']['category_main'] .
            " WHERE status = '1'  GROUP BY maincatename ORDER BY maincatename ASC";
        #echo "<br>".$sel_cat;
        $res_cat = $this->ExecuteQuery($sel_cat, "select");

        $objSmarty->assign("showcategorylist", $res_cat);
        $admin_smarty->assign("showcategorylist", $res_cat);
    }*/
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
            " WHERE category_id = '" . $this->filterInput($catid) . "' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "<pre>";print_r($res_addon);echo "</pre>";
        $restid = $this->filterInput($_SESSION['restaurantownerid']);

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("pizza_addons_addonsname", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND pizza_addons_restaurantid = '" . $restid . "' ");

            $res_addon[$key]['menupriceoption'] = $this->GetValue("pizza_addons_priceoption",
                $CFG['table']['restaurant_pizza_addons'], "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND pizza_addons_restaurantid = '" . $restid . "'");
            $res_addon[$key]['menuprice'] = $this->GetValue("pizza_addons_price", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND pizza_addons_restaurantid = '" . $restid . "'");

            $res_addon[$key]['menu_addonid'] = $this->GetValue("pizza_addonsid", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
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
            " WHERE category_id = '" . $this->filterInput($catid) . "' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "<pre>";print_r($res_addon);echo "</pre>";
        $restid = $this->filterInput($_SESSION['restaurantownerid']);

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("pizza_addons_addonsname", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $catid .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");

            $res_addon[$key]['menupriceoption'] = $this->GetValue("pizza_addons_priceoption",
                $CFG['table']['restaurant_pizza_addons'], "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");
            $res_addon[$key]['menuprice'] = $this->GetValue("pizza_addons_price", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND pizza_addons_restaurantid = '" . $restid .
                "' AND pizza_addons_menuid = '" . $menuid . "'");

            $res_addon[$key]['menu_addonid'] = $this->GetValue("pizza_addonsid", $CFG['table']['restaurant_pizza_addons'],
                "pizza_addons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND pizza_addons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
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

        $menu_name = $this->filterInput($_POST['menu_name']);
        if( isset($_POST['restid']) && !empty($_POST['restid']) ){
        $restaurant_name  = $this->filterInput($_POST['restid']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_type = $this->filterInput($_POST['menu_type']);
        
        if( isset($_POST['eid']) && !empty($_POST['eid']) ){
            $menuid  = $this->filterInput($_POST['eid']);        
        }
        #echo "<pre>";print_r($_POST);echo "</pre>";

        /*if( isset($restaurant_name) && !empty($restaurant_name) ){
        $cond = " AND restaurant_id != '".$restaurant_name."' ";
        }else{
        $cond = " AND restaurant_id='".$restaurant_name."' ";
        }*/

        #$noofrows 	= $this->getNumvalues($CFG['table']['restaurant_menu'],"menu_name='".$menu_name."' AND menu_category='".$menu_category."' AND menu_type='".$menu_type."' ".$cond." " );

        echo $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'], "menu_name='" .
            $menu_name . "' AND menu_category='" . $menu_category . "' AND menu_type='" . $menu_type .
            "' AND restaurant_id='" . $restaurant_name . "' AND id != '".$menuid."' ");
        
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }        
        if( isset($restaurant_name) && !empty($restaurant_name) ){        
               
        $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_type = $this->filterInput($_POST['menu_type']);

        #echo "<pre>";print_r($_POST);echo "</pre>";

        /*if( isset($restaurant_name) && !empty($restaurant_name) ){
        $cond = " AND restaurant_id != '".$restaurant_name."' ";
        }else{
        $cond = " AND restaurant_id='".$restaurant_name."' ";
        }*/

        #$noofrows 	= $this->getNumvalues($CFG['table']['restaurant_menu'],"menu_name='".$menu_name."' AND menu_category='".$menu_category."' AND menu_type='".$menu_type."' ".$cond." " );

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'], "menu_name='" .
            $menu_name . "' AND menu_category='" . $menu_category . "' AND menu_type='" . $menu_type .
            "' AND restaurant_id='" . $restaurant_name . "'  AND id != '".$menuid."'");

        if ($noofrows > 0)
        {
            echo "exist";
        }
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

        $menu_name = $this->filterInput($_POST['menu_name']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_type = $this->filterInput($_POST['menu_type']);
        $restaurant_id = $this->filterInput($_POST['restaurant_name']);

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "menu_name = '" . $menu_name . "' AND menu_category = '" . $menu_category .
            "' AND menu_type='" . $menu_type . "' AND restaurant_id = '" . $restaurant_id .
            "' AND id != '" . $this->filterInput($_POST['eid']) . "'");
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
            $subquery = " AND restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'";
        }
        if (isset($_REQUEST['restaurant_name']) && !empty($_REQUEST['restaurant_name']))
        {
            $subquery = " AND restaurant_id = '" . $this->filterInput($_REQUEST['restaurant_name']) . "'";
        }
        $menu_catothers = $this->filterInput($_POST['menu_catothers']);
        $noofrows = $this->getNumvalues($CFG['table']['category_main'], "maincatename='" .
            $menu_catothers . "' $subquery");
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
        /*
        echo "<br>--1======>".$rrr_opentime;
        echo "<br>--2======>".($rrr_closetime);
        echo "<br>--3======>".$rrr_opentime_pre;
        echo "<br>--4======>".$rrr_closetime_pre;
        */
        
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
    function getShowMainAddonsListEdit($addonid)
    {
        global $CFG, $objSmarty, $admin_smarty;


        $sel_addon = "SELECT id, parentid, category_id, addonsname, restaurant_id, addonspriceoption, addonsprice, addonscount FROM " .
            $CFG['table']['restaurant_addons'] . " WHERE parentid = '" . $this->filterInput($addonid) .
            "' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        //echo "<pre>";print_r($res_addon);echo "</pre>";
        $getpriceoption = $this->getValue("addonspriceoption", $CFG['table']['restaurant_addons'],
            "id = '" . $this->filterInput($addonid) . "'");

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
    function getShoweditlist($addonid)
    {
        global $CFG, $objSmarty;

        $addonsvalue = $this->getMultivalue("restaurant_id,category_id,addonsname,addonspriceoption,addonsprice,addonscount",
            $CFG['table']['restaurant_addons'], "id='" . $this->filterInput($addonid) . "'");
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
            " WHERE rest.restaurant_id = '" . $this->filterInput($restid) . "' ";
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
            "parentid = '" . $this->filterInput($_REQUEST['parentid']) . "' AND restaurant_id = '" . $this->filterInput($_REQUEST['resid']) .
            "' ");

        if (!empty($_REQUEST['menuid']))
        {
            $menuid = $this->filterInput($_REQUEST['menuid']);
        } else
        {
            $menuid = $this->filterInput($_REQUEST['eid']);
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
            " WHERE menuaddons_id = '" . $this->filterInput($_REQUEST['menu_addonid']) .
            "' AND menuaddons_restaurantid = '" . $this->filterInput($_REQUEST['resid']) .
            "' AND addonparentid = '" . $this->filterInput($_REQUEST['parentid']) .
            "' AND menuaddons_addonsname = '" . $this->filterInput($_REQUEST['mainaddon_id']) .
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
            " WHERE  delete_status = 'No' AND  restaurant_id = '" . $this->filterInput($resid) .
            "' AND status = '1' ORDER BY sortorder ASC";
        $res_cat = $this->ExecuteQuery($sel_cat, "select");
        //echo "sel_cat =>".$sel_cat;
        //echo "<pre>";print_r($res_cat);echo "</pre>";
        $objSmarty->assign("showcategorylist", $res_cat);
        $admin_smarty->assign("showcategorylist", $res_cat);
        //return showcategorylist;
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
            "maincateid = '" . $this->filterInput($catid) . "' ");

        #echo "menu_categoryoption ".$menu_categoryoption;

        if ($menu_categoryoption == 'pizza')
        {
            #$catcond  .= " AND cat.maincat_option = '".$menu_categoryoption."' AND addon.restaurant_id = '".$resid."' ";
            $catcond .= " AND cat.maincat_option = '" . $menu_categoryoption . "' ";
        } else
        {
            $catcond .= " AND cat.maincat_option = '" . $menu_categoryoption .
                "' AND addon.category_id = '" . $this->filterInput($catid) . "' ";
        }

        #$sel_addon = "SELECT id,category_id,addonsname,restaurant_id,addonspriceoption,addonsprice FROM ".$CFG['table']['restaurant_addons']." WHERE category_id = '".$catid."' AND restaurant_id = '".$resid."' AND parentid = '0' AND status = '1' ORDER BY addonsname ASC";
        $sel_addon = " SELECT addon.id, addon.addonsname,addon.category_id, addon.restaurant_id, addon.addonspriceoption, addon.addonsprice, cat.maincat_option " .
            " FROM " . $CFG['table']['restaurant_addons'] . " as addon LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON addon.category_id = cat.maincateid " .
            " WHERE addon.parentid = '0' " . $catcond . "  AND addon.restaurant_id = '" . $resid .
            "' AND addon.status = '1' ORDER BY addon.id ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "sel_addon ".$sel_addon;
        #echo "<pre>";print_r($res_addon);echo "</pre>";

        $cond .= " AND menuaddons_restaurantid = '" . $resid . "' ";

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                " ");
            $res_addon[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption",
                $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                "");
            $res_addon[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                "");
            $res_addon[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                "");
        }
        //echo "<pre>";print_r($res_addon);echo "</pre>";
        $objSmarty->assign("showAddonslist", $res_addon);
        $objSmarty->assign("cntmenuAddons", count($res_addon));

        $admin_smarty->assign("showAddonslist", $res_addon);
        $admin_smarty->assign("cntmenuAddons", count($res_addon));
        return $res_addon;
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
        if($_SESSION['restaurantownerid'] != ''){
            $_REQUEST['resid'] = $this->filterInput($_SESSION['restaurantownerid']);
        }

        $sel = "SELECT id,	parentid, category_id,restaurant_id,addonsname,addonspriceoption,addonsprice FROM " .
            $CFG['table']['restaurant_addons'] . " WHERE parentid = '" . $parentid .
            "' AND status = '1' AND addonsname != '' AND restaurant_id = '" . $this->filterInput($_REQUEST['resid']) .
            "' ORDER BY id ASC ";
        #echo "<br>sss--->".$sel;
        $res = $this->ExecuteQuery($sel, "select");
        //echo "<pre>===>";print_r($res);echo "</pre>";

        if (isset($_REQUEST['eid']) && !empty($_REQUEST['eid']))
        {
            $cond .= "AND menuaddons_menuid = '" . $this->filterInput($_REQUEST['eid']) . "'";
            #$sort_by	=	"ORDER BY menuaddons_menuid ASC LIMIT 1";
        }elseif(isset($_REQUEST['menuid']) && !empty($_REQUEST['menuid'])){
            $cond .= "AND menuaddons_menuid = '" . $this->filterInput($_REQUEST['menuid']) . "'";
        }
        /*elseif( isset($menu_id) && !empty($menu_id) ){
        $cond .= "AND menuaddons_menuid = '".$menu_id."'";
        }*/

        if ($maincat_option == 'pizza')
        {
            $catcond .= ' AND menu_catoption = "' . $maincat_option .
                '" AND menuaddons_restaurantid = "' . $this->filterInput($_REQUEST['resid']) . '" ';
        } else
        {
            $catcond .= ' AND menu_catoption = "' . $maincat_option .
                '" AND menuaddons_restaurantid = "' . $this->filterInput($_REQUEST['resid']) . '" ';
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
                "maincateid = '" . $this->filterInput($res[$key]['category_id']) . "'");

            if ($maincat_option == 'pizza')
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . "  " . $cond .
                    " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($res[$key]['category_id']) . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");
            }
            #Normal Category:
            else
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($res[$key]['category_id']) . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");
            }
        }
        return $res;
        //echo "<pre>";print_r($res);echo "</pre>";
        #echo "<br>cnt-->".count($res);
        $objSmarty->assign("showSubAddonslist", $res);
        $objSmarty->assign("cntmenuSubAddons1", count($res));

        //$admin_smarty->assign("showSubAddonslist", $res);
        //$admin_smarty->assign("cntmenuSubAddons1", count($res));
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
            $resid = $this->filterInput($_REQUEST['resid']);
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
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND menuaddons_menuid = '" . $menuid . "' ");
            $res_addon[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption",
                $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND menuaddons_menuid = '" . $menuid . "'");
            $res_addon[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
                "' AND menuaddons_menuid = '" . $menuid . "'");

            $res_addon[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) .
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
        
        //$objSmarty->assign("sliceaddonprice_arr", $sliceaddonprice_arr_new);
        
        //$admin_smarty->assign("sliceaddonprice_arr", $sliceaddonprice_arr_new);
        return $sliceaddonprice_arr_new;
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
                " as menu ON cat.maincateid = menu.menu_category WHERE cat.maincateid = '" . $this->filterInput($_REQUEST['catid']) .
                "' GROUP BY menu.maincat_option";
        } else
        {
            $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM " .
                $CFG['table']['restaurant_menu'] . " WHERE id='" . $this->filterInput($eid) . "' ";
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
            $cond .= " AND piz.pizza_slice_menuid = '" . $this->filterInput($_REQUEST['menuid']) . "' ";
        }

        if (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
            'pizza')
        {
            $cat_optioncond .= " WHERE piz.pizza_slice_restaurantid = '" . $this->filterInput($_SESSION['restaurantownerid']) .
                "' AND cat.maincat_option = '" . $this->filterInput($maincat_option) . "'";
        } elseif (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
        'normal')
        {
            $cat_optioncond .= " WHERE piz.pizza_slice_categoryid = '" . $this->filterInput($cat_id) .
                "' AND piz.pizza_slice_restaurantid = '" . $this->filterInput($_SESSION['restaurantownerid']) .
                "' AND cat.maincat_option = '" . $this->filterInput($maincat_option) . "'";
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
            $CFG['table']['restaurant_addons'] . " WHERE parentid = '" . $this->filterInput($parentid) .
            "' AND status = '1' AND addonsname != '' AND restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
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
            $cond .= "AND menuaddons_menuid = '" . $this->filterInput($menuid) . "'";
            #$sort_by	=	"ORDER BY menuaddons_menuid ASC LIMIT 1";
        }

        if ($maincat_option == 'pizza')
        {
            $catcond .= ' AND menu_catoption = "' . $this->filterInput($maincat_option) .
                '" AND menuaddons_restaurantid = "' . $this->filterInput($_SESSION['restaurantownerid']) . '" ';
        } else
        {
            $catcond .= ' AND menu_catoption = "' . $this->filterInput($maincat_option) .
                '" AND menuaddons_restaurantid = "' . $this->filterInput($_SESSION['restaurantownerid']) . '" ';
        }
        #echo "<br>main cat option ".$maincat_option;
        foreach ($res as $key => $value)
        {

            #Pizza category:

            $res[$key]['menu_categoryoption'] = $this->GetValue("maincat_option", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($res[$key]['category_id']) . "'");

            if ($maincat_option == 'pizza')
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . "  " . $cond .
                    " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($res[$key]['category_id']) . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) . "' " . $catcond . " " . $cond .
                    "");
            }
            #Normal Category:
            else
            {
                $res[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . " ");

                $res[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_medium'] = $this->GetValue("menuaddons_price_medium",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_large'] = $this->GetValue("menuaddons_price_large",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menuaddons_price_slice'] = $this->GetValue("menuaddons_price_slice",
                    $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' " . $catcond . " " . $cond . "");

                $res[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
                    "' " . $cond . "");

                $res[$key]['menu_categoryname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($res[$key]['category_id']) . "'");

                if (strpos(ucwords(strtolower($res[$key]['menu_categoryname'])), 'Pizza') != false)
                {
                    $res[$key]['menu_categoryname_pizzachk'] = 'Pizza';
                } else
                {
                    $res[$key]['menu_categoryname_pizzachk'] = $res[$key]['menu_categoryname'];
                }

                $res[$key]['count'] = $this->getNumvalues($CFG['table']['restaurant_menuaddons'],
                    "menuaddons_addonsname = '" . $this->filterInput($res[$key]['id']) .
                    "' AND menuaddons_categoryid = '" . $this->filterInput($res[$key]['category_id']) . "' '" . $catcond .
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
            $CFG['table']['restaurant_menu'] . " WHERE id='" . $this->filterInput($eid) . "' ";

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
				FROM " . $CFG['table']['restaurant_timing'] . " WHERE restaurant_id = '" . $this->filterInput($rid) .
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
                    "' WHERE maincateid = '" . $this->filterInput($value) . "' ";
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
                    $cccnt . "' WHERE id = '" . $this->filterInput($value) . "' ";
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
            $this->filterInput($lastorderid) . "'");
        $resname = $this->getValue("restaurant_seourl", $CFG['table']['restaurant'],
            "restaurant_id = '" . $resid . "'");

        $del = "DELETE FROM " . $CFG['table']['order'] . " WHERE orderid = '" . $this->filterInput($lastorderid) .
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
          global $CFG, $objSmarty;
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        // $currentday = date('d-m-Y');
        $currentday = date('d-m-Y');

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
            $date = date('d-m-Y');
            $day = date("D", strtotime($date));
            
        }
        
        if (isset($_POST['deliverypickup']) && !empty($_POST['deliverypickup'])) {
            
            $ordertype = $_POST['deliverypickup'];
        }

        list($res_open_status, $sfirst_open_time, $sfirst_close_time, $ffirst_open_time,
            $ffirst_close_time, $fsec_open_time, $fsec_close_time, $ssec_open_time, $ssec_close_time) =
            $this->open_close_time_rest($resid,$date);

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
            $nowtime = strtotime(date("h", time()) . ":" . $minute . " " . date("A", time()));;
            #echo"ddddddddddddddd->". $nowtime;
            if($nowtime == ''){
                $nowtime = time();
            }
            /**if ($nowtime > $yy_sfirst_open_time)
            {
                $yy_sfirst_open_time = $nowtime;
            }
            if ($nowtime > $yy_ffirst_open_time)
            {
                $yy_ffirst_open_time = $nowtime;
            }**/
            if ($nowtime > $yy_fsec_open_time)
            {
                $yy_fsec_open_time = $nowtime;
            }
            if ($nowtime > $yy_ssec_open_time)
            {
                $yy_ssec_open_time = $nowtime;
            }
        }
        
       // echo "--".$yy_sfirst_open_time.date("h:i A", $yy_sfirst_open_time)."<br>";
       // echo "-----".$yy_sfirst_close_time.date("h:i A", $yy_sfirst_close_time)."<br>";

        if (isset($yy_sfirst_open_time) && !empty($yy_sfirst_open_time) && isset($yy_sfirst_close_time) &&
            !empty($yy_sfirst_close_time))
        {
            //echo "yes1";
            for ($i = $yy_sfirst_open_time; $i <= $yy_sfirst_close_time; $i++)
            {
                //echo "1";
                if (($ordertype == 'delivery') && ($i == $yy_sfirst_open_time)){
                    
                    $i = ($i + (45 * 60));
                } 
                else 
                {
                    $i = ($i + (15 * 60));    
                }
                
                #echo "<br />i=>".$i."--".date('g:i A',$i);
                if ($i > $yy_sfirst_close_time)
                    $i = $yy_sfirst_close_time;

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
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
                if (($ordertype == 'delivery') && ($i == $yy_ffirst_open_time)) {
                       
                   $i = $i + (45 * 60); 
                } else {
                    
                    $i = ($i + (15 * 60));
                }
                
                if ($i > $yy_ffirst_close_time)
                    $i = $yy_ffirst_close_time;
                #echo "<br />i=>".$i."--".date('g:i A',$i);

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
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
                if (($ordertype == 'delivery') && ($i == $yy_fsec_open_time)) {
                       
                   $i = $i + (45 * 60); 
                } else {
                    
                    $i = $i + (15 * 60);
                }
                
                if ($i > $yy_fsec_close_time)
                    $i = $yy_fsec_close_time;
                //echo "<br />i=>".$i."--".date('h:i A',$i)."=>".$i;

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
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
                if (($ordertype == 'delivery') && ($i == $yy_ssec_open_time)) {
                       
                   $i = $i + (45 * 60); 
                } else {
                    
                    $i = $i + (15 * 60);
                }
                
                if ($i > $yy_ssec_close_time)
                    $i = $yy_ssec_close_time;
                //echo "<br />i=>".$i."--".date('g:i A',$i);

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
            }
        }
        $objSmarty->assign("times", $content);
        $objSmarty->assign("rest_status", $res_open_status);

    }
    /**
     * Site::checkdatePickerDate()
     * 
     * @return
     */
    function checkbookingdatePickerDate($resid)
    {
          global $CFG, $objSmarty;
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        // $currentday = date('d-m-Y');
        $currentday = date('d-m-Y');

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
            $date = date('d-m-Y');
            $day = date("D", strtotime($date));
        }
        
       

        list($res_open_status, $sfirst_open_time, $sfirst_close_time, $ffirst_open_time,
            $ffirst_close_time, $fsec_open_time, $fsec_close_time, $ssec_open_time, $ssec_close_time) =
            $this->open_close_time_rest($resid,$date);

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
            $nowtime = strtotime(date("h", time()) . ":" . $minute . " " . date("A", time()));;
            #echo"ddddddddddddddd->". $nowtime;
            if($nowtime == ''){
                $nowtime = time();
            }
            /**if ($nowtime > $yy_sfirst_open_time)
            {
                $yy_sfirst_open_time = $nowtime;
            }
            if ($nowtime > $yy_ffirst_open_time)
            {
                $yy_ffirst_open_time = $nowtime;
            }**/
            if ($nowtime > $yy_fsec_open_time)
            {
                $yy_fsec_open_time = $nowtime;
            }
            if ($nowtime > $yy_ssec_open_time)
            {
                $yy_ssec_open_time = $nowtime;
            }
        }
        
       // echo "--".$yy_sfirst_open_time.date("h:i A", $yy_sfirst_open_time)."<br>";
       // echo "-----".$yy_sfirst_close_time.date("h:i A", $yy_sfirst_close_time)."<br>";

        if (isset($yy_sfirst_open_time) && !empty($yy_sfirst_open_time) && isset($yy_sfirst_close_time) &&
            !empty($yy_sfirst_close_time))
        {
            //echo "yes1";
            for ($i = $yy_sfirst_open_time; $i <= $yy_sfirst_close_time; $i++)
            {
                //echo "1";
                if (($i == $yy_sfirst_open_time)){
                    
                    $i = ($i + (30 * 60));
                } 
                else 
                {
                    $i = ($i + (15 * 60));    
                }
                
                #echo "<br />i=>".$i."--".date('g:i A',$i);
                if ($i > $yy_sfirst_close_time)
                    $i = $yy_sfirst_close_time;

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
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
                if (($i == $yy_ffirst_open_time)) {
                       
                   $i = $i + (30 * 60); 
                } else {
                    
                    $i = ($i + (15 * 60));
                }
                
                if ($i > $yy_ffirst_close_time)
                    $i = $yy_ffirst_close_time;
                #echo "<br />i=>".$i."--".date('g:i A',$i);

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
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
                if (($i == $yy_fsec_open_time)) {
                       
                   $i = $i + (30 * 60); 
                } else {
                    
                    $i = $i + (15 * 60);
                }
                
                if ($i > $yy_fsec_close_time)
                    $i = $yy_fsec_close_time;
                //echo "<br />i=>".$i."--".date('h:i A',$i)."=>".$i;

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
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
                if (($i == $yy_ssec_open_time)) {
                       
                   $i = $i + (30 * 60); 
                } else {
                    
                    $i = $i + (15 * 60);
                }
                
                if ($i > $yy_ssec_close_time)
                    $i = $yy_ssec_close_time;
                //echo "<br />i=>".$i."--".date('g:i A',$i);

                $content .= '<option value="' . date("h:i A", $i) . '">' . $day . '  - ' . date("h:i A",
                    $i) . '</option>' . "\n";
            }
        }
        $objSmarty->assign("times", $content);
        $objSmarty->assign("rest_status", $res_open_status);

    }
    #Search Result
    /**
     * Site::open_close_time_rest()
     * 
     * @return
     */
    function open_close_time_rest($resid,$date)
    {
        global $CFG, $objSmarty;

       // $day = date("l");
       $day = date("l",strtotime($date));
       //echo $day;
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
            "	WHERE rest.restaurant_id = '" . $this->filterInput($resid) . "' ";
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
        #echo "<pre>";print_r($sqlres);echo "</pre>";   
        if ($sqlres['0']['first_status'] == 'Open' || $sqlres['0']['second_status'] ==
            'Open')
        {
            $sqlres['0']['status'] = 'Open';
        } else
        {
            $sqlres['0']['status'] = 'Closed';
        }

        $objSmarty->assign("rest_timing_status", $sqlres['0']['status']);

        #echo "<pre>";print_r($sqlres);echo "</pre>";
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
            //$dec_rrr_opentime_pre = strtotime($rrr_opentime_pre);
        if (isset($rrr_closetime_pre) && !empty($rrr_closetime_pre))
            //$dec_rrr_closetime_pre = strtotime($rrr_closetime_pre);
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
                } 
                
                else
                {
                    $first_openclosetype = "Closed";
                }
                //echo $first_openclosetype;
            }
                        
            
            if($dec_rrr_opentime_pre < $dec_rrr_closetime_pre){
                  #echo "<br />1111<br>";
                	$first_open_time 	= $dec_rrr_opentime_pre;
				    $first_close_time 	= $dec_rrr_closetime_pre;
                    
                    #Time status
                    if( ($dec_rrr_nowtime > $first_open_time ) &&  ($first_close_time > $dec_rrr_nowtime) )
                    {
                        $first_openclosetype = "Open";
                    }else{
                        $first_openclosetype = "Closed";
                    }
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
    #====================================================================================
    #                           Send GCM Notification To Android Mobile
    #====================================================================================
    function sendGCMnotification($status,$registatoin_ids,$order,$restaurant,$reason=''){
        global $CFG;
        
        $registatoin_ids = array($registatoin_ids);
        if(trim($status) == 'processing'){
            //$message    = array("message"=>"Hi valued customer, Your order(".$order.") is accepted by ".$restaurant." and moved to process stage.");
            $message    = array("message"=>"Your order(".$order.") is accepted.");
        }elseif(trim($status) == 'completed'){
            $message    = array("message"=>"Your order(".$order.") delivered.");
        }elseif(trim($status) == 'failed'){
            $message    = array("message"=>"Your order(".$order.") cancelled.");
        }elseif(trim($status) == 'pending'){
            $message    = array("message"=>"Your have a new order(".$order.").");
        }
        
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );

        $headers = array(
            'Authorization: key=' . $CFG['site']['google_api_key'],
            'Content-Type: application/json'
        );
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
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        echo $result;
        return $result;
        //echo "<pre>"; print_r(json_decode($result)); echo "</pre>";
    }
    
    #------------------------Voucher-------------------------------------
    /**
     * Check Avail Any Voucher For Restaurant
     */
    function checkAnyVoucher($resId)
    {
        global $CFG, $admin_smarty, $objSmarty;
        
        if ($resId != '' && (!$_SESSION['voucher'] && $_SESSION['voucher'] != $resId)) {
            $voucherCnt = $this->getNumvalues($CFG['table']['restaurant_voucher'],"restaurant_id = '".$this->filterInput($resId)."'");
            //echo "======>".$voucherCnt;
            if ($voucherCnt > 0) {
               //echo "set";
                $objSmarty->assign('voucher','Available');
                $admin_smarty->assign('voucher','Available');
            } else {
                //echo "not set";
                $objSmarty->assign('voucher','Not Available');
                $admin_smarty->assign('voucher','Not Available');
            }
        }
        
    }
    

    function checkArea(){
    
        global $CFG,$objSmarty;
        
        $array = $this->filterInput($_POST['searcharea']);
        $arr   = htmlspecialchars($array);
        //echo $arr;
        //$this->pr($array);
        if(is_numeric($array)) {
          $areadetail= $this->getMultiValue("zipcode_id,area_seourl",$CFG['table']['zipcode'],"zipcode = '".addslashes($arr)."' AND zipcode_status ='1' ");
        } else {
          $areadetail= $this->getMultiValue("zipcode_id,area_seourl",$CFG['table']['zipcode'],"areaname = '".addslashes($arr)."' AND zipcode_status ='1' ");
        }
        
        //$this->pr($resdetail);
        if($areadetail != ''){
            echo $areadetail[0]['zipcode_id'];
        } else {
            echo "no_results";
                
        }
    
  } 
    /**
     * Get voucher details by code
     */
    function voucherDetailByCode($resid,$voucherCode)
    {
        global $CFG;
        
        $today = date("Y-m-d");
        
        if ($resid != '' && $voucherCode != '') {
            
            $selQry     = "SELECT vr.id, vr.voucher_name, vr.use_type, vr.off_type, vr.off_price_percentage, vr.valid_from, vr.valid_to".
                            " FROM ".$CFG['table']['voucher']." AS vr ".
                            " LEFT JOIN ".$CFG['table']['restaurant_voucher']." AS rvr ON vr.id = rvr.voucher_id ".
                            " WHERE vr.status = '1' AND vr.voucher_name = '".$voucherCode."' AND rvr.restaurant_id = '".$resid."' AND vr.valid_from <= '".$today."' AND vr.valid_to >= '".$today."' ORDER BY vr.id ASC LIMIT 1 ";
            $voucherDet = $this->ExecuteQuery($selQry,'select');
            
            //echo $selQry;
            
            if (empty($voucherDet)) {
                $voucherDet = 'Not Avail';
            }
            return $voucherDet;
        }
        
    }
   /**
     * Get voucher details by code
     */
     
     #Yelp Reviews
    function yelpRestuarantReviews($resId){
        global $CFG,$objSmarty;
        
        
        //echo "hello";
        define('YELP_YWSID','HUAsv_4hzpyAWiVGRW5qGw');
        
        $phoneno = $this->getValue("restaurant_phone",$CFG['table']['restaurant'],"restaurant_id ='".$this->filterInput($resId)."' ");
              
        $api_url = "http://api.yelp.com/phone_search"; 
            
        $params = array( 
                "phone" => $phoneno,
                "ywsid" => YELP_YWSID 
        );                                             //phone = 4152550300  ywsid = _uiQr9Hp0g88vHaXeEVRDg
        // echo $resId."<br>";
        // echo $phoneno."<br>";
        // Build Query String 
        $p_cnt = '0'; 
        foreach ($params as $key => $val) { 
                if (empty($val)) continue; 
                $api_url .= (($p_cnt == '0') ? "?" : "&") . $key . "=" . 
        urlencode($val); 
                $p_cnt++; 
        } 
        
        // Send Yelp API Call 
        $ch = curl_init($api_url); 
        // Verbose mode 
        curl_setopt($ch, CURLOPT_VERBOSE, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        $data = curl_exec($ch); // Yelp response 
        curl_close($ch); 
        
        // Handle Yelp response data 
        $response = json_decode($data); 
        
        $yelp_reviews= array();

        $yelp_reviews[0] = $response->businesses[0]->review_count;
        $yelp_reviews[1] = $response->businesses[0]->rating_img_url;
        $yelp_reviews[2] = $response->businesses[0]->url;
        $yelp_reviews[3] = $response->businesses[0]->reviews[0]->rating_img_url;
        $yelp_reviews[4] = $response->businesses[0]->reviews[0]->text_excerpt;
        $yelp_reviews[5] = $response->businesses[0]->reviews[0]->user_photo_url;
        $yelp_reviews[6] = $response->businesses[0]->reviews[0]->date;
        $yelp_reviews[7] = $response->businesses[0]->reviews[0]->user_name;  
        $yelp_reviews[8] = $response->businesses[0]->reviews[0]->url;         
        
        $objSmarty->assign("yelp_reviews", $yelp_reviews);
        //$objSmarty->assign("phoneno", $phoneno);
    }
     #Call+sms Order
     function callSmsOrder($ordid){
        
        global $CFG, $objSmarty, $admin_smarty;
        //$ordid = '358';                
        $finalorderid = "ORD" . $ordid;
        //echo "hai";exit;
        //$noofrows = $this->getValue($CFG['table']['order'], "maincatename='" . $menu_catothers . "'");$cusPhResPh[0]['twillo_call_status']
        #Get det
        $getTwiloDet = $this->getMultiValue("site_twiliosms_sid,site_twiliosms_token,site_phone,admin_email", $CFG['table']['sitesetting'], "id = '1' ");  
        
        $site_phone = $getTwiloDet[0]['site_phone'];
        $cusPhResxx  = "SELECT customercellphone,restaurant_id,twillo_call_status FROM ".$CFG['table']['order']." WHERE orderid = '".$this->filterInput($ordid)."' ";
        //$sel = "SELECT id, category_name, restaurant_id FROM " . $CFG['table']['category'] ." WHERE status = '1' $cond ORDER BY category_name ASC  ";
        //echo $cusPhResxx;
        $cusPhResPh  = $this->ExecuteQuery($cusPhResxx,'select');
        
        $ResPh       = $this->getMultiValue("restaurant_contact_phone,order_phone_number,restaurant_contact_email",$CFG['table']['restaurant'], "restaurant_id = '".$this->filterInput($cusPhResPh[0]['restaurant_id'])."' ");   
        
        $callCount = $this->getValue("twillo_callCount",$CFG['table']['order'], "orderid = ".$this->filterInput($ordid)." ");
      
        if($callCount < 4){
            //fwrite($smsCheck, "callcount1");
            $callCount++; 
            $sql_insert = "UPDATE 
                                " . $CFG['table']['order'] . " 
                              SET 
                           twillo_callCount = ".$callCount." 
                           WHERE orderid    = '".$ordid."' ";
            $this->ExecuteQuery($sql_insert, 'update');               
             //fwrite($smsCheck, date("M d, Y H:i:s")." sql ".$sql_insert." ");               
        }       
                
        if($ResPh[0]['order_phone_number'] != ''){
            $restaurant_order_phone = preg_replace('/[^0-9\.]/', '', $ResPh[0]['order_phone_number']);
            //$ResPh = '001'.$restaurant_order_phone;
            //$ResPh = '+1'.$restaurant_order_phone;
            $ResPhone = '+'.$restaurant_order_phone;
        }else{
            $restaurant_contact_phone = preg_replace('/[^0-9\.]/', '', $ResPh[0]['restaurant_contact_phone']);
           // $ResPh = '+1'.$restaurant_contact_phone;
            $ResPhone = '+'.$restaurant_contact_phone;
        }
       
        
        $sid    = $CFG['site']['site_twilio_sid'];
        $token  = $CFG['site']['site_twilio_token'];
        $number = $CFG['site']['site_twilio_from'];
        $version= "2010-04-01";
        //$_SESSION['phcusid']=$cusPhResPh[0]['customercellphone'];
        //$_SESSION['phcusid']= $getTwiloDet[0]['twilio_countrycode'].'8883852010';
        //$phcusid= $getTwiloDet[0]['twilio_countrycode'].$cusPhResPh[0]['customercellphone'];
        $phcusid = preg_replace('/[^0-9\.]/', '', $cusPhResPh[0]['customercellphone']);
        
        require_once dirname(__FILE__) . '/Services/Twilio.php';

        $client = new Services_Twilio($sid, $token ,$version);
        
        $callCount = $this->getValue("twillo_callCount",$CFG['table']['order'], "orderid = ".$ordid." ");
              
        #send to restaurant number
        if($callCount <= 3){          
       // $call = $client->account->calls->create($number,$resNumber,'http://eatle.com/twillo/voice.xml' );
            //sleep(180);
            sleep(20);
            
            if($cusPhResPh[0]['twillo_call_status'] == 'No'){
                
                 $call = $client->account->calls->create($number,$ResPhone,$CFG['site']['base_url_https'].'/twi_voice.php?cusNum='.$phcusid.'&orderid='.$ordid.'&callcount='.$callCount.'&site_phone='.$site_phone.''); 
                 
            }           
        }
          
     }
     
     
    function checkRestVoucherValid($resid){
        
        global $CFG,$objSmarty;
        
        $today = date("Y-m-d");
        $sql =  " SELECT vou.id, vou.voucher_name, vou.off_type, vou.off_price_percentage, vou.valid_from, vou.valid_to,".
                " rest_vou.restaurant_id".
                " FROM ".$CFG['table']['voucher']." AS vou ".
                " LEFT JOIN ".$CFG['table']['restaurant_voucher']." AS rest_vou ON  vou.id = rest_vou.voucher_id".
                " WHERE vou.valid_from <= '" . strtotime($today) ."' AND vou.valid_to >= '" . strtotime($today) . "' AND rest_vou.restaurant_id = '" . $this->filterInput($resid) . "' AND vou.status = '1'";
    
        $res = $this->ExecuteQuery($sql,'select');
        $objSmarty->assign("restVoucherDetails", $res);
    }
    //-----------------------------------------------------------------------
    function deliveryAreaCheck(){
        
        global $CFG;
        
       #echo "<pre>";print_r($_REQUEST);echo "</pre>";
       #exit;
        
        $resid              = $this->filterInput($_POST['restid']);
        $deliveryStreet     = $this->filterInput($_POST['deliverystreet']);
        $deliveryCity       = $this->filterInput($_POST['deliverycity']);
        $cityName           = $this->getValue("cityname",$CFG['table']['city'],"city_id = '".$deliveryCity."'");
        $deliverystate       = $this->filterInput($_POST['deliverystate']);
        $stateName           = $this->getValue("statename",$CFG['table']['state'],"statecode = '".$deliverystate."'");
        //$zipCode            = $_POST['deliveryzip'];
        
        /*if(is_numeric($_POST['deliveryzip'])){
            
            $areaName       = $this->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id = '".$_POST['deliveryzip']."'");
        }else{
            $areaName       = $_POST['deliveryzip'];
        }*/
       
        list($find_lat, $find_long) = $this->findLatLongFromAddress($deliveryStreet,   $cityName  ,$stateName , $country = '');
        if ($resid != '' && $find_lat != '' && $find_long != '') {
            
            $select_gmap_service = " ROUND(  ( 3959  * acos( cos( radians(" . $find_lat .
                                   ") ) * cos( radians( restaurant_lat ) ) * cos( radians( restaurant_long ) - radians(" .
                                    $find_long . ") ) + sin( radians(" . $find_lat .
                                   ") ) * sin( radians( restaurant_lat ) ) ) ),2  ) AS distance ";
                                   
            $distanceSel         = "SELECT restaurant_delivery_distance, ".$select_gmap_service." FROM ".$CFG['table']['restaurant'].
                                     " WHERE restaurant_id = '".$resid."'"; 
                                            
            $distance = $this->ExecuteQuery($distanceSel,'select');
            #echo"dist->".$distance[0]['distance'];
            #echo"lat->".$find_lat;
            //echo"long->".$find_long;
            if ($distance[0]['distance'] <= $distance[0]['restaurant_delivery_distance']) {
                echo "Available";
            } else {
                echo "NotAvailable";
            }
            
        } else {
            echo "NotAvailable";
        }
        die();
    }
    
    /**
     * Site::dispatchFoodSystem()
     * 
     * @param mixed $data
     * @param mixed $action
     * @return response from dispatch system
     */
    public function dispatchFoodSystem($data, $action) {
        $jsonData   = json_encode($data);
        $action     = strtolower($action);
        switch ($action) {
            case 'order':
                $serviceUrl = 'http://dispatch.comeneat.com/orders/clientOrder/DISPATCHSYSTEM';
            break;
            
            case 'restaurant':
                $serviceUrl = 'http://dispatch.comeneat.com/restaurants/addRestaurant/DISPATCHSYSTEM';
            break;
            
            default:
                return false;
            break;
        }
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_URL => $serviceUrl,
                                CURLOPT_USERAGENT => 'DISPATCHSYSTEM',
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => array(
                                        $action => $jsonData
                                    )
                            )
                         );
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        
        $info = curl_getinfo($curl);
        // Close request to clear up some resources
        curl_close($curl);
        return $info;
    }
    public function dispatchSystemOrder($orderId) {
        global $CFG;
        if ($orderId != '') {
            $orderQry = "SELECT ordergenerateid, restaurant_id, customer_id, customername, customeremail, customercellphone, offeramount, deliveryamount, taxamount, ordersubtotal, ordertotalprice, deliverydate, deliverytime, payment_type, payment_status, deliverystreet, deliverycity, deliverystate, deliverytype, instructions, deliveryzip
                        FROM ".$CFG['table']['order'].
                        " WHERE orderid = '".$this->filterInput($orderId)."' LIMIT 1 ";
            $orderDetails = $this->ExecuteQuery($orderQry, 'select');
            if ($orderDetails[0]['deliverytype'] == 'delivery') {
                $city = $this->getValue('cityname', $CFG['table']['city'], "city_id = '".$this->filterInput($orderDetails[0]['deliverycity'])."'");
                $state = $this->getValue('statename', $CFG['table']['state'], "statecode = '".$this->filterInput($orderDetails[0]['deliverystate'])."'");
                $data       = array(
                                'Order'=>array(
                                    'restaurant_id'=>$orderDetails[0]['restaurant_id'],
                                    'customer_id'=>$orderDetails[0]['customer_id'],
                                    'customer_name'=>$orderDetails[0]['customername'],
                                    'customer_email'=>$orderDetails[0]['customeremail'],
                                    'customer_phone'=>$orderDetails[0]['customercellphone'],
                                    'isoffer'=>($orderDetails[0]['offeramount'] < 0) ? 'Y' : 'N',
                                    'offertype'=>'',
                                    'offer'=>$orderDetails[0]['offeramount']!= '' ? $orderDetails[0]['offeramount']:'null',
                                    'delivery_charge'=>$orderDetails[0]['deliveryamount'],
                                    'tax'=>$orderDetails[0]['taxamount'],
                                    'subtotal'=>$orderDetails[0]['ordersubtotal'],
                                    'total'=>$orderDetails[0]['ordertotalprice'],
                                    'description'=>$orderDetails[0]['instructions'],
                                    'order_date'=>$orderDetails[0]['deliverydate'],
                                    'order_time'=>$orderDetails[0]['deliverytime'],
                                    'isasap'=>(strtolower($orderDetails[0]['deliverytime']) == 'asap') ? 'Y' : 'N',
                                    'custom_order_id'=>$orderDetails[0]['ordergenerateid'],
                                    'delivery_address'=>$orderDetails[0]['deliverystreet'].",".$city.",".$state.",".$orderDetails[0]['deliveryzip'],
                                    'payment_type'=>$orderDetails[0]['payment_type'],
                                    'payment_status'=>($orderDetails[0]['payment_type'] == 'P') ? 'Paid' : 'Not Paid',
                                    'order_item'=>$menu
                                )
                            );
                $menuList = $this->getMultiValue('menuname, addonsname, menuprice,quantity,tot_menuprice,specialinstruction', $CFG['table']['restaurant_cart'], "orderid = '".$this->filterInput($orderId)."'");
                if (!empty($menuList)) {
                    $menu = array();
                    foreach ($menuList as $key => $value) {
                        $menuName = $value['menuname'];
                        $menuName = ($value['addonsname'] != '') ? $menuName.' :: '.$value['addonsname'] : $menuName;
                        $menu[$key]['item_name'] = $menuName;
                        $menu[$key]['qty']       = $value['quantity'];
                        $menu[$key]['price']     = $value['menuprice'];
                        $menu[$key]['item_total_price'] = $value['tot_menuprice'];
                        $menu[$key]['description'] = $value['specialinstruction'];
                        $menuName = '';
                    }
                    $data['Order']['order_item'] = $menu;
                    $this->dispatchFoodSystem($data, 'order');
                }
            }
        }
    }
    /**
     * Site::changeOrderStatusFleet()
     * 
     * @param mixed $orderId
     * @param mixed $status
     * @return void
     */
    public function changeOrderStatusFleet($orderId, $status) {
        global $CFG;
        
        $id = $this->getValue('id', $CFG['table']['order'], "ordergenerateid = '".$this->filterInput($orderId)."'");
        if ($id != '') {
            if ($status == 'Accepted' || $status == 'Picked up' || $status = 'On the way') {
                $this->getUpdate($CFG['table']['order'], "status = 'processing'", "id = '".$id."'");
            } elseif ($status = 'Delivered') {
                $this->getUpdate($CFG['table']['order'], "status = 'completed'", "id = '".$id."'");
            }
        }
    }

}


?>
