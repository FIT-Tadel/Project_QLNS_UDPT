<?php
//Khai báo các hàm global, dùng cho toàn bộ project
class Helper {

    //Run JS script in PHP(./public/js/app.js)
    public static function runScript($script) {
        echo "<script> document.addEventListener('DOMContentLoaded', function(){" .$script."}); </script>";
    }

    //Send API Request
    public static function sendRequest($endpoint, $method, $data = null, $headers = []) {
        // API URL
        $url = "http://localhost:8080/api/{$endpoint}";

        $curl = curl_init();
        
        switch (strtoupper($method)) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, true);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
                break;
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        // Headers configuration
        $defaultHeaders = [
            'Content-Type: application/json'
        ];
        $headers = array_merge($defaultHeaders, $headers);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
        //Execute cURL
        $response = curl_exec($curl);
    
        if (curl_errno($curl)) {
            echo 'Error: ' . curl_error($curl);
        }
        curl_close($curl);
    
        return json_decode($response, true); 
    }
}

?>
