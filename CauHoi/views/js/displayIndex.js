//----------------------------------------------------------------------------------------------------//
//----------------Tạo hiệu ứng hiển thị cửa sổ điền thông tin câu hỏi file index.php-----------------//
//--------------------------------------------------------------------------------------------------//

function displayIndex() {
    var screen = document.getElementById('screen');
    screen.style.width = "25%";
    screen.style.marginTop = "50px";
}

window.onload = displayIndex;