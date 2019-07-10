<?php
    if(empty($_COOKIE[$_id])){
            $_expire = time() + 1*(60*60*24); // Đặt cookie die trong 1 ngày
            setcookie($_id,'view',$_expire);
            
            $_column = 'p_views';
            $_table = 'posts';
            $_where = "p_id='$_id'";

            $_query = $_db->SELECT($_column, $_table, $_where);
            $_obj_statement_cookie = $_db->execute_query($_query);

            if($_obj_statement_cookie != false)
                $_product_cookie = $_obj_statement_cookie->fetch();
            else {
                $_error = $_db->_error;
                echo "<script>console.log('$_error');</script>";
            }
            $_views = $_product_cookie['p_views'];
            if($_views==NULL)
                $_views = 1;
            else 
                $_views = (int)$_views + 1;

            $_set = "p_views='$_views'";
            $_query = $_db->UPDATE($_table,$_set,$_where);
            $_obj_statement_cookie  = $_db->execute_query($_query);
            if($_obj_statement_cookie==false){
                $_error = $_db->_error;
                echo "<script>console.log('$_error');</script>";
            }

        }
 ?>