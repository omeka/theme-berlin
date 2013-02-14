if (!Omeka) {
    var Omeka = {};
}

(function ($) {
    
        /**
     * Add the TinyMCE WYSIWYG editor to a page.
     * Default is to add to all textareas.
     *
     * @param {Object} [params] Parameters to pass to TinyMCE, these override the
     * defaults.
     */
    Omeka.wysiwyg = function (params) {
        // Default parameters
        initParams = {
            convert_urls: false,
            mode: "textareas", // All textareas
            theme: "advanced",
            theme_advanced_toolbar_location: "top",
            theme_advanced_statusbar_location: "none",
            theme_advanced_toolbar_align: "left",
            theme_advanced_buttons1: "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,formatselect,code",
            theme_advanced_buttons2: "",
            theme_advanced_buttons3: "",
            plugins: "paste,inlinepopups,media",
            media_strict: false,
            width: "100%"
        };

        tinyMCE.init($.extend(initParams, params));
    };
    
    
    
    Omeka.showAdvancedForm = function () {
        var advancedForm = $('#advanced-form');
        var searchTextbox = $('#search-form input[type=text]');
        var searchSubmit = $('#search-form input[type=submit]');
        if (advancedForm) {
            searchTextbox.css("width", "60%");
            advancedForm.css("display", "none");
            searchSubmit.addClass("with-advanced").after('<a href="#" id="advanced-search" class="button">Advanced Search</a>');
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
   
           // Grab the primary-nav tag and insert a Menu string
            var dropdownMenu = $('#primary-nav');
             var liCount = $('#primary-nav li').size();
            // dropdownMenu.append(liCount);
             if(liCount > 1){
                dropdownMenu.prepend('<a class="menu">Menu</a>');
                //Hide the rest of the menu
              $('#primary-nav .navigation').hide();
              
              //function the will toggle the menu
            $('.menu').click(function(){
               var x=$(this).attr('id');
                
                if(x==1){
                    $("#primary-nav .navigation").slideUp();
                    $(this).attr('id', '0');
                }else {
                    $("#primary-nav .navigation").slideDown();
                    $(this).attr('id','1');
                    
                }
            });
            }            
    }
})(jQuery);
