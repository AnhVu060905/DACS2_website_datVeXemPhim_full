<?php
    function getAll($db, $id)
    {

        $rs = $db->thucthi("SELECT `binh_luan`.id as 'id_binh_luan', `binh_luan`.noi_dung, `binh_luan`.`time`, `user`.id as 'id_user', `user`.ten, `user`.email FROM `binh_luan` INNER JOIN `user` ON `binh_luan`.id_user = `user`.id WHERE `id_film` = $id");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }
    function CreateUpdate($db, $isUpdate = false, $data)
    {
        $id_film = isset($data['id-film']) ? $data['id-film'] : null;
        $id_user = isset($data['id-user']) ? $data['id-user'] : null;
        $noi_dung = $data['noi-dung'];
        $rs = '';
        if ($isUpdate) {
            $id = $data['id'];
            $rs = $db->thucthi("UPDATE `binh_luan` SET `noi_dung`='$noi_dung' WHERE `id`=$id");
        } else {
            $rs = $db->thucthi("INSERT INTO `binh_luan`( `noi_dung`, `id_film`, `id_user`) VALUES ('$noi_dung',$id_film,$id_user)");
        }

        if ($rs) {
            success( $isUpdate ? "Sửa loại phim thành công" : "Thêm thành công");
        } else {
            error( $isUpdate ? "Sửa loại phim không thành công thành công" : "Lỗi khi thêm loại phim");
        }
    }

    function delete($db, $id) {
        $rs = $db->thucthi("DELETE FROM `binh_luan` WHERE `id` = $id");
        if ($rs) {
            success("Xóa loại phim thành công");
        } else {
            error("Lỗi khi xóa loại phim");
        }
    }

?>