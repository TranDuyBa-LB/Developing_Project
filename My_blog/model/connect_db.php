<?php
    
    //Kết nối với database

    try {
        $_db_name = 'myblog';
        $_host = 'localhost';
        $_user_name = 'myblog';
        $_user_pass = 'Ba123456789';
        $_object_db = new PDO("mysql:host=$_host;dbname=$_db_name",$_user_name,$_user_pass);
    } catch (PDOException $_error) {
        $_error = $_error->getMessage();
        echo ("<script>console.log('$_error')</script>");
    }
    
 ?>