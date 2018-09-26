<?php

/*payflow.php
*
*used to store functions for the payflow class
*
*/

class Payflow{

/*__construct()
  *
  *Creates the Payflow Object and stores the
  *credentials for the API caller
  */
	public function __construct(){
		global $CFG;
		
	    $this->user 	= $CFG['site']['payflow_user'];
	    $this->vendor 	= $CFG['site']['payflow_vendor'];
	    $this->partner 	= $CFG['site']['payflow_partner'];
	    $this->pwd 		= $CFG['site']['payflow_pwd'];
	    $this->endpoint = $CFG['site']['payflow_endpoint'];//"https://pilot-payflowpro.paypal.com";
	}//end constructor
   
   
/*getSecureToken(string, string, string, string, string, string, string, string, string, string, string)
  *
  *This function sets the values for the
  *secureTokenID, invoice number, and assigns
  *other variables as needed for the call
  *this uses hard coded values for example
  *purposes.
  *
  *@return array $response
  */
	public function getSecureToken($amt, $invnum, $fname, $lname, $street1, $city, $state, $zip, $country, $email, $phone){
		
		//Delivery
		$hr_delivery 		= $_POST['hr_delivery'];
		$min_delivery 		= $_POST['min_delivery'];
		$sess_delivery 		= $_POST['sess_delivery'];
		$deliverytype 		= $_POST['deliverypickup'];
		$datedelivery 		= $_POST['datedelivery'];
		$deliveryassoonas 	= $_POST['foodassoonas'];
		if($deliveryassoonas == '0' || $deliveryassoonas == ''){
			$deliverytime 	= $hr_delivery.':'.$min_delivery.' '.$sess_delivery;
		}else{
			$deliverytime 	= '';
		}
		
	  //create a SECURETOKENID
	  $secureTokenID = $this->guid();
	   $reqstr = "&TRXTYPE=S&"
	       . "TENDER=C&"
	       . "INVNUM=" . $invnum . "&"
	       . "AMT=" . $amt . "&"
	       . "CURRENCY=USD&"
	       . "STREET=". $street1 . "&"
	       . "NAME=" . $fname . " " . $lname . "&"
	       . "CITY=" . $city . "&"
	       . "STATE=" . $state . "&"
	       . "ZIP=" . $zip . "&"
	       . "COUNTRY=" . $country . "&"
	       . "EMAIL=" . $email . "&"
	       . "PHONE=". $phone . "&"
	       . "CUSTID=". base64_encode($_SESSION['customerid']) . "&"
	       . "USER1=creditcard&"
	       . "USER2=". base64_encode($_POST['restid']) . "&"
	       . "USER3=". $datedelivery . "&"
	       . "USER4=". $deliverytime . "&"
	       . "USER5=". $deliveryassoonas . "&"
	       . "USER6=". $deliverytype . "&"
	       . "USER7=". $_POST['offer'] . "&"
	       . "CREATESECURETOKEN=Y&"
	       . "VERBOSITY=HIGH&"
	       . "SECURETOKENID=" . $secureTokenID;
	   $credstr = "USER=" . $this->user . "&VENDOR=" . $this->vendor . "&PARTNER=" . $this->partner . "&PWD=" . $this->pwd;
	  
	  //combine the strings
	  $nvp_req = $credstr . $reqstr;
	  //set the endpoint to a local var:
	  $endpoint = $this->endpoint;
	  //make the call
	  $response = $this->PPHttpPost($endpoint, $nvp_req);
	
	  return $response;
	}//end getToken call

/*PPHttpPost(string, string)
  *
  *PPHttpPost takes in two strings, and
  *makes a curl request and returns the result.
  *
  *@return array $httpResponseAr
  */
	public function PPHttpPost($endpoint, $nvpstr){
	
		// setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		
		// turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		// setting the NVP $my_api_str as POST FIELD to curl
		curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpstr);
		
		// getting response from server
		$httpResponse = curl_exec($ch);
		
