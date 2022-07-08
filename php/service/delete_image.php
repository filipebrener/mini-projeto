<?php

    $filepath = $_GET['filepath'];

    if(!file_exists($filepath)){
        http_response_code(404);
        die();
    }

    if (!unlink($filepath)) {
        http_response_code(500);
    }

?>