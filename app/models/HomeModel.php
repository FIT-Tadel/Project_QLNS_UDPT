<?php
    session_start();
    class Home {
        public static function displayHomepage() {
            //Check if user is logged in
            if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] === true) {
                $username = $_SESSION["username"];

                //Get All Data For Homepage
                $user = Home::getUser($username);
                $author = Home::getAuthor($username);

                //Show Welcome Message
                Helper::runScript("showWelcome('$username')");

                //Load Header: get UserAvatar, Session-UserInfo, Status, Role...
                $avatar_path = $author['avatar_path'];
                $role = $user['user_type'];
                $status = $user['status'];
                $password = $user['password'];
                Helper::runScript("loadHeader('$avatar_path', '$username', '$role','$status', '$password')");

                //Load MyProfile Page
                $name = $author['name'];
                $email = $author['email'];
                $website = $author['website'];
                $bio = $author['bio'];
                $interests = $author['interests'];
                Helper::runScript("myProfile('$username', '$name', '$email', '$website', '$bio', '$interests')");
                
                //Update Profile
                Home::updateProfile($user, $author);

                //Update Setting
                Home::updateSetting($user);

                //Load/Change Password
                Helper::runScript("loadPrivacyCenter('$username')");
                Home::changePassword($user);
            }
        }

        public static function AuthorExists($user_id) {
            $db = new Database();
            $db->connect();

            $sql = "SELECT * FROM authors WHERE user_id = $user_id";
            $db->execute($sql);
            $author = $db->getData();
            $db->close();
            return $author;
        }

        public static function getAuthor($username) {
            $db = new Database();
            $db->connect();

            $sql = "SELECT a.full_name, u.email, a.website, a.profile_json_text, a.image_path 
            FROM authors a  
            INNER JOIN users u on a.user_id = u.user_id 
            WHERE BINARY u.username = '$username' ";

            $db->execute($sql);
            $author = $db->getData();

            if($author) {
                $profile_json_text = json_decode($author['profile_json_text'], true);

                $avatar_path = $author['image_path'];
                $name = $author['full_name'];
                $website = $author['website'];
                $email = $author['email'];
                $bio = $profile_json_text['bio'];
                $interests = implode(", ", $profile_json_text['interests']);
            } 
            else {
                $avatar_path = "./uploads/images/defaultUserAvatar.png";
                $name = "";
                $website = "";
                $email = "";
                $bio = "";
                $interests = "";
            }

            $db->close();
            return [
                'avatar_path' => $avatar_path,
                'name' => $name,
                'website' => $website,
                'email' => $email,
                'bio' => $bio,
                'interests' => $interests
            ];
        }

        public static function getUser($username) {
            $db = new Database();
            $db->connect();

            $sql = "SELECT * FROM users WHERE BINARY username = '$username' ";
            $db->execute($sql);
            $user = $db->getData();
            $db->close();
            return $user; 
        }

        public static function updateProfile($user, $author) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['submit_ajax'])) return;

                $db = new Database();
                $db->connect();

                //Handle Change Avatar
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $author['avatar_path'] = IMG_UPLOAD_DIR . "{$user['username']}.png";
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $author['avatar_path']);
                }

                //If Author does not exist, create new author
                if(!Home::AuthorExists($user['user_id'])) {
                    $db->insertData('authors', 'user_id', $user['user_id']);
                }

                //Update Profile
                $db->updateData('users', ['email'], [$_POST['email']], "user_id = {$user['user_id']}");
                $db->updateData('authors', ['full_name', 'website', 'profile_json_text', 'image_path'],
                                        [$_POST['fullname'], $_POST['website'], json_encode(['bio' => $_POST['bio'], 'interests' => explode(", ", $_POST['interests'])]), $author['avatar_path']],
                                            "user_id = {$user['user_id']}");
                
                $db->close();
                echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
            }
        }

        public static function updateSetting($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'user-status-checkbox') return;

                $db = new Database();
                $db->connect();
                $db->updateData('users', ['status'], [$_POST['status']], "user_id = {$user['user_id']}");
                $db->close();
            }
        }

        public static function changePassword($user) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!isset($_POST['submit_ajax'])) return;
                if($_POST['submit_ajax'] !== 'change-pass-btn') return;

                $db = new Database();
                $db->connect();
                $db->updateData('users', ['password'], [$_POST['new_password']], "user_id = {$user['user_id']}");
                $db->close();
            }
        }
    }
?>