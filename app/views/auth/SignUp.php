<!-- /views/auth/SignUp.php -->
<!-- SignUp Form -->
<form action="index.php?action=signup" class="sign-up-form" method="POST">
    <h2 class="title">Sign Up</h2>
    <div class="input-field" name="signup-username">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Enter new username" name="signup-username" required
                                                                        oninvalid="this.setCustomValidity('Please enter your username')" 
                                                                        oninput="this.setCustomValidity('')"/>
        <span class="error-message" id="signup-username-error">Username is already taken</span>
        <span class="success-message" id="signup-username-success">Account Successfully Created!</span>
        <i class="fas fa-check check-icon"></i>
    </div>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input class="password-input" type="password" placeholder="Enter password" required name = "signup-password"/>
        <i class="fas fa-eye fa-eye-slash toggle-password"></i>
    </div>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input class="password-input" type="password" placeholder="Confirm password" required name = "confirm-password"/>
        <i class="fas fa-eye fa-eye-slash toggle-password"></i>
    </div>
    <input type="submit" name="signup" class="btn second-bg-color" value="signup" />

    <p class="social-text">Or Sign up with social platforms</p>
    <div class="social-media">
        <a href="#" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-google"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
    
    <a href="index.php?action=home" class = "social-text text-second-color text-underlined">Skip For Now</a>
    <div class="countdown">
        You will be redirected in <span id="countdown-num">8</span> seconds.
    </div>
</form>
