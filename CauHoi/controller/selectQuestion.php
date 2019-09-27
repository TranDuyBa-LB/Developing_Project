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
    <?php while($arrayData!=null): ?>
        <tr>
            <td>
                <?php echo $arrayData['id']; ?>
            </td>
            <td>
                Nhóm <?php echo $arrayData['team']; ?>
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
            <td> 
                <img class="confirm" src="imgs/notconfirm.png" /> 
                <input type="hidden" name="delete" value="" />
            </td>
            <td> <img class="delete" src="imgs/delete.png" /> </td>
        </tr>
        <?php $arrayData = $data->fetch(); ?>
    <?php endwhile; ?>
</html>