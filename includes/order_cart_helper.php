<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 15/07/17
 * Time: 20:20
 */

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
