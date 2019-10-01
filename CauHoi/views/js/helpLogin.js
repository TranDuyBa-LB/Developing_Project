//------------------------------------------------------------------------------------------------------//
//---------------------Tạo hiển thị hỗ trợ trên trang login-------------------------------------------//
//---------------------------------------------------------------------------------------------------//

function helpLogin() {
    document.getElementById('warning').style.height = "0px";
    setTimeout(function(){
        document.getElementById('warning').innerHTML = "Hình như <br/> => tài khoản là: \"admin\" <= <br/> => mật khẩu là: \"admin123456789\" <= <br/> thì phải :)";
        document.getElementById('warning').style.color = "rgba(255, 52, 52, 0.808)";
        document.getElementById('warning').style.height = "85px";
    },100);
}
document.getElementById('help').onclick = helpLogin;