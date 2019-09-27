function sort(request) {

    if(Number(request)!=NaN)
        request = "../controller/selectQuestion.php?sort="+request;
    else 
        request = "../controller/selectQuestion.php?sort="+request;
    console.log(request);
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('contentQuestion').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",request,true);
    xmlhttp.send();

}

function searchF(request) {

    if(request==""||" ")
        request = "../controller/selectQuestion.php?search="+request;
    else    
        request = "../controller/selectQuestion.php";
    console.log(request);
    var xmlhttp = new XMLHttpRequest() || ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('contentQuestion').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",request,true);
    xmlhttp.send();

}

function sortTeam(){
    var team = document.getElementById('sortTeam').value;
    sort(team);
}
function sortTime(){
    var time = document.getElementById('sortTime').value;
    sort(time);
}
function search(){
    var search= document.getElementById('search').value;
    searchF(search);
}
