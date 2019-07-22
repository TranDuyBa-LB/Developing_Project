<form action="../../controller/admin/request_admin.php" method="POST">
    <div id="create_admin" >
        <p>Đăng ký admin</p>
        <input type="text" name="user_name" placeholder="Tên đăng nhập..."  />
        <input type="text" name="nickname" placeholder="Nickname..."  />
        <input id="pass" type="password" name="password" placeholder="Mật khẩu..."/>
        <input id="repeat_pass" type="password" placeholder="Nhập lại mật khẩu..."/>
        <input type="hidden" name="request" value="create_admin" />
        <input id="submit" type="submit" value="Đăng ký" onclick="return repeat_passoword('pass','repeat_pass')" />
    </div>
    <script type="text/javascript" src="../../controller/check/function_check.js"></script>
</form>