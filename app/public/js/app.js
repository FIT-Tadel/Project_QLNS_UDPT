//------------------- Login-Signup Page -------------------
const log_in_btn = document.querySelector("#log-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const togglePasswords = document.querySelectorAll(".toggle-password");
const loginBtn = document.querySelector('.login-btn');
const RegistrationScreen = document.querySelector('#RegistrationForm');

//Registration Form Screen
if (RegistrationScreen) {
  //Sign Up - Sign In Transition
  log_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
  });

  sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });


  // LogIn Form
  // Toggle Password Visibility
  togglePasswords.forEach(togglePassword => {
    togglePassword.addEventListener('click', () => {
        const passwordInput = togglePassword.previousElementSibling;
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.classList.toggle('fa-eye-slash');
    });
  });

  // Remember password - Cookie - Autofill
  //Get Cookie
  const cookie = getCookie('publication_credentials');
  function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }

  // Autofill Credentials
  document.addEventListener('DOMContentLoaded', (event) => {
    if (cookie) {
      const credentials = JSON.parse(decodeURIComponent(cookie));
      // Get the last session user
      last_user = credentials['session_user'];
      autofill = credentials['autofill'];

      //Fill in the username and password fields
      if (last_user && autofill) {
        user_password = credentials[last_user];
        document.querySelector('input[name="username"]').value = last_user;
        document.querySelector('input[name="password"]').value = user_password;
        document.querySelector('input[name="remember-me"]').checked = true;
      } 
    }
  });

  // Auto-Complete Credentials
  document.querySelector('input[name="username"]').addEventListener('change', (event) => {
    const username_input = document.querySelector('input[name="username"]').value;

    if (cookie) {
      const credentials = JSON.parse(decodeURIComponent(cookie));
      rememberedPassword = credentials[username_input];
      if (rememberedPassword) {
        document.querySelector('input[name="password"]').value = rememberedPassword;
        document.querySelector('input[name="remember-me"]').checked = true;
      }
      else {
        document.querySelector('input[name="password"]').value = '';
        document.querySelector('input[name="remember-me"]').checked = false;
      }
    }
  });

  // Remove error message when user focus on input field
  document.querySelectorAll('.input-field input').forEach(input => {
    input.addEventListener('focus', function(){
      const error = document.querySelector(`#${this.name}-error`);
      if(error) {
        error.classList.remove('active');
        this.parentElement.classList.remove('error');
      }
    });
  });

  //Show error message
  function showErrorMsg(caseErr, element, username, password) {
    if (caseErr === 'signup-username-error') {
      document.querySelector('input[name="signup-username"]').value = username;
      document.querySelector('input[name="signup-password"]').value = password;
      document.querySelector('input[name="confirm-password"]').value = password;
    }
    else {
      document.querySelector('input[name="username"]').value = username;
      document.querySelector('input[name="password"]').value = password;
    }

    const error = document.querySelector(element);

    error.classList.add('error');
    document.getElementById(caseErr).classList.add('active');
  }

  //Show successful message
  function showSuccessMsg(caseSucc, element, username, password) {
    document.querySelector('input[name="signup-username"]').value = username;
    document.querySelector('input[name="signup-password"]').value = password;
    document.querySelector('input[name="confirm-password"]').value = password;
    
    //Disable input after successful submission
    document.querySelectorAll(element).forEach(inputField => {
      inputField.querySelector('input').setAttribute('disabled', 'true');
    });
    
    document.querySelectorAll(element).forEach(input => {
      input.classList.add('success');
    });
    
    document.getElementById(caseSucc).classList.add('active');
    document.querySelector('.check-icon').classList.add('active');
  }

  //Remove all error messages
  function cleanErrorMsg() {
    document.querySelectorAll('.error').forEach(error => {
      error.classList.remove('error');
    });
    document.querySelectorAll('.error-message').forEach(error => {
      error.classList.remove('active');
    });
  }

  // SignUp Form 
  function RedirectHome(path, countTime) {
    let countdown = document.querySelector('.countdown');
    let countdownNum = document.getElementById('countdown-num');
    countdown.classList.add('active');

    //Countdown before redirect
    setInterval(function() {
        if (countTime > 0) {
            countTime--;
            countdownNum.textContent = countTime;
        }
    }, 1000);
    // Redirect to home page
    setTimeout(function() {
        window.location = path;
    }, countTime * 1000);
  }
}

//------------------- Homepage -------------------
let user_ = '';
const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarExpand = document.querySelector(".expand_sidebar");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");

const HomepageScreen = document.querySelector('#HomePage');

