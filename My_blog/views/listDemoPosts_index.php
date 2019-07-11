<?php
    if(!empty($_GET['search']))
        $_search = $_GET['search'];
    else 
        $_search = null;
    require '../model/database.php';
    $_db = new database();

    $_column = 'p_id,p_title';
    $_table = 'posts';
    $_where = 1;

    if($_search!=null){
        $_query = $_db->SELECT($_column, $_table, $_where);
        $_query = $_query.'ORDER BY p_id DESC';
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement != false)
            $_product = $_obj_statement->fetch();
        else {
            $_error = $_db->_error;
            echo "<script>console.log('$_error');</script>";
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
    //******************************************************************//
    $_column = '*';
    if(!empty($_array_where))
        $_where = implode(" or ",$_array_where);
    $_query = $_db->SELECT($_column, $_table, $_where);
    $_query = $_query.'ORDER BY p_id DESC';
    $_obj_statement = $_db->execute_query($_query);
    if($_obj_statement != false)
        $_product = $_obj_statement->fetch();
    else {
        $_error = $_db->_error;
    }

 ?>

<?php while(!empty($_product)): ?>
    <div class="list_posts">
        <h2>
            <!--title-->
            <a href="views/posts.php?id_posts=<?php echo $_product['p_id']; ?>" target="_blank" >
                <?php echo $_product['p_title']; ?>
            </a>
        </h2>
        <p> 
            <!--demo content-->
            <?php echo $_product['p_demo']; ?>
        </p>
        <script>
            function Location(){
                window.location = "views/posts.php?id_posts=<?php echo $_product['p_id'] ?>";
            }
        </script>
        <input type="button" value="Xem bài viết..." onclick="Location()" />
        <div>
            <img src="views/images/img_designs/writer.png" title="Người viết" /> 
                <p> <?php echo $_product['p_writer']; ?> </p>
            <img src="views/images/img_designs/views.png" title="Số lượt xem" /> 
                <p> 
                    <?php 
                        if($_product['p_views']==NULL)
                            $_product['p_views']=0;
                        echo $_product['p_views'];
                        ?>
                </p>
            <!--<img src="views/images/img_designs/comment.png" title="Số bình luận" /> <p>30</p>-->
            <img src="views/images/img_designs/share.png" title="Chia sẻ" /> 
                <p>
                    <?php 
                        if($_product['p_share']==NULL)
                            $_product['p_share']=0;
                        echo $_product['p_share'];
                        ?> 
                </p>
            <img src="views/images/img_designs/list.png" title="Danh mục" /> 
                <p>
                    <?php echo $_product['p_list']; ?>
                </p>
            <img src="views/images/img_designs/date_up.png" title="Thời gian đăng" /> 
                <p>
                    <?php
                        $_array = explode('-',$_product['p_date']);
                        echo $_array[1];
                        ?>
                </p>
        </div>
    </div>
<?php 
    $_product = $_obj_statement->fetch();
    endwhile;
 ?>