<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 10:43
 */


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
                    <?php cart_customlocation_html(); ?>
                </ul>
            </div> <!-- .cart-section -->
        <?php endif; ?>
    </div> <!-- #right-header -->
    <?php
}