<form action="../../controller/admin/request_admin.php" method="POST" >   
    <div id="change_password">
        <p>Đổi PassWord</p>
        <input type="hidden" name="request" value="change_password" />
        <input type="password" name="password" placeholder="Mật khẩu cũ..."/>
        <input id="pass_new" name="pass_new" type="password" placeholder="Mật khẩu mới..."/>
        <input id="repeat_pass_new" name="repeat_pass_new" type="password" placeholder="Nhập lại mật khẩu mới..." />
        <input type="submit" value="Thay đổi" onclick="return repeat_passoword('pass_new','repeat_pass_new')"/>
    </div>
    <script type="text/javascript" src="../../controller/check/function_check.js"></script>
</form>