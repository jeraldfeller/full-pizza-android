<?php

include ("includes/config.inc.php");
#Language
$objSite->languageSession();

#.............................................................................................
    if (isset($_POST['action']) && ($_POST['action'] == 'ContactForm'))
    {
        $objCommon = new Common();
        $error = $objCommon->contactUsSubmit();
        if (isset($error) && !empty($error))
        {
            $objSmarty->assign("error", $error);
        }
    }
    
    #CAPTCHA CODE Generation
    $ResultStr = $objSite->captchaCode();
    $objSmarty->assign("rndnumber", $ResultStr);
#.............................................................................................
#SMARTY ASSIGNING
$objSmarty->assign('objSite', $objSite);
$main_content = $objSmarty->fetch('contactUs.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>