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


// redirect to home if page is /my-account

add_action( 'wp', 'redirect' );

function redirect() {
    if ( is_page('my-account') && !is_user_logged_in() ) {
        wp_redirect( home_url('/') );
        die();
    }
}




/**
 * Footer copyright.
 *
 * @since 1.0.0
 */
function clean_commerce_footer_copyright() {

    // Check if footer is disabled.
    $footer_status = apply_filters( 'clean_commerce_filter_footer_status', true );
    if ( true !== $footer_status ) {
        return;
    }

    // Copyright content.
    $copyright_text = clean_commerce_get_option( 'copyright_text' );
    $copyright_text = apply_filters( 'clean_commerce_filter_copyright_text', $copyright_text );
    if ( ! empty( $copyright_text ) ) {
        $copyright_text = wp_kses_data( $copyright_text );
    }

    // Powered by content.
//    $powered_by_text = sprintf( esc_html__( 'Clean Commerce by %s', 'clean-commerce' ), '<a target="_blank" rel="designer" href="http://wenthemes.com/">' . esc_html__( 'WEN Themes', 'clean-commerce' ) . '</a>' );

    $show_social_in_footer = clean_commerce_get_option( 'show_social_in_footer' );

    $column_count = 0;

    if ( $copyright_text ) {
        $column_count++;
    }
//    if ( $powered_by_text ) {
//        $column_count++;
//    }
    if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) {
        $column_count++;
    }
    ?>

    <div class="colophon-inner colophon-grid-<?php echo esc_attr( $column_count ); ?>">

        <?php if ( ! empty( $copyright_text ) ) : ?>
            <div class="colophon-column">
                <div class="copyright">
                    <?php echo $copyright_text; ?>
                </div><!-- .copyright -->
            </div><!-- .colophon-column -->
        <?php endif; ?>

        <?php if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) : ?>
            <div class="colophon-column">
                <div class="footer-social">
                    <?php the_widget( 'Clean_Commerce_Social_Widget' ); ?>
                </div><!-- .footer-social -->
            </div><!-- .colophon-column -->
        <?php endif; ?>

<!--        --><?php //if ( ! empty( $powered_by_text ) ) : ?>
<!--            <div class="colophon-column">-->
<!--                <div class="site-info">-->
<!--                    --><?php //echo $powered_by_text; ?>
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endif; ?>

    </div><!-- .colophon-inner -->

    <?php
}