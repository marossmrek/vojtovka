<?php

/**
 * TGM Init Class
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'starter_plugin_register_required_plugins' );

function starter_plugin_register_required_plugins() {

	$plugins = array(
		array(
			'name' 		=> 'Redux Framework',
			'slug' 		=> 'redux-framework',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'WP Job Manager',
			'slug' 		=> 'wp-job-manager',
			'required' 	=> true,
		),
		array(
			'name'         => 'DF Shortcodes for Babysitter',
			'slug'         => 'df-shortcodes_babysitter',
			'source'       => 'http://github.com/danfisher85/df-shortcodes_babysitter/archive/v1.1.2.zip',
			'external_url' => 'http://github.com/danfisher85/df-shortcodes_babysitter',
			'required'     => true,
			'version'      => '1.1.2'
		),
    array(
			'name'         => 'Envato Market',
			'slug'         => 'envato-market',
			'required'     => false,
			'source'       => 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'external_url' => 'http://envato.github.io/wp-envato-market/dist',
			'version'      => '1.0.0-RC2'
		),
		array(
			'name' 		  => 'Easy Custom Sidebars',
			'slug' 		  => 'easy-custom-sidebars',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Clean Login',
			'slug' 		=> 'clean-login',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'Nav Menu Roles',
			'slug' 		=> 'nav-menu-roles',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'Breadcrumb Trail',
			'slug' 		=> 'breadcrumb-trail',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'WP-LESS',
			'slug' 		=> 'wp-less',
			'required' 	=> true,
		),
	);

	$config = array(
		'id'           => 'babysitter__tgmpa',     // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}
