<?php
/**
 * k7themes' WooCommerce hooks
 *
 * @package k7themes
 */

/**
 * Remove native styles
 *
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Content wrapper before and after
 * @see  apweb_before_content()
 * @see  apweb_after_content()
 * @since  2.2.6
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'apweb_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'apweb_after_content', 10 );

/**
 * Remove sidebar
 *
 * Tip:
 * Case you use this action, change template page for full-width style in inc/woocommerce/template-tags.php
 *
 * @see woocommerce_sidebars
 * @since  2.2.6
 */
// remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Breadcrumb
 *
 * Use:
 * do_action( 'apweb_content_top' ); on anywhere for show the breadcrumb
 *
 * @see woocommerce_breadcrumb
 * @since  2.2.6
 */

/**
 * Filters
 * @see  apweb_thumbnail_columns()
 * @see  apweb_products_per_page()
 * @see  apweb_loop_columns()
 * @since  2.2.6
 */

// add_filter( 'woocommerce_product_thumbnails_columns', 	'apweb_thumbnail_columns' );;
// add_filter( 'loop_shop_per_page', 						'apweb_products_per_page' );
// add_filter( 'loop_shop_columns', 						'apweb_loop_columns' );
