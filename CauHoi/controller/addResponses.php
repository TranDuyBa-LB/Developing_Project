<?php
    //--------------------------------------------------------------//
    //---------------Thêm hoặc sửa câu trả lời---------------------//
    //------------------------------------------------------------//
    
    if(!empty($_POST['id']) && !empty($_POST['contentResponses'])){
        $id = $_POST['id'];
        $content = $_POST['contentResponses'];

        //---------Xác định xem có câu trả lời không, nếu là "1" => không có------//
        if($content=="1")
            $content = 'false';

        require '../model/database.php';
        $objDB = new database();

        $table = 'listquestions';
        $set = "responses='$content'";
        $where = "id=$id";

        $query = $objDB->UPDATE($table,$set,$where);
        $objDB->executeQuery($query);
        header('Location:../views/admin.php');
    } else
        header('Location:../views/admin.php');
?>