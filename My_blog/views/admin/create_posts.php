<?php
    if(!empty($_GET['editPosts'])==true && $_GET['editPosts']=='true'){
        $_db = new database();
        if(!empty($_GET['id_posts'])){
            $_p_id = $_GET['id_posts'];
            $_column = 'p_title,p_demo,p_writer,p_content,p_list';
            $_table = 'posts';
            $_where = "p_id='$_p_id'";

            $_query = $_db->SELECT($_column,$_table,$_where);
            $_obj_statement = $_db->execute_query($_query);
            $_product = $_obj_statement->fetch();
            if(empty($_product))
                header('Location:admin.php?request=tableManage_posts&error=Không có dữ liệu về bài viết !');
            else {
                $_product['a_nickname'] = $_product['p_writer'];
                $_list = $_product['p_list'];
                $_title = $_product['p_title'];
                $_demo = $_product['p_demo'];
                $_content = $_product['p_content'];
                $_request = 'change_Posts';
                $_submit = 'Sửa bài';
                $_input_IdPosts = "<input type='hidden' name='id_posts' value='$_p_id' />";
            }
        }
    } else {
        $_list = '';
        $_title = '';
        $_demo = '';
        $_content = '';
        $_request = 'create_posts';
        $_submit = 'Tạo bài viết';
    }
 ?>
<form action="../../controller/admin/request_admin.php" method="POST">
    <div id="create_posts">
        <input type="text" value="<?php echo $_product['a_nickname']; ?> (người viết)" readonly="false" placeholder="Người viết..." required />
        <select name='list' >
            <?php
                if(empty($_list)){
                    require '../../controller/admin/function_admin.php';
                    $_obj_statement_list = select_list();
                    $_list = $_obj_statement_list->fetch();
                    while(!empty($_list)){
                        $_l_name = $_list['l_name'];
                        echo "<ontion>$_l_name</option>";
                        $_list=$_obj_statement_list->fetch();
                    }
                } else 
                    echo "<option>$_list</option>";
             ?>
        </select>
        <input id="input_list" placeholder="Tạo thể loại mới..." onkeyup="add_list()" />
        <a id="add_list" href="javascript:void(0)" >Tạo</a>
        <script>
            function add_list(){
                document.getElementById('add_list').href="../../controller/admin/request_admin.php?request=add_list&new_list="+document.getElementById('input_list').value;
            }
        </script>
        <textarea  name="title" placeholder="Tiêu đề bài viết..."  required ><?php echo $_title; ?></textarea>
        <textarea  name="demo" placeholder="Demo ngắn gọn bài viết..."  required ><?php echo $_demo; ?></textarea>
        <textarea id="content_posts" name="content"><?php echo $_content; ?></textarea>   
        <input type="hidden" name="writer" value="<?php echo $_product['a_nickname']; ?>" />
        <input type="hidden" name="request" value="<?php echo $_request; ?>" />
        <?php
            if(!empty($_input_IdPosts))
                echo $_input_IdPosts;
         ?>
        <script type="text/javascript">
            var config = {};
            config.entities_latin = false;
            config.language = 'vi';
            config.extraPlugins = 'autogrow';
            config.autoGrow_minHeight = 200;
            config.autoGrow_maxHeight = 500;
            CKEDITOR.replace('content_posts', config);
        </script>
        <input id="submit" type="submit" value="<?php echo $_submit; ?>" />          
    </div>
</form>