<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sn
 */

get_header();
?>

<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Oops, her må det ha skjedd en feil!', 'sn' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'Error 404: Vi kan ikke finne siden du leter etter. Dette kan skyldes at siden er flyttet, har fått ny adresse eller ikke finnes. Kanskje du finner siden ved et søk?', 'sn' ); ?></p>

		<?php get_search_form(); ?>

	</div>
</section>

<?php
get_footer();
