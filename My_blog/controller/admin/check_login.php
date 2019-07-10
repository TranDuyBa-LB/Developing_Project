<?php
    //Kiểm tra tài khản và mật khẩu
    function check_login($_post){

        require '../../model/database.php';

        $_db=new database();

        $_column = 'a_password';
        $_table = 'admin';
        $_a_name = $_POST['user_name'];
        $_where = "a_name='$_a_name'";

        $_query = $_db->SELECT($_column, $_table, $_where);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement != false)
            $_product = $_obj_statement->fetch();
        else {
            $_error = $_db->_error;
            echo "<script>console.log('$_error');</script>";
        }

        if(!empty($_product)){
            if(md5($_POST['user_password']) === $_product['a_password']) {
                session_start();
                $_SESSION['user']=md5($_POST['user_name']);
                echo "haha!";
                header ('Location:../../views/admin/admin.php');
            } else 
                header ('Location:../../views/login.php?id_login=fe8b4dc9c9b47e55a04cca4563841f79&error=Sai mật khẩu !');
        } else 
            header ('Location:../../views/login.php?id_login=fe8b4dc9c9b47e55a04cca4563841f79&error=Sai tài khoản !');
    }

    if($_SERVER['REQUEST_METHOD']=='POST')
        check_login($_POST);
    else 
        header ('Location:../../views/login.php?id_login=fe8b4dc9c9b47e55a04cca4563841f79&error= Có chuyện gì đó !');


 ?>