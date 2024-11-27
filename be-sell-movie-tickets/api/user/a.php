<?php
    function allUser($db) {
        $rs = $db->thucthi("SELECT * FROM `user`");
        $json = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $json[] = ($row);
        }
        print_r(json_encode($json));
    }

    function updateUser($db) {
        $permission = $_POST['permission'];
        $id = $_POST['id'];

        $rs = $db->thucthi("UPDATE `user` SET `permission`='$permission' WHERE `id` = $id");
        if ($rs) {
            success("Sửa thành công");
        } else {
            error("Sửa không thành công");
        }
    }

    function login($db, $data){
        $tk = $data['sdt'];
        $mk = $data['password'];
        $rs = $db->thucthi("SELECT * FROM `user` WHERE `email` = '$tk' AND `pass` = '$mk'");

        // Kiểm tra nếu truy vấn trả về kết quả
        if ($rs && $rs->num_rows > 0) {
            $user = $rs->fetch_assoc(); // Lấy dữ liệu của người dùng
            success('Đăng nhập thành công', $user);
        } else {
            error("Tài khoản hoặc mật khẩu sai");
        }
    }

    function register($db, $data){
        $tk = $data['sdt'];
        $mk = $data['password'];
        $ten = $data['ten'];
        $rs = $db->thucthi("INSERT INTO `user`(`email`, `pass`,`ten`) VALUES ('$tk','$mk', '$ten')");
        if ($rs) {
            success('Đăng ký thành công', $rs);
            return;
        }
        error("Đăng ký thất bại");
    }

?>