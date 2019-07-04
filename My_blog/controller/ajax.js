function ajax(request_url){
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('view_control').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",request_url,true);
    xmlhttp.send();
}

document.getElementById('create_posts').onclick = function(){
    ajax("create_posts.php");
}
document.getElementById('manage_posts').onclick = function(){
    ajax("table_manage_posts.php");
}
document.getElementById('create_admin').onclick = function(){
    ajax("create_admin.php");
}
document.getElementById('change_password').onclick = function(){
    ajax("change_password.php");
}

//Window onload
window.onload = function(){
    ajax("table_manage_posts.php");
}