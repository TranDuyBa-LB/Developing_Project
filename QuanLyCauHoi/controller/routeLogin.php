<?php
    //--------------------------------------------------------------------------------------------------------------------//
    //------------------------Kiểm tra thông tin đăng nhập và tạo SESSION login nếu thông tin chính xác------------------//
    //-------------------------------------------------------------------------------------------------------------------//
    
    if(!empty($_POST['userName']) && !empty($_POST['password'])){
        $userName = htmlentities($_POST['userName']);
        $password = htmlentities($_POST['password']);
    } else
        header('Location:../views/login.php');
    if($userName=="admin" && $password=="admin123456789") {
        header('Location:../views/admin.php');
        session_start();
        $_SESSION['login']=true;
    }
    else
        header('Location:../views/login.php?error=Sai tài khoản hoặc mật khẩu. <br/> Nhấn vào "Gợi ý" để biết !');
?>