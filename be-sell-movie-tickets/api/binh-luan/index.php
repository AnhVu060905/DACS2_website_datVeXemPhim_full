<?php 
    include_once "../../utils/index.php";
    include_once "../../db/index.php";
    include_once "./a.php";
    $db = new Database();
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['GET'])) {
        getAll($db, $data['id']);
    }
    if (isset($data['POST'])) {
        CreateUpdate($db,false, $data);
    }
    if (isset($data['DEL'])) {
        delete($db, $data['id']);
    }
    if (isset($data['PUT'])) {
        CreateUpdate($db, true, $data);
    }
?>