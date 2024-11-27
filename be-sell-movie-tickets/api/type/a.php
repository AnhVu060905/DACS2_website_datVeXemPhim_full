<?php
    function getAll($db)
    {
        $rs = $db->thucthi("SELECT * FROM `loai_phim`");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function CreateUpdate($db, $isUpdate = false)
    {
        $ten = $_POST['ten'];
        $rs = '';
        if ($isUpdate) {
            $id = $_POST['id'];
            $rs = $db->thucthi("UPDATE `loai_phim` SET `ten`='$ten' WHERE `id` = $id");
        } else {
            $rs = $db->thucthi("INSERT INTO `loai_phim`(`ten`) VALUES ('$ten')");
        }

        if ($rs) {
            success( $isUpdate ? "Sửa loại phim thành công" : "Thêm thành công");
        } else {
            error( $isUpdate ? "Sửa loại phim không thành công thành công" : "Lỗi khi thêm loại phim");
        }
    }

    function delete($db, $id) {
        $rs = $db->thucthi("DELETE FROM `loai_phim` WHERE `id` = $id");
        if ($rs) {
            success("Xóa loại phim thành công");
        } else {
            error("Lỗi khi xóa loại phim");
        }
    }

?>