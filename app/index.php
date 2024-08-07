<?php
//Require files from common folder
require_once './common/env.php';
require_once './common/helpers.php';
require_once './common/connect-db.php';

//Require files from controllers folder
require_once './controllers/UserController.php';
require_once './controllers/HomeController.php';

//Require files from models folder
require_once './models/UserModel.php';
require_once './models/HomeModel.php';

//Routing
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}

//Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $_SESSION["isLogin"] = false;
}

switch ($action) {
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;
    case 'signup':
        $controller = new UserController();
        $controller->signup();
        break;
    case 'home':
        $controller = new HomeController();
        $controller->HomePage();
        break;
    case 'logout':
        $controller = new HomeController();
        $controller->LogOut();
        break;  
    //case ...;
    default:
        $controller = new UserController();
        $controller->login();
        break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Ajax Sending -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Employee Management Application</title>
</head>
<body>
    <script src="./public/js/app.js"></script>
</body>
</html>







