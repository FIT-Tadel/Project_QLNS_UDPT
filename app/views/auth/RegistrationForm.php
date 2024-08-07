<!-- Registration Form -->
<div id="RegistrationForm"></div>
<div class="container">
    <div class="forms-container">
        <div class="login-signup">
            <!-- LogIn Form -->
            <?php require_once './views/auth/LogIn.php';?>
            <!-- SignUp Form -->
            <?php require_once './views/auth/SignUp.php';?>
        </div>
    </div>
    <!-- Panels -->
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New member? </h3>
                <p> Explore our biggest community <br> Thousands of articles and scientific papers are waiting for you </p>
                
                <button class="btn transparent" id="sign-up-btn">Sign up</button>
            </div>
            <img src="./public/img/login.svg" class="image" alt="" />
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>Ready to publish and view latest papers from all over the world ?</p>
                <button class="btn transparent" id="log-in-btn">Sign in</button>
            </div>
            <img src="./public/img/signup.svg" class="image" alt="" />
        </div>
    </div>
</div>


