<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package latimpe
 */

get_header(); ?>

<h1></h1>  

<?php
$args = array(
	'post_type'      => array( 'post', 'custom_post' ),
	'posts_per_page' => 10,
	'posts_per_page' => 15,
);

$query = new WP_Query( $args );

while ( $query->have_posts() ) :
	$query->the_post();
	get_template_part( 'modules/featured', get_post_type() );
endwhile;

get_footer();
