<?php 
include("includes/config.inc.php");
#Language
$objSite->languageSession();
#.............................................................................................
$offline  = $objSite->getValue('offline_status',$CFG['table']['sitesetting'],"id  = '1' ");
if($offline == 'Y'){
    $offlinenotes = $objSite->getValue('offline_notes',$CFG['table']['sitesetting'],"id  = '1' ");
    $objSmarty->assign('siteofflinenotes',$offlinenotes);
}else{
    $objSite->redirectUrl($CFG['site']['base_url']);
}

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('offline.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>