var agreed;
var button;
window.onload = function() {
    button = document.getElementById("reg-submit");
    agreed = !button.disabled;
}

function toggleSubmit() {
    button.disabled = agreed;
    agreed = !agreed;
}