<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    function create_posts($_posts){
        $_date = new date('h:i-d/m/y');
        require '../model/query_db.php';
        $_writer = $_posts['writer'];
        $_title = $_posts['title'];
        $_list = $_posts['list'];
        $_content = $_posts['content'];
        $_query = $_objec_db->query();
    }

 ?>