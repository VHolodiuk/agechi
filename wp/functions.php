<?php
define('THEME_VERSION', '1.0.30');
function theme_enqueue_styles() {
    wp_enqueue_style( 'main',
        get_template_directory_uri() . '/style.css', array(), THEME_VERSION
    );
    wp_enqueue_style( 'custom--fonts-css',
        'https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Cambay:wght@400;700&display=swap', array(), THEME_VERSION
    );
    wp_enqueue_style( 'slick-styles',
        "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", array('main'), THEME_VERSION
    );
    wp_enqueue_script( 'slick-script',
        "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), THEME_VERSION
    );
    wp_enqueue_style( 'full-styles',
        "https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css", array('main'), THEME_VERSION
    );
    wp_enqueue_script( 'full-script',
        "https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.extensions.min.js", array('jquery'), THEME_VERSION
    );
    wp_enqueue_style( 'custom-style',
        get_template_directory_uri() . '/assets/css/style.bundle.72bb754b2bd56a790c4f.css', array('main'), THEME_VERSION
    );
    wp_enqueue_script( 'custom-script',
        get_stylesheet_directory_uri() . '/assets/js/bundle.72bb754b2bd56a790c4f.js', array('jquery'), THEME_VERSION
    );
}

add_theme_support( 'post-thumbnails' );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


// Our custom post type function
function create_posttype() {

    register_post_type( 'postjobs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __('Post Jobs')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'postjobs'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
            'menu_icon' => 'dashicons-welcome-write-blog',
        )
    );
    register_post_type( 'postteams',
    // CPT Options
        array(
            'labels' => array(
                'name' => __('Post Teams')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'postteams'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
            'menu_icon' => 'dashicons-admin-users',
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

if( function_exists('acf_add_options_page') ) {

	// acf_add_options_page(array(
	// 	'page_title' 	=> 'Post Servies Settings',
	// 	'menu_title'	=> 'Post Servies Settings',
	// 	'menu_slug' 	=> 'postservies',
	// 	'capability'	=> 'edit_posts',
	// 	'redirect'		=> false
    // ));

	acf_add_options_page(array(
		'page_title' 	=> 'Post Teams Settings',
		'menu_title'	=> 'Post Teams Settings',
		'menu_slug' 	=> 'postprojects',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));
}

// function custom_posts_per_page( $query ) {
//     if ( $query->is_archive('postservies') ) {
//         set_query_var('posts_per_page', -1);
//     }
//     if ( $query->is_archive('postprojects') ) {
//         set_query_var('posts_per_page', -1);
//     }
// }
// add_action( 'pre_get_posts', 'custom_posts_per_page' );

?>
