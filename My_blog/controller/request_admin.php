<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    //Tạo mới một bài viết

    function create_posts($_posts){

        require '../model/query_db.php';

        $_date = date('h:i-d/m/y');
        $_writer = htmlentities($_posts['writer']);
        $_title = htmlentities($_posts['title']);
        $_demo = htmlentities($_posts['demo']);
        $_list = htmlentities($_posts['list']);
        $_content = $_posts['content'];
        $_id = md5($_date);

        $_column = 'p_id,p_title,p_demo,p_writer,p_content,p_list,p_date';
        $_table = 'posts';
        $_values = "'$_id','$_title','$_demo','$_writer','$_content','$_list','$_date'";
        try {
            require '../model/connect_db.php';
            $_object_db->query(INSERT($_column,$_table,$_values));
            header ('Location:../views/admin.php?error=Tạo bài viết thành công !');
        } catch (PDOException $_error ){
            $_error = $_error->getMessage();
            header ("Location:../views/admin.php?error=$_error");
        }

    }

    //Tạo mới một tài khoản Admin

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
            } catch(PDOException $_error){
                $_error = $_error->getMessage();
                header ("Location:../views/admin.php?error=$_error");
            }
        }
    }
    
    if($_POST['request']=='create_admin')
        create_admin($_POST);
    else if ($_POST['request']=='create_posts')
        create_posts($_POST);
 ?>