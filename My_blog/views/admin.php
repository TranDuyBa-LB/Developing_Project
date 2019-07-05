<!DOCTYPE html>
<html>
    <head>
        <title>Quản trị viên</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
        <link rel="stylesheet" type="text/css" href="css/table_manage_posts.css" />
        <link rel="stylesheet" type="text/css" href="css/change_password.css" />
        <link rel="stylesheet" type="text/css" href="css/create_admin.css" />
        <link rel="stylesheet" type="text/css" href="css/create_posts.css" />
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div id="header">
            
        </div>
        <div id="body_control">
            <div id="option_control">
                <ul>
                    <li class="admin">
                        <img src="images/img_designs/writer.png" /> <p>Trần Duy Bá</p>
                        <input type="button" value="Đăng xuất" />
                    </li>
                    <li>
                       <img src="images/img_designs/home.png" /> 
                       <a href="../index.php" target="_blank">Trang chủ</a>
                    </li>
                    <li>
                        <img src="images/img_designs/add_new_posts.png" /> 
                        <a href="admin.php"  id="create_posts" >Tạo bài viết</a>
                    </li>
                    <li>
                        <img src="images/img_designs/manage_posts.png" /> 
                        <a href="javascript:void(0);" id="manage_posts" >Quản lý bài viết</a>
                    </li>
                    <li>
                        <img src="images/img_designs/create_account.png" /> 
                        <a href="javascript:void(0);"  id="create_admin" >Tạo tài khoản</a>
                    </li>
                    <li>
                        <img src="images/img_designs/change_password.png" /> 
                        <a href="javascript:void(0);"  id="change_password" >Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
            <div id="view_control">
                <form action="../controller/request_admin.php" method="POST">
                    <div id="create_posts">
                        <input type="text" name="writer"  placeholder="Người viết..." />
                        <textarea id="title_posts" name="title" placeholder="Tiêu đề bài viết..." ></textarea>
                        <input type="text" name="list" placeholder="Chuyên mục..."/>
                        <textarea id="content" name="content"> </textarea>   
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
            </div>
        </div>
        <script typ="text/javascript" src="../controller/ajax_control_admin.js"></script>
    </body>
</html>