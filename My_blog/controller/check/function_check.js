function repeat_passoword(value_1,value_2){
    var v1 = document.getElementById(value_1).value;
    var v2 = document.getElementById(value_2).value;
    if(v1!=v2){
        alert('Mật khẩu không trùng khớp !');
        return false;
    }
}