function selectQuestion(request) {
    if(document.getElementById('search').value==""){
        request = "../controller/selectQuestion.php?sort="+request;
        console.log(request);
    }
    else {
        request = "../controller/selectQuestion.php?search="+document.getElementById('search').value;
        console.log(request);
    }
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('contentQuestion').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../controller/selectQuestion.php",true);
    xmlhttp.send();
}

function sortTeam() {
    var sortTeam = document.getElementById('sortTeam').value;
    selectQuestion(sortTeam);
}
function sortTime() {
    var sortTime = document.getElementById('sortTime').value;
    selectQuestion(sortTime);
}
function search() {
    var search = document.getElementById('search').value;
    selectQuestion(search);
}