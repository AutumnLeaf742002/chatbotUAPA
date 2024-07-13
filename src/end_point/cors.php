<?php

function validateCorsIp() {

    // allowed IP
    $allowed_ip = "::1";

    // client IP
    $client_ip = $_SERVER['REMOTE_ADDR'];

    if ($client_ip === $allowed_ip) {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0);
        }
        
        return true;
    } else {
        header("HTTP/1.1 403 Forbidden");
        return false;
    }
}

?>