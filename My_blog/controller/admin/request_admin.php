<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require '../../model/database.php';

    $_db = new database();

    //Tạo mới một bài viết
    
    function create_posts($_posts){
        GLOBAL $_db;

        $_date = date('h:i-d/m/y');
        $_writer = htmlentities($_posts['writer']);
        $_title = htmlentities($_posts['title']);
        $_demo = htmlentities($_posts['demo']);
        $_list = htmlentities($_posts['list']);
        $_content = $_posts['content'];

        $_column = 'p_title,p_demo,p_writer,p_content,p_list,p_date';
        $_table = 'posts';
        $_values = "'$_title','$_demo','$_writer','$_content','$_list','$_date'";

        $_query = $_db->INSERT($_column,$_table,$_values);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement != false)
            header ('Location:../../views/admin/admin.php?error=Tạo bài viết thành công !');
        else {
            $_error = $_db->_error;
            header ("Location:../../views/admin/admin.php?error=$_error");
        }

    }

    //Tạo mới một tài khoản Admin

    function create_admin($_post){
        GLOBAL $_db;

        require '../../controller/check/function_check.php';

        $_user_name = $_post['user_name'];
        $_nickname = $_post['nickname'];
        $_password = md5($_post['password']);
        $_date = date('h:i-d/m/y');
        $_id_user = md5($_user_name);

        if(check_create_admin($_user_name,$_nickname)){
            $_column = 'a_id,a_nickname,a_name,a_password,a_date';
            $_table = 'admin';
            $_values = "'$_id_user','$_nickname','$_user_name','$_password','$_date'";
            $_query=$_db->INSERT($_column,$_table,$_values);
            $_obj_statement = $_db->execute_query($_query);
            if($_obj_statement!=false)
                header ('Location:../../views/admin/admin.php?error=Tạo tài khoản Admin thành công !');
            else{
                echo "<script>console.log('$_error');</script>";
                header ('Location:../../views/admin/admin.php?error=Tạo tài khoản Admin không công !');
            }
        }
    }
    
    //Đổi mật khẩu

    function change_password($_post){
        $_post['']
    }
    //Xóa một bài viết
    function delete_posts($_id_posts) {
        GLOBAL $_db;

        $_id = $_id_posts;
        $_table = 'posts';
        $_where = "p_id='$_id'";

        $_query= $_db->DELETE($_table,$_where);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement!=false){
            header ('Location:../../views/admin/admin.php?error=Xóa bài viết thành công !');
        } else {
            header ('Location:../../views/admin/admin.php?error=Xóa bài viết không thành công !');
        }
    }

    //Đăng xuất khỏi admin
    function logout() {
        session_start();
        $_SESSION['user']=NULL;
        header ('Location:../../index.php');
    }


    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['request']=='create_admin')
            create_admin($_POST);
        else if ($_POST['request']=='create_posts')
            create_posts($_POST);
    } else if($_SERVER['REQUEST_METHOD']=='GET'){
        if($_GET['action']=='delete_posts')
            delete_posts($_GET['id_posts']);
        else if($_GET['action']=='logout')
            logout();
    }

 ?>