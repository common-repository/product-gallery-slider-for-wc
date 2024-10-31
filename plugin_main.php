<?php
/**
* Plugin Name:       Product Gallery Slider for WooCommerce -- Themesvila 
* Plugin URI:        
* Description:       This is a WooCommerce Product Gallery Slider WordPress plugin.Ready-made Awesome Product Gallery Slider for your Single Product Page 
* Version:           1.5
* Requires at least: 5.0
* Requires PHP:      7.4
* Author:            Themesvila
* Author URI:        https://themesvila.com/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       pgsfw
*/
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// A Custom function for get an option
if ( ! function_exists( 'pgsfw_get_option' ) ) {
  function pgsfw_get_option( $option = '', $default = null ) {
    $options = get_option( 'pgsfw' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

/**
 * Include JS Files 
 */
function pgsfw_enqueue_scripts() {
	if (!is_admin()) {	
		if ( class_exists( 'WooCommerce' ) && is_product() ) {
			wp_enqueue_style('pgsfw-magnific-popup', plugins_url('css/magnific-popup.css', __FILE__),'1.1.0', true);
			wp_enqueue_style('pgsfw-slick', plugins_url('css/slick.css', __FILE__),'1.0.0', true);
			wp_enqueue_style('pgsfw-style', plugins_url('css/pgsfw-style.css', __FILE__),'1.0.0', true);
			wp_enqueue_style('pgsfw-fontawesome-css', '//use.fontawesome.com/releases/v5.11.2/css/all.css','4.7.0', true);
			wp_enqueue_script('pgsfw-magnific-popup', plugins_url('js/jquery.magnific-popup.js', __FILE__),array('jquery'),'1.1.0', true);
			wp_enqueue_script('pgsfw-slick', plugins_url('js/slick.js', __FILE__),array('jquery'),'1.1.0', true);
			wp_register_script('pgsfw-script', plugins_url('js/pgsfw-script.js', __FILE__),array('jquery'),'1.0', true);
			

			$translation_array = array(
				'pgsfw_gallery_layout'   => 'horizontal',
				'pgsfw_arrow_disable'   => false,
		
			);
			
			wp_localize_script( 'pgsfw-script', 'object_name', $translation_array );
			
			// Enqueued script with localized data.
			wp_enqueue_script( 'pgsfw-script' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'pgsfw_enqueue_scripts' );


// Call plugin action
add_action('plugins_loaded','pgsfw_modify_woo_hooks');

function pgsfw_modify_woo_hooks() {
	remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	add_action( 'woocommerce_product_thumbnails', 'pgsfw_show_product_thumbnails', 20 );
	add_action( 'woocommerce_before_single_product_summary', 'pgsfw_show_product_image', 10 ); 
}

// Single Product Image
function pgsfw_show_product_image() {
	// Woocmmerce Slider 
	require_once 'inc/product-image.php';
}

// Single Product Thumbnails 
function pgsfw_show_product_thumbnails() {
	// Woocmmerce 3.0+ Slider Fix 
	require_once 'inc/product-thumbnails.php';	
}


// Add Admin Page
	require_once 'inc/admin-page.php';
	
// Adding Preloader options css
function pgsfw_gallery_option_css(){
	
	
	?>

	<style type="text/css">		
		
	.pgsfw-slider-for .slick-arrow{
		background:#222;
		border-color:#222;
		color:#fff;
	}
	.pgsfw-slider-for .slick-arrow:hover,
	.pgsfw-slider-for .slick-arrow:focus{
		background-color: #fff;
		border-color: #fff;
		color: #222;
	}
	
	</style>
<?php	
}
add_action('wp_head' , 'pgsfw_gallery_option_css');
