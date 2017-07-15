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

require_once (__DIR__ . '/includes/child_theme_textdomain.php');
require_once (__DIR__ . '/includes/site_branding.php');
require_once (__DIR__ . '/includes/custom_fix_thumbnail.php');
require_once (__DIR__ . '/includes/redirect.php');
require_once (__DIR__ . '/includes/custom_footer_copyright.php');
require_once (__DIR__ . '/includes/custom_override_checkout_fields.php');
require_once (__DIR__ . '/includes/stock_availability.php');


// remove sorting control in products list
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



/**
 * Get order total weight html.
 *
 * @access public
 */
function wc_cart_total_weight_html() {

    $wc_cart_total_weight_html = '<strong>' . WC()->cart->get_cart_contents_weight() . '&nbsp;кг</strong> ';

    echo $wc_cart_total_weight_html;

}

function order_weight($order) {

    $weight = 0;

    if (!empty($order)) {

        foreach($order->get_items() as $item) {

            $_product = $order->get_product_from_item($item);

            $weight += $_product->get_weight() * $item['qty'];

        }

    }

    return $weight;

}

function cart_customlocation_html() {

    ?>
        <a class="cart-customlocation" href=" <?php echo esc_url(wc_get_cart_url()); ?> ">
            <li class="cart-price">
                <strong> <?php echo esc_html_e('Shopping Cart', 'clean-commerce-child'); ?> </strong>
                &nbsp;/&nbsp;
                <span class="amount"> <?php echo WC()->cart->get_cart_contents_weight(); ?> кг</span>
            </li>
            <li class="cart-icon">
                <strong> <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?> </strong>
                <span class="cart-icon-handle"></span>
            </li>
        </a>

    <?php

}
