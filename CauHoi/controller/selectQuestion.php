<?php 
    require '../model/database.php';
    $objDB = new database();
    $table = 'listquestions';
    $column = '*';

    $query = $objDB->SELECT($column,$table);

    if(!empty($_GET['sort']))
        if($_GET['sort']!='0'||'up'||'down')
            $where = "team=".$_GET['sort'];
        else if($_GET['sort']=='up')
                $orderBy='ORDER BY id ASC';
        else if($_GET['sort']=='down')
                $orderBy='ORDER BY id DESC';
    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $where = "question LIKE '%$search%'";
    }

    if(!empty($where))
        $query = $objDB->SELECT($column,$table,$where);
    else 
        $query = $objDB->SELECT($column,$table);

    if(!empty($orderBy))
        $query=$query.$orderBy;

    $data = $objDB->executeQuery($query);
    $arrayData = $data->fetch();
    var_dump($query);
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