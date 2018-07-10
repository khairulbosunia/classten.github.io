<?php 
/*
plugin Name:ShortCode

*/

//Exit if accessed directly
if( !defined('ABSPATH')){
	exit;
}

//Define
define('STOCK_ACC_URL', WP_PLUGIN_URL.'/'. plugin_basename( dirname(__FILE__)) .'/');
define('STOCK_ACC_PATH', plugin_dir_path(__FILE__));


add_action( 'init', 'shortcode_theme_custom_post' );
function shortcode_theme_custom_post() {
    register_post_type( 'Testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonial' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true
        )
    );
}


//print shortcodes
add_filter('widget_text' , 'do_shortcode');

//Loading VC addons
require_once( STOCK_ACC_PATH . 'vc-addons/vc-blocks-load.php');

//Theme shortcodes
require_once(STOCK_ACC_PATH . 'theme-shortcodes/slides-shortcode.php');

//shortcodes depended on Visual Composer
include_once( ABSPATH . 'WP-admin/includes/plugin.php');
if (is_plugin_active('js_composer/js_composer.php')){
	include_once( STOCK_ACC_PATH .'theme-shortcodes/staff-shortcode.php' );
}

//Register stock toolkit filesize
function stock_toolkit_files(){
	wp_enqueue_style('owl-carousel',plugin_dir_url(__FILE__) .'assets/css/owl.carousel.css');
	wp_enqueue_script('owl-carousel',plugin_dir_url(__FILE__) .'assets/js/owl.carousel.min.js', array('jquery'),'20120206', true);
	
}
add_action('wp_enqueue_scripts', 'stock_toolkit_files');


