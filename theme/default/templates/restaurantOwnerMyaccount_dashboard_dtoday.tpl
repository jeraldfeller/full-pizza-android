							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead">{$smarty.now|date_format:"%A, %B %e, %Y"}</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashordertoday}</span>
									<span class="dashorderCount col-sm-3">{$totalordertoday}</span>
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashsalestoday}</span>
									<span class="dashorderCount col-sm-3">{$currency}&nbsp;{if $totalsalesordertoday neq ''}{$totalsalesordertoday}{else}0{/if} </span>
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashdeliverorder}</span>
									<span class="dashorderCount col-sm-3">{$totaldelivertoday} </span>
								</div>
								<div class="menuOuter ">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashpendorder}</span>
									<span class="dashorderCount col-sm-3">{$totalpendingtoday} </span>
								</div>
								<div class="menuOuter ">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/failed-order.png" alt="" title="" /></span>
								
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashfailedrorder}</span>
									<span class="dashorderCount col-sm-3">{$totalfailedtoday} </span>
									
								</div>
								<div class="menuOuter ">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/processing-order.png" alt="" title="" /></span>
									
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashprocessorder}</span>
									<span class="dashorderCount col-sm-3">{$totalprocessingtoday} </span>
									
								</div>
								
								
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name">{$LANG.res_myaccount_dashordertoday}</label>
										<label class="count">{$totalordertoday} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashsalestoday}</label>
										<label class="count">{$currency}&nbsp;{if $totalsalesordertoday neq ''}{$totalsalesordertoday}{else}0{/if}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashdeliverorder}</label>
										<label class="count">{$totaldelivertoday} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashpendorder}</label>
										<label class="count">{$totalpendingtoday} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashfailedrorder}</label>
										<label class="count">{$totalfailedtoday} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashprocessorder}</label>
										<label class="count">{$totalprocessingtoday} </label>
									</li>
								</ul>-->
							</div>