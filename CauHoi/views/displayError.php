<?php 
    if(!empty($_GET['error']))
        $error = $_GET['error'];
    else
        $error = "Không có lỗi nào";
    echo $error;
?>