<?php

/**
 * Da utilizzare come filtro in functions.php
 *
 * Scopri come creare e personalizzare la possibilita' di inserire il proprio logo all'interno del tuo sito permettendo al
 * tuo cliente o all'utente che utilizzera' la piattaforma di personalizzarla aggiungendo la propria Brand Identity.
 *
 * @link https://developer.wordpress.org/reference/hooks/type_template_hierarchy/ Pagina di presentazione della funzionalita'
 * @link https://make.wordpress.org/core/2016/09/09/new-functions-hooks-and-behaviour-for-theme-developers-in-wordpress-4-7/ Annuncio della funzionalita' in Make WordPress
 */

//Aggiungo un filtro inutile che aiuta a spiegare il funzionamento
add_filter( 'single_template_hierarchy', function( array $templates ) {
    array_unshift( $templates, "single-test.php" );
    return $templates;
} );

//Filtro che mi permette di spacificare il file da caricare in base all'anno dell'archivio
 add_filter( 'date_template_hierarchy', function( array $templates ) {
     $year = get_query_var( 'year' );
     array_unshift( $templates, "year-{$year}.php" );
     return $templates;
 } );
