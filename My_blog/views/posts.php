<?php
    if(!empty($_GET['id_posts'])){

        require '../model/database.php';

        $_db = new database();
        
        $_column = 'p_title,p_content,p_writer,p_list,p_views,p_share,p_date';
        $_table = 'posts';
        $_id = $_GET['id_posts'];
        $_where = "p_id='$_id'";

        $_query = $_db->SELECT($_column, $_table, $_where);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement != false){
            $_product = $_obj_statement->fetch();
            if(empty($_product))
                header ('Location:../index.php');
        }
        else {
            $_error = $_db->_error;
            echo "<script>console.log('$_error');</script>";
        }
        require '../controller/posts/check_views.php';
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="http://localhost:8080/Developing_Project/My_blog/" title="BL Blog">
                    <img src="images/img_designs/My_Logo.png" />
                    <div></div>
                    <h1>BL-Bá Linh</h1>
                </a>
            </div>
            <div id="slogan">
                <p>Phương châm sống !</p>
            </div>
            <div id="info">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/TranDuyBa.LB">
                            <img src="images/img_designs/facebook.png" title="facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/TranDuyBa-LB">
                            <img src="images/img_designs/github.png" title="GitHub" />
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/img_designs/gmail.png" title="Gmail" /> 
                        </a>
                        <div id="gmail_header">
                            <p>tranduyba2599@gmail.com</p>
                        </div>
                    </li>
                </ul>  
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
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8080%2FDeveloping_Project%2FMy_blog%2F&layout=button&size=large&width=83&height=28&appId" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </a>
            <?php endif; ?>
        </div>
        <div id="comments">
        </div>
        <div id="footer">
            <div>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/TranDuyBa.LB">
                            <img src="images/img_designs/facebook.png" title="facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/TranDuyBa-LB">
                            <img src="images/img_designs/github.png" title="GitHub" />
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/img_designs/gmail.png" title="Gmail" /> 
                        </a>
                        <div id="gmail_footer">
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