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

// TESTIMONIAL POST TYPE
function review_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Reviews', 'Post Type General Name'),
		'singular_name'       => _x( 'Review', 'Post Type Singular Name'),
		'menu_name'           => __( 'Reviews'),
		'parent_item_colon'   => __( 'Parent Review'),
		'all_items'           => __( 'All Reviews'),
		'view_item'           => __( 'View Review'),
		'add_new_item'        => __( 'Add New Review'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Review'),
		'update_item'         => __( 'Update Review'),
		'search_items'        => __( 'Search Reviews'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'reviews'),
		'description'         => __( 'Golf Course Reviews from Google, Facebook, etc'),
		'menu_icon'	=> 'dashicons-admin-comments',
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
	register_post_type( 'reviews', $args );

}
add_action( 'init', 'review_post_type', 0 );
// END BUSINESS POST TYPE



add_action( 'admin_menu', 'remove_menu_items', 9999);

function remove_menu_items() {
	remove_menu_page('edit-comments.php'); // Comments
	remove_menu_page('tools.php');
	remove_menu_page('users.php');
	remove_menu_page('plugins.php');
	remove_menu_page('themes.php');
	remove_menu_page('upload.php');
	remove_menu_page('wpforms-overview');
	remove_menu_page('edit.php?post_type=acf');
	remove_menu_page('options-general.php');
}

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Rates';
    $submenu['edit.php'][5][0] = 'Rates';
    $submenu['edit.php'][10][0] = 'Add Rate';
    //$submenu['edit.php'][16][0] = 'Rates Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Rates';
    $labels->singular_name = 'Rate';
    $labels->add_new = 'Add Rate';
    $labels->add_new_item = 'Add Rate';
    $labels->edit_item = 'Edit Rate';
    $labels->new_item = 'Rate';
    $labels->view_item = 'View Rate';
    $labels->search_items = 'Search Rates';
    $labels->not_found = 'No Rates found';
    $labels->not_found_in_trash = 'No Rates found in Trash';
    $labels->all_items = 'All Rates';
    $labels->menu_name = 'Rates';
    $labels->name_admin_bar = 'Rates';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function fs_add_slugs() {
		global $menu, $submenu;
		$slug_template = '<br><span style="color: yellow; background: #000; display: inline-block; padding: 1px 5px; font-size: 10px;">[%s]</span>';
		foreach ( $menu as $index => $meta ) {
			$menu[$index][0] = $meta[0] . sprintf($slug_template, $meta[2]);
		}
		foreach ( $submenu as $menu_slug => $submenu_items ) {
			foreach ($submenu_items as $index => $meta) {
				$submenu[$menu_slug][$index][0] = $meta[0] . sprintf($slug_template, $meta[2]);
			}
		}
	}

// add_action( 'admin_menu', 'fs_add_slugs', 99999999 );
?>