if (HomepageScreen) {
  // Toggle Sidebar
  sidebarOpen.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  });

  sidebarClose.addEventListener("click", () => {
    sidebar.classList.add("close", "hoverable");
  }); 


  sidebarExpand.addEventListener("click", () => {
    sidebar.classList.remove("close", "hoverable");

  });

  sidebar.addEventListener("mouseenter", () => {
    if (sidebar.classList.contains("hoverable")) {
      sidebar.classList.remove("close");
    }
  });
  sidebar.addEventListener("mouseleave", () => {
    if (sidebar.classList.contains("hoverable")) {
      sidebar.classList.add("close");
    }
  });

  //Toggle Dark/Light Mode 
  darkLight.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
      document.setI
      darkLight.classList.replace("bx-sun", "bx-moon");
    } else {
      darkLight.classList.replace("bx-moon", "bx-sun");
    }
  });

  submenuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
      item.classList.toggle("show_submenu");
      submenuItems.forEach((item2, index2) => {
        if (index !== index2) {
          item2.classList.remove("show_submenu");
        }
      });
    });
  });

  if (window.innerWidth < 768) {
    sidebar.classList.add("close");
  } else {
    sidebar.classList.remove("close");
  }

  //------------------- I.Header -------------------------
  //Home Redirection - Click On Logo- Reload Page
  document.querySelector('.web-logo').addEventListener('click', () => {
    window.location = 'index.php?action=home';
  });

  //Update User Avatar
  //global variable user_password
  let userPassword = '';
  function loadHeader(avatarPath, user_name, user_role, user_status, user_password) {
    //Load User Avatar
    if(avatarPath) {
      document.querySelectorAll('.user-avatar').forEach(avatar => {
        avatar.src = avatarPath;
      });
    }
    //Load Session-User Info
    document.querySelector('.session-user').classList.add('active'); 
    document.querySelector('.session-user .user-name').textContent = user_name;
    document.querySelector('.session-user .user-role').textContent = user_role;

    //Remove Login Request
    document.querySelector('.request-login').classList.remove('active');

    //Update User Status
    updateUserStatus(user_status);

    userPassword = user_password;
  }

  function updateUserStatus(user_status) {
    if(user_status === 'active') {
      document.querySelector('.user-status .icon-status').classList.remove('offline');
      document.getElementById('user-status-checkbox').checked = true;
    } else {
      document.querySelector('.user-status .icon-status').classList.add('offline');
      document.getElementById('user-status-checkbox').checked = false;
    }
  }

  //------------------- II.Sidebar -------------------------
  //Sidebar Navigation
  prevNav = document.querySelector('.nav_link'); //Default active nav - Dashboard
  prevNav.classList.add('active');
  prevPage = document.querySelector('#home'); //Default active page - Home
  prevPage.classList.add('active');

  document.querySelectorAll('.nav_link').forEach(navLink => {
    navLink.addEventListener('click', () => {
      
      //Remove previous active nav and page
      prevNav.classList.remove('active');
      prevPage.classList.remove('active');

      //Update active nav
      prevNav = navLink;
      prevNav.classList.add('active');

      //Update active page
      prevPage = document.querySelector(`#${navLink.dataset.target}`);
      if (prevPage)
        prevPage.classList.add('active');
      else window.location = 'index.php?action=home';
    });
  });

  //------------------- 1.Profile Page -------------------
  function toggleSaveEditBtn($case) {
    const isDisabled = $case === 'saved';
    const action = isDisabled ? 'add' : 'remove';
    const reverseAction = isDisabled ? 'remove' : 'add';

    // Disable/Enable input fields & Save Button
    document.querySelectorAll('.profile-info input, .profile-info textarea, .profile-info .save-btn').forEach(input => {
        input.disabled = isDisabled;
    });

    // Toggle Save Button
    document.querySelector('.profile-info .save-btn').classList[reverseAction]('active');
    
    // Toggle Edit Button
    document.querySelector('.profile-info .edit-btn').classList[action]('active');
  }

  // My Profile Page - Show/Update Profile
  function myProfile(username, name, email, website, bio, interests) {
    //Assign value to input fields
    user = username; //Global variable for user
    document.querySelector('.profile-info input[name="fullname"]').value = name;
    document.querySelector('.profile-info input[name="email"]').value = email;
    document.querySelector('.profile-info input[name="website"]').value = website;
    document.querySelector('.profile-info .website-link').href = website;
    document.querySelector('.profile-info textarea[name="bio"]').value = bio;
    document.querySelector('.profile-info textarea[name="interests"]').value = interests;

    toggleSaveEditBtn('saved');
  } 

  // My Profile Page - Edit Profile
  document.querySelector('.profile-info .edit-btn').addEventListener('click', () => {
    toggleSaveEditBtn('edit');
  });

  //Edit Profile - Change Avatar
  document.querySelector('.profile-avatar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader(); 
        reader.onload = function(e) {
            document.querySelector('.profile-info .user-avatar').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
  });

  //Save Profile
  document.addEventListener('DOMContentLoaded', () => {
    const myprofileForm = document.getElementById('profile-user');

    myprofileForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(myprofileForm);

        fetch(myprofileForm.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response)
        .then(data => {
            // Handle the response data
            showMessageBox('success', 'Profile Updated', 'Your profile has been updated successfully!', 'var(--second-color)');
            console.log(data);
            // Or, update the UI based on the response
        })
        .catch(error => {
            console.error(error);
        });

        toggleSaveEditBtn('saved');
    });
  });
  
  //------------------- 2.Settings Page -------------------
  //Light-Dark Mode
  document.getElementById('light-dark-checkbox').addEventListener('click', () => {
    //Toggle Dark Mode
    body.classList.toggle('dark');
    if (body.classList.contains("dark")) {
      document.setI
      darkLight.classList.replace("bx-sun", "bx-moon");
    } else {
      darkLight.classList.replace("bx-moon", "bx-sun");
    }
  });

  //User update status
  $(document).ready(function() {
    $('#user-status-checkbox').change(function() {
        var checkboxId = $(this).attr('id');
        var checkboxStatus = this.checked ? 'active' : 'inactive';
        showToastMessage('success', 'User Status Updated', this.checked ? 'Online' : 'Offline', this.checked ? 'green' : 'red');
        updateUserStatus(checkboxStatus);

        $.ajax({
            url: 'index.php?action=home',
            type: 'POST',
            data: {
                submit_ajax: checkboxId,
                status: checkboxStatus
            },
            success: function(response) {
              console.log('Updated user status: ' + checkboxId + ' - ' + checkboxStatus);
            },
            error: function(xhr, status, error) {
                console.log('Error found: ' + error);
            }
        });
      });
  });

  //------------------- 3.Privacy Center -------------------
  //Change Password
  //Toggle Password Visibility
  document.querySelectorAll('.privacy-content .toggle-password').forEach(togglePassword => {
    togglePassword.addEventListener('click', () => {
        const passwordInput = togglePassword.previousElementSibling;
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.classList.toggle('fa-eye-slash');
    });
  });

  function loadPrivacyCenter(username) {
    document.querySelector('.privacy-content input[name="current-username"]').value = username;
  }

  //Change Password Click - using ajax 
  $(document).ready(function() {
    $('.change-pass-btn').click(function(event) {
        event.preventDefault(); 

        var newPassword = $('input[name="new-password"]').val();
        var confirmPassword = $('input[name="confirm-new-password"]').val();
        if(confirmPassword !== newPassword) {
          showMessageBox('warning', 'Passwords do not match','Try again','black');
          return;
        }

        Swal.fire({
              title: 'Verification Required!',
              text: 'Enter your current password to continue',
              icon: 'question',
              confirmButtonText: 'Submit',
              iconColor: 'var(--second-color)',
              confirmButtonColor: 'var(--second-color)',
              showCancelButton: true,
              allowOutsideClick: false,
              input: 'text',
          }).then((result) => {
              if (result.isConfirmed) {
                  if (result.value !== userPassword) {
                    showMessageBox('error', 'Incorrect :((','Try again','red');
                  }
                  else {
                    $.ajax({
                      url: 'index.php?action=home',
                      type: 'POST',
                      data: {
                          submit_ajax: 'change-pass-btn',
                          new_password: newPassword
                      },
                      success: function(response) {
                          console.log(response);
                      },
                      error: function(xhr, status, error) {
                          console.log('Error found: ' + error);
                      }
                  });
                    showMessageBox('success', 'Correct!','Change Password Successfully!','green');
                  }
              }
            });
      });
    }); 
}

