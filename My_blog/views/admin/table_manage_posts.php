<?php

    require '../../model/database.php';

    $_db = new database();

    $_column = '*';
    $_table = 'posts';
    $_where = 1;

    $_query=$_db->SELECT($_column, $_table, $_where);
    $_obj_statement = $_db->execute_query($_query);
    if($_obj_statement!=false)
        $_product=$_obj_statement->fetch();
    else {
        echo "<script>console.log('$_error');</script>";
        exit();
    }

 ?>
<div id="manage_posts">
    <div id="option">
        <input type="text" placeholder="Tìm kiếm bài viết..." />
    </div>
    <table id="table_posts">
        <thead>
            <tr class="tr_1">
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Chủ đề</th>
                <th>Số views</th>
                <th>Số share</th>
                <th>Số comment</th>
                <th>Người viết</th>
                <th>Thời gian đăng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $_stt=0;
                while(!empty($_product)):
                    ++$_stt;
             ?>
                <tr>
                    <td> <?php echo $_stt; ?> </td>
                    <td> <?php echo $_product['p_title']; ?> </td>
                    <td> <?php echo $_product['p_list'] ?> </td>
                    <td> <?php echo $_product['p_views'] ?> </td>
                    <td> <?php echo $_product['p_share'] ?> </td>
                    <td>0</td>
                    <td> <?php echo $_product['p_writer'] ?> </td>
                    <td> <?php echo $_product['p_date'] ?> </td>
                    <td>
                        <a href="../controller/admin/request_admin.php?id_posts=<?php echo $_product['p_id'] ?>&action=delete_posts">Sửa</a>
                    </td>
                    <td>
                        <a href="../../controller/admin/request_admin.php?id_posts=<?php echo $_product['p_id'] ?>&action=delete_posts">Xóa</a>
                    </td>
                </tr>
            <?php 
                $_product = $_obj_statement->fetch();
                endwhile; 
            ?>
        </tbody>
    </table>
    <input type="hidden" name="request" value="manage_posts" />
</div>