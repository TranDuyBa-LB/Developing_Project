<?php

    require 'model/connect_db.php';
    require 'model/query_db.php';

    $_column = '*';
    $_table = 'posts';
    $_where = 1;

    $_query = $_object_db->query(SELECT($_column,$_table,$_where));

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>BL Blog</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="views/css/header.css" />
        <link rel="stylesheet" type="text/css" href="views/css/content_index.css" />
        <link rel="stylesheet" type="text/css" href="views/css/footer.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="#" title="BL Blog">
                    <img src="views/images/img_designs/My_Logo.png" />
                    <h1>BL-Bá Linh</h1>
                </a>
            </div>
            <div id="slogan">
                <p>Phương châm sống !</p>
            </div>
            <div id="info">
                <a href="">
                    <img src="views/images/img_designs/facebook.png" title="facebook" />
                </a>
                <a href="">
                    <img src="views/images/img_designs/github.png" title="GitHub" />
                </a>
                <a href="">
                    <img src="views/images/img_designs/gmail.png" title="Gmail" /> 
                </a>
            </div>
        </div>
        <div id="content">
            <?php foreach($_query as $_posts): ?>
            <div class="list_posts">
                <h2>
                    <!--title-->
                    <a href="views/posts.php?id_posts=<?php echo $_posts['p_id']; ?>" >
                        <?php echo $_posts['p_title']; ?>
                    </a>
                </h2>
                <p> 
                    <!--demo content-->
                    <?php echo $_posts['p_demo']; ?>
                </p>
                <script>
                    function Location(){
                        window.location = "views/posts.php?id_posts=<?php echo $_posts['p_id'] ?>";
                    }
                </script>
                <input type="button" value="Xem bài viết..." onclick="Location()" />
                <div>
                    <img src="views/images/img_designs/writer.png" title="Người viết" /> 
                        <p> <?php echo $_posts['p_writer']; ?> </p>
                    <img src="views/images/img_designs/views.png" title="Số lượt xem" /> 
                        <p> 
                            <?php 
                                if($_posts['p_views']==NULL)
                                    $_posts['p_views']=0;
                                echo $_posts['p_views'];
                             ?>
                        </p>
                    <!--<img src="views/images/img_designs/comment.png" title="Số bình luận" /> <p>30</p>-->
                    <img src="views/images/img_designs/share.png" title="Chia sẻ" /> 
                        <p>
                            <?php 
                                if($_posts['p_share']==NULL)
                                    $_posts['p_share']=0;
                                echo $_posts['p_share'];
                             ?> 
                        </p>
                    <img src="views/images/img_designs/list.png" title="Danh mục" /> 
                        <p>
                            <?php echo $_posts['p_list']; ?>
                        </p>
                    <img src="views/images/img_designs/date_up.png" title="Thời gian đăng" /> 
                        <p>
                            <?php
                                $_array = explode('-',$_posts['p_date']);
                                echo $_array[1];
                             ?>
                        </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div id="footer">
            <div>
                 <a href="">
                    <img src="views/images/img_designs/facebook_footer.png" title="facebook" />
                </a>
                <a href="">
                    <img src="views/images/img_designs/github_footer.png" title="GitHub" />
                </a>
                <a href="">
                    <img src="views/images/img_designs/gmail_footer.png" title="Gmail" /> 
                </a>
            </div>
            <p>Admin: Trần Duy Bá</p>
            <p>Design and Code: Trần Duy Bá-LB</p>
        </div>
    </body>
</html>