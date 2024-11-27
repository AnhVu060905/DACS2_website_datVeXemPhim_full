<?php
    function getAll($db)
    {
        $rs = $db->thucthi("SELECT *,`phim`.id as 'id_phim', FLOOR(AVG(`danh_gia`.star)) AS average_rating  FROM `phim` LEFT JOIN `danh_gia` ON `phim`.id = `danh_gia`.id_film GROUP BY `phim`.id ");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function getAllBySapChieu($db)
    {
        $rs = $db->thucthi("SELECT *,`phim`.id as 'id_phim', FLOOR(AVG(`danh_gia`.star)) AS average_rating  FROM `phim` LEFT JOIN `danh_gia` ON `phim`.id = `danh_gia`.id_film GROUP BY `phim`.id ");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function getAllByXephang($db)
    {
        $rs = $db->thucthi("SELECT *,`phim`.id as 'id_phim', FLOOR(AVG(`danh_gia`.star)) AS average_rating  FROM `phim` LEFT JOIN `danh_gia` ON `phim`.id = `danh_gia`.id_film GROUP BY `phim`.id ");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function getDetails($db, $id)
    {
        $rs = $db->thucthi("SELECT * FROM `phim` WHERE `id` = $id");
        $row = mysqli_fetch_assoc($rs);
        if ($row) {
            echo json_encode($row);
        } else {
            echo json_encode(array('error' => 'Không tìm thấy dữ liệu'));
        }
    }
    function CreateUpdate($db, $isUpdate = false)
    {
        $ten = $_POST['ten'];
        $thoi_luong = $_POST['thoi_luong'];
        $file = isset($_FILES['anh']) ? $_FILES['anh'] : null;
        $noi_dung = $_POST['noi_dung'];
        $hinh_thuc = $_POST['hinh_thuc'];
        $giave = $_POST['giave'];
        $id_the_loai = $_POST['id_the_loai'];
        $ngay_start = $_POST['ngay_start'];
        $ngay_end = $_POST['ngay_end'];

        // Đường dẫn thư mục lưu trữ tệp hình ảnh
        $targetDir = "./uploads/";

        $ngay_start_obj = DateTime::createFromFormat('D, d M Y H:i:s T', $ngay_start);
        $ngay_end_obj = DateTime::createFromFormat('D, d M Y H:i:s T', $ngay_end);
        $ngay_start = $ngay_start_obj->format('Y-m-d');
        $ngay_end = $ngay_end_obj->format('Y-m-d');

        // Lấy tên tệp và tạo đường dẫn đầy đủ
        if ($file) {
            $fileName = basename($file["name"]);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            // Tạo tên tệp mới với thời gian
            $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . $fileExtension;
            $targetFilePath = $targetDir . $newFileName;
            move_uploaded_file($file["tmp_name"], $targetFilePath);
        }

        $rs = '';
        if ($isUpdate) {
            $id = $_POST['id'];
            if (!$file) {
                $rs = $db->thucthi("UPDATE `phim` SET `ngay_start`='$ngay_start',`ngay_end`='$ngay_end',`giave`='$giave',`noi_dung`='$noi_dung',`ten`='$ten',`thoi_luong`=$thoi_luong,`hinh_thuc`=$id_the_loai,`id_the_loai`=$hinh_thuc WHERE `id` = $id");
            } else {
                $rs = $db->thucthi("UPDATE `phim` SET `ngay_start`='$ngay_start',`ngay_end`='$ngay_end',`anh`='$newFileName',`giave`='$giave',`noi_dung`='$noi_dung',`ten`='$ten',`thoi_luong`=$thoi_luong,`hinh_thuc`=$id_the_loai,`id_the_loai`=$hinh_thuc WHERE `id` = $id");
            }
        } else {
            $rs = $db->thucthi("INSERT INTO `phim`(`ngay_start`, `ngay_end`, `giave`, `noi_dung`, `ten`, `thoi_luong`, `hinh_thuc`, `id_the_loai`, `anh`) VALUES ('$ngay_start','$ngay_end','$giave','$noi_dung','$ten',$thoi_luong,$hinh_thuc,$id_the_loai, '$newFileName')");
        }

        if ($rs) {
            success($isUpdate ? "Sửa phim thành công" : "Thêm thành công");
        } else {
            error($isUpdate ? "Sửa phim không thành công thành công" : "Lỗi khi thêm phim");
        }
    }

    function delete($db, $id)
    {
        $rs = $db->thucthi("DELETE FROM `phim` WHERE `id` = $id");
        if ($rs) {
            success("Xóa phim thành công");
        } else {
            error("Lỗi khi xóa phim");
        }
    }
 ?>