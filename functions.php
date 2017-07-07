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


// Load translation files from your child theme instead of the parent theme
function my_child_theme_locale() {
    load_child_theme_textdomain( 'clean-commerce-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_locale' );


/**
 * Site branding.
 *
 * @since 1.0.0
 */
function clean_commerce_site_branding() {

    ?>
    <div class="site-branding">

        <?php clean_commerce_the_custom_logo(); ?>

        <?php $show_title = clean_commerce_get_option( 'show_title' ); ?>
        <?php $show_tagline = clean_commerce_get_option( 'show_tagline' ); ?>
        <?php if ( true === $show_title || true === $show_tagline ) :  ?>
            <div id="site-identity">
                <?php if ( true === $show_title ) : ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ( true === $show_tagline ) : ?>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                <?php endif; ?>
            </div><!-- #site-identity -->
        <?php endif; ?>
    </div><!-- .site-branding -->
    <div id="right-header">
        <?php if ( has_nav_menu( 'header' ) ) : ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'header',
                'container'      => 'nav',
                'container_id'   => 'header-nav',
                'depth'          => 1,
            ) );
            ?>
        <?php endif; ?>

        <?php if ( clean_commerce_is_woocommerce_active() ) : ?>
            <div id="cart-section">
                <ul>
<!--                    <li class="account-login">-->
<!--                        <a href="--><?php //echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?><!--">--><?php //echo is_user_logged_in() ? esc_html__( 'My Account', 'clean-commerce' ) : esc_html__( 'Login / Register', 'clean-commerce' ) ; ?><!--</a>-->
<!--                    </li>-->
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                        <li class="cart-price"><strong><?php esc_html_e( 'Shopping Cart', 'clean-commerce-child' ) ?></strong>&nbsp;/&nbsp;<span class="amount"><?php echo WC()->cart->get_cart_contents_weight(); ?> кг</span></li>
                        <li class="cart-icon"><strong><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></strong><span class="cart-icon-handle"></span></li>
                    </a>
                </ul>
            </div> <!-- .cart-section -->
        <?php endif; ?>
    </div> <!-- #right-header -->
    <?php
}


/*
* goes in theme functions.php or a custom plugin. Replace the image filename/path with your own :)
*
**/
add_action( 'init', 'custom_fix_thumbnail' );

function custom_fix_thumbnail() {
    add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

    function custom_woocommerce_placeholder_img_src( $src ) {
//        $upload_dir = wp_upload_dir();
//        $uploads = untrailingslashit( $upload_dir['baseurl'] );
//        $src = $uploads . '/2012/07/thumb1.jpg';
//
//        return $src;

        return '';

    }
}
