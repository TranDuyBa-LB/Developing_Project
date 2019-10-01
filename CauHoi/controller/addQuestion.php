<?php 
    require '../model/database.php';
    
    $objDB = new database();

    $table = 'admin';
    $column = 'a_responses';
    $where = 'id=1';

    $query = $objDB->SELECT($column,$table,$where);
    $data = $objDB->executeQuery($query);
    $arrayData = $data->fetch();

    if($arrayData['a_responses']=='false'){
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
        if(empty($data))
            header('Location:../index.php?error=Không thể gửi câu hỏi !');
        else {
            header('Location:../index.php?error=Gửi câu hỏi thành công !');
        }
    } else
        header('Location:../index.php?error=Tạm dừng nhận câu hỏi !');
    
?>