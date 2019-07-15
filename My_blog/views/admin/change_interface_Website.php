<?php
    require '../../model/database.php';
    $_db = new database();

    $_column = '*';
    $_table = 'interface';
    $_where = 1;

    $_query = $_db->SELECT($_column,$_table,$_where);
    $_obj_statement=$_db->execute_query($_query);
    if($_obj_statement!=false)
        $_product=$_obj_statement->fetch();
    else 
        echo "<script>alert('Phát sinh lỗi trong quá trình setup nội dung !')</script>";
 ?>
<form id="change_interface_website" action="../../controller/admin/request_admin.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="request" value="change_interface_website" />
    <p>Logo website</p> <input class="up_logo" type="file" name="file_logo" />
    <div></div>
    <p>Tiêu đề website</p> <input type="text" name="title_web" placeholder="<?php echo $_product['i_title']; ?>"/>
    <p>Email liên hệ</p> <input type="email" name="email" placeholder="<?php echo $_product['i_email']; ?>" />
    <p>Phương châm (slogan)</p> <textarea name="slogan" placeholder="<?php echo $_product['i_slogan']; ?>"></textarea>
    <input class="submit" type="submit" value="Cập nhật" />
</form>