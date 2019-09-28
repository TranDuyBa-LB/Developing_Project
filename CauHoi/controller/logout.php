<?php
    session_start();
    if(!empty($_SESSION['login'])){
        $_SESSION['login']=false;
        header('Location:../views/login.php');
    } else  
        header('Location:../views/login.php');
?>