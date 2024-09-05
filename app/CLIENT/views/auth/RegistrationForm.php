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
                <p> Join our company <br> Thousands of resources and guides are waiting for you </p>
                
                <button class="btn transparent" id="sign-up-btn">Sign up</button>
            </div>
            <img src="./public/img/login.svg" class="image" alt="" />
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>Ready to manage requests, colab with your team, and track your progress?</p>
                <button class="btn transparent" id="log-in-btn">Sign in</button>
            </div>
            <img src="./public/img/signup.svg" class="image" alt="" />
        </div>
    </div>
</div>


