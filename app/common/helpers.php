<?php
//Khai báo các hàm global, dùng cho toàn bộ project
class Helper {

    //Run JS script in PHP(./public/js/app.js)
    public static function runScript($script) {
        echo "<script> document.addEventListener('DOMContentLoaded', function(){" .$script."}); </script>";
    }
}

?>
