<?php
/**
 * Functions (functions.php)
 * Will reach and require the necessary functions and libraries. It's here because WP expects it as default for custom functions.
 */

// Load Hybrid core theme framework.
require_once( trailingslashit( TEMPLATEPATH ) . 'libraries/hybrid-core/hybrid.php' );
$theme = new Hybrid();

// Load the core functions
require_once( trailingslashit( TEMPLATEPATH ) . 'functions/core.php' );

// Load the admin-only functions
if (is_admin()) {
	require_once( trailingslashit( TEMPLATEPATH ) . 'functions/admin.php' );
}

// Theme setup function. This function adds support for theme features and defines the default theme actions and filters.
add_action( 'after_setup_theme', 'hybrid_theme_setup_theme' );
function hybrid_theme_setup_theme() {

	// Get the theme prefix.
	$prefix = hybrid_get_prefix();

	// Add support for framework features.
	add_theme_support( 'hybrid-core-menus', array( 'primary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'primary', 'secondary', 'subsidiary', 'before-content', 'after-content', 'after-singular' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-post-meta-box' );
	add_theme_support( 'hybrid-core-theme-settings' );
	add_theme_support( 'hybrid-core-meta-box-footer' );
	add_theme_support( 'hybrid-core-drop-downs' );
	add_theme_support( 'hybrid-core-seo' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'hybrid-core-deprecated' );

	// Add support for framework extensions.  
	add_theme_support( 'breadcrumb-trail' );
	add_theme_support( 'custom-field-series' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'post-stylesheets' );

	// Only add cleaner gallery support if not using child theme. Eventually, all child themes should support this.  
	if ( 'hybrid' == get_stylesheet() )
		add_theme_support( 'cleaner-gallery' );

	// Add support for WordPress features.  
	add_theme_support( 'automatic-feed-links' );

	// Register sidebars.  
	add_action( 'init', 'hybrid_theme_register_sidebars', 11 );

	// Disables widget areas.  
	add_filter( 'sidebars_widgets', 'hybrid_theme_remove_sidebars' );

	// Header actions.  
	add_action( "{$prefix}_header", 'hybrid_site_title' );
	add_action( "{$prefix}_header", 'hybrid_site_description' );

	// Load the primary menu.  
	add_action( "{$prefix}_after_header", 'hybrid_get_primary_menu' );

	// Add the primary and secondary sidebars after the container.  
	add_action( "{$prefix}_after_container", 'hybrid_get_primary' );
	add_action( "{$prefix}_after_container", 'hybrid_get_secondary' );

	// Add the breadcrumb trail and before content sidebar before the content.  
	add_action( "{$prefix}_before_content", 'hybrid_breadcrumb' );
	add_action( "{$prefix}_before_content", 'hybrid_get_utility_before_content' );

	// Add the title, byline, and entry meta before and after the entry.  
	add_action( "{$prefix}_before_entry", 'hybrid_entry_title' );
	add_action( "{$prefix}_before_entry", 'hybrid_byline' );
	add_action( "{$prefix}_after_entry", 'hybrid_entry_meta' );

	// Add the after singular sidebar and custom field series extension after singular views.  
	add_action( "{$prefix}_after_singular", 'hybrid_get_utility_after_singular' );
	add_action( "{$prefix}_after_singular", 'custom_field_series' );

	// Add the after content sidebar and navigation links after the content.  
	add_action( "{$prefix}_after_content", 'hybrid_get_utility_after_content' );
	add_action( "{$prefix}_after_content", 'hybrid_navigation_links' );

	// Add the subsidiary sidebar and footer insert to the footer.  
	add_action( "{$prefix}_before_footer", 'hybrid_get_subsidiary' );
	add_action( "{$prefix}_footer", 'hybrid_footer_insert' );

	// Add the comment avatar and comment meta before individual comments.  
	add_action( "{$prefix}_before_comment", 'hybrid_avatar' );
	add_action( "{$prefix}_before_comment", 'hybrid_comment_meta' );

	// Add Hybrid theme-specific body classes.  
	add_filter( 'body_class', 'hybrid_theme_body_class' );

}


?>