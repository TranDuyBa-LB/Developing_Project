function repeat_passoword(pass_new,repeat_pass_new){
    var p1 = document.getElementById(pass_new).value;
    var p2 = document.getElementById(repeat_pass_new).value;
    if(p1!=p2){
        alert('Mật khẩu mới không trùng khớp !');
        return false;
    } else 
        return true;
}