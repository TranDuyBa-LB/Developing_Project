<?php
    if(!empty($_GET['id_login'])){
        if($_GET['id_login']=="fe8b4dc9c9b47e55a04cca4563841f79"){
            if(!empty($_GET['error'])){
                $_error = $_GET['error'];
                echo "<script>alert('$_error');</script>";
            }
        } else 
            exit();
    } else 
        exit();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div id="form_login">
           <form action="../controller/admin/check_login.php" method="POST">
                <img src="images/img_designs/My_Logo_login.png" />
                <p>Đăng nhập</p>
                <input type="text" name="user_name" placeholder="Tên đăng nhập..." required />
                <input type="password" name="user_password" placeholder="Mật khẩu..." required />
                <input class="submit" type="submit" value="Đăng nhập" />
            </form>
        </div>
    </body>
</html>