<?php
    include_once "../../utils/index.php";
    include_once "../../db/index.php";
    include_once "./a.php";
    include_once "./momo.php";
    $db = new Database();
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['GET'])) {
        getAll($db);
    }
    if (isset($data['GET_DETAIL'])) {
        getByLichTrinhAndTrangthai($db, $data);
    }
    if (isset($_POST['POST'])) {
        CreateUpdate($db);
    }
    if (isset($data['DEL'])) {
        delete($db, $data['id']);
    }
    if (isset($_POST['PUT'])) {
        CreateUpdate($db, true);
    }

    if (isset($data['MOMO'])) {
        createMomo($data);
    }
?>