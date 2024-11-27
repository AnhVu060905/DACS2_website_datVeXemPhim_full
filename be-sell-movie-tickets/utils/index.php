<?php
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    
    // header('Content-Type: application/json');
    function success($mess, $data = null, $status = 200){
        echo json_encode([
            "status" => $status,
            "message" => $mess,
            "data" => $data
        ]);
    }

    function error($mess, $status = 500){
        echo json_encode([
            "status" => $status,
            "message" => $mess,
            "data" => null
        ]);
    }
?>