<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = 'babysitter_data';

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'babysitter_data',
        'dev_mode' => FALSE,
        'disable_tracking' => TRUE,
        'use_cdn' => TRUE,
        'display_name' => $theme->get( 'Name' ),
        'display_version' => $theme->get( 'Version' ),
        'page_slug' => '_options',
        'page_title' => 'Theme Options',
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Theme Options',
        'admin_bar_icon' => 'dashicons-admin-generic',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'hints' => array(
          'icon'          => 'el el-question-sign',
          'icon_position' => 'right',
          'icon_size'     => 'normal',
          'tip_style'     => array(
            'color' => 'dark',
          ),
          'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
          ),
          'tip_effect' => array(
            'show' => array(
              'duration' => '500',
              'event'    => 'mouseover',
            ),
            'hide' => array(
              'duration' => '500',
              'event'    => 'mouseleave unfocus',
            ),
          ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */




    /*
     *
     * ---> START SECTIONS
     *
     */

    // ACTUAL DECLARATION OF SECTIONS
    Redux::setSection( $opt_name, array(
      'title'     => __('General Settings', 'babysitter'),
      'icon'      => 'el-icon-cogs',
      'fields'    => array(
        array(
          'id'        => 'babysitter__google-map-api-key-notice',
          'type'      => 'info',
          'notice'    => true,
          'icon'      => 'el el-icon-info-circle',
          'style'     => 'info',
          'title'     => __('Google Map API Key', 'babysitter'),
          'desc'      => __('You must generate Google Map API Key to use Google Maps.', 'babysitter')
        ),
        array(
          'id'        => 'babysitter__google-map-api-key',
          'type'      => 'text',
          'title'     => __('Google Map API Key', 'babysitter'),
          'subtitle'  => __('Enter your key.', 'babysitter'),
          'desc'      => __('Usage of the Google Maps APIs now requires a key. Please read more about <a href="https://danfisher.ticksy.com/article/7834">here</a>.', 'babysitter'),
          'default'   => ''
        ),
        array(
          'id'        => 'favicon',
          'type'      => 'media',
          'url'       => true,
          'title'     => __('Custom Favicon', 'babysitter'),
          'compiler'  => 'true',
          //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
          'desc'      => __('Default favicon.', 'babysitter'),
          'subtitle'  => __('Format: ico, Size: 16x16', 'babysitter'),
          'default'   => array('url' => get_template_directory_uri() . '/images/favicon.ico'),
          'width'     => '',
          'height'    => ''
        ),
        array(
          'id'        => 'iphone_icon_retina',
          'type'      => 'media',
          'url'       => true,
          'title'     => __('iPhone Favicon', 'babysitter'),
          'compiler'  => 'true',
          //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
          'desc'      => __('iPhone with high-resolution Retina display running iOS ≥ 7', 'babysitter'),
          'subtitle'  => __('Format: png, Size: 120x120', 'babysitter'),
          'default'   => array(
            'url'     => get_template_directory_uri() . '/images/apple-touch-icon-120x120.png'),
          'width'     => '',
          'height'    => ''
        ),
        array(
          'id'        => 'ipad_icon_retina',
          'type'      => 'media',
          'url'       => true,
          'title'     => __('iPad Favicon', 'babysitter'),
          'compiler'  => 'true',
          //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
          'desc'      => __('For iPad with high-resolution Retina display running iOS ≥ 7. General use iOS/Android icon, auto-downscaled by devices.', 'babysitter'),
          'subtitle'  => __('Format: png, Size: 152x152', 'babysitter'),
          'default'   => array(
            'url'     => get_template_directory_uri() . '/images/apple-touch-icon-152x152.png'),
          'width'     => '',
          'height'    => ''
        ),
        array(
          'id'            => 'tracking_code',
          'type'          => 'textarea',
          'title'         => __('Tracking Code', 'babysitter'),
          'subtitle'      => __('Google Analytics or similar', 'babysitter'),
          'desc'          => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'babysitter'),
          'validate'      => '',
          'default'       => '',
          'allowed_html'  => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
        ),
        array(
          'id'        => 'breadcrumbs',
          'type'      => 'switch',
          'title'     => __('Breadcrumbs', 'babysitter'),
          'subtitle'  => __('Breadcrumbs are displayed by default.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
      )
    ) );


    // Header Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Header', 'babysitter'),
      'icon'      => 'el-icon-home',
      'fields'    => array(
        array(
          'id'        => 'babysitter__header-top-bar',
          'type'      => 'switch',
          'title'     => __('Header Top Bar', 'babysitter'),
          'desc'      => __('Top Bar located at the top of the header.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'logo-standard',
          'type'      => 'media',
          'url'       => true,
          'title'     => __('Logo', 'babysitter'),
          'compiler'  => 'true',
          //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
          'desc'      => __('Upload your image or remove image if you want to use text-based logo.', 'babysitter'),
          'default'   => array(
            'url'     => get_template_directory_uri() . '/images/logo.png'),
          'width'     => '',
          'height'    => '',
        ),
        array(
          'id'        => 'babysitter__header-phone-title',
          'type'      => 'text',
          'title'     => __('Phone Title', 'babysitter'),
          'subtitle'  => __('Text before phone number.', 'babysitter'),
          'desc'      => __('Enter short text used before phone number.', 'babysitter'),
          'validate'  => 'not_empty',
          'msg'       => 'Fill Phone Title',
          'default'   => 'Call us on:'
        ),
        array(
          'id'        => 'babysitter__header-phone-number',
          'type'      => 'text',
          'title'     => __('Phone Number', 'babysitter'),
          'desc'      => __('Enter phone number.', 'babysitter'),
          'msg'       => 'Fill Phone Number',
          'default'   => ' +1 800 300 4000'
        ),
        array(
          'id'        => 'babysitter__header-email-title',
          'type'      => 'text',
          'title'     => __('Email Title', 'babysitter'),
          'subtitle'  => __('Text before email address.', 'babysitter'),
          'desc'      => __('Enter short text used before email address.', 'babysitter'),
          'msg'       => 'Fill Email Title',
          'default'   => ''
        ),
        array(
          'id'        => 'babysitter__header-email',
          'type'      => 'text',
          'title'     => __('Email Address', 'babysitter'),
          'subtitle'  => __('Email Address used in the header.', 'babysitter'),
          'desc'      => __('Enter email address.', 'babysitter'),
          'validate'  => 'email',
          'msg'       => 'Fill Email Address',
          'default'   => ''
        ),
        array(
          'id'        => 'babysitter__header-links',
          'type'      => 'switch',
          'title'     => __('Header Social Links', 'babysitter'),
          'subtitle'  => __('Header Social Link are displayed by default.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'babysitter__header-links-color',
          'type'      => 'switch',
          'title'     => __('Colored Social Links?', 'babysitter'),
          'subtitle'  => __('Header Social Link are colored by default.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Yes',
          'off'       => 'No',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-links-type',
          'type'      => 'switch',
          'title'     => __('Rounded Social Links?', 'babysitter'),
          'subtitle'  => __('Header Social Link are rounded by default.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Yes',
          'off'       => 'No',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-fb',
          'type'      => 'text',
          'title'     => __('Facebook', 'babysitter'),
          'subtitle'  => __('Link to your Facebook account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-twitter',
          'type'      => 'text',
          'title'     => __('Twitter', 'babysitter'),
          'subtitle'  => __('Link to your Twitter account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-linkedin',
          'type'      => 'text',
          'title'     => __('Linkedin', 'babysitter'),
          'subtitle'  => __('Link to your Linkedin account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-google-plus',
          'type'      => 'text',
          'title'     => __('Google+', 'babysitter'),
          'subtitle'  => __('Link to your Google+ account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-pinterest',
          'type'      => 'text',
          'title'     => __('Pinterest', 'babysitter'),
          'subtitle'  => __('Link to your Pinterest account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-youtube',
          'type'      => 'text',
          'title'     => __('YouTube', 'babysitter'),
          'subtitle'  => __('Link to your YouTube account.', 'babysitter'),
          'default'   => '',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-instagram',
          'type'      => 'text',
          'title'     => __('Instagram', 'babysitter'),
          'subtitle'  => __('Link to your Instagram account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-tumblr',
          'type'      => 'text',
          'title'     => __('Tumblr', 'babysitter'),
          'subtitle'  => __('Link to your Tumblr account.', 'babysitter'),
          'default'   => '',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-dribbble',
          'type'      => 'text',
          'title'     => __('Dribbble', 'babysitter'),
          'subtitle'  => __('Link to your Dribbble account.', 'babysitter'),
          'default'   => '',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-vimeo',
          'type'      => 'text',
          'title'     => __('Vimeo', 'babysitter'),
          'subtitle'  => __('Link to your Vimeo account.', 'babysitter'),
          'default'   => '',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-flickr',
          'type'      => 'text',
          'title'     => __('Flickr', 'babysitter'),
          'subtitle'  => __('Link to your Flickr account.', 'babysitter'),
          'default'   => '',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-yelp',
          'type'      => 'text',
          'title'     => __('Yelp', 'babysitter'),
          'subtitle'  => __('Link to your Yelp account.', 'babysitter'),
          'default'   => '#',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
        array(
          'id'        => 'babysitter__header-social-rss',
          'type'      => 'text',
          'title'     => __('RSS Feed', 'babysitter'),
          'subtitle'  => __('Link to your RSS Feed.', 'babysitter'),
          'default'   => '',
          'required'  => array('babysitter__header-links', '=', '1'),
        ),
      )
    ) );



    // Slider Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Main Slider', 'babysitter'),
      'icon'      => 'el-icon-picture',
      'fields'    => array(
        $fields = array(
          'id'          => 'babysitter__slides',
          'type'        => 'slides',
          'title'       => __('Slides', 'babysitter'),
          'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'babysitter'),
          'desc'        => __('You can upload slide image with any height/width but recommended size is 1100x480. Also fill the Title, Description and Link field. To add more slides click on "Add Slide" and repeat steps above.', 'babysitter'),
          'placeholder' => array(
            'title'           => __('This is a title', 'babysitter'),
            'description'     => __('Description Here', 'babysitter'),
            'url'             => __('Give us a link!', 'babysitter'),
          ),
        ),
        array(
          'id'            => 'babysitter__slider-speed',
          'type'          => 'slider',
          'title'         => __('Delay between slides', 'babysitter'),
          'subtitle'      => __('Set the speed of the slideshow cycling, in seconds.', 'babysitter'),
          'desc'          => __('Recommended value is 7 secs.', 'babysitter'),
          'default'       => 7,
          'min'           => 2,
          'step'          => 1,
          'max'           => 20,
          'display_value' => 'label'
        ),
        array(
          'id'        => 'babysitter__slider-controls',
          'type'      => 'switch',
          'title'     => __('Show Pagination?', 'babysitter'),
          'subtitle'  => __('Slider controls (bullets).', 'babysitter'),
          'default'   => 1,
          'on'        => 'On',
          'off'       => 'Off',
        ),
        array(
          'id'        => 'babysitter__slider-nav',
          'type'      => 'switch',
          'title'     => __('Show Prev/Next?', 'babysitter'),
          'subtitle'  => __('Slider controls (prev/next).', 'babysitter'),
          'default'   => 1,
          'on'        => 'On',
          'off'       => 'Off',
        ),
        array(
          'id'        => 'babysitter__slider-autoplay',
          'type'      => 'switch',
          'title'     => __('Autoplay', 'babysitter'),
          'subtitle'  => __('Slideshow starts automatically.', 'babysitter'),
          'default'   => 1,
          'on'        => 'On',
          'off'       => 'Off',
        ),
        array(
          'id'        => 'babysitter__slider-loop',
          'type'      => 'switch',
          'title'     => __('Infinite Loop', 'babysitter'),
          'subtitle'  => __('Looped animation.', 'babysitter'),
          'default'   => 1,
          'on'        => 'On',
          'off'       => 'Off',
        ),
      )
    ) );



    // Blog Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Blog', 'babysitter'),
      'icon'      => 'el-icon-th-list',
      'fields'    => array(
        array(
          'id'        => 'opt-blog-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Sidebar Position', 'babysitter'),
          'subtitle'  => __('Select sidebar alignment or disable it.', 'babysitter'),
          'options'   => array(
              '1' => array(
                'alt' => 'Right Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              '2' => array(
                'alt' => 'Left Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
              '3' => array(
                'alt' => 'No Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/1col.png')
          ),
          'default'   => '1'
        ),
        array(
          'id'        => 'babysitter__blog-image-size',
          'type'      => 'select',
          'title'     => __('Thumbnail Size', 'babysitter'),
          'subtitle'  => __('Blog Thumbnail Size', 'babysitter'),
          'desc'      => __('Choose your blogs\'s thumbnail size', 'babysitter'),
          'options'   => array(
            '1' => 'Large', 
            '2' => 'Medium'
          ),
          'default'   => '1'
        ),
        array(
          'id'        => 'opt-blog-title',
          'type'      => 'text',
          'title'     => __('Blog Page Title', 'babysitter'),
          'subtitle'  => __('This title used on Blog Page', 'babysitter'),
          'desc'      => __('Enter Your Blog Title used on Blog page.', 'babysitter'),
          'validate'  => 'not_empty',
          'msg'       => 'Fill Blog Page title',
          'default'   => 'Blog'
        ),
        array(
          'id'        => 'babysitter__post-date-icon',
          'type'      => 'switch',
          'title'     => __('Blog Date', 'babysitter'),
          'subtitle'  => __('Show/hide date icon on blog and single post pages.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-post-image',
          'type'      => 'switch',
          'title'     => __('Featured Image on Single Post', 'babysitter'),
          'subtitle'  => __('Show/hide featured images on single post pages.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-post-title',
          'type'      => 'switch',
          'title'     => __('Post Title on Single Post', 'babysitter'),
          'subtitle'  => __('Show/hide the post title that goes below the featured images.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-info-box',
          'type'      => 'switch',
          'title'     => __('Author Info Box on Single Post', 'babysitter'),
          'subtitle'  => __('Show/hide the author info box below posts.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-social-box',
          'type'      => 'switch',
          'title'     => __('Social Sharing Box', 'babysitter'),
          'subtitle'  => __('Show/hide the social sharing box.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'babysitter__blog-more-txt',
          'type'      => 'text',
          'title'     => __('Read More Text', 'babysitter'),
          'desc'      => __('Enter button text for post. Example <em>\'Read More\'</em>', 'babysitter'),
          'validate'  => 'not_empty',
          'msg'       => 'Fill Read More button text',
          'default'   => 'Read More'
        ),
        array(
          'id'        => 'babysitter__blog-login-page',
          'type'      => 'select',
          'data'      => 'pages',
          'title'     => __('Comments Login Page', 'babysitter'),
          'subtitle'  => __('Login page on your site.', 'babysitter'),
          'desc'      => __('Choose a page where you paste <code>[clean-login]</code> shortcode.', 'babysitter'),
        )
      )
    ) );



    // Contact Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Contacts', 'babysitter'),
      'icon'      => 'el-icon-envelope',
      'fields'    => array(
        array(
          'id'        => 'opt-contact-gmap',
          'type'      => 'switch',
          'title'     => __('Google Map', 'babysitter'),
          'subtitle'  => __('Show/hide Google Map.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-contact-coordinates',
          'type'      => 'text',
          'title'     => __('Google Map Coordinates 1', 'babysitter'),
          'subtitle'  => __('Put your 1st address here.', 'babysitter'),
          'desc'      => __('Go to <a href="https://www.google.com/maps/">Google Map</a>, copy and paste your coordinates.', 'babysitter'),
          'default'   => '57.669645,11.926832',
        ),
        array(
          'id'        => 'opt-contact-coordinates2',
          'type'      => 'text',
          'title'     => __('Google Map Coordinates 2', 'babysitter'),
          'subtitle'  => __('Put your 2nd address here.', 'babysitter'),
          'desc'      => __('Go to <a href="https://www.google.com/maps/">Google Map</a>, copy and paste your coordinates.', 'babysitter'),
          'default'   => '',
        ),
        array(
          'id'        => 'babysitter__map-center-coordinates',
          'type'      => 'text',
          'title'     => __('Map Center Coordinates', 'babysitter'),
          'subtitle'  => __('Coordinates for centering map.', 'babysitter'),
          'desc'      => __('Leave blank if you use single address.', 'babysitter'),
          'default'   => '',
        ),
        array(
          'id'            => 'opt-contact-zoom',
          'type'          => 'slider',
          'title'         => __('Map Zoom Level', 'babysitter'),
          'subtitle'      => __('Used in Google Map.', 'babysitter'),
          'desc'          => __('Higher number will be more zoomed in.', 'babysitter'),
          'default'       => 13,
          'min'           => 1,
          'step'          => 1,
          'max'           => 19,
          'display_value' => 'label'
        ),

        array(
          'id'    => 'opt-contact-divider1',
          'type'  => 'divide'
        ),

        array(
          'id'        => 'opt-contact-info',
          'type'      => 'switch',
          'title'     => __('Contact Info', 'babysitter'),
          'subtitle'  => __('Show/hide contact info section.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-contact-title',
          'type'      => 'text',
          'title'     => __('Contact Info Title', 'babysitter'),
          'subtitle'  => __('Title used in Contact Info section.', 'babysitter'),
          'default'   => 'Contact Us',
        ),
        array(
          'id'        => 'opt-contact-address',
          'type'      => 'text',
          'title'     => __('Address', 'babysitter'),
          'subtitle'  => __('Address used in the Contact Info section.', 'babysitter'),
          'default'   => 'Babysitter Co., Old Town Avenue, New York, USA 23000',
        ),
        array(
          'id'        => 'opt-contact-address2',
          'type'      => 'text',
          'title'     => __('Address 2', 'babysitter'),
          'subtitle'  => __('Address used in the Contact Info section for the 2nd office.', 'babysitter'),
          'default'   => '',
        ),
        array(
          'id'        => 'opt-contact-phone',
          'type'      => 'multi_text',
          'title'     => __('Phone(s)', 'babysitter'),
          'subtitle'  => __('Phone numbers used in the Contact Info section.', 'babysitter'),
          'desc'      => __('You can add as more numbers as you want.', 'babysitter'),
          'default'   => array(
            1 => '+1 700 124-5678'
          )
        ),
        array(
          'id'        => 'opt-contact-fax',
          'type'      => 'multi_text',
          'title'     => __('Fax(s)', 'babysitter'),
          'subtitle'  => __('Fax numbers used in the Contact Info section.', 'babysitter'),
          'desc'      => __('You can add as more numbers as you want.', 'babysitter'),
        ),
        array(
          'id'        => 'opt-contact-email',
          'type'      => 'multi_text',
          'title'     => __('Email(s)', 'babysitter'),
          'subtitle'  => __('Emails used in the Contact Info section.', 'babysitter'),
          'desc'      => __('You can add as more emails as you want.', 'babysitter'),
          'validate'  => 'email',
          'default'   => array(
            1 => 'info@dan-fisher.com'
          )
        ),
        array(
          'id'        => 'opt-contact-hours',
          'type'      => 'text',
          'title'     => __('Working Hours', 'babysitter'),
          'subtitle'  => __('Info your schedule.', 'babysitter'),
          'default'   => 'Monday - Friday 9:00 - 21:00',
        ),
      )
    ) );



    // Footer Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Footer', 'babysitter'),
      'icon'      => 'el-icon-align-center',
      'fields'    => array(
        array(
          'id'        => 'opt-footer-widgets',
          'type'      => 'switch',
          'title'     => __('Footer Widgets', 'babysitter'),
          'subtitle'  => __('Footer Widgets are displayed by default.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-footer-widgets-layout',
          'type'      => 'image_select',
          'required'  => array('opt-footer-widgets', '=', '1'),
          'compiler'  => true,
          'title'     => __('Footer Widgets Layout', 'babysitter'),
          'subtitle'  => __('Select footer widgets layout (not equal or equal).', 'babysitter'),
          'options'   => array(
            '1' => array(
              'alt' => '4 Columns',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols1.png'),
            '2' => array(
              'alt' => '4 Columns (equal)',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols2.png'),
            '3' => array(
              'alt' => '3 Columns (left wider)',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols3.png'),
            '4' => array(
              'alt' => '3 Columns (right wider)',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols4.png'),
            '5' => array(
              'alt' => '3 Columns (equal)',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols5.png'),
            '6' => array(
              'alt' => '2 Columns (right wider)',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols6.png'),
            '7' => array(
              'alt' => '2 Columns (left wider)',
              'img' => get_template_directory_uri() . '/images/admin/footer-cols7.png'),
          ),
          'default'   => '2'
        ),
        array(
          'id'        => 'opt-footer-copyright',
          'type'      => 'switch',
          'title'     => __('Copyright', 'babysitter'),
          'subtitle'  => __('Footer Copyright is displayed by default.', 'babysitter'),
          'default'   => 1,
          'on'        => 'Show',
          'off'       => 'Hide',
        ),
        array(
          'id'        => 'opt-footer-text-primary',
          'type'      => 'editor',
          'required'  => array('opt-footer-copyright', '=', '1'),
          'title'     => __('Copyright Text Primary', 'babysitter'),
          'subtitle'  => __('Add copyright text here.', 'babysitter'),
          'default'   => 'Copyright &copy; 2015 <a href="http://themeforest.net/item/babysitter-responsive-wordpress-theme/5702597?ref=dan_fisher">Babysitter</a> | All rights reserved',
          'compiler'  => true,
          'args'      => array(
            'teeny'         => true,
            'media_buttons' => false,
            'quicktags'     => true,
            'textarea_rows' => 2,
          )
        ),
        array(
          'id'        => 'opt-footer-text-secondary',
          'type'      => 'editor',
          'required'  => array('opt-footer-copyright', '=', '1'),
          'title'     => __('Copyright Text Secondary', 'babysitter'),
          'subtitle'  => __('Add copyright text here.', 'babysitter'),
          'default'   => 'Created by <a href="http://themeforest.net/user/dan_fisher/portfolio?ref=dan_fisher">Dan Fisher</a>',
          'compiler'  => true,
          'args'      => array(
            'teeny'         => true,
            'media_buttons' => false,
            'quicktags'     => true,
            'textarea_rows' => 2,
          )
        ),
      )
    ) );




    // Typography Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Typography', 'babysitter'),
      'icon'      => 'el-icon-font',
      'fields'    => array(
        array(
          'id'        => 'typography-body',
          'type'      => 'typography',
          'title'     => __('Body Font', 'babysitter'),
          'subtitle'  => __('Specify the body font properties.', 'babysitter'),
          'google'    => true,
          'output'    => array('body'),
          'units'     => 'px',
          'default'   => array(
            'color'         => '#8c8c8c',
            'font-size'     => '14px',
            'font-family'   => 'Open Sans',
            'google'        => true,
            'font-weight'   => '300',
            'line-height'   => '24px',
            'text-align'    => 'left',
          ),
        ),
        array(
          'id'          => 'babysitter__logo-txt',
          'type'        => 'typography',
          'title'       => __('Logo Text', 'babysitter'),
          'subtitle'    => __('Specify the Logo (Text-based) font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.logo h1 > a, .logo h2 > a'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#fc8a58',
            'font-size'     => '42px',
            'font-family'   => 'Kavoon',
            'google'        => true,
            'font-weight'   => '400',
          ),
          'hint'        => array(
            'content'   => __( 'You can see the changes only for Text-based Logo', 'babysitter' ),
          )
        ),
        array(
          'id'          => 'babysitter__tagline',
          'type'        => 'typography',
          'title'       => __('Tagline', 'babysitter'),
          'subtitle'    => __('Specify the tagline font properties.', 'babysitter'),
          'subtitle'    => __('Tagline goes after the Logo in the Header.', 'babysitter'),
          'google'      => true,
          'output'      => array('.header .logo .tagline'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#d7d7d7',
            'font-size'     => '12px',
            'font-family'   => 'Open Sans',
            'google'        => true,
            'font-style'    => 'italic',
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'babysitter__typography-top-bar',
          'type'        => 'typography',
          'title'       => __('Header Top Bar', 'babysitter'),
          'subtitle'    => __('Specify the Header Top Bar font properties.', 'babysitter'),
          'google'      => true,
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'font-size'      => '12px',
            'font-family'    => 'Open Sans',
            'font-weight'    => '300',
            'color'          => '#8c8c8c'
          ),
        ),
        array(
          'id'          => 'typography-nav',
          'type'        => 'typography',
          'title'       => __('Menu Font', 'babysitter'),
          'subtitle'    => __('Specify the main navigation font properties.', 'babysitter'),
          'google'      => true,
          'units'       => 'px',
          'color'       => false,
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'font-size'     => '18px',
            'font-family'   => 'Kavoon',
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-h1',
          'type'        => 'typography',
          'title'       => __('H1 Heading', 'babysitter'),
          'subtitle'    => __('Specify the H1 heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('h1'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '32px',
            'font-family'   => 'Kavoon',
            'google'        => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-h2',
          'type'        => 'typography',
          'title'       => __('H2 Heading', 'babysitter'),
          'subtitle'    => __('Specify the H2 heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('h2'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '24px',
            'font-family'   => 'Kavoon',
            'google'        => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-h3',
          'type'        => 'typography',
          'title'       => __('H3 Heading', 'babysitter'),
          'subtitle'    => __('Specify the H3 heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('h3'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '20px',
            'font-family'   => 'Kavoon',
            'google' => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-h4',
          'type'        => 'typography',
          'title'       => __('H4 Heading', 'babysitter'),
          'subtitle'    => __('Specify the H4 heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('h4'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '18px',
            'font-family'   => 'Kavoon',
            'google' => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-h5',
          'type'        => 'typography',
          'title'       => __('H5 Heading', 'babysitter'),
          'subtitle'    => __('Specify the H5 heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('h5'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '16px',
            'font-family'   => 'Kavoon',
            'google' => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-h6',
          'type'        => 'typography',
          'title'       => __('H6 Heading', 'babysitter'),
          'subtitle'    => __('Specify the H6 heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('h6'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '14px',
            'font-family'   => 'Kavoon',
            'google' => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-heading-bordered',
          'type'        => 'typography',
          'title'       => __('Title Bordered', 'babysitter'),
          'subtitle'    => __('Specify the title bordered font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.title-bordered h2'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#454545',
            'font-size'     => '24px',
            'font-family'   => 'Open Sans',
            'google'        => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-breadcrumbs',
          'type'        => 'typography',
          'title'       => __('Breadcrumbs Font', 'babysitter'),
          'subtitle'    => __('Specify the breadcrumbs font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.page-heading .breadcrumb > li'),
          'line-height' => false,
          'text-align'  => false,
          'color'       => false,
          'default'     => array(
            'font-size'     => '12px',
            'font-family'   => 'Open Sans',
            'google'        => true,
            'font-weight'   => '400',
          ),
        ),
        array(
          'id'          => 'typography-page-heading',
          'type'        => 'typography',
          'title'       => __('Page Heading Font', 'babysitter'),
          'subtitle'    => __('Specify the page heading font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.page-heading h1'),
          'units'       => 'px',
          'line-height' => false,
          'text-align'  => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '32px',
            'font-family'   => 'Kavoon',
            'google'        => true,
            'font-weight'   => '400'
          ),
        ),
        array(
          'id'          => 'typography-heading-post',
          'type'        => 'typography',
          'title'       => __('Blog Post Title', 'babysitter'),
          'subtitle'    => __('Specify the post title font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.post .entry-header .entry-title, .post .entry-header .entry-title a'),
          'units'       => 'px',
          'text-align'  => false,
          'default'     => array(
            'color'         => '#444',
            'font-size'     => '24px',
            'font-family'   => 'Kavoon',
            'google'        => true,
            'font-weight'   => '400',
            'line-height'   => '28px',
          ),
        ),
        array(
          'id'          => 'typography-sidebar-heading',
          'type'        => 'typography',
          'title'       => __('Sidebar Widget Heading', 'babysitter'),
          'subtitle'    => __('Specify the Sidebar widget title font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.widget__sidebar .widget-title h3'),
          'units'       => 'px',
          'line-height' => false,
          'default'     => array(
            'color'         => '#454545',
            'font-size'     => '18px',
            'font-family'   => 'Open Sans',
            'google'        => true,
            'font-weight'   => '400'
          ),
        ),
        array(
          'id'          => 'typography-footer-heading',
          'type'        => 'typography',
          'title'       => __('Footer Widget Heading', 'babysitter'),
          'subtitle'    => __('Specify the footer widget title font properties.', 'babysitter'),
          'google'      => true,
          'output'      => array('.widget__footer .widget-title'),
          'units'       => 'px',
          'line-height' => false,
          'default'     => array(
            'color'         => '#70b3d0',
            'font-size'     => '20px',
            'font-family'   => 'Kavoon',
            'google'        => true,
            'font-weight'   => '400',
            'text-align'    => 'left'
          ),
        ),
      )
    ) );


    // Styling Options
    Redux::setSection( $opt_name, array(
      'title'     => __('Styling', 'babysitter'),
      'icon'      => 'el-icon-tint',
      'fields'    => array(
        array(
          'id'          => 'color-primary',
          'type'        => 'color',
          'title'       => __('Primary Color', 'babysitter'),
          'subtitle'    => __('Pick a primary color.', 'babysitter'),
          'default'     => '#fc8a58',
          'validate'    => 'color',
          'transparent' => false
        ),
        array(
          'id'          => 'color-secondary',
          'type'        => 'color',
          'title'       => __('Secondary Color', 'babysitter'),
          'subtitle'    => __('Pick a secondary color.', 'babysitter'),
          'default'     => '#7fdbfd',
          'validate'    => 'color',
          'transparent' => false
        ),
        array(
          'id'          => 'color-tertiary',
          'type'        => 'color',
          'title'       => __('Tertiary Color', 'babysitter'),
          'subtitle'    => __('Pick a tertiary color.', 'babysitter'),
          'default'     => '#c4d208',
          'validate'    => 'color',
          'transparent' => false
        ),
        array(
          'id'          => 'color-quaternary',
          'type'        => 'color',
          'title'       => __('Quaternary Color', 'babysitter'),
          'subtitle'    => __('Pick a quaternary color.', 'babysitter'),
          'default'     => '#528cba',
          'validate'    => 'color',
          'transparent' => false
        ),
        array(
          'id'          => 'color-quinary',
          'type'        => 'color',
          'title'       => __('Quinary Color', 'babysitter'),
          'subtitle'    => __('Pick a quinary color.', 'babysitter'),
          'default'     => '#f0f7fa',
          'validate'    => 'color',
          'transparent' => false
        ),
        array(
          'id'          => 'color-senary',
          'type'        => 'color',
          'title'       => __('Senary Color', 'babysitter'),
          'subtitle'    => __('Pick a senary color.', 'babysitter'),
          'default'     => '#70b3d0',
          'validate'    => 'color',
          'transparent' => false
        ),
        array(
          'id'          => 'color-septenary',
          'type'        => 'color',
          'title'       => __('Septenary Color', 'babysitter'),
          'subtitle'    => __('Pick a septenary color.', 'babysitter'),
          'default'     => '#e8f2f7',
          'validate'    => 'color',
          'transparent' => false
        ),


        array(
          'id'    => 'opt-divide00',
          'type'  => 'divide'
        ),


        array(
          'id'        => 'babysitter__layout',
          'type'      => 'select',
          'title'     => __('Layout Mode', 'babysitter'),
          'desc'      => __('Choose your site’s layout either Boxed or Full Width', 'babysitter'),
          'options'   => array(
            '1' => 'Full Width', 
            '2' => 'Boxed'
          ),
          'default'   => '2'
        ),
        array(
          'id'        => 'babysitter__layout-spacing',
          'type'      => 'spacing',
          'output'    => array('.site-wrapper'),
          'mode'      => 'margin',
          'all'       => false,
          'left'      => false,
          'right'     => false,
          'units'     => 'px',
          'title'     => __('Wrapper Top/Bottom Margin', 'babysitter'),
          'desc'      => __('You can set top and bottom margin for the site wrapper.', 'babysitter'),
          'default'       => array(
            'margin-top'     => '42px', 
            'margin-bottom'  => '42px'
          )
        ),
        array(
          'id'        => 'babysitter__layout-border-radius',
          'type'      => 'spinner',
          'title'     => __('Wrapper Border Radius', 'babysitter'),
          'desc'      => __('You can set border radius for the site wrapper.', 'babysitter'),
          'default'   => '20',
          'min'       => '0',
          'step'      => '1',
          'max'       => '40',
          'required'  => array('babysitter__layout', '=', '2'),
        ),

        array(
          'id'    => 'opt-divide0',
          'type'  => 'divide'
        ),

        array(
          'id'          => 'body-bg',
          'type'        => 'background',
          'output'      => array('body'),
          'title'       => __('Body Background', 'babysitter'),
          'desc'        => __('Pick a background color. Also you can upload and set up background image.', 'babysitter'),
          'preview'     => true,
          'transparent' => false,
          'default'     => array(
            'background-color' => '#f1f7f9',
            'background-image'      => get_template_directory_uri() . '/images/pattern.gif',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center top',
            'background-attachment' => 'fixed',
            'background-size'       => 'inherit',
          ),
          'hint'        => array(
            //'title'   => '',
            'content'   => __( 'Enable Boxed layout to see changes.', 'babysitter' ),
          )
        ),

        array(
          'id'          => 'babysitter__holder-bg',
          'type'        => 'background',
          'output'      => array('.site-wrapper'),
          'title'       => __('Content Background', 'babysitter'),
          'desc'        => __('Pick a background color for the content. Also you can upload and set up background image.', 'babysitter'),
          'preview'     => true,
          'transparent' => false,
          'default'     => array(
            'background-color' => '#fff',
          ),
          'hint'        => array(
            //'title'   => '',
            'content'   => __( 'Enable Boxed layout to see changes.', 'babysitter' ),
          )
        ),

        array(
          'id'                    => 'header-main_bg',
          'type'                  => 'background',
          'output'                => array('.header-main'),
          'title'                 => __('Header Main Background Color', 'babysitter'),
          'subtitle'              => __('Background color for Header Middle Part', 'babysitter'),
          'preview'               => false,
          'transparent'           => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#fff',
          ),
        ),

        array(
          'id'                    => 'navbar_bg',
          'type'                  => 'background',
          'output'                => array('.header-menu-fullw .nav-main'),
          'title'                 => __('Navbar Background Color', 'babysitter'),
          'subtitle'              => __('Background color for Navigation Bar', 'babysitter'),
          'preview'               => false,
          'transparent'           => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#f0f7fa',
          ),
        ),

        array(
          'id'    => 'opt-divide1',
          'type'  => 'divide'
        ),


        array(
          'id'          => 'page-header-bg',
          'type'        => 'background',
          'output'      => array('.page-heading'),
          'title'       => __('Page Header Background', 'babysitter'),
          'subtitle'    => __('Page Header background options.', 'babysitter'),
          'preview'     => true,
          'transparent' => false,
          'default'     => array(
            'background-color'      => '#fff',
          )
        ),
        array(
          'id'        => 'babysitter__page-header-parallax-bg',
          'type'      => 'switch',
          'title'     => __('Page Header Background Parallax', 'babysitter'),
          'subtitle'  => __('Enables parallax effect for background.', 'babysitter'),
          'default'   => 2,
          'on'        => 'On',
          'off'       => 'Off',
          'hint'        => array(
            'content'   => __( 'Only works with Image based background for <strong>Page Header Background</strong> option', 'babysitter' ),
          )
        ),
        array(
          'id'            => 'babysitter__page-header-parallax-ratio',
          'type'          => 'slider',
          'title'         => __('Parallax Ratio', 'babysitter'),
          'subtitle'      => __('Parallax Ratio for Page Header Background.', 'babysitter'),
          'desc'          => __('The ratio is relative to the natural scroll speed, so a ratio of 0.5 would cause the element to scroll at half-speed, a ratio of 1 would have no effect, and a ratio of 2 would cause the element to scroll at twice the speed.', 'babysitter'),
          'default'       => 0.5,
          'min'           => 0.0,
          'step'          => 0.1,
          'max'           => 2,
          'resolution'    => 0.1,
          'display_value' => 'label',
          'required'      => array('babysitter__page-header-parallax-bg', '=', '1'),
          'hint'        => array(
            'content'   => __( 'Make sure that your image has enought height.', 'babysitter' ),
          )
        ),

        array(
          'id'          => 'babysitter__slider-bg',
          'type'        => 'background',
          'output'      => array('.slider-holder'),
          'title'       => __('Slider Background', 'babysitter'),
          'subtitle'    => __('Background for slider.', 'babysitter'),
          'desc'        => __('Pick a background color. Also you can upload and set up background image.', 'babysitter'),
          'preview'     => true,
          'transparent' => false,
          'default'     => array(
            'background-color'      => '#fff',
          ),
        ),

        array(
          'id'        => 'babysitter__slider-parallax-bg',
          'type'      => 'switch',
          'title'     => __('Slider Background Parallax', 'babysitter'),
          'subtitle'  => __('Enables parallax effect for background.', 'babysitter'),
          'default'   => 2,
          'on'        => 'On',
          'off'       => 'Off',
          'hint'        => array(
            'content'   => __( 'Only works with Image based background for <strong>Slider Background</strong> option', 'babysitter' ),
          )
        ),
        array(
          'id'            => 'babysitter__slider-parallax-ratio',
          'type'          => 'slider',
          'title'         => __('Parallax Ratio', 'babysitter'),
          'subtitle'      => __('Parallax Ratio for Slider Background.', 'babysitter'),
          'desc'          => __('The ratio is relative to the natural scroll speed, so a ratio of 0.5 would cause the element to scroll at half-speed, a ratio of 1 would have no effect, and a ratio of 2 would cause the element to scroll at twice the speed.', 'babysitter'),
          'default'       => 0.5,
          'min'           => 0.0,
          'step'          => 0.1,
          'max'           => 2,
          'resolution'    => 0.1,
          'display_value' => 'label',
          'required'      => array('babysitter__slider-parallax-bg', '=', '1'),
          'hint'        => array(
            'content'   => __( 'Make sure that your image has enought height.', 'babysitter' ),
          )
        ),


        array(
          'id'    => 'opt-divide4',
          'type'  => 'divide'
        ),

        array(
          'id'          => 'footer-widgets-bg',
          'type'        => 'background',
          'output'      => array('.footer-widgets'),
          'title'       => __('Footer Widgets Area Background', 'babysitter'),
          'subtitle'    => __('Footer Widgets Area background options.', 'babysitter'),
          'preview'     => true,
          'transparent' => false,
          'default'     => array(
            'background-color' => '#fafafa',
          ),
        ),
        array(
          'id'                    => 'footer-copyright_bg',
          'type'                  => 'background',
          'output'                => array('.footer-copyright'),
          'title'                 => __('Copyright Background', 'babysitter'),
          'subtitle'              => __('Background color for Copyright Bar in the Footer', 'babysitter'),
          'preview'               => false,
          'transparent'           => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#fff',
          ),
        ),
        array(
          'id'          => 'footer-text-color',
          'type'        => 'color',
          'output'      => array('.footer-copyright'),
          'title'       => __('Copyright Text Color', 'babysitter'),
          'subtitle'    => __('Pick a Footer text color.', 'babysitter'),
          'default'     => '#8c8c8c',
          'validate'    => 'color',
          'transparent' => false
        ),
      )
    ) );

    
    Redux::setSection( $opt_name, array(
      'icon'      => 'el-icon-briefcase',
      'title'     => __('Jobs/Resumes', 'babysitter'),
      'id'        => 'babysitter__jobs_resumes',
    ) );


    Redux::setSection( $opt_name, array(
      'title'      => __('WP Job Manager', 'babysitter'),
      'id'         => 'babysitter__subsection-wp-job-manager',
      'subsection' => true,
      'fields'     => array(
        array(
          'id'        => 'babysitter_jobs-layout',
          'type'      => 'image_select',
          'title'     => esc_html__('Jobs Layout', 'babysitter'),
          'subtitle'  => esc_html__('Select Jobs output layout.', 'babysitter'),
          'options'   => array(
            '1' => array(
              'alt' => esc_html__( 'List', 'babysitter' ),
              'img' => get_template_directory_uri() . '/images/admin/layout-list.png'),
            '2' => array(
              'alt' => esc_html__( 'Grid 2 cols', 'babysitter' ),
              'img' => ReduxFramework::$_url . 'assets/img/2-col-portfolio.png'),
            '3' => array(
              'alt' => esc_html__( 'Grid 3 cols', 'babysitter' ),
              'img' => ReduxFramework::$_url . 'assets/img/3-col-portfolio.png'),
            '4' => array(
              'alt' => esc_html__( 'Grid 4 cols', 'babysitter' ),
              'img' => ReduxFramework::$_url . 'assets/img/4-col-portfolio.png'),
          ),
          'default'   => '1',
          'desc'      => esc_html__( 'Select layout for the Jobs output (List, Grid 2 columns, Grid 3 columns, Grid 4 columns)', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__job-manager-login-page',
          'type'      => 'select',
          'data'      => 'pages',
          'title'     => __('Job Login Page', 'babysitter'),
          'subtitle'  => __('Login page on your site.', 'babysitter'),
          'desc'      => __('Choose a page where you paste <code>[clean-login]</code> shortcode.', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__employer-placeholder',
          'type'      => 'media',
          'url'       => true,
          'title'     => __('Employer\'s Placeholder Image', 'babysitter'),
          'compiler'  => 'true',
          //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
          'desc'      => __('This image used if employer didn\'t upload his cover image.', 'babysitter'),
          'default'   => array(
            'url'     => get_template_directory_uri() . '/images/user-placeholder.gif'),
          'width'     => '',
          'height'    => '',
        ),
        array(
          'id'        => 'babysitter__page-heading-single-job',
          'type'      => 'switch',
          'title'     => esc_html__( 'Display Page Heading on Single Job page?', 'babysitter' ),
          'subtitle'  => esc_html__( 'Page Heading displayed by default.', 'babysitter' ),
          'default'   => 1,
          'on'        => esc_html__( 'Yes', 'babysitter' ),
          'off'       => esc_html__( 'No', 'babysitter' ),
        ),
        array(
          'id'        => 'babysitter__google-map-single-job',
          'type'      => 'switch',
          'title'     => esc_html__( 'Display Google Map on Single Job page?', 'babysitter' ),
          'subtitle'  => esc_html__( 'Google Map displayed by default.', 'babysitter' ),
          'default'   => 1,
          'on'        => esc_html__( 'Yes', 'babysitter' ),
          'off'       => esc_html__( 'No', 'babysitter' ),
        ),
        array(
          'id'        => 'babysitter__form-jobs-field-keywords',
          'type'      => 'text',
          'title'     => __('Keywords - Placeholder Text', 'babysitter'),
          'subtitle'  => __('Placeholder text.', 'babysitter'),
          'desc'      => __('Change placeholder text for <em>Keywords</em> field.', 'babysitter'),
          'default'   => __('Keywords', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__form-jobs-field-location',
          'type'      => 'text',
          'title'     => __('Location - Placeholder Text', 'babysitter'),
          'subtitle'  => __('Placeholder text.', 'babysitter'),
          'desc'      => __('Change placeholder text for <em>Location</em> field.', 'babysitter'),
          'default'   => __('Any location', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__form-jobs-field-category',
          'type'      => 'text',
          'title'     => __('Categories - Placeholder Text', 'babysitter'),
          'subtitle'  => __('Placeholder text.', 'babysitter'),
          'desc'      => __('Change placeholder text for <em>Categories</em> field.', 'babysitter'),
          'default'   => __('Any category', 'babysitter'),
        ),
      ),
    ) );



    Redux::setSection( $opt_name, array(
      'title'      => __('Resume Manager', 'babysitter'),
      'id'         => 'babysitter__subsection-resume-manager',
      'subsection' => true,
      'fields'     => array(
        array(
          'id'        => 'babysitter_resume-manager-notice',
          'type'      => 'info',
          'notice'    => true,
          'icon'      => 'el el-icon-info-circle',
          'style'     => 'info',
          'title'     => __('Resume Manager', 'babysitter'),
          'desc'      => __('The following options are only available if you are using <a href="https://wpjobmanager.com/add-ons/resume-manager/">Resume Manager</a> add-on.', 'babysitter')
        ),
        array(
          'id'        => 'babysitter_resumes-layout',
          'type'      => 'image_select',
          'title'     => esc_html__('Resumes Layout', 'babysitter'),
          'subtitle'  => esc_html__('Select Resumes output layout.', 'babysitter'),
          'options'   => array(
            '1' => array(
              'alt' => esc_html__( 'List', 'babysitter' ),
              'img' => get_template_directory_uri() . '/images/admin/layout-list.png'),
            '2' => array(
              'alt' => esc_html__( 'Grid 2 cols', 'babysitter' ),
              'img' => ReduxFramework::$_url . 'assets/img/2-col-portfolio.png'),
            '3' => array(
              'alt' => esc_html__( 'Grid 3 cols', 'babysitter' ),
              'img' => ReduxFramework::$_url . 'assets/img/3-col-portfolio.png'),
            '4' => array(
              'alt' => esc_html__( 'Grid 4 cols', 'babysitter' ),
              'img' => ReduxFramework::$_url . 'assets/img/4-col-portfolio.png'),
          ),
          'default'   => '1',
          'desc'      => esc_html__( 'Select layout for the Resumes output (List, Grid 2 columns, Grid 3 columns, Grid 4 columns)', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__resume-manager-login-page',
          'type'      => 'select',
          'data'      => 'pages',
          'title'     => __('Resume Login Page', 'babysitter'),
          'subtitle'  => __('Login page on your site.', 'babysitter'),
          'desc'      => __('Choose a page where you paste <code>[clean-login]</code> shortcode.', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__candidate-placeholder',
          'type'      => 'media',
          'url'       => true,
          'title'     => __('Candidate\'s Placeholder Image', 'babysitter'),
          'compiler'  => 'true',
          //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
          'desc'      => __('This image used if candidate didn\'t upload his cover image.', 'babysitter'),
          'default'   => array(
            'url'     => get_template_directory_uri() . '/images/user-placeholder.gif'),
          'width'     => '',
          'height'    => '',
          'hint'        => array(
            'content'   => __( 'Requires \'Resume Manager\' add-on', 'babysitter' ),
          )
        ),
        array(
          'id'        => 'babysitter__page-heading-single-resume',
          'type'      => 'switch',
          'title'     => esc_html__( 'Display Page Heading on Single Resume page?', 'babysitter' ),
          'subtitle'  => esc_html__( 'Page Heading displayed by default.', 'babysitter' ),
          'default'   => 1,
          'on'        => esc_html__( 'Yes', 'babysitter' ),
          'off'       => esc_html__( 'No', 'babysitter' ),
        ),
        array(
          'id'        => 'babysitter__google-map-single-resume',
          'type'      => 'switch',
          'title'     => esc_html__( 'Display Google Map on Single Resume page?', 'babysitter' ),
          'subtitle'  => esc_html__( 'Google Map displayed by default.', 'babysitter' ),
          'default'   => 1,
          'on'        => esc_html__( 'Yes', 'babysitter' ),
          'off'       => esc_html__( 'No', 'babysitter' ),
        ),
        array(
          'id'        => 'babysitter__form-resumes-field-keywords',
          'type'      => 'text',
          'title'     => __('Keywords - Placeholder Text', 'babysitter'),
          'subtitle'  => __('Placeholder text.', 'babysitter'),
          'desc'      => __('Change placeholder text for <em>Keywords</em> field.', 'babysitter'),
          'default'   => __('Keywords', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__form-resumes-field-location',
          'type'      => 'text',
          'title'     => __('Location - Placeholder Text', 'babysitter'),
          'subtitle'  => __('Placeholder text.', 'babysitter'),
          'desc'      => __('Change placeholder text for <em>Location</em> field.', 'babysitter'),
          'default'   => __('Any location', 'babysitter'),
        ),
        array(
          'id'        => 'babysitter__form-resumes-field-category',
          'type'      => 'text',
          'title'     => __('Categories - Placeholder Text', 'babysitter'),
          'subtitle'  => __('Placeholder text.', 'babysitter'),
          'desc'      => __('Change placeholder text for <em>Categories</em> field.', 'babysitter'),
          'default'   => __('Any category', 'babysitter'),
        ),
      ),
    ) );


    // Custom CSS
    Redux::setSection( $opt_name, array(
      'title'     => __('Custom CSS', 'babysitter'),
      'icon'      => 'el-icon-css',
      'fields'    => array(
        array(
          'id'        => 'ace-editor-css',
          'type'      => 'ace_editor',
          'title'     => __('CSS Code', 'babysitter'),
          'subtitle'  => __('Paste your CSS code here.', 'babysitter'),
          'mode'      => 'css',
          'theme'     => 'monokai',
          'desc'      => 'Any custom CSS can be added here, it will override the theme CSS.',
          'default'   => ""
        ),
      )
    ) );

    Redux::setSection( $opt_name, array(
      'title'     => __('Import / Export', 'babysitter'),
      'desc'      => __('Import and Export your theme settings from file, text or URL.', 'babysitter'),
      'icon'      => 'el-icon-refresh',
      'fields'    => array(
        array(
          'id'            => 'opt-import-export',
          'type'          => 'import_export',
          'full_width'    => false,
        ),
      ),
    ) );

    if (file_exists(dirname(__FILE__) . '/../readme.txt')) {
      Redux::setSection( $opt_name, array(
      'icon'      => 'el-icon-list-alt',
      'title'     => __('Theme Information', 'babysitter'),
      'fields'    => array(
        array(
          'id'        => '17',
          'type'      => 'raw',
          'markdown'  => true,
          'content'   => file_get_contents(dirname(__FILE__) . '/../readme.txt')
        ),
      ),
    ) );
  }
