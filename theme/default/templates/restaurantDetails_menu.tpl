<div class="searchResultInner">
	<div class="detailsInnerNewWrap">
		<div id="detailsRightRelated" class="middledivheight">
			<div class="catleftInTopWrap col-md-3 pad0 categoryScroll hidden-xxs">
				<div class="catleftIn borderbox" id="catScrollDiv">
					<div class="categoryleft pad0">
						<div class="filterOtion clearfix">
							<div class="fine_menu_head">{$LANG.res_find_menu_items|utf8_encode}</div>
							<input type="text" class="srchMenuitem" id="menuvalue" name="menuvalue" autocomplete="off" value="" placeholder="Search menu items" onkeyup="return searchMenuItems({$smarty.get.resid});" />
						</div>
						<div class="categorySelect resmenuCategory">
							<h2 id="selectcatname">{*$LANG.res_select_catagory*}{$LANG.res_catagory|utf8_encode}</h2>						
							{*<span class="fullMeuListHead">{$LANG.res_categories}<span class="selectboxClose"></span></span>*}
							<ul class="fullMeuListUl">
								{section name="cat" loop=$categoryList}
								
								{assign var=catnam value=$categoryList[cat].catname}
									{if $categoryList[cat].catname neq ''}
									<li><a href="#catname_{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[cat].catname}" class="selectCategory">{$categoryList[cat].catname|ucfirst|stripslashes}</a></li>
									{/if}
								{/section}
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="middleIn col-lg-9 col-md-9 col-sm-12  col-xs-12">
				{*<a class="menufixedMobile" href="#menu_container"><img src="{$SITE_IMAGE_URL}/menucart.png" alt="" title=""/></a>*}
				{*<div class="catleftInTopWrap">
					<div class="catleftIn borderbox">
						<div class="categoryleft">
							<div class="categorySelect resmenuCategory">
								<div class="btn-group">
								<div class="resArrowLine btn btn-default btn-large" id="selectcatname">{$LANG.res_select_catagory}</div>
								<div class="btn btn-default btn-large dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</div>	
								</div>						
								<div class="fullMeuList" style="display:block;">
									<span class="fullMeuListHead">{$LANG.res_categories}<span class="selectboxClose"></span></span>
									<ul class="fullMeuListUl">
										{section name="cat" loop=$categoryList}
										{assign var=catnam value=$categoryList[cat].catname}
											{if $categoryList[cat].catname neq ''}
											<li><a href="#catname_{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[cat].catname}" class="selectCategory">{$categoryList[cat].catname|ucfirst|stripslashes}</a></li>
											{/if}
										{/section}
									</ul>
								</div>
							</div>
							<input type="text" class="srchMenuitem" id="menuvalue" name="menuvalue" autocomplete="off" value="" placeholder="Search menu items" onkeyup="return searchMenuItems({$smarty.get.resid});" />
						</div>
					</div>
				</div>*}
				{*<div class="catleftInTopWrap">
					<div class="catleftIn">
					   <div class="textbox-leftIcn"><i class="glyphicon glyphicon-search"></i></div>
					   <input type="text" class="srchMenuitem" id="menuvalue" name="menuvalue" autocomplete="off" value="" placeholder="Search menu items" onkeyup="return searchMenuItems({$smarty.get.resid});" />

					   <div class="category-leftIcn">Select Category <i class="caret"></i></div>
						<ul class="fullMeuListUl">
							<li><span href="javascript:void(0);">All Category</span></li>
							{section name="cat" loop=$categoryList}
							{assign var=catnam value=$categoryList[cat].catname}
								{if $categoryList[cat].catname neq ''}
								<li><a href="#catname_{"/[^a-zA-Z0-9]/"|preg_replace:"":$categoryList[cat].catname}" class="selectCategory">{$categoryList[cat].catname|ucfirst|stripslashes}</a></li>
								{/if}
							{/section}
						</ul>
					</div>
				</div>*}
		
				{************* Category List End *****************}
				<div class="menuContain borderbox">
					{************* Loading Image Veg &amp; Non Menus *****************}
					<div id="loadingimg_vegnonveg_items" style="display:none;"></div>
					
					{*--------------------- All Menu List Start -------------------------*}
					<div class="menuSrchTop">
						<div id="Indiv_Items">
							{include file='restaurantDetails_menu_ajax.tpl'}
						</div>
					</div>
				</div>
			</div>
			<div id="menu_container" class="cartMenu">
				<div class="detailsRight11 menuRightFixed" id="sidebar">
					{*<h1 class="detailsRightHead borderbox">{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes} {$LANG.res_details_order}</h1>*}
					<h1 class="detailsRightHead borderbox">{*$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes} {$LANG.res_details_order*}<span>Your Order</span> <span class="cart-close pull-right">X</span></h1>
					<div class="detailsRightMiddle1 borderbox">
					<form name="checkoutpage" method="post" onclick="{if $smarty.session.customerid eq ''}return clear(){/if}" action="{$SITE_BASEURL}/{if $smarty.session.customerid eq ''}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerLogin.php?pagetype=checkout{else}custlogin/checkout{/if}  {else}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}checkout.php{else}checkout{/if}{/if}" >
						<input type="hidden" name="minimumorder" id="minimumorder" value="{$searchrestaurantDetails.0.restaurant_minorder_price}"/>
						<input type="hidden" name="total" id="totalprice" value="{$total}"/>
						<input type="hidden" name="resid" id="resid" value="{$smarty.request.resid}"/>
						<input type="hidden" name="resname" id="resname" value="{$smarty.request.resname}"/>
						<div class="contain center">
						{*if $pickupoption eq 'Yes'}
								<div class="madInputPopup1">
									<input type="radio" name="deliverypickup"  {if $smarty.session.deliverypickup neq '' && $smarty.session.deliverypickup eq 'pickup'}checked="checked"{elseif $pickupoption eq 'Yes' && $deliveryoption neq 'Yes' && $smarty.session.deliverypickup eq 'pickup' }checked="checked"{elseif $pickupoption eq 'Yes' && $smarty.session.deliverypickup eq '' && $smarty.session.deliverypickup eq 'pickup' }checked="checked"{/if} id="pickupopt" class="radio1 flt" value="pickup" onclick="pickupbutton();" style="display:none;"/>
									<input type="radio" name="deliverypickup"  {if $deliveryoption neq 'No' || $smarty.request.ordoption eq 'pickup'}checked="checked"{/if} id="pickupopt" class="radio1 flt" value="pickup" onclick="pickupbutton();"  style="display:none;"/>
									<label class="deliPickName pick-img" for="pickupopt"> 	{$LANG.res_details_pickup}</label>
								</div>
						{/if}
						{if $deliveryoption eq 'Yes'}
						
							<div class="madInputPopup1">
								<input type="radio" name="deliverypickup" id="deliveryopt" class="radio1 flt" {if $smarty.session.deliverypickup neq '' && $smarty.session.deliverypickup eq 'delivery'}checked="checked"{elseif $deliveryoption eq 'Yes' && $smarty.session.deliverypickup eq 'delivery'}checked="checked"{elseif $smarty.session.deliverypickup eq ''}checked="checked"{/if} value="delivery" onclick="deliverybutton();" style="display:none;"/>
								<input type="radio" name="deliverypickup" id="deliveryopt" class="radio1 flt" {if $smarty.request.ordoption neq 'pickup'}checked="checked"{/if} value="delivery" onclick="deliverybutton();"  style="display:none;"/>
								<label class="deliPickName deli-img" for="deliveryopt">{$LANG.res_details_delivery}</label>
							</div>
						{/if*} 
						{*	{if $pickupoption eq 'Yes'}
							<div class="madInputPopup">
								<input type="radio" name="deliverypickup"  {if $deliveryoption eq 'No' || $smarty.session.deliverytype eq 'pickup'}checked="checked"{/if} id="pickupopt" class="radio1 flt" value="pickup" onclick="pickupbutton();"/>
								<label class="deliPickName">{$LANG.res_details_pickup}</label>
							</div>
						{/if}
						
						{if $deliveryoption eq 'Yes'}
							<div class="madInputPopup">
								<input type="radio" name="deliverypickup" id="deliveryopt" class="radio1 flt" {if $smarty.session.deliverytype neq 'pickup'}checked="checked"{/if} value="delivery" onclick="deliverybutton();"/>
								<label class="deliPickName">{$LANG.res_details_delivery}</label>
							</div>
						{/if} *}
						</div>
						<div class="restaurantMenuAddtocartmm">
						
							{include file='cart.tpl'}
						
						</div>
					</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="orderPopup_limit" class="addtocartWrapNew1" style="display:none;">
    <span  class="orderLima"><span id="limitaddon"></span><span class="limitClose" onclick="myPopupWindowClose('#orderPopup_limit','#maskaa')">X</span></span>
