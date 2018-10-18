<?php
/**
 * The template for displaying author
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sn
 */

get_header();
?>

<article>

	<header>
    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    printf( '<h1>' . esc_html__( 'About %1$s', 'sn' ) . '</h1>', $curauth->nickname ); ?>
	</header>
	
	<p><?php echo $curauth->user_description; ?></p>
    
    <?php if($curauth->user_url !== ''): ?>
	    <p>
	        <span><?php _e('Nettside:', 'sn'); ?></span>
	        <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
	    </p>   
    <?php endif; ?> 

    <?php if ( have_posts() ) : 
	    printf( '<h2>' . esc_html__( 'Innlegg skrevet av %1$s', 'sn' ) . '</h2>', $curauth->nickname );
	    while ( have_posts() ) : the_post();
        	get_template_part( 'modules/featured', get_post_type() );
		endwhile; 
    endif; ?>

</article>

<?php
get_footer();