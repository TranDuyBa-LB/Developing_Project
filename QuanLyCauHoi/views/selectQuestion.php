<?php 
    require '../model/database.php';
    $objDB = new database(); //------------>Tạo đối tượng database<------------------//
    $table = 'listquestions';
    $column = '*';

    //---------------->Kiểm tra nội dung sort gửi tới và thực hiện gán điều kiện sort<---------------//
    if(!empty($_GET['sort']))
        if($_GET['sort']!='0' && $_GET['sort']!='up' && $_GET['sort']!='down')
            $where = "team=".$_GET['sort'];
        else if($_GET['sort']=='up')
                $orderBy='ORDER BY id ASC';
        else if($_GET['sort']=='down')
                $orderBy='ORDER BY id DESC';

    //---------------->Kiểm tra nội dung search và tạo điều kiện search theo nội dung<----------------//
    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $where = "question LIKE '%$search%'";
    }
    
    //----------->Câu lệnh query mặc định nếu $where hoặc $orderBy không chứ gì<---------------//
    $query = $objDB->SELECT($column,$table);

    //-------------->Kiểm tra $where có tồn tại không, nếu không tạo query select All<----------------//
    if(!empty($where))
        $query = $objDB->SELECT($column,$table,$where);
    //-------------->Kiểm tra $orderBy có gì không, nếu có thì nối thêm lệnh ORDER BY<----------------//
    if(!empty($orderBy))
        $query=$query.$orderBy;
    $data = $objDB->executeQuery($query);//---------------->Gọi phương thức thực thi query<---------------//
    $arrayData = $data->fetch();         //---------------->Lấy ra mảng dữ liệu là các hàng trong bảng<----------// 
?>
<html>
    <?php $i=0; //----------->Đếm số câu hỏi<-----------------//?>
    <?php while($arrayData!=null): ?>
        <tr>
            <td>
                <?php echo ++$i; ?>
            </td>
            <td>
                Nhóm <?php echo $arrayData['team']; ?>
            </td>
            <td>
                <?php echo $arrayData['idMember']; ?>
            </td>
            <td>
                <?php echo $arrayData['memberName']; ?>
            </td>
            <td class="content">
                <?php echo $arrayData['question']; ?>
            </td>
            <td>
                <?php echo $arrayData['time']; ?>
            </td>
            <?php $id = $arrayData['id']; ?>
            <td>
                <a href="admin.php?id=<?php echo $id; ?>&displayResponses=true">
                    <?php
                        $responses = $arrayData['responses'];
                        if($responses=='false' || $responses=="1")
                            $src = 'imgs/noResponses.png';
                        else    
                            $src = 'imgs/responses.png';
                    ?>
                    <img src="<?php echo $src; ?>" />
                </a>
            </td>
            <td>
                <?php
                    $confirm =  $arrayData['confirm'];
                    if($confirm=='0')
                        $srcImg='imgs/notconfirm.png';
                    else    
                        $srcImg='imgs/confirm.png';
                ?>
                <a href="<?php echo "../controller/requests.php?requestName=confirm&id=$id&confirm=$confirm"; ?>"> 
                    <img class="confirm" src="<?php echo $srcImg; ?>" /> 
                </a>
            </td>
            <td>
                <a href="<?php echo "../controller/requests.php?requestName=delete&id=$id"; ?>"> 
                    <img class="delete" src="imgs/delete.png" />
                </a>
            </td>
        </tr>
        <?php $arrayData = $data->fetch(); ?>
    <?php endwhile; ?>
</html>