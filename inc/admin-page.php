<?php

add_action('admin_menu', 'pgsfw_plugin_setup_menu');
 
function pgsfw_plugin_setup_menu(){
    add_menu_page( 'Product Gallery Slider', 'Product Gallery Slider', 'manage_options', 'pgsfw-plugin', 'pgsfw_init' );
}
 
function pgsfw_init(){
    echo "<div class='notice notice-warning'><h2>Product Gallery Slider for WooCommerce</h2>";
    echo "<p>A lot of Options Available in our Pro Version.</p><br>";
    echo "<a class='button button-primary button-hero' href='https://themesvila.com/item/woocommerce-product-gallery-slider-pro/' target='_blank'>Upgrade To Pro Version</a> <br><br></div>";
}