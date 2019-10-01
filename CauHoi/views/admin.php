<?php 
    require '../controller/checkLogin.php'; 
    require '../model/database.php';

    if(!empty($_GET['id']) && !empty($_GET['displayResponses'])){
        if($_GET['displayResponses']=='true'){

            $id = $_GET['id'];
            $table = 'listquestions';
            $column = 'memberName, team, question, responses';
            $where = "id=$id";

            $objDB = new database();
            $query = $objDB->SELECT($column,$table,$where);
            $data = $objDB->executeQuery($query);
            $arrayData = $data->fetch();
            $display = true;
        } else
            $display = false;
    } else 
        $display = false;

    $objDB = new database();
    $table = 'admin';
    $column = 'a_responses';
    $where = 'id=1';
    
    $query = $objDB->SELECT($column,$table,$where);
    $data = $objDB->executeQuery($query);
    $arrayDataStop = $data->fetch();
    $stop = $arrayDataStop['a_responses'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý câu hỏi</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="img/png" href="imgs/logo.png" />
        <link rel="stylesheet" type="text/css" href="css/adminCSS.css" />
        <link rel="stylesheet" type="text/css" href="css/responsesCSS.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet" />
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div id="displayResponses">
            <form action="../controller/addResponses.php" method="POST">
                <div id="screenResponses">
                    <img id="clear" src="imgs/clear.png" />
                    <p>
                        Trả lời bạn: <?php echo $arrayData['memberName']; ?>
                    </p>
                    <p>
                        Nhóm <?php echo $arrayData['team']; ?>
                    </p>
                    <span>
                        <p>
                            <span style="color: rgba(255, 51, 51, 0.877);">Nội dung câu hỏi:</span> 
                            <?php echo $arrayData['question']; ?> 
                        </p>
                        <p style="color: rgba(255, 51, 51, 0.877);"> Câu trả lời: </p>
                    </span>
                    <textarea id="content" placeholder="Gửi câu trả lời !" name="contentResponses"><?php
                            if($arrayData['responses']!='false')
                                echo $arrayData['responses'];
                        ?></textarea>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" value="Lưu" />
                </div>
            </form>
        </div>
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
            <a href="../controller/stopResponses.php?stop=<?php echo $stop ?>">
                <?php 
                    if($stop=='false')
                        $backColor = 'rgb(38, 167, 55)';
                    else
                        $backColor = 'rgba(255, 46, 46, 0.842)';
                ?>
                <input id="stopResponses" style="background-color: <?php echo $backColor; ?>" type="button" value="Chặn" />
            </a>
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
                    <td>Thời gian gửi</td>
                    <td>Trả lời</td>
                    <td>Có thể trả lời</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody id="contentQuestion">
                
            </tbody>
        </table>
    </body>
    
    <script type="text/javascript" src="js/confirmDeleteAll.js"></script>
    <?php
        if($display==true)
            echo '<script type="text/javascript" src="js/displayResponses.js"></script>';
    ?>
    <script type="text/javascript" src="../controller/ajax/listQuestionAJAX.js"></script>
    <script type="text/javascript">
        config = {};
        config.toolbarGroups = [
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'tools', groups: [ 'tools' ] },
            '/',
            '/',
            { name: 'others', groups: [ 'others' ] },
            { name: 'about', groups: [ 'about' ] }
        ];
        config.removeButtons = 'Source,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Superscript,Subscript,CopyFormatting,Indent,Outdent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,PageBreak,Iframe,Styles,Font,ShowBlocks,About,Anchor,Format';
        config.autoGrow_minHeight = 500;
        CKEDITOR.replace('content', config);
        CKEDITOR.config.autoParagraph = false;
    </script>
</html>