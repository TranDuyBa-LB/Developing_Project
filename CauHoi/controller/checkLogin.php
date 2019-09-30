<?php
    session_start();
    if(!empty($_SESSION['login'])){
        if($_SESSION['login']!=true)
            header('Location:../views/login.php?error=Đăng nhập không thành công. <br/> Nhấn vào "Gợi ý" để biết gì đó !');
    }
    else    
        header('Location:../views/login.php?error=Đăng nhập không thành công. <br/> Nhấn vào "Gợi ý" để biết gì đó !');
?>