// ------------------- Handle Message Box ------------------- Using SweetAlert2
const Toast = Swal.mixin({
  toast: true,
  position: "bottom-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  },
});

function showMessageBox(icon_type, title_text, sub_text, iconColor_color) {
  Swal.fire({
    width: 500,
    icon: icon_type,
    title: title_text,
    text: sub_text,
    iconColor: iconColor_color,
    confirmButtonColor: 'var(--second-color)',
  });
}

function showToastMessage(icon_type, title_text, sub_text, iconColor_color) {
  Toast.fire({
    icon: icon_type,
    title: title_text,
    text: sub_text,
    iconColor: iconColor_color,
  });
}

function showWelcome(username) {
  if (localStorage.getItem(`doNotShowWelcome_${username}`) === 'true') {
    return; 
  }

  Swal.fire({
    title: `Welcome ${username}!`,
    text: "Start your journey with us!",
    imageUrl: "https://www.hrz.tu-darmstadt.de/media/hrz_hlr/hlr_buehnenbilder/Teamwork_undraw.co.svg",
    imageWidth: 500,
    imageHeight: 300,
    imageAlt: "Custom image",
    confirmButtonText: "Do not show again!",
    confirmButtonColor: 'var(--second-color)',
  }).then((result) => {
    if (result.isConfirmed) {
      localStorage.setItem(`doNotShowWelcome_${username}`, 'true');
    }
  });
}

//localStorage.clear(); //Clear all local storage













