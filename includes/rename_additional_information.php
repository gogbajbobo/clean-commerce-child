<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 13/11/17
 * Time: 12:30
 */

$additional_info_new_title = 'Спецификация';

add_filter('woocommerce_product_tabs', 'additional_info_rename_tab', 98);
function additional_info_rename_tab($tabs) {

    global $additional_info_new_title;
    $tabs['additional_information']['title'] = $additional_info_new_title;
    return $tabs;

}

add_filter('woocommerce_product_additional_information_heading', 'wc_change_product_additional_information_heading', 10, 1);
function wc_change_product_additional_information_heading($title) {

    global $additional_info_new_title;
    return $additional_info_new_title;

}

