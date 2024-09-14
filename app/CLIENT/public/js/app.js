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
  function loadHeader(avatarPath, user_name, user_role, user_status) {
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
    document.querySelectorAll('.profile-info input, .profile-info .save-btn').forEach(input => {
        input.disabled = isDisabled;
    });

    // Toggle Save Button
    document.querySelector('.profile-info .save-btn').classList[reverseAction]('active');
    
    // Toggle Edit Button
    document.querySelector('.profile-info .edit-btn').classList[action]('active');
  }

  // My Profile Page - Show/Update Profile
  function myProfile(username, name, phone, address, id_card, tax_code, bank_account) {
    //Assign value to input fields
    user = username; //Global variable for user
    document.querySelector('.profile-info input[name="fullname"]').value = name;
    document.querySelector('.profile-info input[name="phone"]').value = phone;
    document.querySelector('.profile-info input[name="address"]').value = address;
    document.querySelector('.profile-info input[name="id_card"]').value = id_card;
    document.querySelector('.profile-info input[name="tax_code"]').value = tax_code;
    document.querySelector('.profile-info input[name="bank_account"]').value = bank_account;

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
        
        //Check password fields(no empty, must match)
        if(newPassword === '' || confirmPassword === '') {
          showMessageBox('warning', 'Empty Password','Please fill in all fields','black');
          return;
        }
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
              input: 'password',
          }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: 'index.php?action=home',
                  type: 'POST',
                  data: {
                      submit_ajax: 'change-pass-btn',
                      confirm_password: result.value,
                      new_password: newPassword
                  },
                  success: function(response) {
                      if (response.includes('Wrong verified password')) {
                        showMessageBox('error', 'Incorrect :((','Try again','red');
                      } else if (response.includes('Password updated successfully')) {
                        showMessageBox('success', 'Correct!','Change Password Successfully!','green');
                      }
                  },
                  error: function(xhr, status, error) {
                      showMessageBox('error', 'Error found', error, 'red');
                  }
                });
              }
          });
      });
    }); 

    //------------------- 4.Check-In-Out Page -------------------
    //Check-In/Out History
    function updateMissedCheckInsLabel(allDays) {
      const today = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0];
      const missedDays = allDays.filter(day => day.start < today && !day.checkIn).length;
      document.querySelector('.fc-customLabel-button').innerText = `Missed Check-In for ${missedDays} days`;
    }

    function initializeCheckInCalendar(events) {
      var calendarEl = document.getElementById('checkin-calendar');
      var today = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0];
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'customLabel dayGridMonth'
        },
        customButtons: {
          customLabel: {
            text: 'Missed Check-In for 0 day(s)',
            click: function() {} 
          }
        },
        buttonText: {
          today: 'Today'
        },
        events: events,
        eventContent: function(arg) {
            var htmlContent = '';
            var eventDate = arg.event.start.toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0];

            if (arg.event.extendedProps.checkIn === true) { //Checked In
              if (arg.event.extendedProps.checkOut === true) { 
                  htmlContent = `
                    <div class="calendar-event-content">
                      <span class="checked-in-icon"><i class='bx bxs-check-circle'></i> Checked</span>
                      <span class="star-icon"><i class="bx bxs-star"></i> 50 points</span>
                    </div>`;
              }
              else {
                  htmlContent = `<div class="calendar-event-content"><span class="checked-in-icon"><i class="bx bx-log-out-circle logout-icon"></i> Check Out</span></div>`;
              }
            }
            else if(eventDate < today) {    //Missed Check-In
              htmlContent = `<div class="calendar-event-content not-checked"><span class="missed-icon"><i class='bx bxs-x-circle'></i> Missed</span></div>`;
            }
            else if (eventDate === today) { //Today Check-In
              htmlContent = `<div class="calendar-event-content today-checkin"><span class="red-dot"></span>Check In Now</div>`;
            }
            return { html: htmlContent };
        },
        dateClick: function(info) {
          if (info.dateStr === today) {
            var events = calendar.getEvents();
            var event = events.find(e => e.startStr === info.dateStr);

            if (event && event.extendedProps.checkIn === true) {
              if (event.extendedProps.checkOut === false) {
                // Toggle To Check Out
                var checkInBtn = document.querySelector('.check-in-request-btn');
                checkInBtn.value = 'Check Out';
                checkInBtn.classList.add('check-out');
                checkInBtn.innerHTML = '<i class="bx bx-log-out-circle logout-icon"></i> Check Out';
                document.getElementById('checkInModal').style.display = 'block';
              } else { // already checked in/out
                showMessageBox('info', 'Already Checked In/Out', 'See you tomorrow ^.^', 'green');
              }
            } else {
              document.getElementById('checkInModal').style.display = 'block';
            }
          }
        }, 
      });
      calendar.render();
    }
    
    function handleCheckInHistory(checkInData) {
      checkInData = JSON.parse(checkInData);
      const today = new Date();
      const year = today.getFullYear();
      const month = today.getMonth();

      let daysInMonth = today.getDate();
      let allDays = [];
    
      for (let day = 1; day <= daysInMonth; day++) {
          let dateStr = new Date(year, month, day).toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0];
          allDays.push({
              start: dateStr,
              checkIn: false
          });                             
      }

      checkInData.forEach(checkIn => {
        let checkInDate = new Date(checkIn.checkInDate).toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0]; 
        let index = allDays.findIndex(day => day.start === checkInDate);
        if (index !== -1) {
            allDays[index].checkIn = true;
            allDays[index].checkOut = checkIn.checkOutTime ? true : false;
        }
      });

      let events = allDays.map(day => ({
          start: day.start,
          extendedProps: {
              checkIn: day.checkIn, 
              checkOut: day.checkOut
          }
      }));

      initializeCheckInCalendar(events);
      updateMissedCheckInsLabel(allDays);
    }

    // Check-In/Out Form
    let camera_button = document.querySelector("#start-camera-btn");
    let video = document.querySelector("#video-webcam");
    let click_button = document.querySelector("#click-photo-btn");
    let canvas = document.querySelector("#canvas-checkin");

    function updateClock() {
      let now = new Date();
      let hours = now.getHours();
      let minutes = now.getMinutes();
      let seconds = now.getSeconds();
      let ampm = hours >= 12 ? 'PM' : 'AM';

      minutes = minutes < 10 ? '0' + minutes : minutes;
      seconds = seconds < 10 ? '0' + seconds : seconds;
      let timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
  
      document.getElementById('clock-checkin').textContent = timeString;
    }

    //Close Modal
    document.querySelector('.close').onclick = function() {
      document.getElementById('checkInModal').style.display = 'none';
    }
    
    window.onclick = function(event) {
      var modal = document.getElementById('checkInModal');
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    }
    
    //Update Clock
    setInterval(updateClock, 1000);

    camera_button.addEventListener('click', async function(event) {
      event.preventDefault();
        try {
            let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
            video.srcObject = stream;
        } catch (error) {
            console.error("Error accessing webcam: ", error);
            alert("Could not access the camera. Please check if the camera is connected and permissions are granted.");
        }
    });

    click_button.addEventListener('click', function(event) {
      event.preventDefault();
      canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
      let image_data_url = canvas.toDataURL('image/jpeg');
      
      //Stop video stream
      video.srcObject.getVideoTracks().forEach(track => track.stop());
      video.srcObject = null;
    });

    $(document).ready(function() {
      $('.check-in-request-btn').click(function(event) {
          event.preventDefault(); 
  
          var checkInBtn = document.querySelector('.check-in-request-btn');
          if (checkInBtn.value === 'Check In') {
              //New Check In
              var checkInDate = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0]; 
              //Format checkInTime - HH:MM:SS
              var checkInTime = document.getElementById('clock-checkin').textContent.split(' ')[0].split(':').map(part => part.padStart(2, '0')).join(':');
              var checkInImage = canvas.toDataURL('image/jpeg');

              $.ajax({
                  url: 'index.php?action=home',
                  type: 'POST',
                  data: {
                      submit_ajax: 'check-in-btn',
                      checkInDate: checkInDate,
                      checkInTime: checkInTime,
                      checkInImage: checkInImage
                  },
                  success: function(response) {
                      if (response.includes('Check In Successfully')) {
                        showMessageBox('success', 'Check In Successfully!', "Have a nice day at work! Don't forget to check out ^.^", 'green');
                      }
                  },
                  error: function(xhr, status, error) {
                      showMessageBox('error', 'Error found', error, 'red');
                  }
              });

              //Toggle To Check Out
              checkInBtn.value = 'Check Out';
              checkInBtn.classList.add('check-out');
              checkInBtn.innerHTML = '<i class="bx bx-log-out-circle logout-icon"></i> Check Out';
            }
            else {
              //Check Out -> Update check_out_time
              var checkOutDate = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Ho_Chi_Minh'}).split('T')[0]; 
              var checkOutTime = document.getElementById('clock-checkin').textContent.split(' ')[0].split(':').map(part => part.padStart(2, '0')).join(':');

              $.ajax({
                  url: 'index.php?action=home',
                  type: 'POST',
                  data: {
                      submit_ajax: 'check-out-btn',
                      checkOutDate: checkOutDate,
                      checkOutTime: checkOutTime,
                  },
                  success: function(response) {
                      if (response.includes('Check Out Successfully')) {
                        showMessageBox('success', 'Check Out Successfully!', 'See you tomorrow ^.^', 'green');
                        document.getElementById('checkInModal').style.display = 'none';
                      }
                  },
                  error: function(xhr, status, error) {
                      showMessageBox('error', 'Error found', error, 'red');
                  }
              });
            }
            
        });
      }); 
    
    //------------------- 5.Leave Request Tab ----------------
      //ajax request for leave request
      $(document).ready(function() {
        $('.leave-request-btn').click(function(e) {
            e.preventDefault();

            var leaveFrom = document.querySelector('input[name="leave-from"]').value;
            var leaveTo = document.querySelector('input[name="leave-to"]').value;
            var reasonLeave = document.querySelector('textarea[name="reason-leave"]').value;
            $.ajax({
                url: 'index.php?action=home',
                type: 'POST',
                data: {
                    submit_ajax: 'leave-request-btn',
                    leaveFrom: leaveFrom,
                    leaveTo: leaveTo,
                    reasonLeave: reasonLeave
                },
                success: function(response) {
                    if (response.includes('Leave Request Created Successfully')) {
                      showMessageBox('success', 'Leave Request Sended!', 'Keep track with your manager', 'green');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error found: ' + error);
                }
            });
          });
      });


    // -------------------- 6. Update TimeSheet Tab --------------------
    //ajax request for timesheet update
    $(document).ready(function() {
      $('.timesheet-request-btn').click(function(e) {
          e.preventDefault();

          var dateSelect = document.querySelector('input[name="work-date"]').value;
          var timeIn = document.querySelector('input[name="time-in"]').value;
          var timeOut = document.querySelector('input[name="time-out"]').value;
          var breakStartTime = document.querySelector('input[name="break-start-time"]').value;
          var breakEndTime = document.querySelector('input[name="break-end-time"]').value;
          var overtimeHours = document.querySelector('input[name="overtime-hours"]').value;
          var updateSheetReason = document.querySelector('textarea[name="update-sheet-reason"]').value;
          $.ajax({
              url: 'index.php?action=home',
              type: 'POST',
              data: {
                  submit_ajax: 'timesheet-request-btn',
                  dateSelect: dateSelect,
                  timeIn: timeIn,
                  timeOut: timeOut,
                  breakStartTime: breakStartTime,
                  breakEndTime: breakEndTime,
                  overtimeHours: overtimeHours,
                  updateSheetReason: updateSheetReason
              },
              success: function(response) {
                  if (response.includes('TimeSheet Updated Successfully')) {
                    showMessageBox('success', 'TimeSheet Updated!', 'Keep track with your manager', 'green');
                  }
              },
              error: function(xhr, status, error) {
                  console.log('Error found: ' + error);
              }
          });
        });
    });

    // -------------------- 7. WFH Tab -----------------------
    $(document).ready(function() {
      $('.wfh-request-btn').click(function(e) {
          e.preventDefault();

          var dateSelect = document.querySelector('input[name="selected-date"]').value;
          var wfhReason = document.querySelector('textarea[name="reason-wfh"]').value;
          $.ajax({
              url: 'index.php?action=home',
              type: 'POST',
              data: {
                  submit_ajax: 'wfh-request-btn',
                  dateSelect: dateSelect,
                  wfhReason: wfhReason
              },
              success: function(response) {
                  if (response.includes('WFH Request Created Successfully')) {
                    showMessageBox('success', 'WFH Request Sended!', 'Keep track with your manager', 'green');
                  }
              },
              error: function(xhr, status, error) {
                  console.log('Error found: ' + error);
              }
          });
        });
    });


    // ------------------- 8.Acitivity Page -------------------
    // function loadActivity(activity) {
    //   const activityTable = document.getElementById('activity');
    
    //   activityTable.innerHTML = bodyContent;
    // }

    // -------------------- 9. Reward -------------------------
    function loadVoucherList(voucherList, myVouchers) {

      myVouchers = JSON.parse(myVouchers);
      const voucherTable = document.querySelector('.reward-content');

      // Clear existing voucher content if needed
      voucherTable.innerHTML = '<h2> Vouchers This Week </h2>';
      console.log(voucherList);
      
      
      // Load voucher list to table
      voucherList.forEach(voucher => {
        const voucherRow = document.createElement('tr');
        voucherRow.innerHTML = `
          <td>${voucher.maVC}</td>
          <td>${voucher.tenVC}</td>
          <td>${voucher.cost}</td>
          <td>
            <button class="btn btn-primary btn-sm" data-voucher="${voucher.voucher_id}">Redeem</button>
          </td>
        `;
        voucherTable.appendChild(voucherRow);
      });

      //Load my vouchers
      const myVoucherTable = document.querySelector('.my-vouchers-content');
      myVouchers.forEach(voucher => {
        const voucherRow = document.createElement('tr');
        voucherRow.innerHTML = `
          <td>${voucher.maVC}</td>
          <td>${voucher.tenVC}</td>
          <td>${voucher.cost}</td>
          <td>
            <button class="btn btn-danger btn-sm" data-voucher="${voucher.voucher_id}">Cancel</button>
          </td>
        `;
        myVoucherTable.appendChild(voucherRow);
      });
    }

    // -------------------- 10. Home -------------------------
    var currentPage = 1;
    var rowsPerPage = 5;
    var totalPages = 1;
    var paginatedData = [];
    var currentTitle = ''; 

    function displayDataWithPagination(data, title, role) {
      currentTitle = title;

      totalPages = Math.ceil(data.length / rowsPerPage);

      paginatedData = [];
      for (let i = 0; i < data.length; i += rowsPerPage) {
          paginatedData.push(data.slice(i, i + rowsPerPage));
      }

      displayPageData(1, role);
      updatePaginationControls();
    }

    function displayPageData(page, role) {
        currentPage = page;
        var tableBody = document.getElementById('table-body');
        tableBody.innerHTML = ''; 
    
        
        var currentData = paginatedData[page - 1];
        var isManager = role === 'manager';
  
        currentData.forEach(function(item, index) {
            var row = document.createElement('tr');
    
            var cell1 = document.createElement('td');
            cell1.innerHTML = (index + 1) + (rowsPerPage * (currentPage - 1)); 
            row.appendChild(cell1);
    
            var cell2 = document.createElement('td');
            cell2.innerHTML = formatItemData(item);
            row.appendChild(cell2);

            // If the user is a Manager, add the Action column with Edit and View buttons
            if (isManager) {
                var actionCell = document.createElement('td');
                actionCell.innerHTML = `
                    <button class="request-edit-btn" onclick="editRequest(${item.id})">Edit</button>
                    <button class="request-view-btn" onclick="viewRequest(${item.id})">View</button>
                `;
                row.appendChild(actionCell);
            }
    
            tableBody.appendChild(row);
        });
    
        // Show the table with the correct title
        document.querySelector('#data-table h3').innerHTML = currentTitle;
        document.getElementById('data-table').style.display = 'block';
    
        // Add Action column to the header if the role is Manager
        var tableHeader = document.querySelector('#data-table thead tr');
        var actionHeader = document.getElementById('action-header');
        if (isManager && !actionHeader) {
            var actionCol = document.createElement('th');
            actionCol.id = 'action-header';
            actionCol.innerHTML = 'Action';
            tableHeader.appendChild(actionCol);
        } else if (!isManager && actionHeader) {
            actionHeader.remove();  // Remove Action header if not a Manager
        }
    }

    // Update pagination controls based on the current page
    function updatePaginationControls() {
        var pageNumbers = document.getElementById('page-numbers');
        pageNumbers.innerHTML = `${currentPage} / ${totalPages}`;
        
        document.getElementById('prev-page').disabled = currentPage === 1;
        document.getElementById('next-page').disabled = currentPage === totalPages;
    }

    // Function to change the page
    function changePage(step) {
        var newPage = currentPage + step;

        if (newPage >= 1 && newPage <= totalPages) {
            displayPageData(newPage);
            updatePaginationControls();
        }
    }

    // Helper function to format item data
    function formatItemData(item) {
        let formatted = '';
        for (let key in item) {
            formatted += `<strong>${key}:</strong> ${item[key]}<br>`;
        }
        return formatted;
    }

    function editRequest(requestId) {
      console.log(`Edit request with ID: ${requestId}`);
      showModal(requestId);
    }

    function viewRequest(requestId) {
      console.log(`View request with ID: ${requestId}`);
      showModal(requestId);
    }

    function showModal(requestId) {
      var modal = document.getElementById('checkInModal');
      modal.style.display = 'block'; 
  
      // Handle submit request
      document.getElementById('response-request-btn').onclick = function() {
          var action = document.getElementById('response-request-option').value;
          submitRequestUpdate(requestId, action); 
      }
    }
  
    // Submit request update using AJAX
    function submitRequestUpdate(requestId, action) {
        $.ajax({
            url: 'index.php?action=update-request', 
            type: 'POST',
            data: {
                requestId: requestId,
                action: action
            },
            success: function(response) {
                console.log('Response:', response);
                alert('Request has been ' + action + 'd successfully');
                document.getElementById('checkInModal').style.display = 'none';
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function loadHomeDashboard(checkInData, leaveRequestData, timeSheetData, wfhData, role){
      // Parse the data
      checkInData = JSON.parse(checkInData);
      leaveRequestData = JSON.parse(leaveRequestData);
      timeSheetData = JSON.parse(timeSheetData);
      wfhData = JSON.parse(wfhData);
  
      // Number of requests
      document.querySelector('.checkin-box .number').innerHTML = checkInData.length;
      document.querySelector('.leave-request-box .number').innerHTML = leaveRequestData.length;
      document.querySelector('.update-timesheet-request-box .number').innerHTML = timeSheetData.length;
      document.querySelector('.wfh-request-box .number').innerHTML = wfhData.length;
  
      // Example of loading paginated data for check-ins
      document.querySelector('.checkin-box').onclick = function() {
          displayDataWithPagination(checkInData, 'Check-In Data', role);
      };
      
      document.querySelector('.leave-request-box').onclick = function() {
          displayDataWithPagination(leaveRequestData, 'Leave Request Data', role);
      };
      
      document.querySelector('.update-timesheet-request-box').onclick = function() {
          displayDataWithPagination(timeSheetData, 'Update Timesheet Data', role);
      };
      
      document.querySelector('.wfh-request-box').onclick = function() {
          displayDataWithPagination(wfhData, 'WFH Request Data', role);
      };
    }
    
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













