$(document).ready(function () {
    var offset = 200;
    var duration = 400;

    $(window).scroll(function () {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });

    $('.back-to-top').click(function (event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    });

    // animace svatebniho oznameni
    if ($("#obalka").length > 0) {
        $("#obalka").click(function () {
            $(this).animate({opacity: 0.0, top: "+=394px"}, 800);
        });
    }
    if ($("#pozvani").length > 0) {
        $("#pozvani").click(function () {
            $("#obalka").animate({opacity: 1.0, top: "-=394px"}, 800);
        });
    }

    $(".cas-od-svatby").TimeCircles({
        time: {
            Days: {
                show: true,
                text: "Dnů",
                color: "#FC6"
            },
            Hours: {
                show: true,
                text: "Hodin",
                color: "#9CF"
            },
            Minutes: {
                show: true,
                text: "Minut",
                color: "#BFB"
            },
            Seconds: {
                show: true,
                text: "Vteřin",
                color: "#F99"
            }
        }
    });

    // timeline udalosti
    var $timeline_block = $('.timeline-block');
    //hide timeline blocks which are outside the viewport
    $timeline_block.each(function () {
        if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
            $(this).find('.timeline-img, .timeline-content').addClass('is-hidden');
        }
    });

    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function () {
        $timeline_block.each(function () {
            if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.timeline-img').hasClass('is-hidden')) {
                $(this).find('.timeline-img, .timeline-content').removeClass('is-hidden').addClass('bounce-in');
            }
        });
    });

    $('.minialbum').each(function () {
        var id = $(this).attr('id');
        $(this).colorbox({
            rel: id,
            maxWidth: '98%',
            maxHeight: '98%',
            slideshow: false,
            slideshowAuto: false
        });
    });
});