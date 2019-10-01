//-----------------------------------------------------------------------------------------//
//------------------------Kiểm tra xem người dùng đã chọn nhóm chưa-----------------------//
//---------------------------------------------------------------------------------------//

function checkRequest() {
    var select = document.getElementById('team');
    var warning = document.getElementById('warning');
    if(select.value=="0"){
        warning.innerHTML = "Cảnh báo: " + "Bạn chưa nhập tên nhóm !";
        warning.style.color = "rgb(255, 72, 72)";
        return false;
    }
}