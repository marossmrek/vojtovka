<?php

// Load the embedded Redux Framework
if ( file_exists( get_template_directory() . '/admin/redux-framework/framework.php' ) ) {
    require_once get_template_directory() . '/admin/redux-framework/framework.php';
}

// Load the theme options
if ( file_exists( get_template_directory() . '/admin/options-init.php' ) ) {
    require_once get_template_directory() . '/admin/options-init.php';
}

// Load Redux extensions
if ( file_exists( get_template_directory() . '/admin/redux-extensions/extensions-init.php' ) ) {
    require_once get_template_directory() . '/admin/redux-extensions/extensions-init.php';
}