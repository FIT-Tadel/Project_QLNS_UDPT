<?php
    class UserController {

        public function login() {
            User::Login();
            require("./views/auth/RegistrationForm.php");
        }

        public function signup() {
            User::SignUp();
            require("./views/auth/RegistrationForm.php");
        }
    }

?>