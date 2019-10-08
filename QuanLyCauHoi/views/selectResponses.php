<?php 
    if(!empty($_GET['idMember'])) {
        require '../model/database.php';
        $objDB = new database();
        $idMember = $_GET['idMember'];
        $table = 'listquestions';
        $column = 'memberName, question, responses';
        $where = "idMember='$idMember'";

        $query = $objDB->SELECT($column,$table,$where);
        $data = $objDB->executeQuery($query);
        $arrayData = $data->fetch();
        if(empty($arrayData))
            $error = 'Người hỏi không tồn tại !';
    } else
        $error = 'Bạn chưa nhập mã !';
        
?>
<html>
    <?php 
        $i=0;
        if(!empty($error)){
            echo "<span style='color:rgb(255, 77, 77);'>".$error."</span>";
            goto next;
        }
    ?>
    <?php echo "<p style='color:rgb(68, 127, 238); text-decoration: underline;'> Xin chào: ".$arrayData['memberName']."</p>" ?>
    <?php while($arrayData!=null): ?>
    <div class="responses">
        <p> <span style="color: rgb(68, 127, 238); font-size: 18px;">Câu hỏi số <?php echo ++$i; ?>: </span> <br/>
            <?php echo $arrayData['question']; ?>
        </p>
        <p style="color: rgb(255, 77, 77);">Câu trả lời: </p>
        <div> 
            <?php 
                if(!empty($arrayData['responses']) && $arrayData['responses']!='1' )
                    echo $arrayData['responses'];
                else
                    echo "<span style='color:rgb(255, 77, 77);'>---> Chưa có câu trả lời !</span>";
            ?> 
        </div>
    </div>
    <?php 
        $arrayData = $data->fetch();
        endwhile; 
        next:
    ?>
</html>