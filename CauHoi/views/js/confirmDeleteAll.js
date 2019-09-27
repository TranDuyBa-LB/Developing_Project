var WinConfirm = document.getElementById('windowConfirm');

function displayConfirm() {
    WinConfirm.style.height = "120px";
}

function notConfirm() {
    WinConfirm.style.height = "0px";
}

document.getElementById('deleteAll').onclick = displayConfirm;
document.getElementById('notConfirm').onclick = notDisplayConfirm;