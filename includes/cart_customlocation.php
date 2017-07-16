<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 15/07/17
 * Time: 20:18
 */

function cart_customlocation_html() {

    if ( !is_cart_page() ) {

        ?>
        <a class="cart-customlocation" href=" <?php echo esc_url(wc_get_cart_url()); ?> ">
            <li class="cart-price">
                <strong> <?php echo esc_html_e('Shopping Cart', 'clean-commerce-child'); ?> </strong>
                &nbsp;/&nbsp;
                <span class="amount"> <?php echo WC()->cart->get_cart_contents_weight(); ?>&nbsp;кг</span>
            </li>
            <li class="cart-icon">
                <strong> <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?> </strong>
                <span class="cart-icon-handle"></span>
            </li>
        </a>

        <?php

    } else {

        ?>
        <a class="cart-customlocation" href=" <?php echo esc_url(wc_get_cart_url()); ?> ">
            <li class="cart-price">
                <strong> <?php echo esc_html_e('Shopping Cart', 'clean-commerce-child'); ?> </strong>
            </li>
        </a>

        <?php

    }

}


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {

    global $woocommerce;

    ob_start();

    cart_customlocation_html();

    $fragments['a.cart-customlocation'] = ob_get_clean();

    return $fragments;

}