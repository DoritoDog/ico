function onUpdate() {
    var address = document.getElementById('update-button');
    address.style.display = 'block';
}

window.onload = function() {
    var address = document.getElementById('address-editor');
    address.oninput = onUpdate;
}