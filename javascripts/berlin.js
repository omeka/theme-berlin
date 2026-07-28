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
        menuButton.click(function() {
            mobileNav.slideToggle().toggleClass('open');
            if (mobileNav.hasClass('open')) {
                menuButton.attr('aria-expanded', 'true');
            } else {
                menuButton.attr('aria-expanded', 'false');
            }
        });
    };
})(jQuery)