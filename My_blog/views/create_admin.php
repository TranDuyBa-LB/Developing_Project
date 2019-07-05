<form action="../controller/request_admin.php" method="POST">
    <div id="create_admin" >
        <p>Đăng ký admin</p>
        <input type="text" name="user_name" placeholder="Tên đăng nhập..."/>
        <input type="text" name="nickname" placeholder="Nickname..."/>
        <input type="password" name="password" placeholder="Mật khẩu..."/>
        <input type="password" placeholder="Nhập lại mật khẩu..."/>
        <input type="hidden" name="request" value="create_admin" />
        <input id="submit" type="submit" value="Đăng ký" />
    </div>
</form>