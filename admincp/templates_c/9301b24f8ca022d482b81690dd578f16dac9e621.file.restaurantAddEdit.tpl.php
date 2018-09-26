<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:20
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5896765807a26c631427-38348470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9301b24f8ca022d482b81690dd578f16dac9e621' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit.tpl',
      1 => 1474072319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5896765807a26c631427-38348470',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26c9d9e96_64466964',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26c9d9e96_64466964')) {function content_5807a26c9d9e96_64466964($_smarty_tpl) {?><div class="page-header">
    <h1 class="title"><?php if ($_GET['eid']!='') {?>Edit<?php } else { ?>Add<?php }?> Restaurant</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['eid']!='') {?>Edit<?php } else { ?>Add<?php }?> Restaurant</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
         <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>
<a class="setting_button visible-xs" href="#">
        <i class="fa fa-bars"></i>
    </a>
    <div class="adminRight">
		<form name="addNewRestaurant" method="post" action="<?php if ($_GET['eid']!='') {?>restaurantAddEdit.php?eid=<?php echo $_GET['eid'];
} else { ?>restaurantAddEdit.php<?php }?>" onsubmit="return addRestaurantValidate();" enctype="multipart/form-data">
    		<input type="hidden" name="eid" id="eid" value="<?php echo $_GET['eid'];?>
" />
    		<input type="hidden" name="action" value="<?php if ($_GET['eid']=='') {?>Add<?php } else { ?>Edit<?php }?>">
    		
    		<input type="hidden" name="sortby" value="<?php echo $_REQUEST['sortby'];?>
">
    		<input type="hidden" name="keyword" value="<?php echo $_REQUEST['keyword'];?>
">
    		<input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>
">
    		<input type="hidden" name="searchrestaurantid" value="<?php echo $_REQUEST['searchrestaurantid'];?>
">
    		
    		<ul class="nav nav-tabs settings_tab tabcolor5-bg">
    			<li class="active"> 
                    <a href="#contactinfo" id="contactinfo_tab" aria-controls="contactinfo" role="tab" data-toggle="tab">Contact Info </a>
                </li>
    			<li><a  href="#restinfo" aria-controls="restinfo" role="tab" data-toggle="tab">Restaurant Info </a></li> 
    			<li><a href="#deliveryinfo" aria-controls="deliveryinfo" role="tab" data-toggle="tab" onclick="viewMap();">
                Delivery Info </a> </li>
    			<li><a href="#orderinfo" id="orderinfo_tab" aria-controls="orderinfo" role="tab" data-toggle="tab">Order Info </a> </li>
    			<li><a href="#restphoto" aria-controls="restphoto" role="tab" data-toggle="tab">Restaurant Photo </a></li>
    			<li><a href="#commission" aria-controls="commission" role="tab" data-toggle="tab">Commission Info </a></li>
    			<li><a href="#bankinfo" aria-controls="bankinfo" role="tab" data-toggle="tab">Bank A/c Info </a></li>
    			
    		</ul>
    		<div class="tab-content clearfix">
    		
    		<div role="tabpanel" class="tab-pane active form-horizontal" id="contactinfo">
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_contactinfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
    		
    		<div role="tabpanel" class="tab-pane form-horizontal" id="restinfo">
            
    		<input type="hidden" name="rest_info" id="rest_info" value=""/>
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_restaurantinfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
    		<div role="tabpanel" class="tab-pane form-horizontal" id="deliveryinfo">
    		<input type="hidden" name="deli_info" id="deli_info" value=""/>
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_deliveryinfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
    		<div role="tabpanel" class="tab-pane form-horizontal" id="orderinfo">
    		<input type="hidden" name="order_info" id="order_info" value=""/>
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_orderinfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
    		
    		<div role="tabpanel" class="tab-pane form-horizontal" id="restphoto">
    		<input type="hidden" name="photo_info" id="photo_info" value=""/>
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_restaurantphoto.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
    		
    		<div role="tabpanel" class="tab-pane form-horizontal" id="commission">
    			<input type="hidden" name="commission_info" id="commission_info" value=""/>
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_commission.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
    		
    		<div role="tabpanel" class="tab-pane form-horizontal" id="bankinfo">
    			<input type="hidden" name="bank_info" id="bank_info" value=""/>
    			<?php echo $_smarty_tpl->getSubTemplate ('restaurantAddEdit_bankinfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		</div>
    		
            <div class="col-sm-12">
        		<div class="form-group">
            		<div class="col-sm-4 col-sm-offset-4">
            			<input type="submit" class="btn btn-default" id="restaurantAdd" value="<?php if ($_GET['eid']||$_GET['seid']) {?>Save<?php } else { ?>Add<?php }?>"> 
            			<a class="btn" href="restaurantManage.php<?php if ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
} else { ?>?page=1<?php }
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Cancel</a>
            		</div>
                </div>
            </div>
            </div>
    	</form>
	
			
    </div>	
<?php }} ?>
