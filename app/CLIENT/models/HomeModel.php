<?php
    session_start();
    class Home {
        public static function displayHomepage() {
            //Check if user is logged in
            if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] === true) {
                $username = $_SESSION["username"];

                //Get All Data For Homepage
                $user = Home::getUser($username);
                $employee = Home::getEmployeeProfile($user['userId']);

                //Show Welcome Message
                Helper::runScript("showWelcome('$username')");

                //Load Header: get UserAvatar, Session-UserInfo, Status, Role...
                $avatar_path = $employee['image_path'];
                $role = $user['userType'];
                $status = $user['userStatus'];
                Helper::runScript("loadHeader('$avatar_path', '$username', '$role','$status')");

                //CheckIn/CheckOut
                $checkInData = Home::getCheckInHistory($user);
                Home::checkIn($user);
                Home::checkOut($user);

                //Leave Request
                $leaveRequestData = Home::getLeaveRequest($user);
                Home::createLeaveRequest($user);

                //Update TimeSheet Request
                $timeSheetData = Home::getUpdateTimeSheetRequest($user);
                Home::createUpdateTimeSheetRequest($user);

                //WFH Request
                $wfhData = Home::getWFHRequest($user);
                Home::createWFHRequest($user);

                //Load Home-Dashboard
                Helper::runScript("loadHomeDashboard('$checkInData', '$leaveRequestData', '$timeSheetData', '$wfhData', '$role')");

                //Load MyProfile Page
                $name = $employee['name'];
                $phone = $employee['phone'];
                $address = $employee['address'];
                $id_card = $employee['id_card'];
                $tax_code = $employee['tax_code'];
                $bank_account = $employee['bank_account'];
                Helper::runScript("myProfile('$username', '$name', '$phone', '$address', '$id_card', '$tax_code', '$bank_account')");        
                
                //Update Profile
                Home::updateProfile($user, $employee);

                //Load Voucher List
                $allVouchers = json_encode(Home::getVoucherList());
                $myVouchers = json_encode(Home::getMyVouchers($username));
                Helper::runScript("loadVoucherList($allVouchers, '$myVouchers')");

                //Update Setting
                Home::updateStatus($username);

                //Load/Change Password
                Helper::runScript("loadPrivacyCenter('$username')");
                Home::changePassword($user);
            }
        }

        // ------------------- FUNCTIONS ----------------------

        //-------------------- CHECK IN/OUT -------------------
        //Check In History
        public static function getCheckInHistory($user) {
            $url = 'request/checkin/'.$user['userId'].'/' .date('m');
            $response = json_encode(Helper::sendRequest($url, 'GET'));

            if ($response) {
                Helper::runScript("handleCheckInHistory('$response')");
            }
            return $response;
        }

        //Employee Check In
        public static function checkIn($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'check-in-btn') return;

                $url = 'request/checkin';
                $data = [
                    'employeeId' => $user['userId'],
                    'checkInDate' => $_POST['checkInDate'],
                    'checkInTime' => $_POST['checkInTime'],
                    'confirmImagePath' => $user['userId'].'@'.$_POST['checkInDate'].'.png' //Example: 2@2024-09-03
                ];
                Helper::sendRequest($url, 'POST', $data);
                echo 'Check In Successfully';
            }
        }

        //Employee Check Out
        public static function checkOut($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'check-out-btn') return;

                $url = 'request/checkout';
                $data = [
                    'employeeId' => $user['userId'],
                    'checkInDate' => $_POST['checkOutDate'],
                    'checkOutTime' => $_POST['checkOutTime']
                ];
                Helper::sendRequest($url, 'PUT', $data);
                echo 'Check Out Successfully';
            }
        }

        //-------------------- Leave Request -------------------
        //Get Leave Request
        public static function getLeaveRequest($user) {
            $url = 'request/leave/'.$user['userId'];
            $response = json_encode(Helper::sendRequest($url, 'GET'));
            return $response;
        }

        //Create Leave Request
        public static function createLeaveRequest($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'leave-request-btn') return;

                $url = 'request/leave';
                $data = [
                    'employeeId' => $user['userId'],
                    'leaveFrom' => $_POST['leaveFrom'],
                    'leaveTo' => $_POST['leaveTo'],
                    'reasonLeave' => $_POST['reasonLeave'],
                    'requestStatus' => 'PENDING'
                ];
                Helper::sendRequest($url, 'POST', $data);
                echo 'Leave Request Created Successfully';
            }
        }

        // ------------------- Update TimeSheet Request --------
        //Get Update TimeSheet Request
        public static function getUpdateTimeSheetRequest($user) {
            $url = 'request/timesheet/'.$user['userId'];
            $response = json_encode(Helper::sendRequest($url, 'GET'));

            return $response;
        }

        //Create Update TimeSheet Request
        public static function createUpdateTimeSheetRequest($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'timesheet-request-btn') return;

                $url = 'request/timesheet';
                $data = [
                    'employeeId' => $user['userId'],
                    'dateSelect' => $_POST['dateSelect'],
                    'timeIn' => $_POST['timeIn'],
                    'timeOut' => $_POST['timeOut'],
                    'breakStartTime' => $_POST['breakStartTime'],
                    'breakEndTime' => $_POST['breakEndTime'],
                    'overTimeHours' => $_POST['overTimeHours'],
                    'updateSheetReason' => $_POST['updateSheetReason'],
                    'requestStatus' => 'PENDING'
                ];
                Helper::sendRequest($url, 'POST', $data);
                echo 'TimeSheet Updated Successfully';
            }
        }
        // ------------------- WFH Request ---------------------
        //Get WFH Request
        public static function getWFHRequest($user) {
            $url = 'request/wfh/'.$user['userId'];
            $response = json_encode(Helper::sendRequest($url, 'GET'));

            return $response;
        }

        //Create WFH Request
        public static function createWFHRequest($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'wfh-request-btn') return;

                $url = 'request/wfh';
                $data = [
                    'employeeId' => $user['userId'],
                    'dateSelect' => $_POST['dateSelect'],
                    'wfhReason' => $_POST['wfhReason'],
                    'requestStatus' => 'PENDING'
                ];
                Helper::sendRequest($url, 'POST', $data);
                echo 'WFH Request Created Successfully';
            }
        }

        //-------------------- PROFILE -------------------

        //Check if empployee profile exists
        public static function profileExists($user_id) {
            $url = 'employee/profile/' . $user_id;
            if (Helper::sendRequest($url, 'GET')) return true;
            return false;
        }

        //Get Employee Profile
        public static function getEmployeeProfile($user_id) {
            $url = 'employee/profile/' . $user_id;
            $employee = Helper::sendRequest($url, 'GET');

            if($employee) {
                $personal_info_json = json_decode($employee['personalInfoJson'], true);

                $name = $employee['name'];
                $phone = $employee['phone'];
                $address = $employee['address'];
                $id_card = $personal_info_json['id_card'];
                $tax_code = $personal_info_json['tax_code'];
                $bank_account = $personal_info_json['bank_account'];
                $image_path = $employee['imagePath'];
            } 
            else {
                $name = "";
                $phone = "";
                $address = "";
                $id_card = "";
                $tax_code = "";
                $bank_account = "";
                $image_path = "./uploads/images/defaultUserAvatar.png";
            }

            return [
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'id_card' => $id_card,
                'tax_code' => $tax_code,
                'bank_account' => $bank_account,
                'image_path' => $image_path
            ];
        }

        //Get User Credentials
        public static function getUser($username) {
            $url = 'employee/credential/' . $username;
            return Helper::sendRequest($url, 'GET'); 
        }

        //Update Employee Profile
        public static function updateProfile($user, $employee) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['submit_ajax'])) return;

                //Handle Change Avatar
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $employee['image_path'] = IMG_UPLOAD_DIR . "{$user['username']}.png";
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $employee['image_path']);
                }

                $url = 'employee/profile/update/' . $user['userId'];
                $data = [
                    'name' => $_POST['fullname'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'personalInfoJson' => json_encode([
                        'id_card' => $_POST['id_card'],
                        'tax_code' => $_POST['tax_code'],
                        'bank_account' => $_POST['bank_account']
                    ]),
                    'imagePath' => $employee['image_path']
                ];
                Helper::sendRequest($url, 'PUT', $data);
            }
        }

        //Get Activity
        public static function getActivity($username) {
            $url = 'activities/user123';
            return Helper::sendRequest($url, 'GET');
        }

        //Get All Vouchers
        public static function getVoucherList() {
            return Helper::sendRequest('voucher/listall', 'GET');
        }

        //Get My Vouchers
        public static function getMyVouchers($username) {
            return Helper::sendRequest('voucher/myvoucher/' . $username, 'GET');
        }

        //Update User Status
        public static function updateStatus($username) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'user-status-checkbox') return;

                $url = 'employee/credential/update/' . $username;
                $data = [
                    'userStatus' => $_POST['status']
                ];
                Helper::sendRequest($url, 'PUT', $data);
            }
        }

        //Change Password
        public static function changePassword($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'change-pass-btn') return;

                if (!password_verify($_POST['confirm_password'], $user['password'])) {
                    echo 'Wrong verified password';
                    return;
                }

                $url = 'employee/credential/update/' . $user['username'];
                $data = [
                    'password' => $_POST['new_password']
                ];
                Helper::sendRequest($url, 'PUT', $data);
                echo 'Password updated successfully';
            }
        }
    }
?>