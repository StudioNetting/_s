<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="HandheldFriendly" content="true">
<meta name="application-name" content="<?php bloginfo('sitename'); ?>">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('sitename'); ?>">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="geo.region" content="<?php echo get_option('netting_theme_geo_country_code'); ?>">
<meta name="geo.placename" content="<?php echo get_option('netting_theme_geo_city'); ?>">
<meta name="geo.position" content="<?php echo get_option('netting_theme_geo_latitude').';'.get_option('netting_theme_geo_longitude'); ?>">
<meta name="ICBM" content="<?php echo get_option('netting_theme_geo_latitude').', '.get_option('netting_theme_geo_longitude'); ?>">
<meta name="DC.coverage" content="<?php echo get_option('netting_theme_geo_country'); ?>" />
<meta name="DC.publisher" content="<?php bloginfo('sitename'); ?>" />
<meta name="DC.creator" content="<?php bloginfo('sitename'); ?>" />
<meta name="DC.title" content="<?php bloginfo('sitename'); ?>" />
<meta name="DC.identifier" content="<?php echo get_home_url(); ?>" />
<meta name="DC.language" scheme="RFC1766" content="<?php echo get_locale(); ?>" />
<meta name="DC.type" content="Text" />
<meta name="DC.format" content="text/html" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'netting' ); ?></a>

	<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'netting' ); ?></button>
			<?php
				wp_nav_menu( array( 
					'theme_location' => 'primary', 
					'menu_id' => '', 
					'menu_class' => '', 
					'container'  => '' 
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
