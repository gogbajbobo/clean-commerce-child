<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 16:43
 */


$in_stock = 'В наличии';
$out_of_stock = 'Поставка в течение 2-x недель';

// Hook in
add_filter( 'woocommerce_get_availability', 'custom_override_get_availability', 1, 2);

// The hook in function $availability is passed via the filter!
function custom_override_get_availability( $availability, $_product ) {

    global $in_stock, $out_of_stock;

    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = $in_stock;
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = $out_of_stock;
    }

    return $availability;

}


//* Add stock status to archive pages
function envy_stock_catalog() {

    global $product, $in_stock, $out_of_stock;

    if ( $product->is_in_stock() ) {
        echo '<div class="in-stock" >' . $product->get_stock_quantity() . $in_stock . '</div>';
    } else {
        echo '<div class="out-of-stock" >' . $out_of_stock . '</div>';
    }

}
add_action( 'woocommerce_after_shop_loop_item_title', 'envy_stock_catalog' );
