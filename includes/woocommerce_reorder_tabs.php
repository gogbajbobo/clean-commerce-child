<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 27/11/17
 * Time: 14:11
 */

add_filter( 'woocommerce_product_tabs', 'woocommerce_reorder_tabs', 98 );

function woocommerce_reorder_tabs($tabs) {

    $tabs['additional_information']['priority'] = 5;    // Additional information first
    $tabs['description']['priority'] = 10;              // Description second

    return $tabs;

}
