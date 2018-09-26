<!-- Header Bottom line starts -->
{if $req_file_name neq 'orderPayment.php'}
<div class="wrapper">
	<div class="headBtmLine"></div>
</div>
<!-- Header Bottom line ends -->
<div class="wrapper">
	<!-- Container Inner starts -->
	<div class="byCuisine customFood">
		<div class="byCuisineTop"></div>
		<div class="byCuisineMiddle customLoginPad">
			<div class="restOwnerRiteHead">Payment</div>
			
			{if $smarty.post.paymentinfo eq 'creditcard' }
			<!--Credit card Paypal Payment Start-->
			<div class="staticContent">If this page shows for more than 10 seconds click this button:{$PAYHTML}</div>
			<!--Credit card Paypal Payment End-->
            {elseif $smarty.post.paymentinfo eq 'authorizenet'}
				<!-- Authorize.net Start-->
				<div class="staticContent">{$paymentError}</div>
			{/if}
			
		</div>
		<div class="byCuisineBottom"></div>
	</div>
	<!-- Container Inner ends -->
</div>
{/if}