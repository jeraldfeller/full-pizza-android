<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-23 20:49:01
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1207909060580d688d79aec8-12329566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '084f2239c7bce7fc3015479d3c852537e09534e1' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/login.tpl',
      1 => 1473176818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1207909060580d688d79aec8-12329566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_FAVICON' => 0,
    'SITE_IMAGE_LOGO_URL' => 0,
    'SITE_LOGO' => 0,
    'SITE_NAME' => 0,
    'WOOPRA_ANALYTIC_CODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580d688d8b51b5_64270502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580d688d8b51b5_64270502')) {function content_580d688d8b51b5_64270502($_smarty_tpl) {?><!DOCTYPE html >
<html >
<head>
	<title>Admin Panel Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <?php if ($_smarty_tpl->tpl_vars['SITE_FAVICON']->value!='') {?>
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_LOGO_URL']->value;?>
/favicon.ico" type="image/x-icon" />
	<?php }?>
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
          <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_LOGO']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
" style="width:80%;height:auto;" />
          
        </div>
        <div class="form-area">
        	<div id="error_msg" class="text-danger text-center margin-bottom-15"></div>
	        <div class="group">
	          	<input type="text" class="form-control" name="admin_username" id="admin_username" placeholder="Admin name" />
				<?php echo '<script'; ?>
>document.loginfrm.admin_username.focus();<?php echo '</script'; ?>
>
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
	<?php if ($_smarty_tpl->tpl_vars['WOOPRA_ANALYTIC_CODE']->value!='') {?>
	<!-- Start of Woopra Code -->
	<?php echo $_smarty_tpl->tpl_vars['WOOPRA_ANALYTIC_CODE']->value;?>

	<!-- End of Woopra Code -->
	<?php }?>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.11.1.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 type="text/javascript">
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
	<?php echo '</script'; ?>
>
	
	
</body>
</html><?php }} ?>
