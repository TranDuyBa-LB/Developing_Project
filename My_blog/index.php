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
                <a href="http://localhost:8080/Developing_Project/My_blog/" title="BL Blog">
                    <img src="views/images/img_designs/My_Logo.png" />
                    <div></div>
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
                        <a href="" >
                            <img src="views/images/img_designs/gmail.png" title="Gmail" /> 
                        </a>
                        <div id="gmail_header">
                            <p>tranduyba2599@gmail.com</p>
                        </div>
                    </li>
                </ul>   
            </div>
        </div>
        <input id="search" type="text" placeholder="Tìm kiếm tiêu đề bài viết..." />
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
                        <a href="">
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
        <script type="text/javascript" src="views/js/inputSearch_index.js"></script>
        <script type="text/javascript">
            window.onload=function(){
                 search();
            }
        </script>
    </body>
</html>