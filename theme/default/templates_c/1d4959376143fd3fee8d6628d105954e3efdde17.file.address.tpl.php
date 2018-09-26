<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 15:09:31
         compiled from "C:\wamp\www\theme\default\templates\address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5568582bc6e1725ed2-39168019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d4959376143fd3fee8d6628d105954e3efdde17' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\address.tpl',
      1 => 1500581369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5568582bc6e1725ed2-39168019',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582bc6e1751037_95374219',
  'variables' => 
  array (
    'restaurants' => 0,
    'LANG' => 0,
    'objCustomer' => 0,
    'addressBook' => 0,
    'customerAddress' => 0,
    'logged_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bc6e1751037_95374219')) {function content_582bc6e1751037_95374219($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('home_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<!-- <div id="victoria">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['name'] = 'elena';
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurants']->value['restaurants']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total']);
?>
		<h1> <?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_name'];?>
	</h1>
	<?php endfor; endif; ?>	
</div> -->

<div class="container">
	<div class="row">
		
		<div class="col-md-7 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 70%;" class="" src="theme/default/images/directions.png">

			<div class="reticulaInterna"></div>					

			<h3 style="font-weight: bold; text-align: center; padding-left: 20px; padding-right: 20px;">
					<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['initial_question']);?>

			</h3>

			<br>			
				
			<div class="item initialOptions" data-name="delivery" role="button" onclick="userSelection(this);">
			    <img class="iconosDirecciones" src="theme/default/images/entregado.png">
			    <span class="caption">Entregado</span>
			</div>	
			<div class="item initialOptions" data-name="pickup" role="button" onclick="userSelection(this);">
			    <img class="iconosDirecciones" src="theme/default/images/retirado.png">
			    <span class="caption">Retirado</span>
			</div>	
			<div class="item initialOptions" data-name="address" role="button" onclick="userSelection(this);" disabled>
			    <img class="iconosDirecciones" src="theme/default/images/Direccion.png">
			    <span class="caption">Rastrea tu pedido</span>
			</div>	

			<br>


<!-- *************************************************DIRECCIONES ALMACENADAS************************************************************ -->
<div id="saveAddressListContainer" class="container hide">
	<div class="row">
		
		<div class="col-md-7 bordeContenedores text-center" style="padding-left: 0; padding-right: 0; box-shadow:none;">
			<!-- <h3 style="font-weight: bold; text-align: center; padding-left: 20px; padding-right: 20px;">
						<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['all_restaurants']);?>

			</h3> -->		
			
			<ul class="restaurantList">
			<?php $_smarty_tpl->tpl_vars['addressBook'] = new Smarty_variable($_smarty_tpl->tpl_vars['objCustomer']->value->addressBookList(), null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['name'] = 'cus_add';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['addressBook']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cus_add']['total']);
?>

				<?php $_smarty_tpl->tpl_vars['customerAddress'] = new Smarty_variable($_smarty_tpl->tpl_vars['objCustomer']->value->addressBookList(), null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['name'] = 'iteracion';
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customerAddress']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['iteracion']['total']);
?>
					<li> 
					<!-- <a href="restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_name'];?>
</a> -->	
						<!-- <?php echo $_smarty_tpl->tpl_vars['customerAddress']->value[$_smarty_tpl->getVariable('smarty')->value['section']['iteracion']['index']]['customer_apartment_name'];?>
 -->
						<a data-name='<?php if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_apartment_name']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_apartment_name']);?>
, <?php }
if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_landmark']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_landmark']);?>
, <?php }
echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_street']);?>
,  <?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['cityname']);?>
, <?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['statename']);?>
 <?php if ($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_zip']!='') {?>-<?php echo stripslashes($_smarty_tpl->tpl_vars['addressBook']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cus_add']['index']]['customer_zip']);?>
 <?php }?>' onclick="addressForCheckout(this)" href="#" ><?php echo $_smarty_tpl->tpl_vars['customerAddress']->value[$_smarty_tpl->getVariable('smarty')->value['section']['iteracion']['index']]['customer_apartment_name'];?>
