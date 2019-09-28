<?php
    session_start();
    if(!empty($_SESSION['login'])){
        if($_SESSION['login']!=true)
            header('Location:../views/login.php?error=Đăng nhập không thành công. <br/> Nhấn vào "Gợi ý" để biết gì đó !');
    }
    else    
        header('Location:../views/login.php?error=Đăng nhập không thành công. <br/> Nhấn vào "Gợi ý" để biết gì đó !');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý câu hỏi</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="img/png" href="imgs/logo.png" />
        <link rel="stylesheet" type="text/css" href="css/adminCSS.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div id="tools">
            <a href="https://eobi.000webhostapp.com"">
                <img src="imgs/logo.gif" />
            </a>
            <input id="search" type="text" placeholder="Tìm kiếm câu hỏi..." onkeyup="search()"/>
            <p>Sắp xếp theo nhóm</p>
            <select id="sortTeam" name="sortTeam" onchange="sortTeam()">
                <option value="0">Tất cả các nhóm</option>
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
            <p>Sắp xếp theo thứ tự</p>
            <select id="sortTime" name="sortTime" onchange="sortTime()">
                <option value="up">Tăng dần</option>
                <option value="down">Giảm dần</option>
            </select>
           <span id="deleteAll">
                <input id="buttonDelete" type="button" value="DELETE ALL" />
                <div id="windowConfirm">
                    <p>Bạn chắc muốn xóa toàn bộ câu hỏi chứ ?</p>
                    <a href="../controller/requests.php?requestName=delete&id=2.5&all=true">
                        <input type="button" value="Xác nhận" />
                    </a>
                    <input id="notConfirm" type="button" value="Hủy bỏ" />
                </div>  
            </span>
            <a href="../controller/logout.php">
                <input type="button" value="Đăng xuất" />
            </a>
        </div>
        <table id="listQuestion" >
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên nhóm</td>
                    <td>Người hỏi</td>
                    <td class="content">Nội dung câu hỏi</td>
                    <td>Có thể trả lời</td>
                    <td>Thời gian gửi</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody id="contentQuestion">
                
            </tbody>
        </table>
    </body>
    <script type="text/javascript" src="../controller/ajax/listQuestionAJAX.js"></script>
    <script type="text/javascript" src="js/confirmDeleteAll.js"></script>
</html>