<?php
/**
 * Babysitter functions and definitions
 *
 * @package Babysitter
 */

/*------------------------------------*\
	Includes
\*------------------------------------*/

// Add the postmeta to Pages
include_once get_template_directory() . '/inc/meta-pages.php';

// Widgets
require_once get_template_directory() . '/inc/widgets/widget__recent-posts.php';
require_once get_template_directory() . '/inc/widgets/widget__flickr.php';
require_once get_template_directory() . '/inc/widgets/widget__tabs.php';

// Add the postmeta to Posts
include_once get_template_directory() . '/inc/theme-postmeta.php';

// WP-LESS
add_action('wp_head','babysitter_redux_opt_inc');
function babysitter_redux_opt_inc() {
	include get_template_directory() . '/redux-opt.php';
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'babysitter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function babysitter_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Babysitter, use a find and replace
	 * to change 'babysitter' to the name of your theme in all the template files
	 */
	$locale = apply_filters( 'plugin_locale', get_locale(), 'babysitter' );
	load_textdomain( 'babysitter', WP_LANG_DIR . "/babysitter-$locale.mo" );
	load_theme_textdomain( 'babysitter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 858, 400, true ); // Normal post thumbnails
	add_image_size('small', 144, 84, true); // Small Thumbnail
	add_image_size('xsmall', 64, 64, true); // Small Square Thumbnail
	add_image_size('related-img', 256, 120, true); // Related Thumbnail
	add_image_size('portfolio-n', 346, 346, true); // Portfolio Thumbnails (3, 4 cols layouts)
	add_image_size('portfolio-lg', 560, 420, true); // Portfolio Thumbnails (2 cols layout)
	add_image_size('thumbnail-lg', 858, 400, true); // Large Thumbnails
	add_image_size('thumbnail-xlg', 1125, 480, true); // Extra Large Thumbnails (blog full width)
	add_image_size('portfolio-single-half', 736, 500, true); // Extra Large Thumbnails (blog full width)

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'babysitter' ),
		'tertiary'  => __( 'Account Menu', 'babysitter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'gallery', 'video', 'quote', 'link',
	) );

	/*
	 * Enable Full Template support for WP Job Manager.
	 * See https://wpjobmanager.com/document/enabling-full-template-support/
	 */
	add_theme_support( 'job-manager-templates' );

	/*
	 * Enable Full Template support for Resume Manager.
	 */
	add_theme_support( 'resume-manager-templates' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
endif; // babysitter_setup
add_action( 'after_setup_theme', 'babysitter_setup' );


/**
 * Add Redux Framework & extras
 */
require get_template_directory() . '/admin/admin-init.php';


/*
 * Enable support for WooCommerce
 */
add_theme_support( 'woocommerce' );

if (class_exists('woocommerce')) {
	// Edit Account Page
	function babysitter__woocommerce_edit_account_form_start() {
	    echo '<div class="row"><div class="col-md-8 col-md-offset-2">';
	}
	add_action('woocommerce_edit_account_form_start', 'babysitter__woocommerce_edit_account_form_start', 20);

	function babysitter__woocommerce_edit_account_form_end() {
	    echo '</div></div>';
	}
	add_action('woocommerce_edit_account_form_end', 'babysitter__woocommerce_edit_account_form_end', 20);
}



/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if(!function_exists('babysitter_widgets_init')) {
	function babysitter_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'babysitter' ),
			'id'            => 'sidebar-1',
			'description'   => 'The Sidebar containing the main widget areas.',
			'before_widget' => '<div id="%1$s" class="widget widget__sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Widget 1', 'babysitter' ),
			'id'            => 'babysitter-footer-widget-1',
			'description'   => '1st Footer Widget Area',
			'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widget 2', 'babysitter' ),
			'id'            => 'babysitter-footer-widget-2',
			'description'   => '2nd Footer Widget Area',
			'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widget 3', 'babysitter' ),
			'id'            => 'babysitter-footer-widget-3',
			'description'   => '3rd Footer Widget Area',
			'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widget 4', 'babysitter' ),
			'id'            => 'babysitter-footer-widget-4',
			'description'   => '4th Footer Widget Area',
			'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'babysitter_widgets_init' );
}



/*
  * This theme styles the visual editor to resemble the theme style,
  * specifically font, colors, icons, and column width.
  */
add_editor_style( array( 'css/editor-style.css') );

/**
 * Enqueue scripts and styles.
 */
