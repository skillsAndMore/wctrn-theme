<?php
/**
 * wctrn_advanced_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wctrn_advanced_theme
 */

if ( ! function_exists( 'wctrn_advanced_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wctrn_advanced_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wctrn_advanced_theme, use a find and replace
	 * to change 'wctrn_advanced_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wctrn_advanced_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'wctrn_advanced_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wctrn_advanced_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	$custom_logo = array(
	    'height' => 100,
	    'width' => 360,
	    'flex-height' => true,
	    'flex-width' => true,
	    'header-text' => array( 'site-title', 'site-description')
	);
	add_theme_support( 'custom-logo', $custom_logo );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Aggiunto lo Starter Content che permette di popolare un'installazione "vergine" di WordPress con del contenuto
	 * fittizio che aiuta l'utente a comprendere come poter configurare il proprio tema.
	 *
	 * @example examples/starter-content.php Descrizione completa del comando e delle sue funzionalita'
	 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/ Pagina di presentazione della funzionalita'
	 */
	 $starter_content = array(

		//Inserisco Widget
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
		),

		//Inserisco Post
		'posts' => array(
		    'home', //Post che fa parte dello Starter Content di Default
		    'wctrn' => array( //Post creato per il WordCamp Torino
		        'post_type' => 'page',
		        'post_title' => 'WordCamp Torino 2017',
		        'post_content' => 'WordCamps are back in Italy!',
		        'thumbnail' => '{{image-wctrn}}', //Posso specificare un'immagine in evidenza
		        'template' => 'wctrn-page-template.php', //Posso specificare uno specifico template per questa pagina
		    )
		),

		//Inserisco Allegati
		'attachments' => array(
	        'image-wctrn' => array( //Nota che e' lo stesso id che ho usato precedentemente come thumbnail
	            'post_title' => 'WordCamp Torino',
	            'file' => 'images/wctrn-hero-image.jpg'
	        )
	    ),

		//Inserisco Menu Navigazione
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
	    ),

		//Imposto Homepage
		'options' => array(
	        'show_on_front' => 'page', //Imposto una homepage statica
	        'page_on_front' => '{{home}}',
	        'page_for_posts' => '{{blog}}' //Prendo questa pagina dal contenuto di default in WordPress
	    )
 	);
	add_theme_support( 'starter-content', $starter_content );
}
endif;
add_action( 'after_setup_theme', 'wctrn_advanced_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wctrn_advanced_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wctrn_advanced_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wctrn_advanced_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wctrn_advanced_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wctrn_advanced_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wctrn_advanced_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wctrn_advanced_theme_widgets_init' );

/**
 * Enqueue script e fogli di stile con la funzione get_theme_file_uri.
 *
 * @example examples/get-theme-file.php Come si è trasformato il codice per la funzione wp_enqueue_script()
 * @example examples/loading-scripts-functions.php Esempi e descrizione delle nuove funzioni introdotte per il caricamento degli script.
 */
function wctrn_advanced_theme_scripts() {
	wp_enqueue_style( 'wctrn_advanced_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wctrn_advanced_theme-navigation', get_theme_file_uri('/js/navigation.js'), array(), '20151215', true );

	wp_enqueue_script( 'wctrn_advanced_theme-skip-link-focus-fix', get_theme_file_uri('/js/skip-link-focus-fix.js'), array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wctrn_advanced_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_theme_file_path('/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path('/inc/template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require get_theme_file_path('/inc/extras.php');

/**
 * Customizer additions.
 */
require get_theme_file_path('/inc/customizer.php');

/**
 * Load Jetpack compatibility file.
 */
require get_theme_file_path('/inc/jetpack.php');