</a>
					</li>
				<?php endfor; endif; ?>
			<?php endfor; endif; ?>
			</ul>


			
			
		</div>

	</div>
	<br>	
</div>


			
<!-- **************************************************************DIRECCIONES************************************************************ -->
<div id="addressListContainer" class="container hide">
	<div class="row">
		
		<div class="col-md-7 bordeContenedores text-center" style="padding-left: 0; padding-right: 0; box-shadow:none;">
			<h3 style="font-weight: bold; text-align: center; padding-left: 20px; padding-right: 20px;">
						<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['all_restaurants']);?>

			</h3>		

			<ul class="restaurantList">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['name'] = 'elena';
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['restaurants']->value['restaurants']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['elena']['total']);
?>
					<li> <a data-name="<?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_streetaddress'];?>
" href="restaurantDetails.php?resid=<?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_id'];?>
" onclick="saveAddress(this)"><?php echo $_smarty_tpl->tpl_vars['restaurants']->value['restaurants'][$_smarty_tpl->getVariable('smarty')->value['section']['elena']['index']]['restaurant_name'];?>
</a></li>
				<?php endfor; endif; ?>
			</ul>

			
			
		</div>

	</div>
	<br>	
</div>



			<div id="addressContainer" style="display:none;">
				<h3 style="font-weight: bold; text-align: center; padding-left: 20px; padding-right: 20px;">
						<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['kind_question']);?>

				</h3>

				<div class="item" data-name="home" role="button" onclick="userSelection2(this);">
					<img class="iconosDirecciones" src="theme/default/images/Casa.png">
					<span class="caption">Casa</span>
				</div>	
				<div class="item" data-name="apartment" role="button" onclick="userSelection2(this);">
					<img class="iconosDirecciones" src="theme/default/images/apartamento.png">
					<span class="caption">Apartamento</span>
				</div>	
				<div class="item" data-name="office" role="button" onclick="userSelection2(this);">
					<img class="iconosDirecciones" src="theme/default/images/Oficina.png">
					<span class="caption">Oficina/Negocio</span>
				</div>	
				<br>
				<div class="item" data-name="university" role="button" onclick="userSelection2(this);">
					<img class="iconosDirecciones" src="theme/default/images/universidad.png">
					<span class="caption">Universidad/Colegio</span>
				</div>	
				<div class="item" data-name="hotel" role="button" onclick="userSelection2(this);">
					<img class="iconosDirecciones" src="theme/default/images/hotel.png">
					<span class="caption">Hotel</span>
				</div>
				<br>

				<div style="display:none;" id="completeHomeAddress">
					<form id="homeInput" action="restaurantDetails.php" method="post">
						<div class="group grupoInicial">
							<label for="home_number"># de casa</label><br>
							<input type="text" name="gender" id="home_number" required=true>
						</div>	

						<div class="group grupoIntermedio">					
							<label for="street">Calle</label><br>
							<input type="text" name="street" id="homeStreet" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="urbanization">Urbanización</label><br>
							<input type="text" name="urbanization" id="homeUrbanization" required=true>
						</div>
						<br>

						<div class="group grupoInicial">
							<label for="city">Ciudad</label><br>	
							<input type="text" name="city" id="homeCity" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="state">Estado</label><br>	
							<input type="text" name="state" id="homeState" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="zip">Codigo postal</label><br>	
							<input type="text" name="zip" id="homeZip" placeholder="opcional">
						</div>
						<br>	

						<div class="group grupoArea">
							<label for="special_instructions">Instrucciones especiales</label><br>	
							<textarea placeholder="opcional" rows="2" name="special_instructions" id="home_special_instructions"></textarea>	
						</div>	
						<div style="margin-top:25px" class="text-center addressNextButton">
							<input style="width:8%;border:0" type="image" src="theme/default/images/check.png" border="0" alt="Submit" />
						</div>
						
						
						</form> 

								 
				</div>
				
				<div style="display:none;" id="completeApartmentAddress">
					<form id="apartmentInput" action="restaurantDetails.php" method="post">
						<div class="group grupoInicial">
							<label for="building">Edificio</label><br>
							<input type="text" name="building" id="apartmentBuilding" required=true>
						</div> 

						<div class="group grupoIntermedio"> 
							<label for="street">Calle</label><br>
							<input type="text" name="street" id="apartmentStreet" required=true>
						</div> 

						<div class="group grupoIntermedio">
							<label for="urbanization">Urbanización</label><br>
							<input type="text" name="urbanization" id="apartmentUrbanization" required=true>
						</div> 

						<div class="group grupoInicial">
							<label for="city">Ciudad</label><br>
							<input type="text" name="city" id="apartmentCity" required=true>
						</div> 

						<div class="group grupoIntermedio">
							<label for="state">Estado</label><br>
							<input type="text" name="state" id="apartmentState" required=true>
						</div> 

						<div class="group grupoIntermedio">
							<label for="floor">Piso</label><br>
							<input type="text" name="gender" id="floor" required=true>
						</div> 

						<div class="group grupoInicial">
							<label for="apartment">Apartamento</label><br>
							<input type="text" name="gender" id="apartment" required=true>
						</div> 
						
						<div class="group grupoIntermedio">
							<label for="zip">Codigo postal</label><br>
							<input type="text" name="zip" id="apartmentZip">
						</div> 

						<div class="group grupoIntermedio">
							<label for="special_instructions">Instrucciones especiales</label><br>
							<input type="text" name="special_instructions" id="apartment_special_instructions">	
						</div>						
						
						<div style="margin-top:25px" class="text-center addressNextButton">
							<input style="width:8%;border:0;margin-left:2%;margin-top:25px;" type="image" src="theme/default/images/check.png" border="0" alt="Submit" />
						</div>	
					</form> 	 
				</div>

				<div style="display:none;" id="completeOfficeAddress">
					<form id="officeInput" action="restaurantDetails.php" method="post">
						<div class="group grupoInicial">
							<label for="building">Edificio</label><br>
							<input type="text" name="building" id="officeBuilding" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="street">Calle</label><br>
							<input type="text" name="street" id="officeStreet" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="urbanization">Urbanización</label><br>
							<input type="text" name="urbanization" id="officeUrbanization" required=true>
						</div>
						
						<div class="group grupoInicial">
							<label for="city">Ciudad</label><br>
							<input type="text" name="city" id="officeCity" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="state">Estado</label><br>
							<input type="text" name="state" id="officeState" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="floor">Piso</label><br>
							<input type="text" name="floor" id="officeFloor" required=true>
						</div>

						<div class="group grupoInicial">
							<label for="office">Oficina</label><br>
							<input type="text" name="office" id="office" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="business">Empresa</label><br>
							<input type="text" name="business" id="business" required=true>
						</div>
						
						<div class="group grupoIntermedio">
							<label for="zip">Codigo postal</label><br>
							<input type="text" name="zip" id="officeZip">
						</div>

						<div class="group grupoArea">
							<label for="special_instructions">Instrucciones especiales</label><br>
							<textarea placeholder="opcional" rows="2" name="special_instructions" id="office_special_instructions"></textarea>								
						</div>		
						<div style="margin-top:25px" class="text-center addressNextButton">
							<input style="width:8%;border:0" type="image" src="theme/default/images/check.png" border="0" alt="Submit" />
						</div>	
					</form> 
				</div>

				<div style="display:none;" id="completeUniversityAddress">
					<form id="universityInput" action="restaurantDetails.php" method="post">
						<div class="group grupoInicial">
							<label for="building">Edificio</label><br>
							<input type="text" name="building" id="universityBuilding" required=true>
						</div>
						
						<div class="group grupoIntermedio">
							<label for="street">Calle</label><br>
							<input type="text" name="street" id="universityStreet" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="urbanization">Urbanización</label><br>
							<input type="text" name="urbanization" id="universityUrbanization" required=true>
						</div>

						<div class="group grupoInicial">
							<label for="city">Ciudad</label>
							<input type="text" name="city" id="universityCity" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="state">Estado</label><br>
							<input type="text" name="state" id="universityState" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="floor">Piso</label><br>
							<input type="text" name="floor" id="universityFloor" required=true>
						</div>

						<div class="group grupoInicial">
							<label for="classroom">Salón</label><br>
							<input type="text" name="classroom" id="universityClassroom" placeholder="opcional">
						</div>

						<div class="group grupoIntermedio">
						<label for="university">Universidad/Colegio</label><br>
  						<input type="text" name="university" id="university" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="faculty">Facultad/Escuela</label><br>
							<input type="text" name="faculty" id="faculty" placeholder="opcional">
						</div>
						
						<div class="group grupoInicial">
							<label for="zip">Codigo postal</label><br>
							<input type="text" name="zip" id="universityZip">
						</div>

						<div style="width:53%;" class="group grupoIntermedio">
							<label for="special_instructions">Instrucciones especiales</label><br>	
							<input type="text" name="special_instructions" id="university_special_instructions">
						</div>	
						<div style="margin-top:25px" class="text-center addressNextButton">
							<input style="width:8%;border:0;margin-left:2%;margin-top:25px;" type="image" src="theme/default/images/check.png" border="0" alt="Submit" />
						</div>		
					</form>	 
				</div>

				<div style="display:none;" id="completeHotelAddress">
					<form id="hotelInput" action="restaurantDetails.php" method="post">
						<div class="group grupoInicial">
						<label for="hotel">Hotel</label><br>
  						<input type="text" name="hotel" id="hotel" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="street">Calle</label><br>
							<input type="text" name="hotel" id="hotelStreet" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="urbanization">Urbanización</label><br>
							<input type="text" name="urbanization" id="hoteUrbanization" required=true>
						</div>

						<div class="group grupoInicial">
							<label for="city">Ciudad</label><br>
							<input type="text" name="city" id="hotelCity" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="state">Estado</label><br>	
							<input type="text" name="state" id="hotelState" required=true>
						</div>

						<div class="group grupoIntermedio">
							<label for="floor">Piso</label><br>	
							<input type="text" name="floor" id="hotelFloor" required=true>
						</div>

						<div class="group grupoInicial">
							<label for="room">Habitación</label><br>	
							<input type="text" name="room" id="hotelRoom" required=true>
						</div>
						  
						<div class="group grupoIntermedio">
							<label for="zip">Codigo postal</label><br>	
							<input type="text" name="zip" id="hotelZip">
						</div>
						<div class="group grupoIntermedio">
							<label for="special_instructions">Instrucciones especiales</label><br>	
							<input type="text" name="special_instructions" id="hotel_special_instructions">
						</div>	
						<div style="margin-top:25px" class="text-center addressNextButton">
							<input style="width:8%;border:0;margin-left:2%;margin-top:25px;" type="image" src="theme/default/images/check.png" border="0" alt="Submit" />
						</div>	
					</form>		 
				</div>	


			</div>

			<h3 id="middle_question_map" style="display:none;font-weight: bold; text-align: center; padding-left: 20px; padding-right: 20px;">
					<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['middle_question']);?>

			</h3>
			<br>
			<input id="pac-input" class="controls" type="text" placeholder="Busca un lugar" style="display: none;">
			<div style="width: 100%; height: 400px; display:none;" id="map"></div>
			<br>

			<div id="addressForm" style="display:none;">
				<form name="customer_register" method="post" action="" onsubmit="return customerRegisterValidate();" class="form-inline">			
							
				  	<div class="form-group">									
						<div class="col-sm-5">
							<input placeholder="Calle" style="margin-left: 10%;" type="text" class="form-control bordesInputs" name="customer_street" id="customer_street" />														
						</div>
						
					</div>
				  	<div class="form-group">						
						<div class="col-sm-5">
							<input placeholder="Ciudad" type="text" class="form-control bordesInputs" name="customer_city" id="customer_city"  />							
						</div>
				   	</div>

				   	<div class="form-group">						
						<div class="col-sm-2">
							<input placeholder="Código postal" type="text" class="form-control bordesInputs" name="customer_zip_code" id="customer_zip_code"  />							
						</div>
				   	</div>							  
							  
							
						<br>
						<br>
						<!-- Login Info end -->
						<div class="contain">
						 <div class="form-group">
							<div class="col-md-12 text-center">
								
								<input type="image" id="customerregistersubmit" style="width: 24%;" src="../theme/default/images/check.png"/>
								
							</div>
						</div>
						</div>
					
				</form>
			</div>

			
			
		</div>

		<div class="col-md-1">
		</div>

		<div class="col-md-4 bordeContenedores text-center" style="padding-left: 0; padding-right: 0">
			<img style="width: 45%;" class="" src="theme/default/images/Opciones.png">

			<div class="reticulaInterna"></div>		
			<br>
			<div class="text-center">
				<?php if ($_smarty_tpl->tpl_vars['logged_user']->value) {?>
				<!-- <p style="font-weight: bold; font-size:20px"> Direcciones </p> -->
				<button data-name="addresses" onclick="userSelection(this);" style="font-weight: bold;font-size:20px;border: none;background: none;width: 100%;"> Direcciones </button>
				<hr style="width:80%; margin-top: 0; border: 1px solid black;">
				<?php }?>
				<button data-name="pickup" onclick="userSelection(this);" style="font-weight: bold;font-size:20px;border: none;background: none;width: 100%;"> Tiendas </button>
				<hr style="width:80%; margin-top: 0; border: 1px solid black;">
				
				<button data-toggle="collapse" data-target="#demo" style="font-weight: bold;font-size:20px;border: none;background: none;width: 100%;">Métodos de pago</button>

				<div id="demo" class="collapse">
					<button class="cardBackground"><img class="cardButton" src="theme/default/images/money.png"><br>Efectivo</button>
					<button class="cardBackground"><img class="cardButton" src="theme/default/images/credit.png"><br>Tarjeta de Crédito</button>
					<button class="cardBackground"><img class="cardButton" src="theme/default/images/debit.png"><br>Tarjeta de Débito</button>
				</div>
			</div>			

			

			<br>	
		</div>

	</div>
	<br>	
