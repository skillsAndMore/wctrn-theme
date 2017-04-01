<?php

/**
 * Codice NON FUNZIONANTE, devi agganciarti alla relativa Action Hook after_setup_theme per attivare il Custom Logo
 *
 * Scopri come creare e personalizzare la possibilita' di inserire il proprio logo all'interno del tuo sito permettendo al
 * tuo cliente o all'utente che utilizzera' la piattaforma di personalizzarla aggiungendo la propria Brand Identity.
 *
 * @link https://make.wordpress.org/core/2016/03/10/custom-logo/ Presentazione dei Custom Logo in Make WordPress
 * @link https://developer.wordpress.org/themes/functionality/custom-logo/ Pagina del Theme Handbook dove viene descritta la funzionalità
 */

//Basta attivare il supporto per farlo funzionare
add_theme_support( 'custom-logo' );

//Una volta aggiunto il supporto in header.php si puo' usare la seguente funzione
if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
}

//E' possibile personalizzarlo ulteriormente grazie ai seguenti parametri:
$custom_logo = array(
    'height' => 100, //per impostare l'altezza del logo
    'width' => 360, //per impostare la larghezza del logo
    'flex-height' => true, //permette di impostare un'altezza flessibile
    'flex-width' => true, //permette di impostare una larghezza flessibile
    'header-text' => array( 'site-title', 'site-description') //specifica le classi che identificano gli elementi che potrebbero essere sostituiti dal logo
);
add_theme_support( 'custom-logo', $custom_logo );
