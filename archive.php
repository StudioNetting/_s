<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sn
 */

get_header();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<?php
		the_archive_title( '<h1>', '</h1>' );
		the_archive_description( '<div">', '</div>' );
		?>
	</header>

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		get_template_part( 'modules/featured', get_post_type() );

	endwhile;

	the_posts_navigation();

else :

	get_template_part( 'modules/content', 'none' );

endif;
?>

<?php
get_footer();
