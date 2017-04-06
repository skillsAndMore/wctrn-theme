<?php

/**
 * Codice NON FUNZIONANTE, devi inserire questo codice nel tuo functions.php e rispettare le chiamate
 *
 * Con questo file ti mostro come sia possibile creare gli strumenti all'interno del tuo customizer e come questi possono
 * interagire con gli elementi presenti all'interno del tema. Per comprendere al meglio gli oggetti dedicati al customizer
 * a tua disposizione devi sempre ricordarti che:
 * - un pannello è un contenitore di sezioni;
 * - le sezioni contengono le impostazioni e i controlli;
 * - le impostazioni vengono salvate nel database;
 * - i controlli sono gli elementi che rappresentano la UI del customizer
 *
 * @link https://developer.wordpress.org/files/2014/10/Customizer-Object-Relationships.png Immagine che descrive le relazioni tra gli oggetti Customizer
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/ Pagina descrittiva del Theme Handbook
 * @link https://make.wordpress.org/core/2016/11/10/visible-edit-shortcuts-in-the-customizer-preview/ Presentazione delle Visible Edit Shortcut in Make WordPress
 */

/*
 * La funzione wctrn_customize_register() viene lanciata all'hook customize_register e ci permette
 * di aggiungere pannelli, sezioni, impostazioni e controlli al nostro Customizer
 */
function wctrn_customize_register( $wp_customize ) {

}
add_action( 'customize_register', 'wctrn_customize_register' );

/*
 * Con questo codice mostro come sia possibile creare una sezione, un'impostazione e un controllo
 */
 function wctrn_customize_register( $wp_customize ) {

   //Aggiungo la sezione
   $wp_customize->add_section( 'id_sezione', array(
      'title' => 'Titolo sezione',
      'description' => 'Descrizione sezione',
      'priority' => 160,
      'capability' => 'edit_theme_options',
    ) );

    //Aggiungo l'impostazione
    $wp_customize->add_setting( 'id impostazione', array(
      'type' => 'theme_mod', // come salvare i valori impostati dall'utente
      'capability' => 'edit_theme_options', // quali capability deve avere
      'default' => '',
      'transport' => 'refresh', // come inviare le informazioni
      'sanitize_callback' => '',
    ) );

    //Aggiungo il controllo
    $wp_customize->add_control( 'id_impostazione', array(
      'type' => 'date', // definisci il tipo di campo da creare
      'priority' => 10, // priorita' definita all'interno della sezione
      'section' => 'id_sezione', // a quale sezione appartiene il controllo
      'label' => 'Titolo',
      'description' => 'Descrizione controllo',
      'input_attrs' => array(
        'class' => 'my-custom-class-for-js',
        'style' => 'border: 1px solid #900',
      ),
      'active_callback' => 'is_front_page',
    ) );
    
 }
 add_action( 'customize_register', 'wctrn_customize_register' );
