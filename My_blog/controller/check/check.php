<?php
    
    function check_create_admin($_user_name,$_nickname){
        require '../../model/connect_db.php';
        require '../../model/query_db.php';
        $_column = '*';
        $_table = 'admin';
        $_where_user_name = "a_name='$_user_name'";
        $_where_nickname = "a_nickname='$_nickname'";
        $_query = $_object_db->query(SELECT($_column,$_table,$_where_user_name));
        $_query = $_query->fetch();
        if(empty($_query)){
            $_query = $_object_db->query(SELECT($_column,$_table,$_where_nickname));
            $_query = $_query->fetch();
            if(empty($_query)){
                return true;
            } else {
                header ("Location:../../views/admin/admin.php?error=Nickname bạn tạo bị trùng !");
            }
        } else {
            header ("Location:../../views/admin/admin.php?error=Tên đăng nhập bạn tạo bị trùng !");
        }
    }

    function check_session(){
        session_start();
        if(!empty($_SESSION['user'])){

            require '../../model/connect_db.php';

            $_column = 'a_nickname';
            $_table = 'admin';
            $_a_id = $_SESSION['user'];
            $_where = "a_id='$_a_id'";

            $_obj_statement = $_object_db->prepare(SELECT($_column,$_table,$_where));
            $_obj_statement->execute();
            $_product = $_obj_statement->fetch();
            if(empty($_product))
                header ('Location:../../index.php');
        } else 
            header ('Location:../../index.php');
    }

 ?>