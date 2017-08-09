<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 09/08/17
 * Time: 15:42
 */

add_filter( 'woocommerce_subcategory_count_html', 'jk_hide_category_count' );
function jk_hide_category_count() {
    // No count
}
