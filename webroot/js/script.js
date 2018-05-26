var firstCall = true;
function countdown() {
    var countdownDate = new Date('Sep 5, 2018 15:37:25').getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var difference = countdownDate - now;

        var days = Math.floor(difference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((difference % (1000 * 60)) / 1000);
        seconds = seconds > 9 ? seconds : '0' + seconds;

        var separator = ' : ';
        document.getElementById('timer').innerHTML =
            days + separator + hours + separator + minutes + separator + seconds;

        if (firstCall) {
            $(".se-pre-con").fadeOut("slow");
            document.getElementById('lead-text').className = "animated fadeInLeft";
            document.getElementsByClassName('sidebar')[0].className = "sidebar animated zoomIn";
            firstCall = false;
        }
    }, 1000);
}

window.onload = function() {
    countdown();
}

function onViewport(el, elClass, offset, callback) {
    var didScroll = false;
    var this_top;
    var height;
    var top;

    if(!offset) { var offset = 0; }

    $(window).scroll(function() {
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
        didScroll = false;
        top = $(this).scrollTop();

        $(el).each(function(i){
            this_top = $(this).offset().top - offset;
            height   = $(this).height();

            // Scrolled within current section
            if (top >= this_top && !$(this).hasClass(elClass)) {
            $(this).addClass(elClass);
            $(this).removeClass('hidden');

            if (typeof callback == "function") callback(el);
            }
        });
        }
    }, 100);
}

onViewport(".logo", "visible animated fadeInUp", 500, function() { });
onViewport(".chart-container", "visible animated fadeInUp", 500, function() { });
onViewport(".consensus-container", "visible animated fadeInUp", 500, function() { });
onViewport(".wallet-container", "visible animated fadeInUp", 500, function() { });

function handleInputFocus() {
    var inputField = document.getElementById('comment-field');
    inputField.style.height = '300px';
}

function handleInputLoseFocus() {
    var inputField = document.getElementById('comment-field');
    inputField.style.height = '38px';
}

function setActive(id, newActive) {
    if (newActive) {
        document.getElementById(id).style.display = 'block';
    } else {
        document.getElementById(id).style.display = 'none';
    }
}
