<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 22:23:40
         compiled from "C:\wamp\www\theme\default\templates\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:846584e01e1953f82-11716978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd760219dcb26439337241704e145aaace385fb5' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\cart.tpl',
      1 => 1499158828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '846584e01e1953f82-11716978',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_584e01e1e79122_78446410',
  'variables' => 
  array (
    'LANG' => 0,
    'cartDetails' => 0,
    'SITE_IMAGE_URL' => 0,
    'currency' => 0,
    'cartDetailsCnt' => 0,
    'subtotal' => 0,
    'pointOffer' => 0,
    'PointPercentage' => 0,
    'salestax' => 0,
    'taxamount' => 0,
    'deliveryoption' => 0,
    'deliverycharge' => 0,
    'newdeliverycharge' => 0,
    'rest_offer_percentage' => 0,
    'offer' => 0,
    'offervalue' => 0,
    'total' => 0,
    'pickupoption' => 0,
    'minorderprice' => 0,
    'searchrestaurantDetails' => 0,
    'withoutdel_total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e01e1e79122_78446410')) {function content_584e01e1e79122_78446410($_smarty_tpl) {?><div class="contain">
	<div style="background: white;" class="cart_details col-md-12 col-xs-12 col-sm-12">
		<p style="font-size: x-large !important;" class="AgentOrange">my cart</p>

		<div class="reticulaInterna"></div>

    	<input type="hidden" name="deliverytype" id="ordoption" value="<?php echo $_REQUEST['ordoption'];?>
" />
		
		<ul class="detRiteNewCont1Ul ulBg">
			<li class="item no-border"><label class="bgNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_item'];?>
</label></li>
			<li class="Qty"><label class="bgNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_qty'];?>
</label></li>
			<li class="price"><label class="bgNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_price'];?>
</label></li>
			<!-- <li class="del"><label class="bgNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_del'];?>
</label></li> -->
		</ul>	
		<div class="cartitem-list">		
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cart'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['name'] = 'cart';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cartDetails']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total']);
?>
			<div class="ulcartwrap" id="<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menuid'];?>
">
				<input type="hidden" name="menu" id="menuid<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cart']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menuid'];?>
" />
				<input type="hidden" name="cart" id="cartid<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cart']['rownum'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['cart_id'];?>
" />
		              
				<ul class="detRiteNewCont1Ul">
					<li class="item">		
						<label class="<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menutype']=='veg') {?>contNew1<?php } else { ?>contNew1<?php }?>"><?php echo html_entity_decode(stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menuname'])));
if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_size']!='') {?> <small>(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_size'];?>
)</small><?php }?> </label>
					</li>
					<li class="Qty"><label class="<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menutype']=='veg') {?>contNew1<?php } else { ?>contNew1<?php }?>"> 
                        <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/Remove_number.png" alt="" title="" style="cursor:pointer;width: 25%;margin-right: 10%;" onclick="return orderItemDecInc(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cart']['rownum'];?>
,'0');" />
						<span><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['quantity'];?>
 </span>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/Add_number.png" alt="" title="" style="cursor:pointer;width: 25%;margin-right: 10%;" onclick="return orderItemDecInc(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cart']['rownum'];?>
,'1');" />
					</li>
					<li class="price"><label class="<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['menutype']=='veg') {?>contNew1<?php } else { ?>contNew1<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['tot_menuprice'];?>
</label></li>
					<li class="del"><label class="delete" onclick="return deletecartItem(<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['cart_id'];?>
);"></label></li>
				
				<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_crustname']!='') {?>
					<li class="deal_info_desc1">
						<div class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_crust'];?>
:
						<?php echo stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_crustname']);?>
&nbsp;</div>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_addonsname']!='') {?>
					<li class="deal_info_desc1">
						<div class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_addtocart_topping'];?>
:
						<?php echo html_entity_decode(stripslashes($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['pizza_addonsname']));?>
&nbsp;</div>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsname']!='') {?>
					<li class="deal_info_desc1">
						<div class="contain"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_addons'];?>
:
						<?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsname']));?>
&nbsp;</div>
						<!--<span class="flt"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsname']));?>
&nbsp;(<?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['addonsprice'];?>
 Extra)</span>-->
					</li>
				<?php }?>
				<!-- <?php if ($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['specialinstruction']!='') {?>
					<li class="deal_info_desc1">
						<div class="contain"><b><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_instruction'];?>
:</b>
						<label class="instr"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['cartDetails']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['specialinstruction']));?>
