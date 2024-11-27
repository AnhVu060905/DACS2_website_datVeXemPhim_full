<?php
    function getAll($db)
    {
        $rs = $db->thucthi("SELECT * FROM `phim` INNER JOIN `lich_trinh` ON `phim`.id = `lich_trinh`.id_film");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function getByLichTrinhAndTrangthai($db, $data)
    {
        $id = $data['id'];

        $rs = $db->thucthi("SELECT *,`phim`.id AS 'id_phim'  FROM `phim` INNER JOIN `lich_trinh` ON `phim`.id = `lich_trinh`.id_film WHERE `lich_trinh`.id = $id ");
        $row = mysqli_fetch_assoc($rs);
        if ($row) {
            echo json_encode($row);
        } else {
            echo json_encode(array('error' => 'Không tìm thấy dữ liệu'));
        }
    }
    function CreateUpdate($db, $isUpdate = false)
    {
        $id_film = $_POST['id_film'];
        $ngay_start = $_POST['time_start'];
        $ngay_end = $_POST['time_end'];
        $date = $_POST['date'];

        $ngay_obj = DateTime::createFromFormat('D, d M Y H:i:s T', $date);
        $date = $ngay_obj->format('Y-m-d');

        $ngay_start_cv = new DateTime($ngay_start);
        $ngay_end_cv = new DateTime($ngay_end);

        $ngay_start = $ngay_start_cv->format('H:i:s');
        $ngay_end = $ngay_end_cv->format('H:i:s');
        if ($isUpdate) {
            $id = $_POST['id'];
            $rs = $db->thucthi("UPDATE `lich_trinh` SET `id_film`=$id_film,`time_start`='$ngay_start',`time_end`='$ngay_end',`date`='$date'  WHERE `id` = $id");
        } else {
            $rs = $db->thucthi("INSERT INTO `lich_trinh`( `id_film`, `time_start`, `time_end`, `date`) VALUES ('$id_film','$ngay_start','$ngay_end','$date')");
        }

        if ($rs) {
            success($isUpdate ? "Sửa lịch trình thành công" : "Thêm lịch trình thành công");
        } else {
            error($isUpdate ? "Sửa lịch trình không thành công" : "Lỗi khi thêm lịch trình");
        }
    }

    function delete($db, $id)
    {
        $rs = $db->thucthi("DELETE FROM `lich_trinh` WHERE `id` = $id");
        if ($rs) {
            success("Xóa lich_trinh thành công");
        } else {
            error("Lỗi khi xóa lich_trinh");
        }
    }
 ?>