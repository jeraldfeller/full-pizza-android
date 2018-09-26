<!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      	<a href="index.php" class="logo">
			<img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" style="height:90%;width:auto;" />
		</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Sidepanel Show-Hide Button -->
    <a href="logout.php" class="sidepanel-open-button"><i class="fa fa-power-off"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <div class="top-right">
	   	<a href="restaurantOrderManage.php?sortby=pending" class="status-btn hidden-xs">
	   		Pending Order <span class="badge">{$Pending}</span>
	   	</a>
	   	<a href="restaurantOrderManage.php?sortby=processing" class="status-btn hidden-xs">
	   		Processing Order <i class="badge">{$Processing}</i>
	   	</a>

 		<span class="profilebox hidden-sm hidden-xs">
 			<img src="images/profileimg.png" alt="img">
 			<b>{$currentUser}</b>
 		</span>
 	</div>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
