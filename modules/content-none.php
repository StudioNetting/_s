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
		<h1><?php echo__( 'Ingenting funnet', 'sn' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php echo __('Klar til å publisere din første post? ', 'sn'); ?><a href="<?php admin_url('post-new.php'); ?>"><?php echo __('Gå til innleggsredigering', 'sn');?></a></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php echo __( 'Beklager, men vi kunne ikke finne noe som matcher søket ditt. Prøv igjen med andre søkeord.', 'sn' ); ?></p>
			<?php get_search_form();

		else : ?>

			<p><?php echo __( 'Vi kan ikke finne det du leter etter. Prøv å søke.', 'sn' ); ?></p>
			<?php get_search_form();

		endif; ?>
	</div>
</section>
