<?php
    if(!empty($_GET['id_posts'])){
        require '../model/connect_db.php';
        require '../model/query_db.php';
        $_column = 'p_title,p_content,p_writer,p_list,p_views,p_share,p_date';
        $_table = 'posts';
        $_id = $_GET['id_posts'];
        $_where = "p_id='$_id'";
        try {
            $_obj_statement = $_object_db->prepare(SELECT($_column,$_table,$_where));
            $_obj_statement->execute();
            $_product = $_obj_statement->fetch();
        } catch (Exception $_error) {
            echo "<script>console.log($_error);</script>";
            exit();
        }
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bài viết</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />
        <link rel="stylesheet" type="text/css" href="css/content_posts.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="#" title="BL Blog">
                    <img src="images/img_designs/My_Logo.png" />
                    <h1>BL-Bá Linh</h1>
                </a>
            </div>
            <div id="slogan">
                <p>Phương châm sống !</p>
            </div>
            <div id="info">
                <a href="">
                    <img src="images/img_designs/facebook.png" title="facebook" />
                </a>
                <a href="">
                    <img src="images/img_designs/github.png" title="GitHub" />
                </a>
                <a href="">
                    <img src="images/img_designs/gmail.png" title="Gmail" /> 
                </a>
            </div>
        </div>
        <div id="content_posts">
            <?php if(!empty($_product)): ?>
            <h2 name = "title" > 
                <?php echo $_product['p_title']; ?>
            </h2>
            <div>
                <img src="images/img_designs/writer.png" title="Người viết" /> 
                    <p>
                        <?php echo $_product['p_writer']; ?>
                    </p>
                <img src="images/img_designs/views.png" title="Số lượt xem" /> 
                    <p>
                        <?php 
                            if($_product['p_views']==NULL)
                                $_product['p_views']=0;
                            echo $_product['p_views']; 
                        ?>
                    </p>
                <img src="images/img_designs/share.png" title="Chia sẻ" /> 
                    <p>
                        <?php 
                            if($_product['p_share']==NULL)
                                $_product['p_share']=0;
                            echo $_product['p_share']; 
                         ?>
                    </p>
                <!--<img src="images/img_designs/comment.png" title="Số bình luận" /> <p></p> -->
                <img src="images/img_designs/list.png" title="Danh mục" /> 
                    <p>
                        <?php echo $_product['p_list']; ?>
                    </p>
                <img src="images/img_designs/date_up.png" title="Thời gian đăng" /> 
                    <p>
                        <?php 
                            $_array = explode('-',$_product['p_date']);
                            echo $_array[1];
                        ?>
                    </p>
            </div>
            <div name="content" >
                <?php echo $_product['p_content']; ?>
            </div>
            <a href="">
                <img src="images/img_designs/share.png" /> <p>Share facebook</p>
            </a>
            <?php endif; ?>
        </div>
        <div id="comments">
        </div>
        <div id="footer">
            <div>
                 <a href="">
                    <img src="images/img_designs/facebook_footer.png" title="facebook" />
                </a>
                <a href="">
                    <img src="images/img_designs/github_footer.png" title="GitHub" />
                </a>
                <a href="">
                    <img src="images/img_designs/gmail_footer.png" title="Gmail" /> 
                </a>
            </div>
            <p>Admin: Trần Duy Bá</p>
            <p>Design and Code: Trần Duy Bá-LB</p>
        </div>
    </body>
</html>