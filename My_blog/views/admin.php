<!DOCTYPE html>
<html>
    <head>
        <title>Quản trị viên</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
        <script type="text/javascript" src="ckeditor/ckeditor.js" ></script>
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
                       <a href="#" target="_blank">Trang chủ</a>
                    </li>
                    <li>
                        <img src="images/img_designs/add_new_posts.png" /> 
                        <a href="">Tạo bài viết</a>
                    </li>
                    <li>
                        <img src="images/img_designs/manage_posts.png" /> 
                        <a href="">Quản lý bài viết</a>
                    </li>
                    <li>
                        <img src="images/img_designs/change_password.png" /> 
                        <a href="">Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
            <div id="view_control">
               <div id="create_posts">
                    <input type="text" value=""  placeholder="Người viết..." />
                    <textarea id="title_posts" name="title_posts" placeholder="Tiêu đề bài viết..." ></textarea>
                    <p>Chuyên mục</p>
                    <select>
                        <option>Chuyên mục 1</option>
                        <option>Chuyên mục 2</option>
                        <option>Chuyên mục 3</option>
                    </select> 
                    <textarea id="content_posts" name="content"> </textarea>   
                    <script type="text/javascript">
                        var config = {};
                        config.entities_latin = false;
                        config.language = 'vi';
                        CKEDITOR.replace('content_posts', config);
                    </script>  
                    <a href="" id="submit" name="create">Tạo bài viết</a>            
               </div>
            </div>
        </div>
    </body>
</html>