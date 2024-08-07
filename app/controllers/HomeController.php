<?php
    class HomeController {

        public function HomePage() {
            Home::displayHomepage();
            require("./views/home/HomePage.php");
        }

        public function LogOut() {
            session_destroy();
            header("Location: index.php?action=login");
        }


    }

?>