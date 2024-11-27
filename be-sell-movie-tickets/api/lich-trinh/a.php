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
    function getAllLichTrinhByFilm($db, $id)
    {
        $rs = $db->thucthi("SELECT *,`lich_trinh`.id as 'id_lich_trinh'  FROM `phim` INNER JOIN `lich_trinh` ON `phim`.id = `lich_trinh`.id_film WHERE `lich_trinh`.id_film = $id AND `phim`.hinh_thuc = '1' ");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function CreateUpdate($db, $isUpdate = false)
    {
        $id_film = $_POST['id_film'];
        $ngay_start = $_POST['time_start'];
        $ngay_end = $_POST['time_end'];
        $date = $_POST['date'];

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
        $rs = $db->thucthi("DELETE FROM `lich_trinh` WHERE `id`=$id ");
        if ($rs) {
            success("Xóa lich_trinh thành công");
        } else {
            error("Lỗi khi xóa lich_trinh");
        }
    }
 ?>