<?php

/**
 * Codice NON FUNZIONANTE, devi agganciare le funzioni wp_enqueue_script() alla relativa Action Hook
 *
 * Questo file presenta soltanto la trasformazione del parametro che indica il percorso allo script da caricare attraverso wp_enqueue_script
 * cambiando la funzione get_template_directory_uri() con get_theme_file_uri() che permette di rispettare la gerarchia che esiste
 * tra tema genitore e figlio
 *
 * @link https://developer.wordpress.org/reference/functions/get_theme_file_uri/ Pagina che contiene la descrizione della funzione get_theme_file_uri()
 */

//Originariamente si usava la funzione get_template_directory_uri()
wp_enqueue_script( 'wctrn_advanced_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

//Ma oggi si può usare get_theme_file_uri() e rispettare la gerarchia del tema
wp_enqueue_script( 'wctrn_advanced_theme-skip-link-focus-fix', get_theme_file_uri('/js/skip-link-focus-fix.js'), array(), '20151215', true );
