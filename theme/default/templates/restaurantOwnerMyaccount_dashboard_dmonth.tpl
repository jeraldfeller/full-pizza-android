							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead">{$smarty.now|date_format:"%B"}</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashordermonth}</span>
									<span class="dashorderCount col-sm-3">{$totalordermonth}</span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashsalesmonth}</span>
									<span class="dashorderCount col-sm-3">{$currency}&nbsp;{if $totalsalesordermonth neq ''}{$totalsalesordermonth}{else}0{/if} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashdeliverorder}</span>
									<span class="dashorderCount col-sm-3">{$totaldelivermonth} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashpendorder}</span>
									<span class="dashorderCount col-sm-3">{$totalpendingmonth} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/failed-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashfailedrorder}</span>
									<span class="dashorderCount col-sm-3">{$totalfailedmonth} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/processing-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashprocessorder}</span>
									<span class="dashorderCount col-sm-3">{$totalprocessingmonth} </span>									
								</div>
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name">{$LANG.res_myaccount_dashordermonth}</label>
										<label class="count">{$totalordermonth} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashsalesmonth}</label>
										<label class="count">{$currency}&nbsp;{if $totalsalesordermonth neq ''}{$totalsalesordermonth}{else}0{/if}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashdeliverorder}</label>
										<label class="count">{$totaldelivermonth} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashpendorder}</label>
										<label class="count">{$totalpendingmonth} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashfailedrorder}</label>
										<label class="count">{$totalfailedmonth}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashprocessorder}</label>
										<label class="count">{$totalprocessingmonth}</label>
									</li>
								</ul>-->
							</div>