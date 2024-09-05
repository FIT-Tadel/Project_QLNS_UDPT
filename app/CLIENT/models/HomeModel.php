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
                $myVouchers = json_encode(Home::getMyVouchers($user));
                Helper::runScript("loadVoucherList($allVouchers, $myVouchers)");

                //Update Setting
                Home::updateStatus($username);

                //Load/Change Password
                Helper::runScript("loadPrivacyCenter('$username')");
                Home::changePassword($user);
            }
        }

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
        // public static function getActivity($username) {
        //     $url = 'activities/user123';
        //     return Helper::sendRequest($url, 'GET');
        // }

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