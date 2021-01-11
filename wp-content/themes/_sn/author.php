<?php
/**
 * The template for displaying author
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sn
 */

get_header();

$get_author = filter_input( INPUT_GET, 'author_name', FILTER_SANITIZE_STRING );
$curauth    = ( isset( $get_author ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
?>

<article>

	<header>
		<h1><?php echo esc_html__( 'Om', 'sn' ) . ' ' . esc_html( $curauth->nickname ); ?></h1>
	</header>
	<p><?php echo wp_kses_post( $curauth->user_description ); ?></p>

	<?php
	if ( $curauth->user_url !== '' ) :
		?>
		<p>
			<span><?php esc_html_e( 'Nettside:', 'sn' ); ?></span>
			<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_url( $curauth->user_url ); ?></a>
		</p>   
		<?php
	endif;

	if ( have_posts() ) :
		?>
		<h2><?php echo esc_html__( 'Innlegg skrevet av', 'sn' ) . ' ' . esc_html( $curauth->nickname ); ?></h2>

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'modules/featured', get_post_type() );
		endwhile;

	endif;
	?>

</article>

<?php
get_footer();
