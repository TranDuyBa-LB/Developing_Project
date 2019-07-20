<?php
    //Lấy danh sách thể loại
    function select_list() {
        GLOBAL $_db;
        $_column = 'l_name';
        $_table = 'list';
        $_where = 1;

        $_query = $_db->SELECT($_column, $_table, $_where);
        $_query = $_query.'ORDER BY l_id DESC';

        $_obj_statement = $_db->execute_query($_query);
        return $_obj_statement;     
    }
 ?>