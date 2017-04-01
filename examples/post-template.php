<?php

/**
 * Esempi per la creazione di un Post Template
 *
 * Dalla versione 4.7 è possibile creare dei template non soltanto per le Pagine ma anche per i classici Post e
 * qualsiasi altro tipo di Post Type
 *
 * @link https://make.wordpress.org/core/2016/11/03/post-type-templates-in-4-7/ Annuncio della funzionalita' in Make WordPress
 */

/*
Template Name: Esempio di Post Template
Template Post Type: post, page, product
*/

// Personalizza la struttura


//Evita che venga elencata la pagina per versioni più vecchie di WordPress
function wctrn_exclude_pt( $pt ) {
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
        unset( $pt['path/pt.php'] );
    }

    return $pt;
}

add_filter( 'theme_page_templates', 'wctrn_exclude_pt' );
