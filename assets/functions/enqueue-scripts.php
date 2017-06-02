<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/dist/what-input.min.js', array(), '', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/vendor/foundation-sites/dist//js/foundation.min.js', array( 'jquery' ), '6.2.3', true );

    // Adding wow.js file in the footer
    wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '', true );

    // Adding owl file in the footer
    wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '', true );

    // Adding parallax file in the footer
    wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/assets/js/parallax.min.js', array( 'jquery' ), '', true );

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Register Motion-UI
    // wp_enqueue_style( 'motion-ui-css', get_template_directory_uri() . '/vendor/motion-ui/dist/motion-ui.min.css', array(), '', 'all' );

	// Select which grid system you want to use (Foundation Grid by default)
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/vendor/foundation-sites/dist/css/foundation.min.css', array(), '', 'all' );
     //wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/vendor/foundation-sites/dist/foundation-flex.min.css', array(), '', 'all' );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Register animate.css stylesheet
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '', 'all' );

    // Register Material icons stylesheet
    wp_enqueue_style( 'icons-css', get_template_directory_uri() . '/assets/css/materialdesignicons.min.css', array(), '', 'all' );

    // Register font Awesome icons stylesheet
    // wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '', 'all' );

    // Register hover stylesheet
    wp_enqueue_style( 'hover-css', get_template_directory_uri() . '/assets/js/assets/hover-min.css', array(), '', 'all' );

    // Register owl styles stylesheet
    wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/assets/js/assets/owl.carousel.min.css', array(), '', 'all' );

    // Register owl theme stylesheet
    wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/assets/js/assets/owl.theme.default.min.css', array(), '', 'all' );

    // Register custom stylesheet
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);


// Load Conditional Scripts
// function html5blank_conditional_scripts()
// {
//     if (is_page('pagenamehere')) {
//         // Conditional script(s)
//         wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0');
//         wp_enqueue_script('scriptname');
//     }
// }