</div>











<style type="text/css">
	
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
#target {
        width: 345px;
}

/*---------------------------------------LISTA DE RESTAURANTS----------------------------------------------*/

.hide {
	display: none;
}

.restaurantList>li {
    padding: 1%;
    border-bottom: 1px solid #eee;
    margin: 2%;
    padding-top: 0% !important;
    font-size: 18px;
}

.restaurantList>li:last-child {
	border-bottom: none; 
	margin-bottom: 0 !important;
	padding-bottom: 0 !important; 
}

.restaurantList a {
    color: black;
}

.restaurantList a:hover {
    font-weight: bold;
    transition: 0.5s;
    text-decoration: none;
}


/*------------------------------------------PIZZAS ORDENAR--------------------------------------------*/

.pizzasContainer {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.pizzasContainer li {
    display: inline-block;
    width: 50%;
    vertical-align: middle;
  }



#myform,
#myformTwo,
#myformThree {
    text-align: center;
    padding: 5px;
    margin: 2%;
}
.qty,
.qtyTwo,
.qtyThree {
    width: 40px;
    height: 25px;
    text-align: center;
    border: none;
}
input.qtyplus,
input.qtyplusTwo,
input.qtyplusThree {
    width: 25px;
    height: 25px;
    background: url("../theme/default/images/ADD_number.png");
    background-size: cover;
    border: none;
}
input.qtyminus,
input.qtyminusTwo,
input.qtyminusThree {
    width: 25px;
    height: 25px;
    background: url("../theme/default/images/Remove_number.png");
    background-size: cover;
    border: none;
}


