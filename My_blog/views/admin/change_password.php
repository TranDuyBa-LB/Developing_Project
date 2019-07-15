<form action="admin.php" method="POST" >
    
    <div id="change_password">
        <p>Đổi PassWord</p>
        <input type="password" placeholder="Mật khẩu cũ..."/>
        <input id="value_1" type="password" placeholder="Mật khẩu mới..."/>
        <input id="value_2" type="password" placeholder="Nhập lại mật khẩu mới..."/>
        <input type="submit" value="Thay đổi" onclick="return repeat_password('value_1','value_2')"/>
        <script type="text/javascript" rel="../../controller/check/function_check.js"></script>
    </div>
</form>