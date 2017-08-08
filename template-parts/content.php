<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clean_Commerce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php clean_commerce_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php $archive_layout = clean_commerce_get_option( 'archive_layout' ); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		$archive_image           = clean_commerce_get_option( 'archive_image' );
		$archive_image_alignment = clean_commerce_get_option( 'archive_image_alignment' );
		?>
		<?php if ( 'disable' !== $archive_image ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( esc_attr( $archive_image ), array( 'class' => 'align'. esc_attr( $archive_image_alignment ) ) ); ?></a>
		<?php endif; ?>
	<?php endif; ?>

<!--	<div class="entry-content-wrapper">-->
<!---->
<!--		<div class="entry-content">-->

<!--    delete posts contents in news page-->

<!--		</div>-->
    <!-- .entry-content -->
<!--	</div>-->
    <!-- .entry-content-wrapper -->

	<footer class="entry-footer">
		<?php clean_commerce_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
