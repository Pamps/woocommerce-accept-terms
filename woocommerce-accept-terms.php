<?php
/*
   Plugin Name: WooCommerce Accept Terms
   Plugin URI: https://www.darrenlambert.com/wordpress/plugins/woocommerce-accept-terms/
   Version: 1.0
   Author: Darren Lambert
   Author URI: https://www.darrenlambert.com
   Description: Ensures customer accepts terms before purchasing product
   Text Domain: woocommerce-accept-terms
   License: GNU General Public License v3 or later
	*/

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

class WooCommerceAcceptTerms
{
    /**
     * Constructor
     */
    public function __construct()
    {
			add_action( 'wp_enqueue_scripts', array(&$this, 'my_load_scripts') );
			add_action( 'woocommerce_single_product_summary', array( $this, 'render_accept_terms_checkbox' ), 22 );
    }

		/**
		 * Load scripts and styles
		 */
		function my_load_scripts($hook) {

			// Add timestamp to version
			$js_ver  = filemtime( plugin_dir_path( __FILE__ ) . 'js/woocommerce-accept-terms.js' );
			$css_ver = filemtime( plugin_dir_path( __FILE__ ) . 'css/style.css' );

			wp_enqueue_script( 'woocommerce-accept-terms', plugins_url( 'js/woocommerce-accept-terms.js', __FILE__ ), array('jquery'), $js_ver );
			wp_enqueue_style( 'my_css', plugins_url( 'css/style.css',  __FILE__ ), false, $css_ver );

		}

		// Render the check box
		function render_accept_terms_checkbox() {
			?>
			<label class='wat-label'>
				<input type='checkbox' id='wat-accept-terms'>
				<a href='https://www.ace-ev.com.au/purchase-tcs/'>By reserving an ACE EV you are agreeing to our T&amp;Cs here &gt;</a>
			</label>
			<?php
		}


}

new WooCommerceAcceptTerms;