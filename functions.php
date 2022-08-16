<?php 

/*=====================================


Register Child Theme Style


========================================*/
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    $parenthandle = 'wsuwp-theme-wds'; 
    $theme = wp_get_theme();

    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), 
        $theme->parent()->get('Version')
    );

    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}

/*=====================================


Register Admin styles


========================================*/
function load_admin_styles() {
    wp_enqueue_style( 'admin_css_foo', get_stylesheet_directory_uri() . '/admin/css/admin-styles.css', false );
    wp_enqueue_style( 'admin_css_bar', get_stylesheet_directory_uri() . '/admin-style-bar.css', false, '1.0.0' );
}

add_action( 'admin_enqueue_scripts', 'load_admin_styles' );

