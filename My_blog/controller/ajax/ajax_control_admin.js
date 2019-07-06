
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


document.getElementById('manage_posts').onclick = function(){
    ajax_admin("table_manage_posts.php");
}
document.getElementById('create_admin').onclick = function(){
    ajax_admin("create_admin.php");
}
document.getElementById('change_password').onclick = function(){
    ajax_admin("change_password.php");
}