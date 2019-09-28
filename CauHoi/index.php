<?php
    if(!empty($_GET['error']))
        $error = $_GET['error'];
    else    
        $error = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đặt câu hỏi</title>
        <meta charset="UTF-8" />
        <link rel="shortcut icon" type="img/png" href="views/imgs/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="views/css/indexCSS.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    </head>
    <body>
        <form action="controller/addQuestion.php" method="POST">
            <div id="screen">   
                <a href="https://eobi.000webhostapp.com">
                    <img src="views/imgs/logo.gif" />
                </a>
                <p>Mời bạn đặt câu hỏi</p>
                <p id="warning">
                    <?php echo $error; ?>
                </p>
                <input type="text" name="name" placeholder="Mời nhập tên của bạn" required autofocus/>
                <select id="team" name="team">
                    <option value="0">Nhóm của bạn</option>
                    <option value="1">Nhóm 1</option>
                    <option value="2">Nhóm 2</option>
                    <option value="3">Nhóm 3</option>
                    <option value="4">Nhóm 4</option>
                    <option value="5">Nhóm 5</option>
                    <option value="6">Nhóm 6</option>
                    <option value="7">Nhóm 7</option>
                    <option value="8">Nhóm 8</option>
                    <option value="9">Nhóm 9</option>
                    <option value="10">Nhóm 10</option>
                    <option value="11">Nhóm 11</option>
                    <option value="12">Nhóm 12</option>
                </select>
                <textarea name="content" placeholder="Nội dung câu hỏi" rows="10" required></textarea>
                <input type="submit" value="Gửi câu hỏi" onclick="return checkRequest()" required/>
            </div>
        </form>
    </body>
    <script type="text/javascript" src="views/js/checkRequestIndex.js"></script>
    <script type="text/javascript" src="views/js/displayIndex.js"></script>
</html>