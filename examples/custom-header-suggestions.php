<?php

/**
 * Funzione e azione per dichiarare il supporto ai Custom Header e aggiunge i suggerimenti per le immagini da usare
 *
 * Oltre all'aggiunta del supporto al Custom Header in questo blocco di codice puoi scoprire la funzione `register_default_headers()`
 * che ti permette di aggiungere una serie di immagini di default da utilizzare per il tuo tema.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/ Pagina del Theme Handbook dove viene descritta la funzionalità
 */
function wctrn_advanced_theme_custom_header_setup() {
    $defaults = array(
        'default-image' => get_parent_theme_file_uri( '/images/default-header-image.jpg' ), // Immagine di default da mostrare
        'header-text' => false, // Decidi se far mostrare o meno il testo sopra l'immagine
        'default-text-color' => '000', // Il colore di default del testo
        'width' => 1000, // Larghezza dell'immagine (in pixels)
        'height' => 198, // Altezza dell'immagine (in pixels)
        'random-default' => false, // Impostazione di default per la rotazione delle immagini
        'uploads' => false, // Permetti di caricare le immagini
        'wp-head-callback' => 'wphead_cb', // La funzione di callback che deve essere chiamata nel tuo <head>
        'admin-head-callback' => 'adminhead_cb', //  Funzione di callback che deve essere chiamata nel <head> della schermata Personalizza
        'admin-preview-callback' => 'adminpreview_cb', // Funzione che produce il codice necessario per mostrare l'immagine nella schermata Personalizza
    );

    add_theme_support( 'custom-header', $defaults );

    register_default_headers( array(
    	'default-image' => array(
    		'url'           => '%s/images/default-header-image.jpg',
    		'thumbnail_url' => '%s/images/default-header-image.jpg',
    		'description'   => __( 'Immagine di default per il tema', 'wctrn_advanced_theme' ),
    	),
    ) );
}
add_action( 'after_setup_theme', 'wctrn_advanced_theme_custom_header_setup' );
