<div class="page-header">
    <h1 class="title">Admin Change Password</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Change password</li>
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
		<form name="changepwd" method="post" onsubmit="return changepassword();" class="form-horizontal col-sm-12">
            {*<div id="" class="succFixed">Your account as been successfully Activated</div>*}
           
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
		 	       <div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
                </div>
            </div>
             <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
			        <div id="errormsg"></div>
                </div>
            </div>
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Old Password <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="password" name="old_password" id="old_password" value="" autocomplete="off"/>
					<script type="text/javascript">document.changepwd.old_password.focus();</script>
                </div>
			</div>
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">New Password <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="password" name="new_password" id="new_password" value="" autocomplete="off"/>
                </div>
			</div>
			<div class="form-group">
				<span class="control-label  col-sm-4 font-normal">Confirm Password <span class="color-red">*</span></span>
				<div class="col-sm-4">
					<input class="form-control" type="password" name="confirm_password" id="confirmed_password" value=""  autocomplete="off"/>
                </div>
			</div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
				   <input type="submit" class="btn btn-default" value="Reset Password"/>
                </div>
			</div>
		</form>
	</div>
    	
</div>
