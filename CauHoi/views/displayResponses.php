<?php 
    if(!empty($_GET['id'])){

        require '../model/database.php';

        $id = $_GET['id'];
        $table = 'listquestions';
        $column = 'memberName, team, question, responses';
        $where = "id=$id";

        $objDB = new database();
        $query = $objDB->SELECT($column,$table,$where);
        $data = $objDB->executeQuery($query);
        $arrayData = $data->fetch();
    } else 
        header('Location:../views/admin.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Câu trả lời</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/responsesCSS.css" />
    </head>
    <body>
        <form action="../controller/addResponses.php" method="POST">
            <div id="screenResponses">
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
    </body>
</html>