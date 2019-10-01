//-----------------------------------------------------------------------------//
//-----------------------Hiển thị cửa sổ câu trả lời--------------------------//
//---------------------------------------------------------------------------//

function displayResponses() {
    var viewsResponses = document.getElementById('displayResponses');
    viewsResponses.style.height = "100%";
}
function clearDisplayResponses(){
    var viewsResponses = document.getElementById('displayResponses');
    viewsResponses.style.height = "0%";
}
document.getElementById('clear').onclick = clearDisplayResponses;