<body>
  <div id="HomePage">
    <!-- Include Header -->
    <?php require_once "./views/home/Header.php"; ?>

    <!-- Include SideBar -->
    <?php require_once "./views/home/SideBar.php"; ?>

    <!-- Include SidebarTab Views -->
    <!-- Tab: Home -->
    <div class ="main-content">
      <?php require_once "./views/request/Home.php"; ?>
    </div>

    <!-- Tab: Search -->
    <div class ="main-content">
      <?php require_once "./views/request/Search.php"; ?>
    </div>

    <!-- Tab: Activities -->
    <div class ="main-content">
      <?php require_once "./views/request/Activity.php"; ?>
    </div>

    <!-- Tab: Reward -->
    <div class ="main-content">
      <?php require_once "./views/request/Reward.php"; ?>
    </div>

    <!-- Tab: Check-In-Out -->
    <div class ="main-content">
      <?php require_once "./views/request/CheckIn.php"; ?>
    </div>

    <!-- Tab: Request-Leave -->
    <div class ="main-content">
      <?php require_once "./views/request/LeaveRequest.php"; ?>
    </div>

    <!-- Tab: Request-WFH -->
    <div class ="main-content">
      <?php require_once "./views/request/WfhRequest.php"; ?>
    </div>

    <!-- Tab: Request-Update-TimeSheet -->
    <div class ="main-content">
      <?php require_once "./views/request/UpdateTimeSheetRequest.php"; ?>
    </div>
    
    <!-- Tab: Profile-MyProfile -->
    <div class ="main-content">
      <?php require_once "./views/request/MyProfile.php"; ?>      
    </div>

    <!-- Tab: Profile-EditProfile -->


    <!-- Tab: Privacy-PrivacyCenter -->
    <div class ="main-content">
      <?php require_once "./views/request/PrivacyCenter.php"; ?>
    </div> 

    <!-- Tab: Setting -->
    <div class ="main-content">
      <?php require_once "./views/request/Setting.php"; ?>    
    </div> 
    
    <!-- Include Footer -->
    <?php require_once "./views/home/Footer.php"; ?>

  </div>
</body>