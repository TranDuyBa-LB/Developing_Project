//----------------------------------------------------------------------------------------------------//
//----------------Tạo hiệu ứng hiển thị cửa sổ Login file login.php----------------------------------//
//--------------------------------------------------------------------------------------------------//

function displayLogin(){
    var viewLogin = document.getElementById('screen');
    viewLogin.style.marginTop = "50px";
    viewLogin.style.width = "25%";
}
window.onload = displayLogin;