if(!function_exists('babysitter_enqueue_style')) {
	function babysitter_enqueue_style() {
		wp_enqueue_style( 'babysitter-style', get_stylesheet_uri() );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false );
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fonts/font-awesome/css/font-awesome.min.css', false, '4.6.3' );
		wp_enqueue_style( 'entypo', get_template_directory_uri() . '/css/fonts/entypo/css/entypo.css', false );
		wp_enqueue_style( 'owl_carousel', get_template_directory_uri() . '/vendor/owl-carousel/owl.carousel.css', false );
		wp_enqueue_style( 'owl_theme', get_template_directory_uri() . '/vendor/owl-carousel/owl.theme.css', false );
		wp_enqueue_style( 'magnific', get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css', false );
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/vendor/flexslider/flexslider.css', false );
		wp_enqueue_style( 'theme_styles', get_template_directory_uri() . '/css/theme.css', false );
		wp_enqueue_style( 'theme_elements', get_template_directory_uri() . '/css/theme-elements.css', false );

		require_once('redux-opt-less.php'); // needed here to get less variables
		wp_enqueue_style( 'color_default', get_template_directory_uri() . '/css/color-default.less', false );
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', false ); 
	}
	add_action( 'wp_enqueue_scripts', 'babysitter_enqueue_style' );
}


if(!function_exists('babysitter_enqueue_script')) {
	function babysitter_enqueue_script() {

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/vendor/modernizr.js', array('jquery'), '1.0', false );

		if ( !is_page_template('template-coming-soon.php')) {
			wp_enqueue_script( 'flexnav', get_template_directory_uri() . '/vendor/jquery.flexnav.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'hoverintent', get_template_directory_uri() . '/vendor/jquery.hoverIntent.minified.js', array(), '1.0', true );
			wp_enqueue_script( 'flickrfeed', get_template_directory_uri() . '/vendor/jquery.flickrfeed.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'isotope', get_template_directory_uri() . '/vendor/isotope/isotope.pkgd.min.js', array('jquery'), '2.0.1', true );
			wp_enqueue_script( 'images_loaded', get_template_directory_uri() . '/vendor/isotope/jquery.imagesloaded.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'magnific_popup', get_template_directory_uri() . '/vendor/magnific-popup/jquery.magnific-popup.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/vendor/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/vendor/jquery.fitvids.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'appear', get_template_directory_uri() . '/vendor/jquery.appear.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'stellar', get_template_directory_uri() . '/vendor/jquery.stellar.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'count_to', get_template_directory_uri() . '/vendor/jquery.countTo.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'circliful', get_template_directory_uri() . '/vendor/circliful/jquery.circliful.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'initjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
		}

		// Conditional for Coming Soon Page
		if (is_page_template('template-coming-soon.php')) {
			wp_enqueue_script( 'knob', get_template_directory_uri() . '/vendor/countdown/jquery.knob.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'countdown', get_template_directory_uri() . '/vendor/countdown/countdown.js', array('jquery'), '1.0', true );
		}

		// Google Maps
		global $babysitter_data;
		$google_api_key = '';
		if ( isset($babysitter_data['babysitter__google-map-api-key']) && $babysitter_data['babysitter__google-map-api-key'] != '' ) {
			$google_api_key = '&key=' . $babysitter_data['babysitter__google-map-api-key'];
		}
		wp_register_script('gmap_api', '//maps.google.com/maps/api/js?sensor=true' . esc_attr( $google_api_key ), array('jquery'), '1.0');
		wp_register_script('gmap', get_template_directory_uri() . '/vendor/jquery.gmap3.min.js', array('jquery'), '3.0');


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'babysitter_enqueue_script' );
}


// Change active menu class
add_filter('nav_menu_css_class' , 'babysitter_special_nav_class' , 10 , 2);
function babysitter_special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active';
	}
	return $classes;
}

// Shortcode in Widget
add_filter('widget_text', 'do_shortcode');


/*-----------------------------------------------------------------------------------*/
/*  Password protected post
/*-----------------------------------------------------------------------------------*/
if(!function_exists('babysitter_password_form')) {
	function babysitter_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="form-inline" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<p>' . __( "To view this protected post, enter the password below:", "babysitter" ) . '</p>
		<div class="form-group"><label for="' . $label . '">' . __( "Password:", "babysitter" ) . ' </label> &nbsp; <input class="form-control" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /> &nbsp; </div><input type="submit" class="btn btn-secondary" name="Submit" value="' . esc_attr__( "Submit", "babysitter" ) . '" />
		</form>
		';
		return $output;
	}
}
add_filter( 'the_password_form', 'babysitter_password_form' );

// Add the Password Form to the Excerpt (for password protected posts)
if(!function_exists('babysitter_excerpt_password_form')) {
	function babysitter_excerpt_password_form( $excerpt ) {
	  if ( post_password_required() )
	  	$excerpt = get_the_password_form();
	  return $excerpt;
	}
	add_filter( 'the_excerpt', 'babysitter_excerpt_password_form' );
}


/*-----------------------------------------------------------------------------------*/
/*  Custom Comments Callback
/*-----------------------------------------------------------------------------------*/
if(!function_exists('babysitter_comments')) {
	function babysitter_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
	    
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
	?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-wrapper">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 70 ); ?>
			<?php printf(__('<h5>%s</h5>', 'babysitter'), get_comment_author_link()) ?>
			<span class="says"><?php _e('says:', 'babysitter'); ?></span>
			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php
			printf( __('%1$s at %2$s', 'babysitter'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'babysitter'),'  ','' );
			?>
			</div>
		</div>
			
		<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'babysitter') ?></em>
		<br />
		<?php endif; ?>

		<div class="comment-body">
			<?php comment_text() ?>
		</div>

		<div class="comment-reply">
			<?php comment_reply_link(array_merge( $args, array(
				'add_below'   => $add_below,
				'depth'       => $depth,
				'reply_text'  => '<button class="btn btn-primary btn-sm"><i class="fa fa-reply"></i>' . __( 'Reply', 'babysitter' ) . '</button>',
				'max_depth'   => $args['max_depth']
			))) ?>
		</div>
		
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php }
}




