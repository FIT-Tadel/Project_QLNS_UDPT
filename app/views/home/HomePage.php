<body>
  <div id="HomePage">
    <!-- Include Header -->
    <?php require_once "./views/home/Header.php"; ?>

    <!-- Include SideBar -->
    <?php require_once "./views/home/SideBar.php"; ?>

    <!-- Include Main Content -->
    <div class ="main-content">
      <?php require_once "./views/request/Home.php"; ?>
    </div>
    
    <div class ="main-content">
      <?php require_once "./views/request/MyProfile.php"; ?>      
    </div>

    <div class ="main-content">
      <?php require_once "./views/request/PrivacyCenter.php"; ?>
    </div> 

    <div class ="main-content">
      <?php require_once "./views/request/Setting.php"; ?>    
    </div> 

    <!-- Include Footer -->
    <?php require_once "./views/home/Footer.php"; ?>

  </div>
</body>