<?php
use League\Flysystem\Exception;

require 'model/connect_db.php';
    require 'model/query_db.php';

    $_column = '*';
    $_table = 'posts';
    $_where = 1;

    try {
        $_obj_statement= $_object_db->prepare(SELECT($_column,$_table,$_where));
        $_obj_statement->execute();
        $_product = $_obj_statement->fetch();
    } catch (Exception $_error){
        echo "<script>console.log($_error);</script>";
        exit();
    }

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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="#" title="BL Blog">
                    <img src="views/images/img_designs/My_Logo.png" />
                    <h1>TranDuyBa-LB</h1>
                </a>
            </div>
            <div id="slogan">
                <p>Đừng chỉ mãi đi ghi nhớ lịch sử của người khác mà hãy tự mình tạo lên lịch sử.</p>
            </div>
            <div id="info">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/TranDuyBa.LB">
                            <img src="views/images/img_designs/facebook.png" title="facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/TranDuyBa-LB">
                            <img src="views/images/img_designs/github.png" title="GitHub" />
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="views/images/img_designs/gmail.png" title="Gmail" /> 
                        </a>
                        <div id="gmail">
                            <p>tranduyba2599@gmail.com</p>
                        </div>
                    </li>
                </ul>   
            </div>
        </div>
        <div id="content">
            <?php
                while(!empty($_product)):
            ?>
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
        </div>
        <div id="footer">
            <div>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/TranDuyBa.LB">
                            <img src="views/images/img_designs/facebook.png" title="facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/TranDuyBa-LB">
                            <img src="views/images/img_designs/github.png" title="GitHub" />
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="views/images/img_designs/gmail.png" title="Gmail" /> 
                        </a>
                        <div id="gmail">
                            <p>tranduyba2599@gmail.com</p>
                        </div>
                    </li>
                </ul> 
            </div>
            <p>Admin: Trần Duy Bá</p>
            <p>Design and Code: Trần Duy Bá-LB</p>
        </div>
    </body>
</html>