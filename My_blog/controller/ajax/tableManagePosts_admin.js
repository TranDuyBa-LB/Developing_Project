function search_select(){
    var request;
    var select = document.getElementById('sort').value;
    var search=document.getElementById('search').value;

    if(search!=false)
        request='tableManage_posts/table.php?search='+search;
    else
        if(select!=false)
            request='tableManage_posts/table.php?request_select='+select;
        else 
            request='tableManage_posts/table.php';

    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.status=200 && xmlhttp.readyState==4){
            document.getElementById('table_posts').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open('GET',request,true);
    xmlhttp.send();
    
}
document.getElementById('sort').onchange = search_select;
document.getElementById('search').onkeyup = search_select;
window.onload = search_select;