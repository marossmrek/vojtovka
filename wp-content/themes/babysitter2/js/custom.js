/**
    * @package Babysitter WordPress Theme
    * 
    * Template Scripts
    * Created by Dan Fisher

    Init JS
    
    1. Main Navigation
    2. Magnific Popup
    3. Carousel (based on owl carousel plugin)
    4. Content Slider (based on owl carousel plugin)
    5. Content Slider (based on owl carousel plugin)
    6. Testimonials Slider (based on owl carousel plugin)
    7. FitVid (responsive video)
    8. WP Job Manager
    -- Misc
*/

(function($) {
    "use strict";

    $('body').addClass('js');


    /* ----------------------------------------------------------- */
    /*  1. Main Navigation
    /* ----------------------------------------------------------- */

    $(".flexnav").flexNav({
        'animationSpeed':     200,            // default for drop down animation speed
        'transitionOpacity':  true,           // default for opacity animation
        'buttonSelector':     '.navbar-toggle', // default menu button class name
        'hoverIntent':        true,          // Change to true for use with hoverIntent plugin
        'hoverIntentTimeout': 50,            // hoverIntent default timeout
        'calcItemWidths':     false,          // dynamically calcs top level nav item widths
        'hover':              true            // would you like hover support?      
    });



    /* ----------------------------------------------------------- */
    /*  2. Magnific Popup
    /* ----------------------------------------------------------- */
    $('.popup-link').magnificPopup({
        type:'image',
        // Delay in milliseconds before popup is removed
        removalDelay: 300,

        // Class that is added to popup wrapper and background
        // make it unique to apply your CSS animations just to this exact popup
        mainClass: 'mfp-fade',

        gallery:{
            enabled:true
        }
    });



    /* ----------------------------------------------------------- */
    /*  3. Carousel (based on owl carousel plugin)
    /* ----------------------------------------------------------- */
    var owl = $("#owl-carousel");

    owl.owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1000,4], //4 items between 1000px and 901px
        itemsDesktopSmall : [900,2], // 4 items betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0;
        itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
        pagination : false
    });

    // Custom Navigation Events
    $("#carousel-next").click(function(){
        owl.trigger('owl.next');
    });
    $("#carousel-prev").click(function(){
        owl.trigger('owl.prev');
    });



    /* ----------------------------------------------------------- */
    /*  4. Content Slider (based on owl carousel plugin)
    /* ----------------------------------------------------------- */
    $(".owl-slider").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        pagination: true

    });


    /* ----------------------------------------------------------- */
    /*  5. Content Slider (based on owl carousel plugin)
    /* ----------------------------------------------------------- */
    $(".owl-featured-listings").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        pagination: false

    });


    /* ----------------------------------------------------------- */
    /*  6. Testimonials Slider (based on owl carousel plugin)
    /* ----------------------------------------------------------- */
    $(".owl-testimonials-listings").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:false,
        navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        pagination: false,

        items : 2, //4 items above 1000px browser width
        itemsDesktop : [1000,1], //4 items between 1000px and 901px
        itemsDesktopSmall : [900,1], // 4 items betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0;
        itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option

    });



    /* ----------------------------------------------------------- */
    /*  7. FitVid (responsive video)
    /* ----------------------------------------------------------- */

    $("iframe[src*='vimeo'], iframe[src*='youtube']").each(function(){
        $(this).wrap("<figure class='video-holder'/>");
    });
    $(".video-holder").fitVids();

 
    /* ----------------------------------------------------------- */
    /*  8. WP Job Manager
    /* ----------------------------------------------------------- */

    $(".job_filters, .resume_filters").submit(function(){return!1});

    $(".load_more_jobs").wrap('<div class="row"><div class="col-md-4 col-md-offset-4"></div></div>');
    $(".load_more_resumes").wrap('<div class="row"><div class="col-md-4 col-md-offset-4"></div></div>');

    $(".job_listing_preview_title #job_preview_submit_button").addClass('btn btn-secondary');
    $(".job_listing_preview_title input[name='edit_job']").addClass('btn btn-link');
    $(".job_listing_packages_title input[type='submit']").addClass('btn btn-secondary');

    $(".resume_preview_title #resume_preview_submit_button").addClass('btn btn-secondary');
    $(".resume_preview_title input[name='edit_resume']").addClass('btn btn-link');

    // Comment Form Button
    $('#respond #submit').addClass('btn btn-primary');


    // Job Alert
    $('.job-manager-form input[name=submit-job-alert]').addClass('btn btn-secondary');
    $('.job-manager-form .alert_frequency').wrap('<div class="select-style"/>');

    // Applications
    $('.job-application-note-add input[type="button"]').addClass('btn btn-secondary');

    // Job Geolocation
    $('#gjm-units, #gjm-orderby, #gjm-radius').wrap('<div class="select-style"/>');

    // Resume Geolocation
    $('#grm-units, #grm-orderby, #grm-radius').wrap('<div class="select-style"/>');


    /* ----------------------------------------------------------- */
    /*  9. Clean Login
    /* ----------------------------------------------------------- */

    $('.cleanlogin-form input[type="submit"]').addClass('btn btn-secondary');
    $('.cleanlogin-form select').wrap('<div class="select-style"/>');
    $('.cleanlogin-terms').wrap('<div class="checkbox checkbox__custom checkbox__style1"/>');
    $('.cleanlogin-terms').each(function(i, v) {
        $(v).contents().eq(2).wrap('<span/>')
    });


    // Animation on scroll
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    if (isMobile == false) {
      $('*[data-animation]').addClass('animated');

      $('.animated').appear(function() {
        var elem = $(this);
        var animation = elem.data('animation');
        if ( !elem.hasClass('visible') ) {
          var animationDelay = elem.data('animation-delay');
          if ( animationDelay ) {
            setTimeout(function(){
              elem.addClass( animation + " visible" );
            }, animationDelay);

          } else {
            elem.addClass( animation + " visible" );
          }
        }
      });
    };

    // Counter
    $(".counter[data-to]").each(function() {
      var $this = $(this);
      $this.appear(function() {
        $this.countTo({
          onComplete: function() {
            if($this.data("append")) {
              $this.html($this.html() + $this.data("append"));
            }
          }
        });
      }, {accX: 0, accY: 0});

    });


    // Circular Bar
    $(".circled-counter").each(function() {
      var $this = $(this);
      $this.appear(function() {
        $this.circliful();
      }, {accX: 0, accY: 100});
    });


    /* ----------------------------------------------------------- */
    /*  9. WooCommerce
    /* ----------------------------------------------------------- */
    $('.comment-form-comment textarea').addClass('form-control');


    /* ----------------------------------------------------------- */
    /*  10. Reviewer (review plugin)
    /* ----------------------------------------------------------- */
    // $('.rwp-submit-ur').addClass('btn btn-lg');

    /* ----------------------------------------------------------- */
    /*  -- Misc
    /* ----------------------------------------------------------- */

    $('.title-bordered h2').append('<span class="line line__right"></span>').prepend('<span class="line line__left"></span>');

    // Back to Top
    $("#back-top").hide();

    if($(window).width() > 991) {
      $('body').append('<div id="back-top"><a href="#top"><i class="fa fa-angle-up"></i></a></div>');
      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
          } else {
              $('#back-top').fadeOut();
          }
      });

        /* ----------------------------------------------------------- */
        /*  11. Slovakia maps - searching
         /* ----------------------------------------------------------- */

        //function for changing words to Latin character set
        var Latinise={};Latinise.latin_map={"Á":"A","Ă":"A","Ắ":"A","Ặ":"A","Ằ":"A","Ẳ":"A","Ẵ":"A","Ǎ":"A","Â":"A","Ấ":"A","Ậ":"A","Ầ":"A","Ẩ":"A","Ẫ":"A","Ä":"A","Ǟ":"A","Ȧ":"A","Ǡ":"A","Ạ":"A","Ȁ":"A","À":"A","Ả":"A","Ȃ":"A","Ā":"A","Ą":"A","Å":"A","Ǻ":"A","Ḁ":"A","Ⱥ":"A","Ã":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ḃ":"B","Ḅ":"B","Ɓ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ć":"C","Č":"C","Ç":"C","Ḉ":"C","Ĉ":"C","Ċ":"C","Ƈ":"C","Ȼ":"C","Ď":"D","Ḑ":"D","Ḓ":"D","Ḋ":"D","Ḍ":"D","Ɗ":"D","Ḏ":"D","ǲ":"D","ǅ":"D","Đ":"D","Ƌ":"D","Ǳ":"DZ","Ǆ":"DZ","É":"E","Ĕ":"E","Ě":"E","Ȩ":"E","Ḝ":"E","Ê":"E","Ế":"E","Ệ":"E","Ề":"E","Ể":"E","Ễ":"E","Ḙ":"E","Ë":"E","Ė":"E","Ẹ":"E","Ȅ":"E","È":"E","Ẻ":"E","Ȇ":"E","Ē":"E","Ḗ":"E","Ḕ":"E","Ę":"E","Ɇ":"E","Ẽ":"E","Ḛ":"E","Ꝫ":"ET","Ḟ":"F","Ƒ":"F","Ǵ":"G","Ğ":"G","Ǧ":"G","Ģ":"G","Ĝ":"G","Ġ":"G","Ɠ":"G","Ḡ":"G","Ǥ":"G","Ḫ":"H","Ȟ":"H","Ḩ":"H","Ĥ":"H","Ⱨ":"H","Ḧ":"H","Ḣ":"H","Ḥ":"H","Ħ":"H","Í":"I","Ĭ":"I","Ǐ":"I","Î":"I","Ï":"I","Ḯ":"I","İ":"I","Ị":"I","Ȉ":"I","Ì":"I","Ỉ":"I","Ȋ":"I","Ī":"I","Į":"I","Ɨ":"I","Ĩ":"I","Ḭ":"I","Ꝺ":"D","Ꝼ":"F","Ᵹ":"G","Ꞃ":"R","Ꞅ":"S","Ꞇ":"T","Ꝭ":"IS","Ĵ":"J","Ɉ":"J","Ḱ":"K","Ǩ":"K","Ķ":"K","Ⱪ":"K","Ꝃ":"K","Ḳ":"K","Ƙ":"K","Ḵ":"K","Ꝁ":"K","Ꝅ":"K","Ĺ":"L","Ƚ":"L","Ľ":"L","Ļ":"L","Ḽ":"L","Ḷ":"L","Ḹ":"L","Ⱡ":"L","Ꝉ":"L","Ḻ":"L","Ŀ":"L","Ɫ":"L","ǈ":"L","Ł":"L","Ǉ":"LJ","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ń":"N","Ň":"N","Ņ":"N","Ṋ":"N","Ṅ":"N","Ṇ":"N","Ǹ":"N","Ɲ":"N","Ṉ":"N","Ƞ":"N","ǋ":"N","Ñ":"N","Ǌ":"NJ","Ó":"O","Ŏ":"O","Ǒ":"O","Ô":"O","Ố":"O","Ộ":"O","Ồ":"O","Ổ":"O","Ỗ":"O","Ö":"O","Ȫ":"O","Ȯ":"O","Ȱ":"O","Ọ":"O","Ő":"O","Ȍ":"O","Ò":"O","Ỏ":"O","Ơ":"O","Ớ":"O","Ợ":"O","Ờ":"O","Ở":"O","Ỡ":"O","Ȏ":"O","Ꝋ":"O","Ꝍ":"O","Ō":"O","Ṓ":"O","Ṑ":"O","Ɵ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Õ":"O","Ṍ":"O","Ṏ":"O","Ȭ":"O","Ƣ":"OI","Ꝏ":"OO","Ɛ":"E","Ɔ":"O","Ȣ":"OU","Ṕ":"P","Ṗ":"P","Ꝓ":"P","Ƥ":"P","Ꝕ":"P","Ᵽ":"P","Ꝑ":"P","Ꝙ":"Q","Ꝗ":"Q","Ŕ":"R","Ř":"R","Ŗ":"R","Ṙ":"R","Ṛ":"R","Ṝ":"R","Ȑ":"R","Ȓ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꜿ":"C","Ǝ":"E","Ś":"S","Ṥ":"S","Š":"S","Ṧ":"S","Ş":"S","Ŝ":"S","Ș":"S","Ṡ":"S","Ṣ":"S","Ṩ":"S","Ť":"T","Ţ":"T","Ṱ":"T","Ț":"T","Ⱦ":"T","Ṫ":"T","Ṭ":"T","Ƭ":"T","Ṯ":"T","Ʈ":"T","Ŧ":"T","Ɐ":"A","Ꞁ":"L","Ɯ":"M","Ʌ":"V","Ꜩ":"TZ","Ú":"U","Ŭ":"U","Ǔ":"U","Û":"U","Ṷ":"U","Ü":"U","Ǘ":"U","Ǚ":"U","Ǜ":"U","Ǖ":"U","Ṳ":"U","Ụ":"U","Ű":"U","Ȕ":"U","Ù":"U","Ủ":"U","Ư":"U","Ứ":"U","Ự":"U","Ừ":"U","Ử":"U","Ữ":"U","Ȗ":"U","Ū":"U","Ṻ":"U","Ų":"U","Ů":"U","Ũ":"U","Ṹ":"U","Ṵ":"U","Ꝟ":"V","Ṿ":"V","Ʋ":"V","Ṽ":"V","Ꝡ":"VY","Ẃ":"W","Ŵ":"W","Ẅ":"W","Ẇ":"W","Ẉ":"W","Ẁ":"W","Ⱳ":"W","Ẍ":"X","Ẋ":"X","Ý":"Y","Ŷ":"Y","Ÿ":"Y","Ẏ":"Y","Ỵ":"Y","Ỳ":"Y","Ƴ":"Y","Ỷ":"Y","Ỿ":"Y","Ȳ":"Y","Ɏ":"Y","Ỹ":"Y","Ź":"Z","Ž":"Z","Ẑ":"Z","Ⱬ":"Z","Ż":"Z","Ẓ":"Z","Ȥ":"Z","Ẕ":"Z","Ƶ":"Z","Ĳ":"IJ","Œ":"OE","ᴀ":"A","ᴁ":"AE","ʙ":"B","ᴃ":"B","ᴄ":"C","ᴅ":"D","ᴇ":"E","ꜰ":"F","ɢ":"G","ʛ":"G","ʜ":"H","ɪ":"I","ʁ":"R","ᴊ":"J","ᴋ":"K","ʟ":"L","ᴌ":"L","ᴍ":"M","ɴ":"N","ᴏ":"O","ɶ":"OE","ᴐ":"O","ᴕ":"OU","ᴘ":"P","ʀ":"R","ᴎ":"N","ᴙ":"R","ꜱ":"S","ᴛ":"T","ⱻ":"E","ᴚ":"R","ᴜ":"U","ᴠ":"V","ᴡ":"W","ʏ":"Y","ᴢ":"Z","á":"a","ă":"a","ắ":"a","ặ":"a","ằ":"a","ẳ":"a","ẵ":"a","ǎ":"a","â":"a","ấ":"a","ậ":"a","ầ":"a","ẩ":"a","ẫ":"a","ä":"a","ǟ":"a","ȧ":"a","ǡ":"a","ạ":"a","ȁ":"a","à":"a","ả":"a","ȃ":"a","ā":"a","ą":"a","ᶏ":"a","ẚ":"a","å":"a","ǻ":"a","ḁ":"a","ⱥ":"a","ã":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ḃ":"b","ḅ":"b","ɓ":"b","ḇ":"b","ᵬ":"b","ᶀ":"b","ƀ":"b","ƃ":"b","ɵ":"o","ć":"c","č":"c","ç":"c","ḉ":"c","ĉ":"c","ɕ":"c","ċ":"c","ƈ":"c","ȼ":"c","ď":"d","ḑ":"d","ḓ":"d","ȡ":"d","ḋ":"d","ḍ":"d","ɗ":"d","ᶑ":"d","ḏ":"d","ᵭ":"d","ᶁ":"d","đ":"d","ɖ":"d","ƌ":"d","ı":"i","ȷ":"j","ɟ":"j","ʄ":"j","ǳ":"dz","ǆ":"dz","é":"e","ĕ":"e","ě":"e","ȩ":"e","ḝ":"e","ê":"e","ế":"e","ệ":"e","ề":"e","ể":"e","ễ":"e","ḙ":"e","ë":"e","ė":"e","ẹ":"e","ȅ":"e","è":"e","ẻ":"e","ȇ":"e","ē":"e","ḗ":"e","ḕ":"e","ⱸ":"e","ę":"e","ᶒ":"e","ɇ":"e","ẽ":"e","ḛ":"e","ꝫ":"et","ḟ":"f","ƒ":"f","ᵮ":"f","ᶂ":"f","ǵ":"g","ğ":"g","ǧ":"g","ģ":"g","ĝ":"g","ġ":"g","ɠ":"g","ḡ":"g","ᶃ":"g","ǥ":"g","ḫ":"h","ȟ":"h","ḩ":"h","ĥ":"h","ⱨ":"h","ḧ":"h","ḣ":"h","ḥ":"h","ɦ":"h","ẖ":"h","ħ":"h","ƕ":"hv","í":"i","ĭ":"i","ǐ":"i","î":"i","ï":"i","ḯ":"i","ị":"i","ȉ":"i","ì":"i","ỉ":"i","ȋ":"i","ī":"i","į":"i","ᶖ":"i","ɨ":"i","ĩ":"i","ḭ":"i","ꝺ":"d","ꝼ":"f","ᵹ":"g","ꞃ":"r","ꞅ":"s","ꞇ":"t","ꝭ":"is","ǰ":"j","ĵ":"j","ʝ":"j","ɉ":"j","ḱ":"k","ǩ":"k","ķ":"k","ⱪ":"k","ꝃ":"k","ḳ":"k","ƙ":"k","ḵ":"k","ᶄ":"k","ꝁ":"k","ꝅ":"k","ĺ":"l","ƚ":"l","ɬ":"l","ľ":"l","ļ":"l","ḽ":"l","ȴ":"l","ḷ":"l","ḹ":"l","ⱡ":"l","ꝉ":"l","ḻ":"l","ŀ":"l","ɫ":"l","ᶅ":"l","ɭ":"l","ł":"l","ǉ":"lj","ſ":"s","ẜ":"s","ẛ":"s","ẝ":"s","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ᵯ":"m","ᶆ":"m","ń":"n","ň":"n","ņ":"n","ṋ":"n","ȵ":"n","ṅ":"n","ṇ":"n","ǹ":"n","ɲ":"n","ṉ":"n","ƞ":"n","ᵰ":"n","ᶇ":"n","ɳ":"n","ñ":"n","ǌ":"nj","ó":"o","ŏ":"o","ǒ":"o","ô":"o","ố":"o","ộ":"o","ồ":"o","ổ":"o","ỗ":"o","ö":"o","ȫ":"o","ȯ":"o","ȱ":"o","ọ":"o","ő":"o","ȍ":"o","ò":"o","ỏ":"o","ơ":"o","ớ":"o","ợ":"o","ờ":"o","ở":"o","ỡ":"o","ȏ":"o","ꝋ":"o","ꝍ":"o","ⱺ":"o","ō":"o","ṓ":"o","ṑ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","õ":"o","ṍ":"o","ṏ":"o","ȭ":"o","ƣ":"oi","ꝏ":"oo","ɛ":"e","ᶓ":"e","ɔ":"o","ᶗ":"o","ȣ":"ou","ṕ":"p","ṗ":"p","ꝓ":"p","ƥ":"p","ᵱ":"p","ᶈ":"p","ꝕ":"p","ᵽ":"p","ꝑ":"p","ꝙ":"q","ʠ":"q","ɋ":"q","ꝗ":"q","ŕ":"r","ř":"r","ŗ":"r","ṙ":"r","ṛ":"r","ṝ":"r","ȑ":"r","ɾ":"r","ᵳ":"r","ȓ":"r","ṟ":"r","ɼ":"r","ᵲ":"r","ᶉ":"r","ɍ":"r","ɽ":"r","ↄ":"c","ꜿ":"c","ɘ":"e","ɿ":"r","ś":"s","ṥ":"s","š":"s","ṧ":"s","ş":"s","ŝ":"s","ș":"s","ṡ":"s","ṣ":"s","ṩ":"s","ʂ":"s","ᵴ":"s","ᶊ":"s","ȿ":"s","ɡ":"g","ᴑ":"o","ᴓ":"o","ᴝ":"u","ť":"t","ţ":"t","ṱ":"t","ț":"t","ȶ":"t","ẗ":"t","ⱦ":"t","ṫ":"t","ṭ":"t","ƭ":"t","ṯ":"t","ᵵ":"t","ƫ":"t","ʈ":"t","ŧ":"t","ᵺ":"th","ɐ":"a","ᴂ":"ae","ǝ":"e","ᵷ":"g","ɥ":"h","ʮ":"h","ʯ":"h","ᴉ":"i","ʞ":"k","ꞁ":"l","ɯ":"m","ɰ":"m","ᴔ":"oe","ɹ":"r","ɻ":"r","ɺ":"r","ⱹ":"r","ʇ":"t","ʌ":"v","ʍ":"w","ʎ":"y","ꜩ":"tz","ú":"u","ŭ":"u","ǔ":"u","û":"u","ṷ":"u","ü":"u","ǘ":"u","ǚ":"u","ǜ":"u","ǖ":"u","ṳ":"u","ụ":"u","ű":"u","ȕ":"u","ù":"u","ủ":"u","ư":"u","ứ":"u","ự":"u","ừ":"u","ử":"u","ữ":"u","ȗ":"u","ū":"u","ṻ":"u","ų":"u","ᶙ":"u","ů":"u","ũ":"u","ṹ":"u","ṵ":"u","ᵫ":"ue","ꝸ":"um","ⱴ":"v","ꝟ":"v","ṿ":"v","ʋ":"v","ᶌ":"v","ⱱ":"v","ṽ":"v","ꝡ":"vy","ẃ":"w","ŵ":"w","ẅ":"w","ẇ":"w","ẉ":"w","ẁ":"w","ⱳ":"w","ẘ":"w","ẍ":"x","ẋ":"x","ᶍ":"x","ý":"y","ŷ":"y","ÿ":"y","ẏ":"y","ỵ":"y","ỳ":"y","ƴ":"y","ỷ":"y","ỿ":"y","ȳ":"y","ẙ":"y","ɏ":"y","ỹ":"y","ź":"z","ž":"z","ẑ":"z","ʑ":"z","ⱬ":"z","ż":"z","ẓ":"z","ȥ":"z","ẕ":"z","ᵶ":"z","ᶎ":"z","ʐ":"z","ƶ":"z","ɀ":"z","ﬀ":"ff","ﬃ":"ffi","ﬄ":"ffl","ﬁ":"fi","ﬂ":"fl","ĳ":"ij","œ":"oe","ﬆ":"st","ₐ":"a","ₑ":"e","ᵢ":"i","ⱼ":"j","ₒ":"o","ᵣ":"r","ᵤ":"u","ᵥ":"v","ₓ":"x"};
        String.prototype.latinise=function(){return this.replace(/[^A-Za-z0-9\[\] ]/g,function(a){return Latinise.latin_map[a]||a})};
        String.prototype.latinize=String.prototype.latinise;
        String.prototype.isLatin=function(){return this==this.latinise()}

        // arrays of all big towns in Slovakia
        var krajKonkretny;
        var prehladavanyKraj;
        var bratislavskyKraj = ['bratislava', 'malacky', 'pezinok', 'senec'];
        var trnavskyKraj     = ['dunajska streda', 'galanta', 'hlohovec', 'piestany', 'senica', 'skalica', 'trnava'];
        var trencianskyKraj  = ['banovce nad bebravou','ilava', 'myjava', 'nove mesto nad vahom',
                                'partizanske', 'povazska bystrica', 'prievidza', 'puchov', 'trencin'];
        var nitriansKraj     = ['komarno', 'levice', 'nitra', 'nove zamky', 'sala', 'topolcany', 'zlate moravce'];
        var zilinskyKraj     = ['bytca', 'cadca', 'dolny kubin', 'kysucke nove mesto', 'liptovsky mikulas', 'martin',
                                'namestovo', 'ruzomberok', 'turcianske teplice', 'tvrdosin', 'zilina'];
        var banskobystrickyKyraj = 	['banska bystrica', 'banska stiavnica', 'brezno', 'detva', 'krupina', 'lucenec', 'poltar', 'revuca',
                                    'rimavska sobota', 'velky krtis', 'zvolen', 'zarnovica', 'ziar nad hronom'];
        var presovskyKraj    = ['bardejov', 'humenne', 'kezmarok', 'levoca', 'medzilaborce', 'poprad', 'presov', 'sabinov',
                                'snina', 'stara lubovna', 'stropkov', 'svidnik', 'vranov nad toplou'];
        var kosickyKraj      = ['gelnica', 'kosice', 'michalovce', 'roznava', 'sobrance', 'spisska nova ves', 'trebisov'];


        //when click somewhere on map, its fadeout and remove all list item which is not about terapeut
        $('svg').on('click', function(e){

                //get a name of region in which we are finding a terapeuts
                var kraj = e.target;
                krajKonkretny = kraj.getAttribute('data-name');

                //fadeotu maps after click event
                $('.maps_slovakia').fadeOut(1000);

                //remove not terapeuts list items
                $('.job_listing_type-cvici').remove();
                $('.job_listing_type-docvicila').remove();
                $('.job_types').remove();

                //save a clicked region
                switch(krajKonkretny) {
                    case "Bratislavský":
                        prehladavanyKraj = bratislavskyKraj
                        break;
                    case "Trnavský":
                        prehladavanyKraj = trnavskyKraj
                        break;
                    case "Trenčianský":
                        prehladavanyKraj = trencianskyKraj
                        break;
                    case "Nitrianský":
                        prehladavanyKraj = nitriansKraj
                        break;
                    case "Žilinský":
                        prehladavanyKraj = zilinskyKraj
                        break;
                    case "Banskobystrický":
                        prehladavanyKraj = banskobystrickyKyraj
                        break;
                    case "Prešovský":
                        prehladavanyKraj = presovskyKraj
                        break;
                    case "Košický":
                        prehladavanyKraj = kosickyKraj
                        break;
                    default:
                        prehladavanyKraj = bratislavskyKraj
                }
        });

        /* ----------------------------------------------------------- */
        /*  12. Dirty register terapeut changing
         /* ----------------------------------------------------------- */

        //delete string, because we cant find this string in plugin code
        var text = $('#submit-job-form > fieldset:nth-child(2) > label:nth-child(1)');
        if ( text.text() == "Your email " ){
            text.remove()
        }

        // variables for story and terapeuts pages
        var terapeutForm = $('#post-555');
        var terapeutList = $('#post-582');
        var storyForm = $('#post-470');
        var storyList = $('#post-498');

        //string descriptions and elements delete for page about terapeut registrations
        if ( terapeutForm.hasClass('page post-555 type-page status-publish hentry' )){

            $('.level-0').first().remove();
            $('.level-0').last().remove();
            $('.fieldset-job_title > label:nth-child(1)').text('Telefónne číslo (povinné)');
            $('.fieldset-job_description > label:nth-child(1)').text('Ako cvičíte s detičkami?');
            $('.fieldset-job_type').css({display:'none'});
            $('small.description:nth-child(2)').text('Ak vyplníte rodičia si Vás budu môcť vyhľadať podľa kraja');
            $('#job_location');

        }

        //string descriptions and elements delete for page about story registrations
        else if ( storyForm.hasClass('page post-470 type-page status-publish hentry' )){

            $('option.level-0:nth-child(2)').remove();
        }

        // remove items about terapeuts from list after loading story list
        else if ( storyList.hasClass('page post-498 type-page status-publish hentry' )){

            document.addEventListener("DOMContentLoaded", function(event) {
                $('.job_listing_type-terapeut').remove();
                $('.job_types > li:nth-child(2) > div:nth-child(1)').remove();
            });
        }

        // remove items about stories and terapeuts fromnot choosen regions after choose region
        else if ( terapeutList.hasClass('page post-582 type-page status-publish hentry' )){

            $('svg').on('click',function() {

                // array of all teraputs towns
                var kraje = $('.location');

                for (var i = 0; kraje.length > i; i++) {

                    var mesto = kraje[i].innerText;
                    mesto = mesto.trim().toLowerCase().latinise();
                    var jobs = $('.job_listing_type-terapeut');
                    var isNotEmpty;

                    for (var j = 0; prehladavanyKraj.length > j; j++) {

                        if (mesto == prehladavanyKraj[j]) {

                            isNotEmpty = 0;
                            break;
                        }

                        continue;
                    }

                    if ( mesto!=prehladavanyKraj[j] ) {
                        jobs[i].classList.add("remove");
                    }
                }

                // when nothing found popup window with message
                if ( isNotEmpty != 0 ){
                    alert('Pre dany kraj nemame zaznam o ziadnom terapeutvi');
                }
            });
        }

        // scroll body to 0px on click
      $('#back-top a').click(function(e) {
          e.preventDefault();
          $('body,html').animate({
              scrollTop: 0
          }, 400);
          return false;
      });
    }

    // Parallax background
    $.stellar({
        positionProperty: 'transform',
        horizontalScrolling: false
    });

    $("select").addClass("form-control");

  
    var $menulink1 = $('.menu-link__secondary'),
        $menulink2 = $('.menu-link__tertiary'),
        $wrap = $('.site-wrapper');

        $menulink1.click(function() {
            $menulink1.toggleClass('active-left');
            $wrap.toggleClass('active-left');
            return false;
         });

        $menulink2.click(function() {
            $menulink2.toggleClass('active-right');
            $wrap.toggleClass('active-right');
            return false;
        });



    // Check if select field is not hidden than add .select-style wrapper (chosen styles fix)
    $(window).load(function() {
        $('.job-manager-form select.postform').each(function(){
            if( $(this).css('display') != 'none') {
                $(this).wrap('<div class="select-style"/>') 
            }
        });
    });
  
})(jQuery);