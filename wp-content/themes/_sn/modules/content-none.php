<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sn
 */

?>

<section class="no-results not-found">
	<header>
		<h1><?php esc_html_e( 'Ingenting funnet', 'sn' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php esc_html_e( 'Klar til å publisere din første post? ', 'sn' ); ?><a href="<?php admin_url( 'post-new.php' ); ?>"><?php esc_html_e( 'Gå til innleggsredigering', 'sn' ); ?></a></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Beklager, men vi kunne ikke finne noe som matcher søket ditt. Prøv igjen med andre søkeord.', 'sn' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'Vi kan ikke finne det du leter etter. Prøv å søke.', 'sn' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section>