		if(!$httpResponse)
		{
		   $response = "$API_method failed: ".curl_error($ch).'('.curl_errno($ch).')';
		   return $response;
		}
		$httpResponseAr = explode("&", $httpResponse);
		
		return $httpResponseAr;
		
	}//end PPHttpPost function



/*getMySecureToken(array)
  *
  *This takes in the response array from the
  *PPHttpPost call, and parses out the SecureToken
  *
  *This is used because the securetoken may contain
  *an "=" sign
  *
  *@return string $secure_token
  */
	public function getMySecureToken($response){
	  $secure_token = $response[1];
	  $secure_token = substr($secure_token, -25);
	
	  return $secure_token;
	}//end getSecureToken()

/*parseResponse(array)
  *
  *This function parses out the response without taking
  *into account that the securetoken may contain an "="
  *sign. The only thing you need from this is the
  *SecureTokenID.
  *
  *@return array $parsed_response
  */
	public function parseResponse($response){
		$parsed_response = array();
		foreach ($response as $i => $value)
		{
		  $tmpAr = explode("=", $value);
		  if(sizeof($tmpAr) > 1) {
		   $parsed_response[$tmpAr[0]] = $tmpAr[1];
		  }
		}
		
		return $parsed_response;
	}//end parseResponse


/*getHTML(array, string)
  *
  *This function dynamically builds the html code
  *needed for the form post button.
  *
  *@return string $html
  */
	public function getHTML($response, $securetoken){
		global $CFG;
	
		/*$html = "<form method='post' name='pf' action='https://payflowlink.paypal.com/'>
		<input type='hidden' name='SECURETOKEN' value='$securetoken' />
		<input type='hidden' name='SECURETOKENID' value='" . $response['SECURETOKENID'] . "' />
		<input type='hidden' name='MODE' value='". $CFG['site']['payflow_modetype'] ."' />
		<input type='submit' />
		</form>";*/
		$html = '<form method="post" name="pf" action="https://payflowlink.paypal.com/">
		<input type="hidden" name="SECURETOKEN" value="'. $securetoken .'" />
		<input type="hidden" name="SECURETOKENID" value="' . $response['SECURETOKENID'] . '" />
		<input type="hidden" name="MODE" value="'. $CFG['site']['payflow_modetype'] .'" />
		<input type="submit" />
		</form>';
		
		return $html;
	}//end getHTML

/*guid()
  *
  *This function creates an MD5 hash of a timestamp
  *to be used with the SecureTokenID, and Invnum
  *in the initial call
  *
  *@return string $str
  */
	public function guid(){
		//hash out a timestamp and some chars to get a 25 char token to pass in
		$str = date('l jS \of F Y h:i:s A');
		$str = trim($str);
		$str = md5($str);
		
		return $str;
	}//end guid

/*DoReferenceTransaction(string)
  *
  *Takes in an NVP String containing the PNREF, Product Name,
  *and amount. To make a reference transaction.
  *
  *@return array $response
  */
	public function DoReferenceTransaction($nvpstr){
	
		//build cred string:
		$credstr = "USER=" . $this->user . "&VENDOR=" . $this->vendor . "&PARTNER=" . $this->partner . "&PWD=" . $this->pwd;
		
		//create new invoice number
		$invnum = "INV" . $this->guid();
		
		//build the api request string
		$nvp_req = $credstr . "&INVNUM=" . $invnum . $nvpstr;
		$endpoint = $this->endpoint;
		
		$response = $this->PPHttpPost($endpoint, $nvp_req);
		
		return $response;
	}//end DoReferenceTransaction()

/*getButton(array, string)
  *
  *creates HTML code for a button link:
  */
	public function getButton($response, $securetoken){
	
		$html = "<a href='https://payflowlink.paypal.com/?SECURETOKENID=" . $response['SECURETOKENID'] . "&MODE=TEST&SECURETOKEN=" . $securetoken . "' id='submitBtn'>"
		   . "<img src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' border='0' /></a>";
		
		return $html;
	}//end getButton

}//end class

?>