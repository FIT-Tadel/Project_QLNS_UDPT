<form action="index.php?action=home" method="POST" id="privacy-user">
    <div class="privacy-content">
        <label for="" class="privacy-title">Change Password</label>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="current-username" disabled/>
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Enter new password" name="new-password" required
                                                                        oninvalid="this.setCustomValidity('Please enter your password')" 
                                                                        oninput="this.setCustomValidity('')"/>
            <i class="fas fa-eye fa-eye-slash toggle-password"></i>
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm password" name="confirm-new-password" required
                                                                        oninvalid="this.setCustomValidity('Confirm your password again')" 
                                                                        oninput="this.setCustomValidity('')"/>
            <i class="fas fa-eye fa-eye-slash toggle-password"></i>
        </div>
        <input type="submit" name="change-password" value="Change Password" class="btn solid change-pass-btn" />
    </div>
        
</form>