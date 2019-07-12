<?php
        require '../../../model/database.php';
        $_db=new database();

        $_table = 'posts';
        $_where = 1;

        //Sắp xếp theo bảng chọn option
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
        if($_search!=null){
            $_column = 'p_id,p_title';
            $_query = $_db->SELECT($_column, $_table, $_where);
            $_query = $_query.'ORDER BY p_id DESC';
            $_obj_statement = $_db->execute_query($_query);
            if($_obj_statement != false)
                $_product = $_obj_statement->fetch();
            else {
                $_error = $_db->_error;
                require 'admin.php';
            }
            $_array_where = [];
            while(!empty($_product)){
                $_title = "_".$_product['p_title'];
                if(stripos($_title,$_search)!=false){
                    $_p_id = $_product['p_id'];
                    $_array_where[]="p_id=$_p_id";
                } else 
                    $_array_where[]="p_id=' '";
                $_product=$_obj_statement->fetch();
            }
        }
        
        $_column = '*';
        if(!empty($_array_where))
            $_where = implode(" or ",$_array_where);
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
                <a href="javascript:void(0)">Sửa</a>
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