@media screen and (min-width: 20em) {

.pizzasContainer li {
    width: 33%;
    vertical-align: middle;
  }

}

/*--------------------------------------PIZZA LIST---------------------------------------*/

.pizzaList table {
	width: 90%;
}

.PizzaListIcon {
    text-align: right;
    padding: 2%;
}

.PizzaListText {
    padding: 2%;
    border-bottom: 1px solid black;
}

.PizzaListTextLast {
    padding: 2%;
}

.PizzaMenuListItem a {
	color: black;
}

.PizzaMenuListItem a:hover,
.PizzaMenuListItem:hover {
	font-weight: bold;
    transition: 0.5s;
    text-decoration: none;
}

/*---------------------------------------------------------------------------------------*/

/*------------------------------------PIZZA TYPES--------------------------------------*/

.PizzaTypes {
	padding: 3%;
}

.PizzaTypes a {
	color: black;
	text-align: left;
}

.PizzaTypes li {
    padding: 1%;
    border-bottom: 1px solid #eee;
    margin: 2%;
    padding-top: 0% !important;
}

.PizzaTypes li:last-child {
	border-bottom: none; 
	margin-bottom: 0 !important;
	padding-bottom: 0 !important; 
}


.PizzaTypesTitle {
    font-size: x-large;
    font-weight: bold;
    margin: 0;
}

