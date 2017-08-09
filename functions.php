<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'font-awesome','jquery-sidr','jquery-slick' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

require_once (__DIR__ . '/inc/hook/structure.php');

require_once (__DIR__ . '/includes/counters.php');
require_once (__DIR__ . '/includes/favicon.php');
require_once (__DIR__ . '/includes/cdn.php');
require_once (__DIR__ . '/includes/remove_version_info.php');
require_once (__DIR__ . '/includes/child_theme_textdomain.php');
require_once (__DIR__ . '/includes/site_branding.php');
require_once (__DIR__ . '/includes/custom_fix_thumbnail.php');
require_once (__DIR__ . '/includes/redirect.php');
require_once (__DIR__ . '/includes/custom_footer_copyright.php');
require_once (__DIR__ . '/includes/custom_override_checkout_fields.php');
require_once (__DIR__ . '/includes/stock_availability.php');
require_once (__DIR__ . '/includes/cart_customlocation.php');
require_once (__DIR__ . '/includes/order_cart_helper.php');
require_once (__DIR__ . '/includes/yandex_maps.php');
require_once (__DIR__ . '/includes/posted_on.php');
require_once (__DIR__ . '/includes/products_table.php');
require_once (__DIR__ . '/includes/hide_category_count.php');

// remove sorting control in products list
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

