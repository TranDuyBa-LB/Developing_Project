<?php 
    if(!empty($_GET['error'])) {
        $error = $_GET['error'];
        exit();
    }
    else
        $error = "Không có lỗi nào";
    echo $error;
?>