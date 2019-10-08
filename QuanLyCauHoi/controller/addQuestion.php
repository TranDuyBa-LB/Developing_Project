<?php 
    //--------------------------------------------------------------------------------//
    //-----------------------Thêm câu hỏi được gửi tới vào database------------------//
    //------------------------------------------------------------------------------//
    require '../model/database.php';
    
    $objDB = new database();

    $table = 'admin';
    $column = 'a_responses';
    $where = 'id=1';

    $query = $objDB->SELECT($column,$table,$where);
    $data = $objDB->executeQuery($query);
    $arrayData = $data->fetch();

    //--------------Kiểm tra xem câu hỏi gửi tới có bị chặn không-------------//
    if($arrayData['a_responses']=='false'){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $memberName = htmlentities($_POST['name']);
        $team = $_POST['team'];
        $question = htmlentities($_POST['content']);
        $time = date('h:i:sa');

        //--------Kiểm tra xem người gửi câu hỏi đã tồn tại trong database chưa------//
        $objDB = new database();
        $table = 'listquestions';
        $column = 'idMember';
        $where = "memberName='$memberName' and team=$team";
        $query = $objDB->SELECT($column,$table,$where);
        $data = $objDB->executeQuery($query);
        $arrayData = $data->fetch();
        //----------Nếu đã tồn tại thì lấy idMember cũ----------//
        //----------Nếu chưa thì tạo idMember mới bằng nối team+mã ascii chữ đầu tiên trong tên------//
        if(!empty($arrayData))
            $idMember = $arrayData['idMember'];
        else {
            $column = 'COUNT(team)';
            $where = "team=$team";
            $query = $objDB->SELECT($column,$table,$where);
            $data = $objDB->executeQuery($query);
            $arrayData = $data->fetch();
            $idMember = $team.ord($memberName).$arrayData['COUNT(team)'];
        }

        //---------Thêm câu hỏi vào database------------------//
        $objDB = new database();
        $table = 'listquestions';
        $column = 'idMember, team, memberName, question, time, responses';
        $value = "'$idMember', $team,'$memberName','$question','$time','false'";

        $query = $objDB->INSERT($column,$table,$value);
        $data = $objDB->executeQuery($query);
        if(empty($data))
            header('Location:../index.php?error=Không thể gửi câu hỏi !');
        else {
            header("Location:../index.php?error=Gửi câu hỏi thành công ! <br/> ID của bạn là: $idMember ");
        }
    } else
        header('Location:../index.php?error=Tạm dừng nhận câu hỏi !');
    
?>