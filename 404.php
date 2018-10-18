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
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'Error 404: Vi kan ikke finne siden du leter etter. Dette kan skyldes at siden er flyttet, har fått ny adresse eller ikke finnes. Kanskje du finner siden ved et søk?', 'sn' ); ?></p>

		<?php
		get_search_form();

		the_widget( 'WP_Widget_Recent_Posts' );
		?>

		<div class="widget widget_categories">
			<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'sn' ); ?></h2>
			<ul>
				<?php
				wp_list_categories( array(
					'orderby'    => 'count',
					'order'      => 'DESC',
					'show_count' => 1,
					'title_li'   => '',
					'number'     => 10,
				) );
				?>
			</ul>
		</div><!-- .widget -->

		<?php
		/* translators: %1$s: smiley */
		$sn_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'sn' ), convert_smilies( ':)' ) ) . '</p>';
		the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$sn_archive_content" );

		the_widget( 'WP_Widget_Tag_Cloud' );
		?>

	</div><!-- .page-content -->
</section><!-- .error-404 -->

<?php
get_footer();