</label></div>
					</li>
				<?php }?> -->
				</ul>
			</div>
			<?php endfor; else: ?>
			<span class="noOrderYet"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_noitem'];?>
</span>
		<?php endif; ?>
		</div>
		
        
		<ul class="detRitePriceCont1Ul">
			<li>
				<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_subtot'];?>
:</label>
				<label class="price1"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['subtotal']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['subtotal']->value);
} else { ?>0.00<?php }?></label>
			</li>
            <?php if ($_smarty_tpl->tpl_vars['pointOffer']->value>0) {?>
                <li>
                    <label class="txt1">Reward offer price(<?php echo $_smarty_tpl->tpl_vars['PointPercentage']->value;?>
%):</label>
    				<label class="price1"><?php echo $_smarty_tpl->tpl_vars['pointOffer']->value;?>
</label>
                </li>
            <?php }?>
			<li>
				<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_notax'];
if ($_smarty_tpl->tpl_vars['salestax']->value!='0.00') {?>(<?php echo $_smarty_tpl->tpl_vars['salestax']->value;?>
 %)<?php }?>:</label>
				<label class="price1"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['salestax']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['taxamount']->value);
} else { ?>0.00<?php }?></label>
			</li>
			<?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {?>
				<li id="deliveryShowCharge" <?php if ((!isset($_REQUEST['ordoption']))||($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes'&&isset($_REQUEST['ordoption'])&&$_REQUEST['ordoption']=='pickup')) {?> style="display:none;" <?php }?>>
					<label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_delcharge'];?>
:</label>
                    <?php if ($_REQUEST['ordoption']=='delivery'||$_SESSION['deliverypickup']=='delivery') {?>
					   <label class="price1"><span class="color3"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0) {
if ($_smarty_tpl->tpl_vars['deliverycharge']->value=='0.00') {?>Free<?php } else {
echo $_smarty_tpl->tpl_vars['deliverycharge']->value;
}
} else { ?>0.00<?php }?></span></label>
                    <?php } else { ?>
                         <label class="price1"><span class="color3"><?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0) {
if ($_smarty_tpl->tpl_vars['newdeliverycharge']->value=='0.00') {?>Free<?php } else {
echo $_smarty_tpl->tpl_vars['newdeliverycharge']->value;
}
} else { ?>0.00<?php }?></span></label>
                    <?php }?>   
				</li> 
			<?php }?>
			<!--<?php if (!empty($_smarty_tpl->tpl_vars['rest_offer_percentage']->value)) {?> 
				<li class="chooseCouponHeight">
					<div class="chooseCoupon offerCouponLft">Offers :</div>
						<div class="chooseCoupon offerCouponRht">
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['rest_offer_percentage']->value;?>
 % OFF" name="offerid" id="offerid" readonly>
					</div>
				</li>			
			<?php }?>-->
            <?php if (!empty($_smarty_tpl->tpl_vars['rest_offer_percentage']->value)) {?>
            <input type="hidden" name="offer" id="offer" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value;?>
" />
            <?php if ($_smarty_tpl->tpl_vars['offervalue']->value>0) {?>
                <li>
                    <label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_discount'];?>
 <span id="offerid"><?php echo $_smarty_tpl->tpl_vars['rest_offer_percentage']->value;?>
 % OFF</span>:</label>
                    <label class="total1" id="total1" ><?php if ($_smarty_tpl->tpl_vars['offervalue']->value!='') {?>- <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['offervalue']->value);
} else { ?>0.00<?php }?></label>
                </li>
            <?php }?>
            <?php }?>
            <?php if ($_SESSION['voucherPrice']!='') {?>
                <li>
                    <label class="txt1">Voucher Price:</label>
                    <label class="total1" id="total1" >- <?php echo sprintf("%.2f",$_SESSION['voucherPrice']);?>
</label>
                </li>
            <?php }?>
            <li class="totalWithoutDelCharge" style="display:none;">
                <label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_total'];?>
:</label>
                <label class="total1" id="total1"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!='') {
echo sprintf("%.2f",($_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['deliverycharge']->value));
} else { ?>0.00<?php }?></label>
            </li>
            <li class="totalWithDelCharge">
                <label class="txt1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_total'];?>
