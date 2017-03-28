<?php

/**
 * Funzione e azione per dichiarare il supporto ai Custom Header con spiegazioni in linea di ogni parametro
 *
 * Questa funcione serve soltanto per scopi didattici dato che molte delle informazioni che trovi al suo interno vengono sostituite
 * dai valori di default che vengono presentati all'interno del Codex.
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
}
add_action( 'after_setup_theme', 'wctrn_advanced_theme_custom_header_setup' );
