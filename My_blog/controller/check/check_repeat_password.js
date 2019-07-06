
//Kiểm tra password "nhập lần đầu" và "nhập lại" có giống nhau không

function check_repeat_password(){

    var password = document.getElementById('password').value;
    var repeat_password = document.getElementById('repeat_password').value;
    if(password === repeat_password){
        return true;
    } else {
        alert('Password nhập không trùng nhau !');
        return false;
    }

}