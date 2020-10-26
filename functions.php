<?php 
//adding css and js scripts
function load_scripts(){
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(). 'all');
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(). 'all');
    wp_enqueue_script('main', get_template_directory_uri().'/js/bootstrap.min.js','',false,true);
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'load_scripts');


// Theme Options
add_theme_support('menus');
//add featured image
add_theme_support('post-thumbnails');


// Menus
register_nav_menus(
    
        array(
            'top-menu' =>  'Top Menu Location',
            'mobile-menu' =>  'Mobile Menu Location',
            'footer-menu' =>  'Footer Menu Location',

        )

);


function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );


// Custom Image Sizes
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);

?>