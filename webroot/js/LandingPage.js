var firstCall = true;
function countdown() {
    var countdownDate = new Date('May 24, 2019 16:00:00').getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var difference = countdownDate - now;

        var days = Math.floor(difference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((difference % (1000 * 60)) / 1000);
        seconds = seconds > 9 ? seconds : '0' + seconds;

        $('#days').html(days);
        $('#hours').html(hours);
        $('#minutes').html(minutes);
        $('#seconds').html(seconds);
        if (firstCall) {
            $(".se-pre-con").fadeOut("slow");
            $('#landing-text').addClass('animated fadeInLeft');
            $('#countdown').addClass('animated fadeInRight');

            firstCall = false;
        }
    }, 1000);
}

window.onload = countdown;

window.onscroll = adjustNavbar;

function adjustNavbar() {
    var navbar = document.getElementById("navbar");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        navbar.classList.add('navbar-scrolling');
        document.getElementById('navbar-logo').src = 'http://localhost/ico/webroot/img/CRT.png';
    } else {
        navbar.classList.remove('navbar-scrolling');
        document.getElementById('navbar-logo').src = 'http://localhost/ico/webroot/img/CRT-white.png';
    }

    // var n1 = document.getElementById('ico-details');

    // var scroll = document.documentElement.scrollTop;
    // if (scroll > 500) {
    //     n1.classList.add('animated');
    //     n1.classList.add('fadeInDown');
    // }
}