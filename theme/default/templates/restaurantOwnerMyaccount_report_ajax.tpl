<!--Date Picker Files-->
<div class="detailsInnerNewWrap">

	<h1 class="restOwnMyHead">{$LANG.res_myaccount_report}</h1>
	<div class="clr"></div>
	<!-- Pagination start -->
	{if $ordersReportListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
		
		<div class="succmsg1">{$succ_msg}</div>
	
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myaccount_reporttotal}:</span><span class="value">{$ordersReportListCnt}</span></li>
			</ul>
			<div class="pull-right col-lg-9 col-md-7 col-sm-12 col-xs-12">
				<select name="report" id="report" size="1" onchange="return changeSortbyStatus(this.value,'Report');" class="selectpicker">
					<option value="">All</option>
					<option value="Today" {if $smarty.request.sortbystatus eq 'Today'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportselecttoday}</option>
					<optgroup label="{$LANG.res_myaccount_reportselectweek}">
						<option value="ThisWeek" {if $smarty.request.sortbystatus eq 'ThisWeek'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportthisweek}</option>
						<option value="LastWeek" {if $smarty.request.sortbystatus eq 'LastWeek'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportlastweek}</option>
					</optgroup>	
					<optgroup label="{$LANG.res_myaccount_reportselectmonth}">
						<option value="ThisMonth" {if $smarty.request.sortbystatus eq 'ThisMonth'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportthismonth}</option>
						<option value="LastMonth" {if $smarty.request.sortbystatus eq 'LastMonth'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportlastmonth}</option>
					</optgroup>	
					<optgroup label="{$LANG.res_myaccount_reportselectyear}">
						<option value="ThisYear" {if $smarty.request.sortbystatus eq 'ThisYear'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportthisyear}</option>
						<option value="LastYear" {if $smarty.request.sortbystatus eq 'LastYear'}selected="selected"{/if}>&nbsp;&nbsp;{$LANG.res_myaccount_reportlastyear}</option>
					</optgroup>				
				</select>
				<div class="input-group date dateWid">
					<input type="text" id="report_from" name="report_from" value="{$smarty.request.startdate}" size="15" class="form-control" readonly=""/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
				<span class="sortbytext">{$LANG.res_myaccount_reportto}</span>
				<div class="input-group date dateWid">
					<input type="text" id="report_to" name="report_to" value="{$smarty.request.enddate}" size="15" class="form-control" readonly=""/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
				<span class="showBtn"><input type="submit" name="actionsubmit" value="{$LANG.res_myaccount_reportshowbut}" id="show" onclick="return report_validate();"/></span>
				
				<a class="restOwnMyAddBtn" style="cursor:pointer;" href="reportListPdf.php?total={$ordersReportListCnt}{if $sortbystatus eq 'Today' or $sortbystatus eq 'ThisWeek' or $sortbystatus eq 'LastWeek' or $sortbystatus eq 'LastMonth' or $sortbystatus eq 'ThisMonth' or $sortbystatus eq 'ThisYear' or $sortbystatus eq 'LastYear'}&sortbystatus={$sortbystatus}{else}{if $smarty.request.startdate neq ''}&startdate={$smarty.request.startdate}&enddate={$smarty.request.enddate}{/if}{/if}{if $resid neq ''}&resid={$resid}{/if}" target="_blank">{$LANG.res_myaccount_reportgenpdf}</a>
			</div>
		</div>
		<div class="ordersInnerWrap">
			<table class="table table-hover table-bordered table-striped restownertable">
				<tbody>
					<tr class="">
						<th width="5%">{$LANG.res_myaccount_report_sno}</th>
						<th width="10%">{$LANG.res_myaccount_reportname}</th>
						<th width="20%">{$LANG.res_myaccount_reportemail}</th>
						<th width="15%">{$LANG.res_myaccount_reportorderno}</th>
						<th width="10%">{$LANG.res_myaccount_reporttotprice}</th>
						<th width="15%">{$LANG.res_myaccount_reportorderat}</th>
						<!--<td class="" width="30%">Status</td>-->
					</tr>
					{section name="report" loop=$ordersReportList}
					<tr class="orderInnerCont  {if $smarty.section.report.rownum is div by 2} colorBgGray{/if}">
						<td>{$ordersReportList[report].sno}</td>
						<td>{$ordersReportList[report].customername|ucfirst|stripslashes}</td>
						<td>{$ordersReportList[report].customeremail|stripslashes}</td>
						<td>{$ordersReportList[report].ordergenerateid}</td>
						<td><span class="rupeeImg2">{$currency}&nbsp;</span><span class="rupeePrice2">{$ordersReportList[report].ordertotalprice}</span></td>
						<td>{$ordersReportList[report].orderdate}</td>
					</tr>
					{sectionelse}
					<td class="text-danger" colspan="6" align="center">{$LANG.res_myaccount_no_rec_found}</td>
					{/section}
				</tbody>
			</table>		
		</div>
		<!-- Pagination start -->
		{if $ordersReportListCnt gt 0} {$pagination} {/if}
		<!-- Pagination end -->
</div>
	