<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 11/10/17
 * Time: 12:04
 */

// rm sorting control in products list
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// rm results count in products list
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// rm category description from category page
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
// output category description on category page under products list
add_action( 'woocommerce_after_shop_loop', 'woocommerce_taxonomy_archive_description', 100 );
