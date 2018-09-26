<div class="page-header">
    <h1 class="title">Contact view full details</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Contact view full details</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
         <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-sm-12">
			<div class="manageButtonLastCont">
		    {if $smarty.get.det eq 'contact'}<a class="btn btn-default btn-sm" href="contactUsManage.php">
			{else if $smarty.get.det eq 'feedback'}<a class="btn btn-default btn-sm" href="siteFeedbackManage.php">
		    {/if}Back</a>
			</div>
		</div>
	<div class="addtocartWrap">
		<div class="panel panel-default">
			<!--CONTACT DETAILS-->
			<div class="panel-heading">{if $smarty.get.det eq 'contact'}Contact Details{else if $smarty.get.det eq 'feedback'}Feedback Details{/if}</div>
			<div class="panel-body">
		    <div class="addPageCont">
				<span class="addPageRightFont">{if $smarty.get.det eq 'contact'}Name{else if $smarty.get.det eq 'feedback'}Restaurant Name{/if}</span>
				<span class="colon1">:</span>				
				<span class="value">
		            {if $smarty.get.det eq 'contact' }{$orderDetails.0.contact_name|ucfirst|stripslashes}
		            {else if $smarty.get.det eq 'feedback'}{$restaurantname}
		            {/if}
		        </span>
		    </div>
						
			<div class="addPageCont">
		        <span class="addPageRightFont">{if $smarty.get.det eq 'contact'}Email Id{else if $smarty.get.det eq 'feedback'}Restaurant city{/if}</span>
				<span class="colon1">:</span>				
				<span class="value">
		            {if $smarty.get.det eq 'contact' && $orderDetails.0.contact_email neq ''}{$orderDetails.0.contact_email}
		            {else if $smarty.get.det eq 'feedback'}{$orderDetails.0.restaurantcity|ucfirst|stripslashes}{/if}
		        </span>
			</div>
		               
			<div class="addPageCont">
				<span class="addPageRightFont">{if $smarty.get.det eq 'contact'}Order No{else if $smarty.get.det eq 'feedback'}Feedback{/if}</span>
				<span class="colon1">:</span>				
				<span class="value">
		        {if $smarty.get.det eq 'contact' && $orderDetails.0.contact_ordernumber neq ''}{$orderDetails.0.contact_ordernumber}
		        {elseif $smarty.get.det eq 'contact' && $orderDetails.0.contact_ordernumber eq ''}--
		        {else if $smarty.get.det eq 'feedback'}{$orderDetails.0.feedback|ucfirst|stripslashes}{/if}
		        </span>
			</div>
		{if $smarty.get.det eq 'contact'}
			<div class="addPageCont">
				<span class="addPageRightFont">{if $smarty.get.det eq 'contact'}Order Date{/if}</span>
				<span class="colon1">:</span>				
				<span class="value">{if $orderDetails.0.contact_orderdate neq ''}{$orderDetails.0.contact_orderdate}{else}--{/if}</span>
			</div>

			<div class="addPageCont">
				<span class="addPageRightFont">Comments</span>
				<span class="colon1">:</span>				
				<span class="value">{if $orderDetails.0.contact_comments neq ''}{$orderDetails.0.contact_comments}{else}--{/if}</span>
			</div>
		{/if}
			<div class="addPageCont">
				<span class="addPageRightFont">Added Date</span>
				<span class="colon1">:</span>				
				<span class="value">{$orderDetails.0.addeddate|date_format:"%d %b, %Y %H:%M:%S"}</span>
			</div>
	    </div>
	    </div>
	</div>
	<div class="col-sm-12">
		{*<div class="manageButtonLastCont">
	        {if $smarty.get.det eq 'contact'}	
	        	<a class="btn btn-default btn-sm" href="contactUsManage.php">
				{else if $smarty.get.det eq 'feedback'}
				<a class="btn btn-default btn-sm" href="siteFeedbackManage.php">
	        {/if}
	        	Back
	       		</a>
		</div>*}
	</div>
			


</div>