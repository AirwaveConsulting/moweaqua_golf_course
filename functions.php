<?php
// the functions file
// lucas lower @ airwaveconsulting
if ( ! function_exists( 'main_setup' ) ) :

function main_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on main, use a find and replace
	 * to change 'main' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'main', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'main' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    }
endif;
add_action( 'after_setup_theme', 'main_setup' );

// BUSINESS POST TYPE
function business_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Businesses', 'Post Type General Name'),
		'singular_name'       => _x( 'Business', 'Post Type Singular Name'),
		'menu_name'           => __( 'Businesses'),
		'parent_item_colon'   => __( 'Parent Business'),
		'all_items'           => __( 'All Businesses'),
		'view_item'           => __( 'View Business'),
		'add_new_item'        => __( 'Add New Business'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Business'),
		'update_item'         => __( 'Update Business'),
		'search_items'        => __( 'Search Business'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'businesses'),
		'description'         => __( 'Moweaqua area businesses'),
		'menu_icon'	=> 'dashicons-store',
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'businesses', $args );

}
add_action( 'init', 'business_post_type', 0 );
// END BUSINESS POST TYPE



add_action( 'admin_menu', 'remove_menu_items' );

function remove_menu_items() {
	//remove_menu_page('edit-comments.php'); // Comments
	//remove_menu_page('tools.php');
}
?>