function logoAnimation(){
    var left = document.getElementById('logoLeft');
    var mid = document.getElementById('logoMid');
    var right = document.getElementById('logoRight');

    if(screen.width >= 414) {
        left.style.marginLeft='-9.2%';
        right.style.marginLeft='-4.8%';
        mid.style.transform='rotate(360deg)';
    } else {
        left.style.marginLeft='-27%';
        right.style.marginLeft='-13.5%';
        mid.style.transform='rotate(360deg)';
    }
}