.PizzaTypesDescription {
    font-style: italic;
}

.group{
	display: inline-block;
}

.group label{
	margin-left: 12px;
}

.group textarea{
	border-radius: 10px;
    border: 2px solid #3D3D3D;
    width: 100%;
	text-align: left;
	padding-left: 10px;
}

.grupoArea{
	width: 25%;
    text-align: left;
    margin-top: 10px;
}

input{
	border: 2px solid #3D3D3D;
	border-radius: 10px;
	width: 100%;
    text-align: left;
	padding-left: 10px;
}

.grupoInicial{
	float: left;
    margin-left: 10%;
    width: 25%;
    text-align: left;
	margin-top: 10px;
}

.grupoIntermedio{
	float: left;
    margin-left: 3%;
    width: 25%;
    text-align: left;
	margin-top: 10px;
}

.cardBackground {
    border: none;
    background: none;
    width: 100%;
    padding: 3%;
    text-align: center;
}

.cardButton {
    width: 23%;
    height: 55px;
}

.cardButton:hover {
    background-color: #FCCA06;
    transition: 0.4s;
}

</style>

<?php echo '<script'; ?>
 type="text/javascript">
	
	$(function(){
	    // This button will increment the value
	    $('.qtyplus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminus").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    // This button will increment the value
	    $('.qtyplusTwo').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusTwo").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	    // This button will increment the value
	    $('.qtyplusThree').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminusThree").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });


	});

	function initMap() {
	var myLatLng = {lat: -25.363, lng: 131.044};
  
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 9, lng: -80},
    zoom: 8
  });
  
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;
  
  


  /*var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    draggable:true,
    title: 'Hello World!'
  });*/

  map.addListener('click', function(e) {
    placeMarkerAndPanTo(e.latLng, map);
    geocodeLatLng(geocoder, map, e.latLng, infowindow);

  });

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
  
}
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&libraries=places&callback=initMap"
         async defer><?php echo '</script'; ?>
>


<?php }} ?>
