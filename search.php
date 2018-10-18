<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sn
 */

get_header();
?>

<?php if ( have_posts() ) : ?>

	<header>
		<h1>
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Søkeresultat', 'sn' ));
			?>
			
		</h1>
		
		<?php 
		get_search_form(); 
		global $wp_query;
		
		if( $wp_query->post_count == 1 ) {
			$result_title .= '1 søkeresultat';
		} else {
			$result_title .= $wp_query->found_posts . ' søkeresultater';
		}
		
		$result_title .= ' for <span>\'' . wp_specialchars($wp_query->query_vars['s'], 1) . '\'<span>';
		
		echo $result_title;
	
		?>
		
	</header>

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'modules/featured', get_post_type() );

	endwhile;

	the_posts_navigation();

else :

	get_template_part( 'modules/content', 'none' );

endif;
?>

<?php
get_footer();
