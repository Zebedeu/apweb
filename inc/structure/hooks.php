<?php

/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package apweb
 * @since apweb 1.0.0
 */
// add_action( 'wp_enqueue_scripts', 			'apweb_woocommerce_scripts',		20 );
// add_filter( 'woocommerce_enqueue_styles', 	'__return_empty_array' );

/**
 * Layout
 * @see  apweb_before_content()
 * @see  apweb_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  apweb_shop_messages()
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_before_main_content', 'apweb_before_content', 10);
add_action('woocommerce_after_main_content', 'apweb_after_content', 10);
// add_action( 'apweb_content_top', 				'apweb_shop_messages', 				1 );
add_action('apweb_content_top', 'woocommerce_breadcrumb', 10);

// add_action( 'woocommerce_after_shop_loop',			'apweb_sorting_wrapper',				9 );
add_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 30);
// add_action( 'woocommerce_after_shop_loop',			'apweb_sorting_wrapper_close',			31 );
// add_action( 'woocommerce_before_shop_loop',			'apweb_sorting_wrapper',				9 );
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// add_action( 'woocommerce_before_shop_loop', 		'apweb_woocommerce_pagination', 		30 );
// add_action( 'woocommerce_before_shop_loop',			'apweb_sorting_wrapper_close',			31 );

/**
 * Products
 * @see  apweb_upsell_display()
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

/**
 * Filters
 * @see  apweb_thumbnail_columns()
 * @see  apweb_products_per_page()
 * @see  apweb_loop_columns()
 */

/**
 * Integrations
 * @see  apweb_woocommerce_integrations_scripts()
 * @see  apweb_add_bookings_customizer_css()
 */
// add_action( 'wp_enqueue_scripts', 						'apweb_woocommerce_integrations_scripts' );
// add_action( 'wp_enqueue_scripts', 						'apweb_add_integrations_customizer_css' );

