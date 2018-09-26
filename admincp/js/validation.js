//--------------------------------------- Site Settings -----------------------------------------------
//site seeting


$(document).ready(function(){        
    $("#searchnormal").click(function(){
        $("#searchnormalgoogle").show();
    });
    $("#searchgoogle").click(function(){
        $("#searchnormalgoogle").hide();
    });
});
function siteSeetingValidation()
{
    /*if(viewable == 'No') {
        //alert("This is demo version.. Dont change setting details");
        window.location.href = 'demoVersion.php';
        return false;
    } else {*/
        $("#errormsg").removeClass('successmsg');
        //$(".successmsg").html('');
        $(".successmsg").hide();
        var admin_name      = $.trim($("#admin_name").val());
        var admin_email     = $.trim($("#admin_email").val());
        var support_email   = $.trim($("#support_email").val());
        var site_name       = $.trim($("#sitename").val());
        var image_name      = $.trim($("#sitelogo").val());
        var page_user_side  = $.trim($("#user_page").val());
        var page_admin_side = $.trim($("#admin_page").val());
        var currencyimg     = $.trim($("#currencyimg").val());
        var currency_sym    = $.trim($("#currency_sym").val());
        var site_address    = $.trim($("#site_address").val());
        //SMTP setting
        var smtp_host       = $.trim($("#smtp_host").val());
        var smtp_port       = $.trim($("#smtp_port").val());
        var smtp_username   = $.trim($("#smtp_username").val());
        var smtp_password   = $.trim($("#smtp_password").val());
        
        var site_fav_icon   = $.trim($("#site_fav_icon").val());
        if(admin_name == ''){
            $('#ContactContent').trigger('click');
            $("#errormsgContact").addClass('errormsg').html("Please enter the admin name");
            $("#admin_name").focus();
            return false;
        }
        if(admin_email == ''){
            $('#ContactContent').trigger('click');
            $("#errormsgContact").addClass('errormsg').html("Please enter the admin e-mail id");
            $("#admin_email").focus();
            return false;
        }
        
        var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
        var valid = emailRegex.test(admin_email);
        /*if(!valid){
            $("#errormsg").addClass('errormsg').html("Please Enter the Valid Email Id");
            $("#admin_email").focus();
            return false;
        }*/
        
        if(support_email == ''){
            $('#ContactContent').trigger('click');
            $("#errormsgContact").addClass('errormsg').html("Please enter the contactus e-mail id");
            $("#support_email").focus();
            return false;
        }   
        //var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
        var supportmailid = emailRegex.test(support_email);
        if(!supportmailid){
            $('#ContactContent').trigger('click');
            $("#errormsgContact").addClass('errormsg').html("Please enter valid contactus e-mail id");
            $("#support_email").focus();
            return false;
        }   
        if(site_name == ''){
            $('#siteContent').trigger('click');
            $("#errormsg").addClass('errormsg').html("Please enter the site name");
            $("#sitename").focus();
            return false;
        }
                
        //--------------------------------- SMTP setting ------------------------------
        if(document.getElementById("mail_option_normal").checked == true){
                var mail_option     = $.trim($("#mail_option_normal").val());
        }
        else if(smtp_host == ''){
            $('#MailContent').trigger('click');
            $("#errormsgMail").addClass('errormsg').html("Please enter the smtp host");
            $("#smtp_host").focus();
            return false;
        }
        else if(smtp_port == ''){
            $('#MailContent').trigger('click');
            $("#errormsgMail").addClass('errormsg').html("Please enter the smtp port");
            $("#smtp_port").focus();
            return false;
        }
        else if(smtp_username == ''){
            $('#MailContent').trigger('click');
            $("#errormsgMail").addClass('errormsg').html("Please enter the smtp username");
            $("#smtp_username").focus();
            return false;
        }   
        else if(smtp_username != '')
        {
            var smtpusername = emailRegex.test(smtp_username);
        }   
        else if(smtp_username != '' && !smtpusername)
        {
            $('#MailContent').trigger('click');
            $("#errormsgMail").addClass('errormsg').html("Please enter valid contactus e-mail id");
            $("#smtp_username").focus();
            return false;
        }
        else if(smtp_password == ''){
            $('#MailContent').trigger('click');
            $("#errormsgMail").addClass('errormsg').html("Please enter the site name");
            $("#smtp_password").focus();
            return false;
        }
        //------------------------------------------------------------------------
        if(image_name != ''){   
            var ext = $('#sitelogo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
                 {$("#errormsg").addClass('errormsg').html("Please select the valid image type");
                    $("#sitelogo").focus();
                    return false;
                 }              
        }
        if(page_user_side == ''){
            $('#SiteContent').trigger('click');
            $("#errormsg").addClass('errormsg').html("Please enter the page in user side");
            $("#user_page").focus();
            return false;
        }
        if(page_user_side != '' && page_user_side <= '0'){
            $('#SiteContent').trigger('click');
            $("#errormsg").addClass('errormsg').html("Please enter valid page number");
            $("#user_page").focus();
            return false;
        }
        
        if(document.getElementById("currency_display_img").checked == true){
            var cur_option  = $.trim($("#currency_display_img").val());
        }else if(document.getElementById("currency_display_sym").checked == true){ 
            var cur_option  = $.trim($("#currency_display_sym").val());
        }
        
        if(cur_option == 'img'){
            if(currencyimg != ''){  
                var ext = $('#currencyimg').val().split('.').pop().toLowerCase();
                
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
                {$("#errormsg").addClass('errormsg').html("Please select the valid currency type");
                    $("#currencyimg").focus();
                    return false;
                }               
            }
        }
        if(cur_option == 'sym'){
            if(currency_sym == ''){
                $('#MailContent').trigger('click');
                $("#errormsgMail").addClass('errormsg').html("Please enter the currency code");
                $("#currency_sym").focus();
                return false;
            }
        }
        
        if(site_address == ''){
            $('#LocationContent').trigger('click');
            $("#errormsgLocation").addClass('errormsg').html("Please enter the site address");
            $("#site_address").focus();
            return false;
        }
        
        /*if(analytic_code == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the analytic code");
            $("#analytic_code").focus();
            return false;
        }*/
        if(site_fav_icon != ''){
            var ext = $('#site_fav_icon').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['ico']) == -1)
            {
              $('#SiteContent').trigger('click');
              $("#errormsg").addClass('errormsg').html("Please select fav icon as .ico format");
                $("#site_fav_icon").focus();
                return false;
            }   
        }
    //}
}
//--------------------------------------- Icon Settings -----------------------------------------------
//icon Setting validation
function iconSettingValidation()
{
    if(viewable == 'No') {
        //alert("This is demo version.. Dont change setting details");
        window.location.href = 'demoVersion.php';
        return false;
    } else {
        $("#errormsg").removeClass('successmsg');
    
        var cuisine_thumb_width              = $.trim($("#cuisine_thumb_width").val());
        var cuisine_thumb_height             = $.trim($("#cuisine_thumb_height").val());
        var cuisine_large_width              = $.trim($("#cuisine_large_width").val());
        var cuisine_large_height             = $.trim($("#cuisine_large_height").val());
        var menu_thumb_width                 = $.trim($("#menu_thumb_width").val());
        var menu_thumb_height                = $.trim($("#menu_thumb_height").val());
        var restaurant_logo_thumb_width      = $.trim($("#restaurant_logo_thumb_width").val());
        var restaurant_logo_thumb_height     = $.trim($("#restaurant_logo_thumb_height").val());
        var restaurant_photo_thumb_width     = $.trim($("#restaurant_photo_thumb_width").val());
        var restaurant_photo_thumb_height    = $.trim($("#restaurant_photo_thumb_height").val());
        var follower_icon_width              = $.trim($("#follower_icon_width").val());
        var follower_icon_height             = $.trim($("#follower_icon_height").val());
        var marketbanner_width               = $.trim($("#market_banner_width").val());
        var marketbanner_height              = $.trim($("#market_banner_height").val());
        var paymenticon_width                = $.trim($("#paymenticon_width").val());
        var paymenticon_height               = $.trim($("#paymenticon_height").val());
        
        if(cuisine_thumb_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter cuisine photo width");
            $("#cuisine_thumb_width").focus();
            return false;
        }
        else if(isNaN(cuisine_thumb_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid cuisine photo width");
            $("#cuisine_thumb_width").focus();
            $("#cuisine_thumb_width").select();
            return false;
        }   
        
        else if(cuisine_thumb_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter cuisine photo height");
            $("#cuisine_thumb_height").focus();
            return false;
        }
        else if(isNaN(cuisine_thumb_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid cuisine photo height");
            $("#cuisine_thumb_height").focus();
            $("#cuisine_thumb_height").select();
            return false;
        }   
        
        else if(cuisine_large_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter cuisine photo large width");
            $("#cuisine_large_width").focus();
            return false;
        }
        else if(isNaN(cuisine_large_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid cuisine photo large width");
            $("#cuisine_large_width").focus();
            $("#cuisine_large_width").select();
            return false;
        }   
        
        else if(cuisine_large_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter cuisine photo large height");
            $("#cuisine_large_height").focus();
            return false;
        }
        else if(isNaN(cuisine_large_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid cuisine photo large height");
            $("#cuisine_large_height").focus();
            $("#cuisine_large_height").select();
            return false;
        }
        
        else if(menu_thumb_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter menu photo width");
            $("#menu_thumb_width").focus();
            return false;
        }
        else if(isNaN(menu_thumb_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid menu photo width");
            $("#menu_thumb_width").focus();
            $("#menu_thumb_width").select();
            return false;
        }   
        
        else if(menu_thumb_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter menu photo height");
            $("#menu_thumb_height").focus();
            return false;
        }
        else if(isNaN(menu_thumb_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid menu photo height");
            $("#menu_thumb_height").focus();
            $("#menu_thumb_height").select();           
            return false;
        }
        
        else if(restaurant_logo_thumb_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter restaurnat logo width");
            $("#restaurant_logo_thumb_width").focus();
            return false;
        }
        else if(isNaN(restaurant_logo_thumb_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid restaurnat logo width");
            $("#restaurant_logo_thumb_width").focus();
            $("#restaurant_logo_thumb_width").select();         
            return false;
        }
        
        else if(restaurant_logo_thumb_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter restaurnat logo height");
            $("#restaurant_logo_thumb_height").focus();
            return false;
        }
        else if(isNaN(restaurant_logo_thumb_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid restaurnat logo height");
            $("#restaurant_logo_thumb_height").focus();
            $("#restaurant_logo_thumb_height").select();            
            return false;
        }
        
        
        else if(restaurant_photo_thumb_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter restaurnat photo width");
            $("#restaurant_photo_thumb_width").focus();
            return false;
        }
        else if(isNaN(restaurant_photo_thumb_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid restaurnat photo width");
            $("#restaurant_photo_thumb_width").focus();
            $("#restaurant_photo_thumb_width").select();            
            return false;
        }
        
        else if(restaurant_photo_thumb_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter restaurnat photo height");
            $("#restaurant_photo_thumb_height").focus();
            return false;
        }
        else if(isNaN(restaurant_photo_thumb_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid restaurnat photo height");
            $("#restaurant_photo_thumb_height").focus();
            $("#restaurant_photo_thumb_height").select();           
            return false;
        }
        
        else if(follower_icon_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter follower icon width");
            $("#follower_icon_width").focus();
            return false;
        }
        else if(isNaN(follower_icon_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid follower icon width");
            $("#follower_icon_width").focus();
            $("#follower_icon_width").select();         
            return false;
        }
        
        else if(follower_icon_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter follower icon height");
            $("#follower_icon_height").focus();
            return false;
        }
        else if(isNaN(follower_icon_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid follower icon height");
            $("#follower_icon_height").focus();
            $("#follower_icon_height").select();            
            return false;
        }
        else if(marketbanner_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter market banner width");
            $("#market_banner_width").focus();
            return false;
        }
        else if(isNaN(marketbanner_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid market banner width ");
            $("#market_banner_width").focus();
            $("#market_banner_width").select();         
            return false;
        }
        
        else if(marketbanner_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter market banner height");
            $("#market_banner_height").focus();
            return false;
        }
        else if(isNaN(marketbanner_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid market banner height");
            $("#market_banner_height").focus();
            $("#market_banner_height").select();            
            return false;
        }
        else if(paymenticon_width == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter paymenticon width");
            $("#paymenticon_width").focus();
            return false;
        }
        else if(isNaN(paymenticon_width))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid paymenticon width ");
            $("#paymenticon_width").focus();
            $("#paymenticon_width").select();           
            return false;
        }
        
        else if(paymenticon_height == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter paymenticon height");
            $("#paymenticon_height").focus();
            return false;
        }
        else if(isNaN(paymenticon_height))
        {
            $("#errormsg").addClass('errormsg').html("Please enter valid paymenticon height");
            $("#paymenticon_height").focus();
            $("#paymenticon_height").select();          
            return false;
        }
            
        else
        {
            $.post('adminAjaxFile.php',{"cuisine_thumb_width":cuisine_thumb_width, "cuisine_thumb_height":cuisine_thumb_height, "cuisine_large_width":cuisine_large_width, "cuisine_large_height":cuisine_large_height, "menu_thumb_width":menu_thumb_width, "menu_thumb_height":menu_thumb_height, "restaurant_logo_thumb_width":restaurant_logo_thumb_width, "restaurant_logo_thumb_height":restaurant_logo_thumb_height, "restaurant_photo_thumb_width":restaurant_photo_thumb_width, "restaurant_photo_thumb_height":restaurant_photo_thumb_height, "follower_icon_height":follower_icon_height, "follower_icon_width":follower_icon_width, "marketbanner_width":marketbanner_width, "marketbanner_height":marketbanner_height,"paymenticon_width":paymenticon_width, "paymenticon_height":paymenticon_height, "action":"editUpdateIconSetting"},function(response){
            //alert(response);      
            if($.trim(response) == "updated_success")
            {
                $("#errormsg").removeClass('errormsg');
                $("#errormsg").addClass('successmsg').html("Icon setting has been updated successfully");
                return false;
            }
            else
            {
                $("#errormsg").html('');
            }
            
          });
          return false; 
        }
    }
}
//--------------------------------------- Payment Settings -----------------------------------------------
//payment Setting validation
function paymentSettingValidation()
{
    $("#errormsg").removeClass('successmsg');
    var paypal_mode =  $('.radiobotton:checked').val();
    
    if(paypal_mode == undefined)
    {
        $("#errormsg").addClass('errormsg').html("Please select paypal payment");
        return false;
    }
    if(paypal_mode == 'Live'){
        
        var paypal_url_live  = $.trim($("#paypal_url_live").val());
        var business_live    = $.trim($("#business_live").val());
        if(paypal_url_live == ''){
            $("#errormsg").addClass('errormsg').html("Please enter paypal URL or select paypal payment");
            return false;
        }
        if(business_live == ''){
            $("#errormsg").addClass('errormsg').html("Please enter business account or select paypal payment");
            return false;
        }
    }   
    else if(paypal_mode == 'Test'){ 
        
        var paypal_url_test  = $.trim($("#paypal_url_test").val());
        var business_test    = $.trim($("#business_test").val());
        if(paypal_url_test == ''){
            $("#errormsg").addClass('errormsg').html("Please enter paypal URL or select paypal payment");
            return false;
        }
        if(business_test == ''){
            $("#errormsg").addClass('errormsg').html("Please enter business account or select paypal payment");
            return false;
        }
    }   
    if(paypal_mode != '')
    {
        
        $.post('adminAjaxFile.php',{"paypal_mode":paypal_mode, "paypal_url_live":paypal_url_live, "paypal_url_test":paypal_url_test, "business_live":business_live, "business_test":business_test, "action":"editUpdatePaymentSetting"},function(response){
                
            if($.trim(response) == "updated_success"){
                $("#errormsg").removeClass('errormsg');
                $("#errormsg").addClass('successmsg').html("Payment setting has been updated successfully");
                return false;
            }
            else{
                $("#errormsg").html('');
            }
      });
      return false; 
    }
}
    
    //--------------------------------------- MainCategory -----------------------------------------------
    //add main main catogry name
    function addMainCategory()
    {
        var new_catename = $.trim($("#maincatename").val());
        var restaurant_name = $.trim($("#restaurant_name").val());
        var restaurant_id   = $("#resid").val();
        
        if(restaurant_id != ''){
            var restaurant_name = $("#resid").val();
        }
        //if(restaurant_id == ''){
        	//Para categorias unicas para todos los rest
            /*if(restaurant_name == ''){
                $("#errormsg").addClass('errormsg').html("Please select the restaurant name");
                $("#restaurant_name").focus();
                return false;       
            }*/
        //}
        if(new_catename == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the main category name");
            $("#maincatename").focus();
            return false;       
        }
        
        if(new_catename != ''){      
            $('#CategoryAdd').attr('disabled', true);   
            $.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"new_catename":new_catename,"action":"checkNewCateName"},function(response){
                if($.trim(response) == "exist"){
                    $('#CategoryAdd').attr('disabled', false);
                    $("#errormsg").addClass('errormsg').html("Main category name already exist");
                    $("#maincatename").focus();
                    return false;
                }
                else{
                    
                    $("#errormsg").addClass('successmsg').html("Category Added Successfully");
                    document.addNewMainCategory.submit();
                    
                    
                }
            });
            return false;
        }
        return false;
    }
    
    //Edit maincategory
    function editMainCategory()
    {
        var catename = $.trim($("#maincatename").val());
        var eid      = $("#eid").val();
        var restaurant_name = $.trim($("#restaurant_name").val());
        var restaurant_id   = $("#resid").val();
        
        if(restaurant_id != ''){
            var restaurant_name = $("#resid").val();
        }
        
        /*
        if(restaurant_name == ''){
            $("#errormsg").addClass('errormsg').html("Please select the restaurant name");
            $("#restaurant_name").focus();
            return false;       
        }
        */
        
        if(catename == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the main category name");
            $("#maincatename").focus();
            return false;       
        }
        
        if(catename != ''){
                        
            $.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"catename":catename,"eid":eid,"action":"checkEditCateName"},function(response){
            
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Main category name already exist");
                    $("#maincatename").focus();
                    return false;
                }
                else{
                    $("#errormsg").addClass('successmsg').html("Category Edited Successfully");
                    document.addNewMainCategory.submit();   
                }
            });
            return false;
        }
    }   
    
    
//--------------------------------------- Cuisine  -----------------------------------------------
    //Add New cuisine
    function addNewcuisine(){
        
        var cuisine_name  = $.trim($('#cuisine_name').val());
        var cuisine_photo = $.trim($('#cuisine_photo').val());
        
        if(cuisine_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the cuisine name");
            $("#cuisine_name").focus();
            return false;
        }
        /*if(cuisine_photo == ''){
            $("#errormsg").addClass('errormsg').html("Please upload the cuisine photo");
            $("#cuisine_photo").focus();
            return false;
        }
        
        if(cuisine_photo != ''){    
            var ext = $('#cuisine_photo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
                $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
                    $("#cuisine_photo").focus();
                    return false;
            }               
        }*/
        
        if(cuisine_name != ''){
            $.post('adminAjaxFile.php',{"cuisine_name":cuisine_name,"action":"checkCuisineName"},function(response){
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Cuisine name already exist");
                    $("#cuisine_name").focus();
                    return false;
                }else{
                    $('#CuisineAdd').attr('disabled', true);
                    $("#errormsg").addClass('successmsg').html("Cuisine Added Successfully");
                    document.addNewCuisine.submit();            
                }
            });
            return false;
        }
    }
    //Edit cuisine name
    function editCuisineName(){
        
        var cuisine_name  = $.trim($('#cuisine_name').val());
        var cuisine_photo = $.trim($('#cuisine_photo').val());
        //var cuisine_desc  = $.trim($('#cuisine_desc').val());
        var cusid         = $.trim($('#cusid').val());  
        
        
        if(cuisine_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the cuisine name");
            $("#cuisine_name").focus();
            return false;
        }
        
        if(cuisine_photo != ''){    
            var ext = $('#cuisine_photo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
                $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
                    $("#cuisine_photo").focus();
                    return false;
            }               
        }
        
        if(cuisine_name != ''){
            $.post('adminAjaxFile.php',{"cuisine_name":cuisine_name,"cusid":cusid,"action":"checkEditCuisineName"},function(response){
                //alert(response);
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Cuisine name already exist");
                    $("#cuisine_name").focus();
                    return false;
                }else{
                    $("#errormsg").addClass('successmsg').html("Cuisine Edited Successfully");
                    document.addNewCuisine.submit();            
                }
            });
            return false;
        }
    }


//--------------------------------------- Followers  -----------------------------------------------
    //Add New cuisine
    function addNewfollowers(){
        
        var followers_name  = $.trim($('#followers_name').val());
        var followers_logo = $.trim($('#followers_logo').val());
        var followers_url  = $.trim($('#followers_url').val());
        var regUrl         = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;    
        
        if(followers_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the follower name");
            $("#followers_name").focus();
            return false;
        }
        
        if(followers_logo != ''){   
            var ext = $('#followers_logo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1){
                $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg,png)");
                    $("#followers_logo").focus();
                    return false;
            }               
        }
        
        if(followers_url == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the follower URL");
            $("#followers_url").focus();
            return false;
        }
        if(followers_url != '' && regUrl.test(followers_url) == false){
            $("#errormsg").addClass('errormsg').html("Please enter valid URL");
            $("#followers_url").focus();
            return false;
        }
            if(followers_name != ''){           
            $.post('adminAjaxFile.php',{"followers_name":followers_name,"action":"checkExistsFollowers"},function(response){
             
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Follower name already exist");
                    $("#maincatename").focus();
                    return false;
                }
                else{
                    $("#followers_add").prop("disabled",true);
                    $("#errormsg").addClass('successmsg').html("Follower Added Successfully");
                    document.addNewCuisine.submit();
                    
                }
            });
            return false;
        }
        return false;
        
    }
    
    
    //Edit cuisine name
    function editFollowersName(){
        
        var followers_name = $.trim($('#followers_name').val());
        var followers_logo = $.trim($('#followers_logo').val());
        var followers_url  = $.trim($('#followers_url').val()); 
        var cusid          = $.trim($('#cusid').val()); 
        var regUrl         = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
        
        if(followers_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the follower name");
            $("#followers_name").focus();
            return false;
        }
        
        if(followers_logo != ''){   
            var ext = $('#followers_logo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1){
                $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg,png)");
                    $("#followers_logo").focus();
                    return false;
            }               
        }
        
        if(followers_url == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the follower Url");
            $("#followers_url").focus();
            return false;
        }
        if(followers_url != '' && regUrl.test(followers_url) == false){
            $("#errormsg").addClass('errormsg').html("Please enter valid URL");
            $("#followers_url").focus();
            return false;
        }
    }


//--------------------------------------- Addons  -----------------------------------------------
    
    //Sub Addons Validatate
    function subaddonsValidateNew()
    {
        var addons_name = $.trim($("#addons_name").val());
        var said        = $("#said").val();
        
        if(addons_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter addons name");
            $("#addons_name").focus();
            return false;       
        }else if(addons_name != ''){
            
            $.post('adminAjaxFile.php',{"addons_name":addons_name,"said":said,"action":"checkNewSubAddonsName"},function(response){
            //alert(response);
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Addons name already exist");
                    $("#addons_name").focus();
                    return false;
                }else if($.trim(response) == "insert"){
                    window.location.href = "addonsSubManage.php?said="+said;
                    return false;
                }
                else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
        return false;
    }
    //---------------------------------------------------------------------------------
    //Edit Sub Addons
    function subaddonsValidateEdit(){
        
        var addons_name = $.trim($("#addons_name").val());
        var eid         = $("#eid").val();
        var said        = $("#said").val();
        
        if(addons_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter addons name");
            $("#addons_name").focus();
            return false;       
        }else if(addons_name != ''){
            
            $.post('adminAjaxFile.php',{"addons_name":addons_name,"eid":eid,"action":"checkEditAddonsName"},function(response){
            //alert(response);
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Addons name already exist");
                    $("#addons_name").focus();
                    return false;
                }else if($.trim(response) == "update"){
                    $("#errormsg").addClass('successmsg').html("Addons Edited Successfully");
                    window.location.href = "addonsSubManage.php?said="+said;
                    return false;
                }
                else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
    }
//--------------------------------------- FAQ -----------------------------------------------
    //addNewFaqManage  Validation
    function addNewfaqManage()
    {   
        $("#errormsg").removeClass('successmsg');
        var question    = $.trim($("#question").val());
            
        if(question == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter question");
            $("#question").focus();
            return false;
        }
    }
    //---------------------------------------------------------------------------------
    //editFaqManage  Validation............
    function editfaqManage()
    {   
        $("#errormsg").removeClass('successmsg');
        var question    = $.trim($("#question").val());
            
        if(question == '')
        {
            $("#errormsg").addClass('errormsg').html("Please enter question");
            $("#question").focus();
            return false;
        }
    }
//--------------------------------------- Content -----------------------------------------------
    //Add new content
    function addNewContent(){
        var title               = $.trim($("#title").val());
        //var content               = $.trim($("#content").val());
        var Metatagtitle        = $.trim($("#mettitle").val());
        var Metatagdescription  = $.trim($("#metdes").val());
        var Metatagkeyword      = $.trim($("#metkey").val());
        
        if(title == ''){
            $("#errormsg").addClass('errormsg').html("Please enter title");
            $("#title").focus();
            return false;
        }
        if(Metatagtitle == ''){
            $("#errormsg").addClass('errormsg').html("Please enter metatag title");
            $("#mettitle").focus();
            return false;
        }
        if(Metatagdescription == ''){
            $("#errormsg").addClass('errormsg').html("Please enter metatag description");
            $("#metdes").focus();
            return false;
        }
        if(Metatagkeyword == ''){
            $("#errormsg").addClass('errormsg').html("Please enter metatagKeyword");
            $("#metkey").focus();
            return false;
        }
    }
    
    //Edit content
    function editContent(){
        
        var title               = $.trim($("#title").val());
        //var content               = $.trim($("#content").val());
        var Metatagtitle        = $.trim($("#mettitle").val());
        var Metatagdescription  = $.trim($("#metdes").val());
        var Metatagkeyword      = $.trim($("#metkey").val());
        var conid               = $.trim($("#conid").val());
        
        if(title == ''){
            $("#errormsg").addClass('errormsg').html("Please enter title");
            $("#title").focus();
            return false;
        }
        if(Metatagtitle == ''){
            $("#errormsg").addClass('errormsg').html("Please enter metatag title");
            $("#mettitle").focus();
            return false;
        }
        if(Metatagdescription == ''){
            $("#errormsg").addClass('errormsg').html("Please enter metatag description");
            $("#metdes").focus();
            return false;
        }
        if(Metatagkeyword == ''){
            $("#errormsg").addClass('errormsg').html("Please enter metatagKeyword");
            $("#metkey").focus();
            return false;
        }
    }

//--------------------------------------- State -----------------------------------------------
    //Add new state
    function addNewState()
    {
        var statecode   = $.trim($("#statecode").val());
        var statename   = $.trim($("#statename").val());
        var letters     = /^[A-Za-z]+$/;
        var nameRegex   = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        if(statecode == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the state code");
            $("#statecode").focus();
            return false;
        }               
        if(!(statecode.match(letters))){
            $("#errormsg").addClass('errormsg').html("State code must be alphabates");
            $("#statecode").focus();
            return false;
        }
                
        if(statename == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the state name");
            $("#statename").focus();
            return false;
        }
        
        if(statecode != '' && statename != ''){     
            $.post('adminAjaxFile.php',{"statecode":statecode,"statename":statename,"action":"checkAddStateName"},function(response){           
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("State code and state name already exist");
                    $("#statecode").focus();
                    return false;
                }else if($.trim(response) == "insert"){
                    $('#StateAdd').attr('disabled', true);
                    window.location.href = "stateManage.php";
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
            }
    }
    //Edit state
    function editState(){
        
        var statecode   = $.trim($("#statecode").val());
        var statename   = $.trim($("#statename").val());
        var stateid     = $.trim($("#stateid").val());
        var letters     = /^[A-Za-z]+$/;    
        var nameRegex   = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        if(statecode == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the state code");
            $("#statecode").focus();
            return false;
        }               
        if(!(statecode.match(letters))){
            $("#errormsg").addClass('errormsg').html("State code must be alphabates");
            $("#statecode").focus();
            return false;
        }           
        if(statename == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the state name");
            $("#statename").focus();
            return false;
        }
        
        if(statecode != '' && statename != ''){     
            $.post('adminAjaxFile.php',{"statecode":statecode,"statename":statename,"stateid":stateid,"action":"checkEditStateName"},function(response){    
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("State code and state name already exist");
                    $("#statecode").focus();
                    return false;
                }else if($.trim(response) == "update"){
                    window.location.href = "stateManage.php";
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
            }
    }
//--------------------------------------- City -----------------------------------------------
    //Add new City
    function addNewCityValidate()
    {
        var statename   = $.trim($("#statename").val());
        var cityname    = $.trim($("#cityname").val());
        var letters     = /^[A-Za-z]+$/;
        var nameRegex   = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        var stecode  = $("#stecode").val();
        
        if(stecode == ''){
            if(statename == ''){
                $("#errormsg").addClass('errormsg').html("Please select the state name");
                $("#statename").focus();
                return false;
            }   
        }
        if(cityname == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the city name");
            $("#cityname").focus();
            return false;
        }
        
        if(cityname != ''){     
            $.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"stecode":stecode,"action":"checkAddCityName"},function(response){        
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("City name already exist");
                    $("#cityname").focus();
                    return false;
                }else if($.trim(response) == "insert"){
                    $('#CityAdd').attr('disabled', true);
                    if(stecode != ''){
                        window.location.href = "cityManage.php?sc="+stecode;
                    }else{
                        window.location.href = "cityManage.php";
                    }
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
    }
    //Edit City
    function editCityValidate(){
        
        var statename   = $.trim($("#statename").val());
        var cityname    = $.trim($("#cityname").val());
        var letters     = /^[A-Za-z]+$/;
        var nameRegex   = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        var cityid   = $("#cityid").val();
        var stecode  = $("#stecode").val();
        
        if(stecode == ''){
            if(statename == ''){
                $("#errormsg").addClass('errormsg').html("Please select the state name");
                $("#statename").focus();
                return false;
            }
        }
        
        if(cityname == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the city name");
            $("#cityname").focus();
            return false;
        }
        
        if(cityname != ''){     
            $.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"cityid":cityid,"stecode":stecode,"action":"checkEditCityName"},function(response){       
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("City name already exist");
                    $("#cityname").focus();
                    return false;
                }else if($.trim(response) == "update"){
                    if(stecode != ''){
                        window.location.href = "cityManage.php?sc="+stecode;
                    }else{
                        window.location.href = "cityManage.php";
                    }
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
    }
//--------------------------------------- Zip code -----------------------------------------------
    //Add new zipcode
    function addNewZipcode(){
        
        var statename  = $.trim($("#state").val());
        var cityname   = $.trim($("#cityname").val());
        var zipcode    = $.trim($("#zipcode").val());
        var areaname   = $.trim($("#areaname").val());
        var numbers    = /^[0-9]+$/;  
        var letters    = /^[A-Za-z]+$/; 
        var nameRegex  = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        var stecode  = $("#stecode").val();
        var cid      = $("#cid").val();
        
        if(stecode == '' && cid == ''){
            if(statename == ''){
                $("#errormsg").addClass('errormsg').html("Please select the state name");
                $("#state").focus();
                return false;
            }
            if(cityname == ''){
                $("#errormsg").addClass('errormsg').html("Please select the city name");
                $("#cityname").focus();
                return false;
            }
        }
        
        if(zipcode == ''){      
            $("#errormsg").addClass('errormsg').html("Please enter the Postcode");
            $("#zipcode").focus();
            return false;           
        }
        
        if(zipcode != ''){      
            $.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"zipcode":zipcode,"areaname":areaname,"stecode":stecode,"cid":cid,"action":"checkAddZipcode"},function(response){ 
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Zipcode for city already exist");
                    $("#statecode").focus();
                    return false;
                }else if($.trim(response) == "insert"){
                    $('#ZipcodeAdd').attr('disabled', true);
                    if(stecode != '' && cid != ''){
                        window.location.href = "zipcodeManage.php?sc="+stecode+"&cid="+cid;
                    }else{
                        window.location.href = "zipcodeManage.php";
                    }
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
    }
    //Edit zipcode
    function editZipcode(){
        
        var statename  = $.trim($("#state").val());
        var cityname   = $.trim($("#cityname").val());
        var zipcode    = $.trim($("#zipcode").val());
        var areaname   = $.trim($("#areaname").val());
        var numbers    = /^[0-9]+$/;  
        var letters    = /^[A-Za-z]+$/; 
        var nameRegex  = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        var zipid    = $("#zipid").val();
        var stecode  = $("#stecode").val();
        var cid      = $("#cid").val();
        
        if(stecode == '' && cid == ''){
            if(statename == ''){
                $("#errormsg").addClass('errormsg').html("Please select the state name");
                $("#state").focus();
                return false;
            }
            if(cityname == ''){
                $("#errormsg").addClass('errormsg').html("Please select the city name");
                $("#cityname").focus();
                return false;
            }
        }
        if(zipcode == ''){      
            $("#errormsg").addClass('errormsg').html("Please enter the zipcode");
            $("#zipcode").focus();
            return false;           
        }
        
        
        if(zipcode != ''){  
            $.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"zipcode":zipcode,"areaname":areaname,"zipid":zipid,"stecode":stecode,"cid":cid,"action":"checkEditZipcode"},function(response){
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Zipcode for city already exist");
                    $("#statecode").focus();
                    return false;
                }else if($.trim(response) == "update"){
                    if(stecode != '' && cid != ''){
                        window.location.href = "zipcodeManage.php?sc="+stecode+"&cid="+cid;
                    }else{
                        window.location.href = "zipcodeManage.php";
                    }
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
    }
//----------------------------------------------------------------------------------------------------
//-------------------------------Language Management--------------------------------------------------
//Add New Language Name
    function addNewLanguage(){
            
        var languagename    = $.trim($("#languagename").val());
        var languagecode    = $.trim($("#languagecode").val());
        var letters         = /^[A-Za-z]+$/;
        var nameRegex       = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        if(languagename == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the language name");
            $("#languagename").focus();
            return false;
        }
                
        if(languagecode == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the language code");
            $("#languagecode").focus();
            return false;
        }
        if(!(languagecode.match(letters))){
            $("#errormsg").addClass('errormsg').html("Language code must be alphabates");
            $("#languagecode").focus();
            return false;
        }
        if(languagename != '' && languagecode != ''){       
            $.post('adminAjaxFile.php',{"languagename":languagename,"languagecode":languagecode,"action":"checkAddLanguageName"},function(response){            
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Language name and language code already exist");
                    $("#languagename").focus();
                    return false;
                }else if($.trim(response) == "insert"){
                    $('#LanguageAdd').attr('disabled', true);
                    window.location.href = "languageManage.php";
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
            }
    }
    //Edit Language
    function editLanguage(){
        
        var languagename    = $.trim($("#languagename").val());
        var languagecode    = $.trim($("#languagecode").val());
        var lang_id         = $.trim($("#langid").val());
        var filedata        = $.trim($("#langfile").val());
        var letters         = /^[A-Za-z]+$/;
        var nameRegex       = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        
        if(languagename == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the language name");
            $("#languagename").focus();
            return false;
        }
                
        if(languagecode == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the language code");
            $("#languagecode").focus();
            return false;
        }
        if(!(languagecode.match(letters))){
            $("#errormsg").addClass('errormsg').html("Language code must be alphabates");
            $("#languagecode").focus();
            return false;
        }
        if(languagename != '' && languagecode != ''){       
            $.post('adminAjaxFile.php',{"languagename":languagename,"languagecode":languagecode,"filedata":filedata,"lang_id":lang_id,"action":"checkEditLanguageName"},function(response){ 
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Language name and language code already exist");
                    $("#languagename").focus();
                    return false;
                }else if($.trim(response) == "update"){
                    window.location.href = "languageManage.php";
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            });
            return false;
        }
    }
    
    function loadselectLangFile(lfile,langid,langcode){
        window.location.href = "languageAddEdit.php?langid="+langid+"&langcode="+langcode+"&lfile="+lfile;
    }
    
    function updateselectLangFile(){
        
        var langid              = $.trim($("#langid").val());
        var lfile               = $.trim($("#lfile").val());
        var lang_file_name      = $.trim($("#lang_file_name").val());
        var langfilecontent     = $.trim($("#langfilecontent").val());
        
        $.post('adminAjaxFile.php',{"langid":langid,"lfile":lfile,"langfilecontent":langfilecontent,"lang_file_name":lang_file_name,"action":"LanguageFilesListEdit"},function(response){
                //alert(response);
                if($.trim(response) == "success"){
                    $("#errormsg").addClass('successmsg').html(lfile+" updated successfully");
                    return false;
                }else{
                    $("#errormsg").addClass('errormsg').html("Error occured");
                    return false;
                }
            return false;
        });
        return false;
    }
//------------------------------------------------------------------------------------------------------
//---------------------Admin site customer register--------------------------------------------------------
//Add new customer
function addNewCustomer(){
    
    var customername            = $.trim($("#cus_name").val());
    var customerlastname        = $.trim($("#cus_lastname").val());
    var customeraddress         = $.trim($("#cus_address").val());
    var customerbuildtype       = $.trim($("#cus_building").val());
    var customercrossstreet     = $.trim($("#cus_crostreet").val());
    var customerstate           = $.trim($("#cus_state").val());
    var customerzip             = $.trim($("#cus_zip").val());
    var customercity            = $.trim($("#cus_city").val());
    var customerstate           = $.trim($("#cus_state").val());
    var customerphone           = $.trim($("#cus_phone").val());
    var customerlandline        = $.trim($("#cus_landline").val());
    var customerlandmark        = $.trim($("#cus_landmark").val());
    var customeremail           = $.trim($("#cus_email").val());
    var customerpassword        = $.trim($("#cus_pwd").val());

    if(customername == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer name");
        $("#cus_name").focus();
        return false;       
    }
    if(customerlastname == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer last name");
        $("#cus_lastname").focus();
        return false;       
    }
    if((customerphone) == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer phone");
        $("#cus_phone").focus();
        return false;   
    }
    if(isNaN(customerphone) ){
        $("#errormsg").addClass('errormsg').html("Please enter valid customer Phone");
        $("#cus_phone").focus();
        return false;   
    }
    if(customeremail == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer e-mail");
        $("#cus_email").focus();
        return false;       
    }
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customeremail))){
        $("#errormsg").addClass('errormsg').html("Invalid e-mail address").show();
        $("#customer_email").focus();
        return false;
    }
    
    if((customerpassword) == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer password");
        $("#cus_pwd").focus();
        return false;   
    }
    
    if(customeremail != ''){
        
        $.post('adminAjaxFile.php',{"customername":customername,"customerlastname":customerlastname,"customerphone":customerphone,"customeremail":customeremail,"customerpassword":customerpassword,"action":"checkAddCustomer"},function(response){
            
            if($.trim(response) == "exist"){
                $("#errormsg").addClass('errormsg').html("Customer already exist");
                $("#cus_name").focus();
                return false;
            }else if($.trim(response) == "insert"){
                $('CustomerAdd').attr('disabled', true);
                $("#errormsg").addClass('successmsg').html("Customer Added Successfully");
                window.location.href = "customerManage.php";
                return false;
            }else{
                $("#errormsg").addClass('errormsg').html("Error occured");
                return false;
            }
        });
        return false;
    }
    
}
//Edit customer
function editCustomer(){
    
    var customername            = $.trim($("#cus_name").val());
    var customerlastname        = $.trim($("#cus_lastname").val());
    var customeraddress         = $.trim($("#cus_address").val());
    var customerbuildtype       = $.trim($("#cus_building").val());
    var customercrossstreet     = $.trim($("#cus_crostreet").val());
    var customerzip             = $.trim($("#cus_zip").val());
    var customercity            = $.trim($("#cus_city").val());
    var customerstate           = $.trim($("#cus_state").val());
    var customerphone           = $.trim($("#cus_phone").val());
    var customerlandline        = $.trim($("#cus_landline").val());
    var customerlandmark        = $.trim($("#cus_landmark").val());
    var customeremail           = $.trim($("#cus_email").val());
    var customerpassword        = $.trim($("#cus_pwd").val());
    var customerid              = $.trim($("#cusmid").val());
    
    if(customername == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer name");
        $("#cus_name").focus();
        return false;       
    }
    if(customerlastname == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer last name");
        $("#cus_lastname").focus();
        return false;       
    }
    if((customerphone) == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer phone");
        $("#cus_phone").focus();
        return false;   
    }
    if(isNaN(customerphone) ){
        $("#errormsg").addClass('errormsg').html("Please enter valid customer Phone");
        $("#cus_phone").focus();
        return false;   
    }
    if(customeremail == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer e-mail");
        $("#cus_email").focus();
        return false;       
    }
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customeremail))){
        $("#errormsg").addClass('errormsg').html("Invalid e-mail address").show();
        $("#customer_email").focus();
        return false;
    }
    
    if(customeremail != ''){
        
        $.post('adminAjaxFile.php',{"customername":customername,"customerlastname":customerlastname,"customerphone":customerphone,"customeremail":customeremail,"customerpassword":customerpassword,"customerid":customerid,"action":"checkEditCustomer"},function(response){
            
            if($.trim(response) == "exist"){
                $("#errormsg").addClass('errormsg').html("Customer already exist");
                $("#cus_name").focus();
                return false;
            }else if($.trim(response) == "update"){
                $("#errormsg").addClass('successmsg').html("Customer Edited Successfully");
                window.location.href = "customerManage.php";
                return false;
            }else{
                $("#errormsg").addClass('errormsg').html("Error occured");
                return false;
            }
        });
        return false;
    }
    
}
//Add New Payment Info
    function addNewPaymentInfoValidate(){
        
        var paymentinfo_name  = $.trim($('#paymentinfo_name').val());
        var paymentinfo_photo = $.trim($('#paymentinfo_photo').val());  
        
        if(paymentinfo_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the paymentinfo name");
            $("#paymentinfo_name").focus();
            return false;
        }
        
        if(paymentinfo_photo != ''){    
            var ext = $('#paymentinfo_photo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
                $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
                    $("#paymentinfo_photo").focus();
                    return false;
            }               
        }
        if(paymentinfo_name != ''){
            $.post('adminAjaxFile.php',{"paymentinfo_name":paymentinfo_name,"action":"checkPaymentInfoName"},function(response){
                //alert(response);
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Paymentinfo name already exist");
                    $("#paymentinfo_name").focus();
                    return false;
                }else{
                    $('PaymentAdd').attr('disabled', true);
                    document.addNewPaymentInfo.submit();            
                }
            });
            return false;
        }
            
        
    }
    //Edit cuisine name
    function editPaymentInfoValidate(){
        
        var paymentinfo_name  = $.trim($('#paymentinfo_name').val());
        var paymentinfo_photo = $.trim($('#paymentinfo_photo').val());
        var payid         = $.trim($('#payid').val());  
        
        
        if(paymentinfo_name == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the paymentinfo name");
            $("#paymentinfo_name").focus();
            return false;
        }
        
        if(paymentinfo_photo != ''){    
            var ext = $('#paymentinfo_photo').val().split('.').pop().toLowerCase();
            
            if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
                $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
                    $("#paymentinfo_photo").focus();
                    return false;
            }               
        }
        if(paymentinfo_name != ''){
            $.post('adminAjaxFile.php',{"paymentinfo_name":paymentinfo_name,"payid":payid,"action":"checkEditPaymentInfoName"},function(response){
                //alert(response);
                if($.trim(response) == "exist"){
                    $("#errormsg").addClass('errormsg').html("Paymentinfo name already exist");
                    $("#paymentinfo_name").focus();
                    return false;
                }else{
                    document.addNewPaymentInfo.submit();            
                }
            });
            return false;
        }
    }
//--------------------------------------------------------------------------------------------------
//AJAX START----------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------
function getXMLHTTP() { //fuction to return the xml http object                                     
        var xmlhttp=false;                                                                          
        try{                                                                                        
            xmlhttp=new XMLHttpRequest();                                                           
        }                                                                                           
        catch(e)    {                                                                               
            try{                                                                                    
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");                                    
            }                                                                                       
            catch(e){                                                                               
                try{                                                                                
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");                                      
                }                                                                                   
                catch(e1){                                                                          
                    xmlhttp=false;                                                                  
                }                                                                                   
            }                                                                                       
        }                                                                                                                                                         
        return xmlhttp;                                                                             
    }                                                                                               
var req = getXMLHTTP(); 

//Get Show Sub Addons
function showSubaddons(aid){
    
    req.onreadystatechange = function(){
        
        if (req.readyState == 4){
            if (req.status == 200){
                //alert(req.responseText);
                document.getElementById('subaddonsList').innerHTML=req.responseText;
            }else {
                $.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
            }
        }
    }
    req.open("GET", "adminAjaxAction.php?aid="+aid+"&action=showSubaddonsList", true);
    req.send(null);
}
//Get Show City
function getShowCityList(statecode){
    
    req.onreadystatechange = function(){
        
        if (req.readyState == 4){
            if (req.status == 200){
                //alert(req.responseText);
                document.getElementById('showcityList').innerHTML=req.responseText;
                $('.selectpicker').selectpicker();
            }else {
                $.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
            }
        }
    }
    
    req.open("GET", "adminAjaxAction.php?statecode="+statecode+"&action=showcityList", true);
   
    req.send(null);
    
}
//--------------------------------------- Index banner --------------------------------------------//
//Add banner
function addIndexBanner(){
    
    var banner_photo = $.trim($('#banner_photo').val());    
    
    if(banner_photo == ''){
        $("#errormsg").addClass('errormsg').html("Please enter the banner photo");
        $("#banner_photo").focus();
        return false;
    }
    
    if(banner_photo != ''){ 
        var ext = $('#banner_photo').val().split('.').pop().toLowerCase();
        
        if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1){
            $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
            $("#banner_photo").focus();
            return false;
        }               
    }
}
//Edit banner
function editIndexBanner(){
    
    var banner_photo = $.trim($('#banner_photo').val());
    var cusid        = $.trim($('#cusid').val());
    
    if(banner_photo != ''){ 
        var ext = $('#banner_photo').val().split('.').pop().toLowerCase();
        
        if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1){
            $("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
            $("#banner_photo").focus();
            return false;
        }               
    }
}
//--------------------------------------------------------------------------------------------------//
//Addons Add and Edit
//-----------------------------------------------------
function mainaddonfree(){
    $(".showaddPrice").hide();
    $(".showaddPriceList").show();
    $("#mainaddonvalue").val('');
    $("#subaddonslist").show();
}
function mainaddonpaid(){
    $(".showaddPrice").show();
    $(".showaddPriceList").hide();
    $("#subaddonslist").hide();
}
//-----------------------------------------------------
//04-03-2013
var special_row=0;
function addListMoreAddons(){
    
    $('#buttondiv').append('<div class="">'+
    '<span id="mainremove_'+special_row+'" class="contain marBtm5"><span class="col-sm-4 control-label">Addons Name <span class="color-red">*</span></span>'+
        '<div class="col-sm-3"><input type="text" name="mainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control" value="" />  </div>'+
        '<div class="col-sm-1 no-pad-left">'+       
            '<input type="text" name="mainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="Count" size="12" class="form-control"/>'+'</div>'+
            
            '<span id="sublist_'+special_row+'"><a onclick="addSubaddonsList('+special_row+');" class="btn btn-success" >Add Sub Addons</a>'+
            '<a onclick="removemainaddon('+special_row+');" class="btn btn-danger btn-icon marleft"><i class="fa  fa-close"></i></a>'+
        
        
        '<div id="subbuttondiv_'+special_row+'" class="col-sm-4 col-sm-offset-4"></div></span>'+
    ' </span>'+
    '</div>');
    special_row++;
    var special_row1=0;
}

//-----------------------------------------------------
//More main Addons
var special_row=0;
function addListSubAddons(){
    
    $('#buttondiv').append('<div class="madSubAddonNew2">'+
    '<span id="mainremove_'+special_row+'" class="madSubAddon">'+
        '<input type="text" name="mainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="textbox" value="" />  '+
        '<div class="madLeft1">'+
            '<div class="madAddons">'+
                '<input type="radio" name="mainaddons['+special_row+'][mainaddons_priceoption]" value="Free" checked="checked" onclick="subaddonsfreeoption('+special_row+');"  class="madInput"/><span class="flt">Free</span>'+
            '</div> '+
            '<div class="madAddons">'+
                '<input type="radio" name="mainaddons['+special_row+'][mainaddons_priceoption]" value="Paid" onclick="subaddonspaidoption('+special_row+');" class="madInput"/><span class="flt">Paid</span>'+
            '</div>'+
            '<span id="showaddPrice1_'+special_row+'" style="display:none;"><input type="text"  class="madTxtBox" name="mainaddons['+special_row+'][mainaddons_price]" id="addonsprice" value="" size="10" /></span>'+
            '<span><input type="text" name="mainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="Addons count" size="12" class="madTxtBoxcnt"/></span>'+
            '<a onclick="remove('+special_row+');" style="color:#ff0000; cursor:pointer; margin-left:5px; margin-right:10px;"><span>Remove</span></a>'+
            '<span id="sublist_'+special_row+'"><a onclick="addSubaddonsList('+special_row+');" style="color:orange;cursor:pointer;text-decoration:underline;font-weight:bold;"><span>Add Sub Addons</span></a>'+
        '</div>'+
        '<div class="containsingle">'+
            '<input type="radio" name="mainaddons['+special_row+'][addonstype]" id="addonstype_single" value="single" checked="checked">&nbsp;Single &nbsp;'+
            '<input type="radio" name="mainaddons['+special_row+'][addonstype]" id="addonstype_multiple" value="multiple" >&nbsp;Multiple &nbsp;'+
        '</div>'+
        '<div id="subbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
    ' </span>'+
    '</div>');
    special_row++;
    var special_row1=0;
}
//-------------------------------------------------------------
var special_row1=0;
function addSubaddonsList(mainaddid){
    
    $('#subbuttondiv_'+mainaddid).append('<div class="row">'+
        '<span id="removesubmore_'+special_row1+'" class="martopbtm5 contain">'+
        '<div class="col-sm-10"><input type="text" name="mainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control" value="" /></div>'+
        '<div class="col-sm-2"><a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></div>'+
        '</div></span>');
    special_row1++;
}
//-------------------------------------------------------------
//Edit
var special_row2=0;
function addListSubAddons1(){
    
    $('#subaddonslist').append(
            '<span id="removesubmain_'+special_row2+'" class="col-sm-4 col-sm-offset-4 marBtm5">'+
                '<div class="row"><div class="col-sm-10"><input type="text" name="subadd['+special_row2+'][subaddon]" id="subadd_'+special_row2+'" class="form-control" value="" /></div>'+
                '<div class="col-sm-2"><a onclick="removeSubmain('+special_row2+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></div></div>'+
            '</span>');
    special_row2++;
}
//-----------------------------------------------------------
function subaddonsfreeoption(aid){
    $("#showaddPrice1_"+aid).hide();
    $('#sublist_'+aid).show();
}
function subaddonspaidoption(aid){
    $("#showaddPrice1_"+aid).show();
    $('#sublist_'+aid).hide();
}
function subaddonseditfreeoption(aid){
    $("#showaddoneditprice_"+aid).hide();
}
function subaddonseditpaidoption(aid){
    $("#showaddoneditprice_"+aid).show();
}
function remove(aid){ 
    $('#mainremove_'+aid).hide();
    $('#mainaddons_'+aid).val('');
}
function removeSubmore(said){
    $('#removesubmore_'+said).remove();
    $('#mainaddonsmore_'+said).val('');
}
function removeSubmain(said){
    //$('#removesubmain_'+said).hide();
    $('#removesubmain_'+said).remove();
    $('#subadd_'+said).val('');
}

//--------------------------------------------------------------------------------------------------
function openAddons(a){
    var e = document.getElementById(a);
    if(e.style.display=="none"){
        var i;
        var tot=document.getElementById("total").value;
        for (i=1; i<=tot; i++) {
            var d = new Array(i);
            d[i] = "q" + i;
            if (document.getElementById(d[i])) {
                //document.getElementById(d[i]).style.display="none";
            } 
            e.style.display="block";
        }
        $(".uparr_"+a).hide();
        $(".downarr_"+a).show();
    }
    else {
        e.style.display="none"
        $(".uparr_"+a).show();
        $(".downarr_"+a).hide();
    }
}
//---------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------
//AJAX END------------------------------------------------------------------------------------------

//Customer Address Book Edit
function editAddressBook(){
    
    var add_title   = $("#add_title").val();
    var building    = $("#apt_name").val();
    var street      = $("#street_add").val();
    var state       = $("#cus_state").val();
    var city        = $("#cus_city").val();
    var zip         = $("#zip_code").val();
    var landmark    = $("#landmark").val();
    var landline    = $("#landline").val();
    var addresslabel= $("[name=customer_addresslabel_new]:checked").val();
    
    if(add_title == ''){
        $("#errormsg").addClass('errormsg').html("Please enter title for customer's address");
        $("#add_title").focus();
        return false;
    }else if(street == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer's street");
        $("#street_add").focus();
        return false;
    }else if(state == ''){
        $("#errormsg").addClass('errormsg').html("Please select customer's state");
        $("#cus_state").focus();
        return false;
    }else if(city == ''){
        $("#errormsg").addClass('errormsg').html("Please select customer's city");
        $("#cus_city").focus();
        return false;
    }else if(zip == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer's zip code");
        $("#zip_code").focus();
        return false;
    }else{
        $('AddressBookAdd').attr('disabled', true);
        $("[name=addressBookmgmt]").submit();
    }
}
//Add New Customer Address Book
function addNewAddressBook(){
    
    var cus_name    = $("#cus_name").val();
    var add_title   = $("#add_title").val();
    var building    = $("#apt_name").val();
    var street      = $("#street_add").val();
    var state       = $("#cus_state").val();
    var city        = $("#cus_city").val();
    var zip         = $("#zip_code").val();
    var landmark    = $("#landmark").val();
    var landline    = $("#landline").val();
    var addresslabel= $("[name=customer_addresslabel_new]:checked").val();
    $("#errormsg").val('');
    
    if(cus_name == ''){
        $("#errormsg").addClass('errormsg').html("Please select customer's name");
        $("#cus_name").focus();
        return false;
    }else if(add_title == ''){
        $("#errormsg").addClass('errormsg').html("Please enter title customer's address");
        $("#add_title").focus();
        return false;
    }else if(street == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer's street");
        $("#street_add").focus();
        return false;
    }else if(state == ''){
        $("#errormsg").addClass('errormsg').html("Please select customer's state");
        $("#cus_state").focus();
        return false;
    }else if(city == ''){
        $("#errormsg").addClass('errormsg').html("Please select customer's city");
        $("#cus_city").focus();
        return false;
    }else if(zip == ''){
        $("#errormsg").addClass('errormsg').html("Please enter customer's zip code");
        $("#zip_code").focus();
        return false;
    }else{
        $("[name=addressBookmgmt]").submit();
    }
}
//---------------------------------------------------------------------//
//Invoice Report Validate
function invoice_report_validate(){
    
    var monthtext = $("#invoice_monthly_4times").val();
    //alert(monthtext);
    
    if(monthtext == ''){
        alert("Please select ")
    }
    //return false;
}
//UserAddedit
function removeSubmenus(submenuid){
    //$(".submodules_"+submenuid).attr("checked",false);
    //alert("hello");
    
    $(".mainmenuid_"+submenuid).each(function(){
       if($(this).is(':checked') == true){         
         
         $( ".submodules_"+submenuid ).prop( "checked", true );                           
         return false;
       } else{
                  
         $( ".submodules_"+submenuid ).prop( "checked", false );                           
       }
       //return false;
    });
}
//SubmenuCheck Process
//--------------------------------------------------------
function submenuClick(submenuid){
    if($(document).find(".submodules_"+submenuid).length > 0){ 
        $(".submodules_"+submenuid).each(function(){
           //console.log($(".submodules_"+submenuid+":checked").length);
           var a = $(".submodules_"+submenuid).length;
           var b = $(".submodules_"+submenuid+":checked").length;
           if(b == a){
              // if($(".submodules_"+submenuid+":checked").length>1){
                 $( ".mainmenuid_"+submenuid ).prop( "checked", true );                                       
                 return false;
               /*} else{
                 $( ".mainmenuid_"+submenuid ).prop( "checked", false );  
               }*/
           }else{
             $( ".mainmenuid_"+submenuid ).prop( "checked", false );  
           }
        });
    }
}
//---------------------------------------------user page -----------------------------
function addnewuserValidate(){
    //alert("hi");
    var username       = $("#username").val();
    var userpassword   = $("#userpassword").val();
    
    //Atleast one checkbox need to check 
    var numberOfChecked = $('input:checkbox:checked').length;   
       
    if(username == ''){
        $("#errormsg").html("Please enter your user name");
        $("#username").focus();
        return false;
    }
    if(userpassword == ''){
        $("#errormsg").html("Please enter your password");
        $("#userpassword").focus();
        return false;
    }
    if(numberOfChecked == '0'){
        $("#errormsg").html("Please select anyone module");
        return false;
    }
}
//---------------------------------------------------------------------//
//Sort Order
$(document).ready(function(){
    //Category Sort Order
    
    var filenameurl = $("#filenameurl").val();
    
    if(filenameurl == 'categoryManage.php'){
        $("#table_catgory").tableDnD({
            onDragClass: "myDragClass",
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                var data = '';
                var debugStr = "Row dropped was "+row.id+". New order: ";
                for (var i=1; i<rows.length; i++) {
                    debugStr += rows[i].id+"^";
                    data += rows[i].id+"^";
                    $("#sort_order_"+rows[i].id).html(i);
                }
                $.post("adminAjaxFile.php", {data:data, action:'updateCategoryOrder'}, function(theResponse){
                }); 
            }
        });
    }
    
    //Menu Sort Order
    if(filenameurl == 'menuManage.php'){
        $("#table_menu").tableDnD({
            onDragClass: "myDragClass",
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                var data = '';
                var debugStr = "Row dropped was "+row.id+". New order: ";
                for (var i=1; i<rows.length; i++) {
                    debugStr += rows[i].id+"^";
                    data += rows[i].id+"^";
                    $("#sort_order_"+rows[i].id).html(i);
                }
                $.post("adminAjaxFile.php", {data:data, action:'updateMenuOrder'}, function(theResponse){
                }); 
            }
        });
    }
});