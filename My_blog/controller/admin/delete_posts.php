<?php
    require '../../model/connect_db.php';
    require '../../model/query_db.php';
    require '../check/check.php';

    check_session();

    $_id = $_GET['id_posts'];
    $_table = 'posts';
    $_where = "p_id='$_id'";

    $_obj_statement = $_object_db->prepare(DELETE($_table,$_where));
    if($_obj_statement->execute()==true){
        header ('Location:../../views/admin/admin.php?error=Xóa bài viết thành công !');
    } else {
        header ('Location:../../views/admin/admin.php?error=Xóa bài viết không thành công !');
    }

 ?>