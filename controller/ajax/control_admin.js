
// Quản lý AJAX trong trang admin.php

function ajax_admin(request_url){
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('view_control').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",request_url,true);
    xmlhttp.send();
}

document.getElementById('change_interface_website').onclick = function(){
    ajax_admin("change_interface_Website.php");
}