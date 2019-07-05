<?php

    function check_create_admin($_user_name,$_nickname){
        require '../model/query_db.php';
        require '../model/connect_db.php';
        $_column = '*';
        $_table = 'admin';
        $_where_user_name = "a_user_name=$_user_name";
        $_where_nickname = "a_nickname=$_nickname";
        $_query = $_object_db->query(SELECT($_column,$_table,$_where_user_name));
        if(!empty($_query)){
            $_query = $_object_db->query(SELECT($_column,$_table,$_nickname));
            if(empty($_query)){
                return true;
            } else {
                echo '<script>alert("Lỗi: \"Nickname\" bạn tạo đã bị trùng !");</script>';
                header ('Location:../views/admin.php');
            }
        } else {
            echo '<script>alert("Lỗi: \"Tên đăng nhâp\" bạn tạo đã bị trùng !")</script>';
            header ('Location:../views/admin.php'); //lỖI
        }
    }
 ?>