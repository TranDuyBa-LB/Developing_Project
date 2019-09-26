<?php 
    require '../model/database.php';

    $objDB = new database();

    $table = 'listquestions';
    $column = '*';

    $query = $objDB->SELECT($column,$table);
    $data = $objDB->executeQuery($query);
    $arrayData = $data->fetch();
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