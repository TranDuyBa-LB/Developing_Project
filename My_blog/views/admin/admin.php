<?php
    require '../../controller/check/function_check.php';
    require '../../model/database.php';

    $_db = new database();

    check_session();

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
        echo "<script>console.log('Error=$_error');</script>";
    }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quản trị viên</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../css/admin.css" />
        <link rel="stylesheet" type="text/css" href="../css/table_manage_posts.css" />
        <link rel="stylesheet" type="text/css" href="../css/change_password.css" />
        <link rel="stylesheet" type="text/css" href="../css/create_admin.css" />
        <link rel="stylesheet" type="text/css" href="../css/create_posts.css" />
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            
        </div>
        <div id="body_control">
            <div id="option_control">
                <ul>
                    <li class="admin">
                        <img src="../images/img_designs/admin.png" /> 
                            <p>
                                <?php echo $_product['a_nickname']; ?>
                            </p>
                        <a href="../../controller/admin/request_admin.php?action=logout">Đăng xuất</a>
                    </li>
                    <li>
                       <img src="../images/img_designs/home.png" /> 
                       <a href="../../index.php" target="_blank">Trang chủ</a>
                    </li>
                    <li>
                        <img src="../images/img_designs/add_new_posts.png" /> 
                        <a href="admin.php"  id="create_posts" >Tạo bài viết</a>
                    </li>
                    <li>
                        <img src="../images/img_designs/manage_posts.png" /> 
                        <a href="admin.php?request=tableManage_posts" id="manage_posts" >Quản lý bài viết</a>
                    </li>
                    <li>
                        <img src="../images/img_designs/create_account.png" /> 
                        <a href="javascript:void(0);"  id="create_admin" >Tạo tài khoản</a>
                    </li>
                    <li>
                        <img src="../images/img_designs/change_password.png" /> 
                        <a href="javascript:void(0);"  id="change_password" >Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
            <div id="view_control">
                <?php
                    if(!empty($_GET['request'])){
                        if($_GET['request']=='tableManage_posts')
                            require('tableManage_posts/Manage_posts.php');
                        else 
                            require('create_posts.php');
                    }
                    else 
                        require('create_posts.php');
                ?>
            </div>
        </div>
        <script type="text/javascript" src="../../controller/ajax/control_admin.js"></script>
        <?php
            if(!empty($_GET['error']))
                echo "<script>alert('".$_GET['error']."')</script>";
        ?>
    </body>
</html>