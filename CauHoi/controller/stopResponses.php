<?php 
    //---------------------------Bật tính năng chặn câu hỏi gửi tới-----------------------//
    if(!empty($_GET['stop'])){
        require '../model/database.php';
        $_GET['stop'];
        if($_GET['stop']=='false')
            $stop = 'true';
        else
            $stop = 'false';
        $objDB = new database();

        $table = 'admin';
        $set = "a_responses='$stop'";
        $where = 'id=1';
        $query = $objDB->UPDATE($table,$set,$where);
        $objDB->executeQuery($query);   
        if(!empty($_GET['logout']) && $_GET['logout']=='true')
            header('Location:../views/login.php');
        header('Location:../views/admin.php'); 
    } else 
        header('Location:../views/admin.php');
?>