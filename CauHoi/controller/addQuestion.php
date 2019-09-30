<?php 
    require '../model/database.php';
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $memberName = htmlentities($_POST['name']);
    $team = $_POST['team'];
    $question = htmlentities($_POST['content']);
    $time = date('h:i:sa');

    $objDB = new database();

    $table = 'listquestions';
    $column = 'team, memberName, question, time, responses';
    $value = "$team,'$memberName','$question','$time','false'";

    $query = $objDB->INSERT($column,$table,$value);
    $data = $objDB->executeQuery($query);
    if($data==false)
        header('Location:../index.php?error=Không thể gửi câu hỏi !');
    else {
        header('Location:../index.php?error=Gửi câu hỏi thành công !');
    }
    
?>