<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-21 01:54:15
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails_bookatable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:967747444576850efcfdcd6-30588971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da63c39d8fa65096f6ea72b542658128d63662ba' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantDetails_bookatable.tpl',
      1 => 1466424441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '967747444576850efcfdcd6-30588971',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'GUESTS_LIST' => 0,
    'times' => 0,
    'timelist' => 0,
    'SITE_BASEURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_576850efe22bd1_65957688',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576850efe22bd1_65957688')) {function content_576850efe22bd1_65957688($_smarty_tpl) {?><div class="searchResultInner">
	<div class="restDetInfo1Inner">
		<h1 class="bookaTabHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingformenu'];?>
</h1>
				
		<div class="contain">
			<h1 class="bookaTabInfoHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookinginfo'];?>
</h1>
			<form name="booking_form" id="booking_form" method="post" action="" onsubmit="return validateBooking();" class="form-horizontal">
			<input type="hidden" name="rest_id" id="rest_id" value="<?php echo $_REQUEST['resid'];?>
" />
            <input type="hidden" name="bookatable" id="bookatable" value="bookatable" />
				<div class="form-group">
					<div class="col-sm-12">
						<span class="mandatoryfield pull-right"><span class="star">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_mantatory_field'];?>
</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div id="bookingerror" class="center"></div>
					</div>
				</div>

				<div class="form-group">
					<span class="control-label col-sm-3 col-lg-2 col-md-4 col-xs-12 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_noguests'];?>
<span class="star">*</span></span>
					<div class="col-sm-2 col-lg-1 pad0 col-xs-12 mobilecls">
						<select class="form-control" name="num_guests" id="num_guests">
							<option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_book_select'];?>
</option>
							<?php echo $_smarty_tpl->tpl_vars['GUESTS_LIST']->value;?>

						</select>
					</div>
				
					<span class="control-label col-xs-12 col-sm-3 col-md-2 col-lg-2 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingdate'];?>
<span class="star">*</span></span>	
					<div class="col-sm-4 col-lg-2 col-xs-12">
		               	<div class="input-group date dateWid">							
		                    <input type="text" class="form-control booking_date" name="booking_date" id="booking_date" value="" />
		                    <span class="input-group-addon">
						      <span class="glyphicon glyphicon-calendar"></span>
				            </span>
				        </div>
		            </div>

	                <span class="control-label col-sm-3 col-lg-1 font-normal col-xs-12 mobilemargin"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingtime'];?>
<span class="star">*</span></span>
					
                    <div id="Newopentimeclosetimebook" class="col-sm-3">
                                   
                        <?php if ($_smarty_tpl->tpl_vars['times']->value=='') {?> 
                            
                               <select name="booking_hours" id="booking_hours" class="form-control">
                                    <option value="">Closed</option>   
                              </select>
                                 
                           
                        <?php } else { ?>    
                            <select name="booking_hours" id="booking_hours" class="form-control">
                                <?php  $_smarty_tpl->tpl_vars['timelist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['timelist']->_loop = false;
 $_smarty_tpl->tpl_vars['opentime'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['times']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['timelist']->key => $_smarty_tpl->tpl_vars['timelist']->value) {
$_smarty_tpl->tpl_vars['timelist']->_loop = true;
 $_smarty_tpl->tpl_vars['opentime']->value = $_smarty_tpl->tpl_vars['timelist']->key;
?>
                                    <?php echo $_smarty_tpl->tpl_vars['timelist']->value;?>

                                <?php } ?>
                            </select>
                        <?php }?>
                    </div>
				</div>
			
		
			<div class="contain">
				<h1 class="bookaTabContactHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingcontact'];?>
</h1>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingname'];?>
<span class="star">*</span></span>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="booking_name" id="booking_name" value="" />
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingemail'];?>
<span class="star">*</span></span>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="booking_email" id="booking_email" value="" />
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingmobileno'];?>
<span class="star">*</span></span>
					<div class="col-sm-4">
						<span class="code"></span><input type="text" class="form-control" name="booking_mobileno" id="booking_mobileno" value="" />
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookinglandline'];?>
</span>
					<div class="col-sm-4">
						<span class="code"></span><input type="text" class="form-control" name="booking_phoneno" id="booking_phoneno" value="" />
						<span class="line"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingphonecond'];?>
</span>
					</div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookinginst'];?>
</span>
					<div class="col-sm-4">
						<textarea rows="5" cols="" class="form-control" name="booking_instruction" id="booking_instruction"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
					<span  id="booktab"><img src="'<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/images/loader.gif" border="0" alt="Loading" style="display:none"/></span>
					<input type="submit" class="findRestBtn" name="booking_submit" id="booking_submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_bookingbut'];?>
" />
				</div>
				</div>
				
			</div>
			</form>
		</div>
	</div>
</div>

<?php }} ?>
