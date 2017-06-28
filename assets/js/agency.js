// Agency Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '#mainNav',
        offset: 54
    });

    // Closes the Responsive Menu on Menu Item Click
    $('#navbarResponsive>ul>li>a').click(function() {
        $('#navbarResponsive').collapse('hide');
    });

    // jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
            $("#mainLogo").addClass("main-logo-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
            $("#mainLogo").removeClass("main-logo-shrink");
        }
    });

    if(isMobile()){
        //remove as tags de video e de animacao
        $('script').each(function() {
            if (this.src === 'assets/js/logoAnimate.js') {
                this.parentNode.removeChild( this );
            }
            if (this.src === 'https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.8/p5.min.js') {
                this.parentNode.removeChild( this );
            }
        });
        $('video').remove();
    }

    function isMobile() {
        return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ? true : false;
    }

    var hash = (window.location.hash).replace("#","");
    console.log(hash);
    var team = {
        "nelson" : "portfolioModal-Nelson",
        "josenir" : "portfolioModal-Josenir",
        "radegas" : "portfolioModal-Radegas",
        "cezar" : "portfolioModal-Cezar",
        "barbara" : "portfolioModal-Barbara",
        "diogo" : "portfolioModal-Diogo",
        "eveline" : "portfolioModal-Eveline",
        "falcao" : "portfolioModal-Falcao"
    };
    console.log(team[hash]);
    $("#"+team[hash]).modal({show:true});

})(jQuery); // End of use strict
