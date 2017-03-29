<?php

/**
 * Pagina che presenta la descrizione delle recenti funzioni introdotte per gestire e recuperare il percorso a un file rispettando
 * la gerarchia di un tema
 */

/**
 * La funzione get_theme_file_uri() cerca principalmente nella stylesheet directory prima ancora della template directory per
 * il file indicato, in questo modo viene rispettata la gerarchia dei temi e permette ai child theme di sovrascrivere dei
 * file (principalmente CSS e Js, ma anche immagini) presenti nel tema genitore.
 *
 * Con il parametro di esempio inserito verrà eseguita la seguente ricerca:
 * - http://mio-dominio.it/wp-content/themes/tema-figlio/js/mio-script.js
 * - http://mio-dominio.it/wp-content/themes/tema-genitore/js/mio-script.js
 *
 * Se non trovato il file all'interno della cartella tema-figlio/ si procederà a caricare quello presente in tema-genitore/
 *
 * @link https://developer.wordpress.org/reference/functions/get_theme_file_uri/ Pagina che contiene la descrizione della funzione get_theme_file_uri()
 */
get_theme_file_uri('/js/mio-script.js');

/**
 * La funzione get_theme_file_path() presenta la stessa logica della funzione appena descritta ma al posto di restituire una
 * URL restituisce il percorso al file partendo dal sistema interno del server.
 *
 * Con il parametro di esempio inserito verrà eseguita la seguente ricerca:
 * - /srv/www/wordpress/wp-content/themes/tema-figlio/js/mio-script.js
 * - /srv/www/wordpress/wp-content/themes/tema-genitore/js/mio-script.js
 *
 * Se non trovato il file all'interno della cartella tema-figlio/ si procederà a caricare quello presente in tema-genitore/
 *
 * @link https://developer.wordpress.org/reference/functions/get_theme_file_path/ Pagina che contiene la descrizione della funzione get_theme_file_path()
 */
get_theme_file_path('/js/mio-script.js');

/**
 * Simile alla funzione get_template_directory_uri(), la funzione get_parent_theme_file_uri() permette di dichiarare che
 * il file che stiamo caricando dovrà essere caricato esclusivamente dalla cartella del tema genitore e non permette di
 * seguire la gerarchia dei temi.
 *
 * Con il parametro di esempio inserito verrà eseguita la seguente ricerca:
 * - http://mio-dominio.it/wp-content/themes/tema-genitore/js/mio-script.js
 *
 * Il file viene caricato direttamente dalla cartella del tema genitore.
 *
 * @link https://developer.wordpress.org/reference/functions/get_parent_theme_file_uri/ Pagina che contiene la descrizione della funzione get_parent_theme_file_uri()
 */
get_parent_theme_file_uri('/js/mio-script.js');

/**
 * Simile alla funzione get_template_directory(), la funzione get_parent_theme_file_path() permette di dichiarare che
 * il file che stiamo caricando dovrà essere caricato esclusivamente dalla cartella del tema genitore e non permette di
 * seguire la gerarchia dei temi.
 *
 * Con il parametro di esempio inserito verrà eseguita la seguente ricerca:
 * - /srv/www/wordpress/wp-content/themes/tema-genitore/js/mio-script.js
 *
 * Il file viene caricato direttamente dalla cartella del tema genitore.
 *
 * @link https://developer.wordpress.org/reference/functions/get_parent_theme_file_path/ Pagina che contiene la descrizione della funzione get_parent_theme_file_path()
 */
get_parent_theme_file_path('/js/mio-script.js');
