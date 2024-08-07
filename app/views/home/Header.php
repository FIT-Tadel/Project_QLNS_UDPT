<!-- Begin: Header -->
    <!-- navbar -->
<body>
    <nav class="header">
        <div class="web-logo">
            <a href=""></a>
            <div class="web-title">EMS App</div>
        </div>

        <!-- Open/Close Side Bar -->
        <i class="bx bx-menu" id="sidebarOpen"></i>

        <div class="search_bar">
            <input type="text" placeholder="Search" />
        </div>

        <div class="header_content">
            <i class="bi bi-grid"></i>

            <!-- Dark/Light Mode -->
            <i class="bx bx-sun" id="darkLight"></i>

            <!-- Notification -->
            <i class="bx bx-bell" ></i>

            <!-- Profile Tool -->
            <div class="profile-tool">
                <img class='user-avatar' src="./uploads/images/defaultUserAvatar.png" alt=""/>
                <ul class="profile-dropdown">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="index.php?action=logout">Log out</a></li>
                </ul>
            </div>

            <div class="session-user">
                <div class="user-name"></div>
                <span class="user-status">
                    <i class='bx bxs-circle icon-status online'></i>
                    <div class="user-role text-capitalized"></div>    
                </span>
            </div>

            <div class="request-login active">
                <a href="index.php?action=login" class="login-link">
                    <i class='bx bx-log-in login-icon'></i>
                    <span class="login-label">Log In Now</span>
                </a>
            </div>
            
        </div>
    </nav>
</body>