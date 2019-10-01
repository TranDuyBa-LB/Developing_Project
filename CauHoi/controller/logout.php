<?php
    //-------------------------------------------------------------------//
    //------------------Logout bằng cách thay đổi SESSION---------------//
    //-----------------------------------------------------------------//
    
    session_start();
    if(!empty($_SESSION['login'])){
        $_SESSION['login']=false;
        header('Location:stopResponses.php?stop=true&logout=true');
    } else  
        header('Location:../views/login.php');
?>