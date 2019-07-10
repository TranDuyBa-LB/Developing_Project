function search(){
    var request;
    var search = document.getElementById('search').value;
    if(search!=null||undefined||" ")
        request = "views/listDemoPosts_index.php?search="+search;
    else
        request = "views/listDemoPosts_index.php?search=";
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
             document.getElementById('content').innerHTML=xmlhttp.responseText;
        }
    } 
    console.log("Request="+request);
    xmlhttp.open("GET",request,true);
    xmlhttp.send();
}

document.getElementById('search').onkeydown = function(){
    search(); 
}
document.getElementById('search').onblur = function(){
    search();
}