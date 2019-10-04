//----------------------------------------------------------------------------------------------------//
//----------------Tạo hiệu ứng hiển thị cửa sổ điền thông tin câu hỏi file index.php-----------------//
//--------------------------------------------------------------------------------------------------//

function displayScreenQuestion() {
    var screenQuestion = document.getElementById('screenQuestion');
    screenQuestion.style.width = "25%";
    screenQuestion.style.marginTop = "50px";
}

//---------------------Hiển thị cửa sổ nhập mã để nhận câu hỏi-----------------------------------//
function displayEnterCode() {
    var screenQuestion = document.getElementById('screenQuestion');
    var screenEnterCode = document.getElementById('screenEnterCode');
    screenQuestion.style.display= "none";
    screenEnterCode.style.display = "block";
    setTimeout(function(){
        screenEnterCode.style.marginTop = "50px";
        screenEnterCode.style.width = "30%";
    },10);
}
window.onload = displayScreenQuestion;