<?php
    require 'model/database.php';
    $_db = new database();

    $_column = '*';
    $_table = 'interface';
    $_where = 1;

    $_query = $_db->SELECT($_column,$_table,$_where);
    $_obj_statement=$_db->execute_query($_query);
    if($_obj_statement!=false)
        $_product=$_obj_statement->fetch();
    else 
        echo "<script>alert('Phát sinh lỗi trong quá trình setup interface !')</script>";
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>BL Blog</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="img/png" href="views/images/img_designs/short_cut.png" />
        <link rel="stylesheet" type="text/css" href="views/css/header.css" />
        <link rel="stylesheet" type="text/css" href="views/css/content_index.css" />
        <link rel="stylesheet" type="text/css" href="views/css/footer.css" />
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="http://localhost:8080/Developing_Project/My_blog/" title="BL Blog">
                    <img src="<?php echo $_product['i_link_logo']; ?>" />
                    <div></div>
                    <h1><?php echo $_product['i_title']; ?></h1>
                </a>
            </div>
            <div id="slogan">
                <p><?php echo $_product['i_slogan']; ?></p>
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
                        <a href="javascript:void(0)" >
                            <img src="views/images/img_designs/gmail.png" title="Gmail" /> 
                        </a>
                        <div id="gmail_header">
                            <p><?php echo $_product['i_email']; ?></p>
                        </div>
                    </li>
                </ul>   
            </div>
        </div>
        <input id="search" type="text" placeholder="Tìm kiếm bài viết theo tiêu đề..." />
        <div id="content">
            
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
                        <a href="javascript:void(0)">
                            <img src="views/images/img_designs/gmail.png" title="Gmail" /> 
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
        <script type="text/javascript" src="controller/ajax/listDemoPosts_index.js"></script>
        <script type="text/javascript">
            window.onload=function(){
                 search();
            }
        </script>
    </body>
</html>