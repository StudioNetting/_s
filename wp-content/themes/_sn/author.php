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
    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
    	<h1><?php echo __('Om', 'sn'). ' ' .$curauth->nickname ; ?></h1>
	</header>
	
	<p><?php echo $curauth->user_description; ?></p>
    
    <?php if($curauth->user_url !== ''): ?>
	    <p>
	        <span><?php echo __('Nettside:', 'sn'); ?></span>
	        <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
	    </p>   
    <?php endif; ?> 

    <?php if ( have_posts() ) : ?>
    	<h2><?php echo __('Innlegg skrevet av', 'sn'). ' ' .$curauth->nickname ; ?></h2>

		<?php while ( have_posts() ) : the_post();
        	get_template_part( 'modules/featured', get_post_type() );
		endwhile; 
		
    endif; ?>

</article>

<?php
get_footer();