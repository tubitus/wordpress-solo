<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Základní nastavení šablony
 */
function vlastni_sablona_setup() {
    // Nechte WordPress spravovat tag <title>
    add_theme_support( 'title-tag' );

    // Registrace jednoduchého menu (volitelné)
    register_nav_menus( [
        'primary' => __( 'Hlavní menu', 'super_stranka' ),
    ] );
}
add_action( 'after_setup_theme', 'vlastni_sablona_setup' );

/**
 * Načtení stylesheetů
 */
function vlastni_sablona_enqueue_styles() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Hlavní style.css
    $main_css = $theme_dir . '/style.css';
    wp_enqueue_style( 'vlastni-style', get_stylesheet_uri(), [], file_exists( $main_css ) ? filemtime( $main_css ) : null );

    // Footer styl (volitelný - načte se pouze pokud soubor existuje)
    $footer_css = $theme_dir . '/styles/footer.css';
    if ( file_exists( $footer_css ) ) {
        wp_enqueue_style( 'vlastni-footer', $theme_uri . '/styles/footer.css', [ 'vlastni-style' ], filemtime( $footer_css ) );
    }

    // Portfolio stylesheet (volitelný)
    $portfolio_css = $theme_dir . '/styles/portfolio.css';
    if ( file_exists( $portfolio_css ) ) {
        wp_enqueue_style( 'vlastni-portfolio', $theme_uri . '/styles/portfolio.css', [ 'vlastni-style' ], filemtime( $portfolio_css ) );
    }
}
add_action( 'wp_enqueue_scripts', 'vlastni_sablona_enqueue_styles' );

/**
 * Registrace CPT 'portfolio' a taxonomie
 */
function vlastni_sablona_register_portfolio() {
    $labels = array(
        'name'          => __( 'Portfolio', 'super_stranka' ),
        'singular_name' => __( 'Portfolio položka', 'super_stranka' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_rest'       => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-portfolio',
    );

    register_post_type( 'portfolio', $args );

    register_taxonomy( 'portfolio_category', 'portfolio', array(
        'labels'       => array( 'name' => __( 'Kategorie portfolia', 'super_stranka' ) ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'vlastni_sablona_register_portfolio' );
