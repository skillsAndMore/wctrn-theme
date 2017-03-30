<?php

/**
 * Codice NON FUNZIONANTE, devi agganciarti alla relativa Action Hook after_setup_theme per applicare lo Starter Content
 *
 * In questo file si trovano diversi esempi di codice che permettono di comprendere al meglio il funzionamento e la configurazione
 * degli Starter Content. Una cosa che dobbiamo sempre ricordarci e' che questi contenuti *funzionano soltanto su una nuova installazione*
 * se l'utente modifica il contenuto base, al momento, non c'è modo di mostrare il contenuto diverso che abbiamo preparato.
 *
 * @link https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/ Presentazione delle Selective Refresh in Make WordPress
 */

/**
 * Richiamando semplicemente il supporto allo starter content WordPress caricherà il contenuto di default che è stato
 * creato. Il contenuto di default può essere richiamato e personalizzato anche dalla creazione del nostro Starter Content.
 *
 * @link https://core.trac.wordpress.org/browser/trunk/src/wp-includes/theme.php?rev=39373#L1910 Pagina Trac dove è possibile scoprire la struttura dello Starter Content all'interno dell'array $core_content
 */
add_theme_support( 'starter-content' );

/**
 * Creo un array di configurazione che passo alla funzione add_theme_support per caricare il mio personale Starter Content
 */
$starter_content = array(
    //Configurazione Starter Content
);
add_theme_support( 'starter_content', $starter_content );

/**
 * Esempi su come impostare diversi Starter Content
 *
 * Nei seguenti blocchi di codice viene mostrato come sia possibile modificare lo Starter Content in modo da personalizzarlo
 * il più possibile. Inizieremo ad analizzare singolarmente i vari componenti che possono essere aggiunti per poi terminare con un
 * esempio di Starter Content completo e funzionante.
 *
 */

//Aggiungere delle Widget
$starter_content = array(
    'widgets' => array(
        //Specifico l'ID della sidebar da personalizzare, vedi functions.php:106
        'sidebar-1' => array(
            //Specifico l'ID della widget che voglio utilizzare, se non riconosciuto da WordPress devo specificare i valori contenuti
            'text_business_info', //Widget che fa parte dello Starter Content di default
            'my_text' => array( //Mia widget personale
                'title' => 'Ciao WordCamp Torino!!!',
                'text' => 'Bello questo Starter Content!'
            )
        )
    )
);

//Aggiungo un Post Type
$starter_content = array(
    'posts' => array(
        'home', //Post che fa parte dello Starter Content di Default
        'wctrn' => array( //Post creato per il WordCamp Torino
            'post_type' => 'page',
            'post_title' => 'WordCamp Torino 2017',
            'post_content' => 'WordCamps are back in Italy!',
            'thumbnail' => '{{image-wctrn}}', //Posso specificare un'immagine in evidenza
            'template' => 'wctrn-page-template.php', //Posso specificare uno specifico template per questa pagina
        )
    )
);

//Aggiungo un allegato
$starter_content = array(
    'attachments' => array(
        'image-wctrn' => array( //Nota che e' lo stesso id che ho usato precedentemente come thumbnail
            'post_title' => 'WordCamp Torino',
            'file' => 'images/wctrn-hero-image.jpg'
        )
    )
);

//Aggiungo un menu di navigazione
$starter_content = array(
    'nav_menus' => array(
        'page_home' => array( //Creo un collegamento a una pagina esistente
            'type' => 'post_type',
            'object' => 'page',
            'object_id' => '{{home}}'
        ),
        'page_wctrn' => array(
            'type' => 'post_type',
            'object' => 'page',
            'object_id' => '{{wctrn}}'
        ),
        'link_sam' => array( //Inserisco un link esterno
            'title' => 'SkillsAndMore',
            'url' => 'https://skillsandmore.org'
        )
    )
);

//Aggiunta di opzioni e theme_mod
$starter_content = array(
    'options' => array(
        'show_on_front' => 'page', //Imposto una homepage statica
        'page_on_front' => '{{home}}',
        'page_for_posts' => '{{blog}}' //Prendo questa pagina dal contenuto di default in WordPress
    ),
    'theme_mod' => array(
        //Inserisco opzioni specifiche per il tema
    )
);
