<?php
/**
 * wctrn_advanced_theme Theme Customizer
 *
 * @package wctrn_advanced_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @example examples/visible-edit-shortcuts.php Come aggiungere le scorciatoie per modificare gli elementi in Personalizza
 */
function wctrn_advanced_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => '.site-title a',
	    'render_callback' => 'wctrn_advanced_theme_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => '.site-description',
	    'render_callback' => 'wctrn_advanced_theme_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'wctrn_advanced_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wctrn_advanced_theme_customize_preview_js() {
	wp_enqueue_script( 'wctrn_advanced_theme_customizer', get_theme_file_uri('/js/customizer.js'), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wctrn_advanced_theme_customize_preview_js' );

/**
 * Modifico il titolo del sito per il selective refresh partial.
 *
 * @see wctrn_advanced_theme_customize_register()
 *
 * @return void
 */
function wctrn_advanced_theme_customize_partial_blogname(){
	bloginfo('name');
}

/**
 * Modifico la descrizione del sito per il selective refresh partial.
 *
 * @see wctrn_advanced_theme_customize_register()
 *
 * @return void
 */
function wctrn_advanced_theme_customize_partial_blogdescription(){
	bloginfo('description');
}
