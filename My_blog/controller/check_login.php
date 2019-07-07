<?php
    //Kiểm tra tài khản và mật khẩu
    function check_login($_post){

        require '../model/connect_db.php';
        require '../model/query_db.php';

        $_column = 'a_password';
        $_table = 'admin';
        $_a_name = $_POST['user_name'];
        $_where = "a_name='$_a_name'";

        $_obj_statement = $_object_db->prepare(SELECT($_column,$_table,$_where));
        $_obj_statement->execute();
        $_product = $_obj_statement->fetch();

        if(!empty($_product)){
            if(md5($_POST['user_password'])=== $_product['a_password']) {
                session_start();
                $_SESSION['user']=md5($_POST['user_name']);
                echo "haha!";
                header ('Location:../views/admin.php');
            } else 
                header ('Location:../views/login.php?id_login=fe8b4dc9c9b47e55a04cca4563841f79&error=Sai mật khẩu !');
        } else 
            header ('Location:../views/login.php?id_login=fe8b4dc9c9b47e55a04cca4563841f79&error=Sai tài khoản !');
    }

    if($_SERVER['REQUEST_METHOD']=='POST')
        check_login($_POST);
    else 
        header ('Location:../views/login.php?id_login=fe8b4dc9c9b47e55a04cca4563841f79&error= Có chuyện gì đó !');


 ?>