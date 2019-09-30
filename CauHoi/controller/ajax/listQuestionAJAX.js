/*-----------------------------------------------------------------------------------
--------------------------------Hiển thị bằng AJAX-----------------------------------
------------------------------------------------------------------------------------*/

//-------------------->Lọc danh sách theo nhóm hoặc theo thứ tự thời gian<-----------------//
function sort(request) { 
    request = "selectQuestion.php?sort="+request;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('contentQuestion').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",request,true);
    xmlhttp.send();

}

//-------------------->Tìm kiếm câu hỏi theo nội dung<-----------------//
function searchF(request) {
    if(request!=""||" ")
        request = "selectQuestion.php?search="+request;
    else    
        request = "selectQuestion.php";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById('contentQuestion').innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",request,true);
    xmlhttp.send();

}

//------------------------------------------------------------------------------------------//
//------------------>Thực hiện gọi liên tục các hàm ở trên theo điều kiện<-----------------//
//----------------------------------------------------------------------------------------//

var manageRealTime;     //-------------->Chứ hàm realTime đang được thực hiện<-------------//
function realTime(action, request){

    clearInterval(manageRealTime);
    manageRealTime = setInterval(function(){
        if(action=='selectAll')
            sort("0");
        else if(action=="sort")
            sort(request);
        else if(action=="search")
            searchF(request);
    },1000);

}

function sortTeam(){
    var team = document.getElementById('sortTeam').value; //--------------->Lấy giá trị của tag select sắp xếp theo nhóm<---------------//
    realTime('sort',team);
}
function sortTime(){
    var time = document.getElementById('sortTime').value; //--------------->Lấy giá trị của tag select sắp xếp theo thời gian<---------------//
    realTime('sort',time);
}
function search(){
    var search= document.getElementById('search').value; //--------------->Lấy giá trị của tag Input search<---------------//
    realTime('search',search);
}

//---------------------->Thực thi ngay sau khi mọi thứ của trang được tải xong xong<---------------------//
window.onload = function(){
    sort("0");
    realTime('selectAll');
};
