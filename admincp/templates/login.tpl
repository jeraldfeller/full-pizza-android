<!DOCTYPE html >
<html >
<head>
	<title>Admin Panel Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    {if $SITE_FAVICON neq ''}
	<link rel="shortcut icon" href="{$SITE_IMAGE_LOGO_URL}/favicon.ico" type="image/x-icon" />
	{/if}
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" />
	<link href="css/font-awesome.css" type="text/css" rel="stylesheet" />
	<link href="css/awesome-bootstrap-checkbox.css" type="text/css" rel="stylesheet" />
</head>

<body >
	<div class="login-form">
      	<form name="loginfrm" method="post" onsubmit="return loginValidate();">
        <div class="top">
          <img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" style="width:80%;height:auto;" />
          
        </div>
        <div class="form-area">
        	<div id="error_msg" class="text-danger text-center margin-bottom-15"></div>
	        <div class="group">
	          	<input type="text" class="form-control" name="admin_username" id="admin_username" placeholder="Admin name" />
				<script>document.loginfrm.admin_username.focus();</script>
	            <i class="fa fa-user"></i>
	        </div>
          <div class="group">
          	<input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Password" autocomplete="off"/>
            <i class="fa fa-key"></i>
          </div>
         
          <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
     
    </div>
	{if $WOOPRA_ANALYTIC_CODE neq ''}
	<!-- Start of Woopra Code -->
	{$WOOPRA_ANALYTIC_CODE}
	<!-- End of Woopra Code -->
	{/if}
	<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	{literal}
	<script type="text/javascript">
	function loginValidate(){
		
		var admin_username = $("#admin_username").val();
		var admin_password = $("#admin_password").val();
        var os_destination = $("#os_destination").val();
		//$("#errobox").removeClass("shake animated");
		if(admin_username == ''){
			$("#error_msg").html("Please enter the Admin Name");
			$("#admin_username").focus();
			return false;
		}else if(admin_password == ''){
			$("#error_msg").html("Please enter the Password");
			$("#admin_password").focus();
			return false;
		}else{
            
            
			$.post('adminAjaxFile.php',{"admin_username":admin_username,"admin_password":admin_password,"os_destination":os_destination,"action":"checkAdminLogin"},function(response){
			 				
				if(response == "Invalid_Login")
				{
					$("#error_msg").html("Invalid Login");
					//$("#errobox").addClass("shake animated");
                    $("#admin_password").val('');
					//$("#admin_username").css({"border-color":"#b82323","box-shadow":"0 0 8px rgba(184,60,60,0.5)"});
					//$("#admin_password").css({"border-color":"#b82323","box-shadow":"0 0 8px rgba(184,60,60,0.5)"});
					return false;
				}
                if(response == "deactive")
				{
					$("#error_msg").html("Your Login Account is in deactivate status");
                   // $("#errobox").addClass("shake animated");
					return false;
				}
                else{
                    //alert(response);
                    //return false;
					//window.location.href = "index.php";
                    window.location.href = response;
				}
			});
			return false;
		}
	}
	$(function(){
		$("body.loginbg").css("min-height", $(window).height());
	});
	</script>
	{/literal}
	
</body>
</html>