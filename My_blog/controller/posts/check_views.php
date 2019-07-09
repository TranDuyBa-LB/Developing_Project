<?php
    if(empty($_COOKIE[$_id])){
            $_expire = time() + 1*(60*60*24); // Đặt cookie die trong 1 ngày
            setcookie($_id,'view',$_expire);
            
            $_column = 'p_views';
            $_table = 'posts';
            $_where = "p_id='$_id'";

            $_obj_Statement_cookie = $_object_db->prepare(SELECT($_column,$_table,$_where));
            $_obj_Statement_cookie ->execute();
            $_product_cookie  = $_obj_Statement_cookie ->fetch();
            $_views = $_product['p_views'];
            
            if($_views==NULL)
                $_views = 1;
            else 
                $_views = (int)$_views + 1;

            $_set = "p_views='$_views'";
            $_obj_Statement_cookie  = $_object_db->prepare(UPDATE($_table,$_set,$_where));
            $_obj_Statement_cookie ->execute();       
        }
 ?>