<?php
    class User {
        private $id;
        private $username;
        private $email;
        private $password;
        private $status;
        private $role;
        
        public function __construct() {
            $this->id = "";
            $this->username = "";
            $this->email = "";
            $this->password = "";
            $this->status = "";
            $this->role = "";
        }

        //Set Cookie - remember me method
        public static function setCookie($username, $password, $days, $autofill) {
            if(isset($_POST['remember-me'])) {
                //Cookie exists ? get cookie : create new cookie
                if(isset($_COOKIE['publication_credentials'])) {
                    $cookie = json_decode($_COOKIE['publication_credentials'], true);
                } else {
                    $cookie = [];
                }

                //Update cookie(username, password, session_user, allow autofill)
                if($autofill) {
                    $cookie[$username] = $password;
                    $cookie['session_user'] = $username;
                }
                $cookie['autofill'] = $autofill;
                setcookie('publication_credentials', json_encode($cookie), time() + (86400 * $days), "/");
            } else {   
                //Delete Cookie
                if(isset($_COOKIE['publication_credentials'])) {
                    $cookie = json_decode($_COOKIE['publication_credentials'], true);
                    unset($cookie[$username]);
                    $cookie['session_user'] = "";
                    setcookie('publication_credentials', json_encode($cookie), time() + (86400 * $days), "/");
                }
            } 
        }

        //Assign session to user (username, role, isLogin)
        public static function setSession($username) {
            $_SESSION["username"] = $username;
            $_SESSION["role"] = User::getRole($username);
            $_SESSION["isLogin"] = true;
        }

        //User login
        public static function Login() {
            if(isset($_POST["login"])) {
                //Filter prevent SQL injection
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); 
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

                $isValid = User::isValid($username, $password);
                if ($isValid === 1) {
                    //Assign session to user (username, role, isLogin)
                    User::setSession($username);  
    
                    //Set Cookie
                    User::setCookie($username, $password, 30, true); //30 days expired

                    //Redirect to homepage
                    Helper::runScript("cleanErrorMsg();");
                    echo "Welcome " . $_SESSION["role"] . " " . $_SESSION["username"] . " " . $_SESSION["isLogin"] . "<br>";
                    header('Location: index.php?action=home');
                } else if ($isValid === -1) { //Wrong username
                    Helper::runScript("showErrorMsg('username-error', '.input-field[name=\"username\"]', '$username', '$password');");
                    User::setCookie($username, $password, 30, false); //false in order to prevent autofill
                } else { //Wrong password
                    Helper::runScript("showErrorMsg('password-error', '.input-field[name=\"password\"]', '$username', '$password');");
                    User::setCookie($username, $password, 30, false); //false in order to prevent autofill
                }
            }
        }

        //User Sign Up
        public static function SignUp() {   
            Helper::runScript("container.classList.add('sign-up-mode');");
            if(isset($_POST["signup"])) {
                //Filter prevent SQL injection
                $username = filter_input(INPUT_POST, "signup-username", FILTER_SANITIZE_SPECIAL_CHARS); 
                $password = filter_input(INPUT_POST, "signup-password", FILTER_SANITIZE_SPECIAL_CHARS);

                //Check username exists
                if(User::checkUsername($username)) {
                    $db = new Database();
                    $conn = $db->connect();
                    $sql = "INSERT INTO users (username, password, status, user_type) VALUES ('$username', '$password', 'active', 'member')";
                    $db->execute($sql);
                    $db->close();
                    //Redirect to Homepage, 8s countdown
                    Helper::runScript("showSuccessMsg('signup-username-success', '.sign-up-form .input-field','$username', '$password');");
                    User::setSession($username);  
                    Helper::runScript("RedirectHome('index.php?action=home', 8);");
                } else {
                    Helper::runScript("showErrorMsg('signup-username-error', '.input-field[name=\"signup-username\"]', '$username', '$password');");
                }
            }
        }

        //User login authentication
        public static function isValid($username, $password) {
            $db = new Database();
            $conn = $db->connect();

            $sql = "SELECT * FROM users WHERE BINARY username = '$username'";
            $db->execute($sql);
            if($db->getNumRows() > 0) {
                $sql = "SELECT * FROM users WHERE BINARY username = '$username' AND password = '$password'";
                $db->execute($sql);
                $numRows = $db->getNumRows();
                $db->close();
                if ($numRows > 0) {
                    return 1;      //Login successful
                } else {return 0;} //Wrong password
            } else {
                $db->close();
                return -1;         //Wrong username
            }
        }

        //Check username exists
        public static function checkUsername($username) {
            $db = new Database();
            $conn = $db->connect();
            $sql = "SELECT * FROM users WHERE BINARY username = '$username'";
            $db->execute($sql);
            $numRows = $db->getNumRows();
            $db->close();
            if($numRows > 0) {
                return false; //Username is not available
            } else {
                return true;  //Username is available
            }
        }
        
        //Get user role
        public static function getRole($username) {
            $db = new Database();
            $conn = $db->connect();
            $sql = "SELECT user_type FROM users WHERE BINARY username = '$username'";
            $result = $db->execute($sql);
            $role = $db->getData()[0];
            $db->close();
            return $role;
        }
    }

?>