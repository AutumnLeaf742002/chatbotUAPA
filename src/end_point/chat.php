<?php

include_once "gemini.php";

if(isset($_POST['message'])){

    $headMessage = file_get_contents('./data.txt');

    $message = $_POST['message'];
    $message = $headMessage . $message;

    $res = ia($message);

    echo json_encode(['res' => $res]);
}
else{

    header('location: https://www.youtube.com/watch?v=35rWidhkPAk');
}

?>