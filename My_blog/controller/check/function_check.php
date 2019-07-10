<?php
    
    function check_create_admin($_user_name,$_nickname){
        
        GLOBAL $_db;
        
        $_column = '*';
        $_table = 'admin';
        $_where_user_name = "a_name='$_user_name'";
        $_where_nickname = "a_nickname='$_nickname'";

        $_query = $_db->SELECT($_column, $_table, $_where_user_name);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement!=false){
            $_product = $_obj_statement->fetch();
            if(!empty($_product)){
                header ("Location:../../views/admin/admin.php?error=Tên đăng nhập bạn tạo bị trùng !");
            }
            else {
                $_query = $_db->SELECT($_column, $_table, $_where_nickname);
                $_obj_statement = $_db->execute_query($_query);
                if($_obj_statement!=false){
                    $_product = $_obj_statement->fetch();
                    if(!empty($_product)){
                        header ("Location:../../views/admin/admin.php?error=Nickname bạn tạo bị trùng !");
                    } else 
                        return true;
                } else
                    echo "<script>console.log('$_error');</script>";
            }
        } else 
            echo "<script>console.log('$_error');</script>";
    }

    function check_session(){
        session_start();
        if(!empty($_SESSION['user'])){
            GLOBAL $_db;
            $_column = 'a_nickname';
            $_table = 'admin';
            $_a_id = $_SESSION['user'];
            $_where = "a_id='$_a_id'";

            $_query = $_db->SELECT($_column, $_table, $_where);
            $_obj_statement = $_db->execute_query($_query);
            if($_obj_statement != false)
                $_product = $_obj_statement->fetch();
            else {
                $_error = $_db->_error;
                echo "<script>console.log('$_error');</script>";
            }
            if(empty($_product))
                header ('Location:../../index.php');
        } else 
            header ('Location:../../index.php');
    }

 ?>