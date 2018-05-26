function copyToClipboard(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    document.execCommand("Copy");
}

window.onload = function() {
    $(".se-pre-con").fadeOut("slow");
};

function setDisplay(id, displayValue) {
    document.getElementById(id).style.display = displayValue ? 'block' : 'none';
}