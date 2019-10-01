//--------------------------------------------------------------
//-----------Kiểm tra xem hệ điều hành của thiết bị-------------
//--------------------------------------------------------------
function checkInfoOS() {
    var bool;
    var OSSuport = ['Win16','Win32'];
    var OS = navigator.platform;
    for(var i = 0; i < OSSuport.length; i++)
        if(OS==OSSuport[i]) {
            bool=true;
            break;
        } else
            bool=false;
}