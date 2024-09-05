<!-- /views/auth/LogIn.php -->
<!-- LogIn Form -->
<form action="index.php?action=login" class="log-in-form" method="POST">
    <h2 class="title">Log In</h2>

    <!-- Input Field -->
    <div class="input-field" name="username">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Enter username" name="username" required
                                                                        oninvalid="this.setCustomValidity('Please enter your username')" 
                                                                        oninput="this.setCustomValidity('')" />
        <span class="error-message" id="username-error">Wrong username</span>
    </div>
    <div class="input-field" name="password">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Enter password" name="password" required
                                                                        oninvalid="this.setCustomValidity('Please enter your password')" 
                                                                        oninput="this.setCustomValidity('')"/>
        <i class="fas fa-eye fa-eye-slash toggle-password"></i>
        <span class="error-message" id="password-error">Wrong password</span>
    </div>
    <div class="remember-me">
        <input class="checkbox" type="checkbox" id="remember-me" name="remember-me"/>
        <label for="remember-me">Remember me</label>
    </div>
    <input type="submit" name="login" value="login" class="btn solid login-btn" />

    <!-- Social Login Alt-->
    <p class="social-text">Or Login in with social platforms</p>
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
    
    <a href="index.php?action=home" class = "social-text text-main-color text-underlined">Skip For Now</a>
</form>
