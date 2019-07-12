<form action="../../controller/admin/request_admin.php" method="POST">
    <div id="create_posts">
        <input type="text" value="<?php echo $_product['a_nickname']; ?> (người viết)" placeholder="Người viết..." required />
        <input type="text" name="list" placeholder="Chuyên mục..." required />
        <textarea id="title_posts" name="title" placeholder="Tiêu đề bài viết..." required ></textarea>
        <textarea id="title_posts" name="demo" placeholder="Demo ngắn gọn bài viết..." required ></textarea>
        <textarea id="content_posts" name="content"> </textarea>   
        <input type="hidden" name="writer" value="<?php echo $_product['a_nickname']; ?>" />
        <input type="hidden" name="request" value="create_posts" />
        <script type="text/javascript">
            var config = {};
            config.entities_latin = false;
            config.language = 'vi';
            config.extraPlugins = 'autogrow';
            config.autoGrow_minHeight = 200;
            config.autoGrow_maxHeight = 500;
            CKEDITOR.replace('content_posts', config);
        </script>
        <input id="submit" type="submit" value="Tạo bài viết" />          
    </div>
</form>