/*-----------------------------------------------------------------------------------*/
/*  Pagination
/*-----------------------------------------------------------------------------------*/
if(!function_exists('babysitter_pagination')) {
	function babysitter_pagination($pages = '', $range = 2) { 
		$showitems = ($range * 2)+1; 

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}  

		if(1 != $pages) {
		echo "<div class=\"text-center\"><ul class=\"pagination-custom list-unstyled list-inline\">";
		// if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a class='first' href='".get_pagenum_link(1)."'>First</a></li>";
		if($paged > 1) echo "<li><a href='".get_pagenum_link($paged - 1)."' class='btn btn-sm'>&laquo;</a></li>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){ echo ($paged == $i)? "<li><span class=\"btn btn-sm\" disabled=\"disabled\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"btn btn-sm\">".$i."</a></li>";
			}
		}

		if ($paged < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\" class='btn btn-sm'>&raquo;</a></li>"; 
		// if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a class='last' href='".get_pagenum_link($pages)."'>Last</a></li>";
		echo "</ul></div>\n";
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/*  Remove Empty Paragraphs
/*-----------------------------------------------------------------------------------*/
if(!function_exists('babysitter_shortcode_empty_paragraph_fix')) {
	add_filter('the_content', 'babysitter_shortcode_empty_paragraph_fix');
	function babysitter_shortcode_empty_paragraph_fix($content)
	{   
	  $array = array (
	      '<p>[' => '[', 
	      ']</p>' => ']', 
	      ']<br />' => ']'
	  );

	  $content = strtr($content, $array);

	return $content;
	}
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// The excerpt based on words
if(!function_exists('babysitter_string_limit_words')) {
	function babysitter_string_limit_words($string, $word_limit) {
		$words = explode(' ', $string, ($word_limit + 1));
		if(count($words) > $word_limit)
		array_pop($words);
		return implode(' ', $words).'... ';
	}
}



/*------------------------------------*\
	WP Job Manager Functions
\*------------------------------------*/

// Frontend fields
if(!function_exists('custom_submit_job_form_fields')) {
	add_filter( 'submit_job_form_fields', 'custom_submit_job_form_fields' );

	function custom_submit_job_form_fields(  $fields ) {
	  $fields['job']['job_title']['label'] = __('Job Title', 'babysitter');
	  $fields['company']['company_logo']['label'] = __('Cover Image', 'babysitter');
	  $fields['company']['company_logo']['description'] = __('Image size should be at least <strong>346x346</strong>. If your image is bigger, we’ll crop it.', 'babysitter');
	  $fields['company']['company_name']['label'] = __('Your Name', 'babysitter');
	  $fields['company']['company_name']['placeholder'] = __('Vaše meno', 'babysitter');
	  $fields['company']['company_tagline']['placeholder'] = __('V krátkosti sa popíšte', 'babysitter');
	  $fields['company']['company_twitter']['placeholder'] = __('Profil', 'babysitter');
	  $fields['company']['company_video']['placeholder'] = __('Link na vaše video', 'babysitter');
	  return $fields;
	}
}

// Backend fields
if(!function_exists('custom_job_manager_job_listing_data_fields')) {
	add_filter( 'job_manager_job_listing_data_fields', 'custom_job_manager_job_listing_data_fields' );

	function custom_job_manager_job_listing_data_fields(  $fields ) {
	  $fields['_company_logo']['label'] = __('Cover Image', 'babysitter');
	  $fields['_company_logo']['description'] = __('Image size should be at least <strong>346x346</strong>.', 'babysitter');
	  $fields['_company_logo']['placeholder'] = __('URL to your image', 'babysitter');
	  $fields['_company_name']['label'] = __('Your Name', 'babysitter');
	  $fields['_company_website']['label'] = __('Website', 'babysitter');
	  $fields['_company_tagline']['label'] = __('Tagline', 'babysitter');
	  $fields['_company_twitter']['label'] = __('Twitter', 'babysitter');
	  $fields['_company_twitter']['placeholder'] = __('@yourname', 'babysitter');
	  $fields['_company_tagline']['placeholder'] = __('Brief description about you', 'babysitter');
	  $fields['_company_video']['label'] = __('Video', 'babysitter');
	  $fields['_company_video']['placeholder'] = __('URL to your video', 'babysitter');

		return $fields;
	}
}



/*------------------------------------*\
	Resume: WP Job Manager Add-On
\*------------------------------------*/

// Frontend fields
if(!function_exists('custom_submit_resume_form_fields')) {
	add_filter( 'submit_resume_form_fields', 'custom_submit_resume_form_fields' );
	 
	function custom_submit_resume_form_fields( $fields ) {
	  $fields['resume_fields']['candidate_title']['label'] = __('Job title', 'babysitter');
	  $fields['resume_fields']['candidate_title']['placeholder'] = __('e.g. "Baby Sitter", "Nanny"', 'babysitter');
	  $fields['resume_fields']['candidate_photo']['label'] = __('Cover Image', 'babysitter');
	  $fields['resume_fields']['candidate_photo']['description'] = __('Image size should be at least <strong>346x346</strong>. If your image is bigger, we’ll crop it.', 'babysitter');
	  $fields['resume_fields']['resume_content']['label'] = __('Description', 'babysitter');
	  return $fields;
	}
}

// Backend fields
if(!function_exists('custom_resume_manager_resume_fields')) {
	add_filter( 'resume_manager_resume_fields', 'custom_resume_manager_resume_fields' );
	 
	function custom_resume_manager_resume_fields( $fields ) {
	  $fields['_candidate_title']['label'] = __('Job title', 'babysitter');
	  $fields['_candidate_photo']['label'] = __('Cover Image', 'babysitter');
	  $fields['_candidate_photo']['description'] = __('Image size should be at least <strong>346x346</strong>.', 'babysitter');
	  return $fields;
	}
}




/*------------------------------------*\
    WPML compatibility
\*------------------------------------*/
if(!function_exists('babysitter_wpml_translate_filter')) {
	function babysitter_wpml_translate_filter( $name, $value ) {
	    return icl_translate( 'babysitter', 'babysitter_' . $name, $value );
	}
	//Check if WPML is activated
	if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
	    add_filter( 'babysitter_text_translate', 'babysitter_wpml_translate_filter', 10, 2 );
	}
}




/**
 * Resume post type arguments.
 *
 * @since Babysitter 1.4.7
 *
 * @param array $args
 * @return array $args
 */

add_filter( 'register_post_type_resume', 'post_type_resume', 10, 1);

function post_type_resume( $args ) {
	$args[ 'exclude_from_search' ] = false;

	return $args;
}

/**
 * TGM alert styling fix
 */
if(!function_exists('babysitter_custom_admin_css')) {
	function babysitter_custom_admin_css(){
		if( is_admin() ) {
			wp_enqueue_style( 'babysitter_custom_admin', get_template_directory_uri(). '/css/custom-admin.css', false, false);
		}
	}
}
add_action( 'admin_enqueue_scripts', 'babysitter_custom_admin_css' );


/**
 * Load TGMPA
 */
require_once get_template_directory() . '/admin/tgm/tgm-init.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require PARENT_DIR . '/inc/jetpack.php';

/**
 * Load WP Job Manager login functions.
 */
require get_template_directory() . '/inc/wp-job-manager-logins.php';



/**
 * Implement Custom Fields for WP Job Manager & Resume Manager
 */
// Custom Fields WP Job Manager
if ( !function_exists('babysitter_add_job_custom_fields')) {
	function babysitter_add_job_custom_fields() {
		require get_template_directory() . '/job_manager/custom-fields/job-custom-fields.php';
	}
	babysitter_add_job_custom_fields();
}
// Custom Fields Resume Manager
if ( !function_exists('babysitter_add_resume_custom_fields')) {
	function babysitter_add_resume_custom_fields() {
		require get_template_directory() . '/wp-job-manager-resumes/custom-fields/resume-custom-fields.php';
	}
	babysitter_add_resume_custom_fields();
}
