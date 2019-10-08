<?php 
    //------------------------------------------------------------------------------------------------------//
    //--------------------------------Định hướng yêu cầu từ trang admin------------------------------------//
    //----------------------------------------------------------------------------------------------------//
    
    require '../model/database.php';
    $objDB = new database();

    //--------------------------------------------------------------------------------------------------------------------
    //--------------------Hàm xóa câu hỏi theo ID hoặc xóa toàn bộ--------------------------------------------------------
    //------------ (gọi hàm với tham số đầu bất kỳ, tham số thứ hai = true => xóa toàn bộ bảng )--------------------------
    //--------------------------------------------------------------------------------------------------------------------
    function deleteQuestion($id, $all=false){
        global $objDB;

        $table = 'listquestions';
        if($all==false){
            $where = "id=$id";
            $query = $objDB->DELETE($table,$where);
        } else if($all==true) {
            $query = $objDB->DELETE($table,'id <> 2.5');
        }
        $objDB->executeQuery($query);
        header('Location:../views/admin.php?delete=true');
    }

    //------------------------->Xác nhận lại mục "xác nhận trả lời"<------------------------------------//
    function changeConfirm($id, $confirm){
        global $objDB;

        $table = 'listquestions';
        $where = "id=$id";

        if($confirm=='0' || $confirm=="")
            $set="confirm='1'";
        else
            $set="confirm='0'";
        $query = $objDB->UPDATE($table,$set,$where);
        $objDB->executeQuery($query);
        $sort = $_GET['sort'];
        header("Location:../views/admin.php");
    }

    //------------------------------------------------------------------------------------
    //-----------------------Định hướng Request-------------------------------------------
    //------------------------------------------------------------------------------------

    $id = $_GET['id'];
    $requestName = $_GET['requestName'];

    switch($requestName){
        case 'delete':
            if(!empty($_GET['all']) && $_GET['all']=='true')
                deleteQuestion($id,true);
            else
                deleteQuestion($id);
        break;
        
        case 'confirm':
            changeConfirm($id,$_GET['confirm']);
        break;
    }

?>