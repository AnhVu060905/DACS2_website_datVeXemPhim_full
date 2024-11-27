<?php 
    include_once "../../utils/index.php";
    include_once "../../db/index.php";
    include_once './a.php';
    $db = new Database();
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['GET'])) {
        allUser($db);
    }
    if (isset($_POST['PUT'])) {
        updateUser($db);
    }
    if (isset($data['LOGIN'])) {
        login($db, $data);
    }
    if (isset($data['REGIS'])) {
        register($db, $data);
    }
?>