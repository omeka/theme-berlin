if (!Berlin) {
    var Berlin = {};
}

(function ($) {    
    Berlin.dropDown = function(){
        //Hide the rest of the menu
        var menuButton = $('#mobile-nav .menu.button');
        var mobileNav = $('#mobile-nav .navigation');
        mobileNav.attr('id', 'mobile-nav-ul').hide();

        //function the will toggle the menu
        $(document).on('click', '#mobile-nav .menu.button', function() {
            mobileNav.slideToggle().toggleClass('open');
            if (mobileNav.hasClass('open')) {
                menuButton.attr('aria-expanded', 'true');
            } else {
                menuButton.attr('aria-expanded', 'false');
            }
        });
    };

    Berlin.setAriaHidden = function() {
        var primaryNav = $('#primary-nav');
        if (window.innerWidth > 768) {
            $('#primary-nav').attr('aria-hidden', 'false');
            $('#primary-nav a').removeAttr('tabIndex');
        } else {
            $('#primary-nav').attr('aria-hidden', 'true');
            $('#primary-nav a').attr('tabIndex', '-1');
        }
    };

    Berlin.manageNavVisibility = function() {
        onload = () => { Berlin.setAriaHidden(); }
        onresize = () => { Berlin.setAriaHidden(); }
    };
})(jQuery)