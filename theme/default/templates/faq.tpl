<div class="container">
	<div class="customerLeftBox clearfix">
		<h1 class="customSignupHead">{$LANG.footer_faq}</h1>
		{section name="faq" loop=$staticFaqList}
			<div class="faq_ans">
				<div style="cursor:pointer;" onclick="openFaq('q{$smarty.section.faq.rownum}')" class="faqHead faq_arrow">{$staticFaqList[faq].question|ucfirst|stripslashes}</div>
				<div id="q{$smarty.section.faq.rownum}" {if $smarty.section.faq.rownum neq '1'}style="display:none;"{/if} class="staticContent faqcontent">{$staticFaqList[faq].answer|stripslashes}</div>
			</div>	
		{sectionelse}
			<div class="errorline">No Record Found</div>
		{/section}
		<input type="hidden" id="total" value="{$smarty.section.faq.total}" />
	</div>
</div>