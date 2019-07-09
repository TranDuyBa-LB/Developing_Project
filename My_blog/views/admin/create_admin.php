<script type="text/javascript" src="../../controller/check/check_repeat_password.js"></script>
<form action="../../controller/admin/request_admin.php" method="POST">
    <div id="create_admin" >
        <p>Đăng ký admin</p>
        <input type="text" name="user_name" placeholder="Tên đăng nhập..."  />
        <input type="text" name="nickname" placeholder="Nickname..."  />
        <input id="password" type="password" name="password" placeholder="Mật khẩu..."/>
        <input id="repeat_password" type="password" placeholder="Nhập lại mật khẩu..."/>
        <input type="hidden" name="request" value="create_admin" />
        <input id="submit" type="submit" value="Đăng ký" onclick="return check_repeat_password()" />
    </div>
</form>