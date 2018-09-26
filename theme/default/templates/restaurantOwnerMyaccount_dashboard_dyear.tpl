							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead">{$smarty.now|date_format:"%Y"}</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashorderyear}</span>
									<span class="dashorderCount col-sm-3">{$totalorderyear}</span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashsalesyear}</span>
									<span class="dashorderCount col-sm-3">{$currency}&nbsp;{if $totalsalesorderyear neq ''}{$totalsalesorderyear}{else}0{/if} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashdeliverorder}</span>
									<span class="dashorderCount col-sm-3">{$totaldeliveryear} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashpendorder}</span>
									<span class="dashorderCount col-sm-3">{$totalpendingyear} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/failed-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashfailedrorder}</span>
									<span class="dashorderCount col-sm-3">{$totalfailedyear} </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="{$SITE_IMAGE_URL}/processing-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left">{$LANG.res_myaccount_dashprocessorder}</span>
									<span class="dashorderCount col-sm-3">{$totalprocessingyear} </span>									
								</div>
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name">{$LANG.res_myaccount_dashorderyear}</label>
										<label class="count">{$totalorderyear} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashsalesyear}</label>
										<label class="count">{$currency}&nbsp;{if $totalsalesorderyear neq ''}{$totalsalesorderyear}{else}0{/if}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashdeliverorder}</label>
										<label class="count">{$totaldeliveryear} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashpendorder}</label>
										<label class="count">{$totalpendingyear}</label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashfailedrorder}</label>
										<label class="count">{$totalfailedyear} </label>
									</li>
									<li>
										<label class="name">{$LANG.res_myaccount_dashprocessorder}</label>
										<label class="count">{$totalprocessingyear} </label>
									</li>
								</ul>-->
							</div>