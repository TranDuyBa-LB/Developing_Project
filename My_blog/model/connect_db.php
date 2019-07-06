<?php
    
    //Kết nối với database

    try {
        $_db_name = 'myblog';
        $_host = 'localhost';
        $_name_admin = 'myblog';
        $_pass_admin = 'Ba123456789';
        $_object_db = new PDO("mysql:host=$_host;dbname=$_db_name",$_name_admin,$_pass_admin);
    } catch (PDOException $_error) {
        $_error = $_error->getMessage();
        echo ("<script>console.log('$_error')</script>");
    }
    
 ?>