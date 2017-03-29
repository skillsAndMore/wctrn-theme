<?php

/**
 * Codice NON FUNZIONANTE, devi agganciar alla relativa Action Hook customize_register per ottenere l'oggetto $wp_customize
 *
 * Questo file presenta la possibilità di sfruttare le Selective Refresh per mostrare le Visible Edit Shortcut all'interno
 * del proprio tema.
 *
 * @link https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/ Presentazione delle Selective Refresh in Make WordPress
 * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/customize/class-wp-customize-selective-refresh.php file su GitHub contenente la classe dedicata alle Selective Refresh
 * @link https://make.wordpress.org/core/2016/11/10/visible-edit-shortcuts-in-the-customizer-preview/ Presentazione delle Visible Edit Shortcut in Make WordPress
 */

//È importante assicurarsi che il transport sia impostato a postMessage
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

/**
 * Come aggiungere le Selective Refresh e le Visual Edit Shortcut attraverso il metodo add_partial()
 *
 * Descrizione parametri utilizzati:
 * - `selector` permette di specificare un selettore CSS per idendificare l'elemento presente nella pagina
 * - `render_callback` è la funzione incaricata di restituire il contenuto che viene modificato
 *
 * @link https://developer.wordpress.org/reference/classes/wp_customize_selective_refresh/add_partial/ Pagina di documentazione relativa al metodo add_partial()
 */
$wp_customize->selective_refresh->add_partial( 'blogname', array(
    'selector' => '.site-title a',
    'render_callback' => 'wctrn_advanced_theme_customize_partial_blogname',
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
    'selector' => '.site-description',
    'render_callback' => 'wctrn_advanced_theme_customize_partial_blogdescription',
) );

/**
 * Aggiungo le funzioni specificate in `render_callback` quando abbiamo utilizzato il metodo add_partial()
 */
 function wctrn_advanced_theme_customize_partial_blogname(){
 	bloginfo('name');
 }
 function wctrn_advanced_theme_customize_partial_blogdescription(){
 	bloginfo('description');
 }
