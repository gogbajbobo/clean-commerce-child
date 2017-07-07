<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 10:47
 */



// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {

    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_country']);

    $fields['billing']['billing_first_name']['required'] = false;
    $fields['billing']['billing_first_name']['class'] = array('form-row-wide');

    $fields['billing']['billing_full_address'] = array(
        'label'     => 'Полный адрес',
        'required'  => false,
        'class'     => array('form-row-wide'),
        'clear'     => true
    );

    return $fields;

}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['billing_full_address'] ) ) {
        update_post_meta( $order_id, 'Полный адрес', sanitize_text_field( $_POST['billing_full_address'] ) );
    }
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>Полный адрес:</strong> ' . get_post_meta( $order->id, 'Полный адрес', true ) . '</p>';
}


/**
 * Display field value on the e-mail
 */

add_filter('woocommerce_email_order_meta_keys', 'my_custom_order_meta_keys');

function my_custom_order_meta_keys( $keys ) {
    $keys[] = 'Полный адрес';
    return $keys;
}

