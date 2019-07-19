<?php
        require '../../../model/database.php';
        $_db=new database();

        //Sắp xếp theo bảng chọn option
        $_ORDER_BY = 'ORDER BY p_id DESC';
        if(empty($_GET['request_select']))
            $_request_select = 'latest';
        else 
            $_request_select = $_GET['request_select'];

        if($_request_select=='latest')
            $_ORDER_BY = 'ORDER BY p_id DESC';
        else if($_request_select=='old')
            $_ORDER_BY = 'ORDER BY p_id ASC';
        else if($_request_select=='views')
            $_ORDER_BY = 'ORDER BY p_views DESC';
        else if($_request_select=='share')
            $_ORDER_BY = 'ORDER BY p_share DESC';
        
        //Search bài viết
        if(!empty($_GET['search']))
            $_search = $_GET['search'];
        else 
            $_search = null;
        if($_search!=null)
            $_where="p_title LIKE '%$_search%'";
        else 
            $_where = 1;
        $_table = 'posts';
        $_column = '*';
        
        $_query=$_db->SELECT($_column, $_table, $_where);
        $_query = $_query.$_ORDER_BY;
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement!=false)
            $_product=$_obj_statement->fetch();
        else {
            exit();
        }
 ?>
<thead>
    <tr class="tr_1">
        <th>STT</th>
        <th>Tiêu đề</th>
        <th>Chủ đề</th>
        <th>Số views</th>
        <!--<th>Số share</th>-->
        <!--<th>Số comment</th>-->
        <th>Người viết</th>
        <th>Thời gian đăng</th>
        <th>Thời gian sửa</th>
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
            <td> <?php echo $_product['p_writer'] ?> </td>
            <td> <?php echo $_product['p_date'] ?> </td>
            <td> <?php echo $_product['p_date_changePosts'] ?> </td>
            <td>
                <a href="admin.php?editPosts=true&id_posts=<?php echo $_product['p_id']; ?>">Sửa</a>
            </td>
            <td>
                <a href="../../controller/admin/request_admin.php&id_posts=<?php echo $_product['p_id']; ?>&action=delete_posts">Xóa</a>
            </td>
        </tr>
    <?php 
        $_product = $_obj_statement->fetch();
        endwhile; 
    ?>
</tbody>