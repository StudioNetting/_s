<?php
/**
 * Template part for displaying a featured post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php
		sn_posted_on();
		sn_posted_by();
		?>
		
	</header>

	<div>
		<?php the_excerpt(); ?>
	</div>

	<footer>
		<?php sn_entry_footer(); ?>
	</footer>
</article>

