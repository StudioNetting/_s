<?php
/**
 * Customize and register the Customize section
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function netting_customize_register( $wp_customize ) {
	// Remove unneccessary sections etc. for the enduser
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('custom_css');

	// Add postMessage support for site title and description for the Theme Customizer
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'netting_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'netting_customize_partial_blogdescription',
		) );
	}


	//  =====================================
    //  = Theme SEO Panel with sections		=
    //  =====================================
	$wp_customize->add_panel(
		'netting_theme_seo', 
		array(
			'title' => __('Søkemotoroptimalisering', 'netting'),
			'description' => '',
			'priority' => 150,
		) 
	);
	
	$wp_customize->add_section(
		'netting_theme_seo_panel_meta_tags', 
		array(
			'title' => __('Metatagger', 'netting'),
			'priority' => 10,
			'panel' => 'netting_theme_seo',
		) 
	);
	
	//---  ==============================
    //---  = GEO.Place SEO City			=
    //---  ==============================
    $wp_customize->add_setting('netting_theme_geo_city',array('type' => 'option')); 
    $wp_customize->add_control(
		'netting_theme_geo_city', 
		array(
			'label' => __('Sted', 'netting'),
			'section' => 'netting_theme_seo_panel_meta_tags',
			'description' => __('Eksempel <strong>Oslo</strong>. Brukes for <strong>geo.placename</strong> metatag for SEO.', 'netting'),
			'settings' => 'netting_theme_geo_city',
			'priority' => 100,
		)
	);
	
	//---  ==============================
    //---  = GEO.Place SEO Country		=
    //---  ==============================
    $wp_customize->add_setting('netting_theme_geo_country',array('type' => 'option'));
    $wp_customize->add_control(
		'netting_theme_geo_country', 
		array(
			'label' => __('Land', 'netting'),
			'section' => 'netting_theme_seo_panel_meta_tags',
			'description' => __('Eksempel <strong>Norge</strong>. Brukes for <strong>DC.coverage</strong> metatag for SEO.', 'netting'),
			'settings' => 'netting_theme_geo_country',
			'priority' => 101,
		)
	);
	
	//---  ==================================
    //---  = GEO.Region SEO Country Code	=
    //---  ==================================
    $wp_customize->add_setting('netting_theme_geo_country_code',array('type' => 'option'));
    $wp_customize->add_control(
		'netting_theme_geo_country_code', 
		array(
			'label'	=> __('Landskode', 'netting'),
			'section' => 'netting_theme_seo_panel_meta_tags',
			'description' => __('2 bokstaver. Eksempel <strong>NO</strong> for Norge. Kikk på <a href="https://countrycode.org/norway" target="_blank">https://countrycode.org/norway</a>. Brukes for <strong>geo.region</strong> metatag for SEO.', 'netting'),
			'settings' => 'netting_theme_geo_country_code',
			'priority' => 102,
		)
	);
	
	//---  ==================================
    //---  = Latitude SEO					=
    //---  ==================================
    $wp_customize->add_setting('netting_theme_geo_latitude',array('type' => 'option'));
    $wp_customize->add_control(
		'netting_theme_geo_latitude', 
		array(
			'label' => __('Skriv inn breddegrad', 'netting'),
			'section' => 'netting_theme_seo_panel_meta_tags',
			'description' => __('Eksempel <strong>59.329323</strong>. Kikk på <a href="http://www.latlong.net/" target="_blank">http://www.latlong.net/</a>. Brukes for <strong>ICBM</strong> &amp; <strong>geo.position</strong> metatag for SEO.', 'netting'),
			'settings' => 'netting_theme_geo_latitude',
			'priority' => 103,
		)
	);
	
	//---  ==================================
    //---  = Longitude SEO					=
    //---  ==================================
    $wp_customize->add_setting('netting_theme_geo_longitude',array('type' => 'option'));
    $wp_customize->add_control(
		'netting_theme_geo_longitude', 
		array(
			'label' => __('Skriv inn lengde', 'netting'),
			'section' => 'netting_theme_seo_panel_meta_tags',
			'description' => __('Eksempel <strong>18.068581</strong>. Kika på <a href="http://www.latlong.net/" target="_blank">http://www.latlong.net/</a>. Brukes for <strong>ICBM</strong> &amp; <strong>geo.position</strong> metatag for SEO.', 'netting'),
			'settings' => 'netting_theme_geo_longitude',
			'priority' => 104,
		)
	);
	
}
add_action( 'customize_register', 'netting_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function netting_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function netting_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function netting_customize_preview_js() {
	wp_enqueue_script( 'netting-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'netting_customize_preview_js' );
