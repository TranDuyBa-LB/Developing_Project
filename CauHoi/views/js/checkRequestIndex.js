function checkRequest() {
    var select = document.getElementById('team');
    var warning = document.getElementById('warning');
    if(select.value=="0"){
        warning.innerHTML = "Cảnh báo" + "Mời bạn nhập tên nhóm !";
        return false;
    }
}