</div>
<div id="maskaa"></div>
<!-- Note It POPUP -->
<div id="noteitpop" style="display:none; width:539px;">
	<div class="addtoCartInner">
		<div class="addtocartPopupHead popupNoteWidth">
			<h1 class="addtocartPopupHeadNew">{$LANG.res_addtocart_heading|utf8_encode}</h1>
			<div class="addtoCartClose" onclick="myPopupWindowClose('#noteitpop');"></div>
		</div>
		<div class="addtocartPopup popupNoteWidth" >
			<div class="addtocartWrap popupNoteWidthInner">
				<h1 class="popupNoteitHead">{$LANG.res_wings_with_fries|utf8_encode}</h1>
				<span class="popupNoteCam"></span>
				<div class="addTableCart">
					<div class="addtoCartInBorder">
						<div class="addTableCartLeft">{$LANG.res_how_was_it|utf8_encode}</div>
						<div class="addTableCartRight">
							<span class="popupTastyNote">{$LANG.res_tasty|utf8_encode}</span>
							<span class="popupPassNote">{$LANG.res_will_pass|utf8_encode}</span>
						</div>
					</div>
					<div class="addtoCartInBorder">
						<div class="addTableCartLeft">{$LANG.res_note|utf8_encode}</div>
						<div class="addTableCartRight">
							<textarea rows="" cols="" class="addtocartTxtarea" name="" id="" ></textarea>
							<div class="addChargesApply"><input type="checkbox" />{$LANG.res_keep_it_yourself|utf8_encode}</div>
						</div>
					</div>
					<div class="addtoCartInBorder">
						<div class="addTableCartLeft">{$LANG.res_stick_it_where|utf8_encode}</div>
						<div class="addTableCartRight">
							<select class="addtocartSelect1" name="" id="" >
								<option>All Notes</option>
							</select>
						</div>
					</div>
					<div class="addtoButton1">
						<span class="loginBtnNew"></span>
						<input class="loginBtnNewRite" type="button" value="Add to Cart" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
