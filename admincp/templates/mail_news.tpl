{literal}
<script language="javascript">

function validate()
{	
	//alert('sundari');
   
	if(document.addnews.subject.value=="")
	     {
		   alert('Please enter the subject name.');
		   document.addnews.subject.focus();
		   return false;
		 }
		     
	 $('.successmsg').html("Messsage has been sent successfully!");
     setTimeout(function(){
        document.addnews.submit();	 
     },2000);
}

</script>
{/literal}


<div class="page-header">
    <h1 class="title">Newsletter</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Newsletter</li>
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
		<form name="addnews" method="post" action="newsLetterManage.php"  enctype="multipart/form-data" class="search_form general_form form-horizontal col-sm-12">
			<input type="hidden" name="hdAction" value="1">
			<input type="hidden" name="PerPage" value="{$PerPage}">
			<input type="hidden" name="AnnIdent" value="{$NewsDetail.Ident}">
			<input type="hidden" name="Offset" value="{$Offset}">
			<input type="hidden" name="Keyword" value="{$Keyword}">
			<input type="hidden" name="Operator" value="{$Operator}">
			
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
				</div>
			</div>
			<!--<fieldset>-->
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
				{if $ErrorMessage neq ""}
					<span class="errormsg">{$ErrorMessage}</span>{/if}
				{*if $SuccessMessage neq ""*}
					 <span class="successmsg"></span>
				{*/if*}	
				</div>				
			</div>
			<div class="forms contain">
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">Subject<span class="color-red">*</span></label>
					<div class="col-sm-4">
						<input class="form-control" name="subject" id="subject" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal">To</label>
					<div class="col-sm-4">
						<input type="hidden" name="email" id="email" size="40" value="{$email}{$result_mail}" />
						<textarea class="form-control" rows="5" disabled="">{$email}{$result_mail}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 font-normal" >Content</label>
					<div class="col-sm-8 col-xs-12">
						{$Editor}
					</div>
					<!------------------Static Editor -------------------->
					{*<div class="col-sm-8 col-xs-12 col-md-8 col-sm-offset-4">
						<textarea name="textarea" class="jqte-test"></textarea>
					</div>*}
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
						<!--<input class="btn btn-default" name="submit" type="submit" value="Submit"/>-->
                        <a class="btn btn-default" onclick="validate();">Submit</a> 
						<a class="btn" href="newsLetterManage.php">Cancel</a>
					</div>
				</div>
			</div>
		<!--</fieldset>-->
		</form>
	</div>
</div>