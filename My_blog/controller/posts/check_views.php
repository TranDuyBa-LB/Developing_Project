<?php

if(empty($_COOKIE['view'])){

        $_expire = time() + 604800000;
        SetCookie('view','true',$_expire);
        $_id=$_GET['id_posts'];
        
        $_column = 'p_views';
        $_table = 'posts';
        $_where = "p_id='$_id'";

        $_obj_Statement = $_object_db->prepare(SELECT($_column,$_table,$_where));
        $_obj_Statement->execute();
        $_product = $_obj_Statement->fetch();
        $_views = $_product['p_views'];
        
        echo "<script>alert('$_views');</script>";
        if(empty($_views))
            $_views = 1;
        else 
            $_views = (int) $_views + 1;

        $_set = "p_views='$_views'";
        $_obj_Statement = $_object_db->prepare(UPDATE($_table,$_set,$_where));

    }

 ?>