<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 16:43
 */


// Hook in
add_filter( 'woocommerce_get_availability', 'custom_override_get_availability', 1, 2);

// The hook in function $availability is passed via the filter!
function custom_override_get_availability( $availability, $_product ) {

    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = 'В наличии';
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = 'Поставка в течение 2-x недель';
    }

    return $availability;

}
