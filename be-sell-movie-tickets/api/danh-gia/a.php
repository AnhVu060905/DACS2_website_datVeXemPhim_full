<?php
    function getAll($db, $data)
    {
        $id_user = isset($data['id_user']) ? $data['id_user'] : null;
        $id_film = $data['id_film'];
        $rs = $db->thucthi("SELECT * FROM `danh_gia` WHERE `id_film` = '$id_film'");
        
        if ($rs && mysqli_num_rows($rs) > 0) {
            $totalRating = 0;
            $numReviews = 0; 
            $userRating = null;
    
            while ($row = mysqli_fetch_assoc($rs)) {
                $star = $row['star'];
                $totalRating += $star;
                $numReviews++; 
    
                if ($row['id_user'] == $id_user) {
                    $userRating = $star; 
                }
            }
    
            $averageRating = $numReviews > 0 ? ($totalRating / ($numReviews * 5)) * 100 : 0;
    
            $result = [
                'average_rating' => $averageRating,
                'user_rating' => $userRating, 
                'total_reviews' => $numReviews, 
            ];
    
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else {
            return [
                'average_rating' => 0,
                'user_rating' => null,
                'total_reviews' => 0
            ];  // Không có đánh giá nào
            echo json_encode($result, JSON_PRETTY_PRINT);
        }
    }
    function CreateUpdate($db, $data)
    {
        $star = isset($data['star']) ? $data['star'] : null;
        $id_user = isset($data['id_user']) ? $data['id_user'] : null;
        $id_film = $data['id_film'];
        $rs = $db->thucthi("SELECT * FROM `danh_gia` WHERE `id_film` = '$id_film' AND `id_user` = '$id_user'");

        if ($rs && mysqli_num_rows($rs) > 0) {
            $updateQuery = "UPDATE `danh_gia` SET `star` = '$star' WHERE `id_film` = '$id_film' AND `id_user` = '$id_user'";
            $result = $db->thucthi($updateQuery);
            if ($result) {
                success("Cập nhật đánh giá thành công");
            } else {
                error("Cập nhật đánh giá không thành công");
            }
        } else {
            $insertQuery = "INSERT INTO `danh_gia`(`id_film`, `id_user`, `star`) VALUES ('$id_film', '$id_user', '$star')";
            $result = $db->thucthi($insertQuery);
            if ($result) {
                success("Thêm đánh giá thành công");
            } else {
                error("Lỗi khi thêm đánh giá");
            }
        }
    }

?>