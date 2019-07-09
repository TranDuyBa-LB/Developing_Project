<?php

    //Các câu lệnh truy vấn cơ bản
 
        function SELECT($_column,$_table,$_where){
            $_select = " SELECT $_column
                         FROM $_table
                         WHERE $_where ";
            return $_select;
        }
    
        function INSERT($_column,$_table,$_values) {
            $_insert = " INSERT INTO $_table($_column)
                        VALUES ($_values) ";
            return $_insert;
        }
        function DELETE($_table,$_where){
            $_delete = " DELETE FROM $_table WHERE $_where";
            return $_delete;
        }
        function UPDATE($_table,$_set,$_where) {
            $_update = " UPDATE $_table
                         SET $_set
                         WHERE $_where ";
            return $_update;
        }

 ?>