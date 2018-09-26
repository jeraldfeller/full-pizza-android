<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-06 05:19:40
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantOfferAddEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118923889157ce0494eb55f9-91916748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b363290392507992b835ba447178539bfdba91ba' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantOfferAddEdit.tpl',
      1 => 1466424146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118923889157ce0494eb55f9-91916748',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showRestaurantList' => 0,
    'restlist' => 0,
    'restOffEdList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ce0495180f12_35978047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ce0495180f12_35978047')) {function content_57ce0495180f12_35978047($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
    <h1 class="title"><?php if ($_GET['eid']) {?> Edit Restaurant Offer <?php } else { ?> Add New Restaurant Offer<?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active"><?php if ($_GET['eid']) {?> Edit Restaurant Offer <?php } else { ?> Add New Restaurant Offer<?php }?></li>
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

<div class="panel panel-default">
	    <div class="panel-body">
		
		<form name="addNewResOffr" method="post" action="<?php if ($_GET['eid']!='') {?>restaurantOfferAddEdit.php?eid=<?php echo $_GET['eid'];
if ($_GET['resid']!='') {?>&resid=<?php echo $_GET['resid'];
}
} else { ?>restaurantOfferAddEdit.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
}
}?>" onsubmit="<?php if ($_GET['eid']) {?>return editRestaurantOffer(); <?php } else { ?> return addNewRestaurantOffer(); <?php }?>" class="form-horizontal col-sm-12">
			<input type="hidden" name="eid" id="eid" value="<?php echo $_GET['eid'];?>
">
			<input type="hidden" name="resid" id="resid" value="<?php echo $_GET['resid'];?>
">
			<input type="hidden" name="action" value="<?php if ($_GET['eid']=='') {?>Add<?php } else { ?>Edit<?php }?>">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
            <div class="successmsg">NOTE: Able to add multiple offers but the recently added offer alone will be applicable for customers</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div id="errormsg"></div>
				</div>
			</div>
			
			<?php if ($_GET['resid']=='') {?>
			<div class="form-group">
				<span class="control-label col-sm-4">Restaurant Name <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<select class="form-control selectpicker" name="restaurant_name" id="restaurant_name">
					<option value="">Select</option>
					<?php  $_smarty_tpl->tpl_vars['restlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['restlist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['showRestaurantList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['restlist']->key => $_smarty_tpl->tpl_vars['restlist']->value) {
$_smarty_tpl->tpl_vars['restlist']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['restlist']->value['restaurant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['restlist']->value['restaurant_id']==$_smarty_tpl->tpl_vars['restOffEdList']->value[0]['restaurant_id']) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['restlist']->value['restaurant_name']);?>
</option>
					<?php } ?>
					</select>
				</div>
			</div>
			<?php }?>
			
			<div class="form-group">
				<span class="control-label col-sm-4">Offer Percentage <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<div class="input-group">
						<input class="form-control numericfield" type="text" max='100' name="offer_percentage" id="offer_percentage" value="<?php echo $_smarty_tpl->tpl_vars['restOffEdList']->value[0]['offer_percentage'];?>
" />
						<span class="input-group-addon">
							%
						</span>
					</div>
					<?php echo '<script'; ?>
 type="text/javascript">document.addNewResOffr.offer_percentage.focus();<?php echo '</script'; ?>
>
					<input type="hidden" name="offer_id" id="offer_id" value="<?php echo $_smarty_tpl->tpl_vars['restOffEdList']->value[0]['offer_id'];?>
" />
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4">Offer Price <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control numericfield" type="text" name="offer_price" id="offer_price" value="<?php echo $_smarty_tpl->tpl_vars['restOffEdList']->value[0]['offer_price'];?>
" />
				</div>
			</div>
			
			<div class="form-group">
					<span class="control-label col-sm-4">Valid From <span class="color-red">*</span></span>
					<div class="col-sm-4">
					<div class="input-group">
						<input class="form-control" name="offer_valid_from" id="offer_valid_from" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restOffEdList']->value[0]['offer_valid_from'],"%d-%m-%Y");?>
" />
						<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
					</div>
					
				</div>
			</div>
			
			<div class="form-group">
				<span class="control-label col-sm-4">Valid To <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<div class="input-group">
						<input class="form-control" class="textbox" name="offer_valid_to" id="offer_valid_to" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['restOffEdList']->value[0]['offer_valid_to'],"%d-%m-%Y");?>
" />
						<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
					</div>
					
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" class="btn btn-default" id="OfferAdd" name="addEdit" value="<?php if ($_GET['eid']) {?>Edit<?php } else { ?>Add<?php }?>" >
					<a class="btn" href="restaurantOfferManage.php<?php if ($_GET['resid']!='') {?>?resid=<?php echo $_GET['resid'];
if ($_REQUEST['page']!='') {?>&page=<?php echo $_REQUEST['page'];
}
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['page']!='') {?>?page=<?php echo $_REQUEST['page'];
if ($_REQUEST['limit']!='') {?>&limit=<?php echo $_REQUEST['limit'];
}
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['limit']!='') {?>?limit=<?php echo $_REQUEST['limit'];
if ($_REQUEST['sortby']!='') {?>&sortby=<?php echo $_REQUEST['sortby'];
}
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['sortby']!='') {?>?sortby=<?php echo $_REQUEST['sortby'];
if ($_REQUEST['keyword']!='') {?>&keyword=<?php echo $_REQUEST['keyword'];
}
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['keyword']!='') {?>?keyword=<?php echo $_REQUEST['keyword'];
if ($_REQUEST['searchrestaurantid']!='') {?>&searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}
} elseif ($_REQUEST['searchrestaurantid']!='') {?>?searchrestaurantid=<?php echo $_REQUEST['searchrestaurantid'];
}?>">Cancel</a>
			</div>
			</div>
		</form>
	</div>
</div>





    <?php echo '<script'; ?>
 type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            /* numeric inputs can come from the keypad or the numeric row at the top */
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    <?php echo '</script'; ?>
>
<?php }} ?>
