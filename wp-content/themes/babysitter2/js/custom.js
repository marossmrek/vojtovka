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

        $('svg').on('click', function(e){
            var kraj = e.target;
            console.log(kraj.getAttribute('data-name'));
        })

        /* ----------------------------------------------------------- */
        /*  12. Dirty register terapeut changing
         /* ----------------------------------------------------------- */
        /*$('#submit-job-form > fieldset:nth-child(2) > label:nth-child(1)').remove();*/
        /*$('.job-manager-error').text('Vyplnte všetke povinné polia');*/
        var text = jQuery('#submit-job-form > fieldset:nth-child(2) > label:nth-child(1)');
        if(text.text()=="Your email "){text.remove()}
        var terapeutForm = $('#post-555');
        var storyForm = $('#post-470');
        if(terapeutForm.hasClass('page post-555 type-page status-publish hentry')){
            $('.level-0').first().remove();
            $('.level-0').last().remove();
            $('.fieldset-job_title > label:nth-child(1)').text('Telefónne číslo (povinné)');
            $('.fieldset-job_description > label:nth-child(1)').text('Ako cvičíte s detičkami?');
            $('.fieldset-job_type').css({display:'none'});
            $('small.description:nth-child(2)').text('Ak vyplníte rodičia si Vás budu môcť vyhľadať podľa kraja');
            $('#job_location');
        }
        else if(storyForm.hasClass('page post-470 type-page status-publish hentry')){
                $('option.level-0:nth-child(2)').remove();
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