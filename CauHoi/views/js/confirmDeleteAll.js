var WinConfirm = document.getElementById('windowConfirm');

function displayConfirm() {
    WinConfirm.style.height = "120px";
}

function notDisplayConfirm() {
    WinConfirm.style.height = "0px";
}

document.getElementById('buttonDelete').onclick = displayConfirm;
document.getElementById('notConfirm').onclick = notDisplayConfirm;