:</label>
                <label class="total1" id="total1"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['total']->value!='') {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);
} else { ?>0.00<?php }?></label>
            </li>
		</ul>
    	<div style="display: none;" class="picdeliver">		
			<?php if ($_smarty_tpl->tpl_vars['pickupoption']->value=='Yes') {?>
				<div class="madInputPopup col-sm-6">
					<input type="radio" name="deliverypickup"  <?php if ($_SESSION['deliverypickup']!=''&&$_SESSION['deliverypickup']=='pickup') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['pickupoption']->value=='Yes'&&$_smarty_tpl->tpl_vars['deliveryoption']->value!='Yes'&&$_SESSION['deliverypickup']=='pickup') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['pickupoption']->value=='Yes'&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?>checked="checked"<?php }?> id="pickupopt" class="radio1 flt" value="pickup" onclick="pickupbutton();"/>
					
					<label for="pickupopt" class="deliPickName"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_pickup'];?>
</label>
				</div>
			<?php }?>
				
			<?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {?>
				<div class="madInputPopup  col-sm-6">
					<input type="radio" name="deliverypickup" id="deliveryopt" class="radio1 flt" <?php if ($_SESSION['deliverypickup']!=''&&$_SESSION['deliverypickup']=='delivery') {?>checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes'&&$_SESSION['deliverypickup']=='delivery') {?>checked="checked"<?php } elseif ($_SESSION['deliverypickup']==''&&$_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {?>checked="checked"<?php }?>  value="delivery" onclick="deliverybutton();"/>
					
					<label for="deliveryopt" class="deliPickName"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_delivery'];?>
</label>
				</div>
			<?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes') {?>
			<p class="detMinOrder"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_mindelivery'];?>
: <span style=" font:12px montserratregular; color:#000000;"><?php echo $_smarty_tpl->tpl_vars['currency']->value;
echo $_smarty_tpl->tpl_vars['minorderprice']->value;?>
</span></p>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['pickupoption']->value=='Yes') {?>
			<p class="detMinOrder"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_details_minorders'];?>
</p>
		<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Open'||$_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Preorder') {?>
    
    	<?php if (($_smarty_tpl->tpl_vars['deliveryoption']->value=='Yes'||$_smarty_tpl->tpl_vars['pickupoption']->value=='Yes')&&$_smarty_tpl->tpl_vars['total']->value>0) {?>
    	
    		<div class="contain center hideCheckoutButton marginBtm12" <?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value=='No') {?> style="display:none;" <?php }?>>
    			<?php if ($_smarty_tpl->tpl_vars['total']->value<=$_smarty_tpl->tpl_vars['minorderprice']->value||$_smarty_tpl->tpl_vars['cartDetailsCnt']->value==0) {?>
    			
    				<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit" class="btn btn-default btn-block" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Open') {?>Proceed Check Out<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Preorder') {?>Pre Order<?php }?>" />
    				</span>
    			<?php } else { ?>
    				
                	<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit"  class="btn btn-info checkout_btn btn-block" value="<?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Open') {?>Proceed Check Out<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Preorder') {?>Pre Order<?php }?>" />
    				</span>
    				
    			<?php }?>
    		</div>
    		<div class="contain center showCheckoutButton marginBtm12" <?php if ($_smarty_tpl->tpl_vars['deliveryoption']->value!='No') {?> style="display:none;" <?php }?>>
    			
    			<?php if ($_smarty_tpl->tpl_vars['cartDetailsCnt']->value>0&&$_smarty_tpl->tpl_vars['withoutdel_total']->value!='') {?>
    				<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit"  class="btn btn-info checkout_btn btn-block" value="<?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Open') {?>Proceed Check Out<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Preorder') {?>Pre Order<?php }?>" />
						
    				</span>
    			<?php } else { ?>
    				<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit" class="btn col-md-12 pad0" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Open') {?>Proceed Check Out<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Preorder') {?>Pre Order<?php }?>" />
    				</span>
    			<?php }?>
    		</div>
    	<?php } else { ?>
    		<div class="contain center marginBtm12">
    			<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    				<input type="submit" class="btn btn-default btn-block" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Open') {?>Proceed Check Out<?php } elseif ($_smarty_tpl->tpl_vars['searchrestaurantDetails']->value[0]['status']=='Preorder') {?>Pre Order<?php }?>" />
    			</span>
    		</div>
    	<?php }?>
    <?php } else { ?>
        <div class="contain center marginBtm12">
    		<input type="button" disabled="disabled" class="btn btn-default btn-block" value="Closed" />
		</div>
    <?php }?>
	</div>	
	
</div>	<?php }} ?>
