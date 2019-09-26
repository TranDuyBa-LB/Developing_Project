function selectQuestion() {
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('contentQuestion').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../controller/selectQuestion.php",true);
    xmlhttp.send();
}