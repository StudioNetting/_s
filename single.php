<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sn
 */

get_header(); ?>
	
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h1><?php the_title(); ?></h1>
			<?php sn_posted_on(); ?>
		</header>
	
		<?php the_content(); ?>	
	</article>

	<?php 
	the_post_navigation();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>		

<?php
get_footer();
