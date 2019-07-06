<?php
    
    function check_create_admin($_user_name,$_nickname){
        require '../model/connect_db.php';
        require '../model/query_db.php';
        $_column = '*';
        $_table = 'admin';
        $_where_user_name = "a_user_name='$_user_name'";
        $_where_nickname = "a_nickname='$_nickname'";
        $_query = $_object_db->query(SELECT($_column,$_table,$_where_user_name));
        if(empty($_query)){
            $_query = $_object_db->query(SELECT($_column,$_table,$_where_nickname));
            if(empty($_query)){
                return true;
            } else {
                header ("Location:../views/admin.php?error=Nickname bạn tạo bị trùng !");
            }
        } else {
            header ("Location:../views/admin.php?error=Tên đăng nhập bạn tạo bị trùng !");
        }
    }

 ?>