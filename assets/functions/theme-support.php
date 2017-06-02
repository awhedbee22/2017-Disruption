<?php

// Adding WP Functions & Theme Support
function joints_theme_support() {


	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size(300, 300, true);

	// Additional Sizes
	add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support( 'html5',
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
	         )
	);

	// WooCommerce Integration
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

	function my_theme_wrapper_start() {
		echo '<div id="content"><div id="inner-content" class="row"><main id="main" class="large-8 medium-8 columns columns" role="main">';
	}

	function my_theme_wrapper_end() {
		echo '</main></div></div>';
	}

	// Add WooCommerce Gallery Features
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// WooCommerce Products Per Page
	add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

	function new_loop_shop_per_page( $cols ) {
		// $cols contains the current number of products per page based on the value stored on Options -> Reading
		// Return the number of products you wanna show per page.
		$cols = 20;
		return $cols;
	}

	// WooCommerce Products Per Row
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return 5; // products per row
		}
	}

	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// Boost Image Quality
	add_filter( 'jpeg_quality', 'WP_ImageQuality' );
	function WP_ImageQuality() {
		return 100; //percentage of image quality
	}

	// Add Custom Background
	add_theme_support( 'custom-background' );

	// Remove Dashboard Links
	function remove_menus(){
		// remove_menu_page( 'index.php' );                  //Dashboard
		// remove_menu_page( 'edit.php' );                   //Posts
		// remove_menu_page( 'upload.php' );                 //Media
		// remove_menu_page( 'edit.php?post_type=page' );    //Pages
		remove_menu_page( 'edit-comments.php' );          //Comments
		// remove_menu_page( 'themes.php' );                 //Appearance
		// remove_menu_page( 'plugins.php' );                //Plugins
		// remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		// remove_menu_page( 'options-general.php' );        //Settings
	}
	add_action( 'admin_menu', 'remove_menus' );

	// Remove Adminbar Links
	function remove_admin_bar_links() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
	    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
	    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
	    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
	    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
	    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
	    // $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
	    // $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
	    // $wp_admin_bar->remove_menu('updates');          // Remove the updates link
	    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
	    // $wp_admin_bar->remove_menu('new-content');      // Remove the content link
	    $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
	    // $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );

} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );
