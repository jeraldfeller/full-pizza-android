							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead">{$LANG.res_myaccount_dashweek}</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashorderweek}</span>
									<span class="dashorderCount col-sm-3">{$totalorderweek}</span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashsalesweek}</span>
									<span class="dashorderCount col-sm-3">{$currency}&nbsp;{if $totalsalesorderweek neq ''}{$totalsalesorderweek}{else}0{/if} </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashdeliverorder}</span>
									<span class="dashorderCount col-sm-3">{$totaldeliverweek} </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashpendorder}</span>
									<span class="dashorderCount col-sm-3">{$totalpendingweek} </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/failed-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashfailedrorder}</span>
									<span class="dashorderCount col-sm-3">{$totalfailedweek} </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/processing-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashprocessorder}</span>
									<span class="dashorderCount col-sm-3">{$totalprocessingweek} </span>	
								</div>
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name">{$LANG.res_myaccount_dashorderweek}</label>
										<label class="count">{$totalorderweek} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashsalesweek}</label>
										<label class="count">{$currency}&nbsp;{if $totalsalesorderweek neq ''}{$totalsalesorderweek}{else}0{/if}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashdeliverorder}</label>
										<label class="count">{$totaldeliverweek}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashpendorder}</label>
										<label class="count">{$totalpendingweek} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashfailedrorder}</label>
										<label class="count">{$totalfailedweek} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashprocessorder}</label>
										<label class="count">{$totalprocessingweek} </label>
									</li>
								</ul>-->
							</div>