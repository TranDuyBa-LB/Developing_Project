<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    function create_posts($_posts){
        require '../model/query_db.php';
        $_date = new date('h:i-d/m/y');
        $_writer = $_posts['writer'];
        $_title = $_posts['title'];
        $_list = $_posts['list'];
        $_content = $_posts['content'];
        $_query = $_object_db->query();
    }

    function create_admin($_post){
        require '../controller/check/check.php';
        $_user_name = $_post['user_name'];
        $_nickname = $_post['nickname'];
        $_password = md5($_post['password']);
        $_date = date('h:i-d/m/y');
        $_id_user = md5($_user_name);
        if(check_create_admin($_user_name,$_nickname)){
            $_column = 'a_id,a_nickname,a_user_name,a_user_password,a_date';
            $_table = 'admin';
            $_values = "'$_id_user','$_nickname','$_user_name','$_password','$_date'";
            try {
                require '../model/connect_db.php';
                $_object_db->query(INSERT($_column,$_table,$_values));
                header ('Location:../views/admin.php?error=Tạo tài khoản Admin thành công !');
            } catch(Exception $_error){
                header ("Location:../views/admin.php?error=$_error");
            }
        }
    }
    
    if($_POST['request']=='create_admin')
        create_admin($_POST);
 ?>