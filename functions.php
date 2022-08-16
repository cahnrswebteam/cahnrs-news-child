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


/*=====================================


Register Custom Post Status


========================================*/


function my_custom_status_creation(){
    register_post_status( 'archive', array(
        'label'                     => _x( 'Archived', 'post' ),
        'label_count'               => _n_noop( 'Archived <span class="count">(%s)</span>', 'Archived <span class="count">(%s)</span>'),
        'public'                    => false,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true
    ));
}
add_action( 'init', 'my_custom_status_creation' );

function my_custom_status_add_in_quick_edit() {
    echo "<script>
    jQuery(document).ready( function() {
        jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"archive\">Archived</option>' );      
    }); 
    </script>";
}
add_action('admin_footer-edit.php','my_custom_status_add_in_quick_edit');
function my_custom_status_add_in_post_page() {
    echo "<script>
    jQuery(document).ready( function() {        
        jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"archive\">Archived</option>' );
    });
    </script>";
}
add_action('admin_footer-post.php', 'my_custom_status_add_in_post_page');
add_action('admin_footer-post-new.php', 'my_custom_status_add_in_post_page');


/*=====================================


Add post state next to page title in 
admin dashboard


========================================*/
function my_post_states( $post_states, $post ) {
    if ( get_post_status ( $post->ID ) == 'archive' ) {
        $post_states['archive'] = 'Archived';
    }

    return $post_states;
}
add_filter( 'display_post_states', 'my_post_states', 10, 2 );