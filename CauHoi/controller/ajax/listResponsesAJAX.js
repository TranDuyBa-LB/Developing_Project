//-----------------------Sử dụng AJAX để hiển thị thông tin câu trả lời---------------------//
function listResponses(){
    var idMember = document.getElementById('idMember').value;
    if(idMember==""){
        document.getElementById('errorIdMember').style.height = "auto";
        document.getElementById('errorIdMember').innerHTML = 'Bạn chưa nhập mã !';
    } else {
        var xmlhttp = new XMLHttpRequest();
        var url = "views/selectResponses.php?idMember="+idMember;
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('contentResponses').innerHTML = xmlhttp.responseText;
            }
        }
        var contentResponses = document.getElementById('contentResponses');
        contentResponses.style.display = "block";
        contentResponses.style.height = "auto";
        document.getElementById('screenEnterCode').style.width = '60%';
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }
}