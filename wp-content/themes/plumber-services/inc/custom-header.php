<?php
/**
 * @package Plumber Services
 * Setup the WordPress core custom header feature.
 *
 * @uses plumber_services_header_style()
*/
function plumber_services_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'plumber_services_custom_header_args', array(
		'default-text-color'    => 'fff',
		'header-text' 		    => false,
		'width'                 => 1200,
		'height'                => 120,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'      => 'plumber_services_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'plumber_services_custom_header_setup' );

if ( ! function_exists( 'plumber_services_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see plumber_services_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'plumber_services_header_style' );
function plumber_services_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$plumber_services_custom_css = "
        .header-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'plumber-services-basic-style', $plumber_services_custom_css );
	endif;
}
endif; // plumber_services_header_style