if (!Omeka) {
    var Omeka = {};
}

(function ($) {
    Omeka.showAdvancedForm = function () {
        var advancedForm = $('#advanced-form');
        var searchTextbox = $('#search-form input[type=text]');
        var searchSubmit = $('#search-form button');
        if (advancedForm.length > 0) {
            advancedForm.css("display", "none");
            $('#search-form').addClass("with-advanced").after('<a href="#" id="advanced-search" class="button">Advanced Search</a>');
            advancedForm.click(function (event) {
                event.stopPropagation();
            });
            $("#advanced-search").click(function (event) {
                event.preventDefault();
                event.stopPropagation();
                advancedForm.fadeToggle();
                $(document).click(function (event) {
                    if (event.target.id == 'query') {
                        return;
                    }
                    advancedForm.fadeOut();
                    $(this).unbind(event);
                });
            });
        } else {
            $('#search-form input[type=submit]').addClass("blue button");
        }


    };

    Omeka.dropDown = function(){
        var dropdownMenu = $('#mobile-nav');
        dropdownMenu.prepend('<a class="menu">Menu</a>');
        //Hide the rest of the menu
        $('#mobile-nav .navigation').hide();

        //function the will toggle the menu
        $('.menu').click(function() {
            var x = $(this).attr('id');

            if (x==1) {
                $("#mobile-nav .navigation").slideUp();
                $(this).attr('id', '0');
            } else {
                $("#mobile-nav .navigation").slideDown();
                $(this).attr('id','1');
            }
        });
    };

    Omeka.skipnav = function() {
      $("a[href^='#']").click(function() {
        // get the href attribute of the internal link
        // then strip the first character off it (#)
        // leaving the corresponding id attribute
        $("#"+$(this).attr("href").slice(1)+"")
          // give that id focus (for browsers that didn't already do so)
          .focus();
          // add a highlight effect to that id (comment out if not using)
          //.effect("highlight", {}, 3000);
      });

    }
